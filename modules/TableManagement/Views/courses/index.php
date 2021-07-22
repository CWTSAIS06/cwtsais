<div class="list_tables">
	<div class="add_button">
		<?php user_add_link('course', $_SESSION['userPermmissions']) ?>
	</div>
	<?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>
	<div class="table-responsive">
		<table class="table stripe"  id="myTable">
			<thead class="thead-dark">
				<tr class="text-center">
					<th>#</th>
					<th>Course</th>
					<th>Course Description</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $cnt = 1; ?>
				<?php foreach($course as $course): ?>
					<tr id="<?php echo $course['id']; ?>">
						<th scope="row"><?= $cnt++ ?></th>
						<td><?= ucwords($course['course']) ?></td>
						<td><?= ucwords($course['description']) ?></td>
						<td><?= ($course['status'] == 'a') ? 'active':'inactive' ?></td>
						<td class="text-center">
							<!-- <?php  users_edit('course', $_SESSION['userPermmissions'], $course['id']); ?> -->
								<a class="btn btn-success btn-sm" title="edit" href='<?= base_url('course/edit/'.$course['id']); ?>'><i class="far fa-edit"></i></a> 
							<?php if($course['status'] == 'a'):?>
								<a class="btn btn-danger btn-sm remove" onclick=" confirmUpdateStatus('<?= base_urL('course/inactive/')?>',<?=$course['id']?>,'d')" title="deactivate"><i class="fas fa-archive"></i></a>
							<?php else:?>
								<a class="btn btn-info btn-sm remove" onclick=" confirmUpdateStatus('<?= base_urL('course/active/')?>',<?=$course['id']?>,'a')" title="activate"><i class="fas fa-archive"></i></a>
							<?php endif;?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
