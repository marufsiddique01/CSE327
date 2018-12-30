<?php include APPPATH.'views/partial/admin/main-header.php';?>
<!-- Page Content -->
<div id="page-wrapper">

	<div class="container-fluid">
		<div class="row bg-title">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h4 class="page-title">Admin Dashboard</h4> </div>
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
					<li>Dashboard</li>
					<li>Product Setup</li>
					<li class="active">Product List</li>
				</ol>
			</div>
		</div>
		<!-- /row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="white-box">
					<div class="padding-bottom-15">
						<div class="col-12 col-sm-12 col-md-6 col-lg-9 col-xl-8">
							<h3 class="box-title m-b-0">Product List </h3>
							<span><p class="text-muted m-b-0">All data provided by admin</p></span>
						</div>
						<div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-2 m-b-5">
							<a href="<?php echo base_url("productupload"); ?>" class="btn btn-block btn-black"><i class="fa fa-plus-square p-r-10"></i> Add New</a>
						</div>
						<div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-2 m-b-10">
							<a href="<?php echo base_url("itemsizeupload"); ?>" class="btn btn-block btn-black"><i class="fa fa-plus-square p-r-10"></i> Add Details</a>
						</div>
					</div>
					<div class="table-responsive">
<!--					<table id="demo-foo-addrow" class="toggle-circle table-hover">-->
						<table id="demo-foo-addrow" class=" m-b-0 toggle-circle table-hover" data-page-size="5">
							<thead>
								<tr class="tabletrpad1">
									<th class="tabletdpad tdr" data-toggle="true"> Code </th>
									<th class="tabletdpad tdr"> Name </th>
									<th class="tabletdpad tdr"> Image </th>
									<th class="tabletdpad tdr"> Price </th>
									<th class="tabletdpad tdr"> Stock </th>
									<th class="tabletdpad tdr" data-hide="phone"> Store </th>
									<th class="tabletdpad tdr" data-hide="all"> Size </th>
	<!--
									<th class="tabletdpad tdr" data-hide="all"> Size </th>
									<th class="tabletdpad tdr" data-hide="all"> Total Sold </th>
									<th class="tabletdpad tdr" data-hide="all"> Received date </th>
									<th class="tabletdpad tdr" data-hide="all"> Received </th>
									<th class="tabletdpad tdr" data-hide="all"> Restock </th>
									<th class="tabletdpad tdr" data-hide="all"> Problem </th>
									<th class="tabletdpad tdr" data-hide="all"> Returned </th>
	-->
									<th class="tabletdpad tdr"> Status </th>
									<th class="tablethpad" > Action </th>
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
								if($item_list_all>0){
									foreach ( $item_list_all as $row ): ?>

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
	<!--
									<td class="tabletdpad">
										<div class="label label-box">
											<?php //echo $row->totalsold;?>
										</div>
									</td>
									<td class="tabletdpad">
										<?php //echo $row->pstocklocation;?>
									</td>
									<td class="tabletdpad">
										<?php //echo $row->preceiveddate;?>
									</td>
									<td class="tabletdpad">
										<div class="label label-box">
											<?php //echo $row->preceived;?>
										</div>
									</td>
									<td class="tabletdpad">
										<div class="label label-table label-danger">
											<?php //echo $row->prejected;?>
										</div>
									</td>
									<td class="tabletdpad">
										<div class="label label-table label-danger">
											<?php //echo $row->preturned;?>
										</div>
									</td>
	-->
									<td class="tabletdpad">
										<div class="label label-table label-info">
											<?php echo $row['statustitle'];?>
										</div>
									</td>
									<td class="tabletdpad text-nowrap">
										<a href="javascript:void(0)" onclick="edit_confirm('<?php echo $row['itemcode'];?>')" data-toggle="tooltip" data-placement="bottom" title="Update"><span class="editicon"><i class="fa fa-pencil"></i></span></a>
										<a href="javascript:void(0)" onclick="deletedata('<?php echo $row['itemcode']; ?>')" data-toggle="tooltip" data-placement="bottom" title="Inactive"><span class="deleteicon"><i class="fa fa-trash"></i></span></a>
									</td>
								</tr>
								<?php endforeach;} ?>
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
		<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
	<?php include APPPATH.'views/partial/admin/main-footer.php';?>

	<script type="text/javascript">
		function edit_confirm(productcode){
			swal({ 
				title: "Are you sure you want to edit this record?",   
				text: "Once edited no way to get this information back!!",   
				type: "warning",   
				showCancelButton: true,   
				confirmButtonColor: "#DD6B55",   
				confirmButtonText: "Yes",   
				cancelButtonText: "No",   
				closeOnConfirm: false,   
				closeOnCancel: true 
			}, 
			function(isConfirm){   
				if (isConfirm) 
				{   
					window.location = "<?php echo base_url("productedit"); ?>?editpdata=" + productcode;   
				} 
			});
		}
	</script>
	<script>
	  function deletedata(deletepdata)
	  {
		swal({
		  title: "Are you sure you want to inactive this record?",
		  text: "Once inactivated, contact to administrator to get this information back!",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  confirmButtonText: "Yes, inactive it!",
		  closeOnConfirm: false
		},
		function(){
		  $.ajax({
			  url: "<?php echo base_url("productinactive"); ?>",
			  type: "post",
			  data: {deletepdata:deletepdata},
			  success: function (data) {		
					if(data.status=='success'){	// Success message
						swal(data.message, ' ', 'success');   
//						$("#row_"+deletepdata).fadeTo("slow", 0.7, function(){
//						  $(this).remove();
//						});
					}else{						// Error message
						swal(data.message, 'error');
					}
				},
			  error:function(){

			  }
		  });

		});
	  }
	</script>
	</body>
	</html>