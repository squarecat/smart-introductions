<?php

function themeoptions_admin_init() {

	global $theme_options, $options_themeoptions;

	$options_themeoptions = new Options_themeoptions($theme_options);

	

    if ( isset($_REQUEST['page']) && $_REQUEST['page'] == 'themeoptions' ) {

		if (isset($_REQUEST['of_reset']) && 'reset' == $_REQUEST['of_reset']) {

			

			$nonce=$_POST['security'];



			if (!wp_verify_nonce($nonce, 'of_ajax_nonce') ) { 

				header('Location: themes.php?page=themeoptions&reset=error');

				die('Security Check'); 

			} else {

				$defaults = (array) $options_themeoptions->Defaults;

				update_option(OPTIONS,$options_themeoptions->Defaults);	

				header('Location: themes.php?page=themeoptions&reset=true');

				die($options_themeoptions->Defaults);

			} 

		}

    }

}

add_action('admin_init','themeoptions_admin_init');



function themeoptions_add_admin() {

	$codepinoy_icon = (isset($codepinoy_icon)) ? $codepinoy_icon : $codepinoy_icon = "";

	

	$of_page = add_object_page(THEMENAME .' - Theme Options',THEMENAME,9,'themeoptions','themeoptions_options_page',$codepinoy_icon);

	$of_page = add_submenu_page('themeoptions','General Setting','General Setting',9,'themeoptions','themeoptions_options_page');



	add_action("admin_print_scripts-$of_page", 'of_load_only');

	add_action("admin_print_styles-$of_page",'of_style_only');

} 



add_action('admin_menu', 'themeoptions_add_admin');



function themeoptions_options_page() {

	global $options_themeoptions;

	

		$data = get_option(OPTIONS);

	?>

	

	<div class="wrap" id="of_container">

	  <div id="of-popup-save" class="of-save-popup">

		<div class="of-save-save">Options Updated</div>

	  </div>

	  <div id="of-popup-reset" class="of-save-popup">

		<div class="of-save-reset">Options Reset</div>

	  </div>

	  <div id="of-popup-fail" class="of-save-popup">

		<div class="of-save-fail">Error!</div>

	  </div>

	  <form id="ofform" method="post" action="<?php echo esc_attr( $_SERVER['REQUEST_URI'] ) ?>" enctype="multipart/form-data"  >

		<div id="header">

		  <div class="logo">

			<h2><?php echo THEMENAME; ?></h2>

			<span class="author"></span>

		  </div>

		  <div id="js-warning">Warning- This options panel will not work properly without javascript!</div>

		  <div class="icon-option"></div>

		  <div class="clear"></div>

		</div>

		<div id="main">

		  <div id="of-nav">

			<ul>

			  <?php echo $options_themeoptions->Menu ?>

			</ul>

		  </div>

		  <div id="content"> <?php echo $options_themeoptions->Inputs ?> </div>

		  <div class="clear"></div>

		</div>

		<div class="save_bar_top"> <img style="display:none" src="<?php echo ADMIN; ?>images/loading-bottom.gif" class="ajax-loading-img ajax-loading-img-bottom" alt="Working..." />

		  <input type="hidden" id="security" name="security" value="<?php echo wp_create_nonce('of_ajax_nonce'); ?>" />

		  <input type="hidden" name="of_reset" value="reset" />

		  <button id ="of_save" type="button" class="button-primary">

		  <?php _e('Save All Changes');?>

		  </button>

		  <button id ="of_reset" type="submit" class="button submit-button reset-button" >

		  <?php _e('Options Reset');?>

		  </button>

		</div>

	  </form>

	</div>

	<?php  if (!empty($update_message)) echo $update_message; ?>

	<div style="clear:both;"></div>

	</div>

	<?php

}

function of_style_only() {

	wp_enqueue_style('admin-style', ADMIN . 'admin-style.css');

	wp_enqueue_style('color-picker', ADMIN . 'css/colorpicker.css');

	wp_enqueue_style('uniform.default', ADMIN . 'css/uniform.aristo.css');

	wp_enqueue_style('jquery-ui-custom', ADMIN . 'css/jquery-ui-1.8.14.custom.css');

?>

<!--[if IE 7]>

<link rel="stylesheet" href="<?php echo ADMIN ?>css/ie7.css" type="text/css"/>

<![endif]-->



<!--[if IE 8]>

<link rel="stylesheet" href="<?php echo ADMIN ?>css/ie8.css" type="text/css"/>

<![endif]-->

<?php

}



