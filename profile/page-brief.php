<?php

/* Template Name: Бриф*/
get_header('person');

if ( ! is_user_logged_in() ) {
    echo '<p>Вы не авторизованы</p>';
} else {

	
$user_id = get_current_user_id();
$date_group = get_field('data', 'user_' . $user_id);
	
$group_age = get_field('user', 'user_' . $user_id);
$age = $group_age['birthday'];
$user_city = $group_age['city'];

	
$formentor = $date_group['formentor'];
$city = $date_group['city'];

$found = $date_group['found'];
$found_name = $date_group['found_name'];
	
$q1 = $date_group['question_1'];
$q2 = $date_group['question_2'];
$q3 = $date_group['question_3'];
$q4 = $date_group['question_4'];
$q5 = $date_group['question_5'];
$q6 = $date_group['question_6'];
$q7 = $date_group['question_7'];
$q8 = $date_group['question_8'];
$q9 = $date_group['question_9'];
$q10 = $date_group['question_10'];
$q11 = $date_group['question_11'];
$q12 = $date_group['question_12'];
$q13 = $date_group['question_13'];
$q14 = $date_group['question_14'];
$q15 = $date_group['question_15'];
$sucsess =  0;

	?>

<main>

    <div class="personal-main-section">
        <div class="container">
            <div class="personal-header">
                <div class = "title">Личный кабинет</div>
            </div>
            
            <div class="personal-flex">
                <div class="personal-sidebar">
                    <div class="personal-sidebar-container">
                        <div class = "title">Анкета участника</div>
                        <ul>
                            <li><a href="/профиль/"><img src="<?php echo get_template_directory_uri() . '/assets/images/acc/i1.svg'?>" alt="">Контактные данные</a></li>
                            <li  class = "active"><a href="/бриф/"><img src="<?php echo get_template_directory_uri() . '/assets/images/acc/i2-a.svg'?>" alt="">Регистрация к наставнику</a></li>
                        </ul>
                        <div class = "title">Статус</div>
                        <ul>
                            <li><a href="/статус/"><img src="<?php echo get_template_directory_uri() . '/assets/images/acc/i3.svg'?>" alt="">Отследить статус заявки</a></li>
                        </ul>

                        <div class="pesronal-sidebar-button">
                            <a href="<?php the_field('телеграм', 'options')?>" target = "_blank">Перейти в Telegram канал</a>
                        </div>
                    </div>
                </div>
				<?php if ($sucsess){ ?>
				  <div class="personal-admin start" >
                        <div class="personal-admin-container-start">
                            <div class = "title">Регистрация прошла успешно!</div>
                            <p>Если вы хотите изменить свою анкету, нажмите на кнопку «Редактировать анкету»</p>
                            <a class = "ac_reg_button">«Редактировать анкету»</a>

                            <img src="<?php echo get_template_directory_uri() . '/assets/images/acc/coaches.png'?>" alt="">
                        </div>
                </div>
				<?php } 
				?>
				<div class="personal-admin continue" style = "<?php if ($sucsess){ echo 'display:none';}  ?>">
                    <div class="brief-container">
                        <div class="brief-header">
                            <div class = "title">Регистрация к наставнику</div>
						
                        </div>
                        <form class="brief-content" id="brief-form" method="post" enctype="multipart/form-data" >
                            <div class="brief-content-steps step" data-step="1">
                                <div class = "title">1. К какому наставнику вы хотите попасть?</div>
                                <div class="brief-content-coaches-list">
									
									<?php
$args = array(
    'post_type' => 'coaches',
    'posts_per_page' => 1000
);
$loop = new WP_Query($args);

// Преобразуем дату рождения пользователя в возраст
$date_of_birth = $age; // пример, замени на свою переменную
$dob = DateTime::createFromFormat('d.m.Y', $date_of_birth);
$today = new DateTime();
$age = $dob ? $today->diff($dob)->y : 0;

$found_any = false; // флаг для проверки, есть ли подходящие наставники

while($loop->have_posts()) : $loop->the_post();
    $post_ID = get_the_ID();
    $age_range_str = get_field('age_peoples'); // строка типа "15-18 лет"

    // Парсим диапазон
    if (preg_match('/(\d+)-(\d+)/', $age_range_str, $matches)) {
        $min_age = (int)$matches[1];
        $max_age = (int)$matches[2];
    } else {
        $min_age = 0;
        $max_age = 150; // если не указан диапазон, показываем всем
    }
	$coach_status = get_field('is_open');
	$coach_city = get_field('region');
    // Проверяем подходит ли возраст пользователя
    
	
	
    if ($age >= $min_age && $age <= $max_age && get_field('is_open') == 'Открыт') {
	/*echo $coach_city;
	echo '<br>';
	echo $user_city; 
	echo '<br>';
	echo $min_age;
	echo '<br>';
	echo $max_age;
	echo '<br>';
	echo $age;
	echo '<br>';*/
		$user_city = trim($user_city);
		$coach_city = trim($coach_city);
		/*if ($user_city == $coach_city ||get_field('format') == 'Online' ) {*/
        $found_any = true; // нашли хотя бы одного подходящего наставника
        
									
									?>
									
        <div class="brief-content-coaches-list-item 
            <?php 
                if ( isset($formentor) && $formentor === get_the_title() ) {
                    echo 'choose';
                } else {
                    echo 'show hide';
                } 
            ?>
        " data-city = "<?php the_field('region')?>" data-format = "<?php the_field('format')?>">
            <div class="brief-content-coaches-list-item-image">
                <img src="<?php the_field('image');?>" alt="">
            </div>
            <div class="brief-content-coaches-list-item-content">
                <div class = "title_h2"><?php the_title();?></div>
                <div class = "title_h3">Возраст участников: <span><?php the_field('age_peoples')?></span></div>
                <div class = "title_h3">Город: <span><?php the_field('region')?></span></div>
                <div class="brief-content-coaches-list-item-content-links">
                    <p class="choose-trainer">Выбрать наставника</p>
                    <a href="<?php echo get_permalink();?>" target="_blank">Читать больше о наставнике</a>
                </div>
            </div>
            <input type="radio" name="formentor" value="<?php the_title();?>" hidden>
        </div>
        <?php
		/*}*/
    }
endwhile;

// Если подходящих наставников нет
if (!$found_any) {
    echo '<p>Подходящих наставников нет.</p>';
}

wp_reset_postdata();
?>
									
									
                                </div>
                            </div>
                            <div class="brief-content-steps step" data-step="2" style="display:none;">
                                <div class = "title">2. В каком городе вы живете?</div>
                                <p>Ваш город должен совпадать с регионом, который указан в анкете выбранного вами наставника. Если у вашего наставника онлайн-формат - то совпадение не обязательно.</p>
                                <input type="text" name="question_2" placeholder="Москва" id = "city_in" value = "<?php echo $q2?>">
								
							<div id = "result"></div>
								
                            </div>
                            <div class="brief-content-steps step" data-step="3" style="display:none;">
                                <div class = "title">3. Откуда вы узнали о Поколении?</div>
                               <div class="custom-select-wrapper">
  									<div class="custom-select-trigger">Выберите вариант</div>
  									<div class="custom-options">
    <span class="custom-option" data-value="Insta">Личные социальные сети наставников</span>
    <span class="custom-option" data-value="Telegram">Из канала в Telegram</span>
    <span class="custom-option" data-value="Reklama">Реклама в интернете</span>
    <span class="custom-option" data-value="Anons">Анонс в Аномалии</span>
    <span class="custom-option" data-value="Uchastniki">От участников</span>
  </div>
</div>

<input type="hidden" name="question_3" id="question_3">
                            </div>
                            <div class="brief-content-steps step text-counter" data-step="4" style="display:none;">
                                <div class = "title">4. Почему вы хотите в группу именно к этому наставнику?</div>
                               <div class = "brief-content-steps-textarea">
								   	<textarea name="question_4" placeholder="Напишите свой ответ" id="textarea1" maxlength="2000"><?php echo $q4?></textarea>
								 <div class = "char-count" id="char-count1">0 из 2000</div>
								</div>
							
                            </div>
                            <div class="brief-content-steps step text-counter" data-step="5" style="display:none;">
                                <div class = "title">5. Какие жизненные цели вы хотите достичь с помощью наставничества?</div>
                                 <div class = "brief-content-steps-textarea">
								   <textarea name="question_5" placeholder="Напишите свой ответ" id="textarea2" maxlength="2000"><?php echo $q5?></textarea>
								
								 <div class = "char-count" id="char-count2">0 из 2000</div>
								</div>
								
                            </div>
                            <div class="brief-content-steps step text-counter" data-step="6" style="display:none;">
                                <div class = "title">6. Что вы готовы сделать для команды, даже если это выходит за пределы вашей зоны комфорта?</div>
                                 <div class = "brief-content-steps-textarea">
								   	<textarea name="question_6" placeholder="Напишите свой ответ" id="textarea3" maxlength="2000"><?php echo $q6?></textarea>
								 <div class = "char-count" id="char-count3">0 из 2000</div>
								</div>
							
                            </div>
                            <div class="brief-content-steps step" data-step="7" style="display:none;">
                                <div class = "title">7. Назовите три своих жизненных принципа.</div>
                                <textarea name="question_7" placeholder="Напишите свой ответ"><?php echo $q7?></textarea>
                            </div>
                            <div class="brief-content-steps step text-counter" data-step="8" style="display:none;">
                                <div class = "title">8. Какой один вопрос вы бы задали своему будущему наставнику?</div>
                                 <div class = "brief-content-steps-textarea">
								   <textarea name="question_8" placeholder="Напишите свой ответ" id="textarea5" maxlength="2000"><?php echo $q8?></textarea>
								 <div class = "char-count" id="char-count5">0 из 2000</div>
								</div>
								
                            </div>
                            <div class="brief-content-steps step text-counter" data-step="9" style="display:none;">
								<div class = "title">9. Назовите топ-5 своих достижений, которыми вы гордитесь на сегодняшний день.</div>
                                 <div class = "brief-content-steps-textarea">
								   <textarea name="question_9" placeholder="Напишите свой ответ" id="textarea6" maxlength="2000"><?php echo $q9?></textarea>
								 <div class = "char-count" id="char-count6">0 из 2000</div>
								</div>
								
                            </div>
                            <div class="brief-content-steps step" data-step="10" style="display:none;">
                                <div class = "title">10. Если у вас есть опыт участия в олимпиадах, конкурсах, волонтерстве или других проектах — расскажите, в каких именно.</div>
                                
								<textarea name="question_10" placeholder="Напишите свой ответ"><?php echo $q10?></textarea>
                            </div>
                            <div class="brief-content-steps step" data-step="11" style="display:none;">
                                <div class = "title">11. Если у вас есть портфолио, кейсы или другие материалы, которые показывают ваши достижения и опыт, — поделитесь ссылкой. (Например: сайт, соцсети, видео, презентации или документы.) Это необязательный вопрос, но, если есть, можете отправить — это повысит шансы.</div>
                                
								<textarea name="question_11" placeholder="Напишите свой ответ"><?php echo $q11?></textarea>
                            </div>
                            <div class="brief-content-steps step text-counter" data-step="12" style="display:none;">
                                <div class = "title">12. Какие свои качества вы считаете сильными?</div>
                                 <div class = "brief-content-steps-textarea">
								   <textarea name="question_12" placeholder="Напишите свой ответ" id="textarea9" maxlength="2000"><?php echo $q12?></textarea>
								 <div class = "char-count" id="char-count9">0 из 2000</div>
								</div>
								
                            </div>
                            <div class="brief-content-steps step text-counter" data-step="13" style="display:none;">
                                <div class = "title">13. Какие качества вы хотели бы изменить в себе?</div>
                                 <div class = "brief-content-steps-textarea">
								   	<textarea name="question_13" placeholder="Напишите свой ответ" id="textarea10" maxlength="2000"><?php echo $q13?></textarea>
								 <div class = "char-count" id="char-count10">0 из 2000</div>
								</div>
							
                            </div>
                            <div class="brief-content-steps step text-counter" data-step="14" style="display:none;">
                                <div class = "title">14. Какие свои качества, сильные стороны, таланты или способности вы хотите реализовать в проекте?</div>
                                 <div class = "brief-content-steps-textarea">
								   <textarea name="question_14" placeholder="Напишите свой ответ" id="textarea11" maxlength="2000"><?php echo $q14?></textarea>
								 <div class = "char-count" id="char-count11">0 из 2000</div>
								</div>
								
                            </div>
                            <div class="brief-content-steps step text-counter" data-step="15" style="display:none;">
                                <div class = "title">15. Что у вас получается хорошо и чем вы могли бы быть полезны другим?</div>
                                 <div class = "brief-content-steps-textarea">
								   <textarea name="question_15" placeholder="Напишите свой ответ" id="textarea12" maxlength="2000"><?php echo $q15?></textarea>
								 <div class = "char-count" id="char-count12">0 из 2000</div>
								</div>
								
								
                            </div>
							 <div class="brief-content-steps-final step" data-step="16" style="display:none;">
                               	<div class="personal-admin-container-start">
                            	<div class = "title">Хотите ли вы доработать свои ответы перед отправкой?</div>
                            	<p>Вы можете пересмотреть свои ответы и дополнить их. Более развернутые ответы на вопросы повышают вероятность прохождения в проект.</p>
                            	<div class = "brief-content-steps-final-buttons">
									<div class = "back_submit_brief">
										Вернуться к редактированию
									</div>
									
									<div class = "almost-button">Отправить анкету</div>
								</div>
                            	<img src="<?php echo get_template_directory_uri() . '/assets/images/acc/coaches.png'?>" alt="">
                        		</div>
                            </div>
							
							
								<div class = "almost_popup" id = "almost_popup" style = "display:none">			  
		<div class = "almost_popup_background"></div>
		<div class = "almost_popup_content">
			<div class = "title">
				Почти все!
			</div>
			<p>
				<span>Большое спасибо, ваша заявка успешно отправлена.</span> <br>Чтобы отслеживать статус вашей заявки и лично узнать о зачислении в проект, перейдите в Telegram по кнопке ниже и нажмите «Старт»
			</p>
			<button type="submit" name="submit_brief" class = "almost_close" id = "almost_tg">Перейти в Telegram</button>
		</div>
	
	</div>
							
							
                        </form>
                        <div class="brief-buttons">
                            <p class = "back-button" id = "prev-btn">Назад</p>
                            <p class = "next-button <?php if ($formentor){ echo 'active';} ?>" id = "next-btn">Дальше</p>
                        </div>
                    </div>
                      
                </div>
            </div>
            


        </div>
    </div>

    <div class="section-footer-qr">
        <div class="container">
            <div class="section-footer-qr-plashka">
                <div class="plashka-content">
                    <div class = "title">Возникли вопросы?</div>
                    <p>Наша служба заботы с удовольствием ответит 
                        на них и расскажет больше о нашем проекте</p>
                    <a href="#">Написать </a>
                </div>
                <div class="plashka-background">
                    <img src= "<?php echo get_template_directory_uri() . '/assets/images/qr-back.svg'?>">
                </div>
                <div class="plashka-background-image">
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/big-qr.svg'?>" alt="">
                </div>
            </div>
        </div>
    </div>
</main>

<div class = "bottom_mobile_menu">
	 <ul>
         <li><a href="/профиль/"><img src="<?php echo get_template_directory_uri() . '/assets/images/acc/i1.svg'?>" alt="">Контактные данные</a></li>
         <li><a href="/бриф/" class = "active"><img src="<?php echo get_template_directory_uri() . '/assets/images/acc/i2-a.svg'?>" alt="">Регистрация к наставнику</a></li>
         <li><a href="/статус/"><img src="<?php echo get_template_directory_uri() . '/assets/images/acc/i3.svg'?>" alt="">Отследить статус заявки</a></li>
     </ul>
</div>

		<?php }?>
	



    <footer>
        <div class="container">
            <div class="footer-flex">
                <div class="footer_logo">
                    <a href = "/"><img src = "<?php the_field('логотип_подвал', 'options')?>"></a>
                    <p>Помогаем предпринимателям выделить главное и масштабировать бизнес быстрее</p>
                    <div class="footer_social">
						<?php if( have_rows('соц_сети', 'option') ): ?>
    						<?php while( have_rows('соц_сети', 'option') ): the_row(); ?>
        						 <a href="<?php the_sub_field('ссылка')?>"><img src="<?php the_sub_field('иконка')?>" alt=""></a>
    						<?php endwhile; ?>
						<?php endif; ?>
                       
                       
                    </div>
                </div>
                <div class="footer_info">
                    <div class = "title">Меню</div>
                    <ul>
						<?php if( have_rows('меню_подвал', 'option') ): ?>
    						<?php while( have_rows('меню_подвал', 'option') ): the_row(); ?>
        						 <li><a href = "<?php the_sub_field('ссылка')?>"><?php the_sub_field('название_пункта')?></a></li>
    						<?php endwhile; ?>
						<?php endif; ?>
                       
                    
                    </ul>
                    <div class = "title">Реквизиты</div>
                    <p><?php the_field('реквизиты', 'options')?></p>
                </div>
                <div class="footer_buttons">
                    <a class = "start_register">Личный кабинет</a>
                    <a href="https://t.me/pokoleniecare" target = "_blank">Служба заботы</a>
                </div>
            </div>
            <div class="footer_sub">
                <a href="https://pokolenie.info/privacy-policy/" target = "_blank">Политика конфиденциальности</a>
                <a href="https://pokolenie.info/reglament/" target = "_blank">Регламент порядка работы АНО «Поколение»</a>
            </div>

        </div>
    </footer>
    


		<?php //get_template_part( 'template-parts/template-user');?>




    <script src = "https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src = "<?php echo get_template_directory_uri() . '/assets/js/slick.min.js'?>"></script>

