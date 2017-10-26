<div class="row">
	<div class="col-md-3">
        <?php $this->load->view('setting/nav-sistem-setting'); ?>
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

echo form_open_multipart(site_url('setting/set_logo'), array('class' => 'form-horizontal'));
?>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Logo</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-3">
                        <img src="<?php echo base_url("public/image/logo/{$this->option->get('logo_sistem')}"); ?>" alt="" class="img-thumbnail">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-xs-12">Logo Sistem : <strong class="text-red">*</strong></label>
                    <div class="col-md-8">
                        <input type="file" name="logo_sistem" class="form-control">
                        <p class="help-block"><small><i>Tampil maksimal dengan ukuran 260x50 Pixel</i></small></p>
                    </div>
                </div>
                <div class="form-group"><hr>
                    <div class="col-md-8 col-md-offset-3">
                        <img src="<?php echo base_url("public/image/logo/{$this->option->get('logo_login')}"); ?>" alt="" class="img-thumbnail">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-xs-12">Logo Login : <strong class="text-red">*</strong></label>
                    <div class="col-md-8">
                        <input type="file" name="logo_login" class="form-control">
                        <p class="help-block"><small><i>Tampil maksimal dengan ukuran 370x90 Pixel</i></small></p>
                    </div>
                </div>
                <div class="form-group"><hr>
                    <div class="col-md-8 col-md-offset-3">
                        <img src="<?php echo base_url("public/image/logo/{$this->option->get('logo')}"); ?>" alt="" width="80" class="img-thumbnail">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-xs-12">Logo : <strong class="text-red">*</strong></label>
                    <div class="col-md-8">
                        <input type="file" name="logo" class="form-control">
                        <p class="help-block"><small><i>Tampil maksimal dengan ukuran 400x500 Pixel</i></small></p>
                    </div>
                </div>
                <div class="form-group"><hr>
                    <div class="col-md-8 col-md-offset-3">
                        <img src="<?php echo base_url("public/image/logo/{$this->option->get('small_logo')}"); ?>" alt="" class="img-thumbnail">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-xs-12">Logo Sedang : <strong class="text-red">*</strong></label>
                    <div class="col-md-8">
                        <input type="file" name="small_logo" class="form-control">
                        <p class="help-block"><small><i>Tampil maksimal dengan ukuran 100x100 Pixel</i></small></p>
                    </div>
                </div>
            </div>

            <div class="box-footer with-border">
                <div class="col-md-4 col-xs-5">
                    <a href="<?php echo site_url('user') ?>" class="btn btn-app pull-right">
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

