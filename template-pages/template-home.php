<?php
/**
 * Template name: Главная страница
 */

get_header();
?>
<style>

	.section-coaches{
		background-color:#f6f6f6;
	}

</style>
 <main>
        <div class="section1">
            <div class="section1_background"></div>
            <div class = "container">
                <div class="section1_content">
                    <div class="section1_logo">
                        <img src = "<?php echo get_template_directory_uri() . '/assets/images/main-logo.svg' ?>">
                    </div>
                    <div class="section1_flex">
                        <div class="section1_text">
                            <p>
                               <?php the_field('описание')?>
                            </p>
                        </div>
                        <div class="section1_buttons">
                            <div class="person_button">
                                <a href="/наставникам/">
                                    <p>Хочу стать наставником</p>
                                    <img src="<?php echo get_template_directory_uri() . '/assets/images/person1.svg'?>" alt="картинка">
                                    <img src="<?php echo get_template_directory_uri() . '/assets/images/person2.svg'?>" alt="картинка">
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
                        <img src = "<?php the_field('фоновая_картинка')?>">
						<img src = "<?php echo get_template_directory_uri() . '/assets/images/main_back_mobile.png'?>">
                    </div>
                </div>
            </div>
        </div>
        <div class = "section2">
            <div class="container">
                <div class="section_header">
                    <div class = "title"><?php the_field('второй_блок_заголовок')?></div>
                    <p><?php the_field('второй_блок_описание')?></p>
                </div>
            </div>
            <div class="container">
                <div class = "section2_logo">
                    <img src = "<?php echo get_template_directory_uri() . '/assets/images/logo.svg'?>">
                </div>
            </div>
            <div class="section2_slider">
				
				
				<?php if( have_rows('второй_экран_слайдер') ): ?>
    				<?php while( have_rows('второй_экран_слайдер') ): the_row(); ?>
				
				  <div class="section2_slider_item">
                    <div class="section2_back_image">
                        <img src = "<?php the_sub_field('картинка')?>">
                    </div>
                    <div class="section2_slider_content">
						<?php if (get_sub_field('иконка')){?>
                        <div class="section2_slider_content_icon">
                           <img src = "<?php the_sub_field('иконка')?>">
                        </div>
						<?php }?>
                        <div class = "title"><?php the_sub_field('заголовок')?></div>

						   <?php the_sub_field('текст')?>
						
                    </div>
                </div>
				
				
    				<?php endwhile; ?>
				<?php endif; ?>
				
            </div>
        </div>
        <div class = "section3">
            <div class = "container">
                <div class = "section3-content">
                    <div class="section3-background">
                        <img src = "<?php echo get_template_directory_uri() . '/assets/images/adv-back.svg'?>">
                    </div>
                    <div class="section3-header">
                        <div class = "title"><?php the_field('блок_с_иконками_заголовок')?></div>
                    </div>
                    <div class="section3-flex">
						
				<?php if( have_rows('список_с_иконками') ): ?>
    				<?php while( have_rows('список_с_иконками') ): the_row(); ?>
						
                        <div class="section3_item">
                            <img src = "<?php the_sub_field('иконка')?>">
                            <p><?php the_sub_field('текст')?></p>
                        </div>
                     
				
    				<?php endwhile; ?>
				<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
	 
		<?php get_template_part( 'template-parts/template-logos' );?>
     
       
		<?php get_template_part( 'template-parts/template-advan' );?>
	 
	 	
		<?php get_template_part( 'template-parts/template-coaches', null, array( 'variant' => 'v1' ) );?>
       

        <div class="section6">
            <div class="container">
                <div class="section6-flex">
                    <div class="section6-text">
                        <div class = "title"><?php the_field('навыки_заголовок')?></div>
                        <p><?php the_field('навыки_описание')?></p>
                        <ul>
							
				<?php if( have_rows('навыки_список') ): ?>
    				<?php while( have_rows('навыки_список') ): the_row(); ?>
                            <li><img src="<?php echo get_template_directory_uri() . '/assets/images/list-icon.svg'?>" alt=""><?php the_sub_field('элемент')?></li>
    				<?php endwhile; ?>
				<?php endif; ?>
                        </ul>
                    </div>
                    <div class="section6-image">
                        <video preload="auto" playsinline="" autoplay="" loop="" muted="" loading="lazy">
							<source src="<?php the_field('навыки_видео')?>" type="video/mp4">
						</video>
                    </div>
                </div>
            </div>
        </div>

        <div class="section7">
            <div class="container">
                <div class="section7-flex">
                    <div class="section7-text">
                        <div class = "title"><?php the_field('навыки_нижний_заголовок')?></div>
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
                            <img src = "<?php the_field('навыки_иконка')?>">
                        </div>
                        <div class = "title"><?php the_field('навыки_правый_текст')?></div>
                        <ul>
                          	
				<?php if( have_rows('навыки_правый_список') ): ?>
    				<?php while( have_rows('навыки_правый_список') ): the_row(); ?>
                            <li><?php the_sub_field('элемент')?></li>
    				<?php endwhile; ?>
				<?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="section7-slider">
				
				<?php if( have_rows('навыки_слайдер') ): ?>
    				<?php while( have_rows('навыки_слайдер') ): the_row(); ?>
				
                <div class="slider-item">
                    <img src="<?php the_sub_field('изображение')?>" alt="" >
                </div>
                	<?php endwhile; ?>
				<?php endif; ?>
				
				
            </div>
        </div>

    	
		<?php get_template_part('template-parts/template-plaska', null, array( 'variant' => 'metric' ) );?>
	 
	 	<div class = "directors_section">
			<div class = "container">
				 <div class="students-section-header">
                    <div class = "title">Основатели проекта</div>
                </div>
				<div class = "directors_section_flex">
					<div class = "directors_section_item">
						<img src = "<?php echo get_template_directory_uri() . '/assets/images/admin1.png'?>">
						<div class = "director_header">
							Михаил Гребенюк
						</div>
						<ul>
							<li>Предприниматель</li>
							<li>Отец 5-х погодок</li>
							<li>Основатель компании Resulting</li>
							<li>Основатель экосистемы для предпринимателей «Аномалия»</li>
						</ul>
					</div>
						<div class = "directors_section_item">
						<img src = "<?php echo get_template_directory_uri() . '/assets/images/admin2.png'?>">
						<div class = "director_header">
							Юлия Хлуднева
						</div>
						<ul>
							<li>Предприниматель</li>
							<li>Основатель девелоперской компании Nedvex</li>
							<li>Счастливая жена и мама</li>
						</ul>
					</div>
						<div class = "directors_section_item">
						<img src = "<?php echo get_template_directory_uri() . '/assets/images/admin3.png'?>">
						<div class = "director_header">
							Артур Терисаян
						</div>
						<ul>
							<li>Инвестор, запустивший более  15 бизнес-проектов от ІТ до стройки</li>
							<li>Член наблюдательного совета Федерации кикбоксинга России</li>
						</ul>
					</div>
				</div>
			</div>	
	 	</div>
        <div class="section9 students-section">
            <div class="container">
                <div class="students-section-header">
                    <div class = "title">Они уже реализовали<br> свои цели в жизнь</div>
                    <a href="/кейсы/">Узнать об успехе Поколенцев</a>
                </div>
               
				<?php get_template_part( 'template-parts/template-cases' );?>
            </div>
        </div>

      
		<?php get_template_part( 'template-parts/template-reviews' , null, array( 'variant' => 'v1' ) );?>

		<?php get_template_part( 'template-parts/template-actual' );?>

       
		<?php get_template_part( 'template-parts/template-smi' );?>
	 
       
		<?php get_template_part( 'template-parts/template-questions' );?>
	 
       

      
    </main>
    

<?php
get_footer();
