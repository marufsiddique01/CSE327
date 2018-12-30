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
					<li class="active">New Order place</li>
				</ol>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="white-box">
					<h3 class="box-title m-b-0">Customer Order Input (Upload Order Information)</h3>
					<form id="validateForm" action="#" class="form-horizontal" method="POST" enctype="multipart/form-data" autocomplete="off">
						<p class="text-muted m-b-20 font-13">Customer Information: </p>
						<div class="form-group">
							<label class="control-label col-3 col-sm-2 col-md-2 col-lg-1 col-xl-1">Phone: </label>
							<div class="col-9 col-sm-4 col-md-4 col-lg-2 col-xl-2">
								<input type="number" class="form-control" name="phone" id="phone" class="typeahead" min=0 oninput="validity.valid||(value='');" required/>
							</div>
							<label class="control-label col-3 col-sm-2 col-md-2 col-lg-1 col-xl-1">Name: </label>
							<div class="col-9 col-sm-4 col-md-4 col-lg-2 col-xl-2 inputm">
								<input type="text" class="form-control" name="customername" id="customername" required> </div>
							<label class="control-label col-3 col-sm-2 col-md-2 col-lg-1 col-xl-1">FB ID: </label>
							<div class="col-9 col-sm-4 col-md-4 col-lg-2 col-xl-2 inputpad inputm inputm1">
								<input type="text" class="form-control" name="fbid" id="fbid"> </div>
							<label class="control-label col-3 col-sm-2 col-md-2 col-lg-1 col-xl-1">Email: </label>
							<div class="col-9 col-sm-4 col-md-4 col-lg-2 col-xl-2 inputpad inputm inputm1">
								<input type="email" class="form-control" name="email" id="email"> 
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-3 col-sm-12 col-md-2 col-lg-1 col-xl-1">Address: </label>
							<div class="col-9 col-sm-12 col-md-10 col-lg-5 col-xl-5 inputpad inputm1">
								<input type="text" class="form-control" name="address" id="address" required> </div>
							<label class="control-label col-3 col-sm-2 col-md-2 col-lg-1 col-xl-1">ID: </label>
							<div class="col-9 col-sm-4 col-md-4 col-lg-2 col-xl-2 inputpad inputm inputm1">
								<input type="text" class="form-control" name="customercode" id="customercode" readonly> </div>
							<label class="control-label col-3 col-sm-2 col-md-2 col-lg-1 col-xl-1">Ordered QTY: </label>
							<div class="col-9 col-sm-4 col-md-4 col-lg-2 col-xl-2 inputpad inputm inputm1">
								<input class="form-control" name="orderqty" id="orderqty" readonly> 
							</div>
							<input class="form-control hidden" id="id" name="id">
						</div>
						<p class="text-muted m-b-30 font-13">Available Product Information: </p>
						<div class="form-group">
							<label class="control-label col-3 col-sm-2 col-md-2 col-lg-1 col-xl-1" class="control-label">Code:</label>
							<div class="col-9 col-sm-4 col-md-4 col-lg-2 col-xl-2">
								<select name="itemcode" id="itemcode" class="required">
									<option value="">Select</option>
									<?php foreach($cmbproduct as $row):?>
										<option value="<?php echo $row->pid;?>">
											<?php echo $row->itemcode;?>
										</option>
									<?php endforeach?>
								</select>
							</div>
							<label class="control-label col-3 col-sm-2 col-md-2 col-lg-1 col-xl-1">Name: </label>
							<div class="col-9 col-sm-4 col-md-4 col-lg-2 col-xl-2 inputm">
								<input class="form-control" name="itemname" id="itemname" readonly> 
							</div>
							<label class="control-label col-3 col-sm-2 col-md-2 col-lg-1 col-xl-1">Price: </label>
							<div class="col-9 col-sm-4 col-md-4 col-lg-2 col-xl-2 inputpad inputm inputm1">
								<input type="number" class="form-control" name="sellprice" id="sellprice" min=0 oninput="validity.valid||(value='');" readonly> </div>
