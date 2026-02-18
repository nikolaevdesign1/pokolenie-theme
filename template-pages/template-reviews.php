<?php 
/*
Template Name: Отзывы
*/
get_header();
?>




     <main>
        <div class="testimonials-main">
            <div class="container">
                <div class="testimonials-header">
                    <h1><?php the_field('заголовок_страницы')?></h1>
                    <p><a href="/">Главная</a> / Отзывы от участников</p>
                </div>
                <div class="testimonials-flex">
                    <div class="test-sidebar">
                        <div class="test-sidebar-header">
                            <div class = "title">От кого вы хотите увидеть отзыв</div>
                        </div>
                        <div class="test-siderbar-menu">
                            <a href="/отзывы-от-участников/">
								<div class = "reviews-sidebar-background">
									
								</div>
                                <img src="<?php the_field('изображение_категории', 85)?>" alt="">
                                <p>От участников</p>
                            </a>
                            <a href="/отзывы-от-родителей/">
								<div class = "reviews-sidebar-background">
									
								</div>
                                <img src="<?php the_field('изображение_категории', 87)?>" alt="">
                                <p>От родителей</p>
                            </a>
                        </div>
                    </div>
					
					
					
					
                    <div class="testimonials-items">
                        <div class="testimonials-items-header">
                            <div class = "title"><?php the_title();?></div>
                        </div>
						
						
						<?php if(get_field('вывести_отзывы') == 'Родители'){?>
                        <div class="testimonials-items-flex">
							
				<?php if( have_rows('отзыв', 'option') ): ?>
							<?php $review = 0;?>
    				<?php while( have_rows('отзыв', 'option') ): the_row(); ?>
                            <?php if (get_sub_field('отзыв_родителя')){?>
							<div class = "testimonials-item-popup popup_counter popup_counter<?php echo $review?>">
									<div class = "testimonials-item-popup-background"></div>
								<?php if(get_sub_field('видеофайл')){?>
   
								<video preload="auto"  loading="lazy" controls = "">
										<source src="<?php the_sub_field('видеофайл')?>" type="video/mp4">
								</video>
								<?php }
								else{
								?>
								<img src = "<?php the_sub_field('фотоотзыв')?>" alt = "">
								
								<?php }?>
							</div>
							
							<div class="testimonials-items-item item_counter item_counter<?php echo $review?>">
								
								<?php if(get_sub_field('видеофайл')){?>
                                <div class = "review_background_video">
									<svg width="75" height="76" viewBox="0 0 75 76" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M37.5 0.5C57.9283 0.5 74.5 17.2831 74.5 38C74.5 58.7169 57.9283 75.5 37.5 75.5C17.0717 75.5 0.5 58.7169 0.5 38C0.5 17.2831 17.0717 0.5 37.5 0.5Z" fill="white" stroke="#E6E6E6"/>
<path d="M52.786 36.7447C54.1745 37.503 54.1745 39.497 52.786 40.2553L31.2086 52.0396C29.8759 52.7675 28.25 51.8029 28.25 50.2843L28.25 26.7157C28.25 25.1971 29.8759 24.2325 31.2086 24.9604L52.786 36.7447Z" fill="url(#paint0_linear_110_85139)"/>
<defs>
<linearGradient id="paint0_linear_110_85139" x1="84.2736" y1="40.0167" x2="59.7668" y2="-1.38218" gradientUnits="userSpaceOnUse">
<stop stop-color="#FF7A40"/>
<stop offset="0.988999" stop-color="#FF4E00"/>
</linearGradient>
</defs>
</svg>

								</div> 
								<video preload="auto" playsinline=""  loading="lazy">
										<source src="<?php the_sub_field('видеофайл')?>" type="video/mp4">
								</video>
								<?php }
								else{
								?>
								<img src = "<?php the_sub_field('фотоотзыв')?>" alt = "">
								
								<?php }?>
                            </div>
							
							<?php }?>
                         
							<?php $review ++;?>
					<?php endwhile; ?>
				<?php endif; ?>
                        </div>
						<?php }
						
						else{?>
							
						 <div class="testimonials-items-flex">
							
				<?php if( have_rows('отзыв', 'option') ): ?>
							<?php $review = 0;?>
    				<?php while( have_rows('отзыв', 'option') ): the_row(); ?>
                            <?php if (get_sub_field('отзыв_родителя')){?>
							<div class = "testimonials-item-popup popup_counter popup_counter<?php echo $review?>">
									<div class = "testimonials-item-popup-background"></div>
								<?php if(get_sub_field('видеофайл')){?>
   
								<video preload="auto"  loading="lazy" controls = "">
										<source src="<?php the_sub_field('видеофайл')?>" type="video/mp4">
								</video>
								<?php }
								else{
								?>
								<img src = "<?php the_sub_field('фотоотзыв')?>" alt = "">
								
								<?php }?>
							</div>
							
							<div class="testimonials-items-item item_counter item_counter<?php echo $review?>">
								
								<?php if(get_sub_field('видеофайл')){?>
                                <div class = "review_background_video">
									<svg width="75" height="76" viewBox="0 0 75 76" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M37.5 0.5C57.9283 0.5 74.5 17.2831 74.5 38C74.5 58.7169 57.9283 75.5 37.5 75.5C17.0717 75.5 0.5 58.7169 0.5 38C0.5 17.2831 17.0717 0.5 37.5 0.5Z" fill="white" stroke="#E6E6E6"/>
<path d="M52.786 36.7447C54.1745 37.503 54.1745 39.497 52.786 40.2553L31.2086 52.0396C29.8759 52.7675 28.25 51.8029 28.25 50.2843L28.25 26.7157C28.25 25.1971 29.8759 24.2325 31.2086 24.9604L52.786 36.7447Z" fill="url(#paint0_linear_110_85139)"/>
<defs>
<linearGradient id="paint0_linear_110_85139" x1="84.2736" y1="40.0167" x2="59.7668" y2="-1.38218" gradientUnits="userSpaceOnUse">
<stop stop-color="#FF7A40"/>
<stop offset="0.988999" stop-color="#FF4E00"/>
</linearGradient>
</defs>
</svg>

								</div> 
								<video preload="auto" playsinline=""  loading="lazy">
										<source src="<?php the_sub_field('видеофайл')?>" type="video/mp4">
								</video>
								<?php }
								else{
								?>
								<img src = "<?php the_sub_field('фотоотзыв')?>" alt = "">
								
								<?php }?>
                            </div>
							
							<?php }?>
                         
							<?php $review ++;?>
					<?php endwhile; ?>
				<?php endif; ?>
                        </div>
						
							
							
							<?php 
						}
						
						?>
                    </div>
					
					
					
                </div>
            </div>
        </div>
		 
		 
		 
		 
        <div class="section9 students-section">
            <div class="container">
                <div class="students-section-header">
                    <div class = "title">Они уже реализовали свои цели в жизнь</div>
                    <a href="/кейсы/">Узнать об успехе Поколенцев</a>
                </div>
              
				<?php get_template_part( 'template-parts/template-cases' );?>
            </div>
        </div>
      
		<?php get_template_part('template-parts/template-plaska', null, array( 'variant' => 'metric' ) );?>
		 
 
		<?php get_template_part( 'template-parts/template-actual' );?>
       
		<?php get_template_part( 'template-parts/template-smi' );?>
    
		<?php get_template_part( 'template-parts/template-questions' );?>

     </main>
<?php 
get_footer();

