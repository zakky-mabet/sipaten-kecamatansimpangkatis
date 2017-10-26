<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('pesan'); ?></div>
	<div class="col-md-12">
		<div class="box box-warning">
			<div class="box-header with-border">
				<div class="col-md-7">
					<h3 class="box-title"><?php echo $get->ID_penilaian ?></h3>
				</div>
			</div>
			<div class="box-body">
				<div class="col-md-6">
				<h4>Penilaian</h4>	
				<?php if ($get->status_nilai == 'no'): ?>
					<p>Belum ada penilaian.</p>
			<?php else : ?>
					
					<table class="table table-striped" style="margin-bottom: 20px;">
						<tr>
							<th width="150">ID Penilaian</th>
							<td width="40" class="text-center">:</td>
							<td><?php echo $get->ID_penilaian; ?></td>
						</tr>
						<tr>
							<th>Nilai</th>
							<td class="text-center">:</td>
							<td><?php echo $get->penilaian; ?></td>
						</tr>
						<tr>
						<?php if ($get->penilaian == 'Sangat') {
							# code...
						} ?>
							<td colspan="3" class="text-center"><img src="<?php echo base_url('assets/img').'/'.status_nilai($get->penilaian) ?>" alt=""></td>
						</tr>
					</table>
				<?php endif ?>
				</div>	
	
				<div class="col-md-6">
					<h4>Identitas Pengadu</h4>
					<table class="table table-striped" style="margin-bottom: 20px;">
						<tr>
							<th width="150">NIK</th>
							<td width="40" class="text-center">:</td>
							<td><?php echo $get->nik; ?></td>
						</tr>
						<tr>
							<th>Nama lengkap</th>
							<td class="text-center">:</td>
							<td><?php echo $get->nama_lengkap; ?></td>
						</tr>
						<tr>
							<th>Jenis Kelamin</th>
							<td class="text-center">:</td>
							<td><?php echo ucfirst($get->jns_kelamin) ?></td>
						</tr>
						<tr>
							<th>Tempat, Taggal Lahir</th>
							<td class="text-center">:</td>
							<td><?php echo $get->tmp_lahir.", ".date_id($get->tgl_lahir) ?></td>
						</tr>
						<tr>
							<th>Alamat</th>
							<td class="text-center">:</td>
							<td><?php echo $get->alamat.", RT ".$get->rt."- RW ".$get->rw.", ".$get->desa." - ".$get->kecamatan ?></td>
						</tr>
						<tr>
							<th>Agama</th>
							<td class="text-center">:</td>
							<td><?php echo ucfirst($get->agama); ?></td>
						</tr>
						<tr>
							<th>Pekerjaan</th>
							<td class="text-center">:</td>
							<td><?php echo $get->pekerjaan; ?></td>
						</tr>
						<tr>
							<th>Kewarganegaraan</th>
							<td class="text-center">:</td>
							<td><?php echo strtoupper($get->kewarganegaraan) ?></td>
						</tr>
					</table>
					<hr>
					
				</div>
				
			</div>
		</div>
	</div>
</div>

