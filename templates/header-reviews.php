<?php
/**
wp-devsite
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


$title_but = get_field( 'title_but' );

//Получаем пост в шапке
$header_post = get_posts(array(
	'numberposts' => 1,
	'position'    => 'header_review',
	'orderby'     => 'date',
	'order'       => 'DESC',
	'include'     => array(),
	'exclude'     => array(),
	'meta_key'    => '',
	'meta_value'  =>'',
	'post_type'   => 'reviews',
	'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
));
global $post;
?>

<header class="header header__main header__box-magnit__main">
			<div class="header__container wrap__reviews">
				<div class="header__box header__box-magnit header__reviews">

				<!-- Начала поста -->
				<?php 
					foreach ($header_post as $post ){
							setup_postdata( $post );

							$description = get_field('description');
				?>
					<div class="head__review">
						<h4><?php the_title(); ?></h4>
						<p class="job_title"><?php echo $description; ?></p>
						<div class="text_review">
							<?php the_content(); ?>
						</div>
						<svg width="44" height="27" viewBox="0 0 44 27" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M22 0L43.6506 26.25H0.349365L22 0Z" fill="#F6F6F6"/></svg>
					</div>
				<?php
					}
					wp_reset_postdata(); // сбрасываем переменную $post
				?>
				<!-- Конец Поста -->


					<img class="header__box-magnit__image" src="<?php echo get_template_directory_uri(); ?>/new-site/assets/images/reviews.png"
						alt="Лид-магнита">
					<div class="header__block">
						<h1 class="titlePage m-0">
								<?php echo get_the_title(); ?>
						</h1>
						<div class="titlePage header__text_main">
								<?php echo the_excerpt(); ?>
						</div>
						<a href="#popupfancy" data-fancybox class="btn btn__order radius_1"><?php echo  $title_but; ?>
							<svg width="12" height="12" viewBox="0 0 12 12" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<path d="M1 11L11.5 0.5M11.5 0.5H4M11.5 0.5V8" stroke="white" stroke-linecap="round"
									stroke-linejoin="round">
								</path>
							</svg>
						</a>
					</div>
				</div>
			</div>
		</header>


