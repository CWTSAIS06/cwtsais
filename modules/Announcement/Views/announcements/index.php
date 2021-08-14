


<div class="list_tables">
	<div class="add_button">
		<a href="<?= base_url() ?>announcement/add" class="btn btn-sm btn-success btn-block float-right">
			<i class="fa fa-plus"></i>
			Add Event
		</a>
	</div>
	<?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>
	<div class="table-responsive">
		<table class="table stripe" id="graduateTable">
			<thead class="thead-dark">
				<tr class="text-center">
					<th>Event Name</th>
					<th>Description</th>
					<th>Event Date</th>
					<th>Time</th>
					<th>Status</th>
					<th>Action</th>
		
				</tr>
			</thead>
			<tbody>
				<?php $cnt = 1; ?>
				<?php foreach($events as $event ): ?>
          <tr>
						<td><?= ucwords($event['event']) ?></td>
						<td><?= ucwords($event['description']) ?></td>
						<td><?= ucwords($event['announcement_date']) ?></td>
						<td><?= ucwords(date('H:i:s A', strtotime($event['start_time']))) ?> - <?= ucwords(date('H:i:s A', strtotime($event['end_time']))) ?></td>
						<td><?= ucwords(($event['status'] == 'a') ? 'active':'inactive')  ?></td>
            <td class="text-center">
						<a class="btn btn-success btn-sm" title="edit" href='<?= base_url('announcement/edit/'.$event['id']); ?>'><i class="far fa-edit"></i></a>
						<?php if($event['status'] == 'a'):?>
							<a class="btn btn-danger btn-sm remove" onclick=" confirmUpdateStatus('<?= base_urL('announcement/inactive/')?>',<?=$event['id']?>,'d')" title="inactive"><i class="fas fa-archive"></i></a>
						<?php else:?>
							<a class="btn btn-info btn-sm remove" onclick=" confirmUpdateStatus('<?= base_urL('announcement/active/')?>',<?=$event['id']?>,'a')" title="activate"><i class="fas fa-archive"></i></a>
						<?php endif;?>
						</td>
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
		
			]
		});
	});


	// {
	// 				extend: 'pdfHtml5',
	// 				text: 'To PDF',
	// 				className: 'btn btn-sm btn-primary rounded-pill px-3 mb-3 mb-sm-0',
	// 				messageTop: ' ',
	// 				download: 'open',
	// 				orientation: 'landscape',
	// 				title: ' List of NSTP Graduates \n S.Y '+conceptName,
	// 				customize: function ( doc, btn, tbl ) {

	// 					doc['header']=(function() {
	// 						return {
	// 							columns: [
	// 								{
	// 									image: 'data:image/png;base64,'+ "<?= base64_encode(file_get_contents('public/img/pup.png'))?>",
	// 									width: '650',
	// 								},
	// 								// {
	// 								// 	alignment: 'center',
	// 								// 	fontSize: 10,
	// 								// 	text: "Polytechnic University of the Philippines \n Taguig Branch \n General Santos Avenue, Lower Bicutan, Taguig City",
	// 								// 	style: 'header'
	// 								// },
	// 							],
								
	// 							margin: [120,15]
	// 						}
	// 					});
	// 					doc.pageMargins = [20, 90, 10, 30];

	// 					pdfMake.tableLayouts = {
	// 						exampleLayout: {
	// 						hLineWidth: function (i) {
	// 							return 0.5;
	// 						},
	// 						vLineWidth: function (i) {
	// 							return 0.5;
	// 						},
	// 						hLineColor: function (i) {
	// 							return 'black';
	// 						},
	// 						vLineColor: function (i) {
	// 							return 'black';
	// 						},
	// 						paddingLeft: function (i) {
	// 						 return i === 0 ? 0 : 23;
	// 						},
	// 						paddingRight: function (i, node) {
	// 						 return (i === node.table.widths.length - 1) ? 0 : 23;
	// 						}
	// 						}
	// 					};
						
	// 					doc.content[2].layout = 'exampleLayout';

						
						
	// 				}
	// 				// pageSize: 'LEGAL'
  // }

</script>