      <div class="row">

        <div class="col-lg-4 col-xs-6">
          <div class="small-box bg-1">
            <div class="inner">
              <h3><?php echo $this->db->count_all('penduduk'); ?></h3>
              <p>Jumlah Penduduk</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-people"></i>
            </div>
            <a href="<?php echo site_url('administrator/penduduk') ?>" class="small-box-footer">Selengkapnya</a>
          </div>
        </div>
        <div class="col-lg-4 col-xs-6">
          <div class="small-box bg-2">
            <div class="inner">
              <h3><?php echo $this->db->count_all('epengaduan'); ?></h3>
              <p>Jumlah Pengaduan</p>
            </div>
            <div class="icon">
              <i class="ion ion-speakerphone"></i>
            </div>
            <a href="<?php echo site_url('administrator/pengaduan') ?>" class="small-box-footer">Selengkapnya</a>
          </div>
        </div>
        <div class="col-lg-4 col-xs-6">
          <div class="small-box bg-4">
            <div class="inner">
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
                    <input class="form-control input-sm" type="date" name="start" id="datepicker3" value="<?php echo $this->input->get('start') ?>" placeholder="Mulai Tanggal ..">
                    <span class="input-group-addon"><span class="fa fa-calendar" aria-hidden="true"></span></span>
                    <input class="form-control input-sm" type="date" name="end" id="datepicker1" value="<?php echo $this->input->get('end') ?>" placeholder="Sampai Tanggal ..">
                  </div>  
                </div>
            </div>
            <div class="col-md-3">
              <div class="form-group" id="tombol-filter">
                <button type="submit" class="btn btn-success hvr-shadow top"><i class="fa fa-filter"></i> Filter</button>
                <a href="<?php echo site_url('administrator/home') ?>" class="btn btn-success hvr-shadow top" style="margin-left: 10px;"><i class="fa fa-times"></i> Reset</a>
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
        type: 'areaspline',
        polar:true
    },
    colors: ['#ff9800'],
    title: {
        text: 'Grafik Pengaduan Masuk'
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
                if( $this->m_epengaduan->count_by_date($date) == FALSE)
                  continue;
                   $dt = new DateTime($date);
              ?>
            '<?php echo $dt->format('d')." ".bulan($dt->format('m')).date(' Y'); ?>',
          <?php endforeach; ?>
          <?php 
           ?>
          ]
             },
    yAxis: {
        title: {
            text: 'Jumlah Pengaduan Masuk'
        }
    },
    tooltip: {
        shared: true,
        valueSuffix: ' Pengaduan'
    },
    plotOptions: {
        areaspline: {
            fillOpacity: 0.4
        }
    },
    series: [{
        name: 'Masuk ',
        data: [
               <?php  
              foreach ($range as $date) :
                if( $this->m_epengaduan->count_by_date($date) == FALSE)
                  continue;
                  $dt = new DateTime($date);
                  echo $this->m_epengaduan->count_by_date($date).", ";
              endforeach;
              ?>
            ]
    }]
});
</script>


