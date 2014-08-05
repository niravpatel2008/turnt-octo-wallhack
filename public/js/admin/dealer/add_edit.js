$(document).ready(function(){
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

	$("#dealer_form").validationEngine();
	$("#dealer_form").on("submit",function  () {
		if ($("#de_userid").val() == "") {
			alert("Please select user.");
			return false;
		}

		if ($("#de_name").val() == "") {
			alert("Please dealer name.");
			return false;
		}

		if (!IsEmail($("#de_email").val())) {
			alert('Please enter valid email.');
			return false;
		}
	});
});