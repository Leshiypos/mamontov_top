<?php get_template_part('templates/head'); ?>

<body>
    <div class="pageWrapper">
        
        <?php get_template_part('templates/top-panel-main'); ?>

        <pre>

            <?
            $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            $section = explode("/", parse_url($url)["path"])[1];

            if( $section == 'case' ) {
                $idPage = 5770;
                $idTax = get_field('id_taxonomy', 5770);
                $link = '/case/';
            }
            if( $section == 'blog' ) {
                $idPage = 5696;
                $idTax = get_field('id_taxonomy', 5696);
                $link = '/blog/';
            }
            ?>
            
        </pre>
       
        <header class="header portfolio__header marketing__header">
			<div class="container">
				<h1 class="titlePage header__title">
                    <? the_field('title', $idPage) ?>
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
                                $idTax = $idTax;
								$cat = $idTax; // получаем ID текущей рубрики
								$categories = get_categories('parent='.$cat.''); 
							?>
                            <a href="<?=  $link;?>" class="case__btn-tab marketing__content-tab radius_1">Все</a></li>
                                
                            <? foreach ($categories as $category): ?>
								<a href="<?php echo get_category_link($category->term_id) ?>" class="case__btn-tab marketing__content-tab radius_1"><?php echo $category->name; ?></a></li>
                            <? endforeach; ?>
							</div>

							<div class="case__tabs-contents">
                                <div class="case__tabs-content marketing__content active">
                                    
                                    <? if(count(explode("/", parse_url($url)["path"])) > 3):?>
                                        <? $idTax = array_pop(get_the_category( get_the_ID() ))->term_id; ?>
                                    <? endif; ?>
                                   <?php	query_posts('cat='.$idTax ); // вместо "53" указываем идентификатор вашей рубрики.
                                            while (have_posts()) : the_post();?>
                                        <article class="case__tabs-content__article radius_1 dFlex">
											<a href="<?php the_permalink(); ?>">
												<?php echo get_the_post_thumbnail( get_the_ID(), '', array('class' => 'case__tabs-content__image radius_1') ); ?>
												<p class="case__tabs-content__text"><? echo get_the_date('j.n.Y', get_the_ID()) ; ?></p>
												<h4 class="case__tabs-content__subtitle"><?php the_title(); ?></h4>
												<p class="case__tabs-content__paragraph"><?php  the_content(); ?></p>
												<div class="case__tabs-content__article-btn__block">
											</a>
											<a href="<?php the_permalink(); ?>" class="read_more">Читать далее</a>
                                            </div>
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