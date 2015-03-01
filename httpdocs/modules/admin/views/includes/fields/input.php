<?php defined('SYSPATH') OR die('No direct access allowed.');

	if(isset($label)){
		$label = $label;
	} elseif(array_key_exists('label', $fields[$field])){
		$label = $fields[$field]['label'];
	} else {
		$label = '';
	}

	if(isset($required)){
		$required = $required;
	} elseif(array_key_exists('required', $fields[$field])){
		$required = $fields[$field]['required'];
	} else {
		$required = false;
	}
	
	if(isset($title)){
		$title = $title;
	} elseif(array_key_exists('title', $fields[$field])){
		$title = $fields[$field]['title'];
	} else {
		$title = '';
	}

	if(isset($maxlength)){
		$maxlength = $maxlength;
	} elseif(array_key_exists('maxlength', $fields[$field])){
		$maxlength = $fields[$field]['maxlength'];
	} else {
		$maxlength = 255;
	}

	if(isset($placeholder)){
		$placeholder = $placeholder;
	} elseif(array_key_exists('placeholder', $fields[$field])){
		$placeholder = $fields[$field]['placeholder'];
	} else {
		$placeholder = '';
	}

	$error = array_key_exists($field,$errors);
	
?>
<div data-field="<?=$field;?>" class="form-group field_input clearfix <?=($error ? 'has-error' : '');?>">
	<label for="<?=$field;?>" class="col-lg-3 col-md-3 control-label"><?=$label;?> <?php if($required){ ?><span class="required">*</span><?php } ?></label>
	<div class="col-lg-9 col-md-9">
		<?php
			print form::input(
				array(
					'id'			=> $field,
					'name'			=> $field,
					'class'			=> 'form-control',
					'title'			=> $title,
					'maxlength'		=> $maxlength,
					'data-required'	=> $required ? 1 : 0,
					'data-title'	=> $error ? 'Errors' : '',
					'data-content'	=> $error ? $errors[$field] : '',
					'placeholder'	=> $placeholder
				),
				array_key_exists($field,$fields) ? $fields[$field]['value'] : '',
				''
			);
		?>
	</div>
</div>