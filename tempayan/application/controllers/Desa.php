<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* SIMPATEN
* People Class 
*
* @version 1.0.0
* @author Vicky Nitinegoro <pkpvicky@gmail.com>
*/

class Desa extends Sipaten 
{
	public $data = array();

	public $per_page;

	public $page = 20;

	public $query;

	public function __construct()
	{
		parent::__construct();

		$this->breadcrumbs->unshift(1, 'Master Data', "desa");

		$this->load->model('mdesa','desa');

		$this->load->model('mdesa_excel','desa_excel');

		$this->per_page = (!$this->input->get('per_page')) ? 20: $this->input->get('per_page');

		$this->page = $this->input->get('page');

		$this->query = $this->input->get('query');

		$this->load->js(base_url('public/app/desa.js'));
	}

	public function index()
	{
		$this->page_title->push('Master Data', 'Data Desa / Kelurahan');

		$this->breadcrumbs->unshift(2, 'Data Desa / Kelurahan', "desa");

		$config = $this->template->pagination_list();

		$config['base_url'] = site_url("desa?per_page={$this->per_page}&query={$this->query}");

		$config['per_page'] = $this->per_page;
		$config['total_rows'] = $this->desa->get_all(null, null, 'num');

		$this->pagination->initialize($config);

		$this->data = array(
			'title' => "Data Desa / Kelurahan", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'desa' => $this->desa->get_all($this->per_page, $this->page),
			'num_desa' => $config['total_rows']
		);

		$this->template->view('desa/data-desa', $this->data);
	}

	public function create()
	{
		$this->page_title->push('Master Data', 'Tambah Data Desa');

		$this->breadcrumbs->unshift(2, 'Data Desa', "people");

		$this->form_validation->set_rules('desa', 'Desa / Kelurahan', 'trim|callback_validate_slug|required');
		$this->form_validation->set_rules('kepala_desa', 'Nama Kepala Desa', 'trim');

		if ($this->form_validation->run() == TRUE)
		{
			$this->desa->create();

			redirect(current_url());
		}

		$this->data = array(
			'title' => "Tambah Data Desa", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
		);

		$this->template->view('desa/create-desa', $this->data);
	}

	public function update($param = 0)
	{
		$this->page_title->push('Master Data', 'Sunting Data Desa');

		$this->breadcrumbs->unshift(2, 'Data Desa', "people");

		$this->form_validation->set_rules('desa', 'Desa / Kelurahan', 'trim|callback_validate_slug|required');
		$this->form_validation->set_rules('kepala_desa', 'Nama Kepala Desa', 'trim');

		if ($this->form_validation->run() == TRUE)
		{
			$this->desa->update($param);

			redirect(current_url());
		}

		$this->data = array(
			'title' => "Sunting Data Desa", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'get' => $this->desa->get($param)
		);

		$this->template->view('desa/update-desa', $this->data);
	}

	public function delete($param = 0)
	{
		$this->desa->delete($param);

		redirect('desa');
	}

	public function export()
	{
		$this->desa_excel->get();
	}

	public function bulk_action()
	{
		switch ($this->input->post('action')) 
		{
			case 'delete':
				$this->desa->delete_multiple();
				redirect('desa');
				break;
			case 'set_update':
				$this->set_update_multiple();
				break;
			case 'update':
				$this->desa->update_multiple();
				redirect('desa');
				break;
			default:
				$this->template->alert(
					' Tidak ada data yang dipilih.', 
					array('type' => 'warning','icon' => 'warning')
				);
				redirect('desa');
				break;
		}
	}

	/**
	 * Update Desa Multiple
	 *
	 **/
	private function set_update_multiple()
	{
		$this->page_title->push('Master Data', 'Sunting Data Desa');

		$this->breadcrumbs->unshift(2, 'Data Desa', "people");

		$this->data = array(
			'title' => "Sunting Data Desa", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
		);

		$this->template->view('desa/update-desa-multiple', $this->data);
	}

	public function import()
	{
		$this->page_title->push('Master Data', 'Impor Data Desa');

		$this->breadcrumbs->unshift(2, 'Data Desa', "desa");

		$this->data = array(
			'title' => "Impor Data Desa", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
		);

		$this->template->view('desa/import-desa', $this->data);
	}

	public function set_upload()
	{
		$this->desa_excel->upload();

		redirect('desa');
	}

	public function print_out()
	{
		$this->data = array(
			'title' => "Data Desa / Kelurahan", 
			'desa' => $this->desa->get_all($this->per_page, $this->page),
			'num_desa' => $this->desa->get_all(null, null, 'num')
		);

		$this->load->view('desa/print-desa', $this->data);
	}

	/**
	 * Check Ketersediaan NIK
	 *
	 * @return string
	 **/
	public function validate_slug()
	{
		if($this->desa->slug_check($this->input->post('ID')) == TRUE)
		{
			$this->form_validation->set_message('validate_slug', 'Maaf desa ini telah tersedia.');
			return false;
		} else {
			return true;
		}
	}
}

/* End of file Desa.php */
/* Location: ./application/controllers/Desa.php */