<div class="list_tables">
	<div class="add_button">
		<?php maintenance_detail_add_link('penalties', $_SESSION['userPermmissions']) ?>
	</div>
	<?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>
	<div class="table-responsive">
		<table class="table stripe"  id="myTable">
			<thead class="thead-dark">
				<tr class="text-center">
					<th>#</th>
					<th>Penalty</th>
					<th>Hours</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $cnt = 1; ?>
				<?php foreach($penalty as $type): ?>
					<tr class="text-center">
						<th scope="row"><?= $cnt++ ?></th>
						<td><?= $type['penalty'] ?></td>
						<td><?= $type['hours'] ?></td>
						<td><?= ($type['status'] == 'a') ? 'active':'inactive' ?></td>
						<td class="text-center">
						<a class="btn btn-success btn-sm" title="edit" href='<?= base_url('penalties/edit/'.$type['id']); ?>'><i class="far fa-edit"></i></a>
						<?php if($type['status'] == 'a'):?>
							<a class="btn btn-danger btn-sm remove" onclick=" confirmUpdateStatus('<?= base_urL('penalties/inactive/')?>',<?=$type['id']?>,'d')" title="inactive"><i class="fas fa-archive"></i></a>
						<?php else:?>
							<a class="btn btn-info btn-sm remove" onclick=" confirmUpdateStatus('<?= base_urL('penalties/active/')?>',<?=$type['id']?>,'a')" title="activate"><i class="fas fa-archive"></i></a>
						<?php endif;?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
