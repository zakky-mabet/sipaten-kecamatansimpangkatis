<!DOCTYPE html>
<html>
   <head>
      <title><?php echo $title; ?></title>
      <link rel="stylesheet" href="<?php echo base_url("public/dist/css/style-print.css"); ?>">
      <link rel="stylesheet" href="<?php echo base_url("public/font-awesome/css/font-awesome.min.css"); ?>">
      <link rel="stylesheet" href="<?php echo base_url("public/ionicons/css/ionicons.min.css"); ?>">
      <link rel="shortcut icon" type="image/png" href="<?php echo base_url("public/image/{$this->option->get('small_logo')}"); ?>"/>
   </head>
   <body> <!--  onload="window.print()" -->
      <div class="wrapper">
         <div class="header">
            <table class="kop" align="center">
               <tr class="text-center">
                  <td><img src="<?php echo base_url("public/image/{$this->option->get('logo')}"); ?>" class="logo" alt="Logo Kop"></td>
                  <td>
                     <span class="kop-heading">PEMERINTAH KABUPATEN <?php echo $this->option->get('kabupaten'); ?></span> <br>
                     <span class="kop-heading-company">Kecamatan <?php echo $this->option->get('kecamatan'); ?></span> <br>
                     <span class="kop-heading-address">Alamat : <?php echo $this->option->get('alamat'); ?> <i class="fa fa-phone"></i> <?php echo $this->option->get('telepon'); ?></span>
                  </td>
               </tr>
            </table>
            <div class="hr-small"></div>
         </div>
