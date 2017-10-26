<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* SIPATEN
* Statistik Surat Class 
*
* @version 1.0.0
* @author Vicky Nitinegoro <pkpvicky@gmail.com>
*/

class Surat_stats extends Sipaten 
{
	public $start_date;

	public $end_date;

	public function __construct()
	{
		parent::__construct();
		
		$this->start_date = $this->input->get('start');

		$this->end_date = $this->input->get('end');

		$this->breadcrumbs->unshift(1, 'Statistik', "surat_stats");

		$this->load->model('msurat_stats','stats');

		$this->load->model('mpenilaian','penilaian');
	}

	public function index()
	{
		$this->page_title->push('Statistik', 'Surat Non Perizinan');

		$this->breadcrumbs->unshift(2, 'Surat Non Perizinan', "surat_stats");

		$this->data = array(
			'title' => "Surat Non Perizinan", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
		);

		$this->template->view('surat-stats/non_perizinan', $this->data);
	}

	public function perizinan()
	{
		$this->page_title->push('Statistik', 'Surat Perizinan');

		$this->breadcrumbs->unshift(2, 'Surat Perizinan', "surat_stats/perizinan");

		$this->data = array(
			'title' => "Surat Perizinan", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
		);
		
		$this->template->view('surat-stats/perizinan', $this->data);
	}

	public function service()
	{
		$this->page_title->push('Statistik', 'Penilaian Pelayanan');

		$this->breadcrumbs->unshift(2, 'Penilaian Pelayanan', "surat_stats/perizinan");

		$this->data = array(
			'title' => "Penilaian Pelayanan", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
		);
		
		$this->template->view('surat-stats/service', $this->data);
	}

	public function kepuasan()
	{
		$this->page_title->push('Statistik', 'Indeks Kepuasan Masyarakat');

		$this->breadcrumbs->unshift(2, 'Indeks Kepuasan Masyarakat', "surat_stats/perizinan");

		$this->data = array(
			'title' => "Indeks Kepuasan Masyarakat", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
		);
		
		$this->template->view('surat-stats/indeks-kepuasan', $this->data);
	}
}

/* End of file Surat_stats.php */
/* Location: ./application/controllers/Surat_stats.php */