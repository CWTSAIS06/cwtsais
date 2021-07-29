<div class="row">
  <div class="cold-md-6 offset-md-3">
      <?php foreach ($students as $student): ?>
      <h5>Personal Info</h5>
      <table>
        <tr>
          <td>Full name: </td>
          <td> <?=$student['lastname'] . ', ' . $student['firstname'] . ' ' . $student['middlename']?></td>
        </tr>
        <tr>
          <td>Course:</td>
          <td><?=$student['course']?></td>
        </tr>
        <tr>
          <td>Address: </td>
          <td><?=$student['address']?></td>
        </tr>
      </table>
    <?php endforeach; ?>
    <br>
    <h5>Enrolled Subject</h5>
    <table class='table'>
      <tr>
        <th>Subject</th>
        <th>Completed Hours</th>
        <th>Required Hours</th>
        <th>Penalty</th>
        <th>Status</th>
      </tr>
      <?php foreach ($enrolls as $enroll): ?>
        <tr>
        
          <td><?= $enroll['subject']?></td>
          <td><?= $enroll['accumulated_hrs']?></td>
          <td><?= $enroll['required_hrs']?></td>
          <td><?= $enroll['penalty']?></td>
          <td><?=$enroll['status'] == 'i' ? 'Incomplete' : 'Complete'?></td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>
</div>
