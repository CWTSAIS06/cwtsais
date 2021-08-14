<div class="form_container">
	<div class="row">
		<div class="col-md-12">
			<form action="<?= base_url() ?>users/<?= 'edit-profile/'.$rec['id'] ?>" method="post">
				<div class="row">
					<div class="col-md-5 offset-md-1">
						<div class="form-group">
							<label for="firstname">Firstname</label>
							<input name="firstname" type="text" value="<?= isset($rec['firstname']) ? $rec['firstname'] : set_value('firstname') ?>" class="form-control <?= isset($errors['firstname']) ? 'is-invalid':' ' ?>" id="firstname" placeholder="Firstname">
							<?php if(isset($errors['firstname'])): ?>
								<div class="invalid-feedback">
									<?= $errors['firstname'] ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
					<div class="col-md-5">
						<div class="form-group">
							<label for="lastname">Lastname</label>
							<input name="lastname" type="text" value="<?= isset($rec['lastname']) ? $rec['lastname'] : set_value('lastname') ?>" class="form-control <?= isset($errors['lastname']) ? 'is-invalid':' ' ?>" id="lastname" placeholder="Lastname">
							<?php if(isset($errors['lastname'])): ?>
								<div class="invalid-feedback">
									<?= $errors['lastname'] ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-5 offset-md-1">
						<div class="form-group">
							<label for="username">Username</label>
							<input name="username" type="text" value="<?= isset($rec['username']) ? $rec['username'] : set_value('username') ?>" class="form-control <?= isset($errors['username']) ? 'is-invalid':' ' ?>" id="username" placeholder="Username">
							<?php if(isset($errors['username'])): ?>
								<div class="invalid-feedback">
									<?= $errors['username'] ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
					<div class="col-md-5">
						<div class="form-group">
							<label for="email">Email</label>
							<input name="email" type="email" value="<?= isset($rec['email']) ? $rec['email'] : set_value('email') ?>" class="form-control <?= isset($errors['email']) ? 'is-invalid':' ' ?>" id="email" placeholder="Email">
							<?php if(isset($errors['email'])): ?>
								<div class="invalid-feedback">
									<?= $errors['email'] ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-5 offset-md-1">
						<div class="form-group">
							<label for="password">Password (For Change Password) </label>
							<input name="password" type="password" value="" class="form-control <?= isset($errors['password']) ? 'is-invalid':' ' ?>" id="password" placeholder="Password">
							<?php if(isset($errors['password'])): ?>
								<div class="invalid-feedback">
									<?= $errors['password'] ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				
				</div>
				
				<div class="form_submit">
					<!-- <button type="reset" class="btn btn-secondary back_button">
						<a href="<?= base_url() ?>users">
							Cancel
						</a>
					</button> -->
					<button type="submit" class="btn btn-success">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>
