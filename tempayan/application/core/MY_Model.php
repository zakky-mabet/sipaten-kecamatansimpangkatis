<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

	

}

/**
* Extends Model Class Sipaten
*
* @version 1.0.0
* @author Vicky Nitinegoro <pkpvicky@gmail.com>
*/
class Sipaten_model extends MY_Model
{
	public $user;

	public function __construct()
	{
		parent::__construct();

		$this->load->library(array('session'));
		
		$this->user = $this->session->userdata('ID');
	}

	public function get_user($param = 0)
	{
		if($param == FALSE)
		{
			return $this->db->get('users')->result();
		} else {
			return $this->db->get_where('users', array('user_id' => $param))->row();
		}
	}

	public function get_role($param = 0)
	{
		if($param == FALSE)
		{
			return $this->db->get('users_role')->result();
		} else {
			return $this->db->get_where('users_role', array('role_id' => $param))->row();
		}
	}

	public function get_desa($param = 0)
	{
		if($param == FALSE)
		{
			return $this->db->get('desa')->result();
		} else {
			return $this->db->get_where('desa', array('id_desa' => $param))->row();
		}
	}

	/**
	 * undocumented class variable
	 *
	 * @var string
	 **/
	public function get_select_desa($param = 0, $select = FALSE)
	{
		$this->db->where('id_desa', $param);

		if(is_array($select)) 
		{
			$this->db->select(join(',', $select));

			return $this->db->get('desa')->row();
		} else {
			return $this->db->get('desa')->row($select);
		}		
	}

	/**
	 * Get Syarat Surat
	 *
	 * @param Integer (id_syarat)
	 **/
	public function get_syarat_surat($param = 0)
	{
		if($param == FALSE)
		{
			return $this->db->get('syarat_surat')->result();
		} else {
			return $this->db->get_where('syarat_surat', array('id_syarat' => $param))->row();
		}
	}

	/**
	 * Get Kategori Surat
	 *
	 * @param Integer (id_surat)
	 * @param String (jenis)
	 **/
	public function surat_category($param = 0, $jenis = 'non perizinan')
	{
		if($param == FALSE)
		{
			return $this->db->get_where('kategori_surat', array('jenis' => $jenis))->result();
		} else {
			return $this->db->get_where('kategori_surat', array('id_surat' => $param))->row();
		}
	}

	/**
	 * Get Kategori Surat
	 *
	 **/
	public function category()
	{
		return $this->db->get('kategori_surat')->result();
	}

	/**
	 * Get Pejabat Pemerintah
	 *
	 * @param Integer (ID)
	 **/
	public function pegawai($param = 0)
	{
		if($param == FALSE)
		{
			return $this->db->get_where('pegawai')->result();
		} else {
			return $this->db->get_where('pegawai', array('ID' => $param))->row();
		}
	}

	/**
	 * Get Pemeriksa Surat
	 *
	 * @param Integer (ID)
	 **/
	public function pemeriksa()
	{
		return $this->db->query("SELECT pegawai.*, users.name FROM pegawai RIGHT JOIN users ON users.nip = pegawai.nip WHERE users.role_id = '2'")->result();
	}


	/**
	 * Get Data Penduduk
	 *
	 * @param Integer (ID)
	 **/
	public function get_penduduk($param = 0)
	{
		$this->db->join('desa', 'penduduk.desa = desa.id_desa', 'left');
		return $this->db->get_where('penduduk', array('ID' => $param))->row();
	}

	/**
	 * Get Keluarga in (no_kk)
	 *
	 * @param String (no_kk)
	 * @return Result
	 **/
	public function get_keluarga($param = 0, $order_in_isi_surat = NULL)
	{
		if( $order_in_isi_surat != NULL) 
		{
			$penduduk = array();
			foreach($order_in_isi_surat as $key => $value)
				$penduduk[] = $value->id;

			$in_primary = join(',', $penduduk);

			return $this->db->query("SELECT * FROM penduduk WHERE no_kk = '{$param}' ORDER BY FIELD(ID, '{$in_primary}') DESC")->result();
		} else {
			return $this->db->get_where('penduduk', array('no_kk' => $param))->result();
		}
	}

