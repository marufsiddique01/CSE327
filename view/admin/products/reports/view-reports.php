<?php include APPPATH.'views/partial/admin/main-header.php';?>
<!-- Page Content -->
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row bg-title">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h4 class="page-title">Admin Dashboard</h4> </div>
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
					<li><a href="<?php echo base_url("dashboard"); ?>">Dashboard</a></li>
					<li>Reports</li>
					<li class="active">Products Reports</li>
				</ol>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- .row -->
		<div class="row el-element-overlay">
			
			<?php
			if($productreports > 0){
				foreach($productreports as $row):
			?>
			<!-- .usercard -->
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
				<div class="white-box">
					<div class="el-card-item">
						<div class="el-card-avatar el-overlay-1"> <img src="<?php echo base_url("assets/admin/"); ?>upload-images/item-photos/items/<?php echo $row->itemimage; ?>"/>
							<div class="el-overlay">
								<ul class="el-info">
									<li><a class="btn default btn-outline image-popup-vertical-fit" href="<?php echo base_url("assets/admin/"); ?>upload-images/item-photos/items/<?php echo $row->itemimage; ?>"><i class="icon-magnifier"></i></a>
									</li>
									<li><a class="btn default btn-outline" href="<?php echo base_url("productreportdetails"); ?>?id=<?php echo $row->itemcode;?>"><i class="icon-link"></i></a>
									</li>
								</ul>
							</div>
						</div>
						<div class="el-card-content">
							<h3 class="box-title">
								<?php echo $row->itemcode;?>
							</h3> <small>(<?php echo $row->itemname;?>)</small>
							<br/> <small>Received date: <?php echo $row->created_at;?></small> </div>
					</div>
				</div>
			</div>
			<!-- /.usercard-->
			<?php endforeach; }?>
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
<?php include APPPATH.'views/partial/admin/main-footer.php';?>
	</body>
	</html>