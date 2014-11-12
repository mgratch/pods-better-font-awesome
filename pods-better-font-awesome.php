<?php
/**
 * Pods Better Font Awesome
 *
 * @package   Pods Better Font Awesome
 * @author    Marc Gratch <me@marcgratch.com>
 * @license   GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name:       Pods Better Font Awesome
 * Plugin URI:        
 * Description:       The ultimate Font Awesome icon plugin for WordPress adapted for the pods framework.
 * Version:           1.0
 * Author:            Marc Gratch
 * Author URI:        me@marcgratch.com
 * License:           GPLv2+
 * Text Domain:       pbfa
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/mgratch/pods-better-font-awesome/
 */

define( 'PODS_EXTEND_DIR', plugin_dir_path( __FILE__ ) );

function pods_font_awesome_scripts() {
	wp_enqueue_style( 'pods-extend-admin-styles', plugins_url( 'css/admin.css', __FILE__ ) );		
}

add_action( 'plugins_loaded', 'slug_extend_safe_activate');
function slug_extend_safe_activate() {

	if ( defined( 'PODS_VERSION' ) ) {
	    pods_register_field_type( 'cpick', PODS_EXTEND_DIR . '/classes/pods_extend_field.php' );
        add_action( 'admin_enqueue_scripts', 'pods_font_awesome_scripts' );
	}
	
}
?>