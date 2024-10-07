$(document).ready(function(){
// Подстановка данных сайта УРЛ и название в скрытые поля формы
	$('[name=url_page]').val(document.location.href);
	$('[name=title_page]').val(document.querySelector('h1').innerHTML);
});