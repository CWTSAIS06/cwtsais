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
    <link rel="stylesheet" href="<?= base_url() ?>/public/css1/style.css">

    <script src=" <?= base_url() ?>/public/js1/jquery-3.3.1.min.js"></script>
    <script src=" <?= base_url() ?>/public/js1/popper.min.js"></script>
    <script src=" <?= base_url() ?>/public/js1/bootstrap.min.js"></script>
    <script src=" <?= base_url() ?>/public/js1/main.js"></script>

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
                <h3>Sign Up to <strong>CWTS-AIS</strong></h3>
                <p class="mb-4">Civic Welfare Training Service Attendance & Information System</p>
                <?php if(isset($_SESSION['error_login'])): ?>
                  <div class="alert alert-danger"><?= $_SESSION['error_login']; ?></div>
                <?php endif; ?>
              </center>
              <form action="<?= base_url("Registration") ?>" method="post">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="final-quantity" class="form-group">
                            <label>Student Number*</label>
                            <input placeholder="####-#####-TG-#" type="text" class="form-control" name="stud_num">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div id="final-quantity" class="form-group">
                            <label>First Name*</label>
                            <input placeholder="First Name" type="text" class="form-control" name="firstname">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div id="final-quantity" class="form-group">
                            <label>Last Name*</label>
                            <input placeholder="Last Name" type="text" class="form-control" name="lastname">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div id="final-quantity" class="form-group">
                            <label>Email*</label>
                            <input placeholder="Email" type="text" class="form-control" name="email">
                        </div>
                    </div>

       
                    <div class="col-sm-6">
                        <div id="final-quantity" class="form-group">
                            <label>Username*</label>
                            <input placeholder="Username" type="text" class="form-control" name="username">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div id="final-quantity" class="form-group">
                            <label>Password*</label>
                            <input placeholder="Password" type="text" class="form-control" name="password">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div id="final-quantity" class="form-group">
                            <label>Re-type Password*</label>
                            <input placeholder="Re-type Password" type="text" class="form-control" name="password_retype">
                        </div>
                    </div>

                    
                    
                </div>
                <input type="submit" value="Submit" class="btn btn-block btn-dark" style="background-color:#4d0000;">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>

  <script type="text/javascript">
    $(function(){
      setTimeout(function(){
        $('.alert').hide();
      },5000);
    });
  </script>
</html>
