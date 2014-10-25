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

add_action( 'plugins_loaded', 'lwi_pods_load_bfa', 4 );
/** 
 * Initialize the Better Font Awesome Library.
 */
function lwi_pods_load_bfa() {

    // Include the main library file. Make sure to modify the path to match your directory structure.
    require_once ( dirname( __FILE__ ) . '/better-font-awesome-library/better-font-awesome-library.php' );

    // Initialize the Better Font Awesome Library.
        $my_bfa = Better_Font_Awesome_Library::get_instance();
        $my_bfa->load();
        $icons = $my_bfa->get_icons();
        echo '<span style="position:absolute;top:middle;left:50%;"><select name="icon" id="iconList">';
        foreach ($icons as $icon){
            echo "<option value='icon-{$icon}'><i class='fa-{$icon}'></i></option>";
        }
        echo '</select></span>';
}

?>