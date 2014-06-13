var oTable;
$(document).ready(function() {
	oTable = $('#dealerTable').dataTable( {
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


function delete_dealer (del_id) {
	$.ajax({
		type: 'post',
		url: admin_path()+'dealer/delete',
		data: 'id='+del_id,
		success: function (data) {
			if (data == "success") {
				oTable.fnClearTable(0);
				oTable.fnDraw();
				$("#flash_msg").html(success_msg_box ('Dealer deleted successfully.'));
			}else{
				$("#flash_msg").html(error_msg_box ('An error occurred while processing.'));
			}
		}
	});
}