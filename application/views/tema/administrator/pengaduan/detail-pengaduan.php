<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('pesan'); ?></div>
	<div class="col-md-12">
		<div class="box box-success">
			<div class="box-header with-border">
				<div class="col-md-7">
					<h3 class="box-title"><?php echo $get->judul ?></h3>
				</div>
			</div>
			<div class="box-body">
				<div class="col-md-3">
					<a href="<?php echo base_url("assets/img/epengaduan/{$get->photo}"); ?>" data-toggle="lightbox" data-title="<?php echo $get->judul; ?>">
						<img src="<?php echo base_url("assets/img/epengaduan/{$get->photo}"); ?>" alt="<?php echo $get->judul; ?>" class="img-responsive">
					</a>
				</div>
				<div class="col-md-7">
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
					<h4>Pengaduan</h4>
					<table class="table table-striped">
						<tr>
							<th width="150">ID Pengaduan</th>
							<td width="40" class="text-center">:</td>
							<td><?php echo $get->ID_pengaduan ?></td>
						</tr>
						<tr style="vertical-align: top">
							<th>Judul</th>
							<td class="text-center">:</td>
							<td><?php echo $get->judul; ?></td>
						</tr>
						<tr style="vertical-align: top">
							<th>Pesan Deskripsi</th>
							<td class="text-center">:</td>
							<td><?php echo $get->pesan; ?></td>
						</tr>
						<tr style="vertical-align: top">
							<th>Alamat</th>
							<td class="text-center">:</td>
							<td><?php echo $get->alamat_lokasi; ?></td>
						</tr>
						<?php  
						$create = new DateTime( $get->create_tgl );
						?>
						<tr>
							<th>Tanggal</th>
							<td class="text-center">:</td>
							<td>
								<?php echo hari_ini( $create->format('D') ).", ".date_id( $create->format('Y-m-d') ).", ".$create->format('H:i A'); ?>	
							</td>
						</tr>
						<?php  
						if( $get->approve_tgl != FALSE ) :

							$approve = new DateTime( $get->approve_tgl );
						?>
						<tr>
							<th>Tanggal Diverifikasi</th>
							<td class="text-center">:</td>
							<td>
								<?php echo hari_ini( $approve->format('D') ).", ".date_id( $approve->format('Y-m-d') ).", ".$approve->format('H:i A'); ?>	
							</td>
						</tr>
						<tr>
							<th>Lamanya Diproses</th>
							<td class="text-center">:</td>
							<td><?php echo $get->durasi; ?></td>
						</tr>
						<?php  
						endif;
						?>
						<tr>
							<th>Status pengaduan</th>
							<td class="text-center">:</td>
							<td><?php echo strtoupper(status_pengaduan($get->status_pesan)) ?></td>
						</tr>
					</table>
				</div>
				<div class="col-md-2">
					<a href="<?php echo site_url('administrator/pengaduan') ?>" class="btn btn-app">
						<i class="fa fa-undo"></i> Kembali
					</a>
				<?php  
				/**
				 * Ubah tombol dai verifikasi menjadi tunda
				 *
				 * @var string
				 **/
				if( $get->status_pesan == 'no') :
				?>
					<a href="#" class="btn btn-app get-verifikasi" data-id="<?php echo $get->ID; ?>">
						<i class="fa fa-check"></i> Verifikasi
					</a>

				<?php elseif ( $get->status_pesan == 'read') : ?>
					<a href="#" class="btn btn-app get-verifikasi" data-id="<?php echo $get->ID; ?>">
						<i class="fa fa-times"></i> Tunda
					</a>
				<?php else : ?>
					<a href="#" class="btn btn-app get-verifikasi" data-id="<?php echo $get->ID; ?>">
						<i class="fa fa-times"></i> Tunda
					</a>
				<?php endif; ?>
				
				<?php if ( $get->status_pesan == 'read' OR $get->status_pesan == 'yes'): ?>
					<a href="<?php echo site_url('administrator/pengaduan/penilaian/'.$get->ID_pengaduan.'?user='.$get->ID_users); ?>" class="btn btn-app">
						<i class="fa fa-comment"></i> Nilai
					</a>
				<?php endif ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade modal-info" id="modal-verifikasi" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><i class="fa fa-question-circle"></i> Proses pengaduan ini!</h4>
				<span>Klik tombol iya untuk melanjutkan.</span>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn btn-outline pull-left" data-dismiss="modal">Batal</a>
				<a href="#" id="btn-yes" class="btn btn-outline">Iya</a>
			</div>
		</div>
	</div>
</div>
