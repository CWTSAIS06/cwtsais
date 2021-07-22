<div class="list_tables">
	<div class="add_button">
		<p>ACCUMULATED HOURS: <?= $accumulated_hrs;?> HRS</p>
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
							<td><?=$attendance['timeout'] == null ? 'N/A' : number_format((float)(abs(strtotime($attendance['timein']) - strtotime($attendance['timeout'])) / 60) / 60, 2, '.', '') . ' hrs'?></td>
							<td><?=$attendance['subject']?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		<?php endif;?>
	</div>
</div>
<script src="<?= base_url() ?>/public/plugins/jquery/jquery.min.js"></script>
