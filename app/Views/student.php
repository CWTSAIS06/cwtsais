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
		<link rel="stylesheet" href="<?= base_url() ?>/public/custom-css/login.css">
		<title>CWTS-AIS PUPT</title>
	</head>
	<body id="login_page">
		<div id="login_container">
			<div class="left">
				<img src="public/images/cover.jpg" class="left_bg" alt="">
				<img src="public/img/logooff.png" class="left_logo">
			</div>
			<div class="right">
				<div class="form_container">
					<form action="<?= base_url('student-login') ?>" method="post">
						<div class="form_header">
							<p class="title">Welcome to <span>CWTS-AIS</span></p>
							<p class="label">Login your student account</p>
						</div>
						<?php if(isset($_SESSION['error_login'])): ?>
							<div class="error_message"><?= $_SESSION['error_login']; ?></div>
						<?php endif; ?>
						<div class="form_group">
							<p class="form_label">Username</p>
							<input type="text" name="username" class="input_container" placeholder="Your Username" id="username" placeholder="">
						</div>
						<div class="form_group">
							<p class="form_label">Password</p>
							<input type="password" name="password" class="input_container" placeholder="Your Password" id="password">
						</div>
						<div class="form_footer">
							<button type="submit" class="submit_button">Log in</button>
							<div class="sign_up">
								<span>New on our platform? <a href="<?= base_url("Registration")?>"> Create an account</a></span>
								<br>
								<span> <a href="<?= base_url("forgot-password")?>"> Forgot Password?</a></span>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
	<?php if(isset($_SESSION["success_registered"])): ?>
		<script type="text/javascript">
			alert_success('<?= $_SESSION["success_registered"]; ?>');
		</script>
	<?php endif; ?>

	<script src="<?= base_url() ?>/public/plugins/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="<?= base_url();?>public/js/inputmask.min.js"></script>
	<script type="text/javascript" src="<?= base_url();?>public/js/inputmask.extensions.min.js"></script>

	<script type="text/javascript">
	

		var inputmask = new Inputmask("9999-99999-TG-9");
			inputmask.mask($('[id*=username]'));
		
		$('[id*=username]').on('keypress', function (e) {
			var number = $(this).val();
			if (number.length == 2) {
				$(this).val($(this).val() + '-');
			}
			else if (number.length == 7) {
				$(this).val($(this).val() + '-');
			}
		});

		$(function(){
			setTimeout(function(){
				$('.alert').hide();
			},5000);
		});
	</script>
</html>
