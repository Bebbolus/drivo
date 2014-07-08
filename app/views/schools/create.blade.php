@extends('layouts.master')


@section('breadcrumbs')
<li class="current">
	<a href="/{{$main_path}}/admin/school/create" title="">Aggiungi Scuola Guida</a>
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
								{{ Form::open(array('route' => 'school.store', 'class'=>'form-horizontal')) }}
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
													<!--h3 class="block padding-bottom-10px">Inserisci Autoscuola:</h3-->

													<div class="form-group">
														<label class="control-label col-md-3">Nome Scuola <span class="required">*</span></label>
														<div class="col-md-4">
															{{ Form::text('name', '', array('class' => 'form-control required', 'id'=>'name', 'required'=>'required')) }}
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
															{{ Form::text('email', '', array('class' => 'form-control', 'id'=>'email')) }}
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
															{{ Form::text('phone', '', array('class' => 'form-control required', 'id'=>'phone', 'required'=>'required')) }}
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
															{{ Form::text('fax', '', array('class' => 'form-control', 'id'=>'fax')) }}
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
													
																				<!--=== Basic Information ===-->
												<div class="tab-pane active" id="tab1">
													<!--h3 class="block padding-bottom-10px">Sede dell'autoscuola:</h3-->

													<div class="form-group">
														<label class="control-label col-md-3">Via <span class="required">*</span></label>
														<div class="col-md-4">
															{{ Form::text('address', '', array('class' => 'form-control required', 'id'=>'address', 'required'=>'required')) }}
															{{
																$errors->first('address', '
																						<div class="alert alert-danger alert-block">
																							<button type="button" class="close" data-dismiss="alert">&times;</button>
																							<h4>Attenzione!</h4>
																							Si prega di fornire un indirizzo valido.
																						</div>
																						')
															}}
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-md-3">Citt&agrave; <span class="required">*</span> </label>
														<div class="col-md-4">
															{{ Form::text('city', '', array('class' => 'form-control', 'id'=>'city')) }}
															{{	$errors->first('city', '
																						<div class="alert alert-danger alert-block">
																							<button type="button" class="close" data-dismiss="alert">&times;</button>
																							<h4>Attenzione!</h4>
																							Si prega di fornire un nome di citt&agrave; valido.
																						</div>
																						')
															}}
														</div>
													</div>


													<div class="form-group">
														<label class="control-label col-md-3">Provincia <span class="required">*</span></label>
														<div class="col-md-4">
															{{ Form::text('province', '', array('class' => 'form-control required', 'id'=>'province', 'required'=>'required')) }}
															{{	$errors->first('province', '
																						<div class="alert alert-danger alert-block">
																							<button type="button" class="close" data-dismiss="alert">&times;</button>
																							<h4>Attenzione!</h4>
																							Si prega di fornire una Provincia valida.
																						</div>
																						')
															}}
														</div>
													</div>
													
													<div class="form-group">
														<label class="control-label col-md-3">CAP <span class="required">*</span></label>
														<div class="col-md-4">
															{{ Form::text('zip', '', array('class' => 'form-control', 'id'=>'zip')) }}
															{{	$errors->first('zip', '
																						<div class="alert alert-danger alert-block">
																							<button type="button" class="close" data-dismiss="alert">&times;</button>
																							<h4>Attenzione!</h4>
																							Si prega di fornire un numero di CAP valido.
																						</div>
																						')
															}}
														</div>
													</div>
												</div>
												<!-- /Basic Information -->
												</div>
												<!-- /Basic Information -->

												
											</div>
											<!-- /Tab Content -->
										</div>
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

