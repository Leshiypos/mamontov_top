<?php
if (get_row_layout() == 'team_board'){
	$title = get_sub_field('title_board');
	$description = get_sub_field('description_board');
	$margin_bot = get_sub_field('margin_bot');
?>
<section class="teame_gallery" <?php if ($margin_bot) {echo 'style="margin-bottom:'.$margin_bot.'px"';} ?>>
	<div class="container">
		<h2> <?php echo $title; ?> </h2>
		<p class="description_team"><?php echo $description; ?></p>

		<?php if (have_rows('card')){
		?>
		<div class="board_swiper">
			<div class="wrap_section height_limit swiper-wrapper">
				<?php while(have_rows('card')){
					the_row();
					$name = get_sub_field('name');
					$job_title = get_sub_field('job_title');
					$photo_id = get_sub_field('photo');
				?>
				<div class="team_card swiper-slide">
					<img src="<?php echo wp_get_attachment_image_url($photo_id, 'team-board'); ?>" alt="card_image">
					<p class="title_card"><?php echo $name; ?></p>
					<p class="profession"><?php echo $job_title; ?></p>
				</div>
				<?php
				} ?>
				<!-- <div class="read_more_team_but_wrap visible_mob">
					<div class="head_but"></div>
					<button class="read_more_team_but">Смотреть больше</button>
				</div> -->
			</div>
			</div>
		<?php	
		} ?>

<?php if (have_rows('card_reverse')){
		?>
		<div class="board_swiper_reverse">
			<div class="wrap_section height_limit swiper-wrapper">
				<?php while(have_rows('card_reverse')){
					the_row();
					$name = get_sub_field('name');
					$job_title = get_sub_field('job_title');
					$photo_id = get_sub_field('photo');
				?>
				<div class="team_card swiper-slide">
					<img src="<?php echo wp_get_attachment_image_url($photo_id, 'team-board'); ?>" alt="card_image">
					<p class="title_card"><?php echo $name; ?></p>
					<p class="profession"><?php echo $job_title; ?></p>
				</div>
				<?php
				} ?>
				<!-- <div class="read_more_team_but_wrap visible_mob">
					<div class="head_but"></div>
					<button class="read_more_team_but">Смотреть больше</button>
				</div> -->
			</div>
			</div>
		<?php	
		} ?>
	</div>
	</section>
<?php
}
?>