<!--
							<label class="col-md-1 hidden">Total Sold: </label>
							<div class="col-md-2 hidden">
								<input type="number" class="form-control" name="totalsold" id="totalsold" readonly> </div>
							<label class="col-md-1 hidden">Stock: </label>
							<div class="col-md-2 hidden">
								<input type="number" class="form-control" name="pstock" id="pstock" readonly> </div>
							<label class="col-md-1 hidden">Making Cost: </label>
							<div class="col-md-2 hidden">
								<input type="number" class="form-control" name="mcost" id="mcost" readonly> </div>

							<label class="col-md-1 hidden">Product Giveaway: </label>
							<div class="col-md-2 hidden">
								<input type="number" class="form-control" name="currentstock" id="currentstock" readonly> </div>
-->
							<label class="control-label col-3 col-sm-2 col-md-2 col-lg-1 col-xl-1" class="control-label">Store:</label>
							<div class="col-9 col-sm-4 col-md-4 col-lg-2 col-xl-2 inputpad inputm inputm1">
								<select name="storename" id="storename" class="required">
									<option value="">Select</option>
										<?php foreach($store_list as $row):?>
											<option value="<?php echo $row->id;?>">
												<?php echo $row->storename;?>
											</option>
										<?php endforeach;?>
								</select>
							</div>
						</div>
						<div class="form-group ">
							<label class="control-label col-2 col-sm-1 col-md-2 col-lg-1 col-xl-1">S: </label>
							<div class="col-4 col-sm-3 col-md-2 col-lg-1 col-xl-1">
								<input type="text" class="form-control" name="sizes" id="sizes" readonly> </div>
							<label class="control-label col-2 col-sm-1 col-md-2 col-lg-1 col-xl-1">M: </label>
							<div class="col-4 col-sm-3 col-md-2 col-lg-1 col-xl-1">
								<input type="text" class="form-control" name="sizem" id="sizem" readonly> </div>
							<label class="control-label col-2 col-sm-1 col-md-2 col-lg-1 col-xl-1">L: </label>
							<div class="col-4 col-sm-3 col-md-2 col-lg-1 col-xl-1 inputm">
								<input type="number" class="form-control" name="sizel" id="sizel" readonly> </div>
							<label class="control-label col-2 col-sm-1 col-md-2 col-lg-1 col-xl-1 ">XL: </label>
							<div class="col-4 col-sm-3 col-md-2 col-lg-1 col-xl-1 inputpad inputm inputm1">
								<input type="number" class="form-control" name="sizexl" id="sizexl" readonly> </div>
							<label class="control-label col-2 col-sm-1 col-md-2 col-lg-1 col-xl-1 ">XXL: </label>
							<div class="col-4 col-sm-3 col-md-2 col-lg-1 col-xl-1 inputpad inputm inputm1">
								<input type="number" class="form-control" name="sizexxl" id="sizexxl" readonly> </div>
							<label class="control-label col-2 col-sm-1 col-md-2 col-lg-1 col-xl-1 ">XXXL: </label>
							<div class="col-4 col-sm-3 col-md-2 col-lg-1 col-xl-1 inputpad inputm inputm1">
								<input type="number" class="form-control" name="sizexxxl" id="sizexxxl" readonly> </div>
						</div>
						<p class="text-muted m-b-30 font-13">Size Information: </p>
						<div class="form-group">
							<label class="control-label col-2 col-sm-1 col-md-2 col-lg-1 col-xl-1">S: </label>
							<div class="col-4 col-sm-3 col-md-2 col-lg-1 col-xl-1">
								<input type="number" class="form-control" name="sold_sizes" id="sold_sizes" required value="0" min=0 oninput="validity.valid||(value='');">
								<input type="text" class="form-control" name="itemids" id="itemids" readonly hidden>
							</div>
							<label class="control-label col-2 col-sm-1 col-md-2 col-lg-1 col-xl-1">M: </label>
							<div class="col-4 col-sm-3 col-md-2 col-lg-1 col-xl-1">
								<input type="number" class="form-control" name="sold_sizem" id="sold_sizem" required value="0" min=0 oninput="validity.valid||(value='');">
								<input type="text" class="form-control" name="itemidm" id="itemidm" readonly hidden>
							</div>
							<label class="control-label col-2 col-sm-1 col-md-2 col-lg-1 col-xl-1">L: </label>
							<div class="col-4 col-sm-3 col-md-2 col-lg-1 col-xl-1 inputm">
								<input type="number" class="form-control" name="sold_sizel" id="sold_sizel" required value="0" min=0 oninput="validity.valid||(value='');">
								<input type="text" class="form-control" name="itemidl" id="itemidl" readonly hidden>
							</div>
							<label class="control-label col-2 col-sm-1 col-md-2 col-lg-1 col-xl-1">XL: </label>
							<div class="col-4 col-sm-3 col-md-2 col-lg-1 col-xl-1 inputpad inputm inputm1">
								<input type="number" class="form-control" name="sold_sizexl" id="sold_sizexl" required value="0" min=0 oninput="validity.valid||(value='');">
								<input type="text" class="form-control" name="itemidxl" id="itemidxl" readonly hidden>
							</div>
							<label class="control-label col-2 col-sm-1 col-md-2 col-lg-1 col-xl-1">XXL: </label>
							<div class="col-4 col-sm-3 col-md-2 col-lg-1 col-xl-1 inputpad inputm inputm1">
								<input type="number" class="form-control" name="sold_sizexxl" id="sold_sizexxl" required value="0" min=0 oninput="validity.valid||(value='');">
								<input type="text" class="form-control" name="itemidxxl" id="itemidxxl" readonly hidden>
							</div>
							<label class="control-label col-2 col-sm-1 col-md-2 col-lg-1 col-xl-1">XXXL: </label>
							<div class="col-4 col-sm-3 col-md-2 col-lg-1 col-xl-1 inputpad inputm inputm1">
								<input type="number" class="form-control" name="sold_sizexxxl" id="sold_sizexxxl" required value="0" min=0 oninput="validity.valid||(value='');">
								<input type="text" class="form-control" name="itemidxxxl" id="itemidxxxl" readonly hidden>
							</div>
							
