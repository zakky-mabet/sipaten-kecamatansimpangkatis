<div class="row">
	<div class="col-md-3">
               <div class="box box-solid" id="sticker">
            <div class="box-header with-border">
              	<h3 class="box-title">Pengaturan Sistem</h3>
            </div>
            <div class="box-body no-padding">
              	<ul class="nav nav-pills nav-stacked">
                	<li class="<?php echo active_link_method('index', 'pengatur'); ?>">
                        <a href="<?php echo site_url('administrator/pengatur') ?>">Identitas Kecamatan</a>
                    </li>
                    <li class="<?php echo active_link_method('logo'); ?>">
                        <a href="<?php echo site_url('administrator/pengatur/logo') ?>">Logo</a>
                    </li>
              	</ul>
            </div>
        </div>
	</div>
    <div class="col-md-9">
        <div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
    </div>
	<div class="col-md-9">
<?php  
/**
 * Open Form
 *
 * @var string
 **/

echo form_open_multipart(site_url('administrator/pengatur/set_logo'), array('class' => 'form-horizontal'));
?>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Logo</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-3">
                        <img width="50" src="<?php echo base_url("assets/images/{$this->setting->get('logo-favicon')}"); ?>" alt="" class="img-thumbnail">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-xs-12">Logo Favicon : <strong class="text-red">*</strong></label>
                    <div class="col-md-8">
                        <input type="file" name="logo-favicon" class="form-control">
                        <p class="help-block"><small><i>Tampil maksimal dengan ukuran 50x50 Pixel</i></small></p>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-3">
                        <img width="270" src="<?php echo base_url("assets/images/{$this->setting->get('logo-header')}"); ?>" alt="" class="img-thumbnail">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-xs-12">Logo Header : <strong class="text-red">*</strong></label>
                    <div class="col-md-8">
                        <input type="file" name="logo-header" class="form-control">
                        <p class="help-block"><small><i>Tampil maksimal dengan ukuran 370x90 Pixel</i></small></p>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-3">
                        <img width="270" src="<?php echo base_url("assets/images/{$this->setting->get('logo-footer')}"); ?>" alt="" class="img-thumbnail">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-xs-12">Logo Footer : <strong class="text-red">*</strong></label>
                    <div class="col-md-8">
                        <input type="file" name="logo-footer" class="form-control">
                        <p class="help-block"><small><i>Tampil maksimal dengan ukuran 370x90 Pixel</i></small></p>
                    </div>
                </div>         
               
            </div>

            <div class="box-footer with-border">
                <div class="col-md-4 col-xs-5">
                    <a href="<?php echo site_url('administrator/pengatur') ?>" class="btn btn-app pull-right">
                        <i class="ion ion-reply"></i> Kembali
                    </a>
                </div>
                <div class="col-md-6 col-xs-6">
                    <button type="submit" class="btn btn-app pull-right">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                </div>
            </div>
<?php  
// End Form
echo form_close();
?>
        </div>

    </div>
</div>

