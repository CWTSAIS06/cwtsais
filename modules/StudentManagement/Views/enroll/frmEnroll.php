<div class="row">
  <div class="col-md-10">
  </div>
  <div class="col-md-2">
  </div>
</div>
<br>
<div class="row">
 <div class="col-md-12">
   <form action="<?= base_url() ?>enroll/add" method="post">
     <div class="col-md-5 offset-md-1">
       <div class="form-group">
         <label for="stud_id">Student Number</label>
         <input list="students" class="form-control" multiple name="stud_id" placeholder="Student" required>
          <datalist id="students">
            <?php foreach ($students as $student): ?>
              <option value="<?=$student['stud_num']?>"><?=$student['firstname']?><option>
            <?php endforeach; ?>
          </datalist>
           <?php if(isset($errors['stud_id'])): ?>
             <div class="invalid-feedback">
               <?= isset($errors['stud_id']) ?>
             </div>
           <?php endif; ?>
       </div>
     </div>
     <div class="col-md-5 offset-md-1">
       <div class="form-group">
         <label for="subject">Subject</label>
         <select class="form-control" name="subject">
           <?php foreach ($subjects as $subject): ?>
             <option value="<?=$subject['id']?>"><?=$subject['subject']?></option>
           <?php endforeach; ?>
         </select>
       </div>
     </div>
     <div class="col-md-2 offset-md-4">
       <button type="submit" class="btn btn-primary float-right">Submit</button>
     </div>
   </form>
   <p style="clear: both"></p>
 </div>
</div>
