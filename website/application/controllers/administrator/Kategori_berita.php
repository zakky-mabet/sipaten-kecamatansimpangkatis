<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_berita extends CI_Controller {
	
	public $data = array();

    public $per_page;

    public $page = 20;

    public $hak_akses;

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

        $this->load->model('administrator/mkategori_berita','kategori_berita');

        $this->per_page = (!$this->input->get('per_page')) ? 20 : $this->input->get('per_page');

        $this->page = $this->input->get('page');

        $this->user = $this->input->get('user');

        $this->status = $this->input->get('status');

        $this->query = $this->input->get('query');

        $this->hak_akses = $this->input->get('hak_akses');

        $this->adminbreadcrumbs->unshift(0, 'Home', "administrator/home");

        $this->adminbreadcrumbs->unshift(1, 'Kategori ', "administrator/kategori_berita");

	}

	 public function index()
    {
        $this->adminpage_title->push('Kategori ', 'Data Kategori ');

        $config = $this->administratortemplate->pagination_list();

        $config['base_url'] = site_url(
            "administrator/kategori_berita?per_page={$this->per_page}&query={$this->query}&hak_akses={$this->hak_akses}&status={$this->status}"
        );

        $config['per_page'] = $this->per_page;

        $config['total_rows'] = $this->kategori_berita->get_all(null, null, 'num');

        $this->pagination->initialize($config);

        $this->data = array(
            'title' => 'Kategori',
            'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
			'adminpage_title' => $this->adminpage_title->show(),
            'data' => $this->kategori_berita->get_all($this->per_page, $this->page),
            'num' => $config['total_rows'],
            'get_admin' => $this->kategori_berita->get_admin(),
        );

       $this->administratortemplate->view('administrator/kategori-berita/v_kategori_berita', $this->data);
    }

    public function create(){
    
    $this->adminpage_title->push('Kategori ', 'Tambah Data Kategori ');

    $this->breadcrumbs->unshift(2, 'Data Kategori ', "administrator/kategori_berita/create");
    
    $this->form_validation->set_rules('title', 'Nama Kategori ', 'trim|required');

    if ($this->form_validation->run() == TRUE){

        $this->kategori_berita->create();
        redirect(current_url());
    }

    $this->data = array(
        'title' => "Tambah Data Kategori ",
        'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
        'adminpage_title' => $this->adminpage_title->show(),

        );

    $this->administratortemplate->view('administrator/kategori-berita/create-kategori-berita', $this->data);
    }


     public function get($param = 0)
    {
        $get = $this->kategori_berita->get($param);

        $this->adminpage_title->push('Kategori ', 'Update Kategori ');

        $this->adminbreadcrumbs->unshift(2, 'Update', "administrator/kategori_berita/get");
        
        $this->form_validation->set_rules('title', 'Nama Kategori ', 'trim|required');

        if ($this->form_validation->run() == TRUE)
        {
            $this->kategori_berita->update($param);

            redirect(current_url());
        }

        $this->data = array(
            'title' => $get->nama,
            'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
            'adminpage_title' => $this->adminpage_title->show(),
            'get' => $get
        );

        $this->administratortemplate->view('administrator/kategori-berita/update-kategori-berita', $this->data);
    }

       public function delete($param = 0)
    {
        $this->kategori_berita->delete($param);

        redirect('administrator/kategori_berita');
    }

    public function bulk_action()
    {
        switch ( $this->input->post('action') ) 
        {
            case 'delete':
                $this->kategori_berita->multiple_delete();
                break;
            default:
                # code...
                break;
        }

        redirect('administrator/kategori_berita');
    }   

}

