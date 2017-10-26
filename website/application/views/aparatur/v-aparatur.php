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
						 <?php foreach ($get_all as $key => $value): ?>
            
				            <?php if ($value->foto == NULL): ?>

				                <?php $img = 'no-img.jpg'; ?>
				            
				            <?php else: ?>

				                <?php $img = $value->foto; ?>

				            <?php endif ?>          
				          <div class="col-md-4 col-sm-6 col-xs-12">
				            <div class="team-member">
				              <div class="member-photo" >
				                <img alt="<?php echo $value->nama_lengkap ?>" src="<?php echo base_url('assets/images/team/'.$img) ?>" />
				                <a href="<?php echo site_url('aparatur/get/'.$value->slug); ?>" title="<?php echo $value->nama_lengkap ?>">
				                <div class="member-name"><?php echo $value->nama_lengkap ?><span><?php echo $value->jabatan ?></span></div></a>
				              </div>
				              <div class="member-info">
				                <p><?php echo $value->motto_hidup ?></p>
				              </div>
				              <div class="member-socail">
				                <a class="gplus itl-tooltip" data-placement="bottom" title="Google plus" href="<?php echo $value->gplus ?>"><i class="fa fa-google-plus"></i></a>
				                <a class="twitter itl-tooltip" data-placement="bottom" title="Twitter" href="<?php echo $value->twitter ?>"><i class="fa fa-twitter"></i></a>
				                <a class="facebook itl-tooltip" data-placement="bottom" title="Facebook" href="<?php echo $value->facebook ?>"><i class="fa fa-facebook"></i></a>
				                <a class="instagram itl-tooltip" data-placement="bottom" title="Instagram" href="<?php echo $value->instagram ?>"><i class="fa fa-instagram"></i></a>
				              </div>
				            </div>
				          </div>

				          <?php endforeach ?>

				          <div class="col-md-9">
							<p>
				          	<?php echo $this->pagination->create_links(); ?>
				          	</p>
						  </div>
					</div>
					<!-- End Page Content-->
					
					<!--Sidebar-->
					<div class="col-md-3 sidebar right-sidebar">
						
						 <!-- Search Widget -->
			            <div class="widget widget-search">
			              <form action="<?php echo site_url('aparatur'); ?>">
			                <input type="search" name="query" value="<?php echo $this->input->get('query') ?>" placeholder="Cari Camat disini..." />
			                <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
			              </form>
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
