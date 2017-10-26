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
		          <meta property="og:url"           content="<?php echo base_url('berita/get/'.$get->slug); ?>" />
              <meta property="og:type"          content="website" />
              <meta property="og:title"         content="<?php echo $get->title; ?>" />
              <meta property="og:description"   content="<?php echo $get->short_descriptions; ?>" />
              <meta property="og:image"         content="<?php echo base_url('assets/images/news/'.$get->foto) ?>" />
		
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
              <div class="post-content " style="text-align: justify;">
                <div class="post-type"><i class="fa fa-picture-o"></i></div>
                <h2><?php echo $get->title; ?></h2>
                <ul class="post-meta">
                <span><i class="fa fa-user"></i> <?php echo $get->uploaded; ?></span> 
                <span><i class="fa fa-calendar"></i> <?php $cut = substr($get->dates, 0,10); echo date_id($cut); ?></span>
               <!--  <span><i class="fa fa-comment"></i> <?php echo count($get_komentar); ?> Komentar</span> -->
                <span class="pull-right"><i class="fa fa-eye"></i> <?php echo $get->hits; ?> Di lihat</span>
                </ul>
                <p > 
                	<?php echo $get->descriptions; ?>
                </p>  

                <div class="post-bottom clearfix">
                  <div class="post-tags-list">
                 
                 	<?php foreach ($get_tag_where as $key => $value): ?>
                 		
                 		<a href="<?php echo base_url('berita/tag/'.$value->id.'/'.$value->slug); ?>"><?php echo $value->nama ?></a>
                 	
                 	<?php endforeach ?>
                    
                  </div>
                  <div class="post-share">
                   
                  
                    <a class="facebook" href="http://www.facebook.com/sharer.php?u=<?php echo base_url('berita/get/'.$get->slug); ?>"><i class="fa fa-facebook"></i></a>  
                    <a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
                    <a class="gplus" href="#"><i class="fa fa-google-plus"></i></a>
                    <a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                    <a class="mail" href="#"><i class="fa fa-envelope"></i></a>
                  </div>
                </div>
               <a href="javascript:void(0)" onclick="javascript:genericSocialShare('http://www.facebook.com/sharer.php?u=<?php echo base_url('berita/get/'.$get->slug); ?>')">[Social Media Share Text/Image]</a>
              </div>
              <!-- End Single Post Content -->

            </div>
            <!-- End Single Post Area -->
				
            <!-- Start Comment Area -->
            <div id="comments">

             <!--  <h2 class="comments-title">(<?php echo count($get_komentar); ?>) Komentar</h2> -->
              <ol class="comments-list">
                
              <?php foreach ($get_komentar as $key => $value): ?>
              	
              
                <li>
                  <div class="comment-box clearfix">
                    <div class="avatar"><img alt="" src="<?php echo base_url('assets/'); ?>images/author.png" /></div>
                    <div class="comment-content">
                      <div class="comment-meta">
                        <span class="comment-by"><?php echo $value->nama ?></span>
                        <span class="comment-date"><?php $cut = substr($value->dates, 0,10); echo date_id($cut).' - '.$cuts = substr($value->dates, 11,5); ?>  </span>
                      </div>
                      <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia desrut mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
                    </div>
                  </div>                  
                </li>

                <?php endforeach ?>
 

              </ol>

              <!-- Start Respond Form -->
             <!--  <div id="respond">
                <h2 class="respond-title">Leave a reply</h2>
                <form action="#">
                  <div class="row">
                    <div class="col-md-4">
                      <label for="author">Name<span class="required">*</span></label>
                      <input id="author" name="author" type="text" value="" size="30" aria-required="true">
                    </div>
                    <div class="col-md-4">
                      <label for="email">Email<span class="required">*</span></label>
                      <input id="email" name="author" type="text" value="" size="30" aria-required="true">
                    </div>
                    <div class="col-md-4">
                      <label for="url">Website<span class="required">*</span></label>
                      <input id="url" name="url" type="text" value="" size="30" aria-required="true">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label for="comment">Add Your Comment</label>
                      <textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
                      <input name="submit" type="submit" id="submit" value="Submit Comment">
                    </div>
                  </div>
                </form>
              </div> -->
              <!-- End Respond Form -->

            </div>
            <!-- End Comment Area -->

          </div>


          <!-- Sidebar -->
          <div class="col-md-3 sidebar right-sidebar">

             <!-- Search Widget -->
            <div class="widget widget-search">
              <form action="<?php echo site_url('berita'); ?>">
                <input type="search" name="query" value="<?php echo $this->input->get('query') ?>" placeholder="Cari Berita disini..." />
                <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
              </form>
            </div>

            <!-- Categories Widget -->
            <div class="widget widget-categories">
              <h4>Categories <span class="head-line"></span></h4>
              <ul>

              <?php foreach ($get_kategori as $key => $value) { ?>

	              	<li>
                    <a href="<?php echo base_url('berita/kategori/'.$value->id_kat.'/'.$value->slug_kat) ?>"><?php echo $value->nama ?></a>
                  </li>
            
              <?php } ?>
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

          

            <!-- Tags Widget -->
            <div class="widget widget-tags">
              <h4>Tags <span class="head-line"></span></h4>
              <div class="tagcloud">

                <?php foreach ($get_tags as $key => $value) { ?>

	              	<a href="<?php echo base_url('berita/tag/'.$value->slug); ?>"><?php echo $value->nama ?></a>
            
              	<?php } ?>
                
              </div>
            </div>

          </div>
          <!--End sidebar-->


        </div>

      </div>
    </div>
    <!-- End content -->
<script type="text/javascript">
function genericSocialShare(url){
    window.open(url,'sharer','toolbar=0,status=0,width=648,height=395');
    return true;
}
</script>