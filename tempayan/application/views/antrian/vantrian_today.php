<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<div class="col-md-12 ">
		
		
		<?php if (!$antrian): ?>

			<div class="col-md-8 col-md-offset-2 col-xs-12">
				<div class="callout callout-success">
			        <h4><i class="fa fa-info-circle"></i> Info !</h4>
			       	Belum ada Antrian !
			     </div>			
			</div>

		<?php else: ?>
		
		<?php

		$number = ( ! $this->page ) ? 0 : $this->page;

		foreach ($antrian as $key => $value): ?> 

		<div class="col-md-3 ">
			<div class="box box-primary">
	            <div class="box-body box-profile">
				

	              <h1 class="profile-username text-center" style="font-size:7em; font-weight: 600; color: green"><?php echo $value->nomor ?></h1>

	              <ul class="list-group list-group-unbordered">
	                <li class="list-group-item">
	                  <b>Sisa Antrian</b> <a class="pull-right"><?php echo count($count_sisa); ?></a>
	                </li>
	                <li class="list-group-item">
	                  <b>Total Antrian</b> <a class="pull-right"><?php echo count($count); ?></a>
	                </li>

	                <li class="list-group-item">
	                  <b>Jam</b> <a class="pull-right"><?php echo $value->time ?></a>
	                </li>
	                <li class="list-group-item">
	                  <b>Status</b> <a class="pull-right">
	                  	<?php if ($value->status == 'menunggu' AND $value->admin == NULL): ?>
							<span class="label label-warning ">Menunggu Panggilan</span>

						<?php elseif ($value->status == 'menunggu' AND $value->admin != NULL): ?>
							<span class="label label-info">Dalam Pelayanan <?php echo $this->antrian->get_user($value->admin)->name ?></span>
						<?php endif ?></a>
	                </li>
	              </ul>
	             <?php if ( $value->status == 'menunggu' AND $value->admin == $this->session->userdata('ID')): ?>
	             	<a  onclick='responsiveVoice.speak("Panggilan, Kepada, Nomor, Antrian, <?php echo terbilang($value->nomor); ?>, Silahkan, Menuju, Petugas, pelayanan, <?php echo $this->antrian->get_user($this->session->userdata('ID'))->name ?>, Terima kasih ! ", "Indonesian Female");' href="#" class="btn  btn-success btn-block "><i class="fa fa-microphone"></i> <b>Panggil</b></a>

	              <a href="<?php echo base_url('antrian/selesai/'.$value->id) ?>" class="btn btn-warning btn-block"><i class="fa fa-sign-out"></i> <b>Selesai</b></a>

	              <?php elseif ($value->status == 'menunggu' AND $value->admin == NULL): ?>
						<a  href="<?php echo base_url('antrian/update_petugas/'.$value->id) ?>" class="btn  btn-success btn-block "><i class="fa fa-sign-in"></i> <b>Ambil</b></a>
						 <a href="#" class="btn btn-warning btn-block"><i class="fa fa-sign-out"></i> <b>Selesai</b></a>
	             <?php endif ?>
	              

	            </div>
	          </div>
	        </div>

	        <?php endforeach ?>
			<?php endif ?>
		
		
		<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->pagination->create_links(); ?></div>

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