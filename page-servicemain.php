<?php

/*
Template Name: Все услуги
Template Post Type: post, page, product
*/


?>

<?php get_template_part('templates/head'); ?>

<body>
    <div class="pageWrapper">
        
        <?php get_template_part('templates/top-panel-main'); ?>
        <?php get_template_part('templates/header-all-services'); ?>
       
        <main class="main">

        <?php

        // проверяем есть ли данные в гибком содержании
        if( have_rows('page_main_service') ):

            // перебираем макеты гибкого содержания
            while ( have_rows('page_main_service') ) : the_row();
        
                
                if( get_row_layout() == 'rating' ):
                    // проверяем есть ли данные в повторителе
                    if( have_rows('rating_list') ):
                        echo '
                        <section class="pageCase__achievements">
                            <div class="pageCase__achievements-container">
                        ';
                        // перебираем строки повторителя
                        while ( have_rows('rating_list') ) : the_row();

                            $counter = get_sub_field('counter');
                            $name = get_sub_field('name');
                            $text = get_sub_field('text');

                            echo '
                            <div class="pageCase__achievements-box">
                                <p class="pageCase__achievements-box__number">'.$counter.'</p>
                                <p class="pageCase__achievements-box__text">'.$name.'</p>
                                <p class="pageCase__achievements-box__desc">
                                    '.$text.'
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


                if( get_row_layout() == 'block_with_list' ):
                    $title = get_sub_field('Title');
                    $desc = get_sub_field('desc');
                    echo '
                    <section class="pageCase pageCase__internet-marketing__section">
                        <div class="pageCase__internet-marketing">
                            <div class="pageCase__internet-marketing__block dFlex">
                                <div class="pageCase__internet-marketing__block-text">
                                    <h1 class="pageCase__internet-marketing__block-subtitle">
                                        '.$title.'
                                    </h1>
                                    <p class="pageCase__internet-marketing__block-paragraph">
                                       '.$desc.'
                                    </p>
                                </div>
                    ';       
                    // проверяем есть ли данные в повторителе
                    if( have_rows('list') ):
                        echo '<ul class="pageCase__internet-marketing__block-lists">';
                        // перебираем строки повторителя
                        while ( have_rows('list') ) : the_row();
                            $listItem = get_sub_field('list_item');
                            echo '<li class="pageCase__internet-marketing__block-list">'.$listItem.'</li>';
                        endwhile;
                        echo '</ul></div>';
                    endif;
                    echo '
                        </div>
                    </section>
                    ';
                endif;

// Начало Секции Изображение слева
				get_template_part('templates/layout/image-left');
// Конец Секции Изображение слева

// Начало Секции Изображение справа
				get_template_part('templates/layout/image-right');
