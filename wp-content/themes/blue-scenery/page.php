<?php get_header(); ?>
<div id="blog" class="left-col">
	<?php if (have_posts()) :while(have_posts()) : the_post(); ?>
    <div class="single-page group">
    	<h2 class="page-title"><?php the_title(); ?></h2>
        <?php the_content('Read More...'); ?>
	</div>
	<?php endwhile; else: ?>
    <p><?php _e('No posts were found. Sorry!','blue-scenery');?></p>
    <?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>