<div class="row">
  <div class="col-md-5">
    <br>
  </div>
  <div class="container">

  </div>
  <div class="col-md-2 offset-md-10">
    <br>
    <?php if(user_link('add-student', $_SESSION['userPermmissions'])): ?>
    <a href="<?= base_url() ?>student/add" class="btn btn-sm btn-success btn-block float-right">Add Student</a>
  <?php endif; ?>
  </div>
</div>
<br>
 <?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>
<div class="table-responsive">
  <table class="table table-bordered" id="myTable">
   <thead class="thead-dark">
     <tr class="text-center">
       <th>#</th>
       <th>Student No.</th>
       <th>Name</th>
       <th>Course</th>
       <th>School Year</th>
       <th>Action</th>
     </tr>
   </thead>
   <tbody>
     <?php $cnt = 1; ?>
     <?php foreach($student as $student): ?>
     <tr id="<?php echo $student['id']; ?>">
       <th scope="row"><?= $cnt++ ?></th>
       <td><?= ucwords($student['stud_num']) ?></td>
       <td><?= ucwords($student['lastname']). ', ' . ucwords($student['firstname']) ?></td>
       <td><?= ucwords($student['course']) ?></td>
       <td><?= ucwords($student['schyear']) ?></td>
       <td class="text-center">
      <?php  users_action('student', $_SESSION['userPermmissions'], $student['id']); ?>
       </td>
     </tr>
     <?php endforeach; ?>
   </tbody>
 </table>
</div>
<hr>
