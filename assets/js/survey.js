$(document).ready(function(){
    var val;

    // toggle if-coming block
    val = $("input:radio[name=coming]:checked").val();
    if ( val == "yes" || val == "maybe" ){
        $("#email, #count").prop("required", true).data("required", true);
    } else {
        $("#if-coming").hide();
    }
    $("input:radio[name=coming]").change(function(){
        val = $("input:radio[name=coming]:checked").val();
        if ( val == "yes" || val == "no" || val == "maybe") {
            $("input:radio[name=coming]").each(function(){$(this).removeClass("error")});
        }
        if ( val == "yes" || val == "maybe" ){
            $("#if-coming").slideDown();
            $("#email, #count").prop("required", true).data("required", true);
        } else if ( val == "no" ){
            $("#if-coming").slideUp();
            $("#email, #count").prop("required", false).data("required", false);
        }
    });

    // toggle input.filled
    $(".filled").each(function(){
        if ( $(this).val() == "" ){
            $(this).removeClass("filled");
        }
    })
    $(".textfield input").change(function(){
        if ( $(this).val() != "" ) {
            $(this).addClass("filled");
        } else {
            $(this).removeClass("filled");
        }
    })

    // validate Input
    function validate(){
        console.log("validating "+$(this).val());
        if ( $(this).prop("required") && $(this).val().length < 1 ){
            if ( !$(this).hasClass("error") ){
                $(this).next("label").append(" (erforderlich)");
            }
            $(this).addClass("error filled");
        } else {
            $(this).removeClass("error");
        }
    }
    // validate fields on blur
    $("input").blur(validate);
    // validate on submit
    $("#submit").click(function(event){
        var valid = false;
        // validate text fields
        $("input").each(validate);
        // validate coming radio
        var radio = $("input:radio[name='coming']");
        if ( !radio.is(":checked") ){
            valid = false;
            radio.each(function(){$(this).addClass("error")});
        } else {
            valid = true;
            radio.each(function(){$(this).removeClass("error")});
        }
        // submit if valid
        $("input").each(function(){
            valid = valid && !$(this).hasClass("error");
        });
        if ( !valid ){
            event.preventDefault();
        }
        // blur button
        $(this).blur();
    })
});