<!--								<input type="text" class="form-control" name="itemid" id="itemid" >-->
						</div>
						<div class="form-group">
<!--
							<label class="col-md-1">Giveaway: </label>
							<div class="col-md-2">
								<div class="checkbox checkbox-success" style="padding-top: 3px; !important;">
									<input id="checkbox33" type="checkbox" name="giveaway" value="1">
									<label for="checkbox33"><small>Check if it's a giveaway product.</small></label>
								</div>
							</div>
-->
							<label class="control-label col-3 col-sm-3 col-md-2 col-lg-1 col-xl-1">Order Date: </label>
							<div class="col-9 col-sm-6 col-md-4 col-lg-2 col-xl-2">
								<input type="text" class="form-control mydatepicker" name="orderdate" id="orderdate" required>
							</div>
							<label class="control-label col-12 col-sm-12 col-md-2 col-lg-1 col-xl-1">Remarks/ Notes: </label>
							<div class="col-12 col-sm-12 col-md-4 col-lg-8 col-xl-8">
								<textarea class="form-control" rows="4" name="remark" id="remark"></textarea>
							</div>
						</div>
						<div class="form-group hidden">
							<input type="text" class="form-control "  name="createdby" id="createdby" value="<?php echo $metadata['id'];?>" readonly>
							<label class="control-label col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1">Status:</label>
							<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
								<select name="status" id="status" class="required">
									<?php foreach($status_list as $row):?>
										<option value="<?php echo $row->id;?>">
											<?php echo $row->statustitle;?>
										</option>
									<?php endforeach?>
								</select>
							</div>
							<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
								<select name="deliverystatus" id="deliverystatus" class="required">
									<?php foreach($deliverystatus_list as $row):?>
										<option value="<?php echo $row->id;?>">
											<?php echo $row->statustitle;?>
										</option>
									<?php endforeach?>
								</select>
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
	$(document).ready(function(){
		$("#status").select2();		
		$("#deliverystatus").select2();		
		$("#storename").select2();		
		$("#itemcode").select2();		
	});
	
