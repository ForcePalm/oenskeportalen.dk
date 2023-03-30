// A $( document ).ready() block.
$(document).ready(()=>{
    //When change on upload field
    $('input[type="file"]').change(function(){
        //Shows the element that holds the img
        $('#uploadImg').show();


        //Finds out that html tag the element is
        var elementType = document.getElementById("uploadImg").tagName;

        //Set either background or src
        if(elementType == 'DIV'){
            $('#uploadImg').css("background-image", "url("+ window.URL.createObjectURL(this.files[0]) +")");  
        }else{
            $('#uploadImg').attr("src", window.URL.createObjectURL(this.files[0]));
        }
    });
  });