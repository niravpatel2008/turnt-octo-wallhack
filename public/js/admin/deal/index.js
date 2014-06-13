var oTable;
$(document).ready(function() {
	oTable = $('#dealTable').dataTable( {
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

	setTimeout(function(){
		var myDropzone = Dropzone.forElement("#my-awesome-dropzone");
		myDropzone.on("success", function(file, res) { 
			if (res.indexOf("Error:") === -1)
			{
				var file = JSON.parse(res);
				var html = "<img src='"+file.path+"' class='newimg' imgid = '"+file.id+"'>";
				$("#img-container").append(html);
			}
		});
	},1000)


	$('#img-container img').on('click',function(){
		$('#img-container img').removeClass('selected');
		$(this).addClass('selected');
	})
} );


function delete_deal (del_id) {
	$.ajax({
		type: 'post',
		url: admin_path()+'deal/delete',
		data: 'id='+del_id,
		success: function (data) {
			if (data == "success") {
				oTable.fnClearTable(0);
				oTable.fnDraw();
				$("#flash_msg").html(success_msg_box ('Deal deleted successfully.'));
			}else{
				$("#flash_msg").html(error_msg_box ('An error occurred while processing.'));
			}
		}
	});
}