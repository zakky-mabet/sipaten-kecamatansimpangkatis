<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mwidget_organisasi extends CI_Model {

	public function get(){
		$query = $this->db->query("SELECT title,descriptions,icon,link FROM widget_organisasi WHERE status ='show' ORDER BY id ASC");
		return $query->result();
		}

	public function get_org($value=''){
		if(is_string($value)) {
			$query = $this->db->query("SELECT id,title,foto,uploaded,dates,hits FROM organisasi WHERE id = ?", array($value));
			if(!$query->num_rows())
				return false;
				return $query->row()->value;
			} 
		else 
			{
				return false;
			}
		}

}

/* End of file Mwidget_organisasi.php */
/* Location: ./application/models/Mwidget_organisasi.php */