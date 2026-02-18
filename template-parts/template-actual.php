        <div class="section10 section-news">
            <div class="container">
                <div class="section-news-header">
                    <div class = "title"><?php the_field('актуальны_события_заголовок', 'options')?></div>
					<?php if( have_rows('актуальны_события_ссылка', 'option') ): ?>
    					<?php while( have_rows('актуальны_события_ссылка', 'option') ): the_row(); ?>
							<a href="<?php the_sub_field('ссылка')?>"><?php the_sub_field('текст')?></a>
    					<?php endwhile; ?>
					<?php endif; ?>
                </div>
                <div class="section-news-flex">
					
					<?php if( have_rows('большая_плашка', 'option') ): ?>
    					<?php while( have_rows('большая_плашка', 'option') ): the_row(); ?>
                    <a href = "<?php the_sub_field('ссылка')?>" class="section-big-news">
                        <div class="background-news">
                            <img src="<?php the_sub_field('фото')?>" alt="">
                        </div>
                        <div class="background-opacity"></div>
                        <div class="news-content">
							<div class="news-tag">
                                <p><?php the_sub_field('плашка')?></p>
                            </div>
                            <div class = "title_h2"><?php the_sub_field('текст')?></div>
                            <p>Узнать больше</p>
                        </div>
                        
                    </a>
					
    					<?php endwhile; ?>
					<?php endif; ?>
                    <div class="section-two-news">
						
					<?php if( have_rows('большая_плашка_1', 'option') ): ?>
    					<?php while( have_rows('большая_плашка_1', 'option') ): the_row(); ?>
                        <a href = "<?php the_sub_field('ссылка')?>" class="section-news-item">
                            <div class="background-news">
                                <img src="<?php the_sub_field('фото')?>" alt="">
                            </div>
                            <div class="background-opacity"></div>
                            
                            <div class="news-content">
                                <div class="news-tag">
                                    <p><?php the_sub_field('плашка')?></p>
                                </div>
								<div class = "title_h2"><?php the_sub_field('текст')?></div>
                                <p>Узнать больше</p>
                            </div>
                        </a> 
							<?php endwhile; ?>
					<?php endif; ?>
						
					<?php if( have_rows('большая_плашка_2', 'option') ): ?>
    					<?php while( have_rows('большая_плашка_2', 'option') ): the_row(); ?>
                        <a href = "<?php the_sub_field('ссылка')?>" class="section-news-item">
                            <div class="background-news">
                                <img src="<?php the_sub_field('фото')?>" alt="">
                            </div>
                            <div class="background-opacity"></div>
                            
                            <div class="news-content">
                                <div class="news-tag">
                                    <p><?php the_sub_field('плашка')?></p>
                                </div>
								<div class = "title_h2"><?php the_sub_field('текст')?></div>
                                <p>Узнать больше</p>
                            </div>
                        </a>
							<?php endwhile; ?>
					<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>