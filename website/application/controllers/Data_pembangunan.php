<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_pembangunan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('mdata_pembangunan','mberita','mevents'));

		$this->breadcrumbs->unshift(0, 'Beranda', ' ');

        $this->breadcrumbs->unshift(1, 'Data Pembangunan', "data-pembangunan");

        $this->per_page = (!$this->input->get('per_page')) ? 20 : $this->input->get('per_page');

        $this->page = $this->input->get('page');

        $this->query = $this->input->get('query');

        $this->kategori = $this->input->get('kategori');
	}

	public function index()
	{	
		
		$this->page_title->push('Data Pembangunan', 'Data Pembangunan Kecamatan Koba');
		
		$config = $this->template->pagination_list();

        $config['base_url'] = site_url("data-pembangunan?per_page={$this->per_page}&kategori={$this->kategori}&query={$this->query}"
        );

        $config['per_page'] = $this->per_page;
        $config['total_rows'] = $this->mdata_pembangunan->get_all(null, null, 'num');

        $this->pagination->initialize($config);

		$this->data = array(

            'title' => 'Data Pembangunan Kecamatan Koba',
            'berita_populer' => $this->mberita->berita_populer(),
            'events_populer' => $this->mevents->events_populer(),
            'get_all' => $this->mdata_pembangunan->get_all($this->per_page, $this->page),
            'num' => $config['total_rows'],
        );
        
        $this->template->view('data-pembangunan/v-data-pembangunan', $this->data);

	}	

    public function download($query ='',$lokasi ='', $tahun ='')
    {   
        
        $this->page_title->push('Data Pembangunan', 'Data Pembangunan Kecamatan Koba');
        
        $config = $this->template->pagination_list();

        $config['base_url'] = site_url("data_pembangunan/download?tahun={$this->input->get('tahun')}&lokasi={$this->input->get('lokasi')}&query={$this->input->get('que')}"
        );

        $config['per_page'] = $this->per_page;
        $config['total_rows'] = $this->mdata_pembangunan->get_all(null, null, 'num');

        $this->pagination->initialize($config);

        $this->data = array(

            'title' => 'Data Pembangunan Kecamatan Koba',
            'berita_populer' => $this->mberita->berita_populer(),
            'events_populer' => $this->mevents->events_populer(),
            'get_all' => $this->mdata_pembangunan->get_all($this->per_page, $this->page),
            'num' => $config['total_rows'],
        );
        
        $this->load->view('data-pembangunan/v-data-pembangunan-excel', $this->data);

    }   

}
