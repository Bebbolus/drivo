@extends('layouts.master')



@section('content')
	<div class="starter-template">
		@if(Auth::guest())
		<h1>Benvenuto</h1>
		@else
		<h1>Bentornato, {{Auth::user()->username}}</h1>
		@endif

		<br>
		<img class="img-responsive" src="img/logo.png">
		<br>
		<p class="lead">
			DRIVO è un progetto per il supporto delle scuola guida che troveranno in questa soluzione un efficace strumento per gestire la loro attività.
		</p>
		<p>
			 
			<br>
			Il sistema di base fornisce uno strumento per la gestione delle guide fornendo in tempo reale gli appuntamenti selezionabili in base alle disponibilità e tempistiche di mezzi, istruttori e scuole stesse.
			
			Versioni future: 
			Sulla base di archivi contenenti le schede degli utenti e dei servizi disponibili, il programma permette di tenere aggiornato il piano delle lezioni di guida, di conoscere i servizi utilizzabili dagli utenti e di gestire i pagamenti delle quote di iscrizione. 
			Sono gestite le iscrizioni alla scuola guida, definendo i servizi da utilizzare, le relative quote. È predisposto il programma delle lezioni per utente, per istruttore e per data.
			In sintesi, permette: 
			Gestione servizi, tariffe e anagrafico istruttori.
			Tenuta e aggiornamento archivio iscrizioni e anagrafico utenti.
			Emissione scheda utente, elenchi servizi per utente.
			Programma lezioni di guida per data, per istruttore e data, per utente e data.
			Controllo incassi per data e tipo servizi. 
			Controllo istruttori.

			precedentemente era possibile registrati a questo link (ora non funzionante): <i><a href="/{{$main_path}}/register">Registrati</a></i>. <br>
			A causa delle recenti evoluzioni, dovrai inviarmi una mail personale all'indirizzo: <i><a href="mailto:lambis.net@gmail.com?Subject=INFO_DRIVO" target="_top">lambis.net@gmail.com</a></i> <br>
			Se sei già un utente, utilizza pure il seguente link per accedere: <a href="/{{$main_path}}/login">Loggati</a>.
		</p>

		<p>
			<i>Puoi utilizzare il menu sovrastante o cliccare sui termini citati nel testo.</i>
		</p>
	</div>

@stop