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
							<a href="<?php echo base_url(); ?>car/list/new" title="">Car</a>
						</li>
						<li class="current">
							<a href="#" title="">Edit </a>
						</li>
					</ul>
				</div>
				<!-- /Breadcrumbs line -->

				<!--=== Page Header ===-->
				<div class="page-header">
					<div class="page-title">
                        <?php $data = $car[0]; $data_brand = $brand_list;?>
                        <?php $domain = explode("systemadmin",base_url()); ?>
						<h3> <?php echo $data['brand'].' '.$data['model'].' '.$data['model_des'];?></h3>
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
								<form class="form-horizontal row-border" method="post" enctype="multipart/form-data" id="validate-1" action="<?php echo base_url();?>car/edit_action">
									<div class="form-group">
										<label class="col-md-3 control-label">ยี่ห้อ <span class="required">*</span>
                                        </label>
										<div class="col-md-9">

											<select name="brand" class="col-md-12 select2 full-width-fix required">

												<?php foreach ($data_brand as $brand) {?>
												<option value="<?php echo $brand['id']; ?>" <?php if($brand['id']==$data['brand_id']){?> selected="selected" <?php } ?> >
                                                    <?php echo $brand['brand']; ?>
                                                </option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">รุ่น <span class="required">*</span></label>
										<div class="col-md-9">
                                            <select name="model" class="col-md-12 select2 full-width-fix required" >
												<?php foreach ($model_list as $model) {?>
												<option value="<?php echo $model['id']; ?>" <?php if($model['id']==$data['model_id']){?> selected="selected" <?php } ?>>
                                                    <?php echo $model['name']; ?>
                                                </option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">รายละเอียดรุ่น <span class="required">*</span></label>
										<div class="col-md-9">
											<input type="text" value="<?php echo $data['model_des'];?>" name="des_model" class="form-control required">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">ราคา <span class="required">*</span></label>
										<div class="col-md-9">
											<input type="text" value="<?php echo $data['price'];?>" name="price" class="form-control required">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">ประเภทรถ <span class="required">*</span></label>
										<div class="col-md-9">
											<select name="type" class="col-md-12 select2 full-width-fix required" >
												<option value="newcar" <?php if($data['type']=='newcar'){?> selected="selected" <?php } ?> >New Car</option>
												<option value="usedcar" <?php if($data['type']=='usedcar'){?> selected="selected" <?php } ?>>Used Car</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">รูปภาพหลัก<span class="required">*</span></label>
										<div class="col-md-9">
                                            <img src="<?php echo $domain[0];?>images/<?php echo $data['main_img'];?>" width="250"> <br><br>
                                            <input type="file" name="coverimg" class="" accept="image/*" data-style="fileinput" data-inputsize="medium">
                                            <input type="hidden" name="coverimg_old" value="<?php echo $data['main_img'];?>" >
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">ไฟล์ PDF</label>
										<div class="col-md-9"> <?php echo $data['pdf'];?>
											<input type="file" name="pdf" data-style="fileinput" data-inputsize="medium">
											<input type="hidden" name="old_pdf" value=" <?php echo $data['pdf'];?>" >
											<p class="help-block">pdf only (pdf/*)</p>

										</div>
									</div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Gallery </label>
                                        <div class="col-md-9">
                                            <?php $i=1;foreach ($gallery as $g) { ?>
                                                <div class="col-md-3">
                                                    <img src="<?php echo $domain[0];?>images/<?php echo $g['image'];?>" width='200'>
                                                    <label class="checkbox"><input type="checkbox" name="del[]" value="<?php echo $g['id']."&".$g['image'];?>" class=""> Delete </label>
                                                </div>
                                                <?php if($i==4 or $i==8 or $i==12 or $i==16){?><div style="clear:both"></div><?php } ?>
                                                <?php $i++; } ?>
                                        </div>
                                        <div style="clear:both;height:20px;"></div>
                                        <label class="col-md-3 control-label">Add more </label>
                                        <!-- ..........1.......... -->
                                        <div class="col-md-9">
                                            <input type="file" name="my_file[]" multiple  class="form-control" accept="image/*" data-inputsize="medium">
                                            <p class="help-block">Images only (image/*)</p>
                                            <label for="gal1" class="has-error help-block" generated="true" style="display:none;"></label>
                                        </div>
                                    </div>
									<div class="form-group">
										<label class="col-md-3 control-label">Short Description :</label>
										<div class="col-md-9"><textarea  name="short_des" class="form-control wysiwyg"><?php echo $data['short_des'];?></textarea></div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Specifications :</label>
										<div class="col-md-9"><textarea  name="spec" id="editor" > <?php echo $data['spec'];?></textarea></div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Option :</label>
										<div class="col-md-9">
											<textarea rows="25" name="option" class="form-control wysiwyg"> <?php echo $data['option'];?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">SPECIAL OFFERS :</label>
										<div class="col-md-9">
											<textarea rows="10" name="sale" class="form-control wysiwyg" row="10"><?php echo $data['sale'];?></textarea>
										</div>
									</div>

									<div class="form-actions">
										<input type="hidden" name='id' value="<?php echo $data['id'];?>">
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
