<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Administrator Sign In</title>
  <link href="<?php echo base_url().'assets/plugin/css/bootstrap.min.css';?>" rel="stylesheet"> 
  <link href="<?php echo base_url().'assets/plugin/css/custom.css';?>" rel="stylesheet">
  <link href="<?php echo base_url().'assets/img/bg.css';?>" rel="stylesheet">                
  <link rel="icon" type="image/png" href="<?php echo base_url().'assets/img/favicon-32x32.png';?>" sizes="32x32">
  <link rel="icon" type="image/png" href="<?php echo base_url().'assets/img/favicon-16x16.png';?>" sizes="16x16">   
</head>

<body class="lg">
  <?php if($this->session->flashdata('pesan') !== NULL): ?>
  <div class="flashdata flash-warning">
    <span><?php echo $this->session->flashdata('pesan');?></span>
  </div>  
  <?php endif; ?>
  <!-- untuk tampilan logo diatas form -->
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

  <!-- div untuk form -->
  <div class="container">
    <div class="row">
      <!-- ??? -->
      <div class="col-md-5">
        <!-- <h2>Administrator <br><small>Control Panel.</small></h2> -->          
      </div>
      <div class="col-md-3" >            
      </div>

      <div class="col-md-4">
        <!-- judul -->
        <div class="form-title">
          <span class="form-title">Welcome.</span>
          <span class="form-subtitle">Please login.</span>
        </div>
        <!-- div untuk form -->
        <div class="login-wrapper">
          <form action="<?php echo base_url().'auth?ref='.password_hash('loginAdmin', PASSWORD_BCRYPT);?>" method="post">        

            <!-- nip -->
            <div class="input-group margin-bottom-20">
              <span class="input-group-addon login-input"><i class="glyphicon glyphicon-user"></i></span><input type="text" autocomplete="on" class="form-control login-input lg" name="nip" id="nip" maxlength="12" placeholder="NIK" required>
            </div>
            <!-- pass -->
            <div class="input-group ">
              <span class="input-group-addon login-input"><i class="glyphicon glyphicon-lock"></i></span><input type="password" autocomplete="on" class="form-control login-input lg" name="password" id="password" maxlength="12" placeholder="Password" required>
            </div>
            <hr>
            <!-- gambar capcha -->  
            <div class="captcha-box margin-bottom-20">
              <span><?php echo $cap['image']; ?></span>    
            </div>
            <!-- capcha -->    
            <div class="form-group">
              <input type="text"  autocomplete="off" name ='captcha' class="form-control login-input lg" placeholder="Insert Captcha">
            </div>
            <!-- tombol capcha -->    
            <input type="submit" class="btn btn-success btn-block" name="tblogin" value="Login">    
          </form>
        </div>
        <!-- div untuk credit-->
        <div class="form-end">
         <span class="form-end">2015 © PT. Semen Indonesia Tbk (Persero)</span>
       </div> 
     </div> 

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