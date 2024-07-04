import '../css/app.css'
import {createApp, h} from 'vue'
import {createInertiaApp} from '@inertiajs/vue3'
import {ZiggyVue} from '../../vendor/tightenco/ziggy';
/* import the fontawesome core */
import {library} from '@fortawesome/fontawesome-svg-core'
import {resolvePageComponent} from 'laravel-vite-plugin/inertia-helpers';
import {modal} from '../../vendor/emargareten/inertia-modal'

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
            .component('font-awesome-icon', FontAwesomeIcon)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
})

