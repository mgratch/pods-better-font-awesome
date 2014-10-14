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
 * GitHub Plugin URI: https://github.com/MickeyKay/better-font-awesome
 */

add_action( 'plugins_loaded', 'lwi_pods_load_bfa', 1 );
/** 
 * Initialize the Better Font Awesome Library.
 */
function lwi_pods_load_bfa() {

    // Include the main library file. Make sure to modify the path to match your directory structure.
    require_once ( dirname( __FILE__ ) . '/better-font-awesome-library/better-font-awesome-library.php' );

    // Set the library initialization args (defaults shown).
    $args = array(
            'version' => 'latest',
            'minified' => true,
            'remove_existing_fa' => false,
            'load_styles'             => true,
            'load_admin_styles'       => true,
            'load_shortcode'          => true,
            'load_tinymce_plugin'     => true,
    );

    // Initialize the Better Font Awesome Library.
    $bfa_new = Better_Font_Awesome_Library::get_instance( $args );
    var_dump($bfa_new->get_stylesheet_url());
}

if (!is_admin()):
    function get_icon_list() {
        //var_dump($bfa_new);
    }

    //print_r(get_icon_list()->$bfa_new);
endif;
?>