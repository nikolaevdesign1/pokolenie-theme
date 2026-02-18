<?php 
/*
Template Name: Студентам
*/
get_header();
?>
 <main>
        <div class="parent-main">
            <div class="parent-background">
                <img src = "<?php echo get_template_directory_uri(). '/assets/images/to_students/main_back.svg'?>">
            </div>
            <div class="container">
                <div class="parent-flex">
                    <div class="parent-text">
                        <h1><?php the_field('главный_заголовок')?></h1>
                        <?php the_field('главный_подзаголовок')?>
                        <div class="main-parent-button">
							<p class = "buttons_sub">
								Проект бесплатный, участие осуществляется на конкурсной основе
							</p>
                            <div class="gradient_button start_register">
                                <a href="#">
                                    Хочу стать участником
                                    <div class="gradient_button_icon">
                                        <svg width="43" height="43" viewBox="0 0 43 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="21.2" cy="21.4969" r="21.2" fill="white"/>
                                            <path d="M18.9948 14.875V16.6417H24.816L14.5781 26.8795L15.8236 28.125L26.0615 17.8872V23.7083H27.8281V14.875H18.9948Z" fill="#8F8F8F"/>
                                            </svg>
                                            
                                    </div>
                                </a>
                            </div>
                            <div class="person_button">
                                <a href="#section-coaches">
                                    <p>Посмотреть, кто с нами</p>
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
                            
                        </div>
                        <p></p>
                    </div>
                    <div class="parent-image">
                        <div class="parent-tags">
							
							
				<?php if( have_rows('теги_на_слайдер') ): ?>
    				<?php while( have_rows('теги_на_слайдер') ): the_row(); ?>
							
                            <p><?php the_sub_field('тег')?></p>
							
							
					<?php endwhile; ?>
				<?php endif; ?>
							
							
						</div>
						<div class = "students_slider">
							
				<?php if( have_rows('главный_слайдер') ): ?>
    				<?php while( have_rows('главный_слайдер') ): the_row(); ?>
						<div class = "student_slider_item">
								<img src = "<?php the_sub_field('фото')?>">
							</div>
					<?php endwhile; ?>
				<?php endif; ?>
						</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="student-about">
            <div class="container">
                <div class="student-about-header">
                    <div class = "title">
                        <?php the_field('заголовок_второго_экрана')?>
                    </div>
                </div>
                <div class="student-about-content">
					
					
				<?php if( have_rows('повторитель_второго_экрана') ): ?>
					<?php $item = 1;?>
    				<?php while( have_rows('повторитель_второго_экрана') ): the_row(); ?>
				
                    <div class="student-about-item">
                        <div class="student-about-item-image">
                            <img src="<?php the_sub_field('картинка')?>" alt="">
                        </div>
                        <div class="student-about-item-text">
							<div class = "title">0<?php echo $item; ?></div>
							<div class = "title_h2"><?php the_sub_field('заголовок')?></div>
                            <p><?php the_sub_field('текст')?></p>
                        </div>
                    </div>
                   <?php $item++; ?>
    				<?php endwhile; ?>
				<?php endif; ?>
                </div>
            </div>
        </div>
      
		<?php get_template_part( 'template-parts/template-coaches', null, array( 'variant' => 'v2' ) );?>
        <div class="section9 students-section">
            <div class="container">
                <div class="students-section-header">
                    <div class = "title">Они нашли свой путь и воплотили<br> задумки в жизнь. Ты тоже сможешь!</div>
                    <a href="/кейсы/">Узнать об успехе Поколенцев</a>
                </div>
                
					<?php get_template_part( 'template-parts/template-cases' );?>
            </div>
        </div>
     

		<?php get_template_part( 'template-parts/template-reviews' , null, array( 'variant' => 'v1' )  );?>

     
    	
		<?php get_template_part('template-parts/template-plaska', null, array( 'variant' => 'want' ) );?>
	 

		<?php get_template_part( 'template-parts/template-easy' );?>
        
        
		<?php get_template_part( 'template-parts/template-expect' );?>
        
        
		<?php get_template_part( 'template-parts/template-faq'  , null, array( 'variant' => 'v2' ));?>
       
	 
		<?php get_template_part( 'template-parts/template-format'  , null, array( 'variant' => 'v2' ));?>
        <div class="students-adv">
            <div class="container">
                <div class="students-adv-header">
                    <div class = "title"><?php the_field('если_ты_разделяешь_заголовок')?></div>
                </div>
                <div class="students-adv-flex">
					
						<?php if( have_rows('если_ты_разделяешь_повторитель') ): ?>
    				<?php while( have_rows('если_ты_разделяешь_повторитель') ): the_row(); ?>
				
                    <div class="students-adv-flex-item">
                        <div class="students-adv-item-image">
                            <img src="<?php the_sub_field('картинка')?>" alt="">
                            <div class="students-adv-item-image-icon">
                                <img src="<?php the_sub_field('иконка')?>" alt="">
                            </div>
                        </div>
                        <div class="students-adv-item-content">
							<div class = "title"><?php the_sub_field('заголовок')?></div>
                            <p><?php the_sub_field('текст')?></p>
                        </div>
                    </div>
					
					
				
    				<?php endwhile; ?>
				<?php endif; ?>
                  
                  
                </div>
            </div>
        </div>
        <div class="students-text-right">
            <div class="container">
                <div class="students-text-right-flex">
                    <div class="student-text-right-left">
						<div class = "title"><?php the_field('если_ты_хочешь_заголовок')?></div>
						<div class = "title_h2"><?php the_field('если_ты_хочешь_текст')?></div>
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
                    <div class="student-text-right-right">
                        <img src="<?php the_field('если_ты_хочешь_картинка')?>" alt="">
                    </div>
                </div>
            </div>
        </div>
        
		<?php get_template_part( 'template-parts/template-logos' );?>
       
		<?php get_template_part( 'template-parts/template-advan' );?>
	 
		<?php get_template_part( 'template-parts/template-actual' );?>
        
		<?php get_template_part( 'template-parts/template-smi' );?>
       
		<?php get_template_part( 'template-parts/template-questions' );?>
    </main>
  

<?php 
get_footer();

