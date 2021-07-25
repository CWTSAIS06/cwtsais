<div class="form_container">
	<div class="row">
		<div class="col-md-12">
			<form action="<?= base_url() ?>penalty/<?= isset($rec) ? 'edit/'.$rec['id'] : 'add' ?>" method="post">
				<div class="row">
					<div class="col-md-6 offset-md-3">
						<div class="form-group">
							<label for="student">Student</label>
							<select class="form-control  selectpicker<?= isset($errors['student']) ? 'is-invalid':' ' ?>" name="enrollment_id"  data-live-search="true">
								<?php foreach ($students as $student): ?>
									<?php if (isset($rec)): ?>
										<option value="<?=$student['id']?>" <?= $rec['enrollment_id'] == $student['id'] ? 'selected' : ''?>><?=$student['firstname'] . ' ' . $student['lastname']?></option>
									<?php else: ?>
										<option value="<?=$student['id']?>"><?=$student['firstname'] . ' ' . $student['lastname']?></option>
									<?php endif; ?>
								<?php endforeach; ?>
							</select>
							<?php if (isset($errors['student'])): ?>
								<div class="invalid-feedback">
									<?= $errors['student'] ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 offset-md-3">
						<div class="form-group">
							<label for="date">Date</label>
							<input value="<?=isset($rec['date']) ? date('Y-m-d', strtotime($rec['date'])): ''?>" type="date" class="form-control  <?= isset($errors['date']) ? 'is-invalid':' ' ?>" id="description" name="date" placeholder="Date">
							<?php if (isset($errors['date'])): ?>
								<div class="invalid-feedback">
									<?= $errors['date'] ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 offset-md-3">
						<div class="form-group">
							<label for="reason">Reason</label>
							<select id="reason" class="form-control <?= isset($errors['reason']) ? 'is-invalid':' ' ?>" name="reason" >
								<option selected disabled>Please Select Reason</option>
								<?php foreach ($penaltys as $penalty): ?>
									<option value="<?=$penalty['id']?>" data-hour="<?= $penalty['hours']?>" <?= $rec['reason'] == $penalty['id'] ? 'selected' : ''?>><?=$penalty['penalty'];?></option>
								<?php endforeach; ?>
								<option value="0" <?= (!empty($rec['reason'])) ? ($rec['reason'] == 0) ?? 'selected':'' ?> id="others"> Other reason</option> 
							</select>
							<?php if (isset($errors['reason'])): ?>
								<div class="invalid-feedback">
									<?= $errors['reason'] ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="row" id="other-row">
					<div class="col-md-6 offset-md-3">
						<div class="form-group">
							<label for="other_reason">Other reason</label>
							<input id="other_reason" value="<?=isset($rec['other_reason']) ? $rec['other_reason']: ''?>" type="text" class="form-control <?= isset($errors['other_reason']) ? 'is-invalid':' ' ?>"  name="other_reason" placeholder="Other Reason" >
							<?php if (isset($errors['other_reason'])): ?>
								<div class="invalid-feedback">
									<?= $errors['other_reason'] ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 offset-md-3">
						<div class="form-group">
							<label for="hours">Hours</label>
							<input id="hours" value="<?=isset($rec['hours']) ? $rec['hours']: ''?>" type="number" class="form-control <?= isset($errors['hours']) ? 'is-invalid':' ' ?>" name="hours" placeholder="Hours" readonly>
							<?php if (isset($errors['hours'])): ?>
								<div class="invalid-feedback">
									<?= $errors['hours'] ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="form_submit">
					<button type="reset" class="btn btn-secondary back_button">
						<a href="<?= base_url() ?>penalty">
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
$(document).ready(function(){
	$('#other-row').hide();

	$(document).on('change','#reason',function(){
		console.log(this.value)
		if(this.value == 0){
			$('#other-row').show();
			$('#hours').removeAttr('readonly');
			$('#hours').val('');

		}else{
			$('#other-row').hide();
			$('#other_reason').val('');
			$('#hours').prop('readonly',true);
			$('#hours').val($(this).find(':selected').data('hour'));
		}
	});
});
	

</script>
