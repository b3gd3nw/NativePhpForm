$(document).ready(function (){
    var current_fs, next_fs;
    var opacity;
    var current = 1;
    var steps = $("fieldset").length;
    console.log(1);

    $(".next").click(function(){
        console.log(2);

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

    $('#first-form').validate({
        rules: {
            firstname: {
                required: true
            },
            lastname: {
                required: true
            }
            // birth_date: {
            //     required: true
            // },
            // report_subject: {
            //     required: true
            // },
            // country: {
            //     required: true
            // },
            // phone_number: {
            //     required: true
            // },
            // email: {
            //     required: true
            // }
        },
        submitHandler: function (form) {
            $(form).ajaxSubmit({
                url: '/addUser',
                type: 'post',
                enctype: 'multipart/form-data',
                success: function (data) {

                }
            })
        }
    })
});
