<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('header', $this->data );

$account = $this->account->get();
?>
<body class="grey lighten-3">
    <div class="navbar-fixed">
        <nav class="nav-extended orange darken-3">
            <div class="nav-wrapper navbar-fixed">
                <a href="<?php echo site_url('apps'); ?>"><i class="fa fa-angle-double-left"></i></a>
                <a class="heading-text"><?php echo $title ?></a>
                <a href="#logoff" class="right"><i class="fa fa-sign-out"></i></a>
            </div>
        </nav>
    </div>
    <section class="white">
    <div class="container main-content">
        <div class="row">
            <?php if($this->session->flashdata('callback')) : 

                $callback = $this->session->flashdata('callback');
            ?>
            <div class="row">
                <div class="col s12">
                    <div class="card-panel <?php echo $callback['color'] ?>">
                        <span class="white-text">
                            <i class="fa fa-<?php echo $callback['icon'] ?> "></i> <?php echo $callback['message'] ?>
                        </span>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <form class="col s12" action="<?php echo current_url(); ?>" method="post">
            <?php echo form_hidden('ID', $account->user_id) ?>
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" class="validate" name="nip" value="<?php echo $account->nip ?>">
                    <label>NIP</label>
                </div>
                <div class="col s12"><?php echo form_error('nip', '<small class="red-text">', '</small>'); ?></div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" class="validate" name="name" value="<?php echo $account->name ?>">
                    <label>Nama Pengguna</label>
                </div>
                <div class="col s12"><?php echo form_error('name', '<small class="red-text">', '</small>'); ?></div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea class="materialize-textarea" name="alamat"><?php echo $account->address ?></textarea>
                    <label>Alamat</label>
                </div>
                <div class="col s12"><?php echo form_error('alamat', '<small class="red-text">', '</small>'); ?></div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="email" class="validate" name="email" value="<?php echo $account->email ?>">
                    <label>E-Mail</label>
                </div>
                <div class="col s12"><?php echo form_error('email', '<small class="red-text">', '</small>'); ?></div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" class="validate" name="repeat_pass" value="<?php echo $account->phone ?>">
                    <label>Telepon </label>
                </div>
                <div class="col s12"><?php echo form_error('repeat_pass', '<small class="red-text">', '</small>'); ?></div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <p>*Jika anda ingin mengganti password baru.</p>
                </div>
                <div class="input-field col s12">
                    <input type="password" class="validate" name="new_pass">
                    <label>Password Baru</label>
                </div>
                <div class="col s12"><?php echo form_error('new_pass', '<small class="red-text">', '</small>'); ?></div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="password" class="validate" name="repeat_pass">
                    <label>Ulangi</label>
                </div>
                <div class="col s12"><?php echo form_error('repeat_pass', '<small class="red-text">', '</small>'); ?></div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="password" class="validate" name="old_pass">
                    <label>Password Lama </label>
                </div>
                <div class="col s12"><?php echo form_error('old_pass', '<small class="red-text">', '</small>'); ?></div>
            </div>
            <div class="row">
                <div class="col s12 center">
                    <button type="submit" class="waves-effect waves-light btn orange darken-4">Simpan Perubahan</button>
                </div>
            </div>
            </form>
        </div>
        
    </div>
    </section>

<?php  

$this->load->view('footer', $this->data );

/* End of file main-index.php */
/* Location: ./application/modules/apps/views/main-index.php */
