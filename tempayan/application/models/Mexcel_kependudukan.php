<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mexcel_kependudukan extends Sipaten_model 
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

	/**
	 * Call PHPExcel
	 *
	 **/
	private $objPHPExcel;

	/**
	 * Create Wokrsheet
	 *
	 **/
	public $worksheet;


	public function __construct()
	{
		parent::__construct();

		ini_set('max_execution_time', 3000); 

		$this->load->library(array('Excel/PHPExcel'));

		$this->count_penduduk = $this->db->count_all('penduduk');

		$this->count_desa = $this->db->count_all('desa');

		$this->objPHPExcel = new PHPExcel();

		$this->worksheet = $this->objPHPExcel->createSheet(0);
	}

	/**
	 * Hitung Populasi by desa
	 *
	 * @param Integer 
	 * @return Bool
	 **/
	public function desa_population($param = 0, $jns_kelamin = '')
	{
		if($jns_kelamin != '')
			$this->db->where('jns_kelamin', $jns_kelamin);

		return $this->db->get_where('penduduk', array('desa' => $param))->num_rows();
	}

	public function desa()
	{
		$this->_header();

		$row_cell = 2;
		foreach($this->db->get('desa')->result() as $key => $value)
		{
			 $this->worksheet->setCellValue('A'.$row_cell, ++$key)
			 		   ->setCellValue('B'.$row_cell, $value->nama_desa)
			 		   ->setCellValue('C'.$row_cell, $this->desa_population($value->id_desa))
			 		   ->setCellValue('D'.$row_cell, $this->desa_population($value->id_desa, 'laki-laki'))
			 		   ->setCellValue('E'.$row_cell, $this->desa_population($value->id_desa, 'perempuan'));

			$row_cell++;
		}

		$this->_footer();
	}

	public function gender()
	{
		$this->_header('gender', 'C');

		$this->worksheet->setCellValue('A2', 1)
			 		 ->setCellValue('B2', 'LAKI-LAKI')
			 		 ->setCellValue('C2', $this->db->get_where('penduduk', array('jns_kelamin' => 'laki-laki'))->num_rows());

		$this->worksheet->setCellValue('A3', 2)
			 		 ->setCellValue('B3', 'PEREMPUAN')
			 		 ->setCellValue('C3', $this->db->get_where('penduduk', array('jns_kelamin' => 'perempuan'))->num_rows());

		$this->_footer('JENIS-KELAMIN');
	}

	public function perkawinan()
	{
		$this->_header('perkawinan','C');

		$row_cell = 2;
		foreach($this->get_status_perkawinan() as $key => $value)
		{
			 $this->worksheet->setCellValue('A'.$row_cell, ++$key)
			 		   ->setCellValue('B'.$row_cell, strtoupper($value->status_kawin))
			 		   ->setCellValue('C'.$row_cell, $this->db->get_where('penduduk', array('status_kawin' => $value->status_kawin))->num_rows());

			$row_cell++;
		}

		$this->_footer('STATUS-PERKAWINAN');
	}

	public function agama()
	{
		$this->_header('agama','C');

		$row_cell = 2;
		foreach($this->get_religion() as $key => $value)
		{
			 $this->worksheet->setCellValue('A'.$row_cell, ++$key)
			 		   ->setCellValue('B'.$row_cell, strtoupper($value->agama))
			 		   ->setCellValue('C'.$row_cell, $this->db->get_where('penduduk', array('agama' => $value->agama))->num_rows());

			$row_cell++;
		}

		$this->_footer('AGAMA');
	}

	public function kewarganegaraan()
	{
		$this->_header('kewarganegaraan', 'C');

		$this->worksheet->setCellValue('A2', 1)
			 		 ->setCellValue('B2', 'WNI')
			 		 ->setCellValue('C2', $this->db->get_where('penduduk', array('kewarganegaraan' => 'wni'))->num_rows());

		$this->worksheet->setCellValue('A3', 2)
			 		 ->setCellValue('B3', 'WNA')
			 		 ->setCellValue('C3', $this->db->get_where('penduduk', array('kewarganegaraan' => 'wna'))->num_rows());

		$this->_footer('KEWARGANEGARAAN');
	}

	public function gol_darah()
	{
		$this->_header('gol_darah','C');

		$row_cell = 2;
		foreach($this->get_golongan_darah() as $key => $value)
		{
			 $this->worksheet->setCellValue('A'.$row_cell, ++$key)
			 		   ->setCellValue('B'.$row_cell, strtoupper($value->gol_darah))
			 		   ->setCellValue('C'.$row_cell, $this->db->get_where('penduduk', array('gol_darah' => $value->gol_darah))->num_rows());

			$row_cell++;
		}

		$this->_footer('GOLONGAN-DARAH');
	}

	/**
	 * Create Header Excel
	 *
	 * @var string
	 **/
	public function _header($method = 'desa', $column_end = 'E')
	{
	    for ($cell='A'; $cell <= $column_end; $cell++)
	    {
	        $this->worksheet->getStyle($cell.'1')->getFont()->setBold(true);
	    }

	    $this->worksheet->getStyle("A1:{$column_end}1")->applyFromArray(
	    	array(
		        'alignment' => array(
		            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		        ),
		        'borders' => array(
		            'allborders' => array(
		                'style' => PHPExcel_Style_Border::BORDER_THIN,
		                'color' => array('rgb' => '000000')
		            )
		        ),
		        'fill' => array(
		            'type' => PHPExcel_Style_Fill::FILL_SOLID,
		            'color' => array('rgb' => 'F2F2F2')
		        )
	    	)
	    );

	    switch ($method) 
	    {
	    	case 'gender':
	    	case 'perkawinan':
	    	case 'agama':
	    	case 'kewarganegaraan':
	    	case 'gol_darah':
		 	$this->worksheet->setCellValue('A1', 'NO.')
		 		   ->setCellValue('B1', 'JENIS KELOMPOK')
		 		   ->setCellValue('C1', 'JUMLAH');
	    		break;
	    	
	    	default:
		 	$this->worksheet->setCellValue('A1', 'NO.')
		 		   ->setCellValue('B1', 'DESA')
		 		   ->setCellValue('C1', 'JUMLAH SEMUA')
		 		   ->setCellValue('D1', 'JUMLAH LAKI-LAKI')
		 		   ->setCellValue('E1', 'JUMLAH PEREMPUAN');
	    		break;
	    }
	}

	/**
	 * Create Footer Excel
	 *
	 * @var string
	 **/
	public function _footer($file_name = 'DESA')
	{
		// Sheet Title
		$this->worksheet->setTitle($file_name);

		$this->objPHPExcel->setActiveSheetIndex(0);

        $objWriter = PHPExcel_IOFactory::createWriter($this->objPHPExcel, 'Excel2007');
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename='{$file_name}.xlsx'");
        $objWriter->save("php://output");
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
}

/* End of file Mexcel_kependudukan.php */
/* Location: ./application/models/Mexcel_kependudukan.php */