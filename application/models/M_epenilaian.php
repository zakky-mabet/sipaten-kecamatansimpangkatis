<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 *
 * @package model universe
 * @author Teitra Mega Team <teitramega@gmail.com>
 **/
class M_epenilaian extends CI_Model {
	public function get_all()
	{
		$user = $this->session->userdata('akun_id');
		$query = $this->db->query("SELECT * FROM epenilaian WHERE kategori='epengaduan' AND ID_users='$user' ");
		return $query->result();
	}
	public function get_all_layanan()
	{
		$user = $this->session->userdata('akun_id');
		$query = $this->db->query("SELECT * FROM epenilaian WHERE kategori='epelayanan' AND ID_users='$user' ");
		return $query->result();
	}
	function get_nilai($param) {
    	$array = array('ID_penilaian' => $param , 'ID_users' => $this->session->userdata('akun_id'));
		$this->db->where($array);
		$equipid = $this->db->get('epenilaian');
		return $equipid->result();
    }

    public function up_nilai($data) {
    extract($data); 
   	$array = array('ID_penilaian' => $ID_penilaian );
	$this->db->where($array);
    $this->db->update($table, 
    	array(
    		'penilaian' => $penilaian,
    		'post_tgl' => $post_tgl,
    		'status_nilai' => 'yes'
    		));
    return;
	}
	function get_panduan(){
      $query = $this->db->query("SELECT * FROM panduan_penilaian");
      return $query->result();
    }

    function get_panduan_read($slug) {
      $array = array('slug' => $slug);
      $this->db->where($array);
      $equipid = $this->db->get('panduan_penilaian');
      return $equipid->result();
    }	

}

/* End of file M_epenilaian.php */
/* Location: ./application/models/M_epenilaian.php */
