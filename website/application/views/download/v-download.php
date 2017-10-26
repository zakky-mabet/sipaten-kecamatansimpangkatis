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
					<div class="col-md-9 ">
					<p>
						<?php echo $this->session->flashdata('alert'); ?>
					</p>
			
			       		<form class="" role="form" method="get">
			       		<div class="col-md-4">
			                   <!-- Search Widget -->
				            <div class="form-group">
				                <input type="text"  name="query" class="input-sm form-control" value="<?php echo $this->input->get('query') ?>" placeholder="Pencarian ..." />
				            </div>
			            	</div>
			                <div class="col-md-4">
			                  <div class="form-group ">
			                    <select  class="form-control input-sm" name="kategori">
			                      <option value="">-- Kategori --</option>
			                     <?php foreach ($this->setting->menu_download() as $key => $value): ?>
			                      	<option value="<?php echo $value->slug; ?>" ><?php echo $value->nama_kategori; ?></option>
			                      <?php endforeach ?>
			                    </select>                                
			                  </div>
			                </div>
			                

			            	<div class="col-md-4">
			                  <div class="form-group ">    
			                    <button type="submit" class="btn btn-default filter-col btn-sm"><i class="fa fa-filter"></i> Filter</button> 
			                    <a href="<?php echo base_url('download'); ?>" class="btn btn-default filter-col btn-sm"><i class="fa fa-undo"></i> Reset</a>  
			                  </div>
			                </div>	
			            </form>
			            <div class="col-md-12">
			            <table class="table table-bordered table-responsive">
			              <thead>
			                <tr>
			                  <th width="10">#</th>
			                  <th class="text-center">Nama Data</th>
			                  <th class="text-center">Kategori</th>
			                  <th class="text-center">Tanggal</th>
			                  <th class="text-center">Opsi</th>
			                </tr>
			              </thead>
			              <tbody>
			              <?php if (!$get_all): ?>
			              		<tr>
              					<th colspan="5" class="text-center">
              					<div class='col-md-6 col-md-offset-3'><br>
              					<div class='alert alert-warning animated bounce'>
              					<button type='button' class='close' data-dismiss='alert' style='text-align:justify;'><i class='ace-icon fa fa-times'></i></button>
              					<strong><i class='ace-icon fa fa-warning'></i> Maaf !</strong> Data Tidak ditemukan</div></div></th>
            					</tr>

			              <?php else: ?>	
			              	
			              <?php $no=1; foreach ($get_all as $key => $value): ?>
			              	
			                <tr>
			                  <td><?php echo $no++; ?> </td>
			                  <td><a href="<?php echo base_url('download/get/'.$value->data_file) ?>" data-toggle="tooltip" data-placement="top" title="<?php echo $value->nama_data; ?>"> <?php echo word_limiter($value->nama_data, 8); ?></a></td>
			                  <td><?php echo $value->nama_kategori; ?></td>
			                  <td><?php $cut = substr($value->dates_d,0,10); echo date_id($cut); ?></td>
			                  <td class="text-center">
			                  <a href="<?php echo base_url('download/get/'.$value->data_file) ?>" class="btn btn-info btn-xs"><i class="fa fa-download"></i><?php  if (!$this->agent->is_mobile()) {  ?>  Download <?php } ?></a>
			                  <?php  if ($this->agent->is_mobile()) {  ?>  <br></br> <?php } ?>
			                  <a href="<?php echo base_url('assets/images/download/'.$value->data_file) ?>" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i><?php  if (!$this->agent->is_mobile()) {  ?>  View <?php } ?></a>
			                  </td>

			                </tr>
			               
			             	 <?php endforeach ?> 
			             	 <?php endif ?>   
			                </tbody>
			            </table>
			          </div>

				        <div class="col-md-12 col-md-offset-4">
							<p >
				          	<?php echo $this->pagination->create_links(); ?>
				          	</p>
						</div>
					</div>
					<!-- End Page Content-->
					
					<!--Sidebar-->
					<div class="col-md-3 sidebar right-sidebar">
						
						<!-- Popular Posts widget -->
						<div class="widget widget-popular-posts">
							<h4>Berita Terpopuler <span class="head-line"></span></h4>
							<ul>
								<?php foreach ($berita_populer as $key => $value): ?>
              
					                <li>
					                  <div class="widget-thumb">
					                    <a href="<?php echo base_url('berita/get/'.$value->slug) ?>"><img src="<?php echo base_url('assets/images/news/'.$value->foto);?>" alt="<?php echo $value->title ?>" /></a>
					                  </div>
					                  <div class="widget-content">
					                    <h5><a href="<?php echo base_url('berita/get/'.$value->slug) ?>"><?php echo $value->title ?></a></h5>
					                    <span><?php $cut = substr($value->dates, 0,10); echo date_id($cut); ?></span>
					                  </div>
					                  <div class="clearfix"></div>
					                </li>

					              <?php endforeach ?>
							</ul>
						</div>

						
			            <!-- Popular Posts widget -->
			            <div class="widget widget-popular-posts">
			              <h4>Events <span class="head-line"></span></h4>
			              <ul>
			              <?php foreach ($events_populer as $key => $value): ?>
			              
			                <li>
			                  <div class="widget-thumb">
			                    <a href="<?php echo base_url('events/get/'.$value->slug) ?>"><img src="<?php echo base_url('assets/images/news/'.$value->foto);?>" alt="<?php echo $value->title ?>" /></a>
			                  </div>
			                  <div class="widget-content">
			                    <h5><a href="<?php echo base_url('events/get/'.$value->slug) ?>"><?php echo $value->title ?></a></h5>
			                    <span><?php $cut = substr($value->dates, 0,10); echo date_id($cut); ?></span>
			                  </div>
			                  <div class="clearfix"></div>
			                </li>

			              <?php endforeach ?>
			              </ul>
			            </div>
					
					
				</div>
			</div>
		</div>
		<!-- End Content -->
