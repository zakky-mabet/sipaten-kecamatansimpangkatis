<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {
	
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

        $this->load->model('administrator/mkontak','kontak');

        $this->per_page = (!$this->input->get('per_page')) ? 20 : $this->input->get('per_page');

        $this->page = $this->input->get('page');

        $this->user = $this->input->get('user');

        $this->status = $this->input->get('status');

        $this->query = $this->input->get('query');

        $this->adminbreadcrumbs->unshift(0, 'Home', "administrator/home");

        $this->adminbreadcrumbs->unshift(1, 'Kontal', "administrator/kontak");

	}

	 public function index()
    {
        $this->adminpage_title->push('Kontak', 'Data Kontak');

        $config = $this->administratortemplate->pagination_list();

        $config['base_url'] = site_url(
            "administrator/kontak?per_page={$this->per_page}&query={$this->query}&user={$this->user}&status={$this->status}"
        );

        $config['per_page'] = $this->per_page;

        $config['total_rows'] = $this->kontak->get_all(null, null, 'num');

        $this->pagination->initialize($config);

        $this->data = array(
            'title' => 'Mitra',
            'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
			'adminpage_title' => $this->adminpage_title->show(),
            'data' => $this->kontak->get_all($this->per_page, $this->page),
            'num' => $config['total_rows'],
            'get_admin' => $this->kontak->get_admin(),
        );

       $this->administratortemplate->view('administrator/kontak/v_kontak', $this->data);
    }

   

     public function get($param = 0)
    {
        $get = $this->kontak->get($param);

        $this->adminpage_title->push('Kontak', 'Detail Kontak');

        $this->adminbreadcrumbs->unshift(2, 'Detail', "administrator/kontak/get");

        $this->data = array(
            'title' => $get->nama,
            'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
            'adminpage_title' => $this->adminpage_title->show(),
            'get' => $get
        );

        $this->administratortemplate->view('administrator/kontak/detail-kontak', $this->data);
    }
	
    public function delete($param = 0)
    {
        $this->kontak->delete($param);

        redirect('administrator/kontak');
    }

    public function bulk_action()
    {
        switch ( $this->input->post('action') ) 
        {
            case 'delete':
                $this->kontak->multiple_delete();
                break;
            default:
                # code...
                break;
        }

        redirect('administrator/kontak');
    }

     public function status($param = 0)
    {
        $this->kontak->status($param);

        redirect('administrator/kontak');
    } 	

}

