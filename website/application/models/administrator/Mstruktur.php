<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Mstruktur extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		
	}
	public function get_all()
	{

		$this->db->where('id', 1);

		return $this->db->get('organisasi')->result();
		
	}

	
	public function get($param = 0)
	{

		$this->db->where('id', $param);

		return $this->db->get('organisasi')->row();
	}

	public function update($param = 0)
	{

	if (isset($_FILES['foto'])) 
	   {
	     	$create_tgl = date('Y-m-d H:i:s'); 
		    $this->load->library('upload');
		    $nmfile = 'slider-'.date('YmdHis'); 
		    $config['upload_path'] = './assets/images/';
		    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		    $config['max_size'] = '40480';
		    $config['max_width']  = '12880';
		    $config['max_height']  = '7680';
		    $config['file_name'] = $nmfile; 
	     	$this->upload->initialize($config);
	     	if ($this->upload->do_upload('foto'))
			{ 
		       	$foto = $this->upload->data();
	     	}
        }

		$data = array(
		'title' => $this->input->post('judul'),
		'foto' => $foto['file_name'],
		'uploaded' => $this->session->userdata('account_admin')->username,
		'dates' => date('Y-m-d H:i:s'),
		);
		
		$this->db->update('organisasi', $data, array('id' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Data Struktur Organisasi berhasil diubah.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Tidak ada data yang diubah.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

}

/* End of file Mpenduduk.php */
/* Location: ./application/models/admin/Mpenduduk.php */