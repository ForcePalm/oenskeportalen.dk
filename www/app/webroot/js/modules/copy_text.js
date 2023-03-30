// A $( document ).ready() block.
$(document).ready(()=>{
    $(".share-button").click(function(){
        $(".share-popup").show();
        $(".popup-overlayer").show();
    });
    $("#shareBtn").click(function(){
        navigator.clipboard.writeText($(this).val());
    });
    $(".closeBtn span").click(function(){
        $(".share-popup").hide();
        $(".popup-overlayer").hide();
    });
    $(".popup-overlayer").click(function(){
        $(".share-popup").hide();
        $(".popup-overlayer").hide();
    });
  });