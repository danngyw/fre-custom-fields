<?php
Class Fre_Fields{
	public $fields;
	function __construct(){
			$this->fields = fre_define_custom_fields();
		add_action('ae_submit_post_form',array($this, 'fre_submit_project_fields') );
	}

	function fre_submit_project_fields(){

		foreach ($this->fields as $key => $field) {
			if( empty($field) )
				continue;
			$field = (object) $field;
			$this->render_html($field);
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