@extends('layouts.master')

@section('specific_plugin')

	<!-- FullCalendar -->
	
	{{ HTML::style('assets/css/plugins/fullcalendar.css') }}
	{{ HTML::script('plugins/fullcalendar/moment.min.js') }}
	{{ HTML::script('plugins/fullcalendar/fullcalendar.min.js') }}	
	{{ HTML::script('plugins/fullcalendar/lang/it.js') }}
	{{ HTML::script('assets/js/fullcalendar/reservations_licence.js') }}

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
		<div class="widget">
			<div class="widget-header">
				<h4><i class="icon-calendar"></i> Calendar</h4>
			</div>
			<div class="widget-content">
				<div id="calendar"></div>
			</div>
		</div> <!-- /.widget box -->
	</div> <!-- /.col-md-12 -->		
</div> <!-- /.row -->
@stop

