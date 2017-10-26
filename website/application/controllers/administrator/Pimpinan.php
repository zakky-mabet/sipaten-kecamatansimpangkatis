<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pimpinan extends CI_Controller {
	
	public $data = array();

    public $per_page;

    public $page = 20;

    public $user;

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

        $this->load->model('administrator/mpimpinan','pimpinan');

        $this->per_page = (!$this->input->get('per_page')) ? 20 : $this->input->get('per_page');

        $this->page = $this->input->get('page');

        $this->user = $this->input->get('user');

        $this->status = $this->input->get('status');

        $this->query = $this->input->get('query');

        $this->adminbreadcrumbs->unshift(0, 'Home', "administrator/home");

        $this->adminbreadcrumbs->unshift(1, 'Organisasi', "administrator/pimpinan/#");
		
		$this->adminbreadcrumbs->unshift(2, 'Pimpinan', "administrator/pimpinan");
	}

	 public function index()
    {
        $this->adminpage_title->push('Pimpinan', 'Data Pimpinan');

        $config = $this->administratortemplate->pagination_list();

        $config['base_url'] = site_url(
            "administrator/pimpinan?per_page={$this->per_page}&query={$this->query}&user={$this->user}&status={$this->status}"
        );

        $config['per_page'] = $this->per_page;

        $config['total_rows'] = $this->pimpinan->get_all(null, null, 'num');

        $this->pagination->initialize($config);

        $this->data = array(
            'title' => 'Pimpinan',
            'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
			'adminpage_title' => $this->adminpage_title->show(),
            'data' => $this->pimpinan->get_all($this->per_page, $this->page),
            'num' => $config['total_rows'],
            'get_admin' => $this->pimpinan->get_admin(),
        );

       $this->administratortemplate->view('administrator/pimpinan/v_pimpinan', $this->data);
    }

    public function create(){
    
    $this->adminpage_title->push('Pimpinan', 'Tambah Data Pimpinan');

    $this->breadcrumbs->unshift(2, 'Data Pimpinan', "administrator/profil/create");

    $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap ', 'trim|required');
    $this->form_validation->set_rules('nip', 'NIP', 'trim|required');
    $this->form_validation->set_rules('pangkat', 'Pangkat', 'trim|required');
    $this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'trim|required');
    $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
    $this->form_validation->set_rules('agama', 'Agama', 'trim|required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
    $this->form_validation->set_rules('hobbi', 'Hobi', 'trim|required');
    $this->form_validation->set_rules('motto_hidup', 'Motto Hidup', 'trim|required');
    $this->form_validation->set_rules('periode', 'Periode', 'trim|required');
    $this->form_validation->set_rules('sambutan', 'Kata Sambutan', 'trim|required');


    if ($this->form_validation->run() == TRUE){

        $this->pimpinan->create();
        redirect(current_url());
    }

    $this->data = array(
        'title' => "Tambah Data Pimpinan",
        'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
        'adminpage_title' => $this->adminpage_title->show(),

        );

    $this->administratortemplate->view('administrator/pimpinan/create-pimpinan', $this->data);
    }

     public function get($param = 0)
    {
        $get = $this->pimpinan->get($param);

        $this->adminpage_title->push('Pimpinan', 'Update Pimpinan');

        $this->adminbreadcrumbs->unshift(2, 'Update', "administrator/pimpinan/get");
        
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap ', 'trim|required');
        $this->form_validation->set_rules('nip', 'NIP', 'trim|required');
        $this->form_validation->set_rules('pangkat', 'Pangkat', 'trim|required');
        $this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'trim|required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
        $this->form_validation->set_rules('agama', 'Agama', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('hobbi', 'Hobi', 'trim|required');
        $this->form_validation->set_rules('motto_hidup', 'Motto Hidup', 'trim|required');
        $this->form_validation->set_rules('periode', 'Periode', 'trim|required');
        $this->form_validation->set_rules('sambutan', 'Kata Sambutan', 'trim|required');
   

        if ($this->form_validation->run() == TRUE)
        {
            $this->pimpinan->update($param);

            redirect(current_url());
        }

        $this->data = array(
            'title' => $get->nama_lengkap,
            'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
            'adminpage_title' => $this->adminpage_title->show(),
            'get' => $get
        );

        $this->administratortemplate->view('administrator/pimpinan/update-pimpinan', $this->data);
    }
	
    public function delete($param = 0)
    {
        $this->pimpinan->delete($param);

        redirect('administrator/pimpinan');
    }

    public function bulk_action()
    {
        switch ( $this->input->post('action') ) 
        {
            case 'delete':
                $this->pimpinan->multiple_delete();
                break;
            default:
                # code...
                break;
        }

        redirect('administrator/pimpinan');
    }

    public function status($param = 0)
    {
        $this->pimpinan->status($param);

        redirect('administrator/pimpinan');
    }  	

}

