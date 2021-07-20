<!DOCTYPE HTML>
<html>
<head>
<title>TECHVENTORY</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="<?php echo base_url('assets/template/css/'); ?>bootstrap.min.css" rel='stylesheet' type='text/css' />
<link rel="shortcut icon" href="<?= base_url() ?>/public/img/logo.png" type="image/x-icon">
<!-- Custom Theme files -->
<link href="<?php echo base_url('assets/template/css/'); ?>style.css" rel='stylesheet' type='text/css' />
<link href="<?php echo base_url('assets/template/css/'); ?>font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url() ?>/public/font-awesome/css/all.css">
<!-- <link rel="stylesheet" href="<?= base_url() ?>/public/css/style.css"> -->
<script src="<?php echo base_url('assets/template/js/'); ?>jquery.min.js"> </script>
<!-- Mainly scripts -->
<script src="<?php echo base_url('assets/template/js/'); ?>jquery.metisMenu.js"></script>
<script src="<?php echo base_url('assets/template/js/'); ?>jquery.slimscroll.min.js"></script>
<!-- Custom and plugin javascript -->
<link href="<?php echo base_url('assets/template/css/'); ?>custom.css" rel="stylesheet">
<script src="<?php echo base_url('assets/template/js/'); ?>custom.js"></script>
<script src="<?php echo base_url('assets/template/js/'); ?>screenfull.js"></script>
		<script>
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}



			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});



		});
		</script>

<script src="<?php echo base_url('assets/template/js/'); ?>skycons.js"></script>
<!--//skycons-icons-->
</head>
<body>
<div id="wrapper">

<!----->
        <nav class="navbar-default navbar-static-top" role="navigation">
             <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <h1> <a class="navbar-brand" href="<?php echo base_url('template/index'); ?>">TECHVENTORY</a></h1>
			   </div>
			 <div class=" border-bottom">
        	<div class="full-left">
        	  <section class="full-top">
				<button id="toggle"><i class="fa fa-arrows-alt"></i></button>
			</section>
			<form class=" navbar-left-right">
              <input type="text"  value="Search..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search...';}">
              <input type="submit" value="" class="fa fa-search">
            </form>
            <div class="clearfix"> </div>
           </div>


            <!-- Brand and toggle get grouped for better mobile display -->

		   <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="drop-men" >
		        <ul class=" nav_1">

		    		<li class="dropdown at-drop">
		              <a href="#" class="dropdown-toggle dropdown-at " data-toggle="dropdown"><i class=""></i>
		              <ul class="dropdown-menu menu1 " role="menu">
		                <li><a href="#">


		                	<div class="clearfix"> </div>
		                </a></li>
		                <li><a href="#">
		                	<div class="user-new">
		                	<p>The server is status is stable</p>
		                	<span>yesterday at 08:30am</span>
		                	</div>
		                	<div class="user-new-left">

		                	<i class="fa fa-info"></i>
		                	</div>
		                	<div class="clearfix"> </div>
		                </a></li>
		                <li><a href="#">
		                	<div class="user-new">
		                	<p>New comments waiting approval</p>
		                	<span>Last Week</span>
		                	</div>
		                	<div class="user-new-left">

		                	<i class="fa fa-rss"></i>
		                	</div>
		                	<div class="clearfix"> </div>
		                </a></li>
		                <li><a href="#" class="view">View all messages</a></li>
		              </ul>
		            </li>
					<li class="dropdown">
		              <a href="#" class="dropdown-toggle dropdown-at" data-toggle="dropdown"><span class=" name-caret">Admin<i class="caret"></i></span><img src="<?php echo base_url('assets/template/images/'); ?>wo.jpg"></a>
		              <ul class="dropdown-menu " role="menu">
		                <li><a href="<?php echo base_url('logout'); ?>"><i class="fas fa-power-off"></i>LOGOUT</a></li>

		              </ul>
		            </li>

		        </ul>
		     </div><!-- /.navbar-collapse -->
			<div class="clearfix">

     </div>

		    <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">

                    <!-- <li>
                        <a href="index.html" class=" hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Dashboards</span> </a>
                    </li> -->

                    <li>
                      <br>
                      <h3><strong>User Management</h3></strong>

                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url('users/own/1'); ?>" class=" hvr-bounce-to-right"> <i class="far fa-address-card nav_icon"></i>User's Own Profile</a></li>

                            <li><a href="<?php echo base_url('users'); ?>" class=" hvr-bounce-to-right"><i class="fa fa-users nav_icon"></i>List Of Users</a></li>
														<li><a href="<?php echo base_url('roles'); ?>" class=" hvr-bounce-to-right"><i class="fa fa-user-tag nav_icon"></i>List Of Roles</a></li>

						<li><a href="<?php echo base_url('permissions'); ?>" class=" hvr-bounce-to-right"><i class="fas fa-shield-alt nav_icon"></i>Roles Permission</a></li>

					   </ul>
                    </li>
					 <li>

                     <li>
                       <br>


                       <h3><strong>Activity Log</h3></strong>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url('activities'); ?>" class=" hvr-bounce-to-right"> <i class="fa fa-list nav_icon"></i>List Of Activity</a></li>

                       </ul>
                    </li>

                    <li>
                      <br>


                      <h3 style="font-size: 22px;"><strong>Inventory Management</h3></strong>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url('borrowers'); ?>" class=" hvr-bounce-to-right"><i class="fas fa-people-carry nav_icon"></i>List Of Borrowers</a></li>
                            <li><a href="<?php echo base_url('inventories'); ?>" class=" hvr-bounce-to-right"><i class="fas fa-box nav_icon"></i>List Of Items Borrowed</a></li>
                        </ul>
                    </li>

										<li>
											 <a href="<?php echo base_url('items'); ?>" class=" hvr-bounce-to-right"><i class="fas fa-list-alt nav_icon"></i> <span class="nav-label">Item List</span> </a>
									 </li>
                </ul>
            </div>
			</div>
    </nav>
    <div id="page-wrapper" class="gray-bg dashbard-1">
   <div class="content-main">

  <!--banner-->
    <div class="banner">
      <br>
    <h1 id="page-title"><?= $function_title ?></h1>
    <?php echo view($viewName); ?>

    </h2>
    </div>
<!--//banner-->
<!--content-->
<div class="content-top">




<div class="clearfix"> </div>
</div>
<!---->


<div class="content-mid">

</div>
<!-- <script src="<?php echo base_url('assets/template/js/'); ?>jquery.nicescroll.js"></script> -->
<script src="<?php echo base_url('assets/template/js/'); ?>scripts.js"></script>
<!--//scrolling js-->
<script src="<?php echo base_url('assets/template/js/'); ?>bootstrap.min.js"> </script>
</body>
</html>
