$("#submit").on("click",function  () {

    if ($("#dc_catname").val() == "") {
        alert("Please enter category name.");
        return false;
    }

    if ($("#dc_catdetails").val() == "") {
        alert("Please enter category detail.");
        return false;
    }

});
