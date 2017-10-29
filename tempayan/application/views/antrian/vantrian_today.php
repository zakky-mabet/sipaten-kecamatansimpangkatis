<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<div class="col-md-12 ">
		<div class="box box-primary">
			<div class="box-header with-border">
				<div class="col-md-7">
					<h3 class="box-title">Data Daftar Antrian Hari ini</h3>
				</div>
			</div>
			<div class="box-body">

				<table class="table table-hover table-bordered col-md-10" style="margin-top: 10px;">
					<thead class="bg-silver">
						<tr>
							<th width="50" class="text-center">No</th>
							<th class="text-center">No Antrian</th>
							<th class="text-center">Tanggal</th>
							<th class="text-center">Status</th>
							<th class="text-center">Kelola</th>
						</tr>
					</thead>
					<tbody>

					<?php

					$number = ( ! $this->page ) ? 0 : $this->page;

					foreach ($antrian as $key => $value): ?>
						
						<tr>
							<td class="text-center"><?php echo ++$number ?></td>
							<td class="text-center"><?php echo $value->nomor ?></td>
							<td class="text-center"><?php echo date_id($value->date) ?></td>
							<td class="text-center">
								<?php if ($value->status == 'menunggu'): ?>
									<span class="label label-warning ">Menunggu</span>
								<?php elseif ($value->status == 'selesai'): ?>
									<span class="label label-success">Selesai</span>
								<?php elseif ($value->status == 'tidakdiketahui'): ?>
									<span class="label label-danger">Tidak Diketahui</span>
								<?php endif ?>
							</td>
							<td class="text-center">
								<a onclick='responsiveVoice.speak("Panggilan, Kepada, Nomor, Antrian, <?php echo terbilang($value->nomor); ?>, Silahkan, Menuju, Petugas, pelayanan, Terima kasih ! ", "Indonesian Female");'  class="icon-button text-blue" data-toggle="tooltip" data-placement="top" title="Panggil"><i class="fa fa-hand-pointer-o"></i></a>
								
							</td>

						</tr>
					<?php endforeach ?>
						
					</tbody>
					<tfoot>
						<?php 
						echo "<tr>
							<th colspan='4'>
							<small class=''>".count($antrian) . " dari " . $num_antrian . " data"."</small>
							<th>
						</tr>"; ?>
					</tfoot>

				</table>


			</div>
			<div class="box-footer text-center">
				<?php echo $this->pagination->create_links(); ?>
			</div>
		</div>
	</div>
</div>



<div class="modal animated fadeIn modal-danger" id="modal-delete-desa" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
           	<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-question-circle"></i> Hapus!</h4>
                <span>Hapus Desa ini dari sistem?</span>
           	</div>
           	<div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
                <a href="#" id="btn-delete" class="btn btn-outline"> Hapus </a>
           	</div>
        </div>
    </div>
</div>