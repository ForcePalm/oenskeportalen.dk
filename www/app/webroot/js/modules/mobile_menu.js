// A $( document ).ready() block.
$( document ).ready(function() {
    $(".mobile-menu span").click(function() {
        $(".share-popup").hide();
        $(".top-nav-links").show();
        $(".top-nav-links").toggleClass("menu-closed menu-open");
        if($(".top-nav-links").hasClass("menu-open")){
            $(".top-nav-links").animate({"left": "0%"},500);
        }else{
            $(".top-nav-links").animate({"left": "100%"},500);
        }
    });
    $( window ).resize(function() {
        if ($(window).width() > 750) {
            $(".top-nav-links").removeClass("menu-open");
            $(".top-nav-links").addClass("menu-closed");
            $(".top-nav-links").hide();
            $(".top-nav-links").css("left", "100%");
        }
    });
});