<?php 
/*
Template Name: Страница Кейсы WP-dev
Template Post Type: page
*/
?>

<?php 
	//Получение полей ACF
	$title = get_field('title');
	$title_2 = get_field('title_2');
?>

<?php get_template_part('templates/head'); ?>

<body>
    <div class="pageWrapper">
        
        <?php get_template_part('templates/top-panel-main'); ?>

            <?
            $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            $section = explode("/", parse_url($url)["path"])[1];
			//Получаем рсновной путь
			$url = explode('?', $url);
			$url = $url[0];

			if(isset($_GET['page_id'])){
				$page_id ='page_id'.$_GET['page_id'];
			} else {
				$page_id='';
			}
			if(isset($_GET['cat'])){
				$cat_parent =$_GET['cat'];
			} else {
				$cat_parent=49;
			}
            ?>
       
        <header class="header portfolio__header marketing__header">
			<div class="container">
				<h1 class="titlePage header__title popular_page">
					<?php echo $title; ?>
				</h1>
			</div>
		</header>


        <main class="pageCase portfolio__main marketing__main lots_of_cases">
			<div class="portfolio__main-container">
				<div class="container">
					<?php 
						if (have_rows('case_page_new')){
							while (have_rows('case_page_new')){
								the_row();
								
								// Секция самый популярный кейс 
								get_template_part('/templates/layout/popular-case');

							}
						}
					?>

					<section class="portfolio__main-section case marketing">
						<h1><?php echo $title_2; ?></h1>
						<div class="case__tabs marketing__tabs">
							<div class="case__tabs-btns dFlex">
                            
                            <?php
                                $idTax = '49';
								$cat = '49'; // получаем ID текущей рубрики
								$categories = get_categories('parent='.$cat.''); 
							?>
                            <a href="<?echo $url;?>" class="case__btn-tab marketing__content-tab radius_1">Все</a></li>
                                
                            <? foreach ($categories as $category): ?>
								<a href="<?php echo $url.'?'.$page_id.'&cat='.$category->term_id; ?>" class="case__btn-tab marketing__content-tab radius_1"><?php echo $category->name; ?></a></li>
                            <? endforeach; ?>
							</div>

							<div class="case__tabs-contents">
                                <div class="case__tabs-content marketing__content active">
                                    
                                    <? if(count(explode("/", parse_url($url)["path"])) > 3):?>
                                        <? $idTax = array_pop(get_the_category( get_the_ID() ))->term_id; ?>
                                    <? endif; ?>
                                   <?php	query_posts('cat='.$cat_parent ); // вместо "53" указываем идентификатор вашей рубрики.
                                            while (have_posts()) : the_post();?>
                                        <article class="case__tabs-content__article radius_1 dFlex">
											<a href="<?php the_permalink(); ?>">
												<?php echo get_the_post_thumbnail( get_the_ID(), '', array('class' => 'case__tabs-content__image radius_1') ); ?>
												<p class="case__tabs-content__text"><? echo get_the_date('j.n.Y', get_the_ID()) ; ?></p>
												<h4 class="case__tabs-content__subtitle"><?php the_title(); ?></h4>
												<p class="case__tabs-content__paragraph"><?php  the_content(); ?></p>
												<div class="case__tabs-content__article-btn__block">
											</a>
												<a href="<?php the_permalink(); ?>" class="read_more">Читать кейс</a>
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