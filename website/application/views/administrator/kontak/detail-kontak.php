<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>


	<div class="col-md-3 col-xs-12">
		<div class="box box-primary">
		<?php  
/**
 * Open Form
 *
 * @var string
 **/
echo form_open(current_url(), array('class' => 'form-horizontal', 'enctype'=>'multipart/form-data'));
?>
			<div class="box-body box-profile" style="margin-top: 10px;">
	
				<img src="<?php echo base_url("assets/public/image/avatar.jpg"); ?>" class="img-circle profile-user-img img-responsive " alt="User Image">

				<h4 class="text-center"><?php echo $get->nama; ?></h4>
				<p class="text-center"><?php echo $get->email; ?></p>
			</div>

			
		</div>
	</div>

	<div class="col-md-9 col-xs-12">
		<div class="box box-primary form-horizontal">

			<div class="box-body" style="margin-top: 10px;">
				
			<table class="table bordered">
							<thead>
								<tr>
									<th>Subjek</th>
									<td><?php echo $get->subject ?></td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th>Pesan</th>
									<td><?php echo $get->message ?></td>
								</tr>
							</tbody>
						</table>			
				
			</div>
			<div class="box-footer with-border">
					<small><strong class="text-blue"> </strong>Dikirim : <?php echo $get->dates ?></small>
			</div>

<?php  
// End Form
echo form_close();
?>
		</div>
	</div>
</div>