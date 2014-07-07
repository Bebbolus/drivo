@extends('layouts.master')

@section('specific_plugin')
	<!-- DataTables -->
	{{ HTML::script('plugins/datatables/jquery.dataTables.min.js') }}
	{{ HTML::script('plugins/datatables/DT_bootstrap.js') }}
	{{ HTML::script('plugins/datatables/responsive/datatables.responsive.js') }}
@stop


@section('breadcrumbs')
<li class="current">
	<a href="/{{$main_path}}/admin/school/list" title="">Lista Scuole Guida</a>
</li>
@stop

@section('page_header') 
	<h3>Gestione Scuole Guida</h3>
	<span>Ciao {{Auth::user()->username}}, qui puoi visionare la lista delle scuole guida sull'applicativo.</span>
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
								<th>Nome</th>
								<th>email</th>
								<th>telefono</th>
								<th>fax</th>
							</tr>
						</thead>
						<tbody>
							@foreach($allSchool as $element)
							<tr>
								<td class="align-center">
									<span class="btn-group">
										{{ Form::open(array('url' => 'admin/school/edit/'. $element->id, 'method' => 'get','class'=>'form-horizontal')) }}	
										{{ HTML::decode(Form::button('<i class="icon-pencil"></i>', array('class'=>'btn btn-xs bs-tooltip', 'type'=>'submit'))) }}
										{{ Form::close() }}
									</span>
								</td>
								<td class="align-center">
									<span class="btn-group">
										{{ Form::open(array('route' => 'school.delete', 'class'=>'form-horizontal')) }}	
										{{ Form::hidden('id', $element->id) }}
										{{ HTML::decode(Form::button('<i class="icon-trash"></i>', array('class'=>'btn btn-xs bs-tooltip', 'type'=>'submit'))) }}
										{{ Form::close() }}
									</span>
								</td>
								<td>{{$element->name}}</td>
								<td>{{$element->email}}</td>
								<td>{{$element->phone}}</td>
								<td>{{$element->fax}}</td>						
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