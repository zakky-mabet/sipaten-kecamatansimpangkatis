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
      <form action="<?php current_url() ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
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
   

  <div class="col-sm-12">
  <br>
      <p>
      Yang bertanda tangan di bawah ini Kepala Kecamatan Koba Kabupaten Bangka Tengah, dengan ini menerangkan bahwa :
      </p>
  </div>
  <div class="col-sm-12 form-horizontal">
          <div class="form-group">
                  <label  class="col-sm-2 control-label font-title">NIK <span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <input type="number" name="nik" value="<?php echo $value->nik;?>" class="form-control"  placeholder="NIK Pemohon">
                     <?php echo form_error('nik','<small class="text-red">','</small>'); ?>
                  </div>
            </div> 
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Nama Lengkap <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $d_surat->nama_lengkap;?>"  placeholder="Nama Lengkap">
              <?php echo form_error('nama_lengkap','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Tempat Lahir <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="tmp_lahir" class="form-control" value="<?php echo $d_surat->tmp_lahir;?>"  placeholder="Tempat Lahir">
              <?php echo form_error('tmp_lahir','<small class="text-red">','</small>'); ?>
            </div>
          </div>
         
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Tanggal Lahir <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="tgl_lahir" class="form-control" value="<?php echo $d_surat->tgl_lahir ;?>" id="datepicker"  placeholder="Tanggal Lahir">
              <?php echo form_error('tgl_lahir','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Jenis Kelamin <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="radio" name="jns_kelamin"  value="Laki-laki" <?php if ($d_surat->jns_kelamin == 'Laki-laki') { echo "checked";} else {  echo "";  } ?>  <?php echo set_radio('jns_kelamin','Laki-laki');?>  class="minimal form-control">&nbsp;&nbsp;  Laki-laki&nbsp;&nbsp;
              <input type="radio" name="jns_kelamin"  value="Perempuan" <?php if ($d_surat->jns_kelamin == 'Perempuan') { echo "checked";} else {  echo "";  } ?> <?php echo set_radio('jns_kelamin','Perempuan');?> class="minimal form-control">&nbsp;&nbsp;  Perempuan <br>
                <?php echo form_error('jns_kelamin','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Pekerjaan <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="pekerjaan" class="form-control" value="<?php echo $d_surat->pekerjaan ;?>" placeholder="Pekerjaan">
              <?php echo form_error('pekerjaan','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Alamat <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <textarea name="alamat"  placeholder="Contoh : Jln. Raya Koba No. 141 RT. 05 Kel. Koba Kecamatan Koba Kabupaten Bangka Tengah" class="form-control"><?php echo $d_surat->alamat ?></textarea>
              <?php echo form_error('alamat','<small class="text-red">','</small>'); ?>
            </div>
          </div>
      
          <div class="form-group">
            <label  class="col-sm-2 control-label"></label>
            <div class="col-sm-10">
              <hr>
               Surat Pengantar dari kelurahan / Desa :
              <hr>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Nomor Surat <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="no_surat_rek" class="form-control" value="<?php echo $d_surat->no_surat_rek;?>" placeholder="Nomor Surat">
              <?php echo form_error('no_surat_rek','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Tanggal Surat <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="tgl_surat_rek" id="datepicker1" class="form-control" value="<?php echo $d_surat->tgl_surat_rek;?>" placeholder="Tanggal Surat">
              <?php echo form_error('tgl_surat_rek','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
                  <label  class="col-sm-2 control-label font-title">Nama Desa <span class="text-red">*</span></label>
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
            <label  class="col-sm-2 control-label"></label>
            <div class="col-sm-10">
              <hr>
              Tanda Tangan Kades / Lurah :
              <hr>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Nama Pejabat Lurah / Kades <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="pejabat_lurah" class="form-control" value="<?php echo $d_surat->pejabat_lurah;?>" placeholder="Nama Pejabat Lurah / Kades">
              <?php echo form_error('pejabat_lurah','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">NIP <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="nip_pejabat_lurah" class="form-control" value="<?php echo $d_surat->nip_pejabat_lurah;?>" placeholder="NIP">
              <?php echo form_error('nip_pejabat_lurah','<small class="text-red">','</small>'); ?>
            </div>
          </div> 
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Jabatan <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="jabatan_pejabat_lurah" class="form-control" value="<?php echo $d_surat->jabatan_pejabat_lurah;?>" placeholder="Jabatan">
              <?php echo form_error('jabatan_pejabat_lurah','<small class="text-red">','</small>'); ?>
            </div>
          </div> 
          <div class="form-group">
            <label  class="col-sm-2 control-label"></label>
            <div class="col-sm-10">
              <hr>
             Keterangan Keperluan :
              <hr>
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
      Nama tersebut adalah warga Kecamatan Koba Kabupaten Bangka, dan menurut Keluarga Tidak Mampu/Keluarga Pra Sejahtera. Dan Surat Keterangan ini dipergunakan untuk <span class="text-orange" id="needed"></span>
      </p>
      <p>
      Demikianlah surat keterangan ini kami buat, apabila dikemudian hari ternyata ada permasalahan, maka akan menjadi tanggung jawab yang bersangkutan sepenuhnya, dan pejabat yang menadatangani terlepas dari segala tuntutuan hukum yang berlaku.
      </p>
  </div>

  <div class="col-sm-12">
      <table class="table bg-warning table-bordered font-title" >
      <h4 class="text-orange">Persyaratan Pembuatan <?php echo $syarat; ?> :</h4>
        <thead >
          <tr >
            <th class="text-center">#</th>
            <th>Persyaratan</th>
            <th class="text-center">Upload File</th>
          </tr>
        </thead>
        <tbody >
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
                  <td class="text-center"><?php echo $no++ ?></td>
                  <td><?php echo $datas ?></td>
                  <td>
                    <input name="<?php echo 'sktm_'.$noz++ ?>" type="file"  class="form-control" />
                  </td>
              </tr>
          <?php  }
          }
         ?>
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
          <button type="submit" name="upload" class="btn btn-app bg-orange pull-right">
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
