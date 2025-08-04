<?php
if(get_row_layout()=='qualified_leads'){
	$title = get_sub_field('title');
	$description = get_sub_field('description');
	$img_url = get_sub_field('img_title');
	$video = get_sub_field('video');

	// ПРоверка отступов
		$mb = get_sub_field('margin_bot');
		$mt = get_sub_field('margin_top');
		$margin_top = (is_numeric($mt)) ? "margin-top:{$mt}px;" : '';
		$margin_bottom = (is_numeric($mb)) ? "margin-bottom:{$mb}px;" : '';
		$padding_style = ($margin_top || $margin_bottom) ? 'style="' . $margin_top . $margin_bottom . '"' : '';
	//конец проверки отступов
?>
<section class="dark_section" <?php echo $padding_style; ?>>
	<div class="wrap_section">
		<div class="header_block_section">
			<div class="title_block">
				<h2 class="fs_h2"><?php echo $title; ?></h2>
			</div> 
			<div class="description_block">
				<p class="fs_desc"><?php echo $description; ?></p>
			</div>
		</div>
		<div class="main_info_section">
		<?php if(have_rows('paragraph')){

		?>
			<div class="colomn_1">
			<?php while(have_rows('paragraph')){
				the_row();
				$par_title = get_sub_field('par_title');
				$par_desc = get_sub_field('par_desc');
			?>
				<div>
					<h4><?php echo $par_title; ?></h4>
					<p><?php echo $par_desc; ?></p>
					<div class="label_red"></div>
				</div>
<?php
	}
?>		
			</div>
<?php
	}
?>
			<div class="colomn_2">
				<div class="visual_content">
					<?php if($video){ echo $video;} ?>
					<?php if($img_url){?>
						<img src="<?php echo esc_attr($img_url); ?>" alt="<?php echo esc_attr($title); ?>">
					<?php
					} ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
}
?>






<!-- Конец Квалифицированне лиды -->