<?php
/**
 * The template for displaying the footer.
 *
 * Contains the body & html closing tags.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_template_part('templates/form');
get_template_part('templates/footer-main');
//if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'footer' ) ) {
//	if ( did_action( 'elementor/loaded' ) && hello_header_footer_experiment_active() ) {
//		get_template_part( 'template-parts/dynamic-footer' );
//	} else {
//		get_template_part( 'template-parts/footer' );
//	}
//}
?>
</div>
<?php wp_footer(); ?>
<script src="https://unpkg.com/imask"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/new-site/assets/js/script.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/new-site/assets/js/wp_dev_scripts.js"></script>

</body>
</html>
