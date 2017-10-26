<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdownload extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->slug_kat = '';
	}

	public function get_all($limit = 20, $offset = 0, $type = 'result')
	{	
		if($this->input->get('kategori') != '')
			$this->db->where('download_kategori.slug', $this->input->get('kategori'));	

		if($this->input->get('query') != '')
			$this->db->like('nama_data', $this->input->get('query'))
					 ->or_like('dates', $this->input->get('query'));

			$this->db->join('download', 'download_kategori.id = download.kategori', 'left');

			$this->db->where(array('download.status' => 'show'  ));		 

			$this->db->order_by('download.id', 'DESC');

		if($type == 'result')
		{
			return $this->db->get('download_kategori', $limit, $offset)->result();
		} else {
			return $this->db->get('download_kategori')->num_rows();
		}
	}

	public function get_detail($slug= '') 
	{
      		$query = $this->db->join('tb_aparatur', 'tb_sosial_camat.id_camat_sosial = tb_aparatur.id_camat', 'left');

      		$query = $this->db->where(array('tb_aparatur.slug' => $slug  ));	

			$query = $this->db->where(array('tb_aparatur.status' => 'show'  ));		 

			$query = $this->db->order_by('tb_aparatur.id_camat', 'DESC');		
			 
			$query = $this->db->get('tb_sosial_camat')->row();

			if ($query == true) {
				return $query;
			} else {
				$this->template->alert(
                'Data tidak ditemukan.', 
                array('type' => 'danger','icon' => 'check'));
				redirect(base_url('aparatur'),'refresh');
			}
    }

   

    public function uphit($param)
	{	
		$hit = $this->get_detail($param);

		$plus = $hit->hits + 1;

		$object = array('hits' => $plus );
		$this->db->update('tb_aparatur', $object, array('slug' => $param));
	}

	
}