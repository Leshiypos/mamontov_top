$(document).ready(function(){
// Подстановка данных сайта УРЛ и название в скрытые поля формы
	$('[name=url_page]').val(document.location.href);
	$('[name=title_page]').val(document.querySelector('h1').innerHTML);

	// Функция устанавливает одну высоту в группе элементов селектора  layout all_services_section
	function maxHeight(select){
		let height = 0;
		let elemcart = document.querySelectorAll(select);
		for (let elem of elemcart){
			if (elem.offsetHeight>height) height = elem.offsetHeight;
			
		}
		for (let elem of elemcart){
			if (elem.offsetHeight != height) elem.style.height = height + 'px';
		}
	}
	maxHeight('.all_services_swiper .cart_wrap');
	maxHeight('.cart_wrap h3');
	maxHeight('.tools_swiper .wrap');
	maxHeight('article.best_single');
	maxHeight('.wrap_reviews .review');

	// Функция кнопки - Смотреть больше

	const butReadMore = document.querySelector('button.read_more_team_but');
	const container = document.querySelector('.height_limit');
	const wrapBut = document.querySelector('.read_more_team_but_wrap');
	if(butReadMore){
	butReadMore.addEventListener('click', ()=>{
		container.classList.remove('height_limit');
		wrapBut.classList.remove('visible_mob');
	})
	}

});