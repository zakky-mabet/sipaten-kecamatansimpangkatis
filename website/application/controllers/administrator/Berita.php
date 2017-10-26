<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {
	
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

        $this->load->model('administrator/mberita','berita');

        $this->per_page = (!$this->input->get('per_page')) ? 20 : $this->input->get('per_page');

        $this->page = $this->input->get('page');

        $this->user = $this->input->get('user');

        $this->status = $this->input->get('status');

        $this->kategori = $this->input->get('kategori');

        $this->query = $this->input->get('query');

        $this->adminbreadcrumbs->unshift(0, 'Home', "administrator/home");

        $this->adminbreadcrumbs->unshift(1, 'Publikasi', "administrator/berita/#");
		
		$this->adminbreadcrumbs->unshift(2, 'Berita', "administrator/berita");
	}

	 public function index()
    {
        $this->adminpage_title->push('Berita', 'Data Berita');

        $config = $this->administratortemplate->pagination_list();

        $config['base_url'] = site_url(
            "administrator/berita?per_page={$this->per_page}&query={$this->query}&user={$this->user}&status={$this->status}&kategori={$this->kategori}"
        );

        $config['per_page'] = $this->per_page;

        $config['total_rows'] = $this->berita->get_all(null, null, 'num');

        $this->pagination->initialize($config);

        $this->data = array(
            'title' => 'Berita',
            'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
			'adminpage_title' => $this->adminpage_title->show(),
            'data' => $this->berita->get_all($this->per_page, $this->page),
            'num' => $config['total_rows'],
            'get_admin' => $this->berita->get_admin(),
        );

       $this->administratortemplate->view('administrator/berita/v_berita', $this->data);
    }

    public function create(){
    
    $this->adminpage_title->push('Berita', 'Tambah Data Berita');

    $this->breadcrumbs->unshift(2, 'Data Berita', "administrator/profil/create");

    
    $this->form_validation->set_rules('title', 'Judul ', 'trim|required');
    $this->form_validation->set_rules('short_descriptions', 'Deskripsi Singkat', 'trim|required');
    $this->form_validation->set_rules('descriptions', 'Deskripsi Lengkap ', 'trim|required');
    $this->form_validation->set_rules('kategori', 'Kategori ', 'trim|required');
    $this->form_validation->set_rules('tags[]', 'Tags ', 'trim|required');
    $this->form_validation->set_rules('slider', 'Slider ', 'trim|required');

    if ($this->form_validation->run() == TRUE){

        $this->berita->create();
        redirect(current_url());
    }


    $this->data = array(
        'title' => "Tambah Data Berita",
        'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
        'adminpage_title' => $this->adminpage_title->show(),

        );

    $this->administratortemplate->view('administrator/berita/create-berita', $this->data);
    }

     public function get($param = 0)
    {
        $get = $this->berita->get($param);

        $this->adminpage_title->push('Berita', 'Update Berita');

        $this->adminbreadcrumbs->unshift(2, 'Update', "administrator/berita/get");
        
        $this->form_validation->set_rules('title', 'Judul ', 'trim|required');
        $this->form_validation->set_rules('short_descriptions', 'Deskripsi Singkat', 'trim|required');
        $this->form_validation->set_rules('descriptions', 'Deskripsi Lengkap ', 'trim|required');
        $this->form_validation->set_rules('kategori', 'Kategori ', 'trim|required');
        $this->form_validation->set_rules('tags[]', 'Tags ', 'trim|required');
        $this->form_validation->set_rules('slider', 'Slider ', 'trim|required');

        if ($this->form_validation->run() == TRUE)
        {
            $this->berita->update($param);

            redirect(current_url());
        }

        $this->data = array(
            'title' => $get->title,
            'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
            'adminpage_title' => $this->adminpage_title->show(),
            'get' => $get
        );

        $this->administratortemplate->view('administrator/berita/update-berita', $this->data);
    }
	
    public function delete($param = 0)
    {
        $this->berita->delete($param);

        redirect('administrator/berita');
    }

    public function bulk_action()
    {
        switch ( $this->input->post('action') ) 
        {
            case 'delete':
                $this->berita->multiple_delete();
                break;
            default:
                # code...
                break;
        }

        redirect('administrator/berita');
    }	

    public function status($param = 0)
    {
        $this->berita->status($param);

        redirect('administrator/berita');
    }   
}

