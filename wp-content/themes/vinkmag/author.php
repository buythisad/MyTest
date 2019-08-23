<?php
/**
 * The template for displaying Author Archive pages.
 */

get_header(); 

$main_layout = vinkmag_option('block_category_template', 'style-default');
get_template_part( 'template-parts/blogs/category-layouts/layout', $main_layout );
get_footer(); 
