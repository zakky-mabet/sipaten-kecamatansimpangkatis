<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organisasi extends CI_Controller {
	
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

        $this->load->model('administrator/morganisasi','organisasi');

        $this->per_page = (!$this->input->get('per_page')) ? 20 : $this->input->get('per_page');

        $this->page = $this->input->get('page');

        $this->user = $this->input->get('user');

        $this->status = $this->input->get('status');

        $this->query = $this->input->get('query');

        $this->adminbreadcrumbs->unshift(0, 'Home', "administrator/home");
		
		$this->adminbreadcrumbs->unshift(1, 'Organisasi Kemasyarakatan', "administrator/organisasi");
	}

	 public function index()
    {
        $this->adminpage_title->push('Organisasi Kemasyarakatan', 'Data Organisasi Kemasyarakatan');

        $config = $this->administratortemplate->pagination_list();

        $config['base_url'] = site_url(
            "administrator/organisasi?per_page={$this->per_page}&query={$this->query}&user={$this->user}&status={$this->status}"
        );

        $config['per_page'] = $this->per_page;

        $config['total_rows'] = $this->organisasi->get_all(null, null, 'num');

        $this->pagination->initialize($config);

        $this->data = array(
            'title' => 'Organisasi Kemasyarakatan',
            'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
			'adminpage_title' => $this->adminpage_title->show(),
            'data' => $this->organisasi->get_all($this->per_page, $this->page),
            'num' => $config['total_rows'],
            'get_admin' => $this->organisasi->get_admin(),
        );

       $this->administratortemplate->view('administrator/organisasi/v_organisasi', $this->data);
    }

    public function create(){
    
    $this->adminpage_title->push('Organisasi Kemasyarakatan', 'Tambah Data Organisasi Kemasyarakatan');

    $this->breadcrumbs->unshift(2, 'Data Organisasi Kemasyarakatan', "administrator/organisasi/create");

    
    $this->form_validation->set_rules('judul', 'Judul ', 'trim|required');
    $this->form_validation->set_rules('descriptions', 'Deskripsi', 'trim|required');
    

    if ($this->form_validation->run() == TRUE){

        $this->organisasi->create();
        redirect(current_url());
    }

    $this->data = array(
        'title' => "Tambah Data Organisasi Kemasyarakatan",
        'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
        'adminpage_title' => $this->adminpage_title->show(),

        );

    $this->administratortemplate->view('administrator/organisasi/create-organisasi', $this->data);
    }

     public function get($param = 0)
    {
        $get = $this->organisasi->get($param);

        $this->adminpage_title->push('Organisasi Kemasyarakatan', 'Update Organisasi Kemasyarakatan');

        $this->adminbreadcrumbs->unshift(2, 'Update', "administrator/organisasi/get");
        
        $this->form_validation->set_rules('judul', 'Judul ', 'trim|required');
        $this->form_validation->set_rules('descriptions', 'Deskripsi', 'trim|required');
   

        if ($this->form_validation->run() == TRUE)
        {
            $this->organisasi->update($param);

            redirect(current_url());
        }

        $this->data = array(
            'title' => $get->title,
            'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
            'adminpage_title' => $this->adminpage_title->show(),
            'get' => $get
        );

        $this->administratortemplate->view('administrator/organisasi/update-organisasi', $this->data);
    }
	
    public function delete($param = 0)
    {
        $this->organisasi->delete($param);

        redirect('administrator/organisasi');
    }

    public function bulk_action()
    {
        switch ( $this->input->post('action') ) 
        {
            case 'delete':
                $this->organisasi->multiple_delete();
                break;
            default:
                # code...
                break;
        }

        redirect('administrator/organisasi');
    }

    public function status($param = 0)
    {
        $this->organisasi->status($param);

        redirect('administrator/organisasi');
    }	

}

