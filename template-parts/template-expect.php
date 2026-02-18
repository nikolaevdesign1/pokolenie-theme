<div class="student-icons-section">
            <div class="container">
                <div class="students-icons-section-content">
                    <div class="students-icons-section-content-background">
                        <img src="<?php echo get_template_directory_uri() . '/assets/images/adv-back.svg'?>" alt="">
                    </div>
                    <div class="students-icons-section-content-header">
                        <div class = "title"><?php the_field('ожидание_заголовок', 'options')?></div>
                    </div>
                    <div class="students-icons-section-content-header-flex">
						
	 <?php if( have_rows('ожидание_повторитель', 'options') ): ?>
	 <?php while( have_rows('ожидание_повторитель', 'options') ): the_row(); ?>
                        <div class="students-icons-section-content-header-item">
                            <img src="<?php the_sub_field('иконка')?>" alt="">
                            <p><?php the_sub_field('текст')?></p>
                        </div>
						
						  <?php endwhile; ?>
<?php endif; ?>
                      
                    </div>
                </div>
            </div>
        </div>