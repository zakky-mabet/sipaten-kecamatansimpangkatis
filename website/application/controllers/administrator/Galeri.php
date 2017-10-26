<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {
	
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

        $this->load->model('administrator/mgaleri','galeri');

        $this->per_page = (!$this->input->get('per_page')) ? 20 : $this->input->get('per_page');

        $this->page = $this->input->get('page');

        $this->user = $this->input->get('user');

        $this->status = $this->input->get('status');

        $this->album = $this->input->get('album');

        $this->query = $this->input->get('query');

        $this->adminbreadcrumbs->unshift(0, 'Home', "administrator/home");

        $this->adminbreadcrumbs->unshift(1, 'Publikasi', "administrator/galeri/#");
		
		$this->adminbreadcrumbs->unshift(2, 'Galeri', "administrator/galeri");
	}

	 public function index()
    {
        $this->adminpage_title->push('Galeri', 'Data Galeri');

        $config = $this->administratortemplate->pagination_list();

        $config['base_url'] = site_url(
            "administrator/galeri?per_page={$this->per_page}&query={$this->query}&user={$this->user}&status={$this->status}&album={$this->album}"
        );

        $config['per_page'] = $this->per_page;

        $config['total_rows'] = $this->galeri->get_all(null, null, 'num');

        $this->pagination->initialize($config);

        $this->data = array(
            'title' => 'Galeri',
            'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
			'adminpage_title' => $this->adminpage_title->show(),
            'data' => $this->galeri->get_all($this->per_page, $this->page),
            'num' => $config['total_rows'],
            'get_admin' => $this->galeri->get_admin(),
        );

       $this->administratortemplate->view('administrator/galeri/v_galeri', $this->data);
    }

    public function create(){
    
    $this->adminpage_title->push('Galeri', 'Tambah Data Galeri');

    $this->breadcrumbs->unshift(2, 'Data Galeri', "administrator/galeri/create");

    
    $this->form_validation->set_rules('title', 'Judul ', 'trim|required');
    $this->form_validation->set_rules('album', 'Album ', 'trim|required');
    

    if ($this->form_validation->run() == TRUE){

        $this->galeri->create();
        redirect(current_url());
    }

    $this->data = array(
        'title' => "Tambah Data Galeri",
        'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
        'adminpage_title' => $this->adminpage_title->show(),

        );

    $this->administratortemplate->view('administrator/galeri/create-galeri', $this->data);
    }

     public function get($param = 0)
    {
        $get = $this->galeri->get($param);

        $this->adminpage_title->push('Galeri', 'Update Galeri');

        $this->adminbreadcrumbs->unshift(2, 'Update', "administrator/galeri/get");
        
        $this->form_validation->set_rules('title', 'Judul ', 'trim|required');
        $this->form_validation->set_rules('album', 'Album ', 'trim|required');
   
        if ($this->form_validation->run() == TRUE)
        {
            $this->galeri->update($param);

            redirect(current_url());
        }

        $this->data = array(
            'title' => $get->title,
            'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
            'adminpage_title' => $this->adminpage_title->show(),
            'get' => $get
        );

        $this->administratortemplate->view('administrator/galeri/update-galeri', $this->data);
    }
	
    public function delete($param = 0)
    {
        $this->galeri->delete($param);

        redirect('administrator/galeri');
    }

    public function bulk_action()
    {
        switch ( $this->input->post('action') ) 
        {
            case 'delete':
                $this->galeri->multiple_delete();
                break;
            default:
                # code...
                break;
        }

        redirect('administrator/galeri');
    }

      public function status($param = 0)
    {
        $this->galeri->status($param);

        redirect('administrator/galeri');
    }	

}

