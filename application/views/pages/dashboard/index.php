<style>
  .list-group{
      margin-bottom: 10px;
      overflow:scroll;
      -webkit-overflow-scrolling: touch;
      height: 300px;
  }
</style>
<div class="row">
  <?php if ($this->ion_auth->in_group(array('registrar'))): ?>
  <div class="col-sm-8">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Current Enrolled Student</h5>
        <h6 class="card-subtitle">School Year : <?php echo $school_year['name']; ?></h6>
        <canvas class="my-4 w-100" id="myChart"></canvas>
      </div>
    </div>
  </div>
  <?php endif; ?>
  <?php if ($this->ion_auth->in_group(array('admissions'))): ?>
  <div class="col-sm-8">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Current Enrolled Student</h5>
        <h6 class="card-subtitle">School Year : <?php echo $school_year['name']; ?></h6>
        <canvas class="my-4 w-100" id="myChart"></canvas>
      </div>
    </div>
  </div>
  <?php endif; ?>
  <?php if ($this->ion_auth->in_group(array('admin'))): ?>
  <div class="col-sm-8">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Current Enrolled Student</h5>
        <h6 class="card-subtitle">School Year : <?php echo $school_year['name']; ?></h6>
        <canvas class="my-4 w-100" id="myChart"></canvas>
      </div>
    </div>
  </div>
  <?php endif; ?>
  <?php if ($this->ion_auth->in_group(array('student'))): ?>
  <div class="col-sm-8">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><?php echo $user['fullname']; ?></h5>
        <h6 class="card-subtitle">School Year : <?php echo $school_year['name']; ?></h6>
      </div>
    </div>
    <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>School Year: <span class="text-success"><?php echo $scheduleMaster['sYearName']; ?></span></th>
                    <th>Department: <span class="text-success"><?php echo $scheduleMaster['sDeptName']; ?></span></th>
                </tr>
                <tr>
                    <th>Grade Level: <span class="text-success"><?php echo $scheduleMaster['sGradeName']; ?></span></th>
                    <th>Section: <span class="text-success"><?php echo $scheduleMaster['sSectionName']; ?></span></th>
                </tr>
            </table>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Time Slot</th>
                        <th>Day</th>
                        <th>Teacher</th>
                        <th>Room</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($scheduleClasses) > 0): ?>
                    <?php foreach($scheduleClasses as $row): ?>
                    <tr>
                        <td><?php echo $row['subjectName']; ?></td>
                        <td><?php echo $row['timeSlot']; ?></td>
                        <td><?php foreach($row['daysAsArray'] as $day){ echo $day . ', '; } ?></td>
                        <td>
                            <a href="<?php echo site_url('teacher/details/' . $row['teacher_id']); ?>">
                                <?php echo strtoupper(implode('', array($row['tlname'].', ', $row['tfname']))); ?>
                            </a>
                        </td>
                        <td><?php echo $row['room_id']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <tr><td colspan="5" class="text-center">No Schedule Class Found.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <hr>
        <h3>Student Credentials</h3>
        <div class="table-responsive">
          <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Document Type</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php if(count($credentials) > 0): ?>
                        <?php foreach($credentials as $item):
                        
                            $format[1] = 'PDF Format';
                            $format[2] = 'Docx Format';
                            $format[3] = 'Hard Copy';
                            
                            $credential_doc_type = $format[$item['document_type']];
                        ?>
                            <tr>
                                <td><?php echo $item['credential_name']; ?></td>
                                <td><?php echo $item['credential_description']; ?></td>
                                <td><?php echo $credential_doc_type; ?></td>
                                <td><?php echo $item['remarks']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                            <?php else: ?>
                            <tr><td colspan="5" class="text-center">No Credentials Found.</td></tr>
                            <?php endif; ?>
                        
                    </tbody>
                </table>
        </div>
  </div>
  <?php endif; ?>
  <div class="col-sm-4">
    <h5 class="card-title"><i class="fas fa-bullhorn"></i> Announcements</h5>
    <div class="list-group list-group-flush">

      <?php if(count($announcements) > 0): ?>
      <?php foreach($announcements as $item): ?>
        <a href="#" data-toggle="modal" data-target="#mdViewAnnouncement-<?php echo md5($item['id']); ?>" class="list-group-item list-group-item-action flex-column align-items-start">
          <div class="d-flex w-100 justify-content-between">
            <h6 class="mb-1"><?php echo $item['title']; ?></h6>
            <small><?php echo date('M d, Y', strtotime($item['date_start'])); ?></small>
          </div>
          <p class="mb-1"><?php echo word_limiter($item['message'], 5); ?></p>
          <!-- <small>Donec id elit non mi porta.</small> -->
        </a>

        <div class="modal fade" id="mdViewAnnouncement-<?php echo md5($item['id']); ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header"><h4 class="modal-title">Announcement Details</h4></div>
              <div class="modal-body">
                <h5><?php echo $item['title']; ?></h5>
                <p><?php echo $item['message']; ?></p>
              </div>
              <div class="modal-footer">
                <button class="btn btn-primary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <?php else: ?>
      <h5>no announcement</h5>
      <?php endif; ?>
    </div>
    <br>
    <h5 class="card-title"><i class="fas fa-award"></i> Events</h5>
    <div class="list-group list-group-flush">
      <?php if(count($events) > 0): ?>
      <?php foreach($events as $item): ?>
        <a href="#" data-toggle="modal" data-target="#mdViewEvent-<?php echo md5($item['id']); ?>" class="list-group-item list-group-item-action flex-column align-items-start">
          <div class="d-flex w-100 justify-content-between">
            <h6 class="mb-1"><?php echo $item['title']; ?></h6>
            <small><?php echo date('M d, Y', strtotime($item['date_start'])); ?></small>
          </div>
          <p class="mb-1"><?php echo word_limiter($item['message'], 5); ?></p>
        </a>
        <div class="modal fade" id="mdViewEvent-<?php echo md5($item['id']); ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header"><h4 class="modal-title">Event Details</h4></div>
              <div class="modal-body">
                <h5><?php echo $item['title']; ?></h5>
                <p><?php echo $item['message']; ?></p>
              </div>
              <div class="modal-footer">
                <button class="btn btn-primary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <?php else: ?>
      <h5>no Event</h5>
      <?php endif; ?>
    </div>
  </div>
