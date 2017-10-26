<div <?php echo ($this->agent->is_mobile()) ? 'class="container margin-container" style="padding-top:50px;"': $browser ="style='padding-top:80px;' class='container'"; ?>>
        <div class="row">
          <br>&nbsp;
          <br>&nbsp;
          <br>&nbsp;
          <br>&nbsp;
          <div class=" col-md- text-center animated bounce">
            <!-- <h1 class="spengaduan "><span class="fa fa-internet-explorer"></span> - Penilaian</b></h1> -->
           <!--  <p class="slogan2">Koba District Information &amp; Service  Center</p>
            <p class="slogan">Pusat Informasi dan Portal Penilaian Kecamatan Koba</p>     -->
          </div>
        </div>
        <p></p>
        <div class="row narrow">
           <a class="color-black" href="<?php echo site_url('epenilaian/pelayanan') ?>">
          <div class="col-md-4 col-md-offset-2  animated bounce border-radius ">
            <!-- Widget: user widget style 1 -->
            <div class="box box-widget widget-user shadow   border-radius <?php  if ($this->agent->is_mobile()) { echo '';  } else { echo 'zoom'; } ?>">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-orange polygonal  border-radius  ">
                <h3 class="widget-user-username text-center "><b>Penilaian Pelayanan</b></h3>
                <h5 class="widget-user-desc"></h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle" src="<?php echo base_url('assets/img/e-pelayanan.jpg') ?>" alt="image">
              </div>
              <div class="box-footer  border-radius">
                <div class="row text-center">
                <p></p>
                  <p class="text-orange">Penilaian  kinerja pelayanan </p>
                </div>
              </div>
             </div>  
          </div> 
          </a>
          <a class="color-black" href="<?php echo site_url('epenilaian/pengaduan') ?>">
          <div class="col-md-4   animated bounce border-radius">
            <!-- Widget: user widget style 1 -->
            <div class="box box-widget widget-user shadow  border-radius <?php  if ($this->agent->is_mobile()) { echo '';  } else { echo 'zoom'; } ?>">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-red border-radius polygonal">
                <h3 class="widget-user-username text-center "><b>Penilaian Pengaduan</b></h3>
                <h5 class="widget-user-desc"></h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle" src="<?php echo base_url('assets/img/pengaduan.jpg') ?>" alt="image">
              </div>
              <div class="box-footer border-radius">
                <div class="row text-center">
                <p></p>
                  <p class="text-orange">Penilaian  kinerja pengaduan </p>
                </div>
              </div>
             </div> 
          </div> 
          </a>
      </div>     
</div>
