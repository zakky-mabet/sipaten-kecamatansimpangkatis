<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpenilaian extends CI_Model 
{
	public $now_date;

	public $tahun;

	public $quarter;

	public $bulan;

	public function __construct()
	{
		parent::__construct();
		
		$this->tahun = (!$this->input->get('year')) ? date('Y') : $this->input->get('year'); 

		$this->now_date = date('Y-m-d');

		$this->quarter = $this->input->get('triwulan');

		$this->bulan = $this->input->get('month');
	}
	
	public function get_answers()
	{
		return $this->db->get('opsi_jawaban')->result();
	}

	public function get_indeks_kepuasan()
	{
		return json_decode($this->db->get_where('tb_options', array('option_name' => 'indeks_kepuasan'))->row('option_value'));
	}

	public function save()
	{
		foreach($this->input->post('option') as $key => $value)
			$this->db->update('tb_options', 
				array('option_value' => $value), 
				array('option_name' => $key)
		);

		if( is_array($this->input->post('jawaban')) ) 
		{
			foreach($this->input->post('jawaban') as $key => $value) 
			{
				$this->db->update('opsi_jawaban', array('jawaban' => $value), array('ID' => $key) );
			}
		}

		$config['upload_path'] = './public/image/emoji';
		$config['max_size']	= '110240';
		$config['allowed_types'] = 'gif|jpg|png|svg';
		$config['overwrite'] = FALSE;
		
		$this->upload->initialize($config);

		$result_array = array(); 

		foreach($_FILES as $key => $value)
		{
			if($this->upload->do_upload($key) != FALSE)
			{
				$ikon = $this->db->query("SELECT icon FROM opsi_jawaban WHERE ID = '{$key}'")->row('icon');
				
				@unlink("public/image/emoji/{$ikon}");

				$this->db->update('opsi_jawaban', array('icon' => $this->upload->file_name), array('ID' => $key) );
			}

		}

		$this->template->alert(
			' Perubahan tersimpan.', 
			array('type' => 'success','icon' => 'check')
		);
	}

	public function get_people_in_day()
	{
		return $this->db->query("
			SELECT surat.ID, surat.nik, penduduk.nama_lengkap, kategori_surat.nama_kategori 
			FROM surat RIGHT JOIN penduduk ON surat.nik = penduduk.nik RIGHT JOIN kategori_surat ON surat.kategori = kategori_surat.id_surat WHERE DATE(waktu_selesai) = '{$this->now_date}' AND NOT EXISTS (SELECT * FROM penilaian WHERE surat.ID = penilaian.surat)")->result();
	}

	public function create()
	{
		$data = array(
			'surat' => $this->input->post('surat'),
			'jawaban' => $this->input->post('answer'),
			'tanggal' => date('Y-m-d H:i:s') 
		);

		$this->db->insert('penilaian', $data);
	}

	/**
	 * Hitung Jumlah Responder
	 *
	 * @param Integer (ID) from jawaban
	 * @return Integer
	 **/
	public function count($param = 0)
	{
		$this->db->join('surat', 'penilaian.surat = surat.ID', 'RIGHT');

		$this->db->select('penilaian.tanggal');

		if($this->input->get('start_date') != '')
			$this->db->where('penilaian.tanggal >= ', $this->input->get('start_date'));

		if($this->input->get('end_date') != '')
			$this->db->where('penilaian.tanggal <= ', $this->input->get('end_date'));

		if($this->input->get('month') != '')
			$this->db->where('MONTH(penilaian.tanggal) =', $this->input->get('month'));

		if($this->input->get('year') != '')
			$this->db->where('YEAR(penilaian.tanggal) =', $this->input->get('year'));

		if($this->input->get('user') != '')
			$this->db->where('surat.user', $this->input->get('user'));

		$this->db->where('penilaian.jawaban', $param);

		return $this->db->get('penilaian')->num_rows();
	}

	/**
	 * Hitung Jumlah Responder
	 *
	 * @param Integer (ID) from jawaban
	 * @return Integer
	 **/
	public function count_month($param = 0, $month = FALSE, $year = FALSE)
	{
		$this->db->join('surat', 'penilaian.surat = surat.ID', 'RIGHT');

		$this->db->select('penilaian.tanggal');

		$this->db->where('MONTH(penilaian.tanggal) =', $month);

		$this->db->where('YEAR(penilaian.tanggal) =', $year);

		if($this->input->get('user') != '')
			$this->db->where('surat.user', $this->input->get('user'));

		$this->db->where('penilaian.jawaban', $param);

		return $this->db->get('penilaian')->num_rows();
	}

	public function jawaban()
	{
		$data = array();

		$konversi = count(self::get_answers()) + 1;

		foreach(self::get_answers() as $key => $value) 
		{
			$konversi--;

			if( $this->quarter != FALSE AND $this->bulan == FALSE )
			{
				$data[] = array(
					'jawaban' => $value->jawaban,
					'jumlah' => self::get_quarter($value->ID, $this->quarter),
					'konversi' => (self::get_quarter($value->ID, $this->quarter) * $konversi),
					'warna' => $value->warna
				);
			} elseif( $this->bulan == TRUE AND $this->quarter == FALSE ) {
				$data[] = array(
					'jawaban' => $value->jawaban,
					'jumlah' => self::get_jawaban($value->ID),
					'konversi' => (self::get_jawaban($value->ID) * $konversi),
					'warna' => $value->warna
				);
			} else {
				$data[] = array(
					'jawaban' => $value->jawaban,
					'jumlah' => self::get_jawaban($value->ID),
					'konversi' => (self::get_jawaban($value->ID) * $konversi),
					'warna' => $value->warna
				);
			}

		}

		return $data;
	}

	public function get_jawaban($param = 0)
	{
		$wbulan = "";

		if( $this->bulan == TRUE )
			$wbulan = " AND MONTH(tanggal) = '{$this->bulan}'";

		return $this->db->query("
			SELECT COUNT(*) jumlah FROM penilaian 
			WHERE jawaban = '{$param}' AND YEAR(tanggal) = '{$this->tahun}' {$wbulan}
		")->row('jumlah');
	}

	public function get_quarter($jawaban = 0, $quarter = 'I')
	{
		switch ($quarter) {
			case 'I':
				return $this->db->query("
					SELECT
						SUM(CASE WHEN MONTH(tanggal) >= 1 AND MONTH(tanggal) <= 3 THEN (1) END) jumlah
					FROM penilaian
					WHERE YEAR(tanggal) = '{$this->tahun}' AND jawaban = '{$jawaban}'
				")->row('jumlah');
				break;
			case 'II':
				return $this->db->query("
					SELECT
						SUM(CASE WHEN MONTH(tanggal) >= 4 AND MONTH(tanggal) <= 6 THEN (1) END) jumlah
					FROM penilaian
					WHERE YEAR(tanggal) = '{$this->tahun}' AND jawaban = '{$jawaban}'
				")->row('jumlah');
				break;
			case 'III':
				return $this->db->query("
					SELECT
						SUM(CASE WHEN MONTH(tanggal) >= 7 AND MONTH(tanggal) <= 9 THEN (1) END) jumlah
					FROM penilaian
					WHERE YEAR(tanggal) = '{$this->tahun}' AND jawaban = '{$jawaban}'
				")->row('jumlah');
				break;
			case 'IV':
				return $this->db->query("
					SELECT
						SUM(CASE WHEN MONTH(tanggal) >= 10 AND MONTH(tanggal) <= 12 THEN (1) END) jumlah
					FROM penilaian
					WHERE YEAR(tanggal) = '{$this->tahun}' AND jawaban = '{$jawaban}'
				")->row('jumlah');
				break;
		}
	}

	public function get_mutu_kepuasan($angka = 0, $method = 'description')
	{
		$indeks = self::get_indeks_kepuasan();

		foreach(self::get_indeks_kepuasan() as $key => $value) 
		{
			$range = explode('-', $value->range);

			if( $angka >= $range[0] )
			{
				if($method == 'mutu')
					return $value->grade;
				else
					return $value->description;
			}
		}
	}
}

/* End of file Mpenilaian.php */
/* Location: ./application/models/Mpenilaian.php */