<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Msurat_keluar extends Sipaten_model 
{
	public $start_date;

	public $end_date;

	public $category;

	public $user;

	public $status;

	public $query;

	public function __construct()
	{
		parent::__construct();
	
		$this->start_date = $this->input->get('start');

		$this->end_date = $this->input->get('end');

		$this->category = $this->input->get('jenis');

		$this->user = $this->input->get('user');

		$this->status = $this->input->get('status');

		$this->query = $this->input->get('query');
	}

	public function data($limit = 20, $offset = 0, $type = 'result')
	{
		$this->db->select('surat.ID, nomor_surat, surat.nik, kategori_surat.slug, nama_lengkap, kode_surat, id_surat, tanggal, status,  judul_surat, name, nama');

		$this->db->where_not_in('status', 'entry');

		if($this->input->get('start') != '')
			$this->db->where('tanggal >= ', $this->input->get('start'));

		if($this->input->get('end') != '')
			$this->db->where('tanggal <= ', $this->input->get('end'));

		if($this->input->get('jenis') != '')
			$this->db->where('kategori', $this->input->get('jenis'));

		if($this->input->get('user') != '')
			$this->db->where('user', $this->input->get('user'));

		if($this->input->get('status') != '')
			$this->db->where('status', $this->input->get('status'));

		if($this->input->get('query') != '')
			$this->db->like('surat.nomor_surat', $this->input->get('query'))
					 ->or_like('surat.nik', $this->input->get('query'))
					 ->or_like('penduduk.nama_lengkap', $this->input->get('query'));

		$this->db->join('kategori_surat', 'surat.kategori = kategori_surat.id_surat', 'left');

		$this->db->join('penduduk', 'surat.nik = penduduk.nik', 'left');

		$this->db->join('users', 'surat.user = users.user_id', 'left');

		$this->db->join('pegawai', 'surat.pegawai = pegawai.ID', 'left');

		$this->db->order_by('surat.ID', 'desc');

		if($type == 'result')
		{
			return $this->db->get('surat', $limit, $offset)->result();
		} else {
			return $this->db->get('surat')->num_rows();
		}
	}

	public function get($param = 0)
	{
		$this->db->select('
			surat.*, kategori_surat.*, penduduk.nik, penduduk.nama_lengkap, penduduk.pekerjaan, penduduk.tmp_lahir, penduduk.tgl_lahir, penduduk.no_kk, penduduk.status_kk, penduduk.agama, penduduk.alamat, penduduk.gol_darah, penduduk.rt, penduduk.rw, penduduk.jns_kelamin, penduduk.status_kawin, penduduk.kewarganegaraan, desa.nama_desa, pegawai.nama, pegawai.jabatan, pegawai.pangkat, pegawai.nip, penduduk.telepon, desa.id_desa, users.name'
		);

		$this->db->where_not_in('status', 'entry');

		$this->db->join('kategori_surat', 'surat.kategori = kategori_surat.id_surat', 'left');

		$this->db->join('penduduk', 'surat.nik = penduduk.nik', 'left');

		$this->db->join('desa', 'penduduk.desa = desa.id_desa', 'left');

		$this->db->join('users', 'surat.user = users.user_id', 'left');

		$this->db->join('pegawai', 'surat.pegawai = pegawai.ID', 'left');

		$this->db->where('surat.ID', $param);

		return $this->db->get('surat')->row();
	}

	/**
	 * undocumented class variable
	 *
	 * @var string
	 **/
	public function update_surat($param = 0)
	{
		$surat = $this->get($param);

		$isianSurat = json_decode(json_encode($this->input->post('isi')));

		/* JIKA TERDAPAT PENGIKUT */
		if( property_exists($isianSurat, 'pengikut') )
		{
			$this->db->delete('pengikut', array('surat' => $param));

			if( is_array($isianSurat->pengikut) )
			{
				foreach( $isianSurat->pengikut as $key => $value )
				{
					$this->db->insert('pengikut', 
						array(
							'surat' => $param,
							'param' => $surat->slug,
							'nik' => $value->nik
					));
				}
			}
		}

		$surat = array(
			'nomor_surat' => $this->input->post('nomor_surat'),
			'isi_surat' => json_encode($this->input->post('isi')),
			'pegawai' => $this->input->post('ttd_pejabat'),
			'pemeriksa' => $this->input->post('pemeriksa')
		);

		$this->db->update('surat', $surat, array('ID' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Surat berhasil diubah.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Tidak ada data yang diubah.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

	/**
	 * Set Update Status Surat Keluar
	 *
	 * @param Integer (ID) key table surat
	 * @param String (status)
	 * @return void
	 **/
	public function update_status($param = 0, $status = 'pending')
	{
		$surat = array(
			'waktu_selesai' => date('Y-m-d H:i:s'),
			'status' => $status 
		);

		$this->db->update('surat', $surat, array('ID' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Status Surat berhasil diubah.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Gagal saat mengubah data.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

	/**
	 * Hapus Data Surat keluar
	 *
	 * @param Integer (ID) key table surat
	 * @return void
	 **/
	public function delete($param = 0)
	{
		$this->db->delete('surat', array('ID' => $param));

		$this->db->delete('log_surat', array('nomor_surat' => $param));

		$this->db->delete('notifications', array('surat' => $param));

		$this->db->delete('pengikut', array('surat' => $param));

		$this->db->delete('penilaian', array('surat' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Data Surat berhasil dihapus.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Gagal saat menghapus data.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

	/**
	 * Hapus Data SUrat Keluar Multiple
	 *
	 * @param Array
	 * @return void
	 **/
	public function delete_multiple()
	{
		if( is_array($this->input->post('surat')) )
		{
			foreach( $this->input->post('surat') as $key => $value)
			{
				$this->db->delete('surat', array('ID' => $value));

				$this->db->delete('log_surat', array('nomor_surat' => $value));
			}

			$this->template->alert(
				' Data Surat yang terpilih berhasil dihapus.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Tidak ada data yang dipilih.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}
}

/* End of file Msurat_keluar.php */
/* Location: ./application/models/Msurat_keluar.php */