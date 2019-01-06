<?php include APPPATH.'views/partial/admin/main-header.php';?>
<!-- Page Content -->
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row bg-title">
			<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
				<h4 class="page-title">Product Details</h4> </div>
			<div class="col-lg-9 col-sm-8 col-md-9 col-xs-12">
				<ol class="breadcrumb">
					<li><a href="<?php echo base_url("dashboard"); ?>">Dashboard</a></li>
					<li>Reports</li>
					<li><a href="<?php echo base_url("productreports"); ?>">Products Reports</a></li>
					<li class="active">Product Report Details</li>
				</ol>
			</div>
		</div>
		<!-- /.row -->
		<!-- .row -->
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<div class="white-box">
					<?php
						if($productreportdetails > 0){
							foreach($productreportdetails as $row):
					?>
					<div class="el-card-item">
						<div class="el-card-avatar el-overlay-1" align="middle">
							<a class="user-bg image-popup-vertical-fit" href="<?php echo base_url("assets/admin/"); ?>upload-images/item-photos/items/<?php echo $row['itemimage']; ?>"><img class="productmidimg" src="<?php echo base_url("assets/admin/"); ?>upload-images/item-photos/items/<?php echo $row['itemimage']; ?>"></a>
						</div>
					</div>
					<div class="user-btm-box">
						<!-- .row -->
						<div class="row text-center m-t-10">
							<div class="col-md-4 b-r"><strong>Code</strong>
								<p>
									<?php echo $row['itemcode'];?>
								</p>
							</div>
							<div class="col-md-4 b-r"><strong>Name</strong>
								<p>
									<?php echo $row['itemname'];?>
								</p>
							</div>
							<div class="col-md-4"><strong>Current Price</strong>
								<p>
									<?php echo $row['sellprice'];?> Taka</p>
							</div>
						</div>
						<!-- /.row -->
						<hr>
						<!-- .row -->
						<div class="row text-center m-t-10">
							<div class="col-md-4 b-r"><strong>Product in stock</strong>
								<h4>
									<?php echo $row['currentstock'];?>
								</h4>
							</div>
							<div class="col-md-4 b-r"><strong>Total Earning</strong>
								<h2>
									<?php
									//$sum_totalearning = $row->totalsold * $row->pcost;
									//echo $sum_totalearning;
									?> Taka
								</h2>
							</div>
							<div class="col-md-4"><strong>Total Sold</strong>
								<h4>
									<?php //echo $row->totalsold;?>
								</h4>
							</div>
						</div>
						<!-- /.row -->
						<hr>
						<!-- .row -->
						<div class="row text-center m-t-10">
							<div class="col-md-12"><strong>Sizes avaiable</strong>
								<p style="font-size: 17px"><b>
									
								<?php if(!empty($row['stock_info'])){
									foreach ( $row['stock_info'] as $row1 ): ?>
									<?php echo $row1->sizeshortcode;?>: <span class="tableproductsize"><?php echo $row1->currentstock;?></span>,
								<?php  endforeach; }else{ ?>
									<span style="color: red">Not Available</span>
								<?php }?>
								</b>
								</p>
							</div>
						</div>
						<hr>
						<!-- /.row -->
						<!-- .row -->
						<div class="row text-center m-t-10">
							<div class="col-md-4 b-r"><strong>Total Received</strong>
								<p>
									<?php //echo $row->preceived;?>
								</p>
							</div>
							<div class="col-md-4 b-r"><strong>Received Date</strong>
								<p>
									<?php echo $row['created_at'];?>
								</p>
							</div>
							<div class="col-md-4"><strong>Stock location</strong>
								<p>
									<?php echo $row['storename'];?>
								</p>
							</div>
						</div>
						<hr>
						<!-- /.row -->
						<!-- .row -->
						<div class="row text-center m-t-10">
							<div class="col-md-4 b-r"><strong>Product Restock</strong>
								<p>
									<?php //echo $row->prestock;?>
								</p>
							</div>
							<div class="col-md-4 b-r"><strong>Product Returned</strong>
								<p class="prolemcount">
									<?php //echo $row->preturned;?>
								</p>
							</div>
							<div class="col-md-4"><strong>Product Rejected</strong>
								<p class="prolemcount">
									<?php //echo $row->prejected;?>
								</p>
							</div>
						</div>
						<hr>
						<!-- /.row -->
						<!-- .row -->
						<div class="row text-center m-t-10">
							<div class="col-md-3 b-r"><strong>Inital Price</strong>
								<p>
									<?php //echo $row['sellpriceold'];?> Taka</p>
							</div>
							<div class="col-md-3 b-r"><strong>Current Price</strong>
								<p class="tabletdcost">
									<?php echo $row['sellprice'];?> Taka</p>
							</div>
							<div class="col-md-3 b-r"><strong>Last Discounted Amount</strong>
								<p>
									<?php //echo $row['discountprice'];?> Taka</p>
							</div>
							<div class="col-md-3"><strong>Last Increased Amount</strong>
								<p>
									<?php //echo $row['increaseprice'];?> Taka</p>
							</div>
						</div>
						<hr>
						<!-- /.row -->
					</div>
					<?php endforeach;} ?>
				</div>
			</div>
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
<?php include APPPATH.'views/partial/admin/main-footer.php';?>
	</body>
	</html>