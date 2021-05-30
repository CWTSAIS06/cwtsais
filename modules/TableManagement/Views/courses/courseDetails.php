<div class="row">
  <div class="col-md-8 offset-md-2">
    <div class="row">
      <div class="col-md-12">
        <span class="field">Course</span>
        <span class="field-value"><?= ucfirst($course[0]['course']) ?></span>
      </div>
    </div>
        <div class="row">
          <div class="col-md-12">
            <span class="field">Course Description</span>
            <span class="field-value"><?= ucfirst($course[0]['description']) ?></span>
          </div>
        </div>

            <br>
            <div class="row">
              <div class="col-md-3 offset-8">
                 <?php
                user_edit_link('course','edit-course', $permissions, $course[0]['id']);
                ?>
                <!-- <?php if(user_link('add-course', $_SESSION['userPermmissions'])): ?>
                <a class="btn btn-outline-dark btn-sm" title="edit" href="<?= base_url() ?>course/edit/<?= $course['id'] ?>"><i class="far fa-edit"></i></a>
                <?php endif; ?> -->
              </div>
            </div>
          </div>
        </div>
        <br>
