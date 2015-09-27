$(document).ready(function(){
    $(".filled").removeClass("filled");
    $("#if-coming").hide();

    $("input:radio[name=coming]").change(function(){
        var val = $('input:radio[name=coming]:checked').val();
        if ( val == "yes" || val == "maybe" ) {
            $("#if-coming").slideDown();
        } else if ( val == "no" ) {
            $("#if-coming").slideUp();
        }
    });

    $(".textfield input").change(function(){
        var val = $(this).val();
        if ( val != "" ) {
            $(this).addClass("filled");
        } else {
            $(this).removeClass("filled");
        }
    })
});
