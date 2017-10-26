<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('mdownload','mberita','mevents'));

		$this->breadcrumbs->unshift(0, 'Beranda', ' ');

        $this->breadcrumbs->unshift(1, 'Download', "download");

        $this->per_page = (!$this->input->get('per_page')) ? 20 : $this->input->get('per_page');

        $this->page = $this->input->get('page');

        $this->query = $this->input->get('query');

        $this->kategori = $this->input->get('kategori');
	}

	public function index()
	{	
		
		$this->page_title->push('Download', 'Data Download Kecamatan Koba');
		
		$config = $this->template->pagination_list();

        $config['base_url'] = site_url("download?per_page={$this->per_page}&kategori={$this->kategori}&query={$this->query}"
        );

        $config['per_page'] = $this->per_page;
        $config['total_rows'] = $this->mdownload->get_all(null, null, 'num');

        $this->pagination->initialize($config);

		$this->data = array(

            'title' => 'Download Kecamatan Koba',
            'berita_populer' => $this->mberita->berita_populer(),
            'events_populer' => $this->mevents->events_populer(),
            'get_all' => $this->mdownload->get_all($this->per_page, $this->page),
            'num' => $config['total_rows'],
        );
        
        $this->template->view('download/v-download', $this->data);

	}	

	function get($filename = NULL) {
    // load download helder
    $this->load->helper('download');
    // read file contents
    $data = file_get_contents(base_url('assets/images/download/'.$filename));
    force_download($filename, $data);
	}
	
	// public function get($slug = '')
	// {
	// 	if (!$slug) {
	// 		show_404();
	// 	}
	// 	$gets = $this->mdownload->get_detail($slug);

	// 	$this->maparatur->uphit($slug);
		
	// 	$this->page_title->push('Detail Aparatur', $gets->nama_lengkap);
		
	// 	$this->data = array(
 //            'title' => 'Detail Aparatur - '.$gets->nama_lengkap,
 //            'get' => $this->maparatur->get_detail($slug),
 //            'get_pimpinan' => $this->maparatur->get_pimpinan(),
 //            'berita_populer' => $this->mberita->berita_populer(),
 //            'events_populer' => $this->mevents->events_populer(),
 //        );

 //        $this->template->view('aparatur/v-aparatur-detail', $this->data);
	// }
			

}
