<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
	
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

        $this->load->model('administrator/mprofil','profil');

        $this->per_page = (!$this->input->get('per_page')) ? 20 : $this->input->get('per_page');

        $this->page = $this->input->get('page');

        $this->user = $this->input->get('user');

        $this->status = $this->input->get('status');

        $this->query = $this->input->get('query');

        $this->adminbreadcrumbs->unshift(0, 'Home', "administrator/home");
		
		$this->adminbreadcrumbs->unshift(1, 'Profil', "administrator/profil");
	}

	 public function index()
    {
        $this->adminpage_title->push('Profil', 'Data Profil');

        $config = $this->administratortemplate->pagination_list();

        $config['base_url'] = site_url(
            "administrator/profil?per_page={$this->per_page}&query={$this->query}&user={$this->user}&status={$this->status}"
        );

        $config['per_page'] = $this->per_page;

        $config['total_rows'] = $this->profil->get_all(null, null, 'num');

        $this->pagination->initialize($config);

        $this->data = array(
            'title' => 'Profil',
            'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
			'adminpage_title' => $this->adminpage_title->show(),
            'data' => $this->profil->get_all($this->per_page, $this->page),
            'num' => $config['total_rows'],
            'get_admin' => $this->profil->get_admin(),
        );

       $this->administratortemplate->view('administrator/profil/v_profil', $this->data);
    }

    public function create(){
    
    $this->adminpage_title->push('Profil', 'Tambah Data Profil');

    $this->breadcrumbs->unshift(2, 'Data Profil', "administrator/profil/create");

    
    $this->form_validation->set_rules('judul', 'Judul ', 'trim|required');
    $this->form_validation->set_rules('descriptions', 'Deskripsi', 'trim|required');
    

    if ($this->form_validation->run() == TRUE){

        $this->profil->create();
        redirect(current_url());
    }

    $this->data = array(
        'title' => "Tambah Data Profil",
        'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
        'adminpage_title' => $this->adminpage_title->show(),

        );

    $this->administratortemplate->view('administrator/profil/create-profil', $this->data);
    }

     public function get($param = 0)
    {
        $get = $this->profil->get($param);

        $this->adminpage_title->push('Profil', 'Update Profil');

        $this->adminbreadcrumbs->unshift(2, 'Update', "administrator/profil/get");
        
        $this->form_validation->set_rules('judul', 'Judul ', 'trim|required');
        $this->form_validation->set_rules('descriptions', 'Deskripsi', 'trim|required');
   

        if ($this->form_validation->run() == TRUE)
        {
            $this->profil->update($param);

            redirect(current_url());
        }

        $this->data = array(
            'title' => $get->title,
            'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
            'adminpage_title' => $this->adminpage_title->show(),
            'get' => $get
        );

        $this->administratortemplate->view('administrator/profil/update-profil', $this->data);
    }
	
    public function delete($param = 0)
    {
        $this->profil->delete($param);

        redirect('administrator/profil');
    }

    public function bulk_action()
    {
        switch ( $this->input->post('action') ) 
        {
            case 'delete':
                $this->profil->multiple_delete();
                break;
            default:
                # code...
                break;
        }

        redirect('administrator/profil');
    }

    public function status($param = 0)
    {
        $this->profil->status($param);

        redirect('administrator/profil');
    }	

}

