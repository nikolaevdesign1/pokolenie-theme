    
<?php
$variant = ! empty( $args['variant'] ) ? $args['variant'] : 'default';

if ( $variant === 'v1' ) {?>
        <div class="section-faq">
            <div class="container">
                <div class="section-faq-header">
                    <div class = "title"><?php the_field('faq_заголовок', 'options')?></div>
					<p>
						<?php the_field('faq_подзаголовок', 'options')?>
					</p>
                </div>
                <div class="section-faq-flex">
												
                   <?php if( have_rows('faq_вопросы_1', 'option') ): ?>
   						 <?php while( have_rows('faq_вопросы_1', 'option') ): the_row(); ?>
 
                        <div class="question">
                            <div class="question-title">
                                <div class = "title"><?php the_sub_field('вопрос')?></div>
                            </div>
                            <div class="question-answer">
                                <p>
                                	<?php the_sub_field('ответ')?>   
								</p>
                            </div>
                        </div>
                      
					   <?php endwhile; ?>
					<?php endif; ?>
                     
                </div>
                
            </div>
        </div>


<?php } else {?>


   <div class="section-faq">
            <div class="container">
                <div class="section-faq-header">
                    <div class = "title"><?php the_field('faq_заголовок_2', 'options')?></div>
					<p>
						<?php the_field('faq_подзаголовок_2', 'options')?>
					</p>
                </div>
                <div class="section-faq-flex">
												
					 <?php if( have_rows('faq_вопросы_2', 'option') ): ?>
   						 <?php while( have_rows('faq_вопросы_2', 'option') ): the_row(); ?>
 
                        <div class="question">
                            <div class="question-title">
                                <div class = "title"><?php the_sub_field('вопрос')?></div>
                            </div>
                            <div class="question-answer">
                                <p>
                                	<?php the_sub_field('ответ')?>   
								</p>
                            </div>
                        </div>
                      
					   <?php endwhile; ?>
					<?php endif; ?>
                     
                   
                      
                </div>
                
            </div>
        </div>



<?php
			 }
?>