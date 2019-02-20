<form method="post" action="<?php echo site_url('teacher/add'); ?>">
	<h4>Personal Information</h4><br>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label">Teacher Name</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" name="teacher[last_name]" placeholder="Last Name" value="<?php echo set_value('last_name'); ?>" required>
			<div class="text-danger"><?php echo form_error('last_name'); ?></div>
		</div>
		<div class="col-sm-3">
			<input type="text" class="form-control" name="teacher[first_name]" placeholder="First Name" value="<?php echo set_value('first_name'); ?>" required>
			<div class="text-danger"><?php echo form_error('first_name'); ?></div>
		</div>
		<div class="col-sm-2">
			<input type="text" class="form-control" name="teacher[middle_name]" placeholder="Middle Name" value="<?php echo set_value('middle_name'); ?>">
			<div class="text-danger"><?php echo form_error('middle_name'); ?></div>
		</div>
		<div class="col-sm-2">
			<select class="custom-select mr-sm-2" name="teacher[suffix_name]">
				<option value="" selected>Name Suffix</option>
				<option value="sr">Sr</option>
				<option value="jr">Jr</option>
			</select>
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label">Current Address</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="teacher[address]" placeholder="Current Address" required>
			<div class="text-danger"><?php echo form_error('address'); ?></div>
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label">Contact Information</label>
		<div class="col-sm-5">
			<input type="text" class="form-control" name="teacher[telephone_number]" placeholder="Telephone #">
			<div class="text-danger"><?php echo form_error('telephone_number'); ?></div>
		</div>
		<div class="col-sm-5">
			<input type="text" class="form-control" name="teacher[mobile_number]" placeholder="Mobile #">
			<div class="text-danger"><?php echo form_error('mobile_number'); ?></div>
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label">Email Address</label>
		<div class="col-sm-10">
			<input type="email" class="form-control" name="teacher[email_address]" placeholder="example@email.com">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label">Birth Information</label>
		<div class="col-sm-5">
			<input type="text" name="teacher[birth_date]" class="form-control birthdatepicker" placeholder="Birth Date">
		</div>
		<div class="col-sm-5">
			<input type="text" name="teacher[birth_place]" class="form-control" placeholder="Birth Place">
		</div>
	</div>
	<!-- <div class="form-group row">
		<label class="col-sm-2 col-form-label">Designation</label>
		<div class="col-sm-3">
			<select name="department_id" id="test_department_id" class="form-control" data-placeholder="Choose a Department">
				<option value="">Choose a Department</option>
				<?php //foreach ($departments as $item) : ?>
				<option value="<?php //echo $item['id']; ?>"><?php //echo $item['name']; ?></option>
				<?php //endforeach; ?>
			</select>
		</div>
		<div class="col-sm-3">
			<select name="grade_level_id" id="test_grade_level_id" class="form-control" data-placeholder="Choose a Grade Level">
				<option value="">Choose a Grade Level</option>
			</select>
		</div>
		<div class="col-sm-4">
			<select name="section_id" id="test_section_id" class="form-control" data-placeholder="Choose a Section">
				<option value="">Choose a Section</option>
				<?php //foreach ($sections as $item) : ?>
				<option value="<?php //echo $item['id']; ?>"><?php //echo $item['name']; ?></option>
				<?php //endforeach; ?>
			</select>
		</div>
	</div> -->
	<div class="form-group row">
		<label class="col-sm-2 col-form-label">Subject Specialization</label>
		<div class="col-sm-10">
			<select name="teacher[specialized_subject_id]" id="specialized_subject_id" class="form-control chosen-select" data-placeholder="Choose a Department">
				<option value="">Choose a Subject</option>
				<?php foreach ($subjects as $item) : ?>
				<option value="<?php echo $item['id']; ?>"><?php echo implode(': ', array($item['schoolGradeLevelName'], $item['name'])); ?></option>
				<?php endforeach; ?>
			</select>
		</div>
	</div>
	<fieldset class="form-group">
		<div class="row">
			<legend class="col-form-label col-sm-3 pt-0">Gender</legend>
			<div class="col-sm-10">
				<div class="form-check form-check-inline">
					<input name="teacher[gender]" class="form-check-input" type="radio" value="1">
					<label class="form-check-label">Male</label>
				</div>
				<div class="form-check form-check-inline">
					<input name="teacher[gender]" class="form-check-input" type="radio" value="0">
					<label class="form-check-label">Female</label>
				</div>
				<div class="text-danger"><?php echo form_error('gender'); ?></div>
			</div>
		</div>
	</fieldset>
	<div class="form-group row">
		<div class="col-sm-12">
			<button type="submit" class="btn btn-primary btn-block"><i class="fas fa-save"></i> Save</button>
		</div>
	</div>
