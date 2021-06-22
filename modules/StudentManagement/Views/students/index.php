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
       <th>Status</th>
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
       <td><?= ($student['status'] == 'a') ? 'active':'inactive' ?></td>
       <td class="text-center">
      
      <a class="btn btn-dark btn-sm" title="show" href='<?= base_url('student/show/'.$student['id']); ?>'><i class="fas fa-bars"></i></a>
      <a class="btn btn-success btn-sm" title="edit" href='<?= base_url('student/edit/'.$student['id']); ?>'><i class="far fa-edit"></i></a> 
      <?php if($student['status'] == 'a'):?>
        <a class="btn btn-danger btn-sm remove" onclick=" confirmUpdateStatus('<?= base_urL('student/inactive/')?>',<?=$student['id']?>,'d')" title="deactivate"><i class="fas fa-archive"></i></a>
      <?php else:?>
        <a class="btn btn-info btn-sm remove" onclick=" confirmUpdateStatus('<?= base_urL('student/active/')?>',<?=$student['id']?>,'a')" title="activate"><i class="fas fa-archive"></i></a>
      <?php endif;?>
      <!-- <?php  users_action('student', $_SESSION['userPermmissions'], $student['id']); ?> -->
       </td>
     </tr>
     <?php endforeach; ?>
   </tbody>
 </table>
</div>
<hr>
