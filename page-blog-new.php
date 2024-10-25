<?php 
/*
Template Name: Страница Блог WP-dev
Template Post Type: page
*/
?>

<?php 
	//ID родительской страницы
	$parent_page_id = 6713;


	//Получение полей ACF
	$title_1 = get_field('title_1');
	$title_2 = get_field('title_2');
	$cat = get_field('post_id_cat'); // получаем ID текущей рубрики
	print $cat;

?>

<?php get_template_part('templates/head'); ?>

<body>
    <div class="pageWrapper">
        
        <?php get_template_part('templates/top-panel-main'); ?>
       
        <header class="header portfolio__header marketing__header">
			<div class="container">
				<h1 class="titlePage header__title popular_page">
					<?php echo $title_1.'<br>'.$title_2; ?>
				</h1>
			</div>
		</header>


        <main class="pageCase portfolio__main marketing__main lots_of_cases">
			<div class="portfolio__main-container">
				<div class="container">
					<section class="portfolio__main-section case marketing">
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
                                <div class="case__tabs-content marketing__content active">
                                    
                                   <?php	query_posts('cat='.$cat ); // вместо "53" указываем идентификатор вашей рубрики.
                                            while (have_posts()) : the_post();?>
                                        <article class="case__tabs-content__article radius_1 dFlex">
											<a href="<?php the_permalink(); ?>">
												<?php echo get_the_post_thumbnail( get_the_ID(), '', array('class' => 'case__tabs-content__image radius_1') ); ?>
												<p class="case__tabs-content__text"><? echo get_the_date('j.n.Y', get_the_ID()) ; ?></p>
												<h4 class="case__tabs-content__subtitle"><?php the_title(); ?></h4>
												<p class="case__tabs-content__paragraph"><?php  the_content(); ?></p>
												<div class="case__tabs-content__article-btn__block">
													<a href="<?php the_permalink(); ?>" class="read_more">Читать кейс</a>
												</div>
											</a>
                                        </article>
                                        <?php
                                        endwhile;
                                        wp_reset_query();
                                    ?>

								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
        </main>
    <?php get_footer(); ?>