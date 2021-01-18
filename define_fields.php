<?php
/**
 * Manually define all custom fields in this method.
*/
if ( ! function_exists('fre_define_custom_fields') ){
	function fre_define_custom_fields( $fields = array() ){

		// Define field 1
		$fields['custom_field_1'] = array(
			'label' 		=> "Custom Field 1",
			'placeholder' 	=> 'Field 1 placehoder',
			'type' 			=> 'text', // text/area/select/checkbox/radio
			'required' 		=> true,
		);
		// define fields 3
		$fields['custom_field_2'] = array(
			'label'			=> "Custom Field 2",
			'type' 			=> 'textarea',
			'placeholder' 	=> 'Field 2 placehoder',
		);
		return $fields;
	}
}
define('FIELDS_OUTPUT_HEADING','Custom Fields');