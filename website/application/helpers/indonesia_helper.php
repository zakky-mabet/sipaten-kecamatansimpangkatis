<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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

if ( ! function_exists('bulan_english'))
{
	function bulan_english($bln)
	{
		switch ($bln)
		{
			case 01:
				return "JAN";
				break;
			case 02:
				return "FEB";
				break;
			case 03:
				return "MAR";
				break;
			case 04:
				return "APR";
				break;
			case 05:
				return "MAY";
				break;
			case 06:
				return "JUN";
				break;
			case 07:
				return "JUL";
				break;
			case 08:
				return "Augt";
				break;
			case 09:
				return "SEP";
				break;
			case 10:
				return "OCT";
				break;
			case 11:
				return "NOV";
				break;
			case 12:
				return "DEC";
				break;
		}
	}
}


if( !  function_exists('nomo_urut') )
{
	function nomor_urut($number = 0)
	{
		switch (strlen($number)) 
		{
			case 1:
				return '000'.$number;
				break;
			case 2:
				return '00'.$number;
				break;
			case 3:
				return '0'.$number;
				break;
			default:
				return $number;
				break;
		}
	}
}

if( ! function_exists('bilangan') ) 
{
	function bilangan($x) {
	    $x = abs($x);
	    $angka = array("", "satu", "dua", "tiga", "empat", "lima",
	    "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
	    $temp = "";
	    if ($x <12) {
	        $temp = " ". $angka[$x];
	    } else if ($x < 20) 
	    {
	        $temp = bilangan($x - 10). " belas";
	    } else if ($x < 100) 
	    {
	        $temp = bilangan($x / 10)." puluh". bilangan($x % 10);
	    } else if ($x < 200) 
	    {
	        $temp = " seratus" . bilangan($x - 100);
	    } else if ($x < 1000) 
	    {
	        $temp = bilangan($x / 100) . " ratus" . bilangan($x % 100);
	    } else if ($x < 2000) 
	    {
	        $temp = " seribu" . bilangan($x - 1000);
	    } else if ($x < 1000000) 
	    {
	        $temp = bilangan($x / 1000) . " ribu" . bilangan($x % 1000);
	    } else if ($x < 1000000000) 
	    {
	        $temp = bilangan($x / 1000000) . " juta" . bilangan($x % 1000000);
	    } else if ($x < 1000000000000) 
	    {
	        $temp = bilangan($x / 1000000000) . " milyar" . bilangan(fmod($x,1000000000));
	    } else if ($x < 1000000000000000) 
	    {
	        $temp = bilangan($x / 1000000000000) . " trilliun" . bilangan(fmod($x,1000000000000));
	    }     
	        return $temp;
	}
}

if( ! function_exists('terbilang') )
{
	function terbilang($x, $karakter_model =4 ) 
	{
	    if($x < 0) 
	    {
	        $hasil = "minus ". trim(bilangan($x));
	    } else {
	        $hasil = trim(bilangan($x));
	    }     
	    switch ( $karakter_model ) {
	        case 'strtoupper':
	            $hasil = strtoupper($hasil);
	            break;
	        case 'strtolower':
	            $hasil = strtolower($hasil);
	            break;
	        case 'ucwords':
	            $hasil = ucwords($hasil);
	            break;
	        default:
	            $hasil = ucfirst($hasil);
	            break;
	    }     
	    return $hasil;
	}
}

if( !  function_exists('get_file') )
{
	function get_file($file = '', $title='')
	{	$array = explode('.', $file);
		switch ($array[1]) 
		{
			case 'pdf':
				return '<embed src="'.base_url('assets/images/'.$file).'" type="application/pdf" width="100%" height="200"></embed>';
				break;
			case 'jpg':
				return '<a class="lightbox" title=" '.$title.' " href="'.base_url('assets/images/'.$file).'">
                			<img alt="'.$title.'" width="100%" src="'.base_url('assets/images/'.$file).'" />
             			 </a>';
				break;
			default:
				return '<span class="text-orange">Tidak Terdefinisi</span>';
				break;
		}
	}
}

if( !  function_exists('status') )
{
	function status($status = '')
	{
		switch ($status) 
		{
			case 'show':
				return '<span class="text-blue">Publish<span>';
				break;
			case 'hide':
				return '<span class="text-red">Pending</span>';
				break;
			default:
				return '<span class="text-orange">Tidak Terdefinisi</span>';
				break;
		}
	}
}

if( !  function_exists('status_read') )
{
	function status_read($status_read = '')
	{
		switch ($status_read) 
		{
			case 'read':
				return '<span class="text-blue">Read<span>';
				break;
			case 'unread':
				return '<span class="text-red">Unread</span>';
				break;
			default:
				return '<span class="text-orange">Tidak Terdefinisi</span>';
				break;
		}
	}
}


if( !  function_exists('status_log') )
{
	function status_log($status_log = '')
	{
		switch ($status_log) 
		{
			case 'yes':
				return '<span class="text-blue">YA<span>';
				break;
			case 'no':
				return '<span class="text-red">TIDAK</span>';
				break;
			default:
				return '<span class="text-orange">Tidak Terdefinisi</span>';
				break;
		}
	}
}


if( !  function_exists('status_hak') )
{
	function status_hak($status_hak = '')
	{
		switch ($status_hak) 
		{
			case 'admin':
				return '<span class="text-blue">Admin<span>';
				break;
			case 'operator':
				return '<span class="text-red">Operator</span>';
				break;
			case 'khusus_pembangunan':
				return '<span class="text-green">Khusus Pembangunan</span>';
				break;
			default:
				return '<span class="text-orange">Tidak Terdefinisi</span>';
				break;
		}
	}
}


if( !  function_exists('eye_status') )
{
	function eye_status($eye_status = '')
	{
		switch ($eye_status) 
		{
			case 'show':
				return 'fa-eye';
				break;
			case 'hide':
				return 'fa-eye-slash';
				break;
			default:
				return '';
				break;
		}
	}
}

if( !  function_exists('kontak_status') )
{
	function kontak_status($kontak_status = '')
	{
		switch ($kontak_status) 
		{
			case 'read':
				return 'fa-eye';
				break;
			case 'unread':
				return 'fa-eye-slash';
				break;
			default:
				return '';
				break;
		}
	}
}

if( !  function_exists('admin_status') )
{
	function admin_status($admin_status = '')
	{
		switch ($admin_status) 
		{
			case 'yes':
				return 'fa-eye';
				break;
			case 'no':
				return 'fa-eye-slash';
				break;
			default:
				return '';
				break;
		}
	}
}

/* End of file indonesia_helper.php */
/* Location: ./application/helpers/indonesia_helper.php */