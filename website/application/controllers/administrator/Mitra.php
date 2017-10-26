<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mitra extends CI_Controller {
	
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

        $this->load->model('administrator/mmitra','mitra');

        $this->per_page = (!$this->input->get('per_page')) ? 20 : $this->input->get('per_page');

        $this->page = $this->input->get('page');

        $this->user = $this->input->get('user');

        $this->status = $this->input->get('status');

        $this->query = $this->input->get('query');

        $this->adminbreadcrumbs->unshift(0, 'Home', "administrator/home");

        $this->adminbreadcrumbs->unshift(1, 'Mitra', "administrator/mitra");

	}

	 public function index()
    {
        $this->adminpage_title->push('Mitra', 'Data Mitra');

        $config = $this->administratortemplate->pagination_list();

        $config['base_url'] = site_url(
            "administrator/mitra?per_page={$this->per_page}&query={$this->query}&user={$this->user}&status={$this->status}"
        );

        $config['per_page'] = $this->per_page;

        $config['total_rows'] = $this->mitra->get_all(null, null, 'num');

        $this->pagination->initialize($config);

        $this->data = array(
            'title' => 'Mitra',
            'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
			'adminpage_title' => $this->adminpage_title->show(),
            'data' => $this->mitra->get_all($this->per_page, $this->page),
            'num' => $config['total_rows'],
            'get_admin' => $this->mitra->get_admin(),
        );

       $this->administratortemplate->view('administrator/mitra/v_mitra', $this->data);
    }

    public function create(){
    
    $this->adminpage_title->push('Mitra', 'Tambah Data Mitra');

    $this->breadcrumbs->unshift(2, 'Data Mitra', "administrator/mitra/create");

    
    $this->form_validation->set_rules('title', 'Judul', 'trim|required');
    
    $this->form_validation->set_rules('link', 'Link', 'trim|required');
    

    if ($this->form_validation->run() == TRUE){

        $this->mitra->create();
        redirect(current_url());
    }

    $this->data = array(
        'title' => "Tambah Data Mitra",
        'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
        'adminpage_title' => $this->adminpage_title->show(),

        );

    $this->administratortemplate->view('administrator/mitra/create-mitra', $this->data);
    }

     public function get($param = 0)
    {
        $get = $this->mitra->get($param);

        $this->adminpage_title->push('Mitra', 'Update Mitra');

        $this->adminbreadcrumbs->unshift(2, 'Update', "administrator/mitra/get");
        
        $this->form_validation->set_rules('title', 'Judul', 'trim|required');
    
        $this->form_validation->set_rules('link', 'Link', 'trim|required');
   

        if ($this->form_validation->run() == TRUE)
        {
            $this->mitra->update($param);

            redirect(current_url());
        }

        $this->data = array(
            'title' => $get->title,
            'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
            'adminpage_title' => $this->adminpage_title->show(),
            'get' => $get
        );

        $this->administratortemplate->view('administrator/mitra/update-mitra', $this->data);
    }
	
    public function delete($param = 0)
    {
        $this->mitra->delete($param);

        redirect('administrator/mitra');
    }

    public function bulk_action()
    {
        switch ( $this->input->post('action') ) 
        {
            case 'delete':
                $this->mitra->multiple_delete();
                break;
            default:
                # code...
                break;
        }

        redirect('administrator/mitra');
    }

     public function status($param = 0)
    {
        $this->mitra->status($param);

        redirect('administrator/mitra');
    } 	

}

