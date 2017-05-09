<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<title>Dashboard | Pegasus Auto Haus </title>

	<!--=== CSS ===-->

	<!-- Bootstrap -->
	<link href="<?php echo base_url();?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />


	<!-- Theme -->
	<link href="<?php echo base_url();?>assets/css/main.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/css/plugins.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/css/icons.css" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/fontawesome/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>

	
</head>

<body>
	<!-- Header -->
	<header class="header navbar navbar-fixed-top" role="banner">
		<!-- Top Navigation Bar -->
		<div class="container">

			<!-- Only visible on smartphones, menu toggle -->
			<ul class="nav navbar-nav">
				<li class="nav-toggle"><a href="javascript:void(0);" title=""><i class="icon-reorder"></i></a></li>
			</ul>

			<!-- Logo -->
			<a class="navbar-brand" href="<?php echo base_url();?>dashboard">
				
				<strong>Administrator</strong>
			</a>
			<!-- /logo -->

			<!-- Sidebar Toggler -->
			<a href="#" class="toggle-sidebar bs-tooltip" data-placement="bottom" data-original-title="Toggle navigation">
				<i class="icon-reorder"></i>
			</a>
			<!-- /Sidebar Toggler -->
			<!-- Top Left Menu -->
			<ul class="nav navbar-nav navbar-left hidden-xs hidden-sm">
				<li>
					<a href="<?php echo base_url();?>dashboard">
						Dashboard
					</a>
				</li>
				<li>
							<a href="<?php echo base_url();?>login/Logout"><i class="icon-plus"></i><span>Logout</span></a>
				</li>
			</ul>
			<!-- /Top Left Menu -->
		</div>
	</header> <!-- /.header -->
<?php  $path = substr($_SERVER["REQUEST_URI"],13);  $subpath[2] = null; $subpath = explode('/', $path);
		$s_path_1 = null;
		$s_path_2 = null;
		$s_path_3 = null;
		$subpath = explode('/', $path);
		if(isset($subpath[2])){
			$s_path_3 = $subpath[2];
		}

?>
	<div id="container">
		<div id="sidebar" class="sidebar-fixed">
			<div id="sidebar-content">
				<!--=== Navigation ===-->
				<ul id="nav">
					<li <?php if($path=='dashboard'){echo "class='current'";} ?>>
						<a href="<?php echo base_url();?>dashboard">
							<i class="icon-dashboard"></i>
							Dashboard
						</a>
					</li>
					<li class="<?php if($subpath[0]=='car'){echo "current open";} ?>">
						<a href="javascript:void(0);">
							<i class="icon-table"></i>
							Car
						</a>
						<ul class="sub-menu">
							
							<li class="<?php if($subpath[1]=='brand'){echo "current";} ?>">
								<a href="<?php echo base_url();?>car/brand">
								<i class="icon-angle-right"></i>
								Brand
								</a>
							</li>
                            <li class="<?php if($subpath[1].'/'.$s_path_3=='list/newcar'){echo "current";} ?>">
                                <a href="<?php echo base_url();?>car/list/New-car">
                                    <i class="icon-angle-right"></i>
                                    New Car List
                                </a>
                            </li>
							<li class="<?php if($subpath[1].'/'.$s_path_3=='list/Used-car'){echo "current";} ?>">
								<a href="<?php echo base_url();?>car/list/usedcar">
									<i class="icon-angle-right"></i>
									Used Car List 
								</a>
							</li>
                            <li class="<?php if($subpath[1].'/'.$s_path_3=='list/Importing'){echo "current";} ?>">
								<a href="<?php echo base_url();?>car/list/importcar">
									<i class="icon-angle-right"></i>
									Import Car List
								</a>
							</li>

                            <li class="<?php if($subpath[1]=='add'){echo "current";} ?>">
                                <a href="<?php echo base_url();?>car/add">
                                    <i class="icon-angle-right"></i>
                                    Add New Car
                                </a>
                            </li>
							
						</ul>
					</li>
					<li class="<?php if($subpath[0]=='slide'){echo "current";} ?>">
						<a href="<?php echo base_url();?>slide/">
							<i class="icon-edit"></i>
							Slide
						</a>
					</li>
					<li class="<?php if($subpath[0]=='news'){echo "current";} ?>">
						<a href="<?php echo base_url();?>news/">
							<i class="icon-edit"></i>
							News
						</a>
					</li>
					<li class="<?php if($subpath[0]=='celebrate'){echo "current";} ?>">
						<a href="<?php echo base_url();?>celebrate">
							<i class="icon-table"></i>
							Celebrate
						</a>
					</li>
					<li class="<?php if($subpath[0]=='service'){echo "current";} ?>">
						<a href="<?php echo base_url();?>service">
							<i class="icon-table"></i>
							Service
						</a>

					<li class="<?php if($subpath[0]=='part'){echo "current";} ?>">
						<a href="<?php echo base_url();?>part">
							<i class="icon-table"></i>
							Part
						</a>
					</li>
					<li class="<?php if($subpath[0]=='offer'){echo "current";} ?>">
						<a href="<?php echo base_url();?>offer">
							<i class="icon-table"></i>
							Offer
						</a>
					</li>
					<li class="<?php if($subpath[0]=='offer'){echo "accessory";} ?>">
						<a href="<?php echo base_url();?>accessory">
							<i class="icon-table"></i>
							Accessory
						</a>
					</li>
					
					<li>
						<a href="https://developers.facebook.com/tools/debug/og/object/">
							<i class="icon-facebook"></i>
							Facebook Debugger
						</a>
					</li>
				</ul>			
				<!-- /Navigation -->
				<div class="sidebar-widget align-center">
					<div class="btn-group" data-toggle="buttons" id="theme-switcher">
						<label class="btn active">
							<input type="radio" name="theme-switcher" data-theme="bright"><i class="icon-sun"></i> Bright
						</label>
						<label class="btn">
							<input type="radio" name="theme-switcher" data-theme="dark"><i class="icon-moon"></i> Dark
						</label>
					</div>
				</div>

			</div>
			<div id="divider" class="resizeable"></div>
		</div>
		<!-- /Sidebar -->
