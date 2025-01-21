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
// Всплывающая форма ПОДАРОК
get_template_part('templates/pop-up-present');

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
<!-- <div id="chatovkrkxjrjjsnaqlrovozomwmtp"></div> -->
<script src="https://wahelp.ru/mini_widget/?tool=true&whatsapp=https://wa.me/79921466797&telegram=https://t.me/mtop_digital"></script><!-- виджет Help -->
<script src="https://wahelp.ru/app/widget/js/widget_new.js" type="text/javascript" data="cd3e9f8d-43ca-4d93-8f52-4d0f54be" id="script_widget_chat"></script>
<script src="https://unpkg.com/imask"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<?php
	if (is_page_template('page-lidmagnet.php')){
?>
	<script src="<?php echo get_template_directory_uri() ?>/new-site/assets/js/lid_magnet_form.js"></script>
<?php
	} else {
?>
<script src="<?php echo get_template_directory_uri() ?>/new-site/assets/js/redirect.js"></script>
<?php
	}
?>
<script src="<?php echo get_template_directory_uri() ?>/new-site/assets/js/script.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/new-site/assets/js/wp_dev_scripts.js"></script>


</body>
</html>
