<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
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
                        
                        // Include the page content template.
                        get_template_part( 'content', 'page' );
                        
                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) {
                        comments_template();
                        }
                        endwhile;
                        ?>
                        <?php if( have_rows('clients_image') ): ?>
						 <?php while( have_rows('clients_image') ): the_row(); ?>
                            <div class="c-box__content ourclients__row">
                            	<?php if( have_rows('images') ): ?>
									 <?php while( have_rows('images') ): the_row(); ?>
                                		<a href="<?php echo get_sub_field('image_link') ?>" class="ourclients__img-wrap"><img src="<?php echo get_sub_field('image') ?>" class="ourclients__img"></a>
                                	<?php  endwhile; ?>
                       			<?php endif; ?>
                            </div>
                     <?php  endwhile; ?>
                       <?php endif; ?>
                    </div>
                </div>
                  <?php  if(get_field('testimonial')== YES) { ?>
           
                <div class="aboutus--bottom">
                    <div class="testimonials">
                    	<h2 class="c-box__title aboutus__title">Testimonials</h2>
                    	<img class="testimonial__quotation-img" src="<?php  echo get_template_directory_uri(); ?>/img/testimonial_quotation.png" alt="">
                        <div class="owl-carousel">
							<?php
								$testimonial = new WP_Query();
								$testimonial->query(array( 'post_type' => 'Testimonial', 'posts_per_page' => 4, 'order' => 'DESC'));
                            ?>
                            <?php if ($testimonial->have_posts()) : while ($testimonial->have_posts()) : $testimonial->the_post(); ?>
                            <div class="testimonial">
                            <p class="testimonial__company"><?php the_title();?></p>
                            <?php the_content(); ?>
                            <!-- <p class="testimonial__author">General Counsel & Company Secretary, Aviva UK Life at Aviva</p> -->
                            </div>
                            <?php endwhile; endif; wp_reset_query(); ?>
                        </div>
                    </div>
                </div>
              <?php } ?>
            </div>
        </div>
    </div>

<?php
get_footer();