</div>
<script src="<?php echo site_url('assets/libs/node_modules/chart.js/dist/Chart.min.js'); ?>"></script>
<script>
  var ctx = document.getElementById("myChart");
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
      datasets: [{
        data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
        lineTension: 0,
        backgroundColor: 'transparent',
        borderColor: '#007bff',
        borderWidth: 4,
        pointBackgroundColor: '#007bff'
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: false
          }
        }]
      },
      legend: {
        display: false,
      }
    }
  });

  $(function() {
    $('.ui-newsticker').newsticker();
  });
</script>


	<script>
	var randomScalingFactor = function() {
		return Math.ceil(Math.random() * 10.0) * Math.pow(10, Math.ceil(Math.random() * 5));
	};

	var config = {
		type: 'line',
		data: {
			labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
			datasets: [{
				label: 'My First dataset',
				backgroundColor: window.chartColors.red,
				borderColor: window.chartColors.red,
				fill: false,
				data: [
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor()
				],
			}, {
				label: 'My Second dataset',
				backgroundColor: window.chartColors.blue,
				borderColor: window.chartColors.blue,
				fill: false,
				data: [
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor()
				],
			}]
		},
		options: {
			responsive: true,
			title: {
				display: true,
				text: 'Chart.js Line Chart - Logarithmic'
			},
			scales: {
				xAxes: [{
					display: true,
				}],
				yAxes: [{
					display: true,
					type: 'logarithmic',
				}]
			}
		}
	};

	window.onload = function() {
		var ctx = document.getElementById('canvas').getContext('2d');
		window.myLine = new Chart(ctx, config);
	};

	document.getElementById('randomizeData').addEventListener('click', function() {
		config.data.datasets.forEach(function(dataset) {
			dataset.data = dataset.data.map(function() {
				return randomScalingFactor();
			});

		});

		window.myLine.update();
	});
	</script>