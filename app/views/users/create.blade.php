@extends('layouts.master')


@section('breadcrumbs')
<li class="current">
	<a href="/{{$main_path}}/users.create" title="">Aggiungi Utente</a>
</li>
@stop

				
@section('content')
<!--=== Page Content ===-->
				<div class="row">
					<!--=== Form Wizard ===-->
					<div class="col-md-12">
						<div class="widget box" id="form_wizard">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i> Aggiungi Utente</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div class="widget-content">
								{{ Form::open(array('route' => 'users.store', 'class'=>'form-horizontal')) }}
									<div class="form-wizard">
										<div class="form-body">

											<!--=== Tab Content ===-->
											<div class="tab-content">

												<!--=== Available On All Tabs ===-->
												<div class="alert alert-danger hide-default">
													<button class="close" data-dismiss="alert"></button>
													You missed some fields. They have been highlighted.
												</div>
												<div class="alert alert-success hide-default">
													<button class="close" data-dismiss="alert"></button>
													Good job! :-)
												</div>
												<!-- /Available On All Tabs -->

												<!--=== Basic Information ===-->
												<div class="tab-pane active" id="tab1">
													<h3 class="block padding-bottom-10px">Inserisci le informazioni utente</h3>

													<div class="form-group">
														<label class="control-label col-md-3">NomeUtente <span class="required">*</span></label>
														<div class="col-md-4">
															{{ Form::text('username', '', array('class' => 'form-control required', 'id'=>'username', 'required'=>'required')) }}
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
													</div>

													<div class="form-group">
														<label class="control-label col-md-3">Password <span class="required">*</span></label>
														<div class="col-md-4">
															{{ Form::password('password', array('class' => 'form-control required', 'id'=>'password', 'required'=>'required')) }}
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
													</div>

													<div class="form-group">
														<label class="control-label col-md-3">Conferma Password <span class="required">*</span></label>
														<div class="col-md-4">
															{{ Form::password('password_confirmation', array('class' => 'form-control required', 'id'=>'password', 'required'=>'required')) }}
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-md-3">Email <span class="required">*</span></label>
														<div class="col-md-4">
															{{ Form::text('email', '', array('class' => 'form-control required email', 'id'=>'email', 'required'=>'required|email')) }}
															{{	$errors->first('email', '
																						<div class="alert alert-danger alert-block">
																							<button type="button" class="close" data-dismiss="alert">&times;</button>
																							<h4>Attenzione!</h4>
																							Si prega di fornire una email valida.
																						</div>
																						')
															}}
														</div>
													</div>
												</div>
												<!-- /Basic Information -->

												
											</div>
											<!-- /Tab Content -->
										</div>

										<!--=== Form Actions ===-->
										<div class="form-actions fluid">
											<div class="row">
												<div class="col-md-12">
													<div class="col-md-offset-3 col-md-9">
														{{ Form::submit('CREA', array('class' => 'btn btn-success button-submit')) }}
													</div>
												</div>
											</div>
										</div>
										<!-- /Form Actions -->
									</div>
								{{ Form::close() }}
							</div>
						</div>
						<!-- /Form Wizard -->
		</div> <!-- /.col-md-12 -->
		<!-- /Example Box -->
	</div> <!-- /.row -->
@stop

