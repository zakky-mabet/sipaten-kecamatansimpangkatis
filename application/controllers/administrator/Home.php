<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Main Controller
 *
 * @package administrator/controller
 * @author Vicky Nitinegoro <pkpvicky@gmail.com>
 **/

class Home extends CI_Controller 
{
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

        $this->load->library(array('form_validation','template','user_agent','upload','slug','page_title','breadcrumbs'));

        $this->load->helper(array('form', 'url','date'));

        $this->load->model('admin/user');

        $this->page_title->push('Dashboard', 'Selamat Datang di Administrator');
    }

    public function index()
    {
        $this->data = array(
            'title' => 'Dashboard ',
        );

       $this->admintemplate->view('administrator/dashboard/data-dashboard', $this->data);
    }
}

/* End of file Epengaduan.php */
/* Location: ./application/controllers/Epengaduan.php */