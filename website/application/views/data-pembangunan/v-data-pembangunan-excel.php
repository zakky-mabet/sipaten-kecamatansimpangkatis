<?php
 
 header("Content-type: application/vnd-ms-excel");
 
 header("Content-Disposition: attachment; filename=$title.xls");
 
 header("Pragma: no-cache");
 
 header("Expires: 0");
 
 ?>
 <style type="text/css" media="screen">
 	table,thead,tr,td { border: 1pt solid black }
 </style>
 
			            <table class="table table-bordered ">
			              <thead>
			                <tr>
			                  <th rowspan="2" width="10" class="text-center">No</th>
			                  <th rowspan="2" class="text-center">Nama Kegiatan</th>
			                  <th rowspan="2" class="text-center">Lokasi</th>
			               	  <th colspan="5" class="text-center">Biaya dan Sumber pembiayaan</th>
			             	  <th rowspan="2" class="text-center">Pola Pelaksanaan</th>
			             	  <th rowspan="2" class="text-center">Penanggung Jawab OPD</th>
			                </tr>
			                <tr>
			                	<th class="text-center">Sasaran</th>
				                <th class="text-center">Volume</th>
				                <th class="text-center">Dana</th>
				                <th class="text-center">Sumber</th>
				                <th class="text-center">Tahun</th>
			                </tr>
			              </thead>
			              <tbody>
			              
			              	
			             
			              <?php  if (!$get_all) { ?>
			              	<tr>
              					<th colspan="10" class="text-center">
              					<div class='col-md-6 col-md-offset-3'><br>
              					<div class='alert alert-warning animated bounce'>
              					<button type='button' class='close' data-dismiss='alert' style='text-align:justify;'><i class='ace-icon fa fa-times'></i></button>
              					<strong><i class='ace-icon fa fa-warning'></i> Maaf !</strong> Data Tidak ditemukan</div></div></th>
            					</tr>
			              <?php } else { $no=1; foreach ($get_all as $key => $value) { ?>
		
			              	<tr>
			                	<td width="10" class="text-center"><?php echo $no++ ?></td>
				                <td><?php echo highlight_phrase($value->nama_kegiatan, $this->input->get('query'), '<span class="accent-color">', '</span>');?></td>
				                <td class="text-center"><?php echo highlight_phrase($value->lokasi, $this->input->get('query'), '<span class="accent-color">', '</span>');?></td>
				                <td class="text-center"><?php echo highlight_phrase($value->sasaran, $this->input->get('query'), '<span class="accent-color">', '</span>');?></td>
				                <td class="text-center"><?php echo $value->volume ?></td>
				                <td class="text-center"><?php echo number_format($value->dana,0,".","."); ?></td>
				                <td class="text-center"><?php echo highlight_phrase($value->sumber, $this->input->get('query'), '<span class="accent-color">', '</span>');?></td>
				                <td class="text-center"><?php echo highlight_phrase($value->tahun, $this->input->get('query'), '<span class="accent-color">', '</span>');?></td>
				                <td class="text-center"><?php echo highlight_phrase($value->pola_pelaksanaan, $this->input->get('query'), '<span class="accent-color">', '</span>');?></td>
				                <td class="text-center"><?php echo highlight_phrase($value->penanggung_jawab, $this->input->get('query'), '<span class="accent-color">', '</span>');?></td>
				             
			                </tr>

			                <?php } }?>

			              </tbody>
			            </table>
			          