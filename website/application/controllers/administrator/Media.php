<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends CI_Controller {
	
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

        $this->load->model('administrator/mmedia','media');

        $this->per_page = (!$this->input->get('per_page')) ? 20 : $this->input->get('per_page');

        $this->page = $this->input->get('page');

        $this->user = $this->input->get('user');

        $this->status = $this->input->get('status');

        $this->query = $this->input->get('query');

        $this->hak_akses = $this->input->get('hak_akses');

        $this->adminbreadcrumbs->unshift(0, 'Home', "administrator/home");

        $this->adminbreadcrumbs->unshift(1, 'Media Sosial', "administrator/media");

	}

	 public function index()
    {
        $this->adminpage_title->push('Media Sosial', 'Data Media Sosial');

        $config = $this->administratortemplate->pagination_list();

        $config['base_url'] = site_url(
            "administrator/media?per_page={$this->per_page}&query={$this->query}&hak_akses={$this->hak_akses}&status={$this->status}"
        );

        $config['per_page'] = $this->per_page;

        $config['total_rows'] = $this->media->get_all(null, null, 'num');

        $this->pagination->initialize($config);

        $this->data = array(
            'title' => 'Media Sosial',
            'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
			'adminpage_title' => $this->adminpage_title->show(),
            'data' => $this->media->get_all($this->per_page, $this->page),
            'num' => $config['total_rows'],
            'get_admin' => $this->media->get_admin(),
        );

       $this->administratortemplate->view('administrator/media/v_media', $this->data);
    }


     public function get($param = 0)
    {
        $get = $this->media->get($param);

        $this->adminpage_title->push('Media Sosial', 'Update Media Sosial');

        $this->adminbreadcrumbs->unshift(2, 'Update', "administrator/media/get");
        
        $this->form_validation->set_rules('title', 'Nama Sosial Media', 'trim|required');
        $this->form_validation->set_rules('link', 'Link', 'trim|required');  

        if ($this->form_validation->run() == TRUE)
        {
            $this->media->update($param);

            redirect(current_url());
        }

        $this->data = array(
            'title' => $get->title,
            'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
            'adminpage_title' => $this->adminpage_title->show(),
            'get' => $get
        );

        $this->administratortemplate->view('administrator/media/update-media', $this->data);
    }


     public function status($param = 0)
    {
        $this->media->status($param);

        redirect('administrator/media');
    } 	

}

