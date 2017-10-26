<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Mmedia extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		
	}
	public function get_all($limit = 20, $offset = 0, $type = 'result')
	{


		if($this->input->get('status') != '')
			$this->db->where('status', $this->input->get('status'));


		if($this->input->get('query') != '')
			$this->db->like('title', $this->input->get('query'));

		$this->db->order_by('id', 'desc');

		if($type == 'result')
		{
			return $this->db->get('media_sosial', $limit, $offset)->result();
		} else {
			return $this->db->get('media_sosial')->num_rows();
		}
	}

	public function create(){

	if ($this->session->userdata('account_admin')->hak_akses == 'admin') {
			$akses = 'yes';
		}
		else {
			$akses = 'no';
		}

	if (isset($_POST['foto'])) 
			        {
	$create_tgl = date('Y-m-d H:i:s'); 
    $this->load->library('upload');
    $nmfile = 'admin_'.date('YmdHis'); 
    $config['upload_path'] = './assets/public/image/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; 
    $config['max_size'] = '40480';
    $config['max_width']  = '12880';
    $config['max_height']  = '7680';
    $config['file_name'] = $nmfile; 
	$this->upload->initialize($config);
	if ($this->upload->do_upload('foto'))
    { 
       	$foto = $this->upload->data();
	}}

	$data = array(
	'username' =>  $this->input->post('username'),
    'password'=>  password_hash($this->input->post('password'), PASSWORD_DEFAULT),
    'nama_lengkap'=>  $this->input->post('nama_lengkap'),
    'email'=>  $this->input->post('email'),
    'no_hp'=>  $this->input->post('no_hp'),
    'alamat'=>  $this->input->post('alamat'),
    'hak_akses'=>  $this->input->post('hak_akses'),
	'photo' => $foto['file_name'],
	'uploaded' => $this->session->userdata('account_admin')->username,
	'tgl_daftar' => date('Y-m-d H:i:s'),
	'status' => $akses
	);

	

	$this->db->insert('tb_administrator', $data);

	if($this->db->affected_rows()){

		$this->template->alert(
			' Data Administrator ditambahkan.' , 
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

		return $this->db->get('media_sosial')->row();
	}

	public function update($param = 0)
	{
		if ($this->session->userdata('account_admin')->hak_akses == 'admin') {
			$akses = 'show';
		}
		else {
			$akses = 'hide';
		}

	$data = array(
		'title' =>  $this->input->post('title'),
		'link' =>  $this->input->post('link'),
		'status' => $akses
		);

		$this->db->update('media_sosial', $data, array('id' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Data Media Sosial berhasil diubah.', 
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


	public function status($param = 0)
	{	

	
		if( self::get($param)->status == 'show')
		{
			$data = array(
				'status' => 'hide',
			);
			$this->db->update('media_sosial', $data, array('id' => $param));
		}
		else {
			$data = array(
				'status' => 'show',
			);
			$this->db->update('media_sosial', $data, array('id' => $param));
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
	

}

/* End of file Mpenduduk.php */
/* Location: ./application/models/admin/Mpenduduk.php */