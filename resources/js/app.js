import '../css/app.css'
import {createApp, h} from 'vue'
import {createInertiaApp, router} from '@inertiajs/vue3'
import {ZiggyVue} from '../../vendor/tightenco/ziggy';
/* import the fontawesome core */
import {library} from '@fortawesome/fontawesome-svg-core'
import {resolvePageComponent} from 'laravel-vite-plugin/inertia-helpers';
import { initFlowbite } from "flowbite";
import i18nPlugin from './plugins/i18n'
import { __, __n } from './translation'

/* import the fontawesome icon component */
import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome'

/* import specific icons */
import {faUserSecret, faHouse, faRightToBracket, faAddressBook} from '@fortawesome/free-solid-svg-icons'

/* add icons to the library */
library.add(faUserSecret, faHouse, faRightToBracket, faAddressBook)

createInertiaApp({
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue', {eager: true})),
    /*resolve: name => {
        const pages = import.meta.glob('./Pages/!**!/!*.vue', {eager: true})
        return pages[`./Pages/${name}.vue`]
    },*/
    title: title => title ? `${title} - Contractor Engine` : 'Contractor Engine',
    setup({el, App, props, plugin}) {
        return createApp({render: () => h(App, props)})
            .use(plugin)
            .use(ZiggyVue)
            .use(i18nPlugin, {
                greetings: {
                    hello: 'Bonjour!'
                },
                email: {
                    dear: 'chère!'
                }
            })
            .component('font-awesome-icon', FontAwesomeIcon)
            .mixin({ methods: { __, __n } })
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
}).then(() => {
    // on first load
    initFlowbite();
});

router.on('success', (event) => {
    // on each router load, this fixes the issue that flowbite has with inertia.
    initFlowbite();
});

