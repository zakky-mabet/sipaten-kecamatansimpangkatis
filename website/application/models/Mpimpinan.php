<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpimpinan extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->slug_kat = '';
	}

	public function get_all($limit = 20, $offset = 0, $type = 'result')
	{		

		if($this->input->get('query') != '')
			$this->db->like('nama_lengkap', $this->input->get('query'))
					 ->or_like('nip', $this->input->get('query'))
					 ->or_like('periode', $this->input->get('query'));

			$this->db->select('*');

			$this->db->where(array('status' => 'show'  ));		 

			$this->db->order_by('id_camat', 'DESC');

		if($type == 'result')
		{
			return $this->db->get('tb_camat', $limit, $offset)->result();
		} else {
			return $this->db->get('tb_camat')->num_rows();
		}
	}

	public function get_detail($slug= '') 
	{
      		$query = $this->db->select('*');

      		$query = $this->db->where(array('slug' => $slug  ));	

			$query = $this->db->where(array('status' => 'show'  ));		 

			$query = $this->db->order_by('id_camat', 'DESC');		
			 
			$query = $this->db->get('tb_camat')->row();

			if ($query == true) {
				return $query;
			} else {
				$this->template->alert(
                'Data tidak ditemukan.', 
                array('type' => 'danger','icon' => 'check'));
				redirect(base_url('pimpinan'),'refresh');
			}
    }

    public function get_pimpinan() 
	{
      		$query = $this->db->select('*');

			$query = $this->db->where(array('status' => 'show'  ));		 

			$query = $this->db->order_by('id_camat', 'DESC');	

			$query = $this->db->limit(4);	
			 
			$query = $this->db->get('tb_camat')->result();

			if ($query == true) {
				return $query;
			} else {
				$this->template->alert(
                'Data tidak ditemukan.', 
                array('type' => 'danger','icon' => 'check'));
				redirect(base_url('pimpinan'),'refresh');
			}
    } 

    public function uphit($param)
	{	
		$hit = $this->get_detail($param);

		$plus = $hit->hits + 1;

		$object = array('hits' => $plus );
		$this->db->update('tb_camat', $object, array('slug' => $param));
	}

	
}