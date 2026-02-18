<?php 
/*
Template Name: Контакты
*/
get_header();
?>

   <main> 
        <div class="contact-block">
            <div class="container">
                <div class="contact-header">
                    <h1>Контакты</h1>
                    <p><a href="/">Главная</a> / Контакты</p>
                </div>
                <div class="contact-flex">
                    <div class="contact-flex-item">
                        <div class="contact-background">
                            <img src="<?php echo get_template_directory_uri () . '/assets/images/to_students/main_back.svg'?>" alt="">
                        </div>
						<div class = "title"><?php the_field('заголовок_1')?></div>
                        <?php the_field('текст_1')?>
                            <div class="contact-flex-item-button">
                                <a href="https://t.me/pokoleniecare" target = "_blank">Написать в Telegram</a>
                            </div>
                    </div>
                    <div class="contact-flex-item">
                        <div class="contact-background">
                            <img src="<?php echo get_template_directory_uri () . '/assets/images/parents-back.svg'?>" alt="">
                        </div>
						<div class = "title"><?php the_field('заголовок_2')?></div>
                        <?php the_field('текст_2')?>
                            <div class="contact-flex-item-button">
                                <a href="https://t.me/pokoleniecare" target = "_blank">Написать в Telegram</a>
                            </div>

                    </div>
                    <div class="contact-flex-item">

                        <div class="contact-background">
                            <img src="<?php echo get_template_directory_uri () . '/assets/images/to_students/main_back.svg'?>" alt="">
                        </div>
                        <div class = "title"><?php the_field('заголовок_3')?></div>
                        <?php the_field('текст_3')?>
                            <div class="contact-flex-socials">
								
				<?php if( have_rows('соц_сети', 'options') ): ?>
    				<?php while( have_rows('соц_сети', 'options') ): the_row(); ?>
                                <a href="<?php the_sub_field('ссылка')?>" target = "_blank"><img src="<?php the_sub_field('иконка')?>" alt=""></a>
								
    				<?php endwhile; ?>
				<?php endif; ?>
                            </div>

                    </div>
                    <div class="contact-flex-item">
                        <div class = "title"><?php the_field('заголовок_4')?></div>
                        <?php the_field('реквизиты','options')?>

                    </div>
                </div>
            </div>
        </div>
    </main>
<?php 
get_footer();

