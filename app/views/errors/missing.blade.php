<!DOCTYPE html>
<html lang="it">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<title>DRIVO | Page not found</title>

	<!--=== CSS ===-->

	<!-- Bootstrap -->
	{{ HTML::style('bootstrap/css/bootstrap.min.css') }}

	<!-- Theme -->
	{{ HTML::style('assets/css/main.css') }}
	{{ HTML::style('assets/css/plugins.css') }}
	{{ HTML::style('assets/css/responsive.css') }}
	{{ HTML::style('assets/css/icons.css') }}
	
	
	{{ HTML::style('assets/css/fontawesome/font-awesome.min.css') }}
	

	<!-- Login -->
	{{ HTML::style('assets/css/error.css') }}


	<!--[if IE 7]>
		<link rel="stylesheet" href="assets/css/fontawesome/font-awesome-ie7.min.css">
	<![endif]-->

	<!--[if IE 8]>
		<link href="assets/css/ie8.css" rel="stylesheet" type="text/css" />
	<![endif]-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>

	
	
	<!--=== JavaScript ===-->
	{{ HTML::script('assets/js/libs/jquery-1.10.2.min.js') }}
	
	{{ HTML::script('bootstrap/js/bootstrap.min.js') }}
	{{ HTML::script('assets/js/libs/lodash.compat.min.js') }}

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="assets/js/libs/html5shiv.js"></script>
	<![endif]-->
</head>

<body class="error">
	<!--=== Error Title ===-->
	<div class="title">
		<h1>PAGINA NON TROVATA</h1> <!-- You can use something like <h1 class="red">500</h1> for other error codes -->
	</div>
	<!-- /Error Title -->

	<div class="actions">
		<div class="list-group">
			<li class="list-group-item list-group-header align-center">
				Ooops! Sembra che qualcosa sia andato storto.
			</li>
			
			<!-- torna alla home page -->
			{{ HTML::decode(link_to_route('home', '<i class="icon-home"></i>Vai alla pagina iniziale<i class="icon-angle-right align-right"></i>',[], ['class' => 'list-group-item']))}} 
			
			<!-- mail -->
			{{ HTML::decode( HTML::mailto('lambis.net@gmail.com','<i class="icon-question"></i> Mail <i class="icon-angle-right align-right"></i>',['class' => 'list-group-item']))}}
			
			<!-- chiamaci -->
			<a href="javascript:void(0);" class="list-group-item"><i class="icon-phone"></i> Chiamaci <i class="icon-angle-right align-right"></i> <span class="badge">021-215-584</span></a>
		
		</div>
	</div>

	<!-- Footer -->
	<div class="footer">
		DRIVO
	</div>
	<!-- /Footer -->
</body>
</html>