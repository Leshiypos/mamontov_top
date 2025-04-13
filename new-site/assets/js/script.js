function ready() {
	
    const mainFunction = () => {
        // Ширина прокрутки страницы и ширины экрана
        const sizeWindow = (screen) => {
            let scrollBar = window.innerWidth - screen;
            return screen + scrollBar;
        }

        if(sizeWindow(document.body.clientWidth) < 993 && sizeWindow(document.body.clientWidth) > 568) { 
            const statisticSwiper = new Swiper('.statisticsSlider', {
                loop: true,
                slidesPerView: 1,
                // Navigation arrows
                navigation: {
                    nextEl: '.statisticsSlider .swiperButtons-button-next',
                    prevEl: '.statisticsSlider .swiperButtons-button-prev',
                },
            });
        }

        let sliderContentImage = document.querySelectorAll('.slider img');
        
        if(sliderContentImage.length > 2) {
            $('.slider').slick({
                slidesToShow: 2,
            });
        }
        if(sizeWindow(document.body.clientWidth) < 568) {
            if(sliderContentImage.length > 1) {
                $('.slider').slick({
                    arrows: true,
                    prevArrow: '<button type="button" class="slick-prev"><img src="./assets/img/slider-prev.svg" alt=""></button>',
                    nextArrow: '<button type="button" class="slick-next"><img src="./assets/img/slider-next.svg" alt=""></button>',
                });
            }
        }   
    }
    mainFunction();

    window.addEventListener('resize', e => {
        mainFunction();
    })

    const burger = document.querySelector('.burger');
    const menu = document.querySelector('.menu');

    if(burger) {
      burger.addEventListener('click', e => {
          e.currentTarget.classList.toggle('active');
          menu.classList.toggle('active');
  
      });

    }
	let tel1 = document.querySelectorAll('input[name="tel-number"]');
	let tel2 = document.querySelectorAll('input[name="tel-299"]');
	let maskOptions = {
	  mask: '+7 000 000-00-00'
	};
	for(let i = 0; i < tel1.length; i++) {
		let mask = IMask(tel1[i], maskOptions);
	}
	for(let i = 0; i < tel2.length; i++) {
		let mask = IMask(tel2[i], maskOptions);
	}
	/*const mask1 = IMask(tel1, maskOptions);
	const mask2 = IMask(tel2, maskOptions);*/
    ///$('input[name="tel-number"]').mask('+7 000 000-00-00');
    //$('input[name="tel-299"]').mask('+7 000 000-00-00');
	
	function checkElement(selector){
		let el = document.querySelector(selector);
		if (el) return true;
		return false;
	}

	function swiperWidthHorizontal(wrapSelector, siblingBlockSelector, swiperSelector){
		let wrapWidth =  document.querySelector(wrapSelector).offsetWidth;
		let contentWidth =  document.querySelector(siblingBlockSelector).offsetWidth;
		document.querySelector(swiperSelector).style.width = wrapWidth - contentWidth + 'px';
	}
    // wp-dev слайде для Отзывов клиентов
	
	if (checkElement('.slider__wrapper-licenses__container_reviewsClient')){
	let swiperReviewClient = new Swiper(".slider__wrapper-licenses__container_reviewsClient", {
        // Настройки слайдера
        slidesPerView: 1,
        loop: true,
        spaceBetween: 36,
    
        // Добавление кнопок навигации
        navigation: {
          nextEl: ".btn-next__reviewClient",
          prevEl: ".btn-prev__reviewClient",
        },
      });
	}

	if (checkElement('.slider__wrapper-comand__container')){
    let swiperComand = new Swiper(".slider__wrapper-comand__container", {
        // Настройки слайдера
        slidesPerView: 2,
        loop: true,
        spaceBetween: 30,
        breakpoints: {
          400: {
            slidesPerView: 1,
          },
          768: {
            slidesPerView: 2,
            spaceBetween: 56,
          },
          1920: {
            slidesPerView: 2,
          },
        },
    
        // Добавление кнопок навигации
        navigation: {
          nextEl: ".btn-next",
          prevEl: ".btn-prev",
        },
      });
	}

	if (checkElement('.pageCase__our-services__container-swiper')){
      let swiperServices = new Swiper(".pageCase__our-services__container-swiper", {
        // Настройки слайдера
        slidesPerView: 4,
        loop: true,
        spaceBetween: 30,
        breakpoints: {
          300: {
            slidesPerView: 1.2,
          },
          400: {
            slidesPerView: 1.2,
          },
          768: {
            slidesPerView: 2.2,
          },
          993: {
            slidesPerView: 3.2,
          },
          1200: {
            slidesPerView: 4.2,
          },
        },
    
        // Добавление кнопок навигации
        navigation: {
          nextEl: ".btn-next__our-services",
          prevEl: ".btn-prev__our-services",
        },
      });
	}

	if (checkElement('.slider__wrapper-clients__container')){
      let swiperClients = new Swiper(".slider__wrapper-clients__container", {
        // Настройки слайдера
        slidesPerView: 6,
        loop: true,
        spaceBetween: 30,
        breakpoints: {
          300: {
            slidesPerView: 2,
          },
          700: {
            slidesPerView: 4,
            spaceBetween: 30,
          },
          768: {
            slidesPerView: 4,
            spaceBetween: 40,
          },
          1280: {
            slidesPerView: 6,
          },
          1920: {
            slidesPerView: 6,
          },
        },
    
        // Добавление кнопок навигации
        navigation: {
          nextEl: ".btn-next__clients",
          prevEl: ".btn-prev__clients",
        },
      });
	}

	if (checkElement('.slider__wrapper-licenses__container')){
      let swiperReview = new Swiper(".slider__wrapper-licenses__container", {
        // Настройки слайдера
        slidesPerView: 3,
        loop: true,
        spaceBetween: 36,
        breakpoints: {
          300: {
            slidesPerView: 1,
            spaceBetween: 18,
          },
          440: {
            slidesPerView: 1,
          },
          768: {
            slidesPerView: 4,
          },
          1331: {
            slidesPerView: 3,
          },
          1920: {
            slidesPerView: 3,
          },
        },
    
        // Добавление кнопок навигации
        navigation: {
          nextEl: ".btn-next__review",
          prevEl: ".btn-prev__review",
        },
      });
	}


	if (checkElement('.slider__wrapper-sertificats__container')){
      let swiperSertificats = new Swiper(
        ".slider__wrapper-sertificats__container",
        {
          // Настройки слайдера
          slidesPerView: 2,
          loop: true,
          spaceBetween: 40,
          breakpoints: {
            300: {
              slidesPerView: 1,
            },
            400: {
              slidesPerView: 1,
              spaceBetween: 0,
            },
            768: {
              slidesPerView: 2,
              spaceBetween: 10,
            },
            1920: {
              slidesPerView: 2,
            },
          },
    
          // Добавление кнопок навигации
          navigation: {
            nextEl: ".btn-next__sertificats",
            prevEl: ".btn-prev__sertificats",
          },
        }
      );
	}


	if (checkElement('.slider__wrapper-comands__container')){
      let swiperComands = new Swiper(".slider__wrapper-comands__container", {
        // Настройки слайдера
        slidesPerView: 5,
        loop: true,
        spaceBetween: 50,
    
        breakpoints: {
          300: {
            slidesPerView: 1,
          },
          440: {
            spaceBetween: 10,
            slidesPerView: 1,
          },
    
          768: {
            slidesPerView: 3,
            spaceBetween: 30,
          },
          1280: {
            slidesPerView: 4,
            spaceBetween: 30,
          },
          1920: {
            slidesPerView: 5,
          },
        },
    
        // Добавление кнопок навигации
        navigation: {
          nextEl: ".btn-next__comands",
          prevEl: ".btn-prev__comands",
        },
      });
	}


	if (checkElement('.swiper__container-price__services')){
      let swiperPriceServices = new Swiper(".swiper__container-price__services", {
        // Настройки слайдера
        slidesPerView: 3,
        loop: true,
        spaceBetween: 30,
        breakpoints: {
          320: {
            slidesPerView: 1,
          },
    
          700: {
            slidesPerView: 2,
          },
          
    
          993: {
            slidesPerView: 3,
          },
        },
    
        // Добавление кнопок навигации
        navigation: {
          nextEl: ".btn-next__price-services",
          prevEl: ".btn-prev__price-services",
        },
      });
	}


	if (checkElement('.pageCase__stydies-internet__block-videos__container-mobile')){
      let swiperPriceStydies = new Swiper(
        ".pageCase__stydies-internet__block-videos__container-mobile",
        {
          // Настройки слайдера
          slidesPerView: 1,
          loop: true,
          spaceBetween: 30,
          breakpoints: {
            320: {
              slidesPerView: 1,
            },
    
            600: {
              slidesPerView: 1,
            },
          },
    
          // Добавление кнопок навигации
          navigation: {
            nextEl: ".btn-next__stydies",
            prevEl: ".btn-prev__stydies",
          },
        }
      );
	}


	if (checkElement('.pageCase__lid-magnit__container')){
      let swiperLidMagnit = new Swiper(".pageCase__lid-magnit__container", {
        // Настройки слайдера
        slidesPerView: 2,
        loop: true,
        spaceBetween: 30,
        breakpoints: {
          1110: {
            slidesPerView: 2,
          },
        },
    
        // Добавление кнопок навигации
        navigation: {
          nextEl: ".btn-next__lid-magnit",
          prevEl: ".btn-prev__lid-magnit",
        },
      });
	}


	if (checkElement('.pageCase__lid-magnit__container-mobile')){
      let swiperLidMagnitMobile = new Swiper(
        ".pageCase__lid-magnit__container-mobile",
        {
          // Настройки слайдера
          slidesPerView: 1,
          loop: true,
          spaceBetween: 0,
          breakpoints: {
            600: {
              slidesPerView: 1,
            },
          },
    
          // Добавление кнопок навигации
          navigation: {
            nextEl: ".btn-next__lid-magnit",
            prevEl: ".btn-prev__lid-magnit",
          },
        }
      );
	}


    if (checkElement('.pageCase__where-lid__block-box__slider')){
      let swiperLidMagnitWhere = new Swiper(
        ".pageCase__where-lid__block-box__slider",
        {
          // Настройки слайдера
          slidesPerView: 1,
          loop: true,
          spaceBetween: 0,
          breakpoints: {
            300: { slidesPerView: 1 },
            600: {
              slidesPerView: 1,
            },
          },
    
          // Добавление кнопок навигации
          navigation: {
            nextEl: ".btn-next__lid-where",
            prevEl: ".btn-prev__lid-where",
          },
        }
      );
	}


	if (checkElement('.pageCase__fact-case__box-conatiner')){
      let swiperFactsCase = new Swiper(".pageCase__fact-case__box-conatiner", {
        // Настройки слайдера
        slidesPerView: 1,
        loop: true,
        spaceBetween: 0,
        breakpoints: {
          300: { slidesPerView: 1 },
          768: {
            slidesPerView: 1,
          },
        },
    
        // Добавление кнопок навигации
        navigation: {
          nextEl: ".btn-next__facts-case",
          prevEl: ".btn-prev__facts-case",
        },
      });
	}

	  //  Начало Слайдер all_services_section
	  if (checkElement('.all_services_swiper')){
      let swiperAllServicesSection = new Swiper(".all_services_swiper", {
        // Настройки слайдера
        slidesPerView: 3,
        loop: true,
		autoplay: {
			delay : 5000,
		},
        spaceBetween: 41,
		breakpoints: {
			300: { 
				slidesPerView: 1,
				centeredSlides: true,
			 },
			600: {slidesPerView: 2},
			1300: {
			  slidesPerView: 3,
			},
		  },
    
        // Добавление кнопок навигации
        navigation: {
          nextEl: ".btn-next__all_serv_sec",
          prevEl: ".btn-prev__all_serv_sec",
        },
      });
	}
	//  Конец Слайдер all_services_section

	//Начало  Слайдер Tool 
	if (checkElement('.tools_swiper')){
	let swiperToollSection = new Swiper(".tools_swiper", {
        // Настройки слайдера
        slidesPerView: 1,
        loop: true,
		autoplay: {
			delay : 5000,
		},
        spaceBetween: 41,    
        // Добавление кнопок навигации
        navigation: {
          nextEl: ".btn-next__tools",
          prevEl: ".btn-prev__tools",
        },
      });
	}
	//Конец  Слайдер Tool 

	
		//Начало  Слайдер rating 
		if(checkElement('.rating_swiper')){
		let swiperRatinglSection = new Swiper(".rating_swiper", {
			// Настройки слайдера
			slidesPerView: 5,
			loop: true,
			autoplay: {
				delay : 5000,
			},
			spaceBetween: 41,
			breakpoints: {
				300: { 
					slidesPerView: 1,
					centeredSlides: true,
				 },
				600: {slidesPerView: 2},
				1300: {
				  slidesPerView: 5,
				},
			  },    
			// Добавление кнопок навигации
			navigation: {
			  nextEl: ".btn-next__rating",
			  prevEl: ".btn-prev__rating",
			},
		  });
		}

		//Конец  Слайдер rating 

		//Начало  Лучшие посты 
		if(checkElement('.best_swiper')){
			let swiperRatinglSection = new Swiper(".best_swiper", {
				// Настройки слайдера
				slidesPerView: 3,
				loop: true,
				autoplay: {
					delay : 5000,
				},
				spaceBetween: 41,
				breakpoints: {
					300: { 
						slidesPerView: 1,
						centeredSlides: true,
					 },
					600: {slidesPerView: 2},
					1300: {
					  slidesPerView: 3,
					},
				  },    
				// Добавление кнопок навигации
				navigation: {
				  nextEl: ".btn-next__best",
				  prevEl: ".btn-prev__best",
				},
			  });
			}
	
			//Конец  Лучшие посты

//Начало  Доска команды 
if(checkElement('.board_swiper')){
	let swiperTeamBoard = new Swiper(".board_swiper", {
		// Настройки слайдера
        slidesPerView:"auto",
        loop: true,
        spaceBetween: 50,
		speed: 2500,   
		autoplay: {
			delay : 0.001,
		},
	  });
	}

if(checkElement('.board_swiper_reverse')){
	let swiperTeamBoard = new Swiper(".board_swiper_reverse", {
		// Настройки слайдера
        slidesPerView:"auto",
        loop: true,
        spaceBetween: 50,
		speed: 2500,   
		autoplay: {
			delay : 0.001,
			reverseDirection: true,
		},
	  });
	}

	//Конец  Доска команды

	// Начало Слайдер tariffs


	if(checkElement('.swiper_tariffs')){
		swiperWidthHorizontal('.white_section .wrap_section','.white_section .service_compos','.swiper_tariffs' );

		let swiperTariffsSection = new Swiper(".swiper_tariffs", {
			// Настройки слайдера
			slidesPerView: 1,
			loop: true,
			breakpoints: {
				600: { 
					slidesPerView: 1,
					centeredSlides: true,
				 },
				1100: {slidesPerView: 2},
				1600 : {
				  slidesPerView: 3,
				},
			  },    
			// Добавление кнопок навигации
			navigation: {
			  nextEl: ".btn-next__tariffs",
			  prevEl: ".btn-prev__tariffs",
			},
		  });
		}
	// Конец Слайдер tariffs






    
      const selects = document.querySelectorAll(".pageCase__questien-select");
      if(selects) {
        const blockSelects = document.querySelectorAll(
          ".pageCase__questien-select__content"
        );
        selects.forEach((select) => {
          select.addEventListener("click", function () {
            const selectData = select.getAttribute("data-select");
            const selectId = document.getElementById(selectData);
            const isView = selectId.style.visibility === "visible";
            blockSelects.forEach((item) => {
              item.style.visibility = "hidden";
              item.style.height = 0;
              item.style.minHeight = 0;
              item.style.maxHeight = 0;
              selects.forEach((select) => select.classList.remove("active"));
            });
            if (!isView) {
              selectId.style.visibility = "visible";
              selectId.style.height = selectId.scrollHeight + "px";
              selectId.style.minHeight = selectId.scrollHeight + "px";
              this.classList.add("active");
            } else {
              selectId.style.visibility = "hidden";
              selectId.style.height = 0;
              selectId.style.minHeight = 0;
              selects.forEach((select) => select.classList.remove("active"));
            }
          });
        });
      }
    
	//   Слайдер ФАКТЫ-КЕЙСЫ
	  if(checkElement('.swiper_facts_case')){
		
		let swiperFactsCaseSection = new Swiper(".swiper_facts_case", {
			// Настройки слайдера
			slidesPerView: 1,
			loop: true,
			autoplay: {
				delay : 10000,
			},
			spaceBetween: 41,
			scrollbar: {
				el: '.swiper-scrollbar',
				draggable: true,
			  },   
			// Добавление кнопок навигации
			navigation: {
			  nextEl: ".btn-next__facts_case",
			  prevEl: ".btn-prev__facts_case",
			},
		  });
		}
	// Конец Слайдер tariffs
	
		
		let swiperSowSectionHeder = new Swiper(".swiper_SOW_header", {
			// Настройки слайдера
			slidesPerView: 2,
			loop: true,
			spaceBetween: 60,  
			// Добавление кнопок навигации
		  });
		


		
			let swiperSowSectionContent = new Swiper(".swiper_SOW_content", {
				// Настройки слайдера
				slidesPerView: 1,
				loop: true,
				// autoplay: {
				// 	delay : 10000,
				// },
				spaceBetween: 41,
				scrollbar: {
					el: '.swiper-scrollbar-sow-content',
					draggable: false,
				  },   
				// Добавление кнопок навигации
				navigation: {
				  nextEl: ".btn-next__SOW",
				  prevEl: ".btn-prev__SOW",
				},
			  });
			

		swiperSowSectionHeder.controller.control = swiperSowSectionContent;
		swiperSowSectionContent.controller.control = swiperSowSectionHeder;
		swiperSowSectionContent.on('slideChangeTransitionEnd',(e)=>{
			let prevElement = document.querySelector('.header_section_SOW.descope .swiper-slide-active');
			if(prevElement){prevElement.classList.remove('swiper-slide-active');}
			let classNameActiveSlide= document.querySelector('.swiper_SOW_content .swiper-slide-active').dataset.slide;
			document.querySelector(`.header_section_SOW.descope .${classNameActiveSlide}`).classList.add('swiper-slide-active');
		})
	// Начало Слайдеры stages_of_work
		
	// Конец Слайдеры stages_of_work

      //video play
    
      //const btnOk = document.querySelector(".btn-ok");
      //const btnStop = document.querySelector(".btn-stop");
      //const wrapperVideo = document.getElementById("fon");
    //
      //btnOk.addEventListener("click", function () {
      //  wrapperVideo.play();
      //});
    //
      //btnStop.addEventListener("click", function () {
      //  wrapperVideo.pause();
      //});



      const btnsBestDeals = [
        { btn: "case__btn-tab", content: "case__tabs-content" },
        { btn: "marketing__content-tab", content: "marketing__content" },
      ];
    
      function btnTabs(btn, content) {
        const tabs = document.querySelectorAll(`.${btn}`);
        // Проходимся по всем кнопкам карточки элемента
        tabs.forEach((tab) => {
          // вешаем на каждую кнопку обработчик события клик
          tab.addEventListener("click", () => {
            // Получаем предыдущую активную кнопку
            const prevActiveButton = document.querySelector(`.${btn}.active`);
    
            // Получаем предыдущую активную вкладку
            const prevActiveItem = document.querySelector(`.${content}.active`);
            // Проверяем есть или нет предыдущая активная кнопка
            if (prevActiveButton) {
              //Удаляем класс active у предыдущей кнопки если она есть
              prevActiveButton.classList.remove("active");
            }
    
            // Проверяем есть или нет предыдущая активная вкладка
            if (prevActiveItem) {
              // Удаляем класс active у предыдущей вкладки если она есть
              prevActiveItem.classList.remove("active");
            }
    
            // получаем id новой активной вкладки, который мы перем из атрибута data-tab у кнопки
            const nextActiveItemId = tab.getAttribute("data-tab");
    
            // получаем новую активную вкладку по id
            const nextActiveItem = document.querySelector(`#${nextActiveItemId}`);
            // добавляем класс active кнопке на которую нажали
            tab.classList.add("active");
            // добавляем класс _active новой выбранной вкладке
            nextActiveItem.classList.add("active");
          });
        });
      }
      btnsBestDeals?.forEach((block) => btnTabs(block.btn, block.content));



}

document.addEventListener("DOMContentLoaded", ready);