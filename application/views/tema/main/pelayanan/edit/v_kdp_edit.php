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
      <form action="<?php site_url(); ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
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
              <div class="box box-success shadow">
              <div class="box-header with-border">
              <h3 class="box-title">Data Pemohon</h3>
            </div>
            <div class="form-horizontal">
              <div class="box-body ">
                <div class="form-group">
                  <label  class="col-sm-2 control-label font-title">NIK  <span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <input type="number" name="nik" value="<?php echo $value->nik;?>" class="form-control"  placeholder="NIK Pemohon">
                     <?php echo form_error('nik','<small class="text-red">','</small>'); ?>
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
                  <label  class="col-sm-2 control-label font-title">No Surat <span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <input type="text" name="no_surat" id="needno_surat" onkeyup="myneedno_surat()" value="<?php echo $d_surat->no_surat;?>" class="form-control"  placeholder="Nomor Surat Pengantar dari Desa/Kelurahan">
                     <?php echo form_error('no_surat','<small class="text-red">','</small>'); ?>
                  </div>
                </div>

                 <div class="form-group">
                  <label  class="col-sm-2 control-label font-title">Tanggal Surat <span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <input type="text" name="tanggal_surat" id="datepicker1"  value="<?php echo $d_surat->tanggal_surat;?>" class="form-control"  placeholder="Tanggal Surat Pengantar dari Desa/Kelurahan">
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
      Berdasarkan Surat Keterangan Domisili dari Lurah / Kades ... <span class="text-green kapital" id="neededdesa"></span>  perihal Surat Keterangan Domisili a.n :
      </p>
      <br>
  </div>
  <div class="col-sm-12 form-horizontal">
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Nama Perusahaan <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="nama_perusahaan" id="need" onkeyup="myneed()"  class="form-control" value="<?php echo $d_surat->nama_perusahaan;?>"  placeholder="Nama Perusahaan">
              <?php echo form_error('nama_perusahaan','<small class="text-red">','</small>'); ?>
            </div>
          </div>
           <div class="form-group">
                  <label  class="col-sm-2 control-label font-title">Desa Perusahaan <span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <select name="desa_perusahaan" class="form-control" id="needdesa" onkeyup="myneeddesa()">
                      <option <?php echo set_select('desa_perusahaan', $d_surat->desa_perusahaan,TRUE); ?> value="<?php echo $d_surat->desa_perusahaan ; ?>"><?php echo $d_surat->desa_perusahaan ; ?></option>
                      <?php foreach ($desa as $key => $value) { ?>
                           <option <?php echo set_select('desa_perusahaan', $value->nama_desa); ?> value="<?php echo $value->nama_desa ?>"><?php echo $value->nama_desa ?></option>
                      <?php } ?>
                    </select>
                    <?php echo form_error('desa_perusahaan','<small class="text-red">','</small>'); ?>
                  </div>
                </div>
           <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Alamat Perusahaan <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <textarea name="alamat_perusahaan" id="needalamat" onkeyup="myneedalamat()"   placeholder="Contoh : Jln. Raya Simpangkatis No. 141 RT. 05 Kel. Simpangkatis Kecamatan Simpangkatis Kabupaten Bangka Tengah" class="form-control"><?php echo $d_surat->alamat_perusahaan;?></textarea>
              <?php echo form_error('alamat_perusahaan','<small class="text-red">','</small>'); ?>
            </div>
          </div>
                
  </div>
  <div class="col-sm-12">
  <br>
      <p>
      Memperhatikan hal tersebut diatas dan sepanjang sepengetahuan kami bahwa <span class="text-green kapital" id="needed"></span> memang benar beralamat di <span class="text-green kapital" id="neededalamat"></span>
      </p>
      <p>
  Demikiaan, Surat Keterangan Domisili ini dibuat untuk dapat dipergunakan sebagaimana mestinya.
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
            <td>Surat Keterangan Domisili perusahaan dari Desa / Kelurahan</td>
            <td>
              <input name="kdp_1" type="file" class="form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">2</td>
            <td>Fotocopy SIUP</td>
            <td>
              <input type="file" name="kdp_2" class= "form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">3</td>
            <td>Fotocopy TDP</td>
            <td>
              <input name="kdp_3" type="file" class="form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">4</td>
            <td>Fotocopy Akta pendirian perusahaan</td>
            <td>
              <input type="file" name="kdp_4" class= "form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">5</td>
            <td>Fotocopy bukti Pelunasan PBB</td>
            <td>
              <input name="kdp_5" type="file" class="form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">6</td>
            <td>Fotocopy KTP Direktur/Pemilik</td>
            <td>
              <input type="file" name="kdp_6" class= "form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">7</td>
            <td>Fotocopy NPWP Perusahaan</td>
            <td>
              <input type="file" name="kdp_7" class= "form-control" />
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
          <a href="<?php echo base_url('epelayanan'); ?>" class="btn btn-app bg-green  pull-right">
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
    <span class="font-title"><i class="fa text-info fa-info-circle"></i> Isi dengan data pemohon surat.</span>
    </div>
  </div>
</div>
<?php }} ?>
</div>
</div>
</div>
