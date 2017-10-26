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
      <form action="<?php echo current_url() ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
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
    Yang bertanda tangan di bawah ini :
      </p>
      <br>
  </div>
  <div class="col-sm-12 form-horizontal">
          
          <div class="form-group">
                  <label  class="col-sm-2 control-label font-title">Lurah/ Kades <span class="text-red">*</span></label>
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
    
          <div class="col-sm-12">
              <br>
              <p>
              Dengan ini menerangkan sebagai berikut :
              </p>
              <br>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title"> Nomor Surat <span class="text-red">*</span></label>
            <div class="col-md-10">
            <input type="text" name="no_surat_kuasa" placeholder="Nomor Surat"  class="form-control" value="<?php echo $d_surat->no_surat_kuasa?>">
            <?php echo form_error('no_surat_kuasa','<small class="text-red">','</small>'); ?>
          </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Tanggal Surat <span class="text-red">*</span></label>
            <div class="col-md-10">
            <input type="text" name="tgl_surat_kuasa" placeholder="Ex : 1985-12-23 " id="datepicker" class="form-control" value="<?php echo $d_surat->tgl_surat_kuasa ?>">
            <?php echo form_error('tgl_surat_kuasa','<small class="text-red">','</small>'); ?>
          </div>
          </div>
          
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Tanggal diketahui <span class="text-red">*</span></label>
            <div class="col-md-10">
            <input type="text" name="tgl_diketahui" placeholder="Ex : 1985-12-23 " id="datepicker1" class="form-control" value="<?php echo $d_surat->tgl_diketahui ?>">
            <?php echo form_error('tgl_diketahui','<small class="text-red">','</small>'); ?>
          </div>
          </div>
         
          <div class="form-group">
              <label  class="col-sm-2 control-label"></label>
              <div class="col-sm-10 ">
              <hr>
             Keterangan Tanah :
                <hr>
              </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Letak Tanah <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <textarea name="letak_tanah"  placeholder="Contoh : Jln. Raya Koba No. 141 RT. 05 Kel. Koba Kecamatan Koba Kabupaten Bangka Tengah" class="form-control"><?php echo $d_surat->letak_tanah ?></textarea>
              <?php echo form_error('letak_tanah','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-2 col-xs-12 font-title">Luas Tanah <strong class="text-red">*</strong></label>
            <div class="col-md-5">
              <div class="input-group">
                <span class="input-group-addon">&plusmn;</span>
                  <input type="text"  class="form-control" name="luas_tanah" placeholder="Luas Tanah" value="<?php echo $d_surat->luas_tanah ?>">
                  <span class="input-group-addon">M<sup>2</sup></span>
              </div>
              <?php echo form_error('luas_tanah','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
              <label  class="col-sm-2 control-label"></label>
              <div class="col-sm-10 ">
              <hr>
             Dengan Batas-batas sebagai berikut :
                <hr>
              </div>
          </div>
          <div class="form-group">
            <label for="email" class="control-label col-md-2 col-xs-12"><small>Batas Utara</small>  <strong class="text-red">*</strong></label>
            <div class="col-md-5">
              <input type="text" class="form-control" placeholder="Keterangan" name="batas_utara_ket" value="<?php echo $d_surat->batas_utara_ket;?>">
              <?php echo form_error('batas_utara_ket','<small class="text-red">','</small>'); ?>
            </div>
            <div class="col-md-5">
              <div class="input-group">
                  <input type="text" class="form-control" placeholder="Terbilang, Ex : 90 " name="batas_utara_val" value="<?php echo $d_surat->batas_utara_val;?>">
                  <span class="input-group-addon">&plusmn; M<sup>2</sup> </span>
              </div>
              <?php echo form_error('batas_utara_val','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="control-label col-md-2 col-xs-12"><small>Batas Timur</small>  <strong class="text-red">*</strong></label>
            <div class="col-md-5">
              <input type="text" class="form-control" placeholder="Keterangan" name="batas_timur_ket" value="<?php echo $d_surat->batas_timur_ket ?>">
              <?php echo form_error('batas_timur_ket','<small class="text-red">','</small>'); ?>
            </div>
            <div class="col-md-5">
              <div class="input-group">
                  <input type="text" class="form-control" placeholder="Terbilang, Ex : 90 " name="batas_timur_val" value="<?php echo $d_surat->batas_timur_val;?>">
                  <span class="input-group-addon">&plusmn; M<sup>2</sup> </span>
              </div>
              <?php echo form_error('batas_timur_val','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="control-label col-md-2 col-xs-12"><small>Batas Selatan</small>  <strong class="text-red">*</strong></label>
            <div class="col-md-5">
              <input type="text" class="form-control" placeholder="Keterangan" name="batas_selatan_ket" value="<?php echo $d_surat->batas_selatan_ket?>">
              <?php echo form_error('batas_selatan_ket','<small class="text-red">','</small>'); ?>
            </div>
            <div class="col-md-5">
              <div class="input-group">
                  <input type="text" class="form-control" placeholder="Terbilang, Ex : 90 " name="batas_selatan_val" value="<?php echo $d_surat->batas_selatan_val;?>">
                  <span class="input-group-addon">&plusmn; M<sup>2</sup> </span>
              </div>
              <?php echo form_error('batas_selatan_val','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="control-label col-md-2 col-xs-12"><small>Batas Barat</small>  <strong class="text-red">*</strong></label>
            <div class="col-md-5">
              <input type="text" class="form-control" placeholder="Keterangan" name="batas_barat_ket" value="<?php echo $d_surat->batas_barat_ket ;?>">
              <?php echo form_error('batas_barat_ket','<small class="text-red">','</small>'); ?>
            </div>
            <div class="col-md-5">
              <div class="input-group">
                  <input type="text" class="form-control" placeholder="Terbilang, Ex : 90 " name="batas_barat_val" value="<?php echo $d_surat->batas_barat_val ;?>">
                  <span class="input-group-addon">&plusmn; M<sup>2</sup> </span>
              </div>
              <?php echo form_error('batas_barat_val','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="control-label col-md-2 col-xs-12 font-title">Tahun Kuasa <strong class="text-red">*</strong></label>
            <div class="col-md-3">
              <div class="input-group">
                  <input type="text" class="form-control" placeholder="Tahun" name="tahun_kuasa" value="<?php echo $d_surat->tahun_kuasa ?>">
             
              </div>
             <?php echo form_error('tahun_kuasa','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
              <label  class="col-sm-2 control-label"></label>
              <div class="col-sm-10 ">
              <hr>
                Adalah benar tanah yang dikuasai oleh :
                <hr>
              </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">NIK <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="number" name="nik" class="form-control" value="<?php echo $d_surat->nik ?>"  placeholder="Nomor Induk Kependudukan">
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
            <label  class="col-sm-2 control-label font-title">Tempat, Tanggal Lahir <span class="text-red">*</span></label>
            <div class="col-md-5">
            <input type="text" name="tmp_lahir" placeholder="Tempat Lahir" class="form-control" value="<?php echo $d_surat->tmp_lahir ?>">
            <?php echo form_error('tmp_lahir','<small class="text-red">','</small>'); ?>
          </div>
          <div class="col-md-5">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input type="text" class="form-control" name="tgl_lahir" id="datepicker2" value="<?php echo $d_surat->tgl_lahir?>" placeholder="Ex : 1985-12-23">
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
              <textarea name="alamat"  placeholder="Contoh : Jln. Raya Koba No. 141 RT. 05 Kel. Koba Kecamatan Koba Kabupaten Bangka Tengah" class="form-control"><?php echo $d_surat->alamat?></textarea>
              <?php echo form_error('alamat','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
                  <label  class="col-sm-2 control-label font-title">Agama <span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <select name="agama" class="form-control">
                      <option <?php echo set_select('agama', $d_surat->agama,TRUE); ?> value="<?php echo $d_surat->agama ; ?>"><?php echo $d_surat->agama ; ?></option>
                      <?php foreach ($agama as $key => $value) { ?>
                           <option class="kapital" <?php echo set_select('agama', $value->agama); ?> value="<?php echo $value->agama ?>"><?php echo $value->agama ?></option>
                      <?php } ?>
                    </select>
                    <?php echo form_error('agama','<small class="text-red">','</small>'); ?>
                  </div>
                </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label  font-title">Pekerjaan <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="pekerjaan" class="form-control" value="<?php echo $d_surat->pekerjaan ?>"  placeholder="Pekerjaan">
              <?php echo form_error('pekerjaan','<small class="text-red">','</small>'); ?>
            </div>
          </div>

          
        
  </div>
  <div class="col-sm-10">
    <p>Demikian <?php echo $crumb ?> ini dibuat dengan sebenarnya, untuk dapat dipergunakan sebagaimana mestinya dan akan diperbaiki apabila terjadi kekeliuran.</p>
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
              <input name="sp4fat_1" type="file" class="form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">2</td>
            <td>Fotocopy Bukti Lunas PBB Tahun Berakhir</td>
            <td>
              <input type="file" name="sp4fat_2" class= "form-control" />
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
