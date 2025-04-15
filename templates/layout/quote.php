<?php
if(get_row_layout()=='quote_section'){
	$quote = get_sub_field('quote');
	$photo_url = get_sub_field('photo');
	$name = get_sub_field('name');
	$job_title = get_sub_field('job_title');

?>
	<section class="quote_section">
			<div class="wrap_section">
				<div class="quote">
					<p>
					<img src="<?php echo get_template_directory_uri().'/new-site/assets/images/quotes.png'; ?>" alt="quotes" class="quotes_top">
					<?php echo $quote; ?>	
					<img src="<?php echo get_template_directory_uri().'/new-site/assets/images/quotes.png'; ?>" alt="quotes" class="quotes_bottom">
				</p>
			</div>
			<div class="business_card">
				<div class="photo">
					<img src="<?php  echo $photo_url;?>" alt="">
				</div>
				<p class="name"><?php echo $name; ?></p>
				<p class="job_title"><?php echo $job_title; ?></p>
			</div>
		</div>
	</section>
<?php
}
?>