<?php
/**
 *
 * Template Name: Home page
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
				$images = get_field('homepage_slider');
				if( $images ): ?>
					<div class="slider-for">
						<?php foreach( $images as $image ): ?>
								<div class="slick-container">
								<p><?php echo $image['caption']; ?></p>
									<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
								</div>
						<?php endforeach; ?>
					</div>
					<div class="slider-nav">
					</div>
				<?php endif; ?>
			</div>
			<div class="col-sm-12 col-md-3">
			<?php
				// check if the repeater field has rows of data
				if( have_rows('cta') ):
					// loop through the rows of data
						while ( have_rows('cta') ) : the_row(); ?>
						<div class="cta">
							<h2><?php the_sub_field('cta_text'); ?></h2>
							<?php 

							$link = get_sub_field('cta_link');

							if( $link ): ?>
								
								<a class="button" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>

							<?php endif; ?>
						</div>
						<?php

						endwhile;

				else :

						// no rows found

				endif;

				?>

				<div class="cta">
					<h2><?php echo('Stay Connected'); ?></h2>
					<?php wp_nav_menu( array( 'menu' => 'Social Media', 'container_class' => 'social-media-menu' ) ); ?>

				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12 col-md-8">
			<?php
			while ( have_posts() ) :
				the_post();

				// Default post content for page
				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.
			?>

				<div class="spotlight">
				<?php 
					$posts = get_field('spotlight');
					if( $posts ): ?>
							<ul>
							<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
									<?php setup_postdata($post); ?>
									<li>
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
											<?php the_excerpt(); ?>
									</li>
							<?php endforeach; ?>
							</ul>
							<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-sm-12 col-md-4">
				<?php	get_sidebar(); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">

					<ul class="products">
	<?php
		$args = array(
			'post_type' => 'product',
			'posts_per_page' => 12
			);
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();
				wc_get_template_part( 'content', 'product' );
			endwhile;
		} else {
			echo __( 'No products found' );
		}
		wp_reset_postdata();
	?>
</ul><!--/.products-->
			</div>
		</div>
		

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
