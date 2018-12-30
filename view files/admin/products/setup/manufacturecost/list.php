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
					<li>Product Settings</li>
					<li class="active">Manufacture Cost List</li>
				</ol>
			</div>
			<!-- /.col-lg-12 -->
		</div>
<!--
		<div class="row">
			<div class="col-sm-12">
				<div class="white-box">
					<h3 class="box-title m-b-0">Manufacture Cost Upload</h3>
					<p class="text-muted m-b-30 font-13">Upload Manufacture Cost Information: </p>
					
					<form id="validateForm" action="#" class="form-horizontal" method="POST" enctype="multipart/form-data" autocomplete="off">
						<div class="form-group">
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Item Code:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
									<select name="itemid" id="itemid" class="required">
										<option value="">Select</option>
										<?php
											//foreach($item_list_all as $row):
										?>
										<option value="<?php //echo $row->id;?> ">
											<?php //echo $row->parentid;?> 
										</option>
										<?php //endforeach ?>
									</select>
								</div>
							</div>
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Suppiler Code:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
									<select name="supplierid" id="supplierid" class="required">
										<option value="">Select</option>
										<?php
											//foreach($supplier_list as $row):
										?>
										<option value="<?php //echo $row->id;?> ">
											<?php //echo $row->suppliername;?>
										</option>
										<?php //endforeach ?>
									</select>
								</div>
							</div>
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Item Raw Cost:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
									<input type="number" class="form-control" name="itemrawcost" id="itemrawcost" min=0 oninput="validity.valid||(value='');"> 
								</div>
							</div>
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Color Cost:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
									<input type="number" class="form-control" name="colorcost" id="colorcost" min=0 oninput="validity.valid||(value='');"> 
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Branding Cost:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
									<input type="number" class="form-control" name="brandingcost" id="brandingcost" min=0 oninput="validity.valid||(value='');"> 
								</div>
							</div>
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Additional Cost:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
									<input type="number" class="form-control" name="additionalcost" id="additionalcost" min=0 oninput="validity.valid||(value='');"> 
								</div>
							</div>
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Shipping Cost:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
									<input type="number" class="form-control" name="shippingcost" id="shippingcost" min=0 oninput="validity.valid||(value='');"> 
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Purchased By:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
									<input type="text" class="form-control" name="purchasedby" id="purchasedby"> 
								</div>
							</div>
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Purchased Date:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
									<input type="text" class="form-control mydatepicker" name="purchase_at" id="purchase_at"> 
								</div>
							</div>
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Received By:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
									<input type="text" class="form-control" name="receivedby" id="receivedby"> 
								</div>
							</div>
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Received Date:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
									<input type="text" class="form-control mydatepicker" name="receive_at" id="receive_at"> 
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Status:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
									<select name="status" id="status" class="required">
										<option value="">Select</option>
										<?php
											//foreach($status_list as $row):
										?>
										<option value="<?php //echo $row->statustitle;?> ">
											<?php //echo $row->statustitle;?>
										</option>
										<?php //endforeach ?>
									</select>
								</div>
							</div>
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Remark/ Note:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-5">
									<textarea class="form-control" rows="4" name="remarks" id="remarks"></textarea>
								</div>
							</div>
							<label class="control-label col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 hidden">Post Author </label>
							<div class="col-md-2 hidden">
								<input type="text" class="form-control col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 hidden" name="createdby" id="createdby" value="<?php echo $metadata['id']; ?>" readonly>
							</div>
						</div>
						<button type="button" name="submit" id="submit" class="btn btn-black waves-effect waves-light m-r-10">Submit</button>
					</form>
				</div>
			</div>
		</div>
-->
		<div class="row">
			<div class="col-sm-12">
				<div class="white-box">
					<div class="padding-bottom-15">
						<div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9">
							<h3 class="box-title m-b-0">Manufacture Cost Record</h3>
							<span><p class="text-muted m-b-20">All data provided by admin</p></span>
						</div>
<!--
						<div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3">
							<a href="<?php //echo base_url("productupload"); ?>" class="btn btn-block btn-black"><i class="fa fa-plus-square p-r-10"></i> Add New Manufacturecost</a>
						</div>