<script>
// ===== 1. Логика выбора наставника =====
const mentorCards = document.querySelectorAll('.mentor-card');
let mentorCity = "";
let mentorFormat = "";

mentorCards.forEach(card => {
  card.addEventListener('click', () => {
    mentorCards.forEach(c => c.classList.remove('active')); // убираем активность у других
    card.classList.add('active'); // добавляем активному

    mentorCity = card.dataset.city;
    mentorFormat = card.dataset.format;

    console.log("Выбран наставник:", mentorCity, mentorFormat);
  });
});

// ===== 2. Проверка города участника =====
const cityInput = document.querySelector('#city_in');
const result = document.querySelector('#result');

// Функция Левенштейна
function levenshtein(a, b) {
  const matrix = Array.from({ length: b.length + 1 }, (_, i) =>
    Array.from({ length: a.length + 1 }, (_, j) => j ? 0 : i)
  );
  for (let i = 1; i <= b.length; i++) {
    for (let j = 1; j <= a.length; j++) {
      const cost = a[j - 1] === b[i - 1] ? 0 : 1;
      matrix[i][j] = Math.min(
        matrix[i - 1][j] + 1,
        matrix[i][j - 1] + 1,
        matrix[i - 1][j - 1] + cost
      );
    }
  }
  return matrix[b.length][a.length];
}

