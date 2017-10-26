<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 *
 * @package administrator/controller
 * @author Teitra Mega Team <teitramega@gmail.com>
 **/

class Mpengaturan extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();

		/* Code here */
	}
	
	public function get_all($limit = 20, $offset = 0, $type = 'result')
	{
		$this->db->select('*');
		$this->db->order_by('ID', 'DESC');
		if( $this->input->get('query') )
			$this->db->like('tb_administrator.username', $this->input->get('query') )
					 ->or_like('tb_administrator.email', $this->input->get('query'))
					 ->or_like('tb_administrator.hak_akses', $this->input->get('query'));

		if( $type == 'result' )
		{
			return $this->db->get('tb_administrator', $limit, $offset)->result();
		} else {
			return $this->db->get('tb_administrator')->num_rows(); 
		}
	}

	public function get($param = 0)
	{
		$this->db->select('*');

		$this->db->where('tb_administrator.ID', $param);

		return $this->db->get('tb_administrator')->row();
	}


	public function update($param = 0)
	{
			$data = array(
				'username' => $this->input->post('username'),
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'email' => $this->input->post('email'),
				'no_hp' => $this->input->post('no_hp'),
				'alamat' => $this->input->post('alamat'),
				'status' => $this->input->post('status'),
				'hak_akses' => $this->input->post('hak_akses'),

			);
		$this->db->update('tb_administrator', $data, array('ID' => $param));

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

	public function create()
	{
				if (isset($_FILES['photo'])) 
			        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'admin_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/img/img-admin/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('photo'))
		        { 
		           	$foto = $this->upload->data();
	        	}
        			}	

                $admin = array(
           		'username' => $this->input->post('username'), 
		        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
		        'nama_lengkap' => $this->input->post('nama_lengkap'), 
		        'email' => $this->input->post('email'), 
		        'no_hp' => $this->input->post('no_hp'), 
		        'alamat' => $this->input->post('alamat'), 
		        'status' => $this->input->post('status'), 
		        'hak_akses' => $this->input->post('hak_akses'), 
		        'photo' => $foto['file_name'],
		       	'tgl_daftar' => $create_tgl,
                );
                $cekmail = $this->db->get_where('tb_administrator', array('email' => $this->input->post('email') ));
                $cekuser = $this->db->get_where('tb_administrator', array('username' => $this->input->post('username') ));
		        $row = $cekmail->num_rows();
		        if ($row >= 1 ) {
		        	$this->template->alert(
						'email sebelumnya telah terdaftar.', 
						array('type' => 'danger','icon' => 'check')
					);
		        }elseif ($cekuser->num_rows() >= 1) {
		        	$this->template->alert(
						'Username sebelumnya telah terdaftar.', 
						array('type' => 'danger','icon' => 'check')
					);
		        } 

		        else {
                $this->db->insert('tb_administrator', $admin);

				if($this->db->affected_rows())
				{
					$this->template->alert(
						' Pengguna ditambahkan.', 
						array('type' => 'success','icon' => 'check')
					);
				} else {
					$this->template->alert(
						' Gagal menyimpan data.', 
						array('type' => 'warning','icon' => 'warning')
					);
				}
			}
	}

	public function delete($param = 0)
	{
		if( self::get($param)->photo != FALSE )
			unlink("assets/img/img-admin/{$this->get($param)->photo}");

		$this->db->delete('tb_administrator', array('ID' => $param));

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
		if( is_array($this->input->post('pengaturan')) )
		{
			foreach( $this->input->post('pengaturan') as  $key => $value)
			{
				if( self::get($value)->photo != FALSE )
					unlink("assets/img/img-admin/{$this->get($value)->photo}");

				$this->db->delete('tb_administrator', array('ID' => $value));
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
}

/* End of file Mpengaduan.php */
/* Location: ./application/models/admin/Mpengaduan.php */