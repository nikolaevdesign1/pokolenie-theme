<div class="student-text-section">
            <div class="container">
                <div class="students-text-section-flex">
                    <div class="student-text-section-image">
                        <img src="<?php the_field('процесс_изображение', 'options')?>" alt="">
                    </div>

                    <div class="student-text-section-content">
                        <div class = "title"><?php the_field('процесс_заголовок', 'options')?></div>
                       <?php the_field('процесс_текст', 'options')?>
                    </div>
                </div>
            </div>
        </div>