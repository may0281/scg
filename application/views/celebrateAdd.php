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

<!-- Pickers -->
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/pickadate/picker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/pickadate/picker.date.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/pickadate/picker.time.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>

<!-- Noty -->
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/noty/jquery.noty.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/noty/layouts/top.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/noty/themes/default.js"></script>

<!-- Slim Progress Bars -->
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/nprogress/nprogress.js"></script>

<!-- Bootbox -->
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/bootbox/bootbox.min.js"></script>

<!-- App -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/app.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins.form-components.js"></script>
<script src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url();?>assets/sample.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>assets/ckeditor/toolbarconfigurator/lib/codemirror/neo.css">
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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/demo/ui_general.js"></script>

<div id="container">


	<div id="content">
		<div class="container">
			<!-- Breadcrumbs line -->

			<!--=== Page Header ===-->
			<div class="page-header">
				<div class="page-title">
					<h3>Celebrate</h3>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<h5 class="widget-title"><i class="icon-hand-up"></i> Set Up Celebrate</h5>
				</div>
			</div>
			<!-- /Title -->

			<!--=== Pickers ===-->
			<div class="row">
				<!--=== Date Pickers ===-->
				<div class="col-md-12">
					<div class="widget box">
						<div class="widget-header">
							<h4><i class="icon-reorder"></i> Date Pickers</h4>
						</div>
						<div class="widget-content">
							<form class="form-horizontal row-border" method="post"   action="<?php echo base_url();?>celebrate/add_action">
								<div class="form-group">
									<label class="col-md-2 control-label">หัวข้อ <span class="required">*</span></label>
									<div class="col-md-10">
										<input type="text" name="title"  value="<?php echo $celebrate['title'] ?>" class="form-control required">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label">ข่าว :</label>
									<div class="col-md-10"><textarea  name="description" id="editor" > <?php echo $celebrate['description'];?></textarea></div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label">START DATE:</label>
									<div class="col-md-4">
										<input type="text" name="start_date" class="form-control datepicker" value="<?php echo $con['start_date'];?>">
									</div>
									<div class="col-md-2" style="text-align: right"> END DATE:  </div>
									<div class="col-md-4">
										<input type="text" name="end_date" class="form-control datepicker" value="<?php echo $con['end_date'];?>">
									</div>
								</div>
								<div class="form-actions">
									<input type="submit" value="INSERT" class="btn btn-primary pull-right">
								</div>
							</form>
						</div> <!-- /.widget-content -->
					</div>
				</div>
				<!-- /Date Pickers -->
			</div>
			<!-- /Page Content -->
		</div>
		<!-- /.container -->

	</div>
</div>
<script>
	initSample();
</script>
