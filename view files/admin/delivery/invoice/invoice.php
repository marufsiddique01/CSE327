<?php include APPPATH.'views/partial/admin/main-header.php';?>
<!-- Page Content -->
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row bg-title">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h4 class="page-title">Admin Dashboard</h4> </div>
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
					<li><a href="index.php">Dashboard</a></li>
					<li>Order Records</li>
					<li class="active">Invoice page</li>
				</ol>
			</div>
			<!-- /.col-lg-12 -->
		</div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box printableArea">
							<?php
								if($invoicedetails > 0){
									foreach($invoicedetails as $row):
							?>
                            <h3><b>INVOICE</b> <span class="pull-right">#<?php echo $row['ordercode'];?></span></h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-left"> <address>
                                            <h3> &nbsp;<b class="text-danger">Metro Lifestyle</b></h3>
                                            <p class="text-muted m-l-5">
												Hotline - <a href="tel:+8801766932193">01766932193</a>,
												<br/> <a href="mailto:info@metrosoft.com">info@metrosoft.com</a>,
												<br/> 31/25, Block C,
                                                <br/> Tajmahal Road,
                                                <br/> Mohammadpur,
                                                <br/> Dhaka - 1207</p>
                                        </address> </div>
                                    <div class="pull-right text-right"> <address>
                                            <h3>To,</h3>
                                            <h4 class="font-bold"><?php echo $row['customername'];?>,</h4>
                                            <p class="text-muted m-l-30"><?php echo $row['customercode'];?></p>
                                            <p class="text-muted m-l-30"><?php echo $row['address'];?></p>
                                            <p class="text-muted m-l-30"><a href="tel:<?php echo $row['phone'];?>"><?php echo $row['phone'];?></a></p>
                                            <p class="text-muted m-l-30"><a href="mailto:<?php echo $row['email'];?>"><?php echo $row['email'];?></a></p>
                                            <p class="m-t-30"><b>Order Date :</b> <i class="fa fa-calendar"></i> <?php echo $row['created_at'];?></p>
                                            <p><b>Due Date :</b> <i class="fa fa-calendar"></i> <?php echo $row['deliveryon'];?></p>
                                        </address> </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="table-responsive m-t-40" style="clear: both;">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th class="text-center">Item Code</th>
                                                    <th class="text-center">Name</th>
                                                    <th class="text-center">Item Id</th>
                                                    <th class="text-center">Size</th>
                                                    <th class="text-right">Quantity</th>
                                                    <th class="text-right">Unit Cost</th>
                                                    <th class="text-right">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
												<?php if(!empty($row['item_info'])){
													$sl_count = 1;
													foreach ( $row['item_info'] as $row1 ): 
												?>
                                                <tr>
                                                    <td class="text-center">
														<?php echo $sl_count; $sl_count++; ?>
													</td>
                                                    <td class="text-center"><?php echo $row1->itemcode;?></td>
                                                    <td class="text-center"><?php echo $row1->itemname;?></td>
                                                    <td class="text-center"><?php echo $row1->productitemcode;?></td>
                                                    <td class="text-center"><?php echo $row1->sizeshortcode;?></td>
                                                    <td class="text-right"><?php echo $row1->quantity;?></td>
                                                    <td class="text-right"><?php echo $row1->sellprice;?></td>
                                                    <td class="text-right"><?php echo $row1->totalprice;?></td>
                                                </tr>
												<?php  endforeach; }?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="pull-right m-t-30 text-right">
                                        <p>Sub - Total amount: BDT <?php echo $row['finalprice'];?></p>
                                        <p>vat (0%) : BDT 0 </p>
                                        <hr>
                                        <h3><b>Total :</b> BDT <?php echo $row['finalprice'];?></h3> </div>
                                    <div class="clearfix"></div>
                                    <hr>
                                    <div class="text-right">
                                        <button class="btn btn-danger" type="submit"> Proceed to payment </button>
                                        <button id="print" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                                    </div>
                                </div>
                            </div>
						<?php endforeach;} ?>
                        </div>
                    </div>
                </div>
                <!-- .row -->
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
                                <br/>
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
	
<?php include APPPATH.'views/partial/admin/main-footer.php';?>
    <!-- Menu Plugin JavaScript -->
    <script src="js/jquery.PrintArea.js" type="text/JavaScript"></script>
    <script>
        $(document).ready(function () {
            $("#print").click(function () {
                var mode = 'iframe'; //popup
                var close = mode == "popup";
                var options = {
                    mode: mode
                    , popClose: close
                };
                $("div.printableArea").printArea(options);
            });
        });
    </script>
</body>
</html>