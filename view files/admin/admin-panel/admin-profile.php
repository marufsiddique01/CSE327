<?php
include("../../adminsystem/checklogin.php");
?>
<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">

    <meta name="author" content="">

    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">

    <title>Metro Lifestyle || Dashboard</title>

    <!-- Bootstrap Core CSS -->

    <link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">

    <!-- Menu CSS -->

    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">

    <!-- animation CSS -->

    <link href="../css/animate.css" rel="stylesheet">

    <!-- Custom CSS -->

    <link href="../css/style.min.css" rel="stylesheet">

                              

    <!-- color CSS -->

    <link href="../css/colors/megna.css" id="theme" rel="stylesheet">

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

    <div id="wrapper">

        <!-- Navigation -->

        <nav class="navbar navbar-default navbar-static-top m-b-0">

            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>

                <div class="top-left-part"><a class="logo" href="../index.php"><img src="../plugins/images/logownns.png" alt="Home" /><span class="hidden-xs">
                
                <strong>Metro</strong> Lifestyle</span></a></div>

                <ul class="nav navbar-top-links navbar-left hidden-xs">

                    <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>

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
						<?php
							$adminimg=$hrmsyscon->query("select * from admininfo where email='{$_SESSION['email']}'");
							while($resultadminimg=$adminimg->fetch_array())
							{
						?>
                       
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="../admin-panel/profile-picture/<?php echo $resultadminimg['admin_img']; ?>" width="40" height="40" class="img-circle"><b class="hidden-xs">
                        
                        <?php echo $resultadminimg['fname'].'  '. $_SESSION['lname']; ?>
                        
						<?php 
							}
						?>
                         </b> </a>

                        <ul class="dropdown-menu dropdown-user animated flipInY">

                            <li><a href="#"><i class="ti-user"></i> My Profile</a></li>

                            <li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a></li>

                            <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>

                            <li><a href="../../adminsystem/logout.php"><i class="fa fa-power-off"></i> Logout</a></li>

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
                           
                            <input type="text" class="form-control" placeholder="Search..."> <span class="input-group-btn">
							<button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button></span> 
                        </div>

                        <!-- /input-group -->

                    </li>

                    <li class="user-pro">
						<?php
							$adminimg=$hrmsyscon->query("select * from admininfo where email='{$_SESSION['email']}'");
							while($resultadminimg=$adminimg->fetch_array())
							{
						?>
                       
                        <a href="#" class="waves-effect"><img src="../admin-panel/profile-picture/<?php echo $resultadminimg['admin_img']; ?>" alt="user-img" class="img-circle">
						<span class="hide-menu">
						
						<?php echo $resultadminimg['fname'].'  '. $_SESSION['lname']; ?>

						<?php 
							}
						?>
							<span class="fa arrow"></span>
                        </span>

                        </a>

                        <ul class="nav nav-second-level">

                            <li><a href="#"><i class="ti-user"></i> My Profile</a></li>

                            <li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a></li>

                            <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>

                            <li><a href="../../adminsystem/logout.php"><i class="fa fa-power-off"></i> Logout</a></li>

                        </ul>

                    </li>

                    <li class="nav-small-cap m-t-10">---</li>

                    <li> <a href="../index.php" class="waves-effect"><i class="ti-home p-r-10"></i> <span class="hide-menu">Home</span></a> </li>
                    
                    <li> <a href="../product-upload-new.php" class="waves-effect"><i class="fa fa-pencil p-r-10"></i> <span class="hide-menu">Upload Products</span></a> </li>
                    
                    <li> <a href="../order-place-new.php" class="waves-effect"><i class="fa fa-shopping-cart p-r-10"></i> <span class="hide-menu">Place Order</span></a> </li>
                    
                    <li><a href="javascript:void(0);" class="waves-effect"><span style="color:#01c0c8"> <i class="fa fa-archive p-r-10"></i> <span class="hide-menu">Records/Archive<span class="fa arrow"></span></span></span></a>

                        <ul class="nav nav-second-level">

                            <li> <a href="../order-record.php" class="waves-effect"><i class="fa fa-briefcase p-r-10"></i> <span class="hide-menu">Order Record</span></a> </li>
                    
							<li> <a href="../customerinfo.php" class="waves-effect"><i class="fa fa-user p-r-10"></i> <span class="hide-menu">Customer Record</span></a> </li>

							<li> <a href="../product-archive.php" class="waves-effect"><i class="fa fa-shopping-basket p-r-10"></i> <span class="hide-menu">Products Archive</span></a> </li>

                        </ul>

                    </li>
                    
                    <li><a href="javascript:void(0);" class="waves-effect"><span style="color:red"> <i class="fa fa-dollar p-r-10"></i> <span class="hide-menu">Expenses/ Bills<span class="fa arrow"></span></span></span></a>

                        <ul class="nav nav-second-level">

                            <li> <a href="../expenses-bills-personal-new.php">Add Personal Bills</a></li>

                            <li> <a href="../expenses-bills-company-new.php">Add Company Expenses</a></li>

                            <li> <a href="javascript:void(0);" class="waves-effect"><span class="hide-menu">View Expenses<span class="fa arrow"></span></span></a>
                            
                            	<ul class="nav nav-third-level">

									<li> <a href="../expenses-bills-personal-view.php">Personal Bills</a></li>

									<li> <a href="../expenses-bills-company-view.php">Company Expenses</a></li>

                        		</ul>
                            
                            </li>

                        </ul>

                    </li>
                    
                    <li class="nav-small-cap">---</li>

                    <li><a href="../../adminsystem/logout.php" class="waves-effect"><i class="icon-logout fa-fw"></i> <span class="hide-menu">Log out</span></a></li>

                </ul>

            </div>

        </div>

        <!-- Left navbar-header end -->

        <!-- Page Content -->

        <div id="page-wrapper">

            <div class="container-fluid">

                <div class="row bg-title">

                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">

                        <h4 class="page-title">Patient Profile</h4> </div>

                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> <a href="" target="_blank" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Buy Now</a>

                        <ol class="breadcrumb">

                            <li><a href="#">Hospital</a></li>

                            <li class="active">Patient Profile</li>

                        </ol>

                    </div>

                </div>

                <!-- /.row -->

                <!-- .row -->

                <div class="row">

                    <div class="col-md-4 col-xs-12">

                        <div class="white-box">
						<?php
							$adminimg=$hrmsyscon->query("select * from admininfo where email='{$_SESSION['email']}'");
							while($resultadminimg=$adminimg->fetch_array())
							{
						?>
                            <div class="user-bg"> <img width="300px" alt="user" src="../admin-panel/profile-picture/<?php echo $resultadminimg['admin_img']; ?>"> </div>
						<?php } ?>
                            <div class="user-btm-box">

                                <!-- .row -->

                                <div class="row text-center m-t-10">

                                    <div class="col-md-6 b-r"><strong>Name</strong>

                                        <p>Jonathan Doe</p>

                                    </div>

                                    <div class="col-md-6"><strong>Occupation</strong>

                                        <p>Engineer</p>

                                    </div>

                                </div>

                                <!-- /.row -->

                                <hr>

                                <!-- .row -->

                                <div class="row text-center m-t-10">

                                    <div class="col-md-6 b-r"><strong>Email ID</strong>

                                        <p>jondoe@gmail.com</p>

                                    </div>

                                    <div class="col-md-6"><strong>Phone</strong>

                                        <p>+123 456 789</p>

                                    </div>

                                </div>

                                <!-- /.row -->

                                <hr>

                                <!-- .row -->

                                <div class="row text-center m-t-10">

                                    <div class="col-md-12"><strong>Address</strong>

                                        <p>E104, Dharti-2, Chandlodia Ahmedabad

                                            <br/> Gujarat, India.</p>

                                    </div>

                                </div>

                                <hr>

                                <!-- /.row -->

                                <div class="col-md-4 col-sm-4 text-center">

                                    <p class="text-purple"><i class="ti-facebook"></i></p>

                                    <h1>258</h1> </div>

                                <div class="col-md-4 col-sm-4 text-center">

                                    <p class="text-blue"><i class="ti-twitter"></i></p>

                                    <h1>125</h1> </div>

                                <div class="col-md-4 col-sm-4 text-center">

                                    <p class="text-danger"><i class="ti-google"></i></p>

                                    <h1>140</h1> </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-8 col-xs-12">

                        <div class="white-box">

                            <div class="row">

                                <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>

                                    <br>

                                    <p class="text-muted">Johnathan Deo</p>

                                </div>

                                <div class="col-md-3 col-xs-6 b-r"> <strong>Mobile</strong>

                                    <br>

                                    <p class="text-muted">(123) 456 7890</p>

                                </div>

                                <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>

                                    <br>

                                    <p class="text-muted">john@admin.com</p>

                                </div>

                                <div class="col-md-3 col-xs-6"> <strong>Disease</strong>

                                    <br>

                                    <p class="text-muted">Fever</p>

                                </div>

                            </div>

                            <hr>

                            <p class="m-t-30">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>

                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries </p>

                            <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

                        </div>

                    </div>

                </div>

                <!-- /.row -->

                <!-- .right-sidebar -->

                <div class="right-sidebar">

                    <div class="slimscrollright">

                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>

                        <div class="r-panel-body">

                            <ul>

                                <li><b>Layout Options</b></li>

                                <li>

                                    <div class="checkbox checkbox-info">

                                        <input id="checkbox1" type="checkbox" class="fxhdr">

                                        <label for="checkbox1"> Fix Header </label>

                                    </div>

                                </li>

                                <li>

                                    <div class="checkbox checkbox-warning">

                                        <input id="checkbox2" type="checkbox" checked="" class="fxsdr">

                                        <label for="checkbox2"> Fix Sidebar </label>

                                    </div>

                                </li>

                                <li>

                                    <div class="checkbox checkbox-success">

                                        <input id="checkbox4" type="checkbox" class="open-close">

                                        <label for="checkbox4"> Toggle Sidebar </label>

                                    </div>

                                </li>

                            </ul>

                            <ul id="themecolors" class="m-t-20">

                                <li><b>With Light sidebar</b></li>

                                <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>

                                <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>

                                <li><a href="javascript:void(0)" data-theme="gray" class="yellow-theme">3</a></li>

                                <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme">4</a></li>

                                <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>

                                <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme working">6</a></li>

                                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>

                                <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>

                                <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>

                                <li><a href="javascript:void(0)" data-theme="gray-dark" class="yellow-dark-theme">9</a></li>

                                <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>

                                <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>

                                <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme">12</a></li>

                            </ul>

                            <ul class="m-t-20 chatonline">

                                <li><b>Chat option</b></li>

                                <li>

                                    <a href="javascript:void(0)"><img src="plugins/images/users/varun.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>

                                </li>

                                <li>

                                    <a href="javascript:void(0)"><img src="plugins/images/users/genu.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>

                                </li>

                                <li>

                                    <a href="javascript:void(0)"><img src="plugins/images/users/ritesh.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>

                                </li>

                                <li>

                                    <a href="javascript:void(0)"><img src="plugins/images/users/arijit.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>

                                </li>

                                <li>

                                    <a href="javascript:void(0)"><img src="plugins/images/users/govinda.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>

                                </li>

                                <li>

                                    <a href="javascript:void(0)"><img src="plugins/images/users/hritik.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>

                                </li>

                                <li>

                                    <a href="javascript:void(0)"><img src="plugins/images/users/john.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>

                                </li>

                                <li>

                                    <a href="javascript:void(0)"><img src="plugins/images/users/pawandeep.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>

                                </li>

                            </ul>

                        </div>

                    </div>

                </div>

                <!-- /.right-sidebar -->

            </div>

            <!-- /.container-fluid -->

            <footer class="footer text-center"> 2018 &copy; Metro Lifestyle Dashboard. Develped by <span style="color:deepskyblue">SRA HRMSYSTEM</span> </footer>

        </div>

        <!-- /#page-wrapper -->

    </div>

    <!-- /#wrapper -->

    <!-- jQuery -->

    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->

    <script src="../bootstrap/dist/js/tether.min.js"></script>

    <script src="../bootstrap/dist/js/bootstrap.min.js"></script>

    <script src="../plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>

    <!-- Menu Plugin JavaScript -->

    <script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>

    <!--slimscroll JavaScript -->

    <script src="../js/jquery.slimscroll.js"></script>

    <!--Wave Effects -->

    <script src="../js/waves.js"></script>

    <!-- Flot Charts JavaScript -->

    <script src="../plugins/bower_components/flot/jquery.flot.js"></script>

    <script src="../plugins/bower_components/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>

    <!-- Custom Theme JavaScript -->

    <script src="../js/custom.min.js"></script>

    

</body>



</html>