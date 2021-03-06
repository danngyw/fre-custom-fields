<?php
/*
Plugin Name: Fre Custom Fields
Plugin URI: https://danhoat.wordpress.com
Version: 1.0
Author: danng
Author URI: https://danhoat.wordpress.com
License: GPLv2 or later
Text Domain: fre_fields
*/
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
function includes_fre_fields() {
	define( 'FRE_FIELDS','fre_fields');
	define( 'FRE_CUSTOM_FIELDS', dirname( __FILE__ ) . '/' );
	define( 'FRE_CUSTOM_FIELDS_URL', plugins_url( '/' , __FILE__ ) );
	include_once FRE_CUSTOM_FIELDS . '/functions.php';
	include_once FRE_CUSTOM_FIELDS . '/define_fields.php';
	include_once FRE_CUSTOM_FIELDS . '/class-fre-fields.php';
}
add_action('after_setup_theme','includes_fre_fields', 99);

