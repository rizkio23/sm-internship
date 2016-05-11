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
  <link rel="icon" type="image/png" href="<?php echo base_url().'assets/img/favicon-32x32.png';?>" sizes="32x32">
  <link rel="icon" type="image/png" href="<?php echo base_url().'assets/img/favicon-16x16.png';?>" sizes="16x16">   
</head>

<body class="sg">

  <div class="flashdata">
    <span><?php echo $this->session->flashdata('pesan');?></span>
  </div>

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
    <div class="signup-wrapper">
      <form action="<?php echo base_url().'member/signup?ref='.md5('daftarMember');?>" method="POST">
       
        <div class="form-group signup">
          <label>Nama Lengkap</label>
          <input type="text" name="nama" class="form-control login-input lg" placeholder="Nama" required>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group signup">
              <label>Nomor Telepon</label>
              <input type="text" autocomplete="off" name="hp" class="form-control login-input lg" placeholder="Nomor HP" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group signup">
              <label>Email</label>
              <input type="email" autocomplete="off" name="email" class="form-control login-input lg" placeholder="Email" required>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group signup">
              <label>Instansi</label>
              <input type="text" name="instansi" class="form-control login-input lg" placeholder="Instansi" required>
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
              <label>Alamat</label>
              <textarea class="form-control login-input lg" style="height:108px" name="alamat" placeholder="Alamat" required></textarea>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group signup">
              <label>Bagian</label>
              <select class="form-control login-input lg" name="id_bagian" required>
                <?php
                foreach ($bagian as $bag) {
                  echo "<option value='".$bag->id."'>".ucwords(strtolower($bag->bagian))."</option>";
                }
                ?>
              </select>
            </div>
            <div class="form-group signup">
              <label>Jenis</label>
              <select class="form-control login-input lg" name="id_jenis" required>
                <?php
                foreach ($jenis as $jen) {
                  echo "<option value='".$jen->id."'>".strtoupper($jen->jenis)."</option>";
                }
                ?>
              </select>
            </div>  
          </div>
        </div> 

        <hr>

        <div class="row">
          <div class="col-md-6">
            <div class="captcha-box">
              <span><?php echo $cap['image']; ?></span>    
            </div> 
            <br>
            <div class="form-group signup">
             <input type="text" autocomplete="off" class="form-control login-input lg" name="captcha" placeholder="Insert Captcha">
           </div>    
         </div>

         <div class="col-md-6">

          <div class="row signup">
            <div class="col-md-1">
              <input type="checkbox">
            </div>
            <div class="col-md-10">
              <i class="signup">Saya menyetujui, untuk mendaftar sebagai peserta internship/peneliti di PT.Semen Indonesia.</i>
            </div>
          </div>  

          <div class="form-group signup">
            <input type="submit" class="btn btn-warning btn-block" value="Sign Up">
          </div>
        </div>

      </div>
    </div>


  </form>
</div>
</div>
<!-- Begin Javascript  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="<?php echo base_url().'assets/plugin/js/jquery-1.11.1.js';?>"></script>
<script src="<?php echo base_url().'assets/plugin/js/bootstrap.min.js';?>"></script>
<script>
  $(document).ready(function(){
    $('.flashdata').delay(2000).fadeOut('slow');
  });
</script>     
</body>
</html>