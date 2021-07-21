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
			<div class="top_header top_events">
				<img src="public/img/icons/megaphone.png" alt="">
				<p>Event Announcement</p>
			</div>
			<div class="events_content">
				<div class="events">
					<p class="label">Today's Event</p>
					<div class="event">
						<p class="date">July 19, 2021</p>
						<p class="title">Flag Raising Ceremony</p>
						<p class="time">6:00 am - 7:00 am</p>
					</div>
				</div>
				<div class="events upcoming">
					<p class="label">Upcoming Events</p>
					<div class="event">
						<p class="date">July 19, 2021</p>
						<p class="title">Flag Raising Ceremony</p>
						<p class="time">6:00 am - 7:00 am</p>
					</div>
					<div class="event">
						<p class="date">July 19, 2021</p>
						<p class="title">Flag Raising Ceremony</p>
						<p class="time">6:00 am - 7:00 am</p>
					</div>
				</div>
			</div>
		</div>
		<div class="other">
			<div class="top_header top_penalties">
				<img src="public/img/icons/PENALTY VECTOR.svg" alt="">
				<p>Recent Student Penalties</p>
			</div>
			<div class="penalties_content">
				<div class="penalty_list">
					<p class="name">Name</p>
					<p class="penalty">Penalty</p>
				</div>
				<div class="penalty_list">
					<p class="name">Juan Dela Cruz</p>
					<p class="penalty">Absent (Seminar)</p>
				</div>
				<div class="penalty_list">
					<p class="name">Juan Dela Cruz</p>
					<p class="penalty">Absent (Seminar)</p>
				</div>
				<div class="penalty_list">
					<p class="name">Juan Dela Cruz</p>
					<p class="penalty">Absent (Seminar)</p>
				</div>
				<div class="penalty_list">
					<p class="name">Juan Dela Cruz</p>
					<p class="penalty">Absent (Seminar)</p>
				</div>
				<div class="penalty_list">
					<p class="name">Juan Dela Cruz</p>
					<p class="penalty">Absent (Seminar)</p>
				</div>
			</div>
		</div>
	</div>
</div>