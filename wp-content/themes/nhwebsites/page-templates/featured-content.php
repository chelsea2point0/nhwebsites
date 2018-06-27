<?php
/* Template Name: With Featured Content */

/**
 * The template for three-column pages
 * @package nhwebsites
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main container">

				<h1 class="entry-title"><?php the_title(); ?></h1>
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
                <div id="nhw-featured-content-container">
                    <?php
                        /* Get the current post ID. */
                        $post_id = get_the_ID();
                        echo get_post_meta( $post_id, 'nhw_featured_content_class', true ); 
                    ?>
                </div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
