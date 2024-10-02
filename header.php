<?php
/**
 * The template for displaying the header
 *
 * This is the template that displays all of the <head> section, opens the <body> tag and adds the site's header.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$viewport_content = apply_filters( 'hello_elementor_viewport_content', 'width=device-width, initial-scale=1' );
$enable_skip_link = apply_filters( 'hello_elementor_enable_skip_link', true );
$skip_link_url = apply_filters( 'hello_elementor_skip_link_url', '#content' );
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="<?php echo esc_attr( $viewport_content ); ?>">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>

	
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/new-site/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/new-site/assets/css/media.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/new-site/assets/css/custom.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/new-site/assets/css/my-style.css">
	<script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
</head>
<body <?php body_class(); ?>>
<?
if(isset($_GET["utm_source"])) setcookie("utm_source",$_GET["utm_source"],time()+3600*24*30,"/"); 
if(isset($_GET["utm_medium"])) setcookie("utm_medium",$_GET["utm_medium"],time()+3600*24*30,"/"); 
if(isset($_GET["utm_campaign"])) setcookie("utm_campaign",$_GET["utm_campaign"],time()+3600*24*30,"/"); 
if(isset($_GET["utm_content"])) setcookie("utm_content",$_GET["utm_content"],time()+3600*24*30,"/"); 
if(isset($_GET["utm_term"])) setcookie("utm_term",$_GET["utm_term"],time()+3600*24*30,"/");
?>
<?php wp_body_open(); ?>

<?php if ( $enable_skip_link ) { ?>
<a class="skip-link screen-reader-text" href="<?php echo esc_url( $skip_link_url ); ?>"><?php echo esc_html__( 'Skip to content', 'hello-elementor' ); ?></a>
<?php } ?>
<div class="pageWrapper">
<?php get_template_part('templates/top-panel-main'); ?>
<?php
if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'header' ) ) {
	if ( did_action( 'elementor/loaded' ) && hello_header_footer_experiment_active() ) {
		get_template_part( 'template-parts/dynamic-header' );
	} else {
		get_template_part( 'template-parts/header' );
	}
}
