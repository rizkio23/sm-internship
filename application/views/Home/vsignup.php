<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign Up</title>
  <link href="<?php echo base_url().'assets/plugin/css/bootstrap.min.css';?>" rel="stylesheet"> 
  <link href="<?php echo base_url().'assets/plugin/css/custom.css';?>" rel="stylesheet">
  <link href="<?php echo base_url().'assets/img/bg.css';?>" rel="stylesheet">                
  <link href="<?php echo base_url().'assets/plugin/css/jquery-ui/jquery-ui.min.css';?>" rel="stylesheet"> 
  <link href="<?php echo base_url().'assets/plugin/css/jquery-ui/theme.css';?>" rel="stylesheet"> 
  <link rel="icon" type="image/png" href="<?php echo base_url().'assets/img/favicon-32x32.png';?>" sizes="32x32">
  <link rel="icon" type="image/png" href="<?php echo base_url().'assets/img/favicon-16x16.png';?>" sizes="16x16">

  <style type="text/css">
    .ada{background-color: #e74c3c; color: white}
  </style>  

</head>

<body class="sg">

<?php if($this->session->flashdata('pesan') !== NULL): ?>
<div class="flashdata flash-warning">
  <span><?php echo $this->session->flashdata('pesan');?></span>
</div>  
<?php endif; ?>

  <nav id="custom-nav" class="navbar navbar-default">
    <div class="container">
      <!-- Begin Menu Toggle -->
      <div class="navbar-header">
        <a class="navbar-brand" href="<?php echo base_url().'';?>">
          <img style="max-width:200px; margin-top: -7px;" src="<?php echo base_url().'assets/img/logo-nav.png';?>">
        </a>
      </div>
    </div><!-- /.container-fluid -->
  </nav>

  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div class="signup-wrapper">
          <form action="<?php echo base_url().'p/member/signup?ref='.password_hash('daftarMember', PASSWORD_BCRYPT);?>" method="POST">

            <div class="form-group signup">
              <label>Nama Lengkap</label>
              <input type="text" name="nama" class="form-control login-input lg" placeholder="Nama" required>
              <span style="color:red">*</span> <span style="font-style:italic; color:white">Pendaftaran dapat dilakukan oleh 1 orang perwakilan kelompok</span>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group signup">
                  <label>Nomor Telepon</label>
                  <input type="text" autocomplete="on" name="hp" class="form-control login-input lg" placeholder="Nomor HP" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group signup">
                  <label>Email</label>
                  <input type="email" autocomplete="on" name="email" class="form-control login-input lg" placeholder="Email" required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group signup">
                  <label>SMK/Universitas</label>
                  <input type="text" name="instansi" class="form-control login-input lg" placeholder="Nama Sekolah / Universitas" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group signup">
                  <label>Jurusan</label>
                  <input type="text" name="jurusan" class="form-control login-input lg" placeholder="Jurusan" required>
                </div>
              </div>
            </div>   
            <div class="row">
              <div class="col-md-6">
                <div class="form-group signup">
                  <label>Alamat Instansi</label>
                  <textarea class="form-control login-input lg" style="height:108px" name="alamat" placeholder="Alamat" required></textarea>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group signup">
                  <label>Jenis</label>
                  <select class="form-control login-input lg" name="id_jenis" required>
                    <?php
                    foreach ($jenis as $jen) {
                      echo "<option value='".$jen->id."'>".strtoupper($jen->jenis)." (".$jen->durasi." bulan)</option>";
                    }
                    ?>
                  </select>
                </div>  
              </div>
              <div class="col-md-6">
                <div class="form-group signup">
                  <label>Bidang</label>
                  <select class="form-control login-input lg" name="id_bidang" required>
                    <?php
                      foreach ($bidang as $key ) {
                          echo "<option value='".$key->id."'>".$key->bagian."</option>";
                      }
                    ?>
                  </select>
                </div>  
              </div>
            </div> 

            <div class="row">
              <div class="col-md-6">
                <div class="form-group signup">
                  <label>Bulan Pengajuan</label>
                    <input type="text" class="form-control login-input lg" id="datepicker" name="bulan_pengajuan">
                </div>  
              </div>
              <div class="col-md-6">
                <div class="form-group signup">
                  <label>Tujuan</label>
                    <div class="radio-list">
                      <label class="radio-inline">
                      <input type="radio" name="tujuan" value="pkl" checked=""> Internship </label>
                      <label class="radio-inline">
                      <input type="radio" name="tujuan" value='research'> Research </label>
                    </div>
                </div>  
              </div>
            </div>

            <hr class="signup">

            <div class="row">
              <div class="col-md-6">
                <div class="captcha-box">
                  <span><?php echo $cap['image']; ?></span>    
                </div> 
                <br>
                <div class="form-group signup">
                 <input type="text" autocomplete="on" class="form-control login-input lg" name="captcha" placeholder="Insert Captcha">
               </div>    
             </div>

             <div class="col-md-6">

              <div class="row signup">
              <div class="col-md-1 col-xs-1">
                  <input name="setuju" type="checkbox">
                </div>
                <div class="col-md-10 col-xs-11">
                  <i class="signup">Saya menyetujui, untuk mendaftar sebagai peserta internship/peneliti di PT.Semen Indonesia.</i>
                </div>
              </div>  

              <div class="form-group signup">
                <input type="submit" name="tb" class="btn btn-warning btn-block" value="Sign Up">
              </div>
            </div>

          </div>
        </div>

      </form>
    </div>        
    
    <div class="col-md-4">
<!--       <h2>Sign Up</h2>
 --><!--       <hr>
      <h4>PT. Semen Indonesia Internship Program</h4> -->
    </div>
    
  </div>
  <!-- END OF ROW  -->
  <div class="margin-top-30">
    <div class="form-end ">
       <span class="form-end">2015 © PT. Semen Indonesia Tbk (Persero)</span>
    </div>
  </div>
</div>
<!-- Begin Javascript  -->
<script src="<?php echo base_url().'assets/plugin/js/jquery-1.11.1.js';?>"></script>
<script src="<?php echo base_url().'assets/plugin/js/jquery-ui.min.js';?>"></script>
<script src="<?php echo base_url().'assets/plugin/js/bootstrap.min.js';?>"></script>
<script>
  // Datepicker
  $(document).ready(function(){
    $( "#datepicker" ).datepicker();
    $('.flashdata').delay(2000).fadeOut('slow');

    //BEGIN AJAX
    var email  = $("input[name='email']");
    var tombol = $("input[name='tb']");
    var link   = "<?=base_url()?>p/member/cek_email";

    tombol.attr("disabled", "");

    email.keyup(function(){
      if (email.val() == '') 
      {
        email.removeClass("ada").addClass("login-input");
        tombol.attr('disabled', 'disabled');
      }
      else
      {
        $.ajax({
          type: "POST",
          url: link,
          data:{mail:email.val()},
          success: function(data){
              email.removeClass("ada").addClass("login-input");
              tombol.removeAttr('disabled');
          },
          error: function(xhr, ajaxOption, thrownError){
              email.removeClass("login-input").addClass("ada");
              tombol.attr('disabled', 'disabled');
          }
        });
      }
    });
  });
</script>     
</body>
</html>