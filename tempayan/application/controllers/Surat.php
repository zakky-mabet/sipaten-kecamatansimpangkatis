<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* SIMPATEN
* Surat Class 
*
* @version 1.0.0
* @author Vicky Nitinegoro <pkpvicky@gmail.com>
*/

class Surat extends Sipaten 
{
	public $data = array();

	public $per_page;

	public $page = 20;

	public $query;

	public function __construct()
	{
		parent::__construct();

		$this->breadcrumbs->unshift(1, 'Master Data', "surat");

		$this->load->model('msurat','surat');

		$this->per_page = (!$this->input->get('per_page')) ? 20: $this->input->get('per_page');

		$this->page = $this->input->get('page');

		$this->query = $this->input->get('query');

		$this->load->js(base_url('public/app/surat.js'));
	}

	public function index()
	{
		$this->page_title->push('Master Data', 'Manajemen Surat');

		$this->breadcrumbs->unshift(2, 'Manajemen Surat', "surat");

		$config = $this->template->pagination_list();

		$config['base_url'] = site_url("surat?per_page={$this->per_page}&query={$this->query}");

		$config['per_page'] = $this->per_page;
		$config['total_rows'] = $this->surat->get_all(null, null, 'num');

		$this->pagination->initialize($config);

		$this->data = array(
			'title' => "Data Desa / Kelurahan", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'surat' => $this->surat->get_all($this->per_page, $this->page),
			'num_surat' => $config['total_rows']
		);

		$this->template->view('surat/data-surat', $this->data);
	}

	public function create()
	{
		$this->page_title->push('Master Data', 'Tambah Data Jenis Surat');

		$this->breadcrumbs->unshift(2, 'Manajemen Surat', "surat");

		$this->form_validation->set_rules('kode_surat', 'Kode Surat', 'trim|required');
		$this->form_validation->set_rules('judul_surat', 'Judul Surat', 'trim|required');
		$this->form_validation->set_rules('nama_surat', 'Desa / Kelurahan', 'trim|required');
		$this->form_validation->set_rules('kepala_desa', 'Nama Kepala Desa', 'trim');
		$this->form_validation->set_rules('jenis', 'Jenis Surat', 'trim|required');
		$this->form_validation->set_rules('durasi', 'Waktu Pelayanan', 'trim|required');

		if( $this->input->post('syarat') == FALSE ) 
			$this->form_validation->set_rules("syarat[]", 'Syarat', 'trim|required');

		if($this->form_validation->run() == TRUE)
		{
			$this->surat->create_category();

			redirect(current_url());
		}

		$this->data = array(
			'title' => "Tambah Data Jenis Surat", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'syarat' => $this->surat->get_syarat_surat()
		);

		$this->template->view('surat/create-surat', $this->data);
	}

	public function update($param = 0)
	{
		$this->page_title->push('Master Data', 'Sunting Data Jenis Surat');

		$this->breadcrumbs->unshift(2, 'Manajemen Surat', "surat");

		$this->form_validation->set_rules('kode_surat', 'Kode Surat', 'trim|required');
		$this->form_validation->set_rules('judul_surat', 'Judul Surat', 'trim|required');
		$this->form_validation->set_rules('nama_surat', 'Desa / Kelurahan', 'trim|required');
		$this->form_validation->set_rules('kepala_desa', 'Nama Kepala Desa', 'trim');
		$this->form_validation->set_rules('jenis', 'Jenis Surat', 'trim|required');
		$this->form_validation->set_rules('durasi', 'Waktu Pelayanan', 'trim|required');

		if( $this->input->post('syarat') == FALSE ) 
			$this->form_validation->set_rules("syarat[]", 'Syarat', 'trim|required');

		if($this->form_validation->run() == TRUE)
		{
			$this->surat->update_category($param);

			redirect(current_url());
		}

		$this->data = array(
			'title' => "Sunting Data Jenis Surat", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'syarat' => $this->surat->get_syarat_surat(),
			'get' => $this->surat->get($param)
		);

		$this->template->view('surat/update-surat', $this->data);
	}

	public function delete($param = 0)
	{
		$this->surat->delete($param);

		redirect('surat');
	}

	public function bulk_action()
	{
		switch ($this->input->post('action')) 
		{
			case 'delete':
				$this->surat->delete_multiple();
				break;
			
			default:
				$this->template->alert(
					' Tidak ada data yang dipilih.', 
					array('type' => 'warning','icon' => 'warning')
				);
				break;
		}

		redirect('surat');
	}

	/**
	 * Check Ketersediaan Kode Surat
	 *
	 * @param Integer (ID)
	 * @return string
	 **/
	public function validate_kode()
	{
		if($this->surat->kode_check($this->input->post('ID')) == TRUE)
		{
			$this->form_validation->set_message('validate_kode', 'Maaf Kode Surat ini telah digunakan.');
			return false;
		} else {
			return true;
		}
	}
}

/* End of file Surat.php */
/* Location: ./application/controllers/Surat.php */