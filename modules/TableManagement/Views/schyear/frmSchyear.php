<div class="form_container">
	<div class="row">
		<div class="col-md-12">
			<form action="<?= base_url() ?>schyear/<?= isset($rec) ? 'edit/'.$rec['id'] : 'add' ?>" method="post">
				<div class="row">
					<div class="col-md-6 offset-md-3">
						<div class="form-group">
							<label for="penalty">School Year</label>
							<input type="text" class="form-control <?= isset($errors['schyear']) ? 'is-invalid':' ' ?>" name="schyear" value="<?= isset($rec['schyear']) ? $rec['schyear'] : ''?>" id="schyear" placeholder="School Year">
							<?php if (isset($errors['schyear'])): ?>
								<div class="text-danger">
									<?= $errors['schyear']?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="form_submit">
					<button type="reset" class="btn btn-secondary back_button">
						<a href="<?= base_url() ?>schyear">
							Cancel
						</a>
					</button>
					<button type="submit" class="btn btn-success">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>
