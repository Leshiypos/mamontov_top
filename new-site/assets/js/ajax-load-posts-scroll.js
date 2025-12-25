jQuery(document).ready(function ($) {
  function getPostsAjax(data, container) {
    jQuery.post(myajax.url, data, function (response) {
      if (response) {
        container.innerHTML = response;
      } else {
        container.innerHTML =
          '<h4 class="no_post_message">Записи отсутствуют</h4>';
      }
    });
  }
  let buttonsFilter = document.querySelectorAll(".filters_tab a");
  let articleWrap = document.getElementById("article_wrap");

  //   Строка поиска

  let serchBar = document.getElementById("live-search");
  if (serchBar) {
    let t;
    let timeOutSearch = 600;
    serchBar.addEventListener("input", () => {
      clearTimeout(t);
      t = setTimeout(runSearch, timeOutSearch);
    });

    function runSearch() {
      const query = serchBar.value.trim();

      myajax.searchParam = query;
      myajax.paged = 1;
      var data = {
        action: "load_posts_scroll",
        categoryId: myajax.categoryId ?? false,
        solutionId: myajax.solutionId ?? false,
        cat: myajax.cat,
        paged: myajax.paged,
        searchParam: myajax.searchParam ?? "",
        num_post: myajax.num_post,
      };

      getPostsAjax(data, articleWrap);
    }
  }
  //   КОНЕЦ Строка поиска
  // Событие при нажатии на кнопки фильтра
  buttonsFilter.forEach((elem) =>
    elem.addEventListener("click", (e) => {
      e.preventDefault();
      myajax.paged = 1;
      let button_filter = e.currentTarget;
      let parentWrapClass = button_filter.closest("div").dataset.filterType;

      if (button_filter.classList.contains("active")) {
        button_filter.classList.remove("active");
        parentWrapClass == "category_tab"
          ? (myajax.categoryId = false)
          : (myajax.solutionId = false);
      } else {
        button_filter
          .closest("div")
          .querySelectorAll("a")
          .forEach((elem) => elem.classList.remove("active"));
        button_filter.classList.add("active");

        parentWrapClass == "category_tab"
          ? (myajax.categoryId = button_filter.dataset.idTerm)
          : (myajax.solutionId = button_filter.dataset.idTerm);
      }
      //   Ajax

      var data = {
        action: "load_posts_scroll",
        categoryId: myajax.categoryId,
        solutionId: myajax.solutionId,
        cat: myajax.cat,
        paged: myajax.paged,
        searchParam: myajax.searchParam ?? "",
        num_post: myajax.num_post,
      };
      // 'ajaxurl' не определена во фронте, поэтому мы добавили её аналог с помощью wp_localize_script()
      getPostsAjax(data, articleWrap);
    })
  );
  // Окончание Событие при нажатии на кнопки фильтра

  // Бесконечная прокрутка
  $(window).scroll(function () {
    var bottomOffset = 2500, // отступ от нижней границы сайта, до которого должен доскроллить пользователь, чтобы подгрузились новые посты
      // button = $( '#loadmore a' ),
      paged = myajax.paged,
      maxPages = myajax.maxPages;

    if (
      $(document).scrollTop() > $(document).height() - bottomOffset &&
      !$("body").hasClass("loading")
    ) {
      if (paged < maxPages) {
        ++myajax.paged;
        var data = {
          action: "load_posts_scroll",
          categoryId: myajax.categoryId,
          solutionId: myajax.solutionId,
          cat: myajax.cat,
          paged: myajax.paged,
          searchParam: myajax.searchParam ?? "",
          num_post: myajax.num_post,
        };

        $.ajax({
          type: "POST",
          url: myajax.url,
          data,
          beforeSend: function (xhr) {
            $("body").addClass("loading");
            $("#preloader>div").addClass("loader");
          },
          success: function (response) {
            $("#preloader>div").removeClass("loader");
            $("body").removeClass("loading");
            if (response) {
              articleWrap.insertAdjacentHTML("beforeEnd", response);
            }
          },
        });
      }
    }
  });
});
