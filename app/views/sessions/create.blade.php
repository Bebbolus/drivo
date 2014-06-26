@extends('layouts.master')

@section('content')
	<div class="col-md-4"></div>

	<div class="col-md-4">

		<h1>From di Accesso</h1>

		{{ Form::open(array('route' => 'sessions.store')) }}

				
			
			<div class="form-group">
					{{ Form::label('email','Email:', array('for'=>'email')) }}
					{{ Form::text('email', '', array('class' => 'form-control', 'id'=>'email', 'required'=>'required|email')) }}
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
					{{ Form::label('password','Password:', array('for'=>'password')) }}
					{{ Form::password('password', array('class' => 'form-control', 'id'=>'password', 'required'=>'required')) }}
					{{ $errors->first('password','
												<div class="alert alert-warning alert-block">
													<button type="button" class="close" data-dismiss="alert">&times;</button>
													<h4>Spiacenti</h4>
													La password fornita non risulta corretta.
												</div>
												')
					}}
			</div>

			{{ Form::submit('ENTRA!', array('class' => 'btn btn-primary')) }}


		{{ Form::close() }}
	</div>

	<div class="col-md-4"></div>
@stop