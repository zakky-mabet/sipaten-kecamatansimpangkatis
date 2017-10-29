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
                <a href="<?php echo site_url('stats_people/print_out/kewarganegaraan') ?>" class="btn btn-success btn-flat hvr-shadow btn-sm btn-print"><i class="fa fa-print"></i> Cetak</a>
                <a href="<?php echo site_url('stats_people/export/kewarganegaraan') ?>" class="btn btn-success btn-flat hvr-shadow btn-sm"><i class="fa fa-download"></i> Ekspor</a>
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
                        <tr>
                            <td>1.</td>
                            <td class="text-center">WNI</td>
                            <td class="text-center"><?php echo @$this->stats_people->warga_negara_population('wni'); ?> Orang</td>
                            <td class="text-center"><?php echo @$this->stats_people->warga_negara_population('wni', TRUE); ?> %</td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td class="text-center">WNA</td>
                            <td class="text-center"><?php echo @$this->stats_people->warga_negara_population('wna'); ?> Orang</td>
                            <td class="text-center"><?php echo @$this->stats_people->warga_negara_population('wna', TRUE); ?> %</td>
                        </tr>
                    </tbody>
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
    colors:['#4D9C56','#EEFF41'],
    title: {
        text: 'Populasi Penduduk Menurut Kewarganegaraan'
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
            {'name': 'WNA','y':<?php echo $this->stats_people->warga_negara_population('wna', TRUE); ?>},
            {'name': 'WNI','y':<?php echo $this->stats_people->warga_negara_population('wni', TRUE); ?>},
        ]
    }]
});
</script>