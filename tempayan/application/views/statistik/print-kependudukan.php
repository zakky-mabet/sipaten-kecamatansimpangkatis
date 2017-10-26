<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Call Header Print (KOP)
 *
 * @author Vicky Nitinegoro <pkpvicky@gmail.com>
 **/
$this->load->view('print/header');

?>
    <div class="content">
<?php
switch ($this->uri->segment(3)) :
    case 'desa':
?>
        <h5 class="upper text-center">Populasi penduduk desa</h5>
        <table class="table-bordered" style="width: 100%;">
            <tr>
                <th rowspan="2" width="30">No.</th>
                <th rowspan="2">Desa / Kelurahan</th>
                <th colspan="5">Jumlah</th>
            </tr>
            <tr>
                <th>Semua</th>
                <th colspan="2">Laki-laki</th>
                <th colspan="2">Perempuan</th>
            </tr>
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
                    <td class="text-center"><?php echo ++$key; ?>.</td>
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
                <tr>
                    <th colspan="2" class="text-right">Total : </th>
                    <th class="text-center"><?php echo $total; ?></th>
                    <th class="text-center"><?php echo $total_laki; ?></th>
                    <th class="text-center"><?php echo $total_laki_per; ?> %</th>
                    <th class="text-center"><?php echo $total_pr; ?></th>
                    <th class="text-center"><?php echo $total_pr_per; ?> %</th>
                </tr>
        </table>
<?php
    break;
case 'gender':
?>
        <h5 class="upper text-center">Populasi penduduk menurut jenis kelamin</h5>
        <table class="table-bordered" style="width: 100%;">
            <tr>
                <th width="30">No.</th>
                <th>Jenis Kelompok</th>
                <th colspan="2">Jumlah</th>
            </tr>
            <tr>
                <td class="text-center">1.</td>
                <td class="text-center">Laki-laki</td>
                <td class="text-center"><?php echo @$this->stats_people->gender_population('laki-laki'); ?> Orang</td>
                <td class="text-center"><?php echo @$this->stats_people->gender_population('laki-laki', TRUE); ?> %</td>
            </tr>
            <tr>
                <td class="text-center">2.</td>
                <td class="text-center">Perempuan</td>
                <td class="text-center"><?php echo @$this->stats_people->gender_population('perempuan'); ?> Orang</td>
                <td class="text-center"><?php echo @$this->stats_people->gender_population('perempuan', TRUE); ?> %</td>
            </tr>
            <tr>
                <th colspan="2" class="text-right">Total : </th>
                <th class="text-center"><?php echo ($this->stats_people->gender_population('perempuan')+$this->stats_people->gender_population('laki-laki')) ?> Orang</th>
                <th class="text-center"><?php echo @ceil($this->stats_people->gender_population('laki-laki', TRUE)+$this->stats_people->gender_population('perempuan', TRUE)) ?> %</th>
            </tr>
        </table>
<?php
    break;
case 'status-kawin':
?>
        <h5 class="upper text-center">Populasi penduduk menurut Status perkawinan</h5>
        <table class="table-bordered" style="width: 100%;">
            <tr>
                <th width="30">No.</th>
                <th>Jenis Kelompok</th>
                <th colspan="2">Jumlah</th>
            </tr>
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
                    <tr class="text-center">
                        <td><?php echo ++$key; ?>.</td>
                        <td class="text-center"><?php echo strtoupper($value->status_kawin); ?></td>
                        <td class="text-center"><?php echo $this->stats_people->status_kawin_population($value->status_kawin); ?> Orang</td>
                        <td class="text-center"><?php echo $this->stats_people->status_kawin_population($value->status_kawin, TRUE); ?> %</td>
                    </tr>
            <?php
            endforeach;
            ?>
            <tr>
                <th colspan="2" class="text-right">Total : </th>
                <th class="text-center"><?php echo $total; ?> Orang</th>
                <th class="text-center"> <?php echo ceil($total_per) ?>%</th>
            </tr>
        </table>
<?php
    break;
case 'agama':
?>
        <h5 class="upper text-center">Populasi penduduk menurut agama dan kepercayaan</h5>
        <table class="table-bordered" style="width: 100%;">
            <tr>
                <th width="30">No.</th>
                <th>Jenis Kelompok</th>
                <th colspan="2">Jumlah</th>
            </tr>
    <?php
    /**
     * Loop Status Perkawinan
     *
     **/
    $total = 0;

    $total_per = 0;
    foreach($agama as $key => $value) :

        $total += $this->stats_people->religion_population($value->agama);

        $total_per += $this->stats_people->religion_population($value->agama, TRUE);

    ?>
            <tr>
                <td class="text-center"><?php echo ++$key; ?>.</td>
                <td class="text-center"><?php echo strtoupper($value->agama); ?></td>
                <td class="text-center"><?php echo $this->stats_people->religion_population($value->agama); ?> Orang</td>
                <td class="text-center"><?php echo $this->stats_people->religion_population($value->agama, TRUE); ?> %</td>
            </tr>
            <tr>
    <?php
    endforeach;
    ?>
            <tr>
                <th colspan="2" class="text-right">Total : </th>
                <th class="text-center"><?php echo $total; ?> Orang</th>
                <th class="text-center"> <?php echo ceil($total_per) ?>%</th>
            </tr>
        </table>
<?php
    break;
case 'kewarganegaraan':
?>
        <h5 class="upper text-center">Populasi penduduk menurut kewarganegaraan</h5>
        <table class="table-bordered" style="width: 100%;">
            <tr>
                <th width="30">No.</th>
                <th>Jenis Kelompok</th>
                <th colspan="2">Jumlah</th>
            </tr>
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
        </table>
<?php
    break;
case 'gol-darah':
?>
        <h5 class="upper text-center">Populasi penduduk menurut Golongan darah</h5>
        <table class="table-bordered" style="width: 100%;">
            <tr>
                <th width="30">No.</th>
                <th>Jenis Kelompok</th>
                <th colspan="2">Jumlah</th>
            </tr>
        <?php
        /**
         * Loop Status Perkawinan
         *
         **/
        $total = 0;

        $total_per = 0;
        foreach($gol_darah as $key => $value) :

            $total += $this->stats_people->gol_darah_population($value->gol_darah);

            $total_per += $this->stats_people->gol_darah_population($value->gol_darah, TRUE);

        ?>
            <tr>
                <td class="text-center"><?php echo ++$key; ?>.</td>
                <td class="text-center"><?php echo strtoupper($value->gol_darah); ?></td>
                <td class="text-center"><?php echo $this->stats_people->gol_darah_population($value->gol_darah); ?> Orang</td>
                <td class="text-center"><?php echo $this->stats_people->gol_darah_population($value->gol_darah, TRUE); ?> %</td>
            </tr>
        <?php
        endforeach;
        ?>
            <tr>
                <th colspan="2" class="text-right">Total : </th>
                <th class="text-center"><?php echo $total; ?> Orang</th>
                <th class="text-center"> <?php echo ceil($total_per) ?>%</th>
            </tr>
        </table>
<?php break; ?>
    </div>
<?php
endswitch;

$this->load->view('print/footer');

/* End of file print-kependudukan.php */
/* Location: ./application/views/statistik/print-kependudukan.php */
