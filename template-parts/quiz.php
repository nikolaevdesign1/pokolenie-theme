<div class = "modal_quiz">
	<div class = "background_modal_quiz"></div>
	<div class = "modal_quiz_close"></div>
	<div class = "modal_quiz_content">
		<div class = "title">
			Хочу стать наставником
		</div>
		<form method = "POST" id = "quiz_form" enctype="multipart/form-data">
			<div class = "quiz_questions">
				<div class = "quiz_question">
					<label>
						1. ФИО
						<input type = "text" name = "quiz_name">
					</label>
				</div>
				<div class = "quiz_question">
					<label>
						2. Ваш возраст
						<input type = "text" name = "quiz_age">
					</label>
				</div>
				<div class = "quiz_question">
					<label>
						3. В каком городе вы живете?
						<input type = "text" placeholder = "Город постоянного проживания" name = "quiz_city">
					</label>
				</div>
				<div class = "quiz_question">
					<label>
						4. Сколько лет вы занимаетесь бизнесом? (Укажите число лет, например: 5)
						<textarea type = "text" name = "quiz_year"></textarea>
					</label>
				</div>
				<div class = "quiz_question">
					<label>
						5. Перечислите ваши бизнесы (в свободной форме опишите виды деятельности, компании, проекты)
						<textarea type = "text" name = "quiz_business" ></textarea>
					</label>
				</div>
				<div class = "quiz_question">
					<label>
    6. Для понимания финансовой устойчивости укажите диапазон, соответствующий Вашей среднемесячной чистой прибыли бизнеса, работы в найме или всех проектов
    <div class="quiz-custom_select">
      <div class="quiz-custom_select_selected">Выберите диапазон</div>
      <div class="quiz-custom_select_options">
        <div class="quiz-custom_select_option">До 2 млн</div>
        <div class="quiz-custom_select_option">2-3 млн</div>
        <div class="quiz-custom_select_option">3-5 млн</div>
        <div class="quiz-custom_select_option">От 5 млн</div>
      </div>
      <input type="hidden" name="income_range" value="">
    </div>
  </label>
				</div>
				<div class = "quiz_question">
					<label>
						7. Почему вы хотите стать наставником в проекте
«Поколение»? (Опишите свои мотивы и интерес к проекту)
						<textarea name = "quiz_que1"></textarea>
					</label>
				</div>
				<div class = "quiz_question">
					<label>
						8. Готовы ли вы выступать в роли спикера перед подростками ? Какие темы вы могли бы раскрыть как спикер? (Кратко перечислите темы или сферы экспертности) :
						<textarea name = "quiz_que2"></textarea>
					</label>
				</div>
				<div class = "quiz_question">
					<label>
						9. Сколько времени в месяц вы готовы уделять проекту Поколение?
						<input type = "text" name = "quiz_que3">
					</label>
				</div>
				<div class = "quiz_question">
					<label>
						10. Знакомы ли с действующими наставниками проекта Поколение? (Если да, с кем?)
						<input type = "text" name = "quiz_que4">
					</label>
				</div>
				<div class = "quiz_question">
					<label>
						11. Откуда узнали о проекте?
						<input type = "text" name = "quiz_que5">
					</label>
				</div>
				<div class = "quiz_question">
					<label>
						12. Telegram
						<input type = "text" name = "quiz_que6" >
					</label>
				</div>
				<div class = "quiz_question">
					<label>
						13. Телефон
						<input type = "text" name = "quiz_que7">
					</label>
				</div>
				<div class = "quiz_question">
					<div class = "final_step">
						Проверьте заполненность полей
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