jQuery(document).ready(function () {
    var banner = $("#banner").attr("src");
    banner = parseInt(banner.substring(banner.length - 5, banner.length - 4));
    
    $("#banner-left").on("click", function() {
        if(banner <= 1){
            banner = 5;
        }else{
            banner = banner - 1;
        }

        $("input[value="+banner+"]").attr("checked", "false");

        var url = "./resources/assets/img/banner/"+banner+".png";
        $("#banner").attr("src", url);
    });

    $("#banner-right").on("click", function() {
        if(banner >= 5){
            banner = 1;
        }else{
            banner = banner + 1;
        }

        $("input[value="+banner+"]").attr("checked", "false");

        var url = "./resources/assets/img/banner/"+banner+".png";
        $("#banner").attr("src", url);
    });

    $("input[name='banner-radio']").on("click", function() {
        var banner = $(this).val();

        var url = "./resources/assets/img/banner/"+banner+".png";
        $("#banner").attr("src", url);
    });
});