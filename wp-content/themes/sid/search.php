<?php
/**
 * The template for displaying Search Results pages
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
                    
                    <?php if ( have_posts() ) : ?>
                    
                    <header class="page-header">
                    	<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentyfourteen' ), get_search_query() ); ?></h1>
                    </header><!-- .page-header -->
                    
                    <?php
						// Start the Loop.
						while ( have_posts() ) : the_post();
						
							/*
							* Include the post format-specific template for the content. If you want to
							* use this in a child theme, then include a file called called content-___.php
							* (where ___ is the post format) and that will be used instead.
							*/
							get_template_part( 'content', get_post_format() );
						
						endwhile;
						// Previous/next post navigation.
						twentyfourteen_paging_nav();
						
						else :
						// If no content, include the "No posts found" template.
						get_template_part( 'content', 'none' );
                    
                    endif;
                    ?>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
get_footer();
