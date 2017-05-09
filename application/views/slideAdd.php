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
					<a href="<?php echo base_url(); ?>slide" title="">Slide</a>
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
				<?php $domain = explode("systemadmin",base_url());
				$data = array(
                    'image' => '',
                    'url' => '',
                    'id' => '',
                    'special_txt_1' => '',
                    'special_txt_2' => '',
                    'special_txt_3' => '',
                    'special_txt_4' => '',
                    'special_txt_5' => '',
                );
				if($q != null)
                {
                    $data = $q[0];
                }

				?>
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
						<form class="form-horizontal row-border" method="post" enctype="multipart/form-data" id="validate-1" action="<?php echo base_url();?>slide/<?php echo $action;?>">
							<div class="form-group">
								<label class="col-md-3 control-label">รูปภาพหลัก <span class="required">*</span> <br> [max resolution 1920X996]</label>
								<div class="col-md-9">
									<?php if($data['image']){ ?>
									<img src="<?php echo $domain[0].'images/slide/'.$data['image'];?>" width="500px;"> <br><br>
									<?php } ?>
									<input type="file" name="coverimg" class="" accept="image/*" data-style="fileinput" data-inputsize="medium">
									<input type="hidden" name="coverimg_old" value="<?php echo $data['image'];?>">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Link <span class="required">*</span></label>
								<div class="col-md-9">
									<input type="text" value="<?php echo $data['url'];?>" name="url"  class="form-control">
								</div>
							</div>
                            <div class="form-group">
								<label class="col-md-3 control-label">Choose Design <span class="required">*</span></label>

								<div class="col-md-9">
									<input type="radio" name="type" value="1" <?php echo  ($data['design']==1)? "checked" : null ;?>> 1 <a href="<?php echo $domain[0]; ?>slide/example/1"> [Example] </a> <br>
									<input type="radio" name="type" value="2" <?php echo  ($data['design']==2)? "checked" : null ;?>> 2  <a href="<?php echo $domain[0]; ?>slide/example/2">[Example] </a> <br>
									<input type="radio" name="type" value="3" <?php echo  ($data['design']==3)? "checked" : null ;?>> 3  <a href="<?php echo $domain[0]; ?>slide/example/3">[Example] </a> <br>
									<input type="radio" name="type" value="4" <?php echo  ($data['design']==4)? "checked" : null ;?>> 4  <a href="<?php echo $domain[0]; ?>slide/example/4">[Example] </a> <br>
									<input type="radio" name="type" value="5" <?php echo  ($data['design']==5)? "checked" : null ;?> > 5  <a href="<?php echo $domain[0]; ?>slide/example/5">[Example] </a> <br>

								</div>
							</div>

                            <div class="form-group">
								<label class="col-md-3 control-label">Special Text 1 :</label>
								<div class="col-md-9">
                                    <textarea name="special_txt_1" rows="4" style="width: 100%"></textarea>
                                </div>
							</div>
                            <div class="form-group">
								<label class="col-md-3 control-label">Special Text 2 :</label>
								<div class="col-md-9">
                                    <textarea name="special_txt_2" rows="4" style="width: 100%"></textarea>
                                </div>
							</div>
                            <div class="form-group">
								<label class="col-md-3 control-label">Special Text 3 :</label>
								<div class="col-md-9">
                                    <textarea name="special_txt_3" rows="4" style="width: 100%"></textarea>
                                </div>
							</div>
                            <div class="form-group">
								<label class="col-md-3 control-label">Special Text 4 :</label>
								<div class="col-md-9">
                                    <textarea name="special_txt_4" rows="4" style="width: 100%"></textarea>
                                </div>
							</div>
                            <div class="form-group">
								<label class="col-md-3 control-label">Special Text 5 :</label>
								<div class="col-md-9">
                                    <textarea name="special_txt_5" rows="4" style="width: 100%"></textarea>
                                </div>
							</div>
							
							<div class="form-actions">
								<input type="hidden" value="<?php echo $data['id'];?>" name="id" >
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
