      <div class="row">

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-1">
            <div class="inner text-white">
              <h3><?php echo $this->db->count_all('tb_camat'); ?></h3>
              <p>Pimpinan Kecamatan Koba</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-people"></i>
            </div>
            <a href="<?php echo site_url('administrator/penduduk') ?>" class="small-box-footer">Selengkapnya</a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-2">
            <div class="inner text-white">
              <h3><?php echo $this->db->count_all('tb_aparatur'); ?></h3>
              <p>Aparatur Kecamatan Koba</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="<?php echo site_url('administrator/pengaduan') ?>" class="small-box-footer">Selengkapnya</a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-3">
            <div class="inner text-white">
              <h3><?php echo $this->db->count_all('tb_administrator'); ?></h3>
              <p>Pengguna Sistem</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-stalker"></i>
            </div>
            <a href="<?php echo site_url('administrator/pengaturan') ?>" class="small-box-footer">Selengkapnya</a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-3">
            <div class="inner text-white">
              <h3><?php echo $this->db->count_all('tb_administrator'); ?></h3>
              <p>Pengguna Sistem</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-stalker"></i>
            </div>
            <a href="<?php echo site_url('administrator/pengaturan') ?>" class="small-box-footer">Selengkapnya</a>
          </div>
        </div>    
      </div>