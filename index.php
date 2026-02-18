<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pokolenie
 */

get_header();
?>
 <main>
        <div class="section1">
            <div class="section1_background"></div>
            <div class = "container">
                <div class="section1_content">
                    <div class="section1_logo">
                        <img src = "<?php the_field('логотип', 'options')?>">
                    </div>
                    <div class="section1_flex">
                        <div class="section1_text">
                            <p>
                                Проект для подростков 15-19 лет,  в котором наставники на протяжении 10 лет, бесплатно, помогают подросткам раскрыть свой потенциал  и найти путь, на котором они будут чувствовать           себя полноценно и гармонично
                            </p>
                        </div>
                        <div class="section1_buttons">
                            <div class="person_button">
                                <a href="#">
                                    <p>Хочу стать наставником</p>
                                    <img src="images/person1.svg" alt="картинка">
                                    <img src="images/person2.svg" alt="картинка">
                                    <div class="button_icon">
                                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="20.1394" cy="19.8269" r="19.8269" fill="#E0E0E0"/>
                                            <path d="M25.2568 20.7022H20.9968V25.0222H19.2969V20.7022H15.0568V19.1622H19.2969V14.8222H20.9968V19.1622H25.2568V20.7022Z" fill="#B3A8A8"/>
                                        </svg>                                            
                                    </div>
                                </a>
                            </div>
                            <div class="gradient_button start_register">
                                <a href="#">
                                    <p>Хочу стать участником</p>
                                    <div class="gradient_button_icon">
                                        <svg width="43" height="43" viewBox="0 0 43 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="21.2" cy="21.4969" r="21.2" fill="white"/>
                                            <path d="M18.9948 14.875V16.6417H24.816L14.5781 26.8795L15.8236 28.125L26.0615 17.8872V23.7083H27.8281V14.875H18.9948Z" fill="#8F8F8F"/>
                                            </svg>
                                            
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="section1_image">
                        <img src = "images/main-back.png">
                    </div>
                </div>
            </div>
        </div>
        <div class = "section2">
            <div class="container">
                <div class="section_header">
                    <h1>Как поколение меняет жизни миллионов людей в нашей стране</h1>
                    <p>Проект нацелен изменить жизни молодых людей по всей стране, объединив их с ценностными и сильными наставниками</p>
                </div>
            </div>
            <div class="container">
                <div class = "section2_logo">
                    <img src = "images/logo.svg">
                </div>
            </div>
            <div class="section2_slider">
                <div class="section2_slider_item">
                    <div class="section2_back_image">
                        <img src = "images/slider-image1.png">
                    </div>
                    <div class="section2_slider_content">
                        <div class="section2_slider_content_icon">
                            <svg width="45" height="45" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="45" height="45" rx="8" fill="url(#paint0_linear_1_59666)"/>
                                <path d="M25.5762 12.415L23.3369 20.2607C23.1548 20.8994 23.6347 21.535 24.2988 21.5352H29.6221L17.7305 31.4717L20.6113 23.0156C20.8323 22.3669 20.3504 21.6934 19.665 21.6934H14.3867L25.5762 12.415Z" stroke="white"/>
                                <defs>
                                <linearGradient id="paint0_linear_1_59666" x1="23.0742" y1="-2.28214" x2="23.498" y2="50.8793" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#FF7A40"/>
                                <stop offset="0.988999" stop-color="#FF4E00"/>
                                </linearGradient>
                                </defs>
                            </svg>
                        </div>
                        <h1>Миссия проекта</h1>
                        <ul>
                            <li>Вырастить новое Поколение молодых людей, которые своими проектами меняют мир к лучшему.</li>
                            <li>Передать молодежи жизненный и профессиональный опыт, навыки и знания. Чтобы к 25 годам они знали то, что их наставники поняли в 35-40 лет</li>
                        </ul>
                    </div>
                </div>
                <div class="section2_slider_item">
                    <div class="section2_back_image">
                        <img src = "images/slider-image2.png">
                    </div>
                    <div class="section2_slider_content">
                        <div class="section2_slider_content_icon">
                            <svg width="45" height="45" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="45" height="45" rx="8" fill="url(#paint0_linear_1_59666)"/>
                                <path d="M25.5762 12.415L23.3369 20.2607C23.1548 20.8994 23.6347 21.535 24.2988 21.5352H29.6221L17.7305 31.4717L20.6113 23.0156C20.8323 22.3669 20.3504 21.6934 19.665 21.6934H14.3867L25.5762 12.415Z" stroke="white"/>
                                <defs>
                                <linearGradient id="paint0_linear_1_59666" x1="23.0742" y1="-2.28214" x2="23.498" y2="50.8793" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#FF7A40"/>
                                <stop offset="0.988999" stop-color="#FF4E00"/>
                                </linearGradient>
                                </defs>
                            </svg>
                        </div>
                        <h1>Цели проекта</h1>
                        <ul>
                            <li>Чтобы 40.000 подростков в каждом городе России обрели своего наставника. Задача которых поделиться знаниями  и опытом с молодежью для быстрого и эффективного достижения их жизненных целей.</li>
                            <li>Помочь подрастающему поколению в раскрытии своего потенциала, развить навыки и качества, необходимые  для улучшения мира и общества.</li>
                        </ul>
                    </div>
                </div>
                <div class="section2_slider_item">
                    <div class="section2_back_image">
                        <img src = "images/slider-image1.png">
                    </div>
                    <div class="section2_slider_content">
                        <div class="section2_slider_content_icon">
                            <svg width="45" height="45" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="45" height="45" rx="8" fill="url(#paint0_linear_1_59666)"/>
                                <path d="M25.5762 12.415L23.3369 20.2607C23.1548 20.8994 23.6347 21.535 24.2988 21.5352H29.6221L17.7305 31.4717L20.6113 23.0156C20.8323 22.3669 20.3504 21.6934 19.665 21.6934H14.3867L25.5762 12.415Z" stroke="white"/>
                                <defs>
                                <linearGradient id="paint0_linear_1_59666" x1="23.0742" y1="-2.28214" x2="23.498" y2="50.8793" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#FF7A40"/>
                                <stop offset="0.988999" stop-color="#FF4E00"/>
                                </linearGradient>
                                </defs>
                            </svg>
                        </div>
                        <h1>Миссия проекта</h1>
                        <ul>
                            <li>Вырастить новое Поколение молодых людей, которые своими проектами меняют мир к лучшему.</li>
                            <li>Передать молодежи жизненный и профессиональный опыт, навыки и знания. Чтобы к 25 годам они знали то, что их                    наставники поняли в 35-40 лет</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class = "section3">
            <div class = "container">
                <div class = "section3-content">
                    <div class="section3-background">
                        <img src = "images/adv-back.svg">
                    </div>
                    <div class="section3-header">
                        <h1>Место для возможности <br>реализаций идей и мечт молодежи</h1>
                    </div>
                    <div class="section3-flex">
                        <div class="section3_item">
                            <img src = "images/adv-icon1.svg">
                            <p>Лучшие предприниматели и ТОП-менеджеры крупных  компаний страны в роли наставников</p>
                        </div>
                        <div class="section3_item">
                            <img src = "images/adv-icon2.svg">
                            <p>Прописанная методология наставничества нацелена 
                                на максимальное раскрытие  навыков подростков</p>
                        </div>
                        <div class="section3_item">
                            <img src = "images/adv-icon3.svg">
                            <p>Большое сообщество подростков страны с желанием развития и совершенствования</p>
                        </div>
                        <div class="section3_item">
                            <img src = "images/adv-icon4.svg">
                            <p>Возможности для молодежи превратить свою мечту в дело всей жизни</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	 
		<?php get_template_part( 'template-parts/template-logos' );?>
     
       
		<?php get_template_part( 'template-parts/template-advan' );?>
	 
	 	
		<?php get_template_part( 'template-parts/template-coaches' );?>
       

        <div class="section6">
            <div class="container">
                <div class="section6-flex">
                    <div class="section6-text">
                        <h1>Навыки, с которыми будущее поколение меняет мир</h1>
                        <p>Под руководством наставника участники изучают темы, которые создают фундамент для становления сильной и гармоничной личности:</p>
                        <ul>
                            <li><img src="images/list-icon.svg" alt="">Отношения с родителями</li>
                            <li><img src="images/list-icon.svg" alt="">Финансовая грамотность</li>
                            <li><img src="images/list-icon.svg" alt="">Жизненная стратегия</li>
                            <li><img src="images/list-icon.svg" alt="">Психология лидерства</li>
                            <li><img src="images/list-icon.svg" alt="">Нетворкинг</li>
                            <li><img src="images/list-icon.svg" alt="">Публичные выступления</li>
                            <li><img src="images/list-icon.svg" alt="">Переговоры</li>
                        </ul>
                    </div>
                    <div class="section6-image">
                        <img src="images/video_2 1.png" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="section7">
            <div class="container">
                <div class="section7-flex">
                    <div class="section7-text">
                        <h1>Даем все необходимое для старта в жизни 
                            в доступной форме</h1>
                        <div class="gradient_button start_register">
                            <a href="#">
                                <p>Хочу стать участником</p>
                                <div class="gradient_button_icon">
                                    <svg width="43" height="43" viewBox="0 0 43 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="21.2" cy="21.4969" r="21.2" fill="white"/>
                                        <path d="M18.9948 14.875V16.6417H24.816L14.5781 26.8795L15.8236 28.125L26.0615 17.8872V23.7083H27.8281V14.875H18.9948Z" fill="#8F8F8F"/>
                                    </svg>
                                            
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="section7-border">
                        <div class="section7-border-icon">
                            <img src = "images/static-icon.svg">
                        </div>
                        <h1>Помогаем подросткам найти свой путь через:</h1>
                        <ul>
                            <li>Ежеквартальные встречи с наставником</li>
                            <li>Зум-рефлексии</li>
                            <li><a href = "#">Практические задания и игры</a></li>
                            <li>Встречи с приглашенными экспертами</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="section7-slider">
                <div class="slider-item" >
                    <img src="images/carousel1.png" alt="" >
                </div>
                <div class="slider-item">
                    <img src="images/carousel2.png" alt="">
                </div>
                <div class="slider-item">
                    <img src="images/carousel3.png" alt="">
                </div>
                <div class="slider-item">
                    <img src="images/carousel4.png" alt="">
                </div>
                <div class="slider-item">
                    <img src="images/carousel5.png" alt="">
                </div>
                <div class="slider-item">
                    <img src="images/carousel1.png" alt="">
                </div>
                <div class="slider-item">
                    <img src="images/carousel2.png" alt="">
                </div>
                <div class="slider-item">
                    <img src="images/carousel3.png" alt="">
                </div>
                <div class="slider-item">
                    <img src="images/carousel4.png" alt="">
                </div>
                <div class="slider-item">
                    <img src="images/carousel5.png" alt="">
                </div>
            </div>
        </div>

        <div class = "section8">
            <div class="container">
                <div class="section8-content">
                    <div class="section8-background">
                        <img src="images/app-back.svg" alt="">
                    </div>
                    <div class="section8-background-image">
                        <img src="images/phone.png" alt="">
                    </div>
                    <div class="section8-text">
                        <h1>Одна из главных метрик- давать много пользы 
                            для подростков</h1>
                        <p>Регулярно в Telegram-канале мы делаем прямые эфиры с экспертами  в своих облостях, предпринимателями и медийными личностями, публикуем полезные материалы и анонсируем набор в группы новых наставников </p>
                        <div class="section8-buttons">
                            <a href = "#">Перейти в телеграм</a>
                            <img src = "images/big-qr.svg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section9 students-section">
            <div class="container">
                <div class="students-section-header">
                    <h1>Они уже реализовали свои цели в жизнь</h1>
                    <a href="#">Узнать об успехе Поколенцев</a>
                </div>
               
				<?php get_template_part( 'template-parts/template-cases' );?>
            </div>
        </div>

      
		<?php get_template_part( 'template-parts/template-reviews' );?>

		<?php get_template_part( 'template-parts/template-actual' );?>

       
		<?php get_template_part( 'template-parts/template-smi' );?>
	 
       
		<?php get_template_part( 'template-parts/template-questions' );?>
	 
       

      
    </main>
    

<?php
get_footer();
