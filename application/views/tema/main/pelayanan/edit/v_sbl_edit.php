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
      <form action="<?php site_url('') ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
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
    <div class="col-md-8 col-md-offset-2">
          <div class="box box-warning shadow">
            <div class="box-header with-border">
              <h3 class="box-title">Data Pemohon</h3>
            </div>
            <div class="form-horizontal">
              <div class="box-body ">
                <p>
                  Berdasarkan Surat Keterangan dari :
                </p>
                <div class="form-group"> 
                  <label  class="col-sm-2 control-label font-title">Lurah <span class="text-red">*</span></label>
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
                <div class="form-group">
                  <label  class="col-sm-2 control-label font-title">Nomor Surat <span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <input type="text" name="nomor_surat" value="<?php echo $d_surat->nomor_surat ?>" class="form-control"  placeholder="Nomor Surat Keterangan">
                     <?php echo form_error('nomor_surat','<small class="text-red">','</small>'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-2 control-label font-title">Tanggal Surat <span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <input type="text" name="tanggal_surat" class="form-control" value="<?php echo $d_surat->tanggal_surat ?>" id="datepicker1"  placeholder="Tanggal Surat">
                    <?php echo form_error('tanggal_surat','<small class="text-red">','</small>'); ?>
                  </div>
                </div>
            </div>
          </div>
      </div>
    </div>

  <div class="col-sm-12">
  <br>
      <p>
      Yang bertanda tangan dibawah ini Lurah ... Kecamatan Koba Kabupaten Bangka Tengah dengan ini menerangkan :
      </p>
      <p>
        Tersebut pada butir 1 dan 2 diatas adalah benar Ayah dan Ibu dari nama tersebut ini :
      </p>
     <br> 
  </div>
  <div class="col-sm-12 form-horizontal">
          <?php 
            foreach ($edit as $value) {
            }
           ?>

          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">NIK <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="nik" class="form-control" value="<?php echo $value->nik ?>"  placeholder="NIK">
              <?php echo form_error('nik','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Nama Lengkap <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $d_surat->nama_lengkap ?>"  placeholder="Nama Lengkap">
              <?php echo form_error('nama_lengkap','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Tempat Lahir <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="tmp_lahir" class="form-control" value="<?php echo $d_surat->tmp_lahir ?>"  placeholder="Tempat Lahir">
              <?php echo form_error('tmp_lahir','<small class="text-red">','</small>'); ?>
            </div>
          </div>
         
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Tanggal Lahir <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="tgl_lahir" class="form-control" value="<?php echo $d_surat->tgl_lahir;?>" id="datepicker"  placeholder="Tanggal Lahir">
              <?php echo form_error('tgl_lahir','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Jenis Kelamin <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="radio" name="jns_kelamin" value="Laki-laki" <?php if ($d_surat->jns_kelamin == 'Laki-laki') { echo "checked";} else {  echo "";  } ?>
               <?php echo set_radio('jns_kelamin','Laki-laki');?>  class="minimal form-control">&nbsp;&nbsp;  Laki-laki&nbsp;&nbsp;
              <input type="radio" name="jns_kelamin" value="Perempuan" <?php if ($d_surat->jns_kelamin == 'Perempuan') { echo "checked";} else {  echo "";  } ?>
               <?php echo set_radio('jns_kelamin','Perempuan');?> class="minimal form-control">&nbsp;&nbsp;  Perempuan <br>
                <?php echo form_error('jns_kelamin','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Kewarganegaraan <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="radio" name="kewarganegaraan" value="WNI" <?php if ($d_surat->kewarganegaraan == 'WNI') { echo "checked";} else {  echo "";  } ?> <?php echo set_radio('kewarganegaraan','WNI');?>  class="minimal form-control">&nbsp;&nbsp;  WNI&nbsp;&nbsp;
              <input type="radio" name="kewarganegaraan" value="WNA" <?php if ($d_surat->kewarganegaraan == 'WNA') { echo "checked";} else {  echo "";  } ?> <?php echo set_radio('kewarganegaraan','WNA');?> class="minimal form-control">&nbsp;&nbsp;  WNA <br>
                <?php echo form_error('kewarganegaraan','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Pekerjaan <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="pekerjaan" class="form-control" value="<?php echo $d_surat->pekerjaan;?>" placeholder="Pekerjaan">
              <?php echo form_error('pekerjaan','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Alamat <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <textarea name="alamat"  placeholder="Contoh : Jln. Raya Koba No. 141 RT. 05 Kel. Koba Kecamatan Koba Kabupaten Bangka Tengah" class="form-control"><?php echo $d_surat->alamat;?></textarea>
              <?php echo form_error('alamat','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Keperluan <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="keperluan" value="<?php echo $d_surat->keperluan;?>" class="form-control" id="need" onkeyup="myneed()" placeholder="Contoh : Mendapatkan Pelayanan Berobat Gratis/Untuk Mendapatkan Beasiswa Sekolah">
              <?php echo form_error('keperluan','<small class="text-red">','</small>'); ?>
            </div>
          </div>
  </div>
  <div class="col-sm-12">
  <br>
      <p>
      Selanjutnya diterangkan bahwa nama tersebut pada butir 1 dan 2 diatas tidak ada terdaftar
      G.30S/PKI ataupun Gerakan­gerakan Ekstrim lainnya yang bertentangan dengan
      PANCASILA.
      </p>
      <p>
     Demikian Surat Keterangan Bersih Lingkungan Keluarga ini Kami buat dengan sebenarnya
    untuk melengkapi pemberkasan penerimaan <span class="text-orange" id="needed"></span>

      </p>
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
            <td>Surat Pengantar dari Desa/Kelurahan</td>
            <td>
              <input name="sbl_1" type="file" class="form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">2</td>
            <td>Fotocopy KTP Pemohon</td>
            <td>
              <input type="file" name="sbl_2" class= "form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">3</td>
            <td>Pas Photo Berwarna 4x6</td>
            <td class="text-center">
              <input type="file" name="sbl_3" class="form-control" />
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
