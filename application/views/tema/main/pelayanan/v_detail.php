<div <?php echo ($this->agent->is_mobile()) ? 'class="container margin-container" style="padding-top:50px;"': $browser ="style='padding-top:80px;' class='container'"; ?>>
 <div class="row">
	 <div class="box box-success radius">
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
            <li class="white"><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Beranda</a></li>
             <li><a href="<?php echo base_url('epelayanan'); ?>">Epelayanan</a></li>
            <li class="active white"><?php echo $crumb ?></li>
          </ol>
     	  </section>
        </div>
    </div>
  <div class="box-body">
    <div class="col-md-12">
     <?php 
        if (empty($detail_layanan)) {
            echo "<div class='alert alert-danger alert-dismissible animated fadein' role='alert'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><i class='fa fa-icon'></i>Maaf, Data yang anda cari Belum Ada  !</div>
        ";  
        redirect('epelayanan/histori','refresh');
          } else {
            foreach ($detail_layanan as $value) {
               if ($value->status == 'no') {
                      $color = 'warning';
                      $juduls = 'Belum Ditindaklanjuti';
                    } elseif(($value->status == 'yes') OR ($value->status == 'read')) {
                      $color = 'success';
                      $juduls = 'Ditindaklanjuti';
                    }
             $d_surat   = json_decode($value->isi_surat);  
             $d_berkas  = json_decode($value->berkas_syarat);  
           ?>
    <div class="col-md-9 col-xs-12">
    <?php 
            if ($value->kode_surat == 48) { // Surat Keterangan tidak mampu ?> 
      <table class="table table-bordered table-striped ">
                <tr>
                  <th class="font-title" style="width: 20%">ID Pelayanan</th>
                  <td><a href="#"><?php echo $value->ID_pelayanan  ?></a></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">NIK</th>
                  <td><?php echo $value->nik  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Nama Lengkap</th>
                  <td class="kapital"><?php echo $d_surat->nama_lengkap  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tempat Lahir</th>
                  <td><?php echo $d_surat->tmp_lahir  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Lahir</th>
                  <td><?php echo $d_surat->tgl_lahir  ?></td>
                </tr>
                <tr>
                  <th  class="font-title" style="width: 20%">Jenis Kelamin</th>
                  <td><?php echo $d_surat->jns_kelamin  ?></td>
                </tr>
                <tr>
                  <th class="font-title"style="width: 20%">Pekerjaan</th>
                  <td><?php echo $d_surat->pekerjaan  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Alamat</th>
                  <td><?php echo $d_surat->alamat  ?></td>
                </tr>
               
                <tr>
                  <th colspan="2" class="text-blue">Surat Pengantar dari kelurahan / Desa</th>
                </tr>
                <tr>
                  <th  class="font-title" style="width: 20%">Nomor Surat</th>
                  <td><?php echo $d_surat->no_surat_rek  ?></td>
                </tr>
                 <tr>
                  <th  class="font-title" style="width: 20%">Tanggal Surat</th>
                  <td><?php echo $d_surat->tgl_surat_rek  ?></td>
                </tr>
                <tr>
                  <th  class="font-title" style="width: 20%">Nama Desa</th>
                  <td><?php echo $d_surat->desa  ?></td>
                </tr>
                <tr>
                  <th colspan="2" class="text-blue">Tanda Tangan Kades / Lurah </th>
                </tr>
                <tr>
                  <th  class="font-title" style="width: 20%">Nama Pejabat Lurah/ Kades</th>
                  <td><?php echo $d_surat->pejabat_lurah  ?></td>
                </tr>
                 <tr>
                  <th  class="font-title" style="width: 20%">NIP</th>
                  <td><?php echo $d_surat->nip_pejabat_lurah  ?></td>
                </tr>
                 <tr>
                  <th  class="font-title" style="width: 20%">Jabatan</th>
                  <td><?php echo $d_surat->jabatan_pejabat_lurah ?></td>
                </tr>
                <tr>
                  <th colspan="2" class="text-blue">Info Pelayanan</th>
                </tr>
                <tr>
                  <th  class="font-title" style="width: 20%">Keperluan</th>
                  <td><?php echo $d_surat->keperluan ?></td>
                </tr>
                <tr>
                  <th colspan="2" class="text-blue">Info Pelayanan</th>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Post </th>
                  <td><?php echo $value->waktu_mulai  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Terverivikasi </th>
                  <td>
                  <?php   
                    if ($value->waktu_selesai  == NULL) {
                      echo '-';
                    }
                    else{ echo $value->waktu_selesai;  }
                  ?>
                  </td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Kategori Surat</th>
                  <td><?php echo $value->nama_kategori  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Status</th>
                  <td><span class="btn btn-xs btn-<?php echo $color ?> "><?php echo $juduls  ?></span></td>
                </tr>
      </table>
      <?php } // Surat Keterangan tidak mampu ?>

     <?php if ($value->kode_surat == 503) { // Surat Keterangan Kelakuan baik ?>
      <table class="table table-bordered table-striped ">
                <tr>
                  <th class="font-title" style="width: 20%">ID Pelayanan</th>
                  <td><a href="#"><?php echo $value->ID_pelayanan  ?></a></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">NIK</th>
                  <td><?php echo $value->nik  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Nama Lengkap</th>
                  <td><?php echo $d_surat->nama_lengkap  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tempat Lahir</th>
                  <td><?php echo $d_surat->tmp_lahir  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Lahir</th>
                  <td><?php echo $d_surat->tgl_lahir  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Jenis Kelamin</th>
                  <td><?php echo $d_surat->jns_kelamin  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Pekerjaan</th>
                  <td><?php echo $d_surat->pekerjaan  ?></td>
                </tr>
                
                <tr>
                  <th class="font-title" style="width: 20%">Alamat</th>
                  <td><?php echo $d_surat->alamat  ?></td>
                </tr>
                 <tr>
                  <th colspan="2" class="text-blue">Surat Pengantar dari kelurahan / Desa</th>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Nomor Surat</th>
                  <td><?php echo $d_surat->no_surat ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Surat</th>
                  <td><?php echo $d_surat->tanggal_surat ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Desa</th>
                  <td><?php echo $d_surat->desa ?></td>
                </tr>
                 <tr>
                  <th colspan="2" class="text-blue">Keterangan Keperluan</th>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Keperluan</th>
                  <td class="kapital"><?php echo $d_surat->keperluan  ?></td>
                </tr>
                 <tr>
                  <th colspan="2" class="text-blue">Info Pelayanan</th>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Post </th>
                  <td><?php echo $value->waktu_mulai  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Terverivikasi </th>
                  <td>
                  <?php   
                    if ($value->waktu_selesai  == NULL) {
                      echo '-';
                    }
                    else{ echo $value->waktu_selesai;  }
                  ?>
                    
                  </td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Kategori Surat</th>
                  <td><?php echo $value->nama_kategori  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Status</th>
                  <td><span class="btn btn-xs btn-<?php echo $color ?> "><?php echo $juduls  ?></span></td>
                </tr>
      </table>
      <?php }  // Surat Keterangan Kelakuan baik?>
    
     <?php 
            if ($value->kode_surat == 12) { // Surat rekomendasi Keterangan usaha ?> 
      <table class="table table-bordered table-striped ">
                <tr>
                  <th class="font-title" style="width: 20%">ID Pelayanan</th>
                  <td><a href="#"><?php echo $value->ID_pelayanan  ?></a></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">NIK</th>
                  <td><?php echo $value->nik  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Nama Lengkap</th>
                  <td><?php echo $d_surat->nama_lengkap  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tempat Lahir</th>
                  <td><?php echo $d_surat->tmp_lahir  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Lahir</th>
                  <td><?php echo $d_surat->tgl_lahir  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Jenis Kelamin</th>
                  <td><?php echo $d_surat->jns_kelamin  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Agama</th>
                  <td><?php echo $d_surat->agama  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Pekerjaan</th>
                  <td><?php echo $d_surat->pekerjaan  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Desa</th>
                  <td><?php echo $d_surat->desa ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Alamat Pemohon </th>
                  <td><?php echo $d_surat->alamat  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Alamat Usaha </th>
                  <td><?php echo $d_surat->alamat_usaha  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Keperluan</th>
                  <td><?php echo $d_surat->usaha  ?></td>
                </tr>
                <tr>
                  <th colspan="2" class="text-blue">Surat Keterangan Usaha dari Kades / Lurah</th>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Nama Pejabat Lurah / Kades</th>
                  <td><?php echo $d_surat->pejabat_lurah  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">NIP </th>
                  <td><?php echo $d_surat->nip_pejabat_lurah  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Jabatan</th>
                  <td><?php echo $d_surat->jabatan_pejabat_lurah  ?></td>
                </tr>
                <tr>
                  <th colspan="2" class="text-blue">Info Pelayanan</th>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Post </th>
                  <td><?php echo $value->waktu_mulai  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Terverivikasi </th>
                  <td>
                  <?php   
                    if ($value->waktu_selesai  == NULL) {
                      echo '-';
                    }
                    else{ echo $value->waktu_selesai;  }
                  ?>
                    
                  </td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Kategori Surat</th>
                  <td><?php echo $value->nama_kategori  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Status</th>
                  <td><span class="btn btn-xs btn-<?php echo $color ?> "><?php echo $juduls  ?></span></td>
                </tr>
      </table>
      <?php } // Surat rekomendasi Keterangan usaha ?>

      <?php 
            if ($value->kode_surat == 11) { // Surat Izin Gangguan ?> 
      <table class="table table-bordered table-striped ">
                <tr>
                  <th class="font-title" style="width: 20%">ID Pelayanan</th>
                  <td><a href="#"><?php echo $value->ID_pelayanan  ?></a></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">NIK</th>
                  <td><?php echo $value->nik  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Nama Lengkap</th>
                  <td><?php echo $d_surat->nama_lengkap  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tempat Lahir</th>
                  <td><?php echo $d_surat->tmp_lahir  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Lahir</th>
                  <td><?php echo $d_surat->tgl_lahir  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Jenis Kelamin</th>
                  <td><?php echo $d_surat->jns_kelamin  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Agama</th>
                  <td><?php echo $d_surat->agama  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Pekerjaan</th>
                  <td><?php echo $d_surat->pekerjaan  ?></td>
                </tr>
            
                <tr>
                  <th class="font-title" style="width: 20%">Alamat Pemohon </th>
                  <td><?php echo $d_surat->alamat_pemohon  ?></td>
                </tr>
                <tr>
      <th colspan="2" class="text-blue">Sedang / Akan melakukan kegiatan Gangguan sebagai berikut </th>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Nama Toko/Perushaan</th>
                  <td><?php echo $d_surat->nama_toko ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Alamat Usaha </th>
                  <td><?php echo $d_surat->alamat_usaha  ?></td>
                </tr>
               <tr>
                  <th class="font-title" style="width: 20%">Jenis Kegiatan</th>
                  <td><?php echo $d_surat->jenis_kegiatan ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Jenis Bangunan</th>
                  <td><?php echo $d_surat->jenis_bangunan ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Lokasi Bangunan</th>
                  <td><?php echo $d_surat->lokasi_bangunan ?></td>
                </tr>
                <tr>
                  <th colspan="2" class="text-blue">Surat Rekomendasi Kades / Lurah</th>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Nomor Surat</th>
                  <td><?php echo $d_surat->no_surat ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Surat</th>
                  <td><?php echo $d_surat->tgl_surat ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Desa</th>
                  <td><?php echo $d_surat->desa ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Nama Lurah/ Kades</th>
                  <td><?php echo $d_surat->nama_lurah ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Jabatan Lurah/ Kades</th>
                  <td><?php echo $d_surat->jabatan_lurah ?></td>
                </tr>
                <tr>
                  <th colspan="2" class="text-blue">Info Pelayanan</th>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Post </th>
                  <td><?php echo $value->waktu_mulai  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Terverivikasi </th>
                  <td>
                  <?php   
                    if ($value->waktu_selesai  == NULL) {
                      echo '-';
                    }
                    else{ echo $value->waktu_selesai;  }
                  ?>
                    
                  </td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Kategori Surat</th>
                  <td><?php echo $value->nama_kategori  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Status</th>
                  <td><span class="btn btn-xs btn-<?php echo $color ?> "><?php echo $juduls  ?></span></td>
                </tr>
      </table>
      <?php } // Surat Izin Gangguan ?>


      <?php 
            if ($value->kode_surat == 13) { //  Perpanjangan Izin Oprasional ?> 
      <table class="table table-bordered table-striped ">
                <tr>
                  <th class="font-title" style="width: 20%">ID Pelayanan</th>
                  <td><a href="#"><?php echo $value->ID_pelayanan  ?></a></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">NIK</th>
                  <td><?php echo $value->nik  ?></td>
                </tr>
                 <tr>
                  <th colspan="2" class="text-blue">Keterangan Lembaga</th>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Nama Lembaga</th>
                  <td><?php echo $d_surat->nama_lembaga ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Nama Pengelola</th>
                  <td><?php echo $d_surat->nama_pengelola ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Alamat </th>
                  <td><?php echo $d_surat->alamat ?></td>
                </tr>
                 <tr>
                  <th colspan="2" class="text-blue">Surat Rekomendasi dari pengelola</th>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Nomor Surat  </th>
                  <td><?php echo $d_surat->nomor_surat ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Surat </th>
                  <td><?php echo $d_surat->tanggal_surat ?></td>
                </tr>
                 <tr>
                  <th colspan="2" class="text-blue">Info Pelayanan</th>
                </tr>
                
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Post </th>
                  <td><?php echo $value->waktu_mulai  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Terverivikasi </th>
                  <td>
                  <?php   
                    if ($value->waktu_selesai  == NULL) {
                      echo '-';
                    }
                    else{ echo $value->waktu_selesai;  }
                  ?>
                    
                  </td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Kategori Surat</th>
                  <td><?php echo $value->nama_kategori  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Status</th>
                  <td><span class="btn btn-xs btn-<?php echo $color ?> "><?php echo $juduls  ?></span></td>
                </tr>
      </table>
      <?php } //  Perpanjangan Izin Oprasional ?>
      <?php 
            if ($value->kode_surat == 8) { //  rp izin kramaian?> 
      <table class="table table-bordered table-striped ">
                <tr>
                  <th class="font-title" style="width: 20%">ID Pelayanan</th>
                  <td><a href="#"><?php echo $value->ID_pelayanan  ?></a></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">NIK</th>
                  <td><?php echo $value->nik  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Nama Lengkap</th>
                  <td class="kapital"><?php echo $d_surat->nama_lengkap  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tempat Lahir</th>
                  <td class="kapital"><?php echo $d_surat->tmp_lahir  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Lahir</th>
                  <td class="kapital"><?php echo $d_surat->tgl_lahir  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Jenis Kelamin</th>
                  <td class="kapital"><?php echo $d_surat->jns_kelamin  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Agama</th>
                  <td class="kapital"><?php echo $d_surat->agama  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Pekerjaan</th>
                  <td class="kapital"><?php echo $d_surat->pekerjaan  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Desa </th>
                  <td class="kapital"><?php echo $d_surat->desa ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Alamat Pemohon</th>
                  <td><?php echo $d_surat->alamat_pemohon  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Keperluan</th>
                  <td><?php echo $d_surat->keperluan  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Nomor Surat</th>
                  <td><?php echo $d_surat->no_surat  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Surat</th>
                  <td><?php echo $d_surat->tanggal_surat  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Hari Acara</th>
                  <td><?php echo $d_surat->hari ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Acara</th>
                  <td><?php echo $d_surat->tgl_acara ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Mulai Pukul</th>
                  <td><?php echo $d_surat->mulai_pukul  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Sampai Pukul</th>
                  <td><?php echo $d_surat->sampai_pukul  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tempat Acara</th>
                  <td><?php echo $d_surat->tempat_acara  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Hiburan</th>
                  <td><?php echo $d_surat->hiburan ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Post </th>
                  <td><?php echo $value->waktu_mulai  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Terverivikasi </th>
                  <td>
                  <?php   
                    if ($value->waktu_selesai  == NULL) {
                      echo '-';
                    }
                    else{ echo $value->waktu_selesai;  }
                  ?>
                    
                  </td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Kategori Surat</th>
                  <td><?php echo $value->nama_kategori  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Status</th>
                  <td><span class="btn btn-xs btn-<?php echo $color ?> "><?php echo $juduls  ?></span></td>
                </tr>
      </table>
      <?php } //  keramain ?>

       <?php 
            if ($value->kode_surat == 2) { //   domisili perusahaan?> 
      <table class="table table-bordered table-striped ">
                <tr>
                  <th class="font-title" style="width: 20%">ID Pelayanan</th>
                  <td><a href="#"><?php echo $value->ID_pelayanan  ?></a></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">NIK</th>
                  <td><?php echo $value->nik  ?></td>
                </tr>
      
                <tr>
                  <th class="font-title" style="width: 20%">Desa/Kelurahan </th>
                  <td class="kapital"><?php echo $d_surat->desa ?></td>
                </tr>
                
                <tr>
                  <th class="font-title" style="width: 20%">Nomor Surat</th>
                  <td><?php echo $d_surat->no_surat  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Surat</th>
                  <td><?php echo $d_surat->tanggal_surat  ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Nama Perusahaan</th>
                  <td><?php echo $d_surat->nama_perusahaan  ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%"> Desa Perusahaan</th>
                  <td><?php echo $d_surat->desa_perusahaan  ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Alamat Perusahaan</th>
                  <td><?php echo $d_surat->alamat_perusahaan  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Post </th>
                  <td><?php echo $value->waktu_mulai  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Terverivikasi </th>
                  <td>
                  <?php   
                    if ($value->waktu_selesai  == NULL) {
                      echo '-';
                    }
                    else{ echo $value->waktu_selesai;  }
                  ?>
                    
                  </td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Kategori Surat</th>
                  <td><?php echo $value->nama_kategori  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Status</th>
                  <td><span class="btn btn-xs btn-<?php echo $color ?> "><?php echo $juduls  ?></span></td>
                </tr>
      </table>
      <?php } //  domisili perusahaan?>

       <?php 
            if ($value->kode_surat == 10) { // Surat imk?> 
      <table class="table table-bordered table-striped ">
                <tr>
                  <th class="font-title" style="width: 20%">ID Pelayanan</th>
                  <td><a href="#"><?php echo $value->ID_pelayanan  ?></a></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">NIK</th>
                  <td><?php echo $value->nik  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Nama Lengkap</th>
                  <td><?php echo $d_surat->nama_lengkap  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Alamat</th>
                  <td class="kapital"><?php echo $d_surat->alamat  ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Nomor Telepon/HP</th>
                  <td class="kapital"><?php echo $d_surat->no_hp  ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Nama Perusahaan</th>
                  <td class="kapital"><?php echo $d_surat->nama_perusahaan  ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Bentuk Perusahaan</th>
                  <td class="kapital"><?php echo $d_surat->bentuk_perusahaan  ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">NPWP Perushaan</th>
                  <td class="kapital"><?php echo $d_surat->npwp_perusahaan  ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Kegiatan Usaha</th>
                  <td class="kapital"><?php echo $d_surat->kegiatan_usaha  ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Sarana Usaha</th>
                  <td class="kapital"><?php echo $d_surat->sarana_usaha  ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Alamat Usaha</th>
                  <td class="kapital"><?php echo $d_surat->alamat_usaha  ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Jumlah Modal Usaha</th>
                  <td class="kapital"><?php echo 'Rp.'.  number_format($d_surat->modal_usaha,0,'.','.');  ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">No. Pendaftaran Perusahaan</th>
                  <td class="kapital"><?php echo $d_surat->nomor_pendaftaran  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Post </th>
                  <td><?php echo $value->waktu_mulai  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Terverivikasi </th>
                  <td>
                  <?php   
                    if ($value->waktu_selesai  == NULL) {
                      echo '-';
                    }
                    else{ echo $value->waktu_selesai;  }
                  ?>
                    
                  </td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Kategori Surat</th>
                  <td><?php echo $value->nama_kategori  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Status</th>
                  <td><span class="btn btn-xs btn-<?php echo $color ?> "><?php echo $juduls  ?></span></td>
                </tr>
      </table>
      <?php } // Surat rekomendasi Keterangan usaha ?>

       <?php 
            if ($value->kode_surat == 5) { // Surat rekomendasi bersih lingkungan ?> 
      <table class="table table-bordered table-striped ">
                <tr>
                  <th class="font-title" style="width: 20%">ID Pelayanan</th>
                  <td><a href="#"><?php echo $value->ID_pelayanan  ?></a></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Lurah</th>
                  <td class="kapital"><?php echo $d_surat->desa  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Nomor Surat</th>
                  <td class="kapital"><?php echo $d_surat->nomor_surat  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Surat</th>
                  <td class="kapital"><?php echo $d_surat->tanggal_surat  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">NIK</th>
                  <td><?php echo $value->nik  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Nama Lengkap</th>
                  <td><?php echo $d_surat->nama_lengkap  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tempat Lahir</th>
                  <td><?php echo $d_surat->tmp_lahir  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Lahir</th>
                  <td class="kapital"><?php echo $d_surat->tgl_lahir  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Jenis Kelamin</th>
                  <td class="kapital"><?php echo $d_surat->jns_kelamin  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Kewarganegaraan</th>
                  <td class="kapital"><?php echo $d_surat->kewarganegaraan  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Pekerjaan</th>
                  <td class="kapital"><?php echo $d_surat->pekerjaan  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Alamat</th>
                  <td class="kapital"><?php echo $d_surat->alamat  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Keperluan</th>
                  <td class="kapital"><?php echo $d_surat->keperluan  ?></td>
                </tr>
                
                 
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Post </th>
                  <td><?php echo $value->waktu_mulai  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Terverivikasi </th>
                  <td>
                  <?php   
                    if ($value->waktu_selesai  == NULL) {
                      echo '-';
                    }
                    else{ echo $value->waktu_selesai;  }
                  ?>
                    
                  </td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Kategori Surat</th>
                  <td><?php echo $value->nama_kategori  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Status</th>
                  <td><span class="btn btn-xs btn-<?php echo $color ?> "><?php echo $juduls  ?></span></td>
                </tr>
      </table>
      <?php } // Surat rekomendasi bersih lingkungan?>
       <?php 
            if ($value->kode_surat == 19) { // skw ?> 
      <table class="table table-bordered table-striped ">
                <tr>
                  <th class="font-title" style="width: 20%">ID Pelayanan</th>
                  <td><a href="#"><?php echo $value->ID_pelayanan  ?></a></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Nik Pemohon</th>
                  <td><?php echo $value->nik  ?></td>
                </tr>
                <tr>
                  <th colspan="2" class="text-blue">Surat Keterangan dari Kades / Lurah :</th>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Nama Lurah / Kades</th>
                  <td class="kapital"><?php echo $d_surat->nama_kades  ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">NIP</th>
                  <td class="kapital"><?php echo $d_surat->nip  ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Pangkat/Golongan</th>
                  <td class="kapital"><?php echo $d_surat->nip  ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Jabatan</th>
                  <td class="kapital"><?php echo $d_surat->jabatan  ?></td>
                </tr>
                <tr>
                  <th colspan="2" class="text-blue">Surat Pernyataan Para Ahli Waris</th>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Tanggal</th>
                  <td class="kapital"><?php echo $d_surat->tanggal  ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Diketahui Oleh</th>
                  <td class="kapital"><?php echo $d_surat->diketahui  ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Tanggal diketahui </th>
                  <td class="kapital"><?php echo $d_surat->tanggal_diketahui  ?></td>
                </tr>
                 <tr>
                  <th colspan="2" class="text-blue">Akta Kematian</th>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Nomor Akta</th>
                  <td class="kapital"><?php echo $d_surat->nomor_akta  ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Ditandatangani oleh</th>
                  <td class="kapital"><?php echo $d_surat->ditandatangani  ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Tanggal</th>
                  <td class="kapital"><?php echo $d_surat->tanggal_kematian  ?></td>
                </tr>
                 <tr>
                  <th colspan="2" class="text-blue">Keterangan Kematian</th>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Nama</th>
                  <td class="kapital"><?php echo $d_surat->nama_kematian  ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Umur</th>
                  <td class="kapital"><?php echo $d_surat->umur .' Tahun'  ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Alamat</th>
                  <td class="kapital"><?php echo $d_surat->alamat  ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Hari Kematian</th>
                  <td class="kapital"><?php echo $d_surat->hari  ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Tanggal</th>
                  <td class="kapital"><?php echo $d_surat->tanggal_keterangan_kematian  ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Di/ Tempat</th>
                  <td class="kapital"><?php echo $d_surat->ditempat ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Post </th>
                  <td><?php echo $value->waktu_mulai  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Terverivikasi </th>
                  <td>
                  <?php   
                    if ($value->waktu_selesai  == NULL) {
                      echo '-';
                    }
                    else{ echo $value->waktu_selesai;  }
                  ?>
                    
                  </td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Kategori Surat</th>
                  <td><?php echo $value->nama_kategori  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Status</th>
                  <td><span class="btn btn-xs btn-<?php echo $color ?> "><?php echo $juduls  ?></span></td>
                </tr>
      </table>
      <?php } // Skw?>
      <?php 
            if ($value->kode_surat == 3) { // kts?> 
      <table class="table table-bordered table-striped ">
                <tr>
                  <th class="font-title" style="width: 20%">ID Pelayanan</th>
                  <td><a href="#"><?php echo $value->ID_pelayanan  ?></a></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">NIK Pemohon</th>
                  <td><?php echo $value->nik ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Nama Lengkap Pemohon  </th>
                  <td><?php echo $d_surat->nama_lengkap ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Nomor Kartu Keluarga </th>
                  <td><?php echo $d_surat->nokk ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Tempat, Tanggal Lahir  </th>
                  <td><?php echo $d_surat->tmp_lahir. ', '. $d_surat->tgl_lahir  ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Jenis Kelamin </th>
                  <td><?php echo $d_surat->jns_kelamin ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Status Perkawinan </th>
                  <td><?php echo $d_surat->status_perkawinan ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">No. dan Tanggal Masuk</th>
                  <td><?php echo $d_surat->nomor_masuk.' - '.$d_surat->tanggal_masuk ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Asal Desa</th>
                  <td><?php echo $d_surat->desa ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Alamat Asal</th>
                  <td><?php echo $d_surat->alamat_asal ?></td>
                </tr>
                 <tr>
                  <th colspan="2" class="text-blue">Alamat Sekarang</th>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Alamat Pindah</th>
                  <td><?php echo $d_surat->alamat_pindah ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Desa/Kelurahan </th>
                  <td><?php echo $d_surat->desa_kelurahan ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Kecamatan </th>
                  <td><?php echo $d_surat->kecamatan ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Kab/Kota </th>
                  <td><?php echo $d_surat->kabupaten ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Provinsi </th>
                  <td><?php echo $d_surat->provinsi ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Kode Pos </th>
                  <td><?php echo $d_surat->kode_pos ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Alasan Pindah </th>
                  <td><?php echo $d_surat->alasan_pindah ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Golongan Darah </th>
                  <td><?php echo $d_surat->darah ?></td>
                </tr>
                  <tr>
                  <th colspan="2" class="text-blue">Penanggung Jawab </th>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">NIK </th>
                  <td><?php echo $d_surat->nik_penanggung ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Nama Lengkap </th>
                  <td><?php echo $d_surat->nama_penanggung ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Alamat </th>
                  <td><?php echo $d_surat->alamat_penanggung ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Pekerjaan </th>
                  <td><?php echo $d_surat->pekerjaan_penanggung ?></td>
                </tr>

                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Post </th>
                  <td><?php echo $value->waktu_mulai  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Terverivikasi </th>
                  <td>
                  <?php   
                    if ($value->waktu_selesai  == NULL) {
                      echo '-';
                    }
                    else{ echo $value->waktu_selesai;  }
                  ?>
                  </td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Kategori Surat</th>
                  <td><?php echo $value->nama_kategori  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Status</th>
                  <td><span class="btn btn-xs btn-<?php echo $color ?> "><?php echo $juduls  ?></span></td>
                </tr>
      </table>
      <?php } //kts?>

       <?php 
            if ($value->kode_surat == 9) { // imb?> 
      <table class="table table-bordered table-striped ">
                <tr>
                  <th class="font-title" style="width: 20%">ID Pelayanan</th>
                  <td><a href="#"><?php echo $value->ID_pelayanan  ?></a></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">NIK Pemohon</th>
                  <td><?php echo $value->nik ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Nama Lengkap Pemohon  </th>
                  <td><?php echo $d_surat->nama_lengkap ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tempat, Tanggal Lahir  </th>
                  <td><?php echo $d_surat->tmp_lahir. ', '. $d_surat->tgl_lahir  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Jenis Kelamin </th>
                  <td><?php echo $d_surat->jns_kelamin ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Alamat </th>
                  <td><?php echo $d_surat->alamat ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">No Telepon/HP</th>
                  <td><?php echo $d_surat->no_hp ?></td>
                </tr>

                 <tr>
                  <th colspan="2" class="text-blue">Sedang / akan melakukan kegiatan Mendirikan Bangunan</th>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Nama Perusahaan </th>
                  <td><?php echo $d_surat->nama_perusahaan ?></td>
                </tr>
                  <tr>
                  <th class="font-title" style="width: 20%">Alamat Perusahaan </th>
                  <td><?php echo $d_surat->alamat_perusahaan ?></td>
                </tr>
                  <tr>
                  <th class="font-title" style="width: 20%">Jenis Bangunan </th>
                  <td><?php echo $d_surat->jenis_bangunan ?></td>
                </tr>
                  <tr>
                  <th class="font-title" style="width: 20%"> Lokasi Bangunan  </th>
                  <td><?php echo $d_surat->lokasi_bangunan ?></td>
                </tr>

                <tr>
                  <th class="font-title" style="width: 20%">Luas Bangunan </th>
                  <td>
                  <b>Lt.1 </b> :  <?php if ($d_surat->lt_1_1==NULL) { echo  '-'; }else { ?>
                    <?php echo $d_surat->lt_1_1.' X '.$d_surat->lt_1_2.' = '.$d_surat->total_1.' M<sup>2</sup>' ?> 
                  <?php } ?> 
                  <br>
                  <b>Lt.2 </b> :  <?php if ($d_surat->lt_2_1==NULL) { echo  '-'; }else { ?>
                    <?php echo $d_surat->lt_2_1.' X '.$d_surat->lt_2_2.' = '.$d_surat->total_2.' M<sup>2</sup>' ?> 
                  <?php } ?> 
                  <br>
                  <b>Lt.3 </b> : 
                  <?php if ($d_surat->lt_3_1==NULL) { echo  '-'; }else { ?>
                    <?php echo $d_surat->lt_3_1.' X '.$d_surat->lt_3_2.' = '.$d_surat->total_3.' M<sup>2</sup>' ?> 
                  <?php } ?> 
                  </td>
                  <tr>
                  <th class="font-title" style="width: 20%"> GSB <small>(Garis Sempadan Bangunan)</small></th>
                  <td><?php echo $d_surat->gsb ?></td>
                </tr>
                </tr>
                  <tr>
                  <th colspan="2" class="text-blue">Bagi mereka yang tempat usahanya bukan milik sendiri</th>
                </tr>

                <tr>
                  <th class="font-title" style="width: 20%">Nama Pemilik Tanah</th>
                  <td>
                  <?php if ($d_surat->nama_pemilik_tanah==NULL) { echo  '-'; }else { ?>
                    <?php echo $d_surat->nama_pemilik_tanah ?> 
                  <?php } ?> 
                  </td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Alamat Pemilik Tanah</th>
                  <td>
                  <?php if ($d_surat->alamat_pemilik_tanah==NULL) { echo  '-'; }else { ?>
                    <?php echo $d_surat->alamat_pemilik_tanah ?> 
                  <?php } ?> 
                  </td>
                </tr>

                <tr>
                  <th class="font-title" style="width: 20%">Jangka Waktu</th>
                  <td>
                  <?php if ($d_surat->jangka_waktu==NULL) { echo  '-'; }else { ?>
                    <?php echo $d_surat->jangka_waktu.' Tahun' ?> 
                    <br>
                  <?php echo 'Mulai Tanggal ' .$d_surat->mulai_tanggal.' s/d '. $d_surat->sampai_tanggal  ?>   
                  <?php } ?> 
                  </td>
                </tr>

                 
                </tr>
                  <tr>
                  <th colspan="2" class="text-blue">Info Pelayanan</th>
                </tr>

                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Post </th>
                  <td><?php echo $value->waktu_mulai  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Terverivikasi </th>
                  <td>
                  <?php   
                    if ($value->waktu_selesai  == NULL) {
                      echo '-';
                    }
                    else{ echo $value->waktu_selesai;  }
                  ?>
                  </td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Kategori Surat</th>
                  <td><?php echo $value->nama_kategori  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Status</th>
                  <td><span class="btn btn-xs btn-<?php echo $color ?> "><?php echo $juduls  ?></span></td>
                </tr>
      </table>
      <?php } // imb?>

      <?php 
            if ($value->kode_surat == 1) { // kpj ?> 
      <table class="table table-bordered table-striped ">
                <tr>
                  <th class="font-title" style="width: 20%">ID Pelayanan</th>
                  <td><a href="#"><?php echo $value->ID_pelayanan  ?></a></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">NIK Pemohon</th>
                  <td><?php echo $value->nik ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Nama Lengkap Pemohon  </th>
                  <td><?php echo $d_surat->nama_lengkap ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tempat, Tanggal Lahir  </th>
                  <td><?php echo $d_surat->tmp_lahir. ', '. $d_surat->tgl_lahir  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Jenis Kelamin </th>
                  <td><?php echo $d_surat->jns_kelamin ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Kewarganegaraan </th>
                  <td><?php echo $d_surat->kewarganegaraan ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Status Perkawinan </th>
                  <td><?php echo $d_surat->status_perkawinan ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Agama </th>
                  <td><?php echo $d_surat->agama ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Alamat </th>
                  <td><?php echo $d_surat->alamat ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Pekerjaan </th>
                  <td><?php echo $d_surat->pekerjaan ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Status Hubungan dalam Keluarga </th>
                  <td><?php echo $d_surat->shdk ?></td>
                </tr>
                
                  <tr>
                  <th colspan="2" class="text-blue">Keterangan Pindah :</th>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Alasan Pindah </th>
                  <td><?php echo $d_surat->alasan_pindah ?></td>
                </tr> 
                 
                  <tr>
                  <th colspan="2" class="text-blue">Tujuan Pindah</th>
                </tr>

                <tr>
                  <th class="font-title" style="width: 20%">Desa/Kelurahan </th>
                  <td><?php echo $d_surat->desa_kelurahan ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Kecamatan</th>
                  <td><?php echo $d_surat->kecamatan ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Kab/Kota</th>
                  <td><?php echo $d_surat->kabupaten ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Provinsi</th>
                  <td><?php echo $d_surat->provinsi ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Pada Tanggal</th>
                  <td><?php echo $d_surat->pada_tanggal ?></td>
                </tr>
                
                  <tr>
                  <th colspan="2" class="text-blue">Info Pelayanan</th>
                </tr>

                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Post </th>
                  <td><?php echo $value->waktu_mulai  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Terverivikasi </th>
                  <td>
                  <?php   
                    if ($value->waktu_selesai  == NULL) {
                      echo '-';
                    }
                    else{ echo $value->waktu_selesai;  }
                  ?>
                  </td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Kategori Surat</th>
                  <td><?php echo $value->nama_kategori  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Status</th>
                  <td><span class="btn btn-xs btn-<?php echo $color ?> "><?php echo $juduls  ?></span></td>
                </tr>
      </table>
      <?php } // kpj?>

       <?php 
            if ($value->kode_surat == 4) { // kpw ?> 
      <table class="table table-bordered table-striped ">
                <tr>
                  <th class="font-title" style="width: 20%">ID Pelayanan</th>
                  <td><a href="#"><?php echo $value->ID_pelayanan  ?></a></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">NIK Pemohon</th>
                  <td><?php echo $value->nik ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Nama Lengkap Pemohon  </th>
                  <td><?php echo $d_surat->nama_lengkap ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tempat, Tanggal Lahir  </th>
                  <td><?php echo $d_surat->tmp_lahir. ', '. $d_surat->tgl_lahir  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Jenis Kelamin </th>
                  <td><?php echo $d_surat->jns_kelamin ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Kewarganegaraan </th>
                  <td><?php echo $d_surat->kewarganegaraan ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Status Perkawinan </th>
                  <td><?php echo $d_surat->status_perkawinan ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Agama </th>
                  <td><?php echo $d_surat->agama ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Alamat </th>
                  <td><?php echo $d_surat->alamat ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Pekerjaan </th>
                  <td><?php echo $d_surat->pekerjaan ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Status Hubungan dalam Keluarga </th>
                  <td><?php echo $d_surat->shdk ?></td>
                </tr>
                
                  <tr>
                  <th colspan="2" class="text-blue">Keterangan Pindah :</th>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Alasan Pindah </th>
                  <td><?php echo $d_surat->alasan_pindah ?></td>
                </tr> 
                 
                  <tr>
                  <th colspan="2" class="text-blue">Tujuan Pindah</th>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Alamat Pindah</th>
                  <td><?php echo $d_surat->alamat_pindah ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Desa/Kelurahan </th>
                  <td><?php echo $d_surat->desa_kelurahan ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Kecamatan</th>
                  <td><?php echo $d_surat->kecamatan ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Kab/Kota</th>
                  <td><?php echo $d_surat->kabupaten ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Provinsi</th>
                  <td><?php echo $d_surat->provinsi ?></td>
                </tr>

                <tr>
                  <th class="font-title" style="width: 20%">Klasifikasi Pindah</th>
                  <td><?php echo $d_surat->klasifikasi_pindah ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Jenis Kepindahan</th>
                  <td><?php echo $d_surat->jns_kepindahan ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Status KK bagi yang tidak pindah</th>
                  <td><?php echo $d_surat->status_kk_tdk_pindah ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Status KK bagi yang pindah</th>
                  <td><?php echo $d_surat->status_kk_pindah ?></td>
                </tr>
                
                
                  <tr>
                  <th colspan="2" class="text-blue">Info Pelayanan</th>
                </tr>

                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Post </th>
                  <td><?php echo $value->waktu_mulai  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Terverivikasi </th>
                  <td>
                  <?php   
                    if ($value->waktu_selesai  == NULL) {
                      echo '-';
                    }
                    else{ echo $value->waktu_selesai;  }
                  ?>
                  </td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Kategori Surat</th>
                  <td><?php echo $value->nama_kategori  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Status</th>
                  <td><span class="btn btn-xs btn-<?php echo $color ?> "><?php echo $juduls  ?></span></td>
                </tr>
      </table>
      <?php } // kpw?>

       <?php 
            if ($value->kode_surat == 7) { // siup ?> 
      <table class="table table-bordered table-striped ">
                <tr>
                  <th class="font-title" style="width: 20%">ID Pelayanan</th>
                  <td><a href="#"><?php echo $value->ID_pelayanan  ?></a></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">NIK Pemohon</th>
                  <td><?php echo $value->nik ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Nama Lengkap </th>
                  <td><?php echo $d_surat->nama_lengkap ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tempat, Tanggal Lahir  </th>
                  <td><?php echo $d_surat->tmp_lahir. ', '. $d_surat->tgl_lahir  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Jenis Kelamin </th>
                  <td><?php echo $d_surat->jns_kelamin ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Desa</th>
                  <td><?php echo $d_surat->desa ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Alamat Tinggal</th>
                  <td><?php echo $d_surat->alamat ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Nomor Telepon/HP</th>
                  <td><?php echo $d_surat->no_hp ?></td>
                </tr>
                <tr>
                  <th colspan="2" class="text-blue">Mendirikan Bangunan</th>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Nama Perusahaan</th>
                  <td><?php echo $d_surat->nama_perusahaan ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Alamat Perusahaan</th>
                  <td><?php echo $d_surat->alamat_perusahaan ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Kedudukan dalam Perusahaan</th>
                  <td><?php echo $d_surat->kedudukan ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Bentuk Perusahaan</th>
                  <td><?php echo $d_surat->bentuk_perusahaan ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Bidang Usaha</th>
                  <td><?php echo $d_surat->desa ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Jenis Barang Dagang</th>
                  <td> 
                  a. <?php if (empty($d_surat->jenis_barang_a)) { echo '-';  } else echo $d_surat->jenis_barang_a ?> <br>
                  b. <?php if (empty($d_surat->jenis_barang_b)) { echo '-';  } else echo $d_surat->jenis_barang_b ?> <br>
                  c. <?php if (empty($d_surat->jenis_barang_c)) { echo '-';  } else echo $d_surat->jenis_barang_c ?> <br>
                  </td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Modal Usaha</th>
                  <td>Rp. <?php echo number_format($d_surat->modal_usaha,0,'.','.')   ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Jumlah Tenaga Kerja yang di bayar</th>
                  <td>
                  Laki-laki <?php echo $d_surat->jumlah_tenaga_laki  ?> Orang <br>
                  Perempuan <?php echo $d_surat->jumlah_tenaga_perempuan ?> Orang
                  </td>
                </tr>
                <tr>
                  <th class="font-title" rowspan="2" style="width: 20%;">Pendidikan tenaga kerja </th>
                  <td><b>Laki-laki</b></td>
                </tr>
                <tr>
                  <td>
            SD  <?php if (empty($d_surat->pendidikan_laki_sd)) { echo 'Tidak Ada';  } else echo $d_surat->pendidikan_laki_sd.' Orang' ?> <br>
            SLTP  <?php if (empty($d_surat->pendidikan_laki_sltp)) { echo 'Tidak Ada';  } else echo $d_surat->pendidikan_laki_sltp.' Orang' ?>  <br>
            SLTA <?php if (empty($d_surat->pendidikan_laki_slta)) { echo 'Tidak Ada';  } else echo $d_surat->pendidikan_laki_slta.' Orang' ?>  <br>
            D3 <?php if (empty($d_surat->pendidikan_laki_d3)) { echo 'Tidak Ada';  } else echo $d_surat->pendidikan_laki_d3.' Orang' ?>  <br>
            S1 <?php if (empty($d_surat->pendidikan_laki_s1)) { echo 'Tidak Ada';  } else echo $d_surat->pendidikan_laki_s1.' Orang' ?>  <br>
            S2 <?php if (empty($d_surat->pendidikan_laki_s2)) { echo 'Tidak Ada';  } else echo $d_surat->pendidikan_laki_s2.' Orang' ?>  <br>
            S3 <?php if (empty($d_surat->pendidikan_laki_s3)) { echo 'Tidak Ada';  } else echo $d_surat->pendidikan_laki_s3.' Orang' ?>  <br>
                  </td>
                </tr>
                <tr>
                  <th class="font-title" rowspan="2" style="width: 20%;">Pendidikan tenaga kerja </th>
                  <td><b>Perempuan</b></td>
                </tr>
                <tr>
                  <td>
            SD  <?php if (empty($d_surat->pendidikan_perempuan_sd)) { echo 'Tidak Ada';  } else echo $d_surat->pendidikan_perempuan_sd.' Orang' ?> <br>
            SLTP  <?php if (empty($d_surat->pendidikan_perempuan_sltp)) { echo 'Tidak Ada';  } else echo $d_surat->pendidikan_perempuan_sltp.' Orang' ?>  <br>
            SLTA <?php if (empty($d_surat->pendidikan_perempuan_slta)) { echo 'Tidak Ada';  } else echo $d_surat->pendidikan_perempuan_slta.' Orang' ?>  <br>
            D3 <?php if (empty($d_surat->pendidikan_perempuan_d3)) { echo 'Tidak Ada';  } else echo $d_surat->pendidikan_perempuan_d3.' Orang' ?>  <br>
            S1 <?php if (empty($d_surat->pendidikan_perempuan_s1)) { echo 'Tidak Ada';  } else echo $d_surat->pendidikan_perempuan_s1.' Orang' ?>  <br>
            S2 <?php if (empty($d_surat->pendidikan_perempuan_s2)) { echo 'Tidak Ada';  } else echo $d_surat->pendidikan_perempuan_s2.' Orang' ?>  <br>
            S3 <?php if (empty($d_surat->pendidikan_perempuan_s3)) { echo 'Tidak Ada';  } else echo $d_surat->pendidikan_perempuan_s3.' Orang' ?>  <br>
                  </td>
                </tr>
                
                <tr>
                  <th colspan="2" class="text-blue">Bagi mereka yang tempat usahanya bukan milik sendiri :</th>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Nama Pemilik Tanah</th>
                  <td><?php if (empty($d_surat->nama_pemilik_tanah)) {echo ' -'; } else echo $d_surat->nama_pemilik_tanah  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Nama Pemilik Tanah</th>
                  <td><?php if (empty($d_surat->alamat_pemilik_tanah)) {echo ' -'; } else echo $d_surat->alamat_pemilik_tanah  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Jangka Waktu</th>
                  <td><?php if (empty($d_surat->jangka_waktu)) { echo ' -'; } 
                  else echo $d_surat->jangka_waktu.' Tahun - '.$d_surat->mulai_tanggal.' S/d '.$d_surat->sampai_tanggal ?></td>
                </tr>
                <tr>
                  <th colspan="2" class="text-blue">Info Pelayanan</th>
                </tr>

                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Post </th>
                  <td><?php echo $value->waktu_mulai  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Terverivikasi </th>
                  <td>
                  <?php   
                    if ($value->waktu_selesai  == NULL) {
                      echo '-';
                    }
                    else{ echo $value->waktu_selesai;  }
                  ?>
                  </td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Kategori Surat</th>
                  <td><?php echo $value->nama_kategori  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Status</th>
                  <td><span class="btn btn-xs btn-<?php echo $color ?> "><?php echo $juduls  ?></span></td>
                </tr>
      </table>
      <?php } // siup ?>

      <?php 
            if ($value->kode_surat == 16) { // sp3fat ?> 
      <table class="table table-bordered table-striped ">
                <tr>
                  <th class="font-title" style="width: 20%">ID Pelayanan</th>
                  <td><a href="#"><?php echo $value->ID_pelayanan  ?></a></td>
                </tr>
                 <tr>
                  <th colspan="2" class="text-blue">Tanda Tangan Lurah/Kades</th>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Lurah/ Kades</th>
                  <td><?php echo $d_surat->desa  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Nomor Surat</th>
                  <td><?php echo $d_surat->no_surat_kuasa  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Surat</th>
                  <td><?php echo $d_surat->tgl_surat_kuasa  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Diketahui</th>
                  <td><?php echo $d_surat->tgl_diketahui  ?></td>
                </tr>
                <tr>
                  <th colspan="2" class="text-blue">Keterangan Tanah</th>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Letak Tanah</th>
                  <td><?php echo $d_surat->letak_tanah  ?></td>
                </tr>
                  <tr>
                    <th class="font-title" style="width: 20%">Luas Tanah</th>
                    <td><?php echo $d_surat->luas_tanah.' M<sup>2</sup>'  ?></td>
                  </tr>
                <tr>
                  <th colspan="2" class="text-blue">Batas-batas Tanah</th>
                </tr> 
                <tr>
                  <th class="font-title" style="width: 20%">Batas Utara</th>
                  <td><?php echo $d_surat->batas_utara_ket.' &plusmn; '.$d_surat->batas_utara_val. ' M'  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Batas Timur</th>
                  <td><?php echo $d_surat->batas_timur_ket.' &plusmn; '.$d_surat->batas_timur_val. ' M'  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Batas Selatan</th>
                  <td><?php echo $d_surat->batas_selatan_ket.' &plusmn; '.$d_surat->batas_selatan_val. ' M'  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Batas Barat</th>
                  <td><?php echo $d_surat->batas_barat_ket.' &plusmn; '.$d_surat->batas_barat_val. ' M'  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tahun Kuasa</th>
                  <td><?php echo $d_surat->tahun_kuasa ?></td>
                </tr>
                <tr>
                  <th colspan="2" class="text-blue">Adalah benar tanah yang dikuasai oleh </th>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">NIK</th>
                  <td><?php echo $value->nik ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Nama Lengkap</th>
                  <td><?php echo $d_surat->nama_lengkap ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tempat, Tanggal Lahir </th>
                  <td><?php echo $d_surat->tmp_lahir.', '.$d_surat->tgl_lahir ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Jenis Kelamin</th>
                  <td><?php echo $d_surat->jns_kelamin ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Alamat </th>
                  <td><?php echo $d_surat->alamat ?></td>
                </tr>
                <tr>
                  <th class="font-title kapital" style="width: 20%">Agama </th>
                  <td class="kapital"><?php echo $d_surat->agama ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Pekerjaan </th>
                  <td><?php echo $d_surat->pekerjaan ?></td>
                </tr>

                <tr>
                  <th colspan="2" class="text-blue">Info Pelayanan</th>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Post </th>
                  <td><?php echo $value->waktu_mulai  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Terverivikasi </th>
                  <td>
                  <?php   
                    if ($value->waktu_selesai  == NULL) {
                      echo '-';
                    }
                    else{ echo $value->waktu_selesai;  }
                  ?>
                  </td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Kategori Surat</th>
                  <td><?php echo $value->nama_kategori  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Status</th>
                  <td><span class="btn btn-xs btn-<?php echo $color ?> "><?php echo $juduls  ?></span></td>
                </tr>
      </table>
      <?php } // sp3fat ?>

      <?php 
            if ($value->kode_surat == 17) { // sp4fat ?> 
      <table class="table table-bordered table-striped ">
                <tr>
                  <th class="font-title" style="width: 20%">ID Pelayanan</th>
                  <td><a href="#"><?php echo $value->ID_pelayanan  ?></a></td>
                </tr>
                 <tr>
                  <th colspan="2" class="text-blue">Tanda Tangan Lurah/Kades</th>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Lurah/ Kades</th>
                  <td><?php echo $d_surat->desa  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Nomor Surat</th>
                  <td><?php echo $d_surat->no_surat_kuasa  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Surat</th>
                  <td><?php echo $d_surat->tgl_surat_kuasa  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Diketahui</th>
                  <td><?php echo $d_surat->tgl_diketahui  ?></td>
                </tr>
                <tr>
                  <th colspan="2" class="text-blue">Keterangan Tanah</th>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Letak Tanah</th>
                  <td><?php echo $d_surat->letak_tanah  ?></td>
                </tr>
                  <tr>
                    <th class="font-title" style="width: 20%">Luas Tanah</th>
                    <td><?php echo $d_surat->luas_tanah.' M<sup>2</sup>'  ?></td>
                  </tr>
                <tr>
                  <th colspan="2" class="text-blue">Batas-batas Tanah</th>
                </tr> 
                <tr>
                  <th class="font-title" style="width: 20%">Batas Utara</th>
                  <td><?php echo $d_surat->batas_utara_ket.' &plusmn; '.$d_surat->batas_utara_val. ' M'  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Batas Timur</th>
                  <td><?php echo $d_surat->batas_timur_ket.' &plusmn; '.$d_surat->batas_timur_val. ' M'  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Batas Selatan</th>
                  <td><?php echo $d_surat->batas_selatan_ket.' &plusmn; '.$d_surat->batas_selatan_val. ' M'  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Batas Barat</th>
                  <td><?php echo $d_surat->batas_barat_ket.' &plusmn; '.$d_surat->batas_barat_val. ' M'  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tahun Kuasa</th>
                  <td><?php echo $d_surat->tahun_kuasa ?></td>
                </tr>
                <tr>
                  <th colspan="2" class="text-blue">Adalah benar tanah yang dikuasai oleh </th>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">NIK</th>
                  <td><?php echo $value->nik ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Nama Lengkap</th>
                  <td><?php echo $d_surat->nama_lengkap ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tempat, Tanggal Lahir </th>
                  <td><?php echo $d_surat->tmp_lahir.', '.$d_surat->tgl_lahir ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Jenis Kelamin</th>
                  <td><?php echo $d_surat->jns_kelamin ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Alamat </th>
                  <td><?php echo $d_surat->alamat ?></td>
                </tr>
                <tr>
                  <th class="font-title kapital" style="width: 20%">Agama </th>
                  <td class="kapital"><?php echo $d_surat->agama ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Pekerjaan </th>
                  <td><?php echo $d_surat->pekerjaan ?></td>
                </tr>

                <tr>
                  <th colspan="2" class="text-blue">Info Pelayanan</th>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Post </th>
                  <td><?php echo $value->waktu_mulai  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Terverivikasi </th>
                  <td>
                  <?php   
                    if ($value->waktu_selesai  == NULL) {
                      echo '-';
                    }
                    else{ echo $value->waktu_selesai;  }
                  ?>
                  </td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Kategori Surat</th>
                  <td><?php echo $value->nama_kategori  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Status</th>
                  <td><span class="btn btn-xs btn-<?php echo $color ?> "><?php echo $juduls  ?></span></td>
                </tr>
      </table>
      <?php } // sp4fat ?>

    </div>
    <div class="col-md-3 col-xs-12 ">
              <?php 
            if ($value->kode_surat == 17) {  // sp4fat ?>
             <?php 
              $sp4fat1 = explode('.', $d_berkas->sp4fat_1);
              $sp4fat2 = explode('.', $d_berkas->sp4fat_2);

              ?> 
             <h4><b>Persyaratan yang di upload</b></h4>  
              <div class="btn-group-vertical btn-block ">
                <button data-toggle="modal" data-target="#sp4fat-<?php echo $sp4fat1[0];  ?>  " type="button" class="btn btn-default">Fotocopy KTP Pemohon</button>
                <button data-toggle="modal" data-target="#sp4fat-<?php echo $sp4fat2[0];  ?>  " type="button" class="btn btn-default">Fotocopy Bukti Lunas PBB <br> Tahun Berakhir</button>
              </div>

            <div id="sp4fat-<?php echo $sp4fat1[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                   
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Fotocopy KTP Pemohon</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->sp4fat_1 != NULL) { ?>

                    <?php if ($sp4fat1[1] == 'pdf') { ?>
                      
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/sp4fat/'.$d_berkas->sp4fat_1) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/sp4fat/'.$d_berkas->sp4fat_1) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>

                    <?php } elseif ($sp4fat1[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/sp4fat/'.$d_berkas->sp4fat_1) ?>" alt="Fotocopy KTP Pemohon">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

           <div id="sp4fat-<?php echo $sp4fat2[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                   
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Fotocopy Bukti Lunas PBB Tahun Berakhir</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->sp4fat_2 != NULL) { ?>

                    <?php if ($sp4fat2[1] == 'pdf') { ?>
                      
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/sp4fat/'.$d_berkas->sp4fat_2) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/sp4fat/'.$d_berkas->sp4fat_2) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>

                    <?php } elseif ($sp4fat2[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/sp4fat/'.$d_berkas->sp4fat_2) ?>" alt="Fotocopy Bukti Lunas PBB Tahun Berakhir">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

        
           <?php }   // sp4fat ?>

            <?php 
            if ($value->kode_surat == 16) {  // siup ?>
             <?php 
              $sp3fat1 = explode('.', $d_berkas->sp3fat_1);
              $sp3fat2 = explode('.', $d_berkas->sp3fat_2);

              ?> 
             <h4>Persyaratan yang di upload</b></h4>
              <div class="btn-group-vertical btn-block ">
                <button data-toggle="modal" data-target="#sp3fat-<?php echo $sp3fat1[0];  ?>  " type="button" class="btn btn-default">Fotocopy KTP Pemohon</button>
                <button data-toggle="modal" data-target="#sp3fat-<?php echo $sp3fat2[0];  ?>  " type="button" class="btn btn-default">Fotocopy Bukti Lunas PBB <br> Tahun Berakhir</button>
              </div>

            <div id="sp3fat-<?php echo $sp3fat1[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                   
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Fotocopy KTP Pemohon</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->sp3fat_1 != NULL) { ?>

                    <?php if ($sp3fat1[1] == 'pdf') { ?>
                      
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/sp3fat/'.$d_berkas->sp3fat_1) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/sp3fat/'.$d_berkas->sp3fat_1) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>

                    <?php } elseif ($sp3fat1[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/sp3fat/'.$d_berkas->sp3fat_1) ?>" alt="Fotocopy KTP Pemohon">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

           <div id="sp3fat-<?php echo $sp3fat2[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                   
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Fotocopy Bukti Lunas PBB Tahun Berakhir</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->sp3fat_2 != NULL) { ?>

                    <?php if ($sp3fat2[1] == 'pdf') { ?>
                      
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/sp3fat/'.$d_berkas->sp3fat_2) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/sp3fat/'.$d_berkas->sp3fat_2) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>

                    <?php } elseif ($sp3fat2[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/sp3fat/'.$d_berkas->sp3fat_2) ?>" alt="Fotocopy Bukti Lunas PBB Tahun Berakhir">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

        
           <?php }   // sp3fat ?>

            <?php 
            if ($value->kode_surat == 7) {  // siup ?>
             <?php 
              $siup1 = explode('.', $d_berkas->siup_1);
              $siup2 = explode('.', $d_berkas->siup_2);
              $siup3 = explode('.', $d_berkas->siup_3); 
              $siup4 = explode('.', $d_berkas->siup_4); 
              $siup5 = explode('.', $d_berkas->siup_5);
              $siup6 = explode('.', $d_berkas->siup_6);
              $siup7 = explode('.', $d_berkas->siup_7); 
              $siup8 = explode('.', $d_berkas->siup_8); 

              ?> 
             <h4><b>Persyaratan yang di upload</b></h4>
              <div class="btn-group-vertical btn-block ">
                <button data-toggle="modal" data-target="#siup-<?php echo $siup1[0];  ?>  " type="button" class="btn btn-default">Fotocopy KTP Pemohon</button>
                <button data-toggle="modal" data-target="#siup-<?php echo $siup2[0];  ?>  " type="button" class="btn btn-default">Pas Photo Berwarna 4x6</button>
                <button data-toggle="modal" data-target="#siup-<?php echo $siup3[0];  ?>  " type="button" class="btn btn-default ">Fotocopy Bukti Lunas PBB Tahun <br> Berakhir</button>
                <button data-toggle="modal" data-target="#siup-<?php echo $siup4[0];  ?>  " type="button" class="btn btn-default "> Fotocopy NPWP</button>
                <button data-toggle="modal" data-target="#siup-<?php echo $siup5[0];  ?>  " type="button" class="btn btn-default "> Fotocopy Akta Pendirian <br> Perusahaan dan perubahan <br> bagi CV/PT</button>
                <button data-toggle="modal" data-target="#siup-<?php echo $siup6[0];  ?>  " type="button" class="btn btn-default "> Surat Pernyataan Persetujuan <br> Tetangga (minimal 2 tetangga) <br> Diketahui Kades/Lurah dan Camat <br> beserta Fotocopy KTP</button>
                <button data-toggle="modal" data-target="#siup-<?php echo $siup7[0];  ?>  " type="button" class="btn btn-default "> Fotocopy surat Perjanjian Sewa <br> Menyewa lahan/bangunan <br>(jika bukan tempat sendiri)</button>
                 <button data-toggle="modal" data-target="#siup-<?php echo $siup8[0];  ?>  " type="button" class="btn btn-default "> Surat Rekomendasi Kades / Lurah</button>

              </div>

            <div id="siup-<?php echo $siup1[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                   
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Fotocopy KTP Pemohon</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->siup_1 != NULL) { ?>

                    <?php if ($siup1[1] == 'pdf') { ?>
                      
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/siup/'.$d_berkas->siup_1) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/siup/'.$d_berkas->siup_1) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>

                    <?php } elseif ($siup1[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/siup/'.$d_berkas->siup_1) ?>" alt="Fotocopy KTP Pemohon">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

           <div id="siup-<?php echo $siup2[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                   
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Pas Photo Berwarna 4x6</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->siup_2 != NULL) { ?>

                    <?php if ($siup2[1] == 'pdf') { ?>
                      
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/siup/'.$d_berkas->siup_2) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/siup/'.$d_berkas->siup_2) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>

                    <?php } elseif ($siup2[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/siup/'.$d_berkas->siup_2) ?>" alt="Pas Photo Berwarna 4x6">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

           <div id="siup-<?php echo $siup3[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Fotocopy Bukti Lunas PBB Tahun Berakhir</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->siup_3 != NULL) { ?>
                    <?php if ($siup3[1] == 'pdf') { ?>
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/siup/'.$d_berkas->siup_3) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/siup/'.$d_berkas->siup_3) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>
                    <?php } elseif ($siup3[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/siup/'.$d_berkas->siup_3) ?>" alt="Fotocopy Bukti Lunas PBB Tahun Berakhir">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

          <div id="siup-<?php echo $siup4[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title"> Fotocopy NPWP </h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->siup_4 != NULL) { ?>
                    <?php if ($siup4[1] == 'pdf') { ?>
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/siup/'.$d_berkas->siup_4) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/siup/'.$d_berkas->siup_4) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>
                    <?php } elseif ($siup4[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/siup/'.$d_berkas->siup_4) ?>" alt="Fotocopy NPWP ">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

          <div id="siup-<?php echo $siup5[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Fotocopy Akta Pendirian Perusahaan dan perubahan bagi CV/PT</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->siup_5 != NULL) { ?>
                    <?php if ($siup5[1] == 'pdf') { ?>
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/siup/'.$d_berkas->siup_5) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/siup/'.$d_berkas->siup_5) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>
                    <?php } elseif ($siup5[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/siup/'.$d_berkas->siup_5) ?>" alt="Fotocopy Akta Pendirian Perusahaan dan perubahan bagi CV/PT">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

          <div id="siup-<?php echo $siup6[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Surat Pernyataan Persetujuan Tetangga (minimal 2 tetangga) Diketahui Kades/Lurah dan Camat beserta Fotocopy KTP</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->siup_6 != NULL) { ?>
                    <?php if ($siup6[1] == 'pdf') { ?>
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/siup/'.$d_berkas->siup_6) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/siup/'.$d_berkas->siup_6) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>
                    <?php } elseif ($siup6[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/siup/'.$d_berkas->siup_6) ?>" alt="Surat Pernyataan Persetujuan Tetangga (minimal 2 tetangga) Diketahui Kades/Lurah dan Camat beserta Fotocopy KTP">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

          <div id="siup-<?php echo $siup7[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title"> Fotocopy surat Perjanjian Sewa Menyewa lahan/bangunan (jika bukan tempat sendiri)</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->siup_7 != NULL) { ?>
                    <?php if ($siup7[1] == 'pdf') { ?>
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/siup/'.$d_berkas->siup_7) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/siup/'.$d_berkas->siup_7) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>
                    <?php } elseif ($siup7[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/siup/'.$d_berkas->siup_7) ?>" alt="Fotocopy surat Perjanjian Sewa Menyewa lahan/bangunan (jika bukan tempat sendiri)">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

          <div id="siup-<?php echo $siup8[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Surat Rekomendasi Kades / Lurah</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->siup_8 != NULL) { ?>
                    <?php if ($siup8[1] == 'pdf') { ?>
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/siup/'.$d_berkas->siup_8) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/siup/'.$d_berkas->siup_8) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>
                    <?php } elseif ($siup8[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/siup/'.$d_berkas->siup_8) ?>" alt="Surat Rekomendasi Kades / Lurah">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>



           <?php }   // siup ?>

           <?php 
            if ($value->kode_surat == 1) {  //kpj ?>
             <?php 
              $kpj1 = explode('.', $d_berkas->kpj_1);
              $kpj2 = explode('.', $d_berkas->kpj_2);
              $kpj3 = explode('.', $d_berkas->kpj_3); 
              $kpj4 = explode('.', $d_berkas->kpj_4); 

              ?> 
             <h4><b>Persyaratan yang di upload</b></h4>  
              <div class="btn-group-vertical btn-block ">
                <button data-toggle="modal" data-target="#kpj-<?php echo $kpj1[0];  ?>  " type="button" class="btn btn-default">Fotocopy KTP Pemohon</button>
                <button data-toggle="modal" data-target="#kpj-<?php echo $kpj2[0];  ?>  " type="button" class="btn btn-default">Surat Keterangan Pindah Jiwa <br> dari Kades/Lurah</button>
                <button data-toggle="modal" data-target="#kpj-<?php echo $kpj3[0];  ?>  " type="button" class="btn btn-default ">Pas Photo Berwarna 4x6</button>
                <button data-toggle="modal" data-target="#kpj-<?php echo $kpj4[0];  ?>  " type="button" class="btn btn-default "> Formulir KK Perubahan <br> <small>(jika ada anggota keluarga yang <br> tidak ikut pindah jiwa)</small> </button>
              </div>

            <div id="kpj-<?php echo $kpj1[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                   
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Fotocopy KTP Pemohon</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->kpj_1 != NULL) { ?>

                    <?php if ($kpj1[1] == 'pdf') { ?>
                      
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/kpj/'.$d_berkas->kpj_1) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/kpj/'.$d_berkas->kpj_1) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>

                    <?php } elseif ($kpj1[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/kpj/'.$d_berkas->kpj_1) ?>" alt="Fotocopy KTP Pemohon">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

           <div id="kpj-<?php echo $kpj2[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                   
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Surat Keterangan Pindah Jiwa dari Kades/Lurah</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->kpj_2 != NULL) { ?>

                    <?php if ($kpj2[1] == 'pdf') { ?>
                      
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/kpj/'.$d_berkas->kpj_2) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/kpj/'.$d_berkas->kpj_2) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>

                    <?php } elseif ($kpj2[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/kpj/'.$d_berkas->kpj_2) ?>" alt="Surat Keterangan Pindah Jiwa dari Kades/Lurah">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

           <div id="kpj-<?php echo $kpj3[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Pas Photo Berwarna 4x6</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->kpj_3 != NULL) { ?>
                    <?php if ($kpj3[1] == 'pdf') { ?>
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/kpj/'.$d_berkas->kpj_3) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/kpj/'.$d_berkas->kpj_3) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>
                    <?php } elseif ($kpj3[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/kpj/'.$d_berkas->kpj_3) ?>" alt="Pas Photo Berwarna 4x6">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

          <div id="kpj-<?php echo $kpj4[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Formulir KK Perubahan (jika ada anggota keluarga yang tidak ikut pindah jiwa)</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->kpj_4 != NULL) { ?>
                    <?php if ($kpj4[1] == 'pdf') { ?>
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/kpj/'.$d_berkas->kpj_4) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/kpj/'.$d_berkas->kpj_4) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>
                    <?php } elseif ($kpj4[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/kpj/'.$d_berkas->kpj_4) ?>" alt="Formulir KK Perubahan (jika ada anggota keluarga yang tidak ikut pindah jiwa)">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>



           <?php }   //kpj ?>

            <?php 
            if ($value->kode_surat == 4) {  //kpw ?>
             <?php 
              $kpw1 = explode('.', $d_berkas->kpw_1);
              $kpw2 = explode('.', $d_berkas->kpw_2);
              $kpw3 = explode('.', $d_berkas->kpw_3); 
              ?> 
             <h4><b>Persyaratan yang di upload</b></h4>  
              <div class="btn-group-vertical btn-block ">
                <button data-toggle="modal" data-target="#kpw-<?php echo $kpw1[0];  ?>  " type="button" class="btn btn-default">Fotocopy KTP</button>
                <button data-toggle="modal" data-target="#kpw-<?php echo $kpw2[0];  ?>  " type="button" class="btn btn-default">Pas Photo Berwarna 4x6</button>
                <button data-toggle="modal" data-target="#kpw-<?php echo $kpw3[0];  ?>  " type="button" class="btn btn-default ">Surat Keterangan Pindah Jiwa <br> dari daerah Asal</button>
              </div>

            <div id="kpw-<?php echo $kpw1[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                   
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Fotocopy KTP</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->kpw_1 != NULL) { ?>

                    <?php if ($kpw1[1] == 'pdf') { ?>
                      
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/kpw/'.$d_berkas->kpw_1) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/kpw/'.$d_berkas->kpw_1) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>

                    <?php } elseif ($kpw1[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/kpw/'.$d_berkas->kpw_1) ?>" alt="Fotocopy KTP ">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

           <div id="kpw-<?php echo $kpw2[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                   
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Pas Photo Berwarna 4x6</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->kpw_2 != NULL) { ?>

                    <?php if ($kpw2[1] == 'pdf') { ?>
                      
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/kpw/'.$d_berkas->kpw_2) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/kpw/'.$d_berkas->kpw_2) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>

                    <?php } elseif ($kpw2[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/kpw/'.$d_berkas->kpw_2) ?>" alt="Pas Photo Berwarna 4x6">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

           <div id="kpw-<?php echo $kpw3[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Surat Keterangan Pindah Jiwa dari daerah Asal</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->kpw_3 != NULL) { ?>
                    <?php if ($kpw3[1] == 'pdf') { ?>
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/kpw/'.$d_berkas->kpw_3) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/kpw/'.$d_berkas->kpw_3) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>
                    <?php } elseif ($kpw3[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/kpw/'.$d_berkas->kpw_3) ?>" alt="Surat Keterangan Pindah Jiwa dari daerah Asal">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

           <?php }   //kpw ?>
         
          <?php 
            if ($value->kode_surat == 9) {  //imb ?>
             <?php 
              $imb1 = explode('.', $d_berkas->imb_1);
              $imb2 = explode('.', $d_berkas->imb_2);
              $imb3 = explode('.', $d_berkas->imb_3); 
              $imb4 = explode('.', $d_berkas->imb_4); 
              $imb5 = explode('.', $d_berkas->imb_5);
              $imb6 = explode('.', $d_berkas->imb_6);
              $imb7 = explode('.', $d_berkas->imb_7); 
              $imb8 = explode('.', $d_berkas->imb_8); 
              $imb9 = explode('.', $d_berkas->imb_9); 
              $imb10 = explode('.', $d_berkas->imb_10); 
              ?> 
           <h4><b>Persyaratan yang di upload</b></h4>  
              <div class="btn-group-vertical btn-block ">
                <button data-toggle="modal" data-target="#imb-<?php echo $imb1[0];  ?>  " type="button" class="btn btn-default">Fotocopy KTP Pemohon</button>
                <button data-toggle="modal" data-target="#imb-<?php echo $imb2[0];  ?>  " type="button" class="btn btn-default">Pas Photo Berwarna 4x6</button>
                <button data-toggle="modal" data-target="#imb-<?php echo $imb3[0];  ?>  " type="button" class="btn btn-default ">Fotocopy Akta pendirian perusahaan</button>
                <button data-toggle="modal" data-target="#imb-<?php echo $imb4[0];  ?>  " type="button" class="btn btn-default "> Fotocopy NPWP Perusahaan</button>
                <button data-toggle="modal" data-target="#imb-<?php echo $imb5[0];  ?>  " type="button" class="btn btn-default "> Fotocopy Bukti Lunas PBB <br> Tahun Berakhir</button>
                <button data-toggle="modal" data-target="#imb-<?php echo $imb6[0];  ?>  " type="button" class="btn btn-default "> Surat Pernyataan Persetujuan <br> Tetangga (minimal 2 tetangga)<br> Diketahui Kades/Lurah dan Camat<br> beserta  Fotocopy KTP</button>
                <button data-toggle="modal" data-target="#imb-<?php echo $imb7[0];  ?>  " type="button" class="btn btn-default "> Fotocopy surat Perjanjian Sewa <br> Menyewa lahan/bangunan <br> <small>(jika bukan tempat sendiri)</small></button>
                <button data-toggle="modal" data-target="#imb-<?php echo $imb8[0];  ?>  " type="button" class="btn btn-default">Fotocopy Sertifikat Tanah atau <br>Surat bukti kepemilikan <br> tanah sampai camat</button>
                <button data-toggle="modal" data-target="#imb-<?php echo $imb9[0];  ?>  " type="button" class="btn btn-default">Surat pernyataan tidak keberatan <br> dari pemilik tanah <br> <small>(apabila nama pemilik tanah berbeda <br> dengan pemohon)</small></button>
                <button data-toggle="modal" data-target="#imb-<?php echo $imb10[0];  ?>  " type="button" class="btn btn-default ">Surat Rekomendasi Kades / Lurah</button>

              </div>

            <div id="imb-<?php echo $imb1[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                   
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Fotocopy KTP Pemohon</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->imb_1 != NULL) { ?>

                    <?php if ($imb1[1] == 'pdf') { ?>
                      
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/imb/'.$d_berkas->imb_1) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/imb/'.$d_berkas->imb_1) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>

                    <?php } elseif ($imb1[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/imb/'.$d_berkas->imb_1) ?>" alt="Fotocopy KTP Pemohon">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

           <div id="imb-<?php echo $imb2[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                   
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Pas Photo Berwarna 4x6</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->imb_2 != NULL) { ?>

                    <?php if ($imb2[1] == 'pdf') { ?>
                      
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/imb/'.$d_berkas->imb_2) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/imb/'.$d_berkas->imb_2) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>

                    <?php } elseif ($imb2[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/imb/'.$d_berkas->imb_2) ?>" alt="Pas Photo Berwarna 4x6">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

           <div id="imb-<?php echo $imb3[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Fotocopy Akta Pendirian Perusahaan</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->imb_3 != NULL) { ?>
                    <?php if ($imb3[1] == 'pdf') { ?>
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/imb/'.$d_berkas->imb_3) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/imb/'.$d_berkas->imb_3) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>
                    <?php } elseif ($imb3[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/imb/'.$d_berkas->imb_3) ?>" alt="Fotocopy Akta Pendirian Perusahaan">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

          <div id="imb-<?php echo $imb4[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title"> Fotocopy NPWP Perusahaan</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->imb_4 != NULL) { ?>
                    <?php if ($imb4[1] == 'pdf') { ?>
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/imb/'.$d_berkas->imb_4) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/imb/'.$d_berkas->imb_4) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>
                    <?php } elseif ($imb4[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/imb/'.$d_berkas->imb_4) ?>" alt="Fotocopy NPWP Perusahaan">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

          <div id="imb-<?php echo $imb5[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Fotocopy Bukti Lunas PBB Tahun Berakhir</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->imb_5 != NULL) { ?>
                    <?php if ($imb5[1] == 'pdf') { ?>
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/imb/'.$d_berkas->imb_5) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/imb/'.$d_berkas->imb_5) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>
                    <?php } elseif ($imb5[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/imb/'.$d_berkas->imb_5) ?>" alt="Fotocopy Bukti Lunas PBB Tahun Berakhir">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

          <div id="imb-<?php echo $imb6[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Surat Pernyataan Persetujuan Tetangga (minimal 2 tetangga) Diketahui Kades/Lurah dan Camat beserta Fotocopy KTP</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->imb_6 != NULL) { ?>
                    <?php if ($imb6[1] == 'pdf') { ?>
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/imb/'.$d_berkas->imb_6) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/imb/'.$d_berkas->imb_6) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>
                    <?php } elseif ($imb6[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/imb/'.$d_berkas->imb_6) ?>" alt="Surat Pernyataan Persetujuan Tetangga (minimal 2 tetangga) Diketahui Kades/Lurah dan Camat beserta Fotocopy KTP">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

          <div id="imb-<?php echo $imb7[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title"> Fotocopy surat Perjanjian Sewa Menyewa lahan/bangunan (jika bukan tempat sendiri)</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->imb_7 != NULL) { ?>
                    <?php if ($imb7[1] == 'pdf') { ?>
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/imb/'.$d_berkas->imb_7) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/imb/'.$d_berkas->imb_7) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>
                    <?php } elseif ($imb7[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/imb/'.$d_berkas->imb_7) ?>" alt="Fotocopy surat Perjanjian Sewa Menyewa lahan/bangunan (jika bukan tempat sendiri)">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

          <div id="imb-<?php echo $imb8[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title"> Fotocopy Sertifikat Tanah atau Surat bukti kepemilikan tanah sampai camat</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->imb_8 != NULL) { ?>
                    <?php if ($imb8[1] == 'pdf') { ?>
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/imb/'.$d_berkas->imb_8) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/imb/'.$d_berkas->imb_8) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>
                    <?php } elseif ($imb8[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/imb/'.$d_berkas->imb_8) ?>" alt="Fotocopy Sertifikat Tanah atau Surat bukti kepemilikan tanah sampai camat">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

          <div id="imb-<?php echo $imb9[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Surat pernyataan tidak keberatan dari pemilik tanah (apabila nama pemilik tanah berbeda dengan pemohon)</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->imb_9 != NULL) { ?>
                    <?php if ($imb9[1] == 'pdf') { ?>
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/imb/'.$d_berkas->imb_9) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/imb/'.$d_berkas->imb_9) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>
                    <?php } elseif ($imb9[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/imb/'.$d_berkas->imb_9) ?>" alt="Surat pernyataan tidak keberatan dari pemilik tanah (apabila nama pemilik tanah berbeda dengan pemohon)">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

          <div id="imb-<?php echo $imb10[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title"> Surat Rekomendasi Kades / Lurah</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->imb_10 != NULL) { ?>
                    <?php if ($imb10[1] == 'pdf') { ?>
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/imb/'.$d_berkas->imb_10) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/imb/'.$d_berkas->imb_10) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>
                    <?php } elseif ($imb10[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/imb/'.$d_berkas->imb_10) ?>" alt="Surat Rekomendasi Kades / Lurah">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

           <?php }   //imb ?>

           <?php 
            if ($value->kode_surat == 3) {  // kts ?>
             <?php 
              $kts1 = explode('.', $d_berkas->kts_1);
              $kts2 = explode('.', $d_berkas->kts_2);
              $kts3 = explode('.', $d_berkas->kts_3); 
              $kts4 = explode('.', $d_berkas->kts_4); 
              ?> 
             <h4><b>Persyaratan yang di upload</b></h4>  
              <div class="btn-group-vertical btn-block ">
                <button data-toggle="modal" data-target="#kts-<?php echo $kts1[0];  ?>  " type="button" class="btn btn-default">Surat Pengantar dari <br>kelurahan/Desa</button>
                <button data-toggle="modal" data-target="#kts-<?php echo $kts2[0];  ?>  " type="button" class="btn btn-default">Fotocopy KTP daerah Asal</button>
                <button data-toggle="modal" data-target="#kts-<?php echo $kts3[0];  ?>  " type="button" class="btn btn-default ">Fotocopy KTP Penanggung Jawab</button>
                <button data-toggle="modal" data-target="#kts-<?php echo $kts4[0];  ?>  " type="button" class="btn btn-default "> Pas Photo berwarna 2x3</button>
              </div>

            <div id="kts-<?php echo $kts1[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                   
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">  Surat Pengantar dari kelurahan / Desa</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->kts_1 != NULL) { ?>

                    <?php if ($kts1[1] == 'pdf') { ?>
                      
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/kts/'.$d_berkas->kts_1) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/kts/'.$d_berkas->kts_1) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>

                    <?php } elseif ($kts1[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/kts/'.$d_berkas->kts_1) ?>" alt="Surat Pengantar dari Desa/Kelurahan">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

           <div id="kts-<?php echo $kts2[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                   
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Fotocopy KTP daerah Asal</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->kts_2 != NULL) { ?>

                    <?php if ($kts2[1] == 'pdf') { ?>
                      
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/kts/'.$d_berkas->kts_2) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/kts/'.$d_berkas->kts_2) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>

                    <?php } elseif ($kts2[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/kts/'.$d_berkas->kts_2) ?>" alt="Fotocopy KTP Pemohon">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

           <div id="kts-<?php echo $kts3[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Fotocopy KTP Penanggung Jawab</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->kts_3 != NULL) { ?>
                    <?php if ($kts3[1] == 'pdf') { ?>
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/kts/'.$d_berkas->kts_3) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/kts/'.$d_berkas->kts_3) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>
                    <?php } elseif ($kts3[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/kts/'.$d_berkas->kts_3) ?>" alt="Fotocopy KK Pemohon">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

          <div id="kts-<?php echo $kts4[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Pas Photo berwarna 2x3</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->kts_4 != NULL) { ?>
                    <?php if ($kts4[1] == 'pdf') { ?>
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/kts/'.$d_berkas->kts_4) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/kts/'.$d_berkas->kts_4) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>
                    <?php } elseif ($kts4[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/kts/'.$d_berkas->kts_4) ?>" alt="Fotocopy KK Pemohon">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

           <?php }   //kts ?>



          <?php 
            if ($value->kode_surat == 19) {  // Skw ?>
             <?php 
              $skw1 = explode('.', $d_berkas->skw_1);
              $skw2 = explode('.', $d_berkas->skw_2);
              $skw3 = explode('.', $d_berkas->skw_3); 
              $skw4 = explode('.', $d_berkas->skw_4); 
              ?> 
            <h4><b>Persyaratan yang di upload</b></h4>  
              <div class="btn-group-vertical btn-block ">
                <button data-toggle="modal" data-target="#skw-<?php echo $skw1[0];  ?>  " type="button" class="btn btn-default">Fotocopy KTP Pemohon</button>
                <button data-toggle="modal" data-target="#skw-<?php echo $skw2[0];  ?>  " type="button" class="btn btn-default">Fotocopy Bukti Lunas PBB <br> Tahun Berakhir</button>
                <button data-toggle="modal" data-target="#skw-<?php echo $skw3[0];  ?>  " type="button" class="btn btn-default ">Surat Kuasa</button>
                <button data-toggle="modal" data-target="#skw-<?php echo $skw4[0];  ?>  " type="button" class="btn btn-default ">Surat Keterangan Kematian</button>
              </div>

            <div id="skw-<?php echo $skw1[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                   
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Fotocopy KTP Pemohon</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->skw_1 != NULL) { ?>

                    <?php if ($skw1[1] == 'pdf') { ?>
                      
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/skw/'.$d_berkas->skw_1) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/skw/'.$d_berkas->skw_1) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>

                    <?php } elseif ($skw1[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/skw/'.$d_berkas->skw_1) ?>" alt="Surat Pengantar dari Desa/Kelurahan">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

           <div id="skw-<?php echo $skw2[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                   
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Fotocopy Bukti Lunas PBB Tahun Berakhir</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->skw_2 != NULL) { ?>

                    <?php if ($skw2[1] == 'pdf') { ?>
                      
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/skw/'.$d_berkas->skw_2) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/skw/'.$d_berkas->skw_2) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>

                    <?php } elseif ($skw2[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/skw/'.$d_berkas->skw_2) ?>" alt="Fotocopy KTP Pemohon">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

           <div id="skw-<?php echo $skw3[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Surat Kuasa</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->skw_3 != NULL) { ?>
                    <?php if ($skw3[1] == 'pdf') { ?>
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/skw/'.$d_berkas->skw_3) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/skw/'.$d_berkas->skw_3) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>
                    <?php } elseif ($skw3[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/skw/'.$d_berkas->skw_3) ?>" alt="Fotocopy KK Pemohon">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

          <div id="skw-<?php echo $skw4[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Surat Keterangan Kematian</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->skw_4 != NULL) { ?>
                    <?php if ($skw4[1] == 'pdf') { ?>
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/skw/'.$d_berkas->skw_4) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/skw/'.$d_berkas->skw_4) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>
                    <?php } elseif ($skw4[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/skw/'.$d_berkas->skw_4) ?>" alt="Fotocopy KK Pemohon">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

           <?php }   //skw?>

          <?php 
            if ($value->kode_surat == 5) {  // Surat rekomendasi bersih lingkungan ?>
             <?php 
              $sbl1 = explode('.', $d_berkas->sbl_1);
              $sbl2 = explode('.', $d_berkas->sbl_2);
              $sbl3 = explode('.', $d_berkas->sbl_3); 
              ?> 
            <h4><b>Persyaratan yang di upload</b></h4>  
              <div class="btn-group-vertical btn-block ">
                <button data-toggle="modal" data-target="#sbl-<?php echo $sbl1[0];  ?>  " type="button" class="btn btn-default">Surat Pengantar dari Desa/Kelurahan</button>
                <button data-toggle="modal" data-target="#sbl-<?php echo $sbl2[0];  ?>  " type="button" class="btn btn-default">Fotocopy KTP Pemohon</button>
                <button data-toggle="modal" data-target="#sbl-<?php echo $sbl3[0];  ?>  " type="button" class="btn btn-default ">Pas Photo Berwarna 4x6</button>
              </div>

            <div id="sbl-<?php echo $sbl1[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                   
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Surat Pengantar dari Desa/Kelurahan</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->sbl_1 != NULL) { ?>

                    <?php if ($sbl1[1] == 'pdf') { ?>
                      
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/sbl/'.$d_berkas->sbl_1) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/sbl/'.$d_berkas->sbl_1) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>

                    <?php } elseif ($sbl1[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/sbl/'.$d_berkas->sbl_1) ?>" alt="Surat Pengantar dari Desa/Kelurahan">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

           <div id="sbl-<?php echo $sbl2[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                   
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Fotocopy KTP Pemohon</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->sbl_2 != NULL) { ?>

                    <?php if ($sbl2[1] == 'pdf') { ?>
                      
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/sbl/'.$d_berkas->sbl_2) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/sbl/'.$d_berkas->sbl_2) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>

                    <?php } elseif ($sbl2[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/sbl/'.$d_berkas->sbl_2) ?>" alt="Fotocopy KTP Pemohon">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

           <div id="sbl-<?php echo $sbl3[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Pas Photo Berwarna 4x6</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->sbl_3 != NULL) { ?>
                    <?php if ($sbl3[1] == 'pdf') { ?>
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/sbl/'.$d_berkas->sbl_3) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/sbl/'.$d_berkas->sbl_3) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>
                    <?php } elseif ($sbl3[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/sbl/'.$d_berkas->sbl_3) ?>" alt="Fotocopy KK Pemohon">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

           <?php }   //Surat rekomendasi bersih lingkungan?>
         
          <?php 
            if ($value->kode_surat == 48) {  // Surat Keterangan tidak mampu ?>
             <?php 
              $sktm1 = explode('.', $d_berkas->sktm_1);
              $sktm2 = explode('.', $d_berkas->sktm_2);
              $sktm3 = explode('.', $d_berkas->sktm_3); 
              ?> 
            <h4><b>Persyaratan yang di upload</b></h4>  
              <div class="btn-group-vertical btn-block ">
                <button data-toggle="modal" data-target="#sktm-<?php echo $sktm1[0];  ?>  " type="button" class="btn btn-default">Surat Pengantar dari <br>Desa/Kelurahan</button>
                <button data-toggle="modal" data-target="#sktm-<?php echo $sktm2[0];  ?>  " type="button" class="btn btn-default">Fotocopy KTP Pemohon</button>
                <button data-toggle="modal" data-target="#sktm-<?php echo $sktm3[0];  ?>  " type="button" class="btn btn-default ">Fotocopy KK Pemohon</button>
              </div>

            <div id="sktm-<?php echo $sktm1[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                   
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Surat Pengantar dari Desa/Kelurahan</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->sktm_1 != NULL) { ?>

                    <?php if ($sktm1[1] == 'pdf') { ?>
                      
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/sktm/'.$d_berkas->sktm_1) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/sktm/'.$d_berkas->sktm_1) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>

                    <?php } elseif ($sktm1[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/sktm/'.$d_berkas->sktm_1) ?>" alt="Surat Pengantar dari Desa/Kelurahan">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

           <div id="sktm-<?php echo $sktm2[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                   
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Fotocopy KTP Pemohon</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->sktm_2 != NULL) { ?>

                    <?php if ($sktm2[1] == 'pdf') { ?>
                      
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/sktm/'.$d_berkas->sktm_2) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/sktm/'.$d_berkas->sktm_2) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>

                    <?php } elseif ($sktm2[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/sktm/'.$d_berkas->sktm_2) ?>" alt="Fotocopy KTP Pemohon">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

           <div id="sktm-<?php echo $sktm3[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Fotocopy KK Pemohon</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->sktm_3 != NULL) { ?>
                    <?php if ($sktm3[1] == 'pdf') { ?>
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/sktm/'.$d_berkas->sktm_3) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/sktm/'.$d_berkas->sktm_3) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>
                    <?php } elseif ($sktm3[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/sktm/'.$d_berkas->sktm_3) ?>" alt="Fotocopy KK Pemohon">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

           <?php }   // Surat Keterangan tidak mampu?>

             <?php 
            if ($value->kode_surat == 503) {  // Surat Keterangan kelakuan baik?>
             <?php  
              $skkb1 = explode('.', $d_berkas->skkb_1);
              $skkb2 = explode('.', $d_berkas->skkb_2);
              $skkb3 = explode('.', $d_berkas->skkb_3); 
              ?> 
             <h4><b>Persyaratan yang di upload</b></h4> 
               <div class="btn-group-vertical btn-block "> 
                <button data-toggle="modal" data-target="#skkb-<?php echo $skkb1[0];  ?>  " type="button" class="btn btn-default">Surat Pengantar dari <br>Desa/Kelurahan</button>
                <button data-toggle="modal" data-target="#skkb-<?php echo $skkb2[0];  ?>  " type="button" class="btn btn-default">Fotocopy KTP Pemohon</button>
                <button data-toggle="modal" data-target="#skkb-<?php echo $skkb3[0];  ?>  " type="button" class="btn btn-default ">Fotocopy KK Pemohon</button>
              </div>

            <div id="skkb-<?php echo $skkb1[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                   
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Surat Pengantar/Rekomendasi dari Lurah/Kepala Desa</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->skkb_1 != NULL) { ?>

                    <?php if ($skkb1[1] == 'pdf') { ?>
                      
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/skkb/'.$d_berkas->skkb_1) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/skkb/'.$d_berkas->skkb_1) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>

                    <?php } elseif ($skkb1[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/skkb/'.$d_berkas->skkb_1) ?>" alt="Surat Pengantar/Rekomendasi dari Lurah/Kepala Desa">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

           <div id="skkb-<?php echo $skkb2[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                   
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Fotocopy KTP Pemohon</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->skkb_2 != NULL) { ?>

                    <?php if ($skkb2[1] == 'pdf') { ?>
                      
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/skkb/'.$d_berkas->skkb_2) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/skkb/'.$d_berkas->skkb_2) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>

                    <?php } elseif ($skkb2[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/skkb/'.$d_berkas->skkb_2) ?>" alt="Fotocopy KTP Pemohon">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

           <div id="skkb-<?php echo $skkb3[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Pas photo 4 x 6 </h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->skkb_3 != NULL) { ?>
                    <?php if ($skkb3[1] == 'pdf') { ?>
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/skkb/'.$d_berkas->skkb_3) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/skkb/'.$d_berkas->skkb_3) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>
                    <?php } elseif ($skkb3[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/skkb/'.$d_berkas->skkb_3) ?>" alt="Pas photo 4 x 6 ">
                    <?php } } else { echo ' <h4 class="text-info"> Data Tidak Ditemukan ! </h4><br> Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

           <?php } // Surat Keterangan kelakuan baik ?>
<?php 
            if ($value->kode_surat == 12) {  // Surat rekomendasi Keterangan usaha ?>
             <?php  
              $srku1 = explode('.', $d_berkas->srku_1);
              $srku2 = explode('.', $d_berkas->srku_2);
              $srku3 = explode('.', $d_berkas->srku_3); 
              ?> 
             <h4><b>Persyaratan yang di upload</b></h4>  
              <div class="btn-group-vertical btn-block ">
                <button data-toggle="modal" data-target="#srku-<?php echo $srku1[0];  ?>  " type="button" class="btn btn-default">Surat Pengantar dari Desa/Kelurahan</button>
                <button data-toggle="modal" data-target="#srku-<?php echo $srku2[0];  ?>  " type="button" class="btn btn-default">Fotocopy KTP Pemohon</button>
                <button data-toggle="modal" data-target="#srku-<?php echo $srku3[0];  ?>  " type="button" class="btn btn-default ">Fotocopy KK Pemohon</button>
              </div>

            <div id="srku-<?php echo $srku1[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                   
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Fotocopy KTP Pemohon</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->srku_1 != NULL) { ?>

                    <?php if ($srku1[1] == 'pdf') { ?>
                      
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/srku/'.$d_berkas->srku_1) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/srku/'.$d_berkas->srku_1) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>

                    <?php } elseif ($srku1[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/srku/'.$d_berkas->srku_1) ?>" alt="Surat Pengantar/Rekomendasi dari Lurah/Kepala Desa">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

           <div id="srku-<?php echo $srku2[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                   
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Fotocopy Bukti Lunas PBB Tahun Terakhir</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->srku_2 != NULL) { ?>

                    <?php if ($srku2[1] == 'pdf') { ?>
                      
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/srku/'.$d_berkas->srku_2) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/srku/'.$d_berkas->srku_2) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>

                    <?php } elseif ($srku2[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/srku/'.$d_berkas->srku_2) ?>" alt="Fotocopy KTP Pemohon">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

           <div id="srku-<?php echo $srku3[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Surat Keterangan Usaha dari Lurah/Kades</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->srku_3 != NULL) { ?>
                    <?php if ($srku3[1] == 'pdf') { ?>
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/srku/'.$d_berkas->srku_3) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/srku/'.$d_berkas->srku_3) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>
                    <?php } elseif ($srku3[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/srku/'.$d_berkas->srku_3) ?>" alt="Pas photo 4 x 6 ">
                    <?php } } else { echo ' <h4 class="text-info"> Data Tidak Ditemukan ! </h4><br> Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

           <?php } // Surat rekomendasi Keterangan usaha ?>
          

            <?php 
            if ($value->kode_surat == 11) {  // Surat Izin Gangguan ?>
             <?php  
              $srig1 = explode('.', $d_berkas->srig_1);
              $srig2 = explode('.', $d_berkas->srig_2);
              $srig3 = explode('.', $d_berkas->srig_3); 
              $srig4 = explode('.', $d_berkas->srig_4); 
              $srig5 = explode('.', $d_berkas->srig_5); 
              $srig6 = explode('.', $d_berkas->srig_6); 
              $srig7 = explode('.', $d_berkas->srig_7); 

              ?> 
            <h4><b>Persyaratan yang di upload</b></h4>  
              <div class="btn-group-vertical btn-block ">
                <button data-toggle="modal" data-target="#srig-<?php echo $srig1[0]; ?>  " type="button" class="btn btn-default">Fotocopy KTP Pemohon</button>
                <button data-toggle="modal" data-target="#srig-<?php echo $srig2[0]; ?>  " type="button" class="btn btn-default">Fotocopy Bukti Lunas PBB <br>Tahun Terakhir</button>
                <button data-toggle="modal" data-target="#srig-<?php echo $srig3[0]; ?>  " type="button" class="btn btn-default ">Fotocopy Akta Pendirian <br>Perusahaan bagi CV/PT</button>
                <button data-toggle="modal" data-target="#srig-<?php echo $srig4[0]; ?>  " type="button" class="btn btn-default ">Surat Pernyataan Persetujuan <br> Tetangga (minimal 2 tetangga) <br> Diketahui Lurah/Kades  dan Camat  <br>beserta Fotocopy KTP</button>
                <button data-toggle="modal" data-target="#srig-<?php echo $srig5[0]; ?>  " type="button" class="btn btn-default ">Surat Rekomendasi dari <br>Lurah/Kades</button>
                <button data-toggle="modal" data-target="#srig-<?php echo $srig6[0]; ?>  " type="button" class="btn btn-default "> Fotocopy Perjanjian pemakaian/ <br>penguasaan  gudang dengan <br> pemilik gudang <br> (jika menyewa gudang)</button>
                <button data-toggle="modal" data-target="#srig-<?php echo $srig7[0];  ?>  " type="button" class="btn btn-default ">Fotocopy surat Perjanjian Sewa <br> Menyewa/Kontrak Lahan/Bangunan <br>(bila bukan tempat sendiri)</button>

              </div>

            <div id="srig-<?php echo $srig1[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                   
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Fotocopy KTP Pemohon</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->srig_1 != NULL) { ?>

                    <?php if ($srig1[1] == 'pdf') { ?>
                      
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/srig/'.$d_berkas->srig_1) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/srig/'.$d_berkas->srig_1) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>

                    <?php } elseif ($srig1[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/srig/'.$d_berkas->srig_1) ?>" alt="Surat Pengantar/Rekomendasi dari Lurah/Kepala Desa">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

           <div id="srig-<?php echo $srig2[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                   
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Fotocopy Bukti Lunas PBB Tahun Terakhir</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->srig_2 != NULL) { ?>

                    <?php if ($srig2[1] == 'pdf') { ?>
                      
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/srig/'.$d_berkas->srig_2) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/srig/'.$d_berkas->srig_2) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>

                    <?php } elseif ($srig2[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/srig/'.$d_berkas->srig_2) ?>" alt="Fotocopy KTP Pemohon">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

           <div id="srig-<?php echo $srig3[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Fotocopy Akta Pendirian Perusahaan bagi CV/PT</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->srig_3 != NULL) { ?>
                    <?php if ($srig3[1] == 'pdf') { ?>
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/srig/'.$d_berkas->srig_3) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/srig/'.$d_berkas->srig_3) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>
                    <?php } elseif ($srig3[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/srig/'.$d_berkas->srig_3) ?>" alt="Pas photo 4 x 6 ">
                    <?php } } else { echo ' <h4 class="text-info"> Data Tidak Ditemukan ! </h4><br> Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

          <div id="srig-<?php echo $srig4[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Surat Pernyataan Persetujuan Tetangga (minimal 2 tetangga) Diketahui Lurah/Kades dan Camat beserta Fotocopy KTP </h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->srig_4 != NULL) { ?>
                    <?php if ($srig4[1] == 'pdf') { ?>
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/srig/'.$d_berkas->srig_4) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/srig/'.$d_berkas->srig_4) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>
                    <?php } elseif ($srig4[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/srig/'.$d_berkas->srig_4) ?>" alt="Pas photo 4 x 6 ">
                    <?php } } else { echo ' <h4 class="text-info"> Data Tidak Ditemukan ! </h4><br> Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>
           <div id="srig-<?php echo $srig5[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Surat Rekomendasi dari Lurah/Kades</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->srig_5 != NULL) { ?>
                    <?php if ($srig5[1] == 'pdf') { ?>
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/srig/'.$d_berkas->srig_5) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/srig/'.$d_berkas->srig_5) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>
                    <?php } elseif ($srig5[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/srig/'.$d_berkas->srig_5) ?>" alt="Pas photo 4 x 6 ">
                    <?php } } else { echo ' <h4 class="text-info"> Data Tidak Ditemukan ! </h4><br> Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

          <div id="srig-<?php echo $srig6[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Fotocopy Perjanjian pemakaian/penguasaan gudang dengan pemilik gudang (jika menyewa gudang)</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->srig_6 != NULL) { ?>
                    <?php if ($srig6[1] == 'pdf') { ?>
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/srig/'.$d_berkas->srig_6) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/srig/'.$d_berkas->srig_6) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>
                    <?php } elseif ($srig6[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/srig/'.$d_berkas->srig_6) ?>" alt="Pas photo 4 x 6 ">
                    <?php } } else { echo ' <h4 class="text-info"> Data Tidak Ditemukan ! </h4><br> Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

          <div id="srig-<?php echo $srig7[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Fotocopy surat Perjanjian Sewa Menyewa/Kontrak Lahan/Bangunan (bila bukan tempat sendiri)</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->srig_7 != NULL) { ?>
                    <?php if ($srig7[1] == 'pdf') { ?>
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/srig/'.$d_berkas->srig_7) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/srig/'.$d_berkas->srig_7) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>
                    <?php } elseif ($srig7[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/srig/'.$d_berkas->srig_7) ?>" alt="Pas photo 4 x 6 ">
                    <?php } } else { echo ' <h4 class="text-info"> Data Tidak Ditemukan ! </h4><br> Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>
           <?php } // Surat Izin Gangguan ?>


            <?php 
            if ($value->kode_surat == 13) {  //   Perpanjangan Izin Oprasional?>
             <?php  
              $rpio1 = explode('.', $d_berkas->rpio_1);
              $rpio2 = explode('.', $d_berkas->rpio_2);
              $rpio3 = explode('.', $d_berkas->rpio_3); 
              $rpio4 = explode('.', $d_berkas->rpio_4); 
              $rpio5 = explode('.', $d_berkas->rpio_5); 


              ?> 
             <h4><b>Persyaratan yang di upload</b></h4>  
              <div class="btn-group-vertical btn-block ">
                <button data-toggle="modal" data-target="#rpio-<?php echo $rpio1[0];  ?>  " type="button" class="btn btn-default">Pas Photo Berwarna 4x6</button>
                <button data-toggle="modal" data-target="#rpio-<?php echo $rpio2[0];  ?>  " type="button" class="btn btn-default">Fotocopy KTP Direktur/Pemilik</button>
                <button data-toggle="modal" data-target="#rpio-<?php echo $rpio3[0];  ?>  " type="button" class="btn btn-default ">Fotocopy Akta Pendirian</button>
                <button data-toggle="modal" data-target="#rpio-<?php echo $rpio4[0];  ?>  " type="button" class="btn btn-default ">Fotocopy Surat Izin yang lama</button>
                <button data-toggle="modal" data-target="#rpio-<?php echo $rpio5[0];  ?>  " type="button" class="btn btn-default ">Fotocopy data kepengurusan <br> pendidik/ pengelola</button>
              </div>

            <div id="rpio-<?php echo $rpio1[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                   
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Fotocopy KTP Pemohon</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->rpio_1 != NULL) { ?>

                    <?php if ($rpio1[1] == 'pdf') { ?>
                      
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/rpio/'.$d_berkas->rpio_1) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/rpio/'.$d_berkas->rpio_1) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>

                    <?php } elseif ($rpio1[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/rpio/'.$d_berkas->rpio_1) ?>" alt="Surat Pengantar/Rekomendasi dari Lurah/Kepala Desa">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

           <div id="rpio-<?php echo $rpio2[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                   
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Fotocopy Bukti Lunas PBB Tahun Terakhir</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->rpio_2 != NULL) { ?>

                    <?php if ($rpio2[1] == 'pdf') { ?>
                      
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/rpio/'.$d_berkas->rpio_2) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/rpio/'.$d_berkas->rpio_2) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>

                    <?php } elseif ($rpio2[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/rpio/'.$d_berkas->rpio_2) ?>" alt="Fotocopy KTP Pemohon">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

           <div id="rpio-<?php echo $rpio3[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Fotocopy Akta Pendirian Perusahaan bagi CV/PT</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->rpio_3 != NULL) { ?>
                    <?php if ($rpio3[1] == 'pdf') { ?>
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/rpio/'.$d_berkas->rpio_3) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/rpio/'.$d_berkas->rpio_3) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>
                    <?php } elseif ($rpio3[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/rpio/'.$d_berkas->rpio_3) ?>" alt="Pas photo 4 x 6 ">
                    <?php } } else { echo ' <h4 class="text-info"> Data Tidak Ditemukan ! </h4><br> Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

          <div id="rpio-<?php echo $rpio4[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Surat Pernyataan Persetujuan Tetangga (minimal 2 tetangga) Diketahui Lurah/Kades dan Camat beserta Fotocopy KTP </h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->rpio_4 != NULL) { ?>
                    <?php if ($rpio4[1] == 'pdf') { ?>
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/rpio/'.$d_berkas->rpio_4) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/rpio/'.$d_berkas->rpio_4) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>
                    <?php } elseif ($rpio4[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/rpio/'.$d_berkas->rpio_4) ?>" alt="Pas photo 4 x 6 ">
                    <?php } } else { echo ' <h4 class="text-info"> Data Tidak Ditemukan ! </h4><br> Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>
           <div id="rpio-<?php echo $rpio5[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Surat Rekomendasi dari Lurah/Kades</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->rpio_5 != NULL) { ?>
                    <?php if ($rpio5[1] == 'pdf') { ?>
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/rpio/'.$d_berkas->rpio_5) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/rpio/'.$d_berkas->rpio_5) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>
                    <?php } elseif ($rpio5[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/rpio/'.$d_berkas->rpio_5) ?>" alt="Pas photo 4 x 6 ">
                    <?php } } else { echo ' <h4 class="text-info"> Data Tidak Ditemukan ! </h4><br> Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

           <?php } //   Perpanjangan Izin Oprasional ?>

           <?php 
            if ($value->kode_surat == 8) {  //  Surat Rekomendari Izin Keramaian ?>
             <?php  
              $rpik1 = explode('.', $d_berkas->rpik_1);
              $rpik2 = explode('.', $d_berkas->rpik_2);
              $rpik3 = explode('.', $d_berkas->rpik_3); 

              ?> 
             <h4><b>Persyaratan yang di upload</b></h4>  
              <div class="btn-group-vertical btn-block ">
                <button data-toggle="modal" data-target="#rpik-<?php echo $rpik1[0];  ?>  " type="button" class="btn btn-default">Fotocopy KTP Pemohon</button>
                <button data-toggle="modal" data-target="#rpik-<?php echo $rpik2[0];  ?>  " type="button" class="btn btn-default">Surat Pengantar / Rekomandasi izin <br>keramaian yang ditanda tangani <br>Kades / Lurah</button>
                <button data-toggle="modal" data-target="#rpik-<?php echo $rpik3[0];  ?>  " type="button" class="btn btn-default ">Surat pernyataan bertanggung <br> jawab atas pelaksana keramaian</button>

            <div id="rpik-<?php echo $rpik1[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                   
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Fotocopy KTP Pemohon</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->rpik_1 != NULL) { ?>

                    <?php if ($rpik1[1] == 'pdf') { ?>
                      
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/rpik/'.$d_berkas->rpik_1) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/rpik/'.$d_berkas->rpik_1) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>

                    <?php } elseif ($rpik1[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/rpik/'.$d_berkas->rpik_1) ?>" alt="Surat Pengantar/Rekomendasi dari Lurah/Kepala Desa">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

           <div id="rpik-<?php echo $rpik2[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                   
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Fotocopy Bukti Lunas PBB Tahun Terakhir</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->rpik_2 != NULL) { ?>

                    <?php if ($rpik2[1] == 'pdf') { ?>
                      
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/rpik/'.$d_berkas->rpik_2) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/rpik/'.$d_berkas->rpik_2) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>

                    <?php } elseif ($rpik2[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/rpik/'.$d_berkas->rpik_2) ?>" alt="Fotocopy KTP Pemohon">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

           <div id="rpik-<?php echo $rpik3[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Fotocopy Akta Pendirian Perusahaan bagi CV/PT</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->rpik_3 != NULL) { ?>
                    <?php if ($rpik3[1] == 'pdf') { ?>
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/rpik/'.$d_berkas->rpik_3) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/rpik/'.$d_berkas->rpik_3) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>
                    <?php } elseif ($rpik3[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/rpik/'.$d_berkas->rpik_3) ?>" alt="Pas photo 4 x 6 ">
                    <?php } } else { echo ' <h4 class="text-info"> Data Tidak Ditemukan ! </h4><br> Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>


           <?php } // Surat Rekomendari Izin Keramaian ?>

            <?php 
            if ($value->kode_surat == 2) {  // Surat Keterangan Domisili Perusahaan ?>
             <?php  
              $kdp1 = explode('.', $d_berkas->kdp_1);
              $kdp2 = explode('.', $d_berkas->kdp_2);
              $kdp3 = explode('.', $d_berkas->kdp_3); 
              $kdp4 = explode('.', $d_berkas->kdp_4); 
              $kdp5 = explode('.', $d_berkas->kdp_5); 
              $kdp6 = explode('.', $d_berkas->kdp_6); 
              $kdp7 = explode('.', $d_berkas->kdp_7); 

              ?> 
             <h4><b>Persyaratan yang di upload</b></h4>  
              <div class="btn-group-vertical btn-block ">
                <button data-toggle="modal" data-target="#kdp-<?php echo $kdp1[0]; ?>  " type="button" class="btn btn-default">Surat Keterangan Domisili <br>perusahaan dari Desa / Kelurahan</button>
                <button data-toggle="modal" data-target="#kdp-<?php echo $kdp2[0]; ?>  " type="button" class="btn btn-default"> Fotocopy SIUP</button>
                <button data-toggle="modal" data-target="#kdp-<?php echo $kdp3[0]; ?>  " type="button" class="btn btn-default ">Fotocopy TDP</button>
                <button data-toggle="modal" data-target="#kdp-<?php echo $kdp4[0]; ?>  " type="button" class="btn btn-default ">  Fotocopy Akta pendirian perusahaan</button>
                <button data-toggle="modal" data-target="#kdp-<?php echo $kdp5[0]; ?>  " type="button" class="btn btn-default ">Fotocopy bukti Pelunasan PBB</button>
                <button data-toggle="modal" data-target="#kdp-<?php echo $kdp6[0]; ?>  " type="button" class="btn btn-default "> Fotocopy KTP Direktur/Pemilik</button>
                <button data-toggle="modal" data-target="#kdp-<?php echo $kdp7[0];  ?>  " type="button" class="btn btn-default ">Fotocopy NPWP Perusahaan</button>
              </div>

            <div id="kdp-<?php echo $kdp1[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                   
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Surat Keterangan Domisili perusahaan dari Desa / Kelurahan</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->kdp_1 != NULL) { ?>

                    <?php if ($kdp1[1] == 'pdf') { ?>
                      
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/kdp/'.$d_berkas->kdp_1) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/kdp/'.$d_berkas->kdp_1) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>

                    <?php } elseif ($kdp1[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/kdp/'.$d_berkas->kdp_1) ?>" alt="Surat Pengantar/Rekomendasi dari Lurah/Kepala Desa">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

           <div id="kdp-<?php echo $kdp2[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                   
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Fotocopy SIUP</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->kdp_2 != NULL) { ?>

                    <?php if ($kdp2[1] == 'pdf') { ?>
                      
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/kdp/'.$d_berkas->kdp_2) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/kdp/'.$d_berkas->kdp_2) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>

                    <?php } elseif ($kdp2[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/kdp/'.$d_berkas->kdp_2) ?>" alt="Fotocopy KTP Pemohon">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

           <div id="kdp-<?php echo $kdp3[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Fotocopy TDP</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->kdp_3 != NULL) { ?>
                    <?php if ($kdp3[1] == 'pdf') { ?>
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/kdp/'.$d_berkas->kdp_3) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/kdp/'.$d_berkas->kdp_3) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>
                    <?php } elseif ($kdp3[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/kdp/'.$d_berkas->kdp_3) ?>" alt="Pas photo 4 x 6 ">
                    <?php } } else { echo ' <h4 class="text-info"> Data Tidak Ditemukan ! </h4><br> Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

          <div id="kdp-<?php echo $kdp4[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Fotocopy Akta pendirian perusahaan</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->kdp_4 != NULL) { ?>
                    <?php if ($kdp4[1] == 'pdf') { ?>
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/kdp/'.$d_berkas->kdp_4) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/kdp/'.$d_berkas->kdp_4) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>
                    <?php } elseif ($kdp4[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/kdp/'.$d_berkas->kdp_4) ?>" alt="Pas photo 4 x 6 ">
                    <?php } } else { echo ' <h4 class="text-info"> Data Tidak Ditemukan ! </h4><br> Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>
           <div id="kdp-<?php echo $kdp5[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Fotocopy bukti Pelunasan PBB</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->kdp_5 != NULL) { ?>
                    <?php if ($kdp5[1] == 'pdf') { ?>
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/kdp/'.$d_berkas->kdp_5) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/kdp/'.$d_berkas->kdp_5) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>
                    <?php } elseif ($kdp5[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/kdp/'.$d_berkas->kdp_5) ?>" alt="Pas photo 4 x 6 ">
                    <?php } } else { echo ' <h4 class="text-info"> Data Tidak Ditemukan ! </h4><br> Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

          <div id="kdp-<?php echo $kdp6[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Fotocopy KTP Direktur/Pemilik</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->kdp_6 != NULL) { ?>
                    <?php if ($kdp6[1] == 'pdf') { ?>
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/kdp/'.$d_berkas->kdp_6) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/kdp/'.$d_berkas->kdp_6) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>
                    <?php } elseif ($kdp6[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/kdp/'.$d_berkas->kdp_6) ?>" alt="Pas photo 4 x 6 ">
                    <?php } } else { echo ' <h4 class="text-info"> Data Tidak Ditemukan ! </h4><br> Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

          <div id="kdp-<?php echo $kdp7[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Fotocopy NPWP Perusahaan</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->kdp_7 != NULL) { ?>
                    <?php if ($kdp7[1] == 'pdf') { ?>
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/kdp/'.$d_berkas->kdp_7) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/kdp/'.$d_berkas->kdp_7) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>
                    <?php } elseif ($kdp7[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/kdp/'.$d_berkas->kdp_7) ?>" alt="Pas photo 4 x 6 ">
                    <?php } } else { echo ' <h4 class="text-info"> Data Tidak Ditemukan ! </h4><br> Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>
           <?php } // Surat Keterangan Domisili Perusahaan ?>

            <?php 
            if ($value->kode_surat == 10) {  // Izin Usaha Mikro dan Kecil?>
             <?php  
              $imk1 = explode('.', $d_berkas->imk_1);
              $imk2 = explode('.', $d_berkas->imk_2);
              $imk3 = explode('.', $d_berkas->imk_3); 
              $imk4 = explode('.', $d_berkas->imk_4); 
              $imk5 = explode('.', $d_berkas->imk_5); 
              $imk6 = explode('.', $d_berkas->imk_6); 
              $imk7 = explode('.', $d_berkas->imk_7); 

              ?> 
             <h4><b>Persyaratan yang di upload</b></h4>  
              <div class="btn-group-vertical btn-block ">
                <button data-toggle="modal" data-target="#imk-<?php echo $imk1[0]; ?>  " type="button" class="btn btn-default">Fotocopy KTP Pemohon</button>
                <button data-toggle="modal" data-target="#imk-<?php echo $imk2[0]; ?>  " type="button" class="btn btn-default"> Pas Photo Berwarna 4x6</button>
                <button data-toggle="modal" data-target="#imk-<?php echo $imk3[0]; ?>  " type="button" class="btn btn-default ">Fotocopy Bukti Lunas PBB <br>Tahun Berakhir</button>
                <button data-toggle="modal" data-target="#imk-<?php echo $imk4[0]; ?>  " type="button" class="btn btn-default ">Fotocopy NPWP Perusahaan</button>
                <button data-toggle="modal" data-target="#imk-<?php echo $imk5[0]; ?>  " type="button" class="btn btn-default ">Surat Pernyataan Persetujuan<br> Tetangga  (minimal 2 tetangga)<br> Diketahui Kades/Lurah dan Camat<br> beserta Fotocopy KTP</button>
                <button data-toggle="modal" data-target="#imk-<?php echo $imk6[0]; ?>  " type="button" class="btn btn-default ">Surat Pemohonan bermaterai <br> Rp. 6.000,-</button>
                <button data-toggle="modal" data-target="#imk-<?php echo $imk7[0];  ?>  " type="button" class="btn btn-default ">Surat Rekomendasi Kades / Lurah</button>

              </div>

            <div id="imk-<?php echo $imk1[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                   
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Fotocopy KTP Pemohon</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->imk_1 != NULL) { ?>

                    <?php if ($imk1[1] == 'pdf') { ?>
                      
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/imk/'.$d_berkas->imk_1) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/imk/'.$d_berkas->imk_1) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>

                    <?php } elseif ($imk1[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/imk/'.$d_berkas->imk_1) ?>" alt="Surat Pengantar/Rekomendasi dari Lurah/Kepala Desa">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

           <div id="imk-<?php echo $imk2[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                   
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Pas Photo Berwarna 4x6</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->imk_2 != NULL) { ?>

                    <?php if ($imk2[1] == 'pdf') { ?>
                      
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/imk/'.$d_berkas->imk_2) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/imk/'.$d_berkas->imk_2) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>

                    <?php } elseif ($imk2[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/imk/'.$d_berkas->imk_2) ?>" alt="Fotocopy KTP Pemohon">
                    <?php } } else { echo '<h4 class="text-info"> Data Tidak Ditemukan ! </h4><br>Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

           <div id="imk-<?php echo $imk3[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Fotocopy Bukti Lunas PBB Tahun Berakhir</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->imk_3 != NULL) { ?>
                    <?php if ($imk3[1] == 'pdf') { ?>
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/imk/'.$d_berkas->imk_3) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/imk/'.$d_berkas->imk_3) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>
                    <?php } elseif ($imk3[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/imk/'.$d_berkas->imk_3) ?>" alt="Pas photo 4 x 6 ">
                    <?php } } else { echo ' <h4 class="text-info"> Data Tidak Ditemukan ! </h4><br> Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

          <div id="imk-<?php echo $imk4[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">  Fotocopy NPWP Perusahaan</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->imk_4 != NULL) { ?>
                    <?php if ($imk4[1] == 'pdf') { ?>
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/imk/'.$d_berkas->imk_4) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/imk/'.$d_berkas->imk_4) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>
                    <?php } elseif ($imk4[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/imk/'.$d_berkas->imk_4) ?>" alt="Pas photo 4 x 6 ">
                    <?php } } else { echo ' <h4 class="text-info"> Data Tidak Ditemukan ! </h4><br> Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>
           <div id="imk-<?php echo $imk5[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Surat Pernyataan Persetujuan Tetangga (minimal 2 tetangga) Diketahui Kades/Lurah dan Camat beserta Fotocopy KTP</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->imk_5 != NULL) { ?>
                    <?php if ($imk5[1] == 'pdf') { ?>
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/imk/'.$d_berkas->imk_5) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/imk/'.$d_berkas->imk_5) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>
                    <?php } elseif ($imk5[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/imk/'.$d_berkas->imk_5) ?>" alt="Pas photo 4 x 6 ">
                    <?php } } else { echo ' <h4 class="text-info"> Data Tidak Ditemukan ! </h4><br> Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

          <div id="imk-<?php echo $imk6[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Surat Pemohonan bermaterai Rp. 6.000,-</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->imk_6 != NULL) { ?>
                    <?php if ($imk6[1] == 'pdf') { ?>
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/imk/'.$d_berkas->imk_6) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/imk/'.$d_berkas->imk_6) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>
                    <?php } elseif ($imk6[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/imk/'.$d_berkas->imk_6) ?>" alt="Pas photo 4 x 6 ">
                    <?php } } else { echo ' <h4 class="text-info"> Data Tidak Ditemukan ! </h4><br> Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

          <div id="imk-<?php echo $imk7[0];?>" class="modal fade" role="dialog">
              <div class="row">
                <div class="col-md-8  col-md-offset-2 ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Surat Rekomendasi Kades / Lurah</h4>
                    </div>
                    <div class="modal-body">
                    <?php if ($d_berkas->imk_7 != NULL) { ?>
                    <?php if ($imk7[1] == 'pdf') { ?>
                      <?php if ($this->agent->is_mobile()) { ?>
                          <a href="<?php echo base_url('assets/berkas/imk/'.$d_berkas->imk_7) ?>" >lihat</a>
                      <?php }  else { ?>
                      <embed src='<?php echo base_url('assets/berkas/imk/'.$d_berkas->imk_7) ?>' type='application/pdf' width='100%' height='500'>
                      </embed>
                      <?php } ?>
                    <?php } elseif ($imk7[1] != 'pdf') {?>
                      <img width="100%" src="<?php echo base_url('assets/berkas/imk/'.$d_berkas->imk_7) ?>" alt="Pas photo 4 x 6 ">
                    <?php } } else { echo ' <h4 class="text-info"> Data Tidak Ditemukan ! </h4><br> Anda belum mengupload syarat, silahkan upload syarat dahulu supaya Permohonan anda dapat di proses';}?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>
           <?php } // Izin Usaha Mikro dan Kecil ?>
          
      </div>
    </div>
  </div>
  <div class="box-footer with-border">
        <div class="col-md-1 col-xs-4">
          <a href="<?php echo base_url('epelayanan/histori'); ?>" class="btn btn-app ">
            <i class="fa fa-reply"></i> Kembali </a>
        </div>
        <?php   if ($value->status == 'no') { ?>
        <div class="col-md-1 col-xs-4">
          <a href="<?php echo base_url('epelayanan/edit/'.$value->ID); ?>" class="btn btn-app ">
            <i class="fa fa-pencil "></i> Edit
          </a>
        </div>
        <div class="col-md-1 col-xs-4">
          <a data-toggle="modal" data-target="#myModal<?php echo $value->ID; ?>" href="" class="btn btn-app ">
            <i class="fa fa-trash-o "></i> Hapus
          </a>
        </div>
        <div id="myModal<?php echo $value->ID; ?>" class="modal fade" role="dialog">
                <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Hapus</h4>
                    </div>
                    <div class="modal-body">
                      <p>Anda yakin ingin menghapus ini? </p>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default " data-dismiss="modal">Tidak</button>
                    <a  href="<?php echo base_url('epelayanan/hapus').'/'.$value->ID; ?>"  class="btn btn-warning">Ya</a>
                    </div>
                  </div>
                </div>
              </div>
        <?php }  else {?>
          <div class="col-md-1 col-xs-4 ">
          <a href="<?php echo base_url('epenilaian/nilai/'.$value->ID_pelayanan); ?>" class="btn btn-app bg-green">
            <i class="fa fa-commenting-o "></i>Beri Penilaian
          </a>
        </div>
        <?php } ?>
      </div>
      <div class="box-footer with-border radius">
        <div class="col-md-12">
          <p class="">
           <span class="text-info fa fa-info-circle"> </span> Permohonan pelayanan bisa di ubah dan hapus  jika belum ditindaklanjuti 
          </p>
        </div>
      </div>
       <?php  } }  ?>
</div>
</div>
</div>

