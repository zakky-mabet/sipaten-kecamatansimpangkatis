<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penduduk extends CI_Controller 
{
    public $data = array();

    public $per_page;

    public $page = 20;

    public $desa;

    public $gender;

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
        $this->load->library(
            array('form_validation','template','user_agent','upload','slug','page_title','breadcrumbs','pagination')
        );

        $this->load->helper(array('form', 'url','admin'));

        $this->load->model('admin/mpenduduk','penduduk');

        $this->load->model('admin/user');

        $this->per_page = (!$this->input->get('per_page')) ? 20 : $this->input->get('per_page');

        $this->page = $this->input->get('page');

        $this->desa = $this->input->get('village');

        $this->gender = $this->input->get('gender');

        $this->query = $this->input->get('query');

        $this->breadcrumbs->unshift(0, 'Dashboard', "administrator/home");

        $this->breadcrumbs->unshift(1, 'Penduduk', "administrator/penduduk");
    }

    public function index()
    {
        $this->page_title->push('Kependudukan', 'Data Kependudukan');

        $config = $this->admintemplate->pagination_model();

        $config = $this->template->pagination_list();

        $config['base_url'] = site_url(
            "administrator/penduduk?per_page={$this->per_page}&query={$this->query}&village={$this->desa}&gender={$this->gender}"
        );

        $config['per_page'] = $this->per_page;
        $config['total_rows'] = $this->penduduk->get_all(null, null, 'num');

        $this->pagination->initialize($config);

        $this->data = array(
             'title' => 'Kependudukan',
            'penduduk' => $this->penduduk->get_all($this->per_page, $this->page),
            'num' => $config['total_rows']
        );

       $this->admintemplate->view('administrator/penduduk/data-penduduk', $this->data);
    }
      
    public function get($param = 0)
    {
        $get = $this->penduduk->get($param);

        $this->page_title->push('Kependudukan', 'Data Kependudukan');

        $this->breadcrumbs->unshift(2, $get->nama_lengkap, "administrator/penduduk/get");

        $this->form_validation->set_rules('nik', 'NIK', 'trim|callback_validate_nik|required');
        $this->form_validation->set_rules('kk', 'No. KK', 'trim|required');
        $this->form_validation->set_rules('status_kk', 'Status Hubungan KK', 'trim|required');
        $this->form_validation->set_rules('name', 'Nama', 'trim|required');
        $this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'trim|required');
        $this->form_validation->set_rules('birts', 'Tanggal Lahir', 'trim|required');
        $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'trim|required');
        $this->form_validation->set_rules('agama', 'Agama', 'trim|required');
        $this->form_validation->set_rules('status_kawin', 'Status Perkawinan', 'trim|required');
        $this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraaan', 'trim|required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required');
        $this->form_validation->set_rules('gol_darah', 'Golongan Darah', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('rt', 'RT', 'trim|is_numeric|required');
        $this->form_validation->set_rules('rw', 'RW', 'trim|is_numeric|required');
        $this->form_validation->set_rules('desa', 'Desa / Kelurahan', 'trim|required');

        if ($this->form_validation->run() == TRUE)
        {
            $this->penduduk->update($param);

            redirect(current_url());
        }

        $this->data = array(
            'title' => $get->nama_lengkap,
            'get' => $get
        );

       $this->admintemplate->view('administrator/penduduk/update-penduduk', $this->data);
    }

    public function detail($param = 0)
    {
        if (!$param) {
            show_404();
        }
        error_reporting(0);
        $get = $this->penduduk->detail($param);

        $this->page_title->push('Kependudukan', 'Data Kependudukan');

        $this->breadcrumbs->unshift(1   , 'Detail '.$get->nama_lengkap, "administrator/penduduk/detail/".$param);


        $this->data = array(
            'title' => 'Detail '.$get->nama_lengkap,
            'get' => $get,
        );
        
       $this->admintemplate->view('administrator/penduduk/detail-penduduk-user', $this->data);
    }

    public function delete($param = 0)
    {
        $this->penduduk->delete($param);

        redirect('administrator/penduduk');
    }

    public function bulk_action()
    {
        switch ( $this->input->post('action') ) 
        {
            case 'delete':
                $this->penduduk->multiple_delete();
                break;
            default:
                # code...
                break;
        }

        redirect('administrator/penduduk');
    }

    /**
     * Check Ketersediaan NIK
     *
     * @return string
     **/
    public function validate_nik()
    {
        if($this->penduduk->nik_check($this->input->post('ID')) == TRUE)
        {
            $this->form_validation->set_message('validate_nik', 'Maaf NIK ini telah digunakan.');
            return false;
        } else {
            return true;
        }
    }
}

/* End of file Epengaduan.php */
/* Location: ./application/controllers/Epengaduan.php */