// resources/js/swiper.js
import Swiper from "swiper";

// import Swiper styles
import "swiper/css/bundle";

document.addEventListener("DOMContentLoaded", function () {
    var swiper = new Swiper("#heroCarousel", {
        loop: true,
        autoplay: {
            delay: 5000,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
});
