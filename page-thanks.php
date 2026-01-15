<?php

/*
Template Name: Спасибо
Template Post Type: post, page, product
*/


?>
<?php
global $wp_query;
$current_page_id = $wp_query->get_queried_object_id(); //id текущуй страницы
$parent_page_id = !empty(get_ancestors($current_page_id, 'page')[0]) ? get_ancestors($current_page_id, 'page')[0] :  $current_page_id; // Если имеет родителбску. страницу - получает ID родительской страницы, если нет родителя - получает ID текущей страницы

// определяем текущую страницу из значения параметра "page_nav"
$current_page = !empty($_GET['page_nav']) ? $_GET['page_nav'] : 1;

//Получение полей ACF
$cat = 49; // получаем ID текущей рубрики
$sub_cat = get_field('pop_cat'); //id рубрики популярные
$num_post = 10;

?>

<?php get_template_part('templates/head'); ?>
<script>
	window.onload = function() {
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
<?php
$category_children_term = get_terms(array(   	//Получаем термы таксономии Рубрики -> Кейсы
	'taxonomy' => 'category',
	'parent'  => 49,
	'hide_empty' => true
));

$solution_children_term = get_terms('solutions'); //Получаем термы таксономии Решение
?>

<body>
	<div class="pageWrapper">

		<?php get_template_part('templates/top-panel-main'); ?>

		<?php
		//MARK: Хедер страницы
		$header_page = get_field('heder_page');
		if (!empty($header_page)) {
			$img_url = $header_page['img_url'];
			$message_text = $header_page['message_text'];
		?>
			<header class="header portfolio__header subscribe__header">
				<div class="container">
					<div class="subscribe__header-block dFlex">
						<img class="subscribe__header-block__avatar" src="<?php echo $img_url; ?>" alt="Аватар">
						<div class="subscribe__header-block__callout">
							<img class="subscribe__header-block__callout-image" src="<?php echo get_template_directory_uri() ?>/new-site/assets/images/callout.svg" alt="Ответ">
							<p class="subscribe__header-block__callout-text"><?php echo $message_text; ?></p>
						</div>
					</div>
				</div>
			</header>
		<?php
		}

		?>
		<main class="main pageThanks">
			<!-- <section class="subscribe">
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
			</section> -->
			<!-- <div class="container"> -->
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
				</section> -->
			<!-- </div> -->


			<?php
			if (have_rows('page_thanks')) {
				while (have_rows('page_thanks')) {
					the_row();

					//MARK: Секция Подпишитесь на канал
					if (get_row_layout() == "subscribe_channels") {
						$title = get_sub_field("title");
						$description = get_sub_field("description");
						$link_youtube = get_sub_field("link_youtube");
						$link_telegram = get_sub_field("link_telegram");

			?>
						<section class="subscribe">
							<div class="subscribe__container radius_1">
								<div class="subscribe__container-block">
									<h3 class="m-0"><?php echo $title; ?></h3>
									<p class="m-0 portfolio__main-section__block-subtitle__text"><?php echo $description; ?>
									</p>
									<div class="subscribe__container-btns dFlex">
										<a target="_blank" href="<?php echo $link_youtube; ?>" class="btn btn__order radius_1">
											<svg width="20" height="14" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M10.4245 13.4287L6.4905 13.3569C5.21676 13.3318 3.93985 13.3818 2.69108 13.1225C0.791421 12.735 0.656842 10.8352 0.51602 9.24167C0.321981 7.00132 0.397099 4.72031 0.763275 2.49867C0.969994 1.25209 1.78352 0.50825 3.0416 0.427306C7.28856 0.133548 11.5638 0.168362 15.8013 0.30541C16.2488 0.317974 16.6995 0.386642 17.1407 0.464805C19.3191 0.846028 19.3722 2.99891 19.5134 4.81123C19.6542 6.64225 19.5948 8.48268 19.3256 10.3012C19.1097 11.8069 18.6965 13.0696 16.953 13.1915C14.7684 13.3509 12.6339 13.4792 10.4432 13.4384C10.4433 13.4287 10.4307 13.4287 10.4245 13.4287ZM8.11169 9.61666C9.75795 8.67295 11.3728 7.74497 13.0096 6.80759C11.3603 5.86389 9.74853 4.93591 8.11169 3.99853V9.61666Z" fill="white"></path>
											</svg>
											Подписаться
										</a>
										<a target="_blank" href="<?php echo $link_telegram; ?>" class="btn btn__order radius_1 btn-subscribe_color-blue">
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
					<?php
					}





					//MARK: Секция Портфолио кейсов
					if (get_row_layout() == "portfolio_cases") {
					?>
						<main class="pageCase portfolio__main marketing__main lots_of_cases">
							<div class="portfolio__main-container">
								<div class="container">
									<section class="portfolio__main-section case marketing">
										<?php
										if ($title_2) {
											echo '<h1>' . $title_2 . '</h1>';
										}
										?>
										<h1>Портфолио кейсов</h1>
										<!-- <h1></h1> -->
										<div class="case__tabs marketing__tabs">
											<div class="filters_tab">
												<div class="category_tab">
													<h4 class="fs_24_12">Инструменты</h4>
													<div data-filter-type="category_tab">
														<?php
														foreach ($category_children_term as $term) {
														?>
															<a href="#" class="button_filt fs_20_10" data-id-term="<?php echo $term->term_id; ?> "> <?php echo  $term->name; ?></a>
														<?php
														}
														?>
													</div>

												</div>
												<div class="solution_tab">
													<h4 class="fs_24_12">Решения</h4>
													<div data-filter-type="solution_tab">
														<?php
														foreach ($solution_children_term as $term) {
														?>
															<a href="#" class="button_filt fs_20_10" data-id-term="<?php echo $term->term_id; ?> "> <?php echo  $term->name; ?></a>
														<?php
														}
														?>
													</div>
												</div>

											</div>

											<div class="case__tabs-contents">
												<div id="article_wrap" class="case__tabs-content blog marketing__content active">

													<?php
													$posts_main = new WP_Query(array(
														'tax_query' => [
															'relation' => 'AND',
															[
																'taxonomy' => 'category',
																'field'		=> 'term_id',
																'terms'		=> $cat
															],
														],
														'posts_per_page' => $num_post,
														'paged' => $current_page,
													));
													// текущая страница
													$paged = get_query_var('paged') ? get_query_var('paged') : 1;
													// максимум страниц
													$max_pages = $posts_main->max_num_pages;
													// print_r($posts_main -> max_num_pages); //Количесвто постов
													// print_r($posts_main->query['paged']); //Количесвто постов

													while ($posts_main->have_posts()) : $posts_main->the_post();

														$card = get_field('card');
													?>
														<!-- MARK: //Скрипт для бесонечной подгрузки постов -->
														<script id="ajax-variable">
															// window.myajax.cat = <?php //echo $cat; 
																					?>;
															// window.myajax.maxPages = <?php //echo $max_pages; 
																						?>;
															// window.myajax.paged = <?php //echo $paged; 
																						?>;
															// window.myajax.num_post = <?php //echo $num_post; 
																						?>;
															// myajax.categoryId = false;
															// myajax.solutionId = false;
														</script>

														<article class="case__tabs-content__article radius_1 dFlex" style="background-color: <?php echo $card['color_card']; ?>">
															<a href="<?php the_permalink(); ?>">
																<?php if ($card['img_card']) { ?><img src="<?php echo $card['img_card']; ?>" class="background_card"><?php } ?>
																<div calss="dFlex">
																	<?php
																	$category_obj = get_the_category();
																	foreach ($category_obj as $obj) {
																		if (($obj->category_parent != 0) and ($obj->term_id != $sub_cat[0])) {
																			echo '<div class="category_title">' . $obj->cat_name . '</div>';
																		}
																	}
																	?>
																</div>
																<h4 class="case__tabs-content__subtitle"><?php the_title(); ?></h4>
															</a>
														</article>
													<?php
													endwhile;
													?>
												</div>
											</div>
										</div>
										<div id='preloader'>
											<div></div>
											<?php
											wp_reset_postdata();
											?>
										</div>
										<a href="/case-new/" class="btn btn_1 more_case">Показать еще кейсы</a>
									</section>

								</div>
							</div>
						</main>

					<?php
					}

					//MARK: Секция новости 
					if (get_row_layout() == 'section_news'):
						$title = get_sub_field('title');
						$link = get_sub_field('link');
						echo '
					<section class="pageCase__our-services pageCase__smi">
						<div class="dFlex case__contecst-text">
							<h1 class="m-0">' . $title . '</h1>
							<a class="m-0 case__contecst-link" href="' . $link . '">Все статьи</a>
						</div>
						<div class="pageCase__smi-block">';
						// проверяем есть ли данные в повторителе
						if (have_rows('cards')):
							// перебираем строки повторителя
							while (have_rows('cards')) : the_row();
								$image = get_sub_field('image');
								$name = get_sub_field('name');
								$link = get_sub_field('link');
								$flag_case = get_sub_field('flag_case');
								echo ' 												
										<a href="' . $link . '" class="case__contecst-box pageCase__smi-box">
											<img class="case__contecst-box__image" src="' . $image . '" alt="Подробнее">
											<p class="case__contecst-box__text m-0">' . $flag_case . '</p>
											<h2 class="case__contecst-box__title m-0">
												' . $name . '
											</h2>
											<p class="case__contecst-box__btn m-0">Подробнее
												<img class="case__contecst-box__arrow" src="' . get_template_directory_uri() . '/new-site/assets/images/arrow-order.svg" alt="Подробнее">
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

					// MARK: Cекции СИСТЕМНЫЙ С ВИДЕО
					if (get_row_layout() == 'section_video') {
						$title_sec = get_sub_field('title_video');
						$link_yuotube = get_sub_field('link_yuotube');
					?>
						<section class="pageCase__stydies-internet subscribe__stydies-internet">
							<div class="pageCase__our-clients pageCase__our-clients__main dFlex">
								<div class="pageCase__our-clients__block dFlex">
									<h1 class="m-0"><?php echo $title_sec; ?></h1>
									<a class="m-0 case__contecst-link" href="<?php echo $link_yuotube; ?>">Перейти в Дзен</a>
								</div>
								<?php
								if (have_rows('block_video')) {
								?>
									<div class="pageCase__stydies-internet__block-videos">

										<?php
										while (have_rows('block_video')) {
											the_row();
											$link_video = get_sub_field('link_video');
											$link_poster = get_sub_field('img_url');
										?>
											<a href="<?php echo $link_video; ?>" class="pageCase__stydies-internet__block-video">
												<video class="radius_1" src="#" poster="<?php echo $link_poster; ?>">
													<source src="#" type="video/mp4">
													<source src="#" type="video/ogg">
													<source src="#" type="video/webm">
												</video>
												<div class="play-button"></div>
											</a>
										<?php
										}
										?>
									</div>
								<?php
								}
								?>

								<?php
								if (have_rows('block_video')) {
								?>

									<div class="swiper-container pageCase__stydies-internet__block-videos__container-mobile">
										<div class="swiper-wrapper pageCase__stydies-internet__block-videos">

											<?php
											while (have_rows('block_video')) {
												the_row();
												$link_video = get_sub_field('link_video');
												$link_poster = get_sub_field('img_url');
											?>
												<a href="<?php echo $link_video; ?>" class="swiper-slide pageCase__stydies-internet__block-video" data-swiper-slide-index="0" role="group" aria-label="1 / 2">
													<video class="radius_1 video" src="#" poster="<?php echo $link_poster; ?>">
														<source src="#" type="video/mp4">
														<source src="#" type="video/ogg">
														<source src="#" type="video/webm">
													</video>
													<div class="play-button"></div>
												</a>
											<?php
											}
											?>
										</div>
										<div class="swiperWrapStydies__btns dFlex">
											<button type="button" class="btn-slider btn-slider__clients btn-prev__stydies" tabindex="0"
												aria-label="Previous slide" aria-controls="swiper-wrapper-813488630b285af1"></button>
											<button type="button" class="btn-slider btn-slider__clients btn-next__stydies" tabindex="0"
												aria-label="Next slide" aria-controls="swiper-wrapper-813488630b285af1"></button>
										</div>
									</div>
								<?php
								}
								?>
							</div>
						</section>
					<?php
					}

					//Конец секции СИСТЕМНЫЙ С ВИДЕО

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

					if (get_row_layout() == 'image_left'):
						$image = get_sub_field('image');
						$counter = get_sub_field('counter');
						$title = get_sub_field('title');
						$text = get_sub_field('text');
						echo '
                    <section class="pageCase pageCase__internet-marketing__section">
				        <div class="pageCase__internet-marketing">
                            <div class="pageCase__internet-marketing__box">
                                <div class="pageCase__internet-marketing__box-block dFlex">
                                    <img class="pageCase__internet-marketing__block-image" src="' . $image . '"
                                        alt="Стратегия">
                                    <div class="pageCase__internet-marketing__block-texts pad40">
                                        <div class="pageCase__internet-marketing__block-texts__text">
                                            <p class="pageCase__internet-marketing__block-number">' . $counter . '</p>
                                            <h3 class="pageCase__internet-marketing__block-text__subtitle">' . $title . '</h3>
                                        </div>
                                        ' . $text . '
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    ';
					endif;

					if (get_row_layout() == 'image_right'):
						$image = get_sub_field('image');
						$counter = get_sub_field('counter');
						$title = get_sub_field('title');
						$text = get_sub_field('text');
						echo '
                    <section class="pageCase pageCase__internet-marketing__section rightImage">
				        <div class="pageCase__internet-marketing">
                            <div class="pageCase__internet-marketing__box">
                                <div class="pageCase__internet-marketing__box-block dFlex right">
                                    <img class="pageCase__internet-marketing__block-image" src="' . $image . '"
                                        alt="Стратегия">
                                    <div class="pageCase__internet-marketing__block-texts pad40">
                                        <div class="pageCase__internet-marketing__block-texts__text">
                                            <p class="pageCase__internet-marketing__block-number">' . $counter . '</p>
                                            <h3 class="pageCase__internet-marketing__block-text__subtitle">' . $title . '</h3>
                                        </div>
                                        ' . $text . '
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    ';
					endif;


					if (get_row_layout() == 'image_person_left'):
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
						if (have_rows('person_cards')):
							// перебираем строки повторителя
							while (have_rows('person_cards')) : the_row();
								$image = get_sub_field('image');
								$name = get_sub_field('name');
								$position = get_sub_field('position');
								echo '
                                                            <div class="swiper-slide pageCase__internet-marketing__box-block__comands-block active">
                                                                <div
                                                                    class="pageCase__internet-marketing__box-block__comands-block__image">
                                                                    <img src="' . $image . '" alt="Марктеолог">
                                                                </div>
                                                                <div
                                                                    class="pageCase__internet-marketing__box-block__comands-block__texts">
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
                                            <p class="pageCase__internet-marketing__block-number">' . $counter . '</p>
                                            <h3 class="pageCase__internet-marketing__block-text__subtitle">' . $title . '</h3>
                                        </div>
                                        ' . $text . '
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    ';
					endif;


					if (get_row_layout() == 'patners_list'):
						echo '
                    <section class="pageCase pageCase__internet-marketing__section">
                        <div class="pageCase__internet-marketing__box ">
                            <div class="dFlex pageCase__internet-marketing__box-block__images pad40 radius_1">
                    ';
						// проверяем есть ли данные в повторителе
						if (have_rows('images')):
							// перебираем строки повторителя
							while (have_rows('images')) : the_row();
								$image = get_sub_field('image');
								echo ' 
                            <div class="pageCase__internet-marketing__box-block__image-container radius_1">
                                <img class="pageCase__internet-marketing__box-block__image" src="' . $image . '" alt="Проект">
                            </div> ';
							endwhile;
						endif;
						echo '
                            </div>
                        </div>
                    </section>
                    ';
					endif;


					if (get_row_layout() == 'image_list_sert'):
						echo '
                    <section class="pageCase pageCase__internet-marketing__section">
                        <div class="pageCase__internet-marketing__box ">
                            <div class="dFlex pageCase__internet-marketing__box-block__images pad40 radius_1">
                    ';
						// проверяем есть ли данные в повторителе
						if (have_rows('images')):
							// перебираем строки повторителя
							while (have_rows('images')) : the_row();
								$image = get_sub_field('image');
								echo ' 
                            <div class="pageCase__internet-marketing__box-block__image-container__comand radius_1">
                                <img class="pageCase__internet-marketing__box-block__image-comand radius_1" src="' . $image . '" alt="Проект">
                            </div> ';
							endwhile;
						endif;
						echo '
                            </div>
                        </div>
                    </section>
                    ';
					endif;



					if (get_row_layout() == 'section_price'):
						$title = get_sub_field('title');
						echo '
                    <section class="pageCase pageCase__price-services">
                        <div class="pageCase__price-services__container">
                            <div class="pageCase__price-services__container-block">
                                <h1 class="pageCase__price-services__title m-0">' . $title . '</h1>
                                <div class="swiper-container swiper__container-price__services swiper__container-price__services-mobile">
                                    <div class="swiper-wrapper pageCase__price-services__cards-slider dFlex">';
						// проверяем есть ли данные в повторителе
						if (have_rows('cards')):
							// перебираем строки повторителя
							while (have_rows('cards')) : the_row();
								$title = get_sub_field('title');
								$price = get_sub_field('price');
								$desc = get_sub_field('desc');
								$button_name = get_sub_field('button_name');
								echo ' 
                                                <div class="swiper-slide radius_1 pageCase__price-services__card pad40 dFlex">
                                                    <div class="dFlex pageCase__price-services__card-name">
                                                        <h4 class="pageCase__price-services__card-title">' . $title . '</h4>
                                                        <p class="pageCase__price-services__card-pargraph">Стоимость от</p>
                                                        <p class="pageCase__price-services__card-price">' . $price . '</p>
                                                    </div>
                                                    ' . $desc . '
                                                    <a data-fancybox href="#popupfancy" class="btn btn__order radius_1">' . $button_name . '
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

					if (get_row_layout() == 'our_service'):
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
					endif;

					if (get_row_layout() == 'section_process'):

						$title = get_sub_field('title');
						echo '		
					
					<section class="section_process">
						<div class="container">
							<h1 class="pageCase__our-service__title m-0">' . $title . '</h1>
							<div class="pageCase__our-services__block">';
						// проверяем есть ли данные в повторителе
						if (have_rows('process')):
							// перебираем строки повторителя
							while (have_rows('process')) : the_row();
								$title = get_sub_field('title');
								$desc = get_sub_field('desc');
								echo ' 
										<div class="dFlex pageCase__our-services__block-card radius_1">
											<h4 class="m-0 pageCase__our-services__card-title">' . $title . '</h4>
											<div class="m-0 pageCase__our-services__block-card__text">
											' . $desc . '
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

					if (get_row_layout() == 'section_process_four'):
						$title = get_sub_field('title');
						echo '	
					<section class="section_process_four">
						<div class="container">
							<h1 class="pageCase__our-service__title m-0">' . $title . '</h1>
							<div class="pageCase__our-services__block">';
						// проверяем есть ли данные в повторителе
						if (have_rows('process')):
							// перебираем строки повторителя
							while (have_rows('process')) : the_row();
								$title = get_sub_field('title');
								$desc = get_sub_field('desc');
								echo ' 
										<div class="dFlex pageCase__our-services__block-card radius_1">
											<h4 class="m-0 pageCase__our-services__card-title">' . $title . '</h4>
											<div class="m-0 pageCase__our-services__block-card__text">
											' . $desc . '
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


					if (get_row_layout() == 'section_case'):
						$title = get_sub_field('title');
						$link = get_sub_field('link');
						echo '					
					<section class="pageCase__our-services case__contecst">
						<div class="dFlex case__contecst-text">
							<h1 class="case__contecst-title m-0">' . $title . '</h1>
							<a class="m-0 case__contecst-link" href="' . $link . '">Все кейсы</a>
						</div>
						<div class="case__contecst-block">';
						// проверяем есть ли данные в повторителе
						if (have_rows('cards')):
							// перебираем строки повторителя
							while (have_rows('cards')) : the_row();
								$image = get_sub_field('image');
								$name = get_sub_field('name');
								$link = get_sub_field('link');
								$flag_case = get_sub_field('flag_case');
								echo ' 										
										<a href="' . $link . '" class="case__contecst-box">
											<img class="case__contecst-box__image" src="' . $image . '" alt="Подробнее">
											<p class="case__contecst-box__text m-0">' . $flag_case . '</p>
											<h2 class="case__contecst-box__title m-0">
												' . $name . '
											</h2>
											<p class="case__contecst-box__btn m-0">Подробнее
												<img class="case__contecst-box__arrow" src="' . get_template_directory_uri() . '/new-site/assets/images/arrow-order.svg" alt="Подробнее">
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



					if (get_row_layout() == 'section_offer'):
						$title = get_sub_field('title');
						$desc = get_sub_field('desc');
						$image = get_sub_field('image');
						$btn_name = get_sub_field('btn_name');
						$link = get_sub_field('link');
						echo '
					<section class="pageCase__check-list">
						<div class="pageCase__check-list__texts">
							<h3 class="m-0 pageCase__check-list__title">' . $title . '</h3>
							' . $desc . '
						</div>
						<div class="pageCase__check-list__image-block">
							<img class="pageCase__check-list__image" src="' . $image . '" alt="Чек-лист">
						</div>
						<div class="pageCase__check-list__link-block">
							<a class="pageCase__check-list__link" href="' . $link . '">
								' . $btn_name . '
								<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M1 11L11.5 0.5M11.5 0.5H4M11.5 0.5V8" stroke="#2d2c2c" stroke-linecap="round"
										stroke-linejoin="round" />
								</svg>
							</a>
						</div>
					</section>
					';
					endif;






					if (get_row_layout() == 'section_about'):
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
								' . $title . '
							</h2>
							<div class="m-0 pageCase__level-text">' . $desc . '</div>
						</div>
						<div class="pageCase__level-card radius_1 dFlex pad40">
							<p class="m-0 pageCase__level-paragraph">' . $title_cart . '</p>
							<div class="m-0 pageCase__level-text">' . $desc_card . '</div>
							<img src="' . $image . '" alt="Цели">
							<a class="pageCase__level-link radius_1" href="' . $link . '">' . $btn_name . ' <svg width="12" height="12"
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




					if (get_row_layout() == 'section_clints'):
						$title = get_sub_field('title');
						echo '	
					<section>
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


					if (get_row_layout() == 'section_faq'):
						$title = get_sub_field('title');
						echo '							
					<section class="pageCase pageCase__questien">
						<div class="container">
							<h2 class="m-0 pageCase__questien-title">' . $title . '</h2>
							<div class="pageCase__questien-selects">
										';
						// проверяем есть ли данные в повторителе
						if (have_rows('faqs')):
							// перебираем строки повторителя
							while (have_rows('faqs')) : the_row();
								$qas = get_sub_field('qas');
								$ans = get_sub_field('ans');
								echo ' 	
														<div class="pageCase__questien-select__block">
															<div class="pageCase__questien-select" data-select="select1">
																<p class="m-0">' . $qas . '</p><svg width="8" height="14" viewBox="0 0 8 14" fill="none"
																	xmlns="http://www.w3.org/2000/svg">
																	<path d="M7 13L1 7L7 1" stroke="#2D2C2C" stroke-width="2" stroke-linecap="round"
																		stroke-linejoin="round" />
																</svg>
															</div>
															<div class="pageCase__questien-select__content" id="select1">
																<p class="m-0">' . $ans . '</p>
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




					if (get_row_layout() == 'section_all_services'):
						$title = get_sub_field('title');
						echo '
					<div class="container">
					<h1 class="titlePage header__title">' . $title . '</h1>					
					<section class="aboutCase radius_1 greyBg pad60">
							';
						// проверяем есть ли данные в повторителе
						if (have_rows('list_services')):
							// перебираем строки повторителя
							while (have_rows('list_services')) : the_row();
								$title = get_sub_field('title');
								$link = get_sub_field('link_on_section');
								echo ' 	
										<div class="aboutCase__block">
											<h2 class="aboutCase__subtitle"><a href="' . $link . '">' . $title . '</a></h2>
											<div class="aboutCase__block-texts">
												<ul class="aboutCase__block-lists">
													';
								// проверяем есть ли данные в повторителе
								if (have_rows('list_page')):
									// перебираем строки повторителя
									while (have_rows('list_page')) : the_row();
										$title = get_sub_field('title_page');
										$link = get_sub_field('link_on_page');
										echo ' 	
																	<li class="aboutCase__block-list">
																		<a href="' . $link . '" class="aboutCase__block-link">' . $title . '</a>
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
					?>
					<!-- Начало Работы -->

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

					<!--НАЧАЛО секции стратегическая сессия-->
					<?php
					if (get_row_layout() == 'section_strat') {
						$title_stratsesion = get_sub_field('title_stratsesion');
						$subtitle_stratsesion = get_sub_field('subtitle_stratsesion');
						$section_img = get_sub_field('section_img');
						$signature = get_sub_field('signature');
						//$link_batton = get_sub_field( 'link_batton' );
					?>
						<section class="pageCase__session-section">
							<div class="container">
								<div class="pageCase__session">
									<div class="pageCase__session-texts">
										<h3 class="pageCase__internet-marketing__block-subtitle m-0"><?php echo $title_stratsesion; ?><span
												class="span-border"><?php echo $subtitle_stratsesion; ?></span>
										</h3>

										<?php
										if (have_rows('advantages')) {
										?>
											<ul class="pageCase__internet-marketing__block-texts__lists">
												<?php
												while (have_rows('advantages')) {
													the_row();
													$single_advantages = get_sub_field('single_advantages');
												?>
													<li class="pageCase__internet-marketing__block-texts__list"><?php echo $single_advantages; ?></li>
												<?php
												}
												?>
											</ul>
										<?php
										}
										?>
										<div class="pageCase__session-btn">
											<a href="#popupfancy" data-fancybox class="btn btn__order radius_1">получить предложение
												<svg width="12" height="12" viewBox="0 0 12 12" fill="none"
													xmlns="http://www.w3.org/2000/svg">
													<path d="M1 11L11.5 0.5M11.5 0.5H4M11.5 0.5V8" stroke="white"
														stroke-linecap="round" stroke-linejoin="round">
													</path>
												</svg>
											</a>
											<img src="<?php echo $signature; ?>" alt="Подпись">
										</div>
									</div>
								</div>
							</div>
							<img class="pageCase__session-image" src="<?php echo $section_img; ?>" alt="Рруководитель">
						</section>
					<?php
					}
					?>
					<!--КОНЕЦ секции стратегическая сессия-->

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

			<?php

				}
			}
			?>
		</main>


	</div>
	<?php get_footer(); ?>
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