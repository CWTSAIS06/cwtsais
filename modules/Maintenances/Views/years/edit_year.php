<hr>
<?php print_r($rec);?>
<div class="row">
  <div class="col-md-12">
    <div class="card border-success" style="border-radius: 0px;">
      <div class="card-body">
      <form action="<?= base_url() ?>years/<?= isset($rec) ? 'edit/'.$rec['id'] : 'add' ?>" method="post">

      
        <div class="row">
          <div class="col">
            <div class="form-group">
              <div class="row">
                <div class="col-md-8">
                  <label for="year">Course</label>
                </div>
                <div class="col-md-4">
              </div>
            </div>
              <select class="form-control" name="course_id" id="course_id">
                <option disabled selected> Please Select Course </option>
                <?php foreach($courses as $course):?>
                  <option value="<?= $course['id']?>" <?= ($course['id'] == $rec['course_id']) ? 'selected':''?>> <?= $course['course']?> - <?= $course['description'] ?></option>
                <?php endforeach; ?>
              </select>
              <?php if (isset($errors['course_id'])): ?>
                <div class="text-danger">
                    <?= $errors['course_id']?>
                </div>
              <?php endif; ?>
            </div>
          </div> <!-- end of row --> 
  
          <div class="col">
            <div class="form-group">
              <div class="row">
                <div class="col-md-8">
                  <label for="year">Year</label>
                </div>
                <div class="col-md-4">
              </div>
            </div>
            <select class="form-control"  name="year" id="year">
                <option disabled selected> Please Select Year </option>
                <option value="1" <?= ($rec['year'] == 1) ? 'selected':'' ?>> 1st Year </option>
                <option value="2" <?= ($rec['year'] == 2) ? 'selected':'' ?>> 2nd Year </option>
                <option value="3" <?= ($rec['year'] == 3) ? 'selected':'' ?>> 3rd Year </option>
                <option value="4" <?= ($rec['year'] == 4) ? 'selected':'' ?>> 4th Year </option>
                <option value="5" <?= ($rec['year'] == 5) ? 'selected':'' ?>> 5th Year </option>
            </select>
              <?php if (isset($errors['year'])): ?>
                <div class="text-danger">
                    <?= $errors['year']?>
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <div class="row">
                <div class="col-md-8">
                  <label for="year">section</label>
                </div>
                <div class="col-md-4">
              </div>
            </div>
              <input type="text" class="form-control" name="section" value="<?= isset($rec['section']) ? $rec['section'] : ''?>" id="section" placeholder="Section">
              <?php if (isset($errors['section'])): ?>
                <div class="text-danger">
                    <?= $errors['section']?>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div> <!-- end of row --> 
        <div class="row">
          <div class="col-md-6">
          </div>
          <div class="col-md-6">
            <button type="submit" class="btn btn-success float-right" style="width:40%;"><i class="fas fa-paper-plane"></i> Submit</button>
          </div>
          <div class="col-md-3">
          </div>
        </div> <!-- end of row --> 
      </form>
      </div>
    </div>
  </div>
</div>
<br>
