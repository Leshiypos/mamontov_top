<?php 
/*
Template Name: Страница Блог и Кейсы WP-dev
Template Post Type: page
*/
?>

<?php 
	global $wp_query;
	$current_page_id = $wp_query->get_queried_object_id(); //id текущуй страницы
	$parent_page_id = !empty(get_ancestors($current_page_id, 'page')[0]) ? get_ancestors($current_page_id, 'page')[0] :  $current_page_id; // Если имеет родителбску. страницу - получает ID родительской страницы, если нет родителя - получает ID текущей страницы

	// определяем текущую страницу из значения параметра "page_nav"
	$current_page = !empty( $_GET['page_nav'] ) ? $_GET['page_nav'] : 1;

	//Получение полей ACF
	$title_1 = get_field('title_1');
	$title_2 = get_field('title_2');
	$cat = get_field('post_id_cat'); // получаем ID текущей рубрики
	$num_post = !empty(get_field('num_post')) ? get_field('num_post') : 5 ;
?>

<?php get_template_part('templates/head'); ?>

<body>
    <div class="pageWrapper">
        
        <?php get_template_part('templates/top-panel-main'); ?>
       
        <header class="header portfolio__header marketing__header">
			<div class="container">
				<h1 class="titlePage header__title popular_page">
					<?php echo $title_1; ?>
				</h1>
			</div>
		</header>

		<?php 
			if (have_rows('case_page_new')){
				while (have_rows('case_page_new')){
					the_row();
					// Секция самый популярный кейс 
					get_template_part('/templates/layout/popular-case');
				}
			}
		?>
		
		<?php 
			// Поулярные кейсы слайдер
			get_template_part('templates/popular-block');
		?>


        <main class="pageCase portfolio__main marketing__main lots_of_cases">
			<div class="portfolio__main-container">
				<div class="container">
					<section class="portfolio__main-section case marketing">
						<?php 
							if ($title_2) { echo '<h1>'.$title_2.'</h1>'; }
						?>
						<!-- <h1></h1> -->
						<div class="case__tabs marketing__tabs">
							<div class="case__tabs-btns dFlex">
 										<a href="<?php echo get_page_uri($parent_page_id); ?>" class="case__btn-tab marketing__content-tab radius_1">Все</a>
							<?php 
							// Выводим ссылки на родительсике страницы
								$cat_blog = new WP_Query( array(
									'post_parent' => $parent_page_id,
									'post_type' => 'page'
								) );

								if($cat_blog->have_posts( ) ){
									while ($cat_blog->have_posts( ) ){
										$cat_blog->the_post( );
								?>
										<a href="<?php echo get_page_uri(); ?>" class="case__btn-tab marketing__content-tab radius_1"><?php the_title(); ?></a>
								<?php
									}
									wp_reset_postdata(  );
								}

								
							?>
							</div>

							<div class="case__tabs-contents">
                                <div class="case__tabs-content blog marketing__content active">
                                    
                                   <?php
								   $posts_main = new WP_Query( array(
										'cat'=> $cat,
										'posts_per_page' => $num_post,
										'paged' => $current_page, 
								   ) );

                                        while ($posts_main->have_posts()) : $posts_main->the_post();
										
										$card = get_field('card');
									?>
                                        <article class="case__tabs-content__article radius_1 dFlex" style = "background-color: <?php echo $card['color_card']; ?>">
											<a href="<?php the_permalink(); ?>">
												<?php if($card['img_card']){?><img src="<?php echo $card['img_card']; ?>" class="background_card"><?php } ?>
												<div class="category_title"><?php echo get_the_category()[1]->name;?></div>
												<h4 class="case__tabs-content__subtitle"><?php the_title(); ?></h4>
											</a>
                                        </article>
                                        <?php
                                        endwhile;
										?>
								</div>
							</div>
						</div>
							<div id='pagination'>
							<?php
								// Навигация начало
								echo paginate_links( array(
									'format' => '?page_nav=%#%',
									'total' => $posts_main->max_num_pages,
									'current' => $current_page,
									'end_size' => 1,
									'mid_size' => 2,

								) );
								// Навигация конец
								wp_reset_postdata( );
							?>
							</div>
					</section>
				</div>
			</div>
        </main>
    <?php get_footer(); ?>