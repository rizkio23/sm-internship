  <!-- BEGIN CONTENT -->
  <div class="page-wrapper">

    <!-- BEGIN PAGE TITLE -->
    <div class="page-title dash">
      <h3>Ubah Kata Sandi</h3>
    </div> 
    <!-- END OF PAGE TITLE -->

    <!-- BEGIN BREADCRUMB -->
    <ol class="breadcrumb dash">
      <li><a href="<?php echo base_url().'dashboard/insight';?>">Halaman Utama</a></li>
      <li class="active">Ubah Kata Sandi</li>
    </ol>
    <!-- END OF BREADCRUMB -->

    <div class="row">
      <!-- BEGIN PORTLET -->
      <div class="col-md-12">
        <div class="portlet box red-thunderbird">
          <!-- PORTLET TITLE -->
          <div class="portlet-title">
            <div class="caption">
              <i class="fa fa-lg fa-unlock"></i>Ubah Kata Sandi
            </div>
          </div>
          <!-- END PORTLET TITLE -->
          <!-- PORTLET BODY -->
          <div class="portlet-body form">
            <!-- BEGIN FORM -->
            <form id="validasi" class="form-horizontal" role="form" method="POST" action="<?=base_url()?>p/Admin/reset_password">
              <div class="form-body">

                <div class="form-group">
                  <label class="col-md-2 control-label">NIK</label>
                  <div class="col-md-4">
                    <input type="text" class="form-control" name="nik" placeholder="Masukkan NIK" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 control-label">Kata Sandi Lama</label>
                  <div class="col-md-4">
                    <input type="password" class="form-control" name="oldpassword" placeholder="Sandi Lama" required>
                  </div>
                </div>      

                <div class="form-group">
                  <label class="col-md-2 control-label" for="password">Kata Sandi Baru</label>
                  <div class="col-md-4">
                    <input id="newpassword" type="password" class="form-control" name="newpassword" placeholder="Sandi Baru" required>
                  </div>
                </div>     

                <div class="form-group">
                  <label class="col-md-2 control-label" for="repasswords">Ulangi Kata Sandi Baru</label>
                  <div class="col-md-4">
                    <input id="repassword" type="password" class="form-control" name="repassword" placeholder="Ulangi Kata Sandi Baru" required>
                    <p id="pesan"></p>
                  </div>
                </div>  

                <div class="form-actions">
                  <div class="row">
                    <div class="col-md-offset-2 col-md-9">
                      <button type="submit" class="btn btn-primary" id="submit">Ubah</button>
                    </div>
                  </div>
                </div>
              </form>
          </div>  
          <!-- END PORTLET BODY -->
        </div>  
      </div>     
      <!-- END OF PORTLET -->
    </div>
    <!-- END OF ROW -->
  </div>  
  <!-- END OF CONTENT -->
</div>  
<!-- END OF PAGE -->

<script type="text/javascript">
  $(document).ready(function(){
      var newpassword;
      var repassword;
      $("#submit").prop('disabled',true);

      $("#repassword, #newpassword").keyup(function(){
           newpassword = $("#newpassword").val();
           repassword = $("#repassword").val();
           if (repassword != newpassword) 
           {
              $("#pesan").text("password baru dan re-type password tidak cocok");
              $("#submit").prop('disabled',true);
           }
           else if(repassword=="" || newpassword == "")
           {
              $("#pesan").text("Mohon diisi");
              $("#submit").prop('disabled',true);
           }
           else
           {
              $("#pesan").text("Password cocok");
              $("#submit").prop('disabled',false);

           }
      });
  });
</script>


