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
                            <input name="stud_num" type="text" autocomplete="off"  value="<?= isset($rec['stud_num']) ? $rec['stud_num'] : set_value('stud_num') ?>" class="form-control <?= isset($errors['stud_num']) ? 'is-invalid':' ' ?>" placeholder="####-#####-TG-#" id="stud_num"  maxlength='15'>
                            <?php if (isset($errors['stud_num'])): ?>
                          <div class="text-danger">
                              <?= $errors['stud_num']?>
                          </div>
                        <?php endif; ?>
                        </div>
                       
                    </div>

                    <div class="col-sm-6">
                        <div id="final-quantity" class="form-group">
                            <label>First Name*</label>
                            <input name="firstname" type="text" value="<?= isset($rec['firstname']) ? $rec['firstname'] : set_value('firstname') ?>" class="form-control <?= isset($errors['firstname']) ? 'is-invalid':' ' ?>" id="firstname" placeholder="First Name">
                            <?php if(isset($errors['firstname'])): ?>
                             <div class="text-danger">
                                <?= $errors['firstname'] ?>
                              </div>
                            <?php endif; ?>
                        </div>
                        
                    </div>

                    <div class="col-sm-6">
                        <div id="final-quantity" class="form-group">
                            <label>Last Name*</label>
                            <input name="lastname" type="text" value="<?= isset($rec['lastname']) ? $rec['lastname'] : set_value('lastname') ?>" class="form-control <?= isset($errors['lastname']) ? 'is-invalid':' ' ?>" id="lastname" placeholder="Last Name">
                            <?php if(isset($errors['lastname'])): ?>
                              <div class="text-danger">
                                <?= $errors['lastname'] ?>
                              </div>
                            <?php endif; ?>
                        </div>
                        
                    </div>

                    <div class="col-sm-6">
                        <div id="final-quantity" class="form-group">
                            <label>Email*</label>
                            <input name="email" type="text" value="<?= isset($rec['email']) ? $rec['email'] : set_value('email') ?>" class="form-control <?= isset($errors['email']) ? 'is-invalid':' ' ?>" id="email" placeholder="Email">
                            <?php if(isset($errors['email'])): ?>
                              <div class="text-danger">
                                <?= $errors['email'] ?>
                              </div>
                            <?php endif; ?>
                        </div>
                       
                    </div>

       
                    <div class="col-sm-6">
                        <div id="final-quantity" class="form-group">
                            <label>Username*</label>
                            <input name="username" type="text" autocomplete="off" value="<?= isset($rec['username']) ? $rec['username'] : set_value('username') ?>" class="form-control <?= isset($errors['username']) ? 'is-invalid':' ' ?>" id="username" placeholder="Username">
                            <?php if(isset($errors['username'])): ?>
                              <div class="text-danger">
                                <?= $errors['username'] ?>
                              </div>
                            <?php endif; ?>
                        </div>
                       
                    </div>

                    <div class="col-sm-6">
                        <div id="final-quantity" class="form-group">
                            <label>Password*</label>
                            <input name="password" type="text" autocomplete="off" value="<?= isset($rec['password']) ? $rec['password'] : set_value('password') ?>" class="form-control <?= isset($errors['password']) ? 'is-invalid':' ' ?>" id="password" placeholder="Password">
                            <?php if(isset($errors['password'])): ?>
                              <div class="text-danger">
                                <?= $errors['password'] ?>
                              </div>
                            <?php endif; ?>
                        </div>
                        
                    </div>

                    <div class="col-sm-6">
                        <div id="final-quantity" class="form-group">
                            <label>Re-type Password*</label>
                            <input name="password_retype" type="text" autocomplete="off" value="<?= isset($rec['password_retype']) ? $rec['password_retype'] : set_value('password_retype') ?>" class="form-control <?= isset($errors['password_retype']) ? 'is-invalid':' ' ?>" id="password_retype" placeholder="Password Re-type">
                            <?php if(isset($errors['password_retype'])): ?>
                              <div class="text-danger">
                                <?= $errors['password_retype'] ?>
                              </div>
                            <?php endif; ?>
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
