<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* SIPATEN
* Main Class 
*
* @version 1.0.0
* @author Vicky Nitinegoro <pkpvicky@gmail.com>
*/

class Main extends Sipaten 
{
	public $data = array();

	public function __construct()
	{
		parent::__construct();

		$this->load->js(base_url('public/app/dashboard.js'));
		$this->load->js(base_url('public/app/tour/dashboard-tour.js'));
	}

	public function index()
	{
		$this->page_title->push('Dashboard', 'Selamat datang di Administrator');

		$this->data = array(
			'title' => "Main Dashboard", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
		);
		$this->template->view('main-dashboard', $this->data);
	}

	public function test()
	{
		echo $this->permission->is_groups(array('statistik_penduduk', 'statistik_surat_non_perizinan','statistik_surat_perizinan','statistik_pelayanan'));
	}


}

/* End of file Main.php */
/* Location: ./application/controllers/Main.php */