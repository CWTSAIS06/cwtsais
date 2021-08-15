<div class="list_tables">
	<div class="personal_info">
		<h5 class="view_title">Personal Info</h5>
		<p class="info_details">
			Name: <span><?= ucfirst($user[0]['firstname']).' '.ucfirst($user[0]['lastname']) ?></span>
		</p>
		<p class="info_details">
			Username: <span><?= ucfirst($user[0]['username']) ?></span>
		</p>
		<p class="info_details">
			Email: <span><?= ucfirst($user[0]['username']) ?></span>
		</p>
		<p class="info_details">
			<!-- Birthdate: <span><?= $user[0]['birthdate'] ?> (<?= floor((time() - strtotime($user[0]['birthdate'])) / 31556926) ?> yrs old)</span> -->
		</p>
		<div class="personal_edit_button">
			<?php
				user_edit_link('users','edit-user', $permissions, $user[0]['id']);
			?>
		</div>
	</div>
</div>