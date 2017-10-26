
    <div id="map"></div>
    <script>
      function initMap() {
        var uluru = {lat: -2.4822840, lng: 106.3952790};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 17,
          mapTypeId: 'roadmap',
          center: uluru,
        
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>

    <!-- Start Content -->
    <div id="content">
      <div class="container">

        <div class="row">

          <div class="col-md-8">

            <!-- Classic Heading -->
            <h4 class="classic-title"><span>Kontak Kami</span></h4>
            <div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
            <!-- Start Contact Form -->
            <form action="<?php echo site_url('kontak'); ?>" role="form" class="contact-form" id="contact-form" method="post">
              <div class="form-group">
                <div class="controls">
                  <input type="text" placeholder="Nama" name="nama" value="<?php echo set_value('nama'); ?>">
                  <p class="help-block"><?php echo form_error('nama', '<small class="text-red">', '</small>'); ?></p>
                </div>
              </div>
              <div class="form-group">
                <div class="controls">
                  <input type="text" class="email" placeholder="Email" name="email" value="<?php echo set_value('email'); ?>">
                  <p class="help-block"><?php echo form_error('email', '<small class="text-red">', '</small>'); ?></p>
                </div>
              </div>
              <div class="form-group">
                <div class="controls">
                  <input type="text" class="requiredField" placeholder="Subjek" name="subjek" value="<?php echo set_value('subjek'); ?>">
                  <p class="help-block"><?php echo form_error('subjek', '<small class="text-red">', '</small>'); ?></p>
                </div>
              </div>

              <div class="form-group">

                <div class="controls">
                  <textarea rows="7" placeholder="Pesan" name="pesan" value="<?php echo set_value('pesan'); ?>"></textarea>
                  <p class="help-block"><?php echo form_error('pesan', '<small class="text-red">', '</small>'); ?></p>
                </div>
              </div>
              <button type="submit" id="submit" class="btn-system btn-large">Send</button>
              <div id="success" style="color:#34495e;"></div>
            </form>
            <!-- End Contact Form -->

          </div>

          <div class="col-md-4">

            <!-- Classic Heading -->
            <h4 class="classic-title"><span>Informasi</span></h4>

            <!-- Divider -->
            <div class="hr1" style="margin-bottom:10px;"></div>

            <!-- Info - Icons List -->
            <ul class="icons-list">
              <li><i class="fa fa-globe">  </i> <strong>Alamat:</strong> <?php echo $this->setting->get('alamat'); ?></li>
              <li><i class="fa fa-envelope-o"></i> <strong>Email:</strong> <?php echo $this->setting->get('email'); ?></li>
              <li><i class="fa fa-mobile"></i> <strong>Telepon:</strong> <?php echo $this->setting->get('telepon'); ?></li>
            </ul>

            <!-- Divider -->
            <div class="hr1" style="margin-bottom:15px;"></div>

            <!-- Classic Heading -->
            <h4 class="classic-title"><span>Jam Kerja</span></h4>

            <!-- Info - List -->
            <ul class="list-unstyled">
              <li><?php echo $this->setting->get('jam-kerja'); ?></li>
            </ul>

          </div>

        </div>

      </div>
    </div>
    <!-- End content -->

 <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDrZ4xkKZ7rR-40EaBEtOhQf3-jX0fz8i8&callback=initMap">
    </script>