<?php
/**
 * Include metabox on front page
 * @author Ed Townend
 * @link https://github.com/CMB2/CMB2/wiki/Adding-your-own-show_on-filters
 *
 * @param bool $display
 * @param array $meta_box
 * @return bool display metabox
 */
function ed_metabox_include_front_page( $display, $meta_box ) {
	if ( ! isset( $meta_box['show_on']['key'] ) ) {
		return $display;
	}

	if ( 'front-page' !== $meta_box['show_on']['key'] ) {
		return $display;
	}

	$post_id = 0;

	// If we're showing it based on ID, get the current ID
	if ( isset( $_GET['post'] ) ) {
		$post_id = $_GET['post'];
	} elseif ( isset( $_POST['post_ID'] ) ) {
		$post_id = $_POST['post_ID'];
	}

	if ( ! $post_id ) {
		return false;
	}

	// Get ID of page set as front page, 0 if there isn't one
	$front_page = get_option( 'page_on_front' );

	// there is a front page set and we're on it!
	return $post_id == $front_page;
}
add_filter( 'cmb2_show_on', 'ed_metabox_include_front_page', 10, 2 );

/**
 * CMB2
 * Define the metabox and field configurations.
 */
function works__cmb2_metaboxes() {

	// Init $work_details custom field
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

	$work_details->add_field( array(
		'name' => __( 'Link URL', 'cmb2' ),
		'id'   => 'work_url',
		'type' => 'text_url',
		// 'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Array of allowed protocols
	) );


	// Init $my_skills custom field
	$my_skills = new_cmb2_box( array(
		'id'            => 'my_skills',
		'title'         => __( 'My Skill Set', 'cmb2' ),
		'object_types'  => array( 'page', ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		'show_on'       => array( 'key' => 'front-page', 'value' => '' ),
		'show_in_rest' => WP_REST_Server::READABLE, // Enabling the REST API for a CMB2 box
	) );

	$my_skill_sets = $my_skills->add_field( array(
		'id'            => 'my_skill_sets',
		'type'          => 'group',
		'description'   => __( 'Group of Skills', 'cmb2' ),
		'repeatable'  => true, // use false if you want non-repeatable group
		'options'     => array(
			'group_title'       => __( 'Skill {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
			'add_button'        => __( 'Add Another skill', 'cmb2' ),
			'remove_button'     => __( 'Remove skill', 'cmb2' ),
			'sortable'          => true,
			 'closed'         => true, // true to have the groups closed by default
			// 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
		),
	) );

	$my_skills->add_group_field( $my_skill_sets, array(
		'name'              => 'Category',
		'id'                => 'skill_cat',
		'type'              => 'radio_inline',
		'show_option_none'  => true,
		'options'           => array(
			'skill_soft'    => __( 'Soft Skill', 'cmb2' ),
			'skill_dev'     => __( 'Develop Skill', 'cmb2' ),
			'skill_des'     => __( 'Design Skill', 'cmb2' ),
		),
	) );

	$my_skills->add_group_field( $my_skill_sets, array(
		'name'    => 'Icon',
		'desc'    => 'Upload an image',
		'id'      => 'skill_icon',
		'type'    => 'file',
		// Optional:
		'options' => array(
			'url' => false, // Hide the text input for the url
		),
		'text'    => array(
			'add_upload_file_text' => 'Add File' // Change upload button text. Default: "Add or Upload File"
		),
		// query_args are passed to wp.media's library query.
		'query_args' => array(
			'type' => 'image/svg',
			// 'type' => 'application/pdf', // Make library only display PDFs.
			// Or only allow gif, jpg, or png images
			// 'type' => array(
			// 	'image/gif',
			// 	'image/jpeg',
			// 	'image/png',
			// ),
		),
		'preview_size' => 'large', // Image size to use when previewing in the admin.
	) );

	$my_skills->add_group_field( $my_skill_sets, array(
		'name'    => 'Name',
		'id'      => 'skill_name',
		'type'    => 'text_small'
		// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );



}

add_action( 'cmb2_init', 'works__cmb2_metaboxes' );