<?php
/**
 * Theme Header Section for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main" class="clearfix"> <div class="inner-wrap">
 *
 * @package ThemeGrill
 * @subpackage ColorMag
 * @since ColorMag 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
/**
 * This hook is important for wordpress plugins and other many things
 */

wp_head();
?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-101949687-1', 'auto');
  ga('send', 'pageview');

</script>
</head>

<body <?php body_class(); ?>>
<?php	do_action( 'colormag_before' ); ?>
<div id="page" class="hfeed site">
<?php if( is_active_sidebar( 'colormag_top_header_sidebar' ) ) {?>
<?php
	// Calling the header sidebar if it exists.
	if ( !dynamic_sidebar( 'colormag_top_header_sidebar' ) ):
	endif;
?>
	</div>
<?php } ?>
	<?php do_action( 'colormag_before_header' ); ?>
	<header id="masthead" class="site-header clearfix">
		<div id="header-text-nav-container" class="clearfix">
         <?php if ( get_theme_mod( 'colormag_breaking_news', 0 ) == 1 || get_theme_mod( 'colormag_date_display', 0 ) == 1 || get_theme_mod( 'colormag_social_link_activate', 0 ) == 1 ) : ?>
            <div class="news-bar">
               <div class="inner-wrap clearfix">
                  <?php if (get_theme_mod('colormag_date_display', 0) == 1)
                     colormag_date_display();
                  ?>

                  <?php if (get_theme_mod('colormag_breaking_news', 0) == 1)
                     colormag_breaking_news();
                  ?>

                  <?php if( get_theme_mod( 'colormag_social_link_activate', 0 ) == 1 ) { echo'<section><a href="http://kafebit.com/vn" style="float: right;max-height: 20px;"><ii class="icon"><img stype="margin-left:20px;" src="http://kafebit.com/wp-content/uploads/2017/06/vietnam-1.png"></ii></a><a href="http://kafebit.com/" style="float: right;margin-right: 6px;max-height: 20px;"><i class="icon"><img src="http://kafebit.com/wp-content/uploads/2017/06/united-states.png"></i></a></section>'; } ?>
               </div>
            </div>
         <?php endif; ?>

			<?php if (get_theme_mod('colormag_header_image_position', 'position_two') == 'position_one') { colormag_render_header_image(); } ?>

			<div >

				<div id="header-text-nav-wrap" class="clearfix">
					<div id="header-left-section">
						<?php
						if((get_theme_mod('colormag_header_logo_placement', 'header_text_only') == 'show_both' || get_theme_mod('colormag_header_logo_placement', 'header_text_only') == 'header_logo_only')) {
						?>
							<div id="header-logo-image">
								<?php if (get_theme_mod('colormag_logo', '') != '') { ?>
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo esc_url(get_theme_mod('colormag_logo')); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
								<?php } ?>

								<?php if (function_exists('the_custom_logo') && has_custom_logo( $blog_id = 0 )) {
									colormag_the_custom_logo();
								} ?>
							</div><!-- #header-logo-image -->
						<?php
						}
                  $screen_reader = '';
                  if ( get_theme_mod( 'colormag_header_logo_placement', 'header_text_only' ) == 'header_logo_only' || (get_theme_mod( 'colormag_header_logo_placement', 'header_text_only' ) == 'disable' )) {
                     $screen_reader = 'screen-reader-text';
                  }
						?>
						<div id="header-text" class="<?php echo $screen_reader; ?>">
                     <?php if ( is_front_page() || is_home() ) : ?>
   							<h1 id="site-title">
   								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
   							</h1>
                     <?php else : ?>
                        <h3 id="site-title">
                           <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                        </h3>
                     <?php endif; ?>
							<?php
                     $description = get_bloginfo( 'description', 'display' );
                     if ( $description || is_customize_preview() ) : ?>
                        <p id="site-description"><?php echo $description; ?></p>
                     <?php endif;?><!-- #site-description -->
						</div><!-- #header-text -->
					</div><!-- #header-left-section -->
					<div id="header-right-section">
						<?php
						if( is_active_sidebar( 'colormag_header_sidebar' ) ) {
						?>
						<div id="header-right-sidebar" class="clearfix">
						<?php
							// Calling the header sidebar if it exists.
							if ( !dynamic_sidebar( 'colormag_header_sidebar' ) ):
							endif;
						?>
						</div>
						<?php
						}
						?>
			    	</div><!-- #header-right-section -->

			   </div><!-- #header-text-nav-wrap -->

			</div><!-- .inner-wrap -->

			<?php if( get_theme_mod( 'colormag_header_image_position', 'position_two' ) == 'position_two' ) { colormag_render_header_image(); } ?>

			<nav id="site-navigation" class="main-navigation clearfix" role="navigation">
				<div class="inner-wrap clearfix">
					<?php
               if ( get_theme_mod( 'colormag_home_icon_display', 0 ) == 1 ) {
                  if ( is_front_page() ) {
                     $home_icon_class = 'home-icon front_page_on';
                  } else {
                     $home_icon_class = 'home-icon';
                  }
                  ?>
                  <div class="<?php echo $home_icon_class; ?>">
                     <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><i class="fa fa-home"></i></a>
                  </div>
                  <?php
               }
               ?>
               <h4 class="menu-toggle"></h4>
               <?php
               if ( has_nav_menu( 'primary' ) ) {
                  wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'menu-primary-container', 'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>' ) );
               }
					else {
						wp_page_menu();
					}
					?>
               <?php if ( get_theme_mod( 'colormag_random_post_in_menu', 0 ) == 1 ) { ?>
                  <?php colormag_random_post(); ?>
               <?php } ?>
			   <!-- orginal code -->
               <?php /*if ( get_theme_mod( 'colormag_search_icon_in_menu', 0 ) == 1 ) {*/ ?>
                  <!--<i class="fa fa-search search-top"></i>
                  <div class="search-form-top">-->
                     <?php /*get_search_form(); */?>
                  <!--</div>-->
               <?php/* }*/ ?>
			   <!-- orginal code -->
			   <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
			   <label>
        			<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
        			<input style="margin-top: 6px;border-radius: 5px;width: 240px;" type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Tìm kiếm …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
    			</label>
				</form>
				</div>
			</nav>

		</div><!-- #header-text-nav-container -->

		<?php if( get_theme_mod( 'colormag_header_image_position', 'position_two' ) == 'position_three' ) { colormag_render_header_image(); } ?>

	</header>
	<?php do_action( 'colormag_after_header' ); ?>
	<?php do_action( 'colormag_before_main' ); ?>
	<div id="main" class="clearfix">
		<div class="inner-wrap clearfix">