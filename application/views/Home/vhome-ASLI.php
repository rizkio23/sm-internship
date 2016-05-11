<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>PT. Semen Indonesia Internship Program</title>
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url().'assets/home/global/plugins/font-awesome/css/font-awesome.min.css';?>" rel="stylesheet">
  <link href="<?php echo base_url().'assets/plugin/css/bootstrap.min.css';?>" rel="stylesheet">
  <link href="<?php echo base_url().'assets/home/global/plugins/slider-revolution-slider/rs-plugin/css/settings.css';?>" rel="stylesheet">
  <link href="<?php echo base_url().'assets/home/global/css/components.css';?>" rel="stylesheet">
  <link href="<?php echo base_url().'assets/home/frontend/layout/css/style.css';?>" rel="stylesheet">
  <link href="<?php echo base_url().'assets/home/frontend/pages/css/style-revolution-slider.css';?>" rel="stylesheet">
  <link href="<?php echo base_url().'assets/home/frontend/layout/css/style-responsive.css';?>" rel="stylesheet"> 
  <link href="<?php echo base_url().'assets/home/frontend/layout/css/custom.css';?>" rel="stylesheet">
  <link rel="icon" type="image/png" href="<?php echo base_url().'assets/img/favicon-32x32.png';?>" sizes="32x32">
  <link rel="icon" type="image/png" href="<?php echo base_url().'assets/img/favicon-16x16.png';?>" sizes="16x16">   
</head>

<body class="wrapper page-header-fixed">

<?php if($this->session->flashdata('pesan') !== NULL): ?>
  <div class="flashdata">
    <span><?php echo $this->session->flashdata('pesan');?></span>
  </div>  
