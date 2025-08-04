
<?php
// Начало Секции Рейтинг 
				if( get_row_layout() == 'rating' ):
                    // проверяем есть ли данные в повторителе
					
					// ПРоверка отступов
						$mb = get_sub_field('margin_bot');
						$mt = get_sub_field('margin_top');
						$margin_top = (is_numeric($mt)) ? "margin-top:{$mt}px;" : '';
						$margin_bottom = (is_numeric($mb)) ? "margin-bottom:{$mb}px;" : '';
						$padding_style = ($margin_top || $margin_bottom) ? 'style="' . $margin_top . $margin_bottom . '"' : '';
					//конец проверки отступов

                    if( have_rows('rating_list') ):

                        echo '
                        <section class="pageCase__achievements" '.$padding_style.'>
                            <div class="pageCase__achievements-container">
                        ';
                        // перебираем строки повторителя
                        while ( have_rows('rating_list') ) : the_row();

                            $counter = get_sub_field('counter');
                            $name = get_sub_field('name');
                            $text = get_sub_field('text');

                            echo '
                            <div class="pageCase__achievements-box">
                                <p class="pageCase__achievements-box__number">'.$counter.'</p>
                                <p class="pageCase__achievements-box__text">'.$name.'</p>
                                <p class="pageCase__achievements-box__desc">
                                    '.$text.'
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
// Конец Секции Рейтинг 