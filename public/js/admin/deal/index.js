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

	/*$( "#dd_expiredate" ).datepicker({
      showOn: "button",
      //buttonImage: "images/calendar.gif",
      buttonImageOnly: true
    });*/


} );