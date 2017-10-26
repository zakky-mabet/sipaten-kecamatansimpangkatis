<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Memployee_excel extends Sipaten_model 
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

			try {

				$excelReader = new PHPExcel_Reader_Excel2007();

            	$loadExcel = $excelReader->load($file_excel);	

            	$sheet = $loadExcel->getActiveSheet()->toArray(null, true, true ,true);

		        foreach ($sheet as $key => $value) 
		        {
		        	if($key > 1)
		        	{
		        		if($value['B'] == FALSE OR $this->nip_check($value['B'])) 
		        			continue;

						$employee = array(
							'nip' => $value['B'],
							'nama' => $value['C'],
							'jabatan' => $value['D'],
							'pangkat' => $value['E'],
							'jns_kelamin' => strtolower($value['F']),
							'alamat' => $value['H'],
							'telepon' => $value['I']
						);

						$this->db->insert('pegawai', $employee);
		        	}

					if($this->db->affected_rows())
					{
						$this->template->alert(
							' Data Pegawai berhasil diimpor.', 
							array('type' => 'success','icon' => 'check')
						);
					} else {
						$this->template->alert(
							' Tidak ada data yang diimpor.', 
							array('type' => 'warning','icon' => 'warning')
						);
					}
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

	/**
	 * Export Data Pegawai ke Excel
	 *
	 * @return Attachment excel
	 **/
	public function get()
	{
		$objPHPExcel = new PHPExcel();

		$worksheet = $objPHPExcel->createSheet(0);

	    for ($cell='A'; $cell <= 'H'; $cell++)
	    {
	        $worksheet->getStyle($cell.'1')->getFont()->setBold(true);
	    }

	    $worksheet->getStyle('A1:G1')->applyFromArray(
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

		 $worksheet->setCellValue('A1', 'NO.')
		 		   ->setCellValue('B1', 'NIP')
		 		   ->setCellValue('C1', 'NAMA LENGKAP')
		 		   ->setCellValue('D1', 'JABATAN')
		 		   ->setCellValue('E1', 'PANGKAT')
		 		   ->setCellValue('F1', 'JENIS KELAMIN')
		 		   ->setCellValue('G1', 'ALAMAT')
		 		   ->setCellValue('H1', 'TELEPON');

		$row_cell = 2;
		foreach($this->db->get('pegawai')->result() as $key => $value)
		{
			 $worksheet->setCellValue('A'.$row_cell, ++$key)
			 		   ->setCellValue('B'.$row_cell, $value->nip)
			 		   ->setCellValue('C'.$row_cell, $value->nama)
			 		   ->setCellValue('D'.$row_cell, $value->jabatan)
			 		   ->setCellValue('E'.$row_cell, $value->pangkat)
			 		   ->setCellValue('F'.$row_cell, ucfirst($value->jns_kelamin))
			 		   ->setCellValue('G'.$row_cell, $value->alamat)
			 		   ->setCellValue('H'.$row_cell, $value->telepon);

			$row_cell++;
		}

		$worksheet->setTitle("DATA PEGAWAI");

		$objPHPExcel->setActiveSheetIndex(0);

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="DATA-PEGAWAI.xlsx"');
        $objWriter->save("php://output");
	}
	

	/**
	 * Check Ketersediaan NIP
	 *
	 * @param Integer (ID)
	 * @return string
	 **/
	public function nip_check($param = 0)
	{
		return $this->db->get_where('pegawai', array('nip' => $param))->num_rows();
	}
}

/* End of file Memployee_excel.php */
/* Location: ./application/models/Memployee_excel.php */