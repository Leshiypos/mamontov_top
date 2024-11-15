function ready() {
	
	document.addEventListener( 'wpcf7mailsent', function( event ) {
			setTimeout( () => {
				location = 'https://mamontov.top/thanks/';
			}, 3000 ); 
		}, false );
	
	
	console.log('test');
	console.log(document.cookie.split(';'));
	
    const urlStr = window.location.toString();
    const result = urlStr.split('?');
    const inputUtm = document.getElementById('utm_metka');
    const inputUtmArr = document.querySelectorAll('.utm_metkaArr');
    const inputClientId = document.querySelectorAll('.metka_clientId');
    const inputGaClientId = document.querySelectorAll('.ga_clientId');
	
	let inputClientIdCookie = '';
	let inputGaIdCookie = '';
	
	let arrCookie = document.cookie.split(';');
  	
	for(var i = 0; i < arrCookie.length; i++) {
        let elemArrCookie = arrCookie[i].split('=');
        if(elemArrCookie[0] == ' _ym_uid') {
		   inputClientIdCookie = elemArrCookie[1];
		}
	}

	for(var i = 0; i < arrCookie.length; i++) {
        let elemArrCookie = arrCookie[i].split('=');
        if(elemArrCookie[0] == ' _ga') {
		   inputGaIdCookie = elemArrCookie[1];
		}
	}
	
    if(inputUtm) {
      inputUtm.value = result[1];
    }

    if(inputUtmArr) {
      for(var i = 0; i < inputUtmArr.length; i++) {
        inputUtmArr[i].value = result[1];
        //console.log(inputUtmArr[i].value);
      }
    }
    if(inputClientId) {
      for(var i = 0; i < inputClientId.length; i++) {
        inputClientId[i].value = inputClientIdCookie;
      }
    }
    if(inputGaClientId) {
      for(var i = 0; i < inputGaClientId.length; i++) {
        inputGaClientId[i].value = inputGaIdCookie;
      }
    }

    
    function getCookie(name) {
      let matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
      ));
      return matches ? decodeURIComponent(matches[1]) : undefined;
    }


    
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
	
    // wp-dev слайде для Отзывов клиентов

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


	  //  Начало Слайдер all_services_section
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
	//  Конец Слайдер all_services_section

	//Начало  Слайдер Tool 
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
	//Конец  Слайдер Tool 

		//Начало  Слайдер rating 
		if(document.querySelector('.rating_swiper')){
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
		if(document.querySelector('.best_swiper')){
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