<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package nhwebsites
 */

get_header(); ?>

    <div id="top-section-home">
        <div class="container">
            <h1>Time for a website refresh?</h1>
            <p class="oversized-text">We are a team of local developers<br> dedicated to working with New Hampshire businesses</p>
            <button class="button-white home-cta">Learn More</button>
        </div>
    </div>

    <div id="middle-section-home">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Home Page Left") ) : ?>
                    <?php endif;?>
                </div>
                <div class="col-md-4">
                    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Home Page Middle") ) : ?>
                    <?php endif;?>
                </div>
                <div class="col-md-4">
                    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Home Page Right") ) : ?>
                    <?php endif;?>
                </div>
            </div>
        </div>

    </div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main container">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
