<div class="row">
  <div class="col-md-5">
    <br>
  </div>
  <div class="container">

  </div>
  <div class="col-md-2 offset-md-10">
    <br>
    <!-- <?php if(user_link('add-student', $_SESSION['userPermmissions'])): ?>
    <a href="<?= base_url() ?>enroll/add" class="btn btn-sm btn-success btn-block float-right">Enroll Student</a>
  <?php endif; ?> -->
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
       <th>Full Name</th>
       <th>Course</th>
       <th>Subject</th>
       <th>required hours</th>
       <th>accumulated hours</th>
     </tr>
   </thead>
   <tbody>
     <?php $cnt = 1; ?>
     <?php foreach($students as $student): ?>
     <tr id="<?php echo $student['id']; ?>">
       <th scope="row"><?= $cnt++ ?></th>
       <td><?= ucwords($student['stud_num']) ?></td>
       <td><?= ucwords($student['lastname']) . ', ' . ucwords($student['firstname']) ?></td>
       <td><?= ucwords($student['course']) ?></td>
       <td><?= ucwords($student['subject']) ?></td>
       <td><?= ucwords($student['required_hrs'])?> </td>
       <td><?= ucwords($student['accumulated_hrs'])?> </td>
     </tr>
     <?php endforeach; ?>
   </tbody>
 </table>
</div>
<hr>
