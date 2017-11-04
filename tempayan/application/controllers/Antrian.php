<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Antrian extends Sipaten {

	public $data = array();

	public $per_page;

	public $page = 20;

	public $query;

	public $status;

	public $start;

	public $end;


	public function __construct()
	{
		parent::__construct();

		$this->load->model('mantrian','antrian');

		$this->per_page = (!$this->input->get('per_page')) ? 20: $this->input->get('per_page');

		$this->page = $this->input->get('page');

		$this->query = $this->input->get('query');

		$this->load->js(base_url('public/app/kiosk/responsivevoice.js'));
		
	}

	public function index()
	{
		$this->page_title->push('Antrian', 'Rekap Antrian');

		$this->breadcrumbs->unshift(2, 'Antrian ', "antrian");

		$config = $this->template->pagination_list();

		$config['base_url'] = site_url("antrian?per_page={$this->per_page}&query={$this->query}&status={$this->status}&start={$this->start}&end={$this->end}");

		$config['per_page'] = $this->per_page;

		$config['total_rows'] = $this->antrian->get_all(null, null, 'num');

		$this->pagination->initialize($config);

		$this->data = array(
			'title' => "Rekap Antrian", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'antrian' => $this->antrian->get_all($this->per_page, $this->page),
			'num_antrian' => $config['total_rows']
		);

		$this->template->view('antrian/vantrian', $this->data);
	}

	public function today()
	{
		$this->page_title->push('Antrian', 'Antrian Hari ini');

		$this->breadcrumbs->unshift(2, 'Antrian ', "antrian/today");

		$config = $this->template->pagination_list();

		$config['base_url'] = site_url("antrian/today?per_page={$this->per_page}&query={$this->query}&status={$this->status}&start={$this->start}&end={$this->end}");

		$config['per_page'] = $this->per_page;

		$config['total_rows'] = $this->antrian->get_today(null, null, 'num');

		$this->pagination->initialize($config);

		$this->data = array(
			'title' => "Daftar Antrian Hari ini", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'antrian' => $this->antrian->get_today($this->per_page, $this->page),
			'num_antrian' => $config['total_rows'],
			'count' => $this->antrian->count(),
			'count_sisa' => $this->antrian->count_sisa()
		);

		$this->template->view('antrian/vantrian_today', $this->data);
	}

	public function update_petugas($id = 0)
	{
		$this->antrian->update_petugas($id);

		redirect('antrian/today');
	}

	public function selesai($id = 0)
	{
		$this->antrian->selesai($id);

		redirect('antrian/today');
	}

}

/* End of file Antrian.php */
/* Location: ./application/controllers/Antrian.php */