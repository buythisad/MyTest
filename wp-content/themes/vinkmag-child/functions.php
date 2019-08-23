<?php
/* Write your awesome functions below */

function vinkmag_theme_enqueue_styles()
{

	$parent_style = 'parent-style';

	if(!wp_style_is( $parent_style, $list = 'enqueued' )){
		wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css', array());
	}
	wp_enqueue_style('child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array($parent_style)
	);
}

add_action('wp_enqueue_scripts', 'vinkmag_theme_enqueue_styles');