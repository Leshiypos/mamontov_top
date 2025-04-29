<?php 
/*
Template Name: Страница Блог и Кейсы WP-dev Tect
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
	$sub_cat = get_field('pop_cat'); //id рубрики популярные
	$num_post = !empty(get_field('num_post')) ? get_field('num_post') : 5 ;

?>

<?php get_template_part('templates/head'); ?>

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
							<div class="filters_tab">
								<div class="category_tab">
									<h4 class="fs_24_12">Инструменты</h4>
									<div data-filter-type="category_tab">
										<?php 
										foreach($category_children_term as $term){
										?>
											<a href="#" class="button_filt fs_20_10" data-id-term="<?php  echo $term->term_id; ?> "> <?php echo  $term->name; ?></a>
										<?php
										}
										?>
									</div>
			
								</div>
								<div class="solution_tab">
									<h4 class="fs_24_12">Решения</h4>
									<div data-filter-type="solution_tab">
									<?php 
										foreach($solution_children_term as $term){
										?>
											<a href="#" class="button_filt fs_20_10" data-id-term="<?php  echo $term->term_id; ?> "> <?php echo  $term->name; ?></a>
										<?php
										}
										?>	
									</div>
								</div>

							</div>


							<div class="case__tabs-contents">
                                <div id="article_wrap" class="case__tabs-content blog marketing__content active">
                                    
                                   <?php
								   $posts_main = new WP_Query( array(
										'tax_query' =>[
											'relation' => 'AND',
											[
												'taxonomy' => 'category',
												'field'		=> 'term_id',
												'terms'		=> $cat
											],
										],
										'posts_per_page' => $num_post,
										'paged' => $current_page, 
								   ) );
										// текущая страница
											$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
											// максимум страниц
											$max_pages = $posts_main->max_num_pages;
											// print_r($posts_main -> max_num_pages); //Количесвто постов
											// print_r($posts_main->query['paged']); //Количесвто постов

                                        while ($posts_main->have_posts()) : $posts_main->the_post();
										
										$card = get_field('card');
									?>
									<script id="ajax-variable">
										window.myajax.cat = <?php echo $cat;?>;
										window.myajax.maxPages = <?php echo $max_pages;?>;
										window.myajax.paged = <?php echo $paged;?>;
										window.myajax.num_post = <?php echo $num_post;?>;
										myajax.categoryId = false;
										myajax.solutionId = false;
									</script>
                                        
                                        <article class="case__tabs-content__article radius_1 dFlex" style = "background-color: <?php echo $card['color_card']; ?>">
											<a href="<?php the_permalink(); ?>">
												<?php if($card['img_card']){?><img src="<?php echo $card['img_card']; ?>" class="background_card"><?php } ?>
												<div calss="dFlex">
												<?php
													$category_obj = get_the_category();
													foreach($category_obj as $obj){
														if(($obj->category_parent != 0) and ($obj->term_id != $sub_cat[0])){
															echo '<div class="category_title">'.$obj->cat_name.'</div>';
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
								wp_reset_postdata( );
							?>
							</div>
					</section>
				</div>
			</div>
        </main>
    <?php get_footer(); ?>