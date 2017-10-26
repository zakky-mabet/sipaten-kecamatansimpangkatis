<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* SIMPATEN
* Pegawai Class 
*
* @version 1.0.0
* @author Vicky Nitinegoro <pkpvicky@gmail.com>
*/

class Employee extends Sipaten 
{
	public $data = array();

	public $per_page;

	public $page = 20;

	public $gender;

	public $query;

	public function __construct()
	{
		parent::__construct();

		$this->breadcrumbs->unshift(1, 'Master Data', "employee");

		$this->load->model('memployee','employee');

		$this->load->model('memployee_excel', 'employee_excel');

		$this->per_page = (!$this->input->get('per_page')) ? 20: $this->input->get('per_page');

		$this->page = $this->input->get('page');

		$this->query = $this->input->get('query');

		$this->gender = $this->input->post('gender');

		$this->load->js(base_url('public/app/pegawai.js'));
	}

	public function index()
	{
		$this->page_title->push('Master Data', 'Data Kepegawaian');

		$this->breadcrumbs->unshift(2, 'Data Kepegawaian', "employee");

		$config = $this->template->pagination_list();

		$config['base_url'] = site_url("employee?per_page={$this->per_page}&query={$this->query}");

		$config['per_page'] = $this->per_page;
		$config['total_rows'] = $this->employee->get_all(null, null, 'num');

		$this->pagination->initialize($config);

		$this->data = array(
			'title' => "Data Data Kepegawaian", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'employee' => $this->employee->get_all($this->per_page, $this->page),
			'num_employee' => $config['total_rows']
		);

		$this->template->view('pegawai/data-pegawai', $this->data);
	}

	public function print_out()
	{
		$this->data = array(
			'title' => "Data Kepegawaian", 
			'employee' => $this->employee->get_all($this->per_page, $this->page),
			'num_employee' => $this->employee->get_all(null, null, 'num')
		);

		$this->load->view('pegawai/print-pegawai', $this->data);
	}

	public function create()
	{
		$this->page_title->push('Master Data', 'Tambah Data Kepegawaian');

		$this->breadcrumbs->unshift(2, 'Data Kepegawaian', "employee");

		$this->form_validation->set_rules('nip', 'NIP', 'trim|callback_validate_nip|required');
		$this->form_validation->set_rules('name', 'Nama', 'trim|required');
		$this->form_validation->set_rules('gender', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim');
		$this->form_validation->set_rules('telepon', 'Telepon', 'trim');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
		$this->form_validation->set_rules('pangkat', 'Pangkat', 'trim');

		if ($this->form_validation->run() == TRUE)
		{
			$this->employee->create();

			redirect(current_url());
		}

		$this->data = array(
			'title' => "Tambah Data Kepegawaian", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
		);

		$this->template->view('pegawai/create-pegawai', $this->data);
	}

	public function update($param = 0)
	{
		$this->page_title->push('Master Data', 'Sunting Data Kepegawaian');

		$this->breadcrumbs->unshift(2, 'Data Kepegawaian', "employee");

		$this->form_validation->set_rules('nip', 'NIP', 'trim|callback_validate_nip|required');
		$this->form_validation->set_rules('name', 'Nama', 'trim|required');
		$this->form_validation->set_rules('gender', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim');
		$this->form_validation->set_rules('telepon', 'Telepon', 'trim');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
		$this->form_validation->set_rules('pangkat', 'Pangkat', 'trim');

		if ($this->form_validation->run() == TRUE)
		{
			$this->employee->update($param);

			redirect(current_url());
		}

		$this->data = array(
			'title' => "Sunting Data Kepegawaian", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'get' => $this->employee->get($param)
		);

		$this->template->view('pegawai/update-pegawai', $this->data);
	}

	public function delete($param = 0)
	{
		$this->employee->delete($param);

		redirect('employee');
	}

	public function bulk_action()
	{
		switch ($this->input->post('action')) 
		{
			case 'delete':
				$this->employee->delete_multiple();
				break;
			
			default:
				$this->template->alert(
					' Tidak ada data yang dipilih.', 
					array('type' => 'warning','icon' => 'warning')
				);
				break;
		}

		redirect('employee');
	}

	public function import()
	{
		$this->page_title->push('Master Data', 'Impor Data Pegawai');

		$this->breadcrumbs->unshift(2, 'Data Pegawai', "employee");

		$this->data = array(
			'title' => "Impor Data Pegawai", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
		);

		$this->template->view('pegawai/import-pegawai', $this->data);
	}

	public function set_upload()
	{
		$this->employee_excel->upload();

		redirect('employee');
	}

	public function export()
	{
		$this->employee_excel->get();
	}

	/**
	 * Check Ketersediaan NIK
	 *
	 * @return string
	 **/
	public function validate_nip()
	{
		if($this->employee->nip_check($this->input->post('ID')) == TRUE)
		{
			$this->form_validation->set_message('validate_nip', 'Maaf NIP telah digunakan.');
			return false;
		} else {
			return true;
		}
	}

	/**
	 * Set Level Akses Pegawai
	 *
	 * @return Void
	 **/
	public function set_akses()
	{
		$this->employee->set_akses_employee();

		redirect('employee');
	}
}

/* End of file Employee.php */
/* Location: ./application/controllers/Employee.php */