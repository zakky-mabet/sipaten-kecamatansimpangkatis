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
        <div class="row blog-post-page">
          <div class="col-md-9 blog-box">

            <!-- Start Single Post Area -->
            <div class="blog-post gallery-post">
            	<!-- Start Single Post (Gallery Slider) -->
	              <div class="post-head">
	                <div class="touch-slider post-slider">
	                  <div class="item">
	                    <a class="lightbox" title="<?php echo $get->title; ?>" href="<?php echo base_url('assets/images/news/'.$get->foto) ?>" data-lightbox-gallery="gallery1">
	                      <div class="thumb-overlay"><i class="fa fa-arrows-alt"></i></div>
	                      <img alt="" src="<?php echo base_url('assets/images/news/'.$get->foto) ?>">
	                    </a>
	                  </div>
	                </div>
	              </div>
              <!-- End Single Post (Gallery) -->
              

              <!-- Start Single Post Content -->
         
              <div class="post-content">
                <div class="post-type"><i class="fa fa-picture-o"></i></div>
                <h2><?php echo $get->title; ?></h2>
                <ul class="post-meta">
                <span><i class="fa fa-user"></i> <?php echo $get->uploaded; ?></span> 
                <span><i class="fa fa-calendar"></i> <?php $cut = substr($get->dates, 0,10); echo date_id($cut); ?></span>
           
                <span class="pull-right"><i class="fa fa-eye"></i> <?php echo $get->hits; ?> Di lihat</span>
                </ul>
                <p>
                	<?php echo $get->descriptions; ?>
                </p>

                <div class="post-bottom clearfix">
                  <div class="post-tags-list">
                 
                 	<?php foreach ($get_tag_where as $key => $value): ?>
                 		
                 		<a href="<?php echo base_url('events/tag/'.$value->id.'/'.$value->slug); ?>"><?php echo $value->nama ?></a>
                 	
                 	<?php endforeach ?>
                    
                  </div>
                  <div class="post-share">
                    <span>Share This Post:</span>
                    <a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
                    <a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
                    <a class="gplus" href="#"><i class="fa fa-google-plus"></i></a>
                    <a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                    <a class="mail" href="#"><i class="fa fa-envelope"></i></a>
                  </div>
                </div>
               
              </div>
              <!-- End Single Post Content -->

            </div>
            <!-- End Single Post Area -->

          </div>


          <!-- Sidebar -->
          <div class="col-md-3 sidebar right-sidebar">

             <!-- Search Widget -->
            <div class="widget widget-search">
              <form action="<?php echo site_url('events'); ?>">
                <input type="search" name="query" value="<?php echo $this->input->get('query') ?>" placeholder="Cari events disini..." />
                <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
              </form>
            </div>

            <!-- Categories Widget -->
            <div class="widget widget-categories">
              <h4>Categories <span class="head-line"></span></h4>
              <ul>

              <?php foreach ($get_kategori as $key => $value) { ?>

	              	<li>
                    <a href="<?php echo base_url('events/kategori/'.$value->id_kat.'/'.$value->slug_kat) ?>"><?php echo $value->nama ?></a>
                  </li>
            
              <?php } ?>
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

          

            <!-- Tags Widget -->
            <div class="widget widget-tags">
              <h4>Tags <span class="head-line"></span></h4>
              <div class="tagcloud">

                <?php foreach ($get_tags as $key => $value) { ?>

	              	<a href="<?php echo base_url('events/tag/'.$value->slug); ?>"><?php echo $value->nama ?></a>
            
              	<?php } ?>
                
              </div>
            </div>

          </div>
          <!--End sidebar-->


        </div>

      </div>
    </div>
    <!-- End content -->
