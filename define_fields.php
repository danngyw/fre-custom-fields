<?php
/**
 * Manually define all custom fields in this method.
*/
if ( ! function_exists('fre_define_custom_fields') ){
	function fre_define_custom_fields( $fields = array() ){

		// Define field 1
		$fields['custom_field_1'] = array(
			'label' 		=> "Custom Field 1",
			'placeholder' 	=> 'Field 1 Placehoder',
			'type' 			=> 'text', // text/area/select/checkbox/radio
			'required' 		=> true,
		);
		// define fields 2
		$fields['custom_field_2'] = array(
			'label'			=> "Custom Field 2",
			'type' 			=> 'textarea',
			'placeholder' 	=> 'Field 2 Placehoder',
		);
		$fields['custom_field_3'] = array(
			'label'			=> "Custom Field 3",
			'type' 			=> 'select',
			'options' 		=> array(array('label' => "Option 1","value" => 'opt1'),array('label' => 'Option 2','value' => 'opt2') ),
			'placeholder' 	=> 'Field 2 Placehoder',
		);
		return $fields;
	}
}
define('FIELDS_OUTPUT_HEADING','Custom Fields');