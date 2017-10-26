<div class="row">
    <div class="col-md-3">
        <?php $this->load->view('statistik/nav-kependudukan'); ?>
    </div>
    <div class="col-md-9">
        <div class="box box-solid">
            <div class="box-body">
            <?php
            /**
             * Default Pie Chart
             *
             * @var string
             **/
            if($this->input->get('chart') != 'bar' OR $this->input->get('chart') == FALSE) :
            ?>
                <div id="chart-populasi-desa"></div>
            <?php else : ?>
                <div id="chart-populasi-desa-bar" style="height: 600px;"></div>
            <?php endif; ?>
            </div>
            <div class="box-body">
                <a href="<?php echo site_url('stats_people/print_out/desa') ?>" class="btn btn-warning hvr-shadow btn-flat btn-sm btn-print"><i class="fa fa-print"></i> Cetak</a>
                <a href="<?php echo site_url('stats_people/export/desa_population') ?>" class="btn btn-warning hvr-shadow btn-flat btn-sm"><i class="fa fa-download"></i> Ekspor</a>
                <a href="<?php echo site_url('stats_people') ?>" class="btn btn-warning hvr-shadow btn-flat btn-sm"><i class="fa fa-pie-chart"></i> Grafik Pie</a>
                <a href="<?php echo site_url('stats_people?chart=bar') ?>" class="btn btn-warning hvr-shadow btn-flat btn-sm"><i class="fa fa-bar-chart"></i> Grafik Batang</a>
            </div>
            <div class="box-body">
                <table class="table table-striped table-bordered col-md-12" style="margin-top: 10px;">
                    <thead class="bg-silver">
                        <tr>
                            <th rowspan="2" width="30">No. </th>
                            <th rowspan="2" class="text-center">Desa</th>
                            <th class="text-center" colspan="5">Jumlah</th>
                        </tr>
                        <tr>
                            <th class="text-center">Semua</th>
                            <th colspan="2" class="text-center">Laki-laki</th>
                            <th colspan="2" class="text-center">Perempuan</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                /**
                 * Loop Data Desa
                 *
                 **/
                $total = 0;

                $total_laki = 0;

                $total_laki_per = 0;

                $total_pr = 0;

                $total_pr_per = 0;

                foreach($desa as $key => $value) :

                    @$total += $this->stats_people->desa_population($value->id_desa);

                    @$total_laki += $this->stats_people->desa_population($value->id_desa, 'laki-laki');

                    @$total_laki_per += $this->stats_people->desa_population($value->id_desa, 'laki-laki', TRUE);

                    @$total_pr += $this->stats_people->desa_population($value->id_desa, 'perempuan');

                    @$total_pr_per += $this->stats_people->desa_population($value->id_desa, 'perempuan', TRUE);
                ?>
                        <tr>
                            <td><?php echo ++$key; ?>.</td>
                            <td><?php echo $value->nama_desa; ?></td>
                            <td class="text-center"><?php echo $this->stats_people->desa_population($value->id_desa); ?></td>
                            <td class="text-center"><?php echo $this->stats_people->desa_population($value->id_desa, 'laki-laki'); ?></td>
                            <td class="text-center"><?php echo $this->stats_people->desa_population($value->id_desa, 'laki-laki', TRUE); ?>&#37;</td>
                            <td class="text-center"><?php echo $this->stats_people->desa_population($value->id_desa, 'perempuan'); ?></td>
                            <td class="text-center"><?php echo $this->stats_people->desa_population($value->id_desa, 'perempuan', TRUE); ?>&#37;</td>
                        </tr>
                <?php
                endforeach;
                ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="2" class="text-right">Total : </th>
                            <th class="text-center"><?php echo $total; ?></th>
                            <th class="text-center"><?php echo $total_laki; ?></th>
                            <th class="text-center"><?php echo $total_laki_per; ?> %</th>
                            <th class="text-center"><?php echo $total_pr; ?></th>
                            <th class="text-center"><?php echo $total_pr_per; ?> %</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
<?php
/**
 * Default Pie Chart
 *
 * @var string
 **/
if($this->input->get('chart') != 'bar' OR $this->input->get('chart') == FALSE) :
?>
Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
    return {
        radialGradient: {
            cx: 0.5,
            cy: 0.3,
            r: 0.7
        },
        stops: [
            [0, color],
            [1, Highcharts.Color(color).brighten(-0.3).get('rgb')]
        ]
    };
});

Highcharts.chart('chart-populasi-desa', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    colors: ['#FF9200','#52BD33','#F6CA7C','#E8AB2E','#FDF06D','#FCC700','#E5B15D','#42CBEC','#FF6A19','#CDCDCD'],
    title: {
        text: 'Populasi Penduduk Desa - Kecamatan <?php echo $this->option->get('kecamatan'); ?>'
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
                },
                connectorColor: 'silver'
            }
        }
    },
    series: [{
        name: 'Populasi',
        data: [
                <?php
                /**
                 * Loop Data Desa
                 *
                 **/
                foreach($desa as $row) :
                ?>
                    {'name': '<?php echo $row->nama_desa; ?>','y':<?php echo $this->stats_people->desa_population($row->id_desa, NULL, TRUE); ?>},
                <?php
                endforeach;
                ?>
                ]
    }]
});

<?php
else :
?>
Highcharts.chart('chart-populasi-desa-bar', {
    chart: {
        type: 'bar'
    },
    colors: ['#ffe0b2', '#ffa726','#f57c00','#ffd180','#ff6d00'],
    title: {
        text: 'Populasi Penduduk Desa - Kecamatan <?php echo $this->option->get('kecamatan'); ?>'
    },
    xAxis: {
        categories: [<?php foreach($desa as $row) echo "'{$row->nama_desa}',"; ?>],
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Populasi',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ' %'
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 80,
        floating: true,
        borderWidth: 1,
        backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Keseluruhan',
        data: [<?php foreach($desa as $row) echo $this->stats_people->desa_population($row->id_desa, NULL, TRUE).','; ?>]
    }, {
        name: 'Laki-laki',
        data: [<?php foreach($desa as $row) echo $this->stats_people->desa_population($row->id_desa, 'laki-laki', TRUE).','; ?>]
    }, {
        name: 'Perempuan',
        data: [<?php foreach($desa as $row) echo $this->stats_people->desa_population($row->id_desa, 'perempuan', TRUE).','; ?>]
    }]
});

<?php
endif;
?>
</script>
