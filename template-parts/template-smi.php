 <div class="section11 section-magazine">
            <div class="container">
                <div class="section-magazine-header">
                    <div class = "title"><?php the_field('СМИ_заголовок', 'options')?></div>
					<?php if( have_rows('Сми_ссылка', 'option') ): ?>
    					<?php while( have_rows('Сми_ссылка', 'option') ): the_row(); ?>
        				 	<a href="<?php the_sub_field('ссылка')?>"><?php the_sub_field('заголовок_ссылки')?></a>
    					<?php endwhile; ?>
					<?php endif; ?>
                   
                </div>
                <div class="section-magazine-flex">
					
					<?php if( have_rows('СМИ_айтем', 'option') ): ?>
						<?php $smi_count = 0; ?>
    					<?php while( have_rows('СМИ_айтем', 'option') ): the_row(); ?>
					<?php if ($smi_count >= 3) break;?>
                    <a href = "<?php the_sub_field('ссылка')?>" class="section-magazine-item" target = "_blank">
                        <img src="<?php the_sub_field('фото')?>" alt="">
                        <div class = "title_h2"><?php the_sub_field('текст')?></div>
                        <p>Узнать подробнее</p>
                    </a>
				 	<?php $smi_count++; ?>
                    		<?php endwhile; ?>
					<?php endif; ?>
                </div>
            </div>
</div>