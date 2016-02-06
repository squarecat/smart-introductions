<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
 <div class="u-container">
        <div class="u-content">
            <div class="c-box aboutus__box">
                <div class="aboutus--top">
                    <!-- <div class="c-box__column c-box__column--left aboutus__img">
                    </div> -->
                    <div class="c-box__column c-box__column--right c-box__column__content">
                    
						<?php
                        // Start the Loop.
							while ( have_posts() ) : the_post();
							
								/*
								* Include the post format-specific template for the content. If you want to
								* use this in a child theme, then include a file called called content-___.php
								* (where ___ is the post format) and that will be used instead.
								*/
								get_template_part( 'content', get_post_format() );
								
								// Previous/next post navigation.
								twentyfourteen_post_nav();
							
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
    </div>

<?php
get_footer();
