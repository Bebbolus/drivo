@extends('layouts.master')

@section('page_header') 
	<h3>Pagina Iniziale</h3>
	<span>Ciao {{Auth::user()->username}}, cosa vorresti fare?</span>
@stop
