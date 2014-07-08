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
	
	<!-- Demo JS -->
	{{ HTML::script('assets/js/demo/form_components.js') }}

@stop

@section('breadcrumbs')
<li class="current">
	<a href="/{{$main_path}}/admin/user/create" title="">Aggiungi Utente</a>
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
								{{ Form::model($user, array('route' => 'user.update', 'class'=>'form-horizontal')) }}
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
												
													
												</div>
												<!-- /Basic Information -->

												
											</div>
											<!-- /Tab Content -->
										</div>

										
										{{ Form::hidden('id', $user->id) }}
										
										
										<!--=== Form Actions ===-->
										<div class="form-actions fluid">
											<div class="row">
												<div class="col-md-12">
													<div class="col-md-offset-3 col-md-9">
														{{ Form::submit('MODIFICA', array('class' => 'btn btn-success button-submit')) }}
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
