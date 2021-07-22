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
						<td><?=$penalty['penalty']?></td>
						<td class="text-center">
							<?php users_action('penalty', $_SESSION['userPermmissions'], $penalty['id']); ?>
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
<script>
	$(document).ready( function () {
		// $('#penaltyTable').DataTable();
		$('#penaltyTable').DataTable( {
			"bInfo": false,
			dom: 'lft<"#space">Bip',
			buttons: [
				'copyHtml5',
				'excelHtml5',
				'csvHtml5',
				'pdfHtml5'
			]
		});
	} );
</script>