-->
					</div>
					<div class="table-responsive">
						<table id="demo-foo-addrow" class="toggle-circle table-hover">
							<thead>
								<tr class="tabletrpad1">
									<th class="tabletdpad tdr" data-toggle="true">Item Code</th>
									<th class="tabletdpad tdr">Total</th>
									<th class="tabletdpad tdr">Item</th>
									<th class="tabletdpad tdr" data-hide="phone">Color</th>
									<th class="tabletdpad tdr" data-hide="phone">Branding</th>
									<th class="tabletdpad tdr" data-hide="phone">Additionals</th>
									<th class="tabletdpad tdr" data-hide="phone">Shipping</th>
									<th class="tabletdpad tdr" data-hide="all"> </th>
									<th class="tabletdpad tdr" data-hide="all">Post Information</th>
									<th class="tabletdpad tdr" data-hide="all">Posted By</th>
									<th class="tabletdpad tdr" data-hide="all">Posted Emp. ID</th>
									<th class="tabletdpad">Action</th>
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
								if($manufacturecost_list>0){
							 	foreach($manufacturecost_list as $row):
							?>
								<tr class="tabletrpad">
									<td class="tabletdpad1">
										<?php echo $row->itemcode;?> (<?php echo $row->sizeshortcode;?>)
									</td>
									<td class="tabletdpad">
										<?php echo $row->itemcost;?>
									</td>
									<td class="tabletdpad">
										<?php echo $row->itemrawcost;?>
									</td>
									<td class="tabletdpad">
										<?php echo $row->colorcost;?>
									</td>
									<td class="tabletdpad">
										<?php echo $row->brandingcost;?>
									</td>
									<td class="tabletdpad">
										<?php echo $row->additionalcost;?>
									</td>
									<td class="tabletdpad">
										<?php echo $row->shippingcost;?>
									</td>
									<td></td>
									<td></td>
									<td class="tabletdpad">
										<?php echo $row->adminname;?>
									</td>
									<td class="tabletdpad">
										<?php echo $row->admincode;?>
									</td>
									<td>
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
	
<script>
//	select2 code starts
	$( document ).ready( function () {
			$( "#status" ).select2();				
			$( "#supplierid" ).select2();				
			$( "#itemid" ).select2();				
		} );
//	select2 code ends
</script>		
<script>
//	MAIN AJAX starts
	$( document ).on( 'click', '#submit', function () {
		
			var form = $('#validateForm')[0];	// Get form
			var data = new FormData(form);		// Create an FormData object

			$.ajax( {
				url: "<?php echo base_url("manufacturecostuploaded"); ?>",	// Url to which the request is send
				type		: "POST",	// Type of request to be send, called as method
				dataType	: "JSON",	// Retrieve json data
				data		: data,		// Data sent to server (i.e. form fields and values)
				processData	: false,	// To send DOMDocument or non processed data file
				contentType	: false,	// The content type used when sending data to the server.
				cache		: false,	// To unable request pages to be cached
				async		: false,	// Will hold the execution of rest code
				success: function (data) {		
					if(data.status=='error'){	// Error message
						$.toast({
							heading: 'Error',
							text: data.message,
							position: 'bottom-right',
							loaderBg:'#ff6849',
							icon: 'error',
							hideAfter: 3000
						  });
					}else{						// Success message
						$('.form-control').val('');
						$.toast({
							heading: 'Success',
							text: data.message,
							position: 'bottom-right',
							loaderBg:'#33CEA8',
							icon: 'success',
							hideAfter: 3500, 
							stack: 6
						  });
					}
				},
				error: function () {
				}
			} );	
		} );
//	MAIN AJAX ends
</script>
	
<!--Validation code starts    -->
<script>
	$().ready( function () {
		// validate signup form on keyup and submit
		$( "#validateForm" ).validate( {
			errorPlacement: function () {
				return false; // remove error message text
			}
		} );
	} );
</script>
<!--Validation code ends    -->
<!--PreventNumberInput code ends    -->
<script>
	function preventNumberInput( e ) {
		var keyCode = ( e.keyCode ? e.keyCode : e.which );
		if ( keyCode > 47 && keyCode < 58 ) {
			e.preventDefault();
		}
	}
	$( document ).ready( function () {
		$( '#onlytext' ).keypress( function ( e ) {
			preventNumberInput( e );
		} );
	} );
</script>
<!--PreventNumberInput code ends    -->
</body>
</html>