//	Customer Ajax
	$(document).ready(function(){
		$('#phone').typeahead({
			source: function(query,result){
				var info = {
					"phone": query
				};
				$.ajax({
					url: "<?php echo base_url("findcustomerphone");?>",
					data: info,
					dataType: "json",
					type: "POST",
					success: function(data) {
						result($.map(data,function(item){
							return item;
						}));
					}
				});
			}
		});
	});
	$(document).on('click','.typeahead a.dropdown-item',function(){		
		var info = {
			"phone": $(this).html()
		};
		$.ajax({
			url: "<?php echo base_url("findcustomerdetails");?>",
			type: "POST",
			dataType: "JSON",
			data: info,
			success: function (data) {
				$("#store").val('').trigger('change');
				$("#itemcode").val('').trigger('change');
				$('#customername').val(data.customerdetails.customername);
				$('#fbid').val(data.customerdetails.fbid);
				$('#address').val(data.customerdetails.address);
				$('#customercode').val(data.customerdetails.customercode);
				$('#email').val(data.customerdetails.email);
				$('#orderqty').val(data.customerdetails.orderqty);
				$('#id').val(data.customerdetails.id);
			},
			error: function(jqXHR,textStatus,errorThrown){
				alert('Error adding / update data');
			}
		});
	});
	$(document).on('change','#phone',function(){
		$('#customername').val('');
		$('#fbid').val('');
		$('#address').val('');
		$('#customercode').val('');
		$('#email').val('');
		$('#orderqty').val('');
		$('#id').val('');
	});
	
//	Product Ajax
	$(document).on('change','#itemcode',function(){
		var info={
			"itemcode": $(this).find(":selected").val()
		};
		$.ajax({
			url: "<?php echo base_url("findproductdetails");?>",
			type: "POST",
			dataType: "JSON",
			data: info,
			success: function (data) {
				$('#sizes').val('0');
				$('#sizem').val('0');
				$('#sizel').val('0');
				$('#sizexl').val('0');
				$('#sizexxl').val('0');
				$('#sizexxxl').val('0');
				$('#itemids').val('');
				$('#itemidm').val('');
				$('#itemidl').val('');
				$('#itemidxl').val('');
				$('#itemidxxl').val('');
				$('#itemidxxxl').val('');
				$('#itemname').val(data.prodetails.itemname);
				$('#sizeshortcode').val(data.prodetails.sizeshortcode);
				$('#sellprice').val(data.prodetails.sellprice);
				$('#itemid').val(data.prodetails.itemid);
				$('#storename').val(data.prodetails.store).trigger("change");

				var sizes;
				if(sizes !== '0'){
					var sizes = data.prodetails.sizecode.split(',');
				}
	//			else{
	//				var sizes = "";
	//			}

				var sizelength 	= sizes.length;				
				var stocks 		= data.prodetails.stock.split(',');
				var itemids 	= data.prodetails.itemid.split(',');

				for (var i=0; i<sizelength; i++){
					if(sizes[i]=='S'){
						$('#sizes').val(stocks[i]);
						$('#itemids').val(itemids[i]);
					}
					if(sizes[i]=='M'){
						$('#sizem').val(stocks[i]);
						$('#itemidm').val(itemids[i]);
					}
					if(sizes[i]=='L'){
						$('#sizel').val(stocks[i]);
						$('#itemidl').val(itemids[i]);
					}
					if(sizes[i]=='XL'){
						$('#sizexl').val(stocks[i]);
						$('#itemidxl').val(itemids[i]);
					}
					if(sizes[i]=='XXL'){
						$('#sizexxl').val(stocks[i]);
						$('#itemidxxl').val(itemids[i]);
					}
					if(sizes[i]=='XXXL'){
						$('#sizexxxl').val(stocks[i]);
						$('#itemidxxxl').val(itemids[i]);
					}
				}
			}
		});
	});
	
