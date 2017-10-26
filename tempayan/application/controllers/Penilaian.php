<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends Sipaten 
{
	public function __construct()
	{
		parent::__construct();
		
		$this->breadcrumbs->unshift(1, 'Menajemen Penilaian', "penilaian");

		$this->load->model('mpenilaian','penilaian');

		$this->load->js(base_url("public/plugins/artyom/artyom.min.js"));
		$this->load->js(base_url("public/app/penilaian.js?v1.0.1"));
	}

	public function index()
	{
		$this->page_title->push('Menajemen Penilaian', 'Administrator KIOSK Penilaian');

		if($this->input->post()) 
		{
			foreach($this->input->post('jawaban') as $key => $value)
				$this->form_validation->set_rules("jawaban[{$key}]", "Jawaban {$key}", 'trim|required');

			foreach($this->input->post('option') as $key => $value)
				$this->form_validation->set_rules("option[{$key}]", NULL, 'trim|required');
		}

		if ($this->form_validation->run() == TRUE)
		{
			$this->penilaian->save();

			redirect(current_url());
		} else 

		$this->data = array(
			'title' => "Menajemen Penilaian", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
		);

		$this->template->view('penilaian/index', $this->data);	
	}



}

/* End of file Penilaian.php */
/* Location: ./application/controllers/Penilaian.php */