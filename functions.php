<?php
/**
 * Nextbuild functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package nextbuild
 */

if ( ! function_exists( 'nextbuild_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function nextbuild_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on nextbuild, use a find and replace
		 * to change 'nextbuild' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'nextbuild', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(array(
			'primary-menu' => esc_html__( 'Primary', 'nextbuild' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array( 'video', 'gallery', 'image', 'audio' ) );
		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'nextbuild_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		add_image_size( 'nextbuild-post-thumbnail', 800, 600, true );
		add_image_size( 'nextbuild-latest-post-img', 80, 80, true );
		add_image_size( 'nextbuild-testimonail-img', 277, 279, true );
		add_image_size( 'nextbuild-offer-img', 277, 279, true );
		add_image_size( 'nextbuild-workers-img', 263, 345, true );
		add_image_size( 'nextbuild-homeslider-img', 1920, 800, true );
		add_image_size( 'shop_catalog', 30, 30, true );
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		add_editor_style( 'asset/css/custom-editor-style.css' );
	}
endif;
add_action( 'after_setup_theme', 'nextbuild_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function nextbuild_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'nextbuild_content_width', 640 );
}
add_action( 'after_setup_theme', 'nextbuild_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function nextbuild_widgets_init() {
	register_sidebar(array(
		'name'          => esc_html__( 'Sidebar', 'nextbuild' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'nextbuild' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title"><h4>',
		'after_title'   => '</h4><hr></div>',
	) );

	register_sidebar(array(
		'name'          => esc_html__( 'Footer Sidebar One', 'nextbuild' ),
		'id'            => 'footer-sidebar-one',
		'description'   => esc_html__( 'Add widgets here.', 'nextbuild' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h4>',
		'after_title'   => '</h4><hr></div>',
	) );

	register_sidebar(array(
		'name'          => esc_html__( 'Footer Sidebar Two', 'nextbuild' ),
		'id'            => 'footer-sidebar-two',
		'description'   => esc_html__( 'Add widgets here.', 'nextbuild' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h4>',
		'after_title'   => '</h4><hr></div>',
	) );

	register_sidebar(array(
		'name'          => esc_html__( 'Footer Sidebar Three', 'nextbuild' ),
		'id'            => 'footer-sidebar-three',
		'description'   => esc_html__( 'Add widgets here.', 'nextbuild' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h4>',
		'after_title'   => '</h4><hr></div>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Footer Sidebar Four', 'nextbuild' ),
		'id'            => 'footer-sidebar-four',
		'description'   => esc_html__( 'Add widgets here.', 'nextbuild' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h4>',
		'after_title'   => '</h4><hr></div>',
	) );
}
add_action( 'widgets_init', 'nextbuild_widgets_init' );






/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/next-build-comment.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/next-build-walker-comment.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Next Build Custom Widget
 */
require get_template_directory() . '/inc/widget/latest-post-widget.php';

/**
 * Next Build Custom Widget
 */
if ( class_exists( 'Redux' ) ) {
	require get_template_directory() . '/inc/theme-options.php';
}

if ( ! function_exists( 'nextbuild_fonts_url' ) ) {
	/**
	 * Register custom fonts.
	 */
	function nextbuild_fonts_url() {
		$fonts_url = '';

		/*
		 * Translators: If there are characters in your language that are not
		 * supported by Libre Franklin, translate this to 'off'. Do not translate
		 * into your own language.
		 */
		$libre_franklin = _x( 'on', 'Libre Franklin font: on or off', 'nextbuild' );

		if ( 'off' !== $libre_franklin ) {
			$font_families = array();

			$font_families[] = 'Droid+Serif:400,700,400italic,700italic';
			$font_families[] = 'Oswald:400,700,300';
			$font_families[] = 'Oswald:400,700,300';
			$font_families[] = 'PT+Sans:400,400italic,700,700italic';

			$query_args = array(
				'family' => urlencode( implode( '|', $font_families ) ),
				'subset' => urlencode( 'latin,latin-ext' ),
			);

			$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
		}

		return esc_url_raw( $fonts_url );
	}
}


/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/nextbuild-css-js.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/plugins/required-plugins.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}


if ( function_exists( 'kc_add_map' ) ) {
	global $kc;
	$kc->add_content_type( array( 'post' ) );
}
