jQuery(document).ready(function () {
    $("#senha-button").on("click", function(){
        var input = $("#senha-input");

        if(input.attr("type") == "password"){
            input.attr("type", "text");
            $(this).html('<i class="fa fa-eye-slash"></i>');
        }else if(input.attr("type") == "text"){
            input.attr("type", "password");
            $(this).html('<i class="fa fa-eye"></i>');
        }
    });
    $("#menu-login").on("click", function(){
        $("#info-login").css("display", "flex");
        $("#info-pessoais").css("display", "none");
        $("#info-pagamento").css("display", "none");

        $("#menu-pessoais").css("background-color", "var(--4)");
        $("#menu-pessoais").css("color", "black");

        if($("#menu-pagamento").attr("disabled") == false){
            $("#menu-pagamento").css("background-color", "var(--4)");
            $("#menu-pagamento").css("color", "black");
        }
    });

    $("#menu-pessoais").on("click", function(){
        $("#info-login").css("display", "none");
        $("#info-pessoais").css("display", "flex");
        $("#info-pagamento").css("display", "none");

        if($("#menu-pagamento").attr("disabled") == false){
            $("#menu-pagamento").css("background-color", "var(--4)");
            $("#menu-pagamento").css("color", "black");
        }
    });

    $("#menu-pagamento").on("click", function(){
        $("#info-login").css("display", "none");
        $("#info-pessoais").css("display", "none");
        $("#info-pagamento").css("display", "flex");

        $("#menu-login").css("background-color", "var(--3)");
        $("#menu-login").css("color", "white");
        $("#menu-pessoais").css("background-color", "var(--3)");
        $("#menu-pessoais").css("color", "white");
    });

    $("#continuar-pessoais").on("click", function(){
        var cont = 0;

        $(("#info-login input")).each(function(){
            if($(this).val() == ""){
                cont++;
            }
        });

        if(cont == 0){
            $("#info-login").css("display", "none");
            $("#info-pessoais").css("display", "flex");
            $("#menu-pessoais").attr("disabled", "false");
            $("#menu-pessoais").css("background-color", "var(--3)");
            $("#menu-pessoais").css("color", "white");
        }else{
            $("#info-login").find(".aviso").css("display", "flex");
        }

        
    });
    $("#voltar-login").on("click", function(){
        $("#info-login").css("display", "flex");
        $("#info-pessoais").css("display", "none");
        $("#info-pagamento").css("display", "none");
        $("#menu-pessoais").css("background-color", "var(--4)");
        $("#menu-pessoais").css("color", "black");
        $("#menu-pagamento").css("background-color", "var(--4)");
        $("#menu-pagamento").css("color", "black");
    });
    $("#continuar-pagamento").on("click", function(){
        var cont = 0;

        $(("#info-pessoais input")).each(function(){
            if($(this).val() == ""){
                cont++;
            }
        });

        if(cont == 0){
            $("#info-pessoais").css("display", "none");
            $("#info-pagamento").css("display", "flex");
            $("#menu-pagamento").attr("disabled", "false");
            $("#menu-pagamento").css("background-color", "var(--3)");
            $("#menu-pagamento").css("color", "white");
        }else{
            $("#info-pessoais").find(".aviso").css("display", "flex");
        }
    });
    $("#voltar-pessoais").on("click", function(){
        $("#info-login").css("display", "none");
        $("#info-pessoais").css("display", "flex");
        $("#info-pagamento").css("display", "none");
        $("#menu-pessoais").css("background-color", "var(--3)");
        $("#menu-pessoais").css("color", "white");
        $("#menu-pagamento").css("background-color", "var(--4)");
        $("#menu-pagamento").css("color", "black");
    });
    $("#concluir").on("click", function(){
        $("#form").submit();
    });
    $("#deletar").on("click", function(){
        $("#tipo").val("delete");
        $("#form").submit();
    });
});