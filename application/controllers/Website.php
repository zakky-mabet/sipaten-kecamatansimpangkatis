<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 *
 * @package Controller universe
 * @author Teitra Mega Team <teitramega@gmail.com>
 **/
class Website extends CI_Controller {

	public function index()
	{
		$data = array(
			'title' => 'Website Portal -  Kecamatan Koba - Kabupaten Bangka Tengah',
			'crumb' => 'E-Pelayanan',
			);
		$this->template->view('main/website/maintenance', $data);
	}

}

/* End of file Website.php */
/* Location: ./application/controllers/Website.php */