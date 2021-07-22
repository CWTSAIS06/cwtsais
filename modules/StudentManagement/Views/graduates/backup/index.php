<div class="row">
  <div class="col-md-5">
    <br>
  </div>
  <div class="container">

  </div>
 
</div>
<br>
 <?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>
<div class="table-responsive">
  <table class="table table-bordered" id="graduateTable">
   <thead class="thead-dark">
     <tr class="text-center">
       <th>#</th>
       <th>Student No.</th>
       <th>Full Name</th>
       <th>Course</th>
       <th>Subject</th>
       <th>Required Hours</th>
       <th>Accumulated hours</th>
     </tr>
   </thead>
   <tbody>
     <?php $cnt = 1; ?>
     <?php foreach($graduates as $graduate): ?>
     <tr id="<?php echo $graduate['id']; ?>">
       <th scope="row"><?= $cnt++ ?></th>
       <td><?= ucwords($graduate['stud_num']) ?></td>
       <td><?= ucwords($graduate['lastname']) . ', ' . ucwords($graduate['firstname']) ?></td>
       <td><?= ucwords($graduate['course']) ?></td>
       <td><?= ucwords($graduate['subject']) ?></td>
       <td><?= ucwords($graduate['required_hrs'])?> </td>
       <td><?= ucwords($graduate['accumulated_hrs'])?> </td>
     </tr>
     <?php endforeach; ?>
   </tbody>
 </table>
</div>
<hr>
<script src="<?= base_url();?>public/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf8" src="<?= base_url();?>\public\plugins\datatables-buttons\js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="<?= base_url();?>\public\plugins\datatables-buttons\js/buttons.html5.min.js"></script>

<script>

$(document).ready( function () {
  $('#graduateTable').DataTable({
      "bInfo": false,
        dom: 'lft<"#space">Bip',
              buttons: [
                  'copyHtml5',
                  'excelHtml5',
                  'csvHtml5',
                  'pdfHtml5'
              ]
});
} );

</script>