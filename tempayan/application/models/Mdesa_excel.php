<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* SIMPATEN
* Desa Model Class 
*
* @version 1.0.0
* @author Vicky Nitinegoro <pkpvicky@gmail.com>
*/

class Mdesa_excel extends Sipaten_model 
{
	public function __construct()
	{
		parent::__construct();

		ini_set('max_execution_time', 3000); 

		$this->load->library(array('Excel/PHPExcel','upload','slug'));
	}
	
	public function upload()
	{
		$config['upload_path'] = 'public/excel';
		$config['allowed_types'] = 'xlsx';
		$config['max_size']  = '5120';
		
		$this->upload->initialize($config);
		
		if ( ! $this->upload->do_upload('file_excel')) 
		{
			$this->template->alert(
				$this->upload->display_errors('<span>','</span>'), 
				array('type' => 'warning','icon' => 'warning')
			);
		} else {

			$file_excel = "./public/excel/{$this->upload->file_name}";

			// Identifikasi File Excel Reader
			try {

				$excelReader = new PHPExcel_Reader_Excel2007();

            	$loadExcel = $excelReader->load($file_excel);	

            	$sheet = $loadExcel->getActiveSheet()->toArray(null, true, true ,true);

		        // Loops Excel data reader

		        foreach ($sheet as $key => $value) 
		        {
		        	// Mulai Dari Baris ketiga
		        	if($key > 1)
		        	{
		        		if( $this->desa($value['B']) )
		        			continue;

						$people = array(
							'nama_desa' => $value['B'],
							'slug' => $this->slug->create_slug($value['B']),
							'kepala_desa' => $value['C'],
						);

						$this->db->insert('desa', $people);
		        	// End Baris ketiga
		        	}

					if($this->db->affected_rows())
					{
						$this->template->alert(
							' Data desa berhasil diimpor.', 
							array('type' => 'success','icon' => 'check')
						);
					} else {
						$this->template->alert(
							' Tidak ada data yang diimpor.', 
							array('type' => 'warning','icon' => 'warning')
						);
					}
		        // End Loop
		        }

		        unlink("./public/excel/{$this->upload->file_name}");
			} catch (Exception $e) {
				$this->template->alert(
					' Error loading file "'.pathinfo($file_excel,PATHINFO_BASENAME).'": '.$e->getMessage(), 
					array('type' => 'warning','icon' => 'warning')
				);
			}
		}
	}

	public function get()
	{
		$objPHPExcel = new PHPExcel();

		$worksheet = $objPHPExcel->createSheet(0);

	    for ($cell='A'; $cell <= 'C'; $cell++)
	    {
	        $worksheet->getStyle($cell.'1')->getFont()->setBold(true);
	    }

	    $worksheet->getStyle('A1:C1')->applyFromArray(
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

		// Header dokumen
		 $worksheet->setCellValue('A1', 'NO.')
		 		   ->setCellValue('B1', 'DESA')
		 		   ->setCellValue('C1', 'KEPALA DESA');

		$row_cell = 2;
		foreach($this->db->get('desa')->result() as $key => $value)
		{
			 $worksheet->setCellValue('A'.$row_cell, ++$key)
			 		   ->setCellValue('B'.$row_cell, $value->nama_desa)
			 		   ->setCellValue('C'.$row_cell, $value->kepala_desa);

			$row_cell++;
		}

		// Sheet Title
		$worksheet->setTitle("DATA DESA");

		$objPHPExcel->setActiveSheetIndex(0);

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="DATA-PENDUDUK.xlsx"');
        $objWriter->save("php://output");
	}

	/**
	 * Ambil ID Desa
	 *
	 * @param String (Nama Desa)
	 * @return Integer
	 **/
	public function desa($param = '')
	{
		return $this->db->get_where('desa', array('slug' => $this->slug->create_slug($param)))->row('id_desa');
	}
}

/* End of file Mdesa_excel.php */
/* Location: ./application/models/Mdesa_excel.php */