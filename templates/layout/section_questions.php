<?php 				
				if(get_row_layout() == 'section_faq'):
					$title = get_sub_field('title');
					echo '							
					<section class="pageCase pageCase__questien">
						<div class="container">
							<h2 class="m-0 pageCase__questien-title">'.$title.'</h2>
							<div class="pageCase__questien-selects">
										';
												// проверяем есть ли данные в повторителе
												if( have_rows('faqs') ):
													$k = 0;
													// перебираем строки повторителя
													while ( have_rows('faqs') ) : the_row();
														$qas = get_sub_field('qas');
														$ans = get_sub_field('ans');
														$k++;
														echo ' 	
														<div class="pageCase__questien-select__block">
															<div class="pageCase__questien-select" data-select="select'.$k.'">
																<p class="m-0">'.$qas.'</p><svg width="8" height="14" viewBox="0 0 8 14" fill="none"
																	xmlns="http://www.w3.org/2000/svg">
																	<path d="M7 13L1 7L7 1" stroke="#2D2C2C" stroke-width="2" stroke-linecap="round"
																		stroke-linejoin="round" />
																</svg>
															</div>
															<div class="pageCase__questien-select__content" id="select'.$k.'">
																<p class="m-0">'.$ans.'</p>
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