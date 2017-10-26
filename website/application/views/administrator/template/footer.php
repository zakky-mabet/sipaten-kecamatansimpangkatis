<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
      </section>
     </div>
     <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Versi</b> 1.0.0 (Pre Release)
    </div>
   <div class="container text-center">
      <small>Hak Cipta &copy; 2017 <?php if(date('Y')!=2017) echo "- ".date('Y'); ?> Kec. Koba, Kab. Koba All rights reserved. Develop By <a href="http://teitramega.co.id" target="_blank">Teitra Mega</a>
        .<small>
   </div>
</footer>
        <div class="modal animated fadeIn modal-danger" id="keluar" tabindex="-1" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-question-circle"></i> Keluar!</h4>
                <span><?php echo $this->session->userdata('account_admin')->nama_lengkap ?>, Yakin anda akan Keluar dari sistem?</span>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
                <a href="<?php echo site_url("administrator/login/signout") ?>" type="button" class="btn btn-outline"> Iya </a>
              </div>
            </div>
          </div>
        </div>

   <script>
   $('#summernote').summernote({
      height: 300,                 // set editor height
      minHeight: null,             // set minimum height of editor
      maxHeight: null,             // set maximum height of editor
      lang: 'id-ID',               // default: 'en-US'
      focus: false                 // set focus to editable area after initializing summernote
  });

   $(".select2").select2();
  </script>
    
</body>
</html>
<?php

/* End of file footer.php */
/* Location: ./application/views/template/footer.php */