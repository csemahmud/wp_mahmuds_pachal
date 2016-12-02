<?php 
/*
Template Name: Archives
*/
get_header(); ?>
<div id="blog" class="left-col">
    <div class="archives group">
    	<h2 class="single-post-title"><?php the_title(); ?></h2>
        <div id="by-month">
            <h2><?php _e('Archives by Month', 'blue-scenery'); ?></h2>
            <ul>
                <?php wp_get_archives(array('type' => 'monthly', 'order' => 'DESC')); ?>
            </ul>
        </div>
        <div id="by-subject">
            <h2><?php _e('Archives by Subject', 'blue-scenery'); ?></h2>
            <ul>
            	<?php wp_list_categories(array('hierarchical' => 0, 'title_li' => '')) ?>
            </ul>
        </div>
     </div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>