$(function(){
    var height1 = $("#editor").parents(".form-group").offset().top;
    //var width1 = $("#editor").width();
    //alert(height1);
    //alert(width1);
    $("#main-content").scroll(function(){
        var h = $(this).scrollTop();
        if(h>height1){
            $("#edui1_toolbarbox").css({"position":"fixed","top":"63px","z-index":"9999","width":"1024px"});
        }else{
            $("#edui1_toolbarbox").css({"position":"relative","top":0});
        }
    });
});