<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Maccount extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		
	}


	public function get($param = 0)
	{

		$this->db->where('id', $param);

		return $this->db->get('tb_administrator')->row();
	}

	public function update($param = 0)
	{

	$akun_id = $this->session->userdata('akun_id_admin');

	$password_lama = $this->input->post('password_lama');

    if (password_verify($password_lama,$this->account->get($this->session->userdata('akun_id_admin'))->password)) {
		
	if (isset($_FILES['foto'])) 
			        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'admin_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/public/image/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; 
		        $config['max_size'] = '430480';
		        $config['file_name'] = $nmfile; 
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('foto'))
		        { 
		           	$foto = $this->upload->data();
	        	}
        			}
		$data = array(
		'username' =>  $this->input->post('username'),
	    'password'=>  password_hash($this->input->post('ulangi_password'), PASSWORD_DEFAULT),
	    'nama_lengkap'=>  $this->input->post('nama_lengkap'),
	    'email'=>  $this->input->post('email'),
	    'no_hp'=>  $this->input->post('no_hp'),
	    'alamat'=>  $this->input->post('alamat'),
		'photo' => $foto['file_name'],
		'uploaded' => $this->session->userdata('account_admin')->username,

		);
			@unlink("assets/public/image/{$this->account->get($akun_id)->photo}");

			$this->db->update('tb_administrator', $data, array('id' => $akun_id));

			$this->template->alert(
		 		' Data Account berhasil diubah.', 
		 		array('type' => 'success','icon' => 'check')
			);
		}
		else {
				$this->template->alert(
		 		' Password Lama Salah, Silahkan Ulangi !', 
		 		array('type' => 'warning','icon' => 'warning')
		 	);
			}	

	

		


	}


	

	
	public function get_admin()
	{

		return $this->db->get('tb_administrator')->result();
	}

	

}

/* End of file Mpenduduk.php */
/* Location: ./application/models/admin/Mpenduduk.php */