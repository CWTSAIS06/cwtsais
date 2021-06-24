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
        <form action="<?= base_url() ?>penalty/<?= isset($rec) ? 'edit/'.$rec['id'] : 'add' ?>" method="post">
          <div class="row">
            <div class="col-md-6 offset-md-3">
              <div class="form-group">
                <label for="student">Student</label>
                <select class="form-control  selectpicker<?= isset($errors['student']) ? 'is-invalid':' ' ?>" name="enrollment_id"  data-live-search="true">
                  <?php foreach ($students as $student): ?>
                    <?php if (isset($rec)): ?>
                      <option value="<?=$student['id']?>" <?= $rec['enrollment_id'] == $student['id'] ? 'selected' : ''?>><?=$student['firstname'] . ' ' . $student['lastname']?></option>
                    <?php else: ?>
                      <option value="<?=$student['id']?>"><?=$student['firstname'] . ' ' . $student['lastname']?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
                  <?php if (isset($errors['student'])): ?>
                    <div class="invalid-feedback">
                      <?= $errors['student'] ?>
                    </div>
                  <?php endif; ?>
              </div>
            </div>
            </div>
            <div class="row">
            <div class="col-md-6 offset-md-3">
              <div class="form-group">
                <label for="date">Date</label>
                <input value="<?=isset($rec['date']) ? date('Y-m-d', strtotime($rec['date'])): ''?>" type="date" class="form-control  <?= isset($errors['date']) ? 'is-invalid':' ' ?>" id="description" name="date" placeholder="Date">
                  <?php if (isset($errors['date'])): ?>
                    <div class="invalid-feedback">
                      <?= $errors['date'] ?>
                    </div>
                  <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 offset-md-3">
              <div class="form-group">
                <label for="reason">Reason</label>
                <select id="reason" class="form-control <?= isset($errors['reason']) ? 'is-invalid':' ' ?>" name="reason" >
                  <option selected disabled>Please Select Reason</option>
                  <?php foreach ($penaltys as $penalty): ?>
                      <option value="<?=$penalty['id']?>" data-hour="<?= $penalty['hours']?>" <?= $rec['reason'] == $penalty['id'] ? 'selected' : ''?>><?=$penalty['penalty'];?></option>
                  <?php endforeach; ?>
                </select>
                <?php if (isset($errors['reason'])): ?>
                    <div class="invalid-feedback">
                      <?= $errors['reason'] ?>
                    </div>
                  <?php endif; ?>
            </div>
              </div>
             
          </div>

          <div class="row">
            <div class="col-md-6 offset-md-3">
              <div class="form-group">
                <label for="hours">Hours</label>
                <input id="hours" value="<?=isset($rec['hours']) ? $rec['hours']: ''?>" type="number" class="form-control <?= isset($errors['hours']) ? 'is-invalid':' ' ?>" name="hours" placeholder="Hours" readonly>
                  <?php if (isset($errors['hours'])): ?>
                    <div class="invalid-feedback">
                      <?= $errors['hours'] ?>
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

<script>
$('#reason').change(function(){
  $('#hours').val($(this).find(':selected').data('hour'));
});
</script>
