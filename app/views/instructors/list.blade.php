@extends('layouts.master')

@section('specific_plugin')
	<!-- DataTables -->
	{{ HTML::script('plugins/datatables/jquery.dataTables.min.js') }}
	{{ HTML::script('plugins/datatables/DT_bootstrap.js') }}
	{{ HTML::script('plugins/datatables/responsive/datatables.responsive.js') }}
@stop


@section('breadcrumbs')
<li class="current">
	<a href="/{{$main_path}}/schooladmin/instructor/list" title="">Lista Istruttori</a>
</li>
@stop

@section('page_header') 
	<h3>Gestione Istruttori Guida</h3>
	<span>Ciao {{Auth::user()->username}}, qui puoi visionare la lista degli istruttori guida sull'applicativo.</span>
@stop

				
@section('content')

	<!--=== Responsive DataTable ===-->
	<div class="row">
		<div class="col-md-12">
			<div class="widget box">
				<div class="widget-header">
					<h4><i class="icon-reorder"></i> Lista Scuole Guida </h4>
					<div class="toolbar no-padding">
						<div class="btn-group">
							<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
						</div>
					</div>
				</div>
				<div class="widget-content no-padding">
					<table class="table table-striped table-bordered table-hover table-checkable table-responsive datatable">
						<thead>
							<tr>
								<th class="checkbox-column">
									
								</th>
								<th class="checkbox-column">
									
								</th>								
								<th data-class="expand">Nome</th>
								<th>scuola</th>
								<th data-hide="phone">cellulare</th>
								<th data-hide="phone, tablet">telefono</th>
								<th data-hide="phone, tablet">email</th>				
								<th data-hide="phone, tablet">Indirizzo</td>
								<th data-hide="phone, tablet">Citt&agrave;</td>
								<th data-hide="phone, tablet">Provincia</td>
								<th data-hide="phone, tablet">Stato</td>
								<th data-hide="phone, tablet">CAP</td>
								<th data-hide="phone, tablet">Codice Fiscale</td>
								<th data-hide="phone, tablet">data di nascita</td>
								
							</tr>
						</thead>
						<tbody>
							@foreach($allInstructors as $element)
							<tr>
								<td>
										{{ Form::open(array('url' => 'schooladmin/instructor/edit/'. $element->id, 'method' => 'get','class'=>'form-horizontal')) }}	
										{{ HTML::decode(Form::button('<i class="icon-pencil"></i>', array('class'=>'btn btn-xs bs-tooltip', 'type'=>'submit'))) }}
										{{ Form::close() }}
								</td>
								<td>
										{{ Form::open(array('route' => 'instructor.delete', 'class'=>'form-horizontal')) }}	
										{{ Form::hidden('id', $element->id) }}
										{{ HTML::decode(Form::button('<i class="icon-trash"></i>', array('class'=>'btn btn-xs bs-tooltip', 'type'=>'submit'))) }}
										{{ Form::close() }}
								</td>
								
								<td>{{$element->name}} {{$element->surname}}</td>
								
								<td>{{$element->school->name}}</td>
								<td>{{$element->mobile_phone}}</td>
								<td>{{$element->phone}}</td>
								<td>{{$element->email}}</td>
								
								
								
								
								<td>{{$element->address}}</td>
								<td>{{$element->city}}</td>
								<td>{{$element->province}}</td>
								<td>{{$element->state}}</td>
								<td>{{$element->zip}}</td>
								<td>{{$element->fiscal_code}}</td>
								<td>{{$element->date_of_birth}}</td>
								
								
								
								
								
															
							</tr>
							@endforeach			
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- /Responsive DataTable -->

@stop