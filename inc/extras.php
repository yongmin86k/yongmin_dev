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
 * Define the metabox and field configurations.
 */
function works__cmb2_metaboxes() {
	/**
	 * Initiate the metabox
	 */
	$work_details = new_cmb2_box( array(
		'id'            => 'work_details',
		'title'         => __( 'Work details', 'cmb2' ),
		'object_types'  => array( 'work_posts', ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		'show_in_rest' => WP_REST_Server::READABLE, // Enabling the REST API for a CMB2 box
	) );

	$work_details->add_field( array(
		'name' => 'Start Date',
		'id'   => 'date_start',
		'type' => 'text_date',
		// 'timezone_meta_key' => 'wiki_test_timezone',
		 'date_format' => 'Y-m-d',
		// 'repeatable' => false, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );

	$work_details->add_field( array(
		'name' => 'End Date',
		'id'   => 'date_end',
		'type' => 'text_date',
		'date_format' => 'Y-m-d',
	) );

}

add_action( 'cmb2_init', 'works__cmb2_metaboxes' );

/**
 * Create WP-API queries of post_type = work_posts
 */
function filter_rest_work_posts_query($query_vars) {

	$query_vars['posts_per_page'] = 4;
	$query_vars['orderby'] = 'meta_value_num';
	$query_vars['order'] = array(
			'key_work_start' => 'desc',
			'key_work_end' => 'desc',
		);

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

	return $query_vars;
}
add_filter( 'rest_work_posts_query', 'filter_rest_work_posts_query', 10, 2);