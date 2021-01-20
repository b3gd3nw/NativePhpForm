$(document).ready(function (){
    var current_fs, next_fs;
    var opacity;
    var current = 1;
    var steps = $("fieldset").length;
    console.log(1);

    $(".next").click(function(){
        console.log(2);

        sendAjaxForm('result_form', 'form', 'action_ajax_form.php');

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
        url:     url, //url страницы (action_ajax_form.php)
        type:     "POST", //метод отправки
        dataType: "html", //формат данных
        data: $("#"+form).serialize(),  // Сеарилизуем объект
        success: function(response) { //Данные отправлены успешно
            result = $.parseJSON(response);
            $('#result_form').html('Имя: '+result.first_name+'<br>Телефон: '+result.phone_number);
            console.log(4);
        },
        error: function(response) { // Данные не отправлены
            $('#result_form').html('Ошибка. Данные не отправлены.');
        }
    });
}