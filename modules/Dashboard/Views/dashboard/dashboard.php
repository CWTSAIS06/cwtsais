<link rel="stylesheet" href="<?= base_url() ?>/public/custom-css/dashboard.css">
<div class="dashboard_content">
	<div class="statistics">
		<div class="statistic">
			<div class="statistic_left left_blue">
				<img src="public/img/icons/Group 13.svg" alt="">
			</div>
			<div class="statistic_right">
				<p class="title">Students</p>
				<p class="numbers"><?= $students; ?></p>
			</div>
		</div>
		<div class="statistic">
			<div class="statistic_left left_red">
				<img src="public/img/icons/PENALTY VECTOR.svg" alt="">
			</div>
			<div class="statistic_right">
				<p class="title">Penalties</p>
				<p class="numbers"><?= $penalties; ?></p>
			</div>
		</div>
		<div class="statistic">
			<div class="statistic_left left_green">
				<img src="public/img/icons/ENROLLED VECTOR.svg" alt="">
			</div>
			<div class="statistic_right">
				<p class="title">Enrolled</p>
				<p class="numbers"><?= $enrolled; ?></p>
			</div>
		</div>
		<div class="statistic">
			<div class="statistic_left left_yellow">
				<img src="public/img/icons/GRADUATE VECTOR.svg" alt="">
			</div>
			<div class="statistic_right">
				<p class="title">Graduates</p>
				<p class="numbers"><?= $complete?></p>
			</div>
		</div>
	</div>
	<div class="others">
		<div class="other">
			event
		</div>
		<div class="other">
			penalties
		</div>
	</div>
</div>