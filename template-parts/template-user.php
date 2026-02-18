<div class="popup-years">
    <div class="popup-background"></div>
    <div class="popup-content">
		<div class = "popup-content-close"></div>
        <div class = "title">Вам уже есть 18?</div>
        <div class="popup-content-buttons">
            <p class="age-yes">Да, мне есть 18 лет</p>
            <p class="age-no">Нет, мне нет 18 лет</p>
        </div>
    </div>
</div>


<div class="popup-registration more">
    <div class="popup-background"></div>
    <div class="popup-content">
		<div class = "popup-content-close"></div>
        <div class="popup-content-registrations">
            <form id="registerForm">
                <div class = "title">Регистрация</div>
                <input id="reg_email" type="email" placeholder="Ваша почта" required>
                <input id="reg_password" type="password" placeholder="Придумайте пароль" required>
                <input type="password" id="reg_age" placeholder="Повторите пароль">
                <label>
                    <input type="checkbox" required>
                    <p>Я согласен(а), <a href="https://pokolenie.info/privacy-policy/" target = "_blank">с политикой конфиденциальности</a> и <a href="https://pokolenie.info/reglament/"  target = "_blank">обработки персональных данных</a></p>
                </label>
                <label>
                    <input type="checkbox">
                    <p>Даю согласие на получение <a href="https://pokolenie.info/soglasie/" target = "_blank">рекламной рассылки</a></p>
                </label>
                <label>
                    <input type="checkbox" required>
                    <p>Я согласен(а), <a href="https://pokolenie.info/reglament/" target = "_blank">с регламентом порядка работы</a></p>
                </label>
                <button class="thanks_button" type="submit">Зарегистрироваться в личном кабинете</button>
				<p class="sign-in-button mobile">Войти</p>
            </form>
        </div>
        <div class="popup-content-background">
            <img src="<?php echo get_template_directory_uri() . '/assets/images/sign.svg'?>" alt="">
            <div class = "title">У меня уже есть аккаунт</div>
            <p class="sign-in-button">Войти</p>
        </div>
    </div>
</div>



<div class="popup-registration less">
    <div class="popup-background"></div>
    <div class="popup-content">
		<div class = "popup-content-close"></div>
        <div class="popup-content-registrations">
            <form id="registerForm_child">
				<div class = "title">Регистрация</div>
				<div class = "title_h2">Осуществляется родителем или опекуном</div>
                <input id="reg_email_child" type="email" placeholder="Почта родителя или опекуна" required>
                <input id="reg_password_child" type="password" placeholder="Придумайте пароль" required>
                <input type="password" id="reg_age_child" placeholder="Повторить пароль" required>
                <label>
                    <input type="checkbox" required>
                    <p>Я согласен(а), <a href="http://pokolenie.info/?page_id=3&preview=true"  target = "_blank">с политикой конфиденциальности</a> и <a href="https://pokolenie.info/reglament/" target = "_blank">обработки персональных данных</a></p>
                </label>
                <label>
                    <input type="checkbox">
                    <p>Даю согласие на получение <a href="https://pokolenie.info/soglasie/" target = "_blank">рекламной рассылки</a></p>
                </label>
                <label>
                    <input type="checkbox" required>
                    <p>Я согласен(а), <a href="https://pokolenie.info/reglament/" target = "_blank">с регламентом порядка работы</a></p>
                </label>
                <button class="thanks_button" type="submit">Зарегистрироваться в личном кабинете</button>
				
            <p class="sign-in-button mobile">Войти</p>
            </form>
        </div>
        <div class="popup-content-background">
            <img src="<?php echo get_template_directory_uri() . '/assets/images/sign.svg'?>" alt="">
			<div class = "title">У меня уже есть аккаунт</div>
            <p class="sign-in-button">Войти</p>
        </div>
    </div>
</div>



<div class="popup-registration sign-in">
    <div class="popup-background"></div>
    <div class="popup-content">
		<div class = "popup-content-close"></div>
        <div class="popup-content-registrations">
            <form id="loginForm">
				<div class = "title">Вход</div>
                <input id="login_email" type="email" placeholder="Ваша почта" required>
                <input id="login_password" type="password" placeholder="Ваш пароль" required>
                <p class="forgot-pass">Забыли пароль?</p>
                <button type="submit">Войти в личный кабинет</button>
				
            <p class="registration_button mobile">Зарегистрироваться</p>
            </form>
        </div>
        <div class="popup-content-background">
            <img src="<?php echo get_template_directory_uri() . '/assets/images/sign.svg'?>" alt="">
			<div class = "title">У меня нет аккаунта</div>
            <p class="registration_button">Зарегистрироваться</p>
        </div>
    </div>
</div>



<div class="popup-registration thanks">
    <div class="popup-background"></div>
    <div class="popup-content">
		<div class = "popup-content-close"></div>
        <div class="popup-content-registrations">
            <div class="popup-content-thanks">
				<div class = "title">Спасибо за регистрацию!</div>
                <p>Подтвердите ваш аккаунт, перейдя по ссылке,<br><a href="acc/account.html">высланный на указанный вами e-mail</a></p>
				
            <p class="sign-in-button mobile">Войти</p>
            </div>
        </div>
        <div class="popup-content-background">
            <img src="<?php echo get_template_directory_uri() . '/assets/images/sign.svg'?>" alt="">
			<div class = "title">У меня уже есть аккаунт</div>
            <p class="sign-in-button">Войти</p>
        </div>
    </div>
</div>



<!-- Шаг 1 -->
<div class="popup-registration pass1">
    <div class="popup-background"></div>
    <div class="popup-content">
		<div class = "popup-content-close"></div>
        <div class="popup-content-registrations">
            <form id="forgotPassForm">
				<div class = "title">Восстановление пароля</div>
                <input id="forgot_email" type="email" placeholder="Введите вашу почту" required>
                <p>На нее будет выслана ссылка для восстановления</p>
                <button type="submit">Отправить ссылку</button>
				
            <p class="registration_button mobile">Зарегистрироваться</p>
            </form>
        </div>
        <div class="popup-content-background">
            <img src="<?php echo get_template_directory_uri() . '/assets/images/sign.svg'?>" alt="">
			<div class = "title">У меня нет аккаунта</div>
            <p class="registration_button">Зарегистрироваться</p>
        </div>
    </div>
</div>

<!-- Шаг 2 -->
<div class="popup-registration pass2">
    <div class="popup-background"></div>
    <div class="popup-content">
		<div class = "popup-content-close"></div>
        <div class="popup-content-registrations">
            <div class="popup-content-thanks">
				<div class = "title">Восстановление пароля</div>
                <p>Ссылка для восстановления пароля отправлена <br><a href="#" class="go_pass3">на указанный вами e-mail</a></p>
				
            <p class="registration_button mobile">Зарегистрироваться</p>
            </div>
        </div>
        <div class="popup-content-background">
            <img src="<?php echo get_template_directory_uri() . '/assets/images/sign.svg'?>" alt="">
			<div class = "title">У меня нет аккаунта</div>
            <p class="registration_button">Зарегистрироваться</p>
        </div>
    </div>
</div>



