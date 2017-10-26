<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('mtentang','mberita','mevents'));

		$this->breadcrumbs->unshift(0, 'Beranda', ' ');

        $this->breadcrumbs->unshift(1, 'Profil', "tentang");

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
		$gets = $this->mtentang->get_detail($slug);

		$this->mtentang->uphit($slug);
		
		$this->page_title->push('Profil', $gets->title);
		
		$this->data = array(
            'title' => ' Profil - '.$gets->title,
            'get' => $this->mtentang->get_detail($slug),

            'berita_populer' => $this->mberita->berita_populer(),
            'events_populer' => $this->mevents->events_populer(),
        );

        $this->template->view('tentang/v-tentang-detail', $this->data);
	}
			

}
