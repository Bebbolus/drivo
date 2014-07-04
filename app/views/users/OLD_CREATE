@extends('layouts.master')

@section('content')
<div class="col-md-4"></div>

<div class="col-md-4">

	<h1>From di Registrazione</h1>

	{{ Form::open(array('route' => 'users.store')) }}
	
	<div class="form-group">
		{{ Form::label('username','Nome Utente per l\'accesso:', array('for'=>'username')) }}
		{{ Form::text('username', '', array('class' => 'form-control', 'id'=>'username', 'required'=>'required')) }}
		{{
			$errors->first('username', '
									<div class="alert alert-danger alert-block">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<h4>Attenzione!</h4>
										Si prega di fornire una username valida.
									</div>
									')
		}}
	</div>
	
	<div class="form-group">
		{{ Form::label('name','Nome:', array('for'=>'name')) }}
		{{ Form::text('name', '', array('class' => 'form-control', 'id'=>'name', 'required'=>'required')) }}
		{{
			$errors->first('name', '
									<div class="alert alert-danger alert-block">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<h4>Attenzione!</h4>
										Si prega di fornire una Nome valida.
									</div>
									')
		}}
	</div>
	
	<div class="form-group">
		{{ Form::label('surname','Cognome:', array('for'=>'surname')) }}
		{{ Form::text('surname', '', array('class' => 'form-control', 'id'=>'surname', 'required'=>'required')) }}
		{{
			$errors->first('surname', '
									<div class="alert alert-danger alert-block">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<h4>Attenzione!</h4>
										Si prega di fornire una Cognome valida.
									</div>
									')
		}}
	</div>
			

	<div class="form-group">
		{{ Form::label('email','Email:', array('for'=>'email')) }}
		{{ Form::text('email', '', array('class' => 'form-control', 'id'=>'email', 'required'=>'required|email')) }}
		{{	$errors->first('email', '
									<div class="alert alert-danger alert-block">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<h4>Attenzione!</h4>
										Si prega di fornire una email valida.
									</div>
									')
		}}
	</div>

	<div class="form-group">
		{{ Form::label('password','Password:', array('for'=>'password')) }}
		{{ Form::password('password', array('class' => 'form-control', 'id'=>'password', 'required'=>'required')) }}
		{{ $errors->first('password','
									<div class="alert alert-warning alert-block">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<h4>Spiacenti</h4>
										La password fornita non risulta corretta. <br>
										Ricordati di inserire la medesima password nello spazio per la conferma <br>
										Inoltre la password deve avere un minimo di 8 caratteri
									</div>
									')
		}}
	</div>



	<div class="form-group">
		{{ Form::label('password_confirmation','Password (conferma):', array('for'=>'password')) }}
		{{ Form::password('password_confirmation', array('class' => 'form-control', 'id'=>'password', 'required'=>'required')) }}
	</div>

	{{ Form::submit('ENTRA!', array('class' => 'btn btn-primary')) }}


	{{ Form::close() }}
</div>

<div class="col-md-4"></div>
@stop