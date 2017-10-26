<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* SIMPATEN
* User Class 
*
* @version 1.0.0
* @author Vicky Nitinegoro <pkpvicky@gmail.com>
*/

class User extends Sipaten 
{
	public $data = array();

	public $per_page;

	public $page = 20;

	public $query;

	public function __construct()
	{
		parent::__construct();

		$this->breadcrumbs->unshift(1, 'Pengguna', "user");

		$this->load->model('muser','user');

		$this->per_page = (!$this->input->get('per_page')) ? 20: $this->input->get('per_page');

		$this->page = $this->input->get('page');

		$this->query = $this->input->get('query');

		$this->load->js(base_url('public/app/user.js'));
	}

	public function index()
	{
		$this->page_title->push('Pengguna', 'Data Pengguna');

		$config = $this->template->pagination_list();

		$config['base_url'] = site_url("user?per_page={$this->per_page}&query={$this->query}");

		$config['per_page'] = $this->per_page;
		$config['total_rows'] = $this->user->get_all(null, null, 'num');

		$this->pagination->initialize($config);

		$this->data = array(
			'title' => "Data Pengguna", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'users' => $this->user->get_all($this->per_page, $this->page),
			'num_users' => $config['total_rows']
		);
		$this->template->view('user/data-user', $this->data);
	}

	public function create()
	{
		$this->page_title->push('Pengguna', 'Tambah Pengguna');
		$this->breadcrumbs->unshift(2, 'Tambah', "user/create");

		$this->form_validation->set_rules('nip', 'NIK', 'trim|callback_validate_nip|required');
		$this->form_validation->set_rules('name', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('email', 'E-Mail', 'trim|valid_email|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]|max_length[12]|required');
		$this->form_validation->set_rules('repeat_pass', 'Ulangi Password', 'trim|matches[password]|required');
		$this->form_validation->set_rules('role', 'Level Akses', 'trim|required');

		if ($this->form_validation->run() == TRUE)
		{
			$this->user->create();

			redirect(current_url());
		}

		$this->data = array(
			'title' => "Tambah Pengguna", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'roles' => $this->user->get_role()
		);

		$this->template->view('user/create-user', $this->data);
	}

	public function update($param = 0)
	{
		$this->page_title->push('Pengguna', 'Sunting Pengguna');
		$this->breadcrumbs->unshift(2, 'Sunting', "user/create");

		$this->form_validation->set_rules('nip', 'NIK', 'trim|callback_validate_nip|required');
		$this->form_validation->set_rules('name', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		$this->form_validation->set_rules('role', 'Level Akses', 'trim|required');

		if ($this->form_validation->run() == TRUE)
		{
			$this->user->update($param);
		}

		$this->data = array(
			'title' => "Sunting Pengguna", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'roles' => $this->user->get_role(),
			'get' => $this->user->get($param)
		);

		$this->template->view('user/update-user', $this->data);
	}

	public function delete($param = 0)
	{
		$this->user->delete($param);

		redirect('user');
	}

	/**
	 * Action Multiple User
	 *
	 * @return string
	 **/
	public function bulk_action()
	{
		switch ($this->input->post('action')) 
		{
			case 'delete':
				$this->user->delete_multiple();
				break;
			
			default:
				$this->template->alert(
					' Tidak ada data yang dipilih.', 
					array('type' => 'warning','icon' => 'warning')
				);
				break;
		}

		redirect('user');
	}

	/**
	 * Check Ketersediaan NIK
	 *
	 * @return string
	 **/
	public function validate_nip()
	{
		if($this->user->nip_check($this->input->post('ID')) == TRUE)
		{
			$this->form_validation->set_message('validate_nip', 'Maaf NIK telah digunakan oleh Pengguna lain.');
			return false;
		} else {
			return true;
		}
	}

	/**
	 * Cek kebenaran password
	 *
	 * @return Boolean
	 **/
	public function validate_password()
	{
		if($this->input->post('old_pass') == $this->input->post('password'))
		{
			return true;
		} else {
			$this->form_validation->set_message('validate_password', 'Password lama anda tidak cocok!');
			return false;
		}
	}
}

/* End of file User.php */
/* Location: ./application/controllers/User.php */