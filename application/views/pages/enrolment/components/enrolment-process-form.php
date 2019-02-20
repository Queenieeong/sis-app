<div class="row">
	<div class="col-lg-12">
		<div class="text-danger"><?php echo validation_errors(); ?></div>
		<form action="<?php echo site_url('enrolment/process/' . $studentID); ?>" method="post" class="form-horizontal">
			<div class="form-group row">
				<label for="" class="col-sm-2">Student Number</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" value="<?php echo $studentDetails['student_number']; ?>" disabled>                 
				</div>
			</div>
			<div class="form-group row">
				<label for="" class="col-sm-2">Student Fullname</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" value="<?php echo $studentDetails['student_fullname']; ?>" disabled>               
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Select Parameters</label>
				<div class="col-sm-2">
					<input type="text" class="form-control" value="<?php echo $schoolYear['name']; ?>" disabled>               
					<input type="hidden" name="school_year_id" value="<?php echo $schoolYear['id']; ?>">            
					<input type="hidden" name="student_id" value="<?php echo $studentDetails['id']; ?>">            
				</div>
				<div class="col-sm-2">
					<select name="department_id" id="test_department_id" class="form-control" data-placeholder="Choose a Department">
						<option value="">Choose a Department</option>
						<?php foreach ($departments as $item) : ?>
						<option value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="col-sm-3">
					<select name="grade_level_id" id="test_grade_level_id" class="form-control" data-placeholder="Choose a Grade Level">
						<option value="">Choose a Grade Level</option>
					</select>
				</div>
				<div class="col-sm-3">
					<select name="section_id" id="test_section_id" class="form-control" data-placeholder="Choose a Section">
						<option value="">Choose a Section</option>
						<?php foreach ($sections as $item) : ?>
						<option value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label for="" class="col-sm-2">Date Enrolled</label>
				<div class="col-sm-10">
					<input type="text" class="form-control dateEnrolled" id="date_enrolled_picker" disabled>               
					<input type="hidden" name="date_enrolled" id="date_enrolled">               
				</div>
			</div>
			<div class="form-group row">
				<div class=" offset-2 col-sm-10">
					<button type="submit" class="btn btn-block btn-primary">Save</button>
				</div>
			</div>
		</form>
	</div>
</div>
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
	});
</script>