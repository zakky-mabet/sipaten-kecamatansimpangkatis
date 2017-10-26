<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 *
 * @package model universe
 * @author Teitra Mega Team <teitramega@gmail.com>
 **/

class Agama extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->akun = $this->session->userdata('akun_id');
	}
	public function get_all_agama()
	{
		$this->db->select('*');
		$this->db->from('master_agama');
		$query = $this->db->get()->result();
		return $query;
	}

}

/* End of file Agama.php */
/* Location: ./application/models/Agama.php */