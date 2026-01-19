<?php
if (get_row_layout() == 'tariffs_CPT') {
	$tariffs_id = get_sub_field("tariff_obj");

	$tariff_cpt = get_field("tariffs_cpt", $tariffs_id);
	var_dump($tariff_cpt);
	$title = $tariff_cpt["title"] ? $tariff_cpt["title"] : "Заголовок не установлен";

?>

	<?php
	if (!empty($tariff_cpt)) {
	?>
		<section class="white_section">
			<div class="wrap_section">
				<div class="tariffs_header">
					<h2 class="fs_h2"><?php echo $title; ?></h2>
					<div class="swiperWrapTariffs__btns dFlex">
						<button type="button" class="btn-slider btn-prev__tariffs"></button>
						<button type="button" class="btn-slider btn-next__tariffs"></button>
					</div>
				</div>

				<div class="tariffs_content">

					<?php
					if ($tariff_cpt["comp_of_services"]) {
						$count = 1;
					?>
						<div class="service_compos">
							<h3 class="fs_h3">Состав услуги</h3>
							<ul>
								<?php
								foreach ($tariff_cpt["comp_of_services"] as $service) {
								?>
									<li class="el_<?php echo $count++; ?>"><?php echo $service["service"]; ?></li>
								<?php
								} ?>
							</ul>
						</div>
					<?php
					}
					?>

					<?php
					if ($tariff_cpt["tariff"]) {
					?>
						<div class="tariffs_block">
							<div class="swiper_tariffs">
								<div class="swiper-wrapper">
									<?php
									foreach ($tariff_cpt["tariff"] as $tariff) {
										$count = 1;

										$title_tariff = $tariff['title_tariff'];
										$price = $tariff['price'];
										$special_mark = $tariff['special_mark'];
										$desc_special_mark = $tariff['desc_special_mark'];

									?>
										<div class="swiper-slide">
											<div class="tariffs_card">
												<h3 class="fs_h3"><?php echo $title_tariff; ?><?php if ($special_mark) {
																									echo '<span>' . $desc_special_mark . '</span>';
																								} ?>
												</h3>
												<?php if (!empty($tariff['tariff_point'])) {
												?>
													<ul>
														<?php foreach ($tariff['tariff_point'] as $tariff_point) {
															the_row();
															$check_serv = $tariff_point['check_serv'];
															$desc = $tariff_point['desc'];
														?>
															<li class="el_<?php echo $count++; ?>">
																<p><?php if ($check_serv) {
																		echo '&#10004;';
																	} elseif ($desc) {
																		echo $desc;
																	} ?></p>
															</li>
														<?php
														} ?>
													</ul>
												<?php
												} ?>
												<div class="tariffs_price">
													<p><?php echo $price; ?></p>
												</div>
												<a href="#popupfancy" data-fancybox="" class="btn btn__order radius_1">Заказать
													<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M1 11L11.5 0.5M11.5 0.5H4M11.5 0.5V8" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>
													</svg>
												</a>
											</div>
										</div>
									<?php
									}
									?>
								</div>
							</div>
						</div>
					<?php
					}
					?>
				</div>
			</div>
		</section>
<?php
	}
}
?>