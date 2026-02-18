<?php 
/*
Template Name: Верхний журнал
*/
get_header();
?>

   
						  <?php $type = get_field('что_выводим');
						   
							if($type == 'Кейсы'){
								$type_cat = 'cases';
							}
							elseif ($type == 'Эфиры'){
								$type_cat = 'live';
							}
							elseif ($type == "Полезное"){
								$type_cat = 'material';
							}
							else{
								$type_cat = 'smi';
							}
						   
						   ?>




  <main style = "background-color:#F7F7F7">
        <div class="journal-main-block">
            <div class="container">
                <div class="journal-header">
                    <div class = "title">Журнал Поколения</div>
                    <p><a href="/">Главная</a> / <a href="/журнал/">Журнал Поколения</a> / <?php the_title();?> </p>
                </div>
            </div>
        </div>
        <div class="journal-section">
            <div class="container">
                <div class="journal-flex">
                    <div class="journal-sidebar">
                        <div class="journal-big-cat">
                             <ul>
                                <li>
  <a href="/кейсы/" <?php if($type == 'Кейсы'){ echo 'class="active"'; } ?>>
    <img src="<?php echo get_template_directory_uri() . '/assets/images/journal/i1' . ($type == 'Кейсы' ? '-a' : '') . '.svg'; ?>" alt="">
    Кейсы участников
  </a>
</li>

<li>
  <a href="/эфиры/" <?php if($type == 'Эфиры'){ echo 'class="active"'; } ?>>
    <img src="<?php echo get_template_directory_uri() . '/assets/images/journal/i2' . ($type == 'Эфиры' ? '-a' : '') . '.svg'; ?>" alt="">
    Эфиры
  </a>
</li>

<li>
  <a href="/полезные-материалы/" <?php if($type == 'Полезное'){ echo 'class="active"'; } ?>>
    <img src="<?php echo get_template_directory_uri() . '/assets/images/journal/i3' . ($type == 'Полезное' ? '-a' : '') . '.svg'; ?>" alt="">
    Полезные материалы
  </a>
</li>

<li>
  <a href="/сми-о-нас/" <?php if($type == 'СМИ'){ echo 'class="active"'; } ?>>
    <img src="<?php echo get_template_directory_uri() . '/assets/images/journal/i4' . ($type == 'СМИ' ? '-a' : '') . '.svg'; ?>" alt="">
    СМИ о нас
  </a>
