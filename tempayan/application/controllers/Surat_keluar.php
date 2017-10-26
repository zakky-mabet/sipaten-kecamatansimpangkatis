<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_keluar extends Sipaten 
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

		$this->breadcrumbs->unshift(1, 'Surat Keluar', "surat_keluar");

		$this->load->model('msurat_keluar', 'surat_keluar');

		$this->load->library(array('cart'));

		$this->now_date = date('Y-m-d');

		$this->start_date = $this->input->get('start');

		$this->end_date = $this->input->get('end');

		$this->category = $this->input->get('jenis');

		$this->user = $this->input->get('user');

		$this->status = $this->input->get('status');

		$this->query = $this->input->get('query');

		$this->per_page = $this->input->get('per_page') ? $this->input->get('per_page') : 20;

		$this->page = $this->input->get('page');

		$this->load->js(base_url("public/app/surat_keluar.js"));
		$this->load->js(base_url('public/app/tour/surat-keluar.js'));
	}

	public function index()
	{
		$this->page_title->push('Surat Keluar', 'Data Surat Keluar');

		$this->breadcrumbs->unshift(2, 'Surat Keluar', "surat_keluar");

		$config = $this->template->pagination_list();

		$config['base_url'] = site_url(
			"surat_keluar?per_page={$this->per_page}&query={$this->query}&start={$this->start_date}&end={$this->end_date}&jenis={$this->category}&status={$this->status}&user={$this->user}"
		);

		$config['per_page'] = $this->per_page;
		$config['total_rows'] = $this->surat_keluar->data(null, null, 'num');

		$this->pagination->initialize($config);

		$this->data = array(
			'title' => 'Data Surat Keluar', 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'data_surat' => $this->surat_keluar->data($this->per_page, $this->page),
			'num_surat' => $config['total_rows']
		);

		$this->template->view('surat-keluar/data-surat', $this->data);
	}

	public function print_out()
	{
		$this->data = array(
			'title' => 'Data Surat Keluar', 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'data_surat' => $this->surat_keluar->data($this->per_page, $this->page),
			'num_surat' => $this->surat_keluar->data(null, null, 'num')
		);

		$this->load->view('surat-keluar/print-surat-keluar', $this->data);
	}

	/**
	 * Get Print SUrat
	 *
	 * @param Integer (ID) surat
	 * @return Html output (print)
	 **/
	public function print_surat($param = 0)
	{
		$surat = $this->surat_keluar->get($param);

		$this->data = array(
			'title' => "PRINT | {$surat->judul_surat}",
			'get' => $surat,
			'isi' => json_decode($surat->isi_surat)
		);

		$this->load->view("surat-keluar/print/{$surat->slug}", $this->data);
	}

	/**
	 * Get Update SUrat
	 *
	 * @param Integer (ID) surat
	 * @return Html output (form update)
	 **/
	public function get($param = 0)
	{
		$this->load->js(base_url("public/app/isi_surat.js"));
		
		$this->page_title->push('Surat Keluar', 'Sunting Surat Keluar');

		$this->breadcrumbs->unshift(2, 'Sunting Surat Keluar', "surat_keluar");

		$surat = $this->surat_keluar->get($param);

		if($surat == FALSE)
			show_404();

		/*!
		*
		* Get Validation Rules 
		* Ambil dari parent controller
		*/
		parent::get_surat_validation($surat->slug);

		if($this->form_validation->run() == TRUE)
		{
			$this->surat_keluar->update_surat($param);

			$this->cart->destroy();
			
			redirect("surat_keluar/get/{$param}");

		}

		$this->data = array(
			'title' => "Sunting - {$surat->judul_surat}",
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'pegawai' => $this->create_surat->pegawai(),
			'pemeriksa' => $this->create_surat->pemeriksa(),
			'syarat' => $this->create_surat->get_syarat($surat->syarat),
			'get' => $surat,
			'isi' => json_decode($surat->isi_surat)
		);

		$this->template->view("surat-keluar/form/{$surat->slug}", $this->data);
	}

	/**
	 * Set Update Status Surat Keluar
	 *
	 * @param Integer (ID) key table surat
	 * @param String (status)
	 * @return 301
	 **/
	public function set_verification($param = 0, $status = 'pending')
	{
		$this->surat_keluar->update_status($param, $status);

		$surat = $this->surat_keluar->get($param);

		$this->load->library('ci_pusher');
		$pusher = $this->ci_pusher->get_pusher();

		$penerima = $this->db->get_where('users', array('user_id' => $surat->user ))->row('nip');

		if($status == 'pending')
		{
			$data = array(
				'message' => $this->session->userdata('account')->name." Menolak surat pengajuan anda.",
				'param' => $param,
				'icon' => (!$this->session->userdata('account')->photo) ? base_url("public/image/avatar.jpg") : base_url("public/image/{$this->session->userdata('account')->photo}"),
				'status' => 'warning'
			); 
		} else {
				$data = array(
				'message' => $this->session->userdata('account')->name." Memverifikasi surat pengajuan anda.",
				'param' => $param,
				'icon' => (!$this->session->userdata('account')->photo) ? base_url("public/image/avatar.jpg") : base_url("public/image/{$this->session->userdata('account')->photo}"),
				'status' => 'info'
			); 
		} 
		
		$event = $pusher->trigger('channel-'.$penerima, 'notifikasi-status', $data);
		
		redirect('surat_keluar');
	}

	/**
	 * Hapus Data Surat keluar
	 *
	 * @param Integer (ID) key table surat
	 * @return 301
	 **/
	public function delete($param = 0)
	{
		$this->surat_keluar->delete($param);

		redirect('surat_keluar');
	}

	/**
	 * Get Cart Data Pengikut
	 *
	 * @var string
	 **/
	public function get_pengikut($param = 0)
	{
		$surat = $this->surat_keluar->get($param);

		$isi = json_decode($surat->isi_surat);

		$key_index = 0;

		$pengikut = array('data' => array());

		if(@$isi->pengikut != FALSE)
		{
			foreach($isi->pengikut as $key => $value)
			{
				$get = $this->db->get_where('penduduk', array('ID' => $value->id))->row(); 

				$pengikut['data'][] = array(
					"<a data-id='{$param}' data-key='{$key}' class='text-red delete-pengikut' data-toggle='tooltip' data-placement='top' title='Hapus'><i class='fa fa-trash-o'></i></a><input type='hidden' name='isi[pengikut][{$key_index}][id]' value='{$value->id}'><input type='hidden' name='isi[pengikut][{$key_index}][status_hubungan]' value='{$value->status_hubungan}'>",
					$get->nik,
					$get->nama_lengkap,
					$get->jns_kelamin,
					$get->tmp_lahir.", ".date_id($get->tgl_lahir),
					strtoupper($value->status_hubungan)
				);

				$key_index++;
			}
		}

		foreach($this->cart->contents() as $key => $value)
		{
			$pengikut['data'][] = array(
					"<a data-id='{$key}' class='text-red show-pengikut' data-toggle='tooltip' data-placement='top' title='Hapus'><i class='fa fa-trash-o'></i></a><input type='hidden' name='isi[pengikut][{$key_index}][id]' value='{$value['id']}'><input type='hidden' name='isi[pengikut][{$key_index}][status_hubungan]' value='{$value['status']}'>",
				$value['nik'],
				$value['name'],
				$value['jns_kelamin'],
				$value['tmp_tgl_lahir'],
				strtoupper($value['status'])
			);

			$key_index++;
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($pengikut, JSON_PRETTY_PRINT));
	}

	/**
	 * Hapus Data Pengikut dalam surat
	 *
	 * @param Integer (key pengikut)
	 * @return Void
	 **/
	public function remove_pengikut($param = 0, $key = 0)
	{
		$surat = $this->surat_keluar->get($param);

		$isi = json_decode($surat->isi_surat);

		if(is_array($isi->pengikut))
			unset($isi->pengikut[$key]);

		$this->db->update('surat', array('isi_surat' => json_encode($isi) ), array('ID' => $param) );
	}

	/**
	 * Get Action Multiple
	 *
	 * @return 301
	 **/
	public function bulk_action()
	{
		switch ( $this->input->post('action') ) 
		{
			case 'delete':
				$this->surat_keluar->delete_multiple();

				redirect('surat_keluar');
				break;
			default:
				# code...
				break;
		}
	}

}

/* End of file Surat_keluar.php */
/* Location: ./application/controllers/Surat_keluar.php */