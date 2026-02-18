<?php 
/*
Template Name: Наставникам
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
                    <div class="parent-text coaches">
                        <h1><?php the_field('главный_заголовок')?></h1>
                        <?php the_field('главное_описание') ?>
                        <div class="main-parent-button">
                        
                            <div class="person_button orange quiz_popup_open">
                                <a href="#">
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
                            <div class="button-icons">
                                <img src="<?php echo get_template_directory_uri() . '/assets/images/coaches/circle1.svg'?>" alt="">
								<img src="<?php echo get_template_directory_uri() . '/assets/images/coaches/circle2.svg'?>" alt="">
								  <img src="<?php echo get_template_directory_uri() . '/assets/images/circle1-white.svg'?>" alt="">
								<img src="<?php echo get_template_directory_uri() . '/assets/images/circle2-white.svg'?>" alt="">
                            </div>
                            
                        </div>
                        <p></p>
                    </div>
                    <div class="parent-image coaches">
                        <video preload="auto" playsinline="" autoplay="" loop="" muted="" loading="lazy">
							<source src="<?php the_field('главное_видео')?>" type="video/mp4">
						</video>
                    </div>
                </div>
            </div>
        </div>

        <div class="coaches-adv-section">
            <div class="container">
                <div class="coaches-adv-header">
                    <div class = "title"><?php the_field('второй_экран_заголовок')?></div>
                    <p><?php the_field('второй_экран_описание')?></p>
                </div>
                <div class="coaches-adv-flex">
					
							<?php if( have_rows('второй_экран_повторитель') ): ?>
    							<?php while( have_rows('второй_экран_повторитель') ): the_row(); ?>
					
                    <div class="coaches-adv-item">
                        <div class="coaches-adv-background-image">
                            <img src="<?php the_sub_field('изображение')?>" alt="">
                        </div>
                        <div class="coaches-adv-opacity"></div>
                        <div class="coaches-adv-content">
                            <div class = "title">
                                <img src="<?php the_sub_field('икона')?>" alt="">
                                <?php the_sub_field('заголовок')?>
                            </div>
                            <p><?php the_sub_field('описание')?></p>
                        </div>
                    </div>
                 	<?php endwhile; ?>
							<?php endif; ?>
					
                </div>
            </div>
        </div>

        <div class="coaches-list">
            <div class="container">
                <div class="coaches-list-flex">
                    <div class="coaches-list-header">
                        <div class = "title"><?php the_field('третий_экран_заголовок')?></div>
                        <p><?php the_field('третий_экран_описание')?></p>
                    </div>
                    <div class="coaches-list-content">
						
					
							<?php if( have_rows('третий_экран_повторитель') ): ?>
						<?php $item_count = 1;?>
    							<?php while( have_rows('третий_экран_повторитель') ): the_row(); ?>
						
                        <div class="coaches-list-item">
                            <div class="coachest-list-number">
                                <p>0<?php echo $item_count;?></p>
                            </div>
                            <div class="coaches-list-text">
                                <div class = "title"><?php the_sub_field('заголовок')?></div>
                                <p><?php the_sub_field('описание')?></p>
                            </div>
                        </div>
                       
						<?php $item_count++ ;?>
                 	<?php endwhile; ?>
							<?php endif; ?>
						
                    </div>
                </div>
            </div>
        </div>

        <div class="coaches-grey-section">
            <div class="container">
                <div class="coacheas-grey-content">
                    <div class="coaches-grey-text">
                        <div class = "title"><?php the_field('четвертый_заголовок')?></div>
                        <p><?php the_field('четвертый_текст')?></p>
                        <a href="#" class = "quiz_popup_open">Хочу стать наставником</a>
                    </div>
                    <div class="coaches-grey-image">
                        <img src="<?php the_field('четвертая_картинка')?>" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="coaches-person-slider-block">
            <div class="container">
                <div class="coaches-person-header">
                    <div class = "title">Кто присоединился к нам<br> и меняет жизни людей к лучшему</div>
                </div>
            </div>
            <div class="coaches-person-slider">
				<?php $args = array(
        					'post_type' => 'coaches',
        					'posts_per_page' => '100'
    						);
    						$loop = new WP_Query($args);
    						while($loop->have_posts()) : $loop->the_post();
							$post_ID = get_the_ID() ?>
				
                <div class="coaches-person-slider-item">
					<div class = "coaches-person-slider-item-img">
                    	<img src="<?php the_field('image')?>" alt="">
					</div>
                    <div class = "title"><?php the_title()?></div>
					<div class = "coaches-person-slider-item-content">
						<?php if( have_rows('projects') ): ?>
    											<?php while( have_rows('projects') ): the_row(); ?>
						<div class = "slider_coaches_grad">
							
						</div>
        											<p><?php the_sub_field('text'); ?></p>
    											<?php endwhile; ?>
											<?php endif; ?>
					</div>
                   	
                </div>
              
							<?php 
							endwhile;
							wp_reset_postdata();
							?>
              
            </div>
        </div>

        <div class="coaches-services">
            <div class="container">
                <div class="coaches-services-header">
                    <div class = "title"><?php the_field('пятый_заголовок')?></div>
                </div>
                <div class="coaches-services-flex">
					
					
							<?php if( have_rows('пятый_повторитель') ): ?>
    							<?php while( have_rows('пятый_повторитель') ): the_row(); ?>
						
                    <div class="coaches-services-item">
                        <div class = "title"><?php the_sub_field('плашка')?></div>
                        <p><?php the_sub_field('текст')?></p>
                    </div>
                  
                 	<?php endwhile; ?>
							<?php endif; ?>
						
                </div>
            </div>
        </div>

        <div class="coaches-keys">
            <div class="container">
                <div class="coaches-keys-header">
                    <div class = "title"><?php the_field('шестой_заголовок')?></div>
                </div>
                <div class="coaches-keys-flex">
					
					
					
							<?php if( have_rows('шестой_повторитель') ): ?>
    							<?php while( have_rows('шестой_повторитель') ): the_row(); ?>
						
					
                    <div class="coaches-key-flex-item">
                        <div class="coaches-key-background">
                            <img src="<?php the_sub_field('изображение')?>" alt="">
                            <div class = "title"><?php the_sub_field('заголовок')?></div>
                        </div>
                        <div class="coaches-key-content">
                            <p><?php the_sub_field('текст')?></p>
                        </div>
                    </div>
					
					
                 	<?php endwhile; ?>
							<?php endif; ?>
						
					
                </div>
            </div>
        </div>


       
		<?php get_template_part( 'template-parts/template-format'  , null, array( 'variant' => 'v3' ));?>
        <div class="section9 students-section">
            <div class="container">
                <div class="students-section-header">
                    <div class = "title">Они уже реализовали свои цели в жизнь</div>
                    <a href="/кейсы/">Узнать об успехе Поколенцев</a>
                </div>
               
				
					<?php get_template_part( 'template-parts/template-cases' );?>
            </div>
        </div>
		
		<?php get_template_part( 'template-parts/template-reviews' , null, array( 'variant' => 'v1' )  );?>
    
		<?php get_template_part( 'template-parts/template-logos' );?>

		<?php get_template_part( 'template-parts/template-advan' );?>

        
		<?php get_template_part( 'template-parts/template-actual' );?>

        
		<?php get_template_part( 'template-parts/template-smi' );?>

		<?php get_template_part( 'template-parts/template-questions' );?>


    </main>
      

<?php 
get_footer();

