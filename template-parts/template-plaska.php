   
<?php
$variant = ! empty( $args['variant'] ) ? $args['variant'] : 'default';

if ( $variant === 'metric' ) {?>
    

				<?php if( have_rows('плашка_вариант_1','options') ): ?>
    				<?php while( have_rows('плашка_вариант_1','options') ): the_row(); ?>
<div class = "section8">
            <div class="container">
                <div class="section8-content">
                    <div class="section8-background">
                        <img src="<?php echo get_template_directory_uri() . '/assets/images/app-back.svg'?>" alt="">
                    </div>
                    <div class="section8-background-image">
                        <img src="<?php the_sub_field('картинка')?>" alt="">
                    </div>
                    <div class="section8-text">
                        <div class = "title"><?php the_sub_field('заголовок')?></div>
                        <p><?php the_sub_field('текст')?></p>
                        <div class="section8-buttons">
                            <a href = "<?php the_field('телеграм','options')?>" target = "_blank"><?php the_sub_field('кнопка')?></a>
                            <img src = "<?php the_sub_field('qr_код')?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    				<?php endwhile; ?>
				<?php endif; ?>


<?php }
elseif ($variant === 'var3') {?>


				<?php if( have_rows('плашка_вариант_3','options') ): ?>
    				<?php while( have_rows('плашка_вариант_3','options') ): the_row(); ?>
<div class = "section8">
            <div class="container">
                <div class="section8-content">
                    <div class="section8-background">
                        <img src="<?php echo get_template_directory_uri() . '/assets/images/app-back.svg'?>" alt="">
                    </div>
                    <div class="section8-background-image">
                        <img src="<?php the_sub_field('картинка')?>" alt="">
                    </div>
                    <div class="section8-text">
                        <div class = "title"><?php the_sub_field('заголовок')?></div>
                        <p><?php the_sub_field('текст')?></p>
                        <div class="section8-buttons">
                            <a href = "<?php the_field('телеграм','options')?>" target = "_blank"><?php the_sub_field('кнопка')?></a>
                            <img src = "<?php the_sub_field('qr_код')?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    				<?php endwhile; ?>
				<?php endif; ?>



<?php } else {?>



				<?php if( have_rows('плашка_вариант_2','options') ): ?>
    				<?php while( have_rows('плашка_вариант_2','options') ): the_row(); ?>
<div class = "section8">
            <div class="container">
                <div class="section8-content">
                    <div class="section8-background">
                        <img src="<?php echo get_template_directory_uri() . '/assets/images/app-back.svg'?>" alt="">
                    </div>
                    <div class="section8-background-image">
                        <img src="<?php the_sub_field('картинка')?>" alt="">
                    </div>
                    <div class="section8-text">
                        <div class = "title"><?php the_sub_field('заголовок')?></div>
                        <p><?php the_sub_field('текст')?></p>
                        <div class="section8-buttons">
                            <a href = "<?php the_field('телеграм','options')?>" target = "_blank"><?php the_sub_field('кнопка')?></a>
                            <img src = "<?php the_sub_field('qr_код')?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    				<?php endwhile; ?>
				<?php endif; ?>



<?php
			 }
?>
