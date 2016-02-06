<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
<!DOCTYPE html>
  <?php global $theme_data; $theme_data = get_option(OPTIONS); ?>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/vendor/owl-carousel/owl.carousel.css"> 
    <!-- Default Theme -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/vendor/owl-carousel/owl.theme.css">

    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/smart-intros-favicon.ico">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/main.css">
    <script src='https://api.mapbox.com/mapbox.js/v2.2.2/mapbox.js'></script>
    <link href='https://api.mapbox.com/mapbox.js/v2.2.2/mapbox.css' rel='stylesheet' />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
    <style>
		<?php echo stripslashes($theme_data['sd_custom_css']); ?>
	</style>
</head>
<?php if(!is_front_page()){ ?>
<body class="page">
<div class="wrapper">

  <!--[if lt IE 8]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->
  <div class="c-header">
    <div class="c-header__inner u-container">
      <div class="c-header__logo-container">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" class="c-header__logo"></a>
      </div>
  		 <?php $cur_page_url = "http://".$_SERVER["SERVER_NAME"].$_SERVER['REQUEST_URI']; if ( get_field('client_&_candidate') == 'Client') { ?>
			  <?php
                $menu_name = 'client';
                if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
					$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
					$menu_items = wp_get_nav_menu_items($menu->term_id);
					$menu_list = '<ul class="c-header__links">';
					$menu_select = '<select class="c-header__select">';
					$i = 1;
					foreach ( (array) $menu_items as $key => $menu_item ) {
						$title = $menu_item->title;
						$url = $menu_item->url;
						if($url == $cur_page_url){
							$menu_list .= '<li class="c-header__link c-header__link--active"><a href="' . $url . '">' . $title . '</a></li>';
							$menu_select .= '<option value="' . $i . '" selected="selected">' . $title . '</option>';
						}else{
							$menu_list .= '<li class="c-header__link"><a href="' . $url . '">' . $title . '</a></li>';
							$menu_select .= '<option value="' . $i . '">' . $title . '</option>';
						}
						$i++;
					}
					$menu_list .= '</ul>';
					$menu_select .= '</select>';
                }
                echo $menu_list.$menu_select;
              ?>
                  <ul class="c-header__links-upper">
		    <li class="c-header__link-upper c-header__link-upper--news"><a href="<?php echo get_permalink(16); ?>">News</a></li>
                    <li class="c-header__link-upper"><a href="<?php echo $theme_data['sd_candidates']; ?>">Candidate</a></li>
                    <li class="c-header__link-upper c-header__link-upper--active"><a href="<?php echo $theme_data['sd_client']; ?>">Client</a></li>
                  </ul>
      <?php } else if ( get_field('client_&_candidate') == 'Candidate') { ?>
     	 		<?php
                $menu_name = 'candidates';
                if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
					$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
					$menu_items = wp_get_nav_menu_items($menu->term_id);
					$menu_list = '<ul class="c-header__links">';
					$menu_select = '<select class="c-header__select">';
					$i = 1;
					foreach ( (array) $menu_items as $key => $menu_item ) {
						$title = $menu_item->title;
						$url = $menu_item->url;
						if($url == $cur_page_url){
							$menu_list .= '<li class="c-header__link c-header__link--active"><a href="' . $url . '">' . $title . '</a></li>';
							$menu_select .= '<option value="' . $i . '" selected="selected">' . $title . '</option>';
						}else{
							$menu_list .= '<li class="c-header__link"><a href="' . $url . '">' . $title . '</a></li>';
							$menu_select .= '<option value="' . $i . '">' . $title . '</option>';
						}
						$i++;
					}
					$menu_list .= '</ul>';
					$menu_select .= '</select>';
                }
                echo $menu_list.$menu_select;
              ?>
                  <ul class="c-header__links-upper">
		    <li class="c-header__link-upper c-header__link-upper--news"><a href="<?php echo get_permalink(16); ?>">News</a></li>
                    <li class="c-header__link-upper c-header__link-upper--active"><a href="<?php echo $theme_data['sd_candidates']; ?>">Candidate</a></li>
                    <li class="c-header__link-upper"><a href="<?php echo $theme_data['sd_client']; ?>">Client</a></li>
                  </ul>
       
		<?php } else{ ?>
         <?php
                $menu_name = 'primary';
                if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
					$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
					$menu_items = wp_get_nav_menu_items($menu->term_id);
					$menu_list = '<ul class="c-header__links">';
					$menu_select = '<select class="c-header__select">';
					$i = 1;
					foreach ( (array) $menu_items as $key => $menu_item ) {
						$title = $menu_item->title;
						$url = $menu_item->url;
						if($url == $cur_page_url){
							$menu_list .= '<li class="c-header__link c-header__link--active"><a href="' . $url . '">' . $title . '</a></li>';
							$menu_select .= '<option value="' . $i . '" selected="selected">' . $title . '</option>';
						}else{
							$menu_list .= '<li class="c-header__link"><a href="' . $url . '">' . $title . '</a></li>';
							$menu_select .= '<option value="' . $i . '">' . $title . '</option>';
						}
						$i++;
					}
					$menu_list .= '</ul>';
					$menu_select .= '</select>';
                }
                echo $menu_list.$menu_select;
              ?>
        		<ul class="c-header__links-upper">
			  <li class="c-header__link-upper c-header__link-upper--news"><a href="<?php echo get_permalink(16); ?>">News</a></li>
                          <li class="c-header__link-upper"><a href="<?php echo $theme_data['sd_candidates']; ?>">Candidate</a></li>                    
                          <li class="c-header__link-upper c-header__link-upper--active"><a href="<?php echo $theme_data['sd_client']; ?>">Client</a></li>
                    
                  </ul>
        <?php } ?>
    </div>
  </div>
  <?php } ?>