<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Probex School Inc., | <?php echo $pageHeader; ?></title>

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
        <a class="navbar-brand" href="#">Probex School Inc.</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
            </ul>

            <a class="btn btn-success my-2 my-sm-0" href="<?php echo site_url('online_enrollment'); ?>">Online Enrollment</a>&nbsp;
            <a class="btn btn-success my-2 my-sm-0" href="<?php echo site_url('auth/login'); ?>">Login to Portal</a>
        </div>
    </nav>
    <div class="container-fluid">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="<?php echo base_url('assets/img/carousel1.jpg'); ?>" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="<?php echo base_url('assets/img/carousel1.jpg'); ?>" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="<?php echo base_url('assets/img/carousel1.jpg'); ?>" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <main role="main" class="container">



        <div class="starter-template">

            <h1>Probex School Inc.</h1>
            <p class="lead"><b>PR(edict) - OB(serve) - EX(plore)</b></p>
						<p class="lead">127 M.H. Del Pilar st. Santulan, Malabon City</p>
        
        </div>

    </main>

</body>
</html>
