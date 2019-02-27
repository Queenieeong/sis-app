<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Probex School Inc. | Online Enrollment</title>

	<link rel="shortcut icon" type="image/x-icon" href="<?php echo site_url('assets/img/favicon.ico'); ?>">

	<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/libs/node_modules/bootstrap/dist/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/libs/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/libs/node_modules/snackbarjs/dist/snackbar.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/libs/node_modules/toastr/build/toastr.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/libs/node_modules/@fortawesome/fontawesome-free/css/all.min.css'); ?>">

	<script type="text/javascript" src="<?php echo site_url('assets/libs/node_modules/jquery/dist/jquery.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo site_url('assets/libs/node_modules/popper.js/dist/umd/popper.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo site_url('assets/libs/node_modules/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo site_url('assets/libs/node_modules/snackbarjs/dist/snackbar.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo site_url('assets/libs/node_modules/toastr/build/toastr.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo site_url('assets/libs/node_modules/@fortawesome/fontawesome-free/js/all.min.js'); ?>"></script>

    <style>
        body {
            padding-top: 5rem;
        }

        footer {
            padding-top: 3rem;
            padding-bottom: 3rem;
        }

        footer p {
            margin-bottom: .25rem;
        }

        .starter-template {
            padding: 3rem 1.5rem;
            text-align: center;
        }

        .tales {
            width: 100%;
        }
        .carousel-inner img{
            width: 100%;
            max-height: 350px !important;
        }

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="<?php echo site_url('/'); ?>">Probex School Inc.</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo site_url('/'); ?>">Home <span class="sr-only">(current)</span></a>
                </li>
            </ul>

            <a class="btn btn-success my-2 my-sm-0" href="<?php echo site_url('online_enrollment'); ?>">Online Enrollment</a>&nbsp;
            <a class="btn btn-success my-2 my-sm-0" href="<?php echo site_url('auth/login'); ?>">Login to Portal</a>
        </div>
    </nav>
    <main role="main" class="container">
        <form method="post" action="<?php echo site_url('online_enrollment/submit'); ?>">
            <h4>Student Information</h4><br>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Student Name</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="student_last_name" placeholder="Last Name" value="<?php echo set_value('student_last_name'); ?>">
                    <div class="text-danger"><?php echo form_error('student_last_name'); ?></div>
                </div>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="student_first_name" placeholder="First Name" value="<?php echo set_value('student_first_name'); ?>">
                    <div class="text-danger"><?php echo form_error('student_first_name'); ?></div>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="student_middle_name" placeholder="Middle Name" value="<?php echo set_value('student_middle_name'); ?>">
                    <div class="text-danger"><?php echo form_error('student_middle_name'); ?></div>
                </div>
                <div class="col-sm-2">
                    <select class="custom-select mr-sm-2" name="student_suffix_name">
                        <option value="" selected>Name Suffix</option>
                        <option value="sr">Sr</option>
                        <option value="jr">Jr</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Current Address</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="student_current_address" value="<?php echo set_value('student_current_address'); ?>" placeholder="Current Address">
                    <div class="text-danger"><?php echo form_error('student_current_address'); ?></div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Contact Information</label>
                <div class="col-sm-5">
                    <input type="text" id="tel" maxlength="7" x onkeydown="javascript: return event.keyCode == 69 ? false : true" class="form-control" name="student_telephone_number" value="<?php echo set_value('student_telephone_number'); ?>" placeholder="Telephone #">
                    <div class="text-danger"><?php echo form_error('student_telephone_number'); ?></div>
                </div>
                <div class="col-sm-5">
                    <input type="text" id="mob" maxlength="11" onkeydown="javascript: return event.keyCode == 69 ? false : true" class="form-control" name="student_mobile_number" value="<?php echo set_value('student_mobile_number'); ?>" placeholder="Mobile #">
                    <div class="text-danger"><?php echo form_error('student_mobile_number'); ?></div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email Address</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="student_email_address" value="<?php echo set_value('student_email_address'); ?>" placeholder="example@email.com">
                    <div class="text-danger"><?php echo form_error('student_email_address'); ?></div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Birth Information</label>
                <div class="col-sm-5">
                    <input type="date" name="student_birth_date" value="<?php echo set_value('student_birth_date'); ?>" class="form-control birthdatepicker" placeholder="Birth Date">
                    <div class="text-danger"><?php echo form_error('student_birth_date'); ?></div>
                </div>
                <div class="col-sm-5">
                    <input type="text" name="student_birth_place" value="<?php echo set_value('student_birth_place'); ?>" class="form-control" placeholder="Birth Place">
                    <div class="text-danger"><?php echo form_error('student_birth_place'); ?></div>
                </div>
            </div>

            <fieldset class="form-group">
                <div class="row">
                    <legend class="col-form-label col-sm-3 pt-0">Gender</legend>
                    <div class="col-sm-10">
                        <div class="form-check form-check-inline">
                            <input name="student_gender" class="form-check-input" type="radio" value="1">
                            <label class="form-check-label">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input name="student_gender" class="form-check-input" type="radio" value="0">
                            <label class="form-check-label">Female</label>
                        </div>
                        <div class="text-danger"><?php echo form_error('student_gender'); ?></div>
                    </div>
                </div>
            </fieldset>
            <h4>Parent Information</h4><br>

            <h6>Father's Information</h6>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Parent Name</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="father_last_name"  value="<?php echo set_value('father_last_name'); ?>" placeholder="Last Name">
                    <div class="text-danger"><?php echo form_error('father_last_name'); ?></div>
                </div>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="father_first_name"  value="<?php echo set_value('father_first_name'); ?>" placeholder="First Name">
                    <div class="text-danger"><?php echo form_error('father_first_name'); ?></div>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="father_middle_name"  value="<?php echo set_value('father_middle_name'); ?>" placeholder="Middle Name">
                    <div class="text-danger"><?php echo form_error('father_middle_name'); ?></div>
                </div>
                <div class="col-sm-2">
                    <select class="custom-select mr-sm-2" name="father_suffix_name">
                        <option value="" selected>Name Suffix</option>
                        <option value="sr">Sr</option>
                        <option value="jr">Jr</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Current Address</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="father_current_address"  value="<?php echo set_value('father_current_address'); ?>" placeholder="Current Address">
                    <div class="text-danger"><?php echo form_error('father_current_address'); ?></div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Contact Information</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="father_telephone_number" value="<?php echo set_value('father_telephone_number'); ?>" placeholder="Telephone #">
                    <div class="text-danger"><?php echo form_error('father_telephone_number'); ?></div>
                </div>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="father_mobile_number" value="<?php echo set_value('father_mobile_number'); ?>" placeholder="Mobile #">
                    <div class="text-danger"><?php echo form_error('father_mobile_number'); ?></div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email Address</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="father_email_address" value="<?php echo set_value('father_email_address'); ?>" placeholder="example@email.com">
                    <div class="text-danger"><?php echo form_error('father_email_address'); ?></div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Occupation</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="father_occupation" value="<?php echo set_value('father_occupation'); ?>" placeholder="">
                    <div class="text-danger"><?php echo form_error('father_occupation'); ?></div>
                </div>
            </div>

            <h6>Mother's Information</h6>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Parent Name</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="mother_last_name" value="<?php echo set_value('mother_last_name'); ?>" placeholder="Last Name">
                    <div class="text-danger"><?php echo form_error('mother_last_name'); ?></div>
                </div>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="mother_first_name" value="<?php echo set_value('mother_first_name'); ?>" placeholder="First Name">
                    <div class="text-danger"><?php echo form_error('mother_last_name'); ?></div>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="mother_middle_name" value="<?php echo set_value('mother_middle_name'); ?>" placeholder="Middle Name">
                    <div class="text-danger"><?php echo form_error('mother_last_name'); ?></div>
                </div>
                <div class="col-sm-2">
                    <select class="custom-select mr-sm-2" name="mother_suffix_name">
                        <option value="" selected>Name Suffix</option>
                        <option value="sr">Sr</option>
                        <option value="jr">Jr</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Current Address</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="mother_current_address" value="<?php echo set_value('mother_current_address'); ?>" placeholder="Current Address">
                    <div class="text-danger"><?php echo form_error('mother_current_address'); ?></div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Contact Information</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="mother_telephone_number" value="<?php echo set_value('mother_telephone_number'); ?>" placeholder="Telephone #">
                    <div class="text-danger"><?php echo form_error('mother_telephone_number'); ?></div>
                </div>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="mother_mobile_number" value="<?php echo set_value('mother_mobile_number'); ?>" placeholder="Mobile #">
                    <div class="text-danger"><?php echo form_error('mother_mobile_number'); ?></div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email Address</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="mother_email_address" value="<?php echo set_value('mother_email_address'); ?>" placeholder="example@email.com">
                    <div class="text-danger"><?php echo form_error('mother_email_address'); ?></div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Occupation</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="mother_occupation" value="<?php echo set_value('mother_occupation'); ?>" placeholder="">
                    <div class="text-danger"><?php echo form_error('mother_occupation'); ?></div>
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
        </script>
    </main>
</body>
</html>