// Конец Секции Изображение справа


                if( get_row_layout() == 'image_person_left' ):
                    $counter = get_sub_field('counter');
                    $title = get_sub_field('title');
                    $text = get_sub_field('text');
                    echo '
                    <section class="pageCase pageCase__internet-marketing__section">
                        <div class="pageCase__internet-marketing__box">
                            <div class="dFlex pageCase__internet-marketing__box-block__comands">
                                <div class="dFlex pageCase__internet-marketing__box-block__comands-container">
                                    <div class="pageCase__internet-marketing__box-block__comand-container dFlex">
                                        <div class="swiperWrapComand dFlex">
                                            <div class="swiper-container slider__wrapper-comand__container">
                                                <div class="swiper-wrapper slider__wrapper-comand dFlex">
                                                    ';
                                                    // проверяем есть ли данные в повторителе
                                                    if( have_rows('person_cards') ):
                                                        // перебираем строки повторителя
                                                        while ( have_rows('person_cards') ) : the_row();
                                                            $image = get_sub_field('image');
                                                            $name = get_sub_field('name');
                                                            $position = get_sub_field('position');
                                                            echo '
                                                            <div class="swiper-slide pageCase__internet-marketing__box-block__comands-block active">
                                                                <div
                                                                    class="pageCase__internet-marketing__box-block__comands-block__image">
                                                                    <img src="'.$image.'" alt="Марктеолог">
                                                                </div>
                                                                <div
                                                                    class="pageCase__internet-marketing__box-block__comands-block__texts">
                                                                    <p class="pageCase__internet-marketing__box-block__comands-block__text-name">
                                                                        '.$name.'
                                                                    </p>
                                                                    <p class="pageCase__internet-marketing__box-block__comands-block__text-prof">
                                                                        '.$position.'
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            ';
                                                        endwhile;
                                                    endif;
                                                echo '</div>
                                            </div>
                                            <div class="swiperWrapComands__btns dFlex">
                                                <button type="button" class="btn-slider btn-prev"></button>
                                                <button type="button" class="btn-slider btn-next"></button>
                                            </div>
                                        </div>
                                    </div>
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


                if( get_row_layout() == 'patners_list' ):
                    echo '
                    <section class="pageCase pageCase__internet-marketing__section">
                        <div class="pageCase__internet-marketing__box ">
                            <div class="dFlex pageCase__internet-marketing__box-block__images pad40 radius_1">
                    ';       
                    // проверяем есть ли данные в повторителе
                    if( have_rows('images') ):
                        // перебираем строки повторителя
                        while ( have_rows('images') ) : the_row();
                            $image = get_sub_field('image');
                            echo ' 
                            <div class="pageCase__internet-marketing__box-block__image-container radius_1">
                                <img class="pageCase__internet-marketing__box-block__image" src="'.$image.'" alt="Проект">
                            </div> ';
                        endwhile;
                    endif;
                    echo '
                            </div>
                        </div>
                    </section>
                    ';
                endif;

                
                if( get_row_layout() == 'image_list_sert' ):
                    echo '
                    <section class="pageCase pageCase__internet-marketing__section">
                        <div class="pageCase__internet-marketing__box ">
                            <div class="dFlex pageCase__internet-marketing__box-block__images pad40 radius_1">
                    ';       
                    // проверяем есть ли данные в повторителе
                    if( have_rows('images') ):
                        // перебираем строки повторителя
                        while ( have_rows('images') ) : the_row();
                            $image = get_sub_field('image');
                            echo ' 
                            <div class="pageCase__internet-marketing__box-block__image-container__comand radius_1">
                                <img class="pageCase__internet-marketing__box-block__image-comand radius_1" src="'.$image.'" alt="Проект">
                            </div> ';
                        endwhile;
                    endif;
                    echo '
                            </div>
                        </div>
                    </section>
                    ';
                endif;


                                
                if( get_row_layout() == 'section_price' ):
                    $title = get_sub_field('title');
                    echo '
                    <section class="pageCase pageCase__price-services">
                        <div class="pageCase__price-services__container">
                            <div class="pageCase__price-services__container-block">
                                <h1 class="pageCase__price-services__title m-0">'. $title.'</h1>
                                <div class="swiper-container swiper__container-price__services swiper__container-price__services-mobile">
                                    <div class="swiper-wrapper pageCase__price-services__cards-slider dFlex">';
                                        // проверяем есть ли данные в повторителе
                                        if( have_rows('cards') ):
                                            // перебираем строки повторителя
                                            while ( have_rows('cards') ) : the_row();
                                                $title = get_sub_field('title');
                                                $price = get_sub_field('price');
                                                $desc = get_sub_field('desc');
                                                $button_name = get_sub_field('button_name');
                                                echo ' 
                                                <div class="swiper-slide radius_1 pageCase__price-services__card pad40 dFlex">
                                                    <div class="dFlex pageCase__price-services__card-name">
                                                        <h4 class="pageCase__price-services__card-title">'.$title.'</h4>
                                                        <p class="pageCase__price-services__card-pargraph">Стоимость от</p>
                                                        <p class="pageCase__price-services__card-price">'.$price.'</p>
                                                    </div>
                                                    '.$desc.'
                                                    <a data-fancybox href="#popupfancy" class="btn btn__order radius_1">'.$button_name.'
                                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M1 11L11.5 0.5M11.5 0.5H4M11.5 0.5V8" stroke="white"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </a>
                                                </div>
                                                ';
                                            endwhile;
                                        endif;
                                    echo '</div>
                                </div>
                                <div class="swiperWrapPriceServices__btns">
                                    <button type="button"
                                        class="btn-slider btn-slider__clients btn-prev__price-services"></button>
                                    <button type="button"
                                        class="btn-slider btn-slider__clients btn-next__price-services"></button>
                                </div>
                            </div>
                        </div>
                    </section>
                    ';
                endif;

				if(get_row_layout() == 'our_service'):
					$title = get_sub_field('title');
					echo '
					<section class="pageCase pageCase__our-services">
						<div class="pageCase__price-services__container-block dFlex">
							<h1 class="pageCase__our-service__title m-0">'.$title.'</h1>							
						</div>
						<div class="swiper-container pageCase__our-services__container-swiper">
							<div class="swiper-wrapper pageCase__our-services__wapper dFlex">';
								// проверяем есть ли данные в повторителе
								if( have_rows('cards') ):
									// перебираем строки повторителя
									while ( have_rows('cards') ) : the_row();
										$image = get_sub_field('image');
										$name = get_sub_field('name');
										$desc = get_sub_field('desc');
										$price = get_sub_field('price');
										$link = get_sub_field('link');
										echo ' 
										<div class="swiper-slide dFlex pageCase__our-services__card active">
											<div class="pageCase__our-services__card-image__block">
												<img class="pageCase__our-services__card-image radius_1" src="'.$image.'"
													alt="Комплексный интернет-маркетинг">
											</div>
											<h4 class="m-0 pageCase__our-services__card-title">'.$name.'</h4>
											<p class="m-0">'.$desc.'</p>
											<a href="'.$link.'" class="btn btn__order radius_1">'.$price.'
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
					</section>
					';
				endif;

				if(get_row_layout() == 'section_process'):
			
					$title = get_sub_field('title');
					echo '		
					
					<section class="section_process">
						<div class="container">
							<h1 class="pageCase__our-service__title m-0">'.$title.'</h1>
							<div class="pageCase__our-services__block">';
								// проверяем есть ли данные в повторителе
								if( have_rows('process') ):
									// перебираем строки повторителя
									while ( have_rows('process') ) : the_row();
										$title = get_sub_field('title');
										$desc = get_sub_field('desc');
										echo ' 
										<div class="dFlex pageCase__our-services__block-card radius_1">
											<h4 class="m-0 pageCase__our-services__card-title">'.$title.'</h4>
											<div class="m-0 pageCase__our-services__block-card__text">
											'.$desc.'
											</div>
										</div>
										';
									endwhile;
								endif;
							echo '
							</div>
						</div>

					</section>
					';
				endif;
			
				if(get_row_layout() == 'section_process_four'):
					$title = get_sub_field('title');
					echo '	
					<section class="section_process_four">
						<div class="container">
							<h1 class="pageCase__our-service__title m-0">'.$title.'</h1>
							<div class="pageCase__our-services__block">';
								// проверяем есть ли данные в повторителе
								if( have_rows('process') ):
									// перебираем строки повторителя
									while ( have_rows('process') ) : the_row();
										$title = get_sub_field('title');
										$desc = get_sub_field('desc');
										echo ' 
										<div class="dFlex pageCase__our-services__block-card radius_1">
											<h4 class="m-0 pageCase__our-services__card-title">'.$title.'</h4>
											<div class="m-0 pageCase__our-services__block-card__text">
											'.$desc.'
											</div>
										</div>
										';
									endwhile;
								endif;
							echo '
							</div>
						</div>
					</section>
					';
				endif;


				if(get_row_layout() == 'section_case'):
					$title = get_sub_field('title');
					$link = get_sub_field('link');
					echo '					
					<section class="pageCase__our-services case__contecst">
						<div class="dFlex case__contecst-text">
							<h1 class="case__contecst-title m-0">'.$title.'</h1>
							<a class="m-0 case__contecst-link" href="'.$link.'">Все кейсы</a>
						</div>
						<div class="case__contecst-block">';
								// проверяем есть ли данные в повторителе
								if( have_rows('cards') ):
									// перебираем строки повторителя
									while ( have_rows('cards') ) : the_row();
										$image = get_sub_field('image');
										$name = get_sub_field('name');
										$link = get_sub_field('link');
										$flag_case = get_sub_field('flag_case');
										echo ' 										
										<a href="'.$link.'" class="case__contecst-box">
											<img class="case__contecst-box__image" src="'.$image.'" alt="Подробнее">
											<p class="case__contecst-box__text m-0">'.$flag_case.'</p>
											<h2 class="case__contecst-box__title m-0">
												'.$name.'
											</h2>
											<p class="case__contecst-box__btn m-0">Подробнее
												<img class="case__contecst-box__arrow" src="'.get_template_directory_uri().'/new-site/assets/images/arrow-order.svg" alt="Подробнее">
											</p>
										</a>
										';
									endwhile;
								endif;
							echo '
						</div>
					</section>
					';
				endif;


				// проверяем на нужный макет
				if( get_row_layout() == 'section_offer' ):
					$title = get_sub_field('title');
					$desc = get_sub_field('desc');
					$image = get_sub_field('image');
					$btn_name = get_sub_field('btn_name');
					$link = get_sub_field('link');
					echo '
					<section class="pageCase__check-list">
						<div class="pageCase__check-list__texts">
							<h3 class="m-0 pageCase__check-list__title">'.$title.'</h3>
							'.$desc.'
						</div>
						<div class="pageCase__check-list__image-block">
							<img class="pageCase__check-list__image" src="'.$image.'" alt="Чек-лист">
						</div>
						<div class="pageCase__check-list__link-block">
							<a class="pageCase__check-list__link" href="'.$link.'">
								'.$btn_name.'
								<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M1 11L11.5 0.5M11.5 0.5H4M11.5 0.5V8" stroke="#2d2c2c" stroke-linecap="round"
										stroke-linejoin="round" />
								</svg>
							</a>
						</div>
					</section>
					';
				endif;

				// проверяем на нужный макет
				


				// проверяем на нужный макет
				if( get_row_layout() == 'section_about' ):
					$title = get_sub_field('title');
					$desc = get_sub_field('desc');
					$title_cart = get_sub_field('title_cart');
					$desc_card = get_sub_field('desc_card');
					$image = get_sub_field('image');
					$btn_name = get_sub_field('btn_name');
					$link = get_sub_field('link');
					echo '
					<section class="pageCase pageCase__level dFlex">
						<div class="pageCase__level-box__texts">
							<h2 class="m-0 pageCase__level-title">
								'.$title.'
							</h2>
							<div class="m-0 pageCase__level-text">'.$desc.'</div>
						</div>
						<div class="pageCase__level-card radius_1 dFlex pad40">
							<p class="m-0 pageCase__level-paragraph">'.$title_cart.'</p>
							<div class="m-0 pageCase__level-text">'.$desc_card.'</div>
							<img src="'.$image.'" alt="Цели">
							<a class="pageCase__level-link radius_1" href="'.$link.'">'.$btn_name.' <svg width="12" height="12"
									viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M1 11L11.5 0.5M11.5 0.5H4M11.5 0.5V8" stroke="white" stroke-linecap="round"
										stroke-linejoin="round">
									</path>
								</svg>
							</a>
						</div>
					</section>
					';
				endif;

				// проверяем на нужный макет


				if(get_row_layout() == 'section_clints'):
					$title = get_sub_field('title');
					echo '	
					<section>
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




				if(get_row_layout() == 'section_review'):
					$title = get_sub_field('title');
					$desc = get_sub_field('desc');
					echo '	
					<section class="pageCase pageCase__our-review">
						<div class="container">
							<div class="dFlex pageCase__our-review__container">
								<div class="pageCase__internet-marketing__block-text dFlex">
									<h2 class="pageCase__internet-marketing__block-subtitle m-0">'.$title.'</h2>
									<div class="pageCase__internet-marketing__block-paragraph">'.$desc.'</div>
									<div class="swiperWrapOurReview__btns dFlex">
										<button type="button" class="btn-slider btn-prev__review"></button>
										<button type="button" class="btn-slider btn-next__review"></button>
									</div>
								</div>
								<div class="swiper-container slider__wrapper-licenses__container">
									<div class="swiper-wrapper slider__wrapper-licenses dFlex">';
											// проверяем есть ли данные в повторителе
											if( have_rows('list') ):
												// перебираем строки повторителя
												while ( have_rows('list') ) : the_row();
													$image = get_sub_field('image');
													echo ' 	
													<a class="swiper-slide slider__wrapper-license active" href="'.$image.'" data-fancybox="gallery_review" data-caption="Single image">
													  <img src="'.$image.'" />
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
			
			
			

				if(get_row_layout() == 'section_news'):
					$title = get_sub_field('title');
					$link = get_sub_field('link');
					echo '
					<section class="pageCase__our-services pageCase__smi">
						<div class="dFlex case__contecst-text">
							<h1 class="m-0">'.$title.'</h1>
							<a class="m-0 case__contecst-link" href="'.$link.'">Все статьи</a>
						</div>
						<div class="pageCase__smi-block">';
								// проверяем есть ли данные в повторителе
								if( have_rows('cards') ):
									// перебираем строки повторителя
									while ( have_rows('cards') ) : the_row();
										$image = get_sub_field('image');
										$name = get_sub_field('name');
										$link = get_sub_field('link');
										$flag_case = get_sub_field('flag_case');
										echo ' 												
										<a href="'.$link.'" class="case__contecst-box pageCase__smi-box">
											<img class="case__contecst-box__image" src="'.$image.'" alt="Подробнее">
											<p class="case__contecst-box__text m-0">'.$flag_case.'</p>
											<h2 class="case__contecst-box__title m-0">
												'.$name.'
											</h2>
											<p class="case__contecst-box__btn m-0">Подробнее
												<img class="case__contecst-box__arrow" src="'.get_template_directory_uri().'/new-site/assets/images/arrow-order.svg" alt="Подробнее">
											</p>
										</a>
										';
									endwhile;
								endif;
							echo '
						</div>
					</section>				
					';
				endif;
			
			
			 	if(get_row_layout() == 'section_sertifivate'):
					$title = get_sub_field('title');
					$desc = get_sub_field('desc');
					echo '						
					<section class="pageCase pageCase__our-review">
						<div class="container">
							<div class="dFlex pageCase__our-sertificats">
								<div class="pageCase__internet-marketing__block-text dFlex">
									<h2 class="pageCase__internet-marketing__block-subtitle">'.$title.'</h2>
									<div class="pageCase__internet-marketing__block-paragraph">'.$desc.'</div>
									<div
										class="swiper-container slider__wrapper-sertificats__container slider__wrapper-sertificats__container-mobile">
										<div class="swiper-wrapper slider__wrapper-sertificats dFlex">
											';
												// проверяем есть ли данные в повторителе
												if( have_rows('list') ):
													// перебираем строки повторителя
													while ( have_rows('list') ) : the_row();
														$image = get_sub_field('image');
														echo ' 	
														<a class="swiper-slide slider-sertificats radius_1 active" href="'.$image.'" data-fancybox="gallery_sertificate" data-caption="Single image">
														  <img src="'.$image.'" />
														</a>
														';
													endwhile;
												endif;
											echo '
										</div>
									</div>
									<div class="swiperWrapOurSertificats__btn dFlex">
										<button type="button" class="btn-slider btn-prev__sertificats"></button>
										<button type="button" class="btn-slider btn-next__sertificats"></button>
									</div>
								</div>
								<div class="swiper-container slider__wrapper-sertificats__container">
									<div class="swiper-wrapper slider__wrapper-sertificats dFlex">
									';
												// проверяем есть ли данные в повторителе
												if( have_rows('list') ):
													// перебираем строки повторителя
													while ( have_rows('list') ) : the_row();
														$image = get_sub_field('image');
														echo ' 	
															
															<a class="swiper-slide slider-sertificats radius_1 active" href="'.$image.'" data-fancybox="gallery_sertificate" data-caption="Single image">
															  <img src="'.$image.'" />
															</a>
														';
													endwhile;
												endif;
										echo '	
									</div>
								</div>
							</div>
						</div>
					</section>';
				endif;
			
			
			
			
				if(get_row_layout() == 'section_team'):
					$title = get_sub_field('title');
					$conter = get_sub_field('conter');
					echo '		
					<section class="pageCase pageCase__comands-experts">
						<div class="pageCase__comands dFlex">
							<div class="pageCase__comands-container dFlex">
								<div class="pageCase__comands-container__text dFlex">
									<h1 class="m-0">'.$title.'</h1>
									<p class="m-0">'.$conter.'</p>
								</div>
								<div class="swiper-container slider__wrapper-comands__container mobile-block__slider">
									<div class="swiper-wrapper slider__wrapper-comand dFlex">
										';
												// проверяем есть ли данные в повторителе
												if( have_rows('cards') ):
													// перебираем строки повторителя
													while ( have_rows('cards') ) : the_row();
														$image = get_sub_field('image');
														$name = get_sub_field('name');
														$position = get_sub_field('position');
														echo ' 															
														<div class="swiper-slide pageCase__internet-marketing__box-block__comands-block active">
															<div class="pageCase__internet-marketing__box-block__comands-block__image">
																<img src="'.$image.'" alt="Марктеолог">
															</div>
															<div class="pageCase__internet-marketing__box-block__comands-block__texts">
																<p class="pageCase__internet-marketing__box-block__comands-block__text-name">
																	'.$name.'
																</p>
																<p class="pageCase__internet-marketing__box-block__comands-block__text-prof">
																	'.$position.'
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
												if( have_rows('cards') ):
													// перебираем строки повторителя
													while ( have_rows('cards') ) : the_row();
														$image = get_sub_field('image');
														$name = get_sub_field('name');
														$position = get_sub_field('position');
														echo ' 															
														<div class="swiper-slide pageCase__internet-marketing__box-block__comands-block active">
															<div class="pageCase__internet-marketing__box-block__comands-block__image">
																<img src="'.$image.'" alt="Марктеолог">
															</div>
															<div class="pageCase__internet-marketing__box-block__comands-block__texts">
																<p class="pageCase__internet-marketing__box-block__comands-block__text-name">
																	'.$name.'
																</p>
																<p class="pageCase__internet-marketing__box-block__comands-block__text-prof">
																	'.$position.'
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
			
			
				if(get_row_layout() == 'section_faq'):
					$title = get_sub_field('title');
					echo '							
					<section class="pageCase pageCase__questien">
						<div class="container">
							<h2 class="m-0 pageCase__questien-title">'.$title.'</h2>
							<div class="pageCase__questien-selects">
										';
												// проверяем есть ли данные в повторителе
												if( have_rows('faqs') ):
													// перебираем строки повторителя
													while ( have_rows('faqs') ) : the_row();
														$qas = get_sub_field('qas');
														$ans = get_sub_field('ans');
														echo ' 	
														<div class="pageCase__questien-select__block">
															<div class="pageCase__questien-select" data-select="select1">
																<p class="m-0">'.$qas.'</p><svg width="8" height="14" viewBox="0 0 8 14" fill="none"
																	xmlns="http://www.w3.org/2000/svg">
																	<path d="M7 13L1 7L7 1" stroke="#2D2C2C" stroke-width="2" stroke-linecap="round"
																		stroke-linejoin="round" />
																</svg>
															</div>
															<div class="pageCase__questien-select__content" id="select1">
																<p class="m-0">'.$ans.'</p>
															</div>
														</div>
														';
													endwhile;
												endif;
			                            echo '
								
							</div>
						</div>
					</section>';
				endif;
			
			
			
				
			if(get_row_layout() == 'section_all_services'):
					$title = get_sub_field('title');
					echo '
					<div class="container">
					<h1 class="titlePage header__title">'.$title.'</h1>					
					<section class="aboutCase radius_1 greyBg pad60">
							';
								// проверяем есть ли данные в повторителе
								if( have_rows('list_services') ):
									// перебираем строки повторителя
									while ( have_rows('list_services') ) : the_row();
										$title = get_sub_field('title');
										$link = get_sub_field('link_on_section');
										echo ' 	
										<div class="aboutCase__block">
											<h2 class="aboutCase__subtitle">';

											if($link){
												echo '<a href="'.$link.'">'.$title.'</a>';
											} else {
												echo '<span class="empty_link" >'.$title.'</span>';
											}
										echo '
											</h2>
											<div class="aboutCase__block-texts">
												<ul class="aboutCase__block-lists">
													';
														// проверяем есть ли данные в повторителе
														if( have_rows('list_page') ):
															// перебираем строки повторителя
															while ( have_rows('list_page') ) : the_row();
																$title = get_sub_field('title_page');
																$link = get_sub_field('link_on_page');
																echo ' 	
																	<li class="aboutCase__block-list">
																		<a href="'.$link.'" class="aboutCase__block-link">'.$title.'</a>
																	</li>
																';
															endwhile;
														endif;
													echo '
												</ul>
											</div>
										</div>
										';
									endwhile;
								endif;
							echo '
					</section>
					</div>
					';
				endif;



            endwhile; 

        endif;

        ?>

					</div>
				</div>
			</section>
		</main>

		<?php get_footer(); ?>
