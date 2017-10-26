		<!-- Start Page Banner -->
		<div class="page-banner no-subtitle">
			<div class="container">
			<div class="row">			
					<div class="col-md-6">
						<?php echo $this->page_title->show(); ?>
					</div>
					<div class="col-md-6">
						<ul class="breadcrumbs">
							<?php  echo $this->breadcrumbs->show();  ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- End Page Banner -->		
		<!-- Start Content -->
		<div id="content">
			<div class="container">
				<div class="row sidebar-page">
					
					<!-- Page Content -->
					<div class="col-md-12 limit-height">
					<p>
						<?php echo $this->session->flashdata('alert'); ?>
					</p>
			
			       		<form class="" role="form" method="get">
			       		<div class="col-md-3">
			                   <!-- Search Widget -->
				            <div class="form-group">
				                <input type="text"  name="query" class="input-sm form-control" value="<?php echo $this->input->get('query') ?>" placeholder="Pencarian ..." />
				            </div>
			            	</div>

			            	<div class="col-md-3">
			                  <div class="form-group ">
			                    <select  class="form-control input-sm" name="lokasi">
			                      <option value="">-- Lokasi --</option>
			                     <?php foreach ($this->setting->master_desa() as $key => $value): ?>
			                      	<option <?php if($this->input->get('lokasi')==$value->kelurahan_desa) echo 'selected'; ?> value="<?php echo $value->kelurahan_desa; ?>" ><?php echo $value->kelurahan_desa; ?></option>
			                      <?php endforeach ?>
			                    </select>                                
			                  </div>
			                </div>

			                <div class="col-md-3">
			                  <div class="form-group ">
			                    <select  class="form-control input-sm" name="tahun">
			                      <option value="">-- Tahun --</option>
			                   		<?php 
			                   			for ($i = $this->setting->min_data_pembangunan()->tahun; $i <= $this->setting->max_data_pembangunan()->tahun; $i++) { ?>
										    <option <?php if($this->input->get('tahun')==$i) echo 'selected'; ?> value="<?php echo $i ?>"><?php echo $i ?></option>
									<?php }
			                   		 ?>
			                      	
			  
			                    </select>                                
			                  </div>
			                </div>
			                
			            	<div class="col-md-3">
			                  <div class="form-group ">    
			                    <button type="submit" class="btn btn-default filter-col btn-sm"><i class="fa fa-filter"></i> Filter</button> 
			                    <a href="<?php echo base_url('data-pembangunan'); ?>" class="btn btn-default filter-col btn-sm"><i class="fa fa-undo"></i> Reset</a>  
			                     <a href="<?php echo base_url('data_pembangunan/download?'.'tahun='.$this->input->get('tahun').'&lokasi='.$this->input->get('lokasi').'&query='.$this->input->get('query')) ?>" class="btn btn-default filter-col btn-sm"><i class="fa fa-download"></i> Download</a>  
			                  </div>
			                </div>	


			            </form>
			            <div class="col-md-12">
			            <?php if  (!$this->agent->is_mobile()) { ?>
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
			            <?php }  else {?>
							 <table class="table table-bordered ">
			              <thead>
			                <tr>
			                  <th rowspan="" width="10" class="text-center">No</th>
			                  <th rowspan="2" class="text-center">Nama Kegiatan</th>
			                  <th rowspan="2" class="text-center">Lokasi</th>
			                  <th class="text-center">Dana</th>
			                </tr>
			              </thead>
			              <tbody>
			           
			             
			              <?php  if (!$get_all) { ?>
			              	<tr>
              					<th colspan="4" class="text-center">
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
				                <td class="text-center"><?php echo number_format($value->dana,0,".","."); ?></td>
				                

			                <?php } }?>
			                 
			              </tbody>
			            </table>
			            <?php } ?>

			          </div>

				        <div class="col-md-12 col-md-offset-4">
							<p >
				          	<?php echo $this->pagination->create_links(); ?>
				          	</p>
						</div>
					</div>
					<!-- End Page Content-->					
			</div>
		</div>
	</div>

