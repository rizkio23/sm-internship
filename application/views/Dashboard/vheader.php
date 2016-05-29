<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Beranda</title>
  <link href="<?php echo base_url().'assets/home/global/plugins/font-awesome/css/font-awesome.min.css';?>" rel="stylesheet">
  <link href="<?php echo base_url().'assets/plugin/css/bootstrap.min.css';?>" rel="stylesheet">
  <link href="<?php echo base_url().'assets/plugin/css/custom.css';?>" rel="stylesheet">
  <link href="<?php echo base_url().'assets/plugin/css/dash.css';?>" rel="stylesheet">
  <link href="<?php echo base_url().'assets/plugin/css/profile.css';?>" rel="stylesheet">
  <link href="<?php echo base_url().'assets/plugin/css/components-md.css';?>" rel="stylesheet">
  <link href="<?php echo base_url().'assets/plugin/css/jquery-ui/jquery-ui.min.css';?>" rel="stylesheet">
  <link href="<?php echo base_url().'assets/plugin/css/jquery-ui/theme.css';?>" rel="stylesheet">
  <link href="<?php echo base_url().'assets/plugin/js/select2/select2.css';?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url().'assets/plugin/js/datatables/plugins/bootstrap/dataTables.bootstrap.css';?>" rel="stylesheet" type="text/css"/>
  <link rel="icon" type="image/png" href="<?php echo base_url().'assets/img/favicon-32x32.png';?>" sizes="32x32">
  <link rel="icon" type="image/png" href="<?php echo base_url().'assets/img/favicon-16x16.png';?>" sizes="16x16">
  <script src="<?php echo base_url().'assets/plugin/js/jquery-2.1.4.js';?>"></script>
  <script src="<?php echo base_url().'assets/plugin/js/jquery.cokie.min.js';?>"></script>

</head>

<?php if($this->session->flashdata('pesan') !== NULL): ?>
  <div class="flashdata flash-warning">
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
        <!-- BEGIN USER LOGIN DROPDOWN -->
        <li class="dropdown dropdown-user">
          <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
            <img alt="" width="34px" class="img-circle" src="<?php echo base_url().'assets/img/profpic/default_blank.png';?>"/>
            <span>
             Hi!, <?=$nama?></span>
             <i class="fa fa-angle-down"></i>
           </a>
           <ul class="dropdown-menu" style="width:205px">
            <li style="padding:10px">
            <a href ="<?php echo base_url().'dashboard/reset_password';?>">
                <i class="fa fa-lg fa-unlock-alt "></i> Ganti Kata Sandi </a>
              </li>
            <li style="padding:10px">
              <a href ="<?php echo base_url().'auth/out';?>">
                <i class="fa fa-lg fa-key"></i> Keluar </a>
              </li>
            </ul>
          </li>
          <!-- END USER LOGIN DROPDOWN -->
        </ul>

        <?php
          if (isset($notifikasi)):
        ?>
        <ul class="nav navbar-nav pull-right" style="margin-right:20px">
          <!-- BEGIN NOTIFICATION -->
          <li class="dropdown">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
              <i class="fa fa-lg fa-bell"></i>
              <span class="badge badge-danger"><?php echo count($notifikasi) ?></span>
            </a>
            <ul class="dropdown-menu">
              <?php foreach($notifikasi as $key): ?>
              <li>
                <a href="">
                  <span class="time"><?=date('d M Y', strtotime($key['no']))?></span>
                  <textarea style="font-size: 12px;line-height: 1.3;display: block !important;resize:none;border-bottom:none" disabled><?=$key['pesan']?></textarea>
                </a>
              </li>
              <?php endforeach; ?>
              </ul>
            </li>
            <!-- END OF NOTIFICATION -->
          </ul>
          <?php endif; ?>

        </div>
      </nav>
