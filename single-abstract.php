<?php

get_header();

?>

<div id="main-content">

	<?php
			while ( have_posts() ): the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content">
					<?php
						the_content();
					?>
					</div> <!-- .entry-content -->

				</article> <!-- .et_pb_post -->

		<?php endwhile;
	?>
	<div class="container">
		<div id="content-area" class="clearfix">
			<div id="left-area">
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>">
				<h1 class="entry-title"><?php the_title(); ?></h1>

					<div class="entry-content">
						<div class="abstract-details">
							<h3 class="title"><span>Title: </span><?php the_field('project_title'); ?></h3>
							<p><strong>Description: </strong><?php the_field('project_description'); ?></p>
							<p><strong>Specifics: </strong><?php the_field('project_specifics'); ?></p>
							<p><strong>Location: </strong><?php the_field('study_location'); ?></p>
							<p><strong>Project lead: </strong><?php the_field('project_lead'); ?></p>
							<p><strong>Study Dates: </strong> <?php the_field('study_start_date'); ?> <span>to </span><?php the_field('study_end_date'); ?></p>
							<?php if( get_field('study_website') ): ?>
								<p><strong>Study Website:</strong> <a target="_blank" href="<?php the_field('study_website'); ?>"><?php the_field('study_website'); ?></a></p>
							<?php endif; ?>							
						</div>
					<?php
						do_action( 'et_before_content' );

						the_content();

						wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'Divi' ), 'after' => '</div>' ) );
					?>
					</div> <!-- .entry-content -->
				</article> <!-- .et_pb_post -->

			<?php endwhile; ?>
			</div> <!-- #left-area -->

			<?php get_sidebar(); ?>
		</div> <!-- #content-area -->
	</div> <!-- .container -->
</div> <!-- #main-content -->

<?php get_footer(); ?>
