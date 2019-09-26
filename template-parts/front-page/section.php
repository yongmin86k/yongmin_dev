<?php
	$taxonomies = get_terms( array(
		'taxonomy' => 'work_taxonomies',
		'hide_empty' => false,
		'parent' => 0,
		'order' => 'DESC'
	));
?>
<section class="visible">
	<div class="header-meta">

		<h3 class="section-title">
			<a href="<?php echo esc_url( home_url( '/works' ) ) ;?>">
				Latest Works
			</a>
		</h3>

		<div id="ajax-front-page-works" class="filter-works">
			<!-- Filtering works with ajax	-->
				<div class="filter-txt">
					<input id="filter-works-all" type="radio" name="filter-works" value="all" checked>
					<label for="filter-works-all">All</label>
				</div>
			<?php
				foreach( $taxonomies as $value ):
					$name =  $value  -> name;
					$slug =  $value  -> slug;
			?>
				<div class="filter-txt">
					<input id="filter-works-<?php echo $slug ;?>" type="radio" name="filter-works" value="<?php echo $slug ;?>">
					<label for="filter-works-<?php echo $slug ;?>"><?php echo $name ;?></label>
				</div>
			<?php
				endforeach;
				wp_reset_postdata();
			?>
		</div>

	</div>
</section>