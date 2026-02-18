  <div class = "section4" style = "
								   <?php 
								   if(get_field('show', 'options'))
								   { 
									   echo 'display:block;';
								   } 
								   else {
									   echo 'display:none;';
								   }
								   ?>">
            <div class = "section4-background"></div>
            <div class="section4-content">
                <div class="container">
                    <div class="section4-header">
                        <div class = "title"><?php the_field('слайдер_с_логотипами_заголовок','options')?></div>
                        
                    </div>
                </div>
            </div>
            <div class="section4-logos-slider">
				
					<?php if( have_rows('слайдер_с_логотипами', 'options') ): ?>
    						<?php while( have_rows('слайдер_с_логотипами', 'options') ): the_row(); ?>
                <div class="slider-item">
       									<img src="<?php the_sub_field('логотип')?>" alt="">
    			</div>
					<?php endwhile; ?>
					<?php endif; ?>
               
            </div>
        </div>


<?php 
if (get_field('show', 'options') != 'True'){
	?>

	<div style = "height:70px; width:100%;"></div>
<?php 
}

?>