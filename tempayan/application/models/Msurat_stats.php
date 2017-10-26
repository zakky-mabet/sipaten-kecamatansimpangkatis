<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Msurat_stats extends Sipaten_Model 
{
	public $start_date;

	public $end_date;

	public $year;

	public function __construct()
	{
		parent::__construct();

		$this->start_date = $this->input->get('start_date');

		$this->end_date = $this->input->get('end_date');

		$this->year = ($this->input->get('year') != '') ? $this->input->get('year') : date('Y');
	}

	public function count_by_category($param = 0)
	{
		$this->db->select('surat.ID, surat.tanggal');

		$this->db->join('kategori_surat', 'kategori_surat.id_surat = surat.kategori', 'RIGHT');

		if($this->input->get('start_date') != '')
			$this->db->where('tanggal >= ', $this->input->get('start_date'));

		if($this->input->get('end_date') != '')
			$this->db->where('tanggal <= ', $this->input->get('end_date'));

		if($this->input->get('month') != '')
			$this->db->where('MONTH(tanggal) =', $this->input->get('month'));

		if($this->input->get('year') != '')
			$this->db->where('YEAR(tanggal) =', $this->input->get('year'));

		if($this->input->get('user') != '')
			$this->db->where('surat.user', $this->input->get('user'));

		$this->db->where('surat.kategori', $param);

		return $this->db->get('surat')->num_rows();
	}

	public function count_by_month($month = 0, $year = 0, $jenis = 'non perizinan')
	{
		$this->db->select('kategori_surat.jenis, surat.tanggal');

		$this->db->join('kategori_surat', 'kategori_surat.id_surat = surat.kategori', 'RIGHT');

		$this->db->where('MONTH(tanggal) =', $month);

		$this->db->where('YEAR(tanggal) =', $this->year);

		if($this->input->get('user') != '')
			$this->db->where('surat.user', $this->input->get('user'));

		$this->db->where('kategori_surat.jenis', $jenis);

		return $this->db->get('surat')->num_rows();
	}
}

/* End of file Msurat_stats.php */
/* Location: ./application/models/Msurat_stats.php */