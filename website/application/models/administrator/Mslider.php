<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Mslider extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		
	}
	public function get_all($limit = 20, $offset = 0, $type = 'result')
	{
		if($this->input->get('user') != '')
			$this->db->where('uploaded', $this->input->get('user'));

		if($this->input->get('status') != '')
			$this->db->where('status', $this->input->get('status'));

		if($this->input->get('query') != '')
			$this->db->like('title', $this->input->get('query'))
					 ->or_like('short_description', $this->input->get('query'));

		$this->db->order_by('id', 'desc');

		if($type == 'result')
		{
			return $this->db->get('slider', $limit, $offset)->result();
		} else {
			return $this->db->get('slider')->num_rows();
		}
	}

	public function create(){

	if ($this->session->userdata('account_admin')->hak_akses == 'admin') {
			$akses = 'show';
		}
		else {
			$akses = 'hide';
		}
	if (isset($_FILES['img'])) 
	   {
	     	$create_tgl = date('Y-m-d H:i:s'); 
		    $this->load->library('upload');
		    $nmfile = 'slider-'.date('YmdHis'); 
		    $config['upload_path'] = './assets/images/slider/';
		    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; 
		    $config['max_size'] = '40480';
		    $config['max_width']  = '12880';
		    $config['max_height']  = '7680';
		    $config['file_name'] = $nmfile; 
	     	$this->upload->initialize($config);
	     	if ($this->upload->do_upload('img'))
			{ 
		       	$img = $this->upload->data();
	     	}
        }

	$data = array(
		'title' => $this->input->post('judul'),
		'short_description' => $this->input->post('short_description'),
		'link' => $this->input->post('link'),
		'img' => $img['file_name'],
		'uploaded' => $this->session->userdata('account_admin')->username,
		'dates' => date('Y-m-d H:i:s'),
		'status' => $akses
		);

	$this->db->insert('slider', $data);

	if($this->db->affected_rows()){

		$this->template->alert(
			' Data Slider ditambahkan.', 
			array('type' => 'success',
				'icon' => 'check')
			);
	} 

	else {
		$this->template->alert(' 
			Gagal menyimpan data.', 
			array('type' => 'warning',
			'icon' => 'times'));
		}
	}

	public function get($param = 0)
	{

		$this->db->where('id', $param);

		return $this->db->get('slider')->row();
	}

	public function update($param = 0)
	{
		if ($this->session->userdata('account_admin')->hak_akses == 'admin') {
			$akses = 'show';
		}
		else {
			$akses = 'hide';
		}

	
	     	$create_tgl = date('Y-m-d H:i:s'); 
		    $this->load->library('upload');
		    $nmfile = 'slider-'.date('YmdHis'); 
		    $config['upload_path'] = './assets/images/slider/';
		    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; 
		    $config['max_size'] = '40480';
		    $config['max_width']  = '12880';
		    $config['max_height']  = '7680';
		    $config['file_name'] = $nmfile; 
	     	$this->upload->initialize($config);
	     	if ($this->upload->do_upload('img'))
			{ 
		       	$img = $this->upload->data();
	     	}
        

		$data = array(
		'title' => $this->input->post('judul'),
		'short_description' => $this->input->post('short_description'),
		'link' => $this->input->post('link'),
		'img' => $img['file_name'],
		'uploaded' => $this->session->userdata('account_admin')->username,
		'dates' => date('Y-m-d H:i:s'),
		'status' => $akses
		);

		$img = $this->get($param);

		@unlink("assets/images/slider/{$img->img}");
		$this->db->update('slider', $data, array('id' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Data Slider berhasil diubah.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Tidak ada data yang diubah.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

	public function delete($param = 0)
	{
		
		$img = $this->get($param);

		@unlink("assets/images/slider/{$img->img}");

		$this->db->delete('slider', array('id' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Data Slider berhasil dihapus.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Tidak ada data yang dihapus.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

	

	public function multiple_delete(){



			foreach($this->input->post('data') as $value) {

				@unlink("assets/images/slider/".self::get($value)->img); 
			
				$this->db->delete('slider', array('id' => $value));
			
			if($this->db->affected_rows())
			{
				$this->template->alert(
					' Data Slider berhasil dihapus.', 
					array('type' => 'success','icon' => 'check')
				);
			} else {
				$this->template->alert(
					' Tidak ada data yang dihapus.', 
					array('type' => 'warning','icon' => 'warning')
				);
			}
		}

	}


	public function status($param = 0)
	{	

	
		if( self::get($param)->status == 'show')
		{
			$data = array(
				'status' => 'hide',
				'uploaded' => $this->session->userdata('account_admin')->username,
				'dates' => date('Y-m-d H:i:s'),

			);
			$this->db->update('slider', $data, array('id' => $param));
		}
		else {
			$data = array(
				'status' => 'show',
				'uploaded' => $this->session->userdata('account_admin')->username,
				'dates' => date('Y-m-d H:i:s'),

			);
			$this->db->update('slider', $data, array('id' => $param));
		}

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Status berhasil diubah.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Tidak ada data yang diubah.', 
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