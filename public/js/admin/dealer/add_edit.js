$("#submit").on("click",function  () {

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
