<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller 
{
	public $per_page;

	public $page;

	public function __construct()
	{
		parent::__construct();

		$this->load->model('msurat_keluar', 'surat_keluar');
		$this->load->model('mcreate_surat', 'create_surat');
		$this->load->model('option');

		$this->per_page = 10;

		$this->page = $this->input->get('page');
	}

	public function index()
	{
		$surat = array();
		foreach ($this->surat_keluar->data($this->per_page, $this->page) as $key => $value) 
		{
			$date = new DateTime($value->tanggal);
			$surat[] = array(
				'ID' => $value->ID,
				'judul_surat' => $value->judul_surat,
				'nomor_surat' => $value->kode_surat.'/'.$value->nomor_surat.'/'.$this->option->get('kode_kecamatan').'/'.$date->format('Y'),
				'nik' => $value->nik,
				'nama_lengkap' => $value->nama_lengkap,
				'tanggal' => date_id($value->tanggal),
				'status' => $value->status,
				'operator' => $value->name,
				'penandatangan' => $value->nama
			);
		}

		$this->response = array(
			'surat' => $surat
		);

		$this->output->set_content_type('application/json')->set_output(json_encode($this->response));	
	}

	public function get($param = 0)
	{
		$surat = $this->surat_keluar->get($param);
		$date = new DateTime($surat->tanggal);

		$this->load->library('ci_pusher');
		$pusher = $this->ci_pusher->get_pusher();

		$penerima = $this->db->get_where('users', array('user_id' => $surat->user ))->row('nip');

		$data = array(
			'message' => "Seseorang Sedang membuka surat yang anda ajukan.",
			'param' => $param,
			'icon' => base_url("public/image/icon-surat2.png"),
			'status' => 'info'
		); 
		
		$event = $pusher->trigger('channel-'.$penerima, 'notifikasi-status', $data);

		$INFsurat = array(
			'ID' => $surat->ID,
			'nomor_surat' => $surat->kode_surat.'/'.$surat->nomor_surat.'/'.$this->option->get('kode_kecamatan').'/'.$date->format('Y'),
			'nik' => $surat->nik,
			'nama_lengkap' => $surat->nama_lengkap,
			'tanggal_surat' => date_id($surat->tanggal),
			'status' => $surat->status,
			'operator' => $surat->name,
			'verifikator' => $this->db->get_where('pegawai', array('ID'=> $surat->pemeriksa))->row('nama'),
			'penandatangan' => $surat->nama,
			'judul_surat' => $surat->judul_surat,
		);

		$this->response = array_merge( $INFsurat, (array) json_decode($surat->isi_surat) );

		$this->output->set_content_type('application/json')->set_output(json_encode($this->response));	
	}

	public function updatestatus($param = 0)
	{
		$get = $this->surat_keluar->get($param);

		$surat = array(
			'waktu_selesai' => date('Y-m-d H:i:s'),
			'status' => $this->input->post('status')
		);

		$this->db->update('surat', $surat, array('ID' => $param));

		$this->db->update('notifications', array('status' => 1), array('surat' => $param));

		$surat = $this->create_surat->surat_category($param);

		$this->load->library('ci_pusher');
		$pusher = $this->ci_pusher->get_pusher();

		$penerima = $this->db->get_where('users', array('user_id' => $get->user ))->row('nip');

		$sender = $this->db->get_where('users', array('nip' => $this->input->post('sender') ))->row();

		$this->response['status'] = true;

		if($this->input->post('status') == 'pending')
		{
			$data = array(
				'message' => $sender->name." Menolak surat pengajuan anda.",
				'param' => $param,
				'icon' => (!$sender->photo) ? base_url("public/image/avatar.jpg") : base_url("public/image/{$sender->photo}"),
				'status' => 'warning'
			); 
			$this->response['message'] = "Status Surat berhasil diubah menjadi pending";
		} else {
				$data = array(
				'message' => $sender->name." Memverifikasi surat pengajuan anda.",
				'param' => $param,
				'icon' => (!$sender->photo) ? base_url("public/image/avatar.jpg") : base_url("public/image/{$sender->photo}"),
				'status' => 'info'
			); 
			$this->response['message'] = "Status Surat berhasil diubah menjadi terverifikasi";	
		} 

		$this->output->set_content_type('application/json')->set_output(json_encode($this->response));
	}

}

/* End of file Surat.php */
/* Location: ./application/controllers/Api/Surat.php */