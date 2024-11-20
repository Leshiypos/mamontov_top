<?php

/*
Template Name: Запись
Template Post Type: post, page, product
*/


?>
<?php get_template_part('templates/head'); ?>

<body>
    <div class="pageWrapper">

        <?php get_template_part('templates/top-panel-main'); ?>
        <?php get_template_part('templates/header'); ?>
        <main class="pageCase single_post">
            <div class="container">
				
				<?php

					// проверяем есть ли данные в гибком содержании
					if( have_rows('page_cases') ):

						// перебираем макеты гибкого содержания
						while ( have_rows('page_cases') ) : the_row();
							// проверяем на нужный макет
							if( get_row_layout() == 'section_rating' ):

								// проверяем есть ли данные в повторителе
								if( have_rows('card_case') ):
									echo '
										<section class="statisticsSlider swiper">
                    						<div class="swiper-wrapper">
									';
									// перебираем строки повторителя
									while ( have_rows('card_case') ) : the_row();

										$name = get_sub_field('name');
										$procB = get_sub_field('before_proc');
										$procA = get_sub_field('after_proc');
										$howMuch = get_sub_field('how_much');
										$before = get_sub_field('before');
										$after = get_sub_field('after');

										echo '

											<div class="swiper-slide radius_1 greyBg pad40">
												<div class="statisticsSlider_title">'.$name.'</div>
												<div class="statistics_charts">
													<div class="chars">
														<div class="line">
															<div class="statistics_before" style="width: '.$procB.'%;"></div>
														</div>
														<div class="line">
															<div class="statistics_after" style="width: '.$procA.'%;"></div>
														</div>
													</div>
													<div class="statistics_chartsData">'.$howMuch.'</div>
												</div>
												<div class="statistics_data before">
													<span>Было</span>
													'.$before.'
												</div>
												<div class="statistics_data after">                           
													<span> Стало</span>
													'.$after.'
												</div>
											</div>
										';

									endwhile;
									echo '
											</div>
											
												<div class="swiperButtons">
													<div class="swiperButtons-button-prev"><img src="'.get_template_directory_uri() .'/new-site/assets/img/slider-prev.svg" alt=""></div>
													<div class="swiperButtons-button-next"><img src="'.get_template_directory_uri() .'/new-site/assets/img/slider-next.svg" alt=""></div>
												</div>
										</section>
									';
								endif;

							endif;
				
				
				
				// проверяем на нужный макет
							if( get_row_layout() == 'section_services' ):
								$section_services_services = get_sub_field('services');
								$section_services_nisha = get_sub_field('nisha');
								$section_services_instrument = get_sub_field('instrument');
								$section_services_money = get_sub_field('money');
								?>
									<section class="statisticsTotal radius_1 blackBg pad60">
										<? if($section_services_services): ?>
										<div class="statisticsTotal_card">
											<span class="name">услуга</span>
											<span class="about"><?= $section_services_services;?></span>
										</div>
										<? endif; ?>
										<? if($section_services_nisha): ?>
										<div class="statisticsTotal_card">
											<span class="name">ниша</span>
											<span class="about"><?= $section_services_nisha;?></span>
										</div>
										<? endif; ?>
										<? if($section_services_instrument): ?>
										<div class="statisticsTotal_card">
											<span class="name">инструмент</span>
											<span class="about"><?= $section_services_instrument;?></span>
										</div>
										<? endif; ?>
										<? if($section_services_money): ?>
										<div class="statisticsTotal_card">
											<span class="name">бюджет / мес</span>
											<span class="about"><?= $section_services_money;?></span>
										</div>
										<? endif; ?>
									</section>
            			 	<?
							endif;	
// проверяем на нужный макет
							if( get_row_layout() == 'section_contents' ):
								$section_content = get_sub_field('content');
								 echo '
								<section class="aboutCase radius_1 greyBg pad_flex_100">
									'.$section_content.'
								</section>
								 ';
					
							endif;
// проверили макет  
				
// проверяем на нужный макет
                        if( get_row_layout() == 'section_what_work' ):
                            $section_content = get_sub_field('content');
            			 	echo '
            	    		<section class="aboutCase radius_1 greyBg pad40">
								'.$section_content.'
							</section>
            			 	';
                
                        endif;
