<div <?php echo ($this->agent->is_mobile()) ? 'class="container margin-container" style="padding-top:50px;"' : $browser ="style='padding-top:80px;' class='container'" ; ?>>
    <div class="row">
  <div class="col-md-8 col-md-offset-2 col-xs-12"></div>
  <dov class="col-md-8 col-md-offset-2 col-xs-12">
    <div class="box box-warning radius">
    <form action="<?php echo site_url('epengaduan/create');  ?>"  class="form-horizontal"  method="post" accept-charset="utf-8" enctype="multipart/form-data"/>
    <div class="box-header with-border ">
      <div class="row">
      <section class="content-header">
      <h1>
        <?php echo $crumb ?>
      </h1>
      <p>
        <?php echo $this->session->flashdata('pesan'); ?>
      </p>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Beranda</a></li>
        <li><a href="<?php echo base_url('epengaduan'); ?>">Epengaduan</a></li>
        <li class="active"><?php echo $crumb ?></li>
      </ol>
    </section>
    </div>
    </div>
      <div class="box-body" style="margin-top: 10px;">
        <div class="form-group">
          <label class="control-label col-md-3 col-xs-12">Judul : <strong class="text-red">*</strong></label>
          <div class="col-md-8">
            <input type="text" name="judul"  value="<?php echo set_value('judul');?>" class="form-control" style="width: 100%;">
            <?php echo form_error('judul','<small class="text-red">','</small>'); ?>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-xs-12">Deskripsi : <strong class="text-red">*</strong></label>
          <div class="col-md-8">
            <textarea name="pesan" rows="7"  class="form-control" style="width: 100%;"><?php echo set_value('pesan');?></textarea>
            <?php echo form_error('pesan','<small class="text-red">','</small>'); ?>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-xs-12">Alamat lokasi : <strong class="text-red">*</strong></label>
          <div class="col-md-8">
            <textarea name="lokasi" rows="3"  class="form-control" style="width:100%;"><?php echo set_value('lokasi');?></textarea>
            <?php echo form_error('lokasi','<small class="text-red">','</small>'); ?>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-xs-12">Photo : <strong class="text-red">*</strong></label>
          <div class="col-md-8">
             <input name="photo" required onchange="previewFile()" type="file" value="<?php echo set_value('photo') ?>" class="form-control " style="width: 100%;"><br>
              <img src="" id="p" alt="Image Preview" width="50%">
            <?php echo form_error('photo','<small class="text-red">','</small>'); ?>
          </div>
        </div>
   
      </div>

      <div class="box-footer with-border">
        <div class="col-md-4 col-xs-5">
          <a href="<?php echo base_url('epengaduan'); ?>" class="btn btn-app pull-right">
            <i class="ion ion-reply"></i> Kembali
          </a>
        </div>
        <div class="col-md-6 col-xs-6">
          <button type="submit" class="btn btn-app pull-right">
            <i class="fa fa-save"></i> Kirim
          </button>
        </div>
      </div>
      <div class="box-footer with-border">
          <small><strong class="text-red">*</strong>  Field wajib diisi!</small> <br>

      </div>
  </form>   
  </div>
</dov>
</div>     
   
</div>

