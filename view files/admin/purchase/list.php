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
					<li>Expenses/Bills</li>
					<li class="active">Purchase Bills Records</li>
				</ol>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="white-box">
					<div class="padding-bottom-15">
						<div class="col-12 col-sm-12 col-md-6 col-lg-9 col-xl-9">
							<h3 class="box-title m-b-0">Purchase Record</h3>
							<span><p class="text-muted m-b-0">All data provided by admin</p></span>
						</div>
<!--
						<div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 m-b-5">
							<a href="<?php //echo base_url("purchaseupload"); ?>" class="btn btn-block btn-black"><i class="fa fa-plus-square p-r-10"></i> Add New Purchase</a>
						</div>
-->
					</div>
					<div class="table-responsive">
						<table id="demo-foo-addrow" class="toggle-circle table-hover">
							<thead>
								<tr class="tabletrpad1">
									<th class="tabletdpad tdr" data-toggle="true" data-hide="phone"> Code </th>
									<th class="tabletdpad tdr" data-hide="phone"> Recv. Date </th>
									<th class="tabletdpad tdr"> Item Code </th>
									<th class="tabletdpad tdr"> Quantity </th>
									<th class="tabletdpad tdr"> Amount </th>
									<th class="tabletdpad tdr"> Invoice Image </th>
									<th class="tabletdpad tdr" data-hide="all"> Purchased By </th>
									<th class="tabletdpad tdr" data-hide="all"> Purchased Date </th>
									<th class="tabletdpad tdr" data-hide="all"> Received By </th>
									<th class="tabletdpad tdr" data-hide="all"> Received Date </th>
									<th class="tabletdpad tdr" data-hide="all"> </th>
									<th class="tabletdpad tdr" data-hide="all"> Post Information </th>
									<th class="tabletdpad tdr" data-hide="all"> Posted By </th>
									<th class="tabletdpad tdr" data-hide="all"> Posted Emp. ID </th>
									<th class="tabletdpad"> Action </th>
								</tr>
							</thead>
								<div class="form-inline padding-bottom-15">
									<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-right m-b-10">
										<div class="form-group">
											<input id="demo-input-search2" type="text" placeholder="Search" class="form-control" autocomplete="off"> </div>
									</div>
								</div>
							<tbody>
								
							<?php
								if($purchase_list > 0){
							 	foreach($purchase_list as $row):
									//if($row->createdby == $metadata['id']){
							?>
								<tr class="tabletrpad">
									<td class="tabletdpad1">
										<?php echo $row->purchasecode;?>
									</td>
									<td class="tabletdpad">
										<?php echo $row->received_at;?>
									</td>
									<td class="tabletdpad">
										<?php echo $row->itemid;?>
									</td>
									<td class="tabletdpad">
										<?php echo $row->quantity;?>
									</td>
									<td class="tabletdpad">
										<?php echo $row->totalcost;?>
									</td>
									<td class="tabletdpad">
										<div class="el-card-item">
											<div class="el-card-avatar el-overlay-1"> <a class="image-popup-vertical-fit" href="<?php echo base_url("assets/admin/"); ?>upload-images/bills/purchase-bills/<?php echo $row->invoiceimage; ?>"><img class="tableimagebill" src="<?php echo base_url("assets/admin/"); ?>upload-images/bills/purchase-bills/<?php echo $row->invoiceimage; ?>"></a>
											</div>
										</div>
									</td>
									<td class="tabletdpad">
										<?php echo $row->purchasedby;?>
									</td>
									<td class="tabletdpad">
										<?php echo $row->purchase_at;?>
									</td>
									<td class="tabletdpad">
										<?php echo $row->receivedby;?>
									</td>
									<td class="tabletdpad">
										<?php echo $row->received_at;?>
									</td>
									<td></td>
									<td></td>
									<td class="tabletdpad">
										<?php echo $row->adminname;?>
									</td>
									<td class="tabletdpad">
										<?php echo $row->admincode;?>
									</td>
									<td class="tabletdpad">
										<a href="../dashboard/order-update.php?editid=<?php echo $row->id;?>" onclick="return confirm('Are you sure you want to edit this Record? Once edited no way to get this information back!!');" title="Edit"><span  class="editicon"><i class="fa fa-pencil"></i></span></a>
										<a href="../system/order-update.php?returnid=<?php echo $row->id;?>" onclick="return confirm('Are you sure you want to mark the order as returned? Once action taken no way to make changes again!!');" title="Returned"><span  class="returnicon"><i class="fa fa-warning"></i></span></a>
									</td>
								</tr>
								<?php endforeach; }?>
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
		</div>
		<!-- .right-sidebar -->
	</div>
	<!-- /.container-fluid -->
<?php include APPPATH.'views/partial/admin/main-footer.php';?>
	</body>
	</html>