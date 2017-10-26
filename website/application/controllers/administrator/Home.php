<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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

	$this->adminbreadcrumbs->unshift(0, 'Home', "administrator/home");

	
	
	}

		public function index(){

		$this->adminpage_title->push('Dashboard', 'Selamat datang di Administrator');

		$this->data = array(
			'title' => "Main Dashboard", 
			'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
			'adminpage_title' => $this->adminpage_title->show(),
			);

		$this->administratortemplate->view('administrator/v_home', $this->data);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/administrator/Home.php */