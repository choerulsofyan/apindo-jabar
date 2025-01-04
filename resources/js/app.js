import "./bootstrap";

// Import jQuery (required by AdminLTE)
import $ from "jquery";
window.$ = window.jQuery = $;

// Import AdminLTE JavaScript
import "admin-lte/dist/js/adminlte.min.js";

// Import OverlayScrollbars JS

// import "overlayscrollbars/overlayscrollbars.css";
import { OverlayScrollbars } from "overlayscrollbars";
window.OverlayScrollbars = OverlayScrollbars; // Expose globally

// Initialize OverlayScrollbars on the sidebar wrapper
document.addEventListener("DOMContentLoaded", function () {
    const sidebarWrapper = document.querySelector(".sidebar-wrapper");
    if (sidebarWrapper) {
        OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
                theme: "os-theme-light",
                autoHide: "leave",
                clickScroll: true,
            },
        });
    }
});

import { createPopper } from "@popperjs/core";
