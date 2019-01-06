<?php include APPPATH.'views/partial/admin/main-header.php';?>
<title>Update Order || Dashboard</title>
<!-- Page Content -->
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row bg-title">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h4 class="page-title">Admin Dashboard</h4> </div>
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
					<li><a href="index.php">Dashboard</a></li>
					<li>Records/Archives</li>
					<li><a href="order-record.php">Order Records</a></li>
					<li class="active">Update Order</li>
				</ol>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="white-box">
					<h3 class="box-title m-b-0">Customer Order Input (Upload Order Information)</h3>
					<?php
					/*Status message starts*/
					if ( isset( $_GET[ 'success1' ] ) ) {
						?>
					<div class="alert alert-success alert-dismissible" role="alert">
						<p><i class="fa fa-check"></i> New order has been successfully added.</p>
					</div>
					<?php
					}
					if ( isset( $_GET[ 'failed1' ] ) ) {
						?>
					<div class="alert alert-danger alert-dismissible" role="alert">
						<p><i class="fa fa-ban"></i> Failed! Sorry Customer information is not accpected.</p>
					</div>
					<?php
					}
					if ( isset( $_GET[ 'failed2' ] ) ) {
						?>
					<div class="alert alert-danger alert-dismissible" role="alert">
						<p><i class="fa fa-ban"></i> Failed! Sorry Sells information is not accpected.</p>
					</div>
					<?php
					}
					if ( isset( $_GET[ 'failed3' ] ) ) {
						?>
					<div class="alert alert-danger alert-dismissible" role="alert">
						<p><i class="fa fa-ban"></i> Failed! Sorry Product Update information is not accpected.</p>
					</div>
					<?php
					}
					if ( isset( $_GET[ 'failed4' ] ) ) {
						?>
					<div class="alert alert-danger alert-dismissible" role="alert">
						<p><i class="fa fa-ban"></i> Failed! Sorry Customer Update information is not accpected.</p>
					</div>
					<?php
					}
					/*Status message ends*/
					?>
					<form action="../system/order_input_update.php?editid=<?php echo $_GET['editid'];?>" class="form-horizontal" method="POST" enctype="multipart/form-data" autocomplete="off">
						<p class="text-muted m-b-30 font-13">Customer Information: </p>
						<div class="form-group">
							<label class="col-md-1">Customer's Number: </label>
							<div class="col-md-2">
								<input type="text" class="form-control" name="c_phone" id="c_phone" value="" readonly/>
							</div>
							<label class="col-md-1">Name: </label>
							<div class="col-md-2">
								<input type="text" class="form-control" name="c_fname" id="c_fname" value="" readonly> </div>
							<label class="col-md-1">FB ID: </label>
							<div class="col-md-2">
								<input type="text" class="form-control" name="c_fbID" id="c_fbID" value="" readonly> </div>
							<label class="col-md-1">Customer ID: </label>
							<div class="col-md-2">
								<input type="text" class="form-control" name="c_ID" id="c_ID" value="" readonly> </div>
							<input class="form-control hidden" id="id" readonly>
						</div>
						<p class="text-muted m-b-30 font-13">Available Product Information: </p>
						<div class="form-group">
							<label class="col-md-1">Code: </label>
							<div class="col-md-2">
								<select name="productcode" id="productcode" required>
									<option value="">Select</option>
									<?php
									$query = "SELECT * FROM productinfo";
									$result_set = mysqli_query( $hrmsyscon, $query );
									while ( $row = mysqli_fetch_array( $result_set ) ) {
										?>
									<option value="<?php echo $row['productcode'];?>">
										<?php echo $row['productcode'];?>
									</option>
									<?php } ?>
								</select>
							</div>
							<label class="col-md-1">Product Name: </label>
							<div class="col-md-2">
								<input type="text" class="form-control" name="pname" id="pname" readonly> </div>
							<label class="col-md-1">Price: </label>
							<div class="col-md-2">
								<input type="number" class="form-control" name="pcost" id="pcost" readonly> </div>
							<label class="col-md-1">Stock Location: </label>
							<div class="col-md-2">
								<select name="pstocklocation" id="pstocklocation" required>
									<option value="">None</option>
									<option value="Mohammadpur">Mohammadpur</option>
									<option value="Dhaka Cantonment">Dhaka Cantonment</option>
									<option value="Kafrul">Kafrul</option>
									<option value="Manikdi">Manikdi</option>
								</select>
							</div>
						</div>
						<div class="form-group ">
							<label class="col-md-1">Small: </label>
							<div class="col-md-1">
								<input type="number" class="form-control" name="sizes" id="sizes" readonly> </div>
							<label class="col-md-1">Medium: </label>
							<div class="col-md-1">
								<input type="number" class="form-control" name="sizem" id="sizem" readonly> </div>
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
						<p class="text-muted m-b-30 font-13">Size Information: </p>
						<div class="form-group">
							<label class="col-md-1">Small: </label>
							<div class="col-md-1">
								<input type="number" class="form-control" name="sold_sizes" id="sold_sizes" required="" value=""> </div>
							<label class="col-md-1">Medium: </label>
							<div class="col-md-1">
								<input type="number" class="form-control" name="sold_sizem" id="sold_sizem" required="" value=""> </div>
							<label class="col-md-1">Large: </label>
							<div class="col-md-1">
								<input type="number" class="form-control" name="sold_sizel" id="sold_sizel" required="" value=""> </div>
							<label class="col-md-1">XL: </label>
							<div class="col-md-1">
								<input type="number" class="form-control" name="sold_sizexl" id="sold_sizexl" required="" value=""> </div>
							<label class="col-md-1">XXL: </label>
							<div class="col-md-1">
								<input type="number" class="form-control" name="sold_sizexxl" id="sold_sizexxl" required="" value=""> </div>
							<label class="col-md-1">XXXL: </label>
							<div class="col-md-1">
								<input type="number" class="form-control" name="sold_sizexxxl" id="sold_sizexxxl" required="" value=""> </div>
						</div>
						<div class="form-group">
							</br>
							<label class="col-md-1">Order Date: </label>
							<div class="col-md-2">
								<input type="text" class="form-control mydatepicker" name="orderdate" id="orderdate" required="" value="">
							</div>
							<label class="col-md-2">Remarks/Notes: </label>
							<div class="col-md-7">
								<textarea class="form-control" rows="5" name="premarks" id="premarks" value=""></textarea>
							</div>
						</div>
						<div class="form-group hidden">
							<input type="text" class="form-control hidden" name="postauthor" id="postauthor" value="<?php echo $_SESSION['fname'].' '.$_SESSION['lname']?>" readonly>
						</div>
						<button type="submit" name="update" class="btn btn-success waves-effect waves-light m-r-10">Update</button>
					</form>
				</div>
			</div>
		</div>
		<!-- .right-sidebar -->
	</div>
	<!-- /.container-fluid -->
