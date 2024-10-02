<?php
/*
Template Name: Отзывы
Template Post Type: page
*/
$col_reviews = (get_field('col_reviews'))?get_field('col_reviews'):5; //Число отзывов на странице

$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
$reviews = new WP_Query( array(
	'post_type' => 'reviews',
	'posts_per_page' => $col_reviews,
	'paged' => $paged,
	)
)
?>

<?php get_template_part('templates/head'); ?>

<body>
    <div class="pageWrapper"> 
        
        <?php get_template_part('templates/top-panel-main'); ?>
        <?php get_template_part('templates/header-reviews'); ?>
       
		<main class="main">
			<div class="wrap_reviews_page">
				<section class="reviews_page">
			<?php 
				if ($reviews->have_posts() ){
					while ( $reviews->have_posts() ){
						$reviews->the_post();
				// Получаем данные из ACF
				$description = get_field('description');
				$ID_avatar = get_field('avatar');
				$ID_logo_comp = get_field('logo_comp');
				$URL_letter_thanks = get_field('letter_thanks');
			?>
				<!-- Секция -->
					<div class="review_single_page">
						<img src="<?php echo wp_get_attachment_image_url( $ID_avatar, 'avatar'); ?>" class="avatar" alt="<?php the_title(); ?>">
						<img src="<?php echo wp_get_attachment_image_url( $ID_logo_comp, 'logo-firm'); ?>" class="firm_logo" alt="">
						<div class="review">
							<div class="tittle_wrap_mob" >
								<img src="<?php echo wp_get_attachment_image_url( $ID_avatar, 'avatar' ) ?>" class="avatar" alt="<?php the_title(); ?>">
								<div>
									<h4 class="title_review"><?php the_title(); ?></h4>
									<p class="job_title"><?php echo $description; ?></p>
								</div>
							</div>
							<div class="text_review_page">
								<?php the_content(); ?>
							</div>
							<?php 
								if($URL_letter_thanks){
							?>
								<a href="<?php echo $URL_letter_thanks; ?>" class="read_more" data-fancybox>Читать полностью</a>
							<?php		
								}
							?>
						</div>
					</div>
					<!-- Конец секция -->

			<?php		}
			?>

					<div class="wrap_btn">
						<?php previous_posts_link('Предыдущий отзыв', $reviews->max_num_pages); ?>
						<?php next_posts_link('Следующий отзыв', $reviews->max_num_pages); ?>
					</div>
				</section>
			<?php
				wp_reset_postdata();
				} else {
					echo '<h4>Отзывов нет. Добавьте новый отзыв</h4>';
				}
			?>
			</div>
		</main>

		<?php get_footer(); ?>
