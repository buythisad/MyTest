<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * includes all files and trigger the action hook by load
 */

class Vinkmag_Theme_Includes {

	private static $rel_path	 = null;
	private static $initialized	 = false;
	private static $customizer	 = [];


    // auto load
    // ----------------------------------------------------------------------------------------
	public static function init() {
		if ( self::$initialized ) {
			return;
		} else {
			self::$initialized = true;
		}
        self::_action_init();

		if(!is_admin()){
            // for frontend
			add_action( 'wp_enqueue_scripts', array( __CLASS__, '_action_enqueue_scripts' ), 20	);
		}else{
			// for admin
			add_action( 'admin_enqueue_scripts', array( __CLASS__, '_action_enqueue_admin_scripts' ), 20 );
		}

		add_action('fw_option_types_init', array( __CLASS__, '_action_custom_option_types'));
	}


    // directory name to class name, transform dynamically
    // ----------------------------------------------------------------------------------------
	private static function dirname_to_classname( $dirname ) {
		$class_name	 = explode( '-', $dirname );
		$class_name	 = array_map( 'ucfirst', $class_name );
		$class_name	 = implode( '_', $class_name );

		return $class_name;
    }
    

    // directory path for theme core
    // ----------------------------------------------------------------------------------------
	private static function get_core_part( $append = '' ) {
		self::$rel_path = '/core';
		return self::$rel_path . $append;
	}


    // directory path for theme components
    // ----------------------------------------------------------------------------------------
	private static function get_component_part( $append = '' ) {
		self::$rel_path = '/components';
		return self::$rel_path . $append;
	}


    // include method, using file prefix
    // ----------------------------------------------------------------------------------------
	public static function include_isolated( $inc_path, $frag = 'core' ) {
		$dir_name = 'get_' . $frag . '_part';
		$path = get_template_directory() . self::$dir_name( $inc_path );

		if ( file_exists( $path ) ) {
			include $path;
		}
	}

    // include and extract customizer options
    // ----------------------------------------------------------------------------------------
	public static function include_customizer_options( $option_list ) {
		$options = [];
		foreach($option_list as $option){
			$options[] = fw()->theme->get_options( 'customizer/options-' . $option );
		}

		return $options;
	}


    /******************************************************************************************
    ** starts include section
    ** add all files bellow, they will be included by load.
    ** all include files should be mentioned here.
    ** DO NOT use include() function anywhere else except init.php nd the theme functions.php
    ******************************************************************************************/

    // include all necessary files for hooks
    // ----------------------------------------------------------------------------------------
	public static function _action_init() {
 		
        // helper files:functions
        self::include_isolated( '/helpers/functions/global.php' );
		self::include_isolated( '/helpers/functions/template.php' );
		
        // helper files:classes
        self::include_isolated( '/helpers/classes/global.php' );

		// lib files
		self::include_isolated( '/libs/class-tgm-plugin-activation.php' );
		self::include_isolated( '/enqueues/admin/guten.php' );
		self::include_isolated( '/libs/guten-class.php' );
		
		// rest api files
		self::include_isolated( '/editor/elementor/restapi/ajax-select2.php', 'component' );
		
        // setup related files
        self::include_isolated( '/installation-fragments/tgmpa-plugins.php' );
		self::include_isolated( '/installation-fragments/theme-demos.php' );
		
        // menu
        self::include_isolated( '/hooks/menus.php' );

        // blog related all hooks
        self::include_isolated( '/hooks/blog.php' );
        
        // custom font
        self::include_isolated( '/hooks/custom-fonts.php' );
        
        // gogole font
        self::include_isolated( '/hooks/unyson-google-fonts.php' );
        
        // register widget areas
		self::include_isolated( '/hooks/sidebars.php' );
    }
    

    // add all enqueue files here, for frontend
    // ----------------------------------------------------------------------------------------
	public static function _action_enqueue_scripts() {
		self::include_isolated( '/enqueues/frontend/static.php' );
		self::include_isolated( '/enqueues/frontend/dynamic.php' );
	}


    // add all enqueue files here, for admin
    // ----------------------------------------------------------------------------------------
	public static function _action_enqueue_admin_scripts() {
		self::include_isolated( '/enqueues/admin/static.php' );
	}

	
    // include customizer options
    // ----------------------------------------------------------------------------------------
	public static function _customizer_options() {
		$option_list = [
			'general',
			'style',
			'header',
			'blocks',
			'blog',
			'page',
			'footer',
			'ads'
		];

		return self::include_customizer_options($option_list);
	}


	// custom option types for unyson
    // ----------------------------------------------------------------------------------------
	public static function _action_custom_option_types() {
		if (is_admin()) {
			$dir = '/option-types';
			self::include_isolated( $dir . '/fw-multi-inline/class-fw-option-type-fw-multi-inline.php', 'component');
			// and all other option types
		}
	}
}

Vinkmag_Theme_Includes::init();


// custom footer
// ----------------------------------------------------------------------------------------

function vinkmag_footer() {
	do_action( 'vinkmag_footer' );
}

if ( ! function_exists( 'vinkmag_footer_markup' ) ) {

	function vinkmag_footer_markup() {
		$footer_style = vinkmag_option('footer_layout_style', 'style1');
		get_template_part( 'template-parts/footers/footer', $footer_style);
	}
}

add_action( 'vinkmag_footer', 'vinkmag_footer_markup' );


// custom header
// ----------------------------------------------------------------------------------------
function vinkmag_header() {
	do_action( 'vinkmag_header' );
}

if ( ! function_exists( 'vinkmag_header_markup' ) ) {
	function vinkmag_header_markup() {
		$is_override = false;
		if(is_page()){
			$is_override = (vinkmag_post_option(get_the_ID(), 'override_default', 'no') == 'yes') ? true : false;
		}
		$header_style = vinkmag_option('header_layout_style', 'style4', $is_override);
		get_template_part( 'template-parts/headers/header', $header_style);
	}
}

add_action( 'vinkmag_header', 'vinkmag_header_markup' );

