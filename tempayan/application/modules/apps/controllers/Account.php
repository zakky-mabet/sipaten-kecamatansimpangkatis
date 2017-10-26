<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends Apps 
{
	public $userID;

	public function __construct()
	{
		parent::__construct();

		$this->load->model('muser', 'user');

		$this->userID = $this->session->userdata('ID');
	}

	public function index()
	{
		$this->data = array(
			'title' => "Pengaturan Akun"
		);

		$this->form_validation->set_rules('nip', 'NIK', 'trim|callback_validate_nip|required');
		$this->form_validation->set_rules('email', 'E-Mail', 'trim|valid_email|required');
		$this->form_validation->set_rules('name', 'Nama Pengguna', 'trim|required');
		$this->form_validation->set_rules('new_pass', 'Password Baru', 'trim|min_length[8]|max_length[12]');
		$this->form_validation->set_rules('repeat_pass', 'Ini', 'trim|matches[new_pass]');
		$this->form_validation->set_rules('old_pass', 'Password Lama', 'trim|required|callback_validate_password');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim');
		$this->form_validation->set_rules('phone', 'Nomor Telepon', 'trim');

		if ($this->form_validation->run() == TRUE)
		{
			$data = array(
				'nip' => $this->input->post('nip'),
				'name' => $this->input->post('name'),  
				'address' => $this->input->post('alamat'),
				'phone' => $this->input->post('phone'),
				'email' => $this->input->post('email')
			);

			if($this->input->post('new_pass') != '')
				$data['password'] = password_hash($this->input->post('new_pass'), PASSWORD_DEFAULT);

			$this->db->update('users', $data, array('user_id' => $this->userID));

			if($this->db->affected_rows())
			{
				$this->session->set_flashdata('callback', 
					array(
						'color' => 'green',
						'message' => ' Perubahan tersimpan.',
						'icon' => 'check'
					)
				);
			} else {
				$this->session->set_flashdata('callback', 
					array(
						'color' => 'red',
						'message' => ' Gagal melakukan perubahan.',
						'icon' => 'warning'
					)
				);
			}

			redirect(current_url());
		}

		$this->load->view('change-password', $this->data);
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
/* Location: ./application/modules/apps/controllers/Account.php */