<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Msurat_online extends Sipaten_model 
{
	protected $ci;

	public $user;

	public function __construct()
	{
		parent::__construct();
		
		$this->ci =& get_instance();

		$this->ci->load->model(array('rest_api'));

		$this->user = $this->session->userdata('ID');
	}

	public function create($param = 0)
	{
		$get = $this->ci->rest_api->surat();

		$this->ci->rest_api->update($get->ID_pelayanan);

		self::create_penduduk($get->penduduk->nik);

		$catlocal = self::get_local_category( $get->slug );

		$curatonline = array(
			'nomor_surat' => $this->ci->create_surat->get_nomor_surat($catlocal->id_surat, null), 
			'nik' => $get->penduduk->nik,
			'kategori' => $catlocal->id_surat,
			'tanggal' => date('Y-m-d'),
			'isi_surat' => json_encode($get->isi),
			'pegawai' => $this->input->post('pegawai'),
			'pemeriksa' => $this->input->post('pemeriksa'),
			'user' => $this->user,
			'waktu_mulai' => $get->waktu->mulai,
			'waktu_selesai' => (!$get->waktu->selesai) ? '' : $get->waktu->selesai,
			'status' => 'pending',
		);

		$this->db->insert('surat', $curatonline);

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Surat berhasil diterima dan menunggu untuk diverifikasi.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Gagal saat menyimpan data.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

	/**
	 * Create Data Penduduk
	 *
	 * @param Integer (NIK)
	 * @return Boolean
	 **/
	public function create_penduduk($param = 0)
	{
		if( self::nik_check($param) == FALSE )
		{
			$get = $this->ci->rest_api->penduduk($param);

			$penduduk = array(
				'nik' => $get->nik, 
				'no_kk' => $get->no_kk,
				'status_kk' => $get->status_kk,
				'nama_lengkap' => $get->nama_lengkap,
				'tmp_lahir' => $get->tmp_lahir,
				'tgl_lahir' => $get->tgl_lahir,
				'jns_kelamin' => $get->jns_kelamin,
				'alamat' => $get->alamat,
				'rt' => $get->rt,
				'rw' => $get->rw,
				'desa' => 0,
				'kecamatan' => $get->kecamatan,
				'agama' => $get->agama,
				'pekerjaan' => $get->pekerjaan,
				'kewarganegaraan' => $get->kewarganegaraan,
				'status_kawin' => $get->status_kawin,
				'gol_darah' => $get->gol_darah,
				'telepon' => NULL,
				'kd_pos' => $get->kd_pos 
			);

			$this->db->insert('penduduk', $penduduk);
		}
	}

	/**
	 * Cek NIK Penduduk DB Local
	 *
	 * @param Integer (NIK)
	 * @return Integer
	 **/
	public function nik_check($param = 0)
	{
		return $this->db->get_where('penduduk', array('nik' => $param))->num_rows();
	}	

	/**
	 * Ambil Kategori Lokal
	 *
	 * @param String
	 * @return Object
	 **/
	private function get_local_category($slug = '')
	{
		return $this->db->get_where('kategori_surat', array('slug' => $slug))->row();
	}
}

/* End of file Msurat_online.php */
/* Location: ./application/models/Msurat_online.php */