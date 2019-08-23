<?php
/**
 * the template for displaying Category pages.
 */

get_header(); 
$category = get_category( get_query_var( 'cat' ) );
$main_layout = vinkmag_term_option($category->cat_ID, 'block_category_template', 'style-default');


get_template_part( 'template-parts/blogs/category-layouts/layout', $main_layout );
get_footer(); 
