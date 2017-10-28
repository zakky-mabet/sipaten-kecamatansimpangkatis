 <div class="row">
    <div class="col-md-12">
        <div class="box box-solid no-print">
            <div class="box-header with-border">
              	<h3 class="box-title">Pencarian Pengajuan Online</h3>
            </div>
            <form action="<?php echo current_url(); ?>" class="form-horizontal" method="get">
            <div class="box-body" style="padding-bottom: 20px;">
                <div class="col-md-10 col-md-offset-1">
                    <div class="col-md-2">
                        <label class="control-label">Nomor Pengajuan :</label>
                    </div>
                    <div class="col-md-6">
                        <div class="inner-addon left-addon">
                            <i class="fa fa-search"></i>
                            <input type="text" name="ID" value="<?php echo $this->input->get('ID') ?>" class="form-control" placeholder="Ex : PL-0105-03-2017" />
                        </div>                    
                    </div>
                    <div class="col-md-3">
                        <a href="<?php echo current_url(); ?>" class="btn btn-success hvr-shadow pull-right"><i class="fa fa-times"></i> Reset</a>
                        <button type="submit" name="search" value="true" class="btn btn-success hvr-shadow pull-left"><i class="fa fa-search"></i> Cari</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
 </div>
<?php  
/**
 * Jika Tombol Cari ter submit 
 *
 * @var string
 **/
if( $this->mode_searching  AND @$get->penduduk != NULL) :

    $mulai = new DateTime($get->waktu->mulai);

    $selesai = new DateTime($get->waktu->selesai);
?>
<div class="row">
    <div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body">
                <div class="col-md-2 text-center">
                    <img src="<?php echo base_url("public/image/avatar.jpg"); ?>" alt="Gambar Pemohon" width="120">
                </div>
                <div class="col-md-4">
                    <table>
                        <tr>
                            <th>NIK </th><th width="30" class="text-center">:</th>
                            <td><?php echo $get->penduduk->nik; ?></td>
                        </tr>
                        <tr>
                            <th>Nama Lengkap </th><th width="30" class="text-center">:</th>
                            <td><?php echo ucfirst($get->penduduk->nama_lengkap); ?></td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin </th><th width="30" class="text-center">:</th>
                            <td><?php echo ucfirst($get->penduduk->jns_kelamin); ?></td>
                        </tr>
                        <tr style="vertical-align: top;">
                            <th>Alamat </th><th width="30" class="text-center">:</th>
                            <td><?php echo $get->penduduk->alamat; ?></td>
                        </tr>
                        <tr>
                            <th>Agama </th><th width="30" class="text-center">:</th>
                            <td><?php echo ucfirst($get->penduduk->agama); ?></td>
                        </tr>
                        <tr>
                            <th>Pekerjaan </th><th width="30" class="text-center">:</th>
                            <td><?php echo ucfirst($get->penduduk->pekerjaan); ?></td>
                        </tr>
                        <tr>
                            <th>Kewarganegaraan </th><th width="30" class="text-center">:</th>
                            <td><?php echo strtoupper($get->penduduk->kewarganegaraan); ?></td>
                        </tr>
                    </table>        
                </div>
                <div class="col-md-6">
                    <table>
                        <tr>
                            <th>Nomor Pengajuan </th><th width="30" class="text-center">:</th>
                            <td><?php echo $get->ID_pelayanan; ?></td>
                        </tr>
                        <tr style="vertical-align: top;">
                            <th>Dokumen Pelayanan </th><th width="30" class="text-center">:</th>
                            <td><?php echo $get->dokumen; ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal </th><th width="30" class="text-center">:</th>
                            <td><?php echo hari_ini($mulai->format('D')).", ".date_id(substr($get->waktu->mulai, 0, 10)) ?> <i><?php echo $mulai->format(' H:s A') ?></i></td>
                        </tr>
                        <?php  
                        /**
                         * Jika Selesai Baru bisa dicetak
                         *
                         * @var string
                         **/
                        if( $get->waktu->selesai != FALSE ) :
                        ?>
                        <tr>
                            <th>Tanggal Diproses </th><th width="30" class="text-center">:</th>
                            <td><?php echo @hari_ini($selesai->format('D')).", ".@date_id(substr($get->waktu->selesai, 0, 10)) ?> <i><?php echo $selesai->format(' H:s A') ?></i></td>
                        </tr>
                        <?php  
                        endif;
                        ?>
                    </table>        
                </div>
                <div class="col-md-3 pull-right" style="padding-top: 20px;">
                <?php  
                /**
                 * Jika Selesai Baru bisa dicetak
                 *
                 * @var string
                 **/
                if( $get->waktu->selesai == FALSE ) :
                ?>
                    <button class="btn btn-app" data-toggle="modal" data-target="#modal-terima-surat"><i class="fa fa-check-square-o"></i> Terima</button>
                <?php  
                endif;
                ?>
                </div>
            </div>
            <div class="box-body"> <hr>
                <div class="col-md-7">
                    <h4 class="heading-box-sonline"><i class="fa fa-pencil-square-o"></i> Isian Dokumen Surat</h4>
                    <?php 
                    /**
                     * Get Dynamic Tabel isian surat
                     *
                     * @return Html view
                     **/
                    $this->load->view("surat-online/tabel-isi/{$get->slug}.php", $this->data); 
                    ?>
                </div>
                <div class="col-md-5">
                    <div id="sticker">
                    <h4 class="heading-box-sonline"><i class="fa fa-paperclip"></i> Lampiran Berkas</h4>
                    <ul class="list-berkas">
                    <?php foreach($get->berkas as $key => $value) : ?>
                        <li><?php echo $this->rest_api->view_file( $value ) ?>  </li>
                    <?php endforeach; ?>
                    </ul>
                    <h4 class="heading-box-sonline"><i class="ion ion-ios-pricetags-outline" style="font-size: 17px;"></i> Syarat Penerbitan Surat</h4>
                    <ol>
                        <?php foreach( $get->syarat as $row ) echo '<li>' . $row->nama_syarat . '</li>'; ?>
                    </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php  else : 
    if( $this->input->get('search') == 'true') :
