<?php
/**
 * Template Name: Home Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
<style>.landing::after { background-image:url("<?php echo $theme_data['sd_banner_image']; ?>")}</style>
<body class="landing">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <div class="landing__header-wrapper">
      <div class="landing__header-inner">
        <div class="landing__header">
          <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" class="landing__header__logo" />
        </div>

        <div class="landing__action-btns">
          <a href="<?php echo $theme_data['sd_candidates']; ?>" class="landing__action-btn btn btn--grey">Candidates</a>
          <a href="<?php echo $theme_data['sd_client']; ?>" class="landing__action-btn btn btn--red">Clients</a>
        </div>
      </div>
    </div>
<?php
get_footer();
