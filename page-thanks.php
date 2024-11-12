<?php

/*
Template Name: Спасибо
Template Post Type: post, page, product
*/


?>
<?php get_template_part('templates/head'); ?>
<script>
    
    window.onload = function(){
        //function getCookie(name) {
        //    let matches = document.cookie.match(new RegExp(
        //        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
        //    ));
        //    return matches ? decodeURIComponent(matches[1]) : undefined;
        //}
        //function addUrl () {
        //    let url = window.location.href;    
        //    if (url.indexOf('?') > -1){
        //    url += '?'+getCookie('userUtm')
        //    } else {
        //    url += '?'+getCookie('userUtm')
        //    }
        //    window.location.href = url;
        //}
        //addUrl();
        //console.log(getCookie('userUtm'));

    }
    
    var clientid = yaCounter99999.getClientID();
    console.log(clientid);
    
</script>
<body>
    <div class="pageWrapper">
        
        <?php get_template_part('templates/top-panel'); ?>
        <header class="header portfolio__header subscribe__header">
			<div class="container">
				<div class="subscribe__header-block dFlex">
					<img class="subscribe__header-block__avatar" src="<?php echo get_template_directory_uri() ?>/new-site/assets/images/avatar.png" alt="Аватар">
					<div class="subscribe__header-block__callout">
						<img class="subscribe__header-block__callout-image" src="<?php echo get_template_directory_uri() ?>/new-site/assets/images/callout.svg" alt="Ответ">
						<p class="subscribe__header-block__callout-text">Спасибо за вашу заявку! Мы получили ваш запрос
							и свяжемся с вами в ближайшее время</p>
					</div>
				</div>
			</div>
		</header>
        <main class="main pageThanks">
			<section class="subscribe">
				<div class="subscribe__container radius_1">
					<div class="subscribe__container-block">
						<h3 class="m-0">Подпишитесь<br> на наши каналы</h3>
						<p class="m-0 portfolio__main-section__block-subtitle__text">Рассказываем про нашу практику и
							процессы в работе с продвижением в сложных нишах.
						</p>
						<div class="subscribe__container-btns dFlex">
							<a target="_blank" href="https://www.youtube.com/@Mamontovtop" class="btn btn__order radius_1">
								<svg width="20" height="14" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M10.4245 13.4287L6.4905 13.3569C5.21676 13.3318 3.93985 13.3818 2.69108 13.1225C0.791421 12.735 0.656842 10.8352 0.51602 9.24167C0.321981 7.00132 0.397099 4.72031 0.763275 2.49867C0.969994 1.25209 1.78352 0.50825 3.0416 0.427306C7.28856 0.133548 11.5638 0.168362 15.8013 0.30541C16.2488 0.317974 16.6995 0.386642 17.1407 0.464805C19.3191 0.846028 19.3722 2.99891 19.5134 4.81123C19.6542 6.64225 19.5948 8.48268 19.3256 10.3012C19.1097 11.8069 18.6965 13.0696 16.953 13.1915C14.7684 13.3509 12.6339 13.4792 10.4432 13.4384C10.4433 13.4287 10.4307 13.4287 10.4245 13.4287ZM8.11169 9.61666C9.75795 8.67295 11.3728 7.74497 13.0096 6.80759C11.3603 5.86389 9.74853 4.93591 8.11169 3.99853V9.61666Z" fill="white"></path>
								</svg>
								Подписаться
							</a>
							<a target="_blank" href="https://t.me/mamontovtop" class="btn btn__order radius_1 btn-subscribe_color-blue">
								Подписаться
								<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M34.956 5.84984L5.81703 16.9199C3.81986 17.6892 3.85512 18.7786 5.47451 19.2848L12.9343 21.5778L30.2388 10.8427C31.0422 10.3166 31.7877 10.6144 31.1782 11.1429L17.1754 23.6077L16.639 31.1838C17.4197 31.1838 17.7597 30.8488 18.1627 30.4517L21.8069 26.9925L29.3624 32.4791C30.74 33.2484 31.7247 32.8514 32.0924 31.2185L37.0539 8.18744L37.0513 8.18992C37.4896 6.17492 36.3084 5.36843 34.956 5.84984Z" fill="white"></path>
								</svg>
							</a>
						</div>
					</div>
					<img class="portfolio__main-section__image" src="<?php echo get_template_directory_uri() ?>/new-site/assets/images/subscribe.png" alt="Подпишитесь на наши каналы">
				</div>
			</section>
			<div class="container">
				<!--<section class="portfolio__main-section case subscribe-section">
					<h1 class="m-0">Портфолио кейсов</h1>
					<div class="case__tabs">
                        
						<div class="case__tabs-btns dFlex">
                            
							<button type="button" class="case__btn-tab radius_1 active" data-tab="tab0">Все</button>
                                <?php 
                               // $categories = get_categories(array(
                               //     'orderby' => 'name',
                               //     'order' => 'ASC'
                               // ));
                               // foreach( $categories as $key => $category ){
                               //     if($key == 0) {
                               //         $key++;
                               //     }
                               //     echo '<button type="button" class="case__btn-tab radius_1" data-tab="tab' .$key. '">' . $category->name . '</button>';
                               // }
                                
                                ?>

						</div>
						<div class="case__tabs-contents">
							<div class="case__tabs-content active" id="tab0">

                            
                            <?
                             //   // параметры по умолчанию
                             //   $my_posts = get_posts( array(
                             //       'numberposts' => 50,
                             //       'category'    => 0,
                             //       'orderby'     => 'date',
                             //       'order'       => 'DESC',
                             //       'include'     => array(),
                             //       'exclude'     => array(),
                             //       'meta_key'    => '',
                             //       'meta_value'  =>'',
                             //       'post_type'   => 'post',
                             //       'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                             //   ) );
