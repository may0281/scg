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
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/fileinput/fileinput.js"></script>

	<!-- Form Validation -->
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/validation/jquery.validate.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/validation/additional-methods.min.js"></script>

	<!-- Noty -->
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/noty/jquery.noty.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/noty/layouts/top.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/noty/themes/default.js"></script>

	<!-- App -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/app.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins.form-components.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/bootstrap-wysihtml5/wysihtml5.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.min.js"></script>
	
	<script src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>
	<script src="<?php echo base_url();?>assets/sample.js"></script>
	<script src="<?php echo base_url();?>assets/sample1.js"></script>
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
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/demo/form_validation.js"></script>
	<div id="content">
			<div class="container">
				<!-- Breadcrumbs line -->
				<div class="crumbs">
					<ul id="breadcrumbs" class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="index.html">Dashboard</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>news" title="">News</a>
						</li>
						<li class="current">
							<a href="#" title="">add </a>
						</li>
					</ul>
				</div>
				<!-- /Breadcrumbs line -->

				<!--=== Page Header ===-->
				<div class="page-header">
					<div class="page-title">
						<?php $domain = explode("systemadmin",base_url()); ?>
						<h3>Add New Content</h3>
						<span></span>
					</div>
				</div>
				<!-- /Page Header -->

				<!--=== Page Content ===-->
				<div class="row">
					<!--=== Validation Example 1 ===-->
					<div class="col-md-12">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i></h4>
							</div>
							<div class="widget-content">
								<form class="form-horizontal row-border" method="post" enctype="multipart/form-data" id="validate-1" action="<?php echo base_url();?>news/add_action">
									<div class="form-group">
										<label class="col-md-3 control-label">ประเภทข่าว <span class="required">*</span>
                                        </label>
										<div class="col-md-9">

											<select name="type" class="col-md-12 select2 full-width-fix required">

												<?php foreach ($type_list as $ty) {?>
												<option value="<?php echo $ty['id']; ?>" <?php if($ty['id']==$data['type_id']){?> selected="selected" <?php } ?> >
                                                    <?php echo $ty['title']; ?>
                                                </option>
												<?php } ?>
											</select>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label">หัวข้อข่าว <span class="required">*</span></label>
										<div class="col-md-9">
											<input type="text" value="" name="title" class="form-control required">
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label">รูปภาพหลัก<span class="required">*</span></label>
										<div class="col-md-9">
                                            <input type="file" name="coverimg" class="" accept="image/*" data-style="fileinput" data-inputsize="medium">
										</div>
									</div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Gallery </label>
                                        <div class="col-md-9">
                                            <input type="file" name="my_file[]" multiple  class="form-control" accept="image/*" data-inputsize="medium">
                                            <p class="help-block">Images only (image/*)</p>
                                            <label for="gal1" class="has-error help-block" generated="true" style="display:none;"></label>
                                        </div>
                                    </div>									
									<div class="form-group">
										<label class="col-md-3 control-label">รายละเอียดข่าว :</label>
										<div class="col-md-9"><textarea  name="description" id="editor" > <?php echo $data['description'];?></textarea></div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">วีดีโอ <span class="required"></span></label>
										<div class="col-md-9">
											<input type="text" value="" name="video" class="form-control ">
											<label for="gal1" class="has-error help-block" generated="true">
												ตัวอย่าง https://www.youtube.com/watch?v=2fngvQS_PmQ
											</label>
										</div>
									</div>
									<div class="form-actions">
										<input type="submit" value="INSERT" class="btn btn-primary pull-right">
									</div>
								</form>
							</div>
						</div>
						<!-- /Validation Example 1 -->
					</div>
				</div>
			</div>
			<!-- /.container -->

		</div>
	</div>

</body>
</html>
	<script>
		initSample();
	</script>
