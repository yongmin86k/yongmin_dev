<?php
/**
 * The main template file.
 *
 * @package ymk_dev_Theme
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<h2 class="section-title filter-under">
			<?php the_title();?>
		</h2>

        <section id="works-filters" class="section-works-filters">
            <div class="filter-info">
                <i class="fas fa-filter"></i>
                <p>Filter by</p>
            </div>
            <label class="filter-by active">
                <input type="radio" class="by-date" name="filter-works" checked value="recent">
                <span class="ic-filter">
                    <i class="fas fa-sort-numeric-down-alt"></i>
                </span>
                <p>Recent</p>
            </label>
            <label class="filter-by">
                <input type="radio" class="by-name" name="filter-works" value="asc">
                <span class="ic-filter">
                    <i class="fas fa-sort-alpha-down"></i>
                </span>
                <p>Ascending</p>
            </label>

            <label class="filter-by active" for="filter-work-categories">
	            <?php
	            $q_work_types = array(
		            'taxonomy' => 'work_taxonomies',
		            'hide_empty' => false,
	            );
	            $work_types = get_terms($q_work_types);
	            // var_dump($work_types);
	            ?>

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
                <p>Categories</p>
            </label>

        </section>

		<section id="contents-works-page-projects" class="section-works-projects">
		<?php
			$works_lists = array(
				'post_type' => 'work_posts',
				'posts_per_page' => -1,
			);
			$works = new WP_Query($works_lists);
		?>
<!---->
		<?php if ( $works->have_posts() ) :?>
            <div class="container-works-projects">

            </div>
<!--		--><?php //while ( $works->have_posts() ): $works->the_post();?>
<!---->
<!--			--><?php //the_title();?>
<!--			--><?php //// echo get_permalink(); ?>
<!---->
<!--            <img src="--><?php //echo get_the_post_thumbnail_url();?><!--">-->
<!---->
<!--		--><?php //endwhile;?>
<!--		--><?php //the_posts_navigation(); ?>
		<?php wp_reset_postdata(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</section> <!-- #contents-works-page-projects -->
	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
