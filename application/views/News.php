	<script type="text/javascript" src="<?php echo base_url();?>assets/js/libs/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url();?>bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/libs/lodash.compat.min.js"></script>

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="assets/js/libs/html5shiv.js"></script>
	<![endif]-->

	<!-- Smartphone Touch Events -->
	<script type="text/javascript" src="<?php echo base_url();?>plugins/touchpunch/jquery.ui.touch-punch.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>plugins/event.swipe/jquery.event.move.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>plugins/event.swipe/jquery.event.swipe.js"></script>

	<!-- General -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/libs/breakpoints.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>plugins/respond/respond.min.js"></script> <!-- Polyfill for min/max-width CSS3 Media Queries (only for IE8) -->
	<script type="text/javascript" src="<?php echo base_url();?>plugins/cookie/jquery.cookie.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>plugins/slimscroll/jquery.slimscroll.horizontal.min.js"></script>

	<!-- Page specific plugins -->
	<!-- Charts -->
	<script type="text/javascript" src="<?php echo base_url();?>plugins/sparkline/jquery.sparkline.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url();?>plugins/daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>plugins/daterangepicker/daterangepicker.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>plugins/blockui/jquery.blockUI.min.js"></script>

	<!-- Forms -->
	<script type="text/javascript" src="<?php echo base_url();?>plugins/uniform/jquery.uniform.min.js"></script> <!-- Styled radio and checkboxes -->
	<script type="text/javascript" src="<?php echo base_url();?>plugins/select2/select2.min.js"></script> <!-- Styled select boxes -->

	<!-- DataTables -->
	<script type="text/javascript" src="<?php echo base_url();?>plugins/datatables/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>plugins/datatables/tabletools/TableTools.min.js"></script> <!-- optional -->
	<script type="text/javascript" src="<?php echo base_url();?>plugins/datatables/colvis/ColVis.min.js"></script> <!-- optional -->
	<script type="text/javascript" src="<?php echo base_url();?>plugins/datatables/columnfilter/jquery.dataTables.columnFilter.js"></script> <!-- optional -->
	<script type="text/javascript" src="<?php echo base_url();?>plugins/datatables/DT_bootstrap.js"></script>

	<!-- App -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/app.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins.form-components.js"></script>

	<script>
	$(document).ready(function(){
		"use strict";

		App.init(); // Init layout and core plugins
		Plugins.init(); // Init all plugins
		FormComponents.init(); // Init all form-specific plugins
	});
	</script>

	<!-- Demo JS -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/custom.js"></script>


<body>
<?php $domain = explode("systemadmin",base_url()); ?>
	

	<div id="container">
		<div id="content">
			<div class="container">
				<!-- Breadcrumbs line -->
				<div class="crumbs">
					<ul id="breadcrumbs" class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="<?php echo base_url();?>dashboard">Dashboard</a>
						</li>
						<li class="current">
							<a href="#" title="">news</a>
						</li>
					</ul>

					<ul class="crumb-buttons">
						<li><a href="<?php echo base_url(); ?>news/add" title=""><i class="icon-plus"></i><span>ADD CONTENT</span></a></li>
					</ul>
				</div>

				<!--=== Page Header ===-->
				<div class="page-header">
					<div class="page-title">
						<h3>Manage News</h3>
						<span></span>
					</div>
				</div>

				<!--=== Page Content ===-->
				<!--=== Managed Tables ===-->

				<!--=== Normal ===-->
				<div class="row">
					<div class="col-md-12">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i> Managed Table</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div class="widget-content">
								<table class="table table-striped table-bordered table-hover table-checkable datatable" data-display-length="30">
									<thead>
										<tr>
											<th>ID</th>

											<th>Cover Img </th>
											<th>Type</th>
											<th>TITLE</th>
											
											<th data-hide="phone,tablet">Edit</th>
											<th data-hide="phone,tablet">Del</th>
										</tr>
									</thead>

									
									<tbody>
										
										<?php  $i=1;foreach ($q as $r) { ?>
										
										<tr>
											<td><?php echo $i;?></td>
											
											<td>
											<img src='<?php echo $domain[0]."images/img_news/".$r['photo_new'];?>' width="150"></td>
											<td><?php echo $type[$r['type_new']];?></td>
											<td><?php echo $r['title_new'];?></td>
											
											<td data-hide="phone,tablet"><a href="<?php echo base_url(); ?>news/edit/<?php echo $r['id_new']; ?>" title="Edit news">Edit </a></td>
											<td data-hide="phone,tablet"><a href="<?php echo base_url(); ?>news/del/<?php echo $r['id_new']; ?>" title="Edit news">Del </a></td>
										</tr>
										<?php $i++; }?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<!-- /Normal -->

				
				<!-- /Page Content -->
			</div>
			<!-- /.container -->

		</div>
	</div>

</body>
</html>
<script type="text/javascript">
	function OnChangeCheckbox (checkbox) {
		var newsid = checkbox.value;
		var base_url = "<?php echo base_url();?>";
		if (checkbox.checked) {
			window.location.href = base_url + "news/enable/1/" + newsid;
		}
		else {
			window.location.href = base_url + "news/enable/0/" + newsid;
		}
	}
</script>