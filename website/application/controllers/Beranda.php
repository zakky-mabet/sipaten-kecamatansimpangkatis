<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('mwidget_organisasi','mberita','mevents','setting' ));

		$this->breadcrumbs->unshift(0, 'Beranda', "home");
	}

	public function index()
	{	
		$this->data = array(
            'title' => 'Beranda',
            'berita_slide' => $this->mberita->berita_slide(),
            'berita_list' => $this->mberita->berita_list(),
            'events_list' => $this->mevents->events_list(),
            'mitra' => $this->setting->mitra(),
            'slider' => $this->setting->slider(),
            'get_all_camat' => $this->setting->get_all_camat(),
            'foto_album' => $this->setting->foto_album(),
        );

       $this->template->view('v-beranda', $this->data);
	}

	public function kontak()
	{	
	
	$this->form_validation->set_rules('nama', 'Nama ', 'trim|required');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('subjek', 'Subjek', 'trim|required');
    $this->form_validation->set_rules('pesan', 'Pesan', 'trim|required');

    if ($this->form_validation->run() == TRUE){

        $this->setting->create();
        redirect(current_url());
    }

		$this->data = array(
            'title' => 'Kontak Kecamatan Simpang Katis',
        );

       $this->template->view('kontak/kontak', $this->data);
	}

	public function not_found_404()
	{
		$this->data = array(
            'title' => 'Halaman Tidak ditemukan - Error 404',
        );

       $this->template->view('404', $this->data);
	}
}
