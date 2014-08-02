@extends('layouts.master')

@section('specific_plugin')
	{{ HTML::script('plugins/select2/select2.min.js') }} <!-- Styled select boxes -->
	{{ HTML::script('plugins/bootstrap-multiselect/bootstrap-multiselect.min.js') }} 

@stop

@section('breadcrumbs')
<li class="current">
	<a href="/{{$main_path}}/admin/school/create" title="">Midifica Scuola Guida</a>
</li>
@stop

				
@section('content')
<!--=== Page Content ===-->
				<div class="row">
					<!--=== Form Wizard ===-->
					<div class="col-md-12">
						<div class="widget box" id="form_wizard">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i> Aggiungi Autoscuola</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div class="widget-content">
							<?PHP
								$school = $data['school'];
								$consortiumList = $data['consortiumList'];
							?>
							
							
							
							
								{{Form::model($school, array('route' => 'school.update', 'class'=>'form-horizontal')) }}
									<div class="form-wizard">
										<div class="form-body">
										

												<!--=== Information ===-->
												<div class="tab-pane active" id="tab1">
													<!--h3 class="block padding-bottom-10px">Inserisci Autoscuola:</h3-->

													<div class="form-group">
														<label class="control-label col-md-3">Nome Scuola <span class="required">*</span></label>
														<div class="col-md-4">
															{{ Form::text('name', $school->name, array('class' => 'form-control required', 'id'=>'name', 'required'=>'required')) }}
															{{
																$errors->first('name', '
																						<div class="alert alert-danger alert-block">
																							<button type="button" class="close" data-dismiss="alert">&times;</button>
																							<h4>Attenzione!</h4>
																							Si prega di fornire un Nome valido.
																						</div>
																						')
															}}
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-md-3">Email </label>
														<div class="col-md-4">
															{{ Form::text('email', $school->email, array('class' => 'form-control', 'id'=>'email')) }}
															{{	$errors->first('email', '
																						<div class="alert alert-danger alert-block">
																							<button type="button" class="close" data-dismiss="alert">&times;</button>
																							<h4>Attenzione!</h4>
																							Si prega di fornire un indirizzo Email valido.
																						</div>
																						')
															}}
														</div>
													</div>


													<div class="form-group">
														<label class="control-label col-md-3">Telefono <span class="required">*</span></label>
														<div class="col-md-4">
															{{ Form::text('phone', $school->phone, array('class' => 'form-control required', 'id'=>'phone', 'required'=>'required')) }}
															{{	$errors->first('phone', '
																						<div class="alert alert-danger alert-block">
																							<button type="button" class="close" data-dismiss="alert">&times;</button>
																							<h4>Attenzione!</h4>
																							Si prega di fornire un numero telefonico valido.
																						</div>
																						')
															}}
														</div>
													</div>
													
													<div class="form-group">
														<label class="control-label col-md-3">Fax </label>
														<div class="col-md-4">
															{{ Form::text('fax', $school->fax, array('class' => 'form-control', 'id'=>'fax')) }}
															{{	$errors->first('fax', '
																						<div class="alert alert-danger alert-block">
																							<button type="button" class="close" data-dismiss="alert">&times;</button>
																							<h4>Attenzione!</h4>
																							Si prega di fornire un numero di fax valido.
																						</div>
																						')
															}}
														</div>
													</div>
													
													<div class="form-group">
														<label class="control-label col-md-3">&Egrave; un conosrzio </label>
														<div class="col-md-4">
															
															
												
															{{ Form::checkbox('is_consortium', 1, $school->is_consortium) }}
															{{	$errors->first('is_consortium', '
																						<div class="alert alert-danger alert-block">
																							<button type="button" class="close" data-dismiss="alert">&times;</button>
																							<h4>Attenzione!</h4>
																							Si prega di specificare se &egrave; un conosrzio.
																						</div>
																						')
															}}
														</div>
													</div>
													
													<div class="form-group">
														<label class="control-label col-md-3">Scuole Guida Abilitate</label>
														<div class="col-md-10 input-width-large">
														
														
															<select id="schoolConsrtium" name="schoolConsrtium[]" multiple="multiple" class="multiselect">
															
																@foreach($consortiumList as $consortium)
																	
																 <option value= {{$consortium->id}} 
																 
																	 @foreach($school->consortium as $userConsoriumList)
																		@if($consortium->name == $userConsoriumList->name ) {{'selected'}}
																		@endif
																	 @endforeach
																 
																 >{{$consortium->name}}</option>
																@endforeach
																
															</select>
														</div>
														
													</div>
													
													
												</div>
												
											</div>
											<!-- /Information -->
											
											{{ Form::hidden('id', $school->id) }}
										</div>
									</div>
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
								{{ Form::close() }}
							</div>
						</div>
						<!-- /Form Wizard -->
		</div> <!-- /.col-md-12 -->
		<!-- /Example Box -->
	</div> <!-- /.row -->
	
@stop

