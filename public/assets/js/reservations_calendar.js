/*
 * JavaScript used for new reservation page.
 * 
 */

"use strict";

$(document).ready(function(){    

	//===== Calendar =====//
	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();

	var h = {};

	if ($('#calendar').width() <= 400) {
		h = {
				left: 'title',
				center: '',
				right: 'prev,next'
		};
	} else {
		h = {
				left: '',
				center: 'title',
				right: 'prev,next'
		};
	}

	$('#calendar').fullCalendar({
		
//		var startDate;
//		var endDate;
		
		disableDragging: false,
		allDayDefault: false,
		lang: 'it',
		header: h,
		editable: true,
		selectable: true,
		selectHelper: true,
		select: function(start, end) {
//			if(confirm('Creare una prenotazione?')) {
				var title = 'Nuova prenotazione';
				
				var startDate = start;
				var endDate = end;
				
				var eventData;
				if (title) {
					eventData = {
							title: title,
							start: start,
							end: end
					};
					$('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
				}
//			}


			$('#calendar').fullCalendar('unselect');
		},
		defaultView: 'agendaWeek',
		minTime: "07:00:00",
		maxTime: "21:00:00",
		events: [{
			title: 'Chiusura',
			start: '2014-07-07T07:00:00',
			end: '2014-07-07T21:00:00',
			backgroundColor: App.getLayoutColorCode('grey')
		}, {
			title: 'Riposo settimanale',
			start: '2014-07-10T13:00:00',
			end: '2014-07-10T22:00:00',
			backgroundColor: App.getLayoutColorCode('grey')
		},{
			title: 'Nessun istruttore libero',
			start: '2014-07-08T07:00:00',
			end: '2014-07-08T09:00:00',
			backgroundColor: App.getLayoutColorCode('red')
		}, {
			title: 'Nessun veicolo libero',
			start: '2014-07-09T10:00:00',
			end: '2014-07-09T12:00:00',
			backgroundColor: App.getLayoutColorCode('orange')
		}, {
			title: 'Nessun istruttore libero',
			start: '2014-07-09T15:00:00',
			end: '2014-07-09T18:00:00',
			backgroundColor: App.getLayoutColorCode('red')
		}, {
			title: 'Nessun veicolo libero',
			start: '2014-07-12T11:00:00',
			end: '2014-07-12T13:00:00',
			backgroundColor: App.getLayoutColorCode('orange')
		}, 
		]
	});

});