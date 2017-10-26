<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Morganisasi extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function get_all()
	{		
		$this->db->where('id', 1);
		return $this->db->get('organisasi')->row();
	}

	public function uphit($param)
	{	
		$hit = $this->get_all();

		$plus = $hit->hits + 1;

		$object = array('hits' => $plus );
		$this->db->update('organisasi', $object, array('id' => $param));
	}
	
	

}

/* End of file Organisasi.php */
/* Location: ./application/models/Organisasi.php */