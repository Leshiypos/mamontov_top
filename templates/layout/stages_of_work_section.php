<?php
if(get_row_layout()=='stage_of_work'){
	$title = get_sub_field('title');
?>
<section class="dark_section stages_of_work">
			<div class="wrap_section">
				<h2 class="fs_h2">Этап работ</h2>
				<?php if(have_rows('slide')){
					$count = 1;
				?>
					<div class="header_section_SOW descope">
					<div>
				<?php while(have_rows('slide')){
					the_row();
					$stage_name = get_sub_field('stage_name');
					$description = get_sub_field('description');
					$url_img = get_sub_field('url_img');
				?>
						<div class="stage fs_22_14 slide_<?php echo $count; ?> <?php if($count == 1){echo 'swiper-slide-active';} ?>" data-number-element="<?php echo $count-1;?>">
							<span><?php echo $count++; ?> Этап</span>
							<h5 class="fs_22_14"><?php echo $stage_name; ?></h5>
						</div>
				<?php
				}
				?>		
					</div>
				</div>
				<?php
				}
				?>
				<?php if(have_rows('slide')){
					$count = 1;
					?>
				<div class="header_section_SOW mobile">
					<div class="swiper_SOW_header">
						<div class="swiper-wrapper">
						<!-- Slide -->
						<?php while(have_rows('slide')){
							the_row();
							$stage_name = get_sub_field('stage_name');
							$description = get_sub_field('description');
							$url_img = get_sub_field('url_img');
						?>
							<div class="swiper-slide">
								<div class="stage fs_22_14" data-number-element="<?php echo $count-1;?>">
									<span><?php echo $count++; ?> Этап</span>
									<h5 class="fs_22_14"><?php echo $stage_name; ?></h5>
								</div>
							</div>
						<?php } ?>
						<!-- Slide -->
							<!--END Slide -->
						</div>
					</div>
				</div>
				<?php } ?>

				<?php if(have_rows('slide')){
					$count = 1;
				?>
				<div class="swiper-scrollbar-sow-content"></div>
				<div class="swiper_SOW_content">
					<div class="swiper-wrapper">
						<!-- slide -->
						<?php while(have_rows('slide')){
							the_row();
							$stage_name = get_sub_field('stage_name');
							$description = get_sub_field('description');
							$url_img = get_sub_field('url_img');
						?>
						<div class="swiper-slide" data-slide="slide_<?php echo $count; ?>">
							<div class="content_SOW">
								<div>
									<h4><?php echo $count++; ?>. <?php echo $stage_name; ?></h4>
									<?php echo $description; ?>
								</div>
								<div>
									<div class="visual_content" <?php //if($url_img){ echo 'style ="background-image: url('.$url_img.')";';} ?>>
									<img src="<?php  echo esc_attr($url_img);?>" alt="<?php echo esc_attr($stage_name); ?>">
									</div>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>	
				</div>
				<?php } ?>
				<div class="swiperWrapClients__btns dFlex">
					<button type="button" class="btn-slider btn-slider__clients btn-prev__SOW" tabindex="0" aria-label="Previous slide" aria-controls="swiper-wrapper-a167b500028b3e2c"></button>
					<button type="button" class="btn-slider btn-slider__clients btn-next__SOW" tabindex="0" aria-label="Next slide" aria-controls="swiper-wrapper-a167b500028b3e2c"></button>
				</div>
			</div>
		</section>		
<?php
}
?>






<!-- Конец Квалифицированне лиды -->