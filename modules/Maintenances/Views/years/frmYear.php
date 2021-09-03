<div class="form_container">
	<div class="row">
		<div class="col-md-12">
			<form action="<?= base_url() ?>years/<?= isset($rec) ? 'edit/'.$rec['id'] : 'add' ?>" method="post">
				<div class="row">
					<div class="col-md-6 offset-md-3">
						<div class="form-group">
							<label for="course">Course</label>
							<select class="form-control <?= isset($errors['course_id']) ? 'is-invalid':' ' ?>" name="course_id" id="course_id">
								<option disabled selected> Please Select Course </option>
								<?php foreach($courses as $course):?>
									<option value="<?= $course['id']?>" <?= ($course['id'] == $rec['course_id']) ? 'selected':'' ?>> <?= $course['course']?> - <?= $course['description'] ?></option>
								<?php endforeach; ?>
							</select>
							<?php if (isset($errors['course_id'])): ?>
								<div class="text-danger">
									<?= $errors['course_id']?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="row" <?= isset($rec) ? 'hidden' : '' ?>>
					<div class="col-md-6 offset-md-3">
						<div class="form-group">
							<label for="year">Year</label>
							<select class="form-control <?= isset($errors['year']) ? 'is-invalid':' ' ?>"  name="year" id="year">
								<option disabled selected> Please Select Year </option>
								<option value="1"> 1st Year </option>
								<option value="2"> 2nd Year </option>
								<option value="3"> 3rd Year </option>
								<option value="4"> 4th Year </option>
								<option value="5"> 5th Year </option>
							</select>
							<?php if (isset($errors['year'])): ?>
								<div class="text-danger">
									<?= $errors['year']?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="row" <?= isset($rec) ? 'hidden' : '' ?>>
					<div class="col-md-6 offset-md-3">
						<div class="form-group">
							<label for="how_many">How many section(s)</label>
							<input type="text" class="form-control <?= isset($errors['section']) ? 'is-invalid':' ' ?>" name="section"  value="<?= isset($rec['section']) ? $rec['section'] : ''?>" id="section" min="1" max="5" maxlength="1" oninput="this.value=this.value.replace(/[^1-5]/g,'');" placeholder="Section">
							<?php if (isset($errors['section'])): ?>
								<div class="text-danger">
									<?= $errors['section']?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="form_submit">
					<button type="reset" class="btn btn-secondary back_button">
						<a href="<?= base_url() ?>years">
							Cancel
						</a>
					</button>
					<button type="submit" class="btn btn-success">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>

</script>
