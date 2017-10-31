<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * E-Pengaduan Controller
 *
 * @package administrator/controller
 * @author Vicky Nitinegoro <pkpvicky@gmail.com>
 **/

class Pengaduan extends CI_Controller 
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

        $this->load->model('admin/mpengaduan','pengaduan');

        $this->load->model('admin/user');

        $this->breadcrumbs->unshift(0, 'Dashboard', "administrator/home");

        $this->breadcrumbs->unshift(1, 'Pengaduan', "administrator/pengaduan");
    }

    public function index()
    {
        $this->page_title->push('Pengaduan', 'Data Pengaduan Masyarakat');

        $config = $this->template->pagination_list();

        $config['base_url'] = site_url("administrator/pengaduan?per_page={$this->per_page}&query={$this->query}");

        $config['per_page'] = $this->per_page;
        $config['total_rows'] = $this->pengaduan->get_all(null, null, 'num');

        $this->pagination->initialize($config);

        $this->data = array(
            'title' => 'Pengaduan',
            'pengaduan' => $this->pengaduan->get_all($this->per_page, $this->page),
            'num_pengaduan' => $config['total_rows']
        );

       $this->admintemplate->view('administrator/pengaduan/data-pengaduan', $this->data);
    }
      
    public function get($param = 0)
    {
        $get = $this->pengaduan->get($param);

        $this->page_title->push('Pengaduan', $get->judul);

        $this->breadcrumbs->unshift(2, $get->judul, "administrator/pengaduan/get");

        $this->data = array(
            'title' => $get->judul,
            'get' => $get
        );

       $this->admintemplate->view('administrator/pengaduan/detail-pengaduan', $this->data);
    }

    public function update($param = 0)
    {
        $this->pengaduan->update($param);
        
        redirect("administrator/pengaduan/get/{$param}");
    }

    public function delete($param = 0)
    {
        $this->pengaduan->delete($param);

        redirect('administrator/pengaduan');
    }

    public function bulk_action()
    {
        switch ( $this->input->post('action') ) 
        {
            case 'delete':
                $this->pengaduan->multiple_delete();
                break;
            default:
                # code...
                break;
        }

        redirect('administrator/pengaduan');
    }

    public function penilaian($param = 0, $user=0)
    {
        $get = $this->pengaduan->penilaian($param,$this->input->get('user'));

        $this->page_title->push('Penilaian', $get->ID_penilaian);

        $this->breadcrumbs->unshift(2, $get->ID_penilaian, "administrator/pengaduan/peilaian");

        $this->data = array(
            'title' => $get->ID_penilaian,
            'get' => $get
        );

       $this->admintemplate->view('administrator/pengaduan/detail-penilaian', $this->data);
    }

}

/* End of file Epengaduan.php */
/* Location: ./application/controllers/Epengaduan.php */