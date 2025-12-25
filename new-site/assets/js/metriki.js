document.addEventListener("DOMContentLoaded", () => {
  const urlStr = window.location.toString();
  const result = urlStr.split("?");
  const inputUtm = document.getElementById("utm_metka");
  const inputUtmArr = document.querySelectorAll(".utm_metkaArr");
  const inputClientId = document.querySelectorAll(".metka_clientId");
  const inputGaClientId = document.querySelectorAll(".ga_clientId");

  let inputClientIdCookie = "";
  let inputGaIdCookie = "";

  let arrCookie = document.cookie.split(";");

  for (var i = 0; i < arrCookie.length; i++) {
    let elemArrCookie = arrCookie[i].split("=");
    if (elemArrCookie[0] == " _ym_uid") {
      inputClientIdCookie = elemArrCookie[1];
    }
  }

  for (var i = 0; i < arrCookie.length; i++) {
    let elemArrCookie = arrCookie[i].split("=");
    if (elemArrCookie[0] == " _ga") {
      inputGaIdCookie = elemArrCookie[1];
    }
  }

  if (inputUtm) {
    inputUtm.value = result[1];
  }

  if (inputUtmArr) {
    for (var i = 0; i < inputUtmArr.length; i++) {
      inputUtmArr[i].value = result[1];
    }
  }
  if (inputClientId) {
    for (var i = 0; i < inputClientId.length; i++) {
      inputClientId[i].value = inputClientIdCookie;
    }
  }
  if (inputGaClientId) {
    for (var i = 0; i < inputGaClientId.length; i++) {
      inputGaClientId[i].value = inputGaIdCookie;
    }
  }

  function getCookie(name) {
    let matches = document.cookie.match(
      new RegExp(
        "(?:^|; )" +
          name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, "\\$1") +
          "=([^;]*)"
      )
    );
    return matches ? decodeURIComponent(matches[1]) : undefined;
  }
  //   Для фикса яндекс метрики

  const YM_COUNTER_ID = 57479515; // твой ID

  function getCookie(n) {
    const m = document.cookie.match(
      new RegExp(
        "(?:^|; )" + n.replace(/([.$?*|{}()[\]\\/+^])/g, "\\$1") + "=([^;]*)"
      )
    );
    return m ? decodeURIComponent(m[1]) : "";
  }

  function setMetrikaIdToFields(id) {
    document
      .querySelectorAll("input.metka_clientId")
      .forEach((el) => (el.value = id || ""));
  }

  function fetchMetrikaId(cb) {
    // 1) cookie
    const fromCookie = getCookie("metrika_client_id") || getCookie("_ym_uid");
    if (fromCookie) return cb(fromCookie);

    // 2) через API счётчика (когда загрузится)
    if (typeof ym === "function") {
      try {
        ym(YM_COUNTER_ID, "getClientID", (id) => cb(id || ""));
        return;
      } catch (e) {}
    }
    cb("");
  }

  // Заполнить при загрузке...
  fetchMetrikaId(setMetrikaIdToFields);

  // ...и прямо перед отправкой (важно для медленной/отложенной загрузки)
  document.addEventListener(
    "submit",
    (e) => {
      if (e.target && e.target.matches(".wpcf7 form, form.wpcf7-form")) {
        fetchMetrikaId(setMetrikaIdToFields);
      }
    },
    true
  );

  //   Тестовая для определене полей
  function checkClientId() {
    let clienrIdInputs = document.querySelectorAll("input.metka_clientId");
    clienrIdInputs.forEach((input) => {
      console.log("ClientId = ", input.value);
    });
    let GaIdInputs = document.querySelectorAll("input.ga_clientId");
    GaIdInputs.forEach((input) => {
      console.log("GaClientId = ", input.value);
    });
    ym(57479515, "getClientID", function (clientID) {
      console.log("YM ClientId:", clientID);
    });
    var trackers = ga.getAll();
    if (trackers.length) {
      var clientId = trackers[0].get("clientId");
      console.log("UA ClientId:", clientId);
    }

    function getGaFromCookie() {
      var match = document.cookie.match(/_ga=GA\d+\.\d+\.(\d+\.\d+)/);
      return match ? match[1] : null;
    }

    console.log("ClientId из cookie:", getGaFromCookie());
  }
  //   setTimeout(checkClientId, 6000);
});
