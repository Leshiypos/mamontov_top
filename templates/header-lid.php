<?php
/**
wp-devsite
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$title_button = get_field('title_button');
$switch = get_field('switch');
$title_discount = get_field('title_discount');
$old_cost = get_field('old_cost');
$new_cost = get_field('new_cost');
?>

<header class="header header__main header__box-magnit__main">
			<div class="header__container">
				<div class="header__box header__box-magnit">
					<img class="header__box-magnit__image" src="<?php echo get_template_directory_uri(); ?>/new-site/assets/images/lead-generation-strategies.png"
						alt="Лид-магнита">
					<div class="header__block">
						<p class="header__box-magnit__text m-0">Триггер №1 <span></span></p>
						<p class="header__box-magnit__text m-0">Триггер №2 <span></span></p>
						<p class="header__box-magnit__text m-0">Триггер №3 <span></span></p>
						<h1 class="titlePage m-0">
								<?php echo get_the_title(); ?>
						</h1>
						<div class="titlePage header__text_main">
								<?php echo the_excerpt(); ?>
						</div>

<!-- Начало СНИЖЕНИЕ ЦЕНЫ -->
		<?php 
			if ($switch == 'on'){
		?>
						<div class="applications cost_bid">
							<div class="title"><?php echo $title_discount; ?></div>
							<div class="dFlex cont">
								<div>
									<p class="number relative"> <span><?php echo $old_cost; ?></span>
										<img src=" <?php echo get_template_directory_uri( ).'/new-site/assets/images/cross-out.png' ?> " alt="cross-out" class="cross_out">
									</p>
									
								</div>
								<div>
									<p class="number"><?php echo $new_cost; ?></p>
								</div>
							</div>
						</div>
		<?php
			}
		?>
<!-- Конец СНИЖЕНИЕ ЦЕНЫ -->
							
						<a href="#popupfancy" data-fancybox class="btn btn__order radius_1"><?php echo $title_button; ?>
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


