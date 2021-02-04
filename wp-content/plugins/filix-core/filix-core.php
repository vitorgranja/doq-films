<?php
/**
 * Plugin Name: Filix Core
 * Plugin URI: https://themeforest.net/user/droitthemes/portfolio
 * Description: This plugin adds the core features to the Filix WordPress theme. You must have to install this plugin to get all the features included with the theme.
 * Version: 1.2.5
 * Author: DroitThemes
 * Author URI: https://themeforest.net/user/droitthemes/portfolio
 * Text domain: filix-core
 */

if ( !defined('ABSPATH') )
    die('-1');


// Make sure the same class is not loaded twice in free/premium versions.
if ( !class_exists( 'Filix_core' ) ) {
	/**
	 * Main Filix Core Class
	 *
	 * The main class that initiates and runs the Filix Core plugin.
	 *
	 * @since 1.7.0
	 */
	final class Filix_core {
		/**
		 * Filix Core Version
		 *
		 * Holds the version of the plugin.
		 *
		 * @since 1.7.0
		 * @since 1.7.1 Moved from property with that name to a constant.
		 *
		 * @var string The plugin version.
		 */
		const VERSION = '1.0' ;
		/**
		 * Minimum Elementor Version
		 *
		 * Holds the minimum Elementor version required to run the plugin.
		 *
		 * @since 1.7.0
		 * @since 1.7.1 Moved from property with that name to a constant.
		 *
		 * @var string Minimum Elementor version required to run the plugin.
		 */
		const MINIMUM_ELEMENTOR_VERSION = '1.7.0';
		/**
		 * Minimum PHP Version
		 *
		 * Holds the minimum PHP version required to run the plugin.
		 *
		 * @since 1.7.0
		 * @since 1.7.1 Moved from property with that name to a constant.
		 *
		 * @var string Minimum PHP version required to run the plugin.
		 */
		const  MINIMUM_PHP_VERSION = '5.4' ;
        /**
         * Plugin's directory paths
         * @since 1.0
         */
        const CSS = null;
        const JS = null;
        const IMG = null;
        const VEND = null;

		/**
		 * Instance
		 *
		 * Holds a single instance of the `Filix_Core` class.
		 *
		 * @since 1.7.0
		 *
		 * @access private
		 * @static
		 *
		 * @var Filix_Core A single instance of the class.
		 */
		private static  $_instance = null ;
		/**
		 * Instance
		 *
		 * Ensures only one instance of the class is loaded or can be loaded.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 * @static
		 *
		 * @return Filix_Core An instance of the class.
		 */
		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}

		/**
		 * Clone
		 *
		 * Disable class cloning.
		 *
		 * @since 1.7.0
		 *
		 * @access protected
		 *
		 * @return void
		 */
		public function __clone() {
			// Cloning instances of the class is forbidden
			_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'filix-core' ), '1.7.0' );
		}

		/**
		 * Wakeup
		 *
		 * Disable unserializing the class.
		 *
		 * @since 1.7.0
		 *
		 * @access protected
		 *
		 * @return void
		 */
		public function __wakeup() {
			// Unserializing instances of the class is forbidden.
			_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'filix-core' ), '1.7.0' );
		}

		/**
		 * Constructor
		 *
		 * Initialize the Filix Core plugins.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 */
		public function __construct() {
			$this->core_includes();
			$this->init_hooks();
			do_action( 'filix_core_loaded' );
		}

		/**
		 * Include Files
		 *
		 * Load core files required to run the plugin.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 */
		public function core_includes() {
			// Extra functions
			require_once __DIR__ . '/inc/extra.php';
			require_once __DIR__ . '/inc/changelogs.php';

			// Custom post types
			require_once __DIR__ . '/post-type/portfolio.pt.php';
			require_once __DIR__ . '/post-type/service.pt.php';
			require_once __DIR__ . '/post-type/none.pt.php';
			require_once __DIR__ . '/post-type/job.pt.php';


            /**
             * Register widget area.
             *
             * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
             */
			require_once __DIR__ . '/wp-widgets/widgets.php';

            // RGBA color picker
            //require plugin_dir_path(__FILE__) . '/acf-rgba-color-picker/acf-rgba-color-picker.php';

            // ACF Metaboxes
            require plugin_dir_path(__FILE__) . '/inc/metaboxes.php';
		}

		/**
		 * Init Hooks
		 *
		 * Hook into actions and filters.
		 *
		 * @since 1.7.0
		 *
		 * @access private
		 */
		private function init_hooks() {
			add_action( 'init', [ $this, 'i18n' ] );
			add_action( 'plugins_loaded', [ $this, 'init' ] );
		}

		/**
		 * Load Textdomain
		 *
		 * Load plugin localization files.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 */
		public function i18n() {
			load_plugin_textdomain( 'filix-core', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
		}


		/**
		 * Init Filix Core
		 *
		 * Load the plugin after Elementor (and other plugins) are loaded.
		 *
		 * @since 1.0.0
		 * @since 1.7.0 The logic moved from a standalone function to this class method.
		 *
		 * @access public
		 */
		public function init() {

			if ( !did_action( 'elementor/loaded' ) ) {
				add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
				return;
			}

			// Check for required Elementor version

			if ( !version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
				add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
				return;
			}

			// Check for required PHP version

			if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
				add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
				return;
			}

			// Add new Elementor Categories
			add_action( 'elementor/init', [ $this, 'add_elementor_category' ] );

			// Register Widget Scripts
			add_action( 'elementor/frontend/after_register_scripts', [ $this, 'register_widget_scripts' ] );
			add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'register_widget_scripts' ] );

			// Register Widget Style
			add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'enqueue_widget_styles' ] );
			add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'enqueue_widget_styles' ] );
			add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_widget_styles' ] );

			// Register New Widgets
			add_action( 'elementor/widgets/widgets_registered', [ $this, 'on_widgets_registered' ] );
		}

		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have Elementor installed or activated.
		 *
		 * @since 1.1.0
		 * @since 1.7.0 Moved from a standalone function to a class method.
		 *
		 * @access public
		 */
		public function admin_notice_missing_main_plugin() {
			$message = sprintf(
			/* translators: 1: Filix Core 2: Elementor */
				esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'filix-core' ),
				'<strong>' . esc_html__( 'Filix core', 'filix-core' ) . '</strong>',
				'<strong>' . esc_html__( 'Elementor', 'filix-core' ) . '</strong>'
			);
			printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
		}

		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have a minimum required Elementor version.
		 *
		 * @since 1.1.0
		 * @since 1.7.0 Moved from a standalone function to a class method.
		 *
		 * @access public
		 */
		public function admin_notice_minimum_elementor_version() {
			$message = sprintf(
			/* translators: 1: Filix Core 2: Elementor 3: Required Elementor version */
				esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'filix-core' ),
				'<strong>' . esc_html__( 'Filix Core', 'filix-core' ) . '</strong>',
				'<strong>' . esc_html__( 'Elementor', 'filix-core' ) . '</strong>',
				self::MINIMUM_ELEMENTOR_VERSION
			);
			printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
		}

		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have a minimum required PHP version.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 */
		public function admin_notice_minimum_php_version() {
			$message = sprintf(
			/* translators: 1: Filix Core 2: PHP 3: Required PHP version */
				esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'filix-core' ),
				'<strong>' . esc_html__( 'Filix Core', 'filix-core' ) . '</strong>',
				'<strong>' . esc_html__( 'PHP', 'filix-core' ) . '</strong>',
				self::MINIMUM_PHP_VERSION
			);
			printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
		}

		/**
		 * Add new Elementor Categories
		 *
		 * Register new widget categories for Filix Core widgets.
		 *
		 * @since 1.0.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access public
		 */
		public function add_elementor_category() {
			\Elementor\Plugin::instance()->elements_manager->add_category( 'filix-elements', [
				'title' => __( 'Filix Elements', 'filix-core' ),
			], 1 );


		}

		/**
		 * Register Widget Scripts
		 *
		 * Register custom scripts required to run Filix Core.
		 *
		 * @since 1.6.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access public
		 */
		public function register_widget_scripts() {

		   // wp_register_script('isotope', plugins_url( 'assets/js/isotope.pkgd.min.js', __FILE__ ), 'jquery', '0.5', true);
            wp_register_script('universal-tilt', plugins_url( 'assets/js/universal-tilt.js', __FILE__ ), 'jquery', '0.5', true);

            wp_register_script('imagesloaded', plugins_url( 'assets/js/imagesloaded.pkgd.min.js', __FILE__ ), 'jquery', '3.2.0', true);

            wp_register_script('particles', plugins_url( 'assets/js/particles.js', __FILE__ ), 'jquery', '2.0.0', true);

		}

		/**
		 * Register Widget Styles
		 *
		 * Register custom styles required to run Filix Core.
		 *
		 * @since 1.7.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access public
		 */

		public function enqueue_widget_styles() {

            //wp_enqueue_style('filix-flaticon', plugins_url( 'assets/font/flaticon.css', __FILE__ ));

		}


		/*public function register_admin_styles() {
            wp_enqueue_style( 'filix_core_admin', plugins_url( 'assets/css/filix-core-admin.css', __FILE__ ) );
        }*/

		/**
		 * Register New Widgets
		 *
		 * Include Filix Core widgets files and register them in Elementor.
		 *
		 * @since 1.0.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access public
		 */
		public function on_widgets_registered() {
			$this->include_widgets();
			$this->register_widgets();
		}

		/**
		 * Include Widgets Files
		 *
		 * Load Filix Core widgets files.
		 *
		 * @since 1.0.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access private
		 */
		private function include_widgets() {
			require_once __DIR__ . '/widgets/Filix_hero.php';

			require_once __DIR__ . '/widgets/Filix_portfolio.php';

			require_once __DIR__ . '/widgets/Filix_about.php';

			require_once __DIR__ . '/widgets/Filix_capabilities.php';

			require_once __DIR__ . '/widgets/Filix_testimonial.php';

			require_once __DIR__ . '/widgets/Filix_client_logos.php';

			require_once __DIR__ . '/widgets/Filix_interest.php';

			require_once __DIR__ . '/widgets/Filix_contact.php';

            require_once __DIR__ . '/widgets/Filix_jobs.php';

            require_once __DIR__ . '/widgets/Filix_portfolio_filterable.php';
        }

		/**
		 * Register Widgets
		 *
		 * Register Filix Core widgets.
		 *
		 * @since 1.0.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access private
		 */
		private function register_widgets() {
			// Site Elements
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \FilixCore\Widgets\Filix_hero() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \FilixCore\Widgets\Filix_portfolio() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \FilixCore\Widgets\Filix_about() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \FilixCore\Widgets\Filix_capabilities() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \FilixCore\Widgets\Filix_testimonial() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \FilixCore\Widgets\Filix_client_logos() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \FilixCore\Widgets\Filix_interest() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \FilixCore\Widgets\Filix_contact() );

            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \FilixCore\Widgets\Filix_jobs() );

            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \FilixCore\Widgets\Filix_portfolio_filterable() );
		}
	}
}
// Make sure the same function is not loaded twice in free/premium versions.

if ( !function_exists( 'filix_core_load' ) ) {
	/**
	 * Load Filix Core
	 *
	 * Main instance of Filix_Core.
	 *
	 * @since 1.0.0
	 * @since 1.7.0 The logic moved from this function to a class method.
	 */
	function filix_core_load() {
		return Filix_core::instance();
	}

	// Run Filix Core
    filix_core_load();
}

