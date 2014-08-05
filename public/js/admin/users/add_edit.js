$(document).ready(function(){
	$("#user_form").validationEngine();
	$("#user_form").on("submit",function  () {
		if ($("#user_name").val() == "") {
			alert("Please enter user name.");
			return false;
		}

		if (!IsEmail($("#email").val())) {
			alert('Please enter valid email.');
			return false;
		}

		if ($("#role").val() == "") {
			alert("Please select role.");
			return false;
		}

		if (location.pathname.indexOf('edit') == -1)
		{
			if ($("#password").val() == "") {
				alert("Please enter password.");
				return false;
			}

			if ($("#re_password").val() == "") {
				alert("Please enter repeat password.");
				return false;
			}
		}

		if ($("#password").val() != "" && ($("#password").val() != $("#re_password").val()))
		{
			alert("Password field does not match.");
			return false;
		}
	});
});