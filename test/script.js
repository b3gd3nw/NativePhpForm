$(document).ready(function (){
    var current_fs, next_fs;
    var opacity;
    var current = 1;
    var steps = $("fieldset").length;
    console.log(1);

    $(".next").click(function(){
        console.log(2);

        sendAjaxForm('result_form', 'form', 'test_script.php');

        current_fs = $(this).parent();
        next_fs = $(this).parent().next();

        next_fs.show();
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
        current_fs.animate({opacity: 0}, {step: function (now) {
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                next_fs.css({
                    'opacity': opacity
                });
            },
            duration: 500
            });

    });
});

function sendAjaxForm(result_form, form, url) {
    $.ajax({
        url : url,
        type: 'POST',
        data : $("#"+form).serialize(),
        success : function (result) {
            console.log(result);
        }

    });
}