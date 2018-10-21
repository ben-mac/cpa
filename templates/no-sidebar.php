<?php
/**
 *
 * Template Name: No Sidebar
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cpa
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main container">

      <div class="row">
        <div class="col-sm-12 col-md-8 col-md-offset-2">
          <?php
          while ( have_posts() ) :
            the_post();
            // Default Content for page
            get_template_part( 'template-parts/content', 'page' );

          endwhile; // End of the loop.
          ?>
        </div>
      </div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
