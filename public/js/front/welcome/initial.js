function openLoginForm()
{
    $('#divConsLogin').modal();
}

function openSignupForm()
{
    //$('#divConsLogin').modal('toggle');
    $("#divCreateAccountForm").modal();
}

function openForgotPasswordForm () {
    $("#divForgotPasswordForm").modal();
}

function IsEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}


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
                //location.reload();
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
            alert(data);
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
