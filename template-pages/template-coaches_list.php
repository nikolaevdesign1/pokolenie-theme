<?php 
/*
Template Name: Список наставников
*/
get_header();
?>
  <main>
        <div class = "section-coaches sections-coaches-page" style = "padding-top:150px">
            <div class="container">
                <div class="coahes_header">
                    <h1>Предприниматели, которые могут стать твоими наставниками</h1>
                </div>
                <div class="coaches_catalog">
                         <div class="coaches_sidebar">
                       
                        <div class="coaches-filter">
                            <div class = "title">Фильтры по наставникам</div>
               				
							
							<?php
$coaches = get_posts([
    'post_type'      => 'coaches',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
]);

$cities  = [];
$sets    = [];
$ages    = [];
$formats = [];

if ($coaches) {
    foreach ($coaches as $coach) {
        $cities[]  = get_post_meta($coach->ID, 'region', true);
        $sets[]    = get_post_meta($coach->ID, 'is_open', true);
        $formats[] = get_post_meta($coach->ID, 'format', true);

        $age_field = get_post_meta($coach->ID, 'age_peoples', true);
        if ($age_field) {
            // Нормализируем разные типы дефисов и убираем лишние пробелы вокруг запятых
            $age_field = str_replace(["\xC2\xA0", "\u{00A0}"], ' ', $age_field); // NBSP -> space
            $age_field = preg_replace('/[–—−]/u', '-', $age_field); // разные тире -> дефис
            $age_field = trim($age_field);

            // Разбиваем по запятым/точкам с запятой (если несколько диапазонов/значений перечислены)
            $parts = preg_split('/[;,]+/', $age_field);

            foreach ($parts as $part) {
                $part = trim($part);
                if ($part === '') {
                    continue;
                }

                // находим все числа в части
                if (preg_match_all('/\d+/', $part, $m)) {
                    $nums = $m[0];

                    if (count($nums) >= 2) {
                        // берем первый и последний как диапазон (например "16-18" или "от 16 до 18")
                        $min = (int)$nums[0];
                        $max = (int)$nums[count($nums) - 1];
                        if ($min > $max) {
                            // перестановка на случай неверного порядка
                            $tmp = $min;
                            $min = $max;
                            $max = $tmp;
                        }
                        for ($i = $min; $i <= $max; $i++) {
                            $ages[] = (int)$i;
                        }
                    } else {
                        // одиночное число: просто добавляем
                        $ages[] = (int)$nums[0];
                    }
                }
            }
        }
    }

    // удаляем пустые, уникализируем и сортируем
    $cities  = array_unique(array_filter($cities));
    $sets    = array_unique(array_filter($sets));
    $formats = array_unique(array_filter($formats));
    $ages    = array_unique(array_filter($ages));
    sort($ages, SORT_NUMERIC);
}
?>

<div class="coaches_filter_form">
  <div class="select-wrapper">
    <label>Набор</label>
    <select id="real-select" name="is_open" style="display:none;">
      <option value="">Все</option>
      <?php foreach ($sets as $set): ?>
        <option value="<?php echo esc_attr($set); ?>"><?php echo esc_html($set); ?></option>
      <?php endforeach; ?>
    </select>

    <div class="custom-select">
      <div class="select-trigger">Не важно</div>
      <ul class="options">
        <li data-value="">Не важно</li>
        <?php foreach ($sets as $set): ?>
          <li data-value="<?php echo esc_attr($set); ?>"><?php echo esc_html($set); ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>

  <div class="select-wrapper">
    <label>Город</label>
    <select id="real-select2" name="region" style="display:none;">
      <option value="">Все</option>
      <?php foreach ($cities as $city): ?>
        <option value="<?php echo esc_attr($city); ?>"><?php echo esc_html($city); ?></option>
      <?php endforeach; ?>
    </select>

    <div class="custom-select">
      <div class="select-trigger">Любой</div>
      <ul class="options">
        <li data-value="">Любой</li>
        <?php foreach ($cities as $city): ?>
          <li data-value="<?php echo esc_attr($city); ?>"><?php echo esc_html($city); ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>

  <div class="select-wrapper">
    <label>Возраст участников</label>
    <select id="real-select3" name="age_peoples" style="display:none;">
      <option value="">Все</option>
      <?php foreach ($ages as $age): ?>
        <option value="<?php echo esc_attr($age); ?>"><?php echo esc_html($age . ' лет'); ?></option>
      <?php endforeach; ?>
    </select>

    <div class="custom-select">
      <div class="select-trigger">Любой</div>
      <ul class="options">
        <li data-value="">Любой</li>
        <?php foreach ($ages as $age): ?>
          <li data-value="<?php echo esc_attr($age); ?>"><?php echo esc_html($age . ' лет'); ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>

  <div class="select-wrapper">
    <label>Формат участия</label>
    <select id="real-select4" name="format" style="display:none;">
      <option value="">Все</option>
      <?php foreach ($formats as $format): ?>
        <option value="<?php echo esc_attr($format); ?>"><?php echo esc_html($format); ?></option>
      <?php endforeach; ?>
    </select>

    <div class="custom-select">
      <div class="select-trigger">Любой</div>
      <ul class="options">
        <li data-value="">Любой</li>
        <?php foreach ($formats as $format): ?>
          <li data-value="<?php echo esc_attr($format); ?>"><?php echo esc_html($format); ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>

  <button type="button" class="apply-filters">Применить</button>
