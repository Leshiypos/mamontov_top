<?php
if(get_row_layout()=='cloud_message'){
	$message = get_sub_field('message');
?>

	<section class="cloud_section">
		<div>
			<?php echo $message; ?>
		</div>
	</section>

<?php
}
?>