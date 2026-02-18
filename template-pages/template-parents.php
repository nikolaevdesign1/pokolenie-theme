<?php 
/*
Template Name: Родителям
*/
get_header();
?>

  <main>
        <div class="parent-main">
            <div class="parent-background">
                <img src = "<?php echo get_template_directory_uri() . '/assets/images/parents-back.svg'?>">
            </div>
            <div class="container">
                <div class="parent-flex">
                    <div class="parent-text">
						<h1><?php the_field('главный_заголовок')?></h1>
                        <p><?php the_field('главное_описание')?></p>
                        <div class="main-parent-button">
							<p class = "buttons_sub">
								Проект бесплатный, участие осуществляется на конкурсной основе
							</p>
                            <div class="gradient_button start_register">
                                <a href="#">
                                    Подать заявку
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
							
					
				<?php if( have_rows('главные_теги') ): ?>
    				<?php while( have_rows('главные_теги') ): the_row(); ?>
                            <p><?php the_sub_field('текст')?></p>
							
    				<?php endwhile; ?>
				<?php endif; ?>
                        </div>
                        <img src = "<?php the_field('главная_фотография')?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="parent-about">
            <div class="container">
                <div class="parent-about-header">
                    <div class = "title"><?php the_field('второй_заголовок')?></div>
                </div>
                <div class="parent-about-flex">
					
					
				<?php if( have_rows('второй_повторитель') ): ?>
    				<?php while( have_rows('второй_повторитель') ): the_row(); ?>
                    <div class="parent-about-item">
                        <img src="<?php the_sub_field('картинка')?>" alt="">
                        <p><?php the_sub_field('текст')?></p>
                    </div>
                  	<?php endwhile; ?>
				<?php endif; ?>
                </div>
            </div>
        </div>
        <div class="parent-list">
            <div class="container">
                <div class="parent-list-header">
                    <div class = "title"><?php the_field('третий_заголовок')?></div>
                </div>
                <div class="parent-list-flex">
                    <div class="parent-list-image">
                        <img src = "<?php the_field('третья_фотография')?>">
                    </div>
                    <div class="parent-list-content">
						
				<?php if( have_rows('третий_повторитель') ): ?>
    				<?php while( have_rows('третий_повторитель') ): the_row(); ?>
                        <div class="parent-list-item">
                            <img src="<?php the_sub_field('иконка')?>" alt="">
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
	 	
	  	
		<?php get_template_part( 'template-parts/template-reviews' );?>
      
        <div class="section9 students-section">
            <div class="container">
                <div class="students-section-header">
                    <div class = "title">Благодаря наставникам, <br>
они воплотили мечты в жизнь</div>
                    <a href="/кейсы/" >Узнать об успехе Поколенцев</a>
                </div>
              	
		<?php get_template_part( 'template-parts/template-cases' );?>
            </div>
        </div>
       
		<?php get_template_part( 'template-parts/template-coaches', null, array( 'variant' => 'v1' ) );?>

	  
		<?php get_template_part( 'template-parts/template-format'  , null, array( 'variant' => 'v1' ));?>

      
		<?php get_template_part( 'template-parts/template-faq'  , null, array( 'variant' => 'v1' ));?>
        
		<?php get_template_part( 'template-parts/template-questions' );?>
        
		<?php get_template_part( 'template-parts/template-actual' );?>
        
		<?php get_template_part( 'template-parts/template-smi' );?>
       
		<?php get_template_part('template-parts/template-plaska', null, array( 'variant' => 'var3' ) );?>
	  
	  
    </main>

<?php 
get_footer();

