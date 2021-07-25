

<div class="list_tables">
	<div class="row">
		<div class="col-md-12">
			<form action="<?= base_url("graduates") ?>" method="post">
				
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="schyear_id">School Year</label>
							<select id="schyear_id" class="form-control" name="schyear_id" >
								<option value="all">All</option>
								<?php foreach ($schoolyears as $schoolyear): ?>
									<option value="<?=$schoolyear['id']?>" <?= ($schoolyear['id'] == $rec['schyear_id']) ? 'selected':'' ?>><?=$schoolyear['schyear'];?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
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
				</div>
		
				<div class="form_submit pull-right">
					<button type="submit" class="btn btn-success">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="list_tables">
	<!-- <div class="add_button">
		<a href="<?= base_url() ?>graduates/add" class="btn btn-sm btn-success btn-block float-right">
			<i class="fa fa-plus"></i>
			Add Graduates
		</a>
	</div> -->
	<?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>
	<div class="table-responsive">
		<table class="table stripe" id="graduateTable">
			<thead class="thead-dark">
				<tr class="text-center">
					<th>Serial No.</th>
					<th>Student No.</th>
					<th>Full Name</th>
					<th>Course</th>
					<th>Date of Birth</th>
					<th>Age</th>
					<th>Gender</th>
					<th>Address</th>
					<th>Contact No.</th>
				</tr>
			</thead>
			<tbody>
				<?php $cnt = 1; ?>
				<?php foreach($graduates as $graduate): ?>
					<tr id="<?php echo $graduate['id']; ?>">
						<th scope="row"> </th>
						<td><?= ucwords($graduate['stud_num']) ?></td>
						<td><?= ucwords($graduate['lastname']) . ', ' . ucwords($graduate['firstname']) ?></td>
						<td><?= ucwords($graduate['course']) ?></td>
						<td><?= ucwords($graduate['birthdate']) ?></td>
						<td><?= ucwords($graduate['age']) ?></td>
						<td><?= ucwords(($graduate['gender'] == 1) ? 'M':'F') ?></td>
						<td><?= ucwords($graduate['address'])?> </td>
						<td><?= ucwords($graduate['contact_no'])?> </td>
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
		var conceptName = $('#schyear_id').find(":selected").text();
		$('#graduateTable').DataTable({
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
					title: ' List of NSTP Graduates \n S.Y '+conceptName,
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
							 return i === 0 ? 0 : 10;
							},
							paddingRight: function (i, node) {
							 return (i === node.table.widths.length - 1) ? 0 : 10;
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