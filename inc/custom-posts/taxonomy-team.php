<?php
add_action('init', 'wpsp_tax_team_category_init', 0);

function wpsp_tax_team_category_init() {
	register_taxonomy(
		'team_category',
		array( 'team' ),
		array(
			'hierarchical' => true,
			'labels' => array(
				'name' => __( 'Team Categories', 'wpsp' ),
				'singular_name' => __( 'Team Categories', 'wpspn' )
			),
			'sort' => true,
			'rewrite' => array( 'slug' => 'team-category' ),
			'show_in_nav_menus' => false
		)
	);
}