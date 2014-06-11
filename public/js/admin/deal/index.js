$(document).ready(function() {
	$('#dealTable').dataTable( {
		"processing": true,
		"serverSide": true,
		"ajax": {
			"url": admin_path ()+'deal/ajax_list/',
			"type": "POST"
		},
		aoColumnDefs: [
		  {
			 bSortable: false,
			 aTargets: [ -1 ]
		  }
		]
	} );
	
	$('#dd_timeperiod').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});

	$( ".dd_tags").tagedit({
		//autocompleteURL: 'server/autocomplete.php',
	});
} );