<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('mevents'));

		$this->breadcrumbs->unshift(0, 'Beranda', ' ');

        $this->breadcrumbs->unshift(1, 'Events', "events");

        $this->per_page = (!$this->input->get('per_page')) ? 20 : $this->input->get('per_page');

        $this->page = $this->input->get('page');

        $this->query = $this->input->get('query');

        $this->slug_kat = '';
	}

	public function index()
	{	
		
		$this->page_title->push('Events', 'Events Kecamatan Simpang Katis');
		
		$config = $this->template->pagination_list();

        $config['base_url'] = site_url("events?per_page={$this->per_page}"
        );

        $config['per_page'] = $this->per_page;
        $config['total_rows'] = $this->mevents->get_all(null, null, 'num');

        $this->pagination->initialize($config);

		$this->data = array(

            'title' => 'Events Kecamatan Simpang Katis',
        
            'get_kategori'	=> $this->mevents->get_kategori(),
            'get_tags'	=> $this->mevents->get_tags(),
            'events_populer' => $this->mevents->events_populer(),
            'get_all' => $this->mevents->get_all($this->per_page, $this->page),
            'num' => $config['total_rows']
        );	
        
       $this->template->view('events/v-events-portal', $this->data);
		
	}	

	public function kategori($slug_kat = '')
	{	
		if (!$slug_kat) {
			show_404();
		} 
		$this->page_title->push('Kategori Events ', 'Events Kecamatan Simpang Katis');

		$this->data = array(

            'title' => 'Kategori Events Kecamatan Simpang Katis',
            'get_kategori'	=> $this->mevents->get_kategori(),
            'get_tags'	=> $this->mevents->get_tags(),
            'events_populer' => $this->mevents->events_populer(),
            'get_all_kat' => $this->mevents->get_all_kat($slug_kat),

        );
        
        $this->template->view('events/v-events-portal-kat', $this->data);
		
	}	

	public function tag($slug_kat='')
	{	
		if (!$slug_kat) {
			show_404();
		} 
		$this->page_title->push('Tags Events ' , 'Events Kecamatan Simpang Katis');

		$this->data = array(

            'title' => 'Tags Events Kecamatan Simpang Katis',
            'get_kategori'	=> $this->mevents->get_kategori(),
            'get_tags'	=> $this->mevents->get_tags(),
            'events_populer' => $this->mevents->events_populer(),
            'get_all_kat' => $this->mevents->get_all_tags($slug_kat),

        );
        
        $this->template->view('events/v-events-portal-kat', $this->data);
		
	}	

	public function get($slug = '')
	{
		if (!$slug) {
			show_404();
		}
		$gets = $this->mevents->get_detail($slug);

		$this->mevents->uphit($slug);
		
		$this->page_title->push('Events Detail', $gets->title);
		
		$this->data = array(
            'title' => $gets->title,
            'get'	=> $this->mevents->get_detail($slug),
            'get_tag_where' => $this->mevents->get_tag_where($gets->tags),
            'get_kategori'	=> $this->mevents->get_kategori(),
            'get_tags'	=> $this->mevents->get_tags(),
            'events_populer'	=> $this->mevents->events_populer(),
        );
        
        $this->template->view('events/v-events', $this->data);
	}
			
}
