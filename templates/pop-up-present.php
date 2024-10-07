<?php 
// Всплывающее окно Подарок wp-dev
?>

<div class="pop_up_present hide_block" id="vision"> 
	<div class="presentition">
	<img src="<?php echo get_template_directory_uri(  ).'/new-site/assets/images/close.png'; ?>" class="close_btn" alt="">
		<h4>Оставьте контакт и получите бесплатную диагностику вашего продвижения!</h4>
		<ul>
			<li>Позиционирование</li>
			<li>Сайт</li>
			<li>Аналитика</li>
			<li>SEO</li>
			<li>Реклама</li>
		</ul>
	</div>
	<div class="form_block">
		<img src="<?php echo get_template_directory_uri(  ).'/new-site/assets/images/present_box.png'; ?>" alt="">
		<h4 class="title">Подарок для Вас</h4>
		<div class="wrap">

		<?php echo do_shortcode('[contact-form-7 id="b859e01" title="Подарок"]');  ?>
			<!-- <form action="" method="post">
				<div>
					<p>
						<span class="wpcf7-form-control-wrap" data-name="tel-number"><input size="40" maxlength="400" class="wpcf7-form-control wpcf7-tel wpcf7-validates-as-required wpcf7-text wpcf7-validates-as-tel input" aria-required="true" aria-invalid="false" placeholder="+7 000 000-00-00" value="" type="tel" name="tel-number"></span>
					</p>
				</div>
				<input class="wpcf7-form-control wpcf7-submit has-spinner btn btnForm" type="submit" value="Оставить заявку" disabled="">
			</form> -->
			<div class="policy_conf">
				<p>Нажимая кнопку «Отправить заявку» я соглашаюсь с <a href="#">политикой конфиденциальности и обработки персональных данных</a></p>
			</div>
		</div>
	</div>
	<div class="social_link">
		<p>Или напишите нам:</p>
		<a href="https://t.me/mamontovtop"><img src="<?php echo get_template_directory_uri(  ).'/new-site/assets/images/tg.svg'; ?>" alt=""></a>
		<a href="#"><img src="<?php echo get_template_directory_uri(  ).'/new-site/assets/images/whatsapp.svg'; ?>" alt=""></a>
	</div>
</div>

<script>
	let launchDelay = 10000; 								 //величина задержки запуска роявления формы
	let hieght_doc = document.documentElement.offsetHeight/2; //Определяем высоту документа (величина на которую нужно прокруть до появления элемента)
	let btn_close = $('.close_btn'); 						//Кнопка закрытия формы
	let timeOut_submit = 24*60*60*1000; 					//отсрочка пояаления формы после отправки
	let periodOpen = 5*1000*60; 							//Период сплытия окна после закрытия

	let currentTime = Date.now(); 							//Получаем текущее время

	//localStorage.setItem('visitTime',Date.now()); //сброс

	let visitTime = localStorage.getItem('visitTime');		//Получаем время закрытия формы в хранилище, если таковое имеется

	const winListener = function(){							//Функция добавления слушателя га скролл страницы
		window.addEventListener('scroll', function() {
			if (-(document.documentElement.getBoundingClientRect().top)>hieght_doc){
				if(!($('#vision').hasClass('used'))){
					$('#vision').addClass('used');
					$('#vision').removeClass('hide_block');
				}
			}
		});
	};
	
	if (!visitTime || ((currentTime - visitTime) > periodOpen)){		//Если в хранилище нет переменной закрытия страницы или прошло больше времени, чем указано в счетчике после закрытия то показывать форму
		setTimeout(winListener, launchDelay); // отсрочка функции запуска всплытия окна
	}
		// Слушатель на закрытие формы
		btn_close.click(
			function (){
				$('#vision').addClass('hide_block');
				localStorage.setItem('visitTime',Date.now()); // При закрытии формы устанавливаем в хранилище время закрытия формы
			}
		);
	$('.pop_up_present form').submit(
		function(){
			if($('.pop_up_present form [name="tel-number"]').val()){
				let timeout_sm = Date.now() + timeOut_submit; //отсрочка появления формы после отправки
				localStorage.setItem('visitTime',timeout_sm);
				console.log("Нажата кнопка");
			}

		}
	);
</script>