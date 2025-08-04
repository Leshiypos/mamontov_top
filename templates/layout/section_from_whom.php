<!-- Начало секции Для кого -->
		<?php
			if( get_row_layout() == 'for_whom' ){
				$title = get_sub_field( 'title' );
				$sub_title = get_sub_field( 'sub_title' );
				$description = get_sub_field( 'description' );

					// ПРоверка отступов
						$mb = get_sub_field('margin_bot');
						$mt = get_sub_field('margin_top');
						$margin_top = (is_numeric($mt)) ? "margin-top:{$mt}px;" : '';
						$margin_bottom = (is_numeric($mb)) ? "margin-bottom:{$mb}px;" : '';
						$padding_style = ($margin_top || $margin_bottom) ? 'style="' . $margin_top . $margin_bottom . '"' : '';
					//конец проверки отступов
		?>
			<section class="pageCase__where-lid" <?php echo $padding_style; ?>>
				<div class="pageCase__where-lid__container">
					<div class="pageCase__where-lid__block-box dFlex">
						<div class="pageCase__where-lid__container-block dFlex">
							<?php if( $title ) echo '<h1 class="m-0">'.$title.' <br /> <span>'.$sub_title.'</span></h1>';?>
							<?php if( $description ) echo '<p class="m-0 pageCase__where-lid__container-block__text">'.$description.'</p>'; ?>
						</div>
						<div class="pageCase__where-lid__container-box  pageCase__where-lid__block-box__slider-not__slider">
						<?php
							if( have_rows( 'blocks' ) ){
								$count = 0;
								while( have_rows( 'blocks' ) ){
									the_row();
									$description_bloks = get_sub_field( 'block_discript' );
									$count++;
						?>
								<div class="pageCase__where-lid__container-box__card dFlex">
									<p class="pageCase__where-lid__container-box__card-number m-0"><?php echo $count ?></p>
									<p class="pageCase__where-lid__container-box__card-text m-0"><?php echo $description_bloks; ?></p>
								</div>
						<?php
								}
							}
						?>


						</div>
					</div>
					<div class="swiper-container pageCase__where-lid__block-box__slider">
						<div class="swiper-wrapper pageCase__where-lid__container-box">
						<?php
							if( have_rows( 'blocks' ) ){
								$count = 0;
								while( have_rows( 'blocks' ) ){
									the_row();
									$description_bloks = get_sub_field( 'block_discript' );
									$count++;
						?>
							<div class="swiper-slide pageCase__where-lid__container-box__card dFlex">
								<p class="pageCase__where-lid__container-box__card-number m-0"><?php echo $count ?></p>
								<p class="pageCase__where-lid__container-box__card-text m-0"><?php echo $description_bloks; ?></p>
							</div>
						<?php
								}
							}
						?>	
						</div>
					</div>
					<div class="swiperWrapLidWhere__btns-mobile dFlex">
						<button type="button" class="btn-slider btn-prev__lid-where" tabindex="0"
							aria-label="Previous slide" aria-controls="swiper-wrapper-fba573f438188884"></button>
						<button type="button" class="btn-slider btn-next__lid-where" tabindex="0"
							aria-label="Next slide" aria-controls="swiper-wrapper-fba573f438188884"></button>
					</div>
				</div>
			</section>
		<?php		
			}
		?>

<!-- Конец секции Для кого -->