wp_enqueue_script(array('jquery', 'editor', 'thickbox', 'media-upload'));

wp_enqueue_style('thickbox');



add_action("admin_head","myplugin_load_tiny_mce");



function myplugin_load_tiny_mce() {

	wp_tiny_mce( false ); // true gives you a stripped down version of the editor

}





function of_load_only() {

	add_action('admin_head', 'of_admin_head');

	wp_register_script('jquery-input-mask', ADMIN .'js/jquery.maskedinput-1.2.2.js', array( 'jquery' ));

	wp_enqueue_script('jquery-input-mask');

	wp_enqueue_script('color-picker', ADMIN .'js/colorpicker.js', array('jquery'));

	wp_enqueue_script('ajaxupload', ADMIN .'js/ajaxupload.js', array('jquery'));

	wp_enqueue_script('jquery.uniform.min', ADMIN .'js/jquery.uniform.min.js', array('jquery'));

	wp_enqueue_script('jqueryui', ADMIN .'js/jquery-ui-min.js');

	wp_enqueue_script('optinjs', ADMIN .'js/optinjs.js');

}





function of_admin_head() { 

	$data = get_option(OPTIONS); ?>

	<script type="text/javascript" language="javascript">

	jQuery(document).ready(function($) {

		jQuery.noConflict();

		    $("input, textarea, select.custom_select").uniform();

		

		if (typeof AjaxUpload != 'function') { 

			return ++counter < 6 && window.setTimeout(init, counter * 500);

		}

			$('#js-warning').hide();

			

			$('.group').hide();

			$('.group:first').fadeIn();

						

			$('.group .collapsed').each(function() {

				$(this).find('input:checked').parent().parent().parent().nextAll().each( 

					function() {

						if ($(this).hasClass('last')) {

							$(this).removeClass('hidden');

							return false;

						}

						$(this).filter('.hidden').removeClass('hidden');

				});

			});

									

			$('.group .collapsed input:checkbox').click(unhideHidden);

						

			function unhideHidden() {

				if ($(this).attr('checked')) {

					$(this).parent().parent().parent().nextAll().removeClass('hidden');

				} else {

					$(this).parent().parent().parent().nextAll().each( 

						function() {

							if ($(this).filter('.last').length) {

								$(this).addClass('hidden');

								return false;

							}

							$(this).addClass('hidden');

					});

									

				}

			}

			

			$('#of-nav li:first').addClass('current');

			$('#of-nav li a').click(function(evt) {	

			$('#of-nav li').removeClass('current');

			$(this).parent().addClass('current');				

			var clicked_group = $(this).attr('href');

			$('.group').hide();				

			$(clicked_group).fadeIn();

			evt.preventDefault();

								

		});

		

			var reset = "<?php echo $_REQUEST['reset'] ?>";

						

			if ( reset.length ) {

				if ( reset == 'true') {

					var message_popup = $('#of-popup-reset');

				} else {

					var message_popup = $('#of-popup-fail');

			}

				message_popup.fadeIn();

				window.setTimeout(function() {

				message_popup.fadeOut();                        

				}, 2000);	

			}

			

			$.fn.center = function () {

				this.animate({"top":( $(window).height() - this.height() - 200 ) / 2+$(window).scrollTop() + "px"},100);

				this.css("left", 250 );

				return this;

			}	

					

			$('#of-popup-save').center();

			$('#of-popup-reset').center();

			$('#of-popup-fail').center();

					

			$(window).scroll(function() { 

				$('#of-popup-save').center();

				$('#of-popup-reset').center();

				$('#of-popup-fail').center();

			});

					

			$('.of-radio-img-img').click(function() {

				$(this).parent().parent().find('.of-radio-img-img').removeClass('of-radio-img-selected');

				$(this).addClass('of-radio-img-selected');

				$(this).parent().parent().find('span').removeClass('checked');

				$(this).parent().find('span').addClass('checked');

			});

			$('.of-radio-img-label').hide();

			$('.of-radio-img-img').show();

			$('.of-radio-img-radio').hide();

			

			$('.colorSelector').each(function() {

				var Othis = this;

					

				$(this).ColorPicker({

						color: '<?php echo $color; ?>',

						onShow: function (colpkr) {

							$(colpkr).fadeIn(500);

							return false;

						},

						onHide: function (colpkr) {

							$(colpkr).fadeOut(500);

							return false;

						},

						onChange: function (hsb, hex, rgb) {

							$(Othis).children('div').css('backgroundColor', '#' + hex);

							$(Othis).next('input').attr('value','#' + hex);

							

						}

				});

					  

			});

			

			$('.image_upload_button').each(function() {

			var clickedObject = $(this);

			var clickedID = $(this).attr('id');		

			var nonce = $('#security').val();

					

			new AjaxUpload(clickedID, {

				action: ajaxurl,

				name: clickedID,

				data: {

					action: 'of_ajax_post_action',

					type: 'upload',

					security: nonce,

					data: clickedID },

				autoSubmit: true,

				responseType: false,

				onChange: function(file, extension) {},

				onSubmit: function(file, extension) {

					clickedObject.text('Uploading');

					this.disable();

					interval = window.setInterval(function() {

						var text = clickedObject.text();

						if (text.length < 13) {	clickedObject.text(text + '.'); }

						else { clickedObject.text('Uploading'); } 

						}, 200);

				},

				onComplete: function(file, response) {

					window.clearInterval(interval);

					clickedObject.text('Upload Image');	

					this.enable();

						

					if(response==-1) {

						var fail_popup = $('#of-popup-fail');

						fail_popup.fadeIn();

						window.setTimeout(function() {

						fail_popup.fadeOut();                        

						}, 2000);

					}

						

					else if(response.search('Upload Error') > -1) {

						var buildReturn = '<span class="upload-error">' + response + '</span>';

						$(".upload-error").remove();

						clickedObject.parent().after(buildReturn);

						}						

					else {

						var buildReturn = '<img class="hide of-option-image" id="image_'+clickedID+'" src="'+response+'" alt="" />';

						$(".upload-error").remove();

						$("#image_" + clickedID).remove();	

						clickedObject.parent().after(buildReturn);

						$('img#image_'+clickedID).fadeIn();

						clickedObject.next('span').fadeIn();

						clickedObject.parent().prev().parent().find('input').val(response);

					}

				}

			});

					

			});

			$('.image_reset_button').click(function() {

			

				var clickedObject = $(this);

				var clickedID = $(this).attr('id');

				var theID = $(this).attr('title');	

						

				var nonce = $('#security').val();

			

				var data = {

					action: 'of_ajax_post_action',

					type: 'image_reset',

					security: nonce,

					data: theID

				};

							

				$.post(ajaxurl, data, function(response) {

					if(response==-1) {

						var fail_popup = $('#of-popup-fail');

						fail_popup.fadeIn();

						window.setTimeout(function() {

							fail_popup.fadeOut();                        

						}, 2000);

					}

					else {	

						var image_to_remove = $('#image_' + theID);

						var button_to_hide = $('#reset_' + theID);

						image_to_remove.fadeOut(500,function() { $(this).remove(); });

						button_to_hide.fadeOut();

						clickedObject.parent().prev().parent().find('input').val('');

					}		

								

				});			

			});   	 	



			$('#of_save').live("click",function() {

				var nonce = $('#security').val();		

				$('.ajax-loading-img').fadeIn();						

				var serializedReturn = $('#ofform').serialize();

								

				var data = {

					<?php if(isset($_REQUEST['page']) && $_REQUEST['page'] == 'themeoptions') { ?>

					type: 'save',

					<?php } ?>

					action: 'of_ajax_post_action',

					security: nonce,

					data: serializedReturn

				};

							

				$.post(ajaxurl, data, function(response) {

					var success = $('#of-popup-save');

					var fail = $('#of-popup-fail');

					var loading = $('.ajax-loading-img');

					loading.fadeOut();  

								

					if (response==1) {

						success.fadeIn();

					} else { 

						fail.fadeIn();

					}

								

					window.setTimeout(function() {

						success.fadeOut(); 

						fail.fadeOut();				

					}, 2000);

				});

					

			return false; 			

			});

			$('#of_reset').click(function() {

				var answer = confirm("<?php _e('Click OK to reset. All settings will be lost!');?>")

				if (answer) { 	return true; } else { return false; }

		});					

			

		});

</script>

<?php }

