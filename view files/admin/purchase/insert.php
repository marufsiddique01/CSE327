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
					<li class="active">Purchase Bills Upload</li>
				</ol>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="white-box">
					<div class=" m-b-20 col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9">
							<h3 class="box-title m-b-0">Purchase Bill Upload</h3>
							<span><p class="text-muted m-b-20">Upload Purchase Bill Information:</p></span>
						</div>
						<div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3">
							<a href="<?php echo base_url("purchaselist"); ?>" class="btn btn-block btn-black"><i class="fa fa-list p-r-10"></i> Purchase Bills Record</a>
						</div>
					</div>
					<form id="validateForm" action="#" class="form-horizontal" method="POST" enctype="multipart/form-data" autocomplete="off">
						<div class="form-group">
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Item ID:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
									<select name="itemid" id="itemid" class="required">
										<option value="">Select</option>
										<?php
											foreach($item_list as $row):
										?>
										<option value="<?php echo $row->id;?> ">
											<?php echo $row->itemcode;?> 
											(<?php echo $row->itemname;?>)
										</option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Quantity:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
									<input type="number" class="form-control" name="quantity" id="quantity" min=0 oninput="validity.valid||(value='');" required="">
								</div>
							</div>
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Total Amount:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
									<input type="number" class="form-control" name="totalcost" id="totalcost" min=0 oninput="validity.valid||(value='');" required="">
								</div>
							</div>
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Supplier ID:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
									<select name="supplierid" id="supplierid" class="required">
										<option value="">Select</option>
										<?php
											foreach($supplier_list as $row):
										?>
										<option value="<?php echo $row->id;?>">
											<?php echo $row->suppliername;?>
										</option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Purchased by:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
									<input type="text" class="form-control" name="purchasedby" id="purchasedby" required="">
								</div>
							</div>
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Purchase Date:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
									<input type="text" class="form-control mydatepicker" name="purchase_at" id="purchase_at" required>
								</div>
							</div>
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Received by:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
									<input type="text" class="form-control" name="receivedby" id="receivedby" required="">
								</div>
							</div>
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Received Date:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
									<input type="text" class="form-control mydatepicker" name="received_at" id="received_at" required>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="ipadform">
								<label class="control-label control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Upload bill photo:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-5">
									<div class="fileinput fileinput-new input-group" data-provides="fileinput">
									<div class="form-control" data-trigger="fileinput">
										<i class="glyphicon glyphicon-file fileinput-exists"></i>
										<span class="fileinput-filename"></span>
									</div>
									<span class="input-group-addon btn btn-black btn-file">
									<span class="fileinput-new">Select file</span>
									<span class="fileinput-exists">Change</span>
									<input type="file" name="invoiceimage" id="invoiceimage">
									</span>
									<a href="#" class="input-group-addon btn btn-black fileinput-exists fileclear" data-dismiss="fileinput">Remove</a>
									</div>
								</div>
							</div>
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Status:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
									<select name="status" id="status" class="required">
										<?php
											foreach($status_list as $row):
										?>
										<option value="<?php echo $row->id;?> ">
											<?php echo $row->statustitle;?>
										</option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Detailed information:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
									<textarea class="form-control" rows="5" name="remark" id="remark" required></textarea>
								</div>
							</div>
						</div>
						<div class="hidden ipadform">
							<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Issued By:</label>
							<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
								<input type="text" class="form-control col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " id="createdby" name="createdby" value="<?php echo $metadata['id']; ?>" readonly>
							</div>
						</div>
						<button type="button" name="submit" id="submit" class="btn btn-black waves-effect waves-light m-r-10">Submit</button>
					</form>
				</div>
			</div>
		</div>
		<!-- .right-sidebar -->
	</div>
	<!-- /.container-fluid -->
<?php include APPPATH.'views/partial/admin/main-footer.php';?>
	<!--Validation code starts    -->
<script>
//	MAIN AJAX starts
	$( document ).on( 'click', '#submit', function () {
	
//			var info = {
//				"productcode"		: $('#productcode').val()
//			};
			var form = $('#validateForm')[0];	// Get form
			var data = new FormData(form);		// Create an FormData object

			$.ajax( {
				url: "<?php echo base_url("purchaseuploaded"); ?>",	// Url to which the request is send
				type		: "POST",	// Type of request to be send, called as method
				dataType	: "JSON",	// Retrieve json data
				data		: data,		// Data sent to server (i.e. form fields and values)
				processData	: false,	// To send DOMDocument or non processed data file
				contentType	: false,	// The content type used when sending data to the server.
				cache		: false,	// To unable request pages to be cached
				async		: false,	// Will hold the execution of rest code
				success: function (data) {		
					if(data.status=='success'){	// Success message
						$('.form-control').val('');
						$( ".fileclear" ).trigger( "click" );
						$('#itemid').val('').trigger("change");
						$('#supplierid').val('').trigger("change");
						$.toast({
							heading: 'Success',
							text: data.message,
							position: 'bottom-right',
							loaderBg:'#33CEA8',
							icon: 'success',
							hideAfter: 3500, 
							stack: 6
						  });
						
					}else{						// Error message
						$.toast({
							heading: 'Error',
							text: data.message,
							position: 'bottom-right',
							loaderBg:'#ff6849',
							icon: 'error',
							hideAfter: 3000
						  });
					}
				},
				error: function () {
				}
			} );	
		} );
//	MAIN AJAX ends
</script>	
	<script>
//	select2 code starts
	$( document ).ready( function () {
			$( "#itemid" ).select2();				
			$( "#supplierid" ).select2();				
			$( "#status" ).select2();				
		} );
//	select2 code ends
</script>	
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