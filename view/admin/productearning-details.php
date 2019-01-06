<?php
include( "../adminsystem/checklogin.php" );
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
	<title>Metro Lifestyle || Dashboard</title>
	<!-- Bootstrap Core CSS -->
	<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
	<!-- Footable CSS -->
	<link href="plugins/bower_components/footable/css/footable.core.css" rel="stylesheet">
	<link href="plugins/bower_components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet"/>
	<!-- Popup CSS -->
	<link href="plugins/bower_components/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
	<!-- Menu CSS -->
	<link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
	<!-- morris CSS -->
	<link href="plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
	<!-- animation CSS -->
	<link href="css/animate.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="css/style.min.css" rel="stylesheet">
	<!--alerts CSS -->
	<link href="plugins/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
	<!-- color CSS -->
	<link href="css/colors/megna.css" id="theme" rel="stylesheet">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="fix-header">
	<!-- Preloader -->
	<div class="preloader">
		<div class="cssload-speeding-wheel"></div>
	</div>
	<div id="wrapper">
		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-static-top m-b-0">
			<div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
				<div class="top-left-part"><a class="logo" href="index.php"><img src="plugins/images/logownns.png" alt="Home" /><span class="hidden-xs">
                
                <strong>Metro</strong> Lifestyle</span></a>
				</div>
				<ul class="nav navbar-top-links navbar-left hidden-xs">
					<li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a>
					</li>
					<li>
						<form role="search" class="app-search hidden-xs">
							<input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
					</li>
				</ul>
				<ul class="nav navbar-top-links navbar-right pull-right">
					<li class="dropdown"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><i class="icon-envelope"></i>
          <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
          </a>
					</li>
					<!-- /.dropdown -->
					<li class="dropdown"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><i class="icon-note"></i>
          <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
          </a>
					</li>
					<!-- /.dropdown -->
					<li class="dropdown">
						<li class="dropdown">
							<?php
							$adminimg = $hrmsyscon->query( "select * from admininfo where email='{$_SESSION['email']}'" );
							while ( $resultadminimg = $adminimg->fetch_array() ) {
								?>
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="admin-panel/profile-picture/<?php echo $resultadminimg['admin_img']; ?>" width="40" height="40" class="img-circle"><b class="hidden-xs">
                        
                        <?php echo $resultadminimg['fname'].'  '. $_SESSION['lname']; ?>
                        
						<?php 
							}
						?>
                         </b> </a>
							<ul class="dropdown-menu dropdown-user animated flipInY">
								<li><a href="#"><i class="ti-user"></i> My Profile</a>
								</li>
								<li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a>
								</li>
								<li><a href="#"><i class="ti-settings"></i> Account Setting</a>
								</li>
								<li><a href="../adminsystem/logout.php"><i class="fa fa-power-off"></i> Logout</a>
								</li>
							</ul>
							<!-- /.dropdown-user -->
						</li>
						<!-- /.dropdown -->
				</ul>
			</div>
			<!-- /.navbar-header -->
			<!-- /.navbar-top-links -->
			<!-- /.navbar-static-side -->
		</nav>
		<!-- Left navbar-header -->
		<div class="navbar-default sidebar" role="navigation">
			<div class="sidebar-nav navbar-collapse slimscrollsidebar">
				<ul class="nav" id="side-menu">
					<li class="sidebar-search hidden-sm hidden-md hidden-lg">
						<!-- input-group -->
						<div class="input-group custom-search-form">
							<input type="text" class="form-control" placeholder="Search..."><span class="input-group-btn"><button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button></span>
						</div>
						<!-- /input-group -->
					</li>
					<li class="user-pro">
						<?php
						$adminimg = $hrmsyscon->query( "select * from admininfo where email='{$_SESSION['email']}'" );
						while ( $resultadminimg = $adminimg->fetch_array() ) {
							?>
						<a href="#" class="waves-effect"><img src="admin-panel/profile-picture/<?php echo $resultadminimg['admin_img']; ?>" alt="user-img" class="img-circle">
						<span class="hide-menu">
						
						<?php echo $resultadminimg['fname'].'  '. $_SESSION['lname']; ?>
						<?php 
							}
						?>
							<span class="fa arrow"></span>
                        </span>
                        </a>
						<ul class="nav nav-second-level">
							<li><a href="#"><i class="ti-user"></i> My Profile</a>
							</li>
							<li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a>
							</li>
							<li><a href="#"><i class="ti-settings"></i> Account Setting</a>
							</li>
							<li><a href="../adminsystem/logout.php"><i class="fa fa-power-off"></i> Logout</a>
							</li>
						</ul>
					</li>
					<li class="nav-small-cap m-t-10">---</li>
					<li> <a href="index.php" class="waves-effect"><i class="ti-home p-r-10"></i> <span class="hide-menu">Home</span></a> </li>
					<li> <a href="product-upload-new.php" class="waves-effect"><i class="fa fa-pencil p-r-10"></i> <span class="hide-menu">Upload Products</span></a> </li>
					<li> <a href="order-place-new.php" class="waves-effect"><i class="fa fa-shopping-cart p-r-10"></i> <span class="hide-menu">Place Order</span></a> </li>
					<li><a href="javascript:void(0);" class="waves-effect"><span style="color:#01c0c8"> <i class="fa fa-archive p-r-10"></i> <span class="hide-menu">Records/Archive<span class="fa arrow"></span></span></span></a>
						<ul class="nav nav-second-level">
							<li> <a href="order-record.php" class="waves-effect"><i class="fa fa-briefcase p-r-10"></i> <span class="hide-menu">Order Record</span></a> </li>
							<li> <a href="customerinfo.php" class="waves-effect"><i class="fa fa-user p-r-10"></i> <span class="hide-menu">Customer Record</span></a> </li>
							<li> <a href="product-archive.php" class="waves-effect"><i class="fa fa-shopping-basket p-r-10"></i> <span class="hide-menu">Products Archive</span></a> </li>
						</ul>
					</li>
					<li><a href="javascript:void(0);" class="waves-effect"><span style="color:red"> <i class="fa fa-dollar p-r-10"></i> <span class="hide-menu">Expenses/ Bills<span class="fa arrow"></span></span></span></a>
						<ul class="nav nav-second-level">
							<li> <a href="expenses-bills-personal-new.php">Add Personal Bills</a>
							</li>
							<li> <a href="expenses-bills-company-new.php">Add Company Expenses</a>
							</li>
							<li> <a href="javascript:void(0);" class="waves-effect"><span class="hide-menu">View Expenses<span class="fa arrow"></span></span></a>
								<ul class="nav nav-third-level">
									<li> <a href="expenses-bills-personal-view.php">Personal Bills</a>
									</li>
									<li> <a href="expenses-bills-company-view.php">Company Expenses</a>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					<li class="nav-small-cap">---</li>
					<li><a href="../adminsystem/logout.php" class="waves-effect"><i class="icon-logout fa-fw"></i> <span class="hide-menu">Log out</span></a>
					</li>
				</ul>
			</div>
		</div>
		<!-- Left navbar-header end -->
		<!-- Page Content -->
		<div id="page-wrapper">
			<div class="container-fluid">
				<div class="row bg-title">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						<h4 class="page-title">Earning Details</h4> </div>
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						<ol class="breadcrumb">
							<li><a href="index.php">Dashboard</a>
							</li>
							<li class="active">Earning Details</li>
						</ol>
					</div>
				</div>
				<!-- /.row -->
				<!-- .row -->
				<div class="row">
					<div class="col-md-12 col-xs-12">
						<div class="white-box">
							<div class="el-card-item">
								<div class="el-card-avatar el-overlay-1" align="middle">
									<h1>Earning Details</h1>
								</div>
							</div>
							<div class="user-btm-box">
								<!-- .row -->
								<div class="row text-center m-t-10">
									<div class="col-md-4 b-r"><strong>Total Investment</strong>
										<h2>
											<?php
											$suminvestment = $hrmsyscon->query( "select *, sum(mcost*preceived) as total_investment from productinfo" );
											while ( $resultsuminvestment = $suminvestment->fetch_array() ) {
												?>
											<?php echo $resultsuminvestment['total_investment']; ?>
											<?php 
												}
											?> <small>Taka</small>
										</h2>
									</div>
									<div class="col-md-4 b-r"><strong>Total Earning</strong>
										<h2>
											<?php
											$sumprice = $hrmsyscon->query( "select *, sum(pcost) as total_price from sells_info" );
											while ( $resultsumprice = $sumprice->fetch_array() ) {
												?>
											<?php echo $resultsumprice['total_price']; ?>
											<?php 
											}
										?> <small>Taka</small>
										</h2>
									</div>
									<div class="col-md-4"><strong>Total Profit</strong>
										<h2> <small>Taka</small>
                                    	</h2>
									</div>
								</div>
								<!-- /.row -->
							</div>
						</div>
					</div>
				</div>
				<!-- /.row -->
			</div>
			<!-- /.container-fluid -->
			<footer class="footer text-center"> 2018 &copy; Metro Lifestyle Dashboard. Develped by <span style="color:deepskyblue">SRA HRMSYSTEM</span> </footer>
		</div>
		<!-- /#page-wrapper -->
	</div>
	<!-- /#wrapper -->
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
	<!-- Flot Charts JavaScript -->
	<script src="plugins/bower_components/flot/jquery.flot.js"></script>
	<script src="plugins/bower_components/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
	<!-- Custom Theme JavaScript -->
	<script src="js/custom.min.js"></script>
	<!-- Magnific popup JavaScript -->
	<script src="plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
	<script src="plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>
	<!--Style Switcher -->
	<script src="plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>