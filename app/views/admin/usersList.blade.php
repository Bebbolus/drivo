@extends('layouts.master')

@section('specific_plugin')
	<!-- DataTables -->
	<script type="text/javascript" src="plugins/datatables/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="plugins/datatables/DT_bootstrap.js"></script>
	<script type="text/javascript" src="plugins/datatables/responsive/datatables.responsive.js"></script> <!-- optional -->
@stop


@section('breadcrumbs')
<li class="current">
	<a href="/{{$main_path}}/users.list" title="">Lista Utenti</a>
</li>
@stop

@section('page_header') 
	<h3>Gestione utenti</h3>
	<span>Ciao {{Auth::user()->username}}, qui puoi visionare la lista utenti sull'applicativo</span>
@stop

				
@section('content')

	<!--=== Responsive DataTable ===-->
	<div class="row">
		<div class="col-md-12">
			<div class="widget box">
				<div class="widget-header">
					<h4><i class="icon-reorder"></i> Lista Utenti </h4>
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
								<th>NomeUtente</th>
								<th>email</th>
								<th>gruppo</th>
							</tr>
						</thead>
						<tbody>
							@foreach($allUser as $element)
							<tr>
								<td class="align-center">
									<span class="btn-group">
										<a href="javascript:void(0);" class="btn btn-xs bs-tooltip" title="Edit"><i class="icon-pencil"></i></a>
									</span>
								</td>
								<td class="align-center">
									<span class="btn-group">
										<a href="javascript:void(0);" class="btn btn-xs bs-tooltip" title="Delete"><i class="icon-trash"></i></a>
									</span>
								</td>
								<td>{{$element->username}}</td>
								<td>{{$element->email}}</td>
								<td>{{$element->group}}</td>
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