<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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
        <div class="col-sm-12 col-md-9">
          <?php
          while ( have_posts() ) :
            the_post();
            // Default Content for page
            get_template_part( 'template-parts/content', 'page' );

          endwhile; // End of the loop.
          ?>
        </div>
        <div class="col-sm-12 col-md-3">
        <?php

          // check if the repeater field has rows of data
          if( have_rows('landing_sidebar') ):

            // loop through the rows of data
              while ( have_rows('landing_sidebar') ) : the_row();

                  // display a sub field value
                  //the_sub_field('sidebar_item');
                
                  ?>
                  <?php $post_object = get_sub_field('sidebar_item'); ?>
 
                  <?php if( $post_object ): ?>

                      <?php $post = $post_object; setup_postdata( $post ); ?>
                      
                      <div class="sidebar-item">
                        <?php if (has_post_thumbnail()): ?>
                          <a href="<?php the_permalink(); ?>" class="sidebar-item--img">
                            <?php the_post_thumbnail('thumbnail'); ?>
                          </a>
                        <?php endif; ?>

                        <div class="sidebar-item--content">
                          <h3><?php echo the_title(); ?></h3>

                          <?php the_excerpt(); ?><span>
                            <a href="<?php the_permalink(); ?>">Read more...</a>
                          </span>
                        </div>
                      </div>

                      <?php wp_reset_postdata(); ?>

                  <?php endif; ?>


             <?php endwhile;

          else :

              // no rows found

          endif;

          ?>       
          <?php get_sidebar(); ?>
        </div>
      </div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
