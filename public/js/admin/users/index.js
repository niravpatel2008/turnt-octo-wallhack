var oTable;
$(document).ready(function() {
	oTable = $('#usersTable').dataTable( {
		"processing": true,
		"serverSide": true,
		"ajax": {
			"url": admin_path ()+'users/ajax_list/',
			"type": "POST"
		},
		aoColumnDefs: [
		  {
			 bSortable: false,
			 aTargets: [ -1 ]
		  }
		]
	} );

	$('#user_form').on('submit',function(e){
		er_flag = false;
		pass = $.trim($('#password').val());
		re_pass = $.trim($('#re_password').val());
		if (location.pathname.indexOf('edit') == -1)
		{
			if(pass == "")
			{
				alert("Please enter password.");
				er_flag = true;
			}
			else if (re_pass == "")
			{
				alert("Please enter Repeat password.");
				er_flag = true;
			}
		}
		if (pass != "" && (pass != re_pass))
		{
			alert("Password and Repeat password does not match.");
			er_flag = true;
		}
		if(er_flag)
			e.preventDefault();
	});
} );
function delete_user (del_id) {
	$.ajax({
		type: 'post',
		url: admin_path()+'users/delete',
		data: 'id='+del_id,
		success: function (data) {
			if (data == "success") {
				oTable.fnClearTable(0);
				oTable.fnDraw();
				$("#flash_msg").html(success_msg_box ('User deleted successfully.'));
			}else{
				$("#flash_msg").html(error_msg_box ('An error occurred while processing.'));
			}
		}
	});
}