<div class="list_tables">
	<div class="personal_info">
		<h5 class="view_title">Role Details</h5>
		<p class="info_details">
			Role Name: <span><?= ucfirst($role[0]['role_name']) ?></span>
		</p>
		<p class="info_details">
			Description: <span><?= ucfirst($role[0]['description']) ?></span>
		</p>
		<p class="info_details">
			Landing Page <span><?= ucwords(name_on_system($role[0]['function_id'], $permissions, 'permissions')) ?></span>
		</p>
		<div class="personal_edit_button">
			<?php
				user_edit_link('roles','edit-role', $permissions, $role[0]['id']);
			?>
		</div>
	</div>
</div>
