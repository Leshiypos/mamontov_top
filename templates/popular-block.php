<?php 
// Блок популярные посты. Добавлен в шаблон page-blog-new.php
?>


<?php
			$button_pop = get_field('button_pop'); //Получаем кнопку включения блока популярные
			$title_pop = get_field('title_pop'); //Получаем заголовок блока
			$sub_cat = get_field('pop_cat'); //id рубрики популярные

			$posts_best = new WP_Query( array(
				'cat'=> $sub_cat,
			) );
			if ($posts_best->found_posts and $sub_cat and ($button_pop == 'on')){
		?>
<section class="best_post">
	<div class="container">
			<h2 class="title_best">
				<?php echo $title_pop; ?>			
			</h2>

		<div class="best_swiper">
			<div class="swiper-wrapper">

				<!-- Slides -->
				<?php
						while ($posts_best->have_posts()) : $posts_best->the_post();
						
						$card = get_field('card');
					
				?>
						<div class="swiper-slide wrap blog_slide" >
							<article class="case__tabs-content__article radius_1 dFlex best_single" style="background-color:<?php echo $card['color_card']; ?>">
								<a href="<?php the_permalink(); ?>">
									<?php if($card['img_card']){?><img src="<?php echo $card['img_card']; ?>" class="background_card"><?php } ?>
									<div class="category_title"><?php echo get_the_category()[1]->name;?></div>	
									<h4 class="case__tabs-content__subtitle"><?php the_title(); ?></h4>
								</a>
							</article>
						</div>
				<?php
						endwhile;
						wp_reset_postdata( );
				?>
				<!-- END Slides -->
	
			</div>
			<div class="swiperWrapOurReview__btns dFlex">
				<button type="button" class="btn-slider btn-prev__best"></button>
				<button type="button" class="btn-slider btn-next__best"></button>
			</div>
			<div class="swiperWrapOurReview__btns-mobile dFlex">
				<button type="button" class="btn-slider btn-prev__best"></button>
				<button type="button" class="btn-slider btn-next__best"></button>
			</div>
		</div>
	</div>
</section>
	<?php 
			}
	?>
