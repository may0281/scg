<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/libs/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/libs/lodash.compat.min.js"></script>

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="<?php echo base_url(); ?>assets/js/libs/html5shiv.js"></script>
<![endif]-->

<!-- Smartphone Touch Events -->
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/touchpunch/jquery.ui.touch-punch.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/event.swipe/jquery.event.move.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/event.swipe/jquery.event.swipe.js"></script>

<!-- General -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/libs/breakpoints.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/respond/respond.min.js"></script> <!-- Polyfill for min/max-width CSS3 Media Queries (only for IE8) -->
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/cookie/jquery.cookie.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/slimscroll/jquery.slimscroll.horizontal.min.js"></script>

<!-- Page specific plugins -->
<!-- Charts -->
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/sparkline/jquery.sparkline.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>plugins/daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/blockui/jquery.blockUI.min.js"></script>

<!-- Forms -->
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/uniform/jquery.uniform.min.js"></script> <!-- Styled radio and checkboxes -->
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/select2/select2.min.js"></script> <!-- Styled select boxes -->

<!-- DataTables -->
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/datatables/DT_bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/datatables/responsive/datatables.responsive.js"></script> <!-- optional -->

<!-- App -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/app.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins.form-components.js"></script>

<script>
	$(document).ready(function(){
		"use strict";

		App.init(); // Init layout and core plugins
		Plugins.init(); // Init all plugins
		FormComponents.init(); // Init all form-specific plugins
	});
</script>

<!-- Demo JS -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/custom.js"></script>

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
							<a href="#" title="">category</a>
						</li>
					</ul>

				</div>

				<div class="page-header">
					<div class="page-title">
						<h3>Brand </h3>
					</div>
				</div>
				<!-- /Page Header -->
				<div class="row">
					<!--=== Simple Table ===-->
					<div class="col-md-6">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i><i class="icon-plus"></i> ADD Brand</h4>
							</div>
							<div class="widget-content">
								<form class="form-horizontal row-border" method="post" id="validate-1" action="<?php echo base_url(); ?>brand/add">

									<div class="form-group">
										<label class="col-md-3 control-label">Name<span class="required">*</span></label>
										<div class="col-md-9">
											<input type="text" name="name" class="form-control required">
										</div>
									</div>


									<div class="form-actions">
										<input type="submit" value="Insert" class="btn btn-primary pull-right">
									</div>
								</form>
							</div>
						</div>
						<!-- /Validation Example 1 -->
					</div>
					<div class="col-md-6">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i> <i class="icon-plus"></i>ADD Model</h4>
							</div>
							<div class="widget-content">
								<form class="form-horizontal row-border" method="post" id="validate-1" action="<?php echo base_url(); ?>brand/addModel">

									<div class="form-group">
										<label class="col-md-2 control-label">Model<span class="required">*</span></label>
										<div class="col-md-5">
											<input type="text" name="name" class="form-control required">
										</div>
										<div class="col-md-5">
											<select name="brand_id" class="col-md-12 select2 full-width-fix required">
												<option>Select Brand*</option>
												<?php foreach($brand as $b){?>
												<option value="<?php echo $b['Id_Brand']?>"><?php echo $b['Name_Brand']?></option>
												<?php } ?>

											</select>
										</div>
									</div>
									<div class="form-actions">
										<input type="submit" value="Insert" class="btn btn-primary pull-right">
									</div>
								</form>
							</div>
						</div>
						<!-- /Validation Example 1 -->
					</div>
					<div class="col-md-6">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i> LIST</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div class="widget-content">
								<table class="table table-striped table-bordered table-hover table-checkable table-responsive datatable" data-display-length="10">
									<thead>
										<tr>
											<th>#</th>
											
											<th>Brand</th>
											
											<th>Edit</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=1;foreach($q as $r){ ?>
										<tr>
											<td><?php echo $i;?></td>
											
											<td><span><?php echo $r['Name_Brand'];?></span>



											</td>
											
											<td><div class="make-switch switch-mini" data-on="success" data-off="danger">
                                                    <a data-toggle="modal" href="#myModal<?php echo $r['Id_Brand'];?>" > edit </a>
                                                    <div class="modal fade" id="myModal<?php echo $r['Id_Brand'];?>">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <form class="form-horizontal row-border" method="post" enctype="multipart/form-data" action="<?php echo base_url();?>brand/edit">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                        <h4 class="modal-title">Edit Brand</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label class="col-md-3 control-label">Brand :</label>
                                                                            <div class="col-md-9">
                                                                                <input type="text" name="name" value="<?php echo $r['Name_Brand'];?>" class="form-control required">
                                                                            </div>
                                                                        </div>
                                                                        <input type="hidden" name='id' value="<?php echo $r['Id_Brand'];?>">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary" >Save changes</button>
                                                                    </div>
                                                                </form>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div>

                                                </div>
											</td>
											<td><div class="make-switch switch-mini" data-on="success" data-off="danger">
												<input type="checkbox" onchange="OnChangeCheckboxDel (this)" id="myCheckbox"  value="<?php echo $r['Id_Brand'];?>" />
												</div>
											</td>
										</tr>
										<?php $i++;} ?>
										
									</tbody>

									
								</table>
								<div class="form-actions">
									<input type="submit" value="Submit" class="btn btn-primary pull-right">
								</div>
								</form>
							</div>
						</div>
						<!-- /Simple Table -->
					</div>

					<div class="col-md-6">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i> Model</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div class="widget-content no-padding">
								<table class="table table-striped table-bordered table-hover table-checkable table-responsive datatable" data-display-length="10">
									<thead>
									<tr>
										<th class="checkbox-column"> #</th>
										<th data-class="expand">Brand</th>
										<th>Model</th>
										<th>Edit</th>
										<th>Delete</th>
									</tr>
									</thead>
									<tbody>
									<?php $i=1;foreach($model as $m){ ?>
									<tr>
										<td class="checkbox-column">
											<?php echo $i;?>
										</td>
										<td><?php echo $m['brand'];?></td>
										<td><span><?php echo $m['Name_Type'];?></span>



										</td>
										<td><div class="make-switch switch-mini" data-on="success" data-off="danger">
                                                <a data-toggle="modal" href="#Modal<?php echo $m['Id_Type'];?>" >Edit </a>
                                                <div class="modal fade" id="Modal<?php echo $m['Id_Type'];?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form class="form-horizontal row-border" method="post" enctype="multipart/form-data" action="<?php echo base_url();?>brand/editModel">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                    <h4 class="modal-title">Edit Model</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label class="col-md-3 control-label">Model :</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" name="name" value="<?php echo $m['Name_Type'];?>" class="form-control required">
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" name='id' value="<?php echo $m['Id_Type'];?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary" >Save changes</button>
                                                                </div>
                                                            </form>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div>
                                            </div>
										</td>
										<td><div class="make-switch switch-mini" data-on="success" data-off="danger">
												<input type="checkbox" onchange="OnChangeModelDel (this)" id="myCheckbox"  value="<?php echo $m['Id_Type'];?>" />
											</div>
										</td>
									</tr>
									<?php $i++;} ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>

				</div>
			</div>

		</div>
