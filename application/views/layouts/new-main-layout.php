<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Probex School Inc., | <?php echo $pageHeader; ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo site_url('assets/img/favicon.ico'); ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/libs/node_modules/bootstrap/dist/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/libs/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/libs/node_modules/snackbarjs/dist/snackbar.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/libs/node_modules/toastr/build/toastr.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/libs/node_modules/@fortawesome/fontawesome-free/css/all.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/libs/node_modules/gijgo/css/gijgo.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/libs/node_modules/bootstrap-slider/dist/css/bootstrap-slider.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/libs/bootstrap-tagsinput/src/bootstrap-tagsinput.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php // echo site_url('assets/libs/chosen/chosen.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/libs/chosen/bootstrap4c-chosen/dist/css/component-chosen.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/libs/bootstrap-toggle/css/bootstrap-toggle.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/theme.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/switch-toggle.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/libs/pace-1.0.2/themes/red/pace-theme-loading-bar.css'); ?>">

    <script type="text/javascript" src="<?php echo site_url('assets/libs/node_modules/jquery/dist/jquery.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo site_url('assets/libs/node_modules/popper.js/dist/umd/popper.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo site_url('assets/libs/node_modules/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo site_url('assets/libs/node_modules/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo site_url('assets/libs/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo site_url('assets/libs/node_modules/snackbarjs/dist/snackbar.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo site_url('assets/libs/node_modules/toastr/build/toastr.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo site_url('assets/libs/node_modules/@fortawesome/fontawesome-free/js/all.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo site_url('assets/libs/node_modules/gijgo/js/gijgo.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo site_url('assets/libs/node_modules/bootstrap-slider/dist/bootstrap-slider.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo site_url('assets/libs/chosen/chosen.jquery.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo site_url('assets/libs/bootstrap-tagsinput/src/bootstrap-tagsinput.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo site_url('assets/libs/bootstrap-toggle/js/bootstrap-toggle.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo site_url('assets/libs/pace-1.0.2/pace.min.js'); ?>"></script>



    <style>
      .ml-spacer {
        margin-left: 10px;
      }

      .slider.slider-horizontal {
        width: 204px;
        height: 20px;
      }
    </style>

  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Probex School Inc.,</a>

      <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->

      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link">Welcome <?php echo $user['fullname']; ?> - <?php echo date('M d, Y'); ?></a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link <?php echo ($activeLink === 'dashboard') ? 'active':'' ?>" href="<?php echo site_url('dashboard'); ?>">
                        <i class="fas fa-home"></i><span class="ml-spacer"></span> Dashboard
                    </a>
                </li>
                <li class="border-bottom"></li>

                <?php if ($this->ion_auth->in_group(array('student'))): ?>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($activeLink === 'my_classes') ? 'active':'' ?>" href="<?php echo site_url('account/my_classes/student'); ?>">
                        <i class="fas fa-address-card"></i><span class="ml-spacer"></span> My Profile
                    </a>
                </li>
                <li class="border-bottom"></li>
                <?php endif; ?>

                <?php if ($this->ion_auth->in_group(array('teacher'))) : ?>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($activeLink === 'my_classes') ? 'active' : '' ?>" href="<?php echo site_url('account/my_classes/teacher'); ?>">
                        <i class="fas fa-address-card"></i><span class="ml-spacer"></span> My Profile
                    </a>
                </li>
                <li class="border-bottom"></li>
                <?php endif; ?>
                <?php if ($this->ion_auth->in_group(array('registrar'))): ?>

                <li class="nav-item">
                    <a class="nav-link <?php echo ($activeLink === 'admission') ? 'active' : '' ?>" href="<?php echo site_url('admission'); ?>">
                        <i class="fas fa-address-card"></i><span class="ml-spacer"></span> Student Regristration
                    </a>
                </li>

                <li class="border-bottom"></li>

                <li class="nav-item">
                    <a class="nav-link <?php echo ($activeLink === 'enrolment') ? 'active' : '' ?>" href="<?php echo site_url('enrolment'); ?>">
                        <i class="fas fa-address-card"></i><span class="ml-spacer"></span> Student Enrolment
                    </a>
                </li>
                <li class="border-bottom"></li>
                <?php endif; ?>
                <?php if ($this->ion_auth->in_group(array('admin'))): ?>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($activeLink === 'users') ? 'active':'' ?>" href="<?php echo site_url('users'); ?>">
                        <i class="fas fa-users"></i><span class="ml-spacer"></span> Users
                    </a>
                </li>
                <li class="border-bottom"></li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($activeLink === 'students') ? 'active':'' ?>" href="<?php echo site_url('students'); ?>">
                        <i class="fas fa-user-graduate"></i><span class="ml-spacer"></span> Students
                    </a>
                </li>
                <li class="border-bottom"></li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($activeLink === 'teacher') ? 'active':'' ?>" href="<?php echo site_url('teacher'); ?>">
                        <i class="fas fa-chalkboard-teacher"></i><span class="ml-spacer"></span> Teachers
                    </a>
                </li>
                <li class="border-bottom"></li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($activeLink === 'admission' || $activeLink === 'enrolment') ? 'active':'' ?> dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-cogs"></i><span class="ml-spacer"></span>
                        Registrar
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="<?php echo site_url('admission'); ?>">Student Regristration</a>
                        <a class="dropdown-item" href="<?php echo site_url('enrolment'); ?>">Student Enrollment</a>
                    </div>
                </li>
                <li class="border-bottom"></li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($activeLink === 'scheduling') ? 'active':'' ?>" href="<?php echo site_url('scheduling'); ?>">
                        <i class="fas fa-calendar-alt"></i><span class="ml-spacer"></span> Scheduling
                    </a>
                </li>
                <li class="border-bottom"></li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($activeLink === 'announcements') ? 'active':'' ?>" href="<?php echo site_url('announcements'); ?>">
                        <i class="fas fa-bullhorn"></i><span class="ml-spacer"></span> Announcements
                    </a>
                </li>
                <li class="border-bottom"></li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($activeLink === 'events') ? 'active':'' ?>" href="<?php echo site_url('events'); ?>">
                        <i class="fas fa-bell"></i><span class="ml-spacer"></span> Events
                    </a>
                </li>
                <li class="border-bottom"></li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($activeLink === 'system-parameters') ? 'active':'' ?> dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-cogs"></i><span class="ml-spacer"></span>
                        System Parameters
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="<?php echo site_url('schoolYears'); ?>">School Years</a>
                        <a class="dropdown-item" href="<?php echo site_url('schoolDepartments'); ?>">Departments</a>
                        <a class="dropdown-item" href="<?php echo site_url('schoolGradeLevels'); ?>">Grade Levels</a>
                        <a class="dropdown-item" href="<?php echo site_url('schoolSections'); ?>">Sections</a>
                        <a class="dropdown-item" href="<?php echo site_url('schoolSubjects'); ?>">Subjects</a>
                        <a class="dropdown-item" href="<?php echo site_url('credential'); ?>">Student Credential</a>
                    </div>
                </li>
                <li class="border-bottom"></li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('auth/logout'); ?>">
                        <i class="fas fa-sign-out-alt"></i><span class="ml-spacer"></span> Logout
                    </a>
                </li>
                <li class="border-bottom"></li>
            </ul>
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Probex School Inc., &copy; 2019</span>
            </h6>

          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2"><?php echo $pageHeader; ?></h1>
          </div>
          <?php (isset($sub_view)) ? $this->load->view($sub_view) : ''; ?>
        </main>
      </div>
    </div>

    <?php if ($this->session->flashdata('SUCCESS_MESSAGE') != ''): ?>
			<script type="text/javascript">
				$(document).ready(function() {
					toastr.options = {
						"positionClass": "toast-top-right",
						"onclick": null,
						"showDuration": "300",
						"hideDuration": "1000",
						"timeOut": "5000",
						"extendedTimeOut": "1000",
						"showEasing": "swing",
						"hideEasing": "linear",
						"showMethod": "fadeIn",
						"hideMethod": "fadeOut"
					}
					toastr.success("<?php echo $this->session->flashdata('SUCCESS_MESSAGE'); ?>")
				});
			</script>
			<?php endif; ?>

			<?php if ($this->session->flashdata('ERROR_MESSAGE') != ''): ?>
			<script type="text/javascript">
				$(document).ready(function() {
					toastr.options = {
						"positionClass": "toast-top-right",
						"onclick": null,
						"showDuration": "300",
						"hideDuration": "1000",
						"timeOut": "5000",
						"extendedTimeOut": "1000",
						"showEasing": "swing",
						"hideEasing": "linear",
						"showMethod": "fadeIn",
						"hideMethod": "fadeOut"
					}
					toastr.error("<?php echo $this->session->flashdata('ERROR_MESSAGE'); ?>")
				});
			</script>
			<?php endif; ?>
  </body>
</html>
