<?php
/**
 * The template for displaying all single posts and attachments
 */

get_header();
while ( have_posts() ) : the_post();
    $override = (vinkmag_post_option(get_the_ID(), 'override_default', 'no') == 'yes') ? true : false;
    $layout = vinkmag_option('post_header_layout', 'style1', $override);
    get_template_part( 'template-parts/blogs/post-layouts/layout', $layout );
endwhile;
get_footer(); 
