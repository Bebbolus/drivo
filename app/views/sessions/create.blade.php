<!DOCTYPE html>
<html lang="it">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<title>DRIVO | Login </title>

	<!--=== CSS ===-->

	<!-- Bootstrap -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

	<!-- Theme -->
	<link href="assets/css/main.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/icons.css" rel="stylesheet" type="text/css" />

	<!-- Login -->
	<link href="assets/css/login.css" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="assets/css/fontawesome/font-awesome.min.css">
	<!--[if IE 7]>
		<link rel="stylesheet" href="assets/css/fontawesome/font-awesome-ie7.min.css">
	<![endif]-->

	<!--[if IE 8]>
		<link href="assets/css/ie8.css" rel="stylesheet" type="text/css" />
	<![endif]-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>

	<!--=== JavaScript ===-->

	<script type="text/javascript" src="assets/js/libs/jquery-1.10.2.min.js"></script>

	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/libs/lodash.compat.min.js"></script>

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="assets/js/libs/html5shiv.js"></script>
	<![endif]-->

	<!-- Beautiful Checkboxes -->
	<script type="text/javascript" src="plugins/uniform/jquery.uniform.min.js"></script>

	<!-- Form Validation -->
	<script type="text/javascript" src="plugins/validation/jquery.validate.min.js"></script>

	<!-- Slim Progress Bars -->
	<script type="text/javascript" src="plugins/nprogress/nprogress.js"></script>

	<!-- App -->
	<script type="text/javascript" src="assets/js/login.js"></script>

</head>

<body class="login">
	<!-- Logo -->
	<div class="logo">
		<img src="assets/img/logo.png" alt="DRIVO" />
	</div>
	<!-- /Logo -->

	<!-- Login Box -->
	<div class="box">
		<div class="content">

		@if ($message = Session::get('errore'))
			<div class="alert alert-danger alert-block">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<h4>Errore</h4>
				{{{ $message }}}
			</div>
		@endif	

		{{ Form::open(array('route' => 'sessions.store', 'class'=> 'form-vertical login-form')) }}

				<h3 class="form-title">Entra in DRIVO</h3>
			
			<div class="form-group">
					{{-- Form::label('email','Email:', array('for'=>'email')) --}}
					<div class="input-icon">
					<!--i class="icon-user"></i-->
					<i class="icon-envelope"></i>
					{{ Form::text('email', '', array('class' => 'form-control', 'id'=>'email', 'required'=>'required|email', 'placeholder'=>'Inserisci il tuo indirizzo Email.')) }}
					</div>
					{{
						$errors->first('email', '
												<div class="alert alert-danger alert-block">
													<button type="button" class="close" data-dismiss="alert">&times;</button>
													<h4>Attenzione!</h4>
													Si prega di fornire una email valida.
												</div>
											    ')
					}}
			</div>

			<div class="form-group">
					{{-- Form::label('password','Password:', array('for'=>'password')) --}}
					<div class="input-icon">
					<i class="icon-lock"></i>
					{{ Form::password('password', array('class' => 'form-control', 'id'=>'password', 'required'=>'required', 'placeholder'=>'Inserisci la tua Password.')) }}					
					{{ $errors->first('password','
												<div class="alert alert-warning alert-block">
													<button type="button" class="close" data-dismiss="alert">&times;</button>
													<h4>Spiacenti</h4>
													La password fornita non risulta corretta.
												</div>
												')
					}}
					</div>
			<div class="form-actions">
				
			{{ Form::submit('Entra >>', array('class' => 'submit btn btn-primary pull-right')) }}
			</div>
			</div>
		{{ Form::close() }}
		
		
			<!-- /Login Formular -->
			
			
			
</body>
</html>