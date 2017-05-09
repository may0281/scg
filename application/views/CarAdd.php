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
    <?php $domain = explode("systemadmin",base_url()); ?>
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
							<a href="<?php echo base_url(); ?>car/NewCarList" title="">Car</a>
						</li>
						<li class="current">
							<a href="#" title=""><?php echo $action;?></a>
						</li>
					</ul>
				</div>
				<!-- /Breadcrumbs line -->

				<!--=== Page Header ===-->
				<div class="page-header">
					<div class="page-title">
						<h3> <?php echo strtoupper($action);?> <?php echo strtoupper($type);?></h3>
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
								<form class="form-horizontal row-border" method="post" enctype="multipart/form-data" id="validate-1" action="<?php echo base_url();?>car/<?php echo $action;?>_action">
									<div class="form-group">
										<label class="col-md-2 control-label">ยี่ห้อ <span class="required">*</span></label>
										<div class="col-md-4">
											<select name="Car_Brand" class="col-md-12 select2 full-width-fix required" id="select-brand">
												<option></option>
												<?php foreach ($brand_list as $brand) {?>
												<option value="<?php echo $brand['Id_Brand']; ?>" <?php if($car['Car_Brand']==$brand['Id_Brand']){ echo 'selected';} ?> ><?php echo $brand['Name_Brand']; ?></option>
												<?php } ?>
											</select>
										</div>
                                        <label class="col-md-2 control-label">รุ่น <span class="required">*</span></label>
                                        <div class="col-md-4 hide" id="select-add">
                                            <select name="Car_Model" class="col-md-12 select2 full-width-fix required" id="form-select-model">
                                                <option></option>
                                            </select>
                                        </div>
                                        <?php if($action == 'edit'){ ?>
                                            <div class="col-md-4" id="select-edit">
                                                <select name="Car_Model" class="col-md-12 select2 full-width-fix required" id="form-edit-model">
                                                <?php foreach ($model_list as $model) {?>
                                                    <option value="<?php echo $model['Id_Type']; ?>" <?php if($car['Car_Model']==$model['Id_Type']){ echo 'selected';} ?> ><?php echo $model['Name_Type']; ?></option>
                                                <?php } ?>
                                                </select>
                                            </div>
                                        <?php } ?>



									</div>

									<div class="form-group">
										<label class="col-md-2 control-label">รายละเอียดรุ่น : <span class="required">*</span></label>
										<div class="col-md-4">
											<input type="text" name="Car_Body"  value="<?php echo $car['Car_Body']; ?>"   class="form-control required">
										</div>
										<label class="col-md-2 control-label">ปี : <span class="required">*</span></label>
										<div class="col-md-4">
											<input type="text" name="Car_Year" value="<?php echo $car['Car_Year'] ?>"  class="form-control required">
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-2 control-label">สี : <span class="required">*</span></label>
										<div class="col-md-4">
											<input type="text" name="Car_Colo" value="<?php echo $car['Car_Colo'] ?>" class="form-control required">
										</div>
										<label class="col-md-2 control-label">เลขไมค์ (km.) : <span class="required">*</span></label>
										<div class="col-md-4">
											<input type="text" name="Car_Mile" value="<?php echo $car['Car_Mile'] ?>" class="form-control required">
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-2 control-label">สถานะรถ : <span class="required">*</span></label>
										<div class="col-md-4">

                                            <select name="Car_Condition" class="col-md-12 select2 full-width-fix required" id="select-brand">
                                                <option></option>
                                                <option value="New-car" <?php echo ($car['Car_Condition'] == 'New-car') ? 'selected' : null ?>>New-car</option>
                                                <option value="Used-car" <?php echo ($car['Car_Condition'] == 'Used-car') ? 'selected' : null ?>>Used-car</option>
                                                <option value="Importing" <?php echo ($car['Car_Condition'] == 'Importing') ? 'selected' : null ?>>Importing</option>
