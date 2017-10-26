<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* SIPATEN
* Statistik Data Kependudukan Model Class
*
* @version 1.0.0
* @author Vicky Nitinegoro <pkpvicky@gmail.com>
*/

class Mstats_people extends Sipaten_model
{
	/**
	 * Menghitung Jumlah penduduk
	 *
	 * @return Integer
	 **/
	public $count_penduduk;

	/**
	 * Menghitung Jumlah desa
	 *
	 * @return Integer
	 **/
	public $count_desa;


	public function __construct()
	{
		parent::__construct();

		$this->count_penduduk = $this->db->count_all('penduduk');

		$this->count_desa = $this->db->count_all('desa');
	}

	/**
	 * Hitung Populasi by desa
	 *
	 * @param Integer
	 * @return Bool
	 **/
	public function desa_population($param = 0, $jns_kelamin = '', $percentage = FALSE)
	{
		if($jns_kelamin != '')
			$this->db->where('jns_kelamin', $jns_kelamin);

		$query = $this->db->get_where('penduduk', array('desa' => $param))->num_rows();

		@$population = ($query / $this->count_penduduk) * 100;

		if($percentage == TRUE)
		{
			return @substr($population, 0, 4);
		} else {
			return $query;
		}
	}

	/**
	 * Hitung Populasi by Gender
	 *
	 * @param string
	 * @return Bool
	 **/
	public function gender_population($jns_kelamin = '', $percentage = FALSE)
	{
		$query = $this->db->get_where('penduduk', array('jns_kelamin' => $jns_kelamin))->num_rows();

		@$population = ($query / $this->count_penduduk) * 100;

		if($percentage == TRUE)
		{
			return @substr($population, 0, 4);
		} else {
			return $query;
		}
	}

	/**
	 * Select distinct status perkawinan
	 **/
	public function get_status_perkawinan()
	{
		return $this->db->query("SELECT DISTINCT status_kawin FROM penduduk")->result();
	}

	/**
	 * Select distinct agama
	 **/
	public function get_religion()
	{
		return $this->db->query("SELECT DISTINCT agama FROM penduduk")->result();
	}

	/**
	 * Select distinct Golonga Darah
	 **/
	public function get_golongan_darah()
	{
		return $this->db->query("SELECT DISTINCT gol_darah FROM penduduk")->result();
	}

	/**
	 * Hitung Populasi by Status Perkawinan
	 *
	 * @param string
	 * @return Bool
	 **/
	public function status_kawin_population($status_kawin = '', $percentage = FALSE)
	{
		$query = $this->db->get_where('penduduk', array('status_kawin' => $status_kawin))->num_rows();

		$population = ($query / $this->count_penduduk) * 100;

		if($percentage == TRUE)
		{
			return substr($population, 0, 4);
		} else {
			return $query;
		}
	}

	/**
	 * Hitung Populasi by Agama
	 *
	 * @param string
	 * @return Bool
	 **/
	public function religion_population($agama = '', $percentage = FALSE)
	{
		$query = $this->db->get_where('penduduk', array('agama' => $agama))->num_rows();

		$population = ($query / $this->count_penduduk) * 100;

		if($percentage == TRUE)
		{
			return substr($population, 0, 4);
		} else {
			return $query;
		}
	}

	/**
	 * Hitung Populasi by kewarganegaraan
	 *
	 * @param string
	 * @return Bool
	 **/
	public function warga_negara_population($kewarganegaraan = '', $percentage = FALSE)
	{
		$query = $this->db->get_where('penduduk', array('kewarganegaraan' => $kewarganegaraan))->num_rows();

		$population = ($query / $this->count_penduduk) * 100;

		if($percentage == TRUE)
		{
			return substr($population, 0, 4);
		} else {
			return $query;
		}
	}

	/**
	 * Hitung Populasi by Golongan Darah
	 *
	 * @param string
	 * @return Bool
	 **/
	public function gol_darah_population($gol_darah = '', $percentage = FALSE)
	{
		$query = $this->db->get_where('penduduk', array('gol_darah' => $gol_darah))->num_rows();

		$population = ($query / $this->count_penduduk) * 100;

		if($percentage == TRUE)
		{
			return substr($population, 0, 4);
		} else {
			return $query;
		}
	}
}

/* End of file Mstats_people.php */
/* Location: ./application/models/Mstats_people.php */
