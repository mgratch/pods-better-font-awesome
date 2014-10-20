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

add_action( 'plugins_loaded', 'lwi_pods_load_bfa',10 );
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
            'remove_existing_fa'      => true,
            'load_styles'             => true,
            'load_admin_styles'       => true,
            'load_shortcode'          => true,
            'load_tinymce_plugin'     => true,
    );

    // Initialize the Better Font Awesome Library.
    // Initialize the library with custom args.
    Better_Font_Awesome_Library::get_instance( $args );

    // Get the active Better Font Awesome Library Object.
    $my_bfa = Better_Font_Awesome_Library::get_instance($args);

    // Get info on the Better Font Awesome Library object.
    $version = $my_bfa->get_version();
    $stylesheet_url = $my_bfa->get_stylesheet_url();
    $prefix = $my_bfa->get_prefix();
    $icons = $my_bfa->get_icons();

    //Dump BFA Library Object - This Works
    var_dump(Better_Font_Awesome_Library::get_instance( $args ));

    //Break
    echo '<br><hr><br>';

    //Dump BFA Library Object - This Works
    var_dump($my_bfa);

    //Break
    echo '<br><hr><br>';
    
    //Dump specific info from the Better Font Awesome Library Object - This Doesn't Work
    var_dump($stylesheet_url);
    
    // Output all available icons. - This Doesn't Work
    foreach ( $icons as $icon ) {
        echo $icon . '<br />';
    }



}

if (!is_admin()):
    //global $bfa_new;
    //var_dump($bfa_new);
    //print_r(get_icon_list()->$bfa_new);
endif;
?>