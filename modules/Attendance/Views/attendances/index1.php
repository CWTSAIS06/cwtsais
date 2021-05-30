<div class="row">
  <div class="col-md-5">
    <br>
    <form class="" action="<?= base_url(). 'attendance' ?>" method="get">
      <input placeholder="Search Attendance" style="width:250px;" type="text" name="search" value=""  autocomplete="off">
      <button style="background-color: #4e4f4f; border: 1.5px solid  #4e4f4f; " type="submit"><i style="color: #ffffff; " class="fas fa-search"></i></button>
    </form>
  </div>
  <div class="container">

  </div>
  <div class="col-md-2 offset-md-10">
    <br>
    <?php user_add_link('attendance', $_SESSION['userPermmissions']) ?>
  </div>
</div>
<br>
 <?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>
<div class="table-responsive">
  <table class="table table-bordered index-table">
   <thead class="thead-dark">
     <tr class="text-center">
       <th>#</th>
       <th>Attendance</th>
       <th>Attendance</th>
       <th>Action</th>
     </tr>
   </thead>
   <tbody>
     <?php $cnt = 1; ?>
     <?php foreach($course as $course): ?>
     <tr id="<?php echo $course['id']; ?>">
       <th scope="row"><?= $cnt++ ?></th>
       <td><?= ucwords($course['course']) ?></td>
       <td><?= ucwords($course['description']) ?></td>
       <td class="text-center">
      <?php  users_action('course', $_SESSION['userPermmissions'], $course['id']); ?>
       </td>
     </tr>
     <?php endforeach; ?>
   </tbody>
 </table>
</div>
<hr>

<div class="row">
 <div class="col-md-6 offset-md-6">
   <?php paginater('course', count($all_items), PERPAGE, $offset) ?>
 </div>
</div>
