<link rel="stylesheet" href="<?= base_url() ?>/public/custom-css/attendance.css">
<div class="attendance_container <?php if ( $_SESSION['rid'] == '3' ) { echo "with_table"; } ?>">
	<a type="button" href="<?= base_url("dashboard") ?>" class="back_button btn btn-primary">
		<i class="fas fa-arrow-left"></i>
		Back
	</a>
	<div class="attendance_content">
		<p class="page_title">CWTS Daily Attendance</p>
		<div class="date_time_content">
			<p class="time" id="attendance_time"></p>
			<p class="date" id="attendance_date"></p>
			<p class="day" id="attendance_day"></p>
		</div>
		<?php if($_SESSION['rid'] !== '3'):?> 
			<div class="form_time_in_out">
				<form action="">
					<div class="form_group">
						<input name="stud_num" class="input_container" type="text" autocomplete="off" id="stud_num" placeholder="Student Number" required>
					</div>
					<div class="form_buttons">
						<button id="time_in" type="submit" class="form_button time_in">TIME IN</button>
						<button id="time_out" type="submit" class="form_button time_out"> TIME OUT</button>
					</div>
				</form>
			</div>
		<?php endif;?>
	</div>
	<?php if($_SESSION['rid'] == '3'):?> 
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table table-bordered" id="myTable">
					<thead class="thead-dark text-center">
						<tr>
							<th>Student Number</th>
							<th>Name</th>
							<th>Date</th>
							<th>Time In</th>
							<th>Time Out</th>
							<th>Total Time</th>
							<th>Subject</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($attendances as $attendance): ?>
							<tr>
							<td><?=$attendance['stud_num']?></td>
							<td><?=$attendance['lastname'] . ', ' . $attendance['firstname'] . ' ' . $attendance['middlename']?></td>
							<td><?=date('M d, Y', strtotime($attendance['date']))?></td>
							<td><?=date('h:i A', strtotime($attendance['timein']))?></td>
							<td><?=$attendance['timeout'] == null ? 'N/A' : date('h:i A', strtotime($attendance['timeout']))?></td>
							<td><?=$attendance['timeout'] == null ? 'N/A' : number_format((float)(abs(strtotime($attendance['timein']) - strtotime($attendance['timeout'])) / 60) / 60, 2, '.', '') . ' hrs'?></td>
							<td><?=$attendance['subject']?></td>
							</tr>
						
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	<?php endif;?>
</div>
<script src="<?= base_url() ?>/public/plugins/jquery/jquery.min.js"></script>
<script>
	$('#time_in').on('click', function(e){
		var student_num = $('#stud_num').val();
		$.ajax({
			url: "<?= base_url("attendance/verify")?>",
			type: "POST",
			data: {stud_num :student_num},
			success: function(response){
				console.log(response)
			}
		});
	});
	$('#time_out').on('click', function(e){
		var student_number = $('#stud_num').val();
		$.ajax({
			url: "<?= base_url("attendance/attendanceTimeOut")?>",
			type: "POST",
			data: {student_number :student_number},
			success: function(response){
				console.log(response)
			}
		});
	});
</script>
