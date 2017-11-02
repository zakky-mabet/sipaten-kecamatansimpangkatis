<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Album extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model(array('malbum','mpimpinan','mberita','mevents'));

		$this->breadcrumbs->unshift(0, 'Beranda', ' ');

        $this->breadcrumbs->unshift(1, 'Album', "album");

        $this->per_page = (!$this->input->get('per_page')) ? 20 : $this->input->get('per_page');

        $this->page = $this->input->get('page');

        $this->query = $this->input->get('query');
	}

	public function index()
	{
		
		$this->page_title->push('Album Galeri', 'Album Kecamatan Simpang Katis');
		
		$config = $this->template->pagination_list();

        $config['base_url'] = site_url("album?per_page={$this->per_page}" 
        );

        $config['per_page'] = $this->per_page;
        $config['total_rows'] = $this->malbum->get_all(null, null, 'num');

        $this->pagination->initialize($config);

		$this->data = array(

            'title' => 'Album Kecamatan Simpang Katis',
        
            'berita_populer' => $this->mberita->berita_populer(),
            'events_populer' => $this->mevents->events_populer(),
            'get_pimpinan' => $this->mpimpinan->get_pimpinan(),
            'get_all' => $this->malbum->get_all($this->per_page, $this->page),
            'num' => $config['total_rows']
        );
        
        $this->template->view('album/v-album', $this->data);
	}

	public function get($slug='')
	{
		if (!$slug) {
			show_404();
		}

		$gets = $this->malbum->get_detail($slug);

		//$this->malbum->uphit($slug);
		
		$this->page_title->push('Album Galeri', 'Album Galeri');
		
		$this->data = array(
            'title' => 'Album Galeri',
            'get_pimpinan' => $this->mpimpinan->get_pimpinan(),
            'berita_populer' => $this->mberita->berita_populer(),
            'events_populer' => $this->mevents->events_populer(),
            'get'	=> $this->malbum->get_detail($slug),

        );
        
        $this->template->view('album/v-album-detail', $this->data);
	}

}

/* End of file Album.php */
/* Location: ./application/controllers/Album.php */