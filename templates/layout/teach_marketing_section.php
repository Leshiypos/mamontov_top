<?php
if(get_row_layout()=='teach_marketing'){
	$title = get_sub_field('title');
	$link_articles = get_sub_field('link_articles');
?>
	<section class="dark_section teach_marketing">
		<div class="wrap_section">
			<div class="header_section">
				<h2 class="fs_100_32" ><?php echo $title ? $title : 'Обучаем <br> интернет-маркетингу '; ?></h2>
				<div>
				<?php if ($link_articles){ ?>
					<a href="<?php echo $link_articles; ?>" class="all_articles_link fs_20-16">Все статьи</a>
				<?php } ?>
				</div>
			</div>
			<?php if(have_rows('article')){
			?>
			<div>
				<div class="swiper_teach_marketing">
					<!-- Additional required wrapper -->
					<div class="swiper-wrapper">
						<!-- Slides -->
						<?php while(have_rows('article')){
							the_row();
							$title_article = get_sub_field('title_article');
							$thumbnail_id = get_sub_field('thumbnail');
							$url_article = get_sub_field('url_article');
						?>
						<div class="swiper-slide">
							<div class="card_slide">
								<a href="<?php echo $url_article; ?>" target="_blank">
									<?php echo $thumbnail_id ? wp_get_attachment_image( $thumbnail_id, 'teach-mark-thumb', false ) : ''; ?>
									<div class="title_lesson">
										<p class="fs_18_10"><?php echo $title_article; ?></p>
										<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M1 17L17 1M17 1H5.57143M17 1V12.4286" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
										</svg>
									</div>
								</a>
							</div>
						</div>
					<?php } ?>
						
					</div>
					<!-- If we need navigation buttons -->
					<div class="swiperWrapTeachMarketing__btns dFlex">
						<button type="button" class="btn-slider btn-slider__clients btn-prev__teachMarketing" ></button>
						<button type="button" class="btn-slider btn-slider__clients btn-next__teachMarketing"></button>
					</div>
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
