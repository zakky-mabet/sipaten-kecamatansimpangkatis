<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<div class="col-md-12 ">
		<div class="box box-primary">
			<div class="box-header with-border">
				<div class="col-md-7">
					<h3 class="box-title">Data Daftar Antrian</h3>
				</div>
			</div>
			<div class="box-body">
<?php  
/**
 * Start Form Pencarian
 *
 * @return string
 **/
echo form_open(current_url(), array('method' => 'get'));
?>
				<div class="box-body">
				<div class="col-md-4">
				    <div class="form-group">
				        <label>Tanggal :</label>
		            	<div class="input-group registration-date-time">
		            		<input class="form-control input-sm" name="start" id="datepicker" value="<?php echo $this->input->get('start') ?>" placeholder="Mulai Tanggal ..">
		            		<span class="input-group-addon"><span class="fa fa-calendar" aria-hidden="true"></span></span>
		            		<input class="form-control input-sm" name="end" id="datepicker2" value="<?php echo $this->input->get('end') ?>" placeholder="Sampai Tanggal ..">
		            	</div>	
				    </div>
				</div>

				<div class="col-md-2">
				    <div class="form-group">
				        <label>Status</label>
				        <select name="status" class="form-control input-sm">
				        	<option value="">-- PILIH --</option>
				        	<option value="menunggu" <?php if($this->input->get('status')=='menunggu') echo 'selected'; ?>>Menunggu</option>
				        	<option value="selesai" <?php if($this->input->get('status')=='selesai') echo 'selected'; ?>>Selesai</option>
							<option value="tidakdiketahui" <?php if($this->input->get('status')=='tidakdiketahui') echo 'selected'; ?>>Tidak diketahui</option>

				        </select>	
				    </div>
				</div>
				<div class="col-md-3">
				    <div class="form-group">
				        <label>Kata Kunci :</label>
				        <input type="text" name="query" class="form-control input-sm" value="<?php echo $this->input->get('query') ?>" placeholder="Nomor">
				    </div>
				</div>
				<div class="col-md-3">
				    <div class="form-group">
                    <button type="submit" class="btn btn-success hvr-shadow top"><i class="fa fa-filter"></i> Filter</button>
                    <a href="<?php echo site_url('antrian') ?>" class="btn btn-success hvr-shadow top" style="margin-left: 10px;"><i class="fa fa-times"></i> Reset</a>
				    </div>
				</div>
			</div>


				<div class="col-md-4">
					Tampilkan 
					<select name="per_page" class="form-control input-sm" style="width:60px; display: inline-block;" onchange="window.location = '<?php echo site_url('antrian?per_page='); ?>' + this.value + '&query=<?php echo $this->input->get('query'); ?>';">
					<?php  
					/**
					 * Loop 10 to 100
					 * Guna untuk limit data yang ditampilkan
					 * 
					 * @var 10
					 **/
					$start = 20; 
					while($start <= 100) :
						$selected = ($start == $this->input->get('per_page')) ? 'selected' : '';
						echo "<option value='{$start}' " . $selected . ">{$start}</option>";

						$start += 10;
					endwhile;
					?>
					</select>
					per halaman
				</div>


<?php  
// End form pencarian
echo form_close();

?>
				<table class="table table-hover table-bordered col-md-10" style="margin-top: 10px;">
					<thead class="bg-silver">
						<tr>
							<th width="50" class="text-center">No</th>
							<th class="text-center">No Antrian</th>
							<th class="text-center">Tanggal</th>
							<th class="text-center">Status</th>
							<th class="text-center">Loket</th>
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
								-
							</td>

					
						</tr>
					<?php endforeach ?>
						
					</tbody>
					<tfoot>
						<?php 
						echo "<tr>
							<th colspan='3'>
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