<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 */

get_header(); ?>

<?php 
// get all options
$sidebar_class = (vinkmag_option('post_sidebar_layout', 'sidebar-right', true) == 'sidebar-right' && is_active_sidebar('sidebar-right'))
                    ? ['col-lg-9', 'col-lg-3', 'sidebar-right']
                    : ['col-lg-12', 'hidden', 'sidebar-none'];


?><!-- single post start -->
<?php while ( have_posts() ) : the_post(); ?>
<div id="content">
    <div class="container">
        <div class="row">
            <div class="<?php echo esc_attr($sidebar_class[0]); ?>">
                <div class="single-post-wrapper">
                    <?php get_template_part( 'template-parts/blogs/breadcumbs/breadcumb', 'style1' ); ?>
                    <div class="ts-grid-box vinkmag-single content-wrapper">
                        <?php get_template_part( 'template-parts/blogs/post-headers/header', 'style1' ); ?>
                        <div class="post-content-area">
                            <?php if(has_post_thumbnail() && !post_password_required()): ?>
                                <div class="entry-thumbnail post-media post-image post-featured-image">
                                    <a href="<?php esc_url(the_post_thumbnail_url('full')); ?>" class="gallery-popup">
                                        <?php the_post_thumbnail(); ?>
                                    </a>
                                </div>
                                <p class="text-bg"><?php the_post_thumbnail_caption(); ?></p>
                            <?php endif; ?>
                            <?php get_template_part( 'template-parts/blogs/contents/content', 'single' ); ?>
                        </div>
                    </div>
                    <?php comments_template(); ?>
                </div>
            </div>
            <div class="<?php echo esc_attr($sidebar_class[1]); ?>">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>
<?php endwhile; ?>
<?php get_footer(); 
