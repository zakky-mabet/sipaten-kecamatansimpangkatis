<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Mkelurahan extends CI_Model 
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
			$this->db->like('nama_desa', $this->input->get('query'))
					 ->or_like('nama_kades', $this->input->get('query'));

		$this->db->order_by('id', 'desc');

		if($type == 'result')
		{
			return $this->db->get('kelurahan_desa', $limit, $offset)->result();
		} else {
			return $this->db->get('kelurahan_desa')->num_rows();
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
		    $nmfile = 'desa-'.date('YmdHis'); 
		    $config['upload_path'] = './assets/images/desa/';
		    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; 
		    $config['max_size'] = '40480';
		    $config['file_name'] = $nmfile; 
	     	$this->upload->initialize($config);
	     	if ($this->upload->do_upload('foto'))
			{ 
		       	$img = $this->upload->data();
	     	}
        }

    if (isset($_FILES['foto_kantor'])) 
	   {
	     	$create_tgl = date('Y-m-d H:i:s'); 
		    $this->load->library('upload');
		    $nmfile = 'desa-'.date('YmdHis'); 
		    $config['upload_path'] = './assets/images/desa/';
		    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; 
		    $config['max_size'] = '40480';
		    $config['file_name'] = $nmfile; 
	     	$this->upload->initialize($config);
	     	if ($this->upload->do_upload('foto_kantor'))
			{ 
		       	$img1 = $this->upload->data();
	     	}
        }
	$data  = array(
		'foto' => $img['file_name'],
		'foto_kantor' => $img1['file_name'],
		'uploaded' => $this->session->userdata('account_admin')->username,
		'dates' => date('Y-m-d H:i:s'),
		'status' => $akses,
		'hits' => 0,
		'slug' => url_title($this->input->post('post[nama_desa]'), 'dash', TRUE),
		'nama_desa' => $this->input->post('post[nama_desa]'),
   		'nama_kades' => $this->input->post('post[nama_kades]'),
   		'nip' => $this->input->post('post[nip]'),
   		'pangkat'=> $this->input->post('post[pangkat]'),
   		'jabatan'=> $this->input->post('post[jabatan]'),
   		'tmp_lahir'=> $this->input->post('post[tmp_lahir]'),
   		'tgl_lahir'=> $this->input->post('post[tgl_lahir]'),
   		'agama'=> $this->input->post('post[agama]'),
   		'hobbi'=> $this->input->post('post[hobbi]'),
   		'motto_hidup'=> $this->input->post('post[motto_hidup]'),
   		'alamat'=> $this->input->post('post[alamat]'),
   		'email_desa'=> $this->input->post('post[email_desa]'),
   		'alamat_website'=> $this->input->post('post[alamat_website]'),
   		'luas_wilayah'=> $this->input->post('post[luas_wilayah]'),
   		'jmlh_rt'=> $this->input->post('post[jmlh_rt]'),
   		'jmlh_rw'=> $this->input->post('post[jmlh_rw]'),
   		'jmlh_penduduk'=> $this->input->post('post[jmlh_penduduk]'),
   		'alamat_kantor'=> $this->input->post('post[alamat_kantor]'),
	 	);
    $this->db->insert('kelurahan_desa',$data);
	

	if($this->db->affected_rows()){

		$this->template->alert(
			' Data Kelurahan/Desa ditambahkan.', 
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

		return $this->db->get('kelurahan_desa')->row();
	}

	public function get_perangkat($param = 0)
	{

		$this->db->where('slug', $param);

		return $this->db->get('perangkat_kelurahan_desa')->result();
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
		    $nmfile = 'desa-'.date('YmdHis'); 
		    $config['upload_path'] = './assets/images/desa/';
		    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; 
		    $config['max_size'] = '40480';
		    $config['file_name'] = $nmfile; 
	     	$this->upload->initialize($config);
	     	if ($this->upload->do_upload('foto'))
			{ 
		       	$img = $this->upload->data();
	     	}
        }

    if (isset($_FILES['foto_kantor'])) 
	   {
	     	$create_tgl = date('Y-m-d H:i:s'); 
		    $this->load->library('upload');
		    $nmfile = 'desa-'.date('YmdHis'); 
		    $config['upload_path'] = './assets/images/desa/';
		    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; 
		    $config['max_size'] = '40480';
		    $config['file_name'] = $nmfile; 
	     	$this->upload->initialize($config);
	     	if ($this->upload->do_upload('foto_kantor'))
			{ 
		       	$img1 = $this->upload->data();
	     	}
        }

		$data  = array(
		'foto' => $img['file_name'],
		'foto_kantor' => $img1['file_name'],
		'uploaded' => $this->session->userdata('account_admin')->username,
		'dates' => date('Y-m-d H:i:s'),
		'status' => $akses,
		'slug' => url_title($this->input->post('post[nama_desa]'), 'dash', TRUE),
		'nama_desa' => $this->input->post('post[nama_desa]'),
   		'nama_kades' => $this->input->post('post[nama_kades]'),
   		'nip' => $this->input->post('post[nip]'),
   		'pangkat'=> $this->input->post('post[pangkat]'),
   		'jabatan'=> $this->input->post('post[jabatan]'),
   		'tmp_lahir'=> $this->input->post('post[tmp_lahir]'),
   		'tgl_lahir'=> $this->input->post('post[tgl_lahir]'),
   		'agama'=> $this->input->post('post[agama]'),
   		'hobbi'=> $this->input->post('post[hobbi]'),
   		'motto_hidup'=> $this->input->post('post[motto_hidup]'),
   		'alamat'=> $this->input->post('post[alamat]'),
   		'email_desa'=> $this->input->post('post[email_desa]'),
   		'alamat_website'=> $this->input->post('post[alamat_website]'),
   		'luas_wilayah'=> $this->input->post('post[luas_wilayah]'),
   		'jmlh_rt'=> $this->input->post('post[jmlh_rt]'),
   		'jmlh_rw'=> $this->input->post('post[jmlh_rw]'),
   		'jmlh_penduduk'=> $this->input->post('post[jmlh_penduduk]'),
   		'alamat_kantor'=> $this->input->post('post[alamat_kantor]'),
	 	);

		$img = $this->get($param);

		@unlink("assets/images/desa/{$img->foto}");

		@unlink("assets/images/desa/{$img->foto_kantor}");
		
		$this->db->update('kelurahan_desa', $data, array('id' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Data Kelurahan/Desa berhasil diubah.', 
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

		@unlink("assets/images/desa/{$img->foto}");

		@unlink("assets/images/desa/{$img->foto_kantor}");
		
		$this->db->delete('kelurahan_desa', array('id' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Data Kelurahan/Desa berhasil dihapus.', 
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

			$img = $this->get($value);

			@unlink("assets/images/desa/{$img->foto}");

			@unlink("assets/images/desa/{$img->foto_kantor}");

			$this->db->delete('kelurahan_desa', array('id' => $value));

			if($this->db->affected_rows())
			{
				$this->template->alert(
					' Data Kelurahan/Desa berhasil dihapus.', 
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
			$this->db->update('kelurahan_desa', $data, array('id' => $param));
		}
		else {
			$data = array(
				'status' => 'show',
				'uploaded' => $this->session->userdata('account_admin')->username,
				'dates' => date('Y-m-d H:i:s'),

			);
			$this->db->update('kelurahan_desa', $data, array('id' => $param));
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