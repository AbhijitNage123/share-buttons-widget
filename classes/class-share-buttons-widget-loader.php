<?php
namespace ShareButtonsWidgets;

/**
 * Class Share_Button_widget
 *
 * Main Plugin class
 *
 * @since 1.2.0
 */
class Share_Button_widget_Loader {

	/**
	 * Instance
	 *
	 * @since 1.2.0
	 * @access private
	 * @static
	 *
	 * @var Share_Button_widget The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.2.0
	 * @access public
	 *
	 * @return Share_Button_widget An instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * widget_scripts
	 *
	 * Load required plugin core files.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function widget_scripts() {
		// wp_register_script( 'asbw-uae', plugins_url( '/assets/js/social-window.js', __FILE__ ), [ 'jquery' ], false, true );
		// wp_register_script( 'cswp-image-upload', CSWP_PLUGIN_URL . 'assets/js/cs_image_upload.js', array( 'jquery' ), CSWP_CURRENCY_SWITCHER_VER, true );
		wp_register_script( 'elementor-hello-world', ASBW_BASE_URL . '/assets/js/hello-world.js', [ 'jquery' ], ASBW_BASE_VERSION, true );
		/*wp_localize_script(
			'uae-popup-window',
			'uae_url',
			array(
				'cswp_get_button_value' => $cswp_get_button_value,
			),
			true
		);*/
	}

	/**
	 * Include Widgets files
	 *
	 * Load widgets files
	 *
	 * @since 1.2.0
	 * @access private
	 */
	private function include_widgets_files() {
		require ASBW_BASE_DIR . '/widgets/class-advanced-share-buttons-widget.php';
	}

	/**
	 * Register Widgets
	 *
	 * Register new Elementor widgets.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function register_widgets() {
		// Its is now safe to include Widgets files
		$this->include_widgets_files();

		// Register Widgets
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Advanced_Share_Buttons_Widget() );
	}

	/**
	 *  Share_Button_widget class constructor
	 *
	 * Register Share_Button_widget action hooks and filters
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function __construct() {

		// Register widget scripts
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );

		// Register widgets
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
				$this->define_constants();
	}
	/**
	 * Define constants.
	 *
	 * @since 1.0
	 * @return void
	 */
	private function define_constants() {
		$file = dirname( dirname( __FILE__ ) );
		define( 'ASBW_BASE_VERSION', '1.0.0' );
		define( 'ASBW_BASE_DIR_NAME', plugin_basename( $file ) );
		define( 'ASBW_BASE_FILE', trailingslashit( $file ) . ASBW_BASE_DIR_NAME . '.php' );
		define( 'ASBW_BASE_DIR', plugin_dir_path( ASBW_BASE_FILE ) );
		define( 'ASBW_BASE_URL', plugins_url( '/', ASBW_BASE_FILE ) );
	}
}

// Instantiate Share_Button_widget Class
Share_Button_widget_Loader::instance();
