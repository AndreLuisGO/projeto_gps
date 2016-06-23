$(document).ready(function () {
    "use strict";
    $("#submit").click(function () {

        var login_administrador = $("#login_administrador").val(), senha_administrador = $("#senha_administrador").val();

        if ((login_administrador === "") || (senha_administrador === "")) {
            $("#message").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Please enter a login_administrador and a senha_administrador</div>");
        } else {
            $.ajax({
                type: "POST",
                url: "checklogin.php",
                data: "login_administrador=" + login_administrador + "&senha_administrador=" + senha_administrador,
                dataType: 'JSON',
                success: function (html) {
                    //console.log(html.response + ' ' + html.login_administrador);
                    if (html.response === 'true') {
                        //location.assign("../index.php");
                       location.reload();
                        return html.login_administrador;
                    } else {
                        $("#message").html(html.response);
                    }
                },
                error: function (textStatus, errorThrown) {
                    console.log(textStatus);
                    console.log(errorThrown);
                },
                beforeSend: function () {
                    $("#message").html("<p class='text-center'><img src='images/ajax-loader.gif'></p>");
                }
            });
        }
        return false;
    });
});
