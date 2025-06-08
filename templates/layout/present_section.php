<?php 
// Секция подарок
?>
<?php 
	if (get_row_layout() == 'section_prisent'){

		$title = get_sub_field('title');
		$description = get_sub_field('description');
		$title_but = get_sub_field('title_but');
		$link_but = get_sub_field('link_but');
		$margin_bot = get_sub_field('margin_bot');
?>
<section class="present_section <?php if( is_page_template( 'page-case.php' )) echo 'single_p'; ?>" <?php if ($margin_bot) {echo 'style="margin-bottom:'.$margin_bot.'px"';} ?>>
	<div class="wrap"> 
	<img src="<?php echo get_template_directory_uri(  ).'/new-site/assets/images/present_box_big.png'; ?>" alt="" class="present_box <?php if( is_page_template( 'page-case.php' )) echo 'single_post_img'; ?>">
		<div class="presentition">
			<div>
				<h2> <?php if ($title) echo $title; ?> </h2>
				<div class="descr_present"><?php if ($description) echo $description; ?></div>
			<?php if (have_rows('points')){
			?>
				<ul>
			<?php
				while (have_rows('points')){
					the_row();
					$point = get_sub_field('point');
			?>
					<li><?php if ($point) echo $point; ?></li>
			<?php
				}
			?>
				</ul>
			<?php
			} 
			if ($title_but){
			?>
				<a href="<?php echo $link_but; ?>" class="btn btn__order radius_1"> <?php echo $title_but; ?>	</a>	
			<?php
			}
			?>				
			</div>
		</div>
	</div>
</section>
<?php
	}
?>
