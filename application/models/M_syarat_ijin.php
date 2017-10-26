<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 *
 * @package model universe
 * @author Teitra Mega Team <teitramega@gmail.com>
 **/
class M_syarat_ijin extends CI_Model {
	
	public function all()
	{
		$query = $this->db->query("SELECT * FROM tb_syarat_ijin WHERE status='ya' ORDER BY id ASC");
		return $query->row();
	}



}

/* End of file m_syarat_ijin.php */
/* Location: ./application/models/m_syarat_ijin.php */