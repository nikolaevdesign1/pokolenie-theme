<div class = "section-coaches" id = "section-coaches">
            <div class="container">
				
				
				   
<?php
$variant = ! empty( $args['variant'] ) ? $args['variant'] : 'default';

if ( $variant === 'v1' ) {?> 
                <div class="coahes_header">
					
                    <div class = "title">Твердые наставники, которые уже помогают подросткам найти свой путь</div>
                </div>
				
				
				<?php }
				
				else{
					
					?>
				
				 <div class="coahes_header">
                    <div class = "title">Предприниматели, которые могут стать<br> твоими наставниками</div>
                </div>
				
				<?php 
				}
				?>
				
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
                    <div class="coaches_list"  id="coaches_container">
						
                        <div class="coaches_list_flex">
						<?php
    						$args = array(
        					'post_type' => 'coaches',
        					'posts_per_page' => 4,
  							'post_status'    => 'publish', // ← важно
    						);
    						$loop = new WP_Query($args);
    						while($loop->have_posts()) : $loop->the_post();
							$post_ID = get_the_ID() ?>
							<a href = "<?php echo get_permalink();?>" class="coaches_item">
                                <div class="coach-image">
                                    <img src="<?php the_field('image');?>" alt="">
                                    <div class="coach_tag">
                                        <p>Набор <?php the_field('is_open')?></p>
										<?php if(get_field('format') == 'Online'){?>
                                        <p>Online-группа</p>
										<?php }?>
										<?php if(get_field('format') == 'Offline'){?>
                                        <p>Offline-группа</p>
										<?php }?>
                                    </div>
                                </div>
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
                                            <p>Узнать больше</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
						
                       	
							<?php 
							endwhile;
							wp_reset_postdata();
							?>
							
							   <div class="coaches_list_button">
                        <div class="gradient_button">
                            <a href="/наставники/">
                                <p>Узнать всех наставников</p>
                                <div class="gradient_button_icon">
                                    <svg width="43" height="43" viewBox="0 0 43 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="21.2" cy="21.4969" r="21.2" fill="white"/>
                                        <path d="M18.9948 14.875V16.6417H24.816L14.5781 26.8795L15.8236 28.125L26.0615 17.8872V23.7083H27.8281V14.875H18.9948Z" fill="#8F8F8F"/>
                                        </svg>
                                        
                                </div>
                            </a>
                        </div>
                      </div>
						</div>
                          
						
						
						
						
                   
                    </div>
                </div>
            </div>
        </div>