<!--                                                <option value="Shock-price" --><?php //echo ($car['Car_Condition'] == 'Shock-price') ? 'selected' : null ?><!-->Shock-price</option>-->
<!--                                                <option value="Hot-car" --><?php //echo ($car['Car_Condition'] == 'Hot-car') ? 'selected' : null ?><!-->Hot-car</option>-->
<!--                                                <option value="Low-down" --><?php //echo ($car['Car_Condition'] == 'Low-down') ? 'selected' : null ?><!-->Low-down</option>-->
<!--                                                <option value="Sold-sold" --><?php //echo ($car['Car_Condition'] == 'Sold-sold') ? 'selected' : null ?><!-->Sold-sold</option>-->
<!--                                                <option value="Reserved" --><?php //echo ($car['Car_Condition'] == 'Reserved') ? 'selected' : null ?><!-->Reserved</option>-->
                                            </select>
										</div>

									</div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Engine Capacity  </label>
                                        <div class="col-md-9">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Engine Capacity : </label>
                                        <div class="col-md-4">
                                            <input type="text" name="Car_acc_air" value="<?php echo $car['Car_acc_air'] ?>" class="form-control ">
                                        </div>
                                        <label class="col-md-2 control-label">Engine type :	 </label>
                                        <div class="col-md-4">
                                            <input type="text" name="Car_acc_mirror" value="<?php echo $car['Car_acc_mirror'] ?>" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Compression ratio  : </label>
                                        <div class="col-md-4">
                                            <input type="text" name="Car_acc_centralloak" value="<?php echo $car['Car_acc_centralloak'] ?>" class="form-control ">
                                        </div>
                                        <label class="col-md-2 control-label">Bore x Stroke :	 </label>
                                        <div class="col-md-4">
                                            <input type="text" name="Car_acc_ear" value="<?php echo $car['Car_acc_ear'] ?>" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Power : </label>
                                        <div class="col-md-4">
                                            <input type="text" name="Car_acc_radiotap" value="<?php echo $car['Car_acc_radiotap'] ?>" class="form-control ">
                                        </div>
                                        <label class="col-md-2 control-label">Torque :	 </label>
                                        <div class="col-md-4">
                                            <input type="text" name="Car_acc_fog" value="<?php echo $car['Car_acc_fog'] ?>" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Fuel consumption : </label>
                                        <div class="col-md-4">
                                            <input type="text" name="Car_acc_multi" value="<?php echo $car['Car_acc_multi'] ?>" class="form-control ">
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Performance </label>
                                        <div class="col-md-9">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Acceleration : </label>
                                        <div class="col-md-4">
                                            <input type="text" name="Car_acc_cd" value="<?php echo $car['Car_acc_cd'] ?>" class="form-control">
                                        </div>
                                        <label class="col-md-2 control-label">Top Speed :	 </label>
                                        <div class="col-md-4">
                                            <input type="text" name="Car_acc_seat" value="<?php echo $car['Car_acc_seat'] ?>" class="form-control ">
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Misc technical data </label>
                                        <div class="col-md-9">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Transmission : </label>
                                        <div class="col-md-4">
                                            <input type="text" name="Car_acc_mag" value="<?php echo $car['Car_acc_mag'] ?>" class="form-control">
                                        </div>
                                        <label class="col-md-2 control-label"> Drive type :	 </label>
                                        <div class="col-md-4">
                                            <input type="text" name="Car_acc_airbag" value="<?php echo $car['Car_acc_airbag'] ?>" class="form-control ">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Measurement</label>
                                        <div class="col-md-9">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Body type :</label>
                                        <div class="col-md-4">
                                            <input type="text" name="Car_acc_remote" value="<?php echo $car['Car_acc_remote'] ?>" class="form-control">
                                        </div>
                                        <label class="col-md-2 control-label"> Dimentions ( L x W x H ) :	 </label>
                                        <div class="col-md-4">
                                            <input type="text" name="Car_acc_abs" value="<?php echo $car['Car_acc_abs'] ?>" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Wheelbase :</label>
                                        <div class="col-md-4">
                                            <input type="text" name="Car_acc_keylock" value="<?php echo $car['Car_acc_keylock'] ?>" class="form-control">
                                        </div>
                                        <label class="col-md-2 control-label"> Min turning radius : </label>
                                        <div class="col-md-4">
                                            <input type="text" name="Car_acc_power" value="<?php echo $car['Car_acc_power'] ?>" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Kerb weight :</label>
                                        <div class="col-md-4">
                                            <input type="text" name="Car_acc_moonroof" value="<?php echo $car['Car_acc_moonroof'] ?>" class="form-control">
                                        </div>
                                        <label class="col-md-2 control-label"> Fuel tank capacity : </label>
                                        <div class="col-md-4">
                                            <input type="text" name="Car_acc_numtao" value="<?php echo $car['Car_acc_numtao'] ?>" class="form-control ">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Brakes </label>
                                        <div class="col-md-9">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Brakes (Front) :</label>
                                        <div class="col-md-4">
                                            <input type="text" name="Car_acc_bowkam" value="<?php echo $car['Car_acc_bowkam'] ?>" class="form-control">
                                        </div>
                                        <label class="col-md-2 control-label"> Brakes (Rear) :	 </label>
                                        <div class="col-md-4">
                                            <input type="text" name="Car_acc_man" value="<?php echo $car['Car_acc_man'] ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Suspension : </label>
                                        <div class="col-md-9">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Suspension (Front) :</label>
                                        <div class="col-md-4">
                                            <input type="text" name="Car_acc_sunroof" value="<?php echo $car['Car_acc_sunroof'] ?>" class="form-control">
                                        </div>
                                        <label class="col-md-2 control-label"> Suspension (Rear) :	 </label>
                                        <div class="col-md-4">
                                            <input type="text" name="Car_acc_back" value="<?php echo $car['Car_acc_back'] ?>" class="form-control ">
                                        </div>
                                    </div>

									<div class="form-group">
										<label class="col-md-2 control-label">ไฟล์ PDF</label>
										<div class="col-md-10">
                                            <?php echo $car['Car_acc_crouse'] ?>
											<input type="file" name="pdf" data-style="fileinput" data-inputsize="medium">
											<input type="hidden" name="old_pdf" value="<?php echo $car['Car_acc_crouse'] ?>">
											<p class="help-block">pdf only (pdf/*)</p>

										</div>
									</div>

									<div class="form-group">
                                        <label class="col-md-2 control-label">แกลอรี่ <span class="required">*</span></label>
                                        <div class="col-md-10">
                                            <?php $i=1;foreach ($car_pic as $g) { ?>
                                                <div class="col-md-3">
                                                    <img src="<?php echo $domain[0];?>/images/img_car/<?php echo $g['Pic_Name'];?>" width='200'>
                                                    <label class="checkbox"><input type="checkbox" name="del[]" value="<?php echo $g['Id_Pic']."&".$g['Pic_Name'];?>" class=""> Delete </label>
                                                </div>
                                                <?php if($i==4 or $i==8 or $i==12 or $i==16){?><div style="clear:both"></div><?php } ?>
                                                <?php $i++; } ?>
                                        </div>
                                        <label class="col-md-2 control-label"></label>
										<div class="col-md-4">
											 <input type="file" name="my_file[]" multiple  class="form-control" accept="image/*" data-inputsize="medium">
											<p class="help-block">Images only (image/*)</p>
											<label for="gal1" class="has-error help-block" generated="true" style="display:none;"></label>
										</div>
										
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Short Description :</label>
										<div class="col-md-10">
                                            <textarea rows="5" name="Car_acc_option" class="form-control" >
                                                <?php echo $car['Car_acc_option'] ?>
                                            </textarea>
                                        </div>
									</div>

									<div class="form-group">
										<label class="col-md-2 control-label">SPECIAL OFFERS :</label>
										<div class="col-md-10">
                                            <textarea rows="5" name="SPECIAL_OFFERS" class="form-control" >
                                                <?php echo $car['SPECIAL_OFFERS'] ?>
                                            </textarea>
										</div>
									</div>

									<div class="form-actions">
                                        <?php if($action == 'add') { ?>
                                            <input type="hidden" name="Car_Status" value="1">
                                        <?php }else{ ?>
                                            <input type="hidden" name="Car_Status" value="<?php echo $car['Car_Status']; ?>">
                                        <?php } ?>
                                        <input type="hidden" name="id" value="<?php echo $car['Car_Id'] ?>">
										<input type="submit" value="<?php echo strtoupper($action); ?>" class="btn btn-primary pull-right">
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
        $('#select-brand').change(function () {
            $('#select-edit').html('');
            $('#select-add').removeClass('hide');
            var brand = this.value;
            console.log(brand);
            if(brand != '') {
                var base_url = window.location.origin;
                var i = 0;
                $.ajax({
                    url: base_url + "/systemadmin/brand/selectModel/" + brand,
                    dataType: "json",
                    beforeSend: function () {
                        // setting a timeout
                        $('#loading').removeClass('hide');
                        i++;
                    },
                    success: function (result) {
                        if (result.code == 200) {
                            $("#context_header").removeClass('hidden');
                            var select = $('#form-select-model');
                            select.empty().append('<option value="" > </option>');
                            for (var j = 0; j < result.data.length; j++) {
                                var data_obj = result.data[j];
                                select.append("<option value='" + data_obj['Id_Type'] + "'>" + data_obj['Name_Type'] + "</option>");
                            }
                        }
                        else {
                            $("#context_header").addClass('hidden');
                        }

                    },
                    complete: function () {
                        i--;
                        if (i <= 0) {
                            $('#loading').addClass('hide');
                        }
                    }

                });
            }
            else {
                $('#context_header').addClass('hidden');
            }
        });


    </script>
