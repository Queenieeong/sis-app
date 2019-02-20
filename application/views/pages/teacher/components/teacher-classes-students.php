<div class="row">
  <div class="col-lg-12">
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th colspan="2">Details</th>
          </tr>
          <tr>
            <th colspan="2">
              <ul>
                <li>Grade Level: <?php echo $class_details['school_grade_level_name']; ?></li>
                <li>Section: <?php echo $class_details['school_section_name']; ?></li>
                <li>Subject: <?php echo $class_details['subject_name']; ?></li>
              </ul>
            </th>
          </tr>
          <tr>
            <th colspan="2">List of student</th>
          </tr>
          <tr>
            <th class="text-center">Student Number</th>
            <th class="text-center">Student Fullname</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($class_students as $student):  ?>
          <tr>
            <td class="text-center"><?php echo $student['student_number']; ?></td>
            <td class="text-center"><?php echo implode(' ', array($student['student_last_name'], $student['student_first_name'], $student['student_middle_name'])); ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>