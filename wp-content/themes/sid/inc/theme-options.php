<?php
add_action('init','of_options');
if (!function_exists('of_options')) {
function of_options(){$on_and_of = array("on" => "On", "Off" => "Off"); 
$yes_or_no = array("yes" => "Yes", "no" => "No");
$body_repeat = array("no-repeat" => 'no-repeat',"repeat-x" => 'repeat-x',"repeat-y" => 'repeat-y',"repeat" => 'repeat');
$body_pos = array('top left' => "top left",
				  'top center' => "top center",
				  'top right' => "top right",
				  'center left' => "center left",
				  'center center' => "center center",
				  'center right' => "center right",
				  'bottom left' => "bottom left",
				  'bottom center' => "bottom center",
				  'bottom right' => "bottom right");
$post_order = array("ID"=>"ID",
					"author"=>"author",
					"title"=>"title",
					"date"=>"date",
					"modified"=>"modified",
					"parent"=>"parent",
					"rand"=>"rand",
					"comment_count"=>"comment_count",
					"menu_order"=>"menu_order");
//Access the WordPress Categories via an Array
$of_categories = array();  
$of_categories_obj = get_categories('hide_empty=0');
foreach ($of_categories_obj as $of_cat) {
    $of_categories[$of_cat->cat_name] = $of_cat->slug;} //print_r($of_categories);
// Set page array and get the url
$page_urls = array();
$page_urls['Select page'] = 'http://sample.com';
$page_url_objs = get_pages(array('post_type' => 'page','post_status' => 'publish'));
foreach($page_url_objs as $page_url) {
	$page_urls[$page_url->post_title] = get_page_link($page_url->ID);
}
// Fonts Array
$fonts = array(
	'asap' => 'Asap',
	'ropa_sans' => 'Ropa Sans',
	'telex' => 'Telex',
	'gudea' => 'gudea',
	'ruluko' => 'Ruluko',
	'magra' => 'Magra',
	'amethysta' => 'Amethysta',
	'lustria' => 'Lustria',
	'inika' => 'Inika',
	'cardo' => 'Cardo',
	'fjord_one' => 'One',
	'eb_garamond' => 'EB Garamond',
	'arial'=>'Arial',
	'verdana'=>'Verdana, Geneva',
	'trebuchet'=>'Trebuchet',
	'georgia' =>'Georgia',
	'times'=>'Times New Roman',
	'tahoma'=>'Tahoma, Geneva',
	'palatino'=>'Palatino',
	'helvetica'=>'Helvetica',
	'kaushan_script' => 'Kaushan Script',	
	'rouge_script' => 'Rouge Script',
	'sue_ellen_francisco' => 'Sue Ellen Francisco',
	'cookie' => 'Cookie',
	'architect' => 'Architect',
	'permanent_maker' => 'Permanent Maker',
	'gochi_hand' => 'Gochi Hand',
	'just_another_hand' => 'Just Another Hand',
	'indie_flower' => 'Indie Flower',
	'swanky_and_moo_moo' => 'Swanky and Moo Moo',
	'schoolbell' => 'schoolbell' 
);
$url =  get_stylesheet_directory_uri() . '/skin/';
/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/
// Set the Options Array
global $theme_options;
$theme_options = array();
$theme_options[] = array( "name" => "Typography",
                    "type" => "heading",
					"icon" => get_bloginfo('template_url')."/admin/images/settings.png");
$theme_options[] = array( "name" => "Custom CSS",
					"desc" => "",
					"id" => SHORTNAME."custom_css",
					"std" => "",
					"type" => "textarea");
					
$theme_options[] = array( "name" => "General",
                    "type" => "heading",
					"icon" => get_bloginfo('template_url')."/admin/images/settings.png");
					
$theme_options[] = array( "name" => "Banner",
					"desc" => "",
					"id" => SHORTNAME."banner_image",
					"std" => "",
					"type" => "upload");
					
$theme_options[] = array( "name" => "Client Link",
					"desc" => "",
					"id" => SHORTNAME."client",
					"std" => "",
					"type" => "text");
$theme_options[] = array( "name" => "Candidate Link",
					"desc" => "",
					"id" => SHORTNAME."candidates",
					"std" => "",
					"type" => "text");
															
$theme_options[] = array( "name" => "Contact",
                    "type" => "heading",
					"icon" => get_bloginfo('template_url')."/admin/images/settings.png");
					
$theme_options[] = array( "name" => "Phone No",
					"desc" => "",
					"id" => SHORTNAME."phone",
					"std" => "",
					"type" => "text");
$theme_options[] = array( "name" => "Email",
					"desc" => "",
					"id" => SHORTNAME."email",
					"std" => "",
					"type" => "text");
						
$theme_options[] = array( "name" => "Facebook Link",
					"desc" => "",
					"id" => SHORTNAME."facebook",
					"std" => "",
					"type" => "text");
$theme_options[] = array( "name" => "Twitter Link",
					"desc" => "",
					"id" => SHORTNAME."twitter",
					"std" => "",
					"type" => "text");
$theme_options[] = array( "name" => "Linkedin Link",
					"desc" => "",
					"id" => SHORTNAME."linkedin",
					"std" => "",
					"type" => "text");
					
$theme_options[] = array( "name" => "Address",
					"desc" => "",
					"id" => SHORTNAME."address",
					"std" => "",
					"type" => "textarea");																										
																																				
																					
											
$theme_options[] = array( "name" => "Footer",
                    "type" => "heading",
					"icon" => get_bloginfo('template_url')."/admin/images/settings.png");
					
$theme_options[] = array( "name" => "Call US Link",
					"desc" => "",
					"id" => SHORTNAME."call_us",
					"std" => "",
					"type" => "text");
$theme_options[] = array( "name" => "Book A Call Link",
					"desc" => "",
					"id" => SHORTNAME."book_a_call",
					"std" => "",
					"type" => "text");
$theme_options[] = array( "name" => "Email Us Link",
					"desc" => "",
					"id" => SHORTNAME."email_us",
					"std" => "",
					"type" => "text");
					

																							
										
	}//ENd options
}//End if options
if ( get_magic_quotes_gpc() ) {
	$_POST = array_map( 'stripslashes_deep', $_POST );
	$_GET = array_map( 'stripslashes_deep', $_GET );
	$_COOKIE = array_map( 'stripslashes_deep', $_COOKIE );
	$_REQUEST = array_map( 'stripslashes_deep', $_REQUEST );
} else {
	$_POST = array_map( 'stripslashes_deep', $_POST );
	$_GET = array_map( 'stripslashes_deep', $_GET );
	$_COOKIE = array_map( 'stripslashes_deep', $_COOKIE );
	$_REQUEST = array_map( 'stripslashes_deep', $_REQUEST );
}
?>