jQuery(document).ready(function($){

    $('.start_register').on('click', function(){

        // === если пользователь уже авторизован ===
        if(myData.is_user_logged_in){
            window.location.href = myData.profile_url;
            return;
        }

        // Иначе показываем попап входа
        $('.popup-registration').fadeOut();
        $('.sign-in').fadeIn();
    });

    // === кнопка "Зарегистрироваться" в попапе входа ===
    $('.sign-in .registration_button').on('click', function(){
        $('.sign-in').fadeOut();
        $('.popup-years').fadeIn(); // спрашиваем возраст
    });

    // === Выбор возраста ===
    $('.popup-years .age-yes').on('click', function(){
        $('.popup-years').fadeOut();
        $('.more').fadeIn();
    });

    $('.popup-years .age-no').on('click', function(){
        $('.popup-years').fadeOut();
        $('.less').fadeIn();
    });

    // === Кнопка "Войти" в других попапах ===
    $('.sign-in-button').on('click', function(){
        $('.popup-registration').fadeOut();
        $('.sign-in').fadeIn();
    });

    // === Закрытие попапов кликом по фону ===
    $('.popup-background').on('click', function(){
        $(this).closest('.popup-registration, .popup-years').fadeOut();
    });

// === AJAX регистрация ===
$('#registerForm').on('submit', function(e){
    e.preventDefault();

    let password = $('#reg_password').val();
    let confirmPassword = $('#reg_age').val();

    // Проверка совпадения паролей
    if(password !== confirmPassword){
        // если разные – показываем сообщение и выходим
        if(!$('#error-message').length){
            $('#reg_age').after('<p id="error-message"> Пароли не совпадают</p>');
        } else {
            $('#error-message').show();
        }
        return; // прерываем отправку
    } else {
        $('#error-message').hide(); // если совпали – убираем сообщение
    }

    // если пароли совпали – шлем AJAX
    let data = {
        action: 'custom_register',
        email: $('#reg_email').val(),
        password: password
    };

    $.post(myData.ajaxurl, data, function(response){
        if(response.success){
            window.location.href = response.data.redirect;
        } else {
            alert(response.data.message);
        }
    });
});
	
	
// === AJAX регистрация для ребенка ===
$('#registerForm_child').on('submit', function(e){
    e.preventDefault();

    let password = $('#reg_password_child').val();
    let confirmPassword = $('#reg_age_child').val(); // второе поле пароля
    let form = $(this);

    // Проверка совпадения паролей
    if(password !== confirmPassword){
        // показываем сообщение
        if(!form.find('#error-message-child').length){
            $('#reg_age_child').after('<p id="error-message-child">Пароли не совпадают</p>');
        } else {
            $('#error-message-child').show();
        }
        return; // прерываем отправку
    } else {
        form.find('#error-message-child').hide(); // скрываем сообщение, если совпали
    }

    // если пароли совпали – шлем AJAX
    let data = {
        action: 'custom_register_child',
        email: $('#reg_email_child').val(),
        password: password
    };

    $.post(myData.ajaxurl, data, function(response){
        if(response.success){
            window.location.href = response.data.redirect;
        } else {
            // можно тоже вставлять сообщение в форму, а не alert
            if(!form.find('#error-message-child').length){
                form.append('<p id="error-message-child" style="color:red;">' + response.data.message + '</p>');
            } else {
                form.find('#error-message-child').text(response.data.message).show();
            }
        }
    });
});
	
	
	

    // === AJAX вход ===
    $('#loginForm').on('submit', function(e){
        e.preventDefault();
        let data = {
            action: 'custom_login',
            email: $('#login_email').val(),
            password: $('#login_password').val()
        };
        $.post(myData.ajaxurl, data, function(response){
            if(response.success){
                window.location.href = response.data.redirect;
            } else {
                alert(response.data.message);
            }
        });
    });

});


