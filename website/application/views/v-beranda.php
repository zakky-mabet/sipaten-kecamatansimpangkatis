    <!-- Start HomePage Slider -->
    <section id="home">
      <!-- Carousel -->
      <div id="main-slide" class="carousel slide" data-ride="carousel">

        <!-- Carousel inner -->
        <div class="carousel-inner">

        <?php 
        $no=1;
        foreach ($slider as $key => $values): ?>
          
         <div class="item <?php if ($no++ == '1') {  echo 'active';  } ?>">
            <img class="img-responsive" src="<?php echo base_url('assets/images/slider/'.$values->img) ?>" alt="<?php echo $values->title; ?>">
            <div class="slider-content">
              <div class="col-md-12 text-center">
                <h3 class="animated5">
                  <span><?php echo $values->title; ?></span>
                </h3>
                <h4 class="animated4">
                <br>
                  <span><?php echo $values->short_description; ?></span>
                  </br>
                </h4>
                <p class="animated5"><a href="<?php echo $values->link; ?>" class="slider btn btn-system btn-large">Selengkapnya</a></p>
              </div>
            </div>
          </div>
          <!--/ Carousel item end -->
         
        <?php endforeach ?>

        </div>
        <!-- Carousel inner end-->

        <!-- Controls -->
        <a class="left carousel-control" href="#main-slide" data-slide="prev">
          <span><i class="fa fa-angle-left"></i></span>
        </a>
        <a class="right carousel-control" href="#main-slide" data-slide="next">
          <span><i class="fa fa-angle-right"></i></span>
        </a>
      </div>
      <!-- /carousel -->
    </section>
    <!-- End HomePage Slider -->


    <!-- Start Content -->
    <div id="content">
      <div class="container">

        <div class="row">

          <div class="big-title text-center">
            <h1>Organisasi  <span class="accent-color">Kecamatan Koba</span></h1>
            <p class="title-desc"></p>
          </div>
           <?php 
                foreach ($this->mwidget_organisasi->get() as $key => $value) :
               ?>
          <div class="col-md-4 col-sm-6 service-box service-center">
            <div class="service-icon">
              <i class="fa <?php echo $value->icon; ?> icon-mini-effect icon-effect-2"></i>
            </div>
            <div class="service-content">
              <h4><?php echo $value->title; ?></h4>
              <p><?php echo $value->descriptions; ?></p>
              <p style="margin-top:9px; " class="text-center"><a href="<?php echo base_url($value->link); ?>" class="btn-system btn-mini border-btn">Selengkapnya</a></p>
            </div>
          </div>
            <?php endforeach ?>
        </div>

        <!-- Divider -->
        <div class="hr5" style="margin-top:-20px; margin-bottom:35px;"></div>

        <div class="row">

          <div class="big-title text-center">
            <h1>Berita  <span class="accent-color">Kecamatan Koba</span></h1>
            <p class="title-desc"></p>
          </div>


        <div class="col-md-6">
            <!-- Start Recent Posts Carousel -->
        <div class="latest-posts">
          <h4 class="classic-title"><span>Berita Slide</span></h4>
          <div class="latest-posts-classic custom-carousel touch-carousel" data-appeared-items="1">

            <?php 
              if (!$berita_slide) {
                echo "Belum ada data !";
              } else {
                foreach ($berita_slide as $key => $value) {

             ?>
            <div class="post-row item">
              <a class="lightbox" title="<?php echo $value->title; ?>" href="<?php echo base_url('assets/images/news/'.$value->foto) ?>">
                <img alt="" width="100%" src="<?php echo base_url('assets/images/news/'.$value->foto)  ?>" />
              </a>
              <div class="hr5" style="margin-top:5px; margin-bottom:5px;"></div>
              <h3 class="post-title"><a href="<?php echo base_url('berita/get/'.$value->slug); ?>"><?php echo $value->title; ?></a></h3>
                <div class="post-content">
                <span><i class="fa fa-user"></i> <?php echo $value->uploaded; ?></span> 
                <span><i class="fa fa-calendar"></i> <?php $cut = substr($value->dates, 0,10); echo date_id($cut); ?></span>
                
                </div>
              <div class="post-content">
                <p>
                <?php echo $value->short_descriptions; ?>
                <a class="read-more" href="<?php echo base_url('berita/get/'.$value->slug); ?>">Selengkapnya...</a>
                </p>
              </div>
            </div>
            <?php    }
              } ?>

          </div>
        </div>
        <!-- End Recent Posts Carousel -->
        </div>

        <div class="col-md-6">
              <!-- Classic Heading -->
            <h4 class="classic-title"><span>Berita Terbaru</span></h4>

            <!-- Start Latest Posts -->
            <div class="latest-posts-classic">
               <?php 
              if (!$berita_list) {
                echo "Belum ada data !";
              } else {
                foreach ($berita_list as $key => $value) {

             ?>
            
              <div class="post-row">
                <div class="left-meta-post pull-left">
                  <a class="lightbox" title="<?php echo $value->title; ?>" href="<?php echo base_url('assets/images/news/'.$value->foto)  ?>">
                <img alt="" width="140" src="<?php echo base_url('assets/images/news/'.$value->foto)  ?>" />
                </a>
                </div>
                 <h3 class="post-title"><a href="<?php echo base_url('berita/get/'.$value->slug); ?>"><?php echo $value->title; ?></a></h3>
                <div class="post-content">
                <span><i class="fa fa-user"></i> <?php echo $value->uploaded; ?></span> 
                <span><i class="fa fa-calendar"></i> <?php $cut = substr($value->dates, 0,10); echo date_id($cut); ?></span>

                </div>
                <div class="post-content">
                <p>
                <?php echo $value->short_descriptions; ?>
                <a class="read-more" href="<?php echo base_url('berita/get/'.$value->slug); ?>">Selengkapnya...</a>
                </p>
                </div>
              </div>
              
              <?php    }
              } ?>

            </div>
            <!-- End Latest Posts -->
        </div>  

        </div>

        <!-- Divider -->
        <div class="hr5" style="margin-top:-10px; margin-bottom:30px;"></div>

        <div class="row">
        <div class="col-md-12">
          
         <div class="big-title text-center">
            <h1>Informasi <span class="accent-color">Events</span></h1>
            <p class="title-desc"></p>
          </div>
           <!-- Start Recent Posts Carousel -->
            <div class="latest-posts">

              <!-- Classic Heading -->
              <h4 class="classic-title"><span>Events</span></h4>

              <div class="latest-posts-classic custom-carousel touch-carousel" data-appeared-items="2">

              <?php foreach ($events_list as $key => $value): ?>
              
                <div class="post-row item">
                  <div class="left-meta-post">
                    <div class="post-date"><span class="day"><?php echo substr($value->tgl_events,8,2); ?></span><span class="month"><?php $cut = substr($value->tgl_events, 6,2); echo bulan_english($cut); ?></span></div>
                    <div class="post-type"><i class="fa fa-picture-o"></i></div>
                  </div>
                  <h3 class="post-title"><a href="<?php echo base_url('events/get/'.$value->slug); ?>"><?php echo $value->title ?></a></h3>
                  <div class="post-content">
                    <p>
                    <?php echo $value->short_descriptions ?>
                    <a class="read-more" href="<?php echo base_url('events/get/'.$value->slug); ?>">Selengkapnya...</a></p>
                  </div>  
                </div>

                <?php endforeach ?>
              
              </div>
            </div>
            <!-- End Recent Posts Carousel -->
      
            </div>
        </div>

         <!-- Divider -->
        <div class="hr5" style="margin-top:15px; margin-bottom:55px;"></div>

        <div class="row">

          <div class="col-md-3">
            <!-- Start Big Heading -->
            <div class="big-title">
              <h1>Daftar <span class="accent-color">Camat</span> Koba</h1>
              <p class="title-desc">We Make Your Smile</p>
            </div>
            <!-- End Big Heading -->

            <!-- Some Text -->
            <p><?php echo $this->setting->get('motto'); ?></p>

            <!-- Divider -->
            <div class="hr1" style="margin-bottom:10px;"></div>

            <!-- Some Text -->
            <p><?php echo $this->setting->get('janji-pelayanan'); ?></p>
          </div>

          <?php foreach ($this->setting->get_all_camat() as $key => $value): ?>
            
            <?php if ($value->foto == NULL): ?>

                <?php $img = 'no-img.jpg'; ?>
            
            <?php else: ?>

                <?php $img = $value->foto; ?>

            <?php endif ?>          
          <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="team-member">
              <div class="member-photo" >
                <img alt="" src="<?php echo base_url('assets/images/team/'.$img) ?>" />
                <a href="<?php echo site_url('pimpinan/get/'.$value->slug); ?>" title="<?php echo $value->nama_lengkap ?>">
                <div class="member-name">
                   <?php  if ($this->agent->is_mobile()) :  ?>
                    <small>  <?php echo $value->nama_lengkap ?></small>
                  <?php else: ?>
                     <?php echo $value->nama_lengkap ?>
                  <?php endif ?>
              <span><small>Periode <?php echo $value->periode ?></small></span></div></a>
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

        </div>        

        <!-- Divider -->
        <div class="hr5" style="margin-top:45px; margin-bottom:30px;"></div>

        <div class="row">
        <div class="col-md-12">
           <div class="big-title text-center">
            <h1>Foto Album  <span class="accent-color">Kecamatan Koba</span></h1>        
          </div>
            
          <div class="recent-projects">
            <h4 class="title"><span>Foto Album</span></h4>
            <div class="projects-carousel touch-carousel">

            <?php foreach ($foto_album as $key => $value): ?>
          
              <div class="portfolio-item item">
                <div class="portfolio-border">
                  <div class="portfolio-thumb">
                    <a href="<?php echo base_url('album/get/'.$value->id.'/'.$value->slug) ?>">
                      <div class="thumb-overlay"></div>
                      <img alt="<?php echo $value->title ?>" src="<?php echo base_url('assets/images/album/'.$value->cover) ?>" />
                    </a>
                  </div>
                  <div class="portfolio-details">
                    <a href="<?php echo base_url('album/get/'.$value->id.'/'.$value->slug) ?>">
                      <h6><?php echo $value->title ?></h6>
                      <span><small><i class="fa fa-user"></i> <?php echo $value->uploaded ?></small></span>
                       <span><small><i class="fa fa-calendar"></i> <?php $cut = substr($value->dates, 0,10); echo date_id($cut); ?></small></span>
                    </a>
                  </div>
                </div>
              </div>
            
            <?php endforeach ?>

            </div>
          </div>
   
          </div>

        </div>

          <!-- Divider -->
        <div class="hr5" style="margin-top:65px; margin-bottom:55px;"></div>


        <div class="row">

          <div class="col-md-3">
            <!-- Start Big Heading -->
            <div class="big-title">
              <h1><span class="accent-color">Mitra</span> Kerja</h1>
              <p class="title-desc">Mitra Kerja sama kami</p>
            </div>
            <!-- End Big Heading -->
          </div>

          <div class="col-md-9">
            <!--Start Clients Carousel-->
            <div class="our-clients">
              <div class="clients-carousel custom-carousel touch-carousel navigation-4" data-appeared-items="6" data-navigation="true">

              <?php foreach ($mitra as $key => $value): ?>
                
                <div class="client-item item text-center">
                  <a href="<?php echo $value->link ?>"><img class=" itl-tooltip" data-placement="bottom" title="<?php echo $value->title ?>" width="60" src="<?php echo base_url('assets/images/mitra-kerja/'.$value->img) ?>" alt="" /></a>
                </div>
             
              <?php endforeach ?>

              </div>
            </div>
            <!--End Clients Carousel-->
          </div>


        </div>

      </div>
    </div>
    <!-- End Content -->


