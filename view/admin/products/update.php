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
					<li class="active">Update Product</li>
				</ol>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="white-box">
					<h3 class="box-title m-b-0">Product Inventory (Update Product Information)</h3>
					<p class="text-muted m-b-30 font-13">Update Product Information </p>
					<form id="validateForm" action="#" class="form-horizontal" method="POST" enctype="multipart/form-data" autocomplete="off">
						<div class="form-group">
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Code:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
									<input type="text" class="form-control" name="itemcode" id="itemcode" readonly> 
								</div>
							</div>
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Name:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
									<input type="text" class="form-control" name="itemname" id="itemname"> 
								</div>
							</div>
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Price: <small>(BDT)</small></label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
									<input type="number" class="form-control" name="sellprice" id="sellprice" readonly>
								</div>
							</div>
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Received Date:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
									<input type="text" class="form-control mydatepicker" name="preceiveddate" id="preceiveddate" required>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Store Name:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
									<select name="storename" id="storename" class="required">
										<option name="">Select</option>
										<?php
											foreach($storelist as $row):
										?>
										<option value="<?php echo $row->id;?>">
											<?php echo $row->storename;?>
										</option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Total Stock:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
									<input type="number" class="form-control" name="" id="" readonly>
								</div>
							</div>
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">In Stock:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
									<input type="number" class="form-control" name="currentstock" id="currentstock" readonly>
								</div>
							</div>
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Re-stock QTY:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
									<input type="number" class="form-control" name="prestock" id="prestock" readonly>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Sold QTY:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
									<input type="number" class="form-control" name="totalsold" id="totalsold" readonly>
								</div>
							</div>
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Rejected QTY:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
									<input type="number" class="form-control" name="prejected" id="prejected" readonly>
								</div>
							</div>
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Returned QTY:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
									<input type="number" class="form-control" name="preturned" id="preturned" readonly>
								</div>
							</div>
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Giveaway QTY:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
									<input type="text" class="form-control" name="pgiveaway" id="pgiveaway" readonly>
								</div>
							</div>
						</div>
						<p class="text-muted m-b-30 font-13"><strong>Update Price:</strong> </p>
						<div class="form-group">
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Discount: <small>(BDT)</small></label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
									<input type="number" class="form-control cleardata" name="discount_price" min=0 oninput="validity.valid||(value='');" required>
								</div>
							</div>
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Increase: <small>(BDT)</small></label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
									<input type="number" class="form-control cleardata" name="increase_price" min=0 oninput="validity.valid||(value='');" required>
								</div>
							</div>
						</div>
						<p class="text-muted m-b-30 font-13 "><strong>Size Information:</strong> </p>
						<div class="form-group ">
							<label class="col-md-1">Small: </label>
							<div class="col-md-1">
								<input type="text" class="form-control" name="sizes" id="sizes" readonly> </div>
							<label class="col-md-1">Medium: </label>
							<div class="col-md-1">
								<input type="text" class="form-control" name="sizem" id="sizem" readonly> </div>
							<label class="col-md-1">Large: </label>
							<div class="col-md-1">
								<input type="number" class="form-control" name="sizel" id="sizel" readonly> </div>
							<label class="col-md-1">XL: </label>
							<div class="col-md-1">
								<input type="number" class="form-control" name="sizexl" id="sizexl" readonly> </div>
							<label class="col-md-1">XXL: </label>
							<div class="col-md-1">
								<input type="number" class="form-control" name="sizexxl" id="sizexxl" readonly> </div>
							<label class="col-md-1">XXXL: </label>
							<div class="col-md-1">
								<input type="number" class="form-control" name="sizexxxl" id="sizexxxl" readonly> </div>
						</div>
						<p class="text-muted m-b-30 font-13"><strong>Restock Size Quantity:</strong> </p>
						<div class="form-group">
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">S:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">
									<input type="number" class="form-control cleardata" name="restock_sizes" id="restock_sizes" min=0 oninput="validity.valid||(value='');">
								</div>
							</div>
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">M:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">
									<input type="number" class="form-control cleardata" name="restock_sizem" id="restock_sizem" min=0 oninput="validity.valid||(value='');">
								</div>
							</div>
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">L:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">
									<input type="number" class="form-control cleardata" name="restock_sizel" id="restock_sizel" min=0 oninput="validity.valid||(value='');">
								</div>
							</div>
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">XL:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">
									<input type="number" class="form-control cleardata" name="restock_sizexl" id="restock_sizexl" min=0 oninput="validity.valid||(value='');">
								</div>
							</div>
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">XXL:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">
									<input type="number" class="form-control cleardata" name="restock_sizexxl" id="restock_sizexxl" min=0 oninput="validity.valid||(value='');">
								</div>
							</div>
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">XXXL:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">
									<input type="number" class="form-control cleardata" name="restock_sizexxxl" id="restock_sizexxxl" min=0 oninput="validity.valid||(value='');">
								</div>
							</div>
						</div>
						<p class="text-muted m-b-30 font-13"><strong>Rejected Size Quantity:</strong> </p>
						<div class="form-group">
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">S:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">
									<input type="number" class="form-control cleardata" name="rejected_sizes" id="rejected_sizes" min=0 oninput="validity.valid||(value='');">
								</div>
							</div>
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">M:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">
									<input type="number" class="form-control cleardata" name="rejected_sizem" id="rejected_sizem" min=0 oninput="validity.valid||(value='');">
								</div>
							</div>
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">L:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">
									<input type="number" class="form-control cleardata" name="rejected_sizel" id="rejected_sizel" min=0 oninput="validity.valid||(value='');">
								</div>
							</div>
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">XL:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">
									<input type="number" class="form-control cleardata" name="rejected_sizexl" id="rejected_sizexl" min=0 oninput="validity.valid||(value='');">
								</div>
							</div>
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">XXL:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">
									<input type="number" class="form-control cleardata" name="rejected_sizexxl" id="rejected_sizexxl" min=0 oninput="validity.valid||(value='');">
								</div>
							</div>
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">XXXL:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">
									<input type="number" class="form-control cleardata" name="rejected_sizexxxl" id="rejected_sizexxxl" min=0 oninput="validity.valid||(value='');">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="ipadform">
								<label class="control-label col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">Remarks/ Notes:</label>
								<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
									<textarea class="form-control" rows="2" name="remark" id="remark"></textarea>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="ipadform">
								<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
									<div class="el-card-item">
									<div class="el-card-avatar el-overlay-1"><img id="exproductimage" class="exproductimage" src="" width="250">
									</div>
								</div>
								</div>
							</div>
						</div>
						<label class="control-label col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 hidden">Updating by </label>
						<div class="col-md-2 hidden">
							<input type="text" class="form-control col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" name="postauthor" value="<?php echo $metadata['admincode']; ?>" readonly>
						</div>
						<button type="button" name="submit" id="submit" class="btn btn-success waves-effect waves-light m-r-10">Update</button>
					</form>
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
	
