$(document).ready(function (){
    var current_fs, next_fs;
    var opacity;
    var current = 1;
    var steps = $("fieldset").length;
    let i = 0;
    let step = "/first";
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

    $("#first_btn").click(function (){
        console.log(11);
        $('#first-form').validate({
            rules: {
                firstname: {
                    required: true
                },
                lastname: {
                    required: true
                },
                birth_date: {
                    required: true
                },
                report_subject: {
                    required: true
                },
                country: {
                    required: true
                },
                phone_number: {
                    required: true
                },
                email: {
                    required: true
                }
            },
            submitHandler: function (form) {
                console.log(i);
                if (i > 0){
                    step = "/second";
                }
                $(form).ajaxSubmit({
                    url: step,
                    type: 'post',
                    enctype: 'multipart/form-data',
                    success: function (data) {
                        i++;
                    }
                })
            }
        })
    })
});