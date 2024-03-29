<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Probex School Inc., | Login</title>

	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/img/favicon.ico'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/libs/node_modules/bootstrap/dist/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/libs/node_modules/@fortawesome/fontawesome-free/css/all.min.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/libs/node_modules/snackbarjs/dist/snackbar.css'); ?>">

	<script type="text/javascript" src="<?php echo site_url('assets/libs/node_modules/jquery/dist/jquery.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo site_url('assets/libs/node_modules/popper.js/dist/umd/popper.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo site_url('assets/libs/node_modules/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo site_url('assets/libs/node_modules/snackbarjs/dist/snackbar.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo site_url('assets/libs/node_modules/@fortawesome/fontawesome-free/js/all.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo site_url('assets/libs/node_modules/snackbarjs/dist/snackbar.min.js'); ?>"></script>

  <script type="text/javascript" src="<?php echo site_url('assets/js/login.js'); ?>" charset="utf-8"></script>
	<style>
		html,
		body {
			height: 100%;
		}



		body {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-align: center;
			align-items: center;
			padding-top: 40px;
			padding-bottom: 40px;
			background-color: #f5f5f5;
		}

		.form-signin {
			width: 100%;
			max-width: 330px;
			padding: 15px;
			margin: auto;
		}
		.form-signin .checkbox {
			font-weight: 400;
		}
		.form-signin .form-control {
			position: relative;
			box-sizing: border-box;
			height: auto;
			padding: 10px;
			font-size: 16px;
		}
		.form-signin .form-control:focus {
			z-index: 2;
		}
		.form-signin input[type="email"] {
			margin-bottom: -1px;
			border-bottom-right-radius: 0;
			border-bottom-left-radius: 0;
		}
		.form-signin input[type="password"] {
			margin-bottom: 10px;
			border-top-left-radius: 0;
			border-top-right-radius: 0;
		}

	</style>
</head>
<body class="text-center">
	<form class="form-signin" method="post" action="<?php echo site_url('auth/login'); ?>">
		<img class="mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
		<h1 class="h3 mb-3">Please sign in</h1>
        <div id="infoMessage"><?php echo $message;?></div>

		<!-- <div class="form-group">
			<select name="user_type" id="user_type" class="form-control">
				<option value="">-- Select User Type --</option>
				<option value="">Faculty</option>
				<option value="">Student</option>
				<option value="">Parent</option>
			</select>
		</div> -->

		<div class="form-group">
			<label class="sr-only">Username</label>
			<input type="text" id="identity" class="form-control" name="identity" placeholder="Username" value="<?php echo $identityValue; ?>" required autofocus>
		</div>

		<div class="form-group">
			<label class="sr-only">Password</label>
			<input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
		</div>

		<div class="checkbox mb-3">
			<!-- <label>
				<input type="checkbox" value="remember-me"> Remember me
			</label> -->
		</div>
		<button class="btn btn-success btn-block" type="submit">Sign in</button>
		<p class="mt-3 mb-3 text-muted"><a href="<?php echo site_url(); ?>">Probex School Inc.</a> &copy; <?php echo date('Y'); ?></p>
	</form>

</body>
</html>
