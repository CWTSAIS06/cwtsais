<div class="row">
  <div class="col-md-8 offset-md-2">
    <div class="row">
      <div class="col-md-12">
        <span class="field">Schyear</span>
        <span class="field-value"><?= ucfirst($schyear[0]['schyear']) ?></span>
      </div>
    </div>
            <br>
            <div class="row">
              <div class="col-md-3 offset-8">
                <?php
               user_edit_link('schyear','edit-schyear', $permissions, $schyear[0]['id']);
               ?>
              </div>
            </div>
          </div>
        </div>
        <br>
