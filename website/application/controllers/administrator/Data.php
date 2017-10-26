<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {
	
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

        $this->load->model('administrator/mdata_','data_m');

        $this->per_page = (!$this->input->get('per_page')) ? 20 : $this->input->get('per_page');

        $this->page = $this->input->get('page');

        $this->user = $this->input->get('user');

        $this->status = $this->input->get('status');

        $this->query = $this->input->get('query');

        $this->adminbreadcrumbs->unshift(0, 'Home', "administrator/home");

        $this->adminbreadcrumbs->unshift(1, 'Data', "administrator/data");

	}

	 public function index()
    {
        $this->adminpage_title->push('Data', '');

        $config = $this->administratortemplate->pagination_list();

        $config['base_url'] = site_url(
            "administrator/data?per_page={$this->per_page}&query={$this->query}&user={$this->user}&status={$this->status}"
        );

        $config['per_page'] = $this->per_page;

        $config['total_rows'] = $this->data_m->get_all(null, null, 'num');

        $this->pagination->initialize($config);

        $this->data = array(
            'title' => 'Data',
            'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
			'adminpage_title' => $this->adminpage_title->show(),
            'data' => $this->data_m->get_all($this->per_page, $this->page),
            'num' => $config['total_rows'],
            'get_admin' => $this->data_m->get_admin(),
        );

       $this->administratortemplate->view('administrator/data/v_data', $this->data);
    }

    public function create(){
    
    $this->adminpage_title->push('Data', 'Tambah Data ');

    $this->breadcrumbs->unshift(2, 'Data ', "administrator/data/create");

    
    $this->form_validation->set_rules('title', 'Judul ', 'trim|required');
    $this->form_validation->set_rules('descriptions', 'Deskripsi', 'trim|required');
    

    if ($this->form_validation->run() == TRUE){

        $this->data_m->create();
        redirect(current_url());
    }

    $this->data = array(
        'title' => "Tambah Data ",
        'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
        'adminpage_title' => $this->adminpage_title->show(),

        );

    $this->administratortemplate->view('administrator/data/create-data', $this->data);
    }

     public function get($param = 0)
    {
        $get = $this->data_m->get($param);

        $this->adminpage_title->push('Data', 'Update Data');

        $this->adminbreadcrumbs->unshift(2, 'Update', "administrator/data/get");
        
        $this->form_validation->set_rules('title', 'Judul ', 'trim|required');
        $this->form_validation->set_rules('descriptions', 'Deskripsi', 'trim|required');
   

        if ($this->form_validation->run() == TRUE)
        {
            $this->data_m->update($param);

            redirect(current_url());
        }

        $this->data = array(
            'title' => $get->title,
            'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
            'adminpage_title' => $this->adminpage_title->show(),
            'get' => $get
        );

        $this->administratortemplate->view('administrator/data/update-data', $this->data);
    }
	
    public function delete($param = 0)
    {
        $this->data_m->delete($param);

        redirect('administrator/data');
    }

    public function bulk_action()
    {
        switch ( $this->input->post('action') ) 
        {
            case 'delete':
                $this->data_m->multiple_delete();
                break;
            default:
                # code...
                break;
        }

        redirect('administrator/data');
    }

    public function status($param = 0)
    {
        $this->data_m->status($param);

        redirect('administrator/data');
    }   	

}

