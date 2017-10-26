<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Malbum extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->slug_kat = '';
	}

	public function get_all($limit = 20, $offset = 0, $type = 'result')
	{		

		if($this->input->get('query') != '')
			$this->db->like('title', $this->input->get('query'))
					 ->or_like('dates', $this->input->get('query'))
					 ->or_like('uploaded', $this->input->get('query'));

			$this->db->where(array('status' => 'show'  ));		 

			$this->db->order_by('id', 'DESC');		 
		if($type == 'result')
		{
			return $this->db->get('tb_album_galeri', $limit, $offset)->result();
		} else {
			return $this->db->get('tb_album_galeri')->num_rows();
		}
	}


	public function get_detail($slug= '') 
	{
      $array = array('id_album_galeri' => $slug);

      $this->db->where($array);

      $equipid = $this->db->get('tb_galeri');

      return $equipid->result();
    } 

 //    public function uphit($param)
	// {	
	// 	$hit = $this->get_detail($param);

	// 	$plus = $hit->hits + 1;

	// 	$object = array('hits' => $plus );

	// 	$this->db->update('tb_album_galeri', $object, array('id' => $param));
	// }

	
}