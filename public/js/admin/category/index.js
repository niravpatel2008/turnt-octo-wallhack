$(document).ready(function() {
	$('#categoryTable').dataTable( {
		"processing": true,
		"serverSide": true,
		"ajax": {
			"url": admin_path ()+'category/ajax_list/',
			"type": "POST"
		},
		aoColumnDefs: [
		  {
			 bSortable: false,
			 aTargets: [ -1 ]
		  }
		]
	} );
} );


function delete_category (del_id) {
	$.ajax({
		type: 'post',
		url: admin_path()+'category/delete',
		data: 'id='+del_id,
		success: function (data) {
			if (data == "success") {
				$("#flash_msg").html(success_msg_box ('Category deleted successfully.'));
			}else{
				$("#flash_msg").html(error_msg_box ('An error occurred while processing.'));
			}
		}
	});
}