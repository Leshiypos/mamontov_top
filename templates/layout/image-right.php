<?php
if( get_row_layout() == 'image_right' ):
	$image = get_sub_field('image');
	$counter = get_sub_field('counter');
	$title = get_sub_field('title');
	$text = get_sub_field('text');
	echo '
	<section class="pageCase pageCase__internet-marketing__section rightImage">
		<div class="pageCase__internet-marketing">
			<div class="pageCase__internet-marketing__box">
				<div class="pageCase__internet-marketing__box-block dFlex right">
					<a href="'.$image.'" data-fancybox >
						<img class="pageCase__internet-marketing__block-image" src="'.$image.'"	alt="Стратегия">
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