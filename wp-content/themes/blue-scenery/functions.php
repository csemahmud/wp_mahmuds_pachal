<?php
//Define some paths
define( 'BLUE_SCENERY_TEMPPATH', esc_url(get_stylesheet_directory_uri()));
define( 'BLUE_SCENERY_IMAGES', BLUE_SCENERY_TEMPPATH. "/images");

if ( ! function_exists( 'blue_scenery_theme_setup' ) ) :
//Theme Setup 

function blue_scenery_theme_setup() {
	//Add Theme Support for Search form, Post Thumbnails, RSS feed, and Title Tag
	add_theme_support( 'html5', array( 'search-form' ) );
	add_theme_support( 'post-thumbnails' ); 
	add_theme_support( 'automatic-feed-links' );
	
	//Make theme translation ready
	load_theme_textdomain('blue-scenery', get_template_directory() . '/languages');
	
	//Remove inline styling for native gallery
	add_filter( 'use_default_gallery_style', '__return_false' );
	
	//Add custom image size to crop images used in the slider
	add_image_size( 'blue_scenery_slider_size', 2100, 700, array( 'center', 'center' ) );
	
}
endif; // blue_scenery_theme_setup
add_action( 'after_setup_theme', 'blue_scenery_theme_setup' );
	

//Adjust content_width value for video post formats and attachment templates.
function blue_scenery_content_width() {
	global $content_width;

	if ( is_attachment() )
		$content_width = 724;
	elseif ( has_post_format( 'audio' ) )
		$content_width = 484;
}
add_action( 'template_redirect', 'blue_scenery_content_width' );

//Customizer 
function blue_scenery_customize_register( $wp_customize ) {
   $wp_customize->add_section( 'blue_scenery_slider_image_section' , array(
    'title'       => __( 'Image Slider Photos and Settings', 'blue-scenery' ),
    'priority'    => 30,
    'description' => 'Choose your settings and photos for the slider',
) );
	$wp_customize->add_setting("blue_scenery_recent_post_slide", array('default' => 0, 'sanitize_callback' => 'esc_attr'));
	$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'blue_scenery_recent_post_slide',
        array(
            'label'          => __( 'Recent post on first slide?', 'blue-scenery' ),
            'section'        => 'blue_scenery_slider_image_section',
            'settings'       => 'blue_scenery_recent_post_slide',
            'type'           => 'checkbox'
        )
    )
);
	$wp_customize->add_setting("blue_scenery_num_of_slides", array('default' => 4, 'sanitize_callback' => 'esc_attr'));
	$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'blue_scenery_num_of_slides',
        array(
            'label'          => __( 'How many slides?', 'blue-scenery' ),
            'section'        => 'blue_scenery_slider_image_section',
            'settings'       => 'blue_scenery_num_of_slides',
            'type'           => 'select',
            'choices'        => array(
                1   => __( 'One', 'blue-scenery' ),
                2  => __( 'Two', 'blue-scenery' ),
				3 => __('Three', 'blue-scenery'),
				4 => __('Four', 'blue-scenery')
            )
        )
    )
);
	$wp_customize->add_setting("blue_scenery_time_between", array('default' => 5, 'sanitize_callback' => 'esc_attr'));
	$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'blue_scenery_time_between',
        array(
            'label'          => __( 'Time between slides (in seconds)', 'blue-scenery' ),
            'section'        => 'blue_scenery_slider_image_section',
            'settings'       => 'blue_scenery_time_between',
            'type'           => 'text'
        )
    )
);
	for ($i=1; $i<5; $i++) {
	$wp_customize->add_setting( "blue_scenery_slider_image_$i", array('default' => BLUE_SCENERY_IMAGES."/blue_scenery_default_$i.jpg", 'sanitize_callback' => 'esc_url_raw') );
	
	$wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, "blue_scenery_slider_image_$i", array(
    'label'    => __( "Slider Image $i", 'blue-scenery' ),
    'section'  => 'blue_scenery_slider_image_section',
    'settings' => "blue_scenery_slider_image_$i",
) ) );
	}
	
}
add_action( 'customize_register', 'blue_scenery_customize_register' );