add_action('wp_ajax_of_ajax_post_action', 'of_ajax_callback');



function of_ajax_callback() {

	global $options_themeoptions;



	$nonce=$_POST['security'];

	

	if (! wp_verify_nonce($nonce, 'of_ajax_nonce') ) die('-1'); 

			

	$all = get_option(OPTIONS);

		

	$save_type = $_POST['type'];

	

	if($save_type == 'upload'){

		

		$clickedID = $_POST['data'];

		$filename = $_FILES[$clickedID];

       	$filename['name'] = preg_replace('/[^a-zA-Z0-9._\-]/', '', $filename['name']); 

		

		$override['test_form'] = false;

		$override['action'] = 'wp_handle_upload';    

		$uploaded_file = wp_handle_upload($filename,$override);

		 

			$upload_tracking[] = $clickedID;



			$upload_image = $all;

			

			$upload_image[$clickedID] = $uploaded_file['url'];

			

			update_option(OPTIONS, $upload_image ) ;

		

				

		 if(!empty($uploaded_file['error'])) {echo 'Upload Error: ' . $uploaded_file['error']; }	

		 else { echo $uploaded_file['url']; }

	}

	elseif($save_type == 'image_reset'){

			

			$id = $_POST['data'];

			$delete_image = $all;

			$delete_image[$id] = '';

			update_option(OPTIONS, $delete_image ) ;

	

	}	

	elseif ($save_type == 'save') {

		

		parse_str($_POST['data'], $data);

		unset($data['security']);

		unset($data['of_save']);

   

		update_option(OPTIONS, $data);

		die('1'); 

		

	} elseif ($save_type == 'reset') {

		update_option(OPTIONS,$options_themeoptions->Defaults);

        die(1);

	}

  die();

}

