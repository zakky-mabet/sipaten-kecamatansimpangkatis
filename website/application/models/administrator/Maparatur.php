<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Maparatur extends CI_Model 
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
			$this->db->like('nama_lengkap', $this->input->get('query'))
					 ->or_like('nip', $this->input->get('query'))
					 ->or_like('tmp_lahir', $this->input->get('query'));

		$this->db->order_by('id_camat', 'desc');

		if($type == 'result')
		{
			return $this->db->get('tb_aparatur', $limit, $offset)->result();
		} else {
			return $this->db->get('tb_aparatur')->num_rows();
		}
	}

	public function create(){

	if ($this->session->userdata('account_admin')->hak_akses == 'admin') {
			$akses = 'show';
		}
		else {
			$akses = 'hide';
		}

	if (isset($_FILES['foto'])) 
	   {
	     	$create_tgl = date('Y-m-d H:i:s'); 
		    $this->load->library('upload');
		    $nmfile = 'slider-'.date('YmdHis'); 
		    $config['upload_path'] = './assets/images/team/';
		    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; 
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
		'nama_lengkap' => $this->input->post('nama_lengkap'),
	    'nip' => $this->input->post('nip'),
	    'pangkat' => $this->input->post('pangkat'),
	    'tmp_lahir' => $this->input->post('tmp_lahir'),
	    'tgl_lahir' => $this->input->post('tgl_lahir'),
	    'agama'=> $this->input->post('agama'),
	    'alamat'=> $this->input->post('alamat'),
	    'hobbi'=> $this->input->post('hobbi'),
	    'motto_hidup'=> $this->input->post('motto_hidup'),
	    'jabatan'=> $this->input->post('jabatan'),
		'foto' => $foto['file_name'],
		'uploaded' => $this->session->userdata('account_admin')->username,
		'dates' => date('Y-m-d H:i:s'),
		'status' => $akses,
		'slug' => url_title($this->input->post('nama_lengkap'), 'dash', TRUE),
		'hits' => 0,
		'facebook' => $this->input->post('facebook'),
		'gplus'=> $this->input->post('gplus'),
		'twitter'=> $this->input->post('twitter'),
		'instagram'=> $this->input->post('instagram'),
		);

	$this->db->insert('tb_aparatur', $data);

	if($this->db->affected_rows()){

		$this->template->alert(
			' Data Aparatur ditambahkan.', 
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

		$this->db->where('id_camat', $param);

		return $this->db->get('tb_aparatur')->row();
	}

	public function update($param = 0)
	{
		if ($this->session->userdata('account_admin')->hak_akses == 'admin') {
			$akses = 'show';
		}
		else {
			$akses = 'hide';
		}

	if (isset($_FILES['foto'])) 
	   {
	     	$create_tgl = date('Y-m-d H:i:s'); 
		    $this->load->library('upload');
		    $nmfile = 'slider-'.date('YmdHis'); 
		    $config['upload_path'] = './assets/images/team/';
		    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; 
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
		'nama_lengkap' => $this->input->post('nama_lengkap'),
	    'nip' => $this->input->post('nip'),
	    'pangkat' => $this->input->post('pangkat'),
	    'tmp_lahir' => $this->input->post('tmp_lahir'),
	    'tgl_lahir' => $this->input->post('tgl_lahir'),
	    'agama'=> $this->input->post('agama'),
	    'alamat'=> $this->input->post('alamat'),
	    'hobbi'=> $this->input->post('hobbi'),
	    'motto_hidup'=> $this->input->post('motto_hidup'),
	    'jabatan'=> $this->input->post('jabatan'),
		'foto' => $foto['file_name'],
		'uploaded' => $this->session->userdata('account_admin')->username,
		'dates' => date('Y-m-d H:i:s'),
		'status' => $akses,
		'slug' => url_title($this->input->post('nama_lengkap'), 'dash', TRUE),
		'facebook' => $this->input->post('facebook'),
		'gplus'=> $this->input->post('gplus'),
		'twitter'=> $this->input->post('twitter'),
		'instagram'=> $this->input->post('instagram'),
		);

		@unlink("assets/images/team/{$this->get($param)->foto}");
		
		$this->db->update('tb_aparatur', $data, array('id_camat' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Data Aparatur berhasil diubah.', 
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
		@unlink("assets/images/team/{$this->get($param)->foto}");	

		$this->db->delete('tb_aparatur', array('id_camat' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Data Aparatur berhasil dihapus.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Tidak ada data yang dihapus.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

	public function multiple_delete()
	{
		if( is_array($this->input->post('data')) )
		{
			foreach ($this->input->post('data') as $key => $value)

				@unlink("assets/images/team/{$this->get($param)->foto}"); 

				$this->db->delete('tb_aparatur', array('id_camat' => $value));

			if($this->db->affected_rows())
			{
				$this->template->alert(
					' Data Aparatur berhasil dihapus.', 
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
				'uploaded' => $this->session->userdata('account_admin')->username,
				'dates' => date('Y-m-d H:i:s'),

			);
			$this->db->update('tb_aparatur', $data, array('id_camat' => $param));
		}
		else {
			$data = array(
				'status' => 'show',
				'uploaded' => $this->session->userdata('account_admin')->username,
				'dates' => date('Y-m-d H:i:s'),

			);
			$this->db->update('tb_aparatur', $data, array('id_camat' => $param));
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