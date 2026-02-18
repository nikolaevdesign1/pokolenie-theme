<?php get_header();?>


<main style = "background-color:#F7F7F7">
        <div class="journal-main-block">
            <div class="container">
                <div class="journal-header">
                    <div class = "title">Журнал Поколения</div>
                    <p><a href="/">Главная</a> / <a href = "/журнал/">Журнал Поколения</a> / <?php single_cat_title(); ?></p>
                </div>
            </div>
        </div>
        <div class="journal-section">
            <div class="container">
                <div class="journal-flex">
                    <div class="journal-sidebar">
                        <div class="journal-big-cat">
                            <ul>
                                <li><a href="/кейсы/"><img src="<?php echo get_template_directory_uri (). '/assets/images/journal/i1.svg'?>" alt="">Кейсы участников</a></li>
                                <li><a href="/эфиры/"><img src="<?php echo get_template_directory_uri (). '/assets/images/journal/i2.svg'?>" alt="">Эфиры</a></li>
                                <li><a href="/полезные-материалы/"><img src="<?php echo get_template_directory_uri (). '/assets/images/journal/i3.svg'?>" alt="">Полезные материалы</a></li>
                                <li><a href="/сми-о-нас/"><img src="<?php echo get_template_directory_uri (). '/assets/images/journal/i4.svg'?>" alt="">СМИ о нас</a></li>
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
    'hide_empty' => true,
) );

if ( $categories ) {
    echo '<ul class="journal-cats">';
    
    foreach ( $categories as $category ) {
        // Иконки из ACF
        $icon_default = get_field('иконка_рубрики', 'category_' . $category->term_id);
        $icon_active  = get_field('активная_иконка', 'category_' . $category->term_id);

        // Ссылка на рубрику
        $term_link = get_category_link( $category->term_id );

        // Проверяем: активна ли рубрика
        $is_active = ( $current_cat && $current_cat->term_id === $category->term_id );

        // Класс + выбор иконки
        $active_class = $is_active ? ' class="active"' : '';
        $icon_url     = ($is_active && $icon_active) ? $icon_active : $icon_default;

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
                                <a href="<?php the_field('телеграм', 'options')?>" target = "_blank">Перейти в Telegram</a>
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
                                    <div class = "title"><?php single_cat_title(); ?></div>
									<?php 
									
									$current_cat_category = get_queried_object(); // текущая рубрика
									$desc = get_field('описание_рубрики', 'category_' . $current_cat_category->term_id);
									$image = get_field('картинка_рубрики', 'category_' . $current_cat_category->term_id);
						
								?>
                                    <p><?php echo $desc; ?></p>
                                </div>
                                <div class="journal-content-main-section-image">
                                    <img src="<?php echo $image; ?>" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="journal-universials">
							
							<?php
  							// Запрос записей из рубрики "новости"
  							$args = array(
    						'post_type'      => 'post',
    						'posts_per_page' => '50', // сколько выводить
    						'cat'            => $current_cat->term_id, // ключ!
  							);
								$news_query = new WP_Query($args);

  if ($news_query->have_posts()) :
    while ($news_query->have_posts()) : $news_query->the_post(); 
      ?>
							
							
                            <a href = "<?php echo get_permalink();?>" class="journal-universial-item">
                                <div class="journal-universial-item-image">
                                    <img src="<?php the_field('изображение_новости')?>" alt="">
                                </div>
                                <div class="journal-universal-item-tags">
                                    <?php
$categories = get_the_category();
if ( ! empty( $categories ) ) {
    echo '<div class = "title post-cat">' . esc_html( $categories[0]->name ) . '</div>';
}
?>
                                    <p><?php echo get_the_date(); ?></p>
                                </div>
                                <div class="journal-universal-item-content">
                                    <div class = "title"><?php the_title();?></div>
                                    <p>Автор: Поколение</p>
                                </div>
                            </a>
                        
                        
						  <?php endwhile;
								
  								else :
    							echo '<p>Пока нет новостей.</p>';
  							endif;

 							 wp_reset_postdata();
 
								
								?>	
							
							
							
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
                                        <a href="<?php the_field('телеграм', 'option')?>" target = "_blank">Написать в tg-канал</a>
                                        <img src="<?php echo get_template_directory_uri() . '/assets/images/journal/qr.svg'?>" alt="">
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php get_footer();