?>
<div class="col-md-6 col-md-offset-3">
    <div class="alert alert-warning animated shake">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong><i class="fa fa-warning"></i> Maaf!</strong> Data yang anda cari tidak ditemukan.
    </div>
</div>
<?php endif; 
endif;
/* End Get Data */  ?>


<div class="modal animated fadeIn modal-default" id="modal-terima-surat" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo site_url("surat_online/create?ID={$this->ID}") ?>" method="post">
            <div class="modal-header bg-yellow">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-question-circle"></i> Terima?</h4>
                <span>Pilih petugas verifikasi dan pejabat penandatangan untuk menerima pengajuan dokumen ini dan diverifikasi.</span>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label for="pemeriksa" class="control-label col-md-3 col-xs-12">Petugas Verifikasi : <strong class="text-red">*</strong></label>
                        <div class="col-md-9">
                            <select name="pemeriksa" class="form-control" required="true">
                                <option value="">- PILIH -</option>
                    <?php  
                    /* Loop Data Pegawai */
                    foreach($pemeriksa as $row) :
                    ?>
                                <option value="<?php echo $row->ID; ?>"><?php echo $row->nama; ?></option>
                    <?php  
                    endforeach;
                    ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="control-label col-md-3 col-xs-12">Tanda Tangan : <strong class="text-red">*</strong></label>
                        <div class="col-md-9">
                            <select name="pegawai" class="form-control" required="true">
                                <option value="">- PILIH -</option>
                    <?php  
                    /* Loop Data Pegawai */
                    foreach($pegawai as $row) :
                    ?>
                                <option value="<?php echo $row->ID; ?>"><?php echo $row->nama; ?> (<?php echo $row->jabatan; ?>)</option>
                    <?php  
                    endforeach;
                    ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning hvr-shadow pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                <button type="submit" class="btn btn-warning hvr-shadow"><i class="fa fa-save"></i> Simpan & Terima</button>
            </div>
            </form>
        </div>
    </div>
</div>