<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* SIPATEN
* Account Class 
*
* @version 1.0.0
* @author Vicky Nitinegoro <pkpvicky@gmail.com>
*/

class Account extends Sipaten 
{
	public $myaccount;

	public function __construct()
	{
		parent::__construct();
		
		$this->breadcrumbs->unshift(1, 'Akun', "user");

		$this->load->model('maccount', 'account');

		$this->load->model('muser','user');

		$this->myaccount = $this->session->userdata('ID');

		$this->load->js(base_url('public/app/tour/account-tour.js'));
	}

	public function index()
	{	
		$this->form_validation->set_rules('nip', 'NIK', 'trim|callback_validate_nip|required');
		$this->form_validation->set_rules('email', 'E-Mail', 'trim|valid_email|required');
		$this->form_validation->set_rules('name', 'Nama Pengguna', 'trim|required');
		$this->form_validation->set_rules('new_pass', 'Password Baru', 'trim|min_length[8]|max_length[12]');
		$this->form_validation->set_rules('repeat_pass', 'Ini', 'trim|matches[new_pass]');
		$this->form_validation->set_rules('old_pass', 'Password Lama', 'trim|required|callback_validate_password');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim');
		$this->form_validation->set_rules('phone', 'Nomor Telepon', 'trim');
		
		if (empty($_FILES['file_foto']['name']))
		{
		    $this->form_validation->set_rules('file_foto', 'Foto', 'trim');
		}

		if ($this->form_validation->run() == TRUE)
		{
			$this->account->change_password();

			redirect(current_url());
		}

		$this->page_title->push('Akun', 'Pengaturan Login');

		$this->data = array(
			'title' => "Data Pengguna", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'get' => $this->account->get()
		);

		$this->template->view('user/change-password', $this->data);
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
		$get = $this->account->get();

		if(password_verify($this->input->post('old_pass'), $get->password))
		{
			return true;
		} else {
			$this->form_validation->set_message('validate_password', 'Password lama anda tidak cocok!');
			return false;
		}
	}
}

/* End of file Account.php */
/* Location: ./application/controllers/Account.php */