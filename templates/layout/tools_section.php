<?php 
// Инструменты Секция wp-dev
?>

<?php 
if( get_row_layout() == 'section_tools' ){
	$title = get_sub_field('title');
?>
<section class="tools">
	<div class="container">
		<h2 class="title_section"><?php echo $title; ?></h2>
	<?php 
		if ( have_rows( 'card_tools' ) ){
	?>
		<div class="tools_wrap descop">
			<!-- Additional required wrapper -->
			<div class="wrapper">
			<?php 
			while ( have_rows( 'card_tools' ) ){
				the_row();
				$url_img = get_sub_field('img_tool');
				$title_tool = get_sub_field('title_tool');
				$description_tool = get_sub_field('description_tool');

			?>
			<!-- Slides -->
				<div class="wrap" >
					<img src="<?php echo $url_img; ?>" alt="">
					<h3><?php echo $title_tool; ?></h3>
					<p><?php echo $description_tool; ?></p>
				</div>
			<!-- END Slides -->
			<?php
			}
			?>				
			</div>
		</div>
<!-- Мобильный слайдер -->
		<div class="tools_swiper">
			<!-- Additional required wrapper -->
			<div class="swiper-wrapper tools_wrap">
			<?php 
			while ( have_rows( 'card_tools' ) ){
				the_row();
				$url_img = get_sub_field('img_tool');
				$title_tool = get_sub_field('title_tool');
				$description_tool = get_sub_field('description_tool');
			?>
				<!-- Slides -->
				<div class="swiper-slide wrap">
					<img src="<?php echo $url_img; ?>" alt="">
					<h3><?php echo $title_tool; ?></h3>
					<p><?php echo $description_tool; ?></p>
				</div>
				<!-- END Slides -->
				<?php
			}
			?>
			</div>
			<div class="swiperWrapOurReview__btns-mobile dFlex tools_btn">
				<button type="button" class="btn-slider btn-prev__tools"></button>
				<button type="button" class="btn-slider btn-next__tools"></button>
			</div>
		</div>
<!-- Конец Мобильный слайдер  -->
	<?php
		}
	?>
	</div>
</section>
<?php	
}
?>