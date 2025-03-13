// resources/js/public/calendar.js
import { Calendar } from "@fullcalendar/core";
import dayGridPlugin from "@fullcalendar/daygrid";
import interactionPlugin from "@fullcalendar/interaction";
import timeGridPlugin from "@fullcalendar/timegrid";
import listPlugin from "@fullcalendar/list";
import idLocale from "@fullcalendar/core/locales/id"; // Import Indonesian locale

document.addEventListener("DOMContentLoaded", function () {
    const calendarEl = document.getElementById("calendar");

    // Check if the calendar element exists on the current page
    if (calendarEl) {
        // Get the events data from a data attribute (as a JSON string)
        const eventsData = JSON.parse(calendarEl.dataset.events);

        const calendar = new Calendar(calendarEl, {
            plugins: [
                dayGridPlugin,
                interactionPlugin,
                timeGridPlugin,
                listPlugin,
            ], // Include plugins
            initialView: "dayGridMonth",
            headerToolbar: {
                left: "prev,next today",
                center: "title",
                right: "dayGridMonth,listWeek",
            },
            locale: "id", // Set the locale globally to Indonesian
            firstDay: 1, // Set Monday as the first day of the week
            events: eventsData, // Use the parsed event data
            buttonText: {
                // Customize button text
                today: "Hari Ini", // Indonesian for "today"
                month: "Bulan", // Indonesian for "month"
                week: "Minggu", // Indonesian for "week"
                day: "Hari", // Indonesian for "day"
                list: "Daftar Kegiatan", // Indonesian for "list" -- or agenda, etc
            },
            // You can also customize the view titles if needed.
            views: {
                dayGridMonth: {
                    // Month view
                    titleFormat: { year: "numeric", month: "long" }, // e.g., "Januari 2024"
                },
                timeGridWeek: {
                    // Week view
                    titleFormat: {
                        year: "numeric",
                        month: "long",
                        day: "numeric",
                    }, // e.g., "29 Januari 2024"
                },
                timeGridDay: {
                    // Day View
                    titleFormat: {
                        year: "numeric",
                        month: "long",
                        day: "numeric",
                    }, // e.g., "29 Januari 2024"
                },
                listWeek: {
                    titleFormat: {
                        year: "numeric",
                        month: "long",
                        day: "numeric",
                    }, // e.g., "29 Januari 2024"
                },
            },
            eventContent: function (info) {
                let title = document.createElement("strong");
                title.innerText = info.event.title;

                let place = document.createElement("p");
                // let description = document.createElement("p");
                if (info.event.extendedProps.place) {
                    place.innerText = info.event.extendedProps.place;
                }

                /* if (info.event.extendedProps.description) {
                    description.innerText =
                        info.event.extendedProps.description;
                } */

                let arrayOfDomNodes = [title, place];
                return { domNodes: arrayOfDomNodes };
            },
            eventClick: function (info) {
                if (info.event.url) {
                    window.location.href = info.event.url;
                }
            },
        });

        calendar.render();
    }
});
