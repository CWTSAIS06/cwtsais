<div class="row">
  <div class="col-md-8 offset-md-2">
    <div class="row">
      <div class="col-md-12">
        <span class="field">Subject</span>
        <span class="field-value"><?= ucfirst($subject[0]['subject']) ?></span>
      </div>
    </div>
        <div class="row">
          <div class="col-md-12">
            <span class="field">Subject Hours</span>
            <span class="field-value"><?= ucfirst($subject[0]['subj_hours']) ?></span>
          </div>
        </div>

            <br>
            <div class="row">
              <div class="col-md-3 offset-8">
                 <?php
                user_edit_link('subject','edit-subject', $permissions, $subject[0]['id']);
                ?>
                <!-- <?php if(user_link('add-subject', $_SESSION['userPermmissions'])): ?>
                <a class="btn btn-outline-dark btn-sm" title="edit" href="<?= base_url() ?>subject/edit/<?= $subject['id'] ?>"><i class="far fa-edit"></i></a>
                <?php endif; ?> -->
              </div>
            </div>
          </div>
        </div>
        <br>
