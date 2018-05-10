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
				<div class="col-sm-12 col-md-8">
			<?php  //add me in
//Fields
//slider_portfolio = Gallery Field
$images = get_field('homepage_slider');
if( $images ): ?>
   <div class="slider-for">
        
            <?php foreach( $images as $image ): ?>
                <div class="slick-container">
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                    
                </div>
            <?php endforeach; ?>
    </div>
   <div class="slider-nav">
    </div>
<?php endif; ?>
</div>
</div>

		<?php
		while ( have_posts() ) :
			the_post();

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
get_sidebar();
get_footer();
