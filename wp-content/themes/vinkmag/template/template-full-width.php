<?php
/**
 * template-home.php
 *
 * Template Name: Fullwidth Template
 * Template Post Type: page
 */


get_header();
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('home-full-width-content');?> role="main">
    <div class="builder-content">
		<?php while ( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
		<?php endwhile; ?>
    </div> <!-- end main-content -->
</div> <!-- end main-content -->
<?php get_footer(); ?>