$(document).ready(function() {
	$('#dealerTable').dataTable( {
		"processing": true,
		"serverSide": true,
		"ajax": {
			"url": admin_path ()+'dealer/ajax_list/',
			"type": "POST"
		},
		aoColumnDefs: [
		  {
			 bSortable: false,
			 aTargets: [ -1 ]
		  }
		]
	} );

	$('#locationHolder').locationpicker({
		radius: 300,
		inputBinding: {
			locationNameInput: $('#de_address'),
			latitudeInput: $('#de_lat'),
			longitudeInput: $('#de_long'),
		},
		enableAutocomplete: true,
		onchanged: function(currentLocation, radius, isMarkerDropped) {
				console.log(currentLocation);
			//alert("Location changed. New location (" + currentLocation.latitude + ", " + currentLocation.longitude + ")");
		}
	});

	//$('form input')
} );