</li>
                            </ul>
                        </div>
                        <div class="journal-small-cat">
                            <div class="journal-small-cat-header">
                                <div class = "title">Категории журнала</div>
                            </div>
                            <div class="journal-small-cat-list">
                             <?php
								
								$current_cat = get_queried_object(); // текущая рубрика
								$categories = get_categories( array(
    							'hide_empty' => true, // показываем только рубрики с записями
								) );

								if ( $categories ) {
    echo '<ul class="journal-cats">';
    
    foreach ( $categories as $category ) {
       $icon_url  = get_field('иконка_рубрики', 'category_' . $category->term_id);
        $term_link = get_category_link( $category->term_id );

        // проверяем: активна ли эта рубрика
        $active_class = ( $current_cat && $current_cat->term_id === $category->term_id ) ? ' class="active"' : '';

        echo '<li' . $active_class . '>';
        echo '<a href="' . esc_url( $term_link ) . '">';
        
        if ( $icon_url ) {
            echo '<img src="' . esc_url( $icon_url ) . '" alt="' . esc_attr( $category->name ) . '">';
        }

        echo esc_html( $category->name );
        echo '</a>';
        echo '</li>';
    }
    
    echo '</ul>';
}
?>
                            </div>
                        </div>
                        <div class="journal-ads-tg">
                            <div class="journal-ads-tg-header">
                                <div class = "title">Еще больше новостей</div>
                                <p>Подпишись на наш Telegram-канал, чтобы первым узнавать все новости</p>
                            </div>
                            <div class="journal-ads-tg-content">
                                <img src="<?php echo get_template_directory_uri() . '/assets/images/journal/tg-image.png'?>" alt="">
                                <a href="<?php the_field('телеграм','option')?>" target = "_blank">Перейти в Telegram</a>
                            </div>
                        </div>
                    </div>
                   
					
					
					
					
					
					
					
					
					   <div class="journal-content">
                        <div class="journal-content-main-section">
                            <div class="journal-content-main-section-back">
                                <img src="<?php echo get_template_directory_uri() . '/assets/images/journal/main-sect-back.svg'?>" alt="">
                            </div>
                            <div class="journal-content-main-section-flex">
                                <div class="journal-content-main-section-content">
                                    <div class = "title"><?php the_field('заголовок')?></div>
									
                                    <p><?php the_field('текст') ?></p>
                                </div>
                                <div class="journal-content-main-section-image">
                                    <img src="<?php the_field('картинка') ?>" alt="">
                                </div>
                            </div>
                        </div>
						   
						   
						<?php if ( $type_cat == 'cases' ) { ?>
    <div class="journal-cases-section">
        <?php
        $args = array(
            'post_type'      => $type_cat,
            'posts_per_page' => 50,
        );
        $news_query = new WP_Query($args);

        if ($news_query->have_posts()) :
            while ($news_query->have_posts()) : $news_query->the_post(); ?>
                <a href="<?php the_field('ссылка_на_кейс'); ?>" class="journal-cases-section-item" target = "_blank">
                    <?php the_post_thumbnail(); ?>
                    <div class = "title"><?php the_field('описание'); ?></div>
                    <div class = "title_h2"><?php the_field('наставник'); ?></div>
                    <p>Узнать больше</p>
                </a>
            <?php endwhile;
        else :
            echo '<p>Пока нет новостей.</p>';
        endif;

        wp_reset_postdata();
        ?>
    </div>

<?php } elseif ( $type_cat == 'live' ) { ?>
    <div class="journal-universials">
        <?php
        $args = array(
            'post_type'      => $type_cat,
            'posts_per_page' => 50,
        );
        $news_query = new WP_Query($args);

        if ($news_query->have_posts()) :
            while ($news_query->have_posts()) : $news_query->the_post(); ?>
                <a href="<?php the_field('ссылка_на_кейс'); ?>" class="journal-universial-item"  target = "_blank">
                    <div class="journal-universial-item-image">
                        <?php the_post_thumbnail(); ?>
                    </div>
                    <div class="journal-universal-item-tags">
                        <div class = "title">Эфиры</div>
                        <p><?php echo get_the_date(); ?></p>
                    </div>
                    <div class="journal-universal-item-content">
                        <div class = "title"><?php the_field('описание'); ?></div>
                        <p>Автор: Поколение</p>
                    </div>
                </a>
            <?php endwhile;
        else :
            echo '<p>Пока нет эфиров.</p>';
        endif;

        wp_reset_postdata();
        ?>
    </div>
<?php } 
						   
						   else{
						   ?>
						   
						       <div class="journal-universials">
        <?php
        $args = array(
            'post_type'      => $type_cat,
            'posts_per_page' => 50,
        );
        $news_query = new WP_Query($args);

        if ($news_query->have_posts()) :
            while ($news_query->have_posts()) : $news_query->the_post(); ?>
                <a href="<?php the_field('ссылка_на_кейс'); ?>" class="journal-universial-item"  target = "_blank">
                    <div class="journal-universial-item-image">
                        <?php the_post_thumbnail(); ?>
                    </div>
                  
                    <div class="journal-universal-item-content">
                        <div class = "title"><?php the_field('описание'); ?></div>
                        <p class = "p_button">Узнать больше</p>
                    </div>
                </a>
            <?php endwhile;
        else :
            echo '<p>Пока нет эфиров.</p>';
        endif;

        wp_reset_postdata();
        ?>
    </div>
						   
						   <?php }?>
						      <div class="journal-footer">
                            <div class="journal-footer-background">
                                <img src = "<?php echo get_template_directory_uri() . '/assets/images/app-back.svg'?>">
                            </div>
                            <div class="journal-footer-image">
                                <img src="<?php echo get_template_directory_uri() . '/assets/images/journal/phone.png'?>" alt="">
                           	<img src="<?php echo get_template_directory_uri() . '/assets/images/journal/mobile-phone-big.png'?>" alt="">
								  </div>
                            <div class="journal-footer-content">
								<div class = "title">Хочешь еще больше узнать о нашем проекте? </div>
                                <p>Подпишись на наш Telegram-канал, где мы делаем прямые эфиры 
                                    с предпринимателями, медийными личностями и экспертами 
                                    в своих областях. Публикуем полезные материалы и анонсируем набор в группы новых наставников </p>
                                    <div class="journal-footer-flex">
                                        <a href="<?php the_field('телеграм', 'option')?>" target = "_blank">Перейти в Telegram</a>
                                        <img src="<?php echo get_template_directory_uri() . '/assets/images/journal/qr.svg'?>" alt="">
                                    </div>
                            </div>
                        </div>
						   
                </div>
					
					
					
					
					
					
					
					
					
					
                </div>
            </div>
        </div>
    </main>
<?php 
get_footer();

