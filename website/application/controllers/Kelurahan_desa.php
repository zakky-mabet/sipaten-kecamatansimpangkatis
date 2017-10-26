<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelurahan_desa extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('mkelurahan','mberita','mevents'));

		$this->breadcrumbs->unshift(0, 'Beranda', ' ');

        $this->breadcrumbs->unshift(1, 'Kelurahan/Desa', "kelurahan-desa");
	}

	public function index()
	{	
		redirect(site_url('beranda/404'),'refresh');

	}	

	public function get($slug = '')
	{
		if (!$slug) {
			show_404();
		}

		$gets = $this->mkelurahan->get_detail($slug);

		$this->mkelurahan->uphit($slug);
		
		$this->page_title->push('Kelurahan/Desa', $gets->nama_desa);
		
		$this->data = array(
            'title' => ' Kelurahan/Desa - '.$gets->nama_desa,
            'get' => $this->mkelurahan->get_detail($slug),
            'get_perangkat' => $this->mkelurahan->get_perangkat($slug),
            'berita_populer' => $this->mberita->berita_populer(),
            'events_populer' => $this->mevents->events_populer(),
        );

        $this->template->view('kelurahan/v-kelurahan-detail', $this->data);
	}
			

}
