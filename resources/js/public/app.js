import "../bootstrap";

// Import jQuery (required by AdminLTE)
import $ from "jquery";
window.$ = window.jQuery = $;

import Swiper from "swiper/bundle";
window.Swiper = Swiper;

import lightbox from "lightbox2";

import "./calendar.js";

document.addEventListener("DOMContentLoaded", function () {
    lightbox.option({
        resizeDuration: 200,
        wrapAround: true,
        showImageNumberLabel: false,
    });
});
