<div <?php echo ($this->agent->is_mobile()) ? 'class="container margin-container" style="padding-top:50px;"' : $browser ="style='padding-top:80px;' class='container'" ; ?>>
 <div class="col-md-10 col-md-offset-1">
   <div class="box box-success radius" >
  <div class="box-header with-border"  >
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
  <div class="box-body" >
    <div class="col-md-12">
      <div class="row">
            <h3 class="text-center"><b><?php echo $crumb; ?></b></h3>
            <br>
      <form action="<?php current_url() ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
  
  <div class="col-sm-12">
  DASAR :
      <p>
          <ol>
            <li>Peraturan Periseden No. 98 Tahub 2014 tentang Perizinan Untuk Usaha Mikro dan Kecil</li>
            <li> Peraturan Mentri Dalam Negri No. 83 Tahun 2014 tentang Pedoman Pemberian Izin Usaha Mikro dan Kecil</li>
            <li>Peraturan Bupati Bangka Nomor 38 Tahun 2015 tentang Perubahan atas Peraturan Bupati Nomor 29 Tahun 2012 tentang Pelimpahan Sebagian Kewenangan Bupati Kepada Camat.
            </li> 
          </ol>
      </p>
      <p>Menyatakan dan Memberikan Izin Kepada : <br>&nbsp;</p>
  </div>
  <div class="col-sm-12 form-horizontal">
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

          <div class="form-group">
            <label  class="col-sm-2 control-label"><small>Nama Lengkap <span class="text-red">*</span></small> </label>
            <div class="col-sm-10">
              <input type="text" name="nama_lengkap" id="need" onkeyup="myneed()"  class="form-control" value="<?php echo $d_surat->nama_lengkap ?>"  placeholder="Nama Lengkap">
              <?php echo form_error('nama_lengkap','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label"><small>NIK <span class="text-red">*</span></small></label>
            <div class="col-sm-10">
              <input type="number" name="nik"   class="form-control" value="<?php echo $value->nik; ?>"  placeholder="NIK">
              <?php echo form_error('nik','<small class="text-red">','</small>'); ?>
            </div>
          </div>
      
           <div class="form-group">
            <label  class="col-sm-2 control-label"><small>Alamat <span class="text-red">*</span></small></label>
            <div class="col-sm-10">
              <textarea name="alamat"  placeholder="Contoh : Jln. Raya Simpangkatis No. 141 RT. 05 Kel. Simpangkatis Kecamatan Simpangkatis Kabupaten Bangka Tengah" class="form-control"><?php echo $d_surat->alamat ?></textarea>
              <?php echo form_error('alamat','<small class="text-red">','</small>'); ?>
            </div>
          </div>
           <div class="form-group">
            <label  class="col-sm-2 control-label"><small>No Telepon / HP <span class="text-red">*</span></small></label>
            <div class="col-sm-10"> 
              <input type="number" name="no_hp" class="form-control" value="<?php echo $d_surat->no_hp; ?>"  placeholder="No Telepon / HP ">
              <?php echo form_error('no_hp','<small class="text-red">','</small>'); ?>
            </div>
          </div>
                
  </div>
  <div class="col-sm-12">
  <br>
      <p class="text-center">
     Untuk mendirikan Usaha Mikro Kecil yang mencakup perizinan dasar berupa : <br>
Menempati Lokasi / Domisili, melakukan kegiatan usaha baik produksi maupun penjualan barang dan
jasa, dengan identitas :

      </p>
 
  </div>

   <div class="col-sm-12 form-horizontal">
   <br>
          <div class="form-group">
            <label  class="col-sm-2 control-label"><small>Nama Perusahaan <span class="text-red">*</span></small></label>
            <div class="col-sm-10">
              <input type="text" name="nama_perusahaan"   class="form-control" value="<?php echo $d_surat->nama_perusahaan; ?>"  placeholder="Nama Perusahaan">
              <?php echo form_error('nama_perusahaan','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label"><small>Bentuk Perusahaan <span class="text-red">*</span></small></label>
            <div class="col-sm-10">
              <input type="text" name="bentuk_perusahaan"   class="form-control" value="<?php echo $d_surat->bentuk_perusahaan;?>"  placeholder="Bentuk Perusahaan">
              <?php echo form_error('bentuk_perusahaan','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label"><small>NPWP Perusahaan <span class="text-red">*</span></small></label>
            <div class="col-sm-10">
              <input type="text" name="npwp_perusahaan"  class="form-control" value="<?php echo $d_surat->npwp_perusahaan;?>"  placeholder="NPWP Perusahaan ">
              <?php echo form_error('npwp_perusahaan','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label"><small>Kegiatan Usaha <span class="text-red">*</span></small></label>
            <div class="col-sm-10">
              <input type="text" name="kegiatan_usaha"  class="form-control" value="<?php echo $d_surat->kegiatan_usaha;?>"  placeholder="Kegiatan Usaha ">
              <?php echo form_error('kegiatan_usaha','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label"><small>Sarana Usaha <span class="text-red">*</span></small></label>
            <div class="col-sm-10">
              <input type="text" name="sarana_usaha"   class="form-control" value="<?php echo $d_surat->sarana_usaha;?>"  placeholder="Sarana Usaha ">
              <?php echo form_error('sarana_usaha','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label"><small>Alamat Usaha <span class="text-red">*</span></small></label>
            <div class="col-sm-10">
              <textarea name="alamat_usaha"   placeholder="Contoh : Jln. Raya Simpangkatis No. 141 RT. 05 Kel. Simpangkatis Kecamatan Simpangkatis Kabupaten Bangka Tengah" class="form-control"><?php echo $d_surat->alamat_usaha;?></textarea>
              <?php echo form_error('alamat_usaha','<small class="text-red">','</small>'); ?>
            </div>
          </div>
           <div class="form-group">
            <label  class="col-sm-2 control-label"><small>Jumlah Modal Usaha <span class="text-red">*</span></small></label>
            <div class="col-sm-10">
              <input type="number" name="modal_usaha"   class="form-control" value="<?php echo $d_surat->modal_usaha;?>"  placeholder="Jumlah Modal Usaha ">
              <?php echo form_error('modal_usaha','<small class="text-red">','</small>'); ?>
            </div>
          </div>
           <div class="form-group">
            <label  class="col-sm-2 control-label"><small>Nomor Pendaftaran Perusahaan <span class="text-red">*</span></small></label>
            <div class="col-sm-10">
              <input type="text" name="nomor_pendaftaran"  class="form-control" value="<?php echo $d_surat->nomor_pendaftaran;?>"  placeholder="Nomor Pendaftaran Perusahaan ">
              <?php echo form_error('nomor_pendaftaran','<small class="text-red">','</small>'); ?>
            </div>
          </div>
    </div>

  <div class="col-sm-12">
      <table class="table bg-success table-bordered" >
      <h4 class="text-green">Persyaratan Pembuatan <?php echo $syarat?> :</h4>
        <thead >
          <tr>
            <th class="text-center">#</th>
            <th><small>Persyaratan</small></th>
            <th class="text-center"><small>Upload File</small></th>
          </tr>
        </thead>
        <tbody>
           <?php
          $no = 1;
          $noz = 1; 
          foreach ($file as $value) {
            $explode = $value->syarat ;  
            $data = explode(',',$explode);
            for($a=0; $a<count($data); $a++){ ?>
            <?php 
              foreach ($syarat_surat as $key) {
                if ($data[$a] == $key->id_syarat) {
                  $datas = $key->nama_syarat;
                }
            }
             ?>  
              <tr>
                  <td class="text-center"><small><?php echo $no++ ?></small></td>
                  <td><small><?php echo $datas ?></small></td>
                  <td>
                    <small><input name="imk_<?php echo $noz++ ?>" type="file"   class="form-control" /></small>
                  </td>
              </tr>
          <?php  }
          }
         ?>

           <tr>
            <td colspan="3">
            <span><i class="fa text-danger fa-info-circle"></i> <small>File harus berformat pdf atau jpg maximal 1 <b>Mb</b></small></span>
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
          <a href="<?php echo base_url('epelayanan'); ?>" class="btn btn-app bg-green pull-right">
            <i class="ion ion-reply"></i> Kembali
          </a>
        </div>
        <div class="col-md-6 col-xs-6">
          <button type="submit" name="upload" class="btn btn-app bg-green pull-right">
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
<?php }} ?>
</div>
</div>
</div>

