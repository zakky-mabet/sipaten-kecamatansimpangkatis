<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 *
 * @package Controller universe
 * @author Teitra Mega Team <teitramega@gmail.com>
 **/
class Utama extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_syarat_ijin');
	}

	public function index()
	{
		$data = array(
			'title' => 'Portal - PAKISS - Simpang Katis Informations And Services - Kabupaten Bangka Tengah',
			'crumb' => 'Portal'  
			);
		$this->templateportal->view('main/portal', $data);
	}

	

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */