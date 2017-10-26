<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Customer Satisfaction
 * 
 * @author Vicky Nitinegoro <pkpvicky@gmail.com>
 **/

class Satisfaction extends CI_Controller 
{
	public $data = array();

	public function __construct()
	{
		parent::__construct();

		$this->load->model('mpenilaian', 'penilaian');
		
		$this->data = array('title' => "Customer Satisfaction");	
	}

	public function index()
	{
		$this->load->view('vsatisfaction', $this->data);
	}

	public function create()
	{
		$this->penilaian->create();

		$this->output->set_content_type('application/json')->set_output(json_encode(array('status' => TRUE)));
	}

	public function get_people_in_day()
	{
		$data = "";
		foreach($this->penilaian->get_people_in_day() as $row) 
		{
			$data .= "<li data-people='{$row->ID}' data-name='{$row->nama_lengkap}' data-service='{$row->nama_kategori}'>";
			$data .= "<span>{$row->nama_lengkap}</span><br><small>--- <i class='fa fa-file-text'></i> {$row->nama_kategori}</small>";
			$data .= "</li>";
		}

		echo $data;
	}
}

/* End of file Satisfaction.php */
/* Location: ./application/modules/satisfaction/controllers/Satisfaction.php */
