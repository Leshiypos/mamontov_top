<!-- Секция самый популярный кейс -->
<?php 
	if (get_row_layout() == 'popular_case'){

		$title_case = get_sub_field('title_case');
		$title_case_2 = get_sub_field('title_case_2');
		$description = get_sub_field('description');
		$quantity1 = get_sub_field('quantity1');
		$quantity2 = get_sub_field('quantity2');
		$price1 = get_sub_field('price1');
		$price2 = get_sub_field('price2');
		$link_case = get_sub_field('link_case');
?>
<section class="most_popular">
		<div class="wrap_section">
			<h3><?php echo $title_case; ?></h3>
			<h4><?php echo $title_case_2; ?></h4>
			<div class="description"><?php echo $description; ?></div>
				<div class="wrap_applications dFlex">
					<div class="applications">
						<div class="title">Количество заявок</div>
						<div class="dFlex cont">
							<div>
								<p class="number"><?php echo $quantity1; ?></p>
								<p>Было</p>
							</div>
							<div>
								<p class="number"><?php echo $quantity2; ?></p>
								<p>Стало</p>
							</div>
						</div>
					</div>

					<div class="applications">
						<div class="title">Стоимость заявки</div>
						<div class="dFlex cont">
							<div>
								<p class="number"><?php echo $price1; ?></p>
								<p>Было</p>
							</div>
							<div>
								<p class="number"><?php echo $price2; ?></p>
								<p>Стало</p>
							</div>
						</div>
					</div>
				</div>
				<a href="<?php echo $link_case; ?>" class="btn btn__order radius_1">Смотреть кейс
					<svg width="12" height="12" viewBox="0 0 12 12" fill="none"
						xmlns="http://www.w3.org/2000/svg">
						<path d="M1 11L11.5 0.5M11.5 0.5H4M11.5 0.5V8" stroke="white" stroke-linecap="round"
							stroke-linejoin="round">
						</path>
					</svg>
				</a>
		</div>
	</section>
<?php		
	}
?>