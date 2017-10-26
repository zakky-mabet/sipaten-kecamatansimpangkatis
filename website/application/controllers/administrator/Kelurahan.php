<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelurahan extends CI_Controller {
	
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

        $this->load->model('administrator/mkelurahan','kelurahan');

        $this->per_page = (!$this->input->get('per_page')) ? 20 : $this->input->get('per_page');

        $this->page = $this->input->get('page');

        $this->user = $this->input->get('user');

        $this->status = $this->input->get('status');

        $this->query = $this->input->get('query');

        $this->adminbreadcrumbs->unshift(0, 'Home', "administrator/home");
		
		$this->adminbreadcrumbs->unshift(1, 'Kelurahan/Desa', "administrator/kelurahan-desa");
	}

	 public function index()
    {
        $this->adminpage_title->push('Kelurahan/Desa', 'Data Kelurahan/Desa');

        $config = $this->administratortemplate->pagination_list();

        $config['base_url'] = site_url(
            "administrator/keluraha-desa?per_page={$this->per_page}&query={$this->query}&user={$this->user}&status={$this->status}"
        );

        $config['per_page'] = $this->per_page;

        $config['total_rows'] = $this->kelurahan->get_all(null, null, 'num');

        $this->pagination->initialize($config);

        $this->data = array(
            'title' => 'Kelurahan/Desa',
            'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
			'adminpage_title' => $this->adminpage_title->show(),
            'data' => $this->kelurahan->get_all($this->per_page, $this->page),
            'num' => $config['total_rows'],
            'get_admin' => $this->kelurahan->get_admin(),
        );

       $this->administratortemplate->view('administrator/kelurahan/v_kelurahan', $this->data);
    }

    public function create(){
    
    $this->adminpage_title->push('Kelurahan/Desa', 'Tambah Data Kelurahan/Desa');

    $this->breadcrumbs->unshift(2, 'Data Kelurahan/Desa', "administrator/kelurahan/create");

    $this->form_validation->set_rules('post[nama_desa]', 'Nama Kelurahan/Desa ', 'trim|required');
    $this->form_validation->set_rules('post[nama_kades]', 'Nama Kades', 'trim|required');
    $this->form_validation->set_rules('post[nip]', 'NIP ', 'trim|required');
    $this->form_validation->set_rules('post[pangkat]', 'Pangkat ', 'trim|required');
    $this->form_validation->set_rules('post[jabatan]', 'Jabatan ', 'trim|required');
    $this->form_validation->set_rules('post[tmp_lahir]', 'Tempat Lahir ', 'trim|required');
    $this->form_validation->set_rules('post[tgl_lahir]', 'Tanggal Lahir ', 'trim|required');
    $this->form_validation->set_rules('post[agama]', 'Agama ', 'trim|required');
    $this->form_validation->set_rules('post[hobbi]', 'Hobi ', 'trim|required');
    $this->form_validation->set_rules('post[motto_hidup]', 'Motto Hidup Kades ', 'trim|required');
    $this->form_validation->set_rules('post[alamat]', 'Alamat', 'trim|required');
    $this->form_validation->set_rules('post[email_desa]', 'Email Kelurahan/Desa ', 'trim|required');
    $this->form_validation->set_rules('post[alamat_website]', 'Alamat Website ', 'trim|required');
    $this->form_validation->set_rules('post[luas_wilayah]', 'Luas Wilayah ', 'trim|required|is_numeric');
    $this->form_validation->set_rules('post[jmlh_rt]', 'Jumlah RT ', 'trim|required|is_numeric');
    $this->form_validation->set_rules('post[jmlh_rw]', 'Jumlah RW ', 'trim|required|is_numeric');
    $this->form_validation->set_rules('post[jmlh_penduduk]', 'Jumlah Penduduk ', 'trim|required|is_numeric');
    $this->form_validation->set_rules('post[alamat_kantor]', 'Alamat Kantor', 'trim|required');

    if ($this->form_validation->run() == TRUE){

       $this->kelurahan->create();
       redirect(current_url());
    }

    $this->data = array(
        'title' => "Tambah Data Kelurahan/Desa",
        'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
        'adminpage_title' => $this->adminpage_title->show(),
        );

    $this->administratortemplate->view('administrator/kelurahan/create-kelurahan', $this->data);
    }

     public function get($param = 0)
    {
        $get = $this->kelurahan->get($param);

        $this->adminpage_title->push('Kelurahan/Desa', 'Update Kelurahan/Desa');

        $this->adminbreadcrumbs->unshift(2, 'Update', "administrator/kelurahan-desa/get");
        

        $this->form_validation->set_rules('post[nama_desa]', 'Nama Kelurahan/Desa ', 'trim|required');
        $this->form_validation->set_rules('post[nama_kades]', 'Nama Kades', 'trim|required');
        $this->form_validation->set_rules('post[nip]', 'NIP ', 'trim|required');
        $this->form_validation->set_rules('post[pangkat]', 'Pangkat ', 'trim|required');
        $this->form_validation->set_rules('post[jabatan]', 'Jabatan ', 'trim|required');
        $this->form_validation->set_rules('post[tmp_lahir]', 'Tempat Lahir ', 'trim|required');
        $this->form_validation->set_rules('post[tgl_lahir]', 'Tanggal Lahir ', 'trim|required');
        $this->form_validation->set_rules('post[agama]', 'Agama ', 'trim|required');
        $this->form_validation->set_rules('post[hobbi]', 'Hobi ', 'trim|required');
        $this->form_validation->set_rules('post[motto_hidup]', 'Motto Hidup Kades ', 'trim|required');
        $this->form_validation->set_rules('post[alamat]', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('post[email_desa]', 'Email Kelurahan/Desa ', 'trim|required');
        $this->form_validation->set_rules('post[alamat_website]', 'Alamat Website ', 'trim|required');
        $this->form_validation->set_rules('post[luas_wilayah]', 'Luas Wilayah ', 'trim|required|is_numeric');
        $this->form_validation->set_rules('post[jmlh_rt]', 'Jumlah RT ', 'trim|required|is_numeric');
        $this->form_validation->set_rules('post[jmlh_rw]', 'Jumlah RW ', 'trim|required|is_numeric');
        $this->form_validation->set_rules('post[jmlh_penduduk]', 'Jumlah Penduduk ', 'trim|required|is_numeric');
        $this->form_validation->set_rules('post[alamat_kantor]', 'Alamat Kantor', 'trim|required');

        if ($this->form_validation->run() == TRUE)
        {
            $this->kelurahan->update($param);
            redirect(current_url());
        }

        $this->data = array(
            'title' => $get->nama_desa,
            'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
            'adminpage_title' => $this->adminpage_title->show(),
            'get' => $get
        );

        $this->administratortemplate->view('administrator/kelurahan/update-kelurahan', $this->data);
    }
	
    public function delete($param = 0)
    {
        $this->kelurahan->delete($param);

        redirect('administrator/kelurahan-desa');
    }

    public function bulk_action()
    {
        switch ( $this->input->post('action') ) 
        {
            case 'delete':
                $this->kelurahan->multiple_delete();
                break;
            default:
                # code...
                break;
        }

        redirect('administrator/kelurahan-desa');
    }	

    public function status($param = 0)
    {
        $this->kelurahan->status($param);

        redirect('administrator/kelurahan-desa');
    }   

}

