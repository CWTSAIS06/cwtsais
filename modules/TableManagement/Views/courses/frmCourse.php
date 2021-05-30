<br><div class="card bg-light ">
  <div class="card-body">
     <div class="row">
       <div class="col-md-10">
         <!-- <h3> <?=$function_title?> </h3> -->
       </div>
       <div class="col-md-2">
         <!--  <a href="<?= base_url() ?>node/add" class="btn btn-sm btn-primary btn-block float-right">Add Node</a> -->
       </div>
     </div>
    <br>
    <div class="row">
      <div class="col-md-12">
        <form action="<?= base_url() ?>course/<?= isset($rec) ? 'edit/'.$rec['id'] : 'add' ?>" method="post">
          <div class="row">
            <div class="col-md-5 offset-md-1">
              <div class="form-group">
                <label for="course">Course</label>
                <input name="course" type="text" value="<?= isset($rec['course']) ? $rec['course'] : set_value('course') ?>" class="form-control <?= isset($errors['course']) ? 'is-invalid':' ' ?>" id="course" placeholder="Course">
                  <?php if(isset($errors['course'])): ?>
                    <div class="invalid-feedback">
                      <?= $errors['course'] ?>
                    </div>
                  <?php endif; ?>
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label for="description">Description</label>
                <input name="description" type="text" value="<?= isset($rec['description']) ? $rec['description'] : set_value('description') ?>" class="form-control <?= isset($errors['description']) ? 'is-invalid':' ' ?>" id="description" placeholder="Description">
                  <?php if(isset($errors['description'])): ?>
                    <div class="invalid-feedback">
                      <?= $errors['description'] ?>
                    </div>
                  <?php endif; ?>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary float-right">Submit</button>
        </form>
        <p style="clear: both"></p>
      </div>
    </div>
    </div>
    </div>
