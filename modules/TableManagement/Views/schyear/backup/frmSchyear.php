<hr>
<div class="row">
  <div class="col-md-12">
    <div class="card border-success" style="border-radius: 0px;">
      <div class="card-body">
      <form action="<?= base_url() ?>schyear/<?= isset($rec) ? 'edit/'.$rec['id'] : 'add' ?>" method="post">
        <div class="row">
          <div class="col-md-3">
          </div>
          <div class="col-md-6">
              <label class="card-title"><h3><?= $function_title?></h3></label>
          </div>
          <div class="col-md-3">
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <div class="row">
                <div class="col-md-8">
                  <label for="penalty">School Year</label>
                </div>
                <div class="col-md-4">
                </div>
              </div>
              <input type="text" class="form-control" name="schyear" value="<?= isset($rec['schyear']) ? $rec['schyear'] : ''?>" id="schyear" placeholder="School Year">
              <?php if (isset($errors['schyear'])): ?>
                <div class="text-danger">
                    <?= $errors['schyear']?>
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-md-3">
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
          </div>
          <div class="col-md-6">
            <button type="submit" class="btn btn-success float-right" style="width:40%;"><i class="fas fa-paper-plane"></i> Submit</button>
          </div>
          <div class="col-md-3">
          </div>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
<br>
