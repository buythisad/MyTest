<?php

// shorthand contants
// ------------------------------------------------------------------------
define('VINKMAG_THEME', 'Vinkmag WordPress Theme');
define('VINKMAG_VERSION', '1.2.0');
define('VINKMAG_MINWP_VERSION', '4.3');


// shorthand contants for theme assets url
// ------------------------------------------------------------------------
define('VINKMAG_THEME_URI', get_template_directory_uri());
define('VINKMAG_IMG', VINKMAG_THEME_URI . '/assets/images');
define('VINKMAG_CSS', VINKMAG_THEME_URI . '/assets/css');
define('VINKMAG_JS', VINKMAG_THEME_URI . '/assets/js');


// shorthand contants for theme assets directory path
// ----------------------------------------------------------------------------------------
define('VINKMAG_THEME_DIR', get_template_directory());
define('VINKMAG_IMG_DIR', VINKMAG_THEME_DIR . '/assets/images');
define('VINKMAG_CSS_DIR', VINKMAG_THEME_DIR . '/assets/css');
define('VINKMAG_JS_DIR', VINKMAG_THEME_DIR . '/assets/js');

define('VINKMAG_CORE', VINKMAG_THEME_DIR . '/core');
define('VINKMAG_COMPONENTS', VINKMAG_THEME_DIR . '/components');
define('VINKMAG_EDITOR', VINKMAG_COMPONENTS . '/editor');
define('VINKMAG_EDITOR_ELEMENTOR', VINKMAG_EDITOR . '/elementor');
define('VINKMAG_EDITOR_GUTENBERG', VINKMAG_EDITOR . '/gutenberg');
define('VINKMAG_INSTALLATION', VINKMAG_CORE . '/installation-fragments');
define('VINKMAG_REMOTE_CONTENT', esc_url('http://xpeedstudio.net/demo-content/vinkmag'));


// set up the content width value based on the theme's design
// ----------------------------------------------------------------------------------------
if (!isset($content_width)) {
    $content_width = 800;
}


// set up theme default and register various supported features.
// ----------------------------------------------------------------------------------------

function vinkmag_action_setup() {

    // make the theme available for translation
    $lang_dir = VINKMAG_THEME_DIR . '/languages';
    load_theme_textdomain('vinkmag', $lang_dir);

    // add support for post formats
    add_theme_support('post-formats', [
        'standard', 'video',
    ]);

    // add support for automatic feed links
    add_theme_support('automatic-feed-links');

    // let WordPress manage the document title
    add_theme_support('title-tag');

    // add support for post thumbnails
    add_theme_support('post-thumbnails');

    // hard crop center center
    set_post_thumbnail_size(850, 560, ['center', 'center']);
    add_image_size( 'vinkmag-medium', 600, 398, array( 'center', 'center' ) );
    add_image_size( 'vinkmag-small', 455, 300, array( 'center', 'center' ) );

    // register navigation menus
    register_nav_menus(
        [
            'primary' => esc_html__('Primary menu', 'vinkmag'),
            'top' => esc_html__('Top menu', 'vinkmag'),
            'footer' => esc_html__('Footer menu', 'vinkmag'),
        ]
    );

    // HTML5 markup support for search form, comment form, and comments
    add_theme_support('html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ));

    //Wooocmmemrce support

	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
    
    /*
    * Enable support for wide alignment class for Gutenberg blocks.
    */
    add_theme_support( 'align-wide' );
    add_theme_support( 'editor-styles' );
    add_theme_support( 'wp-block-styles' );
}
add_action('after_setup_theme', 'vinkmag_action_setup');



// hooks for unyson framework
// ----------------------------------------------------------------------------------------
function vinkmag_filter_framework_customizations_path($rel_path) {
    return '/components';
}
add_filter('fw_framework_customizations_dir_rel_path', 'vinkmag_filter_framework_customizations_path');


function vinkmag_action_remove_fw_settings() {
    remove_submenu_page( 'themes.php', 'fw-settings' );
}
add_action( 'admin_menu', 'vinkmag_action_remove_fw_settings', 999 );


// include the init.php
// ----------------------------------------------------------------------------------------
require_once( VINKMAG_CORE . '/init.php');

// include editor files
// ----------------------------------------------------------------------------------------
require_once( VINKMAG_COMPONENTS . '/editor/elementor/elementor.php'); // elementor widgets
//require_once( VINKMAG_COMPONENTS . '/editor/gutenberg/gutenberg.php'); // gutenberg widgets


add_action('enqueue_block_editor_assets', 'vinkmag_action_enqueue_block_editor_assets' );
function vinkmag_action_enqueue_block_editor_assets() {
    wp_enqueue_style( 'vinkmag-fonts', vinkmag_google_fonts_url(['Arimo:400,400i,700,700i', 'Heebo:400,500,700,800,900', 'Merriweather:400,400i,700,700i,900,900i']), null, VINKMAG_VERSION );
    wp_enqueue_style( 'vinkmag-gutenberg-editor-font-awesome-styles', VINKMAG_CSS . '/font-awesome.min.css', null, VINKMAG_VERSION );
    wp_enqueue_style( 'vinkmag-gutenberg-editor-customizer-styles', VINKMAG_CSS . '/gutenberg-editor.css', null, VINKMAG_VERSION );
    wp_enqueue_style( 'vinkmag-gutenberg-editor-styles', VINKMAG_CSS . '/gutenberg.css', null, VINKMAG_VERSION );
    wp_enqueue_style( 'vinkmag-gutenberg-blog-styles', VINKMAG_CSS . '/blog.css', null, VINKMAG_VERSION );
}
// add_editor_style( vinkmag_google_fonts_url(['Arimo:400,400i,700,700i', 'Heebo:400,500,700,800,900', 'Merriweather:400,400i,700,700i,900,900i']) );
// add_editor_style( VINKMAG_CSS . '/gutenberg-editor.css' );
// add_editor_style( VINKMAG_CSS . '/gutenberg.css' );

function vinkmag_remove_menus(){ remove_menu_page( 'fw-extensions' ); }
add_action( 'admin_init', 'vinkmag_remove_menus' );