<?php

/* Template Name: Job Postings Page */

get_header();


?>

<div id="main-content">

	<div class="container">
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

						<table>
							<thead>
								<tr>
									<td>Employer</td>
									<td>Location</td>
									<td>Position</td>
									<td>Website</td>
								</tr>
								</thead>
								<tbody>


				<?php 
				  $temp = $wp_query; 
				  $wp_query = null; 
				  $wp_query = new WP_Query(); 
				  $wp_query->query('post_type=job_posting'); 

				  while ($wp_query->have_posts()) : $wp_query->the_post(); 
				?>

						<!-- <div class="item-job-posting">
							<a href="<?php //echo get_permalink(); ?>"><h3 class="title"><?php //the_field('job_title'); ?></h3></a>
							<p><strong>Employer: </strong> <?php //the_field('organization'); ?></p>
							<p><strong>Location: </strong> <?php //the_field('location'); ?></p>
							<p><strong>Closing Date: </strong><?php //the_field('job_closing_date'); ?></p>
							<p> <a target="_blank" href="<?php //the_field('job_description'); ?>" >Job Description</a></p>
							<p><a target="_blank" href="<?php //the_field('job_url'); ?>">Website</a></p>
						</div> -->
						
								<tr>
									<td><?php the_field('organization'); ?></td>
									<td><?php the_field('location'); ?></td>
									<td><a target="_blank" href="<?php the_field('job_description'); ?>" ><?php the_field('job_title'); ?></a></td>
									<td><a target="_blank" href="<?php the_field('job_url'); ?>">More Info<i class="fas fa-external-link-alt"></i></a></td>
								</tr>

				<?php endwhile; ?>


							</tbody>
						</table>

				<!-- <nav>
				    <?php //previous_posts_link('&laquo; Newer Job Postings') ?>
				    <?php //next_posts_link('Older Job Postings &raquo;') ?>
				</nav> -->

				<?php 
				  $wp_query = null; 
				  $wp_query = $temp;  // Reset
				?>
				</article> <!-- .et_pb_post -->

			<?php endwhile; ?>

			</div> <!-- left content-->
      <div class="col-sm-12 col-md-3">
			<?php get_sidebar(); ?>
      </div>
		</div> <!-- row -->
	</div> <!-- .container -->


</div> <!-- #main-content -->

<?php get_footer(); ?>