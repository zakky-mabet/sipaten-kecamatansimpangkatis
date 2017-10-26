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

if( !  function_exists('romawi') )
{
	function romawi($integer = 1)
	{
	    $table = array('M'=>1000, 'CM'=>900, 'D'=>500, 'CD'=>400, 'C'=>100, 'XC'=>90, 'L'=>50, 'XL'=>40, 'X'=>10, 'IX'=>9, 'V'=>5, 'IV'=>4, 'I'=>1); 
	    $return = ''; 
	    while($integer > 0) 
	    { 
	        foreach($table as $rom=>$arb) 
	        { 
	            if($integer >= $arb) 
	            { 
	                $integer -= $arb; 
	                $return .= $rom; 
	                break; 
	            } 
	        } 
	    } 

	    return $return; 
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

/* End of file indonesia_helper.php */
/* Location: ./application/helpers/indonesia_helper.php */