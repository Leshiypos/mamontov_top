<?php 
	if (get_row_layout() == 'section_reviews_text'){
		$title_rev = get_sub_field('title_rev');
		$description_rev = get_sub_field('description_rev');
		$url_rev = get_sub_field('url_rev');
		$col_rev = (get_sub_field('col_rev'))?get_sub_field('col_rev'):-1;
		
		// ПРоверка отступов
			$mb = get_sub_field('margin_bot');
			$mt = get_sub_field('margin_top');
			$margin_top = (is_numeric($mt)) ? "margin-top:{$mt}px;" : '';
			$margin_bottom = (is_numeric($mb)) ? "margin-bottom:{$mb}px;" : '';
			$padding_style = ($margin_top || $margin_bottom) ? 'style="' . $margin_top . $margin_bottom . '"' : '';
		//конец проверки отступов
		

		$post_rev = get_posts(array(
				'numberposts' 	=> $col_rev,
				'post_type' 	=> 'reviews',
				'position' 		=> 'reviews_block',
				'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
			)
		);

		global $post;
?>
<section class="pageCase pageCase__our-review client <?php if (is_page_template( 'page-case.php' )){echo 'radius_1';} ?>" <?php  echo $padding_style; ?>>
	<div class="container">
		<div class="link_rev">
			<a href="<?php echo $url_rev; ?>" class="m-0 case__contecst-link">Все отзывы</a>
		</div>
		<div class="dFlex pageCase__our-review__container">
			<div class="pageCase__internet-marketing__block-text dFlex">
				<h2 class="pageCase__internet-marketing__block-subtitle m-0"><?php echo $title_rev; ?></h2>
				<div class="pageCase__internet-marketing__block-paragraph"><?php echo $description_rev; ?></div>
				<div class="swiperWrapOurReview__btns dFlex">
					<button type="button" class="btn-slider btn-prev__reviewClient"></button>
					<button type="button" class="btn-slider btn-next__reviewClient"></button>
				</div>
			</div>
			<div class="swiper-container slider__wrapper-licenses__container_reviewsClient">
				<div class="swiper-wrapper slider__wrapper-licenses dFlex">
				<?php 
					foreach ($post_rev as $post){
						setup_postdata( $post );
						$description = get_field('description');
						$ID_avatar = get_field('avatar');
						$ID_logo_comp = get_field('logo_comp');
						$URL_letter_thanks = get_field('letter_thanks');
				?>
				<!-- Начало Отзыв -->
				<div class="swiper-slide wrap_reviews">
						<img src="<?php echo wp_get_attachment_image_url( $ID_avatar, 'avatar' ) ?>" alt="">
						<div class="review">
							<h4><?php the_title(); ?></h4>
							<p class="job_title"><?php echo $description; ?></p>
							<div class="text_review">
								<?php the_content(); ?>
							</div>
							<svg width="44" height="27" viewBox="0 0 44 27" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M22 27L43.6506 0.75H0.349365L22 27Z" fill="#D9D9D9"/></svg>	
						</div>
					</div>
					<!-- Конец Отзыв -->
				<?php
					wp_reset_postdata( );
					}
				?>				
				</div>
			</div>
			<div class="swiperWrapOurReview__btns-mobile dFlex">
				<button type="button" class="btn-slider btn-prev__reviewClient"></button>
				<button type="button" class="btn-slider btn-next__reviewClient"></button>
			</div>
		</div>
	</div>
</section>

<?php		
	}
?>