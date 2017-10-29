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
      <form action="<?php base_url('epelayanan/rpik') ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
    <div class="col-md-8 col-md-offset-2">
          <div class="box box-success shadow">
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
                      <option <?php echo set_select('desa', '',TRUE); ?> value="">~~ pilih desa ~~</option>
                      <?php foreach ($desa as $key => $value) { ?>
                           <option <?php echo set_select('desa', $value->nama_desa); ?> value="<?php echo $value->nama_desa ?>"><?php echo $value->nama_desa ?></option>
                      <?php } ?>
                    </select>
                    <?php echo form_error('desa','<small class="text-red">','</small>'); ?>
                </div>
              </div>

                <div class="form-group">
                  <label  class="col-sm-2 control-label font-title">No Surat <span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <input type="text" name="no_surat" id="needno_surat" onkeyup="myneedno_surat()" value="<?php echo set_value('no_surat');?>" class="form-control"  placeholder="Nomor Surat Pengantar dari Desa/Kelurahan">
                     <?php echo form_error('no_surat','<small class="text-red">','</small>'); ?>
                  </div>
                </div>

                 <div class="form-group"> 
                  <label  class="col-sm-2 control-label font-title">Tanggal Surat <span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <input type="text" name="tanggal_surat" id="datepicker1"  value="<?php echo set_value('tanggal_surat');?>" class="form-control"  placeholder="Tanggal Surat Pengantar dari Desa/Kelurahan">
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
     Memperhatikan Surat Pengantar dari Lurah <span class="text-green" id="neededdesa"></span> Kecamatan Simpangkatis Nomor : <span class="text-green" id="neededno_surat"></span> tanggal -, dengan ini Camat Simpangkatis menerangkan bahwa :
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
            <label  class="col-sm-2 control-label font-title">Agama <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <select name="agama" class="form-control kapital">
                      <option <?php echo set_select('agama', '',TRUE); ?> value="">-- pilih agama --</option>
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
              <input type="text" name="pekerjaan" class="form-control" value="<?php echo set_value('pekerjaan');?>" placeholder="Pekerjaan">
              <?php echo form_error('pekerjaan','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group"> 
            <label  class="col-sm-2 control-label font-title">Alamat Pemohon <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <textarea name="alamat_pemohon"  placeholder="Contoh : Jln. Raya Simpangkatis No. 141 RT. 05 Kel. Simpangkatis Kecamatan Simpangkatis Kabupaten Bangka Tengah" class="form-control"><?php echo set_value('alamat_pemohon');?></textarea>
              <?php echo form_error('alamat_pemohon','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Keperluan</label>
            <div class="col-sm-10">
              <input type="text" name="keperluan" class="form-control" value="<?php echo set_value('keperluan');?>" placeholder="Keperluan">
              <?php echo form_error('keperluan','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Hari <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <select name="hari" class="form-control kapital">
                      <option <?php echo set_select('hari', '',TRUE); ?> value="">-- pilih hari --</option>
                      <?php foreach ($hari as $key => $value) { ?>
                           <option <?php echo set_select('hari', $value->nama_hari); ?> value="<?php echo $value->nama_hari ?>"><?php echo $value->nama_hari ?></option>
                      <?php } ?>
                    </select>
              <?php echo form_error('hari','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Tanggal Acara <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="tgl_acara" class="form-control" value="<?php echo set_value('tgl_acara');?>" id="datepicker3"  placeholder="Tanggal Acara">
              <?php echo form_error('tgl_acara','<small class="text-red">','</small>'); ?>
            </div>
          </div>
    
          <div class="form-group ">
            <label  class="col-md-2 control-label font-title">Pukul <span class="text-red">*</span></label>
            <div class="col-md-10">
              <div class="col-md-3 bootstrap-timepicker no-padding">
                 <input type="text" name="mulai_pukul" value="<?php echo set_value('mulai_pukul');?>"  class="form-control timepicker" placeholder="Mulai Pukul">
                 <?php echo form_error('mulai_pukul','<small class="text-red">','</small>'); ?>
              </div>
              &nbsp;
              <div class="col-md-3 bootstrap-timepicker no-padding">
                 <input type="text" name="sampai_pukul" class="form-control timepicker-sampai" value="<?php echo set_value('sampai_pukul');?>" placeholder="Sampai Pukul">
                 <?php echo form_error('sampai_pukul','<small class="text-red">','</small>'); ?>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Tempat Acara <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <textarea name="tempat_acara"  placeholder="Contoh : Jln. Raya Simpangkatis No. 141 RT. 05 Kel. Simpangkatis Kecamatan Simpangkatis Kabupaten Bangka Tengah" class="form-control"><?php echo set_value('tempat_acara');?></textarea>
              <?php echo form_error('tempat_acara','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Hiburan <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="hiburan" class="form-control" value="<?php echo set_value('hiburan');?>" placeholder="Hiburan">
              <?php echo form_error('hiburan','<small class="text-red">','</small>'); ?>
            </div>
          </div>
            
  </div>

  <div class="col-sm-12">
  <br>
      <p>
   Pada prinsipnya kami tidak keberatan atas penyelenggaraan kegiatan tersebut dengan ketentuan sebagai berikut :
      </p>
      <ol>
        <li> Harus menjaga ketertiban dan keamanan setempat.</li>
        <li>Harus menjaga kebersihan lokasi.</li>
        <li>Melaporkan kepada Dinas/Instansi terkait sebelum maupun akan berakhirnya keramaian dimaksud.</li>
        <li>Agar berkoordinasi dengan aparat setempat.</li>
        <li>Harus mentaati peraturan perundang­undangan, peraturan daerah dan norma­norma yang berlaku.</li>
      </ol>
      <br>
  </div>

  <div class="col-sm-12">
      <table class="table bg-success table-bordered font-title" >
      <h4 class="text-green">Persyaratan <?php echo $crumb; ?> :</h4>
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
              <input  type="file" name="rpik_1" class="form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">2</td>
            <td>Surat Pengantar / Rekomandasi izin keramaian yang ditanda tangani Kades / Lurah</td>
            <td>
              <input type="file" name="rpik_2" class= "form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">3</td>
            <td>Surat pernyataan bertanggung jawab atas pelaksana keramaian</td>
            <td class="text-center">
              <input type="file" name="rpik_3" class="form-control" />
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
    <span class="font-title"><i class="fa text-info fa-info-circle"></i>  isi dengan data pemohon surat</span>
    </div>
  </div>
</div>
</div>
</div>
</div>
