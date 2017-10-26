<div <?php echo ($this->agent->is_mobile()) ? 'class="container margin-container" style="padding-top:50px;"' : $browser ="style='padding-top:80px;' class='container'" ; ?>>
 <div class="col-md-10 col-md-offset-1">
 <div class="row">
	 <div class="box box-warning radius">
  <div class="box-header with-border ">
  <div class="row">
  	<section class="content-header">
     <h1>
        &nbsp;
      </h1>
      <p>
        <?php echo $this->session->flashdata('pesan'); ?>
      </p>
      <ol class="breadcrumb">
        <li class="white"><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Beranda</a></li>
         <li><a href="<?php echo base_url('epelayanan'); ?>">Epelayanan</a></li>
        <li class="active white"><?php echo $crumb ?></li>
      </ol>
 	</section>
  </div>
  </div>
  <div class="box-body">
    <div class="col-md-12">
      <div class="row">
            <h3 class="text-center"><b><?php echo $crumb; ?></b></h3>
            <br>
      <form action="<?php site_url() ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
      <?php 
        if (empty($edit)) {
            echo "<div class='alert alert-danger alert-dismissible animated fadein' role='alert'>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><i class='fa fa-icon'></i>Maaf, Data yang anda cari Belum Ada  !</div>
        ";  
        redirect('epelayanan/histori','refresh');
          } else {
            foreach ($edit as $value) {
             $d_surat   = json_decode($value->isi_surat);  
             $d_berkas  = json_decode($value->berkas_syarat);  
           ?>
    <div class="col-md-6 col-md-offset-3">
          <div class="box box-warning shadow">
            <div class="box-header with-border">
              <h3 class="box-title">Data Pemohon</h3>
            </div>
            <div class="form-horizontal">
              <div class="box-body ">
                <div class="form-group">
                  <label  class="col-sm-2 control-label font-title">NIK <span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <input type="nik" name="nik" value="<?php echo $value->nik;?>" class="form-control"  placeholder="NIK Pemohon">
                     <?php echo form_error('nik','<small class="text-red">','</small>'); ?>
                  </div>
                </div>
               
                <div class="form-group">
                  <label  class="col-sm-2 control-label font-title">Desa <span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <select name="desa" class="form-control">
                       <option <?php echo set_select('desa', $d_surat->desa,TRUE); ?> value="<?php echo $d_surat->desa ; ?>"><?php echo $d_surat->desa ; ?></option>
                      <?php foreach ($desa as $key => $value) { ?>
                           <option <?php echo set_select('desa', $value->nama_desa); ?> value="<?php echo $value->nama_desa ?>"><?php echo $value->nama_desa ?></option>
                      <?php } ?>
                    </select>
                    <?php echo form_error('desa','<small class="text-red">','</small>'); ?>
                  </div>
                </div>
            </div>
          </div>
      </div>
    </div>

  <div class="col-sm-12">
  <br>
      <p>
     Yang bertanda tangan di bawah ini Kepala Desa/Kelurahan : ... Koba Kab. Bangka Tengah, menerangkan dengan sebenarnya bahwa :

      </p>
  </div>
  <div class="col-sm-12 form-horizontal">
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Nama Lengkap <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $d_surat->nama_lengkap ;?>"  placeholder="Nama Lengkap">
              <?php echo form_error('nama_lengkap','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Tempat, Tanggal Lahir <span class="text-red">*</span></label>
            <div class="col-md-4">
            <input type="text" name="tmp_lahir" placeholder="Tempat Lahir" class="form-control" value="<?php echo $d_surat->tmp_lahir ?>">
            <?php echo form_error('tmp_lahir','<small class="text-red">','</small>'); ?>
          </div>
          <div class="col-md-4">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input type="text" class="form-control" name="tgl_lahir" id="datepicker" value="<?php echo $d_surat->tgl_lahir ?>" placeholder="Ex : 1985-12-23">
              </div>
            <?php echo form_error('tgl_lahir','<small class="text-red">','</small>'); ?>
          </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Jenis Kelamin <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="radio" name="jns_kelamin" value="Laki-laki" <?php if ($d_surat->jns_kelamin == 'Laki-laki') { echo "checked";} else {  echo "";  } ?> <?php echo set_radio('jns_kelamin','Laki-laki');?>  class="minimal form-control">&nbsp;&nbsp;  Laki-laki&nbsp;&nbsp;
              <input type="radio" name="jns_kelamin" value="Perempuan" <?php if ($d_surat->jns_kelamin == 'Perempuan') { echo "checked";} else {  echo "";  } ?> <?php echo set_radio('jns_kelamin','Perempuan');?> class="minimal form-control">&nbsp;&nbsp;  Perempuan <br>
                <?php echo form_error('jns_kelamin','<small class="text-red">','</small>'); ?>
            </div>
          </div>
        
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Alamat <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <textarea name="alamat"  placeholder="Contoh : Jln. Raya Koba No. 141 RT. 05 Kel. Koba Kecamatan Koba Kabupaten Bangka Tengah" class="form-control"><?php echo $d_surat->alamat ;?></textarea>
              <?php echo form_error('alamat','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">No Telepon/HP <span class="text-red">*</span></label>
            <div class="col-sm-4">
              <input type="number" name="no_hp" value="<?php echo $d_surat->no_hp ;?>" class="form-control" placeholder="No Telepon/HP">
              <?php echo form_error('no_hp','<small class="text-red">','</small>'); ?>
            </div>
          </div>
  </div>
  <div class="col-sm-12">
  <br>
      <p>
     Sedang / akan melakukan kegiatan Mendirikan Bangunan sebagai berikut : 
      </p>
      <br>
  </div>
  <div class="col-sm-12 form-horizontal">
          <div class="form-group">
           
            <label for="email" class="control-label col-md-2 col-xs-12 font-title">Nama Perusahaan : <strong class="text-red">*</strong></label>
            <div class="col-md-10">
              <input type="text" name="nama_perusahaan" class="form-control" placeholder="Nama Perusahaan" value="<?php echo $d_surat->nama_perusahaan ;?>">
               <?php echo form_error('nama_perusahaan','<small class="text-red">','</small>'); ?>
            </div>
          </div>

          <div class="form-group">
            <label  class="control-label col-md-2 col-xs-12 font-title">Alamat Perusahaan : <strong class="text-red">*</strong></label>
            <div class="col-md-10">
              <textarea class="form-control" placeholder="Contoh : Jln. Raya Koba No. 141 RT. 05 Kel. Koba Kecamatan Koba Kabupaten Bangka Tengah" name="alamat_perusahaan" rows="3"><?php echo $d_surat->alamat_perusahaan ;?></textarea>
              <?php echo form_error('alamat_perusahaan','<small class="text-red">','</small>'); ?>
            </div>
          </div>

          <div class="form-group">
            <label  class="control-label col-md-2 col-xs-12 font-title">Jenis Bangunan : <strong class="text-red">*</strong></label>
            <div class="col-md-10">
              <input type="text" name="jenis_bangunan" placeholder="Jenis Bangunan" class="form-control" value="<?php echo $d_surat->jenis_bangunan ;?>">
                <?php echo form_error('jenis_bangunan','<small class="text-red">','</small>'); ?>
            </div>
          </div>

          <div class="form-group">
            <label  class="control-label col-md-2 col-xs-12 font-title">Lokasi Bangunan : <strong class="text-red">*</strong></label>
            <div class="col-md-10">
              <textarea class="form-control" placeholder="Contoh : Jln. Raya Koba No. 141 RT. 05 Kel. Koba Kecamatan Koba Kabupaten Bangka Tengah" name="lokasi_bangunan" rows="3"><?php echo $d_surat->lokasi_bangunan ;?></textarea>
               <?php echo form_error('lokasi_bangunan','<small class="text-red">','</small>'); ?>
            </div>
          </div>

          <div class="form-group">
            <label  class="control-label col-md-2 col-xs-12 font-title">Luas Bangunan : <strong class="text-red">*</strong></label>
            <label class="control-label col-md-1">Lt. 1 <strong class="text-red">*</strong></label>
            <div class="col-md-6">
              <div class="input-group">
                  <input type="number" class="form-control"  name="lt_1_1" value="<?php echo $d_surat->lt_1_1 ?>">
                  <span class="input-group-addon">X</span>
                  <input type="number" class="form-control"  name="lt_1_2" value="<?php echo $d_surat->lt_1_2 ?>">
                  <span class="input-group-addon">=</span>
                  <input type="number" class="form-control"  name="total_1" value="<?php echo $d_surat->total_1 ;?>">
                <strong class="input-group-addon">M<sup>2</sup></strong>
              </div>
              <?php echo form_error('lt_1_1','<small class="text-red">','</small>').'<br>'; ?> 
              <?php echo form_error('lt_1_2','<small class="text-red">','</small>').'<br>'; ?>
              <?php echo form_error('total_1','<small class="text-red">','</small>'); ?>
           </div>
          </div>

          <div class="form-group">
            <label for="email" class="control-label col-md-2 col-xs-12"> </label>
            <label class="control-label col-md-1">Lt. 2 <strong class="text-primary">*</strong></label>
            <div class="col-md-6">
              <div class="input-group">
                  <input type="number" class="form-control" name="lt_2_1" value="<?php echo $d_surat->lt_2_1;?>">
                  <span class="input-group-addon">X</span>
                  <input type="number" class="form-control" name="lt_2_2" value="<?php echo $d_surat->lt_2_1;?>">
                  <span class="input-group-addon">=</span>
                <input type="number" class="form-control" name="total_2" value="<?php echo $d_surat->total_2;?>">
                <strong class="input-group-addon">M<sup>2</sup></strong>
              </div>
           </div>
          </div>

          <div class="form-group">
            <label  class="control-label col-md-2 col-xs-12"> </label>
            <label class="control-label col-md-1">Lt. 3 <strong class="text-primary">*</strong></label>
            <div class="col-md-6">
              <div class="input-group">
                  <input type="number" class="form-control" name="lt_3_1" value="<?php echo $d_surat->lt_3_1 ?>">
                  <span class="input-group-addon">X</span>
                  <input type="number" class="form-control" name="lt_3_2" value="<?php echo $d_surat->lt_3_2 ?>">
                  <span class="input-group-addon">=</span>
                <input type="number" class="form-control" name="total_3" value="<?php echo $d_surat->total_3 ?>">
                <strong class="input-group-addon">M<sup>2</sup></strong>
              </div>
           </div>
          </div>

          <div class="form-group">
            <label  class="control-label col-md-2 col-xs-12 font-title">GSB <small>(Garis Sempadan Bangunan)</small> : <strong class="text-red">*</strong></label>
            <div class="col-md-10">
              <input type="text" name="gsb" placeholder="Garis Sempadan Bangunan" class="form-control" value="<?php echo $d_surat->gsb ;?>"> 
               <?php echo form_error('gsb','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label"></label>
            <div class="col-sm-10 ">
            <hr>
            Bagi mereka yang tempat usahanya bukan milik sendiri
              <hr>
            </div>
        </div>
        <div class="form-group">
     
            <label for="email" class="control-label col-md-2 col-xs-12 font-title">Nama Pemilik Tanah : <strong class="text-primary">*</strong></label>
            <div class="col-md-10">
              <input type="text" name="nama_pemilik_tanah" placeholder="Nama Pemilik Tanah " class="form-control" value="<?php echo $d_surat->nama_pemilik_tanah ;?>">
  
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="control-label col-md-2 col-xs-12 font-title">Alamat Pemilik Tanah : <strong class="text-primary">*</strong></label>
            <div class="col-md-10">
              <textarea name="alamat_pemilik_tanah" placeholder="Contoh : Jln. Raya Koba No. 141 RT. 05 Kel. Koba Kecamatan Koba Kabupaten Bangka Tengah" rows="3" class="form-control"><?php echo $d_surat->alamat_pemilik_tanah ?></textarea>
           
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="control-label col-md-2 col-xs-12 font-title">Jangka Waktu  <strong class="text-primary">*</strong></label>
            <div class="col-md-3">
              <div class="input-group">
                  <input type="number" class="form-control" placeholder="Jangka Waktu" name="jangka_waktu" value="<?php echo $d_surat->jangka_waktu;?>">
                  <span class="input-group-addon">Tahun</span>
              </div>
            
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-2">
                    <div class="input-group registration-date-time">
                      <input class="form-control input-sm" name="mulai_tanggal" value="<?php echo $d_surat->mulai_tanggal;?>" id="datepicker1" placeholder="Mulai Tanggal ..">
                      <span class="input-group-addon"><span class="fa fa-calendar" aria-hidden="true"></span></span>
                      <input class="form-control input-sm" name="sampai_tanggal" value="<?php echo $d_surat->sampai_tanggal;?>" id="datepicker3" placeholder="Sampai Tanggal ..">
                    </div>  
              <p class="help-block"></p>
              <p class="help-block"></p>
            </div>
          </div>
  </div>
  <div class="col-sm-12">
      <table class="table bg-warning table-bordered font-title">
      <h4 class="text-orange">Persyaratan Pembuatan <?php echo $syarat ?> :</h4>
        <thead >
          <tr >
            <th class="text-center">#</th>
            <th>Persyaratan</th>
            <th class="text-center">Upload File</th>
          </tr>
        </thead>
        <tbody >
          <tr>
            <td class="text-center">1</td>
            <td>Fotocopy KTP Pemohon</td>
            <td>
              <input name="imb_1" type="file" class="form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">2</td>
            <td>Pas Photo Berwarna 4x6</td>
            <td>
              <input type="file" name="imb_2" class= "form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">3</td>
            <td>Fotocopy Akta pendirian perusahaan</td>
            <td class="text-center">
              <input type="file" name="imb_3" class="form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">4</td>
            <td>Fotocopy NPWP Perusahaan</td>
            <td class="text-center">
              <input type="file" name="imb_4" class="form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">5</td>
            <td>Fotocopy Bukti Lunas PBB Tahun Berakhir</td>
            <td class="text-center">
              <input type="file" name="imb_5" class="form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">6</td>
            <td>Surat Pernyataan Persetujuan Tetangga (minimal 2 tetangga) Diketahui Kades/Lurah dan Camat beserta Fotocopy KTP</td>
            <td class="text-center">
              <input type="file" name="imb_6" class="form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">7</td>
            <td>Fotocopy surat Perjanjian Sewa Menyewa lahan/bangunan <small>(jika bukan tempat sendiri)</small> </td>
            <td class="text-center">
              <input type="file" name="imb_7" class="form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">8</td>
            <td>Fotocopy Sertifikat Tanah atau Surat bukti kepemilikan tanah sampai camat</td>
            <td class="text-center">
              <input type="file" name="imb_8" class="form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">9</td>
            <td>Surat pernyataan tidak keberatan dari pemilik tanah <small>(apabila nama pemilik tanah berbeda dengan pemohon)</small> </td>
            <td class="text-center">
              <input type="file" name="imb_9" class="form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">10</td>
            <td>Surat Rekomendasi Kades / Lurah</td>
            <td class="text-center">
              <input type="file" name="imb_10" class="form-control" />
            </td>
          </tr>
           <tr>
            <td colspan="3">
            <span><i class="fa text-danger fa-info-circle"></i> File harus berformat pdf atau jpg maximal 1 <b>Mb</b></span>
            </td>
          </tr>
        </tbody>  
      </table>
  </div>
  
  </div><!--  akhir row -->
    </div>
      </div>

  <div class="box-footer with-border">
        <div class="col-md-4 col-xs-5">
          <a href="<?php echo base_url('epelayanan'); ?>" class="btn btn-app bg-orange pull-right">
            <i class="ion ion-reply"></i> Kembali
          </a>
        </div>
        <div class="col-md-6 col-xs-6">
          <button type="submit" class="btn btn-app bg-orange pull-right">
            <i class="fa fa-save"></i> Ajukan Permohonan
          </button>
        </div>
      </div>
  </form>    
  <div class="box-footer radius">
    <div class="pull-left">
   <small><strong class="text-red">*</strong>  Field wajib diisi !</small> <br>
    <small><strong class="text-blue">*</strong> Field Optional !</small>
    </div>
  </div>
</div>
<?php }} ?>
</div>
</div>
</div>
