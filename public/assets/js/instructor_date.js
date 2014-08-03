/*
 * custom.js
 *
 * Place your code here that you need on all your pages.
 */

"use strict";

$(document).ready(function(){
	//===== Date Pickers & Time Pickers & Color Pickers =====//
	$( ".datepicker" ).datepicker({
		defaultDate: +7,
		showOtherMonths:true,
		autoSize: true,
		appendText: '<span class="help-block">(dd-mm-yyyy)</span>',
		dateFormat: 'dd-mm-yy'
	});
});