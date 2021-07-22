<div class="list_tables">
	<div class="add_button">
		<?php user_add_link('roles', $_SESSION['userPermmissions']) ?>
	</div>
	<?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>
	<div class="table-responsive">
		<table class="table stripe" id="myTable">
			<thead class="thead-dark">
				<tr align="center">
					<th>#</th>
					<th>Name</th>
					<th>Description</th>
					<th>Landing Page</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $cnt = 1; ?>	
				<?php foreach($roles as $role): ?>
					<tr id="<?php echo $role['id']; ?>">
						<th scope="row"><?= $cnt++ ?></th>
						<td><?= ucwords($role['role_name']) ?></td>
						<td><?= ucwords($role['description']) ?></td>
						<td><?= ucwords($role['function_name']) ?></td>
						<td class="text-center">
						<?php
							users_action('roles', $_SESSION['userPermmissions'], $role['id']);
						?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>