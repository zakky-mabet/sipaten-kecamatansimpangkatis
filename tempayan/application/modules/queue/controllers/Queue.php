<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Customer Queue
 * 
 * @author Muhamad Zakky <muhamadzakky45@gmail.com | CV. TEITRAMEGA>
 **/

class Queue extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		
		$this->data = array('title' => "Customer Queue");	

		$this->load->helper('url');

		$null = array();

		$this->load->model('mantrian');
	}

	public function index()
	{
		$this->load->view('vqueue', $this->data);
	}

	public function get()
	{
		$this->mantrian->_get();

		redirect("queue");
	}

	
}

