<br><div class="card bg-light ">
  <div class="card-body">
     <div class="row">
       <div class="col-md-10">
         <h3> <?=$function_title?> </h3>
       </div>
     </div>
    <br>
    <div class="row">
      <div class="col-md-12">
        <form action="<?= base_url() ?>student/edit_profile/<?= $student['id']?>" method="post">
          <div class="row">
            <div class="col-md-5 offset-md-1">
              <div class="form-group">
                <label for="stud_num">Student Number</label>
                <input name="stud_num" type="text" autocomplete="off" value="<?= isset($student['stud_num']) ? $student['stud_num'] : set_value('stud_num') ?>" class="form-control <?= isset($errors['stud_num']) ? 'is-invalid':' ' ?>" id="stud_num" placeholder="####-#####-TG-#">
                  <?php if(isset($errors['stud_num'])): ?>
                    <div class="invalid-feedback">
                      <?= $errors['stud_num'] ?>
                    </div>
                  <?php endif; ?>
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label for="birthdate">Birth Date</label>
                <input name="birthdate" type="date" autocomplete="off" value="<?= isset($student['birthdate']) ? $student['birthdate'] : set_value('birthdate') ?>" class="form-control <?= isset($errors['birthdate']) ? 'is-invalid':' ' ?>" id="birthdate">
                  <?php if(isset($errors['birthdate'])): ?>
                    <div class="invalid-feedback">
                      <?= $errors['birthdate'] ?>
                    </div>
                  <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-5 offset-md-1">
              <div class="form-group">
                <label for="firstname">First Name</label>
                <input name="firstname" type="text" value="<?= isset($student['firstname']) ? $student['firstname'] : set_value('firstname') ?>" class="form-control <?= isset($errors['firstname']) ? 'is-invalid':' ' ?>" id="firstname" placeholder="First Name">
                  <?php if(isset($errors['firstname'])): ?>
                    <div class="invalid-feedback">
                      <?= $errors['firstname'] ?>
                    </div>
                  <?php endif; ?>
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label for="lastname">Last Name</label>
                <input name="lastname" type="text" value="<?= isset($student['lastname']) ? $student['lastname'] : set_value('lastname') ?>" class="form-control <?= isset($errors['lastname']) ? 'is-invalid':' ' ?>" id="lastname" placeholder="Last Name">
                  <?php if(isset($errors['lastname'])): ?>
                    <div class="invalid-feedback">
                      <?= $errors['lastname'] ?>
                    </div>
                  <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-5 offset-md-1">
              <div class="form-group">
                <label for="middlename">Middle Name</label>
                <input name="middlename" type="text" value="<?= isset($student['middlename']) ? $student['middlename']: set_value('middlename') ?>" class="form-control <?= isset($errors['middlename']) ? 'is-invalid':' ' ?>" id="middlename" placeholder="Middle Name(Optional)">
                  <?php if(isset($errors['middlename'])): ?>
                    <div class="invalid-feedback">
                      <?= $errors['middlename'] ?>
                    </div>
                  <?php endif; ?>
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label for="gender">Gender</label>
                <select name="gender" value="<?= isset($student['gender']) ? '' : set_value('gender') ?>" class="form-control <?= isset($errors['gender']) ? 'is-invalid':' ' ?>" id="gender" placeholder="Select Gender">
                  <?php if(isset($student['gender'])): ?>
                    <option value="" disabled selected>Select Gender</option>
                    <option value="1" <?= ($student['gender'] == 1) ? 'selected':'' ?>>Male</option>
                    <option value="2"<?= ($student['gender'] == 2) ? 'selected':'' ?>>Female</option>
                  <?php endif; ?>
                </select>
                <?php if(isset($errors['gender'])): ?>
                   <div class="invalid-feedback">
                     <?= $errors['gender'] ?>
                   </div>
                 <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-5 offset-md-1">
              <div class="form-group">
                <label for="address">Address</label>
                <input name="address" type="text" value="<?= isset($student['address']) ? $student['address']: set_value('address') ?>" class="form-control <?= isset($errors['address']) ? 'is-invalid':' ' ?>" id="address" placeholder="Address">
                  <?php if(isset($errors['address'])): ?>
                    <div class="invalid-feedback">
                      <?= $errors['address'] ?>
                    </div>
                  <?php endif; ?>
              </div>
            </div>
        <div class="col-md-5">
          <div class="form-group">
            <label for="contact_no">Contact Number</label>
            <input name="contact_no" type="text" value="<?= isset($student['contact_no']) ? $student['contact_no'] : set_value('contact_no') ?>" class="form-control <?= isset($errors['contact_no']) ? 'is-invalid':' ' ?>" id="contact_no" placeholder="Contact #">
              <?php if(isset($errors['contact_no'])): ?>
                <div class="invalid-feedback">
                  <?= $errors['contact_no'] ?>
                </div>
              <?php endif; ?>
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-md-5 offset-md-1">
                <label for="course_id">Course</label>
                <select name="course_id" id="course_id" class="form-control <?= isset($errors['course_id']) ? 'is-invalid':' ' ?>">
                  <option value="" disabled selected>Select Course</option>
                  <?php foreach($course as $course): ?>
                    <option value="<?= $course['id'] ?>" <?=   ($course['id'] == $student['course_id']) ? 'selected':'' ?>><?= ucwords($course['course']) ?> - <?= ucwords($course['description'])?></option>
                  <?php endforeach; ?>
                </select>
                 <?php if(isset($errors['course_id'])): ?>
                    <div class="invalid-feedback">
                      <?= $errors['course_id'] ?>
                    </div>
                  <?php endif; ?>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label for="email">Email Address</label>
                <input name="email" type="text" value="<?= isset($student['email']) ? $student['email'] : set_value('email') ?>" class="form-control <?= isset($errors['email']) ? 'is-invalid':' ' ?>" id="email" placeholder="email">
                  <?php if(isset($errors['email'])): ?>
                    <div class="invalid-feedback">
                      <?= $errors['email'] ?>
                    </div>
                  <?php endif; ?>
              </div>
            </div>
        </div>

          <div class="row">
            <div class="col-md-5 offset-md-1">
                <div class="form-group">
                  <label for="section">Year & Section</label>
                  <select name="section" id="section" class="form-control <?= isset($errors['section']) ? 'is-invalid':' ' ?>" id="section" placeholder="Select Year & Section">
                  <?php if(isset($sections)):?>
                    <?php  foreach($sections as $section):?>
                    <option value="<?= $section['year_id'];?>-<?= $section['id'];?>" <?= ($section['year_id'] == $student['year_id']) ? 'selected':''?>> <?=$section['year'];?> - <?= $section['section']; ?></option>
                    <?php endforeach;?>
                  <?php endif;?>
                  </select>
                  <?php if(isset($errors['section'])): ?>
                    <div class="invalid-feedback">
                      <?= $errors['section'] ?>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          <button type="submit" class="btn btn-success float-right">Update</button>
        </form>
        <p style="clear: both"></p>
      </div>
    </div>
    </div>
    </div>

    <script src="<?= base_url() ?>/public/plugins/jquery/jquery.min.js"></script>
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
     
    });
      $("#course_id").on('change', function(){
      var course_id = $("#course_id :selected").val();
      var option = " ";

        $.ajax({
          url: "<?= base_url("student/getSections"); ?>",
          type:"GET",
          dataType: "JSON",
          data:{ course_id:course_id},
          success:function(response){
            option = " ";
            response.forEach(function(data){
              option += "<option value='"+data.year_id+'-'+data.id+"'>" + data.year + '-' + data.section + '</option>';
            });
            $('#section').html(option);

          }
        });

      });
    </script>
