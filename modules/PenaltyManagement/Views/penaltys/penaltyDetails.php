<div class="row">
  <div class="col-md-8 offset-md-2">
    <div class="row">
      <div class="col-md-12">
        <span class="field">Penalty Type</span>
        <span class="field-value"><?= ucfirst($penalty_type[0]['penalty_type']) ?></span>
      </div>
    </div>
        <div class="row">
          <div class="col-md-12">
            <span class="field">Hours</span>
            <span class="field-value"><?= ucfirst($penalty_type[0]['hours']) ?></span>
          </div>
        </div>

            <br>
            <div class="row">
              <div class="col-md-3 offset-8">
                 <?php
                user_edit_link('penalty_type','edit-penalty_type', $permissions, $penalty_type[0]['id']);
                ?>
                <!-- <?php if(user_link('add-penalty_type', $_SESSION['userPermmissions'])): ?>
                <a class="btn btn-outline-dark btn-sm" title="edit" href="<?= base_url() ?>penalty_type/edit/<?= $penalty_type['id'] ?>"><i class="far fa-edit"></i></a>
                <?php endif; ?> -->
              </div>
            penalty_type
          </div>
        </div>
        <br>