//Register the main navigation
function blue_scenery_register_menu() {
  register_nav_menu('header-menu',__( 'Header Menu', 'blue-scenery'));
}
add_action( 'init', 'blue_scenery_register_menu' );

//Add sidebar
function blue_scenery_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Primary Sidebar', 'blue-scenery' ),
        'id' => 'primary-widget-area',
        'description' => __( 'The primary widget area', 'blue-scenery' ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );
}
add_action( 'widgets_init', 'blue_scenery_widgets_init' );

//Enqueue scripts and styles for the front end. 
function blue_scenery_scripts_styles() {
	
	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	
	//Load Blueberry stylesheet
	wp_enqueue_style('blue-scenery-blueberry', BLUE_SCENERY_TEMPPATH.'/css/blueberry.css', array(), '0.4');
	
	// Loads main stylesheet.
	wp_enqueue_style( 'blue-scenery-style', get_stylesheet_uri(), array(), '1.0.0' );
	
	//Load IE stylesheet
	wp_enqueue_style('blue-scenery-ie-style', BLUE_SCENERY_TEMPPATH.'/css/ie.css', array(), '1.0.0');
	wp_style_add_data( 'blue-scenery-ie-style', 'conditional', 'lt IE 9' );
	
	// Add Quicksand font, used in the main stylesheet.
	wp_enqueue_style( 'blue-scenery-quicksand', '//fonts.googleapis.com/css?family=Quicksand', array());
	
	// Add Font Awesome font, used in the main stylesheet.
	wp_enqueue_style( 'blue-scenery-font-awesome', BLUE_SCENERY_TEMPPATH . '/css/font-awesome/css/font-awesome.min.css', array(),'4.2.0');
	
	// Load jQuery
	wp_enqueue_script('jquery');
	
	// Loads main Javascript File
	wp_enqueue_script( 'blue-scenery-main-script', BLUE_SCENERY_TEMPPATH . '/scripts/main-script.js', array( 'jquery' ), '1.0.0');
        
}

add_action( 'wp_enqueue_scripts', 'blue_scenery_scripts_styles' );


// Replace the excerpt "more" text by a empty string
function blue_scenery_excerpt_more($more) {
       global $post;
	return '';
}
add_filter('excerpt_more', 'blue_scenery_excerpt_more');

//Pass setting registered in theme options to the slider script 
function blue_scenery_pass_var() {
wp_enqueue_script( 'blueberry', BLUE_SCENERY_TEMPPATH.'/scripts/jquery.blueberry.js', array('jquery'));
global $post;
if(!get_theme_mod('blue_scenery_time_between') == false) {
$dataToBePassed = array(
    'timeBetween' => esc_attr(get_theme_mod('blue_scenery_time_between')),
);
}
else {
	$dataToBePassed = array('timeBetween' => 5);
}
wp_localize_script( 'blueberry', 'php_vars', $dataToBePassed );
}
add_action('wp_enqueue_scripts', 'blue_scenery_pass_var');

//Add class to menu container 
function blue_scenery_modify_nav_menu_args( $args )
{
		$args['container_class'] = 'menu';

	return $args;
}

add_filter( 'wp_nav_menu_args', 'blue_scenery_modify_nav_menu_args' );

//Customize wp_title() 
function blue_scenery_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= esc_attr(get_bloginfo( 'name', 'display' ));

	// Add the site description for the home/front page.
	$site_description = esc_attr(get_bloginfo( 'description', 'display' ));
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'blue-scenery' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'blue_scenery_wp_title', 10, 2 );

// retrieves the attachment ID from the file URL
function blue_scenery_get_image_id($image_url) {
    global $wpdb;
    $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url ));
    if(empty($attachment)){
        return FALSE;
    }
    else {
        return $attachment[0];
    }
}
?>