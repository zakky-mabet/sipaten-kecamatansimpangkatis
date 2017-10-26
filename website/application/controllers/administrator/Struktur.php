<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Struktur extends CI_Controller {
	
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

        $this->load->model('administrator/mstruktur','struktur');

        $this->adminbreadcrumbs->unshift(0, 'Home', "administrator/home");

        $this->adminbreadcrumbs->unshift(1, 'Organisasi', "administrator/struktur/#");
		
		$this->adminbreadcrumbs->unshift(2, 'Struktur Organisasi', "administrator/struktur");
	}

	 public function index()
    {
        $this->adminpage_title->push('Struktur Organisasi', 'Data Struktur Organisasi');

        $this->data = array(
            'title' => 'Struktur',
            'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
			'adminpage_title' => $this->adminpage_title->show(),
            'data' => $this->struktur->get_all($this->per_page, $this->page),

        );

       $this->administratortemplate->view('administrator/struktur/v_struktur', $this->data);
    }

    public function get($param = 0)
    {
        $get = $this->struktur->get($param);

        $this->adminpage_title->push('Struktur', 'Update Struktur');

        $this->adminbreadcrumbs->unshift(2, 'Update', "administrator/struktur/get");
        
        $this->form_validation->set_rules('judul', 'Judul ', 'trim|required');

        if ($this->form_validation->run() == TRUE)
        {
            $this->struktur->update($param);

            redirect(current_url());
        }

        $this->data = array(
            'title' => $get->title,
            'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
            'adminpage_title' => $this->adminpage_title->show(),
            'get' => $get
        );

        $this->administratortemplate->view('administrator/struktur/update-struktur', $this->data);
    }
	

}

