
<br>
  <?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>
  <div class="row">
    <div class="col-md-12">
      <div class="card bg-light ">
        <div class="card-body">
          <div class="row">
            <!-- <div class="col-md-6">
              <h5> Year & Section</h5>
            </div> -->
            <div class="col-md-2 offset-md-10">
            <a href="<?= base_url(); ?>years/add" class="btn btn-sm btn-success btn-block float-left"><i class="fas fa-plus"></i>    Add Year & Section</a>
            </div>
          </div>
          <br>
           <div class="table-responsive">
             <table class="table table-sm table-striped table-bordered index-table"  id="myTable">
              <thead class="thead-dark">
                <tr class="text-center">
                  <th>#</th>
                  <th>Course</th>
                  <th>Year & Section</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $cnt = 1; ?>
                <?php foreach($years as $year): ?>
                <tr class="text-center">
                  <th scope="row"><?= $cnt++ ?></th>

                  <td><?= $year['course']?></td>
                  <td><?= $year['year']?> - <?= $year['section']?></td>
                  <td><?= ($year['status'] == 'a') ? 'active':'deactivated'?></td>


                  <td class="text-center">
                    <!-- <?php
                      maintenance_action('years', $_SESSION['userPermmissions'], $years['id']);
                    ?> -->
                    <!-- <a class="btn btn-success btn-sm" title="edit" href='<?= base_url('years/edit/'.$year['year_id']); ?>'><i class="far fa-edit"></i></a>  -->

                    <?php if($year['status'] == 'a'):?>
                      <a class="btn btn-danger btn-sm remove" onclick=" confirmUpdateStatus('<?= base_urL('years/delete/')?>',<?=$year['id']?>,'d')" title="deactivate"><i class="fas fa-archive"></i></a>
                    <?php else:?>
                      <a class="btn btn-info btn-sm remove" onclick=" confirmUpdateStatus('<?= base_urL('years/active/')?>',<?=$year['id']?>,'a')" title="activate"><i class="fas fa-archive"></i></a>
                    <?php endif;?>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
           </div>
          </div>
       </div>
    </div>
  </div>
<script>

</script>
