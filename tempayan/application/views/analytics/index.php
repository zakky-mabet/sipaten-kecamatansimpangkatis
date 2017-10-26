 <div class="row">
    <div class="col-md-12">
        <div class="box box-solid no-print">
            <div class="box-header with-border">
              	<h3 class="box-title">Cari Dokumen Surat</h3>
            </div>
            <form action="<?php echo current_url(); ?>" class="form-horizontal" method="get">
            <div class="box-body" style="padding-bottom: 20px;" id="blok-cari-surat">
                <div class="col-md-10 col-md-offset-1">
                    <div class="col-md-2">
                        <label class="control-label">Nomor Surat :</label>
                    </div>
                    <div class="col-md-6">
                        <div class="inner-addon left-addon">
                            <i class="fa fa-search"></i>
                            <input type="text" name="no" value="<?php echo $this->input->get('no') ?>" class="form-control" placeholder="Ex : 65/0002/19.04.01.2003/2017" />
                        </div>                    
                    </div>
                    <div class="col-md-3">
                        <a href="<?php echo current_url(); ?>" class="btn btn-warning hvr-shadow pull-right"><i class="fa fa-times"></i> Reset</a>
                        <button type="submit" class="btn btn-warning hvr-shadow pull-left"><i class="fa fa-search"></i> Cari</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
 </div>
<?php  
/**
 * Check Ketersediaam
 *
 **/
if($this->analytics->get()) :
?>
 <div class="row">
   <div class="col-md-5" id="timeline" style="padding-top: 10px; padding-bottom: 10px;">
          <ul class="timeline">
            <li style="padding-top: 30px;">
              <i class="fa fa-circle text-yellow"></i>
            </li>
            <li>
              <i class="fa fa-pencil bg-yellow"></i>
              <div class="timeline-item">
                <h3 class="timeline-header">Ditandatangani oleh <i><?php echo $get->nama; ?></i></h3>
              </div>
            </li>
            <?php 
                foreach($this->analytics->get_log() as $row) : 
                $logdate = new DateTime($row->tanggal);
            ?>
            <li class="time-label">
                  <span class="bg-yellow">  <?php echo $logdate->format('d M Y'); ?></span>
            </li>
            <li>
              <i class="fa fa-file-text bg-yellow"></i>
              <div class="timeline-item">
                <h3 class="timeline-header no-border">
                    <p><i><?php echo $get->name; ?></i> Menerima berkas persyaratan :
                        <ul>
                        <?php  
                            foreach($this->analytics->get_log_syarat($row->tanggal) as $syarat)
                                echo "<li>" . $syarat->nama_syarat . "</li>";
                        ?>
                        </ul>
                    </p>
                </h3>
              </div>
            </li>
            <?php  
            endforeach;
            ?>
            <li>
              <i class="fa fa-user bg-yellow"></i>
              <div class="timeline-item">
                <h3 class="timeline-header">Bertemu dengan petugas <i><?php echo $get->name; ?></i></h3>
              </div>
            </li>
            <li>
              <i class="fa fa-circle text-yellow"></i>
            </li>
          </ul>
    </div>
    <div class="col-md-7">
        <table class="table table-bordered blok-dokumen" id="sticker" style="background-color: white">
            <tbody>
                <tr>
                    <th width="160" class="bg-primary text-right">NIK Pemohon :</th>
                    <td><?php echo $get->nik; ?></td>
                </tr>
                <tr>
                    <th class="bg-primary text-right">Nama Pemohon :</th>
                    <td><?php echo $get->nama_lengkap; ?></td>
                </tr>
                <tr>
                    <th class="bg-primary text-right">Dokumen Surat :</th>
                    <td><?php echo $get->judul_surat; ?></td>
                </tr>
                <tr>
                    <th class="bg-primary text-right">Petugas Pemeriksa :</th>
                    <td><?php echo @$this->analytics->pegawai($get->pemeriksa)->nama;  ?></td>
                </tr>
                <tr>
                    <th class="bg-primary text-right">Penandatangan <br> Dokumen :</th>
                    <td><?php echo $get->nama; ?></td>
                <tr>
                    <th class="bg-primary text-right">Jenis Pelayanan :</th>
                    <td><?php echo strtoupper($get->jenis); ?></td>
                </tr>
                <tr>
                    <th class="bg-primary text-right">Durasi pelayanan :</th>
                    <td><?php echo $this->analytics->get_durasi(); ?></td>
                </tr>
                <tr>
                    <th class="bg-primary text-right">Petugas pelayanan :</th>
                    <td><?php echo $get->name; ?></td>
                </tr>
                <tr>
                    <th class="bg-primary text-right">Feedback :</th>
                    <td><strong><?php echo strtoupper($this->analytics->get_feedback()) ?></strong></td>
                </tr>
            </tbody>
        </table>
    </div>
 </div>
 <?php  
 endif;
 ?>