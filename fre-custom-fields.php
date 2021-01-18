<?php
/*
Plugin Name: Fre Custom Fields
Plugin URI: http://enginethemes.com/
Version: 1.0
Author: EngineThemes
Author URI: enginethemes.com
License: GPLv2 or later
Text Domain: fre_fields
*/
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

function includes_fre_fields() {

	// bootstrap the core plugin
	define( 'FRE_FIELDS','fre_fields');
	define( 'FRE_CUSTOM_FIELDS', dirname( __FILE__ ) . '/' );
	define( 'FRE_CUSTOM_FIELDS_URL', plugins_url( '/' , __FILE__ ) );
	include_once FRE_CUSTOM_FIELDS . '/class-fre-fields.php';
	include_once FRE_CUSTOM_FIELDS . '/functions.php';

}
add_action('after_setup_theme','includes_fre_fields', 99);