	/**
	 * Get Kepala Keluarga
	 *
	 * @param Integer (No KK)
	 * @return row
	 **/
	public function get_kepala_keluarga($param = 0)
	{
		$this->db->join('desa', 'penduduk.desa = desa.id_desa', 'left');
		return $this->db->get_where('penduduk', array('no_kk' => $param, 'status_kk' => 'kepala keluarga'))->row();
	}

	/**
	 * Ambil Maks Nomor Surat
	 *
	 * @param Integer (category surat)
	 * @param String (Date as tanggal)
	 * @return Integer
	 **/
	public function get_nomor_surat($category = 0, $year = NULL)
	{
		if($year == NUll)
			$year = date('Y');

		$query = $this->db->query("SELECT MAX(nomor_surat) AS nomor FROM surat WHERE YEAR(tanggal) = {$year} AND kategori = {$category}")->row('nomor');

		return nomor_urut(++$query);
	}

	/**
	 * Hitung Jumlah Surat Keluar
	 *
	 * @param date (tanggal)
	 * @param String (jenis tanggal)
	 * @return Array
	 **/
	public function count_surat_by_date($date = NULL)
	{
		return $this->db->query("SELECT COUNT(tanggal) AS jumlah FROM surat  WHERE tanggal = '{$date}' AND status = 'approve'")->row('jumlah');
	}
	
	/**
	 * Menampilkan Data Ayah dan Ibu dalam KK
	 *
	 * @param String (No_KK)
	 * @return Result
	 **/
	public function get_parent_kk($param = '')
	{
		return $this->db->query("SELECT * FROM penduduk WHERE no_kk = '{$param}' AND status_kk IN ('ibu','ayah') ORDER BY status_kk ASC")->result();
	}

	/**
	 * Check Pengikut satu dalam KK
	 *
	 * @param String (No_KK)
	 * @return Bolean
	 **/
	public function check_kk_include($param = 0)
	{
		$id_pengikut = array();
		for($id = 0; $id < count($param); $id++) 
			$id_pengikut[] = $param[$id]->id;

		$param = join(', ', $id_pengikut);

		$query = $this->db->query("SELECT * FROM penduduk WHERE ID IN({$param})");

		if($query->num_rows())
			return TRUE;
		else 
			return FALSE;
	}

	/**
	 * Hitung Count SUrat by status
	 *
	 * @var string
	 **/
	public function count_surat($status = '')
	{
		return $this->db->get_where('surat', array('status' => $status))->num_rows();
	}

	/**
	 * Get User Login List
	 *
	 * @return Array
	 **/
	public function get_user_login()
	{
		return $this->db->query(
			"SELECT user_id, name, photo, login_status FROM users WHERE user_id NOT IN({$this->user}) AND login_status = 1"
		)->result();
	}

	public function get_slug_surat($param = 0)
	{
		return $this->db->query("SELECT slug FROM kategori_surat WHERE id_surat = '{$param}'")->row('slug');
	}

	public function check_pengikut($surat = 0, $nik = '')
	{
		$query = $this->db->query("SELECT ID FROM pengikut WHERE surat = '{$surat}' AND nik = '{$nik}'");

		if($query->num_rows())
		{
			return TRUE;
		} else {
			return FALSE;
		}
	}

	/**
	 * Jenis Desa atau Keluranan
	 *
	 * @param Integer (ID desa)
	 * @var string
	 **/
	public function village_prefix($param = '')
	{
		$desa = $this->db->get_where('desa', array('id_desa' => $param))->row();

		if($desa == FALSE)
			exit(null);

		switch ($desa->slug) 
		{
			case 'koba':
			case 'simpang-perlang':
			case 'berok':
			case 'padang-mulia':
			case 'arung-dalam':
				return array(
					'j' => 'Kelurahan',
					'k' => 'Lurah'
				);
				break;
			
			default:
				return array(
					'j' => 'Desa',
					'k' => 'Kepala Desa'
				);
				break;
		}
	}
}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */

