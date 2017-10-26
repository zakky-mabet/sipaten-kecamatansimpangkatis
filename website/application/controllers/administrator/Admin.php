<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	public $data = array();

    public $per_page;

    public $page = 20;

    public $hak_akses;

    public $status;

    public $query;

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

        $this->load->model('administrator/madmin','admin');

        $this->per_page = (!$this->input->get('per_page')) ? 20 : $this->input->get('per_page');

        $this->page = $this->input->get('page');

        $this->user = $this->input->get('user');

        $this->status = $this->input->get('status');

        $this->query = $this->input->get('query');

        $this->hak_akses = $this->input->get('hak_akses');

        $this->adminbreadcrumbs->unshift(0, 'Home', "administrator/home");

        $this->adminbreadcrumbs->unshift(1, 'Penguna Sistem', "administrator/admin");

	}

	 public function index()
    {
        $this->adminpage_title->push('Penguna Sistem', 'Data Penguna Sistem');

        $config = $this->administratortemplate->pagination_list();

        $config['base_url'] = site_url(
            "administrator/admin?per_page={$this->per_page}&query={$this->query}&hak_akses={$this->hak_akses}&status={$this->status}"
        );

        $config['per_page'] = $this->per_page;

        $config['total_rows'] = $this->admin->get_all(null, null, 'num');

        $this->pagination->initialize($config);

        $this->data = array(
            'title' => 'Penguna Sistem',
            'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
			'adminpage_title' => $this->adminpage_title->show(),
            'data' => $this->admin->get_all($this->per_page, $this->page),
            'num' => $config['total_rows'],
            'get_admin' => $this->admin->get_admin(),
        );

       $this->administratortemplate->view('administrator/admin/v_admin', $this->data);
    }

    public function create(){
    
    $this->adminpage_title->push('Penguna', 'Tambah Penguna Sistem');

    $this->breadcrumbs->unshift(2, 'Data Penguna', "administrator/profil/create");

    
    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]|required');
    $this->form_validation->set_rules('ulangi_password', 'Ulangi Password', 'trim|matches[password]|required');
    $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('no_hp', 'Telepon', 'trim|required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
    $this->form_validation->set_rules('hak_akses', 'Hak Akses', 'trim|required');
 
    

    if ($this->form_validation->run() == TRUE){

        $this->admin->create();
        redirect(current_url());
    }

    $this->data = array(
        'title' => "Tambah Data Penguna",
        'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
        'adminpage_title' => $this->adminpage_title->show(),

        );

    $this->administratortemplate->view('administrator/admin/create-admin', $this->data);
    }

     public function get($param = 0)
    {
        $get = $this->admin->get($param);

        $this->adminpage_title->push('Admin', 'Update Admin');

        $this->adminbreadcrumbs->unshift(2, 'Update', "administrator/admin/get");
        
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]|required');
        $this->form_validation->set_rules('ulangi_password', 'Ulangi Password', 'trim|matches[password]|required');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('no_hp', 'Telepon', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('hak_akses', 'Hak Akses', 'trim|required');
   

        if ($this->form_validation->run() == TRUE)
        {
            $this->admin->update($param);

            redirect(current_url());
        }

        $this->data = array(
            'title' => $get->nama_lengkap,
            'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
            'adminpage_title' => $this->adminpage_title->show(),
            'get' => $get
        );

        $this->administratortemplate->view('administrator/admin/update-admin', $this->data);
    }

 
    public function delete($param = 0)
    {
        $this->admin->delete($param);

        redirect('administrator/admin');
    }

    public function bulk_action()
    {
        switch ( $this->input->post('action') ) 
        {
            case 'delete':
                $this->admin->multiple_delete();
                break;
            default:
                # code...
                break;
        }

        redirect('administrator/admin');
    }

     public function status($param = 0)
    {
        $this->admin->status($param);

        redirect('administrator/admin');
    } 	

}

