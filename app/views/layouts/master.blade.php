<!DOCTYPE html>
<html lang="it">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="favicon.ico">

	<title>DRIVO</title>

	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="css/template.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/{{$main_path}}">DRIVO</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li><a href="/{{$main_path}}">Home</a></li>
				@if(Auth::guest())
				<li><a href="/{{$main_path}}/register">Registrati</a></li>
				<li class="active"><a href="/{{$main_path}}/login">Entra</a></li>
				@else
				<li class="active"><a href="/{{$main_path}}/logout">Esci</a></li>
				@endif
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</div>

<div id="wrap">
	<div class="container">

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

	</div><!-- /.container -->

	<div id="push"></div>
</div>

<div id="footer">
	<div class="container">
			Per domande, dubbi e curiosità, contattatemi alla mail <a href="mailto:lambis.net@gmail.com?Subject=INFO_DRIVO" target="_top">
				lambis.net@gmail.com</a>.</p>
	</div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
