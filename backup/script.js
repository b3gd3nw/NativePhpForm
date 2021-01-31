$(document).ready(function (){
    let current_fs, next_fs;
    let opacity;
    let current = 1;
    let steps = $("fieldset").length;
    let i = 0;
    let step = null;

    document.querySelector('#counter').textContent = "All members :" + readCookie("allUsers");
    function readCookie(name) {

        let name_cook = name+"=";
        let spl = document.cookie.split(";");

        for(let i=0; i<spl.length; i++) {

            let c = spl[i];

            while(c.charAt(0) == " ") {

                c = c.substring(1, c.length);

            }

            if(c.indexOf(name_cook) == 0) {

                return c.substring(name_cook.length, c.length);

            }

        }

        return null;

    }


    if (readCookie("step") === "second") {
//        document.cookie = "step=three";
        $(".first_form").hide();
        $(".second_form").show();
        $(".social_card").hide();
    }
    else if (readCookie("step") === "three") {
        $(".first_form").hide();
        $(".second_form").hide();
        $(".social_card").show();
        $("#progressbar").hide();
    } else{
        $(".first_form").show();
        $(".second_form").hide();
        $(".social_card").hide();
    }

    $(".next").click(function(){
 //       $.cookie('step', 2);
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
                if (readCookie("step") === "second"){
                    step = "/second";
                } else if(readCookie("step") === "three") {
                    step = "/three";
                } else {
                    step = "/first";
                }
                $(form).ajaxSubmit({
                    url: step,
                    type: 'post',
                    enctype: 'multipart/form-data',
                    success: function (data) {

        //                counter.content()
//                        document.cookie = "step=second";
                    }
                })
            }
        })
    })
});