<?php include APPPATH.'views/partial/admin/main-footer.php';?>
	<script>
		$( document ).ready( function () {
			$( "#productcode" ).select2();
			//			$("#c_phone").select2();	
		} );
		$( document ).on( 'change', '#productcode', function () {
			//alert( $(this).find(":selected").val());
			$( '#pname' ).val( '' );
			$( '#pcost' ).val( '' );
			$( '#totalsold' ).val( '' );
			$( '#pstock' ).val( '' );
			$( '#sizes' ).val( '' );
			$( '#sizem' ).val( '' );
			$( '#sizel' ).val( '' );
			$( '#sizexl' ).val( '' );
			$( '#sizexxl' ).val( '' );
			$( '#sizexxxl' ).val( '' );
			var info = {
				"datasection": "productdata",
				"productcode": $( this ).find( ":selected" ).val()
			};
			$.ajax( {
				url: "../system/order_input_update.php",
				type: "POST",
				dataType: "JSON",
				data: info,
				success: function ( data ) {
					$( '#pname' ).val( data.pname );
					$( '#pcost' ).val( data.pcost );
					$( '#totalsold' ).val( data.totalsold );
					$( '#pstock' ).val( data.pstock );
					$( '#sizes' ).val( data.sizes );
					$( '#sizem' ).val( data.sizem );
					$( '#sizel' ).val( data.sizel );
					$( '#sizexl' ).val( data.sizexl );
					$( '#sizexxl' ).val( data.sizexxl );
					$( '#sizexxxl' ).val( data.sizexxxl );
				},
				error: function ( jqXHR, textStatus, errorThrown ) {
					alert( 'Error adding / update data' );
				}
			} );
		} );
		
		$( window ).load( function () {
			// run code
			var info = {
				"datasection": "editdata",
				"editid": '<?php echo $_GET['editid']; ?>'
			};
			$.ajax( {
				url: "../system/order_input_update.php",
				type: "POST",
				dataType: "JSON",
				data: info,
				success: function ( data ) {
					$( '#id' ).val( data.id );
					$( '#c_fname' ).val( data.c_fname );
					$( '#c_phone' ).val( data.c_phone );
					$( '#c_fbID' ).val( data.c_fbID );
					$( '#c_ID' ).val( data.c_ID );
					$( '#productcode' ).val( data.productcode ).trigger( 'change' );
					$( '#pname' ).val( data.pname );
					$( '#pcost' ).val( data.pcost );
					$( '#totalsold' ).val( data.totalsold );
					$( '#pstock' ).val( data.pstock );
					$( '#sizes' ).val( data.sizes );
					$( '#sizem' ).val( data.sizem );
					$( '#sizel' ).val( data.sizel );
					$( '#sizexl' ).val( data.sizexl );
					$( '#sizexxl' ).val( data.sizexxl );
					$( '#sizexxxl' ).val( data.sizexxxl );
					$( '#sold_sizes' ).val( data.sold_sizes );
					$( '#sold_sizem' ).val( data.sold_sizem );
					$( '#sold_sizel' ).val( data.sold_sizel );
					$( '#sold_sizexl' ).val( data.sold_sizexl );
					$( '#sold_sizexxl' ).val( data.sold_sizexxl );
					$( '#sold_sizexxxl' ).val( data.sold_sizexxxl );
					$( '#pstocklocation' ).val( data.pstocklocation );
					$( '#orderdate' ).val( data.orderdate );
				},
				error: function ( jqXHR, textStatus, errorThrown ) {
					alert( 'Error adding / update data' );
				}
			} );
		} );
	</script>
	</body>
	</html>