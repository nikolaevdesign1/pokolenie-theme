<?php 
/*
Template Name: Журнал
*/
get_header();
?>

  <main style = "background-color:#F7F7F7">
        <div class="journal-main-block">
            <div class="container">
                <div class="journal-header">
                    <h1>Журнал Поколения</h1>
                    <p><a href="/">Главная</a> / Журнал Поколения</p>
                </div>
            </div>
        </div>
        <div class="journal-section">
            <div class="container">
                <div class="journal-flex">
                    <div class="journal-sidebar">
						<div class = "journal-sidebar-filter">
							<div class = "title">
								Выбрать категорию
							</div>
						</div>
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
                        <div class="journal-news-container">
							
                            <div class="journal-news-header">
								<?php $category = get_category_by_slug('новости'); 
									$icon_url = get_field('активная_иконка', 'category_' . $category->term_id);

						
								?>
                                <div class = "title"><?php 
									// выводим
if ($icon_url) {
    echo '<img src="' . esc_url($icon_url) . '" alt="Новости" />';
}
		
									
									?>Новости</div>
                            </div>
                            <div class="journal-news-list">
								
  							<?php
  							// Запрос записей из рубрики "новости"
  							$args = array(
    						'post_type'      => 'post',
    						'posts_per_page' => 10, // сколько выводить
    						'category_name'  => 'новости', // слаг рубрики!
  							);
								$news_query = new WP_Query($args);

  if ($news_query->have_posts()) :
    while ($news_query->have_posts()) : $news_query->the_post(); 
      ?>
                                <div class="journal-news-item">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?>
                                        <br><span><?php echo get_the_date()?></span></a>
                                </div>
								
                                <?php endwhile;
								
  								else :
    							echo '<p>Пока нет новостей.</p>';
  							endif;

 							 wp_reset_postdata();
 
								
								?>
								<div class = "show_more_news">
									<a href= "http://pokolenie.info/category/%d0%bd%d0%be%d0%b2%d0%be%d1%81%d1%82%d0%b8/">Показать еще</a>
								</div>
                            </div>
							
                        </div>
                        <div class="journal-cases">
                            <div class="journal-cases-header">
                                <div class = "title">Кейсы участников</div>
                                <a href="/кейсы/">Смотреть все</a>
                            </div>
							
							<?php
$query = new WP_Query( array(
	
    'post_type'      => 'cases',
    'posts_per_page' => 1,
    'post_status'    => 'publish'
) );

if( $query->have_posts() ) :
    while( $query->have_posts() ) : $query->the_post(); ?>
        
                            <div class="journal-cases-plashka">
                                <div class="journal-cases-plashka-back">
                                    <img src="<?php echo get_template_directory_uri() . '/assets/images/qr-back.svg'?>" alt="">
                                </div>
                                <div class="journal-cases-plashka-flex">
                                    <div class="journal-cases-plashka-text">
                                        <div class = "title"><?php the_field('описание') ?></div>
                                        <p><?php the_field('наставник') ?></p>
                                        <a href="<?php the_field('ссылка_на_кейс')?>">Узнать больше</a>
                                    </div>
                                    <div class="journal-cases-plashka-image">
                                			<?php the_post_thumbnail(); ?>
                                    </div>
                                </div>
                            </div>
							
							  <?php endwhile;
    wp_reset_postdata();
endif;
?>
							
                        </div>
						
						
                        <div class="journal-news-line">
							
							<?php
$query = new WP_Query( array(
	
    'post_type'      => 'cases',
    'posts_per_page' => 2,
    'post_status'    => 'publish',
    'offset'         => 1, 
) );

if( $query->have_posts() ) :
    while( $query->have_posts() ) : $query->the_post(); ?>
        
                            <a href = "<?php the_field('ссылка_на_кейс')?>" class="journal-news-line-item">
                               <?php the_post_thumbnail(); ?>
                                <p><?php the_field('описание') ?></p>
                                <div class = "title"><?php the_field('наставник') ?></div>
                                <p class = "journal_show_more">Узнать больше</p>
                            </a>
                           
                            			  <?php endwhile;
    wp_reset_postdata();
endif;
?>
		
                        </div>
                        <div class="journal-materials">
                            <div class="journal-materials-header">
                                <div class = "title">Полезные материалы</div>
                            </div>
                            <div class="journal-materials-slider">
								
								<?php
$query = new WP_Query( array(
	
    'post_type'      => 'material',
    'posts_per_page' => 30,
    'post_status'    => 'publish',
) );

if( $query->have_posts() ) :
    while( $query->have_posts() ) : $query->the_post(); ?>
								
                                <a href = "<?php the_field('ссылка_на_кейс')?>" class="journal-materials-slider-item">
                                    <?php the_post_thumbnail(); ?>
                                    <div class = "title"><?php the_field('описание')?> </div>
                                </a>
                             
								
                            			  <?php endwhile;
    wp_reset_postdata();
endif;
?>
								
                            </div>
                          
                        </div>
                        <div class="journal-universials">
								<?php
$query = new WP_Query( array(
	
    'post_type'      => 'post',
    'posts_per_page' => 8,
    'post_status'    => 'publish',
	'cat' => 4
) );

if( $query->have_posts() ) :
    while( $query->have_posts() ) : $query->the_post(); ?>
                            <a href = "<?php echo get_permalink();?>" class="journal-universial-item">
								
							
								
                                <div class="journal-universial-item-image">
                                  <img src="<?php the_field('изображение_новости')?>" alt="">
                                </div>
                                <div class="journal-universal-item-tags">
                                    <div class = "title">Планирование</div>
                                    <p><?php echo get_the_date(); ?></p>
                                </div>
                                <div class="journal-universal-item-content">
                                    <div class = "title"><?php the_title();?></div>
                                    <p>Автор: Поколение</p>
                                </div>
                            </a>
                         	  <?php endwhile;
    wp_reset_postdata();
endif;
?>
                          
                            
                            
                        </div>
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
                                        <a href="<?php the_field('телеграм', 'options')?>">Перейти в Telegram</a>
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

