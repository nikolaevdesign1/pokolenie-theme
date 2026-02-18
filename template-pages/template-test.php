<?php 
/*
Template Name: Шаблон для тестов
*/
get_header();
?>
<main style = "padding-top:30vh;">
 
<?php

	


$variant = ! empty( $args['variant'] ) ? $args['variant'] : 'default';

	$variant = 'v1';
	
if ( $variant === 'v1' ) {?>
  


<div class="section-students-slider">
         <div class="container">
              <div class="section-students-slider-header">
                    <div class = "title"><?php the_field('отзывы_заголовок', 'options')?></div>
                    <a href="/отзывы-от-участников/">Посмотреть отзывы Поколенцев</a>
              </div>
         <div class="section-students-slider-slider">
				<?php $play_count = 0;
						
			$review_counter = 0;	 
			 ?>
					<?php if( have_rows('отзыв', 'options') ): ?>
			 
  						<?php while( have_rows('отзыв','options') ): the_row(); ?>
					
							<?php if (get_sub_field('отзыв_ученика')){?>
					
            					   <div class="slider-item">
                        				<div class="background-image">
                            				<img src = "<?php the_sub_field('фото_превью')?>">
                       			   </div>
                        			<div class = "background-image-active">
                            			<img src = "<?php the_sub_field('главное_фото')?>">
                        </div>
                        <div class="slider-item-content">
                            <div class = "title_h2"><?php the_sub_field('имя')?></div>
                            <p><?php the_sub_field('краткое_описание')?></p>
                        </div>
                        <div class="background-element">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/st-sl-back.svg'?>" alt="">
                        </div>
                        <div class="background-play background-play<?php echo $play_count;?>" data-review="<?php echo $play_count; ?>">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/play-button.svg'?>" alt="">
                        </div>
                    </div>
							
							<?php 
																$play_count ++;	 
																	 }?>
        				<?php endwhile; ?>
 
					<?php endif; ?>
					
					
                 
                   
        </div>
   </div>
</div>


<?php } else {?>



<div class="section-students-slider">
         <div class="container">
              <div class="section-students-slider-header">
                    <div class = "title">Посмотрите видео-отзывы <br> родителей, дети которых уже <br>участвуют в нашем проекте</div>
                    <a href="/отзывы-от-участников/">Посмотреть отзывы от родителей</a>
              </div>
			 
			 
         <div class="section-students-slider-slider">
				<?php $play_count = 0;
						
			$review_counter = 0;	 
			 ?>
					<?php if( have_rows('отзыв', 'options') ): ?>
			 
  						<?php while( have_rows('отзыв','options') ): the_row(); ?>
					
							<?php if (get_sub_field('отзыв_родителя')){?>
					
            					   <div class="slider-item">
                        				<div class="background-image">
                            				<img src = "<?php the_sub_field('фото_превью')?>">
                       			   </div>
                        			<div class = "background-image-active">
                            			<img src = "<?php the_sub_field('главное_фото')?>">
                        </div>
                        <div class="slider-item-content">
                            <div class = "title_h2"><?php the_sub_field('имя')?></div>
                            <p><?php the_sub_field('краткое_описание')?></p>
                        </div>
                        <div class="background-element">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/st-sl-back.svg'?>" alt="">
                        </div>
                        <div class="background-play background-play<?php echo $play_count;?>" style = "display:none;">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/play-button.svg'?>" alt="">
                        </div>
                    </div>
							
							<?php 
																$play_count ++;	 
																	 }?>
        				<?php endwhile; ?>
 
					<?php endif; ?>
					
					
                 
                   
        </div>
   </div>
</div>



<?php }?>







<?php if( have_rows('отзыв', 'options') ): ?>
   <?php while( have_rows('отзыв','options') ): the_row(); ?>
		<?php 
			if (get_sub_field('отзыв_ученика')){?>
			<div class = "popup_review_slider popup_review_slider_counter<?php echo $review_counter;?>" data-review="<?php echo $review_counter; ?>">
				<div class = "popup_review_slider_back"></div>
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

							
		<?php 
											   
			$review_counter ++;
											   }?>
   <?php endwhile; ?>
 
<?php endif; ?>
</main>

<?php 
get_footer();