//			var info = {
//				"itemcode"		: $('#itemcode').val()
//			};
			var form = $('#validateForm')[0];	// Get form
			var data = new FormData(form);		// Create an FormData object

			$.ajax( {
				url: "<?php echo base_url("productedited"); ?>",	// Url to which the request is send
				type		: "POST",	// Type of request to be send, called as method
				dataType	: "JSON",	// Retrieve json data
				data		: data,		// Data sent to server (i.e. form fields and values)
				processData	: false,	// To send DOMDocument or non processed data file
				contentType	: false,	// The content type used when sending data to the server.
				cache		: false,	// To unable request pages to be cached
				async		: false,	// Will hold the execution of rest code
				success: function (data) {		
					if(data.status=='success'){	// Success message
						//record_edit(editpdata);
						//fileclear
//						$('.form-control').val('');
						$('.cleardata').val('');
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
	
	
	<script type="text/javascript">
		var editpdata = '<?php echo $_GET['editpdata']; ?>';
		function record_edit(editpdata) {
			var info = {
				"editpdata": editpdata
			};
			$.ajax( {
				url: "<?php echo base_url("getproductdetails"); ?>",
				type: "POST",
				dataType: "JSON",
				data: info,
				success: function ( data ) {
					
					$( '#sizes' ).val('0');
					$( '#sizem' ).val('0');
					$( '#sizel' ).val('0');
					$( '#sizexl' ).val('0');
					$( '#sizexxl' ).val('0');
					$( '#sizexxxl' ).val('0');
					$( '#itemcode' ).val( data.prodetails.itemcode );
					$( '#itemname' ).val( data.prodetails.itemname );
					$( '#sellprice' ).val( data.prodetails.sellprice );
					$('#exproductimage').attr('src', '<?php echo base_url("assets/admin/upload-images/item-photos/items/"); ?>' + data.prodetails.itemimage);
					$( '#currentstock' ).val( data.prodetails.currentstock );
					$( '#remark' ).val( data.prodetails.remark );
					
					$( '#storename' ).val( data.prodetails.store ).trigger("change");
					
					var sizes = data.prodetails.sizecode.split(',');
					var sizelength = sizes.length;				
					var stocks = data.prodetails.stock.split(',');
//					var itemids = data.prodetails.itemid.split(',');

					for (var i = 0; i < sizelength; i++) {
						if(sizes[i]=='S'){
							$( '#sizes' ).val( stocks[i] );
							//$( '#itemids' ).val( itemids[i] );
						}
						if(sizes[i]=='M'){
							$( '#sizem' ).val( stocks[i] );
							//$( '#itemidm' ).val( itemids[i] );
						}
						if(sizes[i]=='L'){
							$( '#sizel' ).val( stocks[i] );
							//$( '#itemidl' ).val( itemids[i] );
						}
						if(sizes[i]=='XL'){
							$( '#sizexl' ).val( stocks[i] );
							//$( '#itemidxl' ).val( itemids[i] );
						}
						if(sizes[i]=='XXL'){
							$( '#sizexxl' ).val( stocks[i] );
							$( '#itemidxxl' ).val( itemids[i] );
						}
						if(sizes[i]=='XXXL'){
							$( '#sizexxxl' ).val( stocks[i] );
							//$( '#itemidxxxl' ).val( itemids[i] );
						}
					}
				},
				error: function ( jqXHR, textStatus, errorThrown ) {
					alert( 'Error adding / update data' );
				}
			} );
		}
		// Date Picker
		$(document).ready( function () {
			record_edit(editpdata);
		} );
	</script>

<script>
//	select2 code starts
	$( document ).ready( function () {
			$( "#storename" ).select2();		
		} );
//	select2 code ends
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