<div class="row">
  <div class="col-md-10">

  </div>
  <div class="col-md-2">

</div>
<br>
<div class="row">
 <div class="col-md-12">
   <form action="<?= base_url() ?>attendance/verify<?= isset($rec) ? 'edit/'.$rec['id'] : 'add' ?>" method="post">

                 <div class="row">
                   <div class="col-md-6 offset-md-3">
                     <div class="form-group">
                       <label for="attendance">Attendance</label>
                       <input name="attendance" type="text"  autocomplete="off" value="<?= isset($rec['attendance']) ? $rec['attendance'] : set_value('attendance') ?>" class="form-control <?= $errors['attendance'] ? 'is-invalid':'is-valid' ?>" id="attendance" placeholder="Attendance">
                         <?php if($errors['attendance']): ?>
                           <div class="invalid-feedback">
                             <?= $errors['attendance'] ?>
                           </div>
                         <?php endif; ?>
                     </div>
                   </div>
                 </div>
                 <div class="row">
                   <div class="col-md-6 offset-md-3">
                     <button type="submit" class="btn btn-primary float-right">LOG IN</button>
                   </div>
                 </div>
               </form>
               <p style="clear: both"></p>
             </div>
            </div>
