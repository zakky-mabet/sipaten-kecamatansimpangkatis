<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('header', $this->data );

$account = $this->account->get();

?>
<body class="grey lighten-3">
    <div class="navbar-fixed">
        <nav class="nav-extended orange darken-3">
            <div class="nav-wrapper navbar-fixed">
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
                <img class="brand-logo" src="<?php echo base_url("public/android/images/logo1.png"); ?>" alt="Logo apps tempayan">
                <a href="#logoff" class="right"><i class="fa fa-sign-out"></i></a>
            </div>
            <div class="nav-content">
                <ul class="tabs tabs-transparent orange darken-4" id="tabs-swipe-demo">
                    <li class="tab">
                        <a href="#test1" class="active">
                            <i class="fa fa-line-chart"></i>
                        </a>
                    </li>
                    <li class="tab">
                        <a href="#test2">
                            <i class="fa fa-bar-chart"></i>
                        </a>
                    </li>
                    <li class="tab">
                        <a href="#test3">
                            <i class="fa fa-globe"></i> 
                            <span class="sipaten-badge"><?php echo count($this->notif->get()) ?></span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <ul id="slide-out" class="side-nav">
        <li>
            <div class="user-view">
                <div class="background">
                    <img src="<?php echo base_url("public/android/images/bg.jpg"); ?>" alt="main bg">
                </div>
                <a href="#!user"><img class="circle" src="<?php echo base_url("public/android/images/user.jpg"); ?>"></a>
                <a href="#!name"><span class="white-text name"><?php echo $account->name; ?></span></a>
                <a href="#!email"><span class="white-text email"><?php echo $account->email ?></span></a>
            </div>
        </li>
        <li><a href=""><i class="fa fa-home"></i> Halaman Utama</a></li>
        <li><a href="<?php echo site_url('apps/surat') ?>"><i class="fa fa-envelope-o"></i> Data Surat Keluar</a></li>
        <li><div class="divider"></div></li>
        <li><a class="subheader">Pengaturan</a></li>
        <li><a class="waves-effect" href="<?php echo site_url('apps/account') ?>"><i class="fa fa-user"></i> Akun</a></li>
    </ul>
    <section id="test1" class="white" style="padding-top: 80px; width: 100%; ">
        <div id="chart-non-perizinan" style="width: 100%;"></div>
        <div id="chart-perizinan" style="width: 100%; margin-top: 20px;"></div>
    </section>

    <section id="test2" class="white" style="padding-top: 80px; width: 100%; ">
        <div id="chart-service" style="width: 100%;"></div>
        <div id="chart-bar" style="width: 100%; margin-top: 20px;"></div>
    </section>

    <section id="test3" style="padding-top: 70px; width: 100%; ">
        <div class="container">
           <div class="row">
                <div class="col s12">
                <?php  
                /**
                 * undocumented class variable
                 *
                 * @var string
                 **/
                foreach( $this->notif->get() as $row) :
                ?>
                    <div class="card-panel grey lighten-5 z-depth-1">
                        <a href="<?php echo site_url("apps/surat/get/{$row->surat}") ?>">
                        <div class="row valign-wrapper">
                            <div class="col s3">
                                 <img src="<?php echo  (!$row->photo) ? base_url("public/image/avatar.jpg") : base_url("public/image/{$row->photo}") ?>" alt="foto user" class="circle responsive-img"> 
                            </div>
                            <div class="col s9">
                                <span class="black-text">
                                   <?php echo $row->name ?> mengajukan surat "<i><?php echo $row->judul_surat ?></i>" kepada anda.
                                </span>
                            </div>
                        </div>
                        </a>
                    </div>
                <?php endforeach; ?>
                </div>
           </div>
        </div>
    </section>
<script>
/* SURAT PEPRIZINAN */
Highcharts.chart('chart-non-perizinan', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    colors: ['#FF9200','#F6CA7C','#FCC700','#E8AB2E','#52BD33','#42CBEC','#CDCDCD','#FF6A19'],
    title: {
        text: 'Data Surat Non Perizinan'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
        allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Total',
        colorByPoint: true,
        data: [
        <?php  
        /**
         * Loop Data Desa
         *
         **/
        foreach($this->stats->surat_category(NULL, 'non perizinan') as $row) :
        ?>
            {
                name: '<?php echo $row->nama_kategori; ?>',
                y:<?php echo $this->stats->count_by_category($row->id_surat); ?>
            },
        <?php  
        endforeach;
        ?>]
    }]
});
/* SURAT NON PERIZINAN*/
Highcharts.chart('chart-perizinan', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    colors: ['#FF9200','#F6CA7C','#FCC700','#E8AB2E','#52BD33','#42CBEC','#CDCDCD','#FF6A19'],
    title: {
        text: 'Data Surat Non Perizinan'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
        allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Total',
        colorByPoint: true,
        data: [
        <?php  
        /**
         * Loop Data Desa
         *
         **/
        foreach($this->stats->surat_category(NULL, 'perizinan') as $row) :
        ?>
            {
                name: '<?php echo $row->nama_kategori; ?>',
                y:<?php echo $this->stats->count_by_category($row->id_surat); ?>
            },
        <?php  
        endforeach;
        ?>]
    }]
});

/* PENILAIAN */
Highcharts.chart('chart-service', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    colors: ['#42CBEC','#76B640','#FCC700','#CB2C19'],
    title: {
        text: 'Penilaian Pelayanan'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
        allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Total',
        colorByPoint: true,
        data: [
        <?php  
        /**
         * Loop Data Desa
         *
         **/
        foreach($this->penilaian->get_answers() as $row) :
        ?>
            {
                name: '<?php echo $row->jawaban; ?>',
                y:<?php echo $this->penilaian->count($row->ID); ?>
            },
        <?php  
        endforeach;
        ?>]
    }]
});



/* Bar Chart */
Highcharts.chart('chart-bar', {
    chart: {
        type: 'column'
    },
    colors:['#42CBEC','#76B640','#FCC700','#CB2C19'],
    title: {
        text: 'Rata-rata Penilaian Pelayanan'
    },
    subtitle: {
        text: 'Tahun : <?php echo $this->stats->year; ?>'
    },
    xAxis: {
        categories: [<?php for($m = 1; $m <= 12; $m++) echo '"'.bulan($m).'",'; ?>],
        crosshair: true
    },
    yAxis: {
        min: 0,
        allowDecimals: false,
        title: {
            text: 'Jumlah Responden'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color: {series.color};padding:0"> {series.name} : </td>' +
            '<td style="padding:0"><b> {point.y:f} Data</b></td></tr>',
        footerFormat: '</table>',
        percentageDecimals: 1,
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Sangat Baik',
        data: [<?php for($m = 1; $m <= 12; $m++) echo $this->penilaian->count_month(1, $m, $this->penilaian->tahun).','; ?>]

    },{
        name: 'Baik',
        data: [<?php for($m = 1; $m <= 12; $m++) echo $this->penilaian->count_month(2, $m, $this->penilaian->tahun).','; ?>]

    },{
        name: 'Cukup Baik',
        data: [<?php for($m = 1; $m <= 12; $m++) echo $this->penilaian->count_month(3, $m, $this->penilaian->tahun).','; ?>]

    },{
        name: 'Kurang Baik',
        data: [<?php for($m = 1; $m <= 12; $m++) echo $this->penilaian->count_month(4, $m, $this->penilaian->tahun).','; ?>]

    }]
});
</script>
<?php  

$this->load->view('footer', $this->data );

/* End of file main-index.php */
/* Location: ./application/modules/apps/views/main-index.php */



