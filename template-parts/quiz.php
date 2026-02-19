<?php

$form_success = false;

if (
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    isset($_POST['application_nonce']) &&
    wp_verify_nonce($_POST['application_nonce'], 'save_application_coach')
) {

    $answers = [];

    for ($i = 1; $i <= 15; $i++) {
        $key = 'quiz_q' . $i;
        $answers[$i] = isset($_POST[$key]) 
            ? sanitize_textarea_field($_POST[$key]) 
            : '';
    }

    // ФИО из quiz_q1
    $fio = !empty($answers[1])
        ? trim(preg_replace('/\s+/', ' ', sanitize_text_field($answers[1])))
        : 'Без имени';

    // Дата по таймзоне WordPress
    $current_datetime = current_time('d.m.Y H:i');

    $post_title = sprintf(
        'Новая заявка — %s — %s',
        $fio,
        $current_datetime
    );

    $post_id = wp_insert_post([
        'post_type'   => 'application_coaches',
        'post_status' => 'private',
        'post_title'  => $post_title,
    ]);

    if ($post_id && !is_wp_error($post_id)) {

        for ($i = 1; $i <= 15; $i++) {
            update_field('вопрос_' . $i, $answers[$i], $post_id);
        }

        $form_success = true;
    }
}
?>

<?php if ($form_success) : ?>
    <div class="quiz_success">
        Спасибо! Ваша анкета отправлена.
    </div>
<?php endif; ?>



<div class = "modal_quiz">
	<div class = "background_modal_quiz"></div>
	<div class = "modal_quiz_close"></div>
	<div class = "modal_quiz_content">
		<div class = "title">
			Хочу стать наставником
		</div>
		<form method = "POST" id = "quiz_form" enctype="multipart/form-data">
			<?php wp_nonce_field('save_application_coach', 'application_nonce'); ?>
			<div class = "quiz_questions">
				<div class = "quiz_question">
					<div class = "quiz_topic_header">
						Базовая информация
					</div>
					<label>
						1. ФИО
						<input type = "text" name = "quiz_q1">
					</label>
				</div>
				<div class = "quiz_question">
					<label>
						2. Ваш возраст
						<input type = "text" name = "quiz_q2">
					</label>
				</div>
				<div class = "quiz_question">
					<label>
					 	3.	Город базирования 
						<input type = "text" placeholder = "Город постоянного проживания" name = "quiz_q3">
					</label>
				</div>
				<div class = "quiz_question">
					<label>
					 	4.	Ник Telegram 
						<input type = "text" placeholder = "@" name = "quiz_q4">
					</label>
				</div>
				<div class = "quiz_question">
					<label>
					 	5.	Телефон 
						<input type = "text" placeholder = "+7 (999) 000 00 00" name = "quiz_q5">
					</label>
				</div>
				<div class = "quiz_question">
					<div class = "quiz_topic_header">
						Профессиональный масштаб
					</div>
					<label>
    6.	Ваша текущая роль
    <div class="quiz-custom_select">
      <div class="quiz-custom_select_selected">Выберите из списка</div>
      <div class="quiz-custom_select_options">
        <div class="quiz-custom_select_option">Предприниматель / владелец бизнеса</div>
        <div class="quiz-custom_select_option">Инвестор</div>
        <div class="quiz-custom_select_option">Топ-менеджер (CEO / CЕО-1)</div>
        <div class="quiz-custom_select_option">Другое</div>
      </div>
      <input type="hidden" name="quiz_q6" value="">
    </div>
  </label>
				</div>
				
				
				
				<div class = "quiz_question">
					<label>
						7.	Перечислите сферы в которых вы сейчас работаете:
						<textarea type = "text" name = "quiz_q7"></textarea>
					</label>
				</div>
				<div class = "quiz_question">
					<label>
						8. Название компании(ий) / проекта(ов) и ваша роль в них:
						<textarea type = "text" name = "quiz_q8" ></textarea>
					</label>
				</div>
				<div class = "quiz_question">
					<label>
						 9.	Для понимания профессионального масштаба выберите диапазоны.
						Годовой оборот бизнеса / компании, за которую вы отвечаете:

						<div class="quiz-custom_select">
						  <div class="quiz-custom_select_selected">Выберите диапазон</div>
						  <div class="quiz-custom_select_options">
							<div class="quiz-custom_select_option">300 млн – 1 млрд ₽</div>
							<div class="quiz-custom_select_option">1–2 млрд ₽</div>
							<div class="quiz-custom_select_option">2–10 млрд ₽</div>
							<div class="quiz-custom_select_option">10+ млрд ₽</div>
						  </div>
						  <input type="hidden" name="quiz_q9" value="">
						</div>
  					</label>
				</div>
				
				<div class = "quiz_question">
					<label>
						 10.	Ваш личный доход в месяц:
						<div class="quiz-custom_select">
						  <div class="quiz-custom_select_selected">Выберите диапазон</div>
						  <div class="quiz-custom_select_options">
							<div class="quiz-custom_select_option">1–5 млн ₽</div>
							<div class="quiz-custom_select_option">5–10 млн ₽</div>
							<div class="quiz-custom_select_option">10+ млн ₽</div>
						  </div>
						  <input type="hidden" name="quiz_q10" value="">
						</div>
  					</label>
				</div>
				<div class = "quiz_question">
					<label>
						11.	Сколько сотрудников в вашем прямом или функциональном управлении?
						<div class="quiz-custom_select">
						  <div class="quiz-custom_select_selected">Выберите диапазон</div>
						  <div class="quiz-custom_select_options">
							<div class="quiz-custom_select_option">10–50</div>
							<div class="quiz-custom_select_option">50–100</div>
							<div class="quiz-custom_select_option">100+</div>
						  </div>
						  <input type="hidden" name="quiz_q11" value="">
						</div>
					</label>
				</div>
				
				
				<div class = "quiz_question">
					<div class = "quiz_topic_header">
						Управленческий и ценностный блок
					</div>
					
					<label>
						12.	Кто из действующих наставников может вас рекомендовать? 
