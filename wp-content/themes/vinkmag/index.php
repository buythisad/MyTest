<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 */

get_header();

$main_layout = vinkmag_option('block_category_template', 'style-default');
get_template_part( 'template-parts/blogs/category-layouts/layout', $main_layout );
get_footer();