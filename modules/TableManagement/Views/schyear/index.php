<div class="list_tables">
	<div class="add_button">
		<?php user_add_link('schyear', $_SESSION['userPermmissions']) ?>
	</div>
	<?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>
	<div class="table-responsive">
		<table class="table stripe"  id="myTable">
			<thead class="thead-dark">
				<tr class="text-center">
					<th>#</th>
					<th>SchoolYear</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $cnt = 1; ?>
				<?php foreach($schyear as $schyear): ?>
					<tr id="<?php echo $schyear['id']; ?>">
						<th scope="row"><?= $cnt++ ?></th>
						<td><?= ucwords($schyear['schyear']) ?></td>
						<td><?= ($schyear['status'] == 'a') ? 'active':'inactive' ?></td>
						<td class="text-center">
							<!-- <?php  users_edit('schyear', $_SESSION['userPermmissions'], $schyear['id']); ?> -->
							<a class="btn btn-success btn-sm" title="edit" href='<?= base_url('schyear/edit/'.$schyear['id']); ?>'><i class="far fa-edit"></i></a>
							<?php if($schyear['status'] == 'a'):?>
								<a class="btn btn-danger btn-sm remove" onclick=" confirmUpdateStatus('<?= base_urL('schyear/inactive/')?>',<?=$schyear['id']?>,'d')" title="deactivate"><i class="fas fa-archive"></i></a>
							<?php else:?>
								<a class="btn btn-info btn-sm remove" onclick=" confirmUpdateStatus('<?= base_urL('schyear/active/')?>',<?=$schyear['id']?>,'a')" title="activate"><i class="fas fa-archive"></i></a>
							<?php endif;?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>