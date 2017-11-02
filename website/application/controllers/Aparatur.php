<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aparatur extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('maparatur','mberita','mevents'));

		$this->breadcrumbs->unshift(0, 'Beranda', ' ');

        $this->breadcrumbs->unshift(1, 'Aparatur', "aparatur");

        $this->per_page = (!$this->input->get('per_page')) ? 20 : $this->input->get('per_page');

        $this->page = $this->input->get('page');

        $this->query = $this->input->get('query');

        $this->slug_kat = '';
	}

	public function index()
	{	
		
		$this->page_title->push('Aparatur', 'Aparatur Kecamatan Simpang Katis');
		
		$config = $this->template->pagination_list();

        $config['base_url'] = site_url("aparatur?per_page={$this->per_page}"
        );

        $config['per_page'] = $this->per_page;
        $config['total_rows'] = $this->maparatur->get_all(null, null, 'num');

        $this->pagination->initialize($config);

		$this->data = array(

            'title' => 'Aparatur Kecamatan Simpang Katis',
            'berita_populer' => $this->mberita->berita_populer(),
            'events_populer' => $this->mevents->events_populer(),
            'get_all' => $this->maparatur->get_all($this->per_page, $this->page),
            'num' => $config['total_rows']
        );
        
        $this->template->view('aparatur/v-aparatur', $this->data);

	}	

	public function get($slug = '')
	{
		if (!$slug) {
			show_404();
		}
		$gets = $this->maparatur->get_detail($slug);

		$this->maparatur->uphit($slug);
		
		$this->page_title->push('Detail Aparatur', $gets->nama_lengkap);
		
		$this->data = array(
            'title' => 'Detail Aparatur - '.$gets->nama_lengkap,
            'get' => $this->maparatur->get_detail($slug),
            'get_pimpinan' => $this->maparatur->get_pimpinan(),
            'berita_populer' => $this->mberita->berita_populer(),
            'events_populer' => $this->mevents->events_populer(),
        );

        $this->template->view('aparatur/v-aparatur-detail', $this->data);
	}

	public function has()
	{
		print_r( password_hash('12345', PASSWORD_DEFAULT));
	}
			

}
