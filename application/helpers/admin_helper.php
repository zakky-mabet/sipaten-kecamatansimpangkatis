<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if( ! function_exists('status_pengaduan') )
{
	function status_pengaduan($status = '')
	{
		switch ($status) {
			case 'no':
				return 'Belum Terverifikasi';
				break;
			case 'yes':
				return 'Terverifikasi';
				break;
			case 'read':
				return 'Terverifikasi';
				break;
			default:
				# code...
				break;
		}
	}
}

if( ! function_exists('status_nilai') )
{
	function status_nilai($status = '')
	{
		switch ($status) {
			case 'Sangat Baik':
				return 'sangat-baik.png';
				break;
			case 'Baik':
				return 'baik.png';
				break;
			case 'Cukup':
				return 'cukup.png';
				break;
			case 'Buruk':
				return 'buruk.png';
				break;
			default:
				return 'buruk.png';
				break;
		}
	}
}


if ( ! function_exists('tgl_indo'))
{
	function date_id($tgl, $format = FALSE)
	{
		date_default_timezone_set('Asia/Jakarta');
		$ubah = gmdate($tgl, time()+60*60*8);
		$pecah = explode("-",$ubah);
		$tanggal = $pecah[2];
		$bulan = bulan($pecah[1]);
		$tahun = $pecah[0];
		if($format == FALSE) 
		{
			return $tanggal.' '.$bulan.' '.$tahun;
		} else {
			return hari_ini(date('D')).', '.$tanggal.' '.$bulan.' '.$tahun;
		}
	}
}

if ( ! function_exists('hari_ini'))
{
	function hari_ini($hari_ini)
	{
		date_default_timezone_set('Asia/Jakarta');

		switch ($hari_ini) {
			case 'Sun':
				return 'Minggu';
				break;
			case 'Mon':
				return 'Senin';
				break;
			case 'Tue':
				return 'Selasa';
				break;
			case 'Wed':
				return 'Rabu';
				break;
			case 'Thu':
				return 'Kamis';
				break;
			case 'Fri':
				return 'Jumat';
				break;
			case 'Sat':
				return 'Sabtu';
				break;
			default:
				return 'Invalid day!';
				break;
		}
	}
}

if ( ! function_exists('bulan'))
{
	function bulan($bln)
	{
		switch ($bln)
		{
			case 1:
				return "Januari";
				break;
			case 2:
				return "Februari";
				break;
			case 3:
				return "Maret";
				break;
			case 4:
				return "April";
				break;
			case 5:
				return "Mei";
				break;
			case 6:
				return "Juni";
				break;
			case 7:
				return "Juli";
				break;
			case 8:
				return "Agustus";
				break;
			case 9:
				return "September";
				break;
			case 10:
				return "Oktober";
				break;
			case 11:
				return "November";
				break;
			case 12:
				return "Desember";
				break;
		}
	}
}


/* End of file admin_helper.php */
/* Location: ./application/helpers/admin_helper.php */