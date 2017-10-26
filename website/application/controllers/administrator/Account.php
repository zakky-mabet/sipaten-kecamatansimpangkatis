<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {
	

	public function __construct()
	{
		parent::__construct();
		 if ( ! $this->session->userdata('admin_login') ) :
            $this->administratortemplate->alert(
                'Silahkan Login !', 
                array('type' => 'danger','icon' => 'close')
            );
            redirect('administrator/login');
            return;
        endif;

        $this->load->model('administrator/maccount','account');

        $this->adminbreadcrumbs->unshift(0, 'Home', "administrator/home");

        $this->adminbreadcrumbs->unshift(1, 'Account', "administrator/account");

	}

	

     public function index($param = 0)
    {
        $get = $this->account->get($this->session->userdata('akun_id_admin'));

        $this->adminpage_title->push('Account', 'Detail Account');

        $this->adminbreadcrumbs->unshift(2, 'Detail', "administrator/account");
        
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password_lama', 'Password Lama', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]|required');
        $this->form_validation->set_rules('ulangi_password', 'Ulangi Password', 'trim|matches[password]|required');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('no_hp', 'Telepon', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
   

        if ($this->form_validation->run() == TRUE)
        {
            $this->account->update($param);

            redirect(current_url());
        }

        $this->data = array(
            'title' => $get->nama_lengkap,
            'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
            'adminpage_title' => $this->adminpage_title->show(),
            'get' => $get
        );

        $this->administratortemplate->view('administrator/account/v_account', $this->data);
    }

 


}

