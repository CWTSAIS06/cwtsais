<div class="list_tables">
	<div class="add_button">
		<p>ACCUMULATED HOURS:
		 <?php
		 $split_time = explode('.',$accumulated_hrs);
		 echo $split_time[0].' hr & '.$split_time[1]. ' minutes';
		 
		 ?></p>
	</div>
	<div class="table-responsive">
		<?php if($_SESSION['rid'] == '3'):?> 
			<table class="table stripe" id="myTable">
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
							<?php
							$time_in = strtotime($attendance['timein']);
							$time_out = strtotime($attendance['timeout']);
							$diff = ($time_out - $time_in);
							$difference_minute = $diff/60;

							$total_added_time = strtotime('00:00 + '.abs(intval($difference_minute)).' minutes' );
							$split_time =  explode(':',date('H:i', $total_added_time));
							
							$total_current_accumulated = $split_time[0].' hr & '.$split_time[1]. ' minutes';
					
							?>
							<td><?=$attendance['timeout'] == null ? 'N/A' : $total_current_accumulated?></td>
							<td><?=$attendance['subject']?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		<?php endif;?>
		<button class="btn btn-danger btn-sm remove" onclick=" nstp1('<?= base_urL('enroll/enrollStudent')?>')" title="enroll" id="enrollment" hidden><i class="fas fa-archive"></i></button>

	</div>
</div>
<script src="<?= base_url() ?>/public/plugins/jquery/jquery.min.js"></script>
<script>

	$(document).ready(function(){
		nstp1_complete = "<?= $nstp1_success?>";
		if(nstp1_complete == 1){
			$("#enrollment").click();
		}

	});

	
</script>