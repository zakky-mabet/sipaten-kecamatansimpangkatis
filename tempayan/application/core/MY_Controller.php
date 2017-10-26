<?php
defined('BASEPATH') OR exit('No direct script access allowed');

define('SIPATEN_VERSION', '2.4.6 <small>Beta</small>');

class MY_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		

	}
}

/**
* Extends Class Apps
*
* @version 2.0.0
* @author Vicky Nitinegoro <pkpvicky@gmail.com>
*/
class Apps extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('maccount', 'account');
		
		if($this->session->has_userdata('android_login')==FALSE) 
		{
			$this->db->update('users', array('login_status' => 0), array('user_id' => $this->session->userdata('ID') ));
			
			redirect(site_url('apps/login?from_url='.current_url()));
		}

		$this->load->js('https://js.pusher.com/2.2/pusher.min.js');
		$this->load->js(base_url("public/dist/js/push.min.js?v1.0.1"));
		$this->load->js(base_url("public/android/js/notifications.js?v1.0.1"));
	}

}

/**
* Extends Class Sipaten
*
* @version 1.0.0
* @author Vicky Nitinegoro <pkpvicky@gmail.com>
*/
class Sipaten extends MY_Controller
{
	public $data = array();

	public $role_name;

	public $IdAccount;

	public $user_id;

	public function __construct()
	{
		parent::__construct();

		$this->load->model('mcreate_surat', 'create_surat');

		$this->IdAccount = $this->session->userdata('ID');

		$this->load->model('maccount', 'account');

		$this->breadcrumbs->unshift(0, 'Home', 'main');

		if($this->session->has_userdata('authentifaction')==FALSE) 
		{
			$this->db->update('users', array('login_status' => 0), array('user_id' => $this->IdAccount));
			
			redirect(site_url('login?from_url='.current_url()));
		}

		$this->user_id = $this->session->userdata('account')->role_id;

		$this->role_name = $this->option->get_role( $this->user_id )->role_name;

		$this->load->js('https://js.pusher.com/2.2/pusher.min.js');
		$this->load->js(base_url("public/dist/js/push.min.js?v1.0.1"));
		$this->load->js(base_url("public/app/notifications.js?v1.0.1"));
	}

	/**
	 * Get Data Penduduk JSON
	 *
	 * @param Integer (ID)
	 * @return string (JSON)
	 **/
	public function penduduk($param = 0)
	{
		ini_set('memory_limit', '256M');
		$this->db->join('desa', 'penduduk.desa = desa.id_desa', 'left');
		if($param == FALSE) 
		{
			foreach($this->db->get('penduduk')->result() as $row)
			{
				$this->data[] = array(
					'id' => $row->ID,
					'nik' => $row->nik,
					'nama' => $row->nama_lengkap,
					'jns_kelamin' => ucfirst($row->jns_kelamin),
					'alamat' => $row->alamat." - ".$row->nama_desa.", RT ".$row->rt."/RW".$row->rw
				); 
			} 
		} else {
			$get = $this->db->get_where('penduduk', array('ID' => $param))->row();

			$date = new DateTime($get->tgl_lahir);

			$this->data = array(
				'id' => $get->ID,
				'nik' => $get->nik,
				'nama' => $get->nama_lengkap,
				'tgl_lahir' => $get->tmp_lahir.", ".$date->format('d M Y'),
				'jns_kelamin' => ucfirst($get->jns_kelamin),
				'alamat' => $get->alamat." - ".$get->nama_desa."<br> ".$get->rt."/".$get->rw."<br>".$get->nama_desa,
				'agama' => ucfirst($get->agama),
				'status_kawin' => strtoupper($get->status_kawin),
				'kewarganegaraan' => strtoupper($get->kewarganegaraan)
			);

			$this->log_surat_check($get->nik, $this->input->get('surat'));

			if( $this->create_surat->valid_requirement_check($get->nik, $this->input->get('surat')) )
			{
				$this->data['status'] = true;
			} else {
				$this->data['status'] = false;
			}
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($this->data));
	}

