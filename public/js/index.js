$(document).ready(function () {
    $('input#name, input#email').unbind().blur(function () {
        var id = $(this).attr('id');
        var val = $(this).val();
        switch (id) {

            case 'name':
                var rv_name = /^[a-zA-Zа-яА-Я]+$/;

                if (val.length > 3 && val != '' && rv_name.test(val)) {

                    $('.name').html('Принято')
                        .css('color', 'green')
                        .animate({'paddingLeft': '10px'}, 400)
                        .animate({'paddingLeft': '5px'}, 400);
                }

                else {

                    $('.name').html('поле "ФИО" обязательно для заполнения, длина должна составлять не менее 3 символов, содержать только русские или латинские буквы')
                        .css('color', 'red')
                        .animate({'paddingLeft': '10px'}, 400)
                        .animate({'paddingLeft': '5px'}, 400);
                }
                break;


            case 'email':
                var rv_email = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
                if (val != '' && rv_email.test(val)) {

                    $('.email').html('Принято')
                        .css('color', 'green')
                        .animate({'paddingLeft': '10px'}, 400)
                        .animate({'paddingLeft': '5px'}, 400);
                }
                else {

                    $('.email').html('поле "Email" обязательно для заполнения, поле должно содержать правильный email-адрес')
                        .css('color', 'red')
                        .animate({'paddingLeft': '10px'}, 400)
                        .animate({'paddingLeft': '5px'}, 400);
                }
                break;
        }
    });
    $('form').submit(function (event) {
        if ($("#name").val() == "") {
            event.preventDefault();
        } else if ($('#email').val() == "") {
            event.preventDefault();
        } else if ($('select#area').val() == null) {
            alert("Выберите область");
            event.preventDefault();
        } else if ($('select#city').val() == null) {
            alert("Выберите город");
            event.preventDefault();
        }

    });


    $('.my_select_box').chosen({
        disable_search_threshold: 5,
        no_results_text: "Oops, nothing found!",
        width: "100%"
    });

    $('#area').on('change', function () {
        $('#city').find('option:not(:first)')
            .remove()
            .end()
            .prop('disabled', true);
        var select = $('.my_select_box').val();
        console.log(select);
        $.ajax({
            type: "POST",
            url: "libs/function.php",
            dataType: "json",
            data: {
                area: select
            },
            error: function (data) {
                alert("При выполнении запроса произошла ошибка :(");
            },
            success: function (data) {
                $('#city').append(data);
                $('#city').prop('disabled', false);
                $('.my_select_box').trigger('chosen:updated');
            }
        });

    });
    $("#city").on('change', function () {
        $('#district').find('option:not(:first)')
            .remove()
            .end()
            .prop('disabled', true);
        var select = $('#city').val();
        $.ajax({
            type: "POST",
            url: "libs/function.php",
            dataType: "json",
            data: {
                city: select
            },
            error: function () {
                alert("При выполнении запроса произошла ошибка :(");
            },
            success: function (data) {
                if (data == null) {
                    return;
                } else {
                    $('#district').append(data);
                    $('#district').prop('disabled', false);
                    $('.my_select_box').trigger('chosen:updated');
                }
            }
        });
    });
});