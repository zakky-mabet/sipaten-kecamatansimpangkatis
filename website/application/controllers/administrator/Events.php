<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {
	
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

        $this->load->model('administrator/mevents','events');

        $this->per_page = (!$this->input->get('per_page')) ? 20 : $this->input->get('per_page');

        $this->page = $this->input->get('page');

        $this->user = $this->input->get('user');

        $this->status = $this->input->get('status');

        $this->kategori = $this->input->get('kategori');

        $this->query = $this->input->get('query');

        $this->adminbreadcrumbs->unshift(0, 'Home', "administrator/home");

        $this->adminbreadcrumbs->unshift(1, 'Publikasi', "administrator/events/#");
		
		$this->adminbreadcrumbs->unshift(2, 'Events', "administrator/events");
	}

	 public function index()
    {
        $this->adminpage_title->push('Events', 'Data Events');

        $config = $this->administratortemplate->pagination_list();

        $config['base_url'] = site_url(
            "administrator/events?per_page={$this->per_page}&query={$this->query}&user={$this->user}&status={$this->status}&kategori={$this->kategori}"
        );

        $config['per_page'] = $this->per_page;

        $config['total_rows'] = $this->events->get_all(null, null, 'num');

        $this->pagination->initialize($config);

        $this->data = array(
            'title' => 'Events',
            'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
			'adminpage_title' => $this->adminpage_title->show(),
            'data' => $this->events->get_all($this->per_page, $this->page),
            'num' => $config['total_rows'],
            'get_admin' => $this->events->get_admin(),
        );

       $this->administratortemplate->view('administrator/events/v_events', $this->data);
    }

    public function create(){
    
    $this->adminpage_title->push('Events', 'Tambah Data Events');

    $this->breadcrumbs->unshift(2, 'Data Events', "administrator/profil/create");

    
    $this->form_validation->set_rules('title', 'Judul ', 'trim|required');
    $this->form_validation->set_rules('short_descriptions', 'Deskripsi Singkat', 'trim|required');
    $this->form_validation->set_rules('descriptions', 'Deskripsi Lengkap ', 'trim|required');
    $this->form_validation->set_rules('kategori', 'Kategori ', 'trim|required');
    $this->form_validation->set_rules('tags[]', 'Tags', 'trim|required');
    $this->form_validation->set_rules('tgl_events', 'Tanggal Events ', 'trim|required');

    if ($this->form_validation->run() == TRUE){

        $this->events->create();
        redirect(current_url());
    }

    $this->data = array(
        'title' => "Tambah Data Events",
        'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
        'adminpage_title' => $this->adminpage_title->show(),

        );

    $this->administratortemplate->view('administrator/events/create-events', $this->data);
    }

     public function get($param = 0)
    {
        $get = $this->events->get($param);

        $this->adminpage_title->push('Events', 'Update Events');

        $this->adminbreadcrumbs->unshift(2, 'Update', "administrator/events/get");
         
        $this->form_validation->set_rules('title', 'Judul ', 'trim|required');
        $this->form_validation->set_rules('short_descriptions', 'Deskripsi Singkat', 'trim|required');
        $this->form_validation->set_rules('descriptions', 'Deskripsi Lengkap ', 'trim|required');
        $this->form_validation->set_rules('kategori', 'Kategori ', 'trim|required');
        $this->form_validation->set_rules('tags[]', 'Tags', 'trim|required');
        $this->form_validation->set_rules('tgl_events', 'Tanggal Events ', 'trim|required');
   

        if ($this->form_validation->run() == TRUE)
        {
            $this->events->update($param);

            redirect(current_url());
        }

        $this->data = array(
            'title' => $get->title,
            'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
            'adminpage_title' => $this->adminpage_title->show(),
            'get' => $get
        );

        $this->administratortemplate->view('administrator/events/update-events', $this->data);
    }
	
    public function delete($param = 0)
    {
        $this->events->delete($param);

        redirect('administrator/events');
    }

    public function bulk_action()
    {
        switch ( $this->input->post('action') ) 
        {
            case 'delete':
                $this->events->multiple_delete();
                break;
            default:
                # code...
                break;
        }

        redirect('administrator/events');
    }	

     public function status($param = 0)
    {
        $this->events->status($param);

        redirect('administrator/events');
    }   

}