<?php endif; ?>

  <div class="header">
    <div class="container">
      <a class="site-logo" href="index.html"><img width="200px"src="<?php echo base_url().'assets/home/img/logo-small.png';?>" ></a>
      <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>

      <!-- BEGIN NAVIGATION -->
      <div class="header-navigation pull-right font-transform-inherit">
        <ul>
          <li>
            <a href="">
              Home                 
            </a>
          </li>
          <li class>
            <a href="<?php echo base_url().'home/signup';?>">
              Sign Up                 
            </a>
          </li>
          <li class="dropdown-fix-right">
            <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
              Login              
            </a>              
            <ul class="dropdown-menu">
              <form action="<?php echo base_url().'auth/user?ref='.password_hash('loginUser', PASSWORD_BCRYPT);?>" method="POST">
                <div style="padding:10px">        
                  <div class="input-group margin-bottom-10">
                    <span class="input-group-addon login-input"><i class="glyphicon glyphicon-user"></i></span><input style="font-size:13px" type="email" autocomplete="on" class="form-control login-input " name="email" placeholder="Email" required>
                  </div>
                  <div class="input-group margin-bottom-10 ">
                    <span class="input-group-addon login-input"><i class="glyphicon glyphicon-lock"></i></span><input style="font-size:13px" type="password" autocomplete="on" class="form-control login-input " name="password" id="password" maxlength="12" placeholder="Password" required>
                  </div>
                  <div class="input-group margin-bottom-10">
                    <span><?php echo $cap['image']; ?></span> 
                  </div>
                  <div class="form-group">
                    <input type="text"  autocomplete="off" name ='captcha' class="form-control login-input" placeholder="Insert Captcha">
                  </div>
                  <input type="submit" class="btn btn-login btn-success btn-block" value="Login">
                </div>   
              </form>
            </ul>
          </li>
        </ul>
      </div>      
      <!-- END NAVIGATION -->
    </div>
  </div>

  <!-- BEGIN SLIDER -->
  <div class="page-slider padding-top-10 margin-bottom-40">
    <div class="fullwidthbanner-container revolution-slider">
      <div class="fullwidthabnner">
        <ul id="revolutionul">
          <!-- PIC 1 -->
          <li data-transition="fade" data-slotamount="8" data-masterspeed="700" data-delay="9400">
            <img src="<?php echo base_url().'assets/home/img/revolutionslider/bg1.jpg';?>" alt="">
            <!-- TEXT -->
            <div class="caption lft slide_title slide_item_left"
              data-x="30"
              data-y="105"
              data-speed="400"
              data-start="1500"
              data-easing="easeOutExpo">
              Internship Program
            </div>
          </li>
          <!-- PIC 2 -->
          <li data-transition="fade" data-slotamount="8" data-masterspeed="700" data-delay="9400">
            <img src="<?php echo base_url().'assets/home/img/revolutionslider/bg2.jpg';?>" alt="">                              
          </li>
          <!-- PIC 3 -->
          <li data-transition="fade" data-slotamount="8" data-masterspeed="700" data-delay="9400">
            <img src="<?php echo base_url().'assets/home/img/revolutionslider/bg3.jpg';?>" alt="">
          </li>
        </ul>
        <div class="tp-bannertimer tp-bottom"></div>
      </div>
    </div>
  </div>
  <!-- END SLIDER -->

  <!-- BEGIN CONTENT -->
  <div class="main">
    <div class="container">              
      <!-- BEGIN BIDANG  -->
      <div class="col-md-4"> 
        <!-- JUDUL -->
        <div class="row quote-v1 survey ">          
          <div class="col-md-12">
            <span><i class="fa fa-briefcase"></i> BIDANG KEAHLIAN</span>
          </div>
        </div>
        <!-- ISI -->
        <div class="tab-content tab-bidang margin-bottom-30 ">
          <div class="tab-pane row fade in active">
            <div class="col-md-12 col-xs-12">
              <h4>Ketersediaan Instansi</h4>
              <table class="table table-striped table-hover">
                <?php foreach ($bidang as $key) : ?>
                <tr>
                  <td><h4 style="font-weight:bold"><?= $key['bagian']?></h4></td>
                  <td class="center"><div class="available <?=($key['status']==='0')?'available-off':'available-on' ?>"></div></td>
                </tr>                
                <?php endforeach; ?>                                                                                             
              </table> 
              <hr>
              <div class="row" >
                <div class="col-md-12 col-xs-12">
                  <p style="font-size:12px; font-weight:bold">Keterangan :</p>
                </div>
                <div class="col-md-6 col-xs-6">
                  <div class="col-md-2">
                    <div class="available available-sm available-on"></div>                                
                  </div>
                  <div class="col-md-5">
                    <p style="font-size:12px; font-weight:bold">Tersedia</p>
                  </div>
                </div>
                <div class="col-md-6 col-xs-6">
                  <div class="col-md-2">
                    <div class="available available-sm available-off"></div>                                
                  </div>
                  <div class="col-md-5">
                    <p style="font-size:12px; font-weight:bold">Tidak Tersedia</p>
                  </div>
                </div>
              </div>
            </div>
          </div>     
        </div>
      </div>
      <!-- END OF BIDANG -->

      <!-- BEGIN PANDUAN -->
      <div class="col-md-8">
        <!-- JUDUL -->
        <div class="row quote-v1 survey ">
          <div class="col-md-6 ">
            <span><i class="fa fa-book"></i> PANDUAN</span>
          </div>
        </div>
        <!-- ISI KONTEN -->
        <div class="tab-content margin-bottom-30 ">
          <div class="tab-pane row fade in active">
            <div class="col-md-12 col-xs-12">
              <h3>PT.Semen Indonesia (Persero), Tbk Internship Program </h3>
              <hr>
              <p>PT. Semen Indonesia (Persero), Tbk membuka program Praktik Kerja Lapangan dan Penelitian, bertujuan memberikan pengalaman kerja bagi mahasiswa/siswa dalam mengembangkan keterampilan melalui kegiatan magang secara langsung di unit-unit kerja perusahaan. </p>
              <p>Buku panduan program internshhip dapat di download dibawah ini</p>
              <blockquote>Download e-book panduan program internship</blockquote>
            </div>
          </div>
        </div>           
      </div>
      <!-- END OF PANDUAN -->

      <!-- BEGIN CONTACT -->
      <div class="col-md-8 col-xs-12 pull-right">
        <!-- JUDUL -->
        <div class="row quote-v1 survey ">
          <div class="col-md-6 ">
            <span><i class="fa fa-globe"></i> Contact Us</span>
           </div>
        </div>
        <!-- ISI KONTEN -->
        <div class="tab-content contact margin-bottom-30 ">
          <div class="tab-pane row fade in active">
            <div class="row">
              <!-- GAMBAR LOGO -->
              <div class="col-md-3 col-xs-4">
                <img class="img-responsive img-contact " src="<?php echo base_url().'assets/home/img/footer.png';?>">
              </div>
              <!-- DATA CONTACT -->
              <div class="col-md-6 col-xs-8">
                <address class="contact">
                  PT. Semen Indonesia Tbk.
                  </br>
                  Gresik, Indonesia
                  </br>
                  <span><i class="fa fa-phone"></i></span> Phone: 300 323 3456
                  </br>
                  <span><i class="fa fa-fax"></i></span> Fax: 300 323 1456
                  </br>
                  <span><i class="fa fa-envelope-o"></i></span> Email:<a href="mailto:diklat.sg@semenindonesia.com"> diklat.sg@semenindonesia.com</a>
                  </br>
                  <span><i class="fa fa-globe"></i></span> Website:<a href="www.semenindonesia.com">www.semenindonesia.com</a>
                </address> 
              </div>
              <!-- END OF DATA CONTACT  -->
              <div class="col-md-6 col-xs-hidden">
              </div>  
            </div>
            <!-- END OF ROW -->
          </div>
          <!-- END OF PANE -->
        </div> 
        <!--END OF ISI  -->
      </div>
      <!-- END OF CONTACT -->
    </div>

  </div> 
  
  <!-- BEGIN FOOTER -->
  <div class="footer">
    <div class="container">
      <div class="row">
        <!-- BEGIN COPYRIGHT -->
        <div class="col-md-6 col-sm-6 padding-top-10">
          <p>2015 © PT. Semen Indonesia Tbk (Persero)</p>
        </div>

        <div class="col-md-6 col-sm-6 padding-top-10">
          <a class="pull-right" href="<?php echo base_url().'home/login';?>"><span><p>Administrator.</p></span></a>
        </div>
        <!-- END COPYRIGHT -->
      </div>
    </div>
  </div>
  <!-- END FOOTER -->

  <!-- BEGIN PAGE LEVEL JAVASCRIPTS -->
  <script src="<?php echo base_url().'assets/home/global/plugins/jquery.min.js';?>" type="text/javascript"></script>
  <script src="<?php echo base_url().'assets/home/global/plugins/jquery-migrate.min.js';?>" type="text/javascript"></script>
  <script src="<?php echo base_url().'assets/plugin/js/bootstrap.min.js';?>" type="text/javascript"></script>      
  <script src="<?php echo base_url().'assets/home/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js';?>" type="text/javascript"></script> 
  <script src="<?php echo base_url().'assets/home/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js';?>" type="text/javascript"></script> 
  <script src="<?php echo base_url().'assets/home/frontend/pages/scripts/revo-slider-init.js';?>" type="text/javascript"></script>
  <script src="<?php echo base_url().'assets/home/frontend/layout/scripts/layout.js';?>" type="text/javascript"></script>
  <script type="text/javascript">
    jQuery(document).ready(function() {
      Layout.init();    
      RevosliderInit.initRevoSlider();
    });

    $(document).ready(function(){
      $('.flashdata').delay(2000).fadeOut('slow');
    });

  </script>
  <!-- END PAGE LEVEL JAVASCRIPTS -->
  </body>
  <!-- END BODY -->
</html>