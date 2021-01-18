<?php
Class Fre_Fields{
	public $fields;
	function __construct(){
		$this->fields = array();
		$this->define_fields();
		add_action('ae_submit_post_form',array($this, 'fre_submit_project_fields') );
	}
	function define_fields(){
		$fields = array();
		// Define field 1
		$this->fields[] = array(
			'name' => 'custom_field_1',
			'label' => "Custom Field 1",
			'placeholder' => 'Field 1 placehoder',
			'type' => 'text', // text/area/select/checkbox/radio
			'required' => true,
		);
		// define fields 3
		$this->fields[] = array(
			'name' => 'custom_field_2',
			'label' => "Custom Field 2",
			'type' => 'textarea',
			'placeholder' => 'Field 2 placehoder',
		);
	}

	function fre_submit_project_fields(){

		foreach ($this->fields as $key => $field) {
			if( empty($field) )
				contine;
			$field = (object) $field;
			$this->render_html($field);

			?>
			<?php
		}
	}
	function render_html($field){
		$type = $field->type;
		if(isset($field->required) && $field->required )
			$field->required = 'required';
		else $field->required = '';

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
	        <input class="input-item text-field"   <?php echo $field->required;?>  type="text" name="<?php echo $field->name;?>"  placeholder="<?php echo $field->placeholder;?>">
	    </div>
        <?php
	}
	function render_textarea_field($field){ ?>
	 	<div class="fre-input-field">
            <label class="fre-field-title" for="fre-project-describe"><?php echo $field->label;?></label>
            <textarea name="<?php echo $field->name;?>" <?php echo $field->required;?> placeholder="<?php echo $field->placeholder;?>" ></textarea>
        </div>
        <?php
	}
}

$GLOBALS['fre_fieds'] =  new Fre_Fields();