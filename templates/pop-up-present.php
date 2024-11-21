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

	if(!document.referrer){												//Если страница получена с другого истоника - обнуляем локальное хранилище	
		localStorage.removeItem('endTime');
		localStorage.removeItem('oneShow');
	}


	console.log(document.referrer);

	function dispalyPresent(){
		$('#vision').addClass('used');
		$('#vision').removeClass('hide_block');
	}
	
	let hieght_doc = document.documentElement.offsetHeight/2; //Определяем высоту документа (величина на которую нужно прокруть до появления элемента)
	let btn_close = $('.close_btn'); 						//Кнопка закрытия формы
	
	let launchDelay = 5000; 								 //величина задержки запуска появления формы
	let timeOut_submit = 24*60*60*1000; 					//отсрочка пояаления формы после отправки
	let periodOpen = 5*1000*60; 							//Прирощение при закрытии формы
	let firstTimeout = 1*60*1000;							//начальное время установк

	let currentTime = Date.now(); 							//Получаем текущее время

	let startTime = currentTime;							//Начало отсчета - время входа на сайт
	let endTime = localStorage.getItem('endTime');			//Конец отсчета - время срабатывания события
	let oneShow = localStorage.getItem('oneShow');			//Если окно уже показывалось при прокрутке
	let timerTime;

	if((endTime - startTime)<0){localStorage.removeItem('endTime');} //Если времявышло - удаляем переменную из хранилища
	if (endTime == undefined) {
		localStorage.setItem('endTime', currentTime+firstTimeout);
		endTime = localStorage.getItem('endTime');
	}

	if ((endTime == undefined) ||((endTime - startTime)<0) ) {timerTime = firstTimeout} else {timerTime = endTime - startTime};

	if (oneShow == undefined) {localStorage.setItem('oneShow', false); oneShow = localStorage.getItem('oneShow')} 

	const TimerPresent = setTimeout(dispalyPresent,timerTime);

	
	
	console.log((endTime - startTime)/1000/60);
	console.log(timerTime/1000/60);
	

	const scrollShowPopUp = function() {					//Функция показа окна при прокрутки страницы
		if (-(document.documentElement.getBoundingClientRect().top)>hieght_doc){
			if(!($('#vision').hasClass('used'))){
				$('#vision').addClass('used');
				$('#vision').removeClass('hide_block');
				localStorage.setItem('oneShow', true);
			}
		}
	};
	

	const winListener = function(){							//Функция добавления слушателя на скролл страницы 
		window.addEventListener('scroll', scrollShowPopUp);
	};

	console.log(oneShow);
	if (oneShow == 'false'){
		setTimeout(winListener, launchDelay); // отсрочка функции запуска всплытия окна Если оно еще не показывалось
	}
	
	// Слушатель на закрытие формы
	btn_close.click(
		function (){
			$('#vision').addClass('hide_block');
			localStorage.setItem('endTime', currentTime+periodOpen); //Устанавливаем нвое конечное время при закрытии формы - текущее время плюс прирощение
			clearTimeout(TimerPresent);                          //При закрытии формы сбрасываем старый ТаймАут
			setTimeout(TimerPresent,periodOpen);					// и запускаем новый
		}
	);
	$('.pop_up_present form').submit(
		function(){
			if($('.pop_up_present form [name="tel-number"]').val()){
				localStorage.setItem('endTime', currentTime+timeOut_submit); //Устанавливаем новое конечное время при отправке формы - текущее время плюс прирощение
				console.log("Нажата кнопка");
			}

		}
	);

</script>