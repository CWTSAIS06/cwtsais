<div class="row">
  <div class="col-md-10">
  </div>
  <div class="col-md-2">
  </div>
</div>
<br>
<div class="row">
 <div class="col-md-12">
   <form action="<?= base_url() ?>enroll/enrolled" method="post">
     <div class="col-md-5 offset-md-1">
        <input name="schyear_id" value="<?= $schyear['id']?>" hidden>
        <input name="student_id" value="<?= $students['id']?>" hidden>
        <input name="stud_num" value="<?= $students['stud_num']?>" hidden>
     </div>
     <div class="col-md-5 offset-md-1">
       <div class="form-group">
         <label for="subject">Subject</label>
         <select class="form-control" name="subject_id">
           <?php foreach ($subjects as $subject): ?>
             <option value="<?=$subject['id']?>"><?=$subject['subject']?> (<?= $subject['required_hrs']?> hrs)</option>

           <?php endforeach; ?>
         </select>
       </div>
     </div>
     <div class="col-md-2 offset-md-4">
       <button type="submit" class="btn btn-primary float-right">Enroll</button>
     </div>
   </form>
   <p style="clear: both"></p>
 </div>
</div>
