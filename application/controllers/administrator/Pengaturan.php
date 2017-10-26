<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 *
 * @package administrator/controller
 * @author Teitra Mega Team <teitramega@gmail.com>
 **/

class Pengaturan extends CI_Controller 
{
    public $data = array();

    public $per_page;

    public $page = 20;

    public $query;

    public function __construct( )
    {
        parent::__construct();

        if ( ! $this->session->userdata('admin_login') )
        {
            $this->template->alert(
                'Silahkan Login.', 
                array('type' => 'danger','icon' => 'close'));

            redirect('administrator/login');
        } 

        $this->per_page = (!$this->input->get('per_page')) ? 20: $this->input->get('per_page');

        $this->page = $this->input->get('page');

        $this->query = $this->input->get('query');

        $this->load->library(
            array('form_validation','template','user_agent','upload','slug','page_title','breadcrumbs','pagination')
        );

        $this->load->helper(array('form', 'url','admin'));

        $this->load->model('admin/mpengaturan','pengaturan');

        $this->load->model('admin/user');

        $this->breadcrumbs->unshift(0, 'Dashboard', "administrator/home");

        $this->breadcrumbs->unshift(1, 'Pengaturan', "administrator/pengaturan");
    }

    public function index()
    {
        $this->page_title->push('Pengaturan', 'Penguna Sistem');

        $config = $this->template->pagination_list();

        $config['base_url'] = site_url("administrator/pengaturan?per_page={$this->per_page}&query={$this->query}");

        $config['per_page'] = $this->per_page;
        $config['total_rows'] = $this->pengaturan->get_all(null, null, 'num');

        $this->pagination->initialize($config);

        $this->data = array(
            'title' => 'Pengaturan Penguna Sistem',
            'data' => $this->pengaturan->get_all($this->per_page, $this->page),
            'num_total' => $config['total_rows']
        );

       $this->admintemplate->view('administrator/pengaturan/data-pengaturan', $this->data);
    }

    public function create()
    {
        $this->page_title->push('Pengguna Sistem', 'Tambah Pengguna');
        $this->breadcrumbs->unshift(2, 'Tambah', "pengaturan/create");

        $this->form_validation->set_rules('username', 'username', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]|required');
        $this->form_validation->set_rules('repeat_pass', 'Ulangi Password', 'trim|matches[password]|required');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('no_hp', 'Telepon', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('status', 'Status', 'trim|required');
        $this->form_validation->set_rules('hak_akses', 'Level Akses', 'trim|required');

        if ($this->form_validation->run() == TRUE)
        {
            $this->pengaturan->create();

            redirect(current_url());
        }

        $this->data = array(
            'title' => "Tambah Pengguna", 
            'breadcrumb' => $this->breadcrumbs->show(),
            'page_title' => $this->page_title->show(),
        );

        $this->admintemplate->view('administrator/pengaturan/create-user', $this->data);
    }
      
    public function get($param = 0)
    {
        $get = $this->pengaturan->get($param);

        $this->page_title->push('Penguna Sistem', 'Suting ' .$get->username);

        $this->breadcrumbs->unshift(2, $get->username, "administrator/pengaduan/get");

        $this->data = array(
            'title' => $get->username,
            'get' => $get
        );

       $this->admintemplate->view('administrator/pengaturan/update-pengaturan-penguna', $this->data);
    }

    public function update($param = 0)
    {
            $this->pengaturan->update($param);
            redirect("administrator/pengaturan/get/{$param}");
    }


    public function delete($param = 0)
    {
        $this->pengaturan->delete($param);

        redirect('administrator/pengaturan');
    }

    public function bulk_action()
    {
        switch ( $this->input->post('action') ) 
        {
            case 'delete':
                $this->pengaturan->multiple_delete();
                break;
            default:
                # code...
                break;
        }

        redirect('administrator/pengaturan');
    }

}

/* End of file Epengaduan.php */
/* Location: ./application/controllers/Epengaduan.php */