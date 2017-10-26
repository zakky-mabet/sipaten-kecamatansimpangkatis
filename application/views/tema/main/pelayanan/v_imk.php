<div <?php echo ($this->agent->is_mobile()) ? 'class="container margin-container" style="padding-top:50px;"' : $browser ="style='padding-top:80px;' class='container'" ; ?>>
 <div class="col-md-10 col-md-offset-1">
	 <div class="box box-warning radius" >
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
      <form action="<?php base_url('epelayanan/sktm') ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
  
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
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Nama Lengkap <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="nama_lengkap" id="need" onkeyup="myneed()"  class="form-control" value="<?php echo set_value('nama_lengkap');?>"  placeholder="Nama Lengkap">
              <?php echo form_error('nama_lengkap','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">NIK <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="number" name="nik"   class="form-control" value="<?php echo set_value('nik');?>"  placeholder="NIK">
              <?php echo form_error('nik','<small class="text-red">','</small>'); ?>
            </div>
          </div>
      
           <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Alamat <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <textarea name="alamat"  placeholder="Contoh : Jln. Raya Koba No. 141 RT. 05 Kel. Koba Kecamatan Koba Kabupaten Bangka Tengah" class="form-control"><?php echo set_value('alamat');?></textarea>
              <?php echo form_error('alamat','<small class="text-red">','</small>'); ?>
            </div>
          </div>
           <div class="form-group">
            <label  class="col-sm-2 control-label font-title">No Telepon / HP <span class="text-red">*</span></label>
            <div class="col-sm-10"> 
              <input type="number" name="no_hp" class="form-control" value="<?php echo set_value('no_hp');?>"  placeholder="No Telepon / HP ">
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
            <label  class="col-sm-2 control-label font-title">Nama Perusahaan <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="nama_perusahaan"   class="form-control" value="<?php echo set_value('nama_perusahaan');?>"  placeholder="Nama Perusahaan">
              <?php echo form_error('nama_perusahaan','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Bentuk Perusahaan <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="bentuk_perusahaan"   class="form-control" value="<?php echo set_value('bentuk_perusahaan');?>"  placeholder="Bentuk Perusahaan">
              <?php echo form_error('bentuk_perusahaan','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">NPWP Perusahaan <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="npwp_perusahaan"  class="form-control" value="<?php echo set_value('npwp_perusahaan');?>"  placeholder="NPWP Perusahaan ">
              <?php echo form_error('npwp_perusahaan','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Kegiatan Usaha <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="kegiatan_usaha"  class="form-control" value="<?php echo set_value('kegiatan_usaha');?>"  placeholder="Kegiatan Usaha ">
              <?php echo form_error('kegiatan_usaha','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Sarana Usaha <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="sarana_usaha"   class="form-control" value="<?php echo set_value('sarana_usaha');?>"  placeholder="Sarana Usaha ">
              <?php echo form_error('sarana_usaha','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Alamat Usaha <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <textarea name="alamat_usaha"   placeholder="Contoh : Jln. Raya Koba No. 141 RT. 05 Kel. Koba Kecamatan Koba Kabupaten Bangka Tengah" class="form-control"><?php echo set_value('alamat_usaha');?></textarea>
              <?php echo form_error('alamat_usaha','<small class="text-red">','</small>'); ?>
            </div>
          </div>
           <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Jumlah Modal Usaha <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="number" name="modal_usaha"   class="form-control" value="<?php echo set_value('modal_usaha');?>"  placeholder="Jumlah Modal Usaha ">
              <?php echo form_error('modal_usaha','<small class="text-red">','</small>'); ?>
            </div>
          </div>
           <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Nomor Pendaftaran Perusahaan <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="nomor_pendaftaran"  class="form-control" value="<?php echo set_value('nomor_pendaftaran');?>"  placeholder="Nomor Pendaftaran Perusahaan ">
              <?php echo form_error('nomor_pendaftaran','<small class="text-red">','</small>'); ?>
            </div>
          </div>
    </div>

  <div class="col-sm-12">
      <table class="table bg-warning table-bordered font-title" >
      <h4 class="text-orange">Persyaratan Pembuatan <?php echo $crumb ?> :</h4>
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
              <input name="imk_1" type="file" class="form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">2</td>
            <td>Pas Photo Berwarna 4x6 </td>
            <td>
              <input type="file" name="imk_2" class= "form-control" />
            </td>
          </tr>
           <tr>
            <td class="text-center">3</td>
            <td>Fotocopy Bukti Lunas PBB Tahun Berakhir</td>
            <td>
              <input name="imk_3" type="file" class="form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">4</td>
            <td>Fotocopy NPWP Perusahaan</td>
            <td>
              <input type="file" name="imk_4" class= "form-control" />
            </td>
          </tr>
           <tr>
            <td class="text-center">5</td>
            <td>Surat Pernyataan Persetujuan Tetangga (minimal 2 tetangga) Diketahui Kades/Lurah dan Camat beserta Fotocopy KTP</td>
            <td>
              <input name="imk_5" type="file" class="form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">6</td>
            <td>Surat Pemohonan bermaterai Rp. 6.000,-</td>
            <td>
              <input type="file" name="imk_6" class= "form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">7</td>
            <td>Surat Rekomendasi Kades / Lurah</td>
            <td>
              <input type="file" name="imk_7" class= "form-control" />
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
</div>
</div>

