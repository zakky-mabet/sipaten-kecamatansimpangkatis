<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('pesan'); ?></div>
	<dov class="col-md-10 col-md-offset-1  col-xs-12">
		<div class="box box-warning">

			<div class="box-body" style="margin-top: 10px;">

				<div class="col-md-3">
              <img class=" img-responsive" src="<?php echo base_url(); ?>assets/img/img-ktp/<?php if ($get->photo_ktp == NULL ) { echo "avatar.jpg"; } else { echo $get->photo_ktp; } ?>" alt="<?php echo $get->nama_lengkap ; ?>">
				</div>
				<div class="col-md-9">
					<h4><b>Identitas Kependudukan</b></h4>
					<table class="table table-striped" style="margin-bottom: 20px;">
						<tr>
							<th width="150">NIK</th>
							<td width="40" class="text-center">:</td>
							<td><?php echo $get->nik; ?></td>
						</tr>
						<tr>
							<th width="150">No KK</th>
							<td width="40" class="text-center">:</td>
							<td><?php echo $get->no_kk; ?></td>
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
						<tr>
							<th>Status Kawin</th>
							<td class="text-center">:</td>
							<td><?php echo strtoupper($get->status_kawin) ?></td>
						</tr>
						<tr>
							<th>Golongan Darah</th>
							<td class="text-center">:</td>
							<td><?php echo $get->gol_darah; ?></td>
						</tr>
						<tr>
							<th>SHDK</th>
							<td class="text-center">:</td>
							<td><?php echo strtoupper($get->status_kk); ?></td>
						</tr>
					</table>
				</div>

				<div class="col-md-3">
              <img class=" img-responsive" src="<?php echo base_url(); ?>assets/img/img-user/<?php if ($get->photo == NULL ) { echo "avatar.jpg"; } else { echo $get->photo; } ?>" alt="<?php echo $get->nama_lengkap ; ?>">
				</div>
				<div class="col-md-9">
					<h4><b>Profil Akun</b></h4>
					<table class="table table-striped" style="margin-bottom: 20px;">
						<tr>
							<th width="150">Username</th>
							<td width="40" class="text-center">:</td>
							<td><?php echo $get->username; ?></td>
						</tr>
						<tr>
							<th width="150">Email</th>
							<td width="40" class="text-center">:</td>
							<td><?php echo $get->email; ?></td>
						</tr>
						<tr>
							<th width="150">Telepon</th>
							<td width="40" class="text-center">:</td>
							<td><?php echo $get->no_hp; ?></td>
						</tr>
						<tr>
							<th width="150">Tanggal Daftar</th>
							<td width="40" class="text-center">:</td>
							<td><?php echo strtoupper($get->tgl_daftar); ?></td>
						</tr>
					</table>
				</div>
			

			</div>

			<div class="box-footer with-border">
				<a href="<?php echo site_url('administrator/penduduk') ?>" class="btn btn-app">
						<i class="fa fa-undo"></i> Kembali
					</a>
			</div>

		</div>
	</dov>
</div>