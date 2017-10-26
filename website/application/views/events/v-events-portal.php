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
						

			            <div class="row latest-posts-classic">

			              <?php  if (!$get_all) {  ?>
			             <div class="call-action call-action-boxed call-action-style1 no-descripton clearfix">
				             <?php  if (!$this->agent->is_mobile()) {  ?>
					          
					         
					             <div class="button-side">
					             	 <div class="widget widget-search">
						              <form action="#">
						                <input type="search" name="query" value="<?php echo $this->input->get('query') ?>" placeholder="Cari Berita disini..." />
						                <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
						              </form>
						            </div>
					             </div>

					         
					    	<?php } ?>
					    	<h2 class="primary"><strong>Maaf</strong> Data tidak ditemukan !</h2>
					    	 </div>

				            <?php
				              }  else {
				                foreach ($get_all as $key => $value) {

				             ?>
				            
				              <div class="col-md-11 post-row">
				                <div class="left-meta-post pull-left">
				                  <a class="lightbox" title="<?php echo $value->title; ?>" href="<?php echo base_url('assets/images/news/'.$value->foto)  ?>">
				                <img alt="" width="190" src="<?php echo base_url('assets/images/news/'.$value->foto)  ?>" />
				                </a>
				                </div>
				                 <h3 class="post-title"><a href="<?php echo base_url('events/get/'.$value->slug); ?>">
				                 <?php echo highlight_phrase($value->title, $this->input->get('query'), '<span class="accent-color">', '</span>');?></a></h3>
				                <div class="post-content">
				                <span><i class="fa fa-user"></i>  <?php echo highlight_phrase($value->uploaded, $this->input->get('query'), '<span class="accent-color">', '</span>');?> </span> 
				                <span><i class="fa fa-calendar"></i> <?php $cut = substr($value->dates, 0,10); echo date_id($cut); ?></span>
				                <span class="pull-right"><i class="fa fa-eye"></i> <?php echo $value->hits; ?> Di lihat</span>
				                </div>
				                <div class="post-content">
				                <p>
				               <?php echo highlight_phrase($value->short_descriptions, $this->input->get('query'), '<span class="accent-color">', '</span>');?>
				                <a class="read-more" href="<?php echo base_url('events/get/'.$value->slug); ?>">Selengkapnya...</a>
				                </p>
				                </div>
				              </div>
				              
				              <?php    }
				              } ?>

				               <p class=""><?php echo $this->pagination->create_links(); ?></p>
			            <!-- Divider -->
			            <div class="hr1" style="margin-bottom:30px;"></div>	
			           				
						</div>
					</div>
					<!-- End Page Content-->

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