	/**
	 * Mengecek History Pengajuan Surat
	 *
	 * @param String (NIK)
	 * @param String (kategori_surat)
	 * @return string (JSON)
	 **/
	public function log_surat_check($param = '', $kategori = 0)
	{
		$log_surat = $this->db->query("SELECT nik, syarat, tanggal FROM log_surat 
			WHERE nik = {$param} AND nomor_surat IN(0) AND kategori = {$kategori}")->result();

		foreach($log_surat as $row)
		{
			$this->data['syarat_surat'][] = array(
				'id' => $row->syarat,
				'date' => $row->tanggal
			);
		}

		return $this->data;
	}

	/**
	 * Menjadikan Bilangan Angka menjadi kalimat terbilangan
	 *
	 * @param Integer
	 * @return String
	 **/
	public function generate_bilangan()
	{
		if(is_numeric($this->input->post('angka')))
			echo terbilang($this->input->post('angka'), 'ucfirst');
	}

	/**
	 * Get Validation Rules
	 *
	 * @param String (slug) kategori surat
	 * @return Void
	 **/
	public function get_surat_validation($param = '')
	{
		switch ($param) 
		{
			case 'keterangan-domisili-perusahaan':
				$this->form_validation->set_rules('isi[no_surat_rek]', 'Nomor Surat', 'trim|required');
				$this->form_validation->set_rules('isi[tgl_surat_rek]', 'Tanggal Surat', 'trim|required');
				$this->form_validation->set_rules('isi[desa]', 'Desa', 'trim|required');
				$this->form_validation->set_rules('isi[nama_perusahaan]', 'Nama Perusahaan', 'trim|required');
				$this->form_validation->set_rules('isi[alamat_perusahaan]', 'Alamat Perusahaan', 'trim|required');
				break;
			case 'keterangan-usaha':
				$this->form_validation->set_rules('isi[pejabat_lurah]', 'Pejabat Lurah / Kades', 'trim|required');
				$this->form_validation->set_rules('isi[nip_pejabat_lurah]', 'NIP Pejabat Lurah / Kades', 'trim|required');
				$this->form_validation->set_rules('isi[jabatan_pejabat_lurah]', 'Jabatan Pejabat Lurah', 'trim|required');
				$this->form_validation->set_rules('isi[nama_usaha]', 'Nama Usaha', 'trim|required');
				$this->form_validation->set_rules('isi[alamat_usaha]', 'Alamat Usaha', 'trim|required');
				break;
			case 'keterangan-kelakuan-baik':
				$this->form_validation->set_rules('isi[no_surat_rek]', 'Nomor Surat', 'trim|required');
				$this->form_validation->set_rules('isi[tgl_surat_rek]', 'Tanggal Surat', 'trim|required');
				$this->form_validation->set_rules('isi[desa]', 'Nama Desa', 'trim|required');
				$this->form_validation->set_rules('isi[keperluan]', 'Keperluan', 'trim|required');
				break;
			case 'perpanjangan-izin-oprasional':
				$this->form_validation->set_rules('isi[no_surat_rek]', 'Nomor Surat', 'trim|required');
				$this->form_validation->set_rules('isi[tgl_surat_rek]', 'Tanggal Surat', 'trim|required');
				$this->form_validation->set_rules('isi[sumber_rekomendasi]', 'Rekomendasi dari', 'trim|required');
				$this->form_validation->set_rules('isi[nama_lembaga]', 'Nama Lembaga', 'trim|required');
				$this->form_validation->set_rules('isi[nama_pengelola]', 'Nama Pengelola', 'trim|required');
				$this->form_validation->set_rules('isi[alamat_lembaga]', 'Alamat Lembaga', 'trim|required');
				break;
			case 'izin-usaha-mikro-dan-kecil':
				$this->form_validation->set_rules('isi[nama_perusahaan]', 'Nama Perusahaan', 'trim|required');
				$this->form_validation->set_rules('isi[bentuk_perusahaan]', 'Bentuk Perusahaan', 'trim|required');
				$this->form_validation->set_rules('isi[npwp]', 'NPWP', 'trim|required');
				$this->form_validation->set_rules('isi[kegiatan_usaha]', 'Kegiatan', 'trim|required');
				$this->form_validation->set_rules('isi[sarana_usaha]', 'Sarana', 'trim|required');
				$this->form_validation->set_rules('isi[alamat_perusahaan]', 'Alamat', 'trim|required');
				$this->form_validation->set_rules('isi[jml_modal_usaha]', 'Jumlah Modal', 'trim|is_numeric|required');
				$this->form_validation->set_rules('isi[no_pendaftaran]', 'No Pendaftaran', 'trim|required');
				break;
			case 'izin-keramaian':
				$this->form_validation->set_rules('isi[no_surat_rek]', 'Nomor Surat', 'trim|required');
				$this->form_validation->set_rules('isi[tgl_surat_rek]', 'Tanggal Surat', 'trim|required');
				$this->form_validation->set_rules('isi[desa]', 'Nama Desa', 'trim|required');
				$this->form_validation->set_rules('isi[keperluan]', 'Keperluan', 'trim|required');
				$this->form_validation->set_rules('isi[jenis_keramaian]', 'Jenis Kegiatan/Keramaian', 'trim|required');
				$this->form_validation->set_rules('isi[hari]', 'Hari', 'trim|required');
				$this->form_validation->set_rules('isi[tanggal]', 'Tanggal', 'trim|required');
				$this->form_validation->set_rules('isi[waktu]', 'Waktu', 'trim|required');
				$this->form_validation->set_rules('isi[tempat]', 'Tempat', 'trim|required');
				$this->form_validation->set_rules('isi[hiburan]', 'Hiburan', 'trim|required');
				break;
			case 'surat-izin-gangguan':
				$this->form_validation->set_rules('isi[no_surat_rek]', 'Nomor Surat', 'trim|required');
				$this->form_validation->set_rules('isi[tgl_surat_rek]', 'Tanggal Surat', 'trim|required');
				$this->form_validation->set_rules('isi[desa]', 'Nama Desa', 'trim|required');
				$this->form_validation->set_rules('isi[ttd_desa]', 'Tanda Tangan', 'trim|required');
				$this->form_validation->set_rules('isi[jabatan_desa]', 'Jabatan', 'trim|required');
				$this->form_validation->set_rules('isi[nama]', 'Nama Toko / Kios / Perusahaan ', 'trim|required');
				$this->form_validation->set_rules('isi[alamat]', 'Alamat', 'trim|required');
				$this->form_validation->set_rules('isi[jenis_kegiatan]', 'Jenis Kegiatan', 'trim|required');
				$this->form_validation->set_rules('isi[jenis_bangunan]', 'Jenis Bangunan', 'trim|required');
				$this->form_validation->set_rules('isi[lokasi_bangunan]', 'Lokasi Bangunan', 'trim|required');
				break;
			case 'izin-mendirikan-bangunan':
				$this->form_validation->set_rules('isi[desa]', 'Nama Desa', 'trim|required');
				$this->form_validation->set_rules('isi[nama_perusahaan]', 'Nama Perusahaan', 'trim|required');
				$this->form_validation->set_rules('isi[alamat_perusahaan]', 'Alamat Perusahaan', 'trim|required');
				$this->form_validation->set_rules('isi[jenis_bangunan]', 'Jenis Bangunan', 'trim|required');
				$this->form_validation->set_rules('isi[lokasi_bangunan]', 'Lokasi Bangunan', 'trim|required');
				$this->form_validation->set_rules('isi[gsb]', 'GSB', 'trim|required');
				$this->form_validation->set_rules('isi[jangka_tahun]', 'Tahun', 'trim');
				$this->form_validation->set_rules('isi[jangka_mulai]', 'Tanggal Mulai', 'trim');
				$this->form_validation->set_rules('isi[jangka_akhir]', 'Tanggal Akhir', 'trim');
				$this->form_validation->set_rules('isi[luas_bangunan][0][0]', 'Nilai', 'trim|required');
				$this->form_validation->set_rules('isi[luas_bangunan][0][1]', 'Nilai', 'trim|required');
				$this->form_validation->set_rules('isi[luas_bangunan][0][2]', 'Nilai', 'trim|required');
				break;
			case 'izin-usaha-perdagangan':
				$this->form_validation->set_rules('isi[desa]', 'Nama Desa', 'trim|required');
				$this->form_validation->set_rules('isi[nama_perusahaan]', 'Nama Perusahaan', 'trim|required');
				$this->form_validation->set_rules('isi[alamat_perusahaan]', 'Alamat Perusahaan', 'trim|required');
				$this->form_validation->set_rules('isi[kedudukan]', 'Kedudukan', 'trim|required');
				$this->form_validation->set_rules('isi[bentuk_perusahaan]', 'Bentuk Perusahaan', 'trim|required');
				$this->form_validation->set_rules('isi[bidang_usaha]', 'Bidang Usaha', 'trim|required');
				$this->form_validation->set_rules('isi[kegiatan_usaha]', 'Kegiatan Usaha', 'trim|required');
				$this->form_validation->set_rules('isi[jenis_barang_dagang][a]', 'Jenis Barang Dagang Utama', 'trim|required');
				$this->form_validation->set_rules('isi[jenis_barang_dagang][b]', 'Jenis Barang Dagang Utama', 'trim');
				$this->form_validation->set_rules('isi[jenis_barang_dagang][c]', 'Jenis Barang Dagang Utama', 'trim');
				$this->form_validation->set_rules('isi[jumlah_pekerja_laki]', 'Pekerja Laki-laki', 'trim|required');
				$this->form_validation->set_rules('isi[jumlah_pekerja_wanita]', 'Pekerja Wanita', 'trim|required');
				$this->form_validation->set_rules('isi[pekerja_laki][sd]', 'Pekerja Laki-laki', 'trim');
				$this->form_validation->set_rules('isi[pekerja_laki][sltp]', 'Pekerja Laki-laki', 'trim');
				$this->form_validation->set_rules('isi[pekerja_laki][slta]', 'Pekerja Laki-laki', 'trim');
				$this->form_validation->set_rules('isi[pekerja_laki][d3]', 'Pekerja Laki-laki', 'trim');
				$this->form_validation->set_rules('isi[pekerja_laki][s1]', 'Pekerja Laki-laki', 'trim');
				$this->form_validation->set_rules('isi[pekerja_laki][s2]', 'Pekerja Laki-laki', 'trim');
				$this->form_validation->set_rules('isi[modal_usaha]', 'Modal Usaha', 'trim|required');
				$this->form_validation->set_rules('isi[jangka_tahun]', 'Tahun', 'trim');
				$this->form_validation->set_rules('isi[jangka_mulai]', 'Tanggal Mulai', 'trim');
				$this->form_validation->set_rules('isi[jangka_akhir]', 'Tanggal Akhir', 'trim');
				break;
			case 'keterangan-tidak-mampu':
				$this->form_validation->set_rules('isi[no_surat_rek]', 'Nomor Surat', 'trim|required');
				$this->form_validation->set_rules('isi[tgl_surat_rek]', 'Tanggal Surat', 'trim|required');
				$this->form_validation->set_rules('isi[desa]', 'Nama Desa', 'trim|required');
				$this->form_validation->set_rules('isi[pejabat_lurah]', 'Pejabat Lurah / Kades', 'trim|required');
				$this->form_validation->set_rules('isi[nip_pejabat_lurah]', 'NIP Pejabat Lurah / Kades', 'trim|required');
				$this->form_validation->set_rules('isi[jabatan_pejabat_lurah]', 'Jabatan Pejabat Lurah', 'trim|required');
				$this->form_validation->set_rules('isi[keperluan]', 'Keperluan', 'trim|required');
				$this->form_validation->set_rules('isi[pengikut][0][id]', 'Minimal 1 Orang dalam Keluarga yang mengikuti', 'trim|required');
				break;
			case 'keterangan-pindah-jiwa':
				$this->form_validation->set_rules('isi[alasan_pindah]', 'Alasan Pindah', 'trim|required');
				$this->form_validation->set_rules('isi[desa]', 'Desa', 'trim|required');
				$this->form_validation->set_rules('isi[kecamatan]', 'Kecamatan', 'trim|required');
				$this->form_validation->set_rules('isi[kabupaten]', 'Kabupaten/Kota', 'trim|required');
				$this->form_validation->set_rules('isi[provinsi]', 'Provinsi', 'trim|required');
				$this->form_validation->set_rules('isi[tgl_pindah]', 'Tanggal Pindah', 'trim|required');
				/*$this->form_validation->set_rules('isi[pengikut][0][id]', 'Minimal 1 Orang dalam Keluarga yang mengikuti', 'trim|required');*/
				break;
			case 'sp3fat':
			case 'sp4fat':
				$this->form_validation->set_rules('isi[desa]', 'Nama Desa', 'trim|required');
				$this->form_validation->set_rules('isi[no_surat_kuasa]', 'No. Surat Kuasa', 'trim|required');
				$this->form_validation->set_rules('isi[tgl_surat_kuasa]', 'Tanggal Surat Kuasa', 'trim|required');
				$this->form_validation->set_rules('isi[tgl_diketahui]', 'Tanggal diketahui', 'trim|required');
				$this->form_validation->set_rules('isi[letak_tanah]', 'Letak Tanah', 'trim|required');
				$this->form_validation->set_rules('isi[luas_tanah]', 'Luas Tanah', 'trim|required');
				$this->form_validation->set_rules('isi[bts_utara][ket]', 'Keterangan Batas Tanah', 'trim|required');
				$this->form_validation->set_rules('isi[bts_utara][nama]', 'Ukuran Batas Tanah', 'trim|required');
				$this->form_validation->set_rules('isi[bts_timur][ket]', 'Keterangan Batas Tanah', 'trim|required');
				$this->form_validation->set_rules('isi[bts_timur][nama]', 'Ukuran Batas Tanah', 'trim|required');
				$this->form_validation->set_rules('isi[bts_selatan][ket]', 'Keterangan Batas Tanah', 'trim|required');
				$this->form_validation->set_rules('isi[bts_selatan][nama]', 'Ukuran Batas Tanah', 'trim|required');
				$this->form_validation->set_rules('isi[bts_barat][ket]', 'Keterangan Batas Tanah', 'trim|required');
				$this->form_validation->set_rules('isi[bts_barat][nama]', 'Ukuran Batas Tanah', 'trim|required');
				$this->form_validation->set_rules('isi[tahun_kuasa]', 'Tahun Kuasa', 'trim|required');
				break;
			case 'keterangan-waris':
				$this->form_validation->set_rules('isi[pejabat_lurah]', 'Pejabat Lurah / Kades', 'trim|required');
				$this->form_validation->set_rules('isi[nip_pejabat_lurah]', 'NIP Pejabat Lurah / Kades', 'trim|required');
				$this->form_validation->set_rules('isi[perangkat_desa]', 'Perangkat/Golongan', 'trim|required');
				$this->form_validation->set_rules('isi[jabatan_pejabat_lurah]', 'Jabatan Pejabat Lurah', 'trim|required');
				$this->form_validation->set_rules('isi[tgl_surat_waris]', 'Tanggal', 'trim|required');
				$this->form_validation->set_rules('isi[diketahui_oleh]', 'Keterangan diketahui', 'trim|required');
				$this->form_validation->set_rules('isi[tgl_diketahui]', 'Keterangan Tanggal', 'trim|required');
				$this->form_validation->set_rules('isi[no_akta_kematian]', 'Akta Kematian', 'trim|required');
				$this->form_validation->set_rules('isi[akta_ttd]', 'Keterangan Tanda tangan oleh ', 'trim|required');
				$this->form_validation->set_rules('isi[tgl_akta]', 'Tanggal  ', 'trim|required');
				$this->form_validation->set_rules('isi[nama]', 'Nama  ', 'trim|required');
				$this->form_validation->set_rules('isi[umur]', 'Umur  ', 'trim|required');
				$this->form_validation->set_rules('isi[alamat]', 'Alamat  ', 'trim|required');
				$this->form_validation->set_rules('isi[hari_mati]', 'Hari  ', 'trim|required');
				$this->form_validation->set_rules('isi[tgl_mati]', 'Tanggal  ', 'trim|required');
				$this->form_validation->set_rules('isi[tmp_mati]', 'Keterangan Tempat Kematian  ', 'trim|required');
				break;
			case 'keterangan-tinggal-sementara':
				$this->form_validation->set_rules('isi[desa]', 'Desa', 'trim|required');
				$this->form_validation->set_rules('isi[no_tanda_masuk]', 'No. Tanda Masuk', 'trim|required');
				$this->form_validation->set_rules('isi[tgl_tanda_masuk]', 'Tanggal Tanda Masuk', 'trim|required');
				$this->form_validation->set_rules('isi[alasan_pindah]', 'Alasan Pindah', 'trim|required');
				$this->form_validation->set_rules('isi[nama]', 'Nama', 'trim|required');
				$this->form_validation->set_rules('isi[alamat]', 'Alamat', 'trim|required');
				$this->form_validation->set_rules('isi[pekerjaan]', 'Pekerjaan', 'trim|required');
				$this->form_validation->set_rules('isi[alamat_pindah]', 'Alamat Pindah', 'trim|required');
				$this->form_validation->set_rules('isi[kd_pos_pindah]', 'Kode Pos', 'trim|required');
				$this->form_validation->set_rules('isi[desa_pindah]', 'Desa', 'trim|required');
				$this->form_validation->set_rules('isi[kecamatan_pindah]', 'Kecamatan', 'trim|required');
				$this->form_validation->set_rules('isi[kabupaten_pindah]', 'Kab/Kota', 'trim|required');
				$this->form_validation->set_rules('isi[provinsi_pindah]', 'Provinsi', 'trim|required');
				break;
			case 'keterangan-bersih-lingkungan':
				$this->form_validation->set_rules('isi[desa]', 'Desa', 'trim|required');
				$this->form_validation->set_rules('isi[no_surat_ket]', 'Nomor Surat', 'trim|required');
				$this->form_validation->set_rules('isi[tgl_surat_ket]', 'Tanggal Surat', 'trim|required');
				$this->form_validation->set_rules('isi[keperluan]', 'Keperluan', 'trim|required');
				break;
			case 'keterangan-pindah-wni':
				$this->form_validation->set_rules('isi[alasan_pindah]', 'Alasan Pindah', 'trim|required');
				$this->form_validation->set_rules('isi[alamat_pindah]', 'Alamat Pindah', 'trim|required');
				$this->form_validation->set_rules('isi[desa]', 'Desa', 'trim|required');
				$this->form_validation->set_rules('isi[kecamatan]', 'Kecamatan', 'trim|required');
				$this->form_validation->set_rules('isi[kabupaten]', 'Kabupaten/Kota', 'trim|required');
				$this->form_validation->set_rules('isi[provinsi]', 'Provinsi', 'trim|required');
				$this->form_validation->set_rules('isi[klasifikasi_pindah]', 'Klasifikasi Pindah', 'trim|required');
				$this->form_validation->set_rules('isi[jns_kepindahan]', 'Jenis Kepindahan', 'trim|required');
				$this->form_validation->set_rules('isi[status_kk_tdk_pindah]', 'Status KK bagi yang tidak pindah', 'trim|required');
				$this->form_validation->set_rules('isi[status_kk_pindah]', 'Status KK bagi yang pindah', 'trim|required');
				break;
			case 'pengantar-kartu-keluarga':
				$this->form_validation->set_rules('isi[pejabat_lurah]', 'Pejabat Lurah / Kades', 'trim|required');
				$this->form_validation->set_rules('isi[nip_pejabat_lurah]', 'NIP Pejabat Lurah / Kades', 'trim|required');
				$this->form_validation->set_rules('isi[jabatan_pejabat_lurah]', 'Jabatan Pejabat Lurah', 'trim|required');
				break;	
		}

		$this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'trim|required');
		$this->form_validation->set_rules('ttd_pejabat', 'Tanda Tangan', 'trim|required');
		$this->form_validation->set_rules('pemeriksa', 'Petugas Verifikasi', 'trim|required');
	}

	public function create_surat_notification($target_url = '', $recipient = 0)
	{
		$this->load->library('ci_pusher');

		$penerima = $this->db->get_where('pegawai', array('ID' => $recipient))->row('nip');		

		$pusher = $this->ci_pusher->get_pusher();

		$data = array(
			'message' => 'Anda memiliki 1 dokumen dari '.$this->session->userdata('account')->name.' untuk diperiksa.',
			'target_url' => $target_url,
			'icon' => (!$this->session->userdata('account')->photo) ? base_url("public/image/avatar.jpg") : base_url("public/image/{$this->session->userdata('account')->photo}"),
		); 

		// Send message
		$event = $pusher->trigger('channel-'.$penerima, 'notifikasi-buat-surat', $data);
	}
}



/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */