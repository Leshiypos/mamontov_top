function readyRedirect() {
  function redirectPageForm() {
    setTimeout(() => {
      location = "https://mamontov.top/thanks/";
    }, 3000);
  }
  document.addEventListener("wpcf7mailsent", redirectPageForm, false);
}

document.addEventListener("DOMContentLoaded", readyRedirect);
