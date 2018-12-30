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
									<th> Phone </th>
									<th> Name </th>
									<th class="hidden"> ID </th>
									<th class="indexthpad"> Product Code </th>
									<th class="indexthpad"> Size </th>
									<th class="indexthpad"> Quantity </th>
									<th class="indexthpad"> Price </th>
									<th class="indexthpad"> Action </th>
									<th class="hidden"> Return </th>
								</tr>
							</thead>
							<tbody>
								
							<?php
							 	foreach($orderrecordlist as $row):
							?>
								<tr>
									<td>
										<?php echo $row->orderdate;?>
									</td>
									<td>
										<?php echo $row->c_phone;?>
									</td>
									<td>
										<?php echo $row->c_fname;?>
									</td>
									<td class="hidden">
										<?php echo $row->c_ID;?>
									</td>
									<td class="tabletdpad">
										<?php echo $row->productcode;?>
									</td>
									<td class="tabletdpad">
										<?php if( $row->sold_sizes >= 1){?>
										<strong>S &nbsp;&nbsp;&nbsp;</strong>
										<?php } ?>
										<?php if( $row->sold_sizem >= 1){?>
										<strong>M &nbsp;&nbsp;&nbsp;</strong>
										<?php } ?>
										<?php if( $row->sold_sizel >= 1){?>
										<strong>L &nbsp;&nbsp;&nbsp;</strong>
										<?php } ?>
										<?php if( $row->sold_sizexl >= 1){?>
										<strong>XL &nbsp;&nbsp;&nbsp;</strong>
										<?php } ?>
										<?php if( $row->sold_sizexxl >= 1){?>
										<strong>XXL &nbsp;&nbsp;&nbsp;</strong>
										<?php } ?>
										<?php if( $row->sold_sizexxxl >= 1){?>
										<strong>XXXL</strong>
										<?php } ?>
									</td>
									<td class="tabletdpad">
										<?php if( $row->sold_sizes >= 1){
											echo $row->sold_sizes;" &nbsp;&nbsp;&nbsp;";
										} ?>
										<?php if( $row->sold_sizem >= 1){
											echo $row->sold_sizem;" &nbsp;&nbsp;&nbsp;";
										} ?>
										<?php if( $row->sold_sizel >= 1){
											echo $row->sold_sizel;" &nbsp;&nbsp;&nbsp;";
										} ?>
										<?php if( $row->sold_sizexl >= 1){
											echo $row->sold_sizexl;" &nbsp;&nbsp;&nbsp;";
										} ?>
										<?php if( $row->sold_sizexxl >= 1){
											echo $row->sold_sizexxl;" &nbsp;&nbsp;&nbsp;";
										} ?>
										<?php if( $row->sold_sizexxxl >= 1){
											echo $row->sold_sizexxxl;
										} ?>
									</td>
									<td class="tabletdpad">
										<?php echo $row->pcost;?>
									</td>
									<td class="tabletdpad">
										<a href="../dashboard/order-update.php?editid=<?php echo $row->sl_ID;?>" onclick="return confirm('Are you sure you want to edit this Record? Once edited no way to get this information back!!');" title="Edit"><span  class="editicon"><i class="fa fa-pencil"></i></span></a>
										<a href="../system/order-update.php?returnid=<?php echo $row->sl_ID;?>" onclick="return confirm('Are you sure you want to mark the order as returned? Once action taken no way to make changes again!!');" title="Returned"><span  class="returnicon"><i class="fa fa-warning"></i></span></a>
									</td>
									<td class="hidden">
										<?php echo $row->returnp;?>
									</td>
								</tr>
								<?php endforeach; ?>
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