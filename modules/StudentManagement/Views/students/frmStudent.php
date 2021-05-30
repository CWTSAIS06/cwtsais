<br><div class="card bg-light ">
  <div class="card-body">
     <div class="row">
       <div class="col-md-10">
         <h3> <?=$function_title?> </h3>
       </div>
       <div class="col-md-2">
         <!--  <a href="<?= base_url() ?>node/add" class="btn btn-sm btn-primary btn-block float-right">Add Node</a> -->
       </div>
     </div>
    <br>
    <div class="row">
      <div class="col-md-12">
        <form action="<?= base_url() ?>student/<?= isset($rec) ? 'edit/'.$rec['id'] : 'add' ?>" method="post">
          <div class="row">
            <div class="col-md-5 offset-md-1">
              <div class="form-group">
                <label for="stud_num">Student Number</label>
                <input name="stud_num" type="text" autocomplete="off" value="<?= isset($rec['stud_num']) ? $rec['stud_num'] : set_value('stud_num') ?>" class="form-control <?= isset($errors['stud_num']) ? 'is-invalid':' ' ?>" id="stud_num" placeholder="####-#####-TG-#">
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
                <input name="birthdate" type="date" autocomplete="off" value="<?= isset($rec['birthdate']) ? $rec['birthdate'] : set_value('birthdate') ?>" class="form-control <?= isset($errors['birthdate']) ? 'is-invalid':' ' ?>" id="birthdate">
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
                <input name="firstname" type="text" value="<?= isset($rec['firstname']) ? $rec['firstname'] : set_value('firstname') ?>" class="form-control <?= isset($errors['firstname']) ? 'is-invalid':' ' ?>" id="firstname" placeholder="First Name">
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
                <input name="lastname" type="text" value="<?= isset($rec['lastname']) ? $rec['lastname'] : set_value('lastname') ?>" class="form-control <?= isset($errors['lastname']) ? 'is-invalid':' ' ?>" id="lastname" placeholder="Last Name">
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
                <input name="middlename" type="text" value="<?= isset($rec['middlename']) ? '': set_value('middlename') ?>" class="form-control <?= isset($errors['middlename']) ? 'is-invalid':' ' ?>" id="middlename" placeholder="Middle Name(Optional)">
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
                <select name="gender" value="<?= isset($rec['gender']) ? '' : set_value('gender') ?>" class="form-control <?= isset($errors['gender']) ? 'is-invalid':' ' ?>" id="gender" placeholder="Select Gender">
                  <?php if(isset($rec['gender'])): ?>
                    <option value="<?= $rec['gender'] ?>"><?= name_on_system($rec['gender'], $gender, 'gender') ?></option>
                  <?php else: ?>
                    <option value="">Select Gender</option>
                  <?php endif; ?>
                    <option value="Male"> Male </option>
                    <option value="Female"> Female </option>
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
                <input name="address" type="text" value="<?= isset($rec['address']) ? '': set_value('address') ?>" class="form-control <?= isset($errors['address']) ? 'is-invalid':' ' ?>" id="address" placeholder="Address">
                  <?php if(isset($errors['address'])): ?>
                    <div class="invalid-feedback">
                      <?= $errors['address'] ?>
                    </div>
                  <?php endif; ?>
              </div>
            </div>
        <div class="col-md-5">
          <div class="form-group">
            <label for="contact_num">Contact Number</label>
            <input name="contact_num" type="text" value="<?= isset($rec['contact_num']) ? $rec['contact_num'] : set_value('contact_num') ?>" class="form-control <?= isset($errors['contact_num']) ? 'is-invalid':' ' ?>" id="contact_num" placeholder="Contact #">
              <?php if(isset($errors['contact_num'])): ?>
                <div class="invalid-feedback">
                  <?= $errors['contact_num'] ?>
                </div>
              <?php endif; ?>
          </div>
        </div>
        </div>
        <div class="row">
            <div class="col-md-5 offset-md-1">
              <div class="form-group">
                <label for="section">Year & Section</label>
                <select name="section" value="<?= isset($rec['section']) ? '' : set_value('section') ?>" class="form-control <?= isset($errors['section']) ? 'is-invalid':' ' ?>" id="section" placeholder="Select Year & Section">
                  <?php if(isset($rec['section'])): ?>
                    <option value="<?= $rec['section'] ?>"><?= name_on_system($rec['section'], $section, 'section') ?></option>
                  <?php else: ?>
                    <option value="">Year & Section</option>
                  <?php endif; ?>
                    <option value="1-1"> 1-1 </option>
                    <option value="1-2"> 1-2 </option>
                    <option value="2-1"> 2-1 </option>
                    <option value="2-2"> 2-2 </option>
                    <option value="3-1"> 3-1 </option>
                    <option value="3-2"> 3-2 </option>
                    <option value="4-1"> 4-1 </option>
                    <option value="5-1"> 5-1 </option>
                </select>
                <?php if(isset($errors['section'])): ?>
                   <div class="invalid-feedback">
                     <?= $errors['section'] ?>
                   </div>
                 <?php endif; ?>
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label for="email">Email Address</label>
                <input name="email" type="text" value="<?= isset($rec['email']) ? $rec['email'] : set_value('email') ?>" class="form-control <?= isset($errors['email']) ? 'is-invalid':' ' ?>" id="email" placeholder="email">
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
                <label for="guardian_name">Guardian/Parent Name</label>
                <input name="guardian_name" type="text" value="<?= isset($rec['guardian_name']) ? $rec['guardian_name'] : set_value('guardian_name') ?>" class="form-control <?= isset($errors['guardian_name']) ? 'is-invalid':' ' ?>" id="guardian_name" placeholder="Guardian/Parent Name">
                  <?php if(isset($errors['guardian_name'])): ?>
                    <div class="invalid-feedback">
                      <?= $errors['guardian_name'] ?>
                    </div>
                  <?php endif; ?>
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label for="guardian_contactnum">Guardian/Parent Contact #</label>
                <input name="guardian_contactnum" type="text" value="<?= isset($rec['guardian_contactnum']) ? $rec['guardian_contactnum'] : set_value('guardian_contactnum') ?>" class="form-control <?= isset($errors['guardian_contactnum']) ? 'is-invalid':' ' ?>" id="guardian_contactnum" placeholder="Guardian/Parent Contact #">
                  <?php if(isset($errors['guardian_contactnum'])): ?>
                    <div class="invalid-feedback">
                      <?= $errors['guardian_contactnum'] ?>
                    </div>
                  <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-5 offset-md-1">
                <label for="course_id">Course</label>
                <select name="course_id" class="form-control <?= isset($errors['course_id']) ? 'is-invalid':' ' ?>">
                  <?php if(isset($rec['course_id'])): ?>
                    <option value="<?= $rec['course_id'] ?>"><?= name_on_system($rec['course_id'], $course, 'course') ?></option>
                  <?php else: ?>
                    <option value="">Select Course</option>
                  <?php endif; ?>

                  <?php foreach($course as $course): ?>
                    <option value="<?= $course['id'] ?>"><?= ucwords($course['course']) ?></option>
                  <?php endforeach; ?>
                </select>
                 <?php if(isset($errors['course_id'])): ?>
                    <div class="invalid-feedback">
                      <?= $errors['course_id'] ?>
                    </div>
                  <?php endif; ?>
              </div>
            <div class="col-md-5">
              <label for="schyear_id">User Role</label>
              <select name="schyear_id" class="form-control <?= isset($errors['schyear_id']) ? 'is-invalid':' ' ?>">
                <?php if(isset($rec['schyear_id'])): ?>
                  <option value="<?= $rec['schyear_id'] ?>"><?= name_on_system($rec['schyear_id'], $schyear, 'schyear') ?></option>
                <?php else: ?>
                  <option value="">Select School Year</option>
                <?php endif; ?>

                <?php foreach($schyear as $schyear): ?>
                  <option value="<?= $schyear['id'] ?>"><?= ucwords($schyear['schyear']) ?></option>
                <?php endforeach; ?>
              </select>
               <?php if(isset($errors['schyear_id'])): ?>
                  <div class="invalid-feedback">
                    <?= $errors['schyear_id'] ?>
                  </div>
                <?php endif; ?>
            </div>
          </div>
          <button type="submit" class="btn btn-success float-right">Submit</button>
        </form>
        <p style="clear: both"></p>
      </div>
    </div>
    </div>
    </div>
