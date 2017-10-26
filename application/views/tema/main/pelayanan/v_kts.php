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
      <form action="<?php base_url('epelayanan/sktm') ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">

  <div class="col-sm-12">
  <br>
      <p>
      Yang bertanda tangan di bawah ini, menerangkan bahwa :
      </p>
  </div>
  <div class="col-sm-12 form-horizontal">
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Nama Lengkap Pemohon <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="nama_lengkap" class="form-control" value="<?php echo set_value('nama_lengkap');?>"  placeholder="Nama Lengkap">
              <?php echo form_error('nama_lengkap','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
                  <label  class="col-sm-2 control-label font-title">NIK Pemohon <span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <input type="number" name="nik" value="<?php echo set_value('nik');?>" class="form-control"  placeholder="NIK Pemohon">
                     <?php echo form_error('nik','<small class="text-red">','</small>'); ?>
                  </div>
          </div>
          <div class="form-group">
                  <label  class="col-sm-2 control-label font-title">Nomor Kartu Keluarga <span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <input type="number" name="nokk" value="<?php echo set_value('nokk');?>" class="form-control"  placeholder="Nomor Kartu Keluarga ">
                     <?php echo form_error('nokk','<small class="text-red">','</small>'); ?>
                  </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Tempat, Tanggal Lahir <span class="text-red">*</span></label>
            <div class="col-md-5">
            <input type="text" name="tmp_lahir" placeholder="Tempat Lahir" class="form-control" value="<?php echo set_value('tmp_lahir');?>">
            <?php echo form_error('tmp_lahir','<small class="text-red">','</small>'); ?>
          </div>
          <div class="col-md-5">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input type="text" class="form-control" name="tgl_lahir" id="datepicker" value="<?php echo set_value('tgl_lahir');?>" placeholder="Ex : 1995-12-23">
              </div>
            <?php echo form_error('tgl_lahir','<small class="text-red">','</small>'); ?>
          </div>
          </div>

          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Jenis Kelamin <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="radio" name="jns_kelamin" value="Laki-laki" <?php echo set_radio('jns_kelamin','Laki-laki');?>  class="minimal form-control">&nbsp;&nbsp;  Laki-laki&nbsp;&nbsp;
              <input type="radio" name="jns_kelamin" value="Perempuan" <?php echo set_radio('jns_kelamin','Perempuan');?> class="minimal form-control">&nbsp;&nbsp;  Perempuan <br>
                <?php echo form_error('jns_kelamin','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Status Perkawinan <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="radio" name="status_perkawinan" value="Belum Kawin" <?php echo set_radio('status_perkawinan','Belum Kawin');?>  class="minimal form-control">&nbsp;&nbsp;  Belum Kawin&nbsp;&nbsp;
              
              <input type="radio" name="status_perkawinan" value="Kawin" <?php echo set_radio('status_perkawinan','Kawin');?> class="minimal form-control">&nbsp;&nbsp;  Kawin&nbsp;&nbsp;

               <input type="radio" name="status_perkawinan" value="Cerai Hidup" <?php echo set_radio('status_perkawinan','Cerai Hidup');?>  class="minimal form-control">&nbsp;&nbsp;  Cerai Hidup&nbsp;&nbsp;
                <input type="radio" name="status_perkawinan" value="Cerai Mati" <?php echo set_radio('status_perkawinan','Cerai Mati');?>  class="minimal form-control">&nbsp;&nbsp;  Cerai Mati&nbsp;&nbsp; <br>
                <?php echo form_error('status_perkawinan','<small class="text-red">','</small>'); ?>
            </div>
          </div>
           <div class="form-group">
            <label  class="col-sm-2 control-label font-title">No. dan Tanggal Masuk <span class="text-red">*</span></label>
            <div class="col-md-5">
            <input type="text" name="nomor_masuk" placeholder="Nomor Masuk" class="form-control" value="<?php echo set_value('nomor_masuk');?>">
            <?php echo form_error('nomor_masuk','<small class="text-red">','</small>'); ?>
          </div>
          <div class="col-md-5">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input type="text" class="form-control" name="tanggal_masuk" id="datepicker1" value="<?php echo set_value('tanggal_masuk');?>" placeholder="Ex : 1995-12-23">
              </div>
            <?php echo form_error('tanggal_masuk','<small class="text-red">','</small>'); ?>
          </div>
          </div>
          <div class="form-group">
                  <label  class="col-sm-2 control-label font-title">Asal Desa <span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <select name="desa" class="form-control">
                      <option <?php echo set_select('desa', '',TRUE); ?> value="">-- pilih desa --</option>
                      <?php foreach ($desa as $key => $value) { ?>
                           <option <?php echo set_select('desa', $value->nama_desa); ?> value="<?php echo $value->nama_desa ?>"><?php echo $value->nama_desa ?></option>
                      <?php } ?>
                    </select>
                    <?php echo form_error('desa','<small class="text-red">','</small>'); ?>
                  </div>
                </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Alamat Asal <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <textarea name="alamat_asal"  placeholder="Contoh : Jln. Raya Koba No. 141 RT. 05 Kel. Koba Kecamatan Koba Kabupaten Bangka Tengah" class="form-control"><?php echo set_value('alamat_asal');?></textarea>
              <?php echo form_error('alamat_asal','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label"></label>
            <div class="col-sm-10 ">
            <hr>
            Alamat Sekarang :
              <hr>
            </div>
        </div>
        <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Alamat Pindah <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <textarea name="alamat_pindah"  placeholder="Contoh : Jln. Raya Koba No. 141 RT. 05 Kel. Koba Kecamatan Koba Kabupaten Bangka Tengah" class="form-control"><?php echo set_value('alamat_pindah');?></textarea>
              <?php echo form_error('alamat_pindah','<small class="text-red">','</small>'); ?>
            </div>
          </div>
        <div class="form-group">
                  <label  class="col-sm-2 control-label font-title">Desa/Kelurahan <span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <input type="text" name="desa_kelurahan" value="<?php echo set_value('desa_kelurahan');?>" class="form-control"  placeholder="Desa/Kelurahan">
                     <?php echo form_error('desa_kelurahan','<small class="text-red">','</small>'); ?>
                  </div>
        </div>
        <div class="form-group">
                  <label  class="col-sm-2 control-label font-title">Kecamatan <span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <input type="text" name="kecamatan" value="<?php echo set_value('kecamatan');?>" class="form-control"  placeholder="Kecamatan">
                     <?php echo form_error('kecamatan','<small class="text-red">','</small>'); ?>
                  </div>
        </div>
        <div class="form-group">
                  <label  class="col-sm-2 control-label font-title">Kab/Kota <span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <input type="text" name="kabupaten" value="<?php echo set_value('kabupaten');?>" class="form-control"  placeholder="Kab/Kota">
                     <?php echo form_error('kabupaten','<small class="text-red">','</small>'); ?>
                  </div>
        </div>
        <div class="form-group">
                  <label  class="col-sm-2 control-label font-title">Provinsi <span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <input type="text" name="provinsi" value="<?php echo set_value('provinsi');?>" class="form-control"  placeholder="Provinsi">
                     <?php echo form_error('provinsi','<small class="text-red">','</small>'); ?>
                  </div>
        </div>
        <div class="form-group">
                  <label  class="col-sm-2 control-label font-title">Kode Pos <span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <input type="number" name="kode_pos" value="<?php echo set_value('kode_pos');?>" class="form-control"  placeholder="Kode Pos">
                     <?php echo form_error('kode_pos','<small class="text-red">','</small>'); ?>
                  </div>
        </div>
        <div class="form-group">
            <label for="email" class="control-label col-md-2 col-xs-12 font-title">Alasan Pindah <strong class="text-red">*</strong></label>
            <div class="col-md-10">
              <div class="col-md-4">
                    <div class="radio radio-primary">
                       <input name="alasan_pindah" class="minimal form-control" type="radio" value="pekerjaan" <?php echo set_radio('alasan_pindah','pekerjaan');?> > <label> Pekerjaan</label>
                    </div>
                    <div class="radio radio-primary">
                       <input name="alasan_pindah" class="minimal form-control" type="radio" value="pendidikan" <?php echo set_radio('alasan_pindah','pendidikan');?>> <label> Pendidikan</label>
                    </div>
              </div>
              <div class="col-md-4">
                    <div class="radio radio-primary">
                       <input name="alasan_pindah" class="minimal form-control" type="radio" value="keamanan" <?php echo set_radio('alasan_pindah','keamanan');?>> <label> Keamanan</label>
                    </div>
                    <div class="radio radio-primary">
                       <input name="alasan_pindah" class="minimal form-control" type="radio" value="kesehatan" <?php echo set_radio('alasan_pindah','kesehatan');?>> <label> Kesehatan</label>
                    </div>
              </div>
              <div class="col-md-4">
                    <div class="radio radio-primary">
                       <input name="alasan_pindah" class="minimal form-control" type="radio" value="keluarga" <?php echo set_radio('alasan_pindah','keluarga');?>> <label> Keluarga</label>
                    </div>
                    <div class="radio radio-primary">
                       <input name="alasan_pindah" type="radio"  class="minimal form-control" value="Lainnya" <?php echo set_radio('alasan_pindah','lainnya');?>> <label> Lainnya</label>
                    </div>
              </div>
              <?php echo form_error('alasan_pindah','<small class="text-red">','</small>'); ?>
            </div>
          </div>
         <div class="form-group">
                  <label  class="col-sm-2 control-label font-title">Golongan Darah <strong class="text-red">*</strong></label>
                  <div class="col-sm-10">
                    <select name="darah" class="form-control">
                      <option <?php echo set_select('darah', '',TRUE); ?> value="">~~ pilih golongan darah ~~</option>
                      <?php foreach ($darah as $key => $value) { ?>
                           <option <?php echo set_select('darah', $value->nama_gol); ?> value="<?php echo $value->nama_gol ?>"><?php echo $value->nama_gol ?></option>
                      <?php } ?>
                    </select>
                    <?php echo form_error('darah','<small class="text-red">','</small>'); ?>
                  </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label"></label>
            <div class="col-sm-10 ">
            <hr>
            Penanggung Jawab :
              <hr>
            </div>
        </div>
        <div class="form-group">
                  <label  class="col-sm-2 control-label font-title">NIK <span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <input type="number" name="nik_penanggung" value="<?php echo set_value('nik_penanggung');?>" class="form-control"  placeholder="NIK">
                     <?php echo form_error('nik_penanggung','<small class="text-red">','</small>'); ?>
                  </div>
        </div>

        <div class="form-group">
                  <label  class="col-sm-2 control-label font-title">Nama Lengkap <span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <input type="text" name="nama_penanggung" value="<?php echo set_value('nama_penanggung');?>" class="form-control"  placeholder="Nama Lengkap">
                     <?php echo form_error('nama_penanggung','<small class="text-red">','</small>'); ?>
                  </div>
        </div>
        <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Alamat <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <textarea name="alamat_penanggung"  placeholder="Contoh : Jln. Raya Koba No. 141 RT. 05 Kel. Koba Kecamatan Koba Kabupaten Bangka Tengah" class="form-control"><?php echo set_value('alamat_penanggung');?></textarea>
              <?php echo form_error('alamat_penanggung','<small class="text-red">','</small>'); ?>
            </div>
          </div>
        <div class="form-group">
                  <label  class="col-sm-2 control-label font-title">Pekerjaan <span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <input type="text" name="pekerjaan_penanggung" value="<?php echo set_value('pekerjaan_penanggung');?>" class="form-control"  placeholder="Pekerjaan">
                     <?php echo form_error('pekerjaan_penanggung','<small class="text-red">','</small>'); ?>
                  </div>
        </div>


  </div>
  <div class="col-sm-12">
  <br>

  </div>

  <div class="col-sm-12">
      <table class="table bg-warning table-bordered font-title">
      <h4 class="text-orange">Persyaratan Pembuatan <?php echo $crumb; ?> :</h4>
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
            <td>Surat Pengantar dari kelurahan / Desa</td>
            <td>
              <input name="kts_1" type="file" class="form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">2</td>
            <td>Fotocopy KTP daerah Asal</td>
            <td>
              <input type="file" name="kts_2" class= "form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">3</td>
            <td>Fotocopy KTP Penanggung Jawab</td>
            <td class="text-center">
              <input type="file" name="kts_3" class="form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">4</td>
            <td>Pas Photo berwarna 2x3</td>
            <td class="text-center">
              <input type="file" name="kts_4" class="form-control" />
            </td>
          </tr>
           <tr>
            <td colspan="3">
            <span ><i class="fa text-danger fa-info-circle"></i> File harus berformat pdf atau jpg maximal 1 <b>Mb</b></span>
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
</div>
