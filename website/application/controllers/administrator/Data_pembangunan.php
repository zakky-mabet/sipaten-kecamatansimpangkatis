<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_pembangunan extends CI_Controller {
	
	public $data = array();

    public $per_page;

    public $page = 20;

    public $user;

    public $status;

    public $query;

	public function __construct()
	{
		parent::__construct();
		 if ( ! $this->session->userdata('admin_login')) :
            $this->administratortemplate->alert(
                'Silahkan Login !', 
                array('type' => 'danger','icon' => 'close')
            );
            redirect('administrator/login');
            return;
        endif;

         if ( $this->session->userdata('akun_hak_admin') != 'khusus_pembangunan' ) :
            $this->administratortemplate->alert(
                'Silahkan Login !', 
                array('type' => 'danger','icon' => 'close')
            );
            redirect('administrator/login');
            return;
        endif;

        $this->load->model('administrator/mdata_pembangunan','pembangunan');

        $this->load->model('administrator/mdata_pembangunan');

        $this->per_page = (!$this->input->get('per_page')) ? 20 : $this->input->get('per_page');

        $this->page = $this->input->get('page');

        $this->user = $this->input->get('user');

        $this->status = $this->input->get('status');

        $this->lokasi = $this->input->get('lokasi');

        $this->query = $this->input->get('query');

        $this->adminbreadcrumbs->unshift(0, 'Home', "administrator/home");

        $this->adminbreadcrumbs->unshift(1, 'Pembangunan', "administrator/pembangunan/#");

	}

	 public function index()
    {
        $this->adminpage_title->push('Pembangunan', 'Data Pembangunan');

        $config = $this->administratortemplate->pagination_list();

        $config['base_url'] = site_url(
            "administrator/data_pembangunan?per_page={$this->per_page}&query={$this->query}&user={$this->user}&status={$this->status}&lokasi={$this->lokasi}"
        );

        $config['per_page'] = $this->per_page;

        $config['total_rows'] = $this->pembangunan->get_all(null, null, 'num');

        $this->pagination->initialize($config);

        $this->data = array(
            'title' => 'Data Pembangunan',
            'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
			'adminpage_title' => $this->adminpage_title->show(),
            'data' => $this->pembangunan->get_all($this->per_page, $this->page),
            'num' => $config['total_rows'],
            'get_admin' => $this->pembangunan->get_admin(),
        );

       $this->administratortemplate->view('administrator/data-pembangunan/v_data_pembangunan', $this->data);
    }

    public function create(){
    
    $this->adminpage_title->push('Pembangunan', 'Tambah Data Pembangunan');

    $this->breadcrumbs->unshift(2, 'Data Pembangunan', "administrator/data_pembangunan/create");
    
    $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan ', 'trim|required');
    $this->form_validation->set_rules('lokasi', 'Lokasi ', 'trim|required');
    $this->form_validation->set_rules('sasaran', 'Sasaran ', 'trim|required');
    $this->form_validation->set_rules('volume', 'Volume ', 'trim|required');
    $this->form_validation->set_rules('dana', 'Dana ', 'trim|required');
    $this->form_validation->set_rules('sumber', 'Sumber ', 'trim|required');
    $this->form_validation->set_rules('tahun', 'Tahun ', 'trim|required');
    $this->form_validation->set_rules('pola_pelaksanaan', 'Pola Pelaksanaan ', 'trim|required');
    $this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab ', 'trim|required');

    if ($this->form_validation->run() == TRUE){

        $this->pembangunan->create();
        redirect(current_url());
    }

    $this->data = array(
        'title' => "Tambah Data Pembangunan",
        'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
        'adminpage_title' => $this->adminpage_title->show(),

        );

    $this->administratortemplate->view('administrator/data-pembangunan/create-data-pembangunan', $this->data);
    }

     public function get($param = 0)
    {
        $get = $this->pembangunan->get($param);

        $this->adminpage_title->push('Pembangunan', 'Update Pembangunan');

        $this->adminbreadcrumbs->unshift(2, 'Update', "administrator/pembangunan/get");
         
       $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan ', 'trim|required');
        $this->form_validation->set_rules('lokasi', 'Lokasi ', 'trim|required');
        $this->form_validation->set_rules('sasaran', 'Sasaran ', 'trim|required');
        $this->form_validation->set_rules('volume', 'Volume ', 'trim|required');
        $this->form_validation->set_rules('dana', 'Dana ', 'trim|required');
        $this->form_validation->set_rules('sumber', 'Sumber ', 'trim|required');
        $this->form_validation->set_rules('tahun', 'Tahun ', 'trim|required');
        $this->form_validation->set_rules('pola_pelaksanaan', 'Pola Pelaksanaan ', 'trim|required');
        $this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab ', 'trim|required');

   

        if ($this->form_validation->run() == TRUE)
        {
            $this->pembangunan->update($param);

            redirect(current_url());
        }

        $this->data = array(
            'title' => $get->nama_kegiatan,
            'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
            'adminpage_title' => $this->adminpage_title->show(),
            'get' => $get
        );

        $this->administratortemplate->view('administrator/data-pembangunan/update-data-pembangunan', $this->data);
    }
	
    public function delete($param = 0)
    {
        $this->pembangunan->delete($param);

        redirect('administrator/data_pembangunan');
    }

    public function bulk_action()
    {
        switch ( $this->input->post('action') ) 
        {
            case 'delete':
                $this->pembangunan->multiple_delete();
                break;
            default:
                # code...
                break;
        }

        redirect('administrator/data_pembangunan');
    }	

     public function status($param = 0)
    {
        $this->mdata_pembangunan->status($param);

        redirect('administrator/data_pembangunan');
    }   

}