</form>
<script>
	$(document).ready(function() {
		var BASE_URL     = '<?php echo site_url(); ?>';
		var $_schoolYear = $('#test_school_year_id');
		var $_department = $('#test_department_id');
		var $_gradeLevel = $('#test_grade_level_id');
		var $_section    = $('#test_section_id');
		$_gradeLevel.prop('disabled', true);
		$_section.prop('disabled', true);
		$_schoolYear.on('change', function() {
			var postedData = {
				schoolYearID: $_schoolYear.val()
			};
			$.ajax({
				url: BASE_URL + 'scheduling/ajax/schoolYear',
				method: 'POST',
				data: postedData,
				dataType: 'JSON',
				success: function(res) {
					console.log(res)
				}
			});
		});
		$_department.on('change', function() {
			var postedData = {
				departmentID: $_department.val()
			};
			$.ajax({
				url: BASE_URL + 'scheduling/ajax/gradeLevelByDepartment',
				method: 'POST',
				data: postedData,
				dataType: 'JSON',
				success: function(res) {
					$_gradeLevel.remove('option');
					$_gradeLevel.find('option').remove();
					var gradeLevels = res.data.gradeLevels;
					var option = '<option value="">-- Choose Grade Level --</option>';
					for (var a = 0; a < gradeLevels.length; a++) {
						if ($_gradeLevel.val() != '' && $_gradeLevel.val() == a) {
							option += '<option value="' + gradeLevels[a].id + '" selected>' + gradeLevels[a].name + '</option>';
						} else {
							option += '<option value="'+ gradeLevels[a].id +'">' + gradeLevels[a].name + '</option>';
						}
					}
					$_gradeLevel.prop('disabled', false);
					$_gradeLevel.html(option);
				}
			});
		});
		$_gradeLevel.on('change', function() {
			$.ajax({
				url: BASE_URL + 'scheduling/ajax/sectionByGradeLevel',
				method: 'POST',
				data: { gradeLevelID: $_gradeLevel.val() },
				dataType: 'JSON',
				success: function(res) {
					$_section.remove('option');
					$_section.find('option').remove();
					var sections = res.data.sections;
					var option = '<option value="">-- Choose Grade Level --</option>';
					console.log(sections);
					for (var a = 0; a < sections.length; a++) {
						if ($_section.val() != '' && $_section.val() == a) {
							option += '<option value="' + sections[a].id + '" selected>' + sections[a].name + '</option>';
						} else {
							option += '<option value="'+ sections[a].id +'">' + sections[a].name + '</option>';
						}
					}
					$_section.prop('disabled', false);
					$_section.html(option);
				}
			});
		});
		$_section.on('change', function() {
			var postedData = {
				sectionID: $_section.val()
			};
			$.ajax({
				url: BASE_URL + 'scheduling/ajax/section',
				method: 'POST',
				data: postedData,
				dataType: 'JSON',
				success: function(res) {
					console.log(res)
				}
			});
		});
		$('.dateEnrolled').datepicker({
			uiLibrary: 'bootstrap4'
		});
		$('#date_enrolled_picker').on('change', function() {
			$('#date_enrolled').val($('#date_enrolled_picker').val());
		});
		$('.chosen-select').chosen();
		$('.birthdatepicker').datepicker({
			uiLibrary: 'bootstrap4'
		});
	});
</script>