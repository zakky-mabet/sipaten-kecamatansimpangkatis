<div <?php echo ($this->agent->is_mobile()) ? 'class="container margin-container" style="padding-top:50px;"' : $browser ="style='padding-top:80px;' class='container'" ; ?>>
 <div class="col-md-10 col-md-offset-1">
 <div class="row">
	 <div class="box box-success radius">
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
 
  <div class="col-sm-12">
  <br>
      <p>
      Yang bertanda tangan di bawah ini Kepala Kecamatan Simpangkatis Kabupaten Bangka Tengah, dengan ini menerangkan bahwa :
      </p>
  </div>
  <div class="col-sm-12 form-horizontal">
          <div class="form-group">
                  <label  class="col-sm-2 control-label font-title">NIK <span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <input type="number" name="nik" value="<?php echo $value->nik ;?>" class="form-control"  placeholder="NIK Pemohon">
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
              <input type="text" name="tgl_lahir" class="form-control" value="<?php echo $d_surat->tgl_lahir;?>" id="datepicker"  placeholder="Tanggal Lahir">
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
            <label  class="col-sm-2 control-label font-title">Agama <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <select name="agama" class="form-control kapital">
                      <option <?php echo set_select('agama', $d_surat->agama,TRUE); ?> value="<?php echo $d_surat->agama ; ?>"><?php echo $d_surat->agama ; ?></option>
                      <?php foreach ($agama as $key => $value) { ?>
                           <option <?php echo set_select('agama', $value->agama); ?> value="<?php echo $value->agama ?>"><?php echo $value->agama ?></option>
                      <?php } ?>
                    </select>
              <?php echo form_error('agama','<small class="text-red">','</small>'); ?>
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
            <label  class="col-sm-2 control-label font-title">Alamat Tinggal Pemohon <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <textarea name="alamat_pemohon"  placeholder="Contoh : Jln. Raya Simpangkatis No. 141 RT. 05 Kel. Simpangkatis Kecamatan Simpangkatis Kabupaten Bangka Tengah" class="form-control"><?php echo $d_surat->alamat_pemohon;?></textarea>
              <?php echo form_error('alamat_pemohon','<small class="text-red">','</small>'); ?>
            </div>
          </div>
      
  </div>
  <div class="col-sm-12">
  <br>
      <p>
     Sedang / Akan melakukan kegiatan Gangguan sebagai berikut :
      </p>
      <br>
  </div>

  <div class="col-sm-12 form-horizontal" >
    <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Nama Toko/ Kios/ Perusahaan <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="nama_toko" class="form-control" value="<?php echo $d_surat->nama_toko;?>" placeholder="Nama Toko/Kios/Perusahaan">
              <?php echo form_error('nama_toko','<small class="text-red">','</small>'); ?>
            </div>
      </div>
      <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Alamat Tempat Usaha <span class="text-red">*</span></label>
            <div class="col-sm-10">
               <textarea name="alamat_usaha"  placeholder="Contoh : Jln. Raya Simpangkatis No. 141 RT. 05 Kel. Simpangkatis Kecamatan Simpangkatis Kabupaten Bangka Tengah" class="form-control"><?php echo $d_surat->alamat_usaha;?></textarea>
              <?php echo form_error('alamat_usaha','<small class="text-red">','</small>'); ?>
            </div>
      </div>
      <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Jenis Kegiatan <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="jenis_kegiatan" class="form-control" value="<?php echo $d_surat->jenis_kegiatan;?>" placeholder="Jenis Kegiatan">
              <?php echo form_error('jenis_kegiatan','<small class="text-red">','</small>'); ?>
            </div>
      </div>
      <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Jenis Bangunan <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="jenis_bangunan" class="form-control" value="<?php echo $d_surat->jenis_bangunan;?>" placeholder="Jenis Bangunan">
              <?php echo form_error('jenis_bangunan','<small class="text-red">','</small>'); ?>
            </div>
      </div>
      <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Lokasi Bangunan <span class="text-red">*</span></label>
            <div class="col-sm-10">
               <textarea name="lokasi_bangunan"  placeholder="Contoh : Jln. Raya Simpangkatis No. 141 RT. 05 Kel. Simpangkatis Kecamatan Simpangkatis Kabupaten Bangka Tengah" class="form-control"><?php echo $d_surat->lokasi_bangunan;?></textarea>
              <?php echo form_error('lokasi_bangunan','<small class="text-red">','</small>'); ?>
            </div>
      </div>
  </div>
  <div class="col-sm-12">
  <br>
      <p>
   Surat Rekomendasi Kades / Lurah :
      </p>
      <br>
  </div>
  <div class="col-sm-12 form-horizontal" >
    <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Nomor Surat <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="no_surat" class="form-control" value="<?php echo $d_surat->no_surat;?>" placeholder="Nomor Surat">
              <?php echo form_error('no_surat','<small class="text-red">','</small>'); ?>
            </div>
      </div>
    <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Tanggal Surat <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="tgl_surat" class="form-control" value="<?php echo $d_surat->tgl_surat;?>" id="datepicker2"  placeholder="Tanggal Surat">
              <?php echo form_error('tgl_surat','<small class="text-red">','</small>'); ?>
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
        <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Nama Lurah/ Kades <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="nama_lurah" class="form-control" value="<?php echo $d_surat->nama_lurah ;?>" placeholder="Nama Lurah/Kades">
              <?php echo form_error('nama_lurah','<small class="text-red">','</small>'); ?>
            </div>
      </div>
      <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Jabatan Lurah/ Kades <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="jabatan_lurah" class="form-control" value="<?php echo $d_surat->jabatan_lurah ;?>" placeholder="Jabatan Lurah/Kades">
              <?php echo form_error('jabatan_lurah','<small class="text-red">','</small>'); ?>
            </div>
      </div>
  </div>    
  <div class="col-sm-12">
  <br>
      <p>
     Demikian Surat Rekomendasi ini kami buat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.
      </p>
      <br>
  </div>

  <div class="col-sm-12">
      <table class="table bg-success table-bordered font-title">
      <h4 class="text-green">Persyaratan <?php echo $syarat; ?> :</h4>
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
              <input  type="file" name="srig_1" class="form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">2</td>
            <td>Fotocopy Bukti Lunas PBB Tahun Terakhir</td>
            <td>
              <input type="file" name="srig_2" class= "form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">3</td>
            <td>Fotocopy Akta Pendirian Perusahaan bagi CV/PT</td>
            <td class="text-center">
              <input type="file" name="srig_3" class="form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">4</td>
            <td>Surat Pernyataan Persetujuan Tetangga (minimal 2 tetangga) Diketahui Lurah/Kades dan Camat beserta Fotocopy KTP</td>
            <td class="text-center">
              <input type="file" name="srig_4" class="form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">5</td>
            <td>Surat Rekomendasi dari Lurah/Kades</td>
            <td class="text-center">
              <input type="file" name="srig_5" class="form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">6</td>
            <td>Fotocopy Perjanjian pemakaian/penguasaan gudang dengan pemilik gudang (jika menyewa gudang)</td>
            <td class="text-center">
              <input type="file" name="srig_6" class="form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">7</td>
            <td>Fotocopy surat Perjanjian Sewa Menyewa/Kontrak Lahan/Bangunan (bila bukan tempat sendiri)</td>
            <td class="text-center">
              <input type="file" name="srig_7" class="form-control" />
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
          <a href="<?php echo base_url('epelayanan'); ?>" class="btn btn-app bg-green pull-right">
            <i class="ion ion-reply"></i> Kembali
          </a>
        </div>
        <div class="col-md-6 col-xs-6">
          <button type="submit" class="btn btn-app bg-green pull-right">
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
