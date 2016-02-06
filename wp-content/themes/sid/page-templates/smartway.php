<?php
/**
 * Template Name: Smart way Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
 <div class="u-container">
        <div class="u-content">
          <div class="c-box">
            <div class="c-box__column c-box__column--left smartway--left">
              <div class="smartway__links-wrapper">
                <ul class="smartway__links">
					<?php $i=1; if( have_rows('smart_way_links') ): ?>
						 <?php while( have_rows('smart_way_links') ): the_row(); ?>
                              <li class="smartway__link  <?php if($i==1){ echo "smartway__link--active";} ?>">
                                <div class="smartway__link__header">
                                  <a href="#"><?php echo get_sub_field('title') ?></a>
                                </div>
                                <div class="smartway__link__content">
                                  <p>
                                    <?php echo get_sub_field('content') ?>
                                  </p>
                                </div>
                              </li>
                           <?php $i++; endwhile; ?>
                       <?php endif; ?>
                 </ul>
              </div>
            </div>
            <div class="c-box__column c-box__column--right c-box__column__content smartway--right">
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
              
            </div>
          </div>
        </div>
      </div>
<?php
get_footer();
