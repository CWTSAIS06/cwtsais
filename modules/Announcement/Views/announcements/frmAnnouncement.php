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
   <form action="<?= base_url() ?>announcement/<?= isset($rec) ? 'edit/'.$rec['id'] : 'add' ?>" method="post">

                 <div class="row">
                   <div class="col-md-6 offset-md-3">
                     <div class="form-group">
                       <label for="event">Announcement</label>
                       <input name="event" type="text"  autocomplete="off" value="<?= isset($rec['event']) ? $rec['event'] : set_value('event') ?>" class="form-control <?= $errors['event'] ? 'is-invalid':'' ?>" id="event" placeholder="Announcement">
                         <?php if($errors['event']): ?>
                           <div class="invalid-feedback">
                             <?= $errors['event'] ?>
                           </div>
                         <?php endif; ?>
                     </div>
                   </div>
                 </div>
                 <div class="row">
                   <div class="col-md-6 offset-md-3">
                     <div class="form-group">
                       <label for="description">Description</label>
                       <input name="description" type="text"  autocomplete="off" value="<?= isset($rec['description']) ? $rec['description'] : set_value('description') ?>" class="form-control <?= $errors['description'] ? 'is-invalid':'' ?>" id="description" placeholder="Description">
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
                       <input name="speaker" type="text"  autocomplete="off" value="<?= isset($rec['speaker']) ? $rec['speaker'] : set_value('speaker') ?>" class="form-control <?= $errors['speaker'] ? 'is-invalid':'' ?>" id="speaker" placeholder="Speaker (Optional)">
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
                       <label for="announcement_date">Date</label>
                       <input name="announcement_date" type="date"  autocomplete="off" value="<?= isset($rec['announcement_date']) ? $rec['announcement_date'] : set_value('announcement_date') ?>" class="form-control <?= $errors['announcement_date'] ? 'is-invalid':'' ?>" id="announcement_date" placeholder="Date">
                         <?php if($errors['announcement_date']): ?>
                           <div class="invalid-feedback">
                             <?= $errors['announcement_date'] ?>
                           </div>
                         <?php endif; ?>
                     </div>
                   </div>
                 </div>

                 <div class="row">
                   <div class="col-md-6 offset-md-3">
                     <div class="form-group">
                       <label for="start_time">Start Time</label>
                       <input name="start_time" type="time"  autocomplete="off" value="<?= isset($rec['start_time']) ? $rec['start_time'] : set_value('start_time') ?>" class="form-control <?= $errors['start_time'] ? 'is-invalid':'' ?>" id="start_time" placeholder="Date">
                         <?php if($errors['start_time']): ?>
                           <div class="invalid-feedback">
                             <?= $errors['start_time'] ?>
                           </div>
                         <?php endif; ?>
                     </div>
                   </div>
                 </div>

                 <div class="row">
                   <div class="col-md-6 offset-md-3">
                     <div class="form-group">
                       <label for="end_time">End Time</label>
                       <input name="end_time" type="time"  autocomplete="off" value="<?= isset($rec['end_time']) ? $rec['end_time'] : set_value('end_time') ?>" class="form-control <?= $errors['end_time'] ? 'is-invalid':'' ?>" id="end_time" placeholder="Date">
                         <?php if($errors['end_time']): ?>
                           <div class="invalid-feedback">
                             <?= $errors['end_time'] ?>
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
