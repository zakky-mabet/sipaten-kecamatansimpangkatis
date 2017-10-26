<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pimpinan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('mpimpinan','mberita','mevents'));

		$this->breadcrumbs->unshift(0, 'Beranda', ' ');

        $this->breadcrumbs->unshift(1, 'Pimpinan', "pimpinan");

        $this->per_page = (!$this->input->get('per_page')) ? 20 : $this->input->get('per_page');

        $this->page = $this->input->get('page');

        $this->query = $this->input->get('query');

        $this->slug_kat = '';
	}

	public function index()
	{	
		
		$this->page_title->push('Pimpinan', 'Pimpinan Kecamatan Koba');
		
		$config = $this->template->pagination_list();

        $config['base_url'] = site_url("pimpinan?per_page={$this->per_page}"
        );

        $config['per_page'] = $this->per_page;
        $config['total_rows'] = $this->mpimpinan->get_all(null, null, 'num');

        $this->pagination->initialize($config);

		$this->data = array(

            'title' => 'Pimpinan Kecamatan Koba',
            'berita_populer' => $this->mberita->berita_populer(),
            'events_populer' => $this->mevents->events_populer(),
            'get_all' => $this->mpimpinan->get_all($this->per_page, $this->page),
            'num' => $config['total_rows']
        );
        
        $this->template->view('pimpinan/v-pimpinan', $this->data);

	}	

	public function get($slug = '')
	{
		if (!$slug) {
			show_404();
		}
		$gets = $this->mpimpinan->get_detail($slug);

		$this->mpimpinan->uphit($slug);
		
		$this->page_title->push('Detail Pimpinan', $gets->nama_lengkap);
		
		$this->data = array(
            'title' => 'Detail Pimpinan - '.$gets->nama_lengkap,
            'get' => $this->mpimpinan->get_detail($slug),
            'get_pimpinan' => $this->mpimpinan->get_pimpinan(),
            'berita_populer' => $this->mberita->berita_populer(),
            'events_populer' => $this->mevents->events_populer(),
        );

        $this->template->view('pimpinan/v-pimpinan-detail', $this->data);
	}
		
}
