<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Get Answer 
 *
 * @var string
 **/
$jumlah_responden = 0;
$jumlah_konversi = 0;
$perbandingan = 0;
$nilai_tingkat_kepuasan = 0;

foreach($this->penilaian->jawaban() as $key => $value) 
{
    $jumlah_responden += $value['jumlah'];
    $jumlah_konversi += $value['konversi'];
}

if( $jumlah_responden != 0) 
{
    $perbandingan = round(($jumlah_konversi / count($this->penilaian->get_answers())), 2);
    $nilai_tingkat_kepuasan = round((($perbandingan/$jumlah_responden) * 100), 2);
}

?>
<div class="row">
   <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Indeks Kepuasan Masyarakat</h3>
            </div>
            <div class="box-body">  
                <form action="" method="get">
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label">Bulan :</label>
                        <select name="month" class="form-control input-sm">
                            <option value="">-- PILIH --</option>
                        <?php  
                        /**
                         * Loop month
                         *
                         * @var Integer
                         **/
                        for($month = 1; $month <= 12; $month++) :
                        ?>
                            <option value="<?php echo $month; ?>" <?php if($month==$this->input->get('month')) echo "selected"; ?>><?php echo bulan($month); ?></option>
                        <?php  
                        endfor;
                        ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Triwulan :</label>
                        <select name="triwulan" class="form-control input-sm">
                            <option value="">-- PILIH --</option>
                        <?php  
                        /**
                         * Loop month
                         *
                         * @var Integer
                         * @return 1, 2, 3 | 4, 5, 6 | 7, 8, 9 | 10, 11, 12
                         **/
                        for($triwulan = 1; $triwulan <= 4; $triwulan++) :
                        ?>
                            <option value="<?php echo romawi($triwulan); ?>" <?php if(romawi($triwulan)==$this->input->get('triwulan')) echo "selected"; ?>>
                               Triwulan  <?php echo romawi($triwulan); ?>    
                            </option>
                        <?php  
                        endfor;
                        ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label">Tahun :</label>
                        <select name="year" class="form-control input-sm" required>
                            <option value="<?php echo date('Y') ?>">-- PILIH --</option>
                        <?php  
                        /**
                         * Loop Year start at develepment
                         *
                         * @var Integer
                         **/
                        for($year = 2017; $year <= date('Y-m-d', strtotime('+2 years')); $year++) :
                        ?>
                            <option value="<?php echo $year; ?>" <?php if($year==$this->input->get('year')) echo "selected"; ?>><?php echo $year; ?></option>
                        <?php  
                        endfor;
                        ?>
                        </select>
                    </div>
                </div>
                <div class="co-md-3">
                    <button type="submit" class="btn btn-warning hvr-shadow top"><i class="fa fa-filter"></i> Filter Periode</button>
                    <a href="<?php echo current_url(); ?>" class="btn btn-warning hvr-shadow top"><i class="fa fa-times"></i> Reset</a>
                </div>
                </form>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tr class="bg-silver">
                        <th colspan="11">Kuisoner : <?php echo $this->option->get('pertanyaan_penilaian'); ?></th>
                    </tr>
                    <tr class="bg-silver">
                        <th class="text-center" rowspan="2" width="160" style="vertical-align: middle;">Periode Waktu</th>
                        <th class="text-center" width="1000" colspan="<?php echo count($this->penilaian->get_answers()) ?>">Penilaian Responden</th>
                        <th class="text-center bg-silver" rowspan="2" colspan="5" style="vertical-align: middle;">Jumlah Responden</th>
                    </tr>
                    <tr class="bg-silver">
                        <?php  
                        /**
                         * Get Answer 
                         *
                         * @var string
                         **/
                        foreach($this->penilaian->get_answers() as $key => $value) :
                        ?>
                        <th class="text-center"><?php echo $value->jawaban ?></th>
                        <?php  
                        endforeach;
                        ?>
                    </tr>
                    <tr class="border-indeks">
                        <td class="text-center">
                            <?php 
                            if( $this->input->get('month') == TRUE)
                                if($this->input->get('year') == TRUE)
                                    echo bulan($this->input->get('month'))."-".$this->input->get('year');
                                else
                                    echo bulan($this->input->get('month'))."-".date('Y');
                            elseif( $this->input->get('triwulan') == TRUE ) 
                                echo "Triwulan {$this->input->get('triwulan')}"; 
                            else 
                                echo date('Y');
                            ?>
                        </td>
                        <?php  
                        /**
                         * Get Answer 
                         *
                         * @var string
                         **/
                        $pjumlah = 0;
                        foreach($this->penilaian->jawaban() as $key => $value) :
                            if($jumlah_responden != 0)
                                $pjumlah = round( (($value['jumlah'] / $jumlah_responden)*100), 2);
                        ?>
                        <td class="text-center content-indeks">
                            <?php echo $value['jumlah'] ?>
                            <div class="progress">
                                <div class="progress-bar progress-bar-info" 
                                style="width: <?php echo $pjumlah ?>%; background-color: <?php echo $value['warna'] ?>; <?php if($pjumlah <= 15) echo 'color:gray;'; ?>">
                                    <?php echo $pjumlah ?>% 
                                </div>
                            </div>
                        </td>
                        <?php 
                        endforeach;
                        ?>
                        <td class="text-center" colspan="5"><?php echo $jumlah_responden ?></td>
                    </tr>
                    <tr class="bg-silver">
                        <th class="text-center" rowspan="2" style="vertical-align: middle;" width="130">Periode Waktu</th>
                        <th class="text-center"  colspan="<?php echo count($this->penilaian->get_answers())?>">Konversi</th>
                        <th class="text-center" rowspan="2" style="vertical-align: middle;">Jumlah Konversi</th>
                        <th class="text-center" rowspan="2" style="vertical-align: middle;">Perbandingan</th>
                        <th class="text-center bg-green" rowspan="2" style="vertical-align: middle;">Nilai Tingkat Kepuasan Masyarakat</th>
                        <th class="text-center" rowspan="2" style="vertical-align: middle;">Mutu Pelayanan</th>
                        <th class="text-center" rowspan="2" style="vertical-align: middle;">Kategori Penilaian</th>
                    </tr>
                    <tr class="bg-silver">
                        <?php  
                        /**
                         * Get Answer 
                         *
                         * @var string
                         **/
                        foreach($this->penilaian->get_answers() as $key => $value) :
                        ?>
                        <th class="text-center content-indeks">
                            <?php echo $value->jawaban ?>    
                        </th>
                        <?php  
                        endforeach;
                        ?>
                    </tr>
                    <tr class="border-indeks">
                        <td class="text-center">
                            <?php 
                            if( $this->input->get('month') == TRUE)
                                if($this->input->get('year') == TRUE)
                                    echo bulan($this->input->get('month'))."-".$this->input->get('year');
                                else
                                    echo bulan($this->input->get('month'))."-".date('Y');
                            elseif( $this->input->get('triwulan') == TRUE ) 
                                echo "Triwulan {$this->input->get('triwulan')}"; 
                            else 
                                echo date('Y');
                            ?>
                        </td>
                        <?php  
                        /**
                         * Get Konversi 
                         *
                         * @var string
                         **/
                        $pkonversi = 0;
                        foreach($this->penilaian->jawaban() as $key => $value) :
                            if($jumlah_konversi != FALSE)
                                $pkonversi = round( (($value['konversi'] / $jumlah_konversi)*100), 2);
                        ?>
                        <td class="text-center content-indeks" width="110">
                            <?php echo $value['konversi'] ?>
                            <div class="progress">
                                <div class="progress-bar progress-bar-info" 
                                style="width: <?php echo $pkonversi ?>%; background-color: <?php echo $value['warna'] ?>; <?php if($pkonversi <= 15) echo 'color:gray;'; ?>">
                                    <?php echo $pkonversi ?>% 
                                </div>
                            </div>
                        </td>
                        <?php  
                        endforeach;
                        ?>
                        <td class="text-center"><?php echo $jumlah_konversi ?></td>
                        <td class="text-center"><?php echo $perbandingan ?></td>
                        <td class="text-center"><?php echo $nilai_tingkat_kepuasan; ?></td>
                        <td class="text-center"><?php echo $this->penilaian->get_mutu_kepuasan($nilai_tingkat_kepuasan, 'mutu'); ?></td>
                        <td class="text-center"><?php echo $this->penilaian->get_mutu_kepuasan($nilai_tingkat_kepuasan); ?></td>
                    </tr>
                </table>
                <h5>Ket :</h5>
                <table class="table table-bordered" style="width: 400px;">
                    <tr class="bg-silver">
                        <th>Mutu Pelayanan</th>
                        <th>Rentan Nilai</th>
                        <th>Kategori Penilaian</th>
                    </tr>
                    <tbody>
                        <?php  
                        /**
                         * Get Indeks Kepuasan 
                         *
                         * @var string
                         **/
                        foreach($this->penilaian->get_indeks_kepuasan() as $key => $value) :
                        ?>
                         <tr>
                            <td class="text-center"><strong><?php echo $value->grade; ?></strong></td>
                            <td><?php echo $value->range; ?></td>
                            <td class="size"><?php echo $value->description; ?></td>
                         </tr>
                         <?php  
                         endforeach;
                         ?>
                     </tbody> 
                </table>
            </div>
        </div>
    </div>
</div>
<style>

</style>
<?php

/* End of file indeks-kepuasan.php */
/* Location: ./application/views/surat-stats/indeks-kepuasan.php */