//
                             //   global $post;
//
                             //   foreach( $my_posts as $post ){
                             //       echo '
                             //       <article class="case__tabs-content__article radius_1 dFlex">
                             //           '.get_the_post_thumbnail( $post->id).'
                             //           <p class="case__tabs-content__text">Кейс</p>
                             //           <h4 class="case__tabs-content__subtitle">'.$post->post_title.'</h4>
                             //           <p class="case__tabs-content__paragraph">'.$post->post_content.'</p>
                             //           <div class="case__tabs-content__article-btn__block">
                             //               <a href="'.$post->guid.'" class="btn btn__order radius_1">Подробнее
                             //                   <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                             //                       <path d="M1 11L11.5 0.5M11.5 0.5H4M11.5 0.5V8" stroke="white" stroke-linecap="round" stroke-linejoin="round">
                             //                       </path>
                             //                   </svg>
                             //               </a>
                             //           </div>
                             //       </article>
                             //       ';
                             //       
                             //       // формат вывода the_title() ...
                             //   }
//
                             //   wp_reset_postdata(); // сброс
                                ?>

								<article class="case__tabs-content__article radius_1 dFlex">
									<img class="case__tabs-content__image radius_1" src="<?php echo get_template_directory_uri() ?>/new-site/assets/images/portfolio__case-1.png" alt="Контекстная реклама для производителя металлоконструкций">
									<p class="case__tabs-content__text">Кейс</p>
									<h4 class="case__tabs-content__subtitle">Контекстная реклама для производителя
										металлоконструкций</h4>
									<p class="case__tabs-content__paragraph">Получать качественные лиды в нише
										премиум авто Москва после отключение основой рекламной площадки</p>
									<div class="case__tabs-content__article-btn__block">
										<a href="#" class="btn btn__order radius_1">Подробнее
											<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M1 11L11.5 0.5M11.5 0.5H4M11.5 0.5V8" stroke="white" stroke-linecap="round" stroke-linejoin="round">
												</path>
											</svg>
										</a>
									</div>
								</article>
								<article class="case__tabs-content__article radius_1 dFlex">
									<img class="case__tabs-content__image radius_1" src="<?php echo get_template_directory_uri() ?>/new-site/assets/images/portfolio__case-2.png" alt="Контекстная реклама для производителя металлоконструкций">
									<p class="case__tabs-content__text">Кейс</p>
									<h4 class="case__tabs-content__subtitle">Контекстная реклама для производителя
										металлоконструкций</h4>
									<p class="case__tabs-content__paragraph">Получать качественные лиды в нише
										премиум авто Москва после отключение основой рекламной площадки</p>
									<div class="case__tabs-content__article-btn__block">
										<a href="#" class="btn btn__order radius_1">Подробнее
											<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M1 11L11.5 0.5M11.5 0.5H4M11.5 0.5V8" stroke="white" stroke-linecap="round" stroke-linejoin="round">
												</path>
											</svg>
										</a>
									</div>
								</article>
								<article class="case__tabs-content__article radius_1 dFlex">
									<img class="case__tabs-content__image radius_1" src="<?php echo get_template_directory_uri() ?>/new-site/assets/images/portfolio__case-3.png" alt="Контекстная реклама для производителя металлоконструкций">
									<p class="case__tabs-content__text">Кейс</p>
									<h4 class="case__tabs-content__subtitle">Контекстная реклама для производителя
										металлоконструкций</h4>
									<p class="case__tabs-content__paragraph">Получать качественные лиды в нише
										премиум авто Москва после отключение основой рекламной площадки</p>
									<div class="case__tabs-content__article-btn__block">
										<a href="#" class="btn btn__order radius_1">Подробнее
											<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M1 11L11.5 0.5M11.5 0.5H4M11.5 0.5V8" stroke="white" stroke-linecap="round" stroke-linejoin="round">
												</path>
											</svg>
										</a>
									</div>
								</article>
								<article class="case__tabs-content__article radius_1 dFlex">
									<img class="case__tabs-content__image radius_1" src="<?php echo get_template_directory_uri() ?>/new-site/assets/images/portfolio__case-4.png" alt="Контекстная реклама для производителя металлоконструкций">
									<p class="case__tabs-content__text">Кейс</p>
									<h4 class="case__tabs-content__subtitle">Контекстная реклама для производителя
										металлоконструкций</h4>
									<p class="case__tabs-content__paragraph">Получать качественные лиды в нише
										премиум авто Москва после отключение основой рекламной площадки</p>
									<div class="case__tabs-content__article-btn__block">
										<a href="#" class="btn btn__order radius_1">Подробнее
											<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M1 11L11.5 0.5M11.5 0.5H4M11.5 0.5V8" stroke="white" stroke-linecap="round" stroke-linejoin="round">
												</path>
											</svg>
										</a>
									</div>
								</article>
								<article class="case__tabs-content__article radius_1 dFlex">
									<img class="case__tabs-content__image radius_1" src="<?php echo get_template_directory_uri() ?>/new-site/assets/images/portfolio__case-5.png" alt="Контекстная реклама для производителя металлоконструкций">
									<p class="case__tabs-content__text">Кейс</p>
									<h4 class="case__tabs-content__subtitle">Контекстная реклама для производителя
										металлоконструкций</h4>
									<p class="case__tabs-content__paragraph">Получать качественные лиды в нише
										премиум авто Москва после отключение основой рекламной площадки</p>
									<div class="case__tabs-content__article-btn__block">
										<a href="#" class="btn btn__order radius_1">Подробнее
											<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M1 11L11.5 0.5M11.5 0.5H4M11.5 0.5V8" stroke="white" stroke-linecap="round" stroke-linejoin="round">
												</path>
											</svg>
										</a>
									</div>
								</article>
								<article class="case__tabs-content__article radius_1 dFlex">
									<img class="case__tabs-content__image radius_1" src="<?php echo get_template_directory_uri() ?>/new-site/assets/images/portfolio__case-6.png" alt="Контекстная реклама для производителя металлоконструкций">
									<p class="case__tabs-content__text">Кейс</p>
									<h4 class="case__tabs-content__subtitle">Контекстная реклама для производителя
										металлоконструкций</h4>
									<p class="case__tabs-content__paragraph">Получать качественные лиды в нише
										премиум авто Москва после отключение основой рекламной площадки</p>
									<div class="case__tabs-content__article-btn__block">
										<a href="#" class="btn btn__order radius_1">Подробнее
											<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M1 11L11.5 0.5M11.5 0.5H4M11.5 0.5V8" stroke="white" stroke-linecap="round" stroke-linejoin="round">
												</path>
											</svg>
										</a>
									</div>
								</article>
								<article class="case__tabs-content__article radius_1 dFlex">
									<img class="case__tabs-content__image radius_1" src="<?php echo get_template_directory_uri() ?>/new-site/assets/images/portfolio__case-7.png" alt="Контекстная реклама для производителя металлоконструкций">
									<p class="case__tabs-content__text">Кейс</p>
									<h4 class="case__tabs-content__subtitle">Контекстная реклама для производителя
										металлоконструкций</h4>
									<p class="case__tabs-content__paragraph">Получать качественные лиды в нише
										премиум авто Москва после отключение основой рекламной площадки</p>
									<div class="case__tabs-content__article-btn__block">
										<a href="#" class="btn btn__order radius_1">Подробнее
											<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M1 11L11.5 0.5M11.5 0.5H4M11.5 0.5V8" stroke="white" stroke-linecap="round" stroke-linejoin="round">
												</path>
											</svg>
										</a>
									</div>
								</article>
							</div>
							<div class="case__tabs-content" id="tab1">2</div>
							<div class="case__tabs-content" id="tab2">3</div>
							<div class="case__tabs-content" id="tab3">4</div>
							<div class="case__tabs-content" id="tab4">5</div>
						</div>
						<a href="#" class="btn btn_1">Показать еще кейсы</a>
					</div>
				</section>-->
			</div>
			<section class="pageCase__our-services pageCase__smi subscribe__smi">
				<div class="dFlex case__contecst-text">
					<h1 class="m-0">Мы в <span>СМИ</span></h1>
					<!--<a class="m-0 case__contecst-link" href="#">Все статьи</a>-->
				</div>
				<div class="pageCase__smi-block">
					<a href="https://kdelu.vtb.ru/courses/announcement/samozanyatost-kak-nayti-klientov-na-svoi-uslugi/" class="case__contecst-box pageCase__smi-box">
						<div>
							<p class="case__contecst-box__text m-0"><span>Курс</span> • Источник: втб</p>
							<h2 class="case__contecst-box__title m-0">
								Как найти клиентов на свои услуги
							</h2>
							<p class="case__contecst-box__btn m-0">Подробнее
								<img class="case__contecst-box__arrow" src="<?php echo get_template_directory_uri() ?>/new-site/assets/images/arrow-order.svg" alt="Подробнее">
							</p>
						</div>
						<img class="subscribe__smi-image" src="<?php echo get_template_directory_uri() ?>/new-site/assets/images/thank-one.png" alt="Как найти клиентов на свои услуги">
					</a>
					<a href="https://ruward.ru/award/2023/27301/" class="case__contecst-box pageCase__smi-box">
						<div>
							<p class="case__contecst-box__text m-0"><span>Контекстная реклама</span> • Источник:
								Ruward</p>
							<h2 class="case__contecst-box__title m-0">
								Кейс года
							</h2>
							<p class="case__contecst-box__btn m-0">Подробнее
								<img class="case__contecst-box__arrow" src="<?php echo get_template_directory_uri() ?>/new-site/assets/images/arrow-order.svg" alt="Подробнее">
							</p>
						</div>
						<img class="subscribe__smi-image" src="<?php echo get_template_directory_uri() ?>/new-site/assets/images/thank-two.png" alt="Кейс года">
					</a>
					<a href="https://adpass.ru/kak-94-reklamodatelej-oshibayutsya-pri-nastrojke-kontekstnoj-reklamy/" class="case__contecst-box pageCase__smi-box">
						<div>
							<p class="case__contecst-box__text m-0"><span>Статья</span> • Источник: Adpass</p>
							<h2 class="case__contecst-box__title m-0">
								Статусная аналитика - инструмент повышения эффективности рекламных кампаний
							</h2>
							<p class="case__contecst-box__btn m-0">Подробнее
								<img class="case__contecst-box__arrow" src="<?php echo get_template_directory_uri() ?>/new-site/assets/images/arrow-order.svg" alt="Подробнее">
							</p>
						</div>
						<img class="subscribe__smi-image" src="<?php echo get_template_directory_uri() ?>/new-site/assets/images/thank-three.png" alt="Статусная аналитика - инструмент повышения эффективности рекламных кампаний">
					</a>
					<a href="https://spark.ru/user/174728/blog/200713/statusnaya-analitika-instrument-povisheniya-effektivnosti-reklamnih-kampanij" class="case__contecst-box pageCase__smi-box">
						<div>
							<p class="case__contecst-box__text m-0"><span>Статья</span> • Источник: Spark</p>
							<h2 class="case__contecst-box__title m-0">
								Как 94% рекламодателей ошибаются при настройке контекстной рекламы
							</h2>
							<p class="case__contecst-box__btn m-0">Подробнее
								<img class="case__contecst-box__arrow" src="<?php echo get_template_directory_uri() ?>/new-site/assets/images/arrow-order.svg" alt="Подробнее">
							</p>
						</div>
						<img class="subscribe__smi-image" src="<?php echo get_template_directory_uri() ?>/new-site/assets/images/thank-four.png" alt="Как 94% рекламодателей ошибаются при настройке контекстной рекламы">

					</a>
					<a href="https://www.cossa.ru/trends/327167/" class="case__contecst-box pageCase__smi-box">
						<div>
							<p class="case__contecst-box__text m-0"><span>Статья</span> • Источник: Сossa</p>
							<h2 class="case__contecst-box__title m-0">
								Опыт 1000 аудитов: как повысить эффективность любой рекламы
							</h2>
							<p class="case__contecst-box__btn m-0">Подробнее
								<img class="case__contecst-box__arrow" src="<?php echo get_template_directory_uri() ?>/new-site/assets/images/arrow-order.svg" alt="Подробнее">
							</p>
						</div>
						<img class="subscribe__smi-image" src="<?php echo get_template_directory_uri() ?>/new-site/assets/images/thank-five.png" alt="Опыт 1000 аудитов: как повысить эффективность любой рекламы">
					</a>
				</div>
			</section>
			<section class="pageCase__stydies-internet subscribe__stydies-internet">
				<div class="pageCase__our-clients pageCase__our-clients__main dFlex">
					<div class="pageCase__our-clients__block dFlex">
						<h1 class="m-0">
							Обучаем <br> интернет-маркетингу
						</h1>
						<a class="m-0 case__contecst-link" href="https://www.youtube.com/@Mamontovtop">Перейти на ютуб-канал</a>
					</div>
					<div class="pageCase__stydies-internet__block-videos">
						<a href="https://www.youtube.com/watch?v=4td5kJ3ZyH4" class="pageCase__stydies-internet__block-video">
							<video class="radius_1" src="#" poster="<?php echo get_template_directory_uri() ?>/new-site/assets/images/poster_1.png">
								<source src="#" type="video/mp4">
								<source src="#" type="video/ogg">
								<source src="#" type="video/webm">
							</video>
							<div class="play-button"></div>
						</a>
						<a href="https://www.youtube.com/watch?v=QnXzJ3Wdl_w" class="pageCase__stydies-internet__block-video">
							<video class="radius_1" src="#" poster="<?php echo get_template_directory_uri() ?>/new-site/assets/images/poster_2.png">
								<source src="#" type="video/mp4">
								<source src="#" type="video/ogg">
								<source src="#" type="video/webm">
							</video>
							<div class="play-button">
							</div>
						</a>
					</div>
					<div class="swiper-container pageCase__stydies-internet__block-videos__container-mobile swiper-initialized swiper-horizontal">
						<div class="swiper-wrapper pageCase__stydies-internet__block-videos" id="swiper-wrapper-9ad4bc7510808e17e" aria-live="polite" style="transition-duration: 0ms; transition-delay: 0ms;">
							<a href="https://www.youtube.com/watch?v=4td5kJ3ZyH4"  class="swiper-slide pageCase__stydies-internet__block-video" data-swiper-slide-index="0" role="group" aria-label="1 / 2">
								<video class="radius_1 video" src="#" poster="<?php echo get_template_directory_uri() ?>/new-site/assets/images/poster_1.png">
									<source src="#" type="video/mp4">
									<source src="#" type="video/ogg">
									<source src="#" type="video/webm">
								</video>
								<div class="play-button"></div>
							</a>
							<a href="https://www.youtube.com/watch?v=QnXzJ3Wdl_w" class="swiper-slide pageCase__stydies-internet__block-video" data-swiper-slide-index="1" role="group" aria-label="2 / 2">
								<video class="radius_1 video" src="#" poster="<?php echo get_template_directory_uri() ?>/new-site/assets/images/poster_2.png">
									<source src="#" type="video/mp4">
									<source src="#" type="video/ogg">
									<source src="#" type="video/webm">
								</video>
								<div class="play-button">
								</div>
							</a>
						</div>
						<div class="swiperWrapStydies__btns dFlex">
							<button type="button" class="btn-slider btn-slider__clients btn-prev__stydies" tabindex="0" aria-label="Previous slide" aria-controls="swiper-wrapper-9ad4bc7510808e17e"></button>
							<button type="button" class="btn-slider btn-slider__clients btn-next__stydies" tabindex="0" aria-label="Next slide" aria-controls="swiper-wrapper-9ad4bc7510808e17e"></button>
						</div>
					<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
				</div>
			</section>
		</main>

        <?php get_template_part('templates/footer-main'); ?>
    </div>
    <script
        src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <!--Slick Slider-->
    <script src="<?php echo get_template_directory_uri() ?>/new-site/assets/lib/slick/slick.min.js"></script>
    <script src="<?php echo get_template_directory_uri() ?>/new-site/assets/lib/slick/slick.js"></script>

    <script src="<?php echo get_template_directory_uri() ?>/new-site/assets/js/script.js"></script>
</body>
</html>
