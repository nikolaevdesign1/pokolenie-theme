    <div class="students-section-flex">
        <?php
        $args = array(
            'post_type'      => 'cases',
            'posts_per_page' => 3,
        );
        $news_query = new WP_Query($args);

        if ($news_query->have_posts()) :
            while ($news_query->have_posts()) : $news_query->the_post(); ?>
		
		
		   	<a href = "<?php the_field('ссылка_на_кейс'); ?>" class="student-flex-item">
                        <div class="students-item-content">
                            <div class="students-item-content-image">
                                <?php the_post_thumbnail(); ?>
                            </div>
                           <div class="students-item-content-text">
                            <p><?php the_field('описание'); ?></p>
                            <p><span><?php the_field('наставник'); ?></span></p>
                           </div>
                            
                        </div>
                        <div class="students-item-button">
                            <p>Узнать больше</p>
                        </div>
     </a>
            <?php endwhile;
        else :
            echo '<p>Кейсов пока нет</p>';
        endif;

        wp_reset_postdata();
        ?>
    </div>
