<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tags extends CI_Controller {
	
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

        $this->load->model('administrator/mtags','tags');

        $this->per_page = (!$this->input->get('per_page')) ? 20 : $this->input->get('per_page');

        $this->page = $this->input->get('page');

        $this->user = $this->input->get('user');

        $this->status = $this->input->get('status');

        $this->query = $this->input->get('query');

        $this->hak_akses = $this->input->get('hak_akses');

        $this->adminbreadcrumbs->unshift(0, 'Home', "administrator/home");

        $this->adminbreadcrumbs->unshift(1, 'Tags', "administrator/tags");

	}

	 public function index()
    {
        $this->adminpage_title->push('Tags', 'Data Tags');

        $config = $this->administratortemplate->pagination_list();

        $config['base_url'] = site_url(
            "administrator/tags?per_page={$this->per_page}&query={$this->query}&hak_akses={$this->hak_akses}&status={$this->status}"
        );

        $config['per_page'] = $this->per_page;

        $config['total_rows'] = $this->tags->get_all(null, null, 'num');

        $this->pagination->initialize($config);

        $this->data = array(
            'title' => 'Tags',
            'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
			'adminpage_title' => $this->adminpage_title->show(),
            'data' => $this->tags->get_all($this->per_page, $this->page),
            'num' => $config['total_rows'],
            'get_admin' => $this->tags->get_admin(),
        );

       $this->administratortemplate->view('administrator/tags/v_tags', $this->data);
    }

    public function create(){
    
    $this->adminpage_title->push('Tags', 'Tambah Data Tags');

    $this->breadcrumbs->unshift(2, 'Data Tags', "administrator/tags/create");
    
    $this->form_validation->set_rules('title', 'Nama Tags ', 'trim|required');

    if ($this->form_validation->run() == TRUE){

        $this->tags->create();
        redirect(current_url());
    }

    $this->data = array(
        'title' => "Tambah Data Tags",
        'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
        'adminpage_title' => $this->adminpage_title->show(),

        );

    $this->administratortemplate->view('administrator/tags/create-tags', $this->data);
    }


     public function get($param = 0)
    {
        $get = $this->tags->get($param);

        $this->adminpage_title->push('Tags', 'Update  Tags');

        $this->adminbreadcrumbs->unshift(2, 'Update', "administrator/tags/get");
        
        $this->form_validation->set_rules('title', 'Nama Tags', 'trim|required');

        if ($this->form_validation->run() == TRUE)
        {
            $this->tags->update($param);

            redirect(current_url());
        }

        $this->data = array(
            'title' => $get->nama,
            'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
            'adminpage_title' => $this->adminpage_title->show(),
            'get' => $get
        );

        $this->administratortemplate->view('administrator/tags/update-tags', $this->data);
    }

       public function delete($param = 0)
    {
        $this->tags->delete($param);

        redirect('administrator/tags');
    }

    public function bulk_action()
    {
        switch ( $this->input->post('action') ) 
        {
            case 'delete':
                $this->tags->multiple_delete();
                break;
            default:
                # code...
                break;
        }

        redirect('administrator/tags');
    }   

}

