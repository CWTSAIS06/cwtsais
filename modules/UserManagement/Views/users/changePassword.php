<div class="form_container">
	<div class="row">
		<div class="col-md-12">
			<form action="<?= base_url() ?>users/change-password/<?= $_SESSION['uid'];?>" method="post">
			
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
