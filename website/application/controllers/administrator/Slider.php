<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {
	
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

        $this->load->model('administrator/mslider','slider');

        $this->per_page = (!$this->input->get('per_page')) ? 20 : $this->input->get('per_page');

        $this->page = $this->input->get('page');

        $this->user = $this->input->get('user');

        $this->status = $this->input->get('status');

        $this->query = $this->input->get('query');

        $this->adminbreadcrumbs->unshift(0, 'Home', "administrator/home");
		
		$this->adminbreadcrumbs->unshift(1, 'Slider', "administrator/slider");
	}

	 public function index()
    {
        $this->adminpage_title->push('Slider', 'Data Slider');

        $config = $this->administratortemplate->pagination_list();

        $config['base_url'] = site_url(
            "administrator/slider?per_page={$this->per_page}&query={$this->query}&user={$this->user}&status={$this->status}"
        );

        $config['per_page'] = $this->per_page;

        $config['total_rows'] = $this->slider->get_all(null, null, 'num');

        $this->pagination->initialize($config);

        $this->data = array(
            'title' => 'Slider',
            'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
			'adminpage_title' => $this->adminpage_title->show(),
            'data' => $this->slider->get_all($this->per_page, $this->page),
            'num' => $config['total_rows'],
            'get_admin' => $this->slider->get_admin(),
        );

       $this->administratortemplate->view('administrator/slider/v_slider', $this->data);
    }

    public function create(){
    
    $this->adminpage_title->push('Slider', 'Tambah Data Slider');

    $this->breadcrumbs->unshift(2, 'Data Slider', "administrator/slider/create");

    
    $this->form_validation->set_rules('judul', 'Judul ', 'trim|required');
    $this->form_validation->set_rules('short_description', 'Deskripsi Pendek', 'trim|required');
    $this->form_validation->set_rules('link', 'Link', 'trim|required');
    

    if ($this->form_validation->run() == TRUE){

        $this->slider->create();
        redirect(current_url());
    }

    $this->data = array(
        'title' => "Tambah Data Slider",
        'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
        'adminpage_title' => $this->adminpage_title->show(),

        );

    $this->administratortemplate->view('administrator/slider/create-slider', $this->data);
    }

     public function get($param = 0)
    {
        $get = $this->slider->get($param);

        $this->adminpage_title->push('Slider', 'Update Slider');

        $this->adminbreadcrumbs->unshift(2, 'Update', "administrator/slider/get");
        
        $this->form_validation->set_rules('judul', 'Judul ', 'trim|required');
        $this->form_validation->set_rules('short_description', 'Deskripsi Pendek', 'trim|required');
        $this->form_validation->set_rules('link', 'Link', 'trim|required');

        if ($this->form_validation->run() == TRUE)
        {
            $this->slider->update($param);

            redirect(current_url());
        }

        $this->data = array(
            'title' => $get->title,
            'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
            'adminpage_title' => $this->adminpage_title->show(),
            'get' => $get
        );

        $this->administratortemplate->view('administrator/slider/update-slider', $this->data);
    }
	
    public function delete($param = 0)
    {
        $this->slider->delete($param);

        redirect('administrator/slider');
    }

    public function bulk_action()
    {

        switch ( $this->input->post('action') ) 
        {
            case 'delete' :
                $this->slider->multiple_delete();
                break;
            default:
                redirect('administrator/slider');
                break;
        }

       redirect('administrator/slider');
    }	

    public function status($param = 0)
    {
        $this->slider->status($param);

        redirect('administrator/slider');
    }

}

