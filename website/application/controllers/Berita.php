<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('mberita'));

		$this->breadcrumbs->unshift(0, 'Beranda', ' ');

        $this->breadcrumbs->unshift(1, 'Berita', "berita");

        $this->per_page = (!$this->input->get('per_page')) ? 20 : $this->input->get('per_page');

        $this->page = $this->input->get('page');

        $this->query = $this->input->get('query');

        $this->slug_kat = '';
	}

	public function index()
	{	
		
		$this->page_title->push('Berita', 'Berita Kecamatan Koba');
		
		$config = $this->template->pagination_list();

        $config['base_url'] = site_url("berita?per_page={$this->per_page}"
        );

        $config['per_page'] = $this->per_page;
        $config['total_rows'] = $this->mberita->get_all(null, null, 'num');

        $this->pagination->initialize($config);

		$this->data = array(

            'title' => 'Berita Kecamatan Koba',
        
            'get_kategori'	=> $this->mberita->get_kategori(),
            'get_tags'	=> $this->mberita->get_tags(),
            'berita_populer' => $this->mberita->berita_populer(),
            'get_all' => $this->mberita->get_all($this->per_page, $this->page),
            'num' => $config['total_rows']
        );
        
        $this->template->view('berita/v-berita-portal', $this->data);
		
	}	

	public function kategori($slug_kat = '')
	{	
		if (!$slug_kat) {
			show_404();
		} 
		$this->page_title->push('Kategori Berita ', 'Berita Kecamatan Koba');

		$this->data = array(

            'title' => 'Kategori Berita Kecamatan Koba',
            'get_kategori'	=> $this->mberita->get_kategori(),
            'get_tags'	=> $this->mberita->get_tags(),
            'berita_populer' => $this->mberita->berita_populer(),
            'get_all_kat' => $this->mberita->get_all_kat($slug_kat),

        );
        
        $this->template->view('berita/v-berita-portal-kat', $this->data);
		
	}	

	public function tag($slug_kat='')
	{	
		if (!$slug_kat) {
			show_404();
		} 
		$this->page_title->push('Tags Berita ' , 'Berita Kecamatan Koba');

		$this->data = array(

            'title' => 'Tags Berita Kecamatan Koba',
            'get_kategori'	=> $this->mberita->get_kategori(),
            'get_tags'	=> $this->mberita->get_tags(),
            'berita_populer' => $this->mberita->berita_populer(),
            'get_all_kat' => $this->mberita->get_all_tags($slug_kat),

        );
        
        $this->template->view('berita/v-berita-portal-kat', $this->data);
		
	}	

	public function get($slug = '')
	{
		if (!$slug) {
			show_404();
		}
		$gets = $this->mberita->get_detail($slug);

		$this->mberita->uphit($slug);
		
		$this->page_title->push('Berita Detail', $gets->title);
		
		$this->data = array(
            'title' => $gets->title,
            'get'	=> $this->mberita->get_detail($slug),
            'get_komentar'	=> $this->mberita->get_komentar($gets->id),
            'get_tag_where' => $this->mberita->get_tag_where($gets->tags),
            'get_kategori'	=> $this->mberita->get_kategori(),
            'get_tags'	=> $this->mberita->get_tags(),
            'berita_populer'	=> $this->mberita->berita_populer(),
        );
        
        $this->template->view('berita/v-berita', $this->data);
	}
			
}
