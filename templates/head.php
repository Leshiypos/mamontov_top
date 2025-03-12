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
	<meta name="viewport" content="<?php echo esc_attr( $viewport_content ); ?>, maximum-scale=1.0, user-scalable=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>

	<!--SWIPER-->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/> -->
    <link rel="stylesheet" href="<?php  echo get_template_directory_uri();?>/new-site/assets/lib/swiper/swiper-bundle.min.css"/>
    <!-- <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> -->
    <script src="<?php  echo get_template_directory_uri();?>/new-site/assets/lib/swiper/swiper-bundle.min.js"></script>



    <!--Slick Slider-->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/new-site/assets/lib/slick/slick-theme.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/new-site/assets/lib/slick/slick.css">

	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css"> -->
	<link rel="stylesheet" href="<?php  echo get_template_directory_uri();?>/new-site/assets/lib/fancybox/jquery.fancybox.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/new-site/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/new-site/assets/css/media.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/new-site/assets/css/custom.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/new-site/assets/css/my-style.css">
	<script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
	<!-- <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script> -->
	<script src="<?php  echo get_template_directory_uri();?>/new-site/assets/lib/fancybox/jquery.fancybox.min.js"></script>
	<script src="https://unpkg.com/imask"></script>
	 <title>
        <?php echo wp_get_document_title(); ?>
    </title>
</head>
<body>
<?
if(isset($_GET["utm_source"])) setcookie("utm_source",$_GET["utm_source"],time()+3600*24*30,"/"); 
if(isset($_GET["utm_medium"])) setcookie("utm_medium",$_GET["utm_medium"],time()+3600*24*30,"/"); 
if(isset($_GET["utm_campaign"])) setcookie("utm_campaign",$_GET["utm_campaign"],time()+3600*24*30,"/"); 
if(isset($_GET["utm_content"])) setcookie("utm_content",$_GET["utm_content"],time()+3600*24*30,"/"); 
if(isset($_GET["utm_term"])) setcookie("utm_term",$_GET["utm_term"],time()+3600*24*30,"/");
?>
<?php wp_body_open(); ?>

