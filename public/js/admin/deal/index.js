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


function delete_deal (del_id) {
	$.ajax({
		type: 'post',
		url: admin_path()+'deal/delete',
		data: 'id='+del_id,
		success: function (data) {
			if (data == "success") {
				$("#flash_msg").html(success_msg_box ('Deal deleted successfully.'));
			}else{
				$("#flash_msg").html(error_msg_box ('An error occurred while processing.'));
			}
		}
	});
}