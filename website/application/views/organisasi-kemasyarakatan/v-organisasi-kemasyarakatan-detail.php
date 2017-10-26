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
					<div class="col-md-9 page-content">
						
						<!-- Classic Heading -->
						<h2 class="post-title"><?php echo $get->title ?></h2>
                		<div class="post-content">
			                <span><i class="fa fa-user"></i> <?php echo $get->uploaded ?></span> 
			                <span><i class="fa fa-calendar"></i> <?php $cut = substr($get->dates, 0,10); echo date_id($cut); ?></span>
			                <span class="pull-right"><i class="fa fa-eye"></i> <?php echo $get->hits ?> Dilihat	</span>
		                </div>
		                <br>
		                <p>
		                	<?php echo $get->descriptions ?>
		                </p>
					
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
