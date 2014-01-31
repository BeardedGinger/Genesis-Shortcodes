<?php
/**
 * Plugin class for the public views of the Genesis Shortcode plugin
 *
 */
class GingerBeard_Genesis_Shortcodes {

	/**
	 * Plugin version, used for cache-busting of style and script file references.
	 *
	 * @since   1.0.0
	 *
	 * @var     string
	 */
	const VERSION = '1.0.0';

	/**
	 * The variable name is used as the text domain when internationalizing strings
	 * of text. Its value should match the Text Domain file header in the main
	 * plugin file.
	 *
	 * @since    1.0.0
	 *
	 * @var      string
	 */
	protected $plugin_slug = 'gingerbeard-shortcodes';

	/**
	 * Instance of this class.
	 *
	 * @since    1.0.0
	 *
	 * @var      object
	 */
	protected static $instance = null;

	/**
	 * Load the plugin actions and filters
	 *
	 * @since     1.0.0
	 */
	private function __construct() {

		add_action( 'init', array( $this, 'gingerbeard_genesis_shortcodes' ) );
	}

	/**
	 * Return the plugin slug.
	 *
	 * @since    1.0.0
	 *
	 * @return    Plugin slug variable.
	 */
	public function get_plugin_slug() {
		return $this->plugin_slug;
	}

	/**
	 * Return an instance of this class.
	 *
	 * @since     1.0.0
	 *
	 * @return    object    A single instance of this class.
	 */
	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}
	
	/**
	 *Genesis Shortcodes Build
	 *
	 * @since    1.0.0
	 */
	public function gingerbeard_genesis_shortcode_build( $atts, $content = 'null' ) {
		extract( shortcode_atts( array(
        	'size' => '',
        	'position' => ''
        	),
    	$atts, 'genesis_column' ) );
    	
    	$genesis_column_atts = $size;
    	
    	if ( $position == 'first' ) {
    		$genesis_column_atts .= ' first';
    	}
    	
    	$genesis_column = '<div class="'.$genesis_column_atts.'">'.do_shortcode($content).'</div>';
    	
    	return $genesis_column;
	
	}
	/**
	 * Genesis Shortcodes
	 *
	 * @since    1.0.0
	 */
	public function gingerbeard_genesis_shortcodes() {
		add_shortcode('genesis_column', array( $this, 'gingerbeard_genesis_shortcode_build' ) );
	}

}
