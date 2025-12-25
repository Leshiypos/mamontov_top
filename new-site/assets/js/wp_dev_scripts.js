function initButtonArrowTop() {
  const buttonArrowTop = document.querySelector(".wrap_btn_up");
  console.log(buttonArrowTop);
  if (!buttonArrowTop) return;
  const showOffset = 1600;

  window.addEventListener("scroll", () => {
    const currenWindowOffset = window.pageYOffset;
    if (currenWindowOffset > showOffset) {
      buttonArrowTop.classList.add("visible");
    } else {
      buttonArrowTop.classList.remove("visible");
    }
    console.log(currenWindowOffset);
  });

  document.addEventListener("click", (e) => {
    const target = e.target;
    if (!target.closest(".wrap_btn_up")) return;
    buttonArrowTop.classList.remove("visible");
    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  });
}

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
  maxHeight(".white_section.facts_case .description_facts_case");

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
    const widthTopPanel = document.getElementById("topPanel")?.offsetWidth;
    const dropElement = document.querySelectorAll(
      "#topPanel .dropdownWrap .dropdown"
    );
    if (widthTopPanel && window.innerWidth > 1250) {
      dropElement.forEach((el) => {
        el.style.width = `${widthTopPanel}px`;
      });
    }
    const HTMLBlock = `
		<li class="consultation_block">
		  	  <div class="title_sub_menu">
			  	<h6>Обсудить задачу с экспертом</h6>
				  <svg width="8" height="14" viewBox="0 0 8 14" fill="none"
					xmlns="http://www.w3.org/2000/svg">
					<path d="M7 13L1 7L7 1" stroke="#000000" stroke-width="1" stroke-linecap="round"
					stroke-linejoin="round" />
			  	</svg>
			  </div>
			  <div class="wrap_sub_menu">
				<p>Консультация от эксперта </br> в интернет-маркетинге</p>
				<a href="#popupfancy" data-fancybox="" class="btn btn__order radius_1" id="button_consult">Получить консультацию
					<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 11L11.5 0.5M11.5 0.5H4M11.5 0.5V8" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path></svg>
				</a>
		  </div>

	  </li>
   
	`;
    const wrapSubMenu = document.querySelectorAll(".menu .dropdownWrap > ul");
    wrapSubMenu.forEach((el) => {
      el.insertAdjacentHTML("beforeend", HTMLBlock);
    });
  }

  function unActiveAllSubMenu() {
    subMenuContent.forEach((el, index) => {
      el.classList.add("hidden_menu");
    });
    subMenuElem.forEach((el, index) => {
      el.classList.add("un_active");
    });
  }
  function UnActiveInitialStart() {
    subMenuContent.forEach((el, index) => {
      if (index !== 0) {
        el.classList.add("hidden_menu");
      }
    });

    subMenuElem.forEach((el, index) => {
      if (index !== 0) {
        el.classList.add("un_active");
      }
    });
  }
  addConsultationBlock();
  const subMenuContent = document.querySelectorAll("#topPanel .wrap_sub_menu");
  const subMenuElem = document.querySelectorAll(
    "#topPanel .dropdownWrap>ul>li"
  );
  const sumMenuTitle = document.querySelectorAll("#topPanel .title_sub_menu");

  UnActiveInitialStart();

  sumMenuTitle.forEach((el) => {
    el.addEventListener("click", (e) => {
      isActive =
        e.currentTarget.nextElementSibling.classList.contains("hidden_menu");
      unActiveAllSubMenu();
      if (isActive)
        e.currentTarget.nextElementSibling.classList.remove("hidden_menu");
      e.currentTarget.parentElement.classList.remove("un_active");
    });
  });
  //   Логика нажатия на заголовки

  //   выравнивание субменю
  const menuTop = document.getElementById("topPanel");
  const leftDistanceTopMenu = menuTop.getBoundingClientRect().left;
  const dropdownWrapElement = document.querySelectorAll(
    "#topPanel .dropdownWrap"
  );

  dropdownWrapElement.forEach((el) => {
    el.style.left = `-${
      el.getBoundingClientRect().left - leftDistanceTopMenu
    }px`;
  });

  // Скругление углов меню, если появляется субМеню

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          menuTop.classList.add("top-radius-none");
        } else {
          menuTop.classList.remove("top-radius-none");
        }
      });
    },
    {
      threshold: 0.1, // сработает, когда хотя бы 10% элемента видно
    }
  );
  const wrapSubMenu = document.querySelectorAll(".menu .dropdownWrap > ul");
  if (window.innerWidth > 1205) {
    wrapSubMenu.forEach((el) => {
      observer.observe(el);
    });
  }

  //    открытие - закрытие субменю
  function toogleMenu() {
    const menuTitles = document.querySelectorAll(".menu .opener");
    menuTitles.forEach((item) => {
      item.addEventListener("click", (e) => {
        item.classList.toggle("closed");
        const subMenuWrap = item.nextElementSibling;
        if (subMenuWrap.classList.contains("dropdownWrap")) {
          subMenuWrap.classList.toggle("hidden");
        }
      });
    });
  }
  if (window.innerWidth <= 746) {
    toogleMenu();
  }

  //   stages_of_work - секция - раскрытие меню в тексте
  //<div class="dd_list">
  //<div class="title_list">Яндекс Директ</div>
  //<div class="wrap">
  //</div>
  //</div>

  function hiddenContent() {
    const titles = document.querySelectorAll(
      ".stages_of_work .dd_list .title_list"
    );
    titles.forEach((title) => {
      title.addEventListener("click", (e) => {
        const currentElement = e.currentTarget;
        currentElement
          .closest(".swiper-wrapper")
          .style.removeProperty("height");
        currentElement.closest(".dd_list").classList.toggle("active");
        currentElement.nextElementSibling.classList.toggle("visible");
      });
    });
  }
  hiddenContent();

  //   Динамический call tracking в Битрикс24

  (function (w, d, u) {
    var s = d.createElement("script");
    s.defer = false;
    s.async = false;
    s.id = "b242ya-script";
    s.src = u + "?" + ((Date.now() / 60000) | 0);
    var h = d.getElementsByTagName("script")[0];
    h.parentNode.insertBefore(s, h);
  })(window, document, "https://67p.b242ya.ru/static/js/b242ya.js");
  var b242yaScript = document.querySelector("#b242ya-script");
  b242yaScript.addEventListener("load", function () {
    B242YAInit({
      portal: "https://ego-agency.bitrix24.ru/",
      pid: "b44ceb46e05aa94e3ac56e8cb2891987",
      presets: {},
    });
  });

  //Инициализация показа кнопки при скролле
  initButtonArrowTop();
});
