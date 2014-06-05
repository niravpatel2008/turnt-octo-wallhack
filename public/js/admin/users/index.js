$(document).ready(function() {

	function load_result(url) {
		$.ajax({
			type: 'post',
			url: url,
			data: '',
			success: function (data) {
				$("#list").html(data);
			}
		});
	}

	//calling the function 
	load_result(admin_path ()+'users/ajax_list/');

	

});


 