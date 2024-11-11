<?php 
// Рейтинги Секция wp-dev
?>

<?php 
	if ( get_row_layout () == 'section_ratings' ){
		$title_1 = get_sub_field('title_1');
		$title_2 = get_sub_field('title_2');
		$description = get_sub_field('description');
?>
<section class="rating">
	<div class="container">
		<div class=header_section>
			<h2 class="title_rating">
				<?php echo $title_1; ?><br><?php echo $title_2; ?>				
			</h2>
			<div class="review_header">
				<p><?php echo $description; ?></p>
			</div>
		</div>
<?php 
	if (have_rows('slide')){
?>
		<div class="rating_swiper">
			<div class="swiper-wrapper rating_wrap">
			<?php 
				while ( have_rows('slide') ){
					the_row();
					$id_img = get_sub_field('img');

					if($id_img){
				?>
				<!-- Slides -->
					<div class="swiper-slide wrap" >
						<a href="<?php echo wp_get_attachment_image_url($id_img, 'full'); ?>" data-fancybox="gallery_rating" <?php if (wp_get_attachment_caption($id_img)) echo 'data-caption="'.wp_get_attachment_caption($id_img).'"' ?>>
							<img src="<?php echo wp_get_attachment_image_url($id_img, 'full'); ?>" alt="">
						</a>
					</div>
				<!-- END Slides -->
				<?php
					}
				}
			?>	
			</div>
			<div class="swiperWrapOurReview__btns dFlex">
				<button type="button" class="btn-slider btn-prev__rating"></button>
				<button type="button" class="btn-slider btn-next__rating"></button>
			</div>
			<div class="swiperWrapOurReview__btns-mobile dFlex">
				<button type="button" class="btn-slider btn-prev__rating"></button>
				<button type="button" class="btn-slider btn-next__rating"></button>
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