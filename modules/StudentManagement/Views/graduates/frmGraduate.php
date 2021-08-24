<div class="form_container">
	<div class="row">
		<div class="col-md-12">
			<form action="<?= base_url() ?>graduates/<?= isset($rec) ? 'edit/'.$rec['id'] : 'add' ?>" method="post">
				<div class="row">
					<div class="col-md-6 offset-md-3">
						<div class="form-group">
							<label for="serial_num">Serial No.</label>
							<input name="serial_num"  class="form-control <?= isset($errors['serial_num']) ? 'is-invalid':' ' ?>" value="<?= $rec['serial_num'] ? $rec['serial_num']:''?>"> 
							<?php if (isset($errors['serial_num'])): ?>
								<div class="invalid-feedback">
									<?= $errors['serial_num'] ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
		
				<div class="form_submit">
					<button type="reset" class="btn btn-secondary back_button">
						<a href="<?= base_url() ?>graduates">
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

});
	

</script>
