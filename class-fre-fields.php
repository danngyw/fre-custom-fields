<?php
Class Fre_Fields{

	public $fields;

	function __construct(){
		$this->fields = fre_define_custom_fields();
		add_action('ae_submit_post_form', array($this, 'render_html_fields_input') ); // in post project form.
		add_action('ae_insert_project', array($this, 'save_custom_fields'), 10 , 2);
		add_action('after_category_single_project', array($this, 'render_html_fields_output') ); // in single project page.
	}

	function save_custom_fields($project_id, $args){
		foreach ($this->fields as $field_name => $field) {
			if( isset($args[$field_name]) ){
				update_post_meta($project_id, $field_name, $args[$field_name]);
			}
		}
	}
	function render_html_fields_output($project){
		$i = 0;
		foreach ($this->fields as $field_name=> $field) {
			$field_value 	= get_post_meta($project->ID, $field_name, true);
			$field 			= (object) $field;

			if( $field_value ){
				if($i == 0) echo '<h4>'.FIELDS_OUTPUT_HEADING.'</h4>';
				echo '<label>'.$field->label. '</label>: '.$field_value.'<br />';
			} $i++;
		}
	}

	function render_html_fields_input(){
		foreach ($this->fields as $name => $field) {
			if( empty($field) )
				continue;
			$field['name'] 	= $name;
			$field 			= (object) $field;

			$this->render_html($field);
		}
	}
	function render_html($field){
		$type 				= $field->type;
		$field->required 	= isset($field->required) && ( $field->required ) ? ' required' : '';

		switch ($type) {
			case 'textarea':
				$this->render_textarea_field($field);
				break;
			default:
				$this->render_input_field($field);
				break;
		}
	}
	function render_input_field($field){ ?>
		<div class="fre-input-field">
	        <label class="fre-field-title" for="fre-project-title"><?php echo $field->label;?></label>
	        <input class="input-item text-field" name="<?php echo $field->name;?>"<?php echo $field->required;?>  type="text"  placeholder="<?php echo $field->placeholder;?>">
	    </div><?php
	}
	function render_textarea_field($field){ ?>
	 	<div class="fre-input-field">
            <label class="fre-field-title" for="fre-project-describe"><?php echo $field->label;?></label>
            <textarea name="<?php echo $field->name;?>"<?php echo $field->required;?> placeholder="<?php echo $field->placeholder;?>" ></textarea>
        </div> <?php
	}
}

$GLOBALS['fre_fieds'] =  new Fre_Fields();