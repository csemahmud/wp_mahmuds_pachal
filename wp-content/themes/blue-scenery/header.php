<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
	<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>
    <?php wp_title( '|', true, 'right' ); ?>
    </title>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
     <!--[if lt IE 9]>
     <script src="<?php echo BLUE_SCENERY_TEMPPATH; ?>/scripts/html5shiv.js"></script>
     <script src="<?php echo BLUE_SCENERY_TEMPPATH; ?>/scripts/selectivizr-min.js"></script>
     
     <![endif]-->
	<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div id="container" class="group">
			<header class="group">
    				<div class="search-contain">
          				<?php get_search_form(); ?>
        			</div>
    				<div id="title-wrap">
          				<h1 id="title">
        					<?php esc_attr(bloginfo('name')); ?>
     					</h1>
          				<h2 id="description">
        				<?php esc_attr(bloginfo('description')); ?>
      					</h2>
        			</div>
    				<div id="nav-wrap"> 
                    	<a href="#nav-wrap" class="toggle" title="Show navigation">=</a> 
                    	<a href="#" class="toggle" title="Hide navigation">=</a>
          				<?php wp_nav_menu( array('theme_location' => 'header-menu')); ?>
        			</div>
      			<!--end nav--> 
    		</header>
			<!--end header-->
			<?php if(is_front_page()) { ?>
            <!--jQuery Blueberry Slider v0.4 BETA
            	http://marktyrrell.com/labs/blueberry/
                Copyright (C) 2011, Mark Tyrrell <me@marktyrrell.com>
                This program is free software: you can redistribute it and/or modify
				it under the terms of the GNU General Public License as published by
				the Free Software Foundation, either version 3 of the License, or
				(at your option) any later version. -->
			<div class="<?php if(get_theme_mod('blue_scenery_num_of_slides') == 1 ) {print 'noblueberry';} else { print 'blueberry';}?>">
      			<ul class="slides">
    				<?php
					for ($i=1; $i<5; $i++) {
                        if(get_theme_mod("blue_scenery_slider_image_$i") == '') {
                            $sliderImages[$i] = BLUE_SCENERY_IMAGES."/blue_scenery_default_$i.jpg";
                        }
                        elseif(strpos(get_theme_mod("blue_scenery_slider_image_$i"),'blue_scenery_default')!= FALSE) {
                            $sliderImages[$i] = get_theme_mod("blue_scenery_slider_image_$i");
                        }
                        else {
                            if(blue_scenery_get_image_id(get_theme_mod("blue_scenery_slider_image_$i"))==FALSE){
                                print __("Slider Image $i has been deleted, please re-upload",'blue-scenery');
                            }
                            else {
                                $sliderImageId = blue_scenery_get_image_id(get_theme_mod("blue_scenery_slider_image_$i"));
                                $sliderImage = wp_get_attachment_image_src($sliderImageId, 'blue_scenery_slider_size');
                                $sliderImages[$i] = $sliderImage[0];
                            }
                        }
					}
					if(!get_theme_mod('blue_scenery_num_of_slides') == false) {
						$numberofslides = get_theme_mod('blue_scenery_num_of_slides');
					}
					else {
				  		$numberofslides = '4';
					}
					?>
    						<li>
                            	<?php if(get_theme_mod('blue_scenery_recent_post_slide') == 1) { 
									$args = array('posts_per_page' => '1');
									$myposts = get_posts($args);
									foreach ($myposts as $post) : setup_postdata( $post ); 
										?>
										<div id="featured-excerpt">
											<a id="featured-post" href="<?php the_permalink(); ?>">
												<?php the_title(); ?>
											</a>
											<?php the_excerpt(); ?>
                                            <a id="read-more" href="<?php the_permalink();?>">
                                            	<?php _e('Read More', 'blue-scenery'); ?>
                                            </a>
										</div>
									<?php endforeach; 
									wp_reset_postdata();
			   					}
								?>
                                <img alt="" src="<?php print $sliderImages[1] ?>" />
        					</li>
                            <?php for ($i=2; $i < $numberofslides+1; $i++) { ?>
                            <li>
                                <img alt="" src="<?php echo $sliderImages[$i]; ?>" />
                            </li>    
                                <?php } ?>
    						
  				</ul>
    		</div>
			<?php } ?>
			<?php if(!is_front_page()) { ?>
				<hr class="line" />
			<?php } ?>
	<div id="main" class="group">
