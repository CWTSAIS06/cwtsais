<hr>
<div class="row">
  <div class="col-md-12">
    <div class="card border-success" style="border-radius: 0px;">
      <div class="card-body">
      <form action="<?= base_url() ?>subjects/<?= isset($rec) ? 'edit/'.$rec['id'] : 'add' ?>" method="post">

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
                <div class="col-md-12">
                  <label for="code">Subject Code</label>
                </div>
            </div>
              <input type="text" class="form-control" name="code" value="<?= isset($rec['code']) ? $rec['code'] : ''?>" id="code" placeholder="Subject Code">
              <?php if (isset($errors['code'])): ?>
                <div class="text-danger">
                    <?= $errors['code']?>
                </div>
              <?php endif; ?>
              <div class="row">
                <div class="col-md-12">
                  <label for="subject">Subject</label>
                </div>
            </div>
              <input type="text" class="form-control" name="subject" value="<?= isset($rec['subject']) ? $rec['subject'] : ''?>" id="subject" placeholder="Subject">
              <?php if (isset($errors['subject'])): ?>
                <div class="text-danger">
                    <?= $errors['subject']?>
                </div>
              <?php endif; ?>
              <div class="row">
                <div class="col-md-12">
                  <label for="required_hrs">Required Hours</label>
                </div>
            </div>
              <input type="text" class="form-control" name="required_hrs" value="<?= isset($rec['required_hrs']) ? $rec['required_hrs'] : ''?>" id="required_hrs" placeholder="Required Hours">
              <?php if (isset($errors['required_hrs'])): ?>
                <div class="text-danger">
                    <?= $errors['required_hrs']?>
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