(минимум 2 человека, действующие наставники <a href = "https://pokolenie.info/%D0%BD%D0%B0%D1%81%D1%82%D0%B0%D0%B2%D0%BD%D0%B8%D0%BA%D0%B8/" target = "_blank">по ссылке</a>)
						<textarea name = "quiz_q12"></textarea>
					</label>
				</div>
				<div class = "quiz_question">
					<label>
						13.	 Почему для вас важно стать наставником в «Поколении»? (коротко — 5–7 предложений)
						<textarea name = "quiz_q13"></textarea>
					</label>
				</div>
				<div class = "quiz_question">
					<label>
						14.	Сколько часов в месяц вы готовы уделять проекту:
						<ul>
							<li>группе подростков – </li>
							<li>сообществу наставников – </li>
						</ul>
						<textarea name = "quiz_q14"></textarea>
					</label>
				</div>
				<div class = "quiz_question">
					<label>
						15.	Откуда вы узнали о проекте?
						<textarea name = "quiz_q15"></textarea>
					</label>
				</div>
				
				
				
				
				<div class = "quiz_question">
					<div class = "final_step">
						Проверьте заполненность полей
						<p>
							Благодарим за ваши ответы!
Наставничество в «Поколении» — это системный вклад.
Мы ищем людей, которые готовы быть взрослой опорой и передавать управленческое мышление, ответственность и культуру решений.
После рассмотрения анкеты мы свяжемся с вами для следующего этапа знакомства.
<br><br>
С уважением, команда Поколения 🧡

						</p>
					<button type = "submit">
						Отправить
					</button>
					</div>
					
				</div>
			</div>
		</form>
		<div class = "modal_quiz_navigations">
			<p>
				Назад
			</p>
			<p>
				Дальше
			</p>
		</div>
	</div>
</div>