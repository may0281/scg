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
<?php

$path = explode('/',$_SERVER["REQUEST_URI"]);
if(empty($path[4]))
{
    $path[4] = null;
}
if(empty($path[3]))
{
    $path[3] = null;
}


?>
	<div id="container">
		<div id="sidebar" class="sidebar-fixed">
			<div id="sidebar-content">
				<!--=== Navigation ===-->
				<ul id="nav">
					<li <?php if($path[2]=='dashboard'){echo "class='current'";} ?>>
						<a href="<?php echo base_url();?>dashboard">
							<i class="icon-dashboard"></i>
							Dashboard
						</a>
					</li>
					<li class="<?php if($path[2]=='car'){echo "current open";} ?>">
						<a href="javascript:void(0);">
							<i class="icon-table"></i>
							Car
						</a>
						<ul class="sub-menu">
							
							<li class="<?php if($path[3]=='brand'){echo "current";} ?> ">
								<a href="<?php echo base_url();?>car/brand">
								<i class="icon-angle-right"></i>
								Brand
								</a>
							</li>
                            <li class="<?php if($path[3].'/'.$path[4]=='list/New-car'){echo "current";} ?> ">
                                <a href="<?php echo base_url();?>car/list/New-car">
                                    <i class="icon-angle-right"></i>
                                    New Car List
                                </a>
                            </li>
							<li class="<?php if($path[3].'/'.$path[4]=='list/usedcar'){echo "current";} ?>">
								<a href="<?php echo base_url();?>car/list/usedcar">
									<i class="icon-angle-right"></i>
									Used Car List 
								</a>
							</li>
                            <li class="<?php if($path[3].'/'.$path[4]=='list/importcar'){echo "current";} ?>">
								<a href="<?php echo base_url();?>car/list/importcar">
									<i class="icon-angle-right"></i>
									Import Car List
								</a>
							</li>

                            <li class="<?php if($path[3]=='add'){echo "current";} ?>">
                                <a href="<?php echo base_url();?>car/add">
                                    <i class="icon-angle-right"></i>
                                    Add New Car
                                </a>
                            </li>
							
						</ul>
					</li>
					<li class="<?php if($path[2]=='slide'){echo "current";} ?>">
						<a href="<?php echo base_url();?>slide/">
							<i class="icon-edit"></i>
							Slide
						</a>
					</li>
					<li class="<?php if($path[2]=='news'){echo "current";} ?>">
						<a href="<?php echo base_url();?>news/">
							<i class="icon-edit"></i>
							News
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
