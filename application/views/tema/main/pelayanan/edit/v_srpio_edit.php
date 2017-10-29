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
      <form action="<?php echo current_url(); ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
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
          <div class="box box-success shadow">
            <div class="box-header with-border">
              <h3 class="box-title">Data Pemohon</h3>
            </div>
            <div class="form-horizontal">
              <div class="box-body ">
                <div class="form-group">
                  <label  class="col-sm-2 control-label font-title">NIK <span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <input type="nik" name="nik" value="<?php echo $value->nik ?>" class="form-control"  placeholder="NIK Pemohon">
                     <?php echo form_error('nik','<small class="text-red">','</small>'); ?>
                  </div>
                </div>
               
            </div>
          </div>
      </div>
    </div>

  <div class="col-sm-12">
  <br>
      <p>
     Berdasarkan Surat dari Pengelola <span class="text-green kapital" id="needed"></span>.  perihal Pemohonan Rekomendasi Perpanjangan Izin Oprasional a.n
      </p>
  </div>
  <div class="col-sm-12 form-horizontal">
          <div class="form-group">
              <label  class="col-sm-2 control-label"></label>
              <div class="col-sm-10 ">
              <hr>
             Keterangan Lembaga
                <hr>
              </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Nama Lembaga <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="nama_lembaga" id="need" onkeyup="myneed()"  class="form-control" value="<?php echo $d_surat->nama_lembaga;?>"  placeholder="Nama Lembaga">
              <?php echo form_error('nama_lembaga','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Nama Pengelola <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="nama_pengelola" class="form-control" value="<?php echo $d_surat->nama_pengelola ;?>"  placeholder="Nama Pengelola">
              <?php echo form_error('nama_pengelola','<small class="text-red">','</small>'); ?>
            </div>
          </div>
           <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Alamat <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <textarea name="alamat"  placeholder="Contoh : Jln. Raya Simpangkatis No. 141 RT. 05 Kel. Simpangkatis Kecamatan Simpangkatis Kabupaten Bangka Tengah" class="form-control"><?php echo $d_surat->alamat ?></textarea>
              <?php echo form_error('alamat','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
              <label  class="col-sm-2 control-label"></label>
              <div class="col-sm-10 ">
              <hr>
             Surat Rekomendasi dari pengelola
                <hr>
              </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Nomor Surat <span class="text-red">*</span></label>
            <div class="col-md-10">
            <input type="text" name="nomor_surat" placeholder="Nomor Surat " class="form-control" value="<?php echo $d_surat->nomor_surat;?>">
            <?php echo form_error('nomor_surat','<small class="text-red">','</small>'); ?>
          </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Tanggal Surat <span class="text-red">*</span></label>
            <div class="col-md-10">
            <input type="text" name="tanggal_surat" placeholder="Ex : 1985-12-23 " id="datepicker3" class="form-control" value="<?php echo $d_surat->tanggal_surat;?>">
            <?php echo form_error('tanggal_surat','<small class="text-red">','</small>'); ?>
          </div>
          </div>
                
  </div>
  <div class="col-sm-12">
  <br>
      <p>
    Dengan maksud mengajukan Permohonan Perpanjangan Izin Oprasional. Dan Pihak kami prinsipnya tidak keberatan untuk memberikan rekomendasi Perpanjangan Izin Oprasional  <span class="text-green kapital" id="needed"></span> sepanjang mematuhi dan mentaati segala peraturan dan perundang­undangan yang berlaku
      </p>
      <p>
    Demikiaan, Surat Keterangan Baik ini dibuat untuk dapat dipergunakan sebagaimana mestinya. Atas perhatiannya diucapkan terima kasih.

      </p>
  </div>

  <div class="col-sm-12">
      <table class="table bg-success table-bordered font-title">
      <h4 class="text-green">Persyaratan Pembuatan <?php echo $syarat ?> :</h4>
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
            <td>Pas Photo Berwarna 4x6</td>
            <td>
              <input name="rpio_1" type="file" class="form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">2</td>
            <td>Fotocopy KTP Direktur/Pemilik</td>
            <td>
              <input type="file" name="rpio_2" class= "form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">3</td>
            <td>Fotocopy Akta Pendirian</td>
            <td class="text-center">
              <input type="file" name="rpio_3" class="form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">4</td>
            <td>Fotocopy Surat Izin yang lama</td>
            <td class="text-center">
              <input type="file" name="rpio_4" class="form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">5</td>
            <td>Fotocopy data kepengurusan pendidik/pengelola</td>
            <td class="text-center">
              <input type="file" name="rpio_5" class="form-control" />
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
