@extends('layouts.master')

@section('specific_plugin')
	<!-- Page specific plugins -->
	<!-- Charts -->
	{{ HTML::script('plugins/sparkline/jquery.sparkline.min.js') }}

	{{ HTML::script('plugins/daterangepicker/moment.min.js') }}
	{{ HTML::script('plugins/daterangepicker/daterangepicker.js') }}
	{{ HTML::script('plugins/blockui/jquery.blockUI.min.js') }}

	<!-- Forms -->
	{{ HTML::script('plugins/typeahead/typeahead.min.js') }} <!-- AutoComplete -->
	{{ HTML::script('plugins/autosize/jquery.autosize.min.js') }}
	{{ HTML::script('plugins/tagsinput/jquery.tagsinput.min.js') }}
	{{ HTML::script('plugins/select2/select2.min.js') }} <!-- Styled select boxes -->
	{{ HTML::script('plugins/bootstrap-multiselect/bootstrap-multiselect.min.js') }} 
	
	<!-- Demo JS -->
	{{ HTML::script('assets/js/demo/form_components.js') }}

@stop

@section('breadcrumbs')
<li class="current">
	<a href="/{{$main_path}}/admin/user/create" title="">Modifica Utente</a>
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
							<?PHP
								$user = $data['user'];
								$schoolList = $data['schoolList'];
							?>
								
								
								
								{{Form::model($user, array('route' => 'user.update', 'class'=>'form-horizontal')) }}
								<div class="form-wizard">
										<div class="form-body">

												<!--===Information ===-->
												<div class="tab-pane active" id="tab1">
													<h3 class="block padding-bottom-10px">Inserisci le informazioni utente</h3>

													<div class="form-group">
														<label class="control-label col-md-3">NomeUtente </label>
														<div class="col-md-4">
															{{ Form::text('username', $user->username, array('class' => 'form-control required', 'id'=>'username', 'required'=>'required')) }}
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
														<label class="control-label col-md-3">Email </label>
														<div class="col-md-4">
															{{ Form::text('email', $user->email, array('class' => 'form-control required email', 'id'=>'email', 'required'=>'required|email')) }}
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
													
													<div class="form-group">
														<label class="control-label col-md-3">GRUPPO </label>
														<div class="col-md-10 input-width-large">
															{{ Form::text('group', $user->group, array('class' => 'form-control ui-spinner-input', 'id'=>'spinner-default', 'required'=>'required|numeric')) }}
															{{	$errors->first('group', '
																						<div class="alert alert-danger alert-block">
																							<button type="button" class="close" data-dismiss="alert">&times;</button>
																							<h4>Attenzione!</h4>
																							Si prega di fornire una gruppo assegnato valido.
																						</div>
																						')
															}}
														</div>
													</div>
													
													<div class="form-group">
														<label class="control-label col-md-3">Scuole Guida Abilitate</label>
														<div class="col-md-10 input-width-large">
														
														
															<select id="userSchools" name="userSchools[]" multiple="multiple" class="multiselect">
															
																@foreach($schoolList as $school)
																	
																 <option value= {{$school->id}} 
																 
																	 @foreach($user->school as $UserSchools)
																		@if($school->name == $UserSchools->name ) {{'selected'}}
																		@endif
																	 @endforeach
																 
																 >{{$school->name}}</option>
																@endforeach
																
															</select>
														</div>
														
													</div>
												
													
												</div>
												<!-- /Information -->


										
												{{ Form::hidden('id', $user->id) }}
										
										
										<!--=== Form Actions ===-->
										<div class="form-actions fluid">
											<div class="row">
												<div class="col-md-12">
													<div class="col-md-offset-3 col-md-2">
														{{ Form::submit('MODIFICA', array('class' => 'btn btn-success button-submit')) }}
														{{ Form::close() }}
														
													</div>
													<div class="col-md-2">
													<button class = "btn btn-primary button-submit" onClick="history.back()">ANNULLA</button>
													</div>
												</div>
											</div>
										</div>
										<!-- /Form Actions -->
									</div>
								
							</div>
						</div>
						<!-- /Form Wizard -->
		</div> <!-- /.col-md-12 -->
		<!-- /Example Box -->
	</div> <!-- /.row -->
@stop

