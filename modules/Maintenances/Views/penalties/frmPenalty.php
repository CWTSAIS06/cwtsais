<div class="form_container">
	<div class="row">
		<div class="col-md-12">
			<form action="<?= base_url() ?>penalties/<?= isset($rec) ? 'edit/'.$rec['id'] : 'add' ?>" method="post">
				<div class="row">
					<div class="col-md-6 offset-md-3">
						<div class="form-group">
							<label for="penalty">Penalty</label>
							<input type="text" class="form-control <?= isset($errors['penalty']) ? 'is-invalid':' ' ?>" name="penalty" value="<?= isset($rec['penalty']) ? $rec['penalty'] : ''?>" id="penalty" placeholder="Penalty">
							<?php if (isset($errors['penalty'])): ?>
								<div class="text-danger">
									<?= $errors['penalty']?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 offset-md-3">
						<div class="form-group">
							<label for="hours">Number of Hours</label>
							<input type="text" class="form-control <?= isset($errors['hours']) ? 'is-invalid':' ' ?>" name="hours" value="<?= isset($rec['hours']) ? $rec['hours'] : ''?>" id="hours" placeholder="Number of Hours">
							<?php if (isset($errors['hours'])): ?>
								<div class="text-danger">
									<?= $errors['hours']?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="form_submit">
					<button type="reset" class="btn btn-secondary back_button">
						<a href="<?= base_url() ?>penalties">
							Cancel
						</a>
					</button>
					<button type="submit" class="btn btn-success">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>
