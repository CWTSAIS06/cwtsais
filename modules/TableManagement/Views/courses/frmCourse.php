<div class="form_container">
	<div class="row">
		<div class="col-md-12">
			<form action="<?= base_url() ?>course/<?= isset($rec) ? 'edit/'.$rec['id'] : 'add' ?>" method="post">
				<div class="row">
					<div class="col-md-6 offset-md-3">
						<div class="form-group">
							<label for="penalty">Program</label>
							<input type="text" class="form-control <?= isset($errors['course']) ? 'is-invalid':' ' ?>" name="course" value="<?= isset($rec['course']) ? $rec['course'] : ''?>" id="course" placeholder="Course">
								<?php if (isset($errors['course'])): ?>
									<div class="text-danger">
										<?= $errors['course']?>
									</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 offset-md-3">
						<div class="form-group">
							<label for="penalty">Description</label>
							<input type="text" class="form-control <?= isset($errors['description']) ? 'is-invalid':' ' ?>" name="description" value="<?= isset($rec['description']) ? $rec['description'] : ''?>" id="description" placeholder="Description">
							<?php if (isset($errors['description'])): ?>
								<div class="text-danger">
									<?= $errors['description']?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="form_submit">
					<button type="reset" class="btn btn-secondary back_button">
						<a href="<?= base_url() ?>course">
							Cancel
						</a>
					</button>
					<button type="submit" class="btn btn-success">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>
