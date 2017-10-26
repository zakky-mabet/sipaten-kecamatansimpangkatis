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
					
						<div class="col-md-3">
							<a class="lightbox" title="<?php echo $get->nama_lengkap ?>" href="<?php echo base_url('assets/images/team/'.$get->foto)  ?>">
			                <img alt="<?php echo $get->nama_lengkap ?>" src="<?php echo base_url('assets/images/team/'.$get->foto)  ?>" />
			                </a>
			                <br></br>
						</div>

						<div class="col-md-9">

						<table class="table table-striped">
			                <tr>
			                  <th>Nama Lengkap</th>
			                  <td style="width: 10px">:</td>
			                  <td> <?php echo $get->nama_lengkap ?> </td>
			                </tr>
			                <tr>
			                  <th>NIP</th>
			                  <td style="width: 10px">:</td>
			                  <td> <?php echo $get->nip ?> </td>
			                </tr>
			                <tr>
			                  <th>Pangkat</th>
			                  <td style="width: 10px">:</td>
			                  <td> <?php echo $get->pangkat ?> </td>
			                </tr>
			                <tr>
			                  <th>TTL</th>
			                  <td style="width: 10px">:</td>
			                  <td> <?php echo $get->tmp_lahir.', '. date_id($get->tgl_lahir) ?> </td>
			                </tr>
		       				<tr>
			                  <th>Agama</th>
			                  <td style="width: 10px">:</td>
			                  <td> <?php echo $get->agama ?> </td>
			                </tr>
			                <tr>
			                  <th>Alamat</th>
			                  <td style="width: 10px">:</td>
			                  <td> <?php echo $get->alamat ?> </td>
			                </tr>
			                <tr>
			                  <th>Hobi</th>
			                  <td style="width: 10px">:</td>
			                  <td> <?php echo $get->hobbi ?> </td>
			                </tr>
			                <tr>
			                  <th>Mottp Hidup</th>
			                  <td style="width: 10px">:</td>
			                  <td> <?php echo $get->motto_hidup ?> </td>
			                </tr>
			                <tr>
			                  <th>Jabatan</th>
			                  <td style="width: 10px">:</td>
			                  <td> <?php echo $get->jabatan ?> </td>
			                </tr>
			                <tr>
			                  <th>Sosial Media</th>
			                  <td style="width: 10px">:</td>
			                  <td>
			                  <div class="team-member">
			            		<div class="member-socail">
				                <a class="gplus itl-tooltip" data-placement="bottom" title="Google plus" href="<?php echo $get->gplus ?>"><i class="fa fa-google-plus"></i></a>
				                <a class="twitter itl-tooltip" data-placement="bottom" title="Twitter" href="<?php echo $get->twitter ?>"><i class="fa fa-twitter"></i></a>
				                <a class="facebook itl-tooltip" data-placement="bottom" title="Facebook" href="<?php echo $get->facebook ?>"><i class="fa fa-facebook"></i></a>
				                <a class="instagram itl-tooltip" data-placement="bottom" title="Instagram" href="<?php echo $get->instagram ?>"><i class="fa fa-instagram"></i></a>
				        		</div>
				        	</div>
				        </td>
			                </tr>
			            </table>

			           <div class="col-md-12">
			           	<span> <i class="fa fa-user"></i> <?php echo  $get->uploaded ?></span>
			           	<span> <i class="fa fa-calendar"></i> <?php  $cut = substr($get->dates,0,10); echo date_id($cut) ?></span>
			           	<span class="pull-right"> <i class="fa fa-eye"><?php echo  $get->hits ?></i></span>
			           </div>

						</div>

					</div>
					<!-- End Page Content-->
					
					<!--Sidebar-->
					<div class="col-md-3 sidebar right-sidebar">
						
						 <!-- Search Widget -->
			            <div class="widget widget-search">
			              <form action="<?php echo site_url('pimpinan'); ?>">
			                <input type="search" name="query" value="<?php echo $this->input->get('query') ?>" placeholder="Cari Camat disini..." />
			                <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
			              </form>
			            </div>

						<!-- Popular Posts widget -->
						<div class="widget widget-popular-posts">
							<h4>Aparatur Lainnya <span class="head-line"></span></h4>
							<ul>
								<?php foreach ($get_pimpinan as $key => $value): ?>
              
					                <li>
					                  <div class="widget-thumb">
					                    <a href="<?php echo site_url('aparatur/get/'.$value->slug); ?>"><img src="<?php echo base_url('assets/images/team/'.$value->foto);?>" alt="<?php echo $value->nama_lengkap ?>" /></a>
					                  </div>
					                  <div class="widget-content">
					                    <h5><a href="<?php echo site_url('aparatur/get/'.$value->slug); ?>"><?php echo $value->nama_lengkap ?></a></h5>
					                    <span><?php echo $value->jabatan ?></span>
					                  </div>
					                  <div class="clearfix"></div>
					                </li>

					              <?php endforeach ?>
							</ul>
						</div>


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
