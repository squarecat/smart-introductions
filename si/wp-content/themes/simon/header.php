<?php
/**
 * The template for Header.
 *
 * @package Simon WP Framework
 * @since Simon WP Framework 1.0
 */
add_filter('show_admin_bar', '__return_false');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title>
<?php wp_title(); ?>
</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head(); ?>

<link rel="stylesheet" type="text/css" href="/css/main.css">
</head>
<body <?php body_class(); ?>>

<div class="c-header">
  <div class="c-header__inner u-container">
    <div class="menu-icon">
      <div class="menu-icon__line"></div>
      <div class="menu-icon__line--middle"></div>
      <div class="menu-icon__line"></div>
    </div>

    <div class="c-header__logo-container">
      <a href="/"><img src="/img/logo.png" class="c-header__logo"></a>
    </div>
    <ul class="c-header__links">
      <li class="c-header__link c-header__link--active"><a href="#about">About Us</a></li>
      <li class="c-header__link"><a href="#smart">The Smart Way</a></li>
      <li class="c-header__link"><a href="#news">News</a></li>
      <li class="c-header__link"><a href="#salary">Salary Survey</a></li>
      <li class="c-header__link"><a href="#diversity">Diversity & CSR</a></li>
      <li class="c-header__link"><a href="#contact">Contact Us</a></li>
    </ul>
    <select class="c-header__select">
      <option value="1" selected="selected">About Us</option>
      <option value="2">The Smart Way</option>
      <option value="3">News</option>
      <option value="4">Salary Survey</option>
      <option value="5">Diversity & CSR</option>
      <option value="6">Contact Us</option>
    </select>
      <?php
        // $defaults = array(
        //   'menu_class'      => 'c-header__links'
        // );
        // wp_nav_menu($defaults);
      ?>
      <!-- <li class="c-header__link c-header__link--active"><a href>About Us</a></li>
      <li class="c-header__link"><a href>The Smart Way</a></li>
      <li class="c-header__link"><a href>News</a></li>
      <li class="c-header__link"><a href>Salary Survey</a></li>
      <li class="c-header__link"><a href>Diversity & CSR</a></li>
      <li class="c-header__link"><a href>Contact Us</a></li> -->
    <!-- </ul> -->
    <ul class="c-header__links-upper">
      <li class="c-header__link-upper c-header__link-upper--active"><a href="/pages/clients">Client</a></li>
      <li class="c-header__link-upper"><a href="/pages/candidates">Candidate</a></li>
    </ul>
  </div>
</div>