<?php
/**
 * Plugin Name:       GingerBeard Genesis Shortcodes
 * Plugin URI:        http://github.com/BeardedGinger/Genesis-Shortcodes
 * Description:       Adds basic shortcodes for columns that output the included column classes found in the Genesis Framework
 * Version:           1.0.0
 * Author:            Josh Mallard
 * Author URI:        http://joshmallard.com
 * Text Domain:       gingerbeard-shortcodes
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: http://github.com/BeardedGinger/Genesis-Shortcodes
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/

require_once( plugin_dir_path( __FILE__ ) . 'public/class-genesis-shortcodes.php' );
add_action( 'plugins_loaded', array( 'GingerBeard_Genesis_Shortcodes', 'get_instance' ) );

/*----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 *----------------------------------------------------------------------------*/

if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {

	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-genesis-shortcodes-admin.php' );
	add_action( 'plugins_loaded', array( 'GingerBeard_Genesis_Shortcodes_Admin', 'get_instance' ) );

}
