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

						<div class="form-group">
							<label for="gender">Gender</label>
							<select id="gender" class="form-control" name="gender" >
								<option value="all">All</option>
								<option value="1" <?= ($rec['gender'] == 1) ? 'selected':''?> >Male</option>
								<option value="2" <?= ($rec['gender'] == 2) ? 'selected':''?>>Female</option>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="year_section">Year & Section</label>
							<select id="year_section" class="form-control" name="year_section" >
								<option value="all-all">All</option>
								<!-- <?php foreach ($sections as $section): ?>
									<option value="<?= $section['year_id'];?>-<?= $section['id'];?>" <?= ($section['year'] == $rec['year_id'] && $section['id'] == $rec['section_id']) ? 'selected':''?>> <?=$section['year'];?> - <?= $section['section']; ?></option>
								<?php endforeach; ?> -->
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
					<th>Student No</th>
					<th>Full Name</th>
					<th>Course</th>
					<th>Subject</th>
					<th>Schedule</th>
					<th>Day of Duty</th>
					<th>Required Hours</th>
					<th>Accumulated Hours</th>
					<th>Remarks</th>
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
						<td><?= date('h:i:s',strtotime($student['start_time'])) ?> - <?= date('h:i:s',strtotime($student['end_time'])) ?></td>
						<td><?= ucwords($student['day'])?> </td>
						<td><?= ucwords($student['required_hrs'])?> </td>
						<td><?= ucwords($student['accumulated_hrs'])?> </td>
						<td><?php if($student['status'] == 'i'){
										echo 'Incomplete';
								   }else if ($student['status'] == 'c'){
										echo 'Completed';
								   }else if ($student['status'] == 'g'){
										echo 'Graduated';
								   }
							?>
						
						 </td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>


<div class="list_tables">
	<div class="row">
		<div class="col-md-12">
			<form id="file" action="<?= base_url("graduates") ?>" method="post" enctype="multipart/form-data"> 
				
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="exampleInputFile">File Upload</label>
							<input type="file" name="file[]" id="file" accept=".csv">
							<p class="help-block">Only CSV File Preview. 
							<br><span> *Please remove special character like (" . , ! @ ^ # $ ") etc </span> 
							<br> To not causing error csv preview </p>
						</div>
					</div>
				
				</div>
		
				<div class="form_submit pull-right">
					<!-- <button type="submit" class="btn btn-success">Submit</button> -->
				</div>
			</form>
		</div>
	</div>
</div>

<div class="list_tables">
	<?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>
	<div class="table-responsive">
		<table class="table stripe" id="previewTable">
			<!-- <thead class="thead-dark">
			
			</thead>
			<tbody>
			
			</tbody> -->
		</table>
	</div>
</div>
<script src="<?= base_url();?>public/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf8" src="<?= base_url();?>\public\plugins\datatables-buttons\js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="<?= base_url();?>\public\plugins\datatables-buttons\js/buttons.html5.min.js"></script>
<script type="text/javascript" src="<?= base_url();?>\public\plugins\datatables-buttons\js/pdfmake.min.js"></script>
<script type="text/javascript" src="<?= base_url();?>\public\plugins\datatables-buttons\js/vfs_fonts.js"></script>
<script type="text/javascript" src="<?= base_url();?>\public\js\papaparse.js"></script>

<script>
$("#course_id").on('change', function(){
		var course_id = $("#course_id :selected").val();
		var option = " ";
		$.ajax({
			url: "<?= base_url("student/getSections"); ?>",
			type:"GET",
			dataType: "JSON",
			data:{ course_id:course_id},
			success:function(response){
				option = " ";
				option += "<option value='all'>All</option>";
				response.forEach(function(data){
					option += "<option value='"+data.year_id+'-'+data.id+"'>" + data.year + '-' + data.section + '</option>';
				});
				$('#year_section').html(option);
			}
		});
	});
$('#file').change(function(e){
  var file = e.target.files[0];
  splitFileName = file['name'].split(".");
  fileType = splitFileName.slice(-1)[0];
  if(fileType != 'csv')
  {
    $('.error-message').html('<br /><div class="notification is-warning">Only CSV file extension is allowed!</div><br />');
  }
  else
  {
    Papa.parse(file, {
      header: true,
      dynamicTyping: true,
      skipEmptyLines: true,
      complete: function(results, file) {

        file_arr = results.data;
		file_chunk = results.data;
		console.log(file_arr)
		// var newObj = {};
		// for (var i in file_arr) {
		// 	newObj[i] = file_arr[i].replace(/[^a-zA-Z ]/g, "");
		// }
		$('#previewTable').DataTable({
			"responsive": true,
			"columns": results.meta.fields.map(c => ({
                            "title": c,
                           	 "data": c,
                            // "visible": c.toLowerCase() !== "id",
                            "default": ""
						})),
			"data": file_arr,
			
		});

        // $('#uploadVariantsBtn').attr('disabled', false);
      }// End complete: function(results, file)
    });
  }

});

	$(document).ready( function () {
		var course = $('#course_id').find(":selected").text();
		var section = $('#year_section').find(":selected").text();
		var gender = $('#gender').find(":selected").text();
		$('#myTable').DataTable({
			"bInfo": false,
			dom: 'lft<"#space">Bip',
			buttons: [
				'csvHtml5',	
				// 'excelHtml5',
				{
					extend: 'pdfHtml5',
					text: 'To PDF',
					className: 'btn btn-sm btn-primary rounded-pill px-3 mb-3 mb-sm-0',
					messageTop: ' ',
					download: 'open',
					orientation: 'landscape',
					title: '\n List of Enrolled \n  Course: '+course+'   Year & Section: '+section+'   Gender: '+gender,
					customize: function ( doc, btn, tbl ) {
						doc['header']=(function() {
							return {
								columns: [
									{
										image: 'data:image/png;base64,'+ "<?= base64_encode(file_get_contents('public/img/pup.png'))?>",
										width: '650',
									},
									// {
									// 	alignment: 'center',
									// 	fontSize: 10,
									// 	text: "Polytechnic University of the Philippines \n Taguig Branch \n General Santos Avenue, Lower Bicutan, Taguig City",
									// 	style: 'header'
									// },
								],
								
								margin: [120,15]
							}
						});
						doc.pageMargins = [30, 80, 10, 30];
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