<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
  <?php global $theme_data; $theme_data = get_option(OPTIONS); ?>
<div class="c-footer">
      <ul class="c-footer__btns">
        <li class="c-footer__btn">
          <a href="<?php echo $theme_data['sd_call_us']; ?>" class="c-footer__link">
            <span class="fa fa-phone fa-fw fa-3x c-footer__fa-icon"></span>
            <span class="c-footer__btn__text">Call Us</span>
          </a>
        </li>
        <li class="c-footer__btn">
          <a href="<?php echo $theme_data['sd_book_a_call']; ?>" class="c-footer__link">
            <span class="fa fa-book fa-fw fa-3x c-footer__fa-icon"></span>
            <span class="c-footer__btn__text">Book A Call</span>
          </a>
        </li>
        <li class="c-footer__btn">
          <a href="<?php echo $theme_data['sd_email_us']; ?>" class="c-footer__link">
            <span class="fa fa-envelope-o fa-fw fa-3x c-footer__fa-icon"></span>
            <span class="c-footer__btn__text">Email Us</span>
          </a>
        </li>
      </ul>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
      <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/owl.carousel.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>

    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
        // (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        // function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        // e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        // e.src='https://www.google-analytics.com/analytics.js';
        // r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
        // ga('create','UA-XXXXX-X','auto');ga('send','pageview');
   setTimeout(function () {
          $('.contact-us-box').addClass('loaded');
        }, 1000);
		</script>
 <?php wp_footer(); ?>
</body>
</html>