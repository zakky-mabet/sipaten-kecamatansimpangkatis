<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array('mdata','mberita','mevents'));

		$this->breadcrumbs->unshift(0, 'Beranda', ' ');

        $this->breadcrumbs->unshift(1, 'Data', "data");

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
		$gets = $this->mdata->get_detail($slug);

		$this->mdata->uphit($slug);
		
		$this->page_title->push('Data', $gets->title);
		
		$this->data = array(
            'title' => ' Data - '.$gets->title,
            'get' => $this->mdata->get_detail($slug),
            'berita_populer' => $this->mberita->berita_populer(),
            'events_populer' => $this->mevents->events_populer(),
        );

        $this->template->view('data/v-data-detail', $this->data);
	}
			

}
