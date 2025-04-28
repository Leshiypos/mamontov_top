$(document).ready(function () {
  let buttonsFilter = document.querySelectorAll(".filters_tab a");

  buttonsFilter.forEach((elem) =>
    elem.addEventListener("click", (e) => {
      e.preventDefault();
      e.currentTarget.classList.toggle("active");
      console.log(e.currentTarget.dataset.idTerm);
    })
  );
});
