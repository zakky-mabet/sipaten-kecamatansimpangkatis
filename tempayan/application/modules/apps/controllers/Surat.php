<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends Apps 
{
	public $data;

	public $now_date;

	public $start_date;

	public $end_date;

	public $category;

	public $user;

	public $status;

	public $query;

	public $per_page;

	public $page;

	public function __construct()
	{
		parent::__construct();

		$this->load->library('slug');

		$this->query = $this->input->get('query');

		$this->per_page = 20;

		$this->page = $this->input->get('page');

		$this->load->model('msurat_keluar', 'surat_keluar');

		$this->load->model('mcreate_surat', 'create_surat');

		$this->load->js(base_url("public/android/js/surat.js"));
	}

	public function index()
	{
        $config['full_tag_open'] = '<ul class="pagination center">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = '<i class="material-icons">chevron_left</i>';
        $config['first_tag_open'] = '<li class="waves-effect">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = '<i class="material-icons">chevron_left</i>';
        $config['last_tag_open'] = '<li class="waves-effect">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = '<i class="material-icons">chevron_right</i>';
        $config['next_tag_open'] = '<li class="waves-effect">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '<i class="material-icons">chevron_left</i>'; 
        $config['prev_tag_open'] = '<li class="waves-effect">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active orange"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="waves-effect">';
        $config['num_tag_close'] = '</li>'; 
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';

		$config['base_url'] = site_url(
			"apps/surat?per_page={$this->per_page}&query={$this->query}"
		);

		$config['per_page'] = $this->per_page;
		$config['total_rows'] = $this->surat_keluar->data(null, null, 'num');

		$this->pagination->initialize($config);

		$this->data = array(
			'title' => "Data Surat Keluar",
			'data_surat' => $this->surat_keluar->data($this->per_page, $this->page)
		);

		$this->load->view('data-surat', $this->data);
	}

	public function get($param = 0)
	{
		$surat = $this->surat_keluar->get($param);

		$this->data = array(
			'title' => "Detail Surat",
			'pegawai' => $this->create_surat->pegawai(),
			'pemeriksa' => $this->create_surat->pemeriksa(),
			'syarat' => $this->create_surat->get_syarat($surat->syarat),
			'get' => $surat,
			'isi' => json_decode($surat->isi_surat)
		);

		$this->load->view('detail-surat', $this->data);
	}

	/**
	 * Set Verification Surat Keluar
	 *
	 * @return Push Notification
	 **/
	public function set($param = 0, $status = 'pending')
	{
		$surat = array(
			'waktu_selesai' => date('Y-m-d H:i:s'),
			'status' => $status 
		);

		$this->db->update('surat', $surat, array('ID' => $param));

		$this->db->update('notifications', array('status' => 1), array('surat' => $param));

		$surat = $this->create_surat->surat_category($param);

		$surat = $this->surat_keluar->get($param);

		$this->load->library('ci_pusher');
		$pusher = $this->ci_pusher->get_pusher();

		$penerima = $this->db->get_where('users', array('user_id' => $surat->user ))->row('nip');

		$sender = $this->db->get_where('users', array('user_id' => $this->session->userdata('ID') ))->row();

		if($status == 'pending')
		{
			$data = array(
				'message' => $sender->name." Menolak surat pengajuan anda.",
				'param' => $param,
				'icon' => (!$sender->photo) ? base_url("public/image/avatar.jpg") : base_url("public/image/{$sender->photo}"),
				'status' => 'warning'
			); 
		} else {
				$data = array(
				'message' => $sender->name." Memverifikasi surat pengajuan anda.",
				'param' => $param,
				'icon' => (!$sender->photo) ? base_url("public/image/avatar.jpg") : base_url("public/image/{$sender->photo}"),
				'status' => 'info'
			); 
		} 
		
		$event = $pusher->trigger('channel-'.$penerima, 'notifikasi-status', $data);

		redirect("apps/surat/get/{$param}");
	}
}

/* End of file Surat.php */
/* Location: ./application/modules/apps/controllers/Surat.php */