<?php
/**
 * Template for Coache page
 */

get_header();
?>

 <main>
        <div class="main-coach">
            <div class="container">
                <div class="main-coach-flex">
                    <div class="main-coach-left">
                        <div class="main-coach-back">
                            <a href="/наставники/">Смотреть других наставников</a>
                        </div>
                        <div class="main-coach-content">
                            <div class="main-coach-content-header">
                                <h1><?php the_title();?></h1>
                                <p><a href = "/">Главная</a> / <a href = "/наставники/">Наставники</a> / <?php the_title();?></p>
                            </div>
                            <div class="main-coach-content-flex">
                                <div class="main-coach-content-item">
                                    <div class = "title_h2">Возраст:</div>
                                    <p><?php the_field('age')?></p>
                                </div>
                                <div class="main-coach-content-item">
                                    <div class = "title_h2">В бизнесе:</div>
                                    <p><?php the_field('in_bus')?></p>
                                </div>
                                <div class="main-coach-content-item">
                                    <div class = "title_h2">Регион:</div>
                                    <p><?php the_field('region')?></p>
                                </div>
                                <div class="main-coach-content-item">
                                    <div class = "title_h2">Формат:</div>
                                    <p><?php the_field('format')?></p>
                                </div>
                                <div class="main-coach-content-item">
                                    <div class = "title_h2">Набор:</div>
                                    <p><?php the_field("is_open");?></p>
                                </div>
                            </div>
                            <div class="main-coach-content-list">
                                <p>Бизнес-проекты:</p>
                               <?php if( have_rows('projects') ): ?>
    								<ul>
        								<?php while( have_rows('projects') ): the_row(); ?>
            							<li><?php the_sub_field('text'); ?></li>
        								<?php endwhile; ?>
   									</ul>
								<?php endif; ?>
                            </div>
                            <div class="main-coach-content-buttons">
                                <div class="gradient_button start_register">
                                    <a href="#">
                                        <p>Подать заявку</p>
                                        <div class="gradient_button_icon">
                                            <svg width="43" height="43" viewBox="0 0 43 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="21.2" cy="21.4969" r="21.2" fill="white"/>
                                                <path d="M18.9948 14.875V16.6417H24.816L14.5781 26.8795L15.8236 28.125L26.0615 17.8872V23.7083H27.8281V14.875H18.9948Z" fill="#8F8F8F"/>
                                                </svg>
                                                
                                        </div>
                                    </a>
                                </div>
                                <div class="main-coach-content-buttons-text">
                                    <p>Проект бесплатный, участие<br> осуществляется на конкурсной основе</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="main-coach-right">
                        <img src="<?php the_field('image')?>" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="about-coach-section">
            <div class="container">
                <div class="about-coach-section-header">
                    <div class = "title">Ключевые показатели, <br>которыми гордится наставник</div>
                </div>
				 <?php if( have_rows('num_keys') ): ?>
				 <div class="about-coach-section-flex">
    				<?php $count = 1;?>
        			<?php while( have_rows('num_keys') ): the_row(); ?>
					  <div class="about-coach-section-item">
                        <div class = "title">0<?php echo $count;?></div>
                        <p><?php the_sub_field('text'); ?></p>
						 <?php $count++ ?> 
                    </div>
        			<?php endwhile; ?>
   			      </div>
				<?php endif; ?>
            </div>
        </div>
       
        <div class="about-coach-list">
            <div class="container">
                <div class="about-coach-flex">
                    <div class="about-coach-header">
                        <div class = "title">Ключевые  жизненные результаты</div>
                    </div>
					
						 <?php if( have_rows('results') ): ?>
                    <div class="about-coach-content">
						<?php $count1 = 1; ?>
						<?php while( have_rows('results') ): the_row(); ?>
                        <div class="about-coach-content-item">
                            <div class = "title">[0<?php echo $count1;?>]</div>
                            <p><?php the_sub_field('text')?></p>
                        </div>
                       <?php $count1++; ?>
						<?php endwhile; ?>
                    </div>
						<?php endif; ?>
                </div>
            </div>
        </div>

        <div class="about-coach-plashka-section">
            <div class="container">
                <div class="about-coach-plashka">
                    <div class="coach-plahska-background">
                        <img src="<?php echo get_template_directory_uri () . '/assets/images/coach/plashka.svg'?>" alt="">
                    </div>
                    <div class="about-coach-plashka-flex">
                        <div class="about-coach-plashka-text">
                            <div class = "title"><?php the_field('what_title')?></div>
                            <p><?php the_field('what_text') ?></p>
                        </div>
                        <div class="about-coach-plashka-image">
                            <img src="<?php the_field('what_image')?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
            
            
        </div>
        <div class="coach-adv">
            <div class="container">
                <div class="coach-adv-flex">
                    <div class="coach-adv-ava">
                        <div class="coach-adv-ava-image">
                            <img src="<?php the_field('image')?>" alt="">
                        </div>
                        <div class="coach-adv-ava-opacity">
                           
                        </div>
                        <div class="coach-adv-ava-content">
                            <div class = "title"><?php the_title();?></div>
                          <div class="coach-adv-ava-content-buttons">
                            <div class="gradient_button start_register">
                                <a href="#">
                                    <p>Подать заявку</p>
                                    <div class="gradient_button_icon">
                                        <svg width="43" height="43" viewBox="0 0 43 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="21.2" cy="21.4969" r="21.2" fill="white"/>
                                            <path d="M18.9948 14.875V16.6417H24.816L14.5781 26.8795L15.8236 28.125L26.0615 17.8872V23.7083H27.8281V14.875H18.9948Z" fill="#8F8F8F"/>
                                            </svg>
                                            
                                    </div>
                                </a>
                            </div>
							  <?php if (get_field('видео_от_наставника')){?>
                            <div class="video-button">
                                <a href="#">
                                    <p>Смотреть видео от наставника</p>
                                    <div class="gradient_button_icon">
                                        <svg width="43" height="43" viewBox="0 0 43 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="21.2" cy="21.4969" r="21.2" fill="white"/>
                                            <path d="M18.9948 14.875V16.6417H24.816L14.5781 26.8795L15.8236 28.125L26.0615 17.8872V23.7083H27.8281V14.875H18.9948Z" fill="#8F8F8F"/>
                                        </svg>
                                    </div>
                                </a>
                            </div>
							  <?php }?>
                          </div>
                        </div>
                    </div>
                    <div class="coach-adv-text">
						 <?php if( have_rows('info') ): ?>
							<?php while( have_rows('info') ): the_row(); ?>
                        <div class="coach-adv-text-item">
                            <div class = "title"><?php the_sub_field('title')?></div>
                            <p><?php the_sub_field('text')?></p>
                        </div>
						<?php endwhile; ?>
                     	<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
     
		<?php get_template_part( 'template-parts/template-expect' );?>
        
		
		<?php get_template_part( 'template-parts/template-format'  , null, array( 'variant' => 'v1' ));?>
       
		<?php get_template_part( 'template-parts/template-faq'  , null, array( 'variant' => 'v2' ));?>
	 
	 
	 	<div class = "coaches_list" style = "width:100%;margin-top:120px;">
			<div class = "container">
				<div class="other-coach-section-header">
                    <div class = "title">Другие наставники проекта</div>
                </div>
				<div class = "coaches_list_flex" >
					<?php
    						$args = array(
        					'post_type' => 'coaches',
        					'posts_per_page' => 3
    						);
    						$loop = new WP_Query($args);
    						while($loop->have_posts()) : $loop->the_post();
							$post_ID = get_the_ID() ?>
							<a href = "<?php echo get_permalink();?>" class="coaches_item" style = "width:32%;">
                                <div class="coach-image">
                                    <img src="<?php the_field('image');?>" alt="">
                                    <div class="coach_tag">
										<?php if (get_field('is_open')){?>
                                        <p>Набор открыт</p>
										<?php }?>
										<?php if(get_field('format') == 'Online'){?>
                                        <p>Online-группа</p>
										<?php }?>
										<?php if(get_field('format') == 'Offline'){?>
                                        <p>Offline-группа</p>
										<?php }?>
                                    </div>
                                </div>
                                <div class="coach_item_container">
                                  
                                    <div class="coach_content">
                                        <div class = "title"><?php the_title();?></div>
                                        <div class="coach_flex">
                                            <div class="coach_flex_item">
                                                <p>Возраст</p>
                                                <p><?php the_field('age')?></p>
                                            </div>
                                            <div class="coach_flex_item">
                                                <p>В бизнесе:</p>
                                                <p><?php the_field('in_bus')?></p>
                                            </div>
                                            <div class="coach_flex_item">
                                                <p>Регион:</p>
                                                <p><?php the_field('region')?></p>
                                            </div>
                                            <div class="coach_flex_item">
                                                <p>Возраст участников:</p>
                                                <p><?php the_field('age_peoples')?></p>
                                            </div>
                                        </div>
                                        <div class="coach_decription">
                                            <div class = "title_h2">Бизнес проекты:</div>
											
											
											<?php if( have_rows('projects') ): ?>
    											<?php while( have_rows('projects') ): the_row(); ?>
        											<p><?php the_sub_field('text'); ?></p>
    											<?php endwhile; ?>
											<?php endif; ?>
											
											
                                        </div>
                                        <div class="coach_button">
                                            <p>Узнать больше</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
						
                       	
							<?php 
							endwhile;
							wp_reset_postdata();
							?>
				</div>
				
					
                      <div class="coaches_list_button">
                        <div class="gradient_button">
                            <a href="/наставники/">
                                <p>Узнать всех наставников</p>
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
	    </div>
       
		<?php get_template_part( 'template-parts/template-easy' );?>
       
		<?php get_template_part('template-parts/template-plaska', null, array( 'variant' => 'want' ) );?>
      
		<?php get_template_part( 'template-parts/template-actual' );?>
      
		<?php get_template_part( 'template-parts/template-smi' );?>
       
		<?php get_template_part( 'template-parts/template-questions' );?>
    </main>
 
<div class = "coach_video_popup">
	<div class = "coach_video_popup_background">
		
	</div>
	<div class = "coach_video_popup_content">
		
		 <video loading="lazy" controls = "control">
				<source src="<?php the_field('видео_от_наставника')?>" type="video/mp4">
		</video>
	</div>
</div>
<?php
get_footer();
