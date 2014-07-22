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
	 * Allowed wrapper variables used in shortcode attributes
	 *
	 * @since	2.0.0
	 * @return	array()
	 */
	protected $allowed_wrappers = array( 'div', 'span', 'i', 'p', 'a', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' );

	/**
	 * Load the plugin actions and filters
	 *
	 * @since     1.0.0
	 */
	private function __construct() {

		// Get them there shortcodes
		add_action( 'init', array( $this, 'gingerbeard_genesis_shortcodes' ) );

		// Get that there shortcode stylin'
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );

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
	 * Register and enqueue public-facing style sheet.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_slug . '-plugin-styles', plugins_url( 'assets/css/base-style.css', __FILE__ ), array(), self::VERSION );
	}

	/**
	 * Build Accordion Shortcode Wrapper
	 *
	 * @since 2.0.0
	 */
	public function accordion_shortcode_wrapper( $atts, $content = 'null' ) {
		ob_start();

		// Load necessary scripts only when shortcode is used
		wp_enqueue_script( 'jquery-ui-accordion' );
		wp_enqueue_script( 'gb-accordion', plugins_url( 'assets/js/accordion.js', __FILE__ ), array('jquery'), 1.0, true );
		?>

		<div class="gb-accordion">
			<?php echo do_shortcode($content); ?>
		</div>

		<?php
		$gb_accordion_wrapper = ob_get_clean();
		return $gb_accordion_wrapper;
	}

	/**
	 * Build Accordion Shortcode Sections
	 *
	 * @since 2.0.0
	 */
	public function accordion_shortcode_section( $atts, $content = 'null' ) {
		extract( shortcode_atts( array(
			'title' => '',
			'wrapper' => 'h4'
			),
		$atts, 'gb_accordion_section' ) );

		ob_start();

		if( in_array( $wrapper, $this->allowed_wrappers ) )	{
			$wrapper = $wrapper;
		} else {
			$wrapper = 'h4';
		}
		?>
			<<?php echo $wrapper; ?> class="gb-accordion-trigger"><?php echo $title; ?></<?php echo $wrapper;?>>
			<div class="gb-accordion-content">
				<?php
					do_action( 'gb_before_accordion_content');
					echo do_shortcode($content);
					do_action( 'gb_after_accordion_content' );
				?>
			</div>
		<?php
		$gb_accordion_section = ob_get_clean();
		return str_replace( '<p></p>', '', $gb_accordion_section );
	}

	/**
	 * Build Clear Shortcode
	 *
	 * @since 2.0.0
	 */
	public function clear_shortcode() {
		$clear = '<div class="clear"></div>';

		return $clear;
	}

	/**
	 * Build Column Shortcode
	 *
	 * @since    1.0.0
	 */
	public function columns_shortcode( $atts, $content = 'null' ) {
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

    	return wpautop( $genesis_column );

	}

	/**
	 * Build Tabs Shortcode Wrapper
	 *
	 * @since 2.0.0
	 */
	public function tabs_shortcode_wrapper( $atts, $content = 'null' ) {
		ob_start();

		// Load necessary scripts only when shortcode is used
		wp_enqueue_script( 'jquery-ui-tabs' );
		wp_enqueue_script( 'gb-tabs', plugins_url( 'assets/js/tabs.js', __FILE__ ), array('jquery'), 1.0, true );
		?>

		<div class="gb-tabs">
			<ul class="tab-labels">
			</ul>
			<?php echo do_shortcode($content); ?>
		</div>

		<?php
		$gb_tabs_wrapper = ob_get_clean();
		return $gb_tabs_wrapper;
	}

	/**
	 * Build Tabs Shortcode Section
	 *
	 * @since 2.0.0
	 */
	public function tabs_shortcode_section( $atts, $content = 'null' ) {
		extract( shortcode_atts( array(
			'title' => '',
		),
		$atts, 'gb_tab_section' ) );

		$tab_id = preg_replace('/\s/', '-', $title );
		$tab_id = strtolower($tab_id);

		ob_start(); ?>

			<li class="tab"><a href="#<?php echo $tab_id;?>"><?php echo $title;?></a></li>
			<div id="<?php echo $tab_id;?>" class="gb-tab-content">
				<?php
					do_action( 'gb_before_tab_content');
					echo do_shortcode($content);
					do_action( 'gb_after_tab_content' );
				?>
			</div>

		<?php
		$genesis_tab_section = ob_get_clean();
		return $genesis_tab_section;
	}

	/**
	 * Build Toggle Shortcode
	 *
	 * @since	2.0.0
	 */
	public function toggle_shortcode( $atts, $content = 'null' ) {
		extract( shortcode_atts( array(
			'title' => '',
			'wrapper' => 'h4'
		),
		$atts, 'gb_toggle' ) );

		ob_start();

		// Load necessary scripts only when shortcode is used
		wp_enqueue_script( 'gb-toggle', plugins_url( 'assets/js/toggle.js', __FILE__ ), array('jquery'), 1.0, true );

		// Check to see if chosen wrapper is allowed. If not, default to h4
		if( in_array( $wrapper, $this->allowed_wrappers ) )	{
			$wrapper = $wrapper;
		} else {
			$wrapper = 'h4';
		}
		?>


			<div class="gb-toggle">
				<<?php echo $wrapper;?> class="gb-toggle-trigger"><?php echo $title;?></<?php echo $wrapper; ?>>
				<div class="gb-toggle-content">
					<?php
						do_action( 'gb_before_toggle_content');
						echo do_shortcode($content);
						do_action( 'gb_after_toggle_content' );
					?>
				</div>
			</div>

		<?php
		$genesis_toggle = ob_get_clean();

		return wpautop( $genesis_toggle );
	}

	/**
	 * Genesis Shortcodes
	 *
	 * @since    1.0.0
	 */
	public function gingerbeard_genesis_shortcodes() {
		add_shortcode('gb_accordion_wrapper', array( $this, 'accordion_shortcode_wrapper' ) );
		add_shortcode('gb_accordion_section', array( $this, 'accordion_shortcode_section' ) );
		add_shortcode('clear', array( $this, 'clear_shortcode' ) );
		add_shortcode('genesis_column', array( $this, 'columns_shortcode' ) );
		add_shortcode('gb_tabs_wrapper', array( $this, 'tabs_shortcode_wrapper' ) );
		add_shortcode('gb_tab', array( $this, 'tabs_shortcode_section' ) );
		add_shortcode('gb_toggle', array( $this, 'toggle_shortcode' ) );
	}

}