class Options_themeoptions {



function __construct($options) {

	$return = $this->themeoptions_machine($options);

	$this->Inputs = $return[0];

	$this->Menu = $return[1];

	$this->Defaults = $return[2];

}



public static function themeoptions_machine($options) {

    $data = get_option(OPTIONS);

	$defaults = array();   

    $counter = 0;

	$menu = '';

	$output = '';

	

	foreach ($options as $value) {

		$counter++;

		$val = '';

		if ($value['type'] == 'multicheck') {

			if (is_array($value['std'])) {

				foreach($value['std'] as $i=>$key) {

					$defaults[$value['id']][$key] = true;

				}

			} else {

					$defaults[$value['id']][$value['std']] = true;

			}

		} else {

			if (isset($value['std'])) {

				$defaults[$value['id']] = $value['std'];

			}

		}

		 if ( $value['type'] != "heading" )

		 {

		 	$class = ''; if(isset( $value['class'] )) { $class = $value['class']; }

			

			$output .= '<div class="section section-'.$value['type'].' '. $class .'">'."\n";

			$output .= '<h3 class="heading">'. $value['name'] .'</h3>'."\n";

			$output .= '<div class="option">'."\n" . '<div class="controls">'."\n";



		 } 

		switch ( $value['type'] ) {

		

			case 'slider' : 	$output .= Options_themeoptions::themeoptions_slider($value, $data);

					break;

			case 'text': 	 	$output .= Options_themeoptions::themeoptions_textField($value, $data);

					break;

			case 'select': 	 	$output .= Options_themeoptions::themeoptions_select($value, $data);

					break;

			case 'select2':	 	$output .= Options_themeoptions::themeoptions_select2($value, $data);

					break;

			case 'textarea': 	$output .= Options_themeoptions::themeoptions_textarea($value, $data);

					break;

			case 'richtextbox': $output .= Options_themeoptions::themeoptions_richtextbox($value, $data);

					break;

			case 'radio':    	$output .= Options_themeoptions::themeoptions_radio($value, $data);

					break;

			case 'checkbox': 	$output .= Options_themeoptions::themeoptions_checkbox($value, $data);

					break;

			case 'multicheck': 	$output .= Options_themeoptions::themeoptions_multicheckbox($value, $data);	

					break;

			case 'upload':		$output .= Options_themeoptions::themeoptions_uploader_function($value['id'],$value['std'],null);

					break;

			case 'upload_min':  $output .= Options_themeoptions::themeoptions_uploader_function($value['id'],$value['std'],'min');

					break;

			case 'color':		$output .= Options_themeoptions::themeoptions_color($value, $data);

					break;   

			case 'typography':	$output .= Options_themeoptions::themeoptions_typography($value, $data);				

					break; 

			case 'font':		$output .= Options_themeoptions::themeoptions_font($value, $data);				

					break;  			

			case 'border':		$output .= Options_themeoptions::themeoptions_border($value, $data);

					break;

			case 'images':		$output .= Options_themeoptions::themeoptions_images($value, $data);

					break;

			case 'instruction':	$output .= Options_themeoptions::themeoptions_instruction($value, $data);

					break; 

			case 'readonly':	$output .= Options_themeoptions::themeoptions_textFieldReadonly($value, $data);

					break; 

			case 'textareareadonly': 	$output .= Options_themeoptions::themeoptions_textareaReadonly($value, $data);

					break;		

			case 'hiddenDiv':	$output .= Options_themeoptions::themeoptions_hiddenDIV($value, $data);

					break; 		

			case "info":		$default = $value['std']; $output .= $default;

					break;                                   



			case 'heading':

					if($counter >= 2) {

					   $output .= '</div>'."\n";

					}

					$jquery_click_hook = ereg_replace("[^A-Za-z0-9]", "", strtolower($value['name']) );

					$jquery_click_hook = "of-option-" . $jquery_click_hook;

					$menu .= '<li><a title="'.  $value['name'] .'" href="#'.  $jquery_click_hook  .'"><span class="icon"><img src="'.$value['icon'].'" alt="'.$value['name'].'" /></span>'.  $value['name'] .'</a></li>';

					$output .= '<div class="group" id="'. $jquery_click_hook  .'"><h2>'.$value['name'].'</h2>'."\n";

				break;                                  

		}

		if ( is_array($value['type'])) {

			foreach($value['type'] as $array) {

				$id = $array['id']; 

				$std = $array['std'];

				$saved_std = get_option($id);

				if($saved_std != $std) { $std = $saved_std; } 

				$meta = $array['meta'];

				if($array['type'] == 'text') {

					$output .= '<input class="input-text-small of-input" name="'. $id .'" id="'. $id .'" type="text" value="'. $std .'" />';  

					$output .= '<span class="meta-two">'.$meta.'</span>';

				}

			}

		}

		

		if ( $value['type'] != 'heading' ) { 

			if ( $value['type'] != 'checkbox' ) { 

				$output .= '<br/>';

			}

			if(!isset($value['desc'])) { $explain_value = ''; } else{ $explain_value = $value['desc']; } 

			$output .= '</div><div class="explain">'. $explain_value .'</div>'."\n";

			$output .= '<div class="clear"> </div></div></div>'."\n";

		}

	   

	}

    $output .= '</div>';

    return array($output,$menu,$defaults);

}

public static function themeoptions_font($value, $data){

	$typography_stored = $data[$value['id']];

	$faces = $value['std']['options'];	

		$output .= '<select class="of-typography of-typography-size" name="'.$value['id'].'[size]" id="'. $value['id'].'_size">';

		for ($i = 9; $i < 71; $i++) { 

				$test = $i.'px';

				$output .= '<option value="'. $i .'px" ' . selected($typography_stored['size'], $test, false) . '>'. $i .'px</option>'; 

		}

		$output .= '</select>';

		$output .= '<select class="of-typography of-typography-face" name="'.$value['id'].'[face]" id="'. $value['id'].'_face">';

		

		foreach ($faces as $i=>$face) {

			$output .= '<option value="'. $i .'" ' . selected($typography_stored['face'], $i, false) . '>'. $face .'</option>';

		}			

		$output .= '</select>';	

		

		$output .= '<select class="of-typography of-typography-style" name="'.$value['id'].'[style]" id="'. $value['id'].'_style">';

		$styles = array('normal'=>'Normal',

						'italic'=>'Italic',

						'bold'=>'Bold',

						'bold italic'=>'Bold Italic');

						

		foreach ($styles as $i=>$style) {

			$output .= '<option value="'. $i .'" ' . selected($typography_stored['style'], $i, false) . '>'. $style .'</option>';		

		}

		$output .= '</select>';

		

		$output .= '<div id="' . $value['id'] . '_color_picker" class="colorSelector"><div style="background-color: '.$typography_stored['color'].'"></div></div>';

		$output .= '<input class="of-color of-typography of-typography-color" name="'.$value['id'].'[color]" id="'. $value['id'] .'_color" type="text" value="'. $typography_stored['color'] .'" />';

		

	return $output;		

}

public static function themeoptions_textField($value, $data){

	$default_value = $data[$value['id']] ? $data[$value['id']] : $value['std'];

	$textfield = '<input class="of-input" name="'.$value['id'].'" id="'. $value['id'] .'" type="'. $value['type'] .'" value="'. $default_value .'" /> ';

	return $textfield;

}



public static function themeoptions_textFieldReadonly($value, $data){

	$default_value = $data[$value['id']] ? $data[$value['id']] : $value['std'];

	$textfieldHidden = '<input class="of-input" readonly="readonly" name="'.$value['id'].'" id="'. $value['id'] .'" type="'. $value['type'] .'" value="'. $default_value .'" /> ';

	return $textfieldHidden;

}



public static function themeoptions_hiddenDIV($value, $data){

	$hiddenDiv = '<div style="display:none;" id="'.$value['id'].'"></div>';

	return $hiddenDiv;

}



public static function themeoptions_instruction($value, $data){

	$instruction = '<p>'.$value['instruction'].'</p>';

	return $instruction;

}



public static function themeoptions_select($value, $data){

	$select = (isset($select)) ? $select : "";

	$select .= '<select class="of-input custom_select" name="'.$value['id'].'" id="'. $value['id'] .'">';

		foreach ($value['options'] as $key=>$option) {

				$select .= '<option value="'.$option.'" ' . selected($data[$value['id']], $option, false) . ' />'.$key.'</option>';

			} 

	$select .= '</select>';

	return $select;

}



public static function themeoptions_select2($value, $data){

	$select2 .= '<select class="of-input" name="'.$value['id'].'" id="'. $value['id'] .'">';

			foreach ($value['options'] as $option=>$name) {

				$select2 .= '<option value="'.$option.'" ' . selected($data[$value['id']], $option, false) . ' />'.$name.'</option>';

			 } 

	$select2 .= '</select>';

	return $select2;

}



public static function themeoptions_textarea($value, $data){

		$textarea = (isset($textarea)) ? $textarea : "";

		$cols = '8';

		$ta_value = $data[$value['id']] ? $data[$value['id']] : $value['std'];

			if(isset($value['options'])) {

					$ta_options = $value['options'];

					if(isset($ta_options['cols'])) {

					$cols = $ta_options['cols'];

					} 

				}

				$ta_value = stripslashes($ta_value);

				$textarea .= '<textarea class="of-input" name="'.$value['id'].'" id="'. $value['id'] .'" cols="'. $cols .'" rows="8">'.$ta_value.'</textarea>';

		

		return $textarea;

}





public static function themeoptions_richtextbox($value, $data){

		$ta_value = $data[$value['id']] ? $data[$value['id']] : $value['std'];

		$ta_value = stripslashes($ta_value);

		//$textarea .= '<textarea class="of-input" name="'.$value['id'].'" id="'. $value['id'] .'" cols="'. $cols .'" rows="8">'.$ta_value.'</textarea>';

		$richtextbox = the_editor( $ta_value, $value['id'], $value['id'], $media_buttons = true, $extended = true );

		

		return $richtextbox;

}



public static function themeoptions_textareaReadonly($value, $data){

		$cols = '8';

		$ta_value = $data[$value['id']] ? $data[$value['id']] : $value['std'];

			if(isset($value['options'])) {

					$ta_options = $value['options'];

					if(isset($ta_options['cols'])) {

					$cols = $ta_options['cols'];

					} 

				}

				$ta_value = stripslashes($ta_value);

				$textarea .= '<textarea class="of-input" readonly="readonly" name="'.$value['id'].'" id="'. $value['id'] .'" cols="'. $cols .'" rows="8">'.$ta_value.'</textarea>';

		

		return $textarea;

}



public static function themeoptions_radio($value, $data){

	foreach($value['options'] as $option=>$name) {

				$radio .= '<input class="of-input of-radio" name="'.$value['id'].'" type="radio" value="'.$option.'" ' . checked($data[$value['id']], $option, false) . ' /> <span class="radio-label">'.$name.'</span>';		

			}

	return $radio;		

}



public static function themeoptions_checkbox($value, $data){

		$checkbox = '<input type="checkbox" class="checkbox of-input" name="'.$value['id'].'" id="'. $value['id'] .'" value="1" '. checked($data[$value['id']], true, false) .' />';

		return $checkbox;

}



public static function themeoptions_multicheckbox($value, $data){

	$multi_stored = $data[$value['id']];

			foreach ($value['options'] as $key => $option) {			 

				$of_key_string = $value['id'] . '_' . $key;

				$multicheck .= '<input type="checkbox" class="checkbox of-input" name="'.$value['id'].'['.$key.']'.'" id="'. $of_key_string .'" value="1" '. checked($multi_stored[$key], 1, false) .' /><label for="'. $of_key_string .'">'. $option .'</label><br />';							

			} 

			

	return $multicheck;

}



public static function themeoptions_color($value, $data){

	$color .= '<div id="' . $value['id'] . '_picker" class="colorSelector"><div style="background-color: '.$data[$value['id']].'"></div></div>';

	$color .= '<input class="of-color" name="'.$value['id'].'" id="'. $value['id'] .'" type="text" value="'. $data[$value['id']] .'" />';

	return $color;

}



public static function themeoptions_images($value, $data){

	$i = 0;

	$select_value = $data[$value['id']];

		   

	foreach ($value['options'] as $key => $option) { 

		$i++;

		$checked = '';

		$selected = '';

		if(NULL!=checked($data[$value['id']], $key, false)) {

			$checked = checked($data[$value['id']], $key, false);

			$selected = 'of-radio-img-selected';  

		} 	

		$images .= '<span>';

		$images .= '<input type="radio" id="of-radio-img-' . $value['id'] . $i . '" class="checkbox of-radio-img-radio hide" value="'.$key.'" name="'.$value['id'].'" '.$checked.' />';

		$images .= '<div class="of-radio-img-label">'. $key .'</div>';

		$images .= '<img src="'.$option.'" alt="" class="of-radio-img-img '. $selected .'" onClick="document.getElementById(\'of-radio-img-'. $value['id'] . $i.'\').checked = true;" />';

		$images .= '</span>';

	}

	return $images;

}



public static function themeoptions_border($value, $data){

	$default = $value['std'];

	$border_stored = array('width' => $data[$value['id'] . '_width'] ,

							'style' => $data[$value['id'] . '_style'],

							'color' => $data[$value['id'] . '_color'],

							);

	$border_stored = $data[$value['id']];

	$border.= '<select class="of-border of-border-width" name="'.$value['id'].'[width]" id="'. $value['id'].'_width">';

	for ($i = 0; $i < 21; $i++) { 

		$border .= '<option value="'. $i .'" ' . selected($border_stored['width'], $i, false) . '>'. $i .'</option>';				 }

	$border .= '</select>';

	

	$border .= '<select class="of-border of-border-style" name="'.$value['id'].'[style]" id="'. $value['id'].'_style">';	

	$styles = array('none'=>'None',

					'solid'=>'Solid',

					'dashed'=>'Dashed',

					'dotted'=>'Dotted');			

	foreach ($styles as $i=>$style) {

		$border .= '<option value="'. $i .'" ' . selected($border_stored['style'], $i, false) . '>'. $style .'</option>';		

	}

	$border .= '</select>';

	

	$border .= '<div id="' . $value['id'] . '_color_picker" class="colorSelector"><div style="background-color: '.$border_stored['color'].'"></div></div>';

	$border .= '<input class="of-color of-border of-border-color" name="'.$value['id'].'[color]" id="'. $value['id'] .'_color" type="text" value="'. $border_stored['color'] .'" />';



	return $border;	

}



public static function themeoptions_typography($value, $data){

	$typography_stored = $data[$value['id']];

	$faces = $data[$value['id']['fonts']];

			$typography .= '<select class="of-typography of-typography-size" name="'.$value['id'].'[size]" id="'. $value['id'].'_size">';

			for ($i = 9; $i < 71; $i++) { 

					$test = $i.'px';

					$typography .= '<option value="'. $i .'px" ' . selected($typography_stored['size'], $test, false) . '>'. $i .'px</option>'; 

			}

			$typography .= '</select>';

			$typography .= '<select class="of-typography of-typography-face" name="'.$value['id'].'[face]" id="'. $value['id'].'_face">';

			

			foreach ($faces as $i=>$face) {

				$typography .= '<option value="'. $i .'" ' . selected($typography_stored['face'], $i, false) . '>'. $face .'</option>';

			}			

			$typography .= '</select>';	

			$typography .= '<select class="of-typography of-typography-style" name="'.$value['id'].'[style]" id="'. $value['id'].'_style">';

			$styles = array('normal'=>'Normal',

							'italic'=>'Italic',

							'bold'=>'Bold',

							'bold italic'=>'Bold Italic');

							

			foreach ($styles as $i=>$style) {

				$typography .= '<option value="'. $i .'" ' . selected($typography_stored['style'], $i, false) . '>'. $style .'</option>';		

			}

			$typography .= '</select>';

			$typography .= '<div id="' . $value['id'] . '_color_picker" class="colorSelector"><div style="background-color: '.$typography_stored['color'].'"></div></div>';

			$typography .= '<input class="of-color of-typography of-typography-color" name="'.$value['id'].'[color]" id="'. $value['id'] .'_color" type="text" value="'. $typography_stored['color'] .'" />';

	

	return $typography;

}



public static function themeoptions_slider($value, $data, $size = null){

	$slider_value = $data[$value['id']] ? $data[$value['id']] : $value['std'];

	$step = $value['step'] ? $value['step'] : 1;

	$slider .='<script> 

				jQuery(document).ready(function($) {

					$( "#slider-range-min_'.$value['id'].'" ).slider({

							range: "min",

							value: '.$slider_value.',

							animate: true,

							min: '.$value['min'].',

							max: '.$value['max'].',

							step: '.$step.',

							slide: function( event, ui ) {

								$( "#'.$value['id'].'" ).val( ui.value );

								$( ".amount-view_'.$value['id'].'" ).text( ui.value );

								

							}

						});

					$( "#'.$value['id'].'" ).val( $( "#slider-range-min_'.$value['id'].'" ).slider( "value" ) );

					$( ".amount-view_'.$value['id'].'" ).text( $( "#slider-range-min_'.$value['id'].'" ).slider( "value" ) );

				});

			</script>';	

				

	$slider .='<input type="hidden" id="'.$value['id'].'" class="slider-field" name="'.$value['id'].'" value="'. $slider_value .'"/>

			   <div id="slider-range-min_'.$value['id'].'" class="'.$size.'"></div><span class="amount-view_'.$value['id'].' slider-view">'.$value['value'].'</span>';

			   

	return $slider;		   

}



public static function themeoptions_uploader_function($id,$std,$mod) {

		$data = get_option(OPTIONS);

		$uploader = '';

		$upload = $data[$id];

		if ( $upload != "") { $val = $upload; } else {$val = $std;}

		$uploader .= '<input class="of-input" name="'. $id .'" id="'. $id .'_upload" type="text" value="'. $val .'" />';

		$uploader .= '<div class="upload_button_div"><span class="button image_upload_button" id="'.$id.'">Upload Image</span>';

		if(!empty($upload)) {$hide = '';} else { $hide = 'hide'; }

		$uploader .= '<span class="button image_reset_button '. $hide.'" id="reset_'. $id .'" title="' . $id . '">Remove</span>';

		$uploader .='</div>' . "\n";

		$uploader .= '<div class="clear"></div>' . "\n";

		if(!empty($upload)) {

			$uploader .= '<a class="of-uploaded-image" href="'. $upload . '">';

			$uploader .= '<img class="of-option-image" id="image_'.$id.'" src="'.$upload.'" alt="" />';

			$uploader .= '</a>';

		}

		$uploader .= '<div class="clear"></div>' . "\n";

		return $uploader;

	}



}

if (is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {

	header( 'Location: '.admin_url().'admin.php?page=themeoptions' ) ;

}