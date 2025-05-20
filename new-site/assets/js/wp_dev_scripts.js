$(document).ready(function () {
  // Подстановка данных сайта УРЛ и название в скрытые поля формы
  $("[name=url_page]").val(document.location.href);
  $("[name=title_page]").val(document.querySelector("h1").innerHTML);

  // Функция устанавливает одну высоту в группе элементов селектора  layout all_services_section
  function maxHeight(select) {
    let height = 0;
    let elemcart = document.querySelectorAll(select);
    for (let elem of elemcart) {
      if (elem.offsetHeight > height) height = elem.offsetHeight;
    }
    for (let elem of elemcart) {
      if (elem.offsetHeight != height) elem.style.height = height + "px";
    }
  }
  maxHeight(".all_services_swiper .cart_wrap");
  maxHeight(".cart_wrap h3");
  maxHeight(".tools_swiper .wrap");
  maxHeight("article.best_single");
  maxHeight(".wrap_reviews .review");
  maxHeight(".facts_case .case");

  // Функция кнопки - Смотреть больше

  // const butReadMore = document.querySelector('button.read_more_team_but');
  // const container = document.querySelector('.height_limit');
  // const wrapBut = document.querySelector('.read_more_team_but_wrap');
  // if(butReadMore){
  // butReadMore.addEventListener('click', ()=>{
  // 	container.classList.remove('height_limit');
  // 	wrapBut.classList.remove('visible_mob');
  // })
  // }
  // tariffs секция

  const liElements = document.querySelectorAll(".tariffs_content li");
  var iOS = navigator.userAgent.match(/iPhone|iPad|iPod/i);
  var event = "mouseover";

  if (iOS != null) {
    event = "touchstart";
  }

  for (let elem of liElements) {
    elem.addEventListener(event, (e) => {
      document
        .querySelectorAll(".tariffs_content .targetTariff")
        .forEach((element) => element.classList.remove("targetTariff"));
      let targetClass = e.currentTarget.className;
      if (targetClass) {
        let leElementsCurrent = document.querySelectorAll(
          `.tariffs_content .${targetClass}`
        );
        leElementsCurrent.forEach((element) => {
          element.classList.add("targetTariff");
        });
      }
    });

    elem.addEventListener("mouseout", () => {
      document
        .querySelectorAll(".tariffs_content .targetTariff")
        .forEach((element) => element.classList.remove("targetTariff"));
    });

    let selector = elem.className;
    if (selector) {
      maxHeight(`.${selector}`);
    }
  }

  //   Добавление в главное меню дополнительного конечного блока
  function addConsultationBlock() {
    const HTMLBlock = `
		<li class="consultation_block">
		  <div>
			  <h6>Обсудить задачу с экспертом</h6>
			  <p>Консультация от эксперта </br> в интернет-маркетинге</p>
		  </div>
		  <a href="#popupfancy" data-fancybox="" class="btn btn__order radius_1">Получить консультацию
			  <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 11L11.5 0.5M11.5 0.5H4M11.5 0.5V8" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path></svg>
		  </a>
	  </li>
   
	`;
    const wrapSubMenu = document.querySelectorAll(".menu .dropdownWrap > ul");
    console.log(wrapSubMenu);
    wrapSubMenu.forEach((el) => {
      el.insertAdjacentHTML("beforeend", HTMLBlock);
    });
  }
});