// проверили макет  				
// проверяем на нужный макет
                        if( get_row_layout() == 'section_author' ):
                            $section_author_name = get_sub_field('name');
                            $section_author_position = get_sub_field('position');
                            $section_author_photo = get_sub_field('photo');
            			 	echo '
            	    		 	<section class="aboutCaseHeader radius_1 blackBg pad60">
									<h3 class="title">Автор кейса</h3>
									<div class="author">
										<div class="icon"><img src="'.$section_author_photo.'" alt=""></div>
										<div class="authorDate">
											<span class="name">'.$section_author_name.'</span>
											<span class="position">'.$section_author_position.'</span>
										</div>
									</div>
								</section>
            			 	';
                
                        endif;
// проверили макет   
// 				
// проверяем на нужный макет
                        if( get_row_layout() == 'section_result' ):
                            $section_result_content = get_sub_field('content');
            			 	echo '
            	    		<section class="aboutCaseTotal radius_1 blackBg pad40">
								'.$section_result_content.'
							</section>
            			 	';
                
                        endif;
// проверили макет 

// проверяем на нужный макет
			if( get_row_layout() == 'section_process' ):
				$section_process_title = get_sub_field('card_process_title');
				echo '
				<section class="sectionCards">
					<h3 class="title">Процесс реализации </h3>
				';
				// проверяем есть ли данные в повторителе
				if( have_rows('card_process') ):
					echo '<div class="cardsWrap">';
				// перебираем строки повторителя
					while ( have_rows('card_process') ) : the_row();
						$title = get_sub_field('title');
						$text = get_sub_field('text');
						echo '
						<div class="cards">
							<div class="title">
							'.$title.'
							</div>
							<div class="text">
							'.$text.'
							</div>
						</div>
						';
					endwhile;
					echo '</div>';
				endif;
				echo '</section>';
			endif;



// проверяем на нужный макет

// проверяем на нужный макет
if( get_row_layout() == 'section_offer' ):
	$title = get_sub_field('title');
	$desc = get_sub_field('desc');
	$image = get_sub_field('image');
	$btn_name = get_sub_field('btn_name');
	echo '
	</div>
	</main>
	<section class="pageCase__check-list">
		<div class="pageCase__check-list__texts">
			<h3 class="m-0 pageCase__check-list__title">'.$title.'</h3>
			'.$desc.'
		</div>
		<div class="pageCase__check-list__image-block">
			<img class="pageCase__check-list__image" src="'.$image.'" alt="Чек-лист">
		</div>
		<div class="pageCase__check-list__link-block">
			<a class="pageCase__check-list__link" href="#">
				'.$btn_name.'
				<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M1 11L11.5 0.5M11.5 0.5H4M11.5 0.5V8" stroke="#2d2c2c" stroke-linecap="round"
						stroke-linejoin="round" />
				</svg>
			</a>
		</div>
	</section>
	<main class="pageCase">
		<div class="container">
	';
endif;

// проверяем на нужный макет

// проверяем на нужный макет
if( get_row_layout() == 'section_form_1' ):
	$title = get_sub_field('title');
	$desc = get_sub_field('desc');
	$image = get_sub_field('image');
	echo '

	<section class="portfolio__main-section case case__form-section radius_1" style="margin-top: 50px;">
		<div class="case__form-section__block">
			<h2 class="m-0">'.$title.'</h2>
			<p class="case__tabs-content__paragraph">'.$desc.'</p>
			'. do_shortcode('[contact-form-7 id="ab81165" title="Форма много заявок, мало продаж"]'). '
		</div>
		<img class="portfolio__main-section__image" src="'.$image.'" alt="Реклама">
		<img class="portfolio__main-section__image" src="'.$image.'" alt="Реклама">
	</section>
	';
endif;

// Секция Лучшие посты
get_template_part('templates/layout/popular-block-section'); 

// Отзывы клиентов 
get_template_part('templates/layout/сustomer_reviews');

						endwhile; 

					endif;

				?>
				
            </div>
        </main>
		<?php get_footer(); ?>
        