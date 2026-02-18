 <div class="section5">
            <div class="container">
                <div class="section5-header">
                    <div class = "title"><?php the_field('преимущества_заголовок','options');?></div>
                </div>
                <div class = "section5-flex">
                   <?php if( have_rows('преимущества_элемент', 'option') ): ?>
   						 <?php while( have_rows('преимущества_элемент', 'option') ): the_row(); ?>
 
                    <div class="section5-item">
                        <div class = "title"><?php the_sub_field('цифра')?></div>
                        <p><?php the_sub_field('текст')?></p>
						<?php if (get_sub_field('иконка')){?>
                        <div class="section5-item-icon">
                            <img src = "<?php the_sub_field('иконка')?>">
                        </div>
						<?php } ?>
                    </div>
					   <?php endwhile; ?>
					<?php endif; ?>
                   
                </div>
            </div>
        </div>