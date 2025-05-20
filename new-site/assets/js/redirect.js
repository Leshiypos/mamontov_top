function readyRedirect() {
  function redirectPageForm() {
    setTimeout(() => {
      location = "https://mamontov.top/thanks/";
    }, 3000);
  }
  document.addEventListener("wpcf7mailsent", redirectPageForm, false);

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
      //console.log(inputUtmArr[i].value);
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
}

document.addEventListener("DOMContentLoaded", readyRedirect);
