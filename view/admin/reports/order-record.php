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
					<li>Records/Archives</li>
					<li class="active">Order Records</li>
				</ol>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /row -->
		<div class="row">
			<div class="col-sm-12">
				<div class="white-box">
					<h3 class="box-title m-b-0">Order Information</h3>
					<p class="text-muted m-b-30">Export data to Copy, CSV, Excel, PDF &amp; Print</p>
					<div class="table-responsive">
						<table id="example23" class="display nowrap" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th data-toggle="true"> Order Date </th>
									<th class="tabletdpad tdr"> Order ID </th>
									<th class="tabletdpad tdr"> Phone </th>
									<th class="tabletdpad tdr"> Name </th>
									<th class="tabletdpad tdr"> Product Code </th>
									<th class="tabletdpad tdr"> Item Code </th>
									<th class="tabletdpad tdr"> Quantity </th>
									<th class="tabletdpad tdr"> Price </th>
									<th class="tabletdpad"> Action </th>
								</tr>
							</thead>
							<tbody>
								
							<?php
								if($orderrecordlist>0){
							 	foreach($orderrecordlist as $row):
							?>
								<tr class="tabletrpad">
									<td class="tabletdpad1">
										<?php echo $row['created_at'];?>
									</td>
									<td class="tabletdpad">
										<a href="<?php echo base_url("invoice"); ?>?odr=<?php echo  $row['oid'];?>" data-toggle="tooltip" title="Invoice"><?php echo  $row['ordercode'];?></a>
									</td>
									<td class="tabletdpad">
										<?php echo $row['phone'];?>
									</td>
									<td class="tabletdpad">
										<?php echo $row['customername'];?>
									</td>
									<td class="tabletdpad">
										<?php echo $row['itemcode'];?>
									</td>
									<td class="tabletdpad">
										<?php if(!empty($row['item_info'])){
											foreach ( $row['item_info'] as $row1 ): ?>
												<?php echo $row1->itemid;?>,&nbsp;
										<?php  endforeach; }?>
									</td>
									<td class="tabletdpad">
										<?php if(!empty($row['item_info'])){
											foreach ( $row['item_info'] as $row1 ): ?>
												<?php echo $row1->sizeshortcode;?>:
												<?php echo $row1->quantity;?>,
										<?php  endforeach; }?>
									</td>
									<td class="tabletdpad">
										<?php echo $row['finalprice'];?>
									</td>
									</td>
									<td class="tabletdpad">
										<a href="<?php echo base_url("invoice"); ?>?odr=<?php echo  $row['oid'];?>" data-toggle="tooltip" title="Invoice"><span  class="printicon"><i class="fa fa-print"></i></span></a>
										<a href="../dashboard/order-update.php?editid=<?php echo $row['oid'];?>" onclick="return confirm('Are you sure you want to edit this Record? Once edited no way to get this information back!!');" data-toggle="tooltip" title="Edit"><span  class="editicon"><i class="fa fa-pencil"></i></span></a>
										<a href="../system/order-update.php?returnid=<?php echo $row['oid'];?>" onclick="return confirm('Are you sure you want to mark the order as returned? Once action taken no way to make changes again!!');" data-toggle="tooltip" title="Returned"><span  class="returnicon"><i class="fa fa-warning"></i></span></a>
									</td>
								</tr>
								<?php endforeach;} ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
<?php include APPPATH.'views/partial/admin/main-footer.php';?>
	<!-- start - This is for export functionality only -->
	<script src="<?php echo base_url("assets/admin/"); ?>cbn/js/dataTables.buttons.min.js"></script>
	<script src="<?php echo base_url("assets/admin/"); ?>cbn/js/buttons.flash.min.js"></script>
	<script src="<?php echo base_url("assets/admin/"); ?>cbn/js/jszip.min.js"></script>
	<script src="<?php echo base_url("assets/admin/"); ?>cbn/js/pdfmake.min.js"></script>
	<script src="<?php echo base_url("assets/admin/"); ?>cbn/js/vfs_fonts.js"></script>
	<script src="<?php echo base_url("assets/admin/"); ?>cbn/js/buttons.html5.min.js"></script>
	<script src="<?php echo base_url("assets/admin/"); ?>cbn/js/buttons.print.min.js"></script>
	<!-- end - This is for export functionality only -->
	<script>
		$( document ).ready( function () {
			$( '#myTable' ).DataTable();
			$( document ).ready( function () {
				var table = $( '#example' ).DataTable( {
					"columnDefs": [
						{
							"visible": false
							,
							"targets": 2
						}
					]
					,
					"order": [
						[ 2, 'asc' ]
					]
					,
					"displayLength": 25
					,
					"drawCallback": function ( settings ) {
						var api = this.api();
						var rows = api.rows( {
							page: 'current'
						} ).nodes();
						var last = null;
						api.column( 2, {
							page: 'current'
						} ).data().each( function ( group, i ) {
							if ( last !== group ) {
								$( rows ).eq( i ).before( '<tr class="group"><td colspan="5">' + group + '</td></tr>' );
								last = group;
							}
						} );
					}
				} );
				// Order by the grouping
				$( '#example tbody' ).on( 'click', 'tr.group', function () {
					var currentOrder = table.order()[ 0 ];
					if ( currentOrder[ 0 ] === 2 && currentOrder[ 1 ] === 'asc' ) {
						table.order( [ 2, 'desc' ] ).draw();
					} else {
						table.order( [ 2, 'asc' ] ).draw();
					}
				} );
			} );
		} );
		$( '#example23' ).DataTable( {
			"order": [
				[ 0, "desc" ]
			],
			dom: 'Bfrtip'
			,
			buttons: [
				'copy', 'csv', 'excel', 'pdf', 'print'
			]
		} );
	</script>
	</body>
	</html>