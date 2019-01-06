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
					<li><a href="<?php echo base_url("itemlist"); ?>">Product Setup</a></li>
					<li class="active">Product List</li>
					<li data-toggle="dropdown">Add New Product</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="white-box">
					<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-10">
							<h3 class="box-title m-b-0">New Item Upload</h3>
							<span><p class="text-muted m-b-20">Upload Item Information</p></span>
						</div>
						<div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-2" id="infobtn" style="display: none">
							<a href="<?php echo base_url("itemsizeupload"); ?>" class="btn btn-block btn-black"><i class="fa fa-plus-square p-r-10"></i> Add Size Info</a>
						</div>
					</div>
					<form id="validateForm" action="#" class="form-horizontal" method="POST" enctype="multipart/form-data" autocomplete="off">
						<p class="text-muted m-b-10 font-13">Basic Information: </p>
						<div class="form-group">
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Code: </label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
									<input type="text" class="form-control" name="itemcode" id="itemcode" class="typeahead">
								</div>
							</div>
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Name:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2 ">
									<input type="text" class="form-control asasa" name="itemname" id="itemname"> 
								</div>
							</div>
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Selling Price:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
									<input type="number" class="form-control asasa" name="sellprice" id="sellprice" min=0 oninput="validity.valid||(value='');"> 
								</div>
							</div>
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Category:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
									<select name="category" id="category" class="required">
										<option value="">Select</option>
										<?php
											foreach($category_list as $row):
										?>
										<option value="<?php echo $row->id;?>">
											<?php echo $row->category;?>
										</option>
										<?php endforeach ?>
									</select> 
								</div>
							</div>
						</div>
						<input class="form-control hidden" id="id" name="id">
						<div class="form-group">
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Store Name:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
									<select name="store" id="store" class="required">
									<option value="">Select</option>
									<?php
										foreach($store_list as $row):
									?>
									<option value="<?php echo $row->id;?>">
										<?php echo $row->storename;?>
									</option>
									<?php endforeach ?>
								</select> 
								</div>
							</div>
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Status:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
									<select name="status" id="status" class="required">
										<?php
											foreach($status_list as $row):
										?>
										<option value="<?php echo $row->id;?>">
											<?php echo $row->statustitle;?>
										</option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
						</div>
						<p class="text-muted m-b-30 font-13">Other Information: </p>
						<div class="ipadform">
							<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">File upload:</label>
							<div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-5">
								<div class="fileinput fileinput-new input-group" data-provides="fileinput">
								<div class="form-control" data-trigger="fileinput">
									<i class="glyphicon glyphicon-file fileinput-exists"></i>
									<span class="fileinput-filename"></span>
								</div>
								<span class="input-group-addon btn btn-black btn-file">
								<span class="fileinput-new">Select file</span>
								<span class="fileinput-exists">Change</span>
								<input type="file" name="itemimage" id="itemimage">
								</span>
								<a href="#" class="input-group-addon btn btn-black fileinput-exists fileclear" data-dismiss="fileinput">Remove</a>
							</div>
							</div>
						</div>
						<div class="form-group">
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Remarks/ Notes:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-5">
									<textarea class="form-control" rows="4" name="remark" id="remark"></textarea>
								</div>
							</div>
						</div>
						<label class="control-label col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 hidden">Post Author </label>
						<div class="col-md-2 hidden">
							<input type="text" class="form-control col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 hidden" name="createdby" id="createdby" value="<?php echo $metadata['id']; ?>" readonly>
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

	
<script>
	// select2
	$( document ).ready( function () {
		$( "#store" ).select2();		
		$( "#category" ).select2();		
		$( "#status" ).select2();				
	} );
	// select2 ends
	//	POST FORM AJAX starts
	$( document ).on( 'click', '#submit', function () {
		var form = $('#validateForm')[0];	// Get form
		var data = new FormData(form);		// Create an FormData object

		$.ajax( {
			url: "<?php echo base_url("productuploaded"); ?>",	// Url to which the request is send
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
					//fileclear
					$('#category').val('').trigger("change");
					$('#store').val('').trigger("change");
					$(".fileclear").trigger( "click" );
					$('#infobtn').show();
					
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
		});	
	});
	//	POST FORM AJAX ends
</script>
<script>
//	Validation code starts
	$().ready( function () {
		// validate signup form on keyup and submit
		$( "#validateForm" ).validate( {
			rules: {
				productcode: {
					: true
						//minlength: 2
				}
			},
			errorPlacement: function () {
					return false; // remove error message text
				}
		} );
	} );
//	Validation code ends
</script>
<script>
//	PreventNumberInput code ends
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
//	PreventNumberInput code ends
</script>
</body>
</html>