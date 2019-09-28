<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package ymk_dev_Theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */

function ymk_dev_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'ymk_dev_body_classes' );

/**
 * Create WP-API queries of post_type = work_posts
 */
function filter_rest_work_posts_query($query_vars) {

	$query_vars['posts_per_page'] = 4;

	$query_vars['meta_query'] = array(
		'relation' => 'AND',
			'key_work_start' => array(
				'key' => 'date_start',
				'compare' => 'EXISTS',
			),
			'key_work_end' => array(
				'key' => 'date_end',
				'compare' => 'EXISTS',
			),
	);

	$query_vars['orderby'] = array(
		'key_work_start' => 'DESC',
		'key_work_end' => 'DESC',
	);

	return $query_vars;
}
add_filter( 'rest_work_posts_query', 'filter_rest_work_posts_query', 10, 2);

require_once get_template_directory() . '/inc/cmb2.php';