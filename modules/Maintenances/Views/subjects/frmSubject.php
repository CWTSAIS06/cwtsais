<div class="form_container">
	<div class="row">
		<div class="col-md-12">
			<form action="<?= base_url() ?>subjects/<?= isset($rec) ? 'edit/'.$rec['id'] : 'add' ?>" method="post">
				<div class="row">
					<div class="col-md-6 offset-md-3">
						<div class="form-group">
							<label for="code">Subject Code</label>
							<input type="text" class="form-control <?= isset($errors['code']) ? 'is-invalid':' ' ?>" name="code" value="<?= isset($rec['code']) ? $rec['code'] : ''?>" id="code" placeholder="Subject Code">
							<?php if (isset($errors['code'])): ?>
								<div class="text-danger">
									<?= $errors['code']?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 offset-md-3">
						<div class="form-group">
							<label for="subject">Subject</label>
							<input type="text"  name="subject" class="form-control <?= isset($errors['subject']) ? 'is-invalid':' ' ?>" value="<?= isset($rec['subject']) ? $rec['subject'] : ''?>" id="subject" placeholder="Subject">
							<?php if (isset($errors['subject'])): ?>
								<div class="text-danger">
									<?= $errors['subject']?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 offset-md-3">
						<div class="form-group">
							<label for="hours">Required Hours</label>
							<input type="text" class="form-control <?= isset($errors['required_hrs']) ? 'is-invalid':' ' ?>" name="required_hrs" value="<?= isset($rec['required_hrs']) ? $rec['required_hrs'] : ''?>" id="required_hrs" placeholder="Required Hours">
							<?php if (isset($errors['required_hrs'])): ?>
								<div class="text-danger">
									<?= $errors['required_hrs']?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="form_submit">
					<button type="reset" class="btn btn-secondary back_button">
						<a href="<?= base_url() ?>subjects">
							Cancel
						</a>
					</button>
					<button type="submit" class="btn btn-success">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>
