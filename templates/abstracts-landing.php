<?php

/* Template Name: Abstracts Landing Page */

get_header();


?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main container">
			<div class="row">
        <div class="col-sm-12 col-md-9">
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<h1 class="entry-title main_title"><?php the_title(); ?></h1>

					<div class="entry-content">
					<?php
						the_content();
					?>
					</div> <!-- .entry-content -->

				<?php 
				  $temp = $wp_query; 
				  $wp_query = null; 
				  $wp_query = new WP_Query(); 
				  $wp_query->query('showposts=5&post_type=abstract'.'&paged='.$paged); 

				  while ($wp_query->have_posts()) : $wp_query->the_post(); 
				?>

						<div class="abstract-details">
							<a href="<?php echo get_permalink(); ?>"><h2 class="title"><?php the_field('project_title'); ?></h2></a>
							<?php $excerpt = wp_trim_words( get_field('project_description' ), $num_words = 50, $more = '...' ); ?>
							<p><strong>Description: </strong><?php echo $excerpt; ?></p>
							<p><strong>Specifics: </strong><?php the_field('project_specifics'); ?></p>
							<p><strong>Location: </strong><?php the_field('study_location'); ?></p>
							<p><strong>Project lead: </strong><?php the_field('project_lead'); ?></p>
							<p><strong>Study Dates: </strong> <?php the_field('study_start_date'); ?> <span>to </span><?php the_field('study_end_date'); ?></p>
							<?php if( get_field('study_website') ): ?>
								<p><strong>Study Website:</strong> <a target="_blank" href="<?php the_field('study_website'); ?>"><?php the_field('study_website'); ?></a></p>
							<?php endif; ?>
						</div>		  

				<?php endwhile; ?>

				<nav>
				    <?php previous_posts_link('&laquo; Newer Abstracts') ?>
				    <?php next_posts_link('Older Abstracts &raquo;') ?>
				</nav>

				<?php 
				  $wp_query = null; 
				  $wp_query = $temp;  // Reset
				?>
				</article> <!-- .et_pb_post -->

        <?php endwhile; ?>
        </div>

        <div class="col-sm-12 col-md-3">
          <?php get_sidebar(); ?>
        </div>
			</div> <!-- row -->
		</div> <!-- #content-area -->
	</div> <!-- .container -->


</div> <!-- #main-content -->

<?php get_footer(); ?>