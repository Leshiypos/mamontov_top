<?php
if( get_row_layout() == 'image_left' ):
	$image = get_sub_field('image');
	$counter = get_sub_field('counter');
	$title = get_sub_field('title');
	$text = get_sub_field('text');
	$background_color = get_sub_field('background_color');
	if ($background_color) { $background_color = 'background-color:'.$background_color;} else {$background_color = 'border: 1px solid rgba(45, 44, 44, .3)';};
	echo '
	<section class="pageCase pageCase__internet-marketing__section">
		<div class="pageCase__internet-marketing">
			<div class="pageCase__internet-marketing__box">
				<div class="pageCase__internet-marketing__box-block dFlex image_block_left_right">
					<a href="'.$image.'" data-fancybox style="'.$background_color.'">
						<img class="pageCase__internet-marketing__block-image" src="'.$image.'" alt="Стратегия">
					</a>
					<div class="pageCase__internet-marketing__block-texts pad40">
						<div class="pageCase__internet-marketing__block-texts__text">
							<p class="pageCase__internet-marketing__block-number">'.$counter.'</p>
							<h3 class="pageCase__internet-marketing__block-text__subtitle">'.$title.'</h3>
						</div>
						'.$text.'
					</div>
				</div>
			</div>
		</div>
	</section>
	';
endif;