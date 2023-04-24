import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import VueMask from '@devindex/vue-mask'

// Vuetify
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
import * as labs from 'vuetify/labs/components'
import '@fortawesome/fontawesome-free/css/all.css'
import { aliases, fa } from 'vuetify/iconsets/fa'
import { mdi } from 'vuetify/iconsets/mdi'
import colors from 'vuetify/lib/util/colors'

//ELEMENT UI
import ElementPlus from 'element-plus'
import 'element-plus/dist/index.css'
import 'element-plus/theme-chalk/display.css'
//ALERT
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import Toast from "vue-toastification";
// Import the CSS or use your own!
import "vue-toastification/dist/index.css";

const vuetify = createVuetify({
    components: {
        ...components,
        ...directives,
        ...labs,
      },
    theme: {
        themes: {
            light: {
                dark: false,
                colors: {
                    primary: '#143fef', // #2962FF
                    secondary: '#1E88E5', // #1E88E5
                    success: '#00c292', //'#00c292' #00C853,
                    info: "#59a9ff",
                }
            },
        },
    },
    icons: {
        defaultSet: 'fa',
        aliases,
        sets: {
            fa,
            mdi,
        }
    },

})

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Espindola Admin';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .use(vuetify)
            .use(ElementPlus)
            .use(VueMask)
            .use(VueSweetalert2)
            .use(Toast)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
