<div id="sticker" style="background: white;">
					<table class="table table-bordered">
						<tbody>
							<tr>
								<th width="160" class="bg-primary text-right">NIK :</th>
								<td id="data-nik"><?php echo $get->nik; ?></td>
							</tr>
							<tr>
								<th class="bg-primary text-right">Nama :</th>
								<td id="data-nama"><?php echo $get->nama_lengkap; ?></td>
							</tr>
							<tr>
								<th class="bg-primary text-right">Tempat, Tanggal Lahir :</th>
								<td id="data-tgl-lahir"><?php echo ucfirst($get->tmp_lahir).', '.date_id($get->tgl_lahir); ?></td>
							</tr>
							<tr>
								<th class="bg-primary text-right">Jenis Kelamin :</th>
								<td id="data-jns-kelamin"><?php echo ucfirst($get->jns_kelamin); ?></td>
							</tr>
							<tr>
								<th class="bg-primary text-right">Alamat : <br> RT/RW : <br>Kel/Desa : <br>Kecamatan :</th>
								<td id="data-alamat">
									<?php echo $get->alamat.'<br>'.$get->rt.' / '.$get->rw.'<br>'.$get->nama_desa.'<br>'.$this->option->get('kecamatan'); ?>
								</td>
							</tr>
							<tr>
								<th class="bg-primary text-right">Agama :</th>
								<td id="data-agama"><?php echo ucfirst($get->agama); ?></td>
							</tr>
							<tr>
								<th class="bg-primary text-right">Status Perkawinan :</th>
								<td id="data-status-kawin"><?php echo strtoupper($get->status_kawin); ?></td>
							</tr>
							<tr>
								<th class="bg-primary text-right">Kewarganegaraan :</th>
								<td id="data-kewarganegaraan"><?php echo strtoupper($get->kewarganegaraan); ?></td>
							</tr>
						</tbody>
					</table>
					<h4>Syarat Penerbitan Surat :</h4>
	              	<ol>
	              	<?php  
	              	/* Loop Syarat Surat */
	              	foreach($syarat as $row) :
	              	?>
	                	<li><?php echo $row->nama_syarat; ?></li>
	                <?php  
	                endforeach;
	                ?>
	              	</ol>
</div>