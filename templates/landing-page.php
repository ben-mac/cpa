<?php
/**
 * Template Name: Landing Page
 *
 * This is the template for landing pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cpa
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main landing-page">
      <div class="row container">
        <div class="col-sm-12">
        <div class="slider-for">
          <?php
          if( have_rows('landing_slider') ):

              while ( have_rows('landing_slider') ) : the_row();

              $image = get_sub_field('slider_image');
              ?>
                <div class="slick-container">
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                    <h1><?php echo the_sub_field('slider_text'); ?></h1>
                </div>
            <?php
              endwhile;

          else :

              // no rows found

          endif;

          ?>
          </div>
        </div>
      </div>
      <div class="row section-title">
        <?php the_title( '<h2 class="section-title--text">', '</h2>' ); ?>

      </div>
      <div class="row container">
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
get_footer();
