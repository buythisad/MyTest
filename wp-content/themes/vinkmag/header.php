<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="preloader" class="hidden">
		<div class="spinner">
			<div class="double-bounce1"></div>
			<div class="double-bounce2"></div>
		</div>
		<div class="preloader-cancel-btn-wraper">
			<a href="<?php esc_url('#') ?>" class="btn btn-primary preloader-cancel-btn">
				<?php esc_html_e('Cancel Preloader', 'vinkmag');?>
			</a>
		</div>
	</div>
	
	<?php vinkmag_header(); ?>

   