<div class="row">
  <div class="col-md-10">
     <!-- search here -->
  </div>
  <div class="col-md-2">
    <!--  <a href="<?= base_url() ?>node/add" class="btn btn-sm btn-primary btn-block float-right">Add Node</a> -->
  </div>
</div>
<br>
<div class="row">
 <div class="col-md-12">
   <form action="<?= base_url() ?>subject/<?= isset($rec) ? 'edit/'.$rec['id'] : 'add' ?>" method="post">

                 <div class="row">
                   <div class="col-md-6 offset-md-3">
                     <div class="form-group">
                       <label for="subjects">Subject</label>
                       <input name="subjects" type="text"  autocomplete="off" value="<?= isset($rec['subjects']) ? $rec['subjects'] : set_value('subjects') ?>" class="form-control <?= $errors['subjects'] ? 'is-invalid':'is-valid' ?>" id="subjects" placeholder="Subject">
                         <?php if($errors['subjects']): ?>
                           <div class="invalid-feedback">
                             <?= $errors['subjects'] ?>
                           </div>
                         <?php endif; ?>
                     </div>
                   </div>
                 </div>

                 <div class="row">
                   <div class="col-md-6 offset-md-3">
                     <div class="form-group">
                       <label for="subj_hours">Subject Hours</label>
                       <input name="subj_hours" type="text"  autocomplete="off" value="<?= isset($rec['subj_hours']) ? $rec['subj_hours'] : set_value('subj_hours') ?>" class="form-control <?= $errors['subj_hours'] ? 'is-invalid':'is-valid' ?>" id="subj_hours" placeholder="Subject Hours">
                         <?php if($errors['subj_hours']): ?>
                           <div class="invalid-feedback">
                             <?= $errors['subj_hours'] ?>
                           </div>
                         <?php endif; ?>
                     </div>
                   </div>
                 </div>


                 <div class="row">
                   <div class="col-md-6 offset-md-3">
                     <button type="submit" class="btn btn-primary float-right">Submit</button>
                   </div>
                 </div>
               </form>
               <p style="clear: both"></p>
             </div>
            </div>
