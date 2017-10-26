<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller {
	
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

        $this->load->model('administrator/mdownload','download');

        $this->per_page = (!$this->input->get('per_page')) ? 20 : $this->input->get('per_page');

        $this->page = $this->input->get('page');

        $this->user = $this->input->get('user');

        $this->status = $this->input->get('status');

        $this->query = $this->input->get('query');

        $this->adminbreadcrumbs->unshift(0, 'Home', "administrator/home");

        $this->adminbreadcrumbs->unshift(1, 'Download', "administrator/download");

	}

	 public function index()
    {
        $this->adminpage_title->push('Download', 'Data Download');

        $config = $this->administratortemplate->pagination_list();

        $config['base_url'] = site_url(
            "administrator/download?per_page={$this->per_page}&query={$this->query}&user={$this->user}&status={$this->status}"
        );

        $config['per_page'] = $this->per_page;

        $config['total_rows'] = $this->download->get_all(null, null, 'num');

        $this->pagination->initialize($config);

        $this->data = array(
            'title' => 'Download',
            'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
			'adminpage_title' => $this->adminpage_title->show(),
            'data' => $this->download->get_all($this->per_page, $this->page),
            'num' => $config['total_rows'],
            'get_admin' => $this->download->get_admin(),
        );

       $this->administratortemplate->view('administrator/download/v_download', $this->data);
    }

    public function create(){
    
    $this->adminpage_title->push('Download', 'Tambah Data Download');

    $this->breadcrumbs->unshift(2, 'Data Download', "administrator/download/create");
    
    $this->form_validation->set_rules('title', 'Judul ', 'trim|required');
    
    $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
    

    if ($this->form_validation->run() == TRUE){

        $this->download->create();
        redirect(current_url());
    }

    $this->data = array(
        'title' => "Tambah Data Download",
        'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
        'adminpage_title' => $this->adminpage_title->show(),

        );

    $this->administratortemplate->view('administrator/download/create-download', $this->data);
    }

     public function get($param = 0)
    {
        $get = $this->download->get($param);

        $this->adminpage_title->push('Download', 'Update Download');

        $this->adminbreadcrumbs->unshift(2, 'Update', "administrator/download/get");
        
        $this->form_validation->set_rules('title', 'Judul ', 'trim|required');
    
        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
   

        if ($this->form_validation->run() == TRUE)
        {
            $this->download->update($param);

            redirect(current_url());
        }

        $this->data = array(
            'title' => $get->nama_data,
            'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
            'adminpage_title' => $this->adminpage_title->show(),
            'get' => $get
        );

        $this->administratortemplate->view('administrator/download/update-download', $this->data);
    }
	
    public function delete($param = 0)
    {
        $this->download->delete($param);

        redirect('administrator/download');
    }

    public function bulk_action()
    {
        switch ( $this->input->post('action') ) 
        {
            case 'delete':
                $this->download->multiple_delete();
                break;
            default:
                # code...
                break;
        }

        redirect('administrator/download');
    }	

     public function status($param = 0)
    {
        $this->download->status($param);

        redirect('administrator/download');
    } 
}

