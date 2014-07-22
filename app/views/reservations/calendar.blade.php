@extends('layouts.master')

@section('specific_plugin')

	<!-- FullCalendar -->
	
	{{ HTML::script('plugins/fullcalendar/moment.min.js') }}
	{{ HTML::script('plugins/fullcalendar/fullcalendar.min.js') }}	
	{{ HTML::script('plugins/fullcalendar/lang/it.js') }}
	
	<!-- Page specific plugins -->
	<!-- Charts -->
	{{ HTML::script('plugins/sparkline/jquery.sparkline.min.js') }}

	{{ HTML::script('plugins/daterangepicker/moment.min.js') }}
	{{ HTML::script('plugins/daterangepicker/daterangepicker.js') }}
	{{ HTML::script('plugins/blockui/jquery.blockUI.min.js') }}

	<!-- Forms -->
	{{ HTML::script('plugins/select2/select2.min.js') }} <!-- Styled select boxes -->

	<!-- Form Validation -->
	{{ HTML::script('plugins/validation/jquery.validate.min.js') }}
	{{ HTML::script('plugins/validation/additional-methods.min.js') }}

	<!-- Form Wizard -->
	{{ HTML::script('plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}
	
	
	{{ HTML::script('assets/js/reservations_calendar.js') }}	
	{{ HTML::script('assets/js/reservation_form_wizard.js') }}
@stop

@section('breadcrumbs')
<li class="current">
	<a href="/{{$main_path}}/schooladmin/reservation/create" title=""><?php echo Lang::get('messages.nav.reservation.add');?></a>
</li>
@stop

@section('page_header') 
	<h3><?php  echo Lang::get('messages.title.reservation');?></h3>
@stop
				
@section('content')
<!--=== Page Content ===-->
<div class="row">
	<!--=== Form Wizard ===-->
	<div class="col-md-12">
		<div class="widget box" id="form_wizard">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i> <?php echo Lang::get('messages.form.wizard.reservation.header');?> - <span class="step-title"><?php echo Lang::get('messages.form.wizard.step-title', array('index' => '1', 'total' => '4'));?></span></h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							
							
							<div class="widget-content">
								<form class="form-horizontal" id="sample_form" action="#">
									<div class="form-wizard">
										<div class="form-body">

											<!--=== Steps ===-->
											<ul class="nav nav-pills nav-justified steps">
												<li>
													<a href="#tab1" data-toggle="tab" class="step">
														<span class="number">1</span>
														<span class="desc"><i class="icon-ok"></i> <?php echo Lang::get('messages.form.wizard.reservation.date');?></span>
													</a>
												</li>
												<li>
													<a href="#tab2" data-toggle="tab" class="step">
														<span class="number">2</span>
														<span class="desc"><i class="icon-ok"></i> <?php echo Lang::get('messages.form.wizard.reservation.instructor');?></span>
													</a>
												</li>
												<li>
													<a href="#tab3" data-toggle="tab" class="step active">
														<span class="number">3</span>
														<span class="desc"><i class="icon-ok"></i> <?php echo Lang::get('messages.form.wizard.reservation.vehicle');?></span>
													</a>
												</li>
												<li>
													<a href="#tab4" data-toggle="tab" class="step">
														<span class="number">4</span>
														<span class="desc"><i class="icon-ok"></i> <?php echo Lang::get('messages.form.wizard.reservation.confirm');?></span>
													</a>
												</li>
											</ul>
											<!-- /Steps -->

											<!--=== Progressbar ===-->
											<div id="bar" class="progress progress-striped" role="progressbar">
												<div class="progress-bar progress-bar-success"></div>
											</div>
											<!-- /Progressbar -->

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
													<h3 class="block padding-bottom-10px"><?php echo Lang::get('messages.form.wizard.reservation.date');?></h3>

													<div class="widget">														
														<div class="widget-content">
															<div id="calendar"></div>
														</div>
													</div> <!-- /.widget box -->
												</div>
												<!-- /Basic Information -->

												<!--=== Your Profile ===-->
												<div class="tab-pane" id="tab2">
													<h3 class="block padding-bottom-10px">We want to know more about you</h3>

													
												</div>
												<!-- /Your Profile -->

												<!--=== Billing Setup ===-->
												<div class="tab-pane" id="tab3">
													<h3 class="block padding-bottom-10px">Provide your billing and credit card details</h3>

													
												</div>
												<!-- /Billing Setup -->

												<!--=== Confirmation ===-->
												<div class="tab-pane" id="tab4">
													<h3 class="block padding-bottom-10px">Confirm your account</h3>
													
												<!-- /Confirmation -->
											</div>
											<!-- /Tab Content -->
										</div>

										<!--=== Form Actions ===-->
										<div class="form-actions fluid">
											<div class="row">
												<div class="col-md-12">
													<div class="col-md-offset-3 col-md-9">
														<a href="javascript:void(0);" class="btn button-previous">
															<i class="icon-angle-left"></i> Back
														</a>
														<a href="javascript:void(0);" class="btn btn-primary button-next" id="button-next">
															Continue <i class="icon-angle-right"></i>
														</a>
														<a href="javascript:void(0);" class="btn btn-success button-submit" id="button-submit">
															Submit <i class="icon-angle-right"></i>
														</a>
													</div>
												</div>
											</div>
										</div>
										<!-- /Form Actions -->
									</div>
								</form>
							</div>
						</div>
						<!-- /Form Wizard -->
<!-- 		<div class="widget"> -->
<!-- 			<div class="widget-header"> -->
<!-- 				<h4><i class="icon-calendar"></i> Calendar</h4> -->
<!-- 			</div> -->
<!-- 			<div class="widget-content"> -->
<!-- 				<div id="calendar"></div> -->
<!-- 			</div> -->
		</div> <!-- /.widget box -->
	</div> <!-- /.col-md-12 -->	
	
	
</div> <!-- /.row -->


@stop

