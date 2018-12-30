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
					<li class="active">Size Code Upload</li>
				</ol>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="white-box">
					<div class=" m-b-20 col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="col-12 col-sm-12 col-md-6 col-lg-9 col-xl-9">
							<h3 class="box-title m-b-0">Size Code Upload</h3>
							<span><p class="text-muted m-b-20">Upload Size Code Information:</p></span>
						</div>
						<div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 m-b-5">
							<a href="<?php echo base_url("sizecodelist"); ?>" class="btn btn-block btn-black"><i class="fa fa-list p-r-10"></i> Size Code List</a>
						</div>
					</div>
					<form id="validateForm" action="#" class="form-horizontal" method="POST" enctype="multipart/form-data" autocomplete="off">
						<div class="form-group">
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-2 col-lg-1 col-xl-1">Size Title:</label>
								<div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">
									<input type="text" class="form-control" name="sizetitle" id="sizetitle" required="">
								</div>
							</div>
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-2 col-lg-1 col-xl-1">Size Code:</label>
								<div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">
									<input type="text" class="form-control" name="sizeshortcode" id="sizeshortcode" required="">
								</div>
							</div>
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-2 col-lg-1 col-xl-1">Status:</label>
								<div class="col-12 col-sm-12 col-md-4 col-lg-2 col-xl-2 inputpad">
									<select name="status" id="status" class="required">
										<?php
										if($sizelist>0){
											foreach($sizelist as $row):
										?>
										<option value="<?php echo $row->id;?> ">
											<?php echo $row->statustitle;?>
										</option>
										<?php endforeach;} ?>
									</select>
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
		<!-- .right-sidebar -->
	</div>
	<!-- /.container-fluid -->
<?php include APPPATH.'views/partial/admin/main-footer.php';?>
	
<script>
//	select2 code starts
	$( document ).ready( function () {
			$( "#status" ).select2();				
		} );
//	select2 code ends
</script>		
<script>
//	MAIN AJAX starts
	$( document ).on( 'click', '#submit', function () {
		
			var form = $('#validateForm')[0];	// Get form
			var data = new FormData(form);		// Create an FormData object

			$.ajax( {
				url: "<?php echo base_url("sizecodeuploaded"); ?>",	// Url to which the request is send
				type		: "POST",	// Type of request to be send, called as method
				dataType	: "JSON",	// Retrieve json data
				data		: data,		// Data sent to server (i.e. form fields and values)
				processData	: false,	// To send DOMDocument or non processed data file
				contentType	: false,	// The content type used when sending data to the server.
				cache		: false,	// To unable request pages to be cached
				async		: false,	// Will hold the execution of rest code
				success: function (data) {		
					if(data.status=='success'){						// Success message
						$('.form-control').val('');
						$('#status').val('').trigger("change");
						$.toast({
							heading: 'Success',
							text: data.message,
							position: 'bottom-right',
							loaderBg:'#33CEA8',
							icon: 'success',
							hideAfter: 3500, 
							stack: 6
						  });
					}else{	// Error message
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