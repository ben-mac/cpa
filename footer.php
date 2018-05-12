<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cpa
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
			<div class="site-footer--social container">
				<div class="row">
					<div class="col-xs-12 col-sm-4">
					<?php wp_nav_menu( array( 
					'theme_location' => 'social-media-menu', 
					'container_class' => 'social-media-menu'
				) ); ?>
					</div>
				</div>

			</div>
			<div class="site-footer--menu container">
				<?php wp_nav_menu( array( 
					'theme_location' => 'footer-menu', 
					'container_class' => 'footer-menu' 
				) ); ?>
			</div>
			<div class="site-footer--credits container">
				<?php
					/* translators: 1: Theme name, 2: Theme author. */
					printf( esc_html__( 'Website designed %1$s by %2$s.', '' ), '', '<a href="http://tachemarketing.com/">Tache Marketing</a>' );
				?>
			</div>
		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
