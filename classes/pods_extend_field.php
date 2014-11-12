<?php
/**
 * @package Pods\Fields
 */
class PodsField_cpick extends PodsField {

    /**
     * Field Type Group
     *
     * @var string
     * @since 2.0
     */
    public static $group = 'Other';

    /**
     * Field Type Identifier
     *
     * @var string
     * @since 2.0
     */
    public static $type = 'cpick';

    /**
     * Field Type Label
     *
     * @var string
     * @since 2.0
     */
    public static $label = 'Font Awesome';

    /**
     * Available Related Objects
     *
     * @var array
     * @since 2.3
     */
    public static $related_objects = array();

    /**
     * Custom Related Objects
     *
     * @var array
     * @since 2.3
     */
    public static $custom_related_objects = array();

    /**
     * Data used during validate / save to avoid extra queries
     *
     * @var array
     * @since 2.3
     */
    public static $related_data = array();

    /**
     * Data used during input method (mainly for autocomplete)
     *
     * @var array
     * @since 2.3
     */
    public static $field_data = array();

    /**
     * API caching for fields that need it during validate/save
     *
     * @var \PodsAPI
     * @since 2.3
     */
    protected static $api = false;

    /**
     * Setup related objects list
     *
     * @since 2.0
     */
    public function __construct () {

    }

    /**
     * Add admin_init actions
     *
     * @since 2.3
     */
    public function admin_init () {
        // AJAX for Relationship lookups
        //add_action( 'wp_ajax_pods_relationship', array( $this, 'admin_ajax_relationship' ) );
        //add_action( 'wp_ajax_nopriv_pods_relationship', array( $this, 'admin_ajax_relationship' ) );
    }

    /**
     * Add options and set defaults to
     *
     * @return array
     *
     * @since 2.0
     */
    public function options () {
        $options = array(
            'cpick_format_type' => array(
                'label' => __( 'Selection Type', 'pods' ),
                'help' => __( 'help', 'pods' ),
                'default' => 'single',
                'type' => 'pick',
                'data' => array(
                    'single' => 'Single Select',
                    'multi' => 'Multiple Select'
                ),
                'dependency' => false
            )
        );

        /*if ( !is_multisite() )
            unset( $options[ self::$type . '_user_site' ] );*/

        return $options;
    }

    /**
     * Customize output of the form field
     *
     * @param string $name
     * @param mixed $value
     * @param array $options
     * @param array $pod
     * @param int $id
     *
     * @since 2.0
     */
    public function input ( $name, $value = null, $options = null, $pod = null, $id = null ) {
        global $wpdb;

        $options = (array) $options;
        $form_field_type = PodsForm::$field_type;

        //$options[ 'grouped' ] = 1;

        //$options[ 'table_info' ] = array();

        $custom = pods_var_raw( self::$type . '_custom', $options, false );

        $custom = apply_filters( 'pods_form_ui_field_pick_custom_values', $custom, $name, $value, $options, $pod, $id );

        $ajax = false;

        $field_type = 'select';

        pods_view( PODS_DIR . 'ui/fields/' . $field_type . '.php', compact( array_keys( get_defined_vars() ) ) );
    }

    /**
     * Validate a value before it's saved
     *
     * @param mixed $value
     * @param string $name
     * @param array $options
     * @param array $fields
     * @param array $pod
     * @param int $id
     *
     * @param null $params
     * @return array|bool
     * @since 2.0
     */
    public function validate ( $value, $name = null, $options = null, $fields = null, $pod = null, $id = null, $params = null ) {
        if ( empty( self::$api ) )
            self::$api = pods_api();
        if (wp_kses($value,'') == $value){
            return true;
        }
        else {
            return FALSE;
        }
    }

    /**
     * Customize the Pods UI manage table column output
     *
     * @param int $id
     * @param mixed $value
     * @param string $name
     * @param array $options
     * @param array $fields
     * @param array $pod
     *
     * @since 2.0
     */
    public function ui ( $id, $value, $name = null, $options = null, $fields = null, $pod = null ) {
        $value = $this->simple_value( $name, $value, $options, $pod, $id );

        return $this->display( $value, $name, $options, $pod, $id );
    }

    /**
     * Get the data from the field
     *
     * @param string $name The name of the field
     * @param string|array $value The value of the field
     * @param array $options Field options
     * @param array $pod Pod data
     * @param int $id Item ID
     * @param boolean $in_form
     *
     * @return array Array of possible field data
     *
     * @since 2.0
     */
    public function data ( $name, $value = null, $options = null, $pod = null, $id = null, $in_form = true ) {
        $my_bfa = Better_Font_Awesome_Library::get_instance();
        $icons = $my_bfa->get_icons();
        $data = [];

        foreach ($icons as $hex_code => $icon){
            $hex_code = strstr($hex_code, 'f',FALSE);
            $data[$icon] = '&#x'.$hex_code.'; '.$icon;
        }
        return $data;
    }
}
