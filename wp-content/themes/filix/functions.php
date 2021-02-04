<?php
/**
 * filix functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package filix
 */

if ( ! function_exists( 'filix_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function filix_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on filix, use a find and replace
		 * to change 'filix' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'filix', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
    	add_theme_support( 'post-formats', array('video', 'quote', 'link' ) );

		// This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
			'main-menu' => esc_html__( 'Primary Menu', 'filix' ),
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

		add_theme_support( 'editor-style' );

		/**
		* Add support for Gutenberg.
		*
		* @link https://wordpress.org/gutenberg/handbook/reference/theme-support/
		*/
		add_theme_support( 'gutenberg', array(
		 
		    // Theme supports wide images, galleries and videos.
		    'wide-images' => true,
		 
		    // Make specific theme colors available in the editor.
		    'colors' => array(
		        '#298ef6',
		        '#777777',
		        '#ffffff',
		    ),
		 
		) );

		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'align-wide' );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		// page support
		add_post_type_support( 'page', 'excerpt' );

		// Gutenberg Supports
        add_theme_support( 'align-wide' );
        add_theme_support( 'editor-styles' );
        add_editor_style( 'style-editor.css' );
        add_theme_support( 'responsive-embeds' );

	}
endif;
add_action( 'after_setup_theme', 'filix_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function filix_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'filix_content_width', 1170 );
}
add_action( 'after_setup_theme', 'filix_content_width', 0 );


/**
 * Constants
 * Defining default asset paths
 */
define('FILIX_DIR_CSS', get_template_directory_uri().'/assets/css');
define('FILIX_DIR_JS', get_template_directory_uri().'/assets/js');
define('FILIX_DIR_SASS', get_template_directory_uri().'/assets/sass');
define('FILIX_DIR_IMG', get_template_directory_uri().'/assets/images');
define('FILIX_DIR_FONT', get_template_directory_uri().'/assets/fonts');


/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * Theme's helper functions
 */
require get_template_directory() . '/inc/filix_functions.php';

/**
 * Theme's filters and actions
 */
require get_template_directory() . '/inc/filter_actions.php';

/**
 * Required plugins activation
 */
require get_template_directory() . '/inc/plugin_activation.php';

/**
 * One click Demo Contents
 */
require get_template_directory() . '/inc/demo_config.php';

/**
 * Bootstrap Nav Walker
 */
require get_template_directory() . '/inc/navwalker.php';

require get_template_directory() . '/inc/navwalker_two.php';

/**
 * Register Sidebar Areas
 */
require get_template_directory() . '/inc/sidebars.php';

/**
 * Theme Options - Redux
 */
require get_template_directory() . '/options/opt-config.php';
