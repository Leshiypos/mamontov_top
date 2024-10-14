<?php 
// Все сервизы Секция wp-dev
?>

<?php 
	if (get_row_layout() == 'section_all_services_slider'){
		$title = get_sub_field('title_section');
		$title_url = get_sub_field('title_url');
		$url_main = get_sub_field('url_main');
?>
<section class="all_services_section">
	<div class="container">
		<h2 class="title_section"><?php echo $title; ?></h2>
		<div class="link_rev">
			<a href="<?php echo $url_main; ?>" class="m-0 case__contecst-link"><?php echo $title_url; ?></a>
		</div>


		<?php 
			if (have_rows('slide')){
		?>
		<div class="all_services_swiper">
			<!-- Additional required wrapper -->
			<div class="swiper-wrapper">

		<?php
				while ( have_rows('slide') ){
					the_row();
					$title_slide = get_sub_field('title_slide');
					$color_slide = get_sub_field('color_slide');
					$color_text = get_sub_field('color_text');

		?>
				<!-- Slides -->
				<div class="swiper-slide">
					<div class="cart_wrap <?php if ($color_text){ echo $color_text; } ?>" <?php if ($color_slide) { ?>style = "background-color : <?php echo $color_slide; ?>" <?php } ?>>
						<h3><?php echo $title_slide; ?></h3>
						<?php 
							if ( have_rows('list_services') ){
						?>
						<ul>
							<?php 
								while (have_rows('list_services')){
									the_row();
									$title_service = get_sub_field( 'title_service' );
									$url_page_service = get_sub_field( 'url_page_service' );
							?>
								<li><span class="opener"><a class="opener__link" data-title="<?php echo $title_service; ?>" href="<?php echo $url_page_service; ?>" ><?php echo $title_service; ?></a></span></li>
							<?php
								}
							?>
						</ul>
						<?php
							}
						?>
					</div>
				</div>
				<!-- END Slides -->
			<?php
				} 
			?>
			</div>
			<div class="swiperWrapOurReview__btns dFlex">
				<button type="button" class="btn-slider btn-prev__all_serv_sec"></button>
				<button type="button" class="btn-slider btn-next__all_serv_sec"></button>
			</div>
			<div class="swiperWrapOurReview__btns-mobile dFlex">
				<button type="button" class="btn-slider btn-prev__all_serv_sec"></button>
				<button type="button" class="btn-slider btn-next__all_serv_sec"></button>
			</div>
		</div>
		<?php
			}
		?>
	</div>
</section>











<?php
	}
?>
