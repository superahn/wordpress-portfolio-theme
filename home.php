<?php

// remove sidebars on homepage only
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_loop', 'child_grid_loop_helper');

// Add support for Genesis Grid Loop
function child_grid_loop_helper() {
	if(function_exists('genesis_grid_loop')) {
		genesis_grid_loop( array(
			'features' => 0,
			'feature_image_size' => 0,
			'feature_image_class' => 'alignleft post-image',
			'feature_content_limit' => 0,
			'grid_image_size' => 'grid-thumbnail',
			'grid_image_class' => 'alignleft post-image',
			'grid_content_limit' => 0,
			'more' => __('[Continue reading...', 'genesis'),
		));
	} else {
		genesis_standard_loop();
	}
}

// Remove the post meta function for front page only
remove_action('genesis_after_post_content', 'genesis_post_meta');

// Intro
add_action('genesis_after_header', 'intro_helper');

function intro_helper() {
	echo '<div id="intro">';
	echo '<h1>I am a <strong>Melbourne based Web Developer</strong><br>specialising in <strong>Web Apps and Mobile development.</strong></h1>';	
	echo '</div>';
}

genesis();