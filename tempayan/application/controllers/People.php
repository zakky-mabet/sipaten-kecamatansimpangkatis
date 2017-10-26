<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* SIMPATEN
* People Class 
*
* @version 1.0.0
* @author Vicky Nitinegoro <pkpvicky@gmail.com>
*/

class People extends Sipaten 
{
	public $data = array();

	public $per_page;

	public $page = 20;

	public $desa;

	public $gender;

	public $query;

	public function __construct()
	{
		parent::__construct();

		$this->breadcrumbs->unshift(1, 'Master Data', "people");

		$this->load->model('mpeople','people');

		$this->load->model('mpeople_excel', 'people_excel');

		$this->per_page = (!$this->input->get('per_page')) ? 20: $this->input->get('per_page');

		$this->page = $this->input->get('page');

		$this->desa = $this->input->get('village');

		$this->gender = $this->input->get('gender');

		$this->query = $this->input->get('query');

		$this->load->js(base_url('public/app/people.js'));
	}

	public function index()
	{
		$this->page_title->push('Master Data', 'Data Penduduk');

		$this->breadcrumbs->unshift(2, 'Data Penduduk', "people");

		$config = $this->template->pagination_list();

		$config['base_url'] = site_url("people?per_page={$this->per_page}&query={$this->query}&village={$this->desa}&gender={$this->gender}");

		$config['per_page'] = $this->per_page;
		$config['total_rows'] = $this->people->get_all(null, null, 'num');

		$this->pagination->initialize($config);

		$this->data = array(
			'title' => "Data Penduduk", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'desa' => $this->people->get_desa(),
			'people' => $this->people->get_all($this->per_page, $this->page),
			'num_people' => $config['total_rows']
		);

		$this->template->view('people/data-people', $this->data);
	}

	public function print_out()
	{
		$this->data = array(
			'title' => "Data Penduduk", 
			'people' => $this->people->get_all($this->per_page, $this->page),
			'num_people' => $this->people->get_all(null, null, 'num')
		);

		$this->load->view('people/print-people', $this->data);
	}

	public function create()
	{
		$this->page_title->push('Master Data', 'Tambah Data Penduduk');

		$this->breadcrumbs->unshift(2, 'Data Penduduk', "people");

		$this->form_validation->set_rules('nik', 'NIK', 'trim|callback_validate_nik|required');
		$this->form_validation->set_rules('kk', 'No. KK', 'trim|required');
		$this->form_validation->set_rules('status_kk', 'Status Hubungan KK', 'trim|required');
		$this->form_validation->set_rules('name', 'Nama', 'trim|required');
		$this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('birts', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('gender', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
		$this->form_validation->set_rules('status_kawin', 'Status Perkawinan', 'trim|required');
		$this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraaan', 'trim|required');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required');
		$this->form_validation->set_rules('gol_darah', 'Golongan Darah', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('rt', 'RT', 'trim|is_numeric|required');
		$this->form_validation->set_rules('rw', 'RW', 'trim|is_numeric|required');
		$this->form_validation->set_rules('desa', 'Desa / Kelurahan', 'trim|required');
		$this->form_validation->set_rules('telepon', 'Telepon', 'trim');
		$this->form_validation->set_rules('kd_pos', 'Kode Pos', 'trim');

		if ($this->form_validation->run() == TRUE)
		{
			$this->people->create();

			redirect(current_url());
		}

		$this->data = array(
			'title' => "Tambah Data Penduduk", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'desa' => $this->people->get_desa()
		);

		$this->template->view('people/create-people', $this->data);
	}

	public function update($param = 0)
	{
		$this->page_title->push('Master Data', 'Sunting Data Penduduk');

		$this->breadcrumbs->unshift(2, 'Data Penduduk', "people");

		$this->form_validation->set_rules('nik', 'NIK', 'trim|callback_validate_nik|required');
		$this->form_validation->set_rules('kk', 'No. KK', 'trim|required');
		$this->form_validation->set_rules('status_kk', 'Status Hubungan KK', 'trim|required');
		$this->form_validation->set_rules('name', 'Nama', 'trim|required');
		$this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('birts', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('gender', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
		$this->form_validation->set_rules('status_kawin', 'Status Perkawinan', 'trim|required');
		$this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraaan', 'trim|required');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required');
		$this->form_validation->set_rules('gol_darah', 'Golongan Darah', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('rt', 'RT', 'trim|is_numeric|required');
		$this->form_validation->set_rules('rw', 'RW', 'trim|is_numeric|required');
		$this->form_validation->set_rules('desa', 'Desa / Kelurahan', 'trim|required');
		$this->form_validation->set_rules('telepon', 'Telepon', 'trim');
		$this->form_validation->set_rules('kd_pos', 'Kode Pos', 'trim');

		if ($this->form_validation->run() == TRUE)
		{
			$this->people->update($param);

			redirect(current_url());
		}

		$this->data = array(
			'title' => "Sunting Data Penduduk", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'desa' => $this->people->get_desa(),
			'people' => $this->people->get($param)
		);

		$this->template->view('people/update-people', $this->data);
	}

	public function delete($param = 0)
	{
		$this->people->delete($param);

		redirect('people');
	}

	public function bulk_action()
	{
		switch ($this->input->post('action')) 
		{
			case 'delete':
				$this->people->delete_multiple();
				break;
			
			default:
				$this->template->alert(
					' Tidak ada data yang dipilih.', 
					array('type' => 'warning','icon' => 'warning')
				);
				break;
		}

		redirect('people');
	}

	public function import()
	{
		$this->page_title->push('Master Data', 'Impor Data Penduduk');

		$this->breadcrumbs->unshift(2, 'Data Penduduk', "people");

		$this->data = array(
			'title' => "Impor Data Penduduk", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
		);

		$this->template->view('people/import-people', $this->data);
	}

	public function set_upload()
	{
		$this->people_excel->upload();

		redirect('people/import');
	}

	public function export()
	{
		$this->people_excel->get($this->input->get('per_page'), $this->input->get('page'));
	}

	/**
	 * Check Ketersediaan NIK
	 *
	 * @return string
	 **/
	public function validate_nik()
	{
		if($this->people->nik_check($this->input->post('ID')) == TRUE)
		{
			$this->form_validation->set_message('validate_nik', 'Maaf NIK ini telah digunakan.');
			return false;
		} else {
			return true;
		}
	}

	/**
	 * Get Data Penduduk 
	 *
	 * @param Integer (ID)
	 * @return string (JSON) 
	 **/
	public function getjson($param = 0)
	{
		$get = $this->people->get($param);

		$this->data = array(
			'id' => $get->ID,
			'nik' => $get->nik,
			'nama' => $get->nama_lengkap,
			'tmp_tgl_lahir' => $get->tmp_lahir.", ".date_id($get->tgl_lahir),
			'jns_kelamin' => strtoupper($get->jns_kelamin)
		);

		$this->output->set_content_type('application/json')->set_output(json_encode($this->data));
	}
}

/* End of file People.php */
/* Location: ./application/controllers/People.php */