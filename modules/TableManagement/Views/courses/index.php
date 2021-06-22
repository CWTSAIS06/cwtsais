<div class="row">
  <div class="col-md-5">
    <br>
    <!-- <form class="" action="<?= base_url(). 'course' ?>" method="get">
      <input placeholder="Search Course" style="width:250px;" type="text" name="search" value=""  autocomplete="off">
      <button style="background-color: #4e4f4f; border: 1.5px solid  #4e4f4f; " type="submit"><i style="color: #ffffff; " class="fas fa-search"></i></button>
    </form> -->
  </div>
  <div class="container">

  </div>
  <div class="col-md-2 offset-md-10">
    <br>
    <?php user_add_link('course', $_SESSION['userPermmissions']) ?>
  </div>
</div>
<br>
 <?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>
<div class="table-responsive">
  <table class="table table-bordered index-table"  id="myTable">
   <thead class="thead-dark">
     <tr class="text-center">
       <th>#</th>
       <th>Course</th>
       <th>Course Description</th>
       <th>Status</th>
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
       <td><?= ($course['status'] == 'a') ? 'active':'inactive' ?></td>
       <td class="text-center">
      <!-- <?php  users_edit('course', $_SESSION['userPermmissions'], $course['id']); ?> -->
        <a class="btn btn-success btn-sm" title="edit" href='<?= base_url('course/edit/'.$course['id']); ?>'><i class="far fa-edit"></i></a> 
      <?php if($course['status'] == 'a'):?>
        <a class="btn btn-danger btn-sm remove" onclick=" confirmUpdateStatus('<?= base_urL('course/inactive/')?>',<?=$course['id']?>,'d')" title="deactivate"><i class="fas fa-archive"></i></a>
      <?php else:?>
        <a class="btn btn-info btn-sm remove" onclick=" confirmUpdateStatus('<?= base_urL('course/active/')?>',<?=$course['id']?>,'a')" title="activate"><i class="fas fa-archive"></i></a>
      <?php endif;?>
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
