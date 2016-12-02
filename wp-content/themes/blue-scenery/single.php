<?php get_header(); ?>
<div id="blog" class="left-col">
	<?php if (have_posts()) :while(have_posts()) : the_post(); ?>
    <div class="singlepost group">
    	<span class="post-time-2"><?php the_time('F d, Y'); ?></span>
    	<h2 class="single-post-title"><?php the_title(); ?></h2>
        <?php the_content('Read More...'); ?>
        <?php wp_link_pages(array('before' => '<div class="next-link group">','after' => '</div>','next_or_number' => 'next')); ?>
         <div class="meta-container group">
        <?php the_author_posts_link(); ?>
        <?php
			$posttags = get_the_tags();
			if ($posttags) {
				?>
                <div class="tag-container group">
                <?php
			  foreach($posttags as $tag) {
				  $taglink = esc_url(get_tag_link($tag->term_id));
				echo '<a href="'.$taglink.'"><div class="blog-tag">'.$tag->name . '</div></a>'; 
			  }
			  ?></div>
              <?php
			}
		?>
        <?php
			$categories = get_the_category();
			if($categories){
				?>
				<div class="category-container group">
                <?php
				foreach($categories as $category) {
					$output = '<a href="'.esc_url(get_category_link( $category->term_id )).'"><div class="blog-category">'.$category->cat_name.'</div></a>';
					echo $output;
				}
				?></div>
                <?php
			}
		?>
        </div>
    </div>
    <?php comments_template(); ?>
	<?php endwhile; else: ?>
    <p><?php _e('No posts were found. Sorry!', 'blue-scenery');?></p>
    <?php endif; ?>
    <div class="navi">
            <div class="right">
                <?php posts_nav_link('/') ?>
            </div>
    </div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>