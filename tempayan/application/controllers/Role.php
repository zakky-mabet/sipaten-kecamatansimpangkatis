<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* SIPATEN
* Seeting Class 
*
* @version 1.0.0
* @author Vicky Nitinegoro <pkpvicky@gmail.com>
*/

class Role extends Sipaten 
{
	public $myaccount;

	public function __construct()
	{
		parent::__construct();
		
		$this->breadcrumbs->unshift(1, 'Pengaturan', "role");

		$this->myaccount = $this->session->userdata('ID');

		$this->load->model('mrole', 'role');

		$this->load->js(base_url('public/app/role.js'));
	}

	public function index()
	{
		$this->breadcrumbs->unshift(2, 'Pengaturan Hak Akses Pengguna', "role");
		$this->page_title->push('Pengaturan', 'Pengaturan Hak Akses Pengguna');

		$this->data = array(
			'title' => "Pengaturan Hak Akses Pengguna", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show()
		);

		$this->template->view('setting/data-role', $this->data);
	}

	public function create()
	{
		if($this->role->get_role() <= 10)
			show_404();

		$this->breadcrumbs->unshift(2, 'Pengaturan Hak Akses Pengguna', "role");
		$this->page_title->push('Pengaturan', 'Pengaturan Hak Akses Pengguna');

		$this->form_validation->set_rules('name', 'Nama Grup', 'trim|required');
		$this->form_validation->set_rules('description', 'Deskripsi', 'trim');

		if ($this->form_validation->run() == TRUE)
		{
			$this->role->create();

			redirect(current_url());
		}

		$this->data = array(
			'title' => "Tambah Hak Akses Pengguna", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show()
		);

		$this->template->view('setting/create-role', $this->data);		
	}

	public function update($param = 0)
	{
		$this->breadcrumbs->unshift(2, 'Pengaturan Hak Akses Pengguna', "role");
		$this->page_title->push('Pengaturan', 'Pengaturan Hak Akses Pengguna');

		$this->form_validation->set_rules('name', 'Nama Grup', 'trim|required');
		$this->form_validation->set_rules('description', 'Deskripsi', 'trim');

		if ($this->form_validation->run() == TRUE)
		{
			$this->role->update($param);

			redirect(current_url());
		}

		$this->data = array(
			'title' => "Sunting Hak Akses Pengguna", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'get' => $this->role->get_role($param)
		);

		$this->template->view('setting/update-role', $this->data);		
	}

	public function delete($param = 0)
	{
		$this->role->delete($param);

		redirect('role');
	}
}

/* End of file Role.php */
/* Location: ./application/controllers/Role.php */