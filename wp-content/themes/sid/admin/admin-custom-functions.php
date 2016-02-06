<?php

class themeoptions_metabox {



	protected $_meta_box;

	function __construct($meta_box) {

		if (!is_admin()) return;

	

		$this->_meta_box = $meta_box;



		$current_page = substr(strrchr($_SERVER['PHP_SELF'], '/'), 1, -4);

		if ($current_page == 'page' || $current_page == 'page-new' || $current_page == 'post' || $current_page == 'post-new') {

			add_action('admin_head', array(&$this, 'add_post_enctype'));

		}

		add_action('admin_menu', array(&$this, 'add'));

		add_action('save_post', array(&$this, 'save'));

	}

	

	function add_post_enctype() {

		echo '

		<script type="text/javascript">

		jQuery(document).ready(function(){

			jQuery("#post").attr("enctype", "multipart/form-data");

			jQuery("#post").attr("encoding", "multipart/form-data");

		});

		</script>';

	}

	function add() {

		foreach ($this->_meta_box['pages'] as $page) {

			add_meta_box($this->_meta_box['id'], $this->_meta_box['title'], array(&$this, 'show'), $page, $this->_meta_box['context'], $this->_meta_box['priority']);

		}

	}

	function show() {

		global $post;

		echo '<input type="hidden" name="mytheme_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

	

		echo '<table class="form-table">';



		foreach ($this->_meta_box['fields'] as $themeoptions_field) {

			$meta = get_post_meta($post->ID, $themeoptions_field['id'], true);

		

			echo '<tr>',

					'<th style="width:100%"><label for="', $themeoptions_field['id'], '"><span class="post-heading">', $themeoptions_field['name'], '</span></label></th>',

					'</tr><tr><td>';

			switch ($themeoptions_field['type']) {

				case 'text':

					echo '<input type="text" name="', $themeoptions_field['id'], '" class="themeoptions_field" id="', $themeoptions_field['id'], '" value="', $meta ? $meta : $themeoptions_field['std'], '" size="30" style="width:100%" />',

						'<br />', $themeoptions_field['desc'];

					break;

				case 'textarea':

					echo '<textarea name="', $themeoptions_field['id'], '" class="themeoptions_field" id="', $themeoptions_field['id'], '" cols="60" rows="4" style="width:100%">', $meta ? $meta : $themeoptions_field['std'], '</textarea>',

						'<br />', $themeoptions_field['desc'];

					break;

				case 'richtextbox':

					//echo '<textarea name="', $themeoptions_field['id'], '" class="themeoptions_field" id="', $themeoptions_field['id'], '" cols="60" rows="4" style="width:100%">', $meta ? $meta : $themeoptions_field['std'], '</textarea>','<br />', $themeoptions_field['desc'];

					echo the_editor( $meta ? $meta : $themeoptions_field['std'], $id = $themeoptions_field['id'], $name = $themeoptions_field['id'], $media_buttons = true, $extended = true ),

						'<br />', $themeoptions_field['desc'];

					break;

				case 'select':

					echo '<select name="', $themeoptions_field['id'], '" id="', $themeoptions_field['id'], '">';

					foreach ($themeoptions_field['options'] as $key=>$option) {

						echo '<option value="',$option,'"', $meta == $option ? ' selected="selected"' : '', '>', $key, '</option>';

					}

					echo '</select>';

					break;

				case 'radio':

					foreach ($themeoptions_field['options'] as $option) {

						

						echo '<input type="radio" name="', $themeoptions_field['id'], '" class="themeoptions_field"value="', $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' />', $option['name'];

					}

					break;

				case 'checkbox':

					echo '<input type="checkbox" name="', $themeoptions_field['id'], '" class="themeoptions_field"id="', $themeoptions_field['id'], '"', $meta ? ' checked="checked"' : '', ' />';

					break;

				case 'file':

					echo $meta ? "$meta<br />" : '', '<input type="file" name="', $themeoptions_field['id'], '" id="', $themeoptions_field['id'], '" />',

						'<br />', $themeoptions_field['desc'];

					break;

				case 'image':

					echo $meta ? "<img src=\"$meta\" /><br />" : '', '<span>URL : </span><input type="text" name="', $themeoptions_field['id'], '" class="themeoptions_field" id="', $themeoptions_field['id'], '" value="', $meta ? $meta : $themeoptions_field['std'], '" size="30" style="width:50%" /><input type="file"  name="', $themeoptions_field['id'], '" id="', $themeoptions_field['id'], '"  class="image-upload"/>',

						'<br />';

					break;

			}

			echo 	'<td>',

				'</tr>';

		}

	

		echo '</table>';

	}

	function save($post_id) {

		if (!wp_verify_nonce($_POST['mytheme_meta_box_nonce'], basename(__FILE__))) {

			return $post_id;

		}

		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {

			return $post_id;

		}

		if ('page' == $_POST['post_type']) {

			if (!current_user_can('edit_page', $post_id)) {

				return $post_id;

			}

		} elseif (!current_user_can('edit_post', $post_id)) {

			return $post_id;

		}



		foreach ($this->_meta_box['fields'] as $themeoptions_field) {

			$name = $themeoptions_field['id'];

			

			$old = get_post_meta($post_id, $name, true);

			$new = $_POST[$themeoptions_field['id']];

			

			if ($themeoptions_field['type'] == 'file' || $themeoptions_field['type'] == 'image') {

				$file = wp_handle_upload($_FILES[$name], array('test_form' => false));

				$new = $file['url'];

			}

			

			if ($new && $new != $old) {

				update_post_meta($post_id, $name, $new);

			} elseif ('' == $new && $old && $themeoptions_field['type'] != 'file' && $themeoptions_field['type'] != 'image') {

				delete_post_meta($post_id, $name, $old);

			}

		}

	}

}

?>

