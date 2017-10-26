<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 *
 * @package model universe
 * @author Teitra Mega Team <teitramega@gmail.com>
 **/
class M_profil extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
		
	 function get_profil(){
    	$id = $this->session->userdata('akun_id');
     	$query = $this->db->query("SELECT * FROM tb_users WHERE ID_users='$id' ORDER BY ID DESC");
		return $query->result();
    }
}

/* End of file M_profil.php */
/* Location: ./application/models/M_profil.php */