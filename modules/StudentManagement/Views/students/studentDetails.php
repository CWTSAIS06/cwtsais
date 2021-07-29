<div class="list_tables">
	<div class="personal_info">
		<?php foreach ($students as $student): ?>
			<button class="btn btn-danger download_pdf">
				<a href="<?=base_url()?>student/pdf/<?=$student['id']?>" target="_blank">
					<i class="fa fa-file-pdf"></i>
					Download as PDF
				</a>
			</button>
			<h5 class="view_title">Personal Info</h5>
			<p class="info_details">
				Full name: <span><?=$student['lastname'] . ', ' . $student['firstname'] . ' ' . $student['middlename']?></span>
			</p>
			<p class="info_details">
				Course: <span><?=$student['course']?></span>
			</p>
			<p class="info_details">
			Address: <span><?=$student['address']?></span>
			</p>
		<?php endforeach; ?>
	</div>
	<div class="enrolled_subjs">
		<h5 class="view_title">Enrolled Subject</h5>
		<div class="table-responsive">
			<table class="table stripe display">
				<thead class="thead-dark">
					<tr>
						<th>Subject</th>
						<th>Completed Hours</th>
						<th>Required Hours</th>
						<th>Penalty</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($enrolls as $enroll): ?>
						<tr>
						<td><?= $enroll['subject']?></td>
						<td><?= $enroll['accumulated_hrs']?></td>
						<td><?= $enroll['required_hrs']?></td>
						<td><?= $enroll['penalty']?></td>
						<td><?= ($enroll['status'] == 'i') ? 'Incomplete' : 'Complete'?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
