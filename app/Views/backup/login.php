<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="<?= base_url() ?>/public/img/logooff.png" type="image/x-icon">
    <!-- <link rel="stylesheet" href="<?= base_url() ?>/public/fonts/icomoon/style2.css"> -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/css1/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/css1/bootstrap.min.css">

    <script src=" <?= base_url() ?>/public/js1/jquery-3.3.1.min.js"></script>
    <script src=" <?= base_url() ?>/public/js1/popper.min.js"></script>
    <script src=" <?= base_url() ?>/public/js1/bootstrap.min.js"></script>
    <script src=" <?= base_url() ?>/public/js1/main.js"></script>
    <script src="<?= base_url() ?>/public/js/sweetalert2@9.js"></script>
    <script src="<?= base_url() ?>/public/js/myAlerts.js"></script>

    <title>CWTS-AIS PUPT</title>
  </head>
  <style>
      hr:after {
        content: 'OR';
        display:block;
        text-align:center;
        width:60px;
        margin-top:-13px;
        position:absolute;
        left:50%;
        -webkit-transform: translate(-50%);
        -moz-transform: translate(-50%);
        -ms-transform: translate(-50%);
        -o-transform: translate(-50%);
        transform: translate(-50%);
    }

    a:hover {
    cursor:pointer;
    }
  </style>
  <body>
    <div class="d-lg-flex half">
      <div class="bg order-1 order-md-2" style="background-image: url('public/images/cover.jpg'); opacity:100%;"></div>
      <div class="contents order-2 order-md-1">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-8">
              <center>
                <img src="<?= base_url() ?>/public/img/logooff.png" style="position: static; height: 13%; width: 13%; padding-bottom: 5%;">
                <h3>Sign in to <strong>CWTS-AIS</strong></h3>
                <p class="mb-4">Civic Welfare Training Service Attendance & Information System</p>
                <?php if(isset($_SESSION['error_login'])): ?>
                  <div class="alert alert-danger"><?= $_SESSION['error_login']; ?></div>
                <?php endif; ?>
              </center>
              <form action="<?= base_url() ?> " method="post">
                <div class="form-group first">
                  <label for="username">Username</label>
                  <input type="text" name="username" class="form-control" placeholder="Your Username" id="username">
                </div>
                <div class="form-group last mb-3">
                  <label for="password">Password</label>
                  <input type="password" name="password" class="form-control" placeholder="Your Password" id="password">
                </div>
                <input type="submit" value="Sign In" class="btn btn-block btn-dark" style="background-color:#E1AD01;">
                <hr>
                <a href="<?= base_url("Registration")?>"> <input type="button"  value="Sign Up" class="btn btn-block btn-dark" style="background-color:#4d0000;"> </a>
              </form>
            </div>
           <!--  <div class="col-md-7">
              <img src="<?= base_url() ?>/public/img/logooff.png" id="pup">
              <center><h3>Sign in to <strong>CWTSIS</strong></h3></center>
             <center><p class="mb-4">Civic Welfare Training Service Information System.</p></center>
              <?php if(isset($_SESSION['error_login'])): ?>
              <?= $_SESSION['error_login']; ?>
              </div>
              <?php endif; ?>
              <form action="<?= base_url() ?>" method="post">
                <div class="form-group first">
                  <label for="username">Username</label>
                  <input type="text" autocomplete="off" name="username" class="form-control" placeholder="Your Username" id="username" required>
                </div>
                <div class="form-group last mb-3">
                  <label for="password">Password</label>
                  <input type="password" name="password" class="form-control" placeholder="Your Password" id="password"required>
                </div>
                <input type="submit" value="Sign In" class="btn btn-block btn-dark" style="background-color:#E1AD01;">

              </form>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </body>
  <?php if(isset($_SESSION["success_registered"])): ?>
	<script type="text/javascript">
	    alert_success('<?= $_SESSION["success_registered"]; ?>');
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
