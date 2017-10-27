<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rest_api extends CI_Model 
{
	public $url;

	public $method;

	public function __construct()
	{
		parent::__construct();
		
		$this->load->library( array('curl') );
	
		$this->url = "http://teitramega.co.id/simpangkatis/api";

		$this->method = $this->input->get('ID');
	}
	
	public function surat()
	{
		$surat = json_decode( $this->curl->simple_get( $this->url . '/surat?ID=' . $this->method ) );

		if( $surat  != NULL) 
		{
			if( $this->method != '') 
			{
				return $surat[0];
			} else {
				return $surat;
			}
		} else {
			return FALSE;
		}
	}

	public function update($param = '')
	{
		$update_surat = json_decode( $this->curl->simple_put( $this->url . '/surat/' . $param ) );

		return $update_surat;
	}

	/**
	 * Get Data Penduduk
	 *
	 * @param Integer (NIK)
	 * @var string
	 **/
	public function penduduk($param = '')
	{
		$penduduk = json_decode( $this->curl->simple_get( $this->url . '/penduduk?nik=' . $param ) );

		if( $penduduk != NULL) 
		{
			if( $this->method != '') 
			{
				return $penduduk;
			} else {
				return $penduduk;
			}
		} else {
			return FALSE;
		}
	}

	/**
	 * Abil Desa
	 *
	 * @var string
	 **/
	public function desa($param = '')
	{
		return json_decode( $this->curl->simple_get( $this->url . '/penduduk/pdesa?nik=' . $param ) );
	}


	/**
	 * Generate DOM file
	 *
	 * @param String (Url)
	 * @return String
	 **/
	public function view_file($url = '')
	{
		$filepath = pathinfo($url);

		switch ( @$filepath['extension'] ) 
		{
			case 'jpg':
			case 'gif':
			case 'png':
			case 'JPG':
			case 'GIF':
			case 'PNG':
				return '<a href="'.$url.'" data-toggle="lightbox"  data-title="Berkas Gambar"><i class="fa fa-image"></i> </a>';
				break;
			case 'pdf':
			case 'PDF':
				return '<a href="'.$url.'" target="_blank"><i class="fa fa-file-pdf-o"></i></a>';
				break;
			default:
				# code...
				break;
		}
	}
}

/* End of file Rest_api.php */
/* Location: ./application/models/Rest_api.php */