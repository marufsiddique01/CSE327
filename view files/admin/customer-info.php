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
	<title>Customer Record || Metro Lifestyle</title>
	<!-- Bootstrap Core CSS -->
	<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
	<link href="plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
	<link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css"/>
	<!-- Menu CSS -->
	<link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
	<!-- animation CSS -->
	<link href="css/animate.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="css/style.min.css" rel="stylesheet">
	<!-- Footable CSS -->
	<link href="plugins/bower_components/footable/css/footable.core.css" rel="stylesheet">
	<link href="plugins/bower_components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet"/>
	<!-- color CSS -->
	<link href="css/colors/megna.css" id="theme" rel="stylesheet">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="fix-sidebar">
	<!-- Preloader -->
	<div class="preloader">
		<div class="cssload-speeding-wheel"></div>
	</div>
	<div id="wrapper">
		<!-- Top Navigation -->
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
						<!-- <ul class="dropdown-menu mailbox animated bounceInDown">
                            <li>
                                <div class="drop-title">You have 4 new messages</div>
                            </li>
                            <li>
                                <div class="message-center">
                                    <a href="#">
                                        <div class="user-img"> <img src="plugins/images/users/pawandeep.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                        <div class="mail-contnet">
                                            <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                                    </a>
                                    <a href="#">
                                        <div class="user-img"> <img src="plugins/images/users/sonu.jpg" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                                        <div class="mail-contnet">
                                            <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
                                    </a>
                                    <a href="#">
                                        <div class="user-img"> <img src="plugins/images/users/arijit.jpg" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
                                        <div class="mail-contnet">
                                            <h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </div>
                                    </a>
                                    <a href="#">
                                        <div class="user-img"> <img src="plugins/images/users/pawandeep.jpg" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                                        <div class="mail-contnet">
                                            <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <a class="text-center" href="javascript:void(0);"> <strong>See all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>-->
						<!-- /.dropdown-messages -->
					</li>
					<!-- /.dropdown -->
					<li class="dropdown"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><i class="icon-note"></i>
          <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
          </a>
						<!--<ul class="dropdown-menu dropdown-tasks animated slideInUp">
                            <li>
                                <a href="#">
                                    <div>
                                        <p> <strong>Task 1</strong> <span class="pull-right text-muted">40% Complete</span> </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <p> <strong>Task 2</strong> <span class="pull-right text-muted">20% Complete</span> </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%"> <span class="sr-only">20% Complete</span> </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <p> <strong>Task 3</strong> <span class="pull-right text-muted">60% Complete</span> </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%"> <span class="sr-only">60% Complete (warning)</span> </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <p> <strong>Task 4</strong> <span class="pull-right text-muted">80% Complete</span> </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%"> <span class="sr-only">80% Complete (danger)</span> </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="#"> <strong>See All Tasks</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>-->
						<!-- /.dropdown-tasks -->
					</li>
					<!-- /.dropdown -->
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
		<!-- End Top Navigation -->
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
						<h4 class="page-title">Admin Dashboard</h4> </div>
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						<ol class="breadcrumb">
							<li><a href="#">Dashboard</a>
							</li>
							<li class="active">Customer Information</li>
						</ol>
					</div>
					<!-- /.col-lg-12 -->
				</div>
				<!-- /row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="white-box">
							<h3 class="box-title m-b-0">Customer Order Information</h3>
							<p class="text-muted m-b-30">Export data to Copy, CSV, Excel, PDF & Print</p>
							<div class="table-responsive">
								<table id="example23" class="display nowrap" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th> ID </th>
											<th> Name </th>
											<th> Phone </th>
											<th> FB ID </th>
											<th style="text-align: center"> Points </th>
											<th> Address </th>
										</tr>
									</thead>
									<tbody>
										<?php
										$query = "SELECT * FROM customer_info ORDER BY c_fname ASC";
										$result_set = mysqli_query( $hrmsyscon, $query );
										while ( $row = mysqli_fetch_array( $result_set ) ) {
											?>
										<tr>
											<td>
												<?php echo $row['c_ID'] ?>
											</td>
											<td>
												<?php echo $row['c_fname'] ?>
											</td>
											<td>
												<?php echo $row['c_phone'] ?>
											</td>
											<td>
												<?php echo $row['c_fbID'] ?>
											</td>
											<td style="text-align: center">
												<?php echo $row['c_orderqty'] ?>
											</td>
											<td>
												<?php echo $row['c_address'] ?>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
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
	<!-- Custom Theme JavaScript -->
	<script src="js/custom.min.js"></script>
	<script src="plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
	<!-- Footable -->
	<script src="plugins/bower_components/footable/js/footable.all.min.js"></script>
	<script src="plugins/bower_components/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
	<!--FooTable init-->
	<script src="js/footable-init.js"></script>
	<!-- start - This is for export functionality only -->
	<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
	<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
	<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
	<!-- end - This is for export functionality only -->
	<script>
		$( document ).ready( function () {
			$( '#myTable' ).DataTable();
			$( document ).ready( function () {
				var table = $( '#example' ).DataTable( {
					"columnDefs": [
						{
							"visible": false
							,
							"targets": 2
						}
					]
					,
					"order": [
						[ 2, 'asc' ]
					]
					,
					"displayLength": 25
					,
					"drawCallback": function ( settings ) {
						var api = this.api();
						var rows = api.rows( {
							page: 'current'
						} ).nodes();
						var last = null;
						api.column( 2, {
							page: 'current'
						} ).data().each( function ( group, i ) {
							if ( last !== group ) {
								$( rows ).eq( i ).before( '<tr class="group"><td colspan="5">' + group + '</td></tr>' );
								last = group;
							}
						} );
					}
				} );
				// Order by the grouping
				$( '#example tbody' ).on( 'click', 'tr.group', function () {
					var currentOrder = table.order()[ 0 ];
					if ( currentOrder[ 0 ] === 2 && currentOrder[ 1 ] === 'asc' ) {
						table.order( [ 2, 'desc' ] ).draw();
					} else {
						table.order( [ 2, 'asc' ] ).draw();
					}
				} );
			} );
		} );
		$( '#example23' ).DataTable( {
			"order": [
				[ 0, "desc" ]
			],
			dom: 'Bfrtip'
			,
			buttons: [
				'copy', 'csv', 'excel', 'pdf', 'print'
			]
		} );
	</script>
	<!--Style Switcher -->
	<script src="plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>