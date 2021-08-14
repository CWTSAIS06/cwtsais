<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="shortcut icon" href="<?= base_url() ?>/public/img/logooff.png" type="image/x-icon">

		<script src=" <?= base_url() ?>/public/js1/jquery-3.3.1.min.js"></script>
		<script src=" <?= base_url() ?>/public/js1/popper.min.js"></script>
		<script src=" <?= base_url() ?>/public/js1/bootstrap.min.js"></script>
		<script src=" <?= base_url() ?>/public/js1/main.js"></script>
		<script src="<?= base_url() ?>/public/js/sweetalert2@9.js"></script>
		<script src="<?= base_url() ?>/public/js/myAlerts.js"></script>

		<!-- custom css  -->
		<link rel="stylesheet" href="<?= base_url() ?>/public/custom-css/signup.css">
		<title>CWTS-AIS PUPT</title>
	</head>
	<body id="signup_page">
		<div id="sign_up_content">
			<div id="signup_container">
				<div class="left">
					<img src="public/images/cover.jpg" class="left_bg" alt="">
					<img src="public/img/logooff.png" class="left_logo">
				</div>
				<div class="right">
					<form action="<?= base_url("Registration") ?>" method="post">
						<div class="form_header">
							<p class="title">Sign up to <span>CWTS-AIS</span></p>
							<p class="label">Please fill in the fields below.</p>
						</div>
						<?php if(isset($_SESSION['error_login'])): ?>
							<div class="error_message"><?= $_SESSION['error_login']; ?></div>
						<?php endif; ?>
						<!-- student number  -->
						<div class="form_group">
							<p class="form_label">Student Number *</p>
							<input  name="stud_num" type="text" autocomplete="off"  value="<?= isset($rec['stud_num']) ? $rec['stud_num'] : set_value('stud_num') ?>" class="input_container <?= isset($errors['stud_num']) ? 'is-invalid':' ' ?>" placeholder="####-#####-TG-#" id="stud_num"  maxlength='15'>
							<?php if (isset($errors['stud_num'])): ?>
								<div class="text_danger">
									<?= $errors['stud_num']?>
								</div>
							<?php endif; ?>
						</div>
						<!-- first name & lastname  -->
						<div class="form_row">
							<div class="form_group">
								<p class="form_label">First Name *</p>
								<input name="firstname" type="text" autocomplete="off" value="<?= isset($rec['firstname']) ? $rec['firstname'] : set_value('firstname') ?>" class="input_container <?= isset($errors['firstname']) ? 'is-invalid':' ' ?>" id="firstname" placeholder="First Name">
								<?php if (isset($errors['firstname'])): ?>
									<div class="text_danger">
										<?= $errors['firstname']?>
									</div>
								<?php endif; ?>
							</div>
							<div class="form_group">
								<p class="form_label">Last Name *</p>
								<input name="lastname" type="text" autocomplete="off" value="<?= isset($rec['lastname']) ? $rec['lastname'] : set_value('lastname') ?>" class="input_container <?= isset($errors['lastname']) ? 'is-invalid':' ' ?>" id="lastname" placeholder="Last Name">
								<?php if (isset($errors['lastname'])): ?>
									<div class="text_danger">
										<?= $errors['lastname']?>
									</div>
								<?php endif; ?>
							</div>
						</div>
						<!-- email & username  -->
						<div class="form_row">
							<div class="form_group">
								<p class="form_label">Email *</p>
								<input name="email" type="email" autocomplete="off" value="<?= isset($rec['email']) ? $rec['email'] : set_value('email') ?>" class="input_container <?= isset($errors['email']) ? 'is-invalid':' ' ?>" id="email" placeholder="Email">
								<?php if (isset($errors['email'])): ?>
									<div class="text_danger">
										<?= $errors['email']?>
									</div>
								<?php endif; ?>
							</div>
							<!-- <div class="form_group">
								<p class="form_label">Username *</p>
								<input name="username" type="text" autocomplete="off" value="<?= isset($rec['username']) ? $rec['username'] : set_value('username') ?>" class="input_container <?= isset($errors['username']) ? 'is-invalid':' ' ?>" id="username" placeholder="Username">
								<?php if (isset($errors['username'])): ?>
									<div class="text_danger">
										<?= $errors['username']?>
									</div>
								<?php endif; ?>
							</div> -->
							
							<div class="form_group">
								<p class="form_label">Password *</p>
								<input name="password" type="password" autocomplete="off" value="<?= isset($rec['password']) ? $rec['password'] : set_value('password') ?>" class="input_container <?= isset($errors['password']) ? 'is-invalid':' ' ?>" id="password" placeholder="Password">
								<?php if (isset($errors['password'])): ?>
									<div class="text_danger">
										<?= $errors['password']?>
									</div>
								<?php endif; ?>
							</div>
						</div>
						<!-- password  -->
						<div class="form_row">
						
							<div class="form_group">
								<p class="form_label">Re-type Password *</p>
								<input name="password_retype" type="password" autocomplete="off" value="<?= isset($rec['password_retype']) ? $rec['password_retype'] : set_value('password_retype') ?>" class="input_container <?= isset($errors['password_retype']) ? 'is-invalid':' ' ?>" id="password_retype" placeholder="Re-type Password">
								<?php if (isset($errors['password_retype'])): ?>
									<div class="text_danger">
										<?= $errors['password_retype']?>
									</div>
								<?php endif; ?>
							</div>
						</div>
						<div class="form_footer">
							<button type="submit" class="submit_button">Sign up</button>
							<div class="already_have">
								<span>Already have an account? <a href="<?= base_url("student")?>"> Log in here</a></span>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
	<script type="text/javascript" src="<?= base_url();?>public/js/inputmask.min.js"></script>
	<script type="text/javascript" src="<?= base_url();?>public/js/inputmask.extensions.min.js"></script>
	<script type="text/javascript">
		$(function(){
			var inputmask = new Inputmask("9999-99999-TG-9");
			inputmask.mask($('[id*=stud_num]'));
			$('[id*=stud_num]').on('keypress', function (e) {
				var number = $(this).val();
				if (number.length == 2) {
					$(this).val($(this).val() + '-');
				}
				else if (number.length == 7) {
					$(this).val($(this).val() + '-');
				}
			});
			setTimeout(function(){
				$('.alert').hide();
			},5000);
		});
	</script>
</html>
