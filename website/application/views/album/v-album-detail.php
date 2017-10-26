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

					<div class="col-md-12 col-xs-12">
						<a href="<?php echo site_url('album') ?>" title=""><span class="pull-right accent-color"><i class="fa fa-reply"> </i> Kembali ke Album Galeri</span></a>
						<br></br>
					</div>	 

						<?php if (!$get): ?>
							
							<div class="alert alert-danger" role="alert">
							  <strong>Opps !</strong> <br> Maaf data tidak ditemukan di database kami.
							</div>

						<?php else: ?>

						<?php foreach ($get as $key => $value): ?>
          				
          				<div class="col-md-4 col-xs-6">
          					
			              <div class="portfolio-item item">
			                <div class="portfolio-border">

			            <a class="lightbox" title="<?php echo $value->title; ?>" href="<?php echo base_url('assets/images/album/'.$value->foto) ?>"><div class="portfolio-thumb">
			                      <div class="thumb-overlay"></div>
                <img alt="<?php echo $value->title ?>" width="100%" src="<?php echo base_url('assets/images/album/'.$value->foto)  ?>" />
			                  </div> </a>
			                  <div class="portfolio-details">
			                      <h6><?php echo $value->title ?></h6>
			                       <span><small><i class="fa fa-user"></i> <?php echo $value->uploaded ?></small></span>
                       <span><small><i class="fa fa-calendar"></i> <?php $cut = substr($value->dates, 0,10); echo date_id($cut); ?></small></span>
			                  </div>
			                </div>
			              </div>

			              </div>
			            
			            <?php endforeach ?>
			            <?php endif ?>
					</div>
					<!-- End Page Content-->
					
					<!--Sidebar-->
					<div class="col-md-3 col-xs-12 sidebar right-sidebar">
					
						<!-- Popular Posts widget -->
						<div class="widget widget-popular-posts">
							<h4>Pimpinan Kecamatan Koba <span class="head-line"></span></h4>
							<ul>
								<?php foreach ($get_pimpinan as $key => $value): ?>
              
					                <li>
					                  <div class="widget-thumb">
					                    <a href="<?php echo site_url('pimpinan/get/'.$value->slug); ?>"><img src="<?php echo base_url('assets/images/team/'.$value->foto);?>" alt="<?php echo $value->nama_lengkap ?>" /></a>
					                  </div>
					                  <div class="widget-content">
					                    <h5><a href="<?php echo site_url('pimpinan/get/'.$value->slug); ?>"><?php echo $value->nama_lengkap ?></a></h5>
					                    <span>Periode <?php echo $value->periode ?></span>
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
