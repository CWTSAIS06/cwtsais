<div class="row">
  <div class="col-md-5">
    <br>
    <form class="" action="<?= base_url(). 'announcement' ?>" method="get">
      <input placeholder="Search Announcement" style="width:250px;" type="text" name="search" value=""  autocomplete="off">
      <button style="background-color: #4e4f4f; border: 1.5px solid  #4e4f4f; " type="submit"><i style="color: #ffffff; " class="fas fa-search"></i></button>
    </form>
  </div>
  <div class="container">

  </div>
  <div class="col-md-2 offset-md-10">
    <br>
    <?php user_add_link('announcement', $_SESSION['userPermmissions']) ?>
  </div>
</div>
<br>
 <?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>
<div class="table-responsive">
  <table class="table table-bordered index-table">
   <thead class="thead-dark">
     <tr class="text-center">
       <th>#</th>
       <th>Announcement</th>
       <th>Description</th>
       <th>Speaker(Optional)</th>
       <th>Date</th>
       <th>Action</th>
     </tr>
   </thead>
   <tbody>
     <?php $cnt = 1; ?>
     <?php foreach($announcement as $announcement): ?>
     <tr id="<?php echo $announcement['id']; ?>">
       <th scope="row"><?= $cnt++ ?></th>
       <td><?= ucwords($announcement['announcement']) ?></td>
       <td><?= ucwords($announcement['description']) ?></td>
       <td><?= ucwords($announcement['speaker']) ?></td>
       <td><?= ucwords($announcement['announcement_date']) ?></td>
       <td class="text-center">
      <?php  users_action('announcement', $_SESSION['userPermmissions'], $announcement['id']); ?>
       </td>
     </tr>
     <?php endforeach; ?>
   </tbody>
 </table>
</div>
<hr>

<div class="row">
 <div class="col-md-6 offset-md-6">
   <?php paginater('announcement', count($all_items), PERPAGE, $offset) ?>
 </div>
</div>
