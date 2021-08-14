<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="<?php echo base_url('student')?>" class="brand-link">
		<img src="<?= base_url('')?>/public/img/logooff.png" alt="CWTSIS PUPT" class="brand-image img-circle elevation-3" style="opacity:.8;">
		<span class="brand-text font-weight-light">CWTS-AIS PUP-TAGUIG</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex"> -->
		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
						 with font-awesome or any other icon font library -->
			 <!-- SA SIDE BAR TO WAG GALAWIN -->
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="pages/layout/top-nav.html" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Top Navigation</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="pages/layout/top-nav-sidebar.html" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Top Navigation + Sidebar</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="pages/layout/boxed.html" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Boxed</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="pages/layout/fixed-sidebar.html" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Fixed Sidebar</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="pages/layout/fixed-sidebar-custom.html" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Fixed Sidebar <small>+ Custom Area</small></p>
							</a>
						</li>
						<li class="nav-item">
							<a href="pages/layout/fixed-topnav.html" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Fixed Navbar</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="pages/layout/fixed-footer.html" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Fixed Footer</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="pages/layout/collapsed-sidebar.html" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Collapsed Sidebar</p>
							</a>
						</li>
					</ul>
				</li>

			<!-- KAILANGAN TO SA SIDEBAR -->

				<?php user_primary_links($_SESSION['userPermmissions']) ?>

					</ul>
				</li>
		</nav>
		<!-- /.sidebar-menu -->
	<!-- </div> -->
	<!-- /.sidebar -->
</div>
</aside>
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

	<script src="<?= base_url();?>public/js/jquery-3.2.1.min.js" type="text/javascript"></script>

<script>
student_id = <?= $_SESSION['student_id'];?>;
$('li.nav-item ul.nav-treeview li.nav-item a').each(function(e,data){
	if($(data).attr('title') == 'Enroll'){

		if(student_id !== 0){
			$.ajax({
				url: "<?= base_url('attendance/check_if_graduate')?>",
				type: "POST",
				data: {student_id:student_id},
				success:function(response){
					console.log('response: '+response)
					if(response == 1){
						$(data).hide();

					}
				}
			});
		}

		// $(data).hide()
	}
	if($(this).hasClass('active')){
		$(this).parent().parent().parent().addClass('menu-is-opening menu-open');
	}
});
</script>
