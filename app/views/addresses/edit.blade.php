@extends('layouts.master')


@section('breadcrumbs')
<li class="current">
	<a href="/{{$main_path}}/schooladmin/address/create" title=""><?php echo Lang::get('messages.nav.address.add');?></a>
</li>
@stop

@section('page_header') 
	<h3><?php  echo Lang::get('messages.title.address');?></h3>
@stop
				
@section('content')
<!--=== Page Content ===-->
<div class="row">
	<!--=== Form Wizard ===-->
	<div class="col-md-12">
		<div class="widget box" id="form_wizard">
			<div class="widget-header">
				<h4><i class="icon-reorder"></i><?php echo Lang::get('messages.title.address.add'); ?></h4>
				<div class="toolbar no-padding">
					<div class="btn-group">
						<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
					</div>
				</div>
			</div>
			
			<?PHP
				$schoolList = $data['schoolList'];
				$address = $data['address'];
			?>
							
			<div class="widget-content">
				{{Form::model($address, array('route' => 'address.update', 'class'=>'form-horizontal')) }}
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
										<label class="control-label col-md-3"><?php  echo Lang::get('messages.form.address.street'); ?> <span class="required">*</span></label>
										<div class="col-md-4">
											{{ Form::text('address', $address->address, array('class' => 'form-control required', 'id'=>'street', 'required'=>'required')) }}
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
										<label class="control-label col-md-3"><?php  echo Lang::get('messages.form.address.city'); ?> <span class="required">*</span></label>
										<div class="col-md-4">
											{{ Form::text('city', $address->city, array('class' => 'form-control required', 'id'=>'city', 'required'=>'required')) }}
											{{	$errors->first('city', '
												<div class="alert alert-danger alert-block">
													<button type="button" class="close" data-dismiss="alert">&times;</button>
													<h4>Attenzione!</h4>
													Inserire una citt&agrave valida.
												</div>
												')
											}}
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-md-3"><?php  echo Lang::get('messages.form.address.province'); ?> <span class="required">*</span></label>
														<div class="col-md-4">
															{{ Form::select('province', array('NONE' => 'Seleziona una provincia', 'RM' => 'RM', 'LT' => 'LT'), $address->province, array('class' => 'form-control input-width-large required', 'id'=>'province', 'required'=>'required')); }}
 															<!-- {{ Form::text('province', '', array('class' => 'form-control required', 'id'=>'province', 'required'=>'required')) }} -->
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
										<label class="control-label col-md-3"><?php  echo Lang::get('messages.form.address.zip'); ?> <span class="required">*</span></label>
										<div class="col-md-4">
											{{ Form::text('zip', $address->zip, array('class' => 'form-control input-width-small required', 'id'=>'zip')) }}
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
										<label class="control-label col-md-3">Scuola di riferimento <span class="required">*</span></label>
										<div class="col-md-4">
											
											 
											<select class="form-control" name="id_school" id="id_school">
												@foreach($schoolList as $school)
												
						
												
												<option value="{{ $school->id }}" >{{ $school->name }}</option>
													
													
													
													@if($address->school->id == $school->id ) selected="selected" 
													@endif
											
												@endforeach
											</select>
											
					
											{{	$errors->first('id_school', '
												<div class="alert alert-danger alert-block">
													<button type="button" class="close" data-dismiss="alert">&times;</button>
													<h4>Attenzione!</h4>
													Selezionare una scuola guida valida da assegnare per l\'indirizzo inserito.
												</div>
												')
										}}
										</div>
									</div>
								</div>
								<!-- /Basic Information -->

							{{ Form::hidden('id', $address->id) }}
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

