   
<?php
$variant = ! empty( $args['variant'] ) ? $args['variant'] : 'default';

if ( $variant === 'v1' ) {?>

<div class="section6">
            <div class="container">
                <div class="section6-flex">
                    <div class="section6-text">
                        <div class = "title"><?php the_field('формат_заголовок','options')?></div>
                        <p><?php the_field('формат_текст', 'options')?></p>
                        <div class = "section6-text-buttons">
							 <div class="gradient_button start_register">
                            <a href="#">
                             
									Подать заявку
								
                                <div class="gradient_button_icon">
                                    <svg width="43" height="43" viewBox="0 0 43 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="21.2" cy="21.4969" r="21.2" fill="white"/>
                                        <path d="M18.9948 14.875V16.6417H24.816L14.5781 26.8795L15.8236 28.125L26.0615 17.8872V23.7083H27.8281V14.875H18.9948Z" fill="#8F8F8F"/>
                                    </svg>
                                            
                                </div>
                            </a>
                        </div>
							<p>
								<?php the_field('формат_маленький_текст', 'options') ?>
							</p>
						</div>
                    </div>
                    <div class="section6-image">
                         <video preload="auto" playsinline="" autoplay="" loop="" muted="" loading="lazy">
							<source src="<?php the_field('формат_видео', 'options')?>" type="video/mp4">
						</video>
                    </div>
                </div>
            </div>
        </div>



<?php }
elseif ($variant === 'v2') {?>



<div class="section6">
            <div class="container">
                <div class="section6-flex">
                    <div class="section6-text">
                        <div class = "title"><?php the_field('формат_заголовок_2','options')?></div>
                        <p><?php the_field('формат_текст_2', 'options')?></p>
                        <div class = "section6-text-buttons">
							 <div class="gradient_button start_register">
                            <a href="#">
                             
									Хочу стать участником
								
                                <div class="gradient_button_icon">
                                    <svg width="43" height="43" viewBox="0 0 43 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="21.2" cy="21.4969" r="21.2" fill="white"/>
                                        <path d="M18.9948 14.875V16.6417H24.816L14.5781 26.8795L15.8236 28.125L26.0615 17.8872V23.7083H27.8281V14.875H18.9948Z" fill="#8F8F8F"/>
                                    </svg>
                                            
                                </div>
                            </a>
                        </div>
							<p>
								<?php the_field('формат_маленький_текст_2', 'options') ?>
							</p>
						</div>
                    </div>
                    <div class="section6-image">
                         <video preload="auto" playsinline="" autoplay="" loop="" muted="" loading="lazy">
							<source src="<?php the_field('формат_видео_2', 'options')?>" type="video/mp4">
						</video>
                    </div>
                </div>
            </div>
        </div>
<?php } else {?>

<div class="section6">
            <div class="container">
                <div class="section6-flex">
                    <div class="section6-text">
                        <div class = "title"><?php the_field('формат_заголовок_3','options')?></div>
                        <p><?php the_field('формат_текст_3', 'options')?></p>
                        <div class = "section6-text-buttons">
							 <div class="gradient_button quiz_popup_open">
                            <a href="#">
                             
									Хочу стать наставником									
								
                                <div class="gradient_button_icon">
                                    <svg width="43" height="43" viewBox="0 0 43 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="21.2" cy="21.4969" r="21.2" fill="white"/>
                                        <path d="M18.9948 14.875V16.6417H24.816L14.5781 26.8795L15.8236 28.125L26.0615 17.8872V23.7083H27.8281V14.875H18.9948Z" fill="#8F8F8F"/>
                                    </svg>
                                            
                                </div>
                            </a>
                        </div>
							<p>
								<?php the_field('формат_маленький_текст_3', 'options') ?>
							</p>
						</div>
                    </div>
                    <div class="section6-image">
                         <video preload="auto" playsinline="" autoplay="" loop="" muted="" loading="lazy">
							<source src="<?php the_field('формат_видео_3', 'options')?>" type="video/mp4">
						</video>
                    </div>
                </div>
            </div>
        </div>


<?php
			 }
?>