<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <!-- Start Footer -->
    <footer>
      <div class="container">
        <div class="row footer-widgets">

          <!-- Start Subscribe & Social Links Widget -->
          <div class="col-md-3">

            <div class="footer-widget social-widget">
              <h4>Ikuti Kami<span class="head-line"></span></h4>
              <ul class="social-icons">
              <?php 
                  foreach ($this->setting->sosial() as $key => $value) {
               ?>
                 <li>
                  <a class="<?php echo $value->class ?>" href="<?php echo $value->link ?>"><i class="fa <?php echo $value->icon ?>"></i></a>
                </li>
               <?php      
                  }
               ?>
               
              </ul>
            </div>
          </div>
          <!-- .col-md-3 -->
          <!-- End Subscribe & Social Links Widget -->

          <!-- Start Twitter Widget -->
          <div class="col-md-3">
            <div class="footer-widget twitter-widget">
              <h4>Twitter Feed<span class="head-line"></span></h4>
              <ul>
                
          
              </ul>
            </div>
          </div>
          <!-- .col-md-3 -->
          <!-- End Twitter Widget -->

          <!-- Start Flickr Widget -->
          <div class="col-md-3">
            <div class="footer-widget flickr-widget">
              <h4>Foto Kegiatan <span class="head-line"></span></h4>
              <ul class="flickr-list">
              <?php foreach ($this->setting->foto_footer() as $key => $value): ?>
                 <li>
                  <a  class="lightbox" title="<?php echo $value->title; ?>" href="<?php echo base_url('assets/images/album/'.$value->foto) ?>" >
                    <img alt="<?php echo $value->title; ?>" src="<?php echo base_url('assets/images/album/'.$value->foto) ?>">
                  </a>
                </li>
              <?php endforeach ?>
              </ul>
            </div>
          </div>
          <!-- .col-md-3 -->
          <!-- End Flickr Widget -->


          <!-- Start Contact Widget -->
          <div class="col-md-3">
            <div class="footer-widget contact-widget">
              <h4><img width="98%" src="<?php echo base_url('assets') ?>/images/<?php echo $this->setting->get('logo-footer'); ?>" class="img-responsive" alt="Footer Logo" /></h4>
              <p><b>Janji Pelayanan : </b> <?php echo $this->setting->get('janji-pelayanan'); ?></p>
              <ul>
                <li><span>Telepon :</span> <?php echo $this->setting->get('telepon'); ?></li>
                <li><span>Email :</span> <?php echo $this->setting->get('email'); ?></li>
                <li><span>Alamat :</span> <?php echo $this->setting->get('alamat'); ?></li>
              </ul>
            </div>
          </div>
          <!-- .col-md-3 -->
          <!-- End Contact Widget -->


        </div>
        <!-- .row -->

        <!-- Start Copyright -->
        <div class="copyright-section">
          <div class="row">
            <div class="col-md-7">
              <p>
                 <small>
      Hak Cipta &copy; 2017 <?php if(date('Y')!=2017) echo "- ".date('Y'); ?> Kec. Simpang Katis, Kab. Bangka Tengah All rights reserved. Develop By 
      <a  href="http://facebook.com/teitramega" target="_blank"><span class="accent-color">Teitra Mega</span></a>
                </small>
              </p>
            </div>
            <div class="col-md-5">
              <ul class="footer-nav">
                <li><a href="<?php echo base_url('syarat-dan-ketentuan'); ?>">Syarat dan Ketentuan</a></li>
                <li><a href="<?php echo base_url('kontak'); ?>">Kontak</a></li>
              </ul>
            </div>
          </div>
        </div>
        <!-- End Copyright -->

      </div>
    </footer>
    <!-- End Footer -->

  </div>
  <!-- End Container -->

  <!-- Go To Top Link -->
  <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>
 
   <?php if ($this->setting->get('pilihan-gaya') == 'show') { ?>

  <!-- Style Switcher -->
   <div class="switcher-box">
    <a class="open-switcher show-switcher"><i class="fa fa-cog fa-2x"></i></a>
    <h4>Pilihan Warna</h4>
    <span>12 Skin Warna</span>
    <ul class="colors-list">
     <li>
        <a onClick="setActiveStyleSheet('orange'); return false;" title="Orange" class="orange"></a>
      </li>
      <li>
        <a onClick="setActiveStyleSheet('blue'); return false;" title="Blue" class="blue"></a>
      </li>
      <li>
        <a onClick="setActiveStyleSheet('sky-blue'); return false;" title="Sky Blue" class="sky-blue"></a>
      </li>
      <li>
        <a onClick="setActiveStyleSheet('cyan'); return false;" title="Cyan" class="cyan"></a>
      </li>
      <li>
        <a onClick="setActiveStyleSheet('jade'); return false;" title="Jade" class="jade"></a>
      </li>
      <li>
        <a onClick="setActiveStyleSheet('green'); return false;" title="Green" class="green"></a>
      </li>
      <li>
        <a onClick="setActiveStyleSheet('purple'); return false;" title="Purple" class="purple"></a>
      </li>
      <li>
        <a onClick="setActiveStyleSheet('pink'); return false;" title="Pink" class="pink"></a>
      </li>
      <li>
        <a onClick="setActiveStyleSheet('red'); return false;" title="Red" class="red"></a>
      </li>
      <li>
        <a onClick="setActiveStyleSheet('yellow'); return false;" title="Yellow" class="yellow"></a>
      </li>
      <li>
        <a onClick="setActiveStyleSheet('peach'); return false;" title="Peach" class="peach"></a>
      </li>
      <li>
        <a onClick="setActiveStyleSheet('beige'); return false;" title="Biege" class="beige"></a>
      </li>
    </ul>
    <span>Warna Bar Atas</span>
    <select id="topbar-style" class="topbar-style">
      <option value="1">Light (Default)</option>
      <option value="2">Dark</option>
      <option value="3">Color</option>
    </select>
  </div>
  <?php } ?>
<script type="text/javascript" src="<?php echo base_url('assets') ?>/js/script.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets') ?>/js/front/front.js"></script>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
    
</body>
</html>
<?php

/* End of file footer.php */
/* Location: ./application/views/template/footer.php */