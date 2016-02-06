<?php
/**
 * Template Name: Contact Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
   <div class="u-container">
        <div class="u-content">
          <div class="c-box contact-us-box">

            <div class="c-box__column c-box__column--left">
              <?php
				// Start the Loop.
				while ( have_posts() ) : the_post();
				
					// Include the page content template.
					get_template_part( 'content', 'page' );
					
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
					comments_template();
					}
				endwhile;
			?>
              <ul class="contact__links">
              	<?php if($theme_data['sd_phone']) {?>
                <li class="contact__link contact--phone">
                  <a href="tel:<?php echo $theme_data['sd_phone']; ?>">
                    <p class="social__text"><?php echo $theme_data['sd_phone']; ?></p>
                  </a>
                </li>
                <?php } ?>
                <?php if($theme_data['sd_email']) { ?>
                <li class="contact__link contact--email">
                  <a href="mailto:<?php echo $theme_data['sd_email']; ?>">
                    <p class="social__text"><?php echo $theme_data['sd_email']; ?></p>
                  </a>
                </li>
                <?php  } ?>
                <?php if($theme_data['sd_facebook']) { ?>
                <li class="contact__link contact--facebook">
                  <a href="<?php echo $theme_data['sd_facebook']; ?>">
                    <p class="social__text">Facebook</p>
                  </a>
                </li>
                <?php } ?>
                <?php if($theme_data['sd_twitter']) { ?>
                <li class="contact__link contact--twitter">
                  <a href="<?php echo $theme_data['sd_twitter']; ?>">
                    <p class="social__text">Twitter</p>
                  </a>
                </li>
                <?php } ?>
                <?php if($theme_data['sd_linkedin']) { ?>
                <li class="contact__link contact--linkedin">
                  <a href="<?php echo $theme_data['sd_linkedin']; ?>">
                    <p class="social__text">LinkedIn</p>
                  </a>
                </li>
                <?php } ?>
                <?php if($theme_data['sd_address']) { ?>
                <li class="contact__link contact--address">
                  <p class="social__text"><?php echo $theme_data['sd_address']; ?></p>
                </li>
                <?php } ?>
              </ul>
           </div>

            <div class="c-box__column c-box__column--right map-container-box">
              <div class="c-box__content">
                <div class="map-container js-mapbox" id="mapbox"></div>
              </div>
            </div>

          </div>
        </div>
      </div>
<?php
get_footer();
