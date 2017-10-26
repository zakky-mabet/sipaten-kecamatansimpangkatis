<div <?php echo ($this->agent->is_mobile()) ? 'class="container margin-container" style="padding-top:50px;"' : $browser ="style='padding-top:80px;' class='container'" ; ?>>
 <section class="content ">
 <div class="row">
  <section class="content-header  mar-top-15">
   <!--  <h1>
        <?php echo $crumb ?>
      </h1> -->
       <p>
        <?php echo $this->session->flashdata('pesan'); ?>
      </p>
     <!--  <ol class="breadcrumb">
        <li class="white"><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Beranda</a></li>
        <li class="active white"><?php echo $crumb ?></li>
      </ol> -->
      </section>
      </div>
      <p></p>
    <div class="row">
    <?php 
      foreach ($profil as $row) {
      }
     ?>
        <div class="col-md-3">
          <div class="box box-warning radius">
            <div class="box-body box-profile">
            <a class="kapital" data-toggle="lightbox"  href="<?php echo base_url(); ?>assets/img/img-user/<?php if ($row->photo == NULL ) { echo "avatar.jpg"; } else { echo $row->photo; } ?>" data-title="<?php echo ucfirst($row->nama_lengkap) ?>" data-footer="" >
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url(); ?>assets/img/img-user/<?php if ($row->photo == NULL ) { echo "avatar.jpg"; } else { echo $row->photo; } ?>" alt="<?php echo $row->nama_lengkap ; ?>">
              </a>
              <h3 class="profile-username text-center kapital"><?php echo $row->nama_lengkap ; ?></h3>
              <p class="text-muted text-center"><?php echo $row->email ; ?></p>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b> <small>Pengaduan</small></b> <a href="<?php echo base_url('epengaduan/histori'); ?>" class="pull-right">
                  <?php echo $this->db->where('ID_users',$this->session->userdata('akun_id'))->count_all_results('epengaduan'); ?></a>
                </li>
                <li class="list-group-item">
                  <b> <small>Pelayanan</small></b> <a href="<?php echo base_url('epelayanan/histori'); ?>" class="pull-right">
                  <?php echo $this->db->where('ID_users',$this->session->userdata('akun_id'))->count_all_results('surat'); ?></a>
                </li>
                </ul>
                <div class="form-horizontal">
                <?php echo form_open(base_url('profil/ganti_avatar'),' enctype="multipart/form-data"'); ?>
                     <input type="file" name="photo"  class="form-control"> 
                    <br>
                     <button type="submit" class="btn btn-warning btn-block "><i class="fa fa-save"></i> Ubah Profil</button>
                <?php echo form_close(); ?>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <!-- About Me Box -->
          <div class="box box-warning radius">
            <div class="box-header with-border">
              <h3 class="box-title">Tentang</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-male margin-r-5"></i><small>Pekerjaan</small> </strong>
              <p class="text-muted kapital">
                <small><?php echo $row->pekerjaan  ?></small>
              </p>
              <hr>
              <strong><i class="fa fa-map-marker margin-r-5"></i> <small>Alamat</small></strong>
              <p class="text-muted kapital"><small><?php echo 'desa '. $row->desa . ' RT/RW ' . $row->rt.' / '.$row->rw . ' Kecamatan ' .$row->kecamatan ?></small></p>
              <hr>
              <strong><i class="fa fa-file-text-o margin-r-5"></i> <small>Catatan</small></strong>
              <p><small>Lengkapi Identitas anda sesuai kartu tanda penduduk, ini untuk memudahkan pelayanan anda</small></p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom radius" >
            <ul class="nav nav-tabs ">
              <li><a href="#first" data-toggle="tab"><b>Akun</b></a></li>
              <li><a href="#identitas_penduduk" data-toggle="tab"><b>Identitas Kependudukan</b></a></li>
              <li><a href="#password" data-toggle="tab"><b>Ganti Password</b></a></li>
            </ul>
            <div class="tab-content">
                   <div class="tab-pane active" id="first">
                 <?php echo form_open(base_url('profil/update_akun'),'class="form-horizontal" '); ?>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">&nbsp;</label>
                    <div class="col-sm-10">
                    <br>
                    <b>Akun</b>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label"><small>Username <span class="text-red">*</span></small></label>
                    <div class="col-sm-10">
                      <input type="text" name="username" class="form-control"  value="<?php echo $row->username; ?>" placeholder="Usename">
                      <?php echo form_error('username', '<small class="text-red">', '</small>'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label" ><small>Email <span class="text-red">*</span></small></label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" value="<?php echo $row->email ; ?>" name="email" placeholder="Email">
                       <?php echo form_error('email', '<small class="text-red">', '</small>'); ?>
                    </div>
                  </div>
                 <div class="form-group">
                   <div class="col-md-4 col-xs-6">
                      <button type="reset" class="btn btn-app pull-right">
                        <i class="ion ion-reply"></i> Reset
                      </button>
                    </div>
                    <div class="col-md-6 col-xs-6">
                      <button type="submit" class="btn btn-app pull-right">
                        <i class="fa fa-save"></i> Update
                      </button>
                    </div>
                  </div>
                  <div class="box-footer with-border radius">
                    <small><strong class="text-red">*</strong>  Field wajib diisi!</small> <br>
                    <small><strong class="text-blue">*</strong>  Field tidak wajib diisi!</small> <br>
                  </div>
               <?php echo form_close(); ?>
              </div>
             

         
              <!-- /.tab-pane -->
              <div class="tab-pane active" id="identitas_penduduk">
                 <?php echo form_open(base_url('profil/update_kependudukan'),'class="form-horizontal" enctype="multipart/form-data" '); ?>
                 <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">&nbsp;</label>
                    <div class="col-sm-10">
                    <br>
                    <b>Identitas Kependudukan</b>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label"><small>NIK <strong class="text-red">*</strong></small></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nik"  value="<?php echo $row->nik;?>" placeholder="Masukan Nomor Induk Kependudukan">
                       <?php echo form_error('nik', '<small class="text-red">', '</small>'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label" ><small>No. KK <strong class="text-red">*</strong></small></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="no_kk" value="<?php echo $row->no_kk;?>" placeholder="Masukan Nomor Kartu Keluarga">
                       <?php echo form_error('no_kk', '<small class="text-red">', '</small>'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label"><small>Status KK <strong class="text-red">*</strong></small></label>
                    <div class="col-sm-10">
                       <select class="form-control" style="width: 100%;"  name="shdk">
                         <option selected="selected" class="kapital" value="<?php echo $row->status_kk  ?>"><?php echo ucfirst($row->status_kk);?></option>
                          <option class="kapital" value="Kepala Keluarga">Kepala Keluarga</option>
                          <option class="kapital" value="Istri">Istri</option>
                          <option class="kapital" value="Ayah">Ayah</option>
                          <option class="kapital" value="Ibu">Ibu</option>
                          <option class="kapital" value="Anak">Anak</option>
                      </select>
                       <?php echo form_error('shdk', '<small class="text-red">', '</small>'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label"><small>Nama Lengkap <strong class="text-red">*</strong></small></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control kapital" name="nama_lengkap" value="<?php echo $row->nama_lengkap; ?>  " placeholder="Masukan Nama Lengkap">
                       <?php echo form_error('nama_lengkap', '<small class="text-red">', '</small>'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label"><small>Tempat Lahir <strong class="text-red">*</strong></small></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control kapital" name="tmp_lahir" value="<?php echo $row->tmp_lahir; ?>" placeholder="Masukan Tempat Lahir">
                       <?php echo form_error('tmp_lahir', '<small class="text-red">', '</small>'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label"><small>Tanggal Lahir <strong class="text-red">*</strong></small></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control kapital"  name="tgl_lahir" value="<?php echo $row->tgl_lahir; ?>" id="datepicker" placeholder="Masukan Tanggal Lahir">
                       <?php echo form_error('tgl_lahir', '<small class="text-red">', '</small>'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label"><small>Jenis Kelamin <strong class="text-red">*</strong></small></label>
                    <div class="col-sm-10">
                     <select class="form-control" style="width: 100%;"  name="jns_kelamin">
                         <option selected="selected" class="kapital" value="<?php echo $row->jns_kelamin  ?>"><?php echo ucfirst($row->jns_kelamin);?></option>
                          <option class="kapital" value="laki-laki">Laki-laki</option>
                          <option class="kapital" value="perempuan">perempuan</option>
                      </select>
                       <?php echo form_error('jns_kelamin', '<small class="text-red">', '</small>'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label "><small>Alamat <strong class="text-red">*</strong></small></label>
                    <div class="col-sm-10">
                     <textarea name="alamat" class="form-control kapital" placeholder="Masukan Alamat" ><?php echo $row->alamat; ?> </textarea>
                      <?php echo form_error('alamat', '<small class="text-red">', '</small>'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label"><small>RT <strong class="text-red">*</strong></small></label>
                    <div class="col-sm-10">
                      <input type="text" name="rt" class="form-control kapital col-md-4"  value="<?php echo $row->rt;?>" placeholder=" Masukan RT">
                       <?php echo form_error('rt', '<small class="text-red">', '</small>'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label"><small>RW <strong class="text-red">*</strong></small></label>
                    <div class="col-sm-10">
                      <input type="text" name="rw" class="form-control kapital col-md-4" value="<?php echo $row->rw;?>" placeholder=" Masukan RW">
                       <?php echo form_error('rw', '<small class="text-red">', '</small>'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label"><small>Desa <strong class="text-red">*</strong></small></label>
                    <div class="col-sm-10">
                      <input type="text" name="desa" class="form-control kapital col-md-4" value="<?php echo $row->desa;?>" placeholder=" Masukan Desa">
                       <?php echo form_error('desa', '<small class="text-red">', '</small>'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label"><small>Kecamatan <strong class="text-red">*</strong></small></label>
                    <div class="col-sm-10">
                      <input type="text" name="kecamatan" class="form-control kapital col-md-4" value="<?php echo $row->kecamatan;?>  " placeholder=" Masukan Kecamatan">
                       <?php echo form_error('kecamatan', '<small class="text-red">', '</small>'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label"><small>Agama <strong class="text-red">*</strong></small></label>
                    <div class="col-sm-10 kapital">
                     <select class="form-control" style="width: 100%;"  name="agama">
                      <option selected="selected" class="kapital" value="<?php echo $row->agama  ?>"><?php echo ucfirst($row->agama);?></option>
                      <?php foreach ($agama as $value) { ?>
                        <option class="kapital" value="<?php echo $value->agama  ?>"><?php echo ucfirst($value->agama);?></option>
                      <?php } ?>  
                      </select>
                       <?php echo form_error('agama', '<small class="text-red">', '</small>'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label"><small>Pekerjaan <strong class="text-red">*</strong></small></label>
                    <div class="col-sm-10">
                      <input type="text" name="pekerjaan" class="form-control kapital col-md-4" value="<?php echo $row->pekerjaan;?>" placeholder=" Masukan Pekerjaan">
                       <?php echo form_error('pekerjaan', '<small class="text-red">', '</small>'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label"><small>Kewarganegaraan <strong class="text-red">*</strong></small></label>
                    <div class="col-sm-10">
                      <select class="form-control" style="width: 100%;"  name="kewarganegaraan">
                         <option selected="selected" class="kapital" value="<?php echo $row->kewarganegaraan  ?>"><?php echo strtoupper($row->kewarganegaraan);?></option>
                          <option class="kapital" value="wni">WNI</option>
                          <option class="kapital" value="wna">WNA</option>
                      </select>
                       <?php echo form_error('kewarganegaraan', '<small class="text-red">', '</small>'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label"><small>Status Perkawinan <strong class="text-red">*</strong></small></label>
                    <div class="col-sm-10">
                       <select class="form-control" style="width: 100%;"  name="status_kawin">
                         <option selected="selected" class="kapital" value="<?php echo $row->status_kawin  ?>"><?php echo ucfirst($row->status_kawin);?></option>
                          <option class="kapital" value="kawin">Kawin</option>
                          <option class="kapital" value="belum kawin">Belum Kawin</option>
                          <option class="kapital" value="janda">Janda</option>
                          <option class="kapital" value="duda">Duda</option>
                          <option class="kapital" value="cerai mati">Cerai Mati</option>
                      </select>
                       <?php echo form_error('status_kawin', '<small class="text-red">', '</small>'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label"><small>Golongan Darah <strong class="text-red">*</strong></small></label>
                    <div class="col-sm-10">
                      <select class="form-control" style="width: 100%;"  name="gol_darah">
                         <option selected="selected" class="kapital" value="<?php echo $row->gol_darah  ?>"><?php echo ucfirst($row->gol_darah);?></option>
                          <option class="kapital" value="A">A</option>
                          <option class="kapital" value="B">B</option>
                          <option class="kapital" value="AB">AB</option>
                          <option class="kapital" value="O">O</option>
                      </select>
                       <?php echo form_error('gol_darah', '<small class="text-red">', '</small>'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label"><small>Foto Ktp <strong class="text-blue">*</strong></small></label>
                    <div class="col-sm-10">
                      <input name="photo_ktp"  type="file" class=" form-control " style="width: 100%;">
                      <br>
                      <?php

                       if ($row->photo_ktp == NULL)  { ?>
                        <a href="<?php echo base_url('assets/img/img-ktp/avatar.jpg'); ?>" data-toggle="lightbox" data-title="Belum ada foto">
                        <img src="<?php echo base_url('assets/img/img-ktp/avatar.jpg'); ?>" alt="image penduduk" width="20%" ></a>
                    <?php  } else { ?>
                      <a href="<?php echo base_url('assets/img/img-ktp/'.$row->photo_ktp); ?>" data-toggle="lightbox" data-title="<?php echo ucwords($row->nama_lengkap); ?>">
                        <img src="<?php echo base_url('assets/img/img-ktp/'.$row->photo_ktp); ?>" alt="image penduduk" width="20%" ></a>
                     <?php }?>
                    </div>
                  </div>
              
                  <div class="form-group">
                   <div class="col-md-4 col-xs-6">
                      <button type="reset" class="btn btn-app pull-right">
                        <i class="ion ion-reply"></i> Reset
                      </button>
                    </div>
                    <div class="col-md-6 col-xs-6">
                      <button type="submit" class="btn btn-app pull-right">
                        <i class="fa fa-save"></i> Update
                      </button>
                    </div>
                  </div>
                  <div class="box-footer with-border radius">
                    <small><strong class="text-red">*</strong>  Field wajib diisi!</small> <br>
                    <small><strong class="text-blue">*</strong>  Field tidak wajib diisi!</small> <br>
                  </div>
                  </div>
                  </form>
                   <!-- /.tab-pane -->
              <div class="tab-pane active" id="password">
                <?php echo form_open(base_url('profil/update_password'),'class="form-horizontal" '); ?>
                    <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">&nbsp;</label>
                    <div class="col-sm-10">
                    <br>
                    <b>Ganti Password</b>
                    </div>
                  </div>  
                    <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label"><small>Sandi Lama <span class="text-red">*</span></small></label>
                        <div class="col-sm-10">
                          <input type="password" value="<?php echo set_value('sandi_lama') ?>" name="sandi_lama" class="form-control"  placeholder="Sandi Lama">
                           <?php echo form_error('sandi_lama', '<small class="text-red">', '</small>'); ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label"><small>Sandi Baru <span class="text-red">*</span></small></label>
                        <div class="col-sm-10">
                          <input type="password" value="<?php echo set_value('sandi_baru') ?>" name="sandi_baru" class="form-control"  placeholder="Sandi Baru">
                           <?php echo form_error('sandi_baru', '<small class="text-red">', '</small>'); ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label"><small>Ulangi Sandi Baru <span class="text-red">*</span></small></label>
                        <div class="col-sm-10">
                          <input type="password" value="<?php echo set_value('ulangi_sandi_baru') ?>" name="ulangi_sandi_baru" class="form-control"  placeholder="Ulangi Sandi Baru">
                           <?php echo form_error('ulangi_sandi_baru', '<small class="text-red">', '</small>'); ?>
                        </div>
                      </div>
                      <div class="form-group">
                       <div class="col-md-4 col-xs-6">
                          <button type="reset" class="btn btn-app pull-right">
                            <i class="ion ion-reply"></i> Reset
                          </button>
                        </div>
                        <div class="col-md-6 col-xs-6">
                          <button type="submit" class="btn btn-app pull-right">
                            <i class="fa fa-save"></i> Update
                          </button>
                        </div>
                      </div>
                      <div class="box-footer with-border">
                        <small><strong class="text-red">*</strong>  Field wajib diisi!</small> <br>
                        <small><strong class="text-blue">*</strong>  Field tidak wajib diisi!</small> <br>
                      </div>
                  </form>    
              </div>

                
                
              </div>
              <!-- /.tab-pane -->

            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

</section>
  

</div>

