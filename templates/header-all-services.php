<?php
/**
 * The template for displaying header.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
// $site_name = get_bloginfo( 'name' );
// $tagline   = get_bloginfo( 'description', 'display' );
// $header_nav_menu = wp_nav_menu( [
// 	'theme_location' => 'menu-1',
// 	'fallback_cb' => false,
// 	'echo' => false,
// ] );

// $category = get_the_category($post->ID);
// $current_cat_id = $category[0]->cat_ID;
// $current_cat_name = $category[0]->name;

?>


<header class="header header__main  all_services">
    <div class="header__container">
        <div class="header__box">
            <div class="header__block">
                <h1 class="titlePage header__title_main">
                <?php echo get_the_title(); ?>
                </h1>
                <div class="titlePage header__text_main">
                    <?php echo the_excerpt(); ?>
                </div>
            </div>
        </div>
    </div>
</header>
<? /*

<header class="header">
	<div class="container">
		<span class="flagPage"><pre><?php echo $current_cat_name; ?></pre></span>
		<h1 class="titlePage">
			<?php echo get_the_title(); ?>
		</h1>
		<div class="descriptionPage">
			<?php echo the_excerpt(); ?>
		</div>
		<? //= echo '<a href="#" class="linkPage"><img src="<?//php echo get_template_directory_uri() /new-site/assets/img/link.svg" alt=""> https://mamontov.top/</a>';?>
	</div>
</header>

*/?>

