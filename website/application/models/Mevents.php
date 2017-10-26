<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mevents extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function events_list()
	{
		$this->db->where(array('status' => 'show'  ));

		$this->db->order_by('id', 'DESC');

		$this->db->limit(10);  

		return $this->db->get('events')->result();	
	}

	public function get_all($limit = 20, $offset = 0, $type = 'result')
	{		
		if($this->input->get('kategori') != '')
			$this->db->where('kategori', $this->input->get('kategori'));

		if($this->input->get('query') != '')
			$this->db->like('title', $this->input->get('query'))
					 ->or_like('short_descriptions', $this->input->get('query'))
					 ->or_like('descriptions', $this->input->get('query'))
					 ->or_like('uploaded', $this->input->get('query'))
					 ->or_like('kategori', $this->input->get('query'));

			$this->db->join('kategori', 'events.kategori = kategori.id_kat', 'left');

			$this->db->where(array('status' => 'show'  ));		 

			$this->db->order_by('id', 'DESC');		
			 
		if($type == 'result')
		{
			return $this->db->get('events', $limit, $offset)->result();
		} else {
			return $this->db->get('events')->num_rows();
		}
	}

    public function get_all_kat($slug_kat = '')
	{		
				
			$this->db->where(array('kategori' =>  $slug_kat , 'status' => 'show'  ));	

			$this->db->order_by('id', 'DESC');		 

			return $this->db->get('events')->result();
		

	}

	public function get_all_tags($slug_kat = '')
	{		
			$this->db->where(array('status' => 'show'  ));	

			$this->db->like('tags', $slug_kat);

			$this->db->order_by('id', 'DESC');		 

			return $this->db->get('events')->result();
		
	}

	public function events_slide()
	{	
		$this->db->where(array('status' => 'show'  ));

		$this->db->order_by('id', 'DESC');
		
		return $this->db->get('events')->result();
	}
	
	public function events_lists()
	{
		$this->db->where(array('status' => 'show'  ));

		$this->db->order_by('id', 'DESC');

		$this->db->limit(4);  

		return $this->db->get('events')->result();	
	}

	public function events_populer()
	{
		$this->db->where(array('status' => 'show'));

		$this->db->order_by('hits', 'DESC');

		$this->db->limit(3);  

		return $this->db->get('events')->result();	
	}

	public function get_detail($slug= '') 
	{
      $array = array('slug' => $slug);

      $this->db->where($array);

      $equipid = $this->db->get('events');

      return $equipid->row();
    } 

    public function uphit($param)
	{	
		$hit = $this->get_detail($param);

		$plus = $hit->hits + 1;

		$object = array('hits' => $plus );
		$this->db->update('events', $object, array('slug' => $param));
	}

	public function get_kategori()
	{
		$this->db->select('id_kat,nama,slug_kat');

		$this->db->order_by('id_kat', 'desc');
		
		return $this->db->get('kategori')->result();
	}

	public function get_tags()
	{
		$this->db->select('id,nama,slug');

		$this->db->order_by('id', 'desc');
		
		return $this->db->get('tags')->result();
	}

	public function get_tag_where($slug)
	{
		$this->db->select('id,nama,slug');
		
		$potong = explode(',', $slug);
		foreach ($potong as $key => $value) {
			$this->db->or_where('id', $value);
		}

		$this->db->order_by('id', 'desc');
		
		return $this->db->get('tags')->result();
	}

	// public function get_komentar($param)
	// {
	// 	$this->db->select('nama,komentar,dates,');
		
	// 	$array = array('id_events' => $param , 'status' => 'show');

 //      	$this->db->where($array);
		
	// 	$this->db->order_by('id', 'asc');
		
	// 	return $this->db->get('komentar_events')->result();
	// }


}

/* End of file Mevents.php */
/* Location: ./application/models/Mevents.php */