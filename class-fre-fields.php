<?php
Class Fre_Fields{
	public $fields;
	function __construct(){
			$this->fields = fre_define_custom_fields();
		add_action('ae_submit_post_form',array($this, 'render_html_fields_input') ); // in post project form.
		add_action('ae_insert_project', array($this,'save_custom_fields'), 10 , 2);
		add_action('after_sidebar_single_project', array($this, 'render_html_fields_output') ); // in single project page.
	}
	function save_custom_fields($project_id, $args){
		foreach ($this->fields as $key=> $field) {
			if(isset($args[$key])){
				update_post_meta($project_id,$args[$key]);
			}
		}
	}
	function render_html_fields_output($project){
		foreach ($this->fields as $key=> $field) {
			$meta_value = get_post_meta($project_id,$key, true);
			if($meta_value){
				echo '<label>'.$fields->label. '</label>: '.$meta_value.'<br />';
			}
		}
	}
	function render_html_fields_input(){
		foreach ($this->fields as $key => $field) {
			if( empty($field) )
				continue;
			$field = (object) $field;
			$this->render_html($field);
		}
	}
	function render_html($field){
		$type = $field->type;

		if( isset($field->required) && $field->required  )
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