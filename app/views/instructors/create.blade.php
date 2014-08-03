@extends('layouts.master')


@section('specific_plugin')
	
	{{ HTML::script('assets/js/instructor_date.js') }}
	
@stop



@section('breadcrumbs')
<li class="current">
	<a href="/{{$main_path}}/schooladmin/instructor/create" title="">Crea Istruttore</a>
</li>
@stop

@section('page_header') 
	<h3>Crea Istruttore</h3>
@stop
				
@section('content')
<!--=== Page Content ===-->
<div class="row">
	<!--=== Form Wizard ===-->
	<div class="col-md-12">
		<div class="widget box" id="form_wizard">
			<div class="widget-header">
				<h4><i class="icon-reorder"></i>Aggiungi Istruttore</h4>
				<div class="toolbar no-padding">
					<div class="btn-group">
						<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
					</div>
				</div>
			</div>
			<div class="widget-content">
				{{ Form::open(array('route' => 'address.store', 'class'=>'form-horizontal')) }}
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
									<h3 class="block padding-bottom-10px"><?php  echo Lang::get('messages.form.header.add'); ?></h3>
									
									<div class="form-group">
										<label class="control-label col-md-3">Nome<span class="required">*</span></label>
										<div class="col-md-4">
											{{ Form::text('name', '', array('class' => 'form-control required', 'id'=>'name', 'required'=>'required')) }}
											{{
												$errors->first('name', '
													<div class="alert alert-danger alert-block">
														<button type="button" class="close" data-dismiss="alert">&times;</button>
														<h4>Attenzione!</h4>
														Inserire un nome valido.
													</div>
													')
											}}
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-md-3">Cognome<span class="required">*</span></label>
										<div class="col-md-4">
											{{ Form::text('surname', '', array('class' => 'form-control required', 'id'=>'surname', 'required'=>'required')) }}
											{{
												$errors->first('name', '
													<div class="alert alert-danger alert-block">
														<button type="button" class="close" data-dismiss="alert">&times;</button>
														<h4>Attenzione!</h4>
														Inserire un cognome valido.
													</div>
													')
											}}
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-md-3">Codice Fiscale<span class="required">*</span></label>
										<div class="col-md-4">
											{{ Form::text('fiscal_code', '', array('class' => 'form-control required', 'id'=>'fiscal_code', 'required'=>'required')) }}
											{{
												$errors->first('name', '
													<div class="alert alert-danger alert-block">
														<button type="button" class="close" data-dismiss="alert">&times;</button>
														<h4>Attenzione!</h4>
														Inserire un cognome valido.
													</div>
													')
											}}
										</div>
									</div>
							
									
									<div class="form-group">
										<label class="control-label col-md-3">Data di Nascita<span class="required">*</span></label>

										<div class="col-md-4">
											{{ Form::text('date_of_birth', '', array('class' => 'form-control required datepicker', 'id'=>'date_of_birth', 'required'=>'required')) }}	
											{{
												$errors->first('date_of_birth', '
													<div class="alert alert-danger alert-block">
														<button type="button" class="close" data-dismiss="alert">&times;</button>
														<h4>Attenzione!</h4>
														Inserire una data di nascita valida.
													</div>
													')
											}}
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-md-3">Via/Piazza <span class="required">*</span></label>
										<div class="col-md-4">
											{{ Form::text('address', '', array('class' => 'form-control required', 'id'=>'street', 'required'=>'required')) }}
											{{
												$errors->first('address', '
													<div class="alert alert-danger alert-block">
														<button type="button" class="close" data-dismiss="alert">&times;</button>
														<h4>Attenzione!</h4>
														Inserire un indirizzo valido.
													</div>
													')
											}}
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-3">Citt&agrave; <span class="required">*</span></label>
										<div class="col-md-4">
											{{ Form::text('city', '', array('class' => 'form-control required', 'id'=>'city', 'required'=>'required')) }}
											{{	$errors->first('city', '
												<div class="alert alert-danger alert-block">
													<button type="button" class="close" data-dismiss="alert">&times;</button>
													<h4>Attenzione!</h4>
													Inserire una citt&agrave; valida.
												</div>
												')
											}}
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-md-3">Provincia <span class="required">*</span></label>
														<div class="col-md-4">
															{{ Form::select('province', array('NONE' => 'Seleziona una provincia', 'RM' => 'RM', 'LT' => 'LT'), 'NONE', array('class' => 'form-control input-width-large required', 'id'=>'province', 'required'=>'required')); }}
											{{	$errors->first('province', '
												<div class="alert alert-danger alert-block">
													<button type="button" class="close" data-dismiss="alert">&times;</button>
													<h4>Attenzione!</h4>
													Selezionare una provincia valida.
												</div>
												')
											}}
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-md-3">Stato <span class="required">*</span></label>
										<div class="col-md-4">
											{{ Form::text('state', '', array('class' => 'form-control input-width-small required', 'id'=>'state')) }}
											{{	$errors->first('state', '
												<div class="alert alert-danger alert-block">
													<button type="button" class="close" data-dismiss="alert">&times;</button>
													<h4>Attenzione!</h4>
													Inserire uno Stato valido.
												</div>
												')
										}}
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-md-3">CAP <span class="required">*</span></label>
										<div class="col-md-4">
											{{ Form::text('zip', '', array('class' => 'form-control input-width-small required', 'id'=>'zip')) }}
											{{	$errors->first('zip', '
												<div class="alert alert-danger alert-block">
													<button type="button" class="close" data-dismiss="alert">&times;</button>
													<h4>Attenzione!</h4>
													Inserire un CAP valido.
												</div>
												')
										}}
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-md-3">Telefono<span class="required">*</span></label>
										<div class="col-md-4">
											{{ Form::text('phone', '', array('class' => 'form-control required', 'id'=>'phone', 'required'=>'required')) }}
											{{
												$errors->first('phone', '
													<div class="alert alert-danger alert-block">
														<button type="button" class="close" data-dismiss="alert">&times;</button>
														<h4>Attenzione!</h4>
														Inserire un numero telefonico valido.
													</div>
													')
											}}
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-md-3">Cellulare<span class="required">*</span></label>
										<div class="col-md-4">
											{{ Form::text('mobile_phone', '', array('class' => 'form-control required', 'id'=>'mobile_phone', 'required'=>'required')) }}
											{{
												$errors->first('mobile_phone', '
													<div class="alert alert-danger alert-block">
														<button type="button" class="close" data-dismiss="alert">&times;</button>
														<h4>Attenzione!</h4>
														Inserire un numero di Cellulare valido.
													</div>
													')
											}}
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
									
									
									<div class="form-group">
										<label class="control-label col-md-3">Scuola di riferimento <span class="required">*</span></label>
										<div class="col-md-4">
											
											 
											<select class="form-control" name="id_school" id="id_school">
												@foreach($schoolList as $school)
												
						
												
												<option value="{{ $school->id }}" >{{ $school->name }}</option>

											
												@endforeach
											</select>
											
					
											{{	$errors->first('id_school', '
												<div class="alert alert-danger alert-block">
													<button type="button" class="close" data-dismiss="alert">&times;</button>
													<h4>Attenzione!</h4>
													Selezionare una scuola guida valida da assegnare per l\'istruttore inserito.
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

