<div class="list_tables">
	<div class="add_button">
		<?php user_add_link('users', $_SESSION['userPermmissions']) ?>
	</div>
	<?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>
	<div class="table-responsive">
		<table class="table stripe" id="myTable">
			<thead class="thead-dark">
				<tr align="center">
					<th>#</th>
					<th>Name</th>
					<th>Username</th>
					<th>Email</th>
					<th>User Role</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php if (empty($users)): ?>
				<?php else: ?>
					<?php $cnt = 1; ?>
					<?php foreach($users as $user): ?>
						<tr>

							<td scope="row"><?= esc($user['userid']); ?></td>
							<td><?= $user['firstname'].' '.$user['lastname'] ?></td>
							<td><?= $user['username'] ?></td>
							<td width="30"><?= $user['email'] ?></td>
							<td><?= strtoupper($user['role_name']) ?></td>
							<td class="text-center action_buttons">
								<?php
									users_action('users', $_SESSION['userPermmissions'], $user['userid']);
								?>
							</td>
						</tr>
					<?php endforeach; ?>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>
