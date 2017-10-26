<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userguide extends Sipaten 
{
	/**
	 * Halaman Panduan Sistem Berupa HTML Manual
	 *
	 **/
	public $data = array();

	public $method;

	public function __construct()
	{
		parent::__construct();

        $ci    =& get_instance();

        $this->method = $ci->router->fetch_method();

		$this->breadcrumbs->unshift(1, 'Panduan Sistem', "userguide");

		$this->load->js("https://cdn.rawgit.com/showdownjs/showdown/1.7.1/dist/showdown.min.js");
		$this->load->js(base_url('public/app/realease.js'));
	}

	public function index()
	{
		$this->page_title->push('Panduan Sistem', '');

		$this->data = array(
			'title' => "Panduan Sistem",
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show()
		);

		$this->template->view("userguide/index", $this->data);
	}

	public function read($param = '')
	{ 
		if($param == '')
			show_404();

		$this->page_title->push('Panduan Sistem', '');

		$this->data = array(
			'title' => "Panduan Sistem",
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show()
		);

		$this->template->view("userguide/{$param}", $this->data);
	}

	public function tutorial($param = '')
	{ 
		if($param == '')
			show_404();

		$this->page_title->push('Panduan Sistem', '');

		$this->data = array(
			'title' => "Panduan Sistem",
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
		);

		$this->template->view("userguide/tutorial/{$param}", $this->data);
	}	

	public function release()
	{
		$this->page_title->push('Panduan Sistem', 'Keterangan Rilis');

		$this->data = array(
			'title' => "Panduan Sistem",
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
		);

		$this->template->view("userguide/release", $this->data);
	}

}

/* End of file Userguide.php */
/* Location: ./application/controllers/Userguide.php */