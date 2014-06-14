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

	var tmp_address = $('#de_address').val();
	if ($('#de_city').val().trim() != "")
		tmp_address += ", "+$('#de_city').val()
	if ($('#de_state').val().trim() != "")
		tmp_address += ", "+$('#de_state').val()
	if ($('#de_zip').val().trim() != "")
		tmp_address += ", "+$('#de_zip').val()

	$('#de_address_tmp').val(tmp_address);
	
	$('#locationHolder').locationpicker({
		radius: 300,
		inputBinding: {
			locationNameInput: $('#de_address_tmp'),
		},
		enableAutocomplete: true,
		onchanged: function(currentLocation, radius, isMarkerDropped) {
				$('#de_lat').val(currentLocation.latitude),
				$('#de_long').val(currentLocation.longitude)
			//alert("Location changed. New location (" +  + ", " +  + ")");
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