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
					<li class="active">Customer Records</li>
				</ol>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /row -->
		<div class="row">
			<div class="col-sm-12">
				<div class="white-box">
					<h3 class="box-title m-b-0">Customer Order Information</h3>
					<p class="text-muted m-b-30">Export data to Copy, CSV, Excel, PDF &amp; Print</p>
					<div class="table-responsive">
						<table id="example23" class="display nowrap" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th> Code </th>
									<th> Name </th>
									<th> Phone </th>
									<th> FB ID </th>
									<th class="indexthpad"> Points </th>
									<th> Address </th>
								</tr>
							</thead>
							<tbody>
								<?php
								 	foreach($customerlist as $row):
								?>
								<tr>
									<td>
										<?php echo $row->customercode; ?>
									</td>
									<td>
										<?php echo $row->customername; ?>
									</td>
									<td>
										<?php echo $row->phone; ?>
									</td>
									<td>
										<?php echo $row->fbid; ?>
									</td>
									<td class="tabletdpad">
										<?php echo $row->orderqty; ?>
									</td>
									<td>
										<?php echo $row->address; ?>
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