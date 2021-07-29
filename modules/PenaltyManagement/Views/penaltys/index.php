<div class="list_tables">
	<div class="add_button">
		<?php if(user_link('add-penalty', $_SESSION['userPermmissions'])): ?>
			<a href="<?= base_url() ?>penalty/add" class="btn btn-sm btn-success btn-block float-right">
				<i class="fa fa-plus"></i>
				Add Penalty
			</a>
		<?php endif; ?>
	</div>
	<?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>
	<div class="table-responsive">
		<table class="table stripe" id="penaltyTable">
			<thead class="thead-dark">
				<tr class="text-center">
				<th>#</th>
				<th>Name</th>
				<th>Subject</th>
				<th>Date</th>
				<th>Hours</th>
				<th>Reason</th>
				<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $cnt = 1; ?>
				<?php foreach($penalties as $penalty): ?>
					<tr id="<?php echo $penalty['id']; ?>">
						<td scope="row"><?= $cnt++ ?></td>
						<td><?=$penalty['firstname'] . ' ' . $penalty['lastname']?></td>
						<td><?=$penalty['subject']?></td>
						<td><?=date('M d, Y', strtotime($penalty['date']))?></td>
						<td><?=$penalty['hours']?></td>
						<td><?= ($penalty['reason'] == 0) ? $penalty['other_reason']:$penalty['penalty']?></td>
						<td class="text-center">
							<a class="btn btn-dark btn-sm" title="show" href='<?= base_url('penalty/show/'.$penalty['id']); ?>'><i class="fas fa-bars"></i></a>
							<a class="btn btn-success btn-sm" title="edit" href='<?= base_url('penalty/edit/'.$penalty['id']); ?>'><i class="far fa-edit"></i></a> 
							<?php if($penalty['status'] == 'a'):?>
								<a class="btn btn-danger btn-sm remove" onclick=" confirmUpdateStatus('<?= base_urL('penalty/inactive/')?>',<?=$penalty['id']?>,'d')" title="deactivate"><i class="fas fa-archive"></i></a>
							<?php else:?>
								<a class="btn btn-info btn-sm remove" onclick=" confirmUpdateStatus('<?= base_urL('penalty/active/')?>',<?=$penalty['id']?>,'a')" title="activate"><i class="fas fa-archive"></i></a>
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
	
		$('#penaltyTable').DataTable({
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
					title: ' List of Student with Penalty',
					exportOptions: {
						columns: [0,1,2,3,4,5]
					},
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
							 return i === 0 ? 0 : 50;
							},
							paddingRight: function (i, node) {
							 return (i === node.table.widths.length - 1) ? 0 : 50;
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
