<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Syarat extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('msyarat','mwidget_organisasi','mberita','mevents'));

		$this->breadcrumbs->unshift(0, 'Beranda', ' ');

        $this->breadcrumbs->unshift(1, 'Syarat dan Ketentuan', "syarat");

	}

	public function index()
	{	
		
		$this->msyarat->uphit(2);
		$this->page_title->push('Syarat dan Ketentuan', 'Syarat dan Ketentuan Kecamatan Koba');
		$this->data = array(
            'title' => 'Syarat dan Ketentuan',
            'get'	=> $this->msyarat->get_all(),
            'berita_populer' => $this->mberita->berita_populer(),
            'events_populer' => $this->mevents->events_populer(),
        );

       $this->template->view('syarat-dan-ketentuan/v-syarat-dan-ketentuan', $this->data);
	}	


}
