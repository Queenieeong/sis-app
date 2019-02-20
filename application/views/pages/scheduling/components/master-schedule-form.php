<style>
.slider {
    background-color: white;
}
</style>
<form method="post" action="<?php echo site_url('scheduling/create'); ?>">
    <h4>Enter Master Schedule Details</h4><br>
    
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Select Parameters</label>
        <div class="col-sm-2">
            <select name="masterSchedule[school_year_id]" id="school_year_id" class="form-control" data-placeholder="Choose a School Year">
                <?php foreach($schoolYears as $item): ?>
                <option value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-sm-2">
            <select name="masterSchedule[department_id]" id="department_id" class="form-control" data-placeholder="Choose a Department">
                <option value="">Choose a Department</option>
                <?php foreach($departments as $item): ?>
                <option value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-sm-3">
            <select name="masterSchedule[grade_level_id]" id="grade_level_id" class="form-control" data-placeholder="Choose a Grade Level">
                <option value="">Choose a Grade Level</option>
            </select>
        </div>
        <div class="col-sm-3">
            <select name="masterSchedule[section_id]" id="section_id" class="form-control" data-placeholder="Choose a Section">
                <option value="">Choose a Section</option>
                <?php foreach($sections as $item): ?>
                <option value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Class Information</label>
        <div class="col-sm-4">
            <input id="ex9" data-slider-id="ex1Slider" type="text" name="masterSchedule[capacity]">
            <br>
            Class capacity: <span id="ex6SliderVal">0</span>
        </div>
        <div class="col-sm-6">
            <select name="masterSchedule[adviser_id]" id="adviser_id" class="form-control" data-placeholder="Choose a Adviser">
                <option value=""></option>
                <?php foreach($teachers as $item): ?>
                <option value="<?php echo $item['id']; ?>"><?php echo $item['account_number_with_full_name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-save"></i> Save</button>
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {
        var BASE_URL       = '<?php echo site_url(); ?>';
        var $_schoolYear  = $('#school_year_id');
        var $_department  = $('#department_id');
        var $_gradeLevel  = $('#grade_level_id');
        var $_section     = $('#section_id');
        var $_adviser     = $('#adviser_id');
        
        var slider = new Slider("#ex9", {
            tooltip: 'always',
            value: 0,
            min: 0,
            max: 60
        });

        $_adviser.chosen();

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

        
        $('.birthdatepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });

        
        slider.on("slide", function(sliderValue) {
            document.getElementById("ex6SliderVal").textContent = sliderValue;
        });

        $('.chosen-select').chosen();
    });
</script>