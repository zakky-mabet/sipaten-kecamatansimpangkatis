<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manalytics extends Sipaten_model 
{
	public $code;

	public $number;

	public function __construct()
	{
		parent::__construct();
		
		$nomor_surat = explode('/', $this->input->get('no'));

		$this->code = @$nomor_surat[0];

		$this->number = @$nomor_surat[1];
	}
	
	public function get()
	{
		$this->db->select('
			surat.*, kategori_surat.judul_surat, kategori_surat.jenis, kategori_surat.kode_surat, penduduk.nik, penduduk.nama_lengkap, desa.nama_desa, pegawai.nama, users.name'
		);

		$this->db->where('status', 'approve');

		$this->db->join('kategori_surat', 'surat.kategori = kategori_surat.id_surat', 'left');

		$this->db->join('penduduk', 'surat.nik = penduduk.nik', 'left');

		$this->db->join('desa', 'penduduk.desa = desa.id_desa', 'left');

		$this->db->join('users', 'surat.user = users.user_id', 'left');

		$this->db->join('pegawai', 'surat.pegawai = pegawai.ID', 'left');

		$this->db->where('surat.nomor_surat', $this->number);

		$this->db->where('kategori_surat.kode_surat', $this->code);

		return $this->db->get('surat')->row();
	}

	public function get_durasi()
	{
		$awal  = new DateTime(self::get()->waktu_mulai);
		$akhir = new DateTime(self::get()->waktu_selesai); 
		$diff  = $awal->diff($akhir);

		if($diff->d)
			 return  $diff->d . ' Hari, '. $diff->h . ' Jam, '. $diff->i . ' Menit';

		return  $diff->h . ' Jam, '. $diff->i . ' Menit';
	}

	public function get_feedback()
	{
		$query = $this->db->query("SELECT jawaban FROM opsi_jawaban WHERE EXISTS (SELECT ID FROM penilaian WHERE surat = '{$this->get()->ID}')");

		return $query->row('jawaban');
	}

	public function get_log()
	{
		return $this->db->query("SELECT DISTINCT tanggal FROM log_surat WHERE nomor_surat = '{$this->get()->ID}' ORDER BY tanggal DESC")->result();
	}

	public function get_log_syarat($date = '')
	{
		return $this->db->query("SELECT syarat_surat.nama_syarat FROM log_surat RIGHT JOIN syarat_surat ON log_surat.syarat = syarat_surat.id_syarat WHERE log_surat.tanggal = '{$date}' AND log_surat.nomor_surat = '{$this->get()->ID}'")->result();
	}
}

/* End of file Manalytics.php */
/* Location: ./application/models/Manalytics.php */