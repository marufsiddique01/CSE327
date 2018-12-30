<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url("assets/admin/");?>plugins/images/favicon.png">
	<title><?php echo $metadata['title']; ?></title>
	<!-- Bootstrap Core CSS -->
	<link href="<?php echo base_url("assets/admin/"); ?>bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url("assets/admin/"); ?>plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
	<!-- animation CSS -->
	<link href="<?php echo base_url("assets/admin/"); ?>css/animate.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="<?php echo base_url("assets/admin/"); ?>css/style.min.css" rel="stylesheet">
	<link href="<?php echo base_url("assets/admin/"); ?>css/custom.css" rel="stylesheet">
	<!-- color CSS -->
	<link href="<?php echo base_url("assets/admin/"); ?>css/colors/megna.css" id="theme" rel="stylesheet">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
	<!-- Preloader -->
	<div class="preloader">
		<div class="cssload-speeding-wheel"></div>
	</div>
	<section id="wrapper" class="login-register">
		<div class="bglogodiv">
			<?php 
				if($lockscreen_image_show > 0){
					foreach ( $lockscreen_image_show as $row ): ?>
			<img class="bglogo" src="<?php echo base_url("assets/admin/"); ?>upload-images/setup/logos/lockscreen/<?php echo $row['lckimage']; ?>">
<!--			<img class="bglogo" src="<?php echo base_url("assets/admin/"); ?>plugins/images/MSWA.png">-->
		<?php endforeach;	} ?>
		</div>
		<div class="login-box login-sidebar logdiv">
			<div class="white-box">
				<img class="loginlogo" src="<?php echo base_url("assets/admin/");?>plugins/images/logo.png"/>
				<h4 class="loginwelcometext">Welcome to Metro Soft <br>Delivery Portal</h4>
				<form class="form-horizontal form-material" id="loginform" action="<?php echo base_url('loginverify');?>" method="POST" enctype="multipart/form-data">
					<div class="form-group text-center m-t-0">
						<h4>Login with</h4>
						<div class="loginwelcometext">
							<div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-6 m-b-5">
								<a href="<?php echo $loginURL; ?>" class="btn btn-black btn-lg btn-block text-uppercase waves-effect waves-light" style="background-color: #DD4B39">Google</a>
							</div>
							<div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-6 m-b-5">
								<a href="<?php echo $loginURL; ?>" class="btn btn-black btn-lg btn-block text-uppercase waves-effect waves-light" style="background-color: #3B5998">Facebook</a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
	<!-- jQuery -->
	<script src="<?php echo base_url("assets/admin/"); ?>plugins/bower_components/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="<?php echo base_url("assets/admin/"); ?>bootstrap/dist/js/tether.min.js"></script>
	<script src="<?php echo base_url("assets/admin/"); ?>bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url("assets/admin/"); ?>plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
	<!-- Menu Plugin JavaScript -->
	<script src="<?php echo base_url("assets/admin/"); ?>plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
	<!--slimscroll JavaScript -->
	<script src="<?php echo base_url("assets/admin/"); ?>js/jquery.slimscroll.js"></script>
	<!--Wave Effects -->
	<script src="<?php echo base_url("assets/admin/"); ?>js/waves.js"></script>
	<!-- Custom Theme JavaScript -->
	<script src="<?php echo base_url("assets/admin/"); ?>js/custom.min.js"></script>
	<!--Style Switcher -->
	<script src="<?php echo base_url("assets/admin/"); ?>plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>