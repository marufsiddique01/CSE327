<?php include APPPATH.'views/partial/admin/main-header.php';?>
<!-- Page Content -->
<div id="page-wrapper">

	<div class="container-fluid">
		<div class="row bg-title">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h4 class="page-title">Admin Dashboard</h4> </div>
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
					<li class="active">Dashboard</li>
				</ol>
			</div>
		</div>
		<!--row -->
		<div class="row">
			<div class="col-md-3 col-sm-6">
				<div class="white-box">
					<div class="r-icon-stats"> <i class="ti-shopping-cart bg-info"></i>
						<div class="bodystate">
							<h4 id="currentstock">
								<?php echo $currentstock; ?>
							</h4>
							<span class="text-muted">In Stock</span> </div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="white-box">
					<div class="r-icon-stats"> <i class=" ti-check-box bg-success"></i>
						<div class="bodystate">
							<h4>
								<?php echo $totalsold; ?>
							</h4>
							<span class="text-muted">Sold</span> </div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="white-box">
					<div class="r-icon-stats"> <i class="ti-server"></i>
						<div class="bodystate">
							<h4>
								<?php echo $designquantity; ?>
							</h4>
							<span class="text-muted">Designs</span> </div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="white-box">
					<div class="r-icon-stats"> <i class="ti-money bg-inverse"></i>
						<div class="bodystate">
							<h4>
								<?php echo $totalearnings; ?>
							</h4>
							<span class="text-muted">Earning</span> </div>
					</div>
				</div>
			</div>
		</div>
		<!--/row -->
		<!-- /row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="white-box">
					<h3 class="box-title m-b-0">Product Inventory Record</h3>
					<p class="text-muted m-b-20">All data provided by admin</p>
					<table id="demo-foo-row-toggler" class="toggle-circle table-hover">
						<thead>
							<tr class="tabletrpad1">
								<th class="tabletdpad tdr" data-toggle="true"> Code </th>
								<th class="tabletdpad tdr" data-hide="phone"> Name </th>
								<th class="tabletdpad tdr"> Image </th>
								<th class="tabletdpad tdr"> Price </th>
								<th class="tabletdpad tdr"> Stock </th>
								<th class="tabletdpad tdr" data-hide="all"> Size </th>
<!--								<th class="tabletdpad tdr" data-hide="all"> Total Sold </th>-->
								<th class="tabletdpad " data-hide="phone"> Store </th>
<!--								<th class="tabletdpad tdr" data-hide="all"> Received </th>-->
<!--								<th class="tabletdpad tdr" data-hide="all"> Restock </th>-->
<!--								<th class="tabletdpad tdr" data-hide="all"> Problem </th>-->
<!--								<th class="tabletdpad tdr" data-hide="all"> Returned </th>-->
							</tr>
						</thead>
						<tbody>

							<?php 
							if($item_list > 0){
								foreach ( $item_list as $row ): ?>
							
							<tr class="tabletrpad" id="row_<?php echo $row['itemcode'];?>">
									<td class="tabletdpad1">
										<?php echo $row['itemcode'];?>
									</td>
									<td class="tabletdpad">
										<?php echo $row['itemname'];?>
									</td>
									<td class="tabletdpad">
										<div class="el-card-item">
											<div class="el-card-avatar el-overlay-1"> <a class="image-popup-vertical-fit" href="<?php echo base_url("assets/admin/"); ?>upload-images/item-photos/items/<?php echo $row['itemimage']; ?>"><img class="tableimage" src="<?php echo base_url("assets/admin/"); ?>upload-images/item-photos/items/<?php echo $row['itemimage']; ?>"></a>
											</div>
										</div>
									</td>
									<td class="tabletdcost">
										<?php echo $row['sellprice'];?>
									</td>
									<td class="tabletdpad">
										<?php if(!empty($row['currentstock'])){?>
											<div class="label label-box label-success">
												<?php echo $row['currentstock'];?>
											</div>
										<?php }else{ ?>
											<div class="label label-danger">
												0
											</div>
										<?php } ?>
									</td>
									<td class="tabletdpad">
										<?php if(!empty($row['stock_info'])){
											foreach ( $row['stock_info'] as $row1 ): ?>
											<div class="label label-box label-success">
												<?php echo $row1->sizeshortcode;?>:
												<?php echo $row1->currentstock;?>
											</div>
										<?php  endforeach; }else{ ?>
											<div class="label label-danger">
												Not Available
											</div>
										<?php }?>
									</td>
									<td class="tabletdpad">
										<?php if(!empty($row['storename'])){?>
										<div class="label label-box label-success">
											<?php echo $row['storename'];?>
										</div>
										<?php }else{ ?>
											<div class="label label-danger">
												Not Available
											</div>
										<?php } ?>
									</td>
								</tr>
							<?php endforeach;	} ?>
						</tbody>
						<tfoot>
							<tr>
								<td colspan="12">
									<div class="text-right paginationpad">
										<ul class="pagination"> </ul>
									</div>
								</td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
	<?php include APPPATH.'views/partial/admin/main-footer.php';?>
	</body>
	</html>