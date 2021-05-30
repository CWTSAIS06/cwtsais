
<br>
  <?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>
  <div class="row">
    <div class="col-md-12">
      <div class="card bg-light ">
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <h5><?= $function_title?></h5>
            </div>
            <div class="col-md-6">
              <?php maintenance_detail_add_link('subjects', $_SESSION['userPermmissions']) ?>
            </div>
          </div>
          <br>
           <div class="table-responsive">
             <table class="table table-sm table-striped table-bordered index-table">
              <thead class="thead-dark">
                <tr class="text-center">
                  <th>#</th>
                  <th>Subject Code</th>
                  <th>Subject</th>
                  <th>Hours</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $cnt = 1; ?>
                <?php foreach($subject as $subjects): ?>
                <tr class="text-center">
                  <th scope="row"><?= $cnt++ ?></th>
                  <td><?= $subjects['code'] ?></td>
                  <td><?= $subjects['subject'] ?></td>
                  <td><?= $subjects['required_hrs'] ?></td>
                  <td class="text-center">
                    <?php
                      maintenance_action('subjects', $_SESSION['userPermmissions'], $subjects['id']);
                    ?>
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
