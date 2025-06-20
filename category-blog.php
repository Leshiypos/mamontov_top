<?php get_template_part('templates/head'); ?>

<body>
    <div class="pageWrapper">
        
        <?php get_template_part('templates/top-panel-main'); ?>
       
        <header class="header portfolio__header marketing__header">
			<div class="container">
				<h1 class="titlePage header__title">
                    <? the_field('title', 5696) ?>
				</h1>
			</div>
		</header>


        <main class="pageCase portfolio__main marketing__main">
			<div class="portfolio__main-container">
				<div class="container">
					<section class="portfolio__main-section case marketing">
						<div class="case__tabs marketing__tabs">
							<div class="case__tabs-btns dFlex">
                            
                            <?php
                                $idTax = get_the_category( get_the_ID() )[0]->term_id;
								$cat = $idTax; // получаем ID текущей рубрики
								$categories = get_categories('parent='.$cat.''); 
							?>
                            <a href="/blog/" class="case__btn-tab marketing__content-tab radius_1">Все</a></li>
                                
                            <? foreach ($categories as $category): ?>
								<a href="<?php echo get_category_link($category->term_id) ?>" class="case__btn-tab marketing__content-tab radius_1"><?php echo $category->name; ?></a></li>
                            <? endforeach; ?>
							</div>

							<div class="case__tabs-contents">
                                <div class="case__tabs-content marketing__content active" id="tab1">
                                    
                                    <?php	query_posts('cat='.$idTax.'&posts_per_page=-1'); // вместо "53" указываем идентификатор вашей рубрики.
                                            while (have_posts()) : the_post();?>
                                        <article class="case__tabs-content__article radius_1 dFlex">
											<a href="<?php the_permalink(); ?>">
												<?php echo get_the_post_thumbnail( get_the_ID(), '', array('class' => 'case__tabs-content__image radius_1') ); ?>
												<p class="case__tabs-content__text"><? echo get_the_date('j.n.Y', get_the_ID()) ; ?></p>
												<h4 class="case__tabs-content__subtitle"><?php the_title(); ?></h4>
												<p class="case__tabs-content__paragraph"><?php  the_content(); ?></p>
												<div class="case__tabs-content__article-btn__block">
													<a href="<?php the_permalink(); ?>" class="read_more">Читать далее</a>
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