$(document).ready(function (){
    let current_fs, next_fs;
    let opacity;
    let current = 1;
    let currentButton = '#first_btn';
    let i = 0;
    let step = null;

    window.onload = function () {
        $('#country').append("<option value=''></option>")
        Object.keys(allCountry).forEach(function (key) {
            $('#country').append("<option value='" + key + "'" + ">" + allCountry[key] + "</option>")
        })
    }

    $('#datepicker').datepicker({
        format: 'mm/dd/yyyy',
        endDate: '-1d'
    });

    $("#firstname").keypress(function(event){
        let inputValue = event.which;

        if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)) {
            event.preventDefault();
        }
    });

    $("#lastname").keypress(function(event){
        let inputValue = event.which;
        // allow letters and whitespaces only.
        if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)) {
            event.preventDefault();
        }
    });

    $('#phone-number').inputmask('+9 (999) 999-9999');

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
        $(".first_form").hide();
        $(".second_form").show();
        $(".social_card").hide();
        currentButton = '#second_btn';
    }
    else if (readCookie("step") === "three") {
        $(".first_form").hide();
        $(".second_form").hide();
        $(".social_card").show();
        $("#progressbar").hide();
        currentButton = '#second_btn';
    } else{
        $(".first_form").show();
        $(".second_form").hide();
        $(".social_card").hide();
        currentButton = '#first_btn';
    }

    function steps(currentButton){
        current_fs = $(currentButton).parent();
        next_fs = $(currentButton).parent().next();

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

    }

    $('#back_to_home').click( function () {
        document.cookie = "step=first";
        currentButton = '#first_btn';
    })

    $(document).on('change', '#photo', function () {
        if (this.files[0].size > 2000000) {
            $('#photo-size-error').html('File must be less than 2 mb.')
            $('#second_btn').prop('disabled', true)
        } else {
            $('#second_btn').prop('disabled', false)
            $('#photo-size-error').empty()
        }
    })

    $(currentButton).click(function (){
        $('#first-form').validate({
            rules: {
                firstname: {
                    required: true,
                    maxlength: 100
                },
                lastname: {
                    required: true,
                    maxlength: 100
                },
                birth_date: {
                    required: true
                },
                report_subject: {
                    required: true,
                    maxlength: 255
                },
                country: {
                    required: true,
                    maxlength: 100
                },
                phone_number: {
                    required: true
                },
                email: {
                    required: true,
                    maxlength: 100,
                    email: true,
                    remote: {
                        url: '/emailCheck',
                        type: 'post'
                    }
                },
                company: {
                    maxlength: 100
                },
                position: {
                    maxlength: 100
                },
                about: {
                    maxlength: 500
                },
                photo: {
                    extension: 'png|jpe?g|gif'
                },
            },
            messages: {
                photo: {
                    extension: 'Only files .jpg, .png, .gif allowed.'
                },
                email: {
                    remote: 'Email already exists.'
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
                        console.log(123123);
                        steps(currentButton);
                        currentButton = '#second_btn';
                    },
                    error: function (e){
                        console.log(e)
                    }
                })
            }
        })
    })


});