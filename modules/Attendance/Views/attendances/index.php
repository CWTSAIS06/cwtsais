<div class="row">
  <div class="col-md-5">
    <br>
  </div>
  <div class="container">
  </div>
  <div class="col-md-2 offset-md-10">
    <br>
  </div>
</div>
<br>
 <?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>
  <div class="table-responsive">
  <table class="table table-bordered" id="myTable">
   <thead class="thead-dark">
     <tr class="text-center">
       <th>#</th>
       <th>Student Number.</th>
       <th>Time in</th>
       <th>Time out</th>
       <th>Logger</th>
       <th>Subject</th>
       <th>Action</th>
     </tr>
   </thead>
   <tbody>
     <?php $cnt = 1; ?>
     <?php foreach($attendance as $attendance): ?>
     <tr id="<?php echo $attendance['id']; ?>">
       <th scope="row"><?= $cnt++ ?></th>
       <td><?= ucwords($attendance['stud_num']) ?></td>
       <td><?= ucwords($attendance['timein']) ?></td>
       <td><?= ucwords($attendance['timeout']) ?></td>
       <td><?= ucwords($attendance['username']) ?></td>
       <td><?= ucwords($attendance['subject']) ?></td>
       <td class="text-center">
      <?php  users_action('attendance', $_SESSION['userPermmissions'], $attendance['id']); ?>
       </td>
     </tr>
     <?php endforeach; ?>
   </tbody>
 </table>
</div>
<hr>
