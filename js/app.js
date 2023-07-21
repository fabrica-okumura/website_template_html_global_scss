const body = document.body;
let scrollY;

function bodyFixedOn() {
  scrollY = window.scrollY;
  body.style.position = "fixed";
  body.style.top = -scrollY + "px";
}

function bodyFixedOff() {
  body.style.position = "";
  body.style.top = "";
  window.scrollTo(0, scrollY);
}

document.addEventListener("DOMContentLoaded", function () {
  document
    .querySelector(".l-page_header__menu_btn")
    .addEventListener("click", function () {
      body.classList.toggle("is-show_sp_menu");
      if (body.classList.contains("is-show_sp_menu")) {
        bodyFixedOn();
      } else {
        bodyFixedOff();
      }
    });

  const spMenuLinks = document.querySelectorAll(".l-page_header__menu_sp a");
  spMenuLinks.forEach(function (link) {
    link.addEventListener("click", function () {
      body.classList.toggle("is-show_sp_menu");
      bodyFixedOff();
    });
  });

  window.addEventListener("resize", function () {
    if (window.matchMedia("(min-width: 992px)").matches) {
      bodyFixedOff();
    }
  });

  window.addEventListener("scroll", function () {
    if (window.scrollY > 600) {
      document
        .querySelector(".l-page_footer__btn_to_top")
        .classList.add("is-show");
    } else {
      document
        .querySelector(".l-page_footer__btn_to_top")
        .classList.remove("is-show");
    }
  });
});

// Accordion component
const accordionButtons = document.querySelectorAll(".u-accordion_btn");
accordionButtons.forEach((button) => {
  button.addEventListener("click", function () {
    const content = this.nextElementSibling;
    if (this.classList.contains("is-open")) {
      content.style.height = "0px";
      this.classList.remove("is-open");
    } else {
      content.style.height = "auto";
      const height = content.offsetHeight;
      content.style.height = "0px";
      void content.offsetHeight;
      content.style.height = `${height}px`;
      this.classList.add("is-open");
    }
  });
});

// Set the initial height for contents that are already open
window.addEventListener("DOMContentLoaded", (event) => {
  accordionButtons.forEach((button) => {
    if (button.classList.contains("is-open")) {
      const content = button.nextElementSibling;
      content.style.height = "auto";
      const height = content.offsetHeight;
      content.style.height = `${height}px`;
    }
  });
});

// URL hash fragment is removed only for links to #top
document
  .querySelector('a[href="#top"]')
  .addEventListener("click", function (e) {
    e.preventDefault();
    window.scrollTo(0, 0);
    history.pushState(
      "",
      document.title,
      window.location.pathname + window.location.search
    );
  });
