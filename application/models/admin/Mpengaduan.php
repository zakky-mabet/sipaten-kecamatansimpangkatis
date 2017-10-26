<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * E-Pengaduan Model
 *
 * @package administrator/model
 * @author Vicky Nitinegoro <pkpvicky@gmail.com>
 **/

class Mpengaduan extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();

		/* Code here */
	}
	
	public function get_all($limit = 20, $offset = 0, $type = 'result')
	{
		$this->db->select('epengaduan.*, penduduk.nik, penduduk.nama_lengkap');

		$this->db->join('penduduk', 'epengaduan.ID_users = penduduk.ID_users', 'left');
		$this->db->order_by('create_tgl', 'desc');
		$this->db->order_by('create_tgl', 'desc');
		if( $this->input->get('query') )
			$this->db->like('epengaduan.judul', $this->input->get('query') )
					 ->or_like('penduduk.nama_lengkap', $this->input->get('query'))
					 ->or_like('penduduk.nik', $this->input->get('query'));

		if( $type == 'result' )
		{
			return $this->db->get('epengaduan', $limit, $offset)->result();
		} else {
			return $this->db->get('epengaduan')->num_rows(); 
		}
	}

	public function get($param = 0)
	{
		$this->db->select(
			'epengaduan.*, penduduk.nik, penduduk.nama_lengkap, penduduk.jns_kelamin, penduduk.tgl_lahir, penduduk.tmp_lahir, penduduk.alamat, penduduk.rt, penduduk.rw, penduduk.desa, penduduk.kecamatan, penduduk.kewarganegaraan, penduduk.pekerjaan, penduduk.agama'
		);

		$this->db->join('penduduk', 'epengaduan.ID_users = penduduk.ID_users', 'left');

		$this->db->where('epengaduan.ID', $param);

		return $this->db->get('epengaduan')->row();
	}

	public function penilaian($param = 0, $user=0)
	{
		$this->db->select('epenilaian.*, penduduk.nik, penduduk.nama_lengkap, penduduk.jns_kelamin, penduduk.tgl_lahir, penduduk.tmp_lahir, penduduk.alamat, penduduk.rt, penduduk.rw, penduduk.desa, penduduk.kecamatan, penduduk.kewarganegaraan, penduduk.pekerjaan, penduduk.agama');
		$this->db->join('penduduk', 'epenilaian.ID_users = penduduk.ID_users', 'left');
		$this->db->where(array('epenilaian.ID_penilaian'=> $param, 'epenilaian.ID_users' => $user));
		return $this->db->get('epenilaian')->row();
	}

	public function get_durasi($param = 0)
	{
		$awal  = new DateTime(self::get($param)->create_tgl);
		$akhir = new DateTime( date('Y-m-d H:i:s') ); 

		$diff  = $awal->diff($akhir);

		if($diff->d)
			 return  $diff->d . ' Hari, '. $diff->h . ' Jam, '. $diff->i . ' Menit';

		return  $diff->h . ' Jam, '. $diff->i . ' Menit';
	}

	public function update($param = 0)
	{
		if( self::get($param)->status_pesan == 'no')
		{
			$data = array(
				'approve_tgl' => date('Y-m-d H:i:s'), 
				'status_pesan' => 'yes',
				'durasi' => self::get_durasi( $param )
			);
			$this->insert_penilaian($param);
		}
		elseif( self::get($param)->status_pesan == 'read')
		{
			$data = array(
				'approve_tgl' => NULL, 
				'status_pesan' => 'no',
				'durasi' => NULL,

			);
			$this->db->delete('epenilaian', array('ID_penilaian' => self::get($param)->ID_pengaduan ));
		}

		 else {
			$data = array(
				'approve_tgl' => NULL, 
				'status_pesan' => 'no',
				'durasi' => NULL,

			);
			$this->db->delete('epenilaian', array('ID_penilaian' => self::get($param)->ID_pengaduan ));
		}
		
		$this->db->update('epengaduan', $data, array('ID' => $param));


		/* Kirim Informasi kepada pengadu melalui E-Mail */
		self::send_email_pengadu( $param );

		if( $this->db->affected_rows() )
		{
            $this->template->alert(
                ' Data berhasil diubah', 
                array('type' => 'success','icon' => 'check')
            );
		} else {
            $this->template->alert(
                ' Tidak ada yang diubah', 
                array('type' => 'warning','icon' => 'warning')
            );
		}
	}

	public  function insert_penilaian($param = 0)
	{
		$get = self::get($param);
		if ($this->db->get_where('epenilaian', array('ID_penilaian' => $get->ID_pengaduan ))->num_rows() == FALSE ) {
			$data = array(
			'ID_users' => $get->ID_users,
			'kategori' => 'epengaduan',
			'ID_penilaian' => $get->ID_pengaduan,
			'status_nilai' => 'no'
			);
		$this->db->insert('epenilaian', $data);
		}
		
	}

	/**
	 * Get Send Email
	 *
	 * @param Integer (ID) epengaduan
	 * @return Void
	 **/
	public function send_email_pengadu($param = 0)
	{
		$get = self::get($param);

		/*

		Code Send E-Mail Here

		*/
	}

	public function delete($param = 0)
	{
		if( self::get($param)->photo != FALSE )
			unlink("assets/img/epengaduan/{$this->get($param)->photo}");

		$this->db->delete('epengaduan', array('ID' => $param));

		if( $this->db->affected_rows() )
		{
            $this->template->alert(
                ' Data berhasil dihapus', 
                array('type' => 'success','icon' => 'check')
            );
		} else {
            $this->template->alert(
                ' Tidak ada yang dihapus', 
                array('type' => 'warning','icon' => 'warning')
            );
		}
	}

	public function multiple_delete()
	{
		if( is_array($this->input->post('pengaduan')) )
		{
			foreach( $this->input->post('pengaduan') as  $key => $value)
			{
				if( self::get($value)->photo != FALSE )
					unlink("assets/img/epengaduan/{$this->get($value)->photo}");

				$this->db->delete('epengaduan', array('ID' => $value));
			}

			if( $this->db->affected_rows() )
			{
	            $this->template->alert(
	                ' Data berhasil dihapus', 
	                array('type' => 'success','icon' => 'check')
	            );
			} else {
	            $this->template->alert(
	                ' Tidak ada yang dihapus', 
	                array('type' => 'warning','icon' => 'warning')
	            );
			}
		}
	}

	public function count_penilaian($param)
	{
		$this->db->select('epenilaian');
		$this->db->where('penilaian', $param);
		return $this->db->get('epenilaian')->num_rows();
	}

}


/* End of file Mpengaduan.php */
/* Location: ./application/models/admin/Mpengaduan.php */