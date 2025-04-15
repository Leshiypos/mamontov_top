<?php
if(get_row_layout()=='qualified_leads'){
	$title = get_sub_field('title');
	$description = get_sub_field('description');
	$img_url = get_sub_field('img_title');
	$video = get_sub_field('video');
?>
<section class="dark_section">
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
				<div class="visual_content" <?php if($img_url){echo 'style="background-image: url('.$img_url.');"'; } ?>>
					<?php if($video){ echo $video;} ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
}
?>






<!-- Конец Квалифицированне лиды -->