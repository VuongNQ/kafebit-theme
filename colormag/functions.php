<?php
/**
 * ColorMag functions related to defining constants, adding files and WordPress core functionality.
 *
 * Defining some constants, loading all the required files and Adding some core functionality.
 * @uses add_theme_support() To add support for post thumbnails and automatic feed links.
 * @uses register_nav_menu() To add support for navigation menu.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @package ThemeGrill
 * @subpackage ColorMag
 * @since ColorMag 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 800;

/**
 * $content_width global variable adjustment as per layout option.
 */
function colormag_content_width() {
	global $post;
	global $content_width;

	if( $post ) { $layout_meta = get_post_meta( $post->ID, 'colormag_page_layout', true ); }
	if( empty( $layout_meta ) || is_archive() || is_search() ) { $layout_meta = 'default_layout'; }
	$colormag_default_layout = get_theme_mod( 'colormag_default_layout', 'right_sidebar' );

	if( $layout_meta == 'default_layout' ) {
		if ( $colormag_default_layout == 'no_sidebar_full_width' ) { $content_width = 1140; /* pixels */ }
		else { $content_width = 800; /* pixels */ }
	}
	elseif ( $layout_meta == 'no_sidebar_full_width' ) { $content_width = 1140; /* pixels */ }
	else { $content_width = 800; /* pixels */ }
}
add_action( 'template_redirect', 'colormag_content_width' );

add_action( 'after_setup_theme', 'colormag_setup' );
/**
 * All setup functionalities.
 *
 * @since 1.0
 */
