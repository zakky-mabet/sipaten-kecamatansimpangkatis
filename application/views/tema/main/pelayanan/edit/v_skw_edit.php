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
            Yang bertanda tangan di bawah ini :
              </p>
          </div>
          <div class="col-sm-12 form-horizontal">
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">NIK Pemohon <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="nik" class="form-control" value="<?php echo $value->nik ?>"  placeholder="NIK Pemohon">
              <?php echo form_error('nik','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
              <label  class="col-sm-2 control-label"></label>
              <div class="col-sm-10 ">
              <hr>
              Surat Keterangan dari Kades / Lurah :
                <hr>
              </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Nama Pejabat Lurah / Kades <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="nama_kades" class="form-control" value="<?php echo $d_surat->nama_kades ?>"  placeholder="Ex : Surtama, S.E., M.M.">
              <?php echo form_error('nama_kades','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">NIP <span class="text-red">*</span></label>
            <div class="col-md-10">
            <input type="number" name="nip" placeholder="NIP" class="form-control" value="<?php echo $d_surat->nip ?>">
            <?php echo form_error('nip','<small class="text-red">','</small>'); ?>
          </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Pangkat/Golongan <span class="text-red">*</span></label>
            <div class="col-md-10">
            <input type="text" name="pangkat" placeholder="Ex : Penata Tk. / IIId" class="form-control" value="<?php echo $d_surat->pangkat ?>">
            <?php echo form_error('pangkat','<small class="text-red">','</small>'); ?>
          </div>
          </div>

          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Jabatan <span class="text-red">*</span></label>
            <div class="col-md-10">
            <input type="text" name="jabatan" placeholder="Ex :  Lurah Simpang Perlang" class="form-control" value="<?php echo $d_surat->jabatan ?>">
            <?php echo form_error('jabatan','<small class="text-red">','</small>'); ?>
          </div>
          </div>
          <div class="form-group">
              <label  class="col-sm-2 control-label"></label>
              <div class="col-sm-10 ">
              <hr>
             Surat Pernyataan Para Ahli Waris
                <hr>
              </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Tanggal <span class="text-red">*</span></label>
            <div class="col-md-10">
            <input type="text" name="tanggal" placeholder="Ex : 12/23/1985 " id="datepicker" class="form-control" value="<?php echo $d_surat->tanggal ?>">
            <?php echo form_error('tanggal','<small class="text-red">','</small>'); ?>
          </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Diketahui Oleh <span class="text-red">*</span></label>
            <div class="col-md-10">
            <input type="text" name="diketahui" placeholder="Ex : Ketua RT. 015 Kelurahan Simpang Perlang"  class="form-control" value="<?php echo $d_surat->diketahui ;?>">
            <?php echo form_error('diketahui','<small class="text-red">','</small>'); ?>
          </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Tanggal diketahui <span class="text-red">*</span></label>
            <div class="col-md-10">
            <input type="text" name="tanggal_diketahui" placeholder="Ex : 12/23/1985 " id="datepicker1" class="form-control" value="<?php echo $d_surat->tanggal_diketahui ;?>">
            <?php echo form_error('tanggal_diketahui','<small class="text-red">','</small>'); ?>
          </div>
          </div>
          <div class="form-group">
              <label  class="col-sm-2 control-label"></label>
              <div class="col-sm-10 ">
              <hr>
             Akta Kematian
                <hr>
              </div>
          </div>
           <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Nomor Akta <span class="text-red">*</span></label>
            <div class="col-md-10">
            <input type="text" name="nomor_akta" placeholder="Ex : 1904­KM­22112016 " class="form-control" value="<?php echo $d_surat->nomor_akta ?>">
            <?php echo form_error('nomor_akta','<small class="text-red">','</small>'); ?>
          </div>
          </div>
           <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Ditandatangani oleh <span class="text-red">*</span></label>
            <div class="col-md-10">
            <input type="text" name="ditandatangani" placeholder="Ex : Kepala Dinas Kependudukan dan Pencatatan Sipil" class="form-control" value="<?php echo $d_surat->ditandatangani ?>">
            <?php echo form_error('ditandatangani','<small class="text-red">','</small>'); ?>
          </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Tanggal  <span class="text-red">*</span></label>
            <div class="col-md-10">
            <input type="text" name="tanggal_kematian" placeholder="Ex : 12/23/1985 " id="datepicker3" class="form-control" value="<?php echo $d_surat->tanggal_kematian ?>">
            <?php echo form_error('tanggal_kematian','<small class="text-red">','</small>'); ?>
          </div>
          </div>
          <div class="form-group">
              <label  class="col-sm-2 control-label"></label>
              <div class="col-sm-10 ">
              <hr>
             Keterangan Kematian
                <hr>
              </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Nama <span class="text-red">*</span></label>
            <div class="col-md-10">
            <input type="text" name="nama_kematian" placeholder="Nama" class="form-control" value="<?php echo $d_surat->nama_kematian ?>">
            <?php echo form_error('nama_kematian','<small class="text-red">','</small>'); ?>
          </div>
          </div>
          <div class="form-group">
            <label for="email" class="control-label col-md-2 col-xs-12 font-title">Umur <strong class="text-red">*</strong></label>
            <div class="col-md-3">
              <div class="input-group">
                  <input type="number" class="form-control" placeholder="Umur" name="umur" value="<?php echo $d_surat->umur ?>">
                  <span class="input-group-addon">Tahun</span>
              </div>
              <?php echo form_error('umur','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Alamat <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <textarea name="alamat"  placeholder="Contoh : Jln. Raya Simpangkatis No. 141 RT. 05 Kel. Simpangkatis Kecamatan Simpangkatis Kabupaten Bangka Tengah" class="form-control"><?php echo $d_surat->alamat; ?></textarea>
              <?php echo form_error('alamat','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
                  <label  class="col-sm-2 control-label font-title">Hari Kematian <span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <select name="hari" class="form-control">
                      <option <?php echo set_select('hari', $d_surat->hari,TRUE); ?> value="<?php echo $d_surat->hari ; ?>"><?php echo $d_surat->hari ; ?></option>
                      <?php foreach ($hari as $key => $value) { ?>
                           <option <?php echo set_select('hari', $value->nama_hari); ?> value="<?php echo $value->nama_hari ?>"><?php echo $value->nama_hari ?></option>
                      <?php } ?>
                    </select>
                    <?php echo form_error('hari','<small class="text-red">','</small>'); ?>
                  </div>
                </div>
           <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Tanggal  <span class="text-red">*</span></label>
            <div class="col-md-10">
            <input type="text" name="tanggal_keterangan_kematian" placeholder="Ex : 12/23/1985 " id="datepicker2" class="form-control" value="<?php echo $d_surat->tanggal_keterangan_kematian ?>">
            <?php echo form_error('tanggal_keterangan_kematian','<small class="text-red">','</small>'); ?>
          </div>
          </div>

          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Di/ Tempat <span class="text-red">*</span></label>
            <div class="col-md-10">
            <input type="text" name="ditempat" placeholder="Ex : RUMAH SAKIT UMUM DAERAH BANGKA TENGAH" id="datepicker2" class="form-control" value="<?php echo $d_surat->ditempat ?>">
            <?php echo form_error('ditempat','<small class="text-red">','</small>'); ?>
          </div>
          </div>
          
          
  </div>
  <div class="col-sm-10">
    <p>Demikian Surat Keterangan ini dibuat untuk dipergunakan seperlunya.
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
            <td>Fotocopy KTP Pemohon</td>
            <td>
              <input name="skw_1" type="file"  class="form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">2</td>
            <td>Fotocopy Bukti Lunas PBB Tahun Berakhir</td>
            <td>
              <input type="file" name="skw_2"  class= "form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">3</td>
            <td>Surat Kuasa</td>
            <td class="text-center">
              <input type="file" name="skw_3"  class="form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">4</td>
            <td>Surat Keterangan Kematian</td>
            <td class="text-center">
              <input type="file" name="skw_4"  class="form-control" />
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
    <div class="pull-left ">
   <small><strong class="text-red">*</strong>  Field wajib diisi !</small> <br>
    <small><strong class="text-blue">*</strong> Field Optional !</small>
    </div>
  </div>
</div>
<?php }} ?>
</div>
</div>
</div>