//	Submit Ajax
	$(document).on('click','#submit',function(){
		var tabledata=[]; //declare object
		var detailstabledata=[]; //declare object
		if($('#sold_sizes').val()>0){
			detailstabledata.push({
			   ItemId	: $('#itemids').val(),
			   Quantity	: $('#sold_sizes').val(),
			});
		}
		if($('#sold_sizem').val()>0){
			detailstabledata.push({
			   ItemId	: $('#itemidm').val(),
			   Quantity	: $('#sold_sizem').val(),
			});
		}
		if($('#sold_sizel').val()>0){
			detailstabledata.push({
			   ItemId	: $('#itemidl').val(),
			   Quantity	: $('#sold_sizel').val(),
			});
		}
		if($('#sold_sizexl').val()>0){
			detailstabledata.push({
			   ItemId	: $('#itemidxl').val(),
			   Quantity	: $('#sold_sizexl').val(),
			});
		}
		if($('#sold_sizexxl').val()>0){
			detailstabledata.push({
			   ItemId	: $('#itemidxxl').val(),
			   Quantity	: $('#sold_sizexxl').val(),
			});
		}
		if($('#sold_sizexxxl').val()>0){
			detailstabledata.push({
			   ItemId	: $('#itemidxxxl').val(),
			   Quantity	: $('#sold_sizexxxl').val(),
			});
		}

		tabledata=[{
			'id'			: $('#id').val(),
			'phone' 		: $('#phone').val(),
			'customername'	: $('#customername').val(),
			'customercode'	: $('#customercode').val(),
			'email'			: $('#email').val(),
			'fbid'			: $('#fbid').val(),
			'address'		: $('#address').val(),
			'orderqty'		: $('#orderqty').val(),
			'itemcode'		: $('#itemcode').val(),
			'itemname'		: $('#itemname').val(),
			'sellprice'		: $('#sellprice').val(),
			'storename'		: $('#storename').val(),
			'orderdate'		: $('#orderdate').val(),
			'remark'		: $('#remark').val(),
			'status'		: $('#status').val(),
			'deliverystatus': $('#deliverystatus').val(),
			'createdby'		: $('#createdby').val(),
			detailstabledata
		}];

		$.ajax({
			url: "<?php echo base_url("orderreceived"); ?>",	// Url to which the request is send
			type	: "POST",	// Type of request to be send, called as method
			dataType: "JSON",	// Retrieve json data
			data: {datalist: JSON.stringify(tabledata)},	// Data sent to server (i.e. form fields and values)
			success: function(data) {		
				if(data.status=='success'){	// Success message
					$('.form-control').val('');
					//fileclear
					$(".fileclear").trigger("click");
					$('#storename').val('').trigger("change");
					$('#itemcode').val('').trigger("change");
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
			error: function(){
			}
		});	
	});
	
//	Validation code starts
	$().ready(function(){
		$("#validateForm").validate({
			errorPlacement: function(){
				return false; // remove error message text
			}
		});
	});
	
//	Prevent Number Input code ends    
	function preventNumberInput(e) {
		var keyCode = (e.keyCode ? e.keyCode : e.which);
		if (keyCode>47 && keyCode<58){
			e.preventDefault();
		}
	}
	$(document).ready(function(){
		$('#onlytext').keypress(function(e){
			preventNumberInput(e);
		});
	});
</script>   
</body>
</html>