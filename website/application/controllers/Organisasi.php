<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organisasi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('morganisasi','mwidget_organisasi','mberita','mevents'));

		$this->breadcrumbs->unshift(0, 'Beranda', ' ');

        $this->breadcrumbs->unshift(1, 'Organisasi Kecamatan Simpang Katis', "organisasi");

	}

	public function index()
	{	
		
		$this->morganisasi->uphit(1);
		$this->page_title->push('Organisasi', 'Struktur Organisasi Kecamatan Simpang Katis');
		$this->data = array(
            'title' => 'Struktur Organisasi Kecamatan Simpang Katis',
            'get'	=> $this->morganisasi->get_all(),
            'berita_populer' => $this->mberita->berita_populer(),
            'events_populer' => $this->mevents->events_populer(),
        );

       $this->template->view('organisasi/v-organisasi', $this->data);
	}	


}
