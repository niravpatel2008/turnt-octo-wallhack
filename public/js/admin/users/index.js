$(document).ready(function() {
	$('#usersTable').dataTable( {
		"processing": true,
		"serverSide": true,
		"ajax": {
			"url": admin_path ()+'users/ajax_list/',
			"type": "POST"
		},
		/*"columns": [
			{ "data": "dc_catname" },
			{ "data": "dc_catdetails" },
			{ "data": "dc_createdate" }
		]*/
	} );
} );

/*function load_result(url) {
	$.ajax({
		type: 'post',
		url: url,
		data: '',
		success: function (data) {
			$("#list").html(data);
		}
	});
}

$(document).ready(function() {
	//calling the function 
	load_result(admin_path ()+'users/ajax_list/');
});*/