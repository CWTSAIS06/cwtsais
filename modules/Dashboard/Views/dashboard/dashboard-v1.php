<div class="row">
	<div class="col-12 col-sm-6 col-md-3">
		<div class="info-box">
			<span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

			<div class="info-box-content">
			<span class="info-box-text">Students</span>
			<span class="info-box-number">
				<?= $students; ?>
			</span>
			</div>
			<!-- /.info-box-content -->
		</div>
	<!-- /.info-box -->
	</div>
	<!-- /.col -->
	<div class="col-12 col-sm-6 col-md-3">
		<div class="info-box mb-3">
			<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users-slash"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Penalties</span>
				<span class="info-box-number"><?= $penalties;?></span>
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<!-- /.col -->
	<!-- fix for small devices only -->
	<div class="clearfix hidden-md-up"></div>
	<div class="col-12 col-sm-6 col-md-3">
		<div class="info-box mb-3">
			<span class="info-box-icon bg-success elevation-1"><i class="fas fa-address-card"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Enrolled</span>
				<span class="info-box-number"><?= $enrolled;?></span>
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<!-- /.col -->
	<div class="col-12 col-sm-6 col-md-3">
		<div class="info-box mb-3">
			<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user-graduate"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Graduates</span>
				<span class="info-box-number"><?= $complete?></span>
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<!-- /.col -->
</div>