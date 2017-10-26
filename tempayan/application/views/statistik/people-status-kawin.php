<div class="row">
	<div class="col-md-3">
        <?php $this->load->view('statistik/nav-kependudukan'); ?>
	</div>
	<div class="col-md-9">
        <div class="box box-solid">
            <div class="box-body">
                <div id="chart-populasi-status"></div>
            </div>
            <div class="box-body">
                <a href="<?php echo site_url('stats_people/print_out/status-kawin') ?>" class="btn btn-warning hvr-shadow btn-flat btn-sm btn-print"><i class="fa fa-print"></i> Cetak</a>
                <a href="<?php echo site_url('stats_people/export/perkawinan_population') ?>" class="btn btn-warning hvr-shadow btn-flat btn-sm"><i class="fa fa-download"></i> Ekspor</a>
            </div>
            <div class="box-body">
                <table class="table table-striped table-bordered col-md-12" style="margin-top: 10px;">
                    <thead class="bg-silver">
                        <tr>
                            <th width="30">No. </th>
                            <th class="text-center">Jenis Kelompok</th>
                            <th class="text-center" colspan="2">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php  
                /**
                 * Loop Status Perkawinan
                 *
                 **/
                $total = 0;

                $total_per = 0;
                foreach($status_kawin as $key => $value) :

                    $total += $this->stats_people->status_kawin_population($value->status_kawin);

                    $total_per += $this->stats_people->status_kawin_population($value->status_kawin, TRUE);

                ?>
                        <tr>
                            <td><?php echo ++$key; ?>.</td>
                            <td class="text-center"><?php echo strtoupper($value->status_kawin); ?></td>
                            <td class="text-center"><?php echo $this->stats_people->status_kawin_population($value->status_kawin); ?> Orang</td>
                            <td class="text-center"><?php echo $this->stats_people->status_kawin_population($value->status_kawin, TRUE); ?> %</td>
                        </tr>
                <?php  
                endforeach;
                ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="2" class="text-right">Total : </th>
                            <th class="text-center"><?php echo $total; ?> Orang</th>
                            <th class="text-center"> <?php echo ceil($total_per) ?>%</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
Highcharts.chart('chart-populasi-status', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    colors: ['#ffe0b2', '#ffa726','#f57c00','#ffd180','#ff6d00'],
    title: {
        text: 'Populasi Penduduk Menurut Status Perkawinan'
    },
    subtitle: {
        text: '<strong>Kecamatan <?php echo $this->option->get('kecamatan'); ?></strong>'
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
        <?php foreach($status_kawin as $key => $value) : ?>
            {'name': '<?php echo strtoupper($value->status_kawin) ?>','y':<?php echo $this->stats_people->status_kawin_population($value->status_kawin); ?>},
        <?php endforeach; ?>
        ]
    }]
});
</script>