
function IsEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

function openLoginForm()
{
	$("#divCreateAccountForm").modal('hide');
	$("#divForgotPasswordForm").modal('hide');
    $('#divConsLogin').modal();
}

function openSignupForm()
{
	$('#divConsLogin').modal('hide');
	$("#divForgotPasswordForm").modal('hide');
    $("#divCreateAccountForm").modal();
}

function openForgotPasswordForm () {
	$('#divConsLogin').modal('hide');
	$("#divCreateAccountForm").modal('hide');
    $("#divForgotPasswordForm").modal();
}


$(document).ready(function(){
	$('body').delegate('.favme','click',function(){
		var url = base_url()+'deals/like/';
		var param = {id:$(this).attr("did")};
		$.post(url,param,function(e){
			if (e == 1)
				$(this).addClass("unfavme").removeClass("favme");
		})
	});

	$('body').delegate('.unfavme','click',function(){
		var url = base_url()+'deals/dislike/';
		var param = {id:$(this).attr("did")};
		$.post(url,param,function(e){
			if (e == 1)
				$(this).addClass("favme").removeClass("unfavme");
		})
	});

	$("#signin").live('click', function () {
		if ($.trim($("#txtpassword").val()) == "") {
			alert('Please enter username.');
			return false;
		}

		if ($.trim($("#txtpassword").val()) == "") {
		  alert('Please enter password');
		  return false;
		}

		$.ajax({
			url: base_url()+'welcome/login',
			type: 'post',
			data: $("#loginform").serialize(),
			success: function  (data) {
				if(data == 'success'){
					//location.href = base_url()+'deals';
					location.reload();
				}else{
					alert(data);
					return false;
				}
			}
		});

	});

	$("#signup").live('click', function () {

		if ($.trim($("#username").val()) == "") {
			alert('Please enter username.');
			return false;
		}

		if ($.trim($("#password").val()) == "") {
		  alert('Please enter password');
		  return false;
		}

		if ($.trim($("#password2").val()) == "") {
			alert('Please enter confirm password.');
			return false;
		}

		if ($.trim($("#password").val()) != $.trim($("#password2").val())) {
			alert('Password and confirm password should be same.');
			return false;
		}

		if (!IsEmail($.trim($("#email").val())) || $.trim($("#email").val()) == "") {
		  alert('Please enter valid email.');
		  return false;
		}

		if ($.trim($("#contact").val()) == "") {
		  alert('Please enter contact.');
		  return false;
		}

		$.ajax({
			url: base_url()+'welcome/signup',
			type: 'post',
			data: $("#signupform").serialize(),
			success: function  (data) {
				if(data == 'success'){
					//location.href = base_url()+'deals';
					location.reload();
				}else{
					alert(data);
					return false;
				}
			}
		});

	});

	$("#forgotpassword").live('click', function () {
		if (!IsEmail($.trim($("#txtemail").val())) || $.trim($("#txtemail").val()) == "") {
		  alert('Please enter valid email.');
		  return false;
		}
		$.ajax({
			url: base_url()+'welcome/forgotpassword',
			type: 'post',
			data: $("#forgotpwdform").serialize(),
			success: function  (data) {
				if(data == 'success'){
					alert("Email has been sent to your email.");
				}else{
					alert(data);
					return false;
				}
			}
		});
	});
});
