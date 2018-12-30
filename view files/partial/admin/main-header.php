<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $metadata['title']; ?></title>
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url("assets/admin/"); ?>plugins/images/favicon.png">
	<!-- Bootstrap Core CSS -->
	<link href="<?php echo base_url("assets/admin/"); ?>bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url("assets/admin/"); ?>plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
	<!-- Data Table CSS -->
	<link href="<?php echo base_url("assets/admin/"); ?>plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url("assets/admin/"); ?>cbn/css/buttons.dataTables.min.css" rel="stylesheet"/>
    <!-- toast CSS -->
    <link href="<?php echo base_url("assets/admin/"); ?>plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">

	<!-- Footable CSS -->
	<link href="<?php echo base_url("assets/admin/"); ?>plugins/bower_components/footable/css/footable.core.css" rel="stylesheet">
	<link href="<?php echo base_url("assets/admin/"); ?>plugins/bower_components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet"/>
	<!-- Popup CSS -->
	<link href="<?php echo base_url("assets/admin/"); ?>plugins/bower_components/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
	<!-- Menu CSS -->
	<link href="<?php echo base_url("assets/admin/"); ?>plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
	<!-- morris CSS -->
	<link href="<?php echo base_url("assets/admin/"); ?>plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
	<!-- animation CSS -->
	<link href="<?php echo base_url("assets/admin/"); ?>css/animate.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="<?php echo base_url("assets/admin/"); ?>css/style.min.css" rel="stylesheet">
	
	<link href="<?php echo base_url("assets/admin/"); ?>css/custom.css" rel="stylesheet">
	<!--alerts CSS -->
	<link href="<?php echo base_url("assets/admin/"); ?>plugins/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
	<!-- Date Picker CSS -->
	<link href="<?php echo base_url("assets/admin/"); ?>plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css"/>
<!--	<link href="<?php //echo base_url("assets/admin/"); ?>css/mystyle.css" rel="stylesheet">-->
	<!-- Select tool CSS -->
	<link href="<?php echo base_url("assets/admin/"); ?>bootstrap-select2/select2.css" rel="stylesheet"/>
	<!-- color CSS -->
	<link href="<?php echo base_url("assets/admin/"); ?>css/colors/megna.css" id="theme" rel="stylesheet">
	<!-- jQuery -->
	<script src="<?php echo base_url("assets/admin/"); ?>plugins/bower_components/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/admin/"); ?>js/typeahead.js"></script>

	<!-- Css Files-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/admin/"); ?>css/jquery-ui.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/admin/"); ?>css/bootstrap-tokenfield.min.css">

	<script src="<?php echo base_url("assets/admin/"); ?>js/jquery-ui.min.js"></script>
	<script src="<?php echo base_url("assets/admin/"); ?>js/bootstrap-tokenfield.js"></script>
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header" id="stylescroll">
	<!-- Preloader -->
	<div class="preloader">
		<div class="cssload-speeding-wheel"></div>
	</div>
	<div id="wrapper">
		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-static-top m-b-0">
			<div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
				<div class="top-left-part"><a class="logo" href="index.php"><img class="headerlogo" src="<?php echo base_url("assets/admin/"); ?>plugins/images/logow.png" alt="Home" />
					<span class="hidden-xs logotitle"><strong>Metro</strong> Lifestyle</span></a>
				</div>
				<ul class="nav navbar-top-links navbar-left hidden-xs">
					<li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a>
					</li>
<!--
					<li>
						<form role="search" class="app-search hidden-xs">
							<input type="text" id="demo-input-search2" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
					</li>
