
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <div class="small-box color-600" id="block-stats-penduduk">
            <div class="inner">
              <h3><?php echo $this->db->count_all('penduduk'); ?></h3> <p>Jumlah Penduduk</p>
            </div>
            <div class="icon"> <i class="ion ion-ios-people"></i></div>
            <a href="<?php echo site_url('people'); ?>" class="small-box-footer">Selengkapnya...</a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box color-500" id="block-stats-desa">
            <div class="inner">
                <h3><?php echo $this->db->count_all('desa'); ?></h3><p>Jumlah Kel / Desa</p>
            </div>
            <div class="icon"> <i class="ion ion-map"></i> </div>
            <a href="<?php echo site_url('desa') ?>" class="small-box-footer">Selengkapnya...</a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box color-400" id="block-stats-surat-keluar">
            <div class="inner">
                <h3><?php echo $this->db->get_where('surat', array('status' => 'approve'))->num_rows() ?></h3> <p>Surat Keluar</p>
            </div>
            <div class="icon"> <i class="fa fa-line-chart"></i> </div>
            <a href="<?php echo site_url('surat_keluar?status=approve') ?>" class="small-box-footer">Selengkapnya...</a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box color-300" id="block-stats-pengguna-sistem">
            <div class="inner">
                <h3><?php echo $this->db->count_all('users'); ?></h3> <p>Pengguna Sistem</p>
            </div>
            <div class="icon"> <i class="ion ion-person-stalker"></i> </div>
            <a href="<?php echo site_url('user') ?>" class="small-box-footer">Selengkapnya...</a>
        </div>
    </div>
</div>

<?php  
/* PERMISSION */
if( $this->permission->is_true('surat_perizinan', 'on') OR $this->permission->is_true('surat_non_perizinan', 'on') ) :
?>
<div class="row">
    <div class="col-md-6">
        <div class="box box-default box-solid" id="block-tombol-surat-keterangan">
            <div class="box-header with-border">
              	<h3 class="box-title">Shortcut Surat Non Perizinan </h3>
              	<div class="box-tools pull-right">
                	<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> </button>
              	</div>
            </div>
            <div class="box-body" style="padding-left: 12px;">
      <?php  
      /**
      * Loop Surat Keterangan
      *
      * @param String (jenis) 
      */
      foreach($this->option->surat_category(NULL,'non perizinan') as $row) :
      ?>
              <a class="csurat hvr-pulse-grow" href="<?php echo site_url("create_surat/index/{$row->id_surat}?from=".current_url()) ?>">
                <img src="<?php echo base_url("public/image/icon-surat2.png"); ?>" alt="sss"/>
                <span><?php echo $row->nama_kategori; ?></span>
              </a>
      <?php  
      endforeach;
      ?>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box box-default box-solid" id="block-tombol-surat-perizinan">
            <div class="box-header with-border">
                <h3 class="box-title">Shortcut Surat Perizinan </h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> </button>
                </div>
            </div>
            <div class="box-body" style="padding-left: 12px;">
      <?php  
      /**
      * Loop Surat Keterangan
      *
      * @param String (jenis) 
      */
      foreach($this->option->surat_category(NULL,'perizinan') as $row) :
      ?>
              <a class="csurat hvr-pulse-grow" href="<?php echo site_url("create_surat/index/{$row->id_surat}?from=".current_url()) ?>">
                <img src="<?php echo base_url("public/image/icon-surat2.png"); ?>" alt="sss"/>
                <span><?php echo $row->nama_kategori; ?></span>
              </a>
      <?php  
      endforeach;
      ?>
            </div>
        </div>
    </div>
</div>
<?php  
endif;
?>
<div class="row">
    <div class="col-md-12">
      <div class="box box-default box-solid block-chart-surat-keluar">
          <div class="box-body chart-border" style="padding-left: 12px;">
<?php  
/**
 * Start Form Pencarian
 *
 * @return string
 **/
echo form_open(current_url(), array('method' => 'get'));
?>
            <div class="col-md-4 col-md-offset-2">
                <div class="form-group">
                  <label>Filter Tanggal :</label>
                  <div class="input-group date-time">
                    <input class="form-control input-sm" name="start" id="datepicker" value="<?php echo $this->input->get('start') ?>" placeholder="Mulai Tanggal ..">
                    <span class="input-group-addon"><span class="fa fa-calendar" aria-hidden="true"></span></span>
                    <input class="form-control input-sm" name="end" id="datepicker2" value="<?php echo $this->input->get('end') ?>" placeholder="Sampai Tanggal ..">
                  </div>  
                </div>
            </div>
            <div class="col-md-3">
              <div class="form-group" id="tombol-filter">
                <button type="submit" class="btn btn-warning hvr-shadow top"><i class="fa fa-filter"></i> Filter</button>
                <a href="<?php echo site_url('main') ?>" class="btn btn-warning hvr-shadow top" style="margin-left: 10px;"><i class="fa fa-times"></i> Reset</a>
              </div>
            </div>
<?php  
/* End form filter */
echo form_close();

$start_date = ($this->input->get('start') != '') ? $this->input->get('start') : date('Y-m-d', strtotime('-1 week', strtotime(date('Y-m-d'))));

$end_date = ($this->input->get('end') != '') ? $this->input->get('end') : date('Y-m-d');

$range = date_range($start_date, $end_date);
?>
            <div class="col-md-12">
              <div id="surat-keluar" style="height: 270px;"></div>
            </div>
          </div>
      </div>
    </div>
</div>

<script type="text/javascript">
Highcharts.chart('surat-keluar', {
    chart: {
        type: 'areaspline'
    },
    colors: ['#ff9800'],
    title: {
        text: 'Grafik Data Surat Keluar'
    },
    legend: {
        layout: 'vertical',
        align: 'left',
        verticalAlign: 'top',
        x: 150,
        y: 100,
        floating: true,
        borderWidth: 1,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
    },
    xAxis: {
        categories: [
              <?php  
              foreach ($range as $date) :
                if( $this->option->count_surat_by_date($date) == FALSE)
                  continue;
                  $dt = new DateTime($date);
              ?>
            '<?php echo $dt->format('d')." ".bulan($dt->format('m')); ?>',
          <?php endforeach; ?>
        ]
    },
    yAxis: {
        title: {
            text: 'Surat Keluar'
        }
    },
    tooltip: {
        shared: true,
        valueSuffix: ' Dokumen'
    },
    plotOptions: {
        areaspline: {
            fillOpacity: 0.4
        }
    },
    series: [{
        name: 'Keluar ',
        data: [
              <?php  
              foreach ($range as $date) :
                if( $this->option->count_surat_by_date($date) == FALSE)
                  continue;
                  $dt = new DateTime($date);
                  echo $this->option->count_surat_by_date($date).", ";
              endforeach;
              ?>
              ]
    }]
});
</script>
