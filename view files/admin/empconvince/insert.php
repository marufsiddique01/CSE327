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
					<li class="active">Convince Bills Upload</li>
				</ol>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="white-box">
					<div class=" m-b-20 col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9">
							<h3 class="box-title m-b-0">Convince Bill Upload</h3>
							<span><p class="text-muted m-b-20">Upload Convince Bill Upload Information:</p></span>
						</div>
						<div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3">
							<a href="<?php echo base_url("covincelist"); ?>" class="btn btn-block btn-black"><i class="fa fa-list p-r-10"></i> Convince Bills Record</a>
						</div>
					</div>
					<form id="validateForm" action="#" class="form-horizontal" method="POST" enctype="multipart/form-data" autocomplete="off">
						<div class="form-group">
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Prepared by:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
									<input type="text" class="form-control" name="preparedby" id="preparedby" required="">
								</div>
							</div>
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Amount:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
									<input type="number" class="form-control" name="amount" id="amount" min=0 oninput="validity.valid||(value='');" required="">
								</div>
							</div>
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Date:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
									<input type="text" class="form-control mydatepicker" name="prepared_at" id="prepared_at" required>
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
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Upload bill photo:</label>
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
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Detailed information:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-5">
									<textarea class="form-control" rows="5" name="remark" id="remark" required></textarea>
								</div>
							</div>
						</div>
						<label class="control-label col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 hidden">Post Author </label>
						<div class="col-md-2 hidden">
							<input type="text" class="form-control col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" name="createdby" id="createdby" value="<?php echo $metadata['id']?>" readonly>
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
	
//			var info = {
//				"productcode"		: $('#productcode').val()
//			};
			var form = $('#validateForm')[0];	// Get form
			var data = new FormData(form);		// Create an FormData object

			$.ajax( {
				url: "<?php echo base_url("covinceuploaded"); ?>",	// Url to which the request is send
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