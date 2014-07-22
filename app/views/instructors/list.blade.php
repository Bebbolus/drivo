@extends('layouts.master')

@section('specific_plugin')
	<!-- DataTables -->
	{{ HTML::script('plugins/datatables/jquery.dataTables.min.js') }}
	{{ HTML::script('plugins/datatables/DT_bootstrap.js') }}
	{{ HTML::script('plugins/datatables/responsive/datatables.responsive.js') }}
@stop


@section('breadcrumbs')
<li class="current">
	<a href="/{{$main_path}}/schooladmin/instructor/list" title=""><?php  echo Lang::get('messages.nav.instructor.list');?></a>
</li>
@stop

@section('page_header') 
	<h3><?php  echo Lang::get('messages.title.instructor');?></h3>
@stop

				
@section('content')

<!--=== Responsive DataTable ===-->
<div class="row">
	<div class="col-md-12">
		<div class="widget box">
			<div class="widget-header">
				<h4><i class="icon-reorder"></i> <?php  echo Lang::get('messages.title.instructor.list');?></h4>
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
															
							<th><?php echo Lang::get('messages.table.instructor.name');?></th>
							<th><?php echo Lang::get('messages.table.instructor.lastname');?></th>
							<th><?php echo Lang::get('messages.table.instructor.fiscal_code');?></th>
							<th><?php echo Lang::get('messages.table.instructor.email');?></th>
							<th class="checkbox-column">
								
							</th>
							<th class="checkbox-column">
								
							</th>
							<th class="checkbox-column">
								
							</th>
						</tr>
					</thead>
					<tbody>
						@foreach($allInstructors as $element)
						<tr>
							
							<td>{{$element->name}}</td>
							<td>{{$element->surname}}</td>
							<td>{{$element->fiscal_code}}</td>
							<td>{{$element->email}}</td>
							
							<td class="align-center">
								<span class="btn-group">
									{{ Form::open(array('route' => 'instructor.calendar', 'class'=>'form-horizontal')) }}	
									{{ Form::hidden('id', $element->id) }}
									{{ HTML::decode(Form::button('<i class="icon-calendar"></i>', array('class'=>'btn btn-xs bs-tooltip', 'type'=>'submit'))) }}
									{{ Form::close() }}
								</span>
							</td>	
							<td class="align-center">
								<span class="btn-group">
									{{ Form::open(array('url' => 'schooladmin/instructor/edit/'. $element->id, 'method' => 'get','class'=>'form-horizontal')) }}	
									{{ HTML::decode(Form::button('<i class="icon-pencil"></i>', array('class'=>'btn btn-xs bs-tooltip', 'type'=>'submit'))) }}
									{{ Form::close() }}
								</span>
							</td>
							<td class="align-center">
								<span class="btn-group">
									{{ Form::open(array('route' => 'instructor.delete', 'class'=>'form-horizontal')) }}	
									{{ Form::hidden('id', $element->id) }}
									{{ HTML::decode(Form::button('<i class="icon-trash"></i>', array('class'=>'btn btn-xs bs-tooltip', 'type'=>'submit'))) }}
									{{ Form::close() }}
								</span>
							</td>
											
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