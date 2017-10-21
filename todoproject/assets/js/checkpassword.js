function checkPasswordMatch() {
    var password = $("#inputPassword").val();
    var confirmPassword = $("#confPassword").val();
    if (password == confirmPassword){
        $( "#inputPassword, #confPassword" ).css( "border", "2px solid green" );
        $("#inpbutton").removeAttr("disabled");
    }
    else{
        $( "#confPassword,#inputPassword" ).css( "border", "2px solid red" );
        $("#inpbutton").attr("disabled", "disabled");
    }
}

$(document).ready(function () {
    $("#confPassword").keyup(checkPasswordMatch);
});