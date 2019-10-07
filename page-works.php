<?php
/**
 * The main template file.
 *
 * @package ymk_dev_Theme
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<h2 class="section-title">
			<?php the_title();?>
		</h2>

		<section id="contents-works-page-projects" class="section-works-projects">
		<?php
			$q_work_types = array(
				'taxonomy' => 'work_taxonomies',
				'hide_empty' => false,
	        );
			$work_types = get_terms($q_work_types);
			// var_dump($work_types);
        ?>
		<div class="select-categories">
			<label for="select-work-categories">

			</label>
			<select id="select-work-categories">
				<option value="all">All</option>

				<?php foreach ($work_types as $work_type) :
					$value = $work_type -> slug;
					$name = $work_type -> name;
				?>

					<option value="<?php echo $value ;?>">
						<?php echo $name; ?>
					</option>

				<?php endforeach;?>
			</select>
		</div>
		<?php
			$works_lists = array(
				'post_type' => 'work_posts',
				'posts_per_page' => 16,
			);
			$works = new WP_Query($works_lists);
		?>

		<?php if ( $works->have_posts() ) :?>
		<?php while ( $works->have_posts() ): $works->the_post();?>

			<?php the_title();?>
			<?php // echo get_permalink(); ?>

            <img src="<?php echo get_the_post_thumbnail_url();?>">

		<?php endwhile;?>
		<?php the_posts_navigation(); ?>
		<?php wp_reset_postdata(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</section> <!-- #contents-works-page-projects -->
	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
