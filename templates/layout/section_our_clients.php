<?php
// Начало Секции слайдера с клиентом
				if(get_row_layout() == 'section_clints'):
					$title = get_sub_field('title');
										
					// ПРоверка отступов
						$mb = get_sub_field('margin_bot');
						$mt = get_sub_field('margin_top');
						$margin_top = (is_numeric($mt)) ? "margin-top:{$mt}px;" : '';
						$margin_bottom = (is_numeric($mb)) ? "margin-bottom:{$mb}px;" : '';
						$padding_style = ($margin_top || $margin_bottom) ? 'style="' . $margin_top . $margin_bottom . '"' : '';
					//конец проверки отступов


					echo '	
					<section class="our-clients_section_wp" '.$padding_style.'> 
						<div class="pageCase__our-clients dFlex">
							<div class="pageCase__our-clients__block dFlex">
								<h1 class="m-0">'.$title.'</h1>
								<div class="swiperWrapClients__btns dFlex">
									<button type="button" class="btn-slider btn-slider__clients btn-prev__clients"></button>
									<button type="button" class="btn-slider btn-slider__clients btn-next__clients"></button>
								</div>
							</div>							
							<div class="swiper-container slider__wrapper-clients__container">
								<div class="swiper-wrapper slider__wrapper-clients dFlex">';
									// проверяем есть ли данные в повторителе
									if( have_rows('images') ):
										// перебираем строки повторителя
										while ( have_rows('images') ) : the_row();
											$image = get_sub_field('image');
											echo ' 										
											<div
												class="swiper-slide pageCase__internet-marketing__box-block__image-container radius_1">
												<img class="pageCase__internet-marketing__box-block__image"
													src="'.$image.'" alt="Проект">
											</div>
											';
										endwhile;
									endif;
								echo '
								</div>
							</div>
						</div>
					</section>
					';
				endif;
// Конец Секции слайдера с клиентом