 <div class="section-footer-qr">
            <div class="container">
                <div class="section-footer-qr-plashka">
                    <div class="plashka-content">
                        <div class = "title"><?php the_field('вопросы_заголовок', 'options')?></div>
                        <p><?php the_field('вопросы_текст', 'options')?></p>
                        <a href="https://t.me/pokoleniecare" target = "_blank"><?php the_field('вопросы_кнопка', 'options')?> </a>
                    </div>
                    <div class="plashka-background">
                        <img src= "<?php echo get_template_directory_uri() . '/assets/images/qr-back.svg'?>">
						
                        <img src= "<?php echo get_template_directory_uri() . '/assets/images/adv-back.svg'?>">
                    </div>
					
                    <div class="plashka-background-image">
                        <img src="<?php the_field('вопросы_qr', 'options')?>" alt="">
                    </div>
                </div>
            </div>
        </div>
