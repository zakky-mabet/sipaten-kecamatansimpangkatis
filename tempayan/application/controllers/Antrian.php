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
		
	}

	public function index()
	{
		$this->page_title->push('Antrian', 'Daftar Antrian');

		$this->breadcrumbs->unshift(2, 'Antrian ', "antrian");

		$config = $this->template->pagination_list();

		$config['base_url'] = site_url("antrian?per_page={$this->per_page}&query={$this->query}&status={$this->status}&start={$this->start}&end={$this->end}");

		$config['per_page'] = $this->per_page;

		$config['total_rows'] = $this->antrian->get_all(null, null, 'num');

		$this->pagination->initialize($config);

		$this->data = array(
			'title' => "Daftar Antrian", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'antrian' => $this->antrian->get_all($this->per_page, $this->page),
			'num_antrian' => $config['total_rows']
		);

		$this->template->view('antrian/vantrian', $this->data);
	}

}

/* End of file Antrian.php */
/* Location: ./application/controllers/Antrian.php */