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
			'title' => 'Portal - KISS - Koba District Information And Service Center - Kabupaten Bangka Tengah',
			'crumb' => 'Portal'  
			);
		$this->templateportal->view('main/portal', $data);
	}


	// public function syarat_ijin()
	// {
	// 	$data = array(
	// 		'title' => 'Persyaratan Perizinan - KISS - Koba District Information And Service Center - Kabupaten Bangka Tengah',
	// 		'crumb' => 'Persyaratan Perizinan',
	// 		'value' => $this->m_syarat_ijin->all(), 
	// 		);
	// 	$this->template->view('main/syarat_ijin', $data);
	// }

	// public function prosedur_ijin()
	// {
	// 	$data = array(
	// 		'title' => 'Prosedur Perizinan - KISS - Koba District Information And Service Center - Kabupaten Bangka Tengah',
	// 		'crumb' => 'Prosedur Perizinan'  
	// 		);
	// 	$this->template->view('main/prosedur_ijin', $data);
	// }

	// public function get_prosedur_ijin()
	// {
	// 	$get = $this->m_syarat_ijin->all();
	// 	$output = array(
	// 		'status' => TRUE, 
	// 		'data' => 	array(
	// 		'title' => $get->title,
	// 		'description' => $get->description
	// 		)
	// 	);
	// 	$this->output->set_content_type('application/json')->set_output(json_encode($output));
	// }

	

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */