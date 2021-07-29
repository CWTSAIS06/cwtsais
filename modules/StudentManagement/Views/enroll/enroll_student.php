<div class="form_container">
	<div class="row">
		<div class="col-md-12">
			<form action="<?= base_url() ?>enroll/enrolled" method="post">
				<div class="col-md-5 offset-md-1">
					<input name="schyear_id" value="<?= $schyear['id']?>" hidden>
					<input name="student_id" value="<?= $students['id']?>" hidden>
					<input name="stud_num" value="<?= $students['stud_num']?>" hidden>
				</div>
				<div class="row">
					<div class="col-md-5 offset-md-1">
						<div class="form-group">
							<label for="subject">Subject</label>
							<select class="form-control <?= isset($errors['subject_id']) ? 'is-invalid':' ' ?>" name="subject_id">
								<option value="" selected disabled>Please Select Subject</option>
								<?php foreach ($subjects as $subject): ?>
									<option value="<?=$subject['id']?>"><?=$subject['subject']?> (<?= $subject['required_hrs']?> hrs)</option>
								<?php endforeach; ?>
							</select>
							<?php if(isset($errors['subject_id'])): ?>
								<div class="invalid-feedback">
									<?= $errors['subject_id'] ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
					<div class="col-md-5">
						<div class="form-group">
							<label for="day">Day</label>
							<select class="form-control <?= isset($errors['day']) ? 'is-invalid':' ' ?>" name="day">
								<option value="" selected disabled>Please Select Day</option>
								<option value="Monday"> Monday </option>
								<option value="Tuesday"> Tuesday </option>
								<option value="Wednesday"> Wednesday </option>
								<option value="Thursday"> Thursday </option>
								<option value="Friday"> Friday </option>
							</select>
							<?php if(isset($errors['day'])): ?>
								<div class="invalid-feedback">
									<?= $errors['day'] ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-5 offset-md-1">
						<div class="form-group">
							<label for="professor_id">Professor</label>
							<select class="form-control <?= isset($errors['professor_id']) ? 'is-invalid':' ' ?>" name="professor_id">
								<option value="" selected disabled>Please Select Professor</option>
								<?php foreach ($professors as $professor): ?>
									<option value="<?=$professor['id']?>"><?=$professor['firstname']?> <?= $professor['lastname']?></option>
								<?php endforeach; ?>
							</select>
							<?php if(isset($errors['subject_id'])): ?>
								<div class="invalid-feedback">
									<?= $errors['subject_id'] ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
					<div class="col-md-5">
						<div class="form-group">
							<label for="schedule">Schedule</label>
							<select class="form-control <?= isset($errors['schedule']) ? 'is-invalid':' ' ?>" name="schedule">
								<option value="" selected disabled>Please Select Schedule</option>
								<option value="7:30 am,10:30 am"> 7:30 am - 10:30 am </option>
								<option value="10:30 am, 1:30 pm"> 10:30 am - 1:30 pm </option>
								<option value="1:30 pm, 4:30 pm"> 1:30 pm - 4:30 pm </option>
							</select>
							<?php if(isset($errors['schedule'])): ?>
								<div class="invalid-feedback">
									<?= $errors['schedule'] ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="form_submit">
					<button type="submit" class="btn btn-success">Enroll</button>
				</div>
			</form>
		</div>
	</div>
</div>

