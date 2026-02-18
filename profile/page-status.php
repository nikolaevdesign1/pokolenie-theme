<?php
/* Template Name: Статус */
get_header('person');

if ( ! is_user_logged_in() ) {
    echo '<p>Вы не авторизованы</p>';
} else {?>



	<?php 


	
$user_id = get_current_user_id();
$status = get_field('status', 'user_' . $user_id);
?>

<main>

    <div class="personal-main-section">
        <div class="container">
            <div class="personal-header">
                <div class = "title">Личный кабинет</div>
            </div>
            
            <div class="personal-flex">
                <div class="personal-sidebar">
                    <div class="personal-sidebar-container">
                        <div class = "title">Анкета участника</div>
                        <ul>
                            <li><a href="/профиль/"><img src="<?php echo get_template_directory_uri() . '/assets/images/acc/i1.svg'?>" alt="">Контактные данные</a></li>
                            <li><a href="/бриф/"><img src="<?php echo get_template_directory_uri() . '/assets/images/acc/i2.svg'?>" alt="">Регистрация к наставнику</a></li>
                        </ul>
                        <div class = "title">Статус</div>
                        <ul>
                            <li  class = "active"><a href="/статус/"><img src="<?php echo get_template_directory_uri() . '/assets/images/acc/i3-a.svg'?>" alt="">Отследить статус заявки</a></li>
                        </ul>

                        <div class="pesronal-sidebar-button">
                            <a href="<?php the_field('телеграм', 'options')?>" target = "_blank">Перейти в Telegram канал</a>
                        </div>
                    </div>
                </div>
				<div class="personal-admin">
                    <div class="status-admin-container">
                        <div class="status-admin-container-text">
                            <div class = "title">Статус вашей заявки</div>
                            <p><?php echo $status?></p>
                        </div>
                        <div class="status-admin-container-image">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/acc/status-pic.png'?>" alt="">
                        </div>
                    </div>
                </div>
				
				
             
            </div>
            


        </div>
    </div>

    <div class="section-footer-qr">
        <div class="container">
            <div class="section-footer-qr-plashka">
                <div class="plashka-content">
                    <div class = "title">Возникли вопросы?</div>
                    <p>Наша служба заботы с удовольствием ответит 
                        на них и расскажет больше о нашем проекте</p>
                    <a href="#">Написать </a>
                </div>
                <div class="plashka-background">
                    <img src= "<?php echo get_template_directory_uri() . '/assets/images/qr-back.svg'?>">
                </div>
                <div class="plashka-background-image">
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/big-qr.svg'?>" alt="">
                </div>
            </div>
        </div>
    </div>
</main>
	
<div class = "bottom_mobile_menu">
	 <ul>
         <li><a href="/профиль/"><img src="<?php echo get_template_directory_uri() . '/assets/images/acc/i1.svg'?>" alt="">Контактные данные</a></li>
         <li><a href="/бриф/"><img src="<?php echo get_template_directory_uri() . '/assets/images/acc/i2.svg'?>" alt="">Регистрация к наставнику</a></li>
         <li><a href="/статус/" class = "active"><img src="<?php echo get_template_directory_uri() . '/assets/images/acc/i3-a.svg'?>" alt="">Отследить статус заявки</a></li>
     </ul>
</div>


<?php }?>
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
                <a href="https://pokolenie.info/privacy-policy/" target = "_blank">Политика конфиденциальности</a>
                <a href="https://pokolenie.info/reglament/" target = "_blank">Регламент порядка работы АНО «Поколение»</a>
            </div>

        </div>
    </footer>
    


		<?php get_template_part( 'template-parts/template-user');?>




    <script src = "https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src = "<?php echo get_template_directory_uri() . '/assets/js/slick.min.js'?>"></script>

	<script src="https://cdn.jsdelivr.net/npm/inputmask@5.0.8/dist/jquery.inputmask.min.js"></script>
    <script src = "<?php echo get_template_directory_uri() . '/assets/js/account.js'?>"></script>
<?php wp_footer(); ?>

</body>
</html>

