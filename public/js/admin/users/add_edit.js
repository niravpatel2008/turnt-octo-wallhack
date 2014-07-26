$("#submit").on("click",function  () {
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

    if ($("#password").val() == "") {
        alert("Please enter password.");
        return false;
    }

    if ($("#re_password").val() == "") {
        alert("Please enter repeat password.");
        return false;
    }

    if ($("#password").val() != $("#re_password").val()) {
        alert("Password field does not match.");
        return false;
    }

});


