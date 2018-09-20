<!DOCTYPE html>
<?php
    $sql ="SELECT * FROM system_parameter";
     $query = $this->db->query($sql);
      if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {?>
        <b value="<?php echo $row->company_id;?>">
<?php } } ?>  </b>
<html>
<head>
  <link rel="shortcut icon" href="favicon.ico">
<link rel="icon" type="image/gif" href="animated_favicon1.gif">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo strtoupper( $row->name); ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url() ?>resource/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>resource/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>resource/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>resource/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>resource/dist/css/skins/_all-skins.min.css">
  


  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-green layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?php echo site_url().'/home/dashboard' ?>" class="navbar-brand">             
             <?php
                $sql ="SELECT * FROM system_parameter";
                $query = $this->db->query($sql);
                if ($query->num_rows() > 0) {
                    foreach ($query->result() as $row) {?>
                 <b value="<?php echo $row->company_id;?>">
              <?php } } ?> <p style="font-family: Courier, monospace;"><?php echo strtoupper($row->name);?> </p> </b>
            
          </a>
         
        </div>


        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
              <!-- Menu Toggle Button -->
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-gear"></i> <?php echo $this->session->userdata('username'); ?> <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="<?php echo site_url('profile/profile/view_profile?id=').$this->session->userdata('user_id')?>"><i class="fa fa-user"></i> My Profile</a></li>
             
                  <li><a href="<?php echo site_url('home/logout') ?>"><i class="fa fa-sign-out"></i> Logout</a></li>
                </ul>
              </li>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>