-->
				</ul>
				<ul class="nav navbar-top-links navbar-right pull-right">
					<li class="dropdown"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><i class="icon-envelope"></i>
          <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
          </a>
                    </li>
                    <!-- /.dropdown -->
                    <li class="dropdown"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" title="Add new items"><i class="icon-note"></i>
          <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
          </a>
                        <ul class="dropdown-menu dropdown-tasks animated slideInUp">
                            <li>
                                <a href="<?php echo base_url("neworder"); ?>">
                                    <div>
                                        <p><i class="icon-note"></i> Add new order</p>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?php echo base_url("newproductupload"); ?>">
                                    <div>
                                        <p><i class="icon-note"></i> Add new product</p>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?php echo base_url("newpersonalexpense"); ?>">
                                    <div>
                                        <p><i class="icon-note"></i> Add new personal bill</p>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?php echo base_url("newcompanyexpense"); ?>">
                                    <div>
                                        <p><i class="icon-note"></i> Add new company bill</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <!-- /.dropdown-tasks -->
                    </li>
                    <!-- /.dropdown -->
					<li class="dropdown">
						<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="<?php echo base_url("assets/admin/"); ?>admin-profile-picture/<?php echo $metadata['adminimage']; ?>" width="40" height="40" class="img-circle"><b class="hidden-xs"></b><?php echo $metadata['adminname']; ?></a>
                         
						<ul class="dropdown-menu dropdown-user animated flipInY">
							<li><a href="#"><i class="ti-user"></i> My Profile</a>
							</li>
							<li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a>
							</li>
							<li><a href="#"><i class="ti-settings"></i> Account Setting</a>
							</li>
							<li><a href="<?php echo base_url("adminlogout"); ?>"><i class="fa fa-sign-out"></i> Logout</a>
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
					<li> <a href="<?php echo base_url("dashboard"); ?>" class="waves-effect"><i class="ti-home p-r-10"></i> <span class="hide-menu">Home</span></a> </li>
					<li> <a href="<?php echo base_url("neworder"); ?>" class="waves-effect"><i class="fa fa-cloud-upload p-r-10"></i> <span class="hide-menu">Place Order</span></a> </li>
<!--					<li> <a href="<?php echo base_url("productupload"); ?>" class="waves-effect"><i class="fa fa-upload p-r-10"></i> <span class="hide-menu">Upload Products</span></a> </li>-->
					<li><a href="javascript:void(0);" class="waves-effect"> <i class="fa fa-shopping-cart p-r-10"></i> <span class="hide-menu">Product Setup<span class="fa arrow"></span></span></a>
						<ul class="nav nav-second-level">
							<li> <a href="<?php echo base_url("itemlist"); ?>" class="waves-effect"><i class="fa fa-cogs p-r-10"></i> <span class="hide-menu">Product List</span></a> </li>
							<li> <a href="<?php echo base_url("colorlist"); ?>" class="waves-effect"><i class="fa fa-paint-brush p-r-10"></i> <span class="hide-menu">Color</span></a> </li>
							<li> <a href="<?php echo base_url("categorylist"); ?>" class="waves-effect"><i class="fa fa-tags p-r-10"></i> <span class="hide-menu">Category</span></a> </li>
							<li> <a href="<?php echo base_url("sizecodelist"); ?>" class="waves-effect"><i class="fa fa-cubes p-r-10"></i> <span class="hide-menu">Size Code</span></a> </li>
							<li> <a href="<?php echo base_url("dimensionlist"); ?>" class="waves-effect"><i class="fa fa-object-ungroup p-r-10"></i> <span class="hide-menu">Size Dimension</span></a> </li>
							<li> <a href="<?php echo base_url("manufacturecostlist"); ?>" class="waves-effect"><i class="fa fa-money p-r-10"></i> <span class="hide-menu">Manufacture Cost</span></a> </li>
						</ul>
					</li>
					<li><a href="javascript:void(0);" class="waves-effect"> <i class="fa fa-building-o p-r-10"></i> <span class="hide-menu">Store Setup<span class="fa arrow"></span></span></a>
						<ul class="nav nav-second-level">
							<li> <a href="<?php echo base_url("storelist"); ?>" class="waves-effect"><i class="fa fa-cog p-r-10"></i> <span class="hide-menu"> Stores</span></a> </li>
						</ul>
					</li>
					<li><a href="javascript:void(0);" class="waves-effect"> <i class="fa fa-truck p-r-10"></i> <span class="hide-menu">Supplier Setup<span class="fa arrow"></span></span></a>
						<ul class="nav nav-second-level">
							<li> <a href="<?php echo base_url("supplierlist"); ?>" class="waves-effect"><i class="fa fa-cog p-r-10"></i> <span class="hide-menu"> Suppliers</span></a> </li>
						</ul>
					</li>
					<li><a href="javascript:void(0);" class="waves-effect"> <i class="fa fa-dollar p-r-10"></i> <span class="hide-menu">Expenses/ Bills<span class="fa arrow"></span></span></a>
						<ul class="nav nav-second-level">
							<li> <a href="<?php echo base_url("covincelist"); ?>"><i class="fa fa-money p-r-10"></i> Convince Bills</a>
							</li>
							<li> <a href="<?php echo base_url("purchaselist"); ?>"><i class="fa fa-money p-r-10"></i> Product Purchase</a>
							</li>
<!--
							<li> <a href="javascript:void(0);" class="waves-effect"><span class="hide-menu"><i class="fa fa-file-text p-r-10"></i> View Expenses<span class="fa arrow"></span></span></a>
								<ul class="nav nav-third-level">
									<li> <a href="<?php //echo base_url("viewpersonalexpense"); ?>"><i class="fa fa-file-text p-r-10"></i> Personal Bills</a>
									</li>
									<li> <a href="<?php //echo base_url("viewcompanyexpense"); ?>"><i class="fa fa-file-text p-r-10"></i> Company Expenses</a>
									</li>
								</ul>
							</li>
-->
						</ul>
					</li>
					<li><a href="javascript:void(0);" class="waves-effect"> <i class="fa fa-archive p-r-10"></i> <span class="hide-menu">Records/Archive<span class="fa arrow"></span></span></a>
						<ul class="nav nav-second-level">
							<li> <a href="<?php echo base_url("orderrecord"); ?>" class="waves-effect"><i class="fa fa-briefcase p-r-10"></i> <span class="hide-menu">Order Record</span></a> </li>
							<li> <a href="<?php echo base_url("customerrecord"); ?>" class="waves-effect"><i class="fa fa-user p-r-10"></i> <span class="hide-menu">Customer Record</span></a> </li>
						</ul>
					</li>
					<li><a href="javascript:void(0);" class="waves-effect"> <i class="fa fa-bar-chart p-r-10"></i> <span class="hide-menu">Reports<span class="fa arrow"></span></span></a>
						<ul class="nav nav-second-level">
							<li> <a href="<?php echo base_url("productreports"); ?>" class="waves-effect"><i class="fa fa-pie-chart p-r-10"></i> <span class="hide-menu">Products Reports</span></a> </li>
							<li> <a href="<?php echo base_url("comingsoon"); ?>" class="waves-effect"><i class="fa fa-pie-chart p-r-10"></i> <span class="hide-menu">Sales Reports</span></a> </li>
						</ul>
					</li>
					<li class="nav-small-cap">---</li>
					<li><a href="javascript:void(0);" class="waves-effect"><span class=""> <i class="fa fa-cogs p-r-10"></i> <span class="hide-menu">Setup<span class="fa arrow"></span></span></span></a>
						<ul class="nav nav-second-level">
							<li> <a href="<?php echo base_url("statuslist"); ?>" class="waves-effect"><i class="fa fa-cog p-r-10"></i> <span class="hide-menu">Status</span></a> </li>
							<li> <a href="<?php echo base_url("lockscreenlogolist"); ?>" class="waves-effect"><i class="fa fa-cog p-r-10"></i> <span class="hide-menu">Lockscreen Logo</span></a> </li>
							<li> <a href="javascript:void(0)"> <i class="fa fa-cog p-r-10"></i>Setup</a>
							</li>
							<li> <a href="javascript:void(0)"> <i class="fa fa-cog p-r-10"></i>Setup</a>
							</li>
							<li> <a href="javascript:void(0);" class="waves-effect"><span class="hide-menu"> <i class="fa fa-cog p-r-10"></i>Setup<span class="fa arrow"></span></span></a>
								<ul class="nav nav-third-level">
									<li> <a href="javascript:void(0)"> <i class="fa fa-cog p-r-10"></i>Setup</a>
									</li>
									<li> <a href="javascript:void(0)"> <i class="fa fa-cog p-r-10"></i>Setup</a>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					<li><a href="<?php echo base_url("adminlogout"); ?>" class="waves-effect"><i class="fa fa-sign-out"></i> <span class="hide-menu">Log out</span></a>
					</li>
				</ul>
			</div>
		</div>
		<!-- Left navbar-header end -->