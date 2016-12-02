<?php get_header(); ?>
<div id="blog">
	<?php if (have_posts()) :while(have_posts()) : the_post(); ?>
    <div <?php post_class('group'); ?>>
    	<?php if (get_comments_number() > 0) {?>
        	<div class="comment-date-container">
				<a class="post-time-1" href="<?php the_permalink(); ?>"><?php the_time('F d, Y'); ?></a>
                <a class="bubble-link" href="<?php comments_link(); ?>"><div class="bubble"><?php print comments_number(); ?></div></a>
            </div>
            <?php } 
			else { ?>
				<a class="post-time-2" href="<?php the_permalink(); ?>"><?php the_time('F d, Y');?></a>
			<?php } ?>
        <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php 
			if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				the_post_thumbnail();
			} 
		?>
        <?php the_content(); ?>
        <div class="meta-container group">
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
        <?php the_author_posts_link(); ?>
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
	<?php endwhile; else: ?>
    <p><?php _e('No posts were found. Sorry!','blue-scenery');?></p>
    <?php endif; ?>
    <div class="navi right">
                <?php posts_nav_link() ?>
    </div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>