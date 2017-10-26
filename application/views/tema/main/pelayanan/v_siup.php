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
    <form action="<?php base_url('epelayanan/siup') ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
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
                    <input type="number" name="nik" value="<?php echo set_value('nik');?>" class="form-control"  placeholder="NIK Pemohon">
                     <?php echo form_error('nik','<small class="text-red">','</small>'); ?>
                  </div>
                </div>
               
                <div class="form-group">
                  <label  class="col-sm-2 control-label font-title">Desa <span class="text-red">*</span></label>
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
            </div>
          </div>
      </div>
    </div>

  <div class="col-sm-12">
  <br>
      <p>
     Yang bertanda tangan di bawah ini Kepala Desa/Kelurahan : ... Kecamatan Koba Kab. Bangka Tengah, menerangkan dengan sebenarnya bahwa :
      </p>
  </div>
  <div class="col-sm-12 form-horizontal">
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Nama Lengkap <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="nama_lengkap" class="form-control" value="<?php echo set_value('nama_lengkap');?>"  placeholder="Nama Lengkap">
              <?php echo form_error('nama_lengkap','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Tempat Lahir <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="tmp_lahir" class="form-control" value="<?php echo set_value('tmp_lahir');?>"  placeholder="Tempat Lahir">
              <?php echo form_error('tmp_lahir','<small class="text-red">','</small>'); ?>
            </div>
          </div>
         
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Tanggal Lahir <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="tgl_lahir" class="form-control" value="<?php echo set_value('tgl_lahir');?>" id="datepicker"  placeholder="Ex : 1995-12-23">
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
            <label  class="col-sm-2 control-label font-title">Alamat Tinggal <span class="text-red">*</span></label>
            <div class="col-sm-10"> 
              <textarea name="alamat"  placeholder="Contoh : Jln. Raya Koba No. 141 RT. 05 Kel. Koba Kecamatan Koba Kabupaten Bangka Tengah" class="form-control"><?php echo set_value('alamat');?></textarea>
              <?php echo form_error('alamat','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Nomor Telepon/HP <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="no_hp" value="<?php echo set_value('no_hp');?>" class="form-control" placeholder="">
              <?php echo form_error('no_hp','<small class="text-red">','</small>'); ?>
            </div>
          </div>
  </div>
  <div class="col-sm-12">
  <br>
    
      <p>
      Sedang / akan melakukan kegiatan usaha perdagangan/industri sebagai berikut :
      </p>
      <br>
  </div>

  <div class="col-sm-12 form-horizontal ">
        <div class="form-group">
            <label  class="col-sm-2 control-label"></label>
            <div class="col-sm-10">
            <hr>
            Mendirikan Bangunan :
              <hr>
            </div>
        </div>
        <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Nama Perusahaan <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="nama_perusahaan" value="<?php echo set_value('nama_perusahaan');?>" class="form-control"  placeholder="Nama Perusahaan">
              <?php echo form_error('nama_perusahaan','<small class="text-red">','</small>'); ?>
            </div>
        </div>

        <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Alamat Perusahaan <span class="text-red">*</span></label>
            <div class="col-sm-10"> 
              <textarea name="alamat_perusahaan"  placeholder="Contoh : Jln. Raya Koba No. 141 RT. 05 Kel. Koba Kecamatan Koba Kabupaten Bangka Tengah" class="form-control"><?php echo set_value('alamat_perusahaan');?></textarea>
              <?php echo form_error('alamat_perusahaan','<small class="text-red">','</small>'); ?>
            </div>
        </div>

        <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Kedudukan dalam Perusahaan <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="kedudukan" value="<?php echo set_value('kedudukan');?>" class="form-control"  placeholder="Kedudukan dalam Perusahaan">
              <?php echo form_error('kedudukan','<small class="text-red">','</small>'); ?>
            </div>
        </div>

        <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Bentuk Perusahaan <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="bentuk_perusahaan" value="<?php echo set_value('bentuk_perusahaan');?>" class="form-control"  placeholder="Bentuk Perusahaan ">
              <?php echo form_error('bentuk_perusahaan','<small class="text-red">','</small>'); ?>
            </div>
        </div>

        <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Bidang Usaha  <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="bidang_usaha" value="<?php echo set_value('bidang_usaha');?>" class="form-control"  placeholder="Bidang Usaha">
              <?php echo form_error('bidang_usaha','<small class="text-red">','</small>'); ?>
            </div>
        </div>

        <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Kegiatan Usaha <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="kegiatan_usaha" value="<?php echo set_value('kegiatan_usaha');?>" class="form-control"  placeholder="Kegiatan Usaha ">
              <?php echo form_error('kegiatan_usaha','<small class="text-red">','</small>'); ?>
            </div>
        </div>

        <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Jenis Barang Dagangan <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="jenis_barang_a" value="<?php echo set_value('jenis_barang_a');?>" class="form-control" placeholder="a.">
              <?php echo form_error('jenis_barang_a','<small class="text-red">','</small>'); ?>
            </div>
            <div class="col-md-10 col-md-offset-2">
              <input type="text" name="jenis_barang_b" value="<?php echo set_value('jenis_barang_b');?>" class="form-control" placeholder="b.">
            </div>
            <br>
              <label  class="col-sm-2 control-label"></label>
            <div class="col-md-10 col-md-offset-2">
              <input type="text" name="jenis_barang_c" value="<?php echo set_value('jenis_barang_c');?>" class="form-control" placeholder="c.">
            </div>

        </div>

        <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Modal Usaha<span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="number" name="modal_usaha" value="<?php echo set_value('modal_usaha');?>" class="form-control"  placeholder="Modal Usaha">
              <?php echo form_error('modal_usaha','<small class="text-red">','</small>'); ?>
            </div>
        </div>

        <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Jumlah tenaga kerja yang dibayar <span class="text-red">*</span></label>
            <div class="col-md-3">
            <div class="input-group">
              <input type="number" name="jumlah_tenaga_laki" value="<?php echo set_value('jumlah_tenaga_laki');?>" class="form-control" placeholder="Laki-laki">
              <span class="input-group-addon">Orang</span></div>
            </div>
            <div class="col-md-3">
            <div class="input-group">
              <input type="number" name="jumlah_tenaga_perempuan" value="<?php echo set_value('jumlah_tenaga_perempuan');?>" class="form-control" placeholder="Wanita">
              <span class="input-group-addon">Orang</span></div>
               
            </div>
        </div>

        <div class="form-group">
            <label  class="control-label col-md-2 col-xs-12 font-title">Pendidikan tenaga kerja yang : <strong class="text-red">*</strong></label>
            <div class="col-md-5 text-center">
              <label class="font-title">Laki-laki</label>
              <div class="input-group">
                <span class="input-group-addon">SD</span>
                  <input type="number" value="<?php echo set_value('pendidikan_laki_sd');?>" class="form-control" name="pendidikan_laki_sd" >
                  <span class="input-group-addon">Orang</span>
              </div>
              <br>
              <div class="input-group">
                <span class="input-group-addon">SLTP</span>
                  <input type="number" class="form-control" value="<?php echo set_value('pendidikan_laki_sltp');?>" name="pendidikan_laki_sltp">
                  <span class="input-group-addon">Orang</span>
              </div> 
              <br>
              <div class="input-group">
                <span class="input-group-addon">SLTA</span>
                  <input type="number" class="form-control" value="<?php echo set_value('pendidikan_laki_slta');?>" name="pendidikan_laki_slta" >
                  <span class="input-group-addon">Orang</span>
              </div> 
              <br>
              <div class="input-group">
                <span class="input-group-addon">D3</span>
                  <input type="number" class="form-control" value="<?php echo set_value('pendidikan_laki_d3');?>" name="pendidikan_laki_d3" >
                  <span class="input-group-addon">Orang</span>
              </div> 
              <br>
              <div class="input-group">
                <span class="input-group-addon">S1</span>
                  <input type="number" class="form-control" value="<?php echo set_value('pendidikan_laki_s1');?>" name="pendidikan_laki_s1">
                  <span class="input-group-addon">Orang</span>
              </div> 
              <br>
              <div class="input-group">
                <span class="input-group-addon">S2</span>
                  <input type="number" class="form-control" value="<?php echo set_value('pendidikan_laki_s2');?>" name="pendidikan_laki_s2">
                  <span class="input-group-addon">Orang</span>
              </div>
              <br>
              <div class="input-group">
                <span class="input-group-addon">S3</span>
                  <input type="number" class="form-control" value="<?php echo set_value('pendidikan_laki_s3');?>" name="pendidikan_laki_s3" >
                  <span class="input-group-addon">Orang</span>
              </div>
            </div>
            <div class="col-md-5 text-center">
              <label class="font-title">Wanita</label>
              <div class="input-group">
                <span class="input-group-addon">SD</span>
                  <input type="number" class="form-control" value="<?php echo set_value('pendidikan_perempuan_sd');?>" name="pendidikan_perempuan_sd">
                  <span class="input-group-addon">Orang</span>
              </div>
              <br>
              <div class="input-group">
                <span class="input-group-addon">SLTP</span>
                  <input type="number" class="form-control" value="<?php echo set_value('pendidikan_laki_sltp');?>" name="pendidikan_perempuan_sltp">
                  <span class="input-group-addon">Orang</span>
              </div> 
              <br>
              <div class="input-group">
                <span class="input-group-addon">SLTA</span>
                  <input type="number" class="form-control" value="<?php echo set_value('pendidikan_perempuan_slta');?>" name="pendidikan_perempuan_slta">
                  <span class="input-group-addon">Orang</span>
              </div> 
              <br>
              <div class="input-group">
                <span class="input-group-addon">D3</span>
                  <input type="number" class="form-control" value="<?php echo set_value('pendidikan_perempuan_d3');?>" name="pendidikan_perempuan_d3" >
                  <span class="input-group-addon">Orang</span>
              </div> 
              <br>
              <div class="input-group">
                <span class="input-group-addon">S1</span>
                  <input type="number" class="form-control" value="<?php echo set_value('pendidikan_perempuan_s1');?>" name="pendidikan_perempuan_s1" >
                  <span class="input-group-addon">Orang</span>
              </div> 
              <br>
              <div class="input-group">
                <span class="input-group-addon">S2</span>
                  <input type="number" class="form-control" value="<?php echo set_value('pendidikan_perempuan_s2');?>" name="pendidikan_perempuan_s2" >
                  <span class="input-group-addon">Orang</span>
              </div>
              <br>
              <div class="input-group">
                <span class="input-group-addon">S3</span>
                  <input type="number" class="form-control" value="<?php echo set_value('pendidikan_perempuan_s3');?>" name="pendidikan_perempuan_s3" >
                  <span class="input-group-addon">Orang</span>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label  class="col-sm-2 control-label"></label>
            <div class="col-sm-10">
            <hr>
             Bagi mereka yang tempat usahanya bukan milik sendiri :
              <hr>
            </div>
          </div>
         <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Nama Pemilik Tanah <span class="text-blue">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="nama_pemilik_tanah" value="<?php echo set_value('nama_pemilik_tanah');?>" class="form-control"  placeholder="Nama Pemilik Tanah">
              <?php echo form_error('nama_pemilik_tanah','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Alamat Pemilik Tanah  <span class="text-blue">*</span></label>
            <div class="col-sm-10"> 
              <textarea name="alamat_pemilik_tanah"  placeholder="Contoh : Jln. Raya Koba No. 141 RT. 05 Kel. Koba Kecamatan Koba Kabupaten Bangka Tengah" class="form-control"><?php echo set_value('alamat_pemilik_tanah');?></textarea>
              <?php echo form_error('alamat_pemilik_tanah','<small class="text-red">','</small>'); ?>
            </div>
          </div>

          <div class="form-group">
            <label for="email" class="control-label col-md-2 col-xs-12 font-title">Jangka Waktu : <strong class="text-primary">*</strong></label>
            <div class="col-md-3">
              <div class="input-group">
                  <input type="number" class="form-control" name="jangka_waktu" placeholder="Jangka Waktu" >
                  <span class="input-group-addon">Tahun</span>
              </div>
              <p class="help-block"></p>  
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-2">
                    <div class="input-group registration-date-time">
                      <input class="form-control input-sm"  name="mulai_tanggal"  id="datepicker1" placeholder="Mulai Tanggal ..">
                      <span class="input-group-addon"><span class="fa fa-calendar" aria-hidden="true"></span></span>
                      <input class="form-control input-sm" name="sampai_tanggal"  id="datepicker3" placeholder="Sampai Tanggal ..">
                    </div>  
              <p class="help-block"></p>
              <p class="help-block"></p>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-9 col-md-offset-3">
              <p class="legend-form"></p>
            </div>
          </div>
  </div>
  <div class="col-sm-12">
  <br>
      <p>
      Atas permohonan tersebut, kami menyatakan bahwa tanah yang dimohonkan IMB benar­benar milik pemohon serta tidak terdapat suatu masalah atau tidak dalam sengketa tanah/bangunan.
      </p>
      <p>
        Demikian Surat Keterangan ini kami buat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.
      </p>
      <br>
  </div>
  <div class="col-sm-12">
      <table class="table bg-warning table-bordered font-title" >
      <h4 class="text-orange">Persyaratan Pembuatan <?php echo $crumb ?>:</h4>
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
              <input name="siup_1" type="file" class="form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">2</td>
            <td>Pas Photo Berwarna 4x6 </td>
            <td>
              <input type="file" name="siup_2" class= "form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">3</td>
            <td>Fotocopy Bukti Lunas PBB Tahun Berakhir </td>
            <td class="text-center">
              <input type="file" name="siup_3" class="form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">4</td>
            <td>Fotocopy NPWP</td>
            <td class="text-center">
              <input type="file" name="siup_4" class="form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">5</td>
            <td>Fotocopy Akta Pendirian Perusahaan dan perubahan bagi CV/PT</td>
            <td class="text-center">
              <input type="file" name="siup_5" class="form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">6</td>
            <td>Surat Pernyataan Persetujuan Tetangga (minimal 2 tetangga) Diketahui Kades/Lurah dan Camat beserta Fotocopy KTP</td>
            <td class="text-center">
              <input type="file" name="siup_6" class="form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">7</td>
            <td>Fotocopy surat Perjanjian Sewa Menyewa lahan/bangunan (jika bukan tempat sendiri)</td>
            <td class="text-center">
              <input type="file" name="siup_7" class="form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">8</td>
            <td>Surat Rekomendasi Kades / Lurah</td>
            <td class="text-center">
              <input type="file" name="siup_8" class="form-control" />
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
</div>
