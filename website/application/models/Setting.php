<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function get($value=''){
		if(is_string($value)) {
			$query = $this->db->query("SELECT value FROM settings WHERE name = ?", array($value));
			if(!$query->num_rows())
				return false;
				return $query->row()->value;
			} 
		else 
			{
				return false;
			}
		}

	public function sosial(){
		$query = $this->db->query("SELECT title,icon,class,link FROM media_sosial WHERE status ='show' ORDER BY id ASC");
		return $query->result();
		} 

	public function mitra(){
		$query = $this->db->query("SELECT title,img,link,uploaded,dates FROM mitra WHERE status ='show' ORDER BY id DESC");
		return $query->result();
		} 

	public function slider(){
		$query = $this->db->query("SELECT title,short_description,img,link,uploaded,dates FROM slider WHERE status ='show' ORDER BY id DESC");
		return $query->result();
		}

	public function foto_album(){
		$query = $this->db->query("SELECT id,title,cover,slug,uploaded,dates FROM tb_album_galeri WHERE status ='show' ORDER BY id DESC");
		return $query->result();
		}
	public function kategori(){
		$query = $this->db->query("SELECT id_kat,nama FROM kategori ");
		return $query->result();
		}

	public function tags(){
		$query = $this->db->query("SELECT id,nama FROM tags ");
		return $query->result();
		}

	public function album(){
		$query = $this->db->query("SELECT id,title,hits FROM tb_album_galeri ");
		return $query->result();
		}

	public function agama(){
		$query = $this->db->query("SELECT id,agama FROM master_agama ");
		return $query->result();
		}
	public function kategori_download(){
		$query = $this->db->query("SELECT id,nama_kategori FROM download_kategori ");
		return $query->result();
		}

	public function foto_footer() 
	{

			$query = $this->db->where(array('status' => 'show'  ));		 

			$query = $this->db->order_by('id', 'RANDOM');		
			
			$query = $this->db->limit(9);
			
			$query = $this->db->get('tb_galeri')->result();

			return $query;
    } 

	public function get_all_camat()
	{		

			$this->db->select('*');

			$this->db->where(array('status' => 'show'  ));		

			$this->db->limit(3); 

			$this->db->order_by('id_camat', 'DESC');		
			 
			return $this->db->get('tb_camat')->result();
	}

	public function menu_tentang_kami()
	{		
			$this->db->select('title, slug');

			$this->db->where(array('status' => 'show'  ));		 

			$this->db->order_by('id', 'ASC');		
			 
			return $this->db->get('tentangkami')->result();
	}

	public function menu_organisasi_kemasyarakatan()
	{		
			$this->db->select('title, slug');

			$this->db->where(array('status' => 'show'  ));		 

			$this->db->order_by('id', 'ASC');		
			 
			return $this->db->get('organisasi_kemasyarakatan')->result();
	}

	public function master_desa()
	{		
			$this->db->select('id, kelurahan_desa');

			$this->db->order_by('id', 'ASC');		
			 
			return $this->db->get('master_desa')->result();
	}

	public function max_data_pembangunan()
	{		
			$this->db->select_max('tahun');

			$this->db->from('data_pembangunan');

			$query=$this->db->get();

			return $query->row();	
	}

	public function min_data_pembangunan()
	{		
			$this->db->select_min('tahun');

			$this->db->from('data_pembangunan');

			$query=$this->db->get();

			return $query->row();	
	}

	public function menu_kelurahan_desa()
	{		
			$this->db->select('id,nama_desa, slug');

			$this->db->where(array('status' => 'show'  ));		 

			$this->db->order_by('id', 'ASC');		
			 
			return $this->db->get('kelurahan_desa')->result();
	}

	public function menu_data()
	{		
			$this->db->select('id,title, slug');

			$this->db->where(array('status' => 'show' ));		 

			$this->db->order_by('id', 'ASC');		
			 
			return $this->db->get('data')->result();
	}

	public function menu_download()
	{		
			$this->db->select('id,nama_kategori, slug');

			$this->db->where(array('status' => 'show' ));		 

			$this->db->order_by('id', 'ASC');		
			 
			return $this->db->get('download_kategori')->result();
	}

	public function create(){

	$data = array(
		'nama' => $this->input->post('nama'),
		'email' => $this->input->post('email'),
		'subject' => $this->input->post('subjek'),
		'message' => $this->input->post('pesan'),
		'dates' => date('Y-m-d H:i:s'),
		'status' => 'unread'
		);

	$this->db->insert('kontak_masuk', $data);

	if($this->db->affected_rows()){

		$this->template->alert(
			'Pesan telah dikirim.', 
			array('type' => 'success',
				'icon' => 'check')
			);
	} 
	else {
		$this->template->alert(
			'Gagal menyimpan data.', 
			array('type' => 'warning',
			'icon' => 'times'));
		}
	}

	public function update($name = '', $value = '')
	{
		if(is_string($name) OR $name != '')
		{
			$query = $this->db->query("UPDATE settings SET value = ? WHERE name = ?", array($value, $name));
		} 
		else {
			return false;
		}
	}

	public function get_admin($param = 0)
	{

		$this->db->where('id', $this->session->userdata('akun_id_admin'));

		return $this->db->get('tb_administrator')->row();
	}

}




/* End of file Setting.php */
/* Location: ./application/models/Setting.php */