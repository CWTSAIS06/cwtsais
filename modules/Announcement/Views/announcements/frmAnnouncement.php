Announcement<div class="row">
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
   <form action="<?= base_url() ?>announcement/<?= isset($rec) ? 'edit/'.$rec['id'] : 'add' ?>" method="post">

                 <div class="row">
                   <div class="col-md-6 offset-md-3">
                     <div class="form-group">
                       <label for="announcement">Announcement</label>
                       <input name="announcement" type="text"  autocomplete="off" value="<?= isset($rec['announcement']) ? $rec['announcement'] : set_value('announcement') ?>" class="form-control <?= $errors['announcement'] ? 'is-invalid':'is-valid' ?>" id="announcement" placeholder="Announcement">
                         <?php if($errors['announcement']): ?>
                           <div class="invalid-feedback">
                             <?= $errors['announcement'] ?>
                           </div>
                         <?php endif; ?>
                     </div>
                   </div>
                 </div>
                 <div class="row">
                   <div class="col-md-6 offset-md-3">
                     <div class="form-group">
                       <label for="description">Description</label>
                       <input name="description" type="text"  autocomplete="off" value="<?= isset($rec['description']) ? $rec['description'] : set_value('description') ?>" class="form-control <?= $errors['description'] ? 'is-invalid':'is-valid' ?>" id="description" placeholder="Description">
                         <?php if($errors['description']): ?>
                           <div class="invalid-feedback">
                             <?= $errors['description'] ?>
                           </div>
                         <?php endif; ?>
                     </div>
                   </div>
                 </div>
                 <div class="row">
                   <div class="col-md-6 offset-md-3">
                     <div class="form-group">
                       <label for="speaker">Speaker(Optional)</label>
                       <input name="speaker" type="text"  autocomplete="off" value="<?= isset($rec['speaker']) ? $rec['speaker'] : set_value('speaker') ?>" class="form-control <?= $errors['speaker'] ? 'is-invalid':'is-valid' ?>" id="speaker" placeholder="Speaker (Optional)">
                         <?php if($errors['speaker']): ?>
                           <div class="invalid-feedback">
                             <?= $errors['speaker'] ?>
                           </div>
                         <?php endif; ?>
                     </div>
                   </div>
                 </div>
                 <div class="row">
                   <div class="col-md-6 offset-md-3">
                     <div class="form-group">
                       <label for="date">Date</label>
                       <input name="date" type="date"  autocomplete="off" value="<?= isset($rec['date']) ? $rec['date'] : set_value('date') ?>" class="form-control <?= $errors['date'] ? 'is-invalid':'is-valid' ?>" id="date" placeholder="Date">
                         <?php if($errors['announcement']): ?>
                           <div class="invalid-feedback">
                             <?= $errors['announcement'] ?>
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
