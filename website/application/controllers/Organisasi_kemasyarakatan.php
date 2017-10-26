<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organisasi_kemasyarakatan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('morganisasi_kemasyarakatan','mberita','mevents'));

		$this->breadcrumbs->unshift(0, 'Beranda', ' ');

        $this->breadcrumbs->unshift(1, 'Organisasi Kemasyarakat', "organisasi-kemasyarakatan");

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
		$gets = $this->morganisasi_kemasyarakatan->get_detail($slug);

		$this->morganisasi_kemasyarakatan->uphit($slug);
		
		$this->page_title->push('Organisasi Kemasyarakat', $gets->title);
		
		$this->data = array(
            'title' => ' Organisasi Kemasyarakat - '.$gets->title,
            'get' => $this->morganisasi_kemasyarakatan->get_detail($slug),
            'berita_populer' => $this->mberita->berita_populer(),
            'events_populer' => $this->mevents->events_populer(),
        );

        $this->template->view('organisasi-kemasyarakatan/v-organisasi-kemasyarakatan-detail', $this->data);
	}
			
}
