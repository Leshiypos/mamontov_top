<?php
if(get_row_layout()=='facts_case'){
	$title = get_sub_field('title');
?>
<section class="white_section facts_case">
				<div class="wrap_section">
					<h2 class="fs_100_32"><?php echo $title; ?></h2>
					<div class="swiper_facts_case">
						<!-- Additional required wrapper -->
						<div class="swiper-wrapper">
							<!-- Slides 1 -->
							<?php if(have_rows('slide')){
							?>
								<?php while(have_rows('slide')){
									the_row();
									$description = get_sub_field('description');
									$budjet = get_sub_field('budjet');
									$bid_count = get_sub_field('bid_count');
									$bid_price = get_sub_field('bid_price');
									$task = get_sub_field('task');
									$result = get_sub_field('result');
									$title_case = get_sub_field('title_case');
									$url_img = get_sub_field('url_img');
									$link_case = get_sub_field('link_case');
									$telegram_link = get_sub_field('telegram_link');
									$vk_link = get_sub_field('vk_link');
									
								?>
							<div class="swiper-slide">
								<div class="wrap_content">
									<div class="case">
										<img src="<?php echo $url_img; ?>" alt="">
										<p class="fs_22_14 title_case"><?php echo $description;  ?></p>
										<h3 class="fs_28-18 title"><?php echo $title_case; ?></h3>
										<?php 
											if ($link_case){
												?>
												<a href="<?php echo $link_case; ?>" class="btn btn__order radius_1" target="_blank">Читать кейс
													<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 11L11.5 0.5M11.5 0.5H4M11.5 0.5V8" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path></svg>
												</a> 
												<?php
											}
										?>	
									</div>
									<div class="description_facts_case">
										<div class="col_left">
											<?php if ($budjet){ ?>
											<div>
												<h5 class="fs_22_18">Бюджет</h5>
												<p><?php echo $budjet; ?></p>
											</div>
											<?php };
											if ($bid_count){
											?>
											<div>
												<h5 class="fs_22_18">Привлечено заявок:</h5>
												<p><?php echo $bid_count; ?></p>
											</div>
											<?php };
											if ($bid_price){
											?>
											<div>
												<h5 class="fs_22_18">Цена заявки:</h5>
												<p><?php echo $bid_price; ?></p>
											</div>
											<?php }; ?>
											<div class="social_links">
												<a href="<?php echo $vk_link; ?>" class="social_link">
													<img src="<?php echo get_template_directory_uri().'/new-site/assets/images/vk.png'; ?>" alt="">
												</a>
												<a href="<?php echo $telegram_link; ?>" class="social_link">
													<img src="<?php echo get_template_directory_uri().'/new-site/assets/images/tg.png'; ?>" alt="">
												</a>
											</div>
										</div>
										<div class="col_right">
											<div>
												<h5 class="fs_22_18">Задача:</h5>
												<p><?php echo $task; ?></p>
											</div>
											<div>
												<h5 class="fs_22_18">Результат:</h5>
												<p><?php echo $result; ?></p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php
							}
							?>		
							<?php
							}
							?>
							<!-- Slades End -->
						</div>
						<div class="panel_bottom">
							<div class="swiperWrapFacts__btns dFlex">
								<button type="button" class="btn-slider btn-prev__facts_case" ></button>
								<button type="button" class="btn-slider btn-next__facts_case" ></button>
							</div>
							<div class="swiper-scrollbar"></div>
						</div>
						</div>
				</div>
		</section>
<?php
}
?>

