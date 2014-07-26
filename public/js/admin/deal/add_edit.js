$("#submit").on("click",function  () {

    if ($("#dd_dealerid").val() == "") {
        alert("Please select dealer.");
        return false;
    }

    if ($("#dd_catid").val() == "") {
        alert("Please select category.");
        return false;
    }

    if ($("#dd_name").val() == "") {
        alert("Please enter deal name.");
        return false;
    }

    if ($("#dd_status").val() == "") {
        alert("Please select status.");
        return false;
    }

    if ($("#dd_includes").val() == "") {
        alert("Please enter what deals includes.");
        return false;
    }

    if ($("#dd_policy").val() == "") {
        alert("Please enter deal policy.");
        return false;
    }

});
