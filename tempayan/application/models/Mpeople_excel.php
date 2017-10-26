<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* SIMPATEN
* People Model Excel Class 
*
* @version 1.0.0
* @author Vicky Nitinegoro <pkpvicky@gmail.com>
*/

class Mpeople_excel extends Sipaten_model 
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
		        		if($value['B'] == FALSE OR $this->nik_check($value['B'])) 
		        			continue;

		        		if( $this->desa($value['M']) )
		        		{
		        			$desa = $this->desa($value['M']);
		        		} else {
		        			$desa_in = array(
		        				'nama_desa' => $value['M'],
		        				'slug' => $this->slug->create_slug($value['M']),
		        				'kepala_desa' => ''
		        			);

		        			$this->db->insert('desa', $desa_in);

		        			$desa = $this->db->insert_id();
		        		}

						$people = array(
							'nik' => $value['B'],
							'no_kk' => $value['C'],
							'status_kk' => $value['D'],
							'nama_lengkap' => $value['E'],
							'tmp_lahir' => $value['G'],
							'tgl_lahir' => date("Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($value['H'])),
							'jns_kelamin' => strtolower($value['F']),
							'alamat' => $value['Q'],
							'rt' => $value['O'],
							'rw' => $value['P'],
							'desa' => $desa,
							'kecamatan' => $value['N'],
							'agama' => strtolower($value['I']),
							'pekerjaan' => $value['R'],
							'kewarganegaraan' => strtolower($value['J']),
							'status_kawin' => strtolower($value['K']),
							'gol_darah' => strtoupper($value['L']),
							'telepon' => $value['S'],
							'kd_pos' => $value['T']
						);

						$this->db->insert('penduduk', $people);
		        	// End Baris ketiga
		        	}

					if($this->db->affected_rows())
					{
						$this->template->alert(
							' Data Penduduk berhasil diimpor.', 
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
	
	/**
	 * Export Data Penduduk ke Excel
	 *
	 * @return Attachment excel
	 **/
	public function get($limit = 300, $offset = 0)
	{
		$objPHPExcel = new PHPExcel();

		$worksheet = $objPHPExcel->createSheet(0);

	    for ($cell='A'; $cell <= 'S'; $cell++)
	    {
	        $worksheet->getStyle($cell.'1')->getFont()->setBold(true);
	    }

	    $worksheet->getStyle('A1:S1')->applyFromArray(
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
		 		   ->setCellValue('B1', 'NIK')
		 		   ->setCellValue('C1', 'NO. KK')
		 		   ->setCellValue('D1', 'STATUS KK')
		 		   ->setCellValue('E1', 'NAMA LENGKAP')
		 		   ->setCellValue('F1', 'JENIS KELAMIN')
		 		   ->setCellValue('G1', 'TEMPAT LAHIR')
		 		   ->setCellValue('H1', 'TANGGAL LAHIR')
		 		   ->setCellValue('I1', 'AGAMA')
		 		   ->setCellValue('J1', 'KEWARGANEGARAAN')
		 		   ->setCellValue('K1', 'STATUS PERKAWINAN')
		 		   ->setCellValue('L1', 'GOLONGAN DARAH')
		 		   ->setCellValue('M1', 'DESA KELURAHAN')
		 		   ->setCellValue('N1', 'RT')
		 		   ->setCellValue('O1', 'RW')
		 		   ->setCellValue('P1', 'ALAMAT')
		 		   ->setCellValue('Q1', 'PEKERJAAN')
		 		   ->setCellValue('R1', 'TELEPON')
		 		   ->setCellValue('S1', 'KODE POS');

		$this->db->join('desa', 'penduduk.desa = desa.id_desa', 'left');

		$row_cell = 2;
		foreach($this->db->get('penduduk', $limit, $offset)->result() as $key => $value)
		{
			$date = new DateTime($value->tgl_lahir);

			 $worksheet->setCellValue('A'.$row_cell, ++$key)
			 		   ->setCellValue('B'.$row_cell, $value->nik)
			 		   ->setCellValue('C'.$row_cell, $value->no_kk)
			 		   ->setCellValue('D'.$row_cell, strtoupper($value->status_kk))
			 		   ->setCellValue('E'.$row_cell, $value->nama_lengkap)
			 		   ->setCellValue('F'.$row_cell, ucfirst($value->jns_kelamin))
			 		   ->setCellValue('G'.$row_cell, $value->tmp_lahir)
			 		   ->setCellValue('H'.$row_cell, $date->format('d/m/Y'))
			 		   ->setCellValue('I'.$row_cell, ucfirst($value->agama))
			 		   ->setCellValue('J'.$row_cell, strtoupper($value->kewarganegaraan))
			 		   ->setCellValue('K'.$row_cell, strtoupper($value->status_kawin))
			 		   ->setCellValue('L'.$row_cell, strtoupper($value->gol_darah))
			 		   ->setCellValue('M'.$row_cell, $value->nama_desa)
			 		   ->setCellValue('N'.$row_cell, $value->rt)
			 		   ->setCellValue('O'.$row_cell, $value->rw)
			 		   ->setCellValue('P'.$row_cell, $value->alamat)
			 		   ->setCellValue('Q'.$row_cell, $value->pekerjaan)
					   ->setCellValue('R'.$row_cell, $value->telepon)
					   ->setCellValue('T'.$row_cell, $value->kd_pos);

			$row_cell++;
		}

		// Sheet Title
		$worksheet->setTitle("DATA PENDUDUK");

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
	 * Check Ketersediaan NIK
	 *
	 * @param Integer (user_id)
	 * @return string
	 **/
	public function nik_check($param = 0)
	{
		return $this->db->get_where('penduduk', array('nik' => $param))->num_rows();
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

/* End of file Mpeople_excel.php */
/* Location: ./application/models/Mpeople_excel.php */