<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="stylesheet" href="http://twitter.github.com/bootstrap/assets/css/bootstrap.css">
<link rel="stylesheet" href="http://twitter.github.com/bootstrap/assets/css/bootstrap-responsive.css">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link href="<?php bloginfo( 'stylesheet_directory' ); ?>/images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>


    <script src="http://code.jquery.com/jquery-1.6.3.min.js" type="text/javascript"></script>
    <script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/jquery.validationEngine-ru.js" type="text/javascript"></script>
    <script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/jquery.validationEngine.js" type="text/javascript"></script>
    <script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/jquery.tabSlideOut.v1.3.js"></script>
    <script type="text/javascript">
        $(function(){
            $('.slide-out-div').tabSlideOut({
                tabHandle: '.handle',                     //class of the element that will become your tab
                pathToTabImage: '<?php bloginfo( 'stylesheet_directory' ); ?>/images/contact_tab.png', //path to the image for the tab //Optionally can be set using css
                imageHeight: '160px',                     //height of tab image           //Optionally can be set using css
                imageWidth: '40px',                       //width of tab image            //Optionally can be set using css
                tabLocation: 'right',                      //side of screen where tab lives, top, right, bottom, or left
                speed: 300,                               //speed of animation
                action: 'click',                          //options: 'click' or 'hover', action to trigger animation
                topPos: '200px',                          //position from the top/ use if tabLocation is left or right
                leftPos: '20px',                          //position from left/ use if tabLocation is bottom or top
                fixedPosition: true                      //options: true makes it stick(fixed position) on scroll
            });

        });

    </script>
</head>

<body onload="initialize()" <?php body_class(); ?>>
<div id="page" class="hfeed site">
    <div id="alert">

    </div>
	<header id="masthead" class="site-header" role="banner">
		<hgroup>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</hgroup>

        <?php $header_image = get_header_image();
        if ( ! empty( $header_image ) ) : ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
        <?php endif; ?>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<h3 class="menu-toggle"><?php _e( 'Menu', 'twentytwelve' ); ?></h3>
			<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentytwelve' ); ?>"><?php _e( 'Skip to content', 'twentytwelve' ); ?></a>
			<?php
                wp_nav_menu(
                    array( 'theme_location' => 'primary',
                        'menu_class' => 'nav-menu',
                        'walker' => new magomra_walker_nav_menu
                    )
                );
            ?>
		</nav><!-- #site-navigation -->


	</header><!-- #masthead -->

	<div id="main" class="wrapper">
