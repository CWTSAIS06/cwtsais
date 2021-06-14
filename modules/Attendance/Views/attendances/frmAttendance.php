<div class="row">
  <div class="col-md-10">
  </div>
</div>
<br>
<div class="row mt-5">
  <div class="col-md-4 offset-md-4">
    <form action="<?= base_url() ?>attendance/verify" method="post">
      <div class="form-group">
        <label for="attendance" class="form-label">Student Number</label>
        <br>
        <input name="stud_num" class="form-control" type="text" id="attendance" autocomplete="off" id="stud_num" placeholder="Student Number" required>
        </div>
      </div>
      <div class="col-md-12">
      <?php if($_SESSION['rid'] !== '3'):?> 
        <center>
          <button name="time_in" id="time_in" class="btn btn-success m-3">TIME IN</button>
          <button name="time_out" id="time_out" class="btn btn-success m-3"> TIME OUT</button>
        </center>
      <?php endif;?>
      </div>
    <!-- </form> -->
</div>
<div class="row">
  <div class="col-md-12">
    <h4>
      <center><span id='ct6' class="text-center" style="background-color: #FFFF00"></span></center>
    </h4>
  </div>
</div>
<div class="row">
  <div class="col-md-8 offset-md-2">
    <div class="table-responsive">
      <table class="table table-bordered" id="myTable">
        <thead class="thead-dark text-center">
          <tr>
            <th>Student Number</th>
            <th>Name</th>
            <th>Date</th>
            <th>Time In</th>
            <th>Time Out</th>
            <th>Total Time</th>
            <th>Subject</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($attendances as $attendance): ?>
            <tr>
              <td><?=$attendance['stud_num']?></td>
              <td><?=$attendance['lastname'] . ', ' . $attendance['firstname'] . ' ' . $attendance['middlename']?></td>
              <td><?=date('M d, Y', strtotime($attendance['date']))?></td>
              <td><?=date('h:i A', strtotime($attendance['timein']))?></td>
              <td><?=$attendance['timeout'] == null ? 'N/A' : date('h:i A', strtotime($attendance['timeout']))?></td>
              <td><?=$attendance['timeout'] == null ? 'N/A' : number_format((float)(abs(strtotime($attendance['timein']) - strtotime($attendance['timeout'])) / 60) / 60, 2, '.', '') . ' hrs'?></td>
              <td><?=$attendance['subject']?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<script>

console.log('')
</script>
