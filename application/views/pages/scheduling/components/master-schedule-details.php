<link rel="stylesheet" href="<?php echo site_url('assets/libs/node_modules/fullcalendar/dist/fullcalendar.min.css'); ?>">
<link rel="stylesheet" href="<?php echo site_url('assets/libs/node_modules/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css'); ?>">
<style>
	.modal-timepicker {
		z-index: 1151 !important;
	}

	.no-class {
		background-color: #FFCC33;
	}
	
	.odd {
		background-color: green;
	}

	.even {
		background-color: red;
	}
</style>
<h4>Manage Master Schedule</h4>
<br>
<div class="row">
	<div class="col-sm-3">
		<button class="btn btn-primary" data-toggle="modal" data-target="#addClass"><i class="fas fa-plus"></i> Add Class</button>
		<div class="modal fade" id="addClass" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<form action="<?php echo site_url('scheduling/addClass/' . $scheduleMasterID); ?>" method="post">
						<div class="modal-header"><h4 class="modal-title">Add New Class</h4></div>
						<div class="modal-body">
							<div class="form-group">
								<label for="" class="col-sm-4 control-label">Subject</label>
								<div class="col-sm-8">
									<select name="subject_id" id="subject_id" class="form-control">
										<option value="">Select Subject</option>
										<?php foreach($subjects as $subject): ?>
										<option value="<?php echo $subject['id']; ?>"><?php echo $subject['name']; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-4 control-label">Teacher</label>
								<div class="col-sm-8">
									<select name="teacher_id" id="teacher_id" class="form-control">
										<option value="">Select Teacher</option>
										<?php foreach($teachers as $teacher): ?>
										<option value="<?php echo $teacher['id']; ?>"><?php echo $teacher['full_name']; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-4 control-label">Time Start</label>
								<div class="col-sm-8"><input type="time" name="time_start" class="form-control"></div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-4 control-label">Time End</label>
								<div class="col-sm-8"><input type="time" name="time_end" class="form-control"></div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-4 control-label">Days</label>
								<div class="col-sm-8">
									<input type="checkbox" name="day[MON]">MONDAY <br>
									<input type="checkbox" name="day[TUE]">TUESDAY <br>
									<input type="checkbox" name="day[WED]">WEDNESDAY <br>
									<input type="checkbox" name="day[THU]">THURSDAY <br>
									<input type="checkbox" name="day[FRI]">FRIDAY <br>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button class="btn btn-default" data-dismiss="modal">CANCEL</button>
							<button class="btn btn-primary">SAVE</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<br>