<script type="text/javascript">
	function OnChangeCheckbox (checkbox) {
		var slid = checkbox.value;
		var base_url = "<?php echo base_url();?>";
		if (checkbox.checked) {
			window.location.href = base_url + "brand/enable/1/" + slid;
		}
		else {
			window.location.href = base_url + "brand/enable/0/" + slid;
		}
	}
</script>

<script type="text/javascript">
	function OnChangeModel (checkbox) {
		var slid = checkbox.value;
		var base_url = "<?php echo base_url();?>";
		if (checkbox.checked) {
			window.location.href = base_url + "brand/ModelEnable/1/" + slid;
		}
		else {
			window.location.href = base_url + "brand/ModelEnable/0/" + slid;
		}
	}
</script>
<script type="text/javascript">
	function OnChangeCheckboxDel (checkbox) {
		var slid = checkbox.value;
		var base_url = "<?php echo base_url();?>";
		if (checkbox.checked) {
			window.location.href = base_url + "brand/del/1/" + slid;
		}
		else {
			window.location.href = base_url + "brand/del/0/" + slid;
		}
	}
</script>
<script type="text/javascript">
	function OnChangeModelDel (checkbox) {
		var slid = checkbox.value;
		var base_url = "<?php echo base_url();?>";
		if (checkbox.checked) {
			window.location.href = base_url + "brand/ModelDel/1/" + slid;
		}
		else {
			window.location.href = base_url + "brand/ModelDel/0/" + slid;
		}
	}
</script>