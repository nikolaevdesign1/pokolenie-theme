<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pokolenie
 */

?>




    <footer>
        <div class="container">
            <div class="footer-flex">
                <div class="footer_logo">
                    <a href = "/"><img src = "<?php the_field('логотип_подвал', 'options')?>"></a>
                    <p>Помогаем предпринимателям выделить главное и масштабировать бизнес быстрее</p>
                    <div class="footer_social">
						<?php if( have_rows('соц_сети', 'option') ): ?>
    						<?php while( have_rows('соц_сети', 'option') ): the_row(); ?>
        						 <a href="<?php the_sub_field('ссылка')?>"><img src="<?php the_sub_field('иконка')?>" alt=""></a>
    						<?php endwhile; ?>
						<?php endif; ?>
                       
                       
                    </div>
                </div>
                <div class="footer_info">
                    <div class = "title">Меню</div>
                    <ul>
						<?php if( have_rows('меню_подвал', 'option') ): ?>
    						<?php while( have_rows('меню_подвал', 'option') ): the_row(); ?>
        						 <li><a href = "<?php the_sub_field('ссылка')?>"><?php the_sub_field('название_пункта')?></a></li>
    						<?php endwhile; ?>
						<?php endif; ?>
                       
                    
                    </ul>
                    <div class = "title">Реквизиты</div>
                    <p><?php the_field('реквизиты', 'options')?></p>
                </div>
                <div class="footer_buttons">
                    <a class = "start_register">Личный кабинет</a>
                    <a href="https://t.me/pokoleniecare" target = "_blank">Служба заботы</a>
                </div>
            </div>
            <div class="footer_sub">
                <a href="https://pokolenie.info/privacy-policy/">Политика конфиденциальности</a>
                <a href="https://pokolenie.info/reglament/">Регламент порядка работы АНО «Поколение»</a>
            </div>

        </div>
    </footer>
    


		<?php get_template_part( 'template-parts/template-user');?>


		<?php get_template_part( 'template-parts/quiz');?>


    <script src = "https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src = "<?php echo get_template_directory_uri() . '/assets/js/slick.min.js'?>"></script>
    <script src = "<?php echo get_template_directory_uri() . '/assets/js/register.js'?>"></script>



<?php wp_footer(); ?>

</body>
</html>

