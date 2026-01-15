<?php
/*
Template Name: Лид--магнит
Template Post Type: page
*/
?>

<?php get_template_part('templates/head'); ?>

<body>
	<?php
	$title_download = get_field('title_download');
	$description_download = get_field('description_download');
	if (have_rows('documents')) {
	?>
		<script>
			<?php /*Отправляем данные из php в js*/ ?>
			const documentsAfterModal = {
				title: "<?php echo $title_download; ?>",
				description: "<?php echo $description_download; ?>",
				documents: [

					<?php
					while (have_rows('documents')) {
						the_row();
						$document_title = get_sub_field('document_title');
						$document_url = get_sub_field('document_url');
						echo '{
				title : "' . $document_title . '",
				url : "' . $document_url . '",
			},';
					}
					?>
				],
			}
		</script>
	<?php
	}
	?>
	<div class="pageWrapper">

		<?php get_template_part('templates/top-panel-main'); ?>
		<?php get_template_part('templates/header-lid'); ?>

		<main class="main">
			<?php
			// проверяем есть ли данные в гибком содержании
			if (have_rows('page_lid_magnet')):

				// перебираем макеты гибкого содержания
				while (have_rows('page_lid_magnet')) : the_row();
			?>
					<!-- Начало секции ПРИЧИНЫ -->
					<section class="pageCase pageCase__lid-magnit">
						<div class="pageCase__systems">

							<?php if (get_row_layout() == 'benefit'):
								$title = get_sub_field('title');
							?>
								<div class="pageCase__lid-magnit__block dFlex">
									<h3 class="m-0"><?php echo $title ?></h3>
									<div class="swiper-container pageCase__lid-magnit__container-mobile">
										<div class="swiper-wrapper pageCase__systems-block pageCase__our-services__block">
											<?php
											if (have_rows('cause')) {
												$count = 0;
												while (have_rows('cause')) {
													the_row();
													$count++;
													$title_cose = get_sub_field('cause_title');
													$descr_cose = get_sub_field('cause_description');
											?>
													<div
														class="swiper-slide dFlex pageCase__our-services__block-card pageCase__our-services__block-card__system radius_1">
														<p class="pageCase__our-services__block-card__list radius_1 m-0">Причина №<?php echo $count; ?></p>
														<div class="pageCase__our-services__block-card__list-text dFlex">
															<h4 class="m-0 pageCase__our-services__card-title">
																<?php echo $title_cose; ?>
															</h4>
															<p class="m-0 pageCase__our-services__block-card__text">
																<?php echo $descr_cose; ?>
															</p>
														</div>
													</div>
												<?php

												}
												?>
										</div>
									</div>
									<div class="swiperWrapLidMagnit__btns-mobile dFlex">
										<button type="button" class="btn-slider btn-prev__lid-magnit" tabindex="0"
											aria-label="Previous slide" aria-controls="swiper-wrapper-93d53f68e0a81f7b"></button>
										<button type="button" class="btn-slider btn-next__lid-magnit" tabindex="0"
											aria-label="Next slide" aria-controls="swiper-wrapper-93d53f68e0a81f7b"></button>
									</div>
								</div>
								<div class="pageCase__our-services__block pageCase__systems-block pageCase__lid-magnit__box">
									<?php
												$count = 0;
												while (have_rows('cause')) {
													the_row();
													$count++;
													$title_cose = get_sub_field('cause_title');
													$descr_cose = get_sub_field('cause_description');
									?>
										<div
											class="dFlex pageCase__our-services__block-card pageCase__our-services__block-card__system radius_1">
											<p class="pageCase__our-services__block-card__list radius_1 m-0">Причина №<?php echo $count; ?></p>
											<div class="pageCase__our-services__block-card__list-text dFlex">
												<h4 class="m-0 pageCase__our-services__card-title">
													<?php echo $title_cose; ?>
												</h4>
												<p class="m-0 pageCase__our-services__block-card__text">
													<?php echo $descr_cose; ?>
												</p>

											</div>
										</div>
									<?php
												}
									?>
								</div>
								<div class="swiper-container pageCase__lid-magnit__container">
									<div class="swiper-wrapper pageCase__systems-block pageCase__our-services__block">
										<?php
												$count = 0;
												while (have_rows('cause')) {
													the_row();
													$count++;
													$title_cose = get_sub_field('cause_title');
													$descr_cose = get_sub_field('cause_description');
										?>
											<div
												class="swiper-slide dFlex pageCase__our-services__block-card pageCase__our-services__block-card__system radius_1">
												<p class="pageCase__our-services__block-card__list radius_1 m-0">Причина №<?php echo $count; ?></p>
												<div class="pageCase__our-services__block-card__list-text dFlex">
													<h4 class="m-0 pageCase__our-services__card-title">
														<?php echo $title_cose; ?>
													</h4>
													<p class="m-0 pageCase__our-services__block-card__text">
														<?php echo $descr_cose; ?>
													</p>

												</div>
											</div>

										<?php
												}
										?>
									</div>
								</div>
							<?php
											}
							?>
						<?php
							endif; //Конец секции
						?>
						</div>
					</section>
					<!-- Конец секции ПРИЧИНЫ -->

					<!-- Начало секции Для кого -->
					<?php
					if (get_row_layout() == 'for_whom') {
						$title = get_sub_field('title');
						$sub_title = get_sub_field('sub_title');
						$description = get_sub_field('description');
					?>
						<section class="pageCase__where-lid">
							<div class="pageCase__where-lid__container">
								<div class="pageCase__where-lid__block-box dFlex">
									<div class="pageCase__where-lid__container-block dFlex">
										<?php if ($title) echo '<h1 class="m-0">' . $title . ' <br /> <span>' . $sub_title . '</span></h1>'; ?>
										<?php if ($description) echo '<p class="m-0 pageCase__where-lid__container-block__text">' . $description . '</p>'; ?>
									</div>
									<div class="pageCase__where-lid__container-box  pageCase__where-lid__block-box__slider-not__slider">
										<?php
										if (have_rows('blocks')) {
											$count = 0;
											while (have_rows('blocks')) {
												the_row();
												$description_bloks = get_sub_field('block_discript');
												$count++;
										?>
												<div class="pageCase__where-lid__container-box__card dFlex">
													<p class="pageCase__where-lid__container-box__card-number m-0"><?php echo $count ?></p>
													<p class="pageCase__where-lid__container-box__card-text m-0"><?php echo $description_bloks; ?></p>
												</div>
										<?php
											}
										}
										?>


									</div>
								</div>
								<div class="swiper-container pageCase__where-lid__block-box__slider">
									<div class="swiper-wrapper pageCase__where-lid__container-box">
										<?php
										if (have_rows('blocks')) {
											$count = 0;
											while (have_rows('blocks')) {
												the_row();
												$description_bloks = get_sub_field('block_discript');
												$count++;
										?>
												<div class="swiper-slide pageCase__where-lid__container-box__card dFlex">
													<p class="pageCase__where-lid__container-box__card-number m-0"><?php echo $count ?></p>
													<p class="pageCase__where-lid__container-box__card-text m-0"><?php echo $description_bloks; ?></p>
												</div>
										<?php
											}
										}
										?>
									</div>
								</div>
								<div class="swiperWrapLidWhere__btns-mobile dFlex">
									<button type="button" class="btn-slider btn-prev__lid-where" tabindex="0"
										aria-label="Previous slide" aria-controls="swiper-wrapper-fba573f438188884"></button>
									<button type="button" class="btn-slider btn-next__lid-where" tabindex="0"
										aria-label="Next slide" aria-controls="swiper-wrapper-fba573f438188884"></button>
								</div>
							</div>
						</section>
					<?php
					}
					?>

					<!-- Конец секции Для кого -->


					<!-- Начало секции ФАКТЫ -->
					<?php
					if (get_row_layout() == 'facts') {
						$title = get_sub_field('title');
					?>
						<section class="pageCase pageCase__our-services pageCase__fact-case">
							<div class="pageCase__fact-case__block dFlex">
								<h1 class="m-0"><?php echo $title; ?></h1>
								<div class="swiperWrapFactCase__btns-mobile dFlex">
									<button type="button" class="btn-slider btn-prev__facts-case" tabindex="0"
										aria-label="Previous slide" aria-controls="swiper-wrapper-fba573f438188884"></button>
									<button type="button" class="btn-slider btn-next__facts-case" tabindex="0"
										aria-label="Next slide" aria-controls="swiper-wrapper-fba573f438188884"></button>
								</div>
							</div>

							<?php if (have_rows('block')) {
								echo '<div class="pageCase__fact-case__box dFlex">';
								while (have_rows('block')) {
									the_row();
									$url_image = get_sub_field('image'); 		//УРЛ изображения
									$block_desc = get_sub_field('block_desc');	//Описание блока
									$block_title = get_sub_field('block_title'); //Титульник блока
									$budget = get_sub_field('budget');			//Бюджет
									$attracted = get_sub_field('attracted');	//Привлечение заявок
									$price = get_sub_field('price'); // Цена
									$task = get_sub_field('task'); // Задача
									$result = get_sub_field('result'); //Результат

							?>
									<div class="pageCase__fact-case__box-cards dFlex">
										<div class="pageCase__fact-case__box-cards__image dFlex">
											<img class="pageCase__fact-case__box-card__image radius_1" src="<?php echo $url_image; ?>"
												alt="Ниша - Маркетинг">
											<p class="pageCase__fact-case__box-cards__text m-0"><?php echo $block_desc; ?></p>
											<p class="pageCase__fact-case__box-cards__paragraph m-0"><?php echo $block_title; ?></p>
										</div>
										<div class="pageCase__fact-case__box-cards__data dFlex radius_1 pad40">
											<div class="pageCase__fact-case__box-cards__data-block dFlex">
												<div>
													<p class="pageCase__fact-case__box-cards__data-paragraph__color">Бюджет:</p>
													<p class="pageCase__fact-case__box-cards__data-paragraph m-0"><?php echo $budget; ?></p>
												</div>
												<div>
													<p class="pageCase__fact-case__box-cards__data-paragraph__color">Привлечено заявок:
													</p>
													<p class="pageCase__fact-case__box-cards__data-paragraph m-0"><?php echo $attracted; ?> шт.</p>
												</div>
												<div>
													<p class="pageCase__fact-case__box-cards__data-paragraph__color">Цена заявки:</p>
													<p class="pageCase__fact-case__box-cards__data-paragraph m-0"><?php echo $price; ?></p>
												</div>


												<?php
												if (have_rows('social')) {
													echo '<div class="dFlex pageCase__fact-case__box-cards__data-icons">';
													while (have_rows('social')) {
														the_row();
														$link = get_sub_field('soc_link');
														$soc_name = get_sub_field('soc_name');
												?>
														<a href="<?php echo $link; ?>">
															<img src="<?php echo get_template_directory_uri(); ?>/new-site/assets/images/<?php echo $soc_name; ?>.svg" alt="VK">
														</a>

												<?php
													}
													echo '</div>';
												}
												?>
											</div>
											<div class="pageCase__fact-case__box-cards__data-block dFlex">
												<div>
													<p class="pageCase__fact-case__box-cards__data-paragraph__color">Задача:</p>
													<p class="pageCase__fact-case__box-cards__data-paragraph m-0"><?php echo $task; ?></p>
												</div>
												<div>
													<p class="pageCase__fact-case__box-cards__data-paragraph__color">Результат:</p>
													<p class="pageCase__fact-case__box-cards__data-paragraph m-0"><?php echo $result; ?></p>
												</div>
											</div>
										</div>
									</div>
							<?php
								}
								echo '</div>';
							} ?>
							<?php if (have_rows('block')) { ?>
								<div class="swiper-container pageCase__fact-case__box-conatiner">
									<div class="swiper-wrapper pageCase__fact-case__box pageCase__fact-case__box-mobile dFlex">
										<?php while (have_rows('block')) {
											the_row();
											$url_image = get_sub_field('image'); 		//УРЛ изображения
											$block_desc = get_sub_field('block_desc');	//Описание блока
											$block_title = get_sub_field('block_title'); //Титульник блока
											$budget = get_sub_field('budget');			//Бюджет
											$attracted = get_sub_field('attracted');	//Привлечение заявок
											$price = get_sub_field('price'); // Цена
											$task = get_sub_field('task'); // Задача
											$result = get_sub_field('result'); //Результат
										?>
											<div class="swiper-slide pageCase__fact-case__box-cards dFlex">
												<div class="pageCase__fact-case__box-cards__image dFlex">
													<img class="pageCase__fact-case__box-card__image radius_1" src="<?php echo $url_image; ?>"
														alt="Ниша - Маркетинг">
													<p class="pageCase__fact-case__box-cards__text m-0"><?php echo $block_desc; ?></p>
													<p class="pageCase__fact-case__box-cards__paragraph m-0"><?php echo $block_title ?></p>
												</div>
												<div class="pageCase__fact-case__box-cards__data dFlex radius_1 pad40">
													<div class="pageCase__fact-case__box-cards__data-block dFlex">
														<div>
															<p class="pageCase__fact-case__box-cards__data-paragraph__color">Бюджет:</p>
															<p class="pageCase__fact-case__box-cards__data-paragraph m-0"><?php echo $budget; ?></p>
														</div>
														<div>
															<p class="pageCase__fact-case__box-cards__data-paragraph__color">Привлечено
																заявок:
															</p>
															<p class="pageCase__fact-case__box-cards__data-paragraph m-0"><?php echo $attracted; ?> шт.</p>
														</div>
														<div>
															<p class="pageCase__fact-case__box-cards__data-paragraph__color">Цена заявки:
															</p>
															<p class="pageCase__fact-case__box-cards__data-paragraph m-0"><?php echo $price; ?></p>
														</div>
														<?php
														if (have_rows('social')) {
															echo '<div class="dFlex pageCase__fact-case__box-cards__data-icons">';
															while (have_rows('social')) {
																the_row();
																$link = get_sub_field('soc_link');
																$soc_name = get_sub_field('soc_name');
														?>
																<a href="<?php echo $link; ?>">
																	<img src="<?php echo get_template_directory_uri(); ?>/new-site/assets/images/<?php echo $soc_name; ?>.svg" alt="VK">
																</a>

														<?php
															}
															echo '</div>';
														}
														?>
													</div>
													<div class="pageCase__fact-case__box-cards__data-block dFlex">
														<div>
															<p class="pageCase__fact-case__box-cards__data-paragraph__color">Задача:</p>
															<p class="pageCase__fact-case__box-cards__data-paragraph m-0"><?php echo $task; ?></p>
														</div>
														<div>
															<p class="pageCase__fact-case__box-cards__data-paragraph__color">Результат:</p>
															<p class="pageCase__fact-case__box-cards__data-paragraph m-0"><?php echo $result; ?></p>
														</div>
													</div>
												</div>
											</div>
										<?php
										} ?>
									</div>
								</div>
							<?php
							} ?>
							<div class="swiperWrapFactCase__btns-mobile__mini dFlex">
								<button type="button" class="btn-slider btn-prev__facts-case" tabindex="0"
									aria-label="Previous slide" aria-controls="swiper-wrapper-fba573f438188884"></button>
								<button type="button" class="btn-slider btn-next__facts-case" tabindex="0" aria-label="Next slide"
									aria-controls="swiper-wrapper-fba573f438188884"></button>
							</div>
						</section>
					<?php
					}
					?>
					<!-- Конец секции ФАКТЫ -->

					<!-- Начало Наши услуги -->
					<?php if (get_row_layout() == 'our_service'):
						$title = get_sub_field('title');
						echo '
					<section class="pageCase pageCase__our-services">
						<div class="pageCase__price-services__container-block dFlex">
							<h1 class="pageCase__our-service__title m-0">' . $title . '</h1>							
						</div>
						<div class="swiper-container pageCase__our-services__container-swiper">
							<div class="swiper-wrapper pageCase__our-services__wapper dFlex">';
						// проверяем есть ли данные в повторителе
						if (have_rows('cards')):
							// перебираем строки повторителя
							while (have_rows('cards')) : the_row();
								$image = get_sub_field('image');
								$name = get_sub_field('name');
								$desc = get_sub_field('desc');
								$price = get_sub_field('price');
								$link = get_sub_field('link');
								echo ' 
										<div class="swiper-slide dFlex pageCase__our-services__card active">
											<div class="pageCase__our-services__card-image__block">
												<img class="pageCase__our-services__card-image radius_1" src="' . $image . '"
													alt="Комплексный интернет-маркетинг">
											</div>
											<h4 class="m-0 pageCase__our-services__card-title">' . $name . '</h4>
											<p class="m-0">' . $desc . '</p>
											<a href="' . $link . '" class="btn btn__order radius_1">' . $price . '
												<svg width="12" height="12" viewBox="0 0 12 12" fill="none"
													xmlns="http://www.w3.org/2000/svg">
													<path d="M1 11L11.5 0.5M11.5 0.5H4M11.5 0.5V8" stroke="white" stroke-linecap="round"
														stroke-linejoin="round">
													</path>
												</svg>
											</a>
										</div>
										';
							endwhile;
						endif;
						echo '
							</div>
						</div>
							<div class="swiperWrapOurServices__btns dFlex">
								<button type="button" class="btn-slider btn-prev__our-services"></button>
								<button type="button" class="btn-slider btn-next__our-services"></button>
							</div>
					</section>
					';
					endif; ?>
					<!-- Конец Наши услуги -->

					<!-- Секция команды -->
					<?php
					if (get_row_layout() == 'section_team'):
						$title = get_sub_field('title');
						$conter = get_sub_field('conter');
						echo '		
					<section class="pageCase pageCase__comands-experts">
						<div class="pageCase__comands dFlex">
							<div class="pageCase__comands-container dFlex">
								<div class="pageCase__comands-container__text dFlex">
									<h1 class="m-0">' . $title . '</h1>
									<p class="m-0">' . $conter . '</p>
								</div>
								<div class="swiper-container slider__wrapper-comands__container mobile-block__slider">
									<div class="swiper-wrapper slider__wrapper-comand dFlex">
										';
						// проверяем есть ли данные в повторителе
						if (have_rows('cards')):
							// перебираем строки повторителя
							while (have_rows('cards')) : the_row();
								$image = get_sub_field('image');
								$name = get_sub_field('name');
								$position = get_sub_field('position');
								echo ' 															
														<div class="swiper-slide pageCase__internet-marketing__box-block__comands-block active">
															<div class="pageCase__internet-marketing__box-block__comands-block__image">
																<img src="' . $image . '" alt="Марктеолог">
															</div>
															<div class="pageCase__internet-marketing__box-block__comands-block__texts">
																<p class="pageCase__internet-marketing__box-block__comands-block__text-name">
																	' . $name . '
																</p>
																<p class="pageCase__internet-marketing__box-block__comands-block__text-prof">
																	' . $position . '
																</p>
															</div>
														</div>	
														';
							endwhile;
						endif;
						echo '
									</div>
								</div>
								<div class="swiperWrapClients__btns dFlex">
									<button type="button" class="btn-slider btn-prev__comands"></button>
									<button type="button" class="btn-slider btn-next__comands"></button>
								</div>
							</div>
							<div class="swiper-container slider__wrapper-comands__container">
								<div class="swiper-wrapper slider__wrapper-comand dFlex">
								';
						// проверяем есть ли данные в повторителе
						if (have_rows('cards')):
							// перебираем строки повторителя
							while (have_rows('cards')) : the_row();
								$image = get_sub_field('image');
								$name = get_sub_field('name');
								$position = get_sub_field('position');
								echo ' 															
														<div class="swiper-slide pageCase__internet-marketing__box-block__comands-block active">
															<div class="pageCase__internet-marketing__box-block__comands-block__image">
																<img src="' . $image . '" alt="Марктеолог">
															</div>
															<div class="pageCase__internet-marketing__box-block__comands-block__texts">
																<p class="pageCase__internet-marketing__box-block__comands-block__text-name">
																	' . $name . '
																</p>
																<p class="pageCase__internet-marketing__box-block__comands-block__text-prof">
																	' . $position . '
																</p>
															</div>
														</div>	
														';
							endwhile;
						endif;
						echo '
								</div>
							</div>
						</div>
					</section>';
					endif;

					?>
					<!-- Конец Секция команды -->

					<!--КОНЕЦ секции СИСТЕМНЫЙ ПОДХОД-->
					<?php
					if (get_row_layout() == 'systems_approach') {
						$title_sec = get_sub_field('title_systems_approach');
						$count = 0;
					?>
						<section class="pageCase pageCase__our-services">
							<div class="pageCase__systems">
								<h3><?php echo $title_sec; ?></h3>
								<div class="pageCase__our-services__block pageCase__systems-block">
									<?php
									if (have_rows('block_systems_approach')) {
										while (have_rows('block_systems_approach')) {
											the_row();
											$name = get_sub_field('name');
											$title = get_sub_field('title');
											$description = get_sub_field('description');
									?>
											<div
												class="dFlex pageCase__our-services__block-card pageCase__our-services__block-card__system radius_1">
												<p class="pageCase__our-services__block-card__list radius_1 m-0"><?php echo ++$count . '. ' . $name; ?></p>
												<div class="pageCase__our-services__block-card__list-text dFlex">
													<h4 class="m-0 pageCase__our-services__card-title"><?php echo $title; ?></h4>
													<p class="m-0 pageCase__our-services__block-card__text"><?php echo $description; ?></p>
												</div>
											</div>
									<?php
										}
									}
									?>
								</div>
							</div>
						</section>
					<?php
					}
					?>
					<!--КОНЕЦ секции СИСТЕМНЫЙ ПОДХОД-->



					<?php
					// Начало Секции Рейтинг 
					if (get_row_layout() == 'rating'):
						// проверяем есть ли данные в повторителе
						if (have_rows('rating_list')):
							echo '
                        <section class="pageCase__achievements">
                            <div class="pageCase__achievements-container">
                        ';
							// перебираем строки повторителя
							while (have_rows('rating_list')) : the_row();

								$counter = get_sub_field('counter');
								$name = get_sub_field('name');
								$text = get_sub_field('text');

								echo '
                            <div class="pageCase__achievements-box">
                                <p class="pageCase__achievements-box__number">' . $counter . '</p>
                                <p class="pageCase__achievements-box__text">' . $name . '</p>
                                <p class="pageCase__achievements-box__desc">
                                    ' . $text . '
                                </p>
                            </div>
                            ';

							endwhile;
							echo '
                            </div>
                        </section>  
                        ';
						endif;
					endif;
					// Конец Секции Рейтинг 
					// Начало Секции Блок со списком
					if (get_row_layout() == 'block_with_list'):
						$title = get_sub_field('Title');
						$desc = get_sub_field('desc');
						echo '
                    <section class="pageCase pageCase__internet-marketing__section">
                        <div class="pageCase__internet-marketing">
                            <div class="pageCase__internet-marketing__block dFlex">
                                <div class="pageCase__internet-marketing__block-text">
                                    <h1 class="pageCase__internet-marketing__block-subtitle">
                                        ' . $title . '
                                    </h1>
                                    <p class="pageCase__internet-marketing__block-paragraph">
                                       ' . $desc . '
                                    </p>
                                </div>
                    ';
						// проверяем есть ли данные в повторителе
						if (have_rows('list')):
							echo '<ul class="pageCase__internet-marketing__block-lists">';
							// перебираем строки повторителя
							while (have_rows('list')) : the_row();
								$listItem = get_sub_field('list_item');
								echo '<li class="pageCase__internet-marketing__block-list">' . $listItem . '</li>';
							endwhile;
							echo '</ul></div>';
						endif;
						echo '
                        </div>
                    </section>
                    ';
					endif;
					// Конец Секции Блок со списком

					// Начало Секции Изображение слева
					get_template_part('templates/layout/image-left');
					// Конец Секции Изображение слева

					// Начало Секции Изображение справа
					get_template_part('templates/layout/image-right');
					// Конец Секции Изображение справа

					// Начало Секции слайдера с клиентом
					if (get_row_layout() == 'section_clints'):
						$title = get_sub_field('title');
						echo '	
					<section class="our-clients_section_wp">
						<div class="pageCase__our-clients dFlex">
							<div class="pageCase__our-clients__block dFlex">
								<h1 class="m-0">' . $title . '</h1>
								<div class="swiperWrapClients__btns dFlex">
									<button type="button" class="btn-slider btn-slider__clients btn-prev__clients"></button>
									<button type="button" class="btn-slider btn-slider__clients btn-next__clients"></button>
								</div>
							</div>							
							<div class="swiper-container slider__wrapper-clients__container">
								<div class="swiper-wrapper slider__wrapper-clients dFlex">';
						// проверяем есть ли данные в повторителе
						if (have_rows('images')):
							// перебираем строки повторителя
							while (have_rows('images')) : the_row();
								$image = get_sub_field('image');
								echo ' 										
											<div
												class="swiper-slide pageCase__internet-marketing__box-block__image-container radius_1">
												<img class="pageCase__internet-marketing__box-block__image"
													src="' . $image . '" alt="Проект">
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

					// Начало секции с отзывами
					if (get_row_layout() == 'section_review'):
						$title = get_sub_field('title');
						$desc = get_sub_field('desc');
						echo '	
					<section class="pageCase pageCase__our-review">
						<div class="container">
							<div class="dFlex pageCase__our-review__container">
								<div class="pageCase__internet-marketing__block-text dFlex">
									<h2 class="pageCase__internet-marketing__block-subtitle m-0">' . $title . '</h2>
									<div class="pageCase__internet-marketing__block-paragraph">' . $desc . '</div>
									<div class="swiperWrapOurReview__btns dFlex">
										<button type="button" class="btn-slider btn-prev__review"></button>
										<button type="button" class="btn-slider btn-next__review"></button>
									</div>
								</div>
								<div class="swiper-container slider__wrapper-licenses__container">
									<div class="swiper-wrapper slider__wrapper-licenses dFlex">';
						// проверяем есть ли данные в повторителе
						if (have_rows('list')):
							// перебираем строки повторителя
							while (have_rows('list')) : the_row();
								$image = get_sub_field('image');
								echo ' 	
													<a class="swiper-slide slider__wrapper-license active" href="' . $image . '" data-fancybox="gallery_review" data-caption="Single image">
													<img src="' . $image . '" />
													</a>
													';
							endwhile;
						endif;
						echo '
									</div>
								</div>
								<div class="swiperWrapOurReview__btns-mobile dFlex">
									<button type="button" class="btn-slider btn-prev__review"></button>
									<button type="button" class="btn-slider btn-next__review"></button>
								</div>
							</div>
						</div>
					</section>
					';
					endif;
					// Конец секции с отзывами
					?>

					<!-- Начало Форма -->
					<?php
					if (get_row_layout() == 'form_audit') {
						$title = get_sub_field('title_audit');
						$description = get_sub_field('description');
						$file_audit = get_sub_field('file_audit');
						$sect_img = get_sub_field('sect_img');
						$color_block = get_sub_field('color');
					?>
						<section class="pageCase audit">
							<div class="conteiner_audit" <?php
															if ($color_block) {
																echo 'style="background-color: ' . $color_block . '"';
															}
															?>>
								<div>
									<h3 class="title"><?php echo $title; ?></h3>
									<h4><?php echo $description; ?></h4>
									<div class="form_tel">
										<?php echo do_shortcode('[contact-form-7 id="709ba22" title="Бесплатный аудит"]'); ?>
									</div>
									<div class="download">
										<svg width="36" height="37" viewBox="0 0 36 37" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M31.5 23V29C31.5 29.7956 31.1839 30.5587 30.6213 31.1213C30.0587 31.6839 29.2956 32 28.5 32H7.5C6.70435 32 5.94129 31.6839 5.37868 31.1213C4.81607 30.5587 4.5 29.7956 4.5 29V23" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
											<path d="M10.5 15.5L18 23L25.5 15.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
											<path d="M18 23V5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
										</svg>
										<a href="<?php echo $file_audit; ?>" download>Скачать пример аудита</a>
									</div>
								</div>
								<img src="<?php echo $sect_img; ?>" alt="" class="img_audit">
							</div>
						</section>
					<?php
					}
					?>
					<!-- КОНЕЦ Форма -->
					<!-- Отзывы клиентов -->
					<?php get_template_part('templates/layout/сustomer_reviews'); ?>
					<?php
					// Секция Доска команды
					get_template_part('templates/layout/team-board');
					?>

					<!-- Форма Подарок за данные -->
					<!-- Начало Форма -->
					<?php
					if (get_row_layout() == 'form_send_document') {
						$title = get_sub_field('title_form');
						$title_after = get_sub_field('title_after');
						$description = get_sub_field('description');
						$description_after = get_sub_field('description_after');
						$sect_img = get_sub_field('sect_img');
						$color_block = get_sub_field('color');
					?>
						<section class="pageCase audit">
							<div class="conteiner_audit" <?php
															if ($color_block) {
																echo 'style="background-color: ' . $color_block . '"';
															}
															?>>
								<div class="form_documents_for_data" data-title="<?php echo $title_after; ?>" data-desc="<?php echo $description_after; ?>">
									<h3 class="title"><?php echo $title; ?></h3>
									<h4><?php echo $description; ?></h4>
									<div class="form_tel">
										<?php echo do_shortcode('[contact-form-7 id="ef7c305" title="Форма документы за данные"]'); ?>
									</div>
									<div id="documents"></div>
								</div>
								<img src="<?php echo $sect_img; ?>" alt="" class="img_audit">
							</div>
						</section>
					<?php
					}
					?>
					<!-- КОНЕЦ Форма -->
					<?php
					// Квалифицированне лиды
					get_template_part('templates/layout/qualified_leads');

					// cloud-message секция
					get_template_part('templates/layout/cloud_message');

					// quote секция
					get_template_part('templates/layout/quote');

					// quote tariffs
					get_template_part('templates/layout/tariffs');

					// facts-case секция
					get_template_part('templates/layout/facts_case');

					// stages of work секция
					get_template_part('templates/layout/stages_of_work_section');

					// teach_marketing секция Обучаем интернет маркетингу
					get_template_part('templates/layout/teach_marketing_section');
					?>

			<?php
				endwhile;
			endif;
			?>


		</main>
		<?php get_footer(); ?>