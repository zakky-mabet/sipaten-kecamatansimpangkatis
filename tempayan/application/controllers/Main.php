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
		$this->load->library('firebase_push');
			
			$this->firebase_push->setTitle("Pengajuan Surat Baru!")
								->setMessage("Anda memiliki 1 dokumen dari ".$this->session->userdata('account')->name." untuk diperiksa.")
								->setID(1)
								->setTo("fpsK907dQ3E:APA91bE3uXBysbCuDDYYx6d3NKqD72jhzr-A_TlI6_qDCHRMqhZHbmN2_Qabq80bhlHU5hN0jbMj0j-oyj-x0StkWdtCRN268PBQVUYZfhEOKXOu8NAO0YBigMXNXBR9foh9-prmAkl3");

		echo "<pre>";
		print_r ($this->firebase_push->send());
		echo "</pre>";;
	}


}

/* End of file Main.php */
/* Location: ./application/controllers/Main.php */