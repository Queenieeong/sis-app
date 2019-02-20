<form method="post" action="<?php echo site_url('admission/save'); ?>">
    <h4>Student Information</h4><br>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Student Name</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="student[last_name]" placeholder="Last Name" value="<?php echo set_value('last_name'); ?>" required>
            <div class="text-danger"><?php echo form_error('last_name'); ?></div>
        </div>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="student[first_name]" placeholder="First Name" value="<?php echo set_value('first_name'); ?>" required>
            <div class="text-danger"><?php echo form_error('first_name'); ?></div>
        </div>
        <div class="col-sm-2">
            <input type="text" class="form-control" name="student[middle_name]" placeholder="Middle Name" value="<?php echo set_value('middle_name'); ?>">
            <div class="text-danger"><?php echo form_error('middle_name'); ?></div>
        </div>
        <div class="col-sm-2">
            <select class="custom-select mr-sm-2" name="student[suffix_name]">
                <option value="" selected>Name Suffix</option>
                <option value="sr">Sr</option>
                <option value="jr">Jr</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Current Address</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="student[current_address]" placeholder="Current Address" required>
            <div class="text-danger"><?php echo form_error('current_address'); ?></div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Contact Information</label>
        <div class="col-sm-5">
            <input type="number" id="tel" maxlength="7" x onkeydown="javascript: return event.keyCode == 69 ? false : true" class="form-control" name="student[telephone_number]" placeholder="Telephone #">
            <div class="text-danger"><?php echo form_error('telephone_number'); ?></div>
        </div>
        <div class="col-sm-5">
            <input type="number" id="mob" maxlength="11" onkeydown="javascript: return event.keyCode == 69 ? false : true" class="form-control" name="student[mobile_number]" placeholder="Mobile #">
            <div class="text-danger"><?php echo form_error('mobile_number'); ?></div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Email Address</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" name="student[email_address]" placeholder="example@email.com">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Birth Information</label>
        <div class="col-sm-5">
            <input type="text" name="student[birth_date]" class="form-control birthdatepicker" placeholder="Birth Date">
        </div>
        <div class="col-sm-5">
            <input type="text" name="student[birth_place]" class="form-control" placeholder="Birth Place">
        </div>
    </div>

    <fieldset class="form-group">
        <div class="row">
            <legend class="col-form-label col-sm-3 pt-0">Gender</legend>
            <div class="col-sm-10">
                <div class="form-check form-check-inline">
                    <input name="student[gender]" class="form-check-input" type="radio" value="1">
                    <label class="form-check-label">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input name="student[gender]" class="form-check-input" type="radio" value="0">
                    <label class="form-check-label">Female</label>
                </div>
                <div class="text-danger"><?php echo form_error('gender'); ?></div>
            </div>
        </div>
    </fieldset>
    <h4>Parent Information</h4><br>
    <div class="text-danger"><?php echo form_error('parent_type_id'); ?></div>
    <fieldset class="form-group">
        <div class="row">
            <div class="col-sm-10">
                <div class="form-check form-check-inline">
                    <input name="parent[parent_type_id]" class="form-check-input" type="radio" value="1">
                    <label class="form-check-label">Father</label>
                </div>
                <div class="form-check form-check-inline">
                    <input name="parent[parent_type_id]" class="form-check-input" type="radio" value="0">
                    <label class="form-check-label">Mother</label>
                </div>
            </div>
        </div>
    </fieldset>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Parent Name</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="parent[last_name]" placeholder="Last Name">
        </div>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="parent[first_name]" placeholder="First Name">
        </div>
        <div class="col-sm-2">
            <input type="text" class="form-control" name="parent[middle_name]" placeholder="Middle Name">
        </div>
        <div class="col-sm-2">
            <select class="custom-select mr-sm-2" name="parent[suffix_name]">
                <option value="" selected>Name Suffix</option>
                <option value="sr">Sr</option>
                <option value="jr">Jr</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Current Address</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="parent[current_address]" placeholder="Current Address">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Contact Information</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="parent[telephone_number]" placeholder="Telephone #">
        </div>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="parent[mobile_number]" placeholder="Mobile #">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Email Address</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" name="parent[email_address]" placeholder="example@email.com">
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
        $('.birthdatepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });


    });
});
</script>