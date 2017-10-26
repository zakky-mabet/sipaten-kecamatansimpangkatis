<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Album extends CI_Controller {
	
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

        $this->load->model('administrator/malbum','album');

         $this->load->model('administrator/malbum');

        $this->per_page = (!$this->input->get('per_page')) ? 20 : $this->input->get('per_page');

        $this->page = $this->input->get('page');

        $this->user = $this->input->get('user');

        $this->status = $this->input->get('status');

        $this->album = $this->input->get('album');

        $this->query = $this->input->get('query');

        $this->adminbreadcrumbs->unshift(0, 'Home', "administrator/home");

        $this->adminbreadcrumbs->unshift(1, 'Master Data', "administrator/album/#");
		
		$this->adminbreadcrumbs->unshift(2, 'Album Galeri', "administrator/album");
	}

	 public function index()
    {
        $this->adminpage_title->push('Album Galeri', 'Data Album Galeri');

        $config = $this->administratortemplate->pagination_list();

        $config['base_url'] = site_url(
            "administrator/album?per_page={$this->per_page}&query={$this->query}&user={$this->user}&status={$this->status}"
        );

        $config['per_page'] = $this->per_page;

        $config['total_rows'] = $this->malbum->get_all(null, null, 'num');

        $this->pagination->initialize($config);

        $this->data = array(
            'title' => 'Album Galeri',
            'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
			'adminpage_title' => $this->adminpage_title->show(),
            'data' => $this->malbum->get_all($this->per_page, $this->page),
            'num' => $config['total_rows'],
            'get_admin' => $this->malbum->get_admin(),
        );

       $this->administratortemplate->view('administrator/album/v_album', $this->data);
    }

    public function create(){
    
    $this->adminpage_title->push('Album Galeri', 'Tambah Data Album Galeri');

    $this->breadcrumbs->unshift(2, 'Data Album Galeri', "administrator/galeri/create");

    
    $this->form_validation->set_rules('title', 'Nama Album ', 'trim|required');
    

    if ($this->form_validation->run() == TRUE){

        $this->malbum->create();
        redirect(current_url());
    }

    $this->data = array(
        'title' => "Tambah Data Album Galeri",
        'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
        'adminpage_title' => $this->adminpage_title->show(),

        );

    $this->administratortemplate->view('administrator/album/create-album', $this->data);
    }

     public function get($param = 0)
    {
        $get = $this->malbum->get($param);

        $this->adminpage_title->push('Album Galeri', 'Update Album Galeri');

        $this->adminbreadcrumbs->unshift(2, 'Update', "administrator/album/get");
        
        $this->form_validation->set_rules('title', 'Nama Album ', 'trim|required');

   
        if ($this->form_validation->run() == TRUE)
        {
            $this->malbum->update($param);

            redirect(current_url());
        }

        $this->data = array(
            'title' => $get->title,
            'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
            'adminpage_title' => $this->adminpage_title->show(),
            'get' => $get
        );

        $this->administratortemplate->view('administrator/album/update-album', $this->data);
    }
	
    public function delete($param = 0)
    {
        $this->malbum->delete($param);

        redirect('administrator/album');
    }

    public function bulk_action()
    {
        switch ( $this->input->post('action') ) 
        {
            case 'delete':
                $this->malbum->multiple_delete();
                break;
            default:
                # code...
                break;
        }

        redirect('administrator/album');
    }

      public function status($param = 0)
    {
        $this->malbum->status($param);

        redirect('administrator/album');
    }	

}

