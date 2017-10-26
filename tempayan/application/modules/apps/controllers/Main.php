<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends Apps 
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('msurat_stats','stats');

		$this->load->model('mpenilaian', 'penilaian');

		$this->load->model('mnotification', 'notif');

		$this->load->js(base_url('public/plugins/heightchart/highcharts.js'));
		$this->load->js(base_url('public/plugins/heightchart/modules/exporting.js'));
		$this->load->js(base_url('public/plugins/heightchart/modules/data.js'));
		$this->load->js(base_url('public/plugins/heightchart/modules/drilldown.js'));
	}

	public function index()
	{
		$this->data = array(
			'title' => "Dashboard"
		);

		$this->load->view('main-index', $this->data);
	}
}

/* End of file Main.php */
/* Location: ./application/modules/apps/controllers/Main.php */