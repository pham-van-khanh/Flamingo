/*==================== ADD  NUMBER ====================*/
const setup = () => {
   document.getElementById("add-one").addEventListener("click", () => {
    const outputBox = document.getElementById("output-box");
    outputBox.value = Number(outputBox.value) + 1;
  });
   document.getElementById("remove-one").addEventListener("click", () => {
    const outputBox = document.getElementById("output-box");
    outputBox.value = (+outputBox.value - 1 == 0) ? 1 : +outputBox.value - 1;
    
  });
  
};

/*==================== BACK ====================*/

function come_back() {
  window.history.back();
  preventDefault();
  return;
}


window.addEventListener("load", setup);

/*==================== SHOW MENU ====================*/
const navMenu = document.getElementById("nav-menu"),
  navToggle = document.getElementById("nav-toggle"),
  navClose = document.getElementById("nav-close");

/*===== MENU SHOW =====*/
/* Validate if constant exists */
if (navToggle) {
  navToggle.addEventListener("click", () => {
    navMenu.classList.add("show-menu");
  });
}

/*===== MENU HIDDEN =====*/
/* Validate if constant exists */
if (navClose) {
  navClose.addEventListener("click", () => {
    navMenu.classList.remove("show-menu");
  });
}

/*==================== REMOVE MENU MOBILE ====================*/
const navLink = document.querySelectorAll(".nav__link");

function linkAction() {
  const navMenu = document.getElementById("nav-menu");
  navMenu.classList.remove("show-menu");
}
navLink.forEach((n) => n.addEventListener("click", linkAction));

/*==================== CHANGE BACKGROUND HEADER ====================*/
function scrollHeader() {
  const header = document.getElementById("header");
  if (this.scrollY >= 100) header.classList.add("scroll-header");
  else header.classList.remove("scroll-header");
}
window.addEventListener("scroll", scrollHeader);

/*==================== SHOW SCROLL UP ====================*/
function scrollUp() {
  const scrollUp = document.getElementById("scroll-up");
  // When the scroll is higher than 200 viewport height, add the show-scroll class to the a tag with the scroll-top class
  if (this.scrollY >= 200) scrollUp.classList.add("show-scroll");
  else scrollUp.classList.remove("show-scroll");
}
window.addEventListener("scroll", scrollUp);

/*==================== SWIPER DISCOVER ====================*/
const discoverSwiper= new Swiper(".discover__container", {
  effect: "coverflow",
  grabCursor: true,
  centeredSlides: true,
  slidesPerView: "auto",
  coverflowEffect: {
    rotate: 50,
    stretch: 0,
    depth: 100,
    modifier: 1,
    slideShadows: true,
  },
  pagination: {
    el: ".swiper-pagination",
  },
});
const swiper = new Swiper(".Myswiper", {
loop: true,
// Navigation arrows
navigation: {
  nextEl: ".swiper-button-next",
  prevEl: ".swiper-button-prev",
},
speed: 800,
});
var swiperChoice = new Swiper(".swiperChoice", {
slidesPerView: 3,
spaceBetween: 30,
pagination: {
  el: ".swiper-pagination",
  clickable: true,
},
});
var sponsor = new Swiper(".sponsor", {
slidesPerView: 3,
spaceBetween: 30,
pagination: {
  el: ".swiper-pagination",
  clickable: true,
},
});