if( !function_exists( 'colormag_setup' ) ) :
function colormag_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'colormag', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// This theme uses Featured Images (also known as post thumbnails) for per-post/per-page.
	add_theme_support( 'post-thumbnails' );

	// Registering navigation menu.
	register_nav_menu( 'primary', esc_html__( 'Primary Menu', 'colormag' ) );

	// Cropping the images to different sizes to be used in the theme
	add_image_size( 'colormag-highlighted-post', 392, 272, true );
	add_image_size( 'colormag-featured-post-medium', 390, 205, true );
	add_image_size( 'colormag-featured-post-small', 130, 90, true );
	add_image_size( 'colormag-featured-image', 800, 445, true );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'colormag_custom_background_args', array(
		'default-color' => 'eaeaea'
	) ) );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link', 'gallery', 'chat', 'audio', 'status' ) );

	// Adding excerpt option box for pages as well
	add_post_type_support( 'page', 'excerpt' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support('html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	));

	// adding the WooCommerce plugin support
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support('html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	));

	// Adds the support for the Custom Logo introduced in WordPress 4.5
	add_theme_support( 'custom-logo',
		array(
			'flex-width' => true,
			'flex-height' => true,
		)
	);

	// Support for selective refresh widgets in Customizer
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;

/**
 * Define Directory Location Constants
 */
define( 'COLORMAG_PARENT_DIR', get_template_directory() );
define( 'COLORMAG_CHILD_DIR', get_stylesheet_directory() );

define( 'COLORMAG_INCLUDES_DIR', COLORMAG_PARENT_DIR. '/inc' );
define( 'COLORMAG_CSS_DIR', COLORMAG_PARENT_DIR . '/css' );
define( 'COLORMAG_JS_DIR', COLORMAG_PARENT_DIR . '/js' );
define( 'COLORMAG_LANGUAGES_DIR', COLORMAG_PARENT_DIR . '/languages' );

define( 'COLORMAG_ADMIN_DIR', COLORMAG_INCLUDES_DIR . '/admin' );
define( 'COLORMAG_WIDGETS_DIR', COLORMAG_INCLUDES_DIR . '/widgets' );

define( 'COLORMAG_ADMIN_IMAGES_DIR', COLORMAG_ADMIN_DIR . '/images' );

/**
 * Define URL Location Constants
 */
define( 'COLORMAG_PARENT_URL', get_template_directory_uri() );
define( 'COLORMAG_CHILD_URL', get_stylesheet_directory_uri() );

define( 'COLORMAG_INCLUDES_URL', COLORMAG_PARENT_URL. '/inc' );
define( 'COLORMAG_CSS_URL', COLORMAG_PARENT_URL . '/css' );
define( 'COLORMAG_JS_URL', COLORMAG_PARENT_URL . '/js' );
define( 'COLORMAG_LANGUAGES_URL', COLORMAG_PARENT_URL . '/languages' );

define( 'COLORMAG_ADMIN_URL', COLORMAG_INCLUDES_URL . '/admin' );
define( 'COLORMAG_WIDGETS_URL', COLORMAG_INCLUDES_URL . '/widgets' );

define( 'COLORMAG_ADMIN_IMAGES_URL', COLORMAG_ADMIN_URL . '/images' );

/** Load functions */
require_once( COLORMAG_INCLUDES_DIR . '/custom-header.php' );
require_once( COLORMAG_INCLUDES_DIR . '/functions.php' );
require_once( COLORMAG_INCLUDES_DIR . '/header-functions.php' );
require_once( COLORMAG_INCLUDES_DIR . '/customizer.php' );

require_once( COLORMAG_ADMIN_DIR . '/meta-boxes.php' );
//require_once('no-category-base.php');
/** Load Widgets and Widgetized Area */
require_once( COLORMAG_WIDGETS_DIR . '/widgets.php' );

/**
 * Detect plugin. For use on Front End only.
 */
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

/**
 * Load Demo Importer Configs.
 */
if ( class_exists( 'TG_Demo_Importer' ) ) {
	require get_template_directory() . '/inc/demo-config.php';
}

/**
 * Assign the ColorMag version to a variable.
 */
$theme            = wp_get_theme( 'colormag' );
$colormag_version = $theme['Version'];

/* Calling in the admin area for the Welcome Page */
if ( is_admin() ) {
	require get_template_directory() . '/inc/admin/class-colormag-admin.php';
}

/**
 * Load TGMPA Configs.
 */
require_once( COLORMAG_INCLUDES_DIR . '/tgm-plugin-activation/class-tgm-plugin-activation.php' );
require_once( COLORMAG_INCLUDES_DIR . '/tgm-plugin-activation/tgmpa-colormag.php' );
?>
<?php
	function custom_get_excerpt($post_id) {
    $post = get_post( $post_id );
    $temp = $post;
    setup_postdata( $post );

    $excerpt = esc_attr(strip_tags(get_the_excerpt()));
    
    wp_reset_postdata();
    $post = $temp;

    return $excerpt;
}
function get_tag_cate_page(){
	$query_args = array(
	      'cat' => $category->term_id
	    );
	    $query = new WP_Query( $query_args );
	    $posttags = "";
	    while( $query->have_posts() ) {
	      $query->the_post();
	        if( get_the_tag_list() ){
	          $posttags = $posttags . get_the_tag_list('',',',',');
	        }
	    }
	    // Reset
	    wp_reset_postdata();

	    // Explode tags in array
	    $sortedtags = explode(',', $posttags);

	    // Sort array
	    asort($sortedtags);

	    // Remove duplicates from array
	    $sortedtags = array_unique($sortedtags);

	    // Remove the blank entry due to get_the_tag_list
	    $sortedtags = array_values( array_filter($sortedtags) );

	    $tags='';
	    // Wrap each tag in list element
	    foreach ($sortedtags as $tagname) {
	       $tags.=strip_tags($tagname).', ';
	    }
	return $tags ;
}
function custom_add_meta_tag() {
	if ( is_single() || is_page() ) {
	$description = custom_get_excerpt(get_the_ID()); 
	$tag_meta='';
	$image_popup_id = get_post_thumbnail_id();
	$image_popup_url = wp_get_attachment_url( $image_popup_id );
	$posttags = get_the_tags();
	if ($posttags) 
	{
		foreach($posttags as $tag) 
		{
			$tag_meta.= $tag->name . ' ,'; 
		}
	}
	add_meta_tag_post_page($description, $image_popup_url, $tag_meta);
    } else if(is_home()){
    	$cate='';
    	$categories = get_categories( array(
		    'order'   => 'DESC'
		) );
		foreach( $categories as $category ) {
			$cate.=$category->name.', ';
		}
		$custom_logo_id = get_theme_mod( 'custom_logo' );
		$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
	   	add_meta_tag_home_page($image[0],$cate);
    } elseif (is_category()) {
    	$custom_logo_id = get_theme_mod( 'custom_logo' );
		$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
		$category = get_queried_object();
		$category_description = $category->category_description;
		$current_category = single_cat_title("", false);
		global $wp;
  		$current_url = home_url( add_query_arg( array(), $wp->request ) );
    	$tags=get_tag_cate_page();
	    add_meta_tag_category_page($current_category,$tags,$category_description,$image[0],$current_url);
    }elseif (is_tag()) {
    	$cate='';
    	$categories = get_categories( array(
		    'order'   => 'DESC'
		) );
		foreach( $categories as $category ) {
			$cate.=$category->name.', ';
		}
    	global $wp;
  		$current_url = home_url( add_query_arg( array(), $wp->request ) );
  		add_meta_tag_tag_page($current_url,$cate);
    }

}
function add_meta_tag_post_page($description, $image_popup_url, $tag_meta){
?>
	<!-- Twitter Card -->
    <meta name="twitter:card" value="summary">
	<meta name="twitter:site" content="@Kafebit">
    <meta name="twitter:creator" content="@Kafebit">
	<meta name="twitter:url" content="<?php the_permalink();?>" />
	<meta name="twitter:description" content="<?=$description?>">
	<meta name="twitter:title" content="<?php the_title(); ?>">
	<meta name="twitter:image" content="<?=$image_popup_url?>"/>
	<!-- End Twitter Card -->
	<!-- Meta tag -->
	<meta content="Kafebit" property="og:site_name"/>
    <meta content="article" property="og:type"/>
	<meta content="<?php the_title(); ?>" itemprop="headline" property="og:title"/>
	<meta name="description" content="<?=$description?>"/>
	<meta content="<?php the_permalink();?>" itemprop="url" property="og:url"/>
	<meta content="<?=$image_popup_url?>" itemprop="thumbnailUrl" property="og:image"/>
	<meta content="<?=$description?>" itemprop="description" property="og:description"/>
	<meta name="keywords" content="<?=$tag_meta?>"/>
	<meta name="copyright" content="Kafebit"/>
    <meta name="author" content="Kafebit"/>
    <meta name="robots" content="index,follow"/>
	<!-- End Meta tag -->
	
<?php } 
function add_meta_tag_category_page($current_category,$tags,$category_description,$image,$current_url){
?>
	<!-- Twitter Card -->
	<meta name="twitter:card" value="summary">
	<meta name="twitter:url" content="<?=$current_url?>">
	<meta name="twitter:title" content="<?=$current_category?>">
	<meta name="twitter:description" content="<?=$category_description?>">
	<meta name="twitter:image" content="<?=$image?>"/>
	<meta name="twitter:site" content="@Kafebit">
	<meta name="twitter:creator" content="@Kafebit">
	<!-- End Twitter Card -->
	<!-- Meta tag -->
	<meta name="description" content="<?=$category_description?>">
	<meta name="keywords" content="<?=$tags?>">
	<meta content="Kafebit" property="og:site_name"/>
	<meta content="article" property="og:type"/>
	<meta property="og:url" itemprop="url" content="<?=$current_url?>"/>
	<meta property="og:image" itemprop="thumbnailUrl" content="<?=$image?>"/>
	<meta content="<?=$current_category?>" itemprop="headline" property="og:title"/>
	<meta content="<?=$category_description?>" itemprop="description" property="og:description"/>
	<meta name="copyright" content="Kafebit"/>
	<meta name="author" content="Kafebit"/>
	<meta name="robots" content="index,follow"/>
	<!-- End Meta tag -->
<?php }
function add_meta_tag_tag_page($current_url,$cate){
?>
	<!-- Twitter Card -->
	<meta name="twitter:card" value="summary">
	<meta name="twitter:url" content="<?=$current_url?>">
	<meta name="twitter:title" content="<?=get_bloginfo( 'name', 'display' ); ?>">
	<meta name="twitter:description" content="<?=get_bloginfo( 'description', 'display' ); ?>">
	<meta name="twitter:image" content=""/>
	<meta name="twitter:site" content="@Kafebit">
	<meta name="twitter:creator" content="@Kafebit">
	<!-- End Twitter Card -->
	<!-- Meta tag -->
	<meta name="description" content="<?php bloginfo('description') ?>">
	<meta name="keywords" content="<?=$cate?>">
	<meta content="Kafebit" property="og:site_name"/>
	<meta content="article" property="og:type"/>
	<meta property="og:url" itemprop="url" content="<?=$current_url?>"/>
	<meta property="og:image" itemprop="thumbnailUrl" content=""/>
	<meta content="<?=get_bloginfo( 'name', 'display' ); ?>" itemprop="headline" property="og:title"/>
	<meta content="<?php bloginfo('description') ?>" itemprop="description" property="og:description"/>
	<meta name="copyright" content="Kafebit"/>
	<meta name="author" content="Kafebit"/>
	<meta name="robots" content="index,follow"/>
	<!-- End Meta tag -->
<?php }
function add_meta_tag_home_page($image,$cate){
?>
	<!-- Twitter Card -->
	<meta name="twitter:card" value="summary">
	<meta name="twitter:url" content="<?php bloginfo('url') ?>">
	<meta name="twitter:title" content="<?=get_bloginfo( 'name', 'display' ); ?>">
	<meta name="twitter:description" content="<?=get_bloginfo( 'name', 'display' ).' '.get_bloginfo( 'description', 'display' ); ?>">
	<meta name="twitter:image" content="<?=$image?>"/>
	<meta name="twitter:site" content="@Kafebit">
	<meta name="twitter:creator" content="@Kafebit">
	<!-- End Twitter Card -->
	<!-- Meta tag -->
	<meta name="description" content="<?php bloginfo('description') ?>">
	<meta name="keywords" content="<?=$cate?>">
	<meta content="Kafebit" property="og:site_name"/>
	<meta content="article" property="og:type"/>
	<meta property="og:url" itemprop="url" content="<?php bloginfo('url') ?>"/>
	<meta property="og:image" itemprop="thumbnailUrl" content="<?=$image?>"/>
	<meta content="<?=get_bloginfo( 'name', 'display' ); ?>" itemprop="headline" property="og:title"/>
	<meta content="<?=get_bloginfo( 'name', 'display' ).' '.get_bloginfo( 'description', 'display' );?>" itemprop="description" property="og:description"/>
	<meta name="copyright" content="Kafebit"/>
	<meta name="author" content="Kafebit"/>
	<meta name="robots" content="index,follow"/>
	<!-- End Meta tag -->	
<?php }
add_filter( 'document_title_parts', function( $title )
{	/** Remove tagline from title tag */
    if ( is_home() || is_front_page() )
        unset( $title['tagline'] ); 
    return $title ;
}, 10, 1 );
add_action('wp_head', 'custom_add_meta_tag', 1);
?>
