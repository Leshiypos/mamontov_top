$(document).ready(function(){
// Подстановка данных сайта УРЛ и название в скрытые поля формы
	$('[name=url_page]').val(document.location.href);
	$('[name=title_page]').val(document.querySelector('h1').innerHTML);

// Всплывающее окно на странице
// let hieght_doc = document.documentElement.offsetHeight/2; //Определяем высоту документа (величина на которую нужно прокруть до появления элемента)
// window.addEventListener('scroll', function() {
// 			if (-(document.documentElement.getBoundingClientRect().top)>hieght_doc){
// 				if(!($('#vision').hasClass('true'))){
// 					$('#vision').addClass('true');
// 				}
// 			}
// 	});



});