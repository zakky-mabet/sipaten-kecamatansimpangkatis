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
                    <li class="<?php echo active_link_method('logo', 'setting'); ?>">
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
echo form_open(site_url('administrator/pengatur/set_identitas'), array('class' => 'form-horizontal'));
?>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Identitas Kecamatan</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label class="control-label col-md-3 col-xs-12">Nama Website : <strong class="text-red">*</strong></label>
                    <div class="col-md-8">
                        <input type="text" name="setting[nama-website]" class="form-control" value="<?php echo $this->setting->get('nama-website'); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-xs-12">Nama Kecamatan : <strong class="text-red">*</strong></label>
                    <div class="col-md-8">
                        <input type="text" name="setting[nama-kecamatan]" class="form-control" value="<?php echo $this->setting->get('nama-kecamatan'); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-xs-12">Kode Kecamatan : <strong class="text-red">*</strong></label>
                    <div class="col-md-8">
                        <input type="text" name="setting[kode-kecamatan]" class="form-control" value="<?php echo $this->setting->get('kode-kecamatan'); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-xs-12">Nomor Telepon : <strong class="text-red">*</strong></label>
                    <div class="col-md-8">
                        <input type="text" name="setting[telepon]" class="form-control" value="<?php echo $this->setting->get('telepon'); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-xs-12">Kode Pos : <strong class="text-red">*</strong></label>
                    <div class="col-md-8">
                        <input type="text" name="setting[kode-pos]" class="form-control" value="<?php echo $this->setting->get('kode-pos'); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-xs-12">Fax : <strong class="text-red">*</strong></label>
                    <div class="col-md-8">
                        <input type="text" name="setting[fax]" class="form-control" value="<?php echo $this->setting->get('fax'); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-xs-12">E-Mail : <strong class="text-red">*</strong></label>
                    <div class="col-md-8">
                        <input type="text" name="setting[email]" class="form-control" value="<?php echo $this->setting->get('email'); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-xs-12">Alamat : <strong class="text-red">*</strong></label>
                    <div class="col-md-8">
                        <textarea name="setting[alamat]" class="form-control" cols="30" rows="3"><?php echo $this->setting->get('alamat'); ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-xs-12">Kabupaten : <strong class="text-red">*</strong></label>
                    <div class="col-md-8">
                        <input type="text" name="setting[kabupaten]" class="form-control" value="<?php echo $this->setting->get('kabupaten'); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-xs-12">Provinsi : <strong class="text-red">*</strong></label>
                    <div class="col-md-8">
                        <input type="text" name="setting[provinsi]" class="form-control" value="<?php echo $this->setting->get('provinsi'); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-xs-12">Motto : <strong class="text-red">*</strong></label>
                    <div class="col-md-8">
                        <textarea name="setting[motto]" class="form-control" cols="30" rows="3"><?php echo $this->setting->get('motto'); ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-xs-12">Janji Pelayanan : <strong class="text-red">*</strong></label>
                    <div class="col-md-8">
                        <textarea name="setting[janji-pelayanan]" class="form-control" cols="30" rows="3"><?php echo $this->setting->get('janji-pelayanan'); ?></textarea>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="control-label col-md-3 col-xs-12">Jam Kerja : <strong class="text-red">*</strong></label>
                    <div class="col-md-8">
                      <input type="text" name="setting[jam-kerja]" class="form-control" value="<?php echo $this->setting->get('jam-kerja'); ?>">
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

