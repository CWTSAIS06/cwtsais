<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CWTSIS PUPT</title>
  <link rel="shortcut icon" href="<?= base_url() ?>/public/img/logooff.png" type="image/x-icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>/public/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/summernote/summernote-bs4.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>/public/css/header.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
  <link rel="stylesheet" href="<?= base_url() ?>/public/css/bootstrap-select.min.css">

  <!-- custom global css  -->
  <link rel="stylesheet" href="<?= base_url() ?>/public/custom-css/global.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark navbar-light">
	<!-- Left navbar links -->
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
		</li>
		<li class="nav-item d-none d-sm-inline-block">
		</li>
		<!-- <li class="nav-item d-none d-sm-inline-block">
			<a href="#" class="nav-link">Contact</a>
		</li> -->
	</ul>

	<!-- Right navbar links -->
	<ul class="navbar-nav ml-auto">
  
		<li class="nav-item dropdown">
				<!-- <i class="fas fa-expand-arrows-alt"></i> -->
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?= ($_SESSION['full_name']) ? $_SESSION['full_name']:$_SESSION['uname'];?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php if($_SESSION['rid'] == '3'):?>
          <a href="<?=base_url('users/change-password/'.$_SESSION['uid'])?>" class="dropdown-item"><i class="fas fa-key"></i>&nbsp;&nbsp;Change Password</a>
          <?php else:?>
          <a href="<?=base_url('users/edit-profile/'.$_SESSION['uid'])?>" class="dropdown-item"><i class="fas fa-user"></i>&nbsp;&nbsp;Profile</a>
          <?php endif;?>
          <a href="<?=base_url('logout')?>" class="dropdown-item"><i class="fas fa-power-off"></i>&nbsp;&nbsp;Log Out</a>
        </div>
		</li>
		<!-- <li class="nav-item">
			<a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
				<i class="fas fa-th-large"></i> -->
			<!-- </a> -->
		</li>
	</ul>
</nav>
<!-- /.navbar -->