</div>
							
							
							
							
							
							
							
							
                        </div>
							 
							 
							 
							 
                    </div>
                    <div class="coaches_list" id="coaches_container">
							<?php
							
							$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

    						$args = array(
        					'post_type' => 'coaches',
    					
        					'posts_per_page' => 6,
							'paged' => $paged,
  'post_status'    => 'publish', // ← важно
    'meta_key'       => 'is_open',        // ключ ACF поля
    'orderby'        => 'meta_value', // сортировка по числовому значению
    'order'          => 'DESC',           // сначала отмеченные (1), потом неотмеченные (0)
    						);
    							$query = new WP_Query( $args );
								if ( $query->have_posts() ) : ?>
							
                        <div class="coaches_list_flex">
							
						
							 <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                           <div class="coaches_item" target = "_blank">
                                
							   <a href = "<?php echo get_permalink();?>" class="coach-image">
                                    <img src="<?php the_field('image');?>" alt="">
                                    <div class="coach_tag">
										
                                        <p>Набор <?php the_field('is_open') ?></p>
										
										<?php if(get_field('format') == 'Online'){?>
                                        <p>Online-группа</p>
										<?php }?>
										<?php if(get_field('format') == 'Offline'){?>
                                        <p>Offline-группа</p>
										<?php }?>
                                    </div>
                                </a>
                                <div class="coach_item_container">
                                   <div class="coach_content">
                                        <div class = "title"><?php the_title();?></div>
                                        <div class="coach_flex">
                                            <div class="coach_flex_item">
                                                <p>Возраст</p>
                                                <p><?php the_field('age')?></p>
                                            </div>
                                            <div class="coach_flex_item">
                                                <p>В бизнесе:</p>
                                                <p><?php the_field('in_bus')?></p>
                                            </div>
                                            <div class="coach_flex_item">
                                                <p>Регион:</p>
                                                <p><?php the_field('region')?></p>
                                            </div>
                                            <div class="coach_flex_item">
                                                <p>Возраст участников:</p>
                                                <p><?php the_field('age_peoples')?></p>
                                            </div>
                                        </div>
                                        <div class="coach_decription">
												<div class = "slider_coaches_grad">
							
						</div>
                                            <div class = "title_h2">Бизнес проекты:</div>
											
											
											<?php if( have_rows('projects') ): ?>
    											<?php while( have_rows('projects') ): the_row(); ?>
        											<p><?php the_sub_field('text'); ?></p>
    											<?php endwhile; ?>
											<?php endif; ?>
											
											
                                        </div>
                                        <div class="coach_button">
                                            <a href = "<?php echo get_permalink();?>">Узнать больше</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
						
                        
							<?php 
							endwhile;
							wp_reset_postdata();
							?>
							
							    <div class="pagination pagination_default">
        <?php
        echo paginate_links( array(
            'total'   => $query->max_num_pages,
        'current' => $paged,
        'prev_text' => '', // убираем "« Previous"
        'next_text' => '', // убираем "Next »"
        'type'      => 'list', // можно 'plain' или 'list'
        ) );
        ?>
    </div>
							
							
                        </div>
						
<?php endif;

wp_reset_postdata();
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
       
		<?php get_template_part( 'template-parts/template-reviews'  , null, array( 'variant' => 'v1' ) );?>
       
		<?php get_template_part('template-parts/template-plaska', null, array( 'variant' => 'want' ) );?>
        
		<?php get_template_part( 'template-parts/template-actual' );?>
        
		<?php get_template_part( 'template-parts/template-smi' );?>
       
		<?php get_template_part( 'template-parts/template-questions' );?>
    </main>

<?php 
get_footer();

