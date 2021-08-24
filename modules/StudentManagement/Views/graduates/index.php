

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
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $cnt = 1; ?>
				<?php foreach($graduates as $graduate): ?>
					<tr id="<?php echo $graduate['id']; ?>">
						<th scope="row"><?= ucwords($graduate['serial_num']) ?> </th>
						<td><?= ucwords($graduate['stud_num']) ?></td>
						<td><?= ucwords($graduate['lastname']) . ', ' . ucwords($graduate['firstname']) ?></td>
						<td><?= ucwords($graduate['course']) ?></td>
						<td><?= ucwords($graduate['birthdate']) ?></td>
						<td><?= ucwords($graduate['age']) ?></td>
						<td><?= ucwords(($graduate['gender'] == 1) ? 'M':'F') ?></td>
						<td><?= ucwords($graduate['address'])?> </td>
						<td><?= ucwords($graduate['contact_no'])?> </td>
						<td><a class="btn btn-success btn-sm" title="edit" href='<?= base_url('graduates/edit/'.$graduate['student_id']); ?>'><i class="far fa-edit"></i></a></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

<div class="list_tables">
	<div class="row">
		<div class="col-md-12">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="exampleInputFile">File Upload</label>
							<input class="file-to-upload form-control" type="file" name="file" id="file" size="150">
							<p class="help-block">Only Excel/CSV File Import.</p>
						</div>
					</div>
				
				</div>
		
				<div class="form_submit pull-right">
					<button type="submit" class="upload-accounts btn btn-success">Submit</button>
				</div>
		</div>
	</div>
</div>

<div class="list_tables"  style='width:100%; display:none;'>
	<?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>
	<div class="table-responsive" >
		<table class="table stripe" id="csv-file-header" >
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
		
			</tbody>
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



var uploadLimit = 999;
var uploadDataArr = [];

	$(document).ready( function () {
		$('.upload-accounts').click(function(){
			var files = $(".file-to-upload")[0].files;
			
			// check if has selected file
			if(files.length == 0){
				
				show_alert("Please select a file first.");
				
				return false;
			
			}

			var csvFile = $(".file-to-upload")[0].files[0];
			var reader = new FileReader();
			
			reader.readAsText(csvFile);
			$(reader).on('load', processFile);

			return false;
			
		});

		function processFile(e) {
			var file = e.target.result, results;
			
			if (file && file.length) {
				results = file.trim().split("\r\n");
				//results = file.trim().split(/\r|\n|\r\n/);
				
				var dataArr = [];
				for(var i=0; i<results.length; i++){
					
					dataArr.push(results[i]);
					if(i == uploadLimit || i == (results.length-1)){
						
						uploadDataArr.push(dataArr);
						dataArr = [];
						
					}
					
				}
				console.log(uploadDataArr)
				senddata(0);
				
			}
		}
	
	
	function senddata(index){
        
		if(index < uploadDataArr.length){
			$.ajax({
				type: "POST",
				url: "<?= base_url('graduates/insert-graduates')?>",
				data: {file: uploadDataArr[index]},
				async: true,
				success: function(data){
                    console.log(data);
                    var jsonData = $.parseJSON(data);
                    if(jsonData['with_error'] == 1){
                        alert(jsonData['message'] + " line number: " + jsonData['line_number']);
                    }
                    else {
    					senddata(index+1);
                    }
				},
				complete: function(){
					// alert('success');
				}
			});
        }
        else {
            location.href = "<?= base_url('graduates')?>";
        }
		
    }
	













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
						doc.pageMargins = [20, 90, 10, 30];

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
							 return i === 0 ? 0 : 23;
							},
							paddingRight: function (i, node) {
							 return (i === node.table.widths.length - 1) ? 0 : 23;
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