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
echo form_open(site_url('setting/set_identitas'), array('class' => 'form-horizontal'));
?>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Identitas Kecamatan</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label class="control-label col-md-3 col-xs-12">Nama Sistem : <strong class="text-red">*</strong></label>
                    <div class="col-md-8">
                        <input type="text" name="option[nama_sistem]" class="form-control" value="<?php echo $this->option->get('nama_sistem'); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-xs-12">Nama Kecamatan : <strong class="text-red">*</strong></label>
                    <div class="col-md-8">
                        <input type="text" name="option[kecamatan]" class="form-control" value="<?php echo $this->option->get('kecamatan'); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-xs-12">Kode Kecamatan : <strong class="text-red">*</strong></label>
                    <div class="col-md-8">
                        <input type="text" name="option[kode_kecamatan]" class="form-control" value="<?php echo $this->option->get('kode_kecamatan'); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-xs-12">Nomor Telepon : <strong class="text-red">*</strong></label>
                    <div class="col-md-8">
                        <input type="text" name="option[telepon]" class="form-control" value="<?php echo $this->option->get('telepon'); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-xs-12">Kode Pos : <strong class="text-red">*</strong></label>
                    <div class="col-md-8">
                        <input type="text" name="option[kode_pos]" class="form-control" value="<?php echo $this->option->get('kode_pos'); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-xs-12">Fax : <strong class="text-red">*</strong></label>
                    <div class="col-md-8">
                        <input type="text" name="option[fax]" class="form-control" value="<?php echo $this->option->get('fax'); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-xs-12">E-Mail : <strong class="text-red">*</strong></label>
                    <div class="col-md-8">
                        <input type="text" name="option[email]" class="form-control" value="<?php echo $this->option->get('email'); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-xs-12">Alamat : <strong class="text-red">*</strong></label>
                    <div class="col-md-8">
                        <textarea name="option[alamat]" class="form-control" cols="30" rows="3"><?php echo $this->option->get('alamat'); ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-xs-12">Kabupaten : <strong class="text-red">*</strong></label>
                    <div class="col-md-8">
                        <input type="text" name="option[kabupaten]" class="form-control" value="<?php echo $this->option->get('kabupaten'); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-xs-12">Provinsi : <strong class="text-red">*</strong></label>
                    <div class="col-md-8">
                        <input type="text" name="option[provinsi]" class="form-control" value="<?php echo $this->option->get('provinsi'); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-xs-12">Motto : <strong class="text-red">*</strong></label>
                    <div class="col-md-8">
                        <textarea name="option[motto]" class="form-control" cols="30" rows="3"><?php echo $this->option->get('motto'); ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-xs-12">Janji Pelayanan : <strong class="text-red">*</strong></label>
                    <div class="col-md-8">
                        <textarea name="option[janji_pelayanan]" class="form-control" cols="30" rows="3"><?php echo $this->option->get('janji_pelayanan'); ?></textarea>
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

