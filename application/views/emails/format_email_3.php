<?php error_reporting(0); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Verifikasi email - Sistem Informasi Pelayanan Online Kecamatan Koba</title>
</head>
<body style="margin: 0; font-family: arial">
		<div style=" margin-left: auto; margin-right: auto; width: 100%; padding: 10px;">
			<header  style="width: auto; ">
				<div style=" float: left; margin-right:10px;">
					<img width="60" src="https://upload.wikimedia.org/wikipedia/commons/1/1b/Lambang_Kabupaten_Bangka_Tengah.png" alt="logo koba - bangka tengah">
				</div>
				<div style="float: left">
					<h1 style="margin: 0; padding-top: 12px; color:#4184F3 ">K I S S</h1>
					<p style="margin: 0; font-size: 1.2em;">Koba District Information And Services Center</p>
				</div>
				<div style="clear: both"></div>	
				<div style="margin-top: 5px; width: auto;  height: 100px; background-color: #FEC226; box-shadow: 1px 1px 1px; border-radius: 2px 2px 0px 0px ">
					<h1 style="margin: 0; padding-top: 55px; padding-left: 40px; color:white ">Verifikasi Email</h1>
				</div>

				<div style=" width: auto; background-color: #FAFAFA; box-shadow: 1px 1px 1px; border-radius: 0px 0px 2px 2px ">
					<div style="width: 94%">
						
					
					<p style="margin: 0;  padding-top: 44px;  padding-left:  40px; font-size: 1em; "><b>Sdr/i <?php echo $nama_lengkap_anda; ?></b>  yang Terhormat,</p>
					<p style="margin: 0; padding-top: 20px;  padding-left: 40px;font-size: 1em;  ">
						Kami menerima permintaan pendaftaran Akun Sistem Informasi Pelayanan Kecamatan Koba melalui alamat email Anda (<?php echo $email_anda; ?>). Kode verifikasi akun Anda adalah :
					</p>
					<p style="font-size: 1.4em; text-align: center; "><b><?php echo $kode ?> &nbsp;</b></p>

					<p style="margin: 0;  padding-left: 40px;font-size: 1em;  ">
						Jika Anda tidak pernah mendaftarkan email anda, ada kemungkinan orang lain mencoba mengakses email anda. Jangan maju atau memberikan kode ini kepada siapapun.
					</p>
					<br>
					<p style="margin: 0;  padding-left: 40px;font-size: 1em;  ">
						Anda menerima pesan ini karena alamat email ini digunakan untuk mendaftar akun ke Sistem Informasi Pelayanan Kecamatan Koba, Jika ini benar email anda silahkan klik <a href="<?php echo base_url('daftar/verifikasi'); ?>" title="verifikasi" target="_blank">disini</a> untuk memverifikasi email anda <?php echo $user ?> | <?php echo $pass ?> | <?php echo $base ?>.
					</p>
					<br>
					<p style="margin: 0;  padding-left: 40px;font-size: 1em;  color: red">
						<b>Perhatikan !</b><br>
						Sebelum anda membuat permohonan surat pastikan anda telah melengkapi Identitas Kependudukan anda sesuai kartu tanda penduduk pada halaman Profil, ini untuk memudahkan pelayanan anda. Pelayanan anda tidak akan di proses apabila data kependudukan anda tidak lengkap. Terima Kasih
					</p>

					<p style="margin: 0; padding-top: 20px; padding-bottom: 44px;  padding-left: 40px;font-size: 1em;  ">
						Hormat kami,
						<br style="padding-bottom: 40px"></br>
						<br style="padding-bottom: 40px"></br>
						<br style="padding-bottom: 40px"></br>
						Kecamatan Koba
					</p>
					</div>
				</div>
					<p style="margin: 0; padding-top: 20px; padding-bottom: 44px;  padding-left: 40px;font-size: 0.8em;  ">
						Email ini terkirim otomatis oleh sistem, kami tidak dapat menerima balasan.
						<br>&copy; Kecamatan Koba, Jalan Raya Arung Dalam Kecamatan Koba 33181
					</p>
			</header><!-- /header -->


		</div>	


</body>
</html>

