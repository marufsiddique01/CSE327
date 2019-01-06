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
					<li>Setup</li>
					<li class="active">Status List</li>
				</ol>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="white-box">
					<div class="padding-bottom-15">
						<div class="col-12 col-sm-12 col-md-6 col-lg-9 col-xl-9">
							<h3 class="box-title m-b-0">Status List</h3>
							<span><p class="text-muted m-b-0">All data provided by admin</p></span>
						</div>
						<div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 m-b-5">
							<a href="<?php echo base_url("statusinsert"); ?>" class="btn btn-block btn-black"><i class="fa fa-plus-square p-r-10"></i> Add New Status</a>
						</div>
					</div>
					<div class="table-responsive">
						<table id="demo-foo-addrow" class="toggle-circle table-hover">
							<thead>
								<tr class="tabletrpad1">
									<th class="tabletdpad tdr" data-toggle="true"> Status </th>
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
								if($status_list > 0){
							 	foreach($status_list as $row):
							?>
								<tr class="tabletrpad">
									<td class="tabletdpad1">
										<?php echo $row->statustitle;?>
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
	
	
<script>
//	MAIN AJAX starts
	$( document ).on( 'click', '#submit', function () {
		
			var form = $('#validateForm')[0];	// Get form
			var data = new FormData(form);		// Create an FormData object

			$.ajax( {
				url: "<?php echo base_url("statusuploaded"); ?>",	// Url to which the request is send
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