<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* SIPATEN
* Stats_people Class 
*
* @version 1.0.0
* @author Vicky Nitinegoro <pkpvicky@gmail.com>
*/

class Stats_people extends Sipaten 
{
	public $data = array();

	public function __construct()
	{
		parent::__construct();
		
		$this->breadcrumbs->unshift(1, 'Statistik', "stats_people");

		$this->load->model('mstats_people', 'stats_people');

		$this->load->model('mexcel_kependudukan', 'excel_kependudukan');

		$this->load->js(base_url('public/app/statistik_penduduk.js'));
	}

	public function index()
	{
		$this->page_title->push('Statistik', 'Populasi Penduduk Desa');

		$this->breadcrumbs->unshift(2, 'Kependudukan', "stats_people");

		$this->data = array(
			'title' => "Populasi Penduduk Desa", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'desa' => $this->stats_people->get_desa(),
		);

		$this->template->view('statistik/people-population', $this->data);
	}

	public function print_out($param = '')
	{
		$this->data = array(
			'title' => "",
			'desa' => $this->stats_people->get_desa(),
			'status_kawin' => $this->stats_people->get_status_perkawinan(),
			'agama' => $this->stats_people->get_religion(),
			'gol_darah' => $this->stats_people->get_golongan_darah()
		);
		
		$this->load->view('statistik/print-kependudukan', $this->data);
	}

	public function export($param = 0)
	{
		switch ($param) 
		{
			case 'desa_population':
				$this->excel_kependudukan->desa();
				break;
			case 'gender_population':
				$this->excel_kependudukan->gender();
				break;
			case 'perkawinan_population':
				$this->excel_kependudukan->perkawinan();
				break;
			case 'agama':
				$this->excel_kependudukan->agama();
				break;
			case 'kewarganegaraan':
				$this->excel_kependudukan->kewarganegaraan();
				break;
			case 'gol_darah':
				$this->excel_kependudukan->gol_darah();
				break;
			default:
				# code...
				break;
		}
	}

	/**
	 * Get Data Population Penduduk Jenis Kelamin
	 **/
	public function gender()
	{
		$this->page_title->push('Statistik', 'Jenis Kelamin');

		$this->breadcrumbs->unshift(2, 'Kependudukan', "stats_people");

		$this->data = array(
			'title' => "Jenis Kelamin", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show()
		);

		$this->template->view('statistik/people-gender', $this->data);
	}

	/**
	 * Get Data Population Penduduk Status Perkawinan
	 **/
	public function status_kawin()
	{
		$this->page_title->push('Statistik', 'Status Perkawinan');

		$this->breadcrumbs->unshift(2, 'Kependudukan', "stats_people");

		$this->data = array(
			'title' => "Status Perkawinan", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'status_kawin' => $this->stats_people->get_status_perkawinan()
		);

		$this->template->view('statistik/people-status-kawin', $this->data);
	}

	/**
	 * Get Data Population Penduduk Agawa
	 **/
	public function religion()
	{
		$this->page_title->push('Statistik', 'Agama');

		$this->breadcrumbs->unshift(2, 'Kependudukan', "stats_people");

		$this->data = array(
			'title' => "Agama", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'agama' => $this->stats_people->get_religion()
		);

		$this->template->view('statistik/people-religion', $this->data);
	}

	/**
	 * Get Data Population Penduduk Warga Negara
	 **/
	public function warga_negara()
	{
		$this->page_title->push('Statistik', 'Kewarganegaraan');

		$this->breadcrumbs->unshift(2, 'Kependudukan', "stats_people");

		$this->data = array(
			'title' => "Kewarganegaraan", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show()
		);

		$this->template->view('statistik/people-warga-negara', $this->data);
	}

	/**
	 * Get Data Population Penduduk Golongan Darah
	 **/
	public function golongan_darah()
	{
		$this->page_title->push('Statistik', 'Golongan Darah');

		$this->breadcrumbs->unshift(2, 'Kependudukan', "stats_people");

		$this->data = array(
			'title' => "Golongan Darah", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'gol_darah' => $this->stats_people->get_golongan_darah()
		);

		$this->template->view('statistik/people-gol-darah', $this->data);
	}
}

/* End of file Stats_people.php */
/* Location: ./application/controllers/Stats_people.php */