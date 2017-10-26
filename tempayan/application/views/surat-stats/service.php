<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('surat-stats/nav-surat-stats', $this->data);

?>
   <div class="col-md-9">
        <div class="box box-solid">
            <div class="box-body">
                <div id="chart-service"></div>
            </div>
            <div class="box-body">
            	<div id="chart-bar"></div>
            </div>
        </div>
    </div>
</div>

<script>
Highcharts.chart('chart-service', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    colors: ['#00B050','#C6EBA5','#ECCE8E','#FFC000','#FF0000'],
    title: {
        text: 'Penilaian Terhadap Pelayanan'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
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
    colors:['#00B050','#C6EBA5','#ECCE8E','#FFC000','#FF0000'],
    title: {
        text: 'Rata-rata Penilaian Terhadap Pelayanan'
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
        name: 'Cukup',
        data: [<?php for($m = 1; $m <= 12; $m++) echo $this->penilaian->count_month(3, $m, $this->penilaian->tahun).','; ?>]

    },{
        name: 'Buruk',
        data: [<?php for($m = 1; $m <= 12; $m++) echo $this->penilaian->count_month(4, $m, $this->penilaian->tahun).','; ?>]

    },{
        name: 'Sangat Buruk',
        data: [<?php for($m = 1; $m <= 12; $m++) echo $this->penilaian->count_month(5, $m, $this->penilaian->tahun).','; ?>]

    }]
});
</script>
<?php
/* End of file service.php */
/* Location: ./application/views/surat-stats/service.php */