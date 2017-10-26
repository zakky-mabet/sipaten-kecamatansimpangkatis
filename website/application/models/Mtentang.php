<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mtentang extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	public function get_detail($slug= '') 
	{
      	
      		$query = $this->db->where(array('slug' => $slug  ));	

			$query = $this->db->where(array('status' => 'show'  ));		 
			 
			$query = $this->db->get('tentangkami')->row();

			if ($query == true) {
				return $query;
			} else {
				$this->template->alert(
                'Data tidak ditemukan.', 
                array('type' => 'danger','icon' => 'check'));
				redirect(base_url('profil'),'refresh');
			}
    }


    public function uphit($param)
	{	
		$hit = $this->get_detail($param);

		$plus = $hit->hits + 1;

		$object = array('hits' => $plus );
		$this->db->update('tentangkami', $object, array('slug' => $param));
	}

	
}