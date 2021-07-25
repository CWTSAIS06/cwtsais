<div class="list_tables">
	<div class="row">
		<div class="col-md-12">
			<form action="<?= base_url("enroll") ?>" method="post">
				
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="course_id">Course</label>
							<select id="course_id" class="form-control" name="course_id" >
								<option value="all">All</option>
								<?php foreach ($courses as $course): ?>
									<option value="<?=$course['id']?>" <?= ($course['id']== $rec['course_id']) ? 'selected':'' ?> ><?=$course['course'];?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="year_section">Year & Section</label>
							<select id="year_section" class="form-control" name="year_section" >
								<option value="all-all">All</option>
								<?php foreach ($sections as $section): ?>
									<option value="<?= $section['year_id'];?>-<?= $section['id'];?>" <?= ($section['year_id'] == $rec['year_id']) ? 'selected':''?>> <?=$section['year'];?> - <?= $section['section']; ?></option>
								
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				
				</div>
		
				<div class="form_submit pull-right">
					<button type="submit" class="btn btn-success">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="list_tables">
	<?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>
	<div class="table-responsive">
	 	<table class="table stripe" id="myTable">
			<thead class="thead-dark">
				<tr class="text-center">
					<th>#</th>
					<th>Student No.</th>
					<th>Full Name</th>
					<th>Course</th>
					<th>Subject</th>
					<th>required hours</th>
					<th>accumulated hours</th>
				</tr>
			</thead>
			<tbody>
				<?php $cnt = 1; ?>
				<?php foreach($students as $student): ?>
					<tr id="<?php echo $student['id']; ?>">
						<th scope="row"><?= $cnt++ ?></th>
						<td><?= ucwords($student['stud_num']) ?></td>
						<td><?= ucwords($student['lastname']) . ', ' . ucwords($student['firstname']) ?></td>
						<td><?= ucwords($student['course']) ?></td>
						<td><?= ucwords($student['subject']) ?></td>
						<td><?= ucwords($student['required_hrs'])?> </td>
						<td><?= ucwords($student['accumulated_hrs'])?> </td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
<script src="<?= base_url();?>public/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf8" src="<?= base_url();?>\public\plugins\datatables-buttons\js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="<?= base_url();?>\public\plugins\datatables-buttons\js/buttons.html5.min.js"></script>
<script type="text/javascript" src="<?= base_url();?>\public\plugins\datatables-buttons\js/pdfmake.min.js"></script>
<script type="text/javascript" src="<?= base_url();?>\public\plugins\datatables-buttons\js/vfs_fonts.js"></script>

<script>
	$(document).ready( function () {
		var course = $('#course_id').find(":selected").text();
		var section = $('#year_section').find(":selected").text();
		$('#myTable').DataTable({
			"bInfo": false,
			dom: 'lft<"#space">Bip',
			buttons: [
				// 'csvHtml5',
				// 'excelHtml5',
				{
					extend: 'pdfHtml5',
					text: 'To PDF',
					className: 'btn btn-sm btn-primary rounded-pill px-3 mb-3 mb-sm-0',
					messageTop: ' ',
					download: 'open',
					orientation: 'landscape',
					title: ' List of Enrolled \n Course: '+course+' \n Year & Section: '+section,
					customize: function ( doc, btn, tbl ) {

						pdfMake.tableLayouts = {
							exampleLayout: {
							hLineWidth: function (i) {
								return 0.5;
							},
							vLineWidth: function (i) {
								return 0.5;
							},
							hLineColor: function (i) {
								return 'black';
							},
							vLineColor: function (i) {
								return 'black';
							},
							paddingLeft: function (i) {
							 return i === 0 ? 0 : 29;
							},
							paddingRight: function (i, node) {
							 return (i === node.table.widths.length - 1) ? 0 : 29;
							}
							}
						};
						
						doc.content[2].layout = 'exampleLayout';

						
						
					}
					// pageSize: 'LEGAL'
            	}
			]
		});
	});


</script>