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
		<link rel="stylesheet" href="<?= base_url('') ?>/public/custom-css/login.css">
		<title>CWTS-AIS PUPT</title>
	</head>
	<style>
		.text_danger{
			color:red
		}
	</style>
	<body id="login_page">
		<div id="login_container">
			<div class="left">
				<img src="public/images/cover.jpg" class="left_bg" alt="">
				<img src="public/img/logooff.png" class="left_logo">
			</div>
			<div class="right">
				<div class="form_container">
					<form action="<?= base_url('forgot-password') ?>" method="post">
						<div class="form_header">
							<p class="title">Forgot Password </p>
							<p class="label">Please Enter Your Email on your account.</p>
						</div>
						<div class="form_group">
							<p class="form_label">Email</p>
							<input type="text" name="email" class="input_container is-invalid" placeholder="Your Email" id="email" >
						</div>
						<?php if (isset($errors['email'])): ?>
							<div class="text_danger">
								<?= $errors['email']?>
							</div>
						<?php endif; ?>
						<div class="form_footer">
							<button type="submit" class="submit_button">Send</button>
							<div class="sign_up">
								<span>New on our platform? <a href="<?= base_url("Registration")?>"> Create an account</a></span>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
	<?php if(isset($_SESSION["success"])): ?>
		<script type="text/javascript">
			alert_success('<?= $_SESSION["success"]; ?>');
		</script>
	<?php endif; ?>

	<?php if(isset($_SESSION["error"])): ?>
		<script type="text/javascript">
			alert_error('<?= $_SESSION["error"]; ?>');
		</script>
	<?php endif; ?>
	<script type="text/javascript">
		$(function(){
			setTimeout(function(){
				$('.alert').hide();
			},5000);
		});
	</script>
</html>
