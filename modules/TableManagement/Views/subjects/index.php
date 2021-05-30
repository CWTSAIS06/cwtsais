<div class="row">
  <div class="col-md-5">
    <br>
    <form class="" action="<?= base_url(). 'subject' ?>" method="get">
      <input placeholder="Search Subject" style="width:250px;" type="text" name="search" value=""  autocomplete="off">
      <button style="background-color: #4e4f4f; border: 1.5px solid  #4e4f4f; " type="submit"><i style="color: #ffffff; " class="fas fa-search"></i></button>
    </form>
  </div>
  <div class="container">

  </div>
  <div class="col-md-2 offset-md-10">
    <br>
    <?php user_add_link('subject', $_SESSION['userPermmissions']) ?>
  </div>
</div>
<br>
 <?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>
<div class="table-responsive">
  <table class="table table-bordered index-table">
   <thead class="thead-dark">
     <tr class="text-center">
       <th>#</th>
       <th>Subject</th>
       <th>Subject Hours</th>
       <th>Action</th>
     </tr>
   </thead>
   <tbody>
     <?php $cnt = 1; ?>
     <?php foreach($subject as $subject): ?>
     <tr id="<?php echo $subject['id']; ?>">
       <th scope="row"><?= $cnt++ ?></th>
       <td><?= ucwords($subject['subjects']) ?></td>
       <td><?= ucwords($subject['subj_hours']) ?></td>
       <td class="text-center">
      <?php  users_action('subject', $_SESSION['userPermmissions'], $subject['id']); ?>
       </td>
     </tr>
     <?php endforeach; ?>
   </tbody>
 </table>
</div>
<hr>

<div class="row">
 <div class="col-md-6 offset-md-6">
   <?php paginater('subject', count($all_items), PERPAGE, $offset) ?>
 </div>
</div>
