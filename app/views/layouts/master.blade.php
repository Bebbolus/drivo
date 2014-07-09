<!DOCTYPE html>
<html lang="it">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<title>DRIVO</title>
	<!--=== CSS ===-->

	<!-- Bootstrap -->
	{{ HTML::style('bootstrap/css/bootstrap.min.css') }}

	<!-- jQuery UI -->
	<!--<link href="plugins/jquery-ui/jquery-ui-1.10.2.custom.css" rel="stylesheet" type="text/css" />-->
	<!--[if lt IE 9]>
		<link rel="stylesheet" type="text/css" href="plugins/jquery-ui/jquery.ui.1.10.2.ie.css"/>
	<![endif]-->

	<!-- Theme -->
	{{ HTML::style('assets/css/main.css') }}
	{{ HTML::style('assets/css/plugins.css') }}
	{{ HTML::style('assets/css/responsive.css') }}
	{{ HTML::style('assets/css/icons.css') }}
	{{ HTML::style('assets/css/fontawesome/font-awesome.min.css') }}

	<!--[if IE 7]>
		<link rel="stylesheet" href="assets/css/fontawesome/font-awesome-ie7.min.css">
	<![endif]-->

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>

	<!--=== JavaScript ===-->
	{{ HTML::script('assets/js/libs/jquery-1.10.2.min.js') }}
	{{ HTML::script('plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js') }}
	
	{{ HTML::script('bootstrap/js/bootstrap.min.js') }}
	{{ HTML::script('assets/js/libs/lodash.compat.min.js') }}

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="assets/js/libs/html5shiv.js"></script>
	<![endif]-->

	<!-- Smartphone Touch Events -->
	{{ HTML::script('plugins/touchpunch/jquery.ui.touch-punch.min.js') }}
	{{ HTML::script('plugins/event.swipe/jquery.event.move.js') }}
	{{ HTML::script('plugins/event.swipe/jquery.event.swipe.js') }}
	

	<!-- General -->
	{{ HTML::script('assets/js/libs/breakpoints.js') }}
	{{ HTML::script('plugins/respond/respond.min.js') }} <!-- Polyfill for min/max-width CSS3 Media Queries (only for IE8) -->

	
	{{ HTML::script('plugins/cookie/jquery.cookie.min.js') }}
	{{ HTML::script('plugins/slimscroll/jquery.slimscroll.min.js') }}
	{{ HTML::script('plugins/slimscroll/jquery.slimscroll.horizontal.min.js') }}

	<!-- App -->
	{{ HTML::script('assets/js/app.js') }}
	{{ HTML::script('assets/js/plugins.js') }}
	{{ HTML::script('assets/js/plugins.form-components.js') }}
	
	@yield('specific_plugin')   {{-- SEZIONE SPECIFICA PER INSERIRE I PLUG-IN RELATIVI A PARTICOLARI PAGINE  --}}
	
	<script>
	$(document).ready(function(){
		"use strict";

		App.init(); // Init layout and core plugins
		Plugins.init(); // Init all plugins
		FormComponents.init(); // Init all form-specific plugins
	});
	</script>
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
			{{ HTML::decode(link_to_route('home', HTML::image('assets/img/logo_ico.png', 'logo') . '<strong>DRIVO</strong>', [], ['class'=>'navbar-brand']))}} 
			<!-- /logo -->

			<!-- Sidebar Toggler -->
			<a href="#" class="toggle-sidebar bs-tooltip" data-placement="bottom" data-original-title="Toggle navigation">
				<i class="icon-reorder"></i>
			</a>
			<!-- /Sidebar Toggler -->

			<!-- Top Left Menu -->
			
			<ul class="nav navbar-nav navbar-left hidden-xs hidden-sm">
				<li>
				{{ HTML::linkRoute('home', 'HOME')}} 
				</li>
			</ul>
			<!-- /Top Left Menu -->

			<!-- Top Right Menu -->
			<ul class="nav navbar-nav navbar-right">
				<!-- User Login Dropdown -->
				<li class="dropdown user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-male"></i>
						<span class="username">{{Auth::user()->username}}</span>
						<i class="icon-caret-down small"></i>
					</a>
					<ul class="dropdown-menu">
						<li>							
							{{ HTML::decode(link_to_route('logout', '<i class="icon-key"></i> Esci'))}} 
						</li>
					</ul>
				</li>
				<!-- /user login dropdown -->
			</ul>
			<!-- /Top Right Menu -->
		</div>
		<!-- /top navigation bar -->
	</header> <!-- /.header -->


	<div id="container">
		<div id="sidebar" class="sidebar-fixed">
			<div id="sidebar-content">

				@if (Auth::user()->group >= '5')
					@include('layouts.navigation.admin')
					
				@elseif (Auth::user()->group < '5')
					@include('layouts.navigation.user')
				@endif
				
				
			</div>
			<div id="divider" class="resizeable"></div>
		</div>
		<!-- /Sidebar -->

		<div id="content">
			<div class="container">
				<!-- Breadcrumbs line -->
				<div class="crumbs">
					<ul id="breadcrumbs" class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="/{{$main_path}}">Home</a>
						</li>
						@yield('breadcrumbs')
					</ul>

					<ul class="crumb-buttons">
						<li class="range"><a href="home">
							<i class="icon-calendar"></i>
							<span>
							<?PHP 
							setlocale(LC_TIME, 'ita', 'it_IT.utf8_encode');
							$dt = \Carbon\Carbon::now();
							echo $dt->formatLocalized('%d %B %Y');
							?></span>
						</a></li>
					</ul>
				</div>
				<!-- /Breadcrumbs line -->

				<!--=== Page Header ===-->
				<div class="page-header">
					<div class="page-title">
						@yield('page_header') 
					</div>
				</div>
				<!-- /Page Header -->

				
				<!--=== Page Content ===-->
				@if ($message = Session::get('errore'))
					<br>
					<div class="alert alert-danger alert-block">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<h4>Errore</h4>
						{{{ $message }}}
					</div>
				@endif

				@if ($message = Session::has('flash_message'))
					<br>
					<div class="alert alert-info alert-block">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<h4>Errore</h4>
						{{{ $message }}}
					</div>
				@endif

				@yield('content')	
				
				
				<!-- /Page Content -->

			</div>
			<!-- /.container -->

		</div>
	</div>
	
</body>
</html>
