<?php 
// Секция Кейсы новые. Добавлен в шаблон page-service.php
?>
<?php
		if ( get_row_layout () == 'section_case_new' ){
			$title = get_sub_field('title'); //Получаем заголовок блока
			$cat = get_sub_field('pop_cat'); //id рубрики популярные
			$margin_bot = get_sub_field('margin_bot'); //Получаем нижний отступ для черной категории
			$link = get_sub_field('link');

			$posts_main = new WP_Query( array(
				'cat'=> $cat,
				'posts_per_page' => 5,
				'orderby' => 'date',
				'order' => 'ASC',
			) );
			if ($posts_main->found_posts){
?>
				
					<section class="pageCase__our-services case__contecst new">
						<div class="dFlex case__contecst-text">
							<h1 class="case__contecst-title m-0"> <?php echo $title; ?> </h1>
							<a class="m-0 case__contecst-link" href="<?php echo $link; ?>">Все кейсы</a>
						</div>
						<div class="case__contecst-block">

						<?php 
						while ($posts_main->have_posts()) : $posts_main->the_post();
										
										$card = get_field('card');
									?>
                                        <article class="new case__contecst-box radius_1 dFlex" style = "background-color: <?php echo $card['color_card']; ?>">
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
					</section>
<?php 
			} else { echo '<h2>Нет постов в данной категории</h2>'; }
		}
?>