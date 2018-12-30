<?php
include( '../adminsystem/connection.php' );
include( "../adminsystem/checklogin_login.php" );
// Passkey that got from link 
$passkey = $_GET[ 'passkey' ];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
	<!-- Bootstrap Core CSS -->
	<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
	<!-- animation CSS -->
	<link href="css/animate.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="css/style.min.css" rel="stylesheet">
	<link href="css/mystyle.css" rel="stylesheet">
	<!-- color CSS -->
	<link href="css/colors/megna.css" id="theme" rel="stylesheet">
</head>
<body>
	<!-- Preloader -->
	<div class="preloader">
		<div class="cssload-speeding-wheel"></div>
	</div>
	<section id="wrapper" class="login-reset">
				<?php
				// Retrieve data from table where row that match this passkey 
				$sql1 = "SELECT * FROM admininfo WHERE reset_code ='$passkey'";
				$result1 = mysqli_query( $hrmsyscon, $sql1 );
				// If successfully queried 
				if ( $result1 ) {
					// Count how many row has this passkey
					$count = mysqli_num_rows( $result1 );
					// if found this passkey in our database, retrieve data from table "temp_members_db"
					if ( $count == 1 ) {
						?>
				<title>Metro Lifestyle || Reset Password</title>
		<div class="login-box">
			<div class="white-box">
				<form action="../adminsystem/updatepassword.php" class="form-horizontal form-material" id="loginform">
					<h4 class="m-b-20" style="text-align: center">
						<img src="plugins/images/logo.png"/>
						<br/><br/>Recover Password</h4>
				
					<?php
					/*Status message starts*/
					if ( isset( $_GET[ 'error1' ] ) ) {
						?>
					<div class="alert alert-danger alert-dismissible" role="alert">
						<p><i class="fa fa-ban"></i> The password you gave is incorrect.</p>
					</div>
					<?php
					}
					if ( isset( $_GET[ 'error2' ] ) ) {
						?>
					<div class="alert alert-danger alert-dismissible" role="alert">
						<p><i class="fa fa-ban"></i> Old password and new password cannot be same. Please try again.</p>
					</div>
					<?php
					}
					if ( isset( $_GET[ 'error3' ] ) ) {
						?>
					<div class="alert alert-success alert-dismissible" role="alert">
						<p><i class="fa fa-check"></i> New password and confirm password do not matched.</p>
					</div>
					<?php
					}
					if ( isset( $_GET[ 'error4' ] ) ) {
						?>
					<div class="alert alert-danger alert-dismissible" role="alert">
						<p><i class="fa fa-ban"></i> Please fil all the fields.</p>
					</div>
					<?php
					}
					/*Status message ends*/
					?>
					<?php
					$passkey = $_REQUEST[ 'passkey' ];
					$query = $hrmsyscon->query( "SELECT * FROM admininfo where reset_code = '$passkey'" );
					$row = $query->fetch_assoc();
					?>
					<div class="form-group hidden">
						<div class="col-xs-12">
							<input class="form-control" type="text" value="<?php echo $row['password'];?>"> </div>
					</div>
					<div class="form-group ">
						<div class="col-xs-12">
							<input class="form-control" type="text" required="" placeholder="New Password"> </div>
					</div>
					<div class="form-group ">
						<div class="col-xs-12">
							<input class="form-control" type="text" required="" placeholder="Retype Password"> </div>
					</div>
					<div class="form-group text-center m-t-20">
						<div class="col-xs-12">
							<button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
						</div>
					</div>
					<footer class="footer text-center"> 2018 &copy; Metro Lifestyle Dashboard. Develped by <span style="color:deepskyblue">SRA HRMSYSTEM</span> </footer>
				</form>
			</div>
		</div>
		<?php }
	else{?>
		<title>Error || Metro Lifestyle</title>
			<div  class="error-page error-box">
				<div class="error-body text-center">
					<h1 style="color: crimson">ERROR</h1>
					<h3 class="text-uppercase">Maybe reset code has expired / code is incorrect.</h3>
					<p class="text-muted m-t-30 m-b-30">Please check the mail again. Click or copy the full link properly.</p>
					<a href="index.html" class="btn btn-info btn-rounded waves-effect waves-light m-b-40">Back to home</a> 
					<footer class="footer text-center"> 2018 &copy; Metro Lifestyle Dashboard. Develped by <span style="color:deepskyblue">SRA HRMSYSTEM</span> </footer>
				</div>
			</div>
<?php }
} ?>
		</section>
		<!-- jQuery -->
		<script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
		<!-- Bootstrap Core JavaScript -->
		<script src="bootstrap/dist/js/tether.min.js"></script>
		<script src="bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
		<!-- Menu Plugin JavaScript -->
		<script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
		<!--slimscroll JavaScript -->
		<script src="js/jquery.slimscroll.js"></script>
		<!--Wave Effects -->
		<script src="js/waves.js"></script>
		<!-- Custom Theme JavaScript -->
		<script src="js/custom.min.js"></script>
		<!--Style Switcher -->
		<script src="plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>