  <div class="row">
    <div class="cold-md-6 offset-md-3">
        <?php foreach ($students as $student): ?>
          <a href="<?=base_url()?>student/pdf/<?=$student['id']?>" target="_blank">Download as PDF</a>
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
            <td><?=$enroll['subject']?></td>
              <td>
                <?php if (!empty($attendances)): ?>
                  <?php $total = 0; ?>
                  <?php foreach ($attendances as $attendance): ?>
                    <?php if ($attendance['id'] == $enroll['current_id']): ?>
                      <?php $total += number_format((float)(abs(strtotime($attendance['timein']) - strtotime($attendance['timeout'])) / 60) / 60, 2, '.', '') ?>
                    <?php endif; ?>
                  <?php endforeach; ?>
                  <?=$total?>
                <?php else: ?>
                  N/A
                <?php endif; ?>
              </td>
            <td><?=$enroll['required_hrs']?></td>
            <td>
              <?php if (!empty($penalties)): ?>
                <?php foreach ($penalties as $penalty): ?>
                  <?php if ($penalty['id'] == $enroll['current_id']): ?>
                    <?=$penalty['hours']?>
                  <?php else: ?>
                    N/A
                  <?php endif; ?>
                <?php endforeach; ?>
              <?php else: ?>
                N/A
              <?php endif; ?>
            </td>
            <td><?= ($enroll['status'] == 'i') ? 'Incomplete' : 'Complete'?></td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