<div class="row">
	<div class="col-sm-4">
			<div class="card">
					<div class="card-body">
							<h5 class="card-title">Master Schedule Details</h5>
							<table class="table table-stripped">
									<tr><td>SCHOOL YEAR</td><td><?php echo $details['sYearName']; ?></td><tr>
									<tr><td>DEPARTMENT</td><td><?php echo $details['sDeptName']; ?></td></tr>
									<tr><td>GRADE LEVEL</td><td><?php echo $details['sGradeName']; ?></td></tr>
									<tr><td>SECTION</td><td><?php echo $details['sSectionName']; ?></td></tr>
									<tr><td>ADVISER</td><td><?php echo $details['adviser_id']; ?></td></tr>
									<tr><td>CAPACITY</td><td><?php echo $details['capacity']; ?></td></tr>
									<tr><td>TOTAL ENROLLED</td><td><?php echo $details['total_enrolled']; ?></td></tr>
									<tr><td>DATE CREATED</td><td><?php echo date('Y-m-d', strtotime($details['date_created'])); ?></td></tr>
									<tr><td>STATUS</td><td><?php echo $details['labelActiveStatus']; ?></td></tr>
									<tr>
											<td colspan="2">
													<a href="" data-toggle="modal" data-target="#subject-reference">
															View Subject Reference
													</a>
											</td>
									</tr>
							</table>
							
					</div>
			</div>
	</div>
	<div class="col-sm-8">
			<div class="table-responsive">
					<table class="table table-bordered table-hover" width="930px;">
							<thead class="thead-dark">
									<tr>
											<th class="text-center" width="300px">TIME PERIOD</th>
											<?php foreach($schoolDays as $schoolDay): ?>
											<th class="text-center" width="300px"><?php echo strtoupper($schoolDay['shortName']); ?></th>
											<?php endforeach; ?>
									</tr>
							</thead>
							<tbody>
									<?php foreach ($classSchedules as $timePeriods): // dump($classSchedule); ?>
									<tr>
											<td class="text-center" width="300px"><?php echo $timePeriods['timeSlot']; ?></td>
											<?php foreach ($schoolDays as $schoolDay): ?>
													<?php $blocker = false; ?>
													<?php foreach ($classSchedules as $class): // dump($schoolDay['shortName']); ?>
															<?php if (in_array(strtoupper($schoolDay['shortName']), $class['daysAsArray']) && ($class['time_start'] == $timePeriods['time_start']) && ($class['time_end'] == $timePeriods['time_end'])): ?>
															<td class="text-center" width="300px">
																	<strong><?php echo $class['subjectName']; ?></strong>
																	<?php $blocker = true; ?>
															</td>
															<?php endif; ?>
													<?php endforeach; ?>

													<?php if ( ! $blocker): ?>
													<td class="no-class" width="300px"></td>
													<?php endif; ?>

											<?php endforeach; ?>
									</tr>
									<?php endforeach; ?>

									<!-- <tr>
											<td class="text-center">09:00 AM to 10:00 AM</td>
											<td class="text-center" colspan="4">MATH Teacher: JOHN DOE</td>
											<td class="text-center schedule-blocked"></td>
											<td class="text-center schedule-blocked"></td>
											<td class="text-center schedule-blocked"></td>
									</tr>
									<tr>
											<td class="text-center">09:00 AM to 10:00 AM</td>
											<td class="text-center schedule-blocked"></td>
											<td class="text-center schedule-blocked"></td>
											<td class="text-center" colspan="2">MATH Teacher: JOHN DOE</td>
											<td class="text-center schedule-blocked"></td>
											<td class="text-center schedule-blocked"></td>
											<td class="text-center schedule-blocked"></td>
									</tr> -->
							</tbody>
					</table>
			</div>
	</div>
</div>
<div class="modal fade" id="subject-reference" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
					<div class="modal-header">
							<h5 class="modal-title">Subject Reference</h5>
					</div>
					<div class="modal-body">
							<ul>
									<?php foreach($subjects as $subject): ?>
									<li><?php echo $subject['name']; ?></li>
									<?php endforeach; ?>
							</ul>
					</div>
					<div class="modal-footer"></div>
			</div>
	</div>
</div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<span id="dateClicked"></span>
				<form>
					<div class="form-group">
						<label class="col-lg-3 col-form-label">TIME START</label>
						<div class="col-lg-8">
							<select name="subject_id" id="subject_id" class="form-control">
								<option value="">Select Subject</option>
								<?php foreach($subjects as $subject): ?>
								<option value="<?php echo $subject['id']; ?>"><?php echo $subject['name']; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-3 col-form-label">TIME START</label>
						<div class="col-lg-8">
							<input type="time" class="form-control" name="time_start" id="time_start">
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-3 col-form-label">TIME END</label>
						<div class="col-lg-8">
							<input type="time" class="form-control" name="time_end" id="time_end">
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
<script src="<?php echo site_url('assets/libs/node_modules/moment/min/moment.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/libs/node_modules/fullcalendar/dist/fullcalendar.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/libs/node_modules/bootstrap-datetimepicker/src/js/bootstrap-datetimepicker.js'); ?>"></script>
<script>
	$(document).ready(function() {
		$("#name").val()
		$("#name").tagsinput({
			trimValue: true,
			Class: 'name'
		})
	});
</script>