let timer;

cityInput.addEventListener('input', () => {
  clearTimeout(timer);

  timer = setTimeout(() => {
    // Проверяем, выбран ли наставник
    const activeCard = document.querySelector('.brief-content-coaches-list-item.choose');
    if (!activeCard) {
      result.textContent = "Сначала выберите наставника";
      result.style.color = "orange";
	  $('.next-button').removeClass('active');
      return;
    }

    const userCity = cityInput.value.trim().toLowerCase();
    const mentorCity = activeCard.dataset.city.trim().toLowerCase();
    const mentorFormat = activeCard.dataset.format;

    // Если наставник онлайн — пропускаем проверку
    if (mentorFormat === "Online") {
      result.textContent = "Наставник онлайн — проверка не требуется";
      result.style.color = "gray";
	  $('.next-button').addClass('active');
      return;
    }

    // Если оффлайн — проверяем город
    const distance = levenshtein(userCity, mentorCity);
    if (distance <= 3) {
      result.textContent = `Город совпадает (${activeCard.dataset.city})`;
      result.style.color = "green";
	  $('.next-button').addClass('active');
    } else {
      result.textContent = `Город не совпадает (${activeCard.dataset.city})`;
      result.style.color = "#C41414";
	  $('.next-button').removeClass('active');
    }
  }, 500);
});
</script>
    <script src = "<?php echo get_template_directory_uri() . '/assets/js/brief.js'?>"></script>

	<script src="https://cdn.jsdelivr.net/npm/inputmask@5.0.8/dist/jquery.inputmask.min.js"></script>
<?php wp_footer(); ?>

</body>
</html>

