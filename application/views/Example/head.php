<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>
  <link href="<?php echo base_url().'assets/home/global/plugins/font-awesome/css/font-awesome.min.css';?>" rel="stylesheet">
  <link href="<?php echo base_url().'assets/plugin/css/bootstrap.min.css';?>" rel="stylesheet"> 
  <link href="<?php echo base_url().'assets/plugin/css/custom.css';?>" rel="stylesheet">     
  <link href="<?php echo base_url().'assets/plugin/css/dash.css';?>" rel="stylesheet"> 
  <link href="<?php echo base_url().'assets/plugin/css/profile.css';?>" rel="stylesheet"> 
  <link href="<?php echo base_url().'assets/plugin/css/components-md.css';?>" rel="stylesheet">
  <link href="<?php echo base_url().'assets/plugin/css/jquery-ui/jquery-ui.min.css';?>" rel="stylesheet"> 
  <link href="<?php echo base_url().'assets/plugin/css/jquery-ui/theme.css';?>" rel="stylesheet"> 
  <link href="<?php echo base_url().'assets/plugin/js/datatables/plugins/bootstrap/dataTables.bootstrap.css';?>" rel="stylesheet" type="text/css"/> 
  <link rel="icon" type="image/png" href="<?php echo base_url().'assets/img/favicon-32x32.png';?>" sizes="32x32">
  <link rel="icon" type="image/png" href="<?php echo base_url().'assets/img/favicon-16x16.png';?>" sizes="16x16">
  <script src="<?php echo base_url().'assets/plugin/js/jquery-2.1.4.js';?>"></script>
</head>

<style type="text/css">
  .navbar-nav > li {
      display: block;
      margin: 0px;
      padding: 0px;
      border: 0px none;
  }

  .navbar-nav > li > a{
      margin: 0px;
      min-height: 60px;
      position: relative;
      display: block;
      border: 0px none;
      padding: 15px 15px 15px;
      text-decoration: none;
      font-size: 13px;
      font-weight: 300;
      text-align: center;
  }

  .navbar-nav > li > a > .fa{
      font-size: 24px;
      text-shadow: none;
      font-weight: 300;
      text-align: center;  
      color:#FFF;
  }

  .navbar-nav > li > a > .title{
    text-align: center;
    margin-top: 5px;
    display: block;  
    font-size: 18px;
    color:#FFF;
  }

</style>

<?php if($this->session->flashdata('pesan') !== NULL): ?>
<div class="flashdata">
  <span><?php echo $this->session->flashdata('pesan');?></span>
</div>  
<?php endif; ?>

<body>
  <nav class="navbar navbar-inverse" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">
          <img style="max-width:205px; margin-top: -10px; padding-left:10px" src="<?php echo base_url().'assets/img/logo-small-dash.png';?>">
        </a>

      </div>  
          <ul class="nav navbar-nav pull-right">
            <!--  -->
            <li class="dropdown">
              <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
              <i class="fa fa-lg fa-bell"></i>
              <span class="badge badge-danger">
              7 </span>
              </a>
              <ul class="dropdown-menu">
                <li class="external" >
                  <h4 style="text-align:left"><span class="bold">7</span> notifikasi baru</h4>
                </li>
<!--                 <li>
                  <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                    <li>
                      <a href="javascript:;">
                      <span class="time">just now</span>
                      <span class="details">
                      <span class="label label-sm label-icon label-success">
                      <i class="fa fa-plus"></i>
                      </span>
                      New user registered. </span>
                      </a>
                    </li>
                  </ul>
                </li> -->
              </ul>
            </li>
            <!--  -->

            <!-- BEGIN USER LOGIN DROPDOWN -->
            <li class="dropdown dropdown-user">
              <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
              <img alt="" width="34px" class="img-circle" src="<?php echo base_url().'assets/img/profpic/default_blank.png';?>"/>
              <span>
               Hi</span>
              <i class="fa fa-angle-down"></i>
              </a>
              <ul class="dropdown-menu" style="width:205px">             
                <li style="padding:10px">
                  <a href ="<?php echo base_url().'auth/out';?>">
                  <i class="fa fa-lg fa-key"></i> Log Out </a>
                </li>
              </ul>
            </li>
            <!-- END USER LOGIN DROPDOWN -->
          </ul>

   
    </div>

    
  </nav>