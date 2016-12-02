<aside id="sidebar">
	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Primary Sidebar')) : ?>
    <div class="widget">
        <h3><?php _e('Widget Area', 'blue-scenery'); ?></h3>
        <p><?php _e('Head on over to "Widgets" in the apperance menu to add your own custom widgets', 'blue-scenery'); ?></p>
	</div>
    <?php endif; ?>
</aside>