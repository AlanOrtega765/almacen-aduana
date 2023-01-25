import "./bootstrap";
import "../css/app.css";

import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "../../vendor/tightenco/ziggy/dist/vue.m";
import Datepicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'

import { library } from "@fortawesome/fontawesome-svg-core";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import {
    faBars,
    faBuildingShield,
    faDolly,
    faBoxesStacked,
    faCarSide,
    faTruckRampBox,
    faPeopleCarryBox,
    faFileLines,
    faFilter,
    faChevronDown,
    faChevronRight,
    faChevronLeft,
    faRotate,
    faPlus,
    faXmark,
    faUser,
    faLock,
    faTrash
} from "@fortawesome/free-solid-svg-icons";

library.add({
    faBars,
    faBuildingShield,
    faDolly,
    faBoxesStacked,
    faCarSide,
    faTruckRampBox,
    faPeopleCarryBox,
    faFileLines,
    faFilter,
    faChevronDown,
    faChevronRight,
    faChevronLeft,
    faRotate,
    faPlus,
    faXmark,
    faUser,
    faLock,
    faTrash
});

const appName =
    window.document.getElementsByTagName("title")[0]?.innerText || "Laravel";

createInertiaApp({
    title: (title) => `${appName} - ${title}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue")
        ),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .component("font-awesome-icon", FontAwesomeIcon)
            .component('DatePicker', Datepicker)
            .mount(el);
    },
    progress: {
        color: "#023373",
    },
});
