<?php
/*
Plugin Name: Fre Custom Fields
Plugin URI: http://enginethemes.com/
Version: 1.0
Author: danng
Author URI: https://danhoat.wordpress.com
License: GPLv2 or later
Text Domain: fre_fields
*/
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

function fre_define_custom_fields(){
	$fields = array();
	// Define field 1
	$fields[] = array(
		'name' => 'custom_field_1',
		'label' => "Custom Field 1",
		'placeholder' => 'Field 1 placehoder',
		'type' => 'text', // text/area/select/checkbox/radio
		'required' => true,
	);
	// define fields 3
	$fields[] = array(
		'name' => 'custom_field_2',
		'label' => "Custom Field 2",
		'type' => 'textarea',
		'placeholder' => 'Field 2 placehoder',
	);
	return $fields;
}

function includes_fre_fields() {

	// bootstrap the core plugin
	define( 'FRE_FIELDS','fre_fields');
	define( 'FRE_CUSTOM_FIELDS', dirname( __FILE__ ) . '/' );
	define( 'FRE_CUSTOM_FIELDS_URL', plugins_url( '/' , __FILE__ ) );
	include_once FRE_CUSTOM_FIELDS . '/functions.php';
	include_once FRE_CUSTOM_FIELDS . '/class-fre-fields.php';


}
add_action('after_setup_theme','includes_fre_fields', 99);

