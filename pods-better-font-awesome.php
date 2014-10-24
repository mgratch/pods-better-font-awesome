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

require_once ( dirname( __FILE__ ) . '/better-font-awesome-library/better-font-awesome-library.php' );
// Initialize the library with custom args.
Better_Font_Awesome_Library::get_instance();

// Get the active Better Font Awesome Library Object.
$my_bfa = Better_Font_Awesome_Library::get_instance();

// Get info on the Better Font Awesome Library object.
var_dump($my_bfa->get_version());
var_dump($my_bfa->get_stylesheet_url());
var_dump($my_bfa->get_prefix());
var_dump($my_bfa